<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use App\Models\Ticket;
use App\Models\RetailSale;
use App\Models\HeadboardSale;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarritoController extends Controller
{
    /**
     * GET: /cart - Mostrar el carrito de compras
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $showtimeId => $data) {
            $showtime = ShowTime::with(['movie', 'theater'])->find($showtimeId);
            if ($showtime) {
                $subtotal = count($data['amchairs']) * (float) $showtime->theater->price;
                $total += $subtotal;
                $items[] = [
                    'showtime' => $showtime,
                    'amchairs' => $data['amchairs'],
                    'subtotal' => $subtotal,
                ];
            }
        }

        return view('cart.index', compact('items', 'total'));
    }

    /**
     * POST: /cart - Agregar elementos al carrito
     */
    public function add(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'amchairs'    => 'required|array|min:1',
            'amchairs.*'  => 'required|string|max:10',
        ]);

        $showtimeId = $request->showtime_id;
        $amchairs = $request->amchairs;

        $showtime = ShowTime::findOrFail($showtimeId);

        // Validar que todas las butacas existan físicamente en la sala
        foreach ($amchairs as $amchair) {
            preg_match('/^([A-Z]+)(\d+)$/i', $amchair, $matches);
            if (count($matches) < 3) {
                return back()->with('error', "El formato del asiento {$amchair} es inválido.");
            }
            $rowLetter = strtoupper($matches[1]);
            $seatNumber = (int)$matches[2];

            $seatExists = Seat::where('theater_id', $showtime->theater_id)
                ->where('row_letter', $rowLetter)
                ->where('seat_number', $seatNumber)
                ->where('is_active', true)
                ->exists();

            if (!$seatExists) {
                return back()->with('error', "El asiento {$amchair} no existe en esta sala.");
            }
        }

        $already = Ticket::where('showtime_id', $showtimeId)
            ->whereIn('amchair', $amchairs)
            ->exists();

        if ($already) {
            return back()->with('error', 'Una o más butacas seleccionadas ya están ocupadas.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$showtimeId])) {
            $cart[$showtimeId]['amchairs'] = array_unique(array_merge($cart[$showtimeId]['amchairs'], $amchairs));
        } else {
            $cart[$showtimeId] = [
                'showtime_id' => $showtimeId,
                'amchairs'    => $amchairs,
            ];
        }

        session()->put('cart', $cart);

        if ($request->input('action') === 'checkout') {
            return redirect()->route('cart.index')->with('success', 'Boletos agregados al carrito.');
        }

        return redirect()->route('index')->with('success', 'Boletos agregados al carrito correctamente.');
    }

    /**
     * DELETE: /cart/{showtimeId} - Eliminar un elemento del carrito
     */
    public function remove(Request $request, $showtimeId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$showtimeId])) {
            unset($cart[$showtimeId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Elemento removido del carrito.');
    }

    /**
     * GET: /cart/checkout - Proceder al checkout
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }

        $items = [];
        $total = 0;

        foreach ($cart as $showtimeId => $data) {
            $showtime = ShowTime::with(['movie', 'theater'])->find($showtimeId);
            if ($showtime) {
                $subtotal = count($data['amchairs']) * (float) $showtime->theater->price;
                $total += $subtotal;
                $items[] = [
                    'showtime' => $showtime,
                    'amchairs' => $data['amchairs'],
                    'subtotal' => $subtotal,
                ];
            }
        }

        return view('cart.pay.index', compact('items', 'total'));
    }

    /**
     * POST: /cart/confirm - Confirmar la compra
     */
    public function confirm(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('index')->with('error', 'El carrito está vacío.');
        }

        $user = Auth::user();

        // Validar ocupación y existencia de asientos en BD
        $seatsByShowtime = [];
        foreach ($cart as $showtimeId => $data) {
            $showtime = ShowTime::findOrFail($showtimeId);

            $already = Ticket::where('showtime_id', $showtimeId)
                ->whereIn('amchair', $data['amchairs'])
                ->exists();

            if ($already) {
                return redirect()->route('cart.index')->with('error', 'Una o más butacas en tu carrito ya fueron ocupadas. Por favor revisa tu selección.');
            }

            // Traducir y validar asientos en BD
            $seatsMap = [];
            foreach ($data['amchairs'] as $amchair) {
                preg_match('/^([A-Z]+)(\d+)$/i', $amchair, $matches);
                if (count($matches) < 3) {
                    return redirect()->route('cart.index')->with('error', "El formato del asiento {$amchair} es inválido.");
                }
                $rowLetter = strtoupper($matches[1]);
                $seatNumber = (int)$matches[2];

                $seat = Seat::where('theater_id', $showtime->theater_id)
                    ->where('row_letter', $rowLetter)
                    ->where('seat_number', $seatNumber)
                    ->where('is_active', true)
                    ->first();

                if (!$seat) {
                    return redirect()->route('cart.index')->with('error', "El asiento {$amchair} no existe en esta sala.");
                }
                $seatsMap[$amchair] = $seat->id;
            }
            $seatsByShowtime[$showtimeId] = $seatsMap;
        }

        $headboard = DB::transaction(function () use ($cart, $user, $seatsByShowtime) {
            // Crear cabecera única
            $headboard = HeadboardSale::create([
                'user_id' => $user->id,
                'state'   => 'confirmed',
                'total'   => 0, // se calcula al final
            ]);

            $totalGeneral = 0;

            foreach ($cart as $showtimeId => $data) {
                $showtime = ShowTime::with(['movie', 'theater'])->findOrFail($showtimeId);
                $unitPrice = (float) $showtime->theater->price;
                $cant = count($data['amchairs']);
                $subtotal = $unitPrice * $cant;
                $seatsMap = $seatsByShowtime[$showtimeId];

                $tickets = [];
                foreach ($data['amchairs'] as $amchair) {
                    $ticket = Ticket::create([
                        'id'          => Str::uuid()->toString(),
                        'pelicula_id' => $showtime->movie_id,
                        'showtime_id' => $showtime->id,
                        'theater_id'  => $showtime->theater_id,
                        'seat_id'     => $seatsMap[$amchair],
                        'price'       => $unitPrice,
                        'amchair'     => $amchair,
                        'date'        => $showtime->datetime,
                        'movie'       => $showtime->movie->name,
                    ]);
                    $tickets[] = $ticket;
                }

                $retailSale = RetailSale::create([
                    'ticket_id'         => $tickets[0]->id,
                    'price'             => $subtotal,
                    'cant'              => $cant,
                    'precio_unitario'   => $unitPrice,
                    'subtotal'          => $subtotal,
                    'headboard_sale_id' => $headboard->id,
                ]);

                Ticket::whereIn('id', collect($tickets)->pluck('id'))->update(['retail_sale_id' => $retailSale->id]);

                $totalGeneral += $subtotal;
            }

            $headboard->update(['total' => $totalGeneral]);

            $user->update(['sale_id' => $headboard->id]);

            return $headboard;
        });

        session()->forget('cart');

        return redirect()->route('purchase.success')
            ->with('success', '¡Compra realizada exitosamente!')
            ->with('sale_id', $headboard->id);
    }
}

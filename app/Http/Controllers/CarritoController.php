<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use App\Models\Ticket;
use App\Models\RetailSale;
use App\Models\HeadboardSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarritoController extends Controller
{
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

    public function add(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'amchairs'    => 'required|array|min:1',
            'amchairs.*'  => 'required|string|max:10',
        ]);

        $showtimeId = $request->showtime_id;
        $amchairs = $request->amchairs;

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

    public function remove(Request $request, $showtimeId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$showtimeId])) {
            unset($cart[$showtimeId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Elemento removido del carrito.');
    }

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

    public function confirm(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('index')->with('error', 'El carrito está vacío.');
        }

        $user = Auth::user();

        foreach ($cart as $showtimeId => $data) {
            $already = Ticket::where('showtime_id', $showtimeId)
                ->whereIn('amchair', $data['amchairs'])
                ->exists();

            if ($already) {
                return redirect()->route('cart.index')->with('error', 'Una o más butacas en tu carrito ya fueron ocupadas. Por favor revisa tu selección.');
            }
        }

        $headboard = DB::transaction(function () use ($cart, $user) {
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

                $tickets = [];
                foreach ($data['amchairs'] as $amchair) {
                    $ticket = Ticket::create([
                        'id'          => Str::uuid()->toString(),
                        'pelicula_id' => $showtime->movie_id,
                        'showtime_id' => $showtime->id,
                        'theater_id'  => $showtime->theater_id,
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

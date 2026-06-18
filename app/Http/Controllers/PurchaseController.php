<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\ShowTime;
use App\Models\RetailSale;
use App\Models\HeadboardSale;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    /**
     * GET: /purchase/armchair - Seleccionar butacas para la compra
     */
    public function selectArmchair(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
        ]);

        $showtime = ShowTime::with(['movie', 'theater.seats' => function($q) {
            $q->where('is_active', true)->orderBy('row_letter')->orderBy('seat_number');
        }])->findOrFail($request->showtime_id);

        $seatsByRow = $showtime->theater->seats->groupBy('row_letter');

        $occupiedChairs = Ticket::where('showtime_id', $showtime->id)
            ->pluck('amchair')
            ->toArray();

        return view('cart.armchair.index', compact('showtime', 'seatsByRow', 'occupiedChairs'));
    }

    /**
     * GET: /purchase/review - Revisar la compra antes de confirmar
     */
    public function reviewPurchase(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'amchairs'    => 'required|array|min:1',
            'amchairs.*'  => 'required|string|max:10',
        ]);

        $showtime = ShowTime::with(['movie', 'theater'])->findOrFail($request->showtime_id);

        // Validar que todas las butacas existan físicamente en la sala
        foreach ($request->amchairs as $amchair) {
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

        $already = Ticket::where('showtime_id', $showtime->id)
            ->whereIn('amchair', $request->amchairs)
            ->exists();

        if ($already) {
            return back()->with('error', 'Una o más butacas seleccionadas ya están ocupadas.');
        }

        return view('cart.pay.index', [
            'showtime'  => $showtime,
            'amchairs'  => $request->amchairs,
            'unitPrice' => (float) $showtime->theater->price,
            'subtotal'  => count($request->amchairs) * (float) $showtime->theater->price,
        ]);
    }

    /**
     * POST: /purchase/confirm - Confirmar la compra
     */
    public function confirm(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'amchairs'    => 'required|array|min:1',
            'amchairs.*'  => 'required|string|max:10',
        ]);

        $showtime = ShowTime::with(['movie', 'theater'])->findOrFail($request->showtime_id);
        $user     = Auth::user();

        // Traducir y validar existencia física de asientos en BD
        $seatsMap = [];
        foreach ($request->amchairs as $amchair) {
            preg_match('/^([A-Z]+)(\d+)$/i', $amchair, $matches);
            if (count($matches) < 3) {
                return back()->with('error', "El formato del asiento {$amchair} es inválido.");
            }
            $rowLetter = strtoupper($matches[1]);
            $seatNumber = (int)$matches[2];

            $seat = Seat::where('theater_id', $showtime->theater_id)
                ->where('row_letter', $rowLetter)
                ->where('seat_number', $seatNumber)
                ->where('is_active', true)
                ->first();

            if (!$seat) {
                return back()->with('error', "El asiento {$amchair} no existe en esta sala.");
            }
            $seatsMap[$amchair] = $seat->id;
        }

        $already = Ticket::where('showtime_id', $showtime->id)
            ->whereIn('amchair', $request->amchairs)
            ->exists();

        if ($already) {
            return back()->with('error', 'Una o más butacas ya fueron tomadas. Selecciona nuevamente.');
        }

        $unitPrice = (float) $showtime->theater->price;
        $cant      = count($request->amchairs);
        $subtotal  = $unitPrice * $cant;

        $headboard = DB::transaction(function () use ($showtime, $user, $request, $unitPrice, $cant, $subtotal, $seatsMap) {
            // 1. Crear un ticket por cada butaca seleccionada
            $tickets = [];
            foreach ($request->amchairs as $amchair) {
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
                'ticket_id'       => $tickets[0]->id,
                'price'           => $subtotal,
                'cant'            => $cant,
                'precio_unitario' => $unitPrice,
                'subtotal'        => $subtotal,
            ]);

            Ticket::whereIn('id', collect($tickets)->pluck('id'))->update(['retail_sale_id' => $retailSale->id]);

            $headboard = HeadboardSale::create([
                'user_id'        => $user->id,
                'retail_sale_id' => $retailSale->id,
                'state'          => 'confirmed',
                'total'          => $subtotal,
            ]);

            // Asocia la línea de venta con la cabecera para unificar la relación 1-a-N
            $retailSale->update(['headboard_sale_id' => $headboard->id]);

            $user->update(['sale_id' => $headboard->id]);

            return $headboard;
        });

        return redirect()->route('purchase.success')
            ->with('success', '¡Compra realizada exitosamente!')
            ->with('sale_id', $headboard->id);
    }

    /**
     * GET: /purchase/success - Mostrar página de éxito después de confirmar la compra
     */
    public function success()
    {
        $saleId = session('sale_id');
        $sale = $saleId
            ? HeadboardSale::with(['retailSales.tickets.showtime.movie', 'retailSales.tickets.theater'])->find($saleId)
            : HeadboardSale::with(['retailSales.tickets.showtime.movie', 'retailSales.tickets.theater'])
                ->where('user_id', Auth::id())
                ->latest()
                ->first();

        if (!$sale) {
            return redirect()->route('index')->with('error', 'No se encontró la compra.');
        }

        return view('cart.success', compact('sale'));
    }

    /**
     * GET: /purchase/history - Mostrar historial de compras
     */
    public function history()
    {
        $sales = HeadboardSale::with(['retailSales.tickets.showtime.movie', 'retailSales.tickets.theater'])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('cart.history', compact('sales'));
    }

    /**
     * GET: /purchase/ticket/{ticket} - Redirigir al comprobante de la compra correspondiente
     */
    public function showTicket(Ticket $ticket)
    {
        $sale = HeadboardSale::where('user_id', Auth::id())
            ->whereHas('retailSales.tickets', function ($q) use ($ticket) {
                $q->where('id', $ticket->id);
            })
            ->first();

        if (!$sale) {
            abort(403, 'No autorizado a ver este boleto.');
        }

        return redirect()->route('purchases.show', $sale);
    }

    /**
     * GET: /purchase/receipt/{sale} - Mostrar comprobante de una compra específica
     */
    public function showReceipt(HeadboardSale $sale)
    {
        if ($sale->user_id !== Auth::id()) {
            abort(403, 'No autorizado a ver este comprobante.');
        }

        $sale->load(['retailSales.tickets.showtime.movie', 'retailSales.tickets.theater']);

        $redeemCode = strtoupper('CV-' . str_pad($sale->id, 4, '0', STR_PAD_LEFT) . '-' . substr(md5($sale->id . $sale->created_at), 0, 6));

        return view('cart.receipt', compact('sale', 'redeemCode'));
    }
}

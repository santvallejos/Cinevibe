<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\ShowTime;
use App\Models\RetailSale;
use App\Models\HeadboardSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    public function selectArmchair(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
        ]);

        $showtime = ShowTime::with(['movie', 'theater'])->findOrFail($request->showtime_id);

        $occupiedChairs = Ticket::where('showtime_id', $showtime->id)
            ->pluck('amchair')
            ->toArray();

        return view('cart.armchair.index', compact('showtime', 'occupiedChairs'));
    }

    public function reviewPurchase(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'amchairs'    => 'required|array|min:1',
            'amchairs.*'  => 'required|string|max:10',
        ]);

        $showtime = ShowTime::with(['movie', 'theater'])->findOrFail($request->showtime_id);

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

    public function confirm(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'amchairs'    => 'required|array|min:1',
            'amchairs.*'  => 'required|string|max:10',
        ]);

        $showtime = ShowTime::with(['movie', 'theater'])->findOrFail($request->showtime_id);
        $user     = Auth::user();

        $already = Ticket::where('showtime_id', $showtime->id)
            ->whereIn('amchair', $request->amchairs)
            ->exists();

        if ($already) {
            return back()->with('error', 'Una o más butacas ya fueron tomadas. Selecciona nuevamente.');
        }

        $unitPrice = (float) $showtime->theater->price;
        $cant      = count($request->amchairs);
        $subtotal  = $unitPrice * $cant;

        $headboard = DB::transaction(function () use ($showtime, $user, $request, $unitPrice, $cant, $subtotal) {
            // 1. Crear un ticket por cada butaca seleccionada
            $tickets = [];
            foreach ($request->amchairs as $amchair) {
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

    public function history()
    {
        $sales = HeadboardSale::with(['retailSales.tickets.showtime.movie', 'retailSales.tickets.theater'])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('cart.history', compact('sales'));
    }

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

        $ticket->load(['showtime.movie', 'theater']);

        return view('cart.ticket', compact('ticket', 'sale'));
    }
}

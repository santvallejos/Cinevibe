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
    /**
     * Muestra el selector de butacas para una función.
     * Recibe showtime_id y devuelve la vista con butacas ocupadas.
     */
    public function selectArmchair(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
        ]);

        $showtime = ShowTime::with(['movie', 'theater'])->findOrFail($request->showtime_id);

        // Butacas ya ocupadas en esta función
        $occupiedChairs = Ticket::where('showtime_id', $showtime->id)
            ->pluck('amchair')
            ->toArray();

        return view('cart.armchair.index', compact('showtime', 'occupiedChairs'));
    }

    /**
     * Muestra el resumen de compra con los asientos seleccionados.
     * Recibe showtime_id y array de amchairs.
     */
    public function reviewPurchase(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'amchairs'    => 'required|array|min:1',
            'amchairs.*'  => 'required|string|max:10',
        ]);

        $showtime = ShowTime::with(['movie', 'theater'])->findOrFail($request->showtime_id);

        // Verificar que ninguna butaca ya esté ocupada
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
     * Confirma y procesa la compra.
     * Crea Tickets, RetailSale y HeadboardSale dentro de una transacción.
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

        // Verificación final de disponibilidad
        $already = Ticket::where('showtime_id', $showtime->id)
            ->whereIn('amchair', $request->amchairs)
            ->exists();

        if ($already) {
            return back()->with('error', 'Una o más butacas ya fueron tomadas. Selecciona nuevamente.');
        }

        $unitPrice = (float) $showtime->theater->price;
        $cant      = count($request->amchairs);
        $subtotal  = $unitPrice * $cant;

        DB::transaction(function () use ($showtime, $user, $request, $unitPrice, $cant, $subtotal) {
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

            // 2. Crear RetailSale usando el primer ticket como referencia del evento
            $retailSale = RetailSale::create([
                'ticket_id'       => $tickets[0]->id,
                'price'           => $subtotal,
                'cant'            => $cant,
                'precio_unitario' => $unitPrice,
                'subtotal'        => $subtotal,
            ]);

            // 3. Crear HeadboardSale (cabecera de la orden)
            $headboard = HeadboardSale::create([
                'user_id'        => $user->id,
                'retail_sale_id' => $retailSale->id,
                'state'          => 'confirmed',
                'total'          => $subtotal,
            ]);

            // 4. Actualizar sale_id del usuario con la compra más reciente
            $user->update(['sale_id' => $headboard->id]);
        });

        return redirect()->route('purchase.success')
            ->with('success', '¡Compra realizada exitosamente!');
    }

    /**
     * Vista de compra exitosa.
     */
    public function success()
    {
        return view('cart.success');
    }

    /**
     * Historial de compras del usuario autenticado.
     */
    public function history()
    {
        $sales = HeadboardSale::with(['retailSale.ticket.showtime.movie'])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('cart.history', compact('sales'));
    }
}

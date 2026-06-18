<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\Ticket;
use App\Models\HeadboardSale;
use App\Models\Theater;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * GET: /admin - Mostrar vista del administrador
     */
    public function index()
    {
        if (Auth::user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }

        $totalUsuarios = User::count();
        $totalPeliculas = Movie::count();
        $totalFunciones = ShowTime::count();
        $totalEntradas = Ticket::count();

        $usuarios = User::orderBy('created_at', 'desc')->get();

        $funcionesProximas = ShowTime::with(['movie', 'theater'])
            ->where('datetime', '>=', now())
            ->orderBy('datetime')
            ->take(5)
            ->get();

        return view('auth.admin.index', compact(
            'totalUsuarios',
            'totalPeliculas',
            'totalFunciones',
            'totalEntradas',
            'usuarios',
            'funcionesProximas'
        ));
    }

    /**
     * GET: /admin/sales
     *
     * Listado y filtrado de todas las ventas del cine.
     */
    public function salesIndex(Request $request)
    {
        if (Auth::user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }

        $query = HeadboardSale::with([
            'user',
            'retailSales.tickets.showtime.movie',
            'retailSales.tickets.theater'
        ]);

        // Filtro por Película
        if ($request->filled('movie_id')) {
            $movieId = $request->movie_id;
            $query->whereHas('retailSales.tickets', function ($q) use ($movieId) {
                $q->where('pelicula_id', $movieId);
            });
        }

        // Filtro por Sala (Theater)
        if ($request->filled('theater_id')) {
            $theaterId = $request->theater_id;
            $query->whereHas('retailSales.tickets', function ($q) use ($theaterId) {
                $q->where('theater_id', $theaterId);
            });
        }

        // Filtro por Fecha
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $sales = $query->orderBy('created_at', 'desc')->get();
        $totalRevenue = $sales->sum('total');

        $movies = Movie::orderBy('name')->get();
        $theaters = Theater::orderBy('name')->get();

        return view('auth.admin.sales', compact('sales', 'totalRevenue', 'movies', 'theaters'));
    }
}

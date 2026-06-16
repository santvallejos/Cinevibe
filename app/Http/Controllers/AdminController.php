<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\Ticket;

class AdminController extends Controller
{
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
}

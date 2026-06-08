<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Muestra el panel del cliente autenticado.
     */
    public function index()
{
    $usuario = auth()->user();

    $cantidadCarrito = session('carrito')
        ? count(session('carrito'))
        : 0;

    return view(
        'backend.usuarios.cliente.index',
        compact('usuario', 'cantidadCarrito')
    );
}
}
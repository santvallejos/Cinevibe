<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Muestra el panel del cliente autenticado.
     */
    public function index()
    {
        $usuario = auth()->user();

        // Si es administrador, lo redirigimos a su panel
        if ($usuario->rol_id == 1) {
            return redirect()->route('admin.dashboard');
        }

        return view('backend.usuarios.cliente.index', compact('usuario'));
    }
}
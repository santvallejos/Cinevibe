<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * GET: /cliente - Mostrar vista del cliente
     */
    public function index()
    {
        $usuario = auth()->user();

        if ($usuario->rol_id == 1) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.usuarios.cliente.index', compact('usuario'));
    }
}

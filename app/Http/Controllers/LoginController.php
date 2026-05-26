<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginView()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        // Aquí puedes agregar la lógica de autenticación
        // Por ejemplo, validar las credenciales y redirigir al usuario

        // Para este ejemplo, simplemente redirigiremos a la página principal
        return redirect()->route('index');
    }
}

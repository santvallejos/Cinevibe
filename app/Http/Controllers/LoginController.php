<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * GET: /login - Mostrar vista de inicio de sesión
     */
    public function showLoginView()
    {
      return view('auth.usuarios.login.index');
    }

    /**
     * POST: /login - Iniciar sesión
     */
    public function login(Request $request)
    {
    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        if (Auth::user()->rol->name === 'Admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('cliente.dashboard');
    }

    return back()
        ->withInput($request->only('email'))
        ->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
}

    /**
     * GET: /logout - Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}

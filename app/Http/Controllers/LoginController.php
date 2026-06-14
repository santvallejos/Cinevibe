<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLoginView()
    {
      return view('backend.usuarios.login.index');
    }

    /**
     * Procesa las credenciales del formulario y autentica al usuario.
     * Usa Auth::attempt() para verificar email + password contra la BD.
     * Regenera la sesión para prevenir ataques de fijación de sesión.
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
     * Cierra la sesión del usuario actual de forma segura.
     * Invalida la sesión, regenera el token CSRF y redirige al inicio.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidar la sesión y regenerar el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterView()
    {
        return view('register.index');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el nuevo usuario con rol de Cliente (rol_id = 2)
        $user = User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'rol_id'   => 2, // ID 2 = Cliente (creado por RoleSeeder)
        ]);

        // Iniciar sesión automáticamente después del registro
        auth()->login($user);

        // Redirigir al usuario a la página principal o a donde desees
        return redirect()->route('index');
    }
}

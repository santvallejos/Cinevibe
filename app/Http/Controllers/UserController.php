<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * GET: /admin/users - Listar todos los usuarios
     */
    public function index(Request $request)
    {
        $query = User::with('rol');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('role')) {
            $query->where('rol_id', $request->role);
        }

        $users = $query->orderBy('name')->get();
        $roles = \App\Models\Role::all();

        return view('auth.users.index', compact('users', 'roles'));
    }

    /**
     * GET: /admin/users/create - Mostrar formulario de creación de usuarios
     */
    public function create()
    {
        $roles = \App\Models\Role::all();
        return view('auth.users.create', compact('roles'));
    }

    /**
     * POST: /admin/users - Almacenar un nuevo usuario
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'rol_id'   => 'required|exists:roles,id',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'rol_id'   => $request->rol_id,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * GET: /admin/users/{id} - Muestra los detalles de un usuario.
     */
    public function show(User $user)
    {
        return view('auth.users.show', compact('user'));
    }

    /**
     * GET: /admin/users/{id}/edit - Muestra el formulario de edición de un usuario.
     */
    public function edit(User $user)
    {
        $roles = \App\Models\Role::all();
        return view('auth.users.edit', compact('user', 'roles'));
    }

    /**
     * PUT: /admin/users/{id} - Actualiza la información de un usuario.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'rol_id'   => 'required|exists:roles,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->rol_id = $request->rol_id;
        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * DELETE: /admin/users/{id} - Elimina a un usuario.
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'No puedes eliminarte a ti mismo.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }
}

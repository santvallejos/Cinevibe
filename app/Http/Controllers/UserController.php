<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }

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

    public function create()
    {
        if (auth()->user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }
        $roles = \App\Models\Role::all();
        return view('auth.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }

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

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function show(User $user)
    {
        if (auth()->user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }
        return view('auth.users.show', compact('user'));
    }

    public function edit(User $user = null)
    {
        if (!$user || !$user->exists) {
            $user = auth()->user();
            return view('profile.edit', compact('user'));
        }

        if (auth()->user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }

        $roles = \App\Models\Role::all();
        return view('auth.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user = null)
    {
        $isProfile = false;
        if (!$user || !$user->exists) {
            $user = auth()->user();
            $isProfile = true;
        }

        if (!$isProfile && auth()->user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }

        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ];

        if (auth()->user()->rol_id == 1 && !$isProfile) {
            $rules['rol_id'] = 'required|exists:roles,id';
        }

        $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if (auth()->user()->rol_id == 1 && !$isProfile && $request->has('rol_id')) {
            $user->rol_id = $request->rol_id;
        }

        $user->save();

        if ($isProfile) {
            return redirect()->route('profile.edit')->with('success', 'Perfil actualizado exitosamente.');
        }

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        if (auth()->user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }

        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'No puedes eliminarte a ti mismo.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}

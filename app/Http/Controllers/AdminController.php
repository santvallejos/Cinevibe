<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
{
    if (Auth::user()->rol_id != 1) {
        abort(403, 'No autorizado');
    }

    $totalUsuarios = User::count();

    $usuarios = User::orderBy('created_at', 'desc')->get();

    return view('backend.admin.index', compact(
        'totalUsuarios',
        'usuarios'
    ));
}
}
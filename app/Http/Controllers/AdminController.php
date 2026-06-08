<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();

        $usuarios = User::orderBy('created_at', 'desc')->get();

        return view('backend.admin.index', compact(
            'totalUsuarios',
            'usuarios'
        ));
    }
}
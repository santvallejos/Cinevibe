<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    /**
     * Lista todas las salas.
     */
    public function index()
    {
        $theaters = Theater::all();
        return view('theaters.index', compact('theaters'));
    }

    /**
     * Muestra detalle de una sala.
     */
    public function show(Theater $theater)
    {
        $theater->load('showtimes.movie');
        return view('theaters.show', compact('theater'));
    }

    /**
     * Formulario de creación (admin).
     */
    public function create()
    {
        return view('theaters.create');
    }

    /**
     * Guarda nueva sala.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|string|max:100',
        ]);

        Theater::create($validated);

        return redirect()->route('theaters.index')
            ->with('success', 'Sala creada exitosamente.');
    }

    /**
     * Formulario de edición (admin).
     */
    public function edit(Theater $theater)
    {
        return view('theaters.edit', compact('theater'));
    }

    /**
     * Actualiza datos de una sala.
     */
    public function update(Request $request, Theater $theater)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|string|max:100',
        ]);

        $theater->update($validated);

        return redirect()->route('theaters.index')
            ->with('success', 'Sala actualizada.');
    }

    /**
     * Elimina una sala.
     */
    public function destroy(Theater $theater)
    {
        $theater->delete();
        return redirect()->route('theaters.index')
            ->with('success', 'Sala eliminada.');
    }
}

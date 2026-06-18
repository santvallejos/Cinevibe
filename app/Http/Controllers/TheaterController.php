<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    /**
     * GET: /theaters - Listar todas las salas
    */
    public function index()
    {
        $theaters = Theater::all();
        return view('theaters.index', compact('theaters'));
    }

    /**
     * GET: /theaters/{id} - Mostrar detalles de una sala
    */
    public function show(Theater $theater)
    {
        $theater->load('showtimes.movie');
        return view('theaters.show', compact('theater'));
    }

    /**
     * GET: /theaters/create - Mostrar formulario de creación de salas
    */
    public function create()
    {
        return view('theaters.create');
    }

    /**
     * POST: /theaters - Almacenar una nueva sala
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
     * GET: /theaters/{id}/edit - Mostrar formulario de edición de una sala
     */
    public function edit(Theater $theater)
    {
        return view('theaters.edit', compact('theater'));
    }

    /**
     * PUT: /theaters/{id} - Actualizar información de una sala
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
     * DELETE: /theaters/{id} - Eliminar una sala
     */
    public function destroy(Theater $theater)
    {
        $theater->delete();
        return redirect()->route('theaters.index')
            ->with('success', 'Sala eliminada.');
    }
}

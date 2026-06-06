<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\ShowTime;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Lista todas las películas (cartelera).
     */
    public function index()
    {
        $movies = Movie::with('showtimes.theater')->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * Muestra el detalle de una película con sus funciones disponibles.
     */
    public function show(Movie $movie)
    {
        $movie->load('showtimes.theater');
        return view('movies.show', compact('movie'));
    }

    /**
     * Formulario de creación (admin).
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Guarda nueva película.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration'    => 'required|string|max:50',
            'category'    => 'required|string|max:100',
            'datepremire' => 'required|date',
            'image_url'   => 'nullable|url',
            'trailer_url' => 'nullable|url',
        ]);

        $movie = Movie::create($validated);

        return redirect()->route('movies.show', $movie)
            ->with('success', 'Película creada exitosamente.');
    }

    /**
     * Formulario de edición (admin).
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Actualiza datos de una película.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration'    => 'required|string|max:50',
            'category'    => 'required|string|max:100',
            'datepremire' => 'required|date',
            'image_url'   => 'nullable|url',
            'trailer_url' => 'nullable|url',
        ]);

        $movie->update($validated);

        return redirect()->route('movies.show', $movie)
            ->with('success', 'Película actualizada.');
    }

    /**
     * Elimina una película.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')
            ->with('success', 'Película eliminada.');
    }
}

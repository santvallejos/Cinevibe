<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\ShowTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MovieController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
            new Middleware(function ($request, $next) {
                if (auth()->user()->rol_id != 1) {
                    abort(403, 'No autorizado');
                }
                return $next($request);
            }, except: ['index', 'show']),
        ];
    }

    public function adminIndex(Request $request)
    {
        $query = Movie::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', 'like', '%' . $request->category . '%');
        }

        $movies = $query->orderBy('name')->get();
        return view('auth.movies.index', compact('movies'));
    }

    public function index(Request $request)
    {
        $query = Movie::with('showtimes.theater');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', 'like', '%' . $request->category . '%');
        }

        $movies = $query->get();
        return view('billboard.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        // Carga las relaciones de horarios y sala asociada a cada función
        $movie->load('showtimes.theater');
        return view('billboard.movie.index', compact('movie'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'state'       => 'required|string|max:100',
            'description' => 'nullable|string',
            'duration'    => 'required|string|max:50',
            'category'    => 'required|string|max:100',
            'datepremire' => 'required|date',
            'image_url'   => 'nullable|url',
            'trailer_url' => 'nullable|url',
        ]);

        $movie = Movie::create($validated);

        return redirect()->route('admin.movies.index')
            ->with('success', 'Película creada exitosamente.');
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'state'       => 'required|string|max:100',
            'description' => 'nullable|string',
            'duration'    => 'required|string|max:50',
            'category'    => 'required|string|max:100',
            'datepremire' => 'required|date',
            'image_url'   => 'nullable|url',
            'trailer_url' => 'nullable|url',
        ]);

        $movie->update($validated);

        return redirect()->route('admin.movies.index')
            ->with('success', 'Película actualizada.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movies.index')
            ->with('success', 'Película eliminada.');
    }
}

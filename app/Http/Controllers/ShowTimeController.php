<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    public function index()
    {
        $showtimes = ShowTime::with(['movie', 'theater'])
            ->where('datetime', '>=', now())
            ->orderBy('datetime')
            ->get();

        return view('showtimes.index', compact('showtimes'));
    }

    public function byMovie(Movie $movie)
    {
        $showtimes = ShowTime::with('theater')
            ->where('movie_id', $movie->id)
            ->where('datetime', '>=', now())
            ->orderBy('datetime')
            ->get();

        return view('showtimes.by-movie', compact('movie', 'showtimes'));
    }

    public function create()
    {
        $movies   = Movie::all();
        $theaters = Theater::all();
        return view('showtimes.create', compact('movies', 'theaters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'datetime'   => 'required|date|after:now',
            'theater_id' => 'required|exists:theaters,id',
            'movie_id'   => 'required|exists:movies,id',
        ]);

        ShowTime::create($validated);

        return redirect()->route('showtimes.index')
            ->with('success', 'Función creada exitosamente.');
    }

    public function edit(ShowTime $showtime)
    {
        $movies   = Movie::all();
        $theaters = Theater::all();
        return view('showtimes.edit', compact('showtime', 'movies', 'theaters'));
    }

    public function update(Request $request, ShowTime $showtime)
    {
        $validated = $request->validate([
            'datetime'   => 'required|date|after:now',
            'theater_id' => 'required|exists:theaters,id',
            'movie_id'   => 'required|exists:movies,id',
        ]);

        $showtime->update($validated);

        return redirect()->route('showtimes.index')
            ->with('success', 'Función actualizada exitosamente.');
    }

    public function destroy(ShowTime $showtime)
    {
        $showtime->delete();
        return redirect()->route('showtimes.index')
            ->with('success', 'Función eliminada.');
    }
}

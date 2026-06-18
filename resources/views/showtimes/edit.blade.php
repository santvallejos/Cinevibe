@extends('layouts.navbar-y-footer.app')

@section('title', 'Editar Función — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h1 class="form-title">
        <i class="fas fa-edit" style="color: #e50914;"></i> Editar Función #{{ $showtime->id }}
    </h1>

    <form action="{{ route('showtimes.update', $showtime) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="movie_id">Película</label>
            <select id="movie_id" name="movie_id" class="form-control" required>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}" {{ old('movie_id', $showtime->movie_id) == $movie->id ? 'selected' : '' }}>
                        {{ $movie->name }} ({{ $movie->duration }})
                    </option>
                @endforeach
            </select>
            @error('movie_id') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="theater_id">Sala / Pantalla</label>
            <select id="theater_id" name="theater_id" class="form-control" required>
                @foreach($theaters as $theater)
                    <option value="{{ $theater->id }}" {{ old('theater_id', $showtime->theater_id) == $theater->id ? 'selected' : '' }}>
                        {{ $theater->name }} (${{ number_format($theater->price, 0, ',', '.') }})
                    </option>
                @endforeach
            </select>
            @error('theater_id') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="datetime">Fecha y Hora</label>
            <input type="datetime-local" id="datetime" name="datetime" class="form-control" value="{{ old('datetime', $showtime->datetime->format('Y-m-d\TH:i')) }}" required>
            @error('datetime') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
            <a href="{{ route('showtimes.index') }}" class="btn-cancel">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection

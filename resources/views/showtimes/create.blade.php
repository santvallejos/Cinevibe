@extends('layouts.navbar-y-footer.app')

@section('title', 'Nueva Función — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
    <style>
        .form-container {
            max-width: 700px;
            margin: 3rem auto;
            padding: 2rem;
            background: rgba(30, 30, 40, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
        }
        .form-title {
            color: #ffffff;
            font-family: 'Manrope', sans-serif;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            color: #A0A0B0;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }
        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            background: rgba(20, 20, 25, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            color: #ffffff;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            outline: none;
            border-color: #e50914;
            box-shadow: 0 0 10px rgba(229, 9, 20, 0.3);
        }
        .btn-submit {
            background: linear-gradient(135deg, #e50914 0%, #b80710 100%);
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        .btn-cancel {
            background: rgba(255, 255, 255, 0.05);
            color: #A0A0B0;
            padding: 0.75rem 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }
        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }
        .error-msg {
            color: #e50914;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
    </style>
@endpush

@section('content')
<div class="form-container">
    <h1 class="form-title">
        <i class="fas fa-plus-circle" style="color: #e50914;"></i> Programar Nueva Función
    </h1>

    <form action="{{ route('showtimes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="movie_id">Película</label>
            <select id="movie_id" name="movie_id" class="form-control" required>
                <option value="">Selecciona una película...</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
                        {{ $movie->name }} ({{ $movie->duration }})
                    </option>
                @endforeach
            </select>
            @error('movie_id') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="theater_id">Sala / Pantalla</label>
            <select id="theater_id" name="theater_id" class="form-control" required>
                <option value="">Selecciona una sala...</option>
                @foreach($theaters as $theater)
                    <option value="{{ $theater->id }}" {{ old('theater_id') == $theater->id ? 'selected' : '' }}>
                        {{ $theater->name }} (${{ number_format($theater->price, 0, ',', '.') }})
                    </option>
                @endforeach
            </select>
            @error('theater_id') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="datetime">Fecha y Hora</label>
            <input type="datetime-local" id="datetime" name="datetime" class="form-control" value="{{ old('datetime') }}" required>
            @error('datetime') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
            <a href="{{ route('showtimes.index') }}" class="btn-cancel">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Guardar Función
            </button>
        </div>
    </form>
</div>
@endsection

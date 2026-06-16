@extends('layouts.navbar-y-footer.app')

@section('title', 'Agregar Película — CineVibe')

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
        <i class="fas fa-plus-circle" style="color: #e50914;"></i> Agregar Nueva Película
    </h1>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre de la Película</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label for="category">Categoría / Género</label>
                <input type="text" id="category" name="category" class="form-control" placeholder="Ej: Acción, Comedia" value="{{ old('category') }}" required>
                @error('category') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="duration">Duración</label>
                <input type="text" id="duration" name="duration" class="form-control" placeholder="Ej: 2h 15m" value="{{ old('duration') }}" required>
                @error('duration') <div class="error-msg">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="state">Estado / Cartelera</label>
            <select id="state" name="state" class="form-control" required style="background: rgba(255, 255, 255, 0.05); color: white; border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 8px; padding: 0.75rem 1rem; width: 100%;">
                <option value="" disabled {{ old('state') == '' ? 'selected' : '' }}>Selecciona un estado...</option>
                <option value="En cartelera" {{ old('state') == 'En cartelera' ? 'selected' : '' }}>En cartelera</option>
                <option value="Próximamente" {{ old('state') == 'Próximamente' ? 'selected' : '' }}>Próximamente</option>
                <option value="Estreno" {{ old('state') == 'Estreno' ? 'selected' : '' }}>Estreno</option>
            </select>
            @error('state') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="datepremire">Fecha de Estreno</label>
            <input type="date" id="datepremire" name="datepremire" class="form-control" value="{{ old('datepremire') }}" required>
            @error('datepremire') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="image_url">URL del Póster (Imagen)</label>
            <input type="url" id="image_url" name="image_url" class="form-control" placeholder="https://..." value="{{ old('image_url') }}">
            @error('image_url') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="trailer_url">URL del Tráiler</label>
            <input type="url" id="trailer_url" name="trailer_url" class="form-control" placeholder="https://..." value="{{ old('trailer_url') }}">
            @error('trailer_url') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="description">Sinopsis / Descripción</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            @error('description') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
            <a href="{{ route('admin.dashboard') }}" class="btn-cancel">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Guardar Película
            </button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.navbar-y-footer.app')

@section('title', 'Agregar Película — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
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

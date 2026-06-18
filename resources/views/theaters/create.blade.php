@extends('layouts.navbar-y-footer.app')

@section('title', 'Nueva Sala — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h1 class="form-title">
        <i class="fas fa-plus-circle" style="color: #e50914;"></i> Registrar Nueva Sala
    </h1>

    <form action="{{ route('theaters.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre de la Sala</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Ej: Sala 4 - IMAX 3D" value="{{ old('name') }}" required>
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="price">Precio de la Entrada ($)</label>
            <input type="number" id="price" name="price" class="form-control" placeholder="Ej: 2200" value="{{ old('price') }}" required>
            @error('price') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción / Características</label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Ej: Equipada con sonido envolvente y butacas retráctiles premium.">{{ old('description') }}</textarea>
            @error('description') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
            <a href="{{ route('theaters.index') }}" class="btn-cancel">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Guardar Sala
            </button>
        </div>
    </form>
</div>
@endsection

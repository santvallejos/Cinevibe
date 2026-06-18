@extends('layouts.navbar-y-footer.app')

@section('title', 'Editar Sala — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h1 class="form-title">
        <i class="fas fa-edit" style="color: #e50914;"></i> Editar Sala: {{ $theater->name }}
    </h1>

    <form action="{{ route('theaters.update', $theater) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre de la Sala</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $theater->name) }}" required>
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="price">Precio de la Entrada ($)</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price', (int)$theater->price) }}" required>
            @error('price') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción / Características</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $theater->description) }}</textarea>
            @error('description') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
            <a href="{{ route('theaters.index') }}" class="btn-cancel">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection

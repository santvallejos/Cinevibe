@extends('layouts.navbar-y-footer.app')

@section('title', 'Nuevo Usuario — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h1 class="form-title">
        <i class="fas fa-user-plus" style="color: #e50914;"></i> Nuevo Usuario
    </h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" name="name" id="name" class="form-input" value="{{ old('name') }}" required>
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-input" value="{{ old('email') }}" required>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-input" required>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="rol_id" class="form-label">Rol del Usuario</label>
            <select name="rol_id" id="rol_id" class="form-input" required>
                <option value="" disabled selected>Selecciona un rol</option>
                @foreach($roles as $r)
                    <option value="{{ $r->id }}" {{ old('rol_id') == $r->id ? 'selected' : '' }}>{{ $r->name }}</option>
                @endforeach
            </select>
            @error('rol_id')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.users.index') }}" class="btn-cancel">Cancelar</a>
            <button type="submit" class="btn-submit">Crear Usuario</button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.navbar-y-footer.app')

@section('title', 'Mi Perfil — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/cliente.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/profile.css') }}">
@endpush

@section('content')
<div class="profile-container">
    @if(session('success'))
        <div style="background: rgba(40, 167, 69, 0.15); border: 1px solid rgba(40, 167, 69, 0.3); color: #28a745; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <h1 class="profile-title">
        <i class="fas fa-user-edit" style="color: #e50914;"></i> Editar Perfil
    </h1>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre Completo</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.05); margin: 2rem 0;">

        <h3 style="color: white; font-size: 1.1rem; margin-bottom: 1rem; font-family: 'Manrope', sans-serif;">Cambiar Contraseña (Opcional)</h3>

        <div class="form-group">
            <label for="password">Nueva Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Dejar en blanco si no deseas cambiarla">
            @error('password') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Nueva Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Repite la nueva contraseña">
        </div>

        <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
            <a href="{{ route('cliente.dashboard') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <button type="submit" class="btn-save">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection

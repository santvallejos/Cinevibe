@extends('layouts.navbar-y-footer.app')

@section('title', 'Nuevo Usuario — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
    <style>
        .form-container {
            max-width: 600px;
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
            font-size: 1.8rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            color: #A0A0B0;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        .form-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            padding: 0.75rem 1rem;
            color: white;
            outline: none;
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        .form-input:focus {
            border-color: #e50914;
        }
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }
        .btn-submit {
            background: linear-gradient(135deg, #e50914 0%, #b80710 100%);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 6px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-submit:hover {
            opacity: 0.9;
        }
        .btn-cancel {
            background: rgba(255, 255, 255, 0.05);
            color: #A0A0B0;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.2s;
        }
        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .error-message {
            color: #e50914;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
    </style>
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

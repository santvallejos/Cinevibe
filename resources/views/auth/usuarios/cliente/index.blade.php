@extends('layouts.navbar-y-footer.app')

@section('title', 'Mi cuenta — CineVibe')

@push('styles')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/cliente.css') }}">
@endpush

@section('content')

{{-- ========== HERO BANNER ========== --}}
<div class="hero-banner">
    <h1>🎬 CineVibe</h1>
    <p>La mejor experiencia cinematográfica de la ciudad</p>
</div>

{{-- ========== PANEL CLIENTE ========== --}}
<div class="panel-container">

    {{-- Cabecera --}}
    <div class="panel-header">
        <h2 class="panel-title">Mi cuenta</h2>
        <span class="badge-rol badge-cliente">Cliente</span>
    </div>

    {{-- Perfil --}}
    <div class="perfil-card" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem;">
            <div class="perfil-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="perfil-info">
                <h2>{{ $usuario->name }}</h2>
                <p>{{ $usuario->email }}</p>
                <p>Cliente desde {{ $usuario->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
        <div>
            <a href="{{ route('profile.edit') }}" class="acceso-btn btn-outline" style="padding: 0.6rem 1.2rem; font-size: 0.9rem; border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; color: #A0A0B0; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.02); transition: all 0.2s; font-weight: bold;">
                <i class="fas fa-user-edit" style="color: #e50914;"></i> Editar Perfil
            </a>
        </div>
    </div>

    <hr class="perfil-divider">

    {{-- Acciones principales --}}
    <div class="acciones-grid">

        <div class="accion-card">
            <span class="accion-icon icon-entradas">🎟️</span>
            <h3>Mis entradas</h3>
            <p>Revisá las entradas que compraste</p>
            <a href="{{ route('purchase.history') }}" class="acceso-btn btn-dorado">
                <i class="fas fa-ticket"></i> Ver entradas
            </a>
        </div>

        <div class="accion-card">
            <span class="accion-icon icon-peliculas">🎬</span>
            <h3>Cartelera</h3>
            <p>Explorá nuestras películas en cartel</p>
            <a href="{{ route('movies.index') }}" class="acceso-btn btn-rojo">
                <i class="fas fa-film"></i> Ver películas
            </a>
        </div>

        <div class="accion-card">
            <span class="accion-icon icon-historial">📋</span>
            <h3>Historial</h3>
            <p>Tu historial completo de compras</p>
            <a href="{{ route('purchase.history') }}" class="acceso-btn btn-verde">
                <i class="fas fa-clock-rotate-left"></i> Ver historial
            </a>
        </div>

    </div>

</div>{{-- /.panel-container --}}

@endsection

@extends('layouts.navbar-y-footer.app')

@section('title', 'Funciones — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
@endpush

@section('content')

{{-- ========== HERO BANNER ========== --}}
<div class="hero-banner">
    <h1>🎬 CineVibe</h1>
    <p>La mejor experiencia cinematográfica de la ciudad</p>
</div>

<div class="panel-container">
    @if(session('success'))
        <div style="background: rgba(40, 167, 69, 0.15); border: 1px solid rgba(40, 167, 69, 0.3); color: #28a745; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="panel-header">
        <h2 class="panel-title">Gestión de Funciones</h2>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <a href="{{ route('showtimes.create') }}" class="btn-action">
                <i class="fas fa-plus"></i> Nueva Función
            </a>
            <span class="badge-rol badge-admin">Admin</span>
        </div>
    </div>

    {{-- Navegación Interna de Admin --}}
    <div class="nav-admin-tabs">
        <a href="{{ route('admin.dashboard') }}" class="nav-admin-tab"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="{{ route('admin.movies.index') }}" class="nav-admin-tab"><i class="fas fa-film"></i> Películas</a>
        <a href="{{ route('theaters.index') }}" class="nav-admin-tab"><i class="fas fa-door-open"></i> Salas</a>
        <a href="{{ route('showtimes.index') }}" class="nav-admin-tab active"><i class="fas fa-clapperboard"></i> Funciones</a>
        <a href="{{ route('admin.users.index') }}" class="nav-admin-tab"><i class="fas fa-users"></i> Usuarios</a>
        <a href="{{ route('admin.sales.index') }}" class="nav-admin-tab"><i class="fas fa-receipt"></i> Ventas</a>
        <a href="{{ route('admin.messages.index') }}" class="nav-admin-tab"><i class="fas fa-envelope"></i> Consultas</a>
    </div>

    <div class="table-card" style="margin-top: 0;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Película</th>
                    <th>Sala</th>
                    <th>Fecha y Hora</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($showtimes as $s)
                <tr>
                    <td class="td-num">{{ $s->id }}</td>
                    <td><strong style="color: white;">{{ $s->movie->name ?? '—' }}</strong></td>
                    <td>{{ $s->theater->name ?? '—' }}</td>
                    <td>{{ $s->datetime->format('d/m/Y H:i') }}</td>
                    <td style="text-align: right; white-space: nowrap; vertical-align: middle;">
                        <a href="{{ route('showtimes.edit', $s) }}" class="btn-edit-sm" style="margin-right: 0.5rem;">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('showtimes.destroy', $s) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta función?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-sm">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:2rem;color:#A0A0B0;">
                        No hay funciones registradas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

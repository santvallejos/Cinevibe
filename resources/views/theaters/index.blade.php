@extends('layouts.navbar-y-footer.app')

@section('title', 'Salas — CineVibe')

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
        <h2 class="panel-title">Gestión de Salas</h2>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <a href="{{ route('theaters.create') }}" class="btn-action">
                <i class="fas fa-plus"></i> Nueva Sala
            </a>
            <span class="badge-rol badge-admin">Admin</span>
        </div>
    </div>

    {{-- Navegación Interna de Admin --}}
    <div class="nav-admin-tabs">
        <a href="{{ route('admin.dashboard') }}" class="nav-admin-tab"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="{{ route('admin.movies.index') }}" class="nav-admin-tab"><i class="fas fa-film"></i> Películas</a>
        <a href="{{ route('theaters.index') }}" class="nav-admin-tab active"><i class="fas fa-door-open"></i> Salas</a>
        <a href="{{ route('showtimes.index') }}" class="nav-admin-tab"><i class="fas fa-clapperboard"></i> Funciones</a>
        <a href="{{ route('admin.users.index') }}" class="nav-admin-tab"><i class="fas fa-users"></i> Usuarios</a>
        <a href="{{ route('admin.sales.index') }}" class="nav-admin-tab"><i class="fas fa-receipt"></i> Ventas</a>
        <a href="{{ route('admin.messages.index') }}" class="nav-admin-tab"><i class="fas fa-envelope"></i> Consultas</a>
    </div>

    <div class="table-card" style="margin-top: 0;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre de Sala</th>
                    <th>Descripción</th>
                    <th>Precio de Entrada</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($theaters as $t)
                <tr>
                    <td class="td-num">{{ $t->id }}</td>
                    <td><strong style="color: white;">{{ $t->name }}</strong></td>
                    <td style="color: #A0A0B0; max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $t->description ?? '—' }}</td>
                    <td><span style="color: #ffc107; font-weight: bold;">${{ number_format($t->price, 0, ',', '.') }}</span></td>
                    <td style="text-align: right; white-space: nowrap; vertical-align: middle;">
                        <a href="{{ route('theaters.edit', $t) }}" class="btn-edit-sm" style="margin-right: 0.5rem;">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('theaters.destroy', $t) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta sala?')" style="display: inline;">
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
                        No hay salas registradas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

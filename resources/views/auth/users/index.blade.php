@extends('layouts.navbar-y-footer.app')

@section('title', 'Gestionar Usuarios — CineVibe')

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
    @if(session('error'))
        <div style="background: rgba(229, 9, 20, 0.15); border: 1px solid rgba(229, 9, 20, 0.3); color: #e50914; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <div class="panel-header">
        <h2 class="panel-title">Gestión de Usuarios</h2>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <a href="{{ route('admin.users.create') }}" class="btn-action">
                <i class="fas fa-plus"></i> Nuevo Usuario
            </a>
            <span class="badge-rol badge-admin">Admin</span>
        </div>
    </div>

    {{-- Navegación Interna de Admin --}}
    <div class="nav-admin-tabs">
        <a href="{{ route('admin.dashboard') }}" class="nav-admin-tab"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="{{ route('admin.movies.index') }}" class="nav-admin-tab"><i class="fas fa-film"></i> Películas</a>
        <a href="{{ route('theaters.index') }}" class="nav-admin-tab"><i class="fas fa-door-open"></i> Salas</a>
        <a href="{{ route('showtimes.index') }}" class="nav-admin-tab"><i class="fas fa-clapperboard"></i> Funciones</a>
        <a href="{{ route('admin.users.index') }}" class="nav-admin-tab active"><i class="fas fa-users"></i> Usuarios</a>
        <a href="{{ route('admin.sales.index') }}" class="nav-admin-tab"><i class="fas fa-receipt"></i> Ventas</a>
        <a href="{{ route('admin.messages.index') }}" class="nav-admin-tab"><i class="fas fa-envelope"></i> Consultas</a>
    </div>

    {{-- Filtros y Búsqueda --}}
    <form action="{{ route('admin.users.index') }}" method="GET" class="filter-form">
        <input type="text" name="search" placeholder="Buscar por nombre o email..." value="{{ request('search') }}" class="filter-input" style="flex-grow: 1; min-width: 200px;">
        
        <select name="role" class="filter-input">
            <option value="">Todos los Roles</option>
            @foreach($roles as $r)
                <option value="{{ $r->id }}" {{ request('role') == $r->id ? 'selected' : '' }}>{{ $r->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn-action" style="padding: 0.5rem 1.25rem;">
            <i class="fas fa-search"></i> Filtrar
        </button>
        @if(request()->anyFilled(['search', 'role']))
            <a href="{{ route('admin.users.index') }}" class="btn-action" style="background: rgba(255,255,255,0.1); color: white; border: none; padding: 0.5rem 1.25rem;">
                Limpiar
            </a>
        @endif
    </form>

    <div class="table-card" style="margin-top: 0;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha Registro</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $u)
                <tr>
                    <td class="td-num">{{ $u->id }}</td>
                    <td><strong style="color: white;">{{ $u->name }}</strong></td>
                    <td style="color: #A0A0B0;">{{ $u->email }}</td>
                    <td>
                        @if($u->rol_id == 1)
                            <span class="rol-badge rol-admin">Admin</span>
                        @else
                            <span class="rol-badge rol-cliente">Cliente</span>
                        @endif
                    </td>
                    <td style="color: #A0A0B0;">{{ $u->created_at->format('d/m/Y H:i') }}</td>
                    <td style="text-align: right; white-space: nowrap; vertical-align: middle;">
                        <a href="{{ route('admin.users.edit', $u) }}" class="btn-edit-sm" style="margin-right: 0.5rem;">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        @if($u->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar a este usuario?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete-sm">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:2rem;color:#A0A0B0;">
                        No se encontraron usuarios.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

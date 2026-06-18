@extends('layouts.navbar-y-footer.app')

@section('title', 'Gestionar Películas — CineVibe')

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
        <h2 class="panel-title">Gestión de Películas</h2>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <a href="{{ route('movies.create') }}" class="btn-action">
                <i class="fas fa-plus"></i> Nueva Película
            </a>
            <span class="badge-rol badge-admin">Admin</span>
        </div>
    </div>

    {{-- Navegación Interna de Admin --}}
    <div class="nav-admin-tabs">
        <a href="{{ route('admin.dashboard') }}" class="nav-admin-tab"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="{{ route('admin.movies.index') }}" class="nav-admin-tab active"><i class="fas fa-film"></i> Películas</a>
        <a href="{{ route('theaters.index') }}" class="nav-admin-tab"><i class="fas fa-door-open"></i> Salas</a>
        <a href="{{ route('showtimes.index') }}" class="nav-admin-tab"><i class="fas fa-clapperboard"></i> Funciones</a>
        <a href="{{ route('admin.users.index') }}" class="nav-admin-tab"><i class="fas fa-users"></i> Usuarios</a>
        <a href="{{ route('admin.sales.index') }}" class="nav-admin-tab"><i class="fas fa-receipt"></i> Ventas</a>
        <a href="{{ route('admin.messages.index') }}" class="nav-admin-tab"><i class="fas fa-envelope"></i> Consultas</a>
    </div>

    {{-- Filtros y Búsqueda --}}
    <form action="{{ route('admin.movies.index') }}" method="GET" class="filter-form">
        <input type="text" name="search" placeholder="Buscar por título..." value="{{ request('search') }}" class="filter-input" style="flex-grow: 1; min-width: 200px;">

        <select name="category" class="filter-input">
            <option value="">Todas las Categorías</option>
            <option value="Comedia" {{ request('category') == 'Comedia' ? 'selected' : '' }}>Comedia</option>
            <option value="Terror" {{ request('category') == 'Terror' ? 'selected' : '' }}>Terror</option>
            <option value="Thriller" {{ request('category') == 'Thriller' ? 'selected' : '' }}>Thriller</option>
            <option value="Aventuras" {{ request('category') == 'Aventuras' ? 'selected' : '' }}>Aventuras</option>
            <option value="Animación" {{ request('category') == 'Animación' ? 'selected' : '' }}>Animación</option>
        </select>

        <button type="submit" class="btn-action" style="padding: 0.5rem 1.25rem;">
            <i class="fas fa-search"></i> Filtrar
        </button>
        @if(request()->anyFilled(['search', 'category']))
            <a href="{{ route('admin.movies.index') }}" class="btn-action" style="background: rgba(255,255,255,0.1); color: white; border: none; padding: 0.5rem 1.25rem;">
                Limpiar
            </a>
        @endif
    </form>

    <div class="table-card" style="margin-top: 0;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Portada</th>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Duración</th>
                    <th>Estado</th>
                    <th>Estreno</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movies as $m)
                <tr>
                    <td class="td-num">{{ $m->id }}</td>
                    <td>
                        @if($m->image_url)
                            <img src="{{ $m->image_url }}" alt="{{ $m->name }}" class="movie-thumb" onerror="this.onerror=null; this.src='{{ asset('img/peliculas/default.jpg') }}';">
                        @else
                            <img src="{{ asset('img/peliculas/default.jpg') }}" alt="{{ $m->name }}" class="movie-thumb">
                        @endif
                    </td>
                    <td>
                        <strong style="color: white; display: block;">{{ $m->name }}</strong>
                    </td>
                    <td style="color: #A0A0B0;">{{ $m->category }}</td>
                    <td style="color: #A0A0B0;">{{ $m->duration }}</td>
                    <td>
                        @if(in_array(strtolower($m->state), ['próximamente', 'proximamente']))
                            <span class="state-badge state-proximo">Próximamente</span>
                        @else
                            <span class="state-badge state-estreno">{{ $m->state }}</span>
                        @endif
                    </td>
                    <td style="color: #A0A0B0;">{{ $m->datepremire ? $m->datepremire->format('d/m/Y') : '—' }}</td>
                    <td style="text-align: right; white-space: now<rap; vertical-align: middle;">
                        <a href="{{ route('movies.edit', $m) }}" class="btn-edit-sm" style="margin-right: 0.5rem;">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('movies.destroy', $m) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta película?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center;padding:2rem;color:#A0A0B0;">
                        No se encontraron películas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

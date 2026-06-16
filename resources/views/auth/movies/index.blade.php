@extends('layouts.navbar-y-footer.app')

@section('title', 'Gestionar Películas — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
    <style>
        .list-container {
            max-width: 1100px;
            margin: 3rem auto;
            padding: 1.5rem;
            background: rgba(30, 30, 40, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
        }
        .list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .list-title {
            color: #ffffff;
            font-family: 'Manrope', sans-serif;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-action {
            background: linear-gradient(135deg, #e50914 0%, #b80710 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }
        .btn-action:hover {
            opacity: 0.9;
            color: white;
        }
        .btn-edit {
            background: rgba(255, 193, 7, 0.15);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            transition: all 0.2s;
        }
        .btn-edit:hover {
            background: #ffc107;
            color: #1a1a1a;
        }
        .btn-delete {
            background: rgba(229, 9, 20, 0.15);
            color: #e50914;
            border: 1px solid rgba(229, 9, 20, 0.3);
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            transition: all 0.2s;
        }
        .btn-delete:hover {
            background: #e50914;
            color: white;
        }
        .filter-form {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            width: 100%;
            margin-bottom: 1.5rem;
        }
        .filter-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            padding: 0.5rem 1rem;
            color: white;
            outline: none;
            font-size: 0.9rem;
        }
        .filter-input:focus {
            border-color: #e50914;
        }
        .movie-thumb {
            width: 50px;
            height: 70px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .state-badge {
            padding: 0.25rem 0.6rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: bold;
        }
        .state-estreno {
            background: rgba(229, 9, 20, 0.15);
            color: #e50914;
            border: 1px solid rgba(229, 9, 20, 0.3);
        }
        .state-proximo {
            background: rgba(255, 193, 7, 0.15);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }
    </style>
@endpush

@section('content')
<div class="list-container">
    @if(session('success'))
        <div style="background: rgba(40, 167, 69, 0.15); border: 1px solid rgba(40, 167, 69, 0.3); color: #28a745; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="list-header">
        <h1 class="list-title">
            <i class="fas fa-film" style="color: #e50914;"></i> Gestión de Películas
        </h1>
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('admin.dashboard') }}" class="btn-action" style="background: rgba(255,255,255,0.05); color: #A0A0B0; border: 1px solid rgba(255,255,255,0.1);">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <a href="{{ route('movies.create') }}" class="btn-action">
                <i class="fas fa-plus"></i> Nueva Película
            </a>
        </div>
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
                    <td style="text-align: right; display: flex; justify-content: flex-end; gap: 0.5rem; align-items: center; height: 70px;">
                        <a href="{{ route('movies.edit', $m) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('movies.destroy', $m) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta película?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                <i class="fas fa-trash"></i> Eliminar
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

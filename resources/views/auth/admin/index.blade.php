@extends('layouts.navbar-y-footer.app')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin — CineVibe</title>

    {{-- Font Awesome para los íconos --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- CSS del panel admin --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
<body>




{{-- ========== HERO BANNER ========== --}}
<div class="hero-banner">
    <h1>🎬 CineVibe</h1>
    <p>La mejor experiencia cinematográfica de la ciudad</p>
</div>

{{-- ========== PANEL ADMIN ========== --}}
<div class="panel-container">

    {{-- Cabecera --}}
    <div class="panel-header">
        <h2 class="panel-title">Panel de Administración</h2>
        <span class="badge-rol badge-admin">Admin</span>
    </div>

    {{-- Estadísticas --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon usuarios">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <label>Usuarios registrados</label>
                <div class="stat-num">{{ $totalUsuarios }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon peliculas">
                <i class="fas fa-film"></i>
            </div>
            <div class="stat-info">
                <label>Películas</label>
              <div class="stat-num">{{ $totalPeliculas }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon funciones">
                <i class="fas fa-clapperboard"></i>
            </div>
            <div class="stat-info">
                <label>Funciones</label>
              <div class="stat-num">{{ $totalFunciones }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon entradas">
                <i class="fas fa-ticket"></i>
            </div>
            <div class="stat-info">
                <label>Entradas vendidas</label>
                <div class="stat-num">{{ $totalEntradas }}</div>
            </div>
        </div>
    </div>

    {{-- Tabla de usuarios --}}
    <div class="table-card">
        <div class="table-card-header">
            <i class="fas fa-users"></i>
            Usuarios registrados
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Registro</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $u)
                <tr>
                    <td class="td-num">{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                       @if($u->rol_id == 1)
                            <span class="rol-badge rol-admin">Admin</span>
                       @else
                            <span class="rol-badge rol-cliente">Cliente</span>
                       @endif
                    </td>
                    <td>{{ $u->created_at->format('d/m/Y') }}</td>
                    <td style="text-align: right; white-space: nowrap;">
                        <a href="{{ route('admin.users.edit', $u) }}" style="color: #ffc107; text-decoration: none; margin-right: 0.75rem;" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        @if($u->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #e50914; cursor: pointer; padding: 0;" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:1.5rem;color:#A0A0B0;">
                        No hay usuarios registrados.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Funciones próximas --}}
    <div class="table-card">
        <div class="table-card-header">
            <i class="fas fa-clapperboard"></i>
            Funciones próximas
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Película</th>
                    <th>Fecha</th>
                    <th>Horario</th>
                    <th>Sala</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($funcionesProximas as $f)
                <tr>
                    <td class="td-num">{{ $f->id }}</td>
                    <td>{{ $f->movie->name ?? '—' }}</td>
                    <td>{{ $f->datetime->format('d/m/Y') }}</td>
                    <td>{{ $f->datetime->format('H:i') }}</td>
                    <td>{{ $f->theater->name ?? '—' }}</td>
                    <td style="text-align: right; white-space: nowrap;">
                        <a href="{{ route('showtimes.edit', $f) }}" style="color: #ffc107; text-decoration: none; margin-right: 0.75rem;" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('showtimes.destroy', $f) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta función?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #e50914; cursor: pointer; padding: 0;" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:1.5rem;color:#A0A0B0;">
                        No hay funciones programadas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Accesos rápidos --}}
    <div class="table-card">
        <div class="table-card-header">
            <i class="fas fa-bolt"></i>
            Accesos rápidos
        </div>
        <div class="accesos-grid">
            <a href="{{ route('admin.movies.index') }}" class="acceso-btn btn-rojo">
                <i class="fas fa-film"></i> Películas
            </a>
            <a href="{{ route('movies.create') }}" class="acceso-btn btn-rojo">
                <i class="fas fa-plus"></i> Agregar película
            </a>
            <a href="{{ route('showtimes.index') }}" class="acceso-btn btn-dorado">
                <i class="fas fa-clapperboard"></i> Funciones
            </a>
            <a href="{{ route('showtimes.create') }}" class="acceso-btn btn-dorado">
                <i class="fas fa-plus"></i> Nueva función
            </a>
            <a href="{{ route('theaters.index') }}" class="acceso-btn btn-verde">
                <i class="fas fa-weekend"></i> Salas
            </a>
            <a href="{{ route('theaters.create') }}" class="acceso-btn btn-verde">
                <i class="fas fa-plus"></i> Nueva sala
            </a>
            <a href="{{ route('admin.users.index') }}" class="acceso-btn btn-outline" style="border-color: #3b82f6; color: #3b82f6;">
                <i class="fas fa-users"></i> Usuarios
            </a>
            <a href="{{ route('admin.users.create') }}" class="acceso-btn btn-outline" style="border-color: #3b82f6; color: #3b82f6;">
                <i class="fas fa-user-plus"></i> Agregar usuario
            </a>
            <a href="{{ url('/') }}" class="acceso-btn btn-outline" style="grid-column: span 2;">
                <i class="fas fa-house"></i> Ir al inicio
            </a>
        </div>
    </div>

</div><!-- /.panel-container -->

</body>
</html>
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
              <div class="stat-num">0</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon funciones">
                <i class="fas fa-clapperboard"></i>
            </div>
            <div class="stat-info">
                <label>Funciones</label>
              <div class="stat-num">0</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon entradas">
                <i class="fas fa-ticket"></i>
            </div>
            <div class="stat-info">
                <label>Entradas vendidas</label>
                <div class="stat-num">0</div>
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
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:1.5rem;color:#A0A0B0;">
                        No hay usuarios registrados.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Funciones próximas 
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
                </tr>
            </thead>
            <tbody>
                @forelse($funcionesProximas as $f)
                <tr>
                    <td class="td-num">{{ $f->id }}</td>
                    <td>{{ $f->pelicula->titulo ?? '—' }}</td>
                    <td>{{ \Carbon\Carbon::parse($f->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $f->horario }}</td>
                    <td>{{ $f->sala ?? '—' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:1.5rem;color:#A0A0B0;">
                        No hay funciones programadas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
--}}
    {{-- Accesos rápidos --}}
    <div class="table-card">
        <div class="table-card-header">
            <i class="fas fa-bolt"></i>
            Accesos rápidos
        </div>
        <div class="accesos-grid">
            <a href="{{ url('/admin/peliculas/create') }}" class="acceso-btn btn-rojo">
                <i class="fas fa-film"></i> Agregar película
            </a>
            <a href="{{ url('/admin/funciones/create') }}" class="acceso-btn btn-dorado">
                <i class="fas fa-clapperboard"></i> Nueva función
            </a>
            <a href="{{ url('/admin/entradas') }}" class="acceso-btn btn-verde">
                <i class="fas fa-ticket"></i> Ver entradas
            </a>
            <a href="{{ url('/') }}" class="acceso-btn btn-outline">
                <i class="fas fa-house"></i> Ir al inicio
            </a>
        </div>
    </div>

</div><!-- /.panel-container -->

</body>
</html>
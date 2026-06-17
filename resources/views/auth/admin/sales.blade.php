@extends('layouts.navbar-y-footer.app')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas — CineVibe</title>

    {{-- Font Awesome para los íconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    {{-- CSS del panel admin --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
    
    <style>
        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) auto;
            gap: 1rem;
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 1.25rem;
            margin-bottom: 2rem;
            align-items: end;
        }
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .filter-group label {
            font-size: 0.8rem;
            color: #A0A0B0;
            font-weight: 600;
            text-transform: uppercase;
        }
        .filter-control {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            outline: none;
            font-size: 0.9rem;
        }
        .filter-control:focus {
            border-color: #e50914;
        }
        .btn-filter-submit {
            background: #e50914;
            color: #fff;
            border: none;
            padding: 0.55rem 1.5rem;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-filter-submit:hover {
            background: #b80710;
        }
        .btn-filter-reset {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            padding: 0.55rem 1.25rem;
            border-radius: 8px;
            font-size: 0.9rem;
            text-align: center;
            transition: background 0.2s;
        }
        .btn-filter-reset:hover {
            background: rgba(255, 255, 255, 0.15);
        }
        .sales-table-container {
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            overflow-x: auto;
        }
        .sales-table {
            width: 100%;
            border-collapse: collapse;
            color: #f8fafc;
            text-align: left;
            font-size: 0.95rem;
        }
        .sales-table th {
            background: rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 1rem;
            font-weight: 700;
            color: #A0A0B0;
        }
        .sales-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            vertical-align: middle;
        }
        .sales-table tr:hover {
            background: rgba(255, 255, 255, 0.01);
        }
        .ticket-list-inline {
            display: flex;
            flex-wrap: wrap;
            gap: 0.35rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .ticket-badge-inline {
            background: rgba(229, 9, 20, 0.1);
            border: 1px solid rgba(229, 9, 20, 0.3);
            color: #ffb4aa;
            padding: 0.15rem 0.45rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 700;
        }
        .revenue-stat {
            background: linear-gradient(135deg, rgba(229, 9, 20, 0.1) 0%, rgba(0, 0, 0, 0) 100%);
            border-left: 4px solid #e50914 !important;
        }
        .nav-admin-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 0.5rem;
        }
        .nav-admin-tab {
            color: #A0A0B0;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .nav-admin-tab:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.05);
        }
        .nav-admin-tab.active {
            color: #fff;
            background: rgba(229, 9, 20, 0.15);
            border: 1px solid rgba(229, 9, 20, 0.3);
        }
    </style>
</head>
<body>

<div class="hero-banner">
    <h1>🎬 CineVibe</h1>
    <p>La mejor experiencia cinematográfica de la ciudad</p>
</div>

<div class="panel-container">
    <div class="panel-header">
        <h2 class="panel-title">Reporte de Ventas del Cine</h2>
        <span class="badge-rol badge-admin">Admin</span>
    </div>

    {{-- Navegación Interna de Admin --}}
    <div class="nav-admin-tabs">
        <a href="{{ route('admin.dashboard') }}" class="nav-admin-tab"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="{{ route('admin.movies.index') }}" class="nav-admin-tab"><i class="fas fa-film"></i> Películas</a>
        <a href="{{ route('theaters.index') }}" class="nav-admin-tab"><i class="fas fa-door-open"></i> Salas</a>
        <a href="{{ route('showtimes.index') }}" class="nav-admin-tab"><i class="fas fa-clapperboard"></i> Funciones</a>
        <a href="{{ route('admin.users.index') }}" class="nav-admin-tab"><i class="fas fa-users"></i> Usuarios</a>
        <a href="{{ route('admin.sales.index') }}" class="nav-admin-tab active"><i class="fas fa-receipt"></i> Ventas</a>
        <a href="{{ route('admin.messages.index') }}" class="nav-admin-tab"><i class="fas fa-envelope"></i> Consultas</a>
    </div>

    {{-- Tarjeta de Ingresos --}}
    <div class="stats-grid" style="margin-bottom: 2rem; grid-template-columns: 1fr;">
        <div class="stat-card revenue-stat">
            <div class="stat-icon peliculas" style="background: rgba(229, 9, 20, 0.15); color: #e50914;">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-info">
                <label>Recaudación Total (Bajo Filtros)</label>
                <div class="stat-num" style="color: #ffb4aa;">${{ number_format($totalRevenue, 0, ',', '.') }}</div>
            </div>
        </div>
    </div>

    {{-- Formulario de Filtros --}}
    <form action="{{ route('admin.sales.index') }}" method="GET" class="filter-form">
        <div class="filter-group">
            <label for="movie_id">Película</label>
            <select name="movie_id" id="movie_id" class="filter-control">
                <option value="">Todas las películas</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}" {{ request('movie_id') == $movie->id ? 'selected' : '' }}>
                        {{ $movie->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-group">
            <label for="theater_id">Sala</label>
            <select name="theater_id" id="theater_id" class="filter-control">
                <option value="">Todas las salas</option>
                @foreach($theaters as $theater)
                    <option value="{{ $theater->id }}" {{ request('theater_id') == $theater->id ? 'selected' : '' }}>
                        {{ $theater->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-group">
            <label for="date">Fecha de Compra</label>
            <input type="date" name="date" id="date" class="filter-control" value="{{ request('date') }}">
        </div>

        <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
            <a href="{{ route('admin.sales.index') }}" class="btn-filter-reset">Limpiar</a>
            <button type="submit" class="btn-filter-submit">Filtrar</button>
        </div>
    </form>

    {{-- Tabla de Resultados --}}
    <div class="sales-table-container">
        @if($sales->isEmpty())
            <div style="text-align: center; padding: 3rem; color: #A0A0B0;">
                <i class="fas fa-receipt" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                <p>No se encontraron registros de ventas con los criterios seleccionados.</p>
            </div>
        @else
            <table class="sales-table">
                <thead>
                    <tr>
                        <th>Código Compra</th>
                        <th>Fecha y Hora</th>
                        <th>Cliente</th>
                        <th>Detalle de Tickets</th>
                        <th style="text-align: right;">Total Pagado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>
                                <span style="font-family: monospace; font-weight: bold; color: #ffb4aa;">
                                    #{{ substr($sale->id, 0, 8) }}
                                </span>
                            </td>
                            <td>
                                {{ $sale->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                <div><strong>{{ $sale->user->name }}</strong></div>
                                <span style="font-size: 0.8rem; color: #A0A0B0;">{{ $sale->user->email }}</span>
                            </td>
                            <td>
                                @php
                                    $tickets = collect();
                                    foreach($sale->retailSales as $retail) {
                                        $tickets = $tickets->merge($retail->tickets);
                                    }
                                @endphp
                                @if($tickets->isNotEmpty())
                                    <div style="margin-bottom: 0.35rem;">
                                        <strong>{{ $tickets->first()->movie }}</strong> 
                                        <span style="font-size: 0.8rem; color: #A0A0B0;">
                                            ({{ $tickets->first()->theater->name }})
                                        </span>
                                    </div>
                                    <ul class="ticket-list-inline">
                                        @foreach($tickets as $ticket)
                                            <li class="ticket-badge-inline">
                                                {{ $ticket->amchair }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span style="color: #737373; font-style: italic;">Sin boletos</span>
                                @endif
                            </td>
                            <td style="text-align: right; font-weight: bold; color: #fff; font-size: 1.05rem;">
                                ${{ number_format($sale->total, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

</body>
</html>

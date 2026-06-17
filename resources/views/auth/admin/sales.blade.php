@extends('layouts.navbar-y-footer.app')

@section('title', 'Reporte de Ventas — CineVibe')

@push('styles')
    {{-- Font Awesome para los íconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    {{-- CSS del panel admin --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
@endpush

@section('content')

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
    <form action="{{ route('admin.sales.index') }}" method="GET" class="filter-form-grid">
        <div class="filter-group-vertical">
            <label for="movie_id">Película</label>
            <select name="movie_id" id="movie_id" class="filter-control-custom">
                <option value="">Todas las películas</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}" {{ request('movie_id') == $movie->id ? 'selected' : '' }}>
                        {{ $movie->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-group-vertical">
            <label for="theater_id">Sala</label>
            <select name="theater_id" id="theater_id" class="filter-control-custom">
                <option value="">Todas las salas</option>
                @foreach($theaters as $theater)
                    <option value="{{ $theater->id }}" {{ request('theater_id') == $theater->id ? 'selected' : '' }}>
                        {{ $theater->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-group-vertical">
            <label for="date">Fecha de Compra</label>
            <input type="date" name="date" id="date" class="filter-control-custom" value="{{ request('date') }}">
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
@endsection

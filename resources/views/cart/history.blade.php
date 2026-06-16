@extends('layouts.navbar-y-footer.app')

@section('title', 'Historial de Compras — CineVibe')

@push('styles')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Ajuste de contenedor con margen superior para despejar el navbar fijo */
        .history-container {
            max-width: 1000px;
            margin: 100px auto 3rem;
            padding: 0 1.5rem;
        }
        .history-title {
            color: #ffffff;
            font-size: 2.2rem;
            font-family: 'Manrope', sans-serif;
            font-weight: 800;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            letter-spacing: -0.5px;
        }
        /* Tarjetas con estilo glassmorphism premium */
        .history-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 1.75rem;
            margin-bottom: 1.75rem;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }
        .history-card:hover {
            transform: translateY(-3px);
            border-color: rgba(229, 9, 20, 0.35);
            box-shadow: 0 12px 40px rgba(229, 9, 20, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }
        .history-card__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 1rem;
            margin-bottom: 1.25rem;
        }
        .history-card__date {
            color: #A0A0B0;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        /* Código de compra estilizado tipo badge premium */
        .history-card__code {
            font-family: 'DM Sans', 'Inter', monospace;
            background: linear-gradient(135deg, rgba(229, 9, 20, 0.15) 0%, rgba(184, 7, 16, 0.25) 100%);
            border: 1px solid rgba(229, 9, 20, 0.35);
            color: #ffb4aa;
            padding: 0.35rem 0.85rem;
            border-radius: 30px;
            font-weight: 800;
            font-size: 0.8rem;
            letter-spacing: 1.2px;
            text-shadow: 0 0 10px rgba(229, 9, 20, 0.3);
        }
        .history-card__body {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
        }
        .history-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }
        .history-item__label {
            font-size: 0.72rem;
            color: #737373;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }
        .history-item__label i {
            font-size: 0.8rem;
            opacity: 0.7;
        }
        .history-item__val {
            color: #f8fafc;
            font-size: 1.1rem;
            font-weight: 600;
        }
        /* Botones interactivos de butacas en formato ticket individual */
        .history-ticket-badge {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #f8fafc;
            padding: 0.45rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            transition: all 0.2s ease;
            border-left: 3px solid #e50914;
            font-weight: 600;
            cursor: pointer;
        }
        .history-ticket-badge:hover {
            background: rgba(229, 9, 20, 0.15);
            border-color: rgba(229, 9, 20, 0.35);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(229, 9, 20, 0.2);
        }
        .history-card__footer {
            margin-top: 1.25rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .history-card__total {
            font-size: 1.25rem;
            color: #F0C96A;
            font-weight: 800;
            text-shadow: 0 0 15px rgba(240, 201, 106, 0.25);
        }
        .btn-volver {
            background: linear-gradient(135deg, #e50914 0%, #b80710 100%);
            color: white;
            padding: 0.65rem 1.5rem;
            border-radius: 30px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: bold;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(229, 9, 20, 0.3);
        }
        .btn-volver:hover {
            opacity: 0.95;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(229, 9, 20, 0.4);
        }
        /* Contenedor de historial vacío */
        .empty-history {
            text-align: center;
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(16px);
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            max-width: 600px;
            margin: 3rem auto;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        .empty-history i {
            font-size: 3.5rem;
            color: #737373;
            margin-bottom: 1.5rem;
            display: block;
            animation: float 4s ease-in-out infinite;
        }
        .empty-history h3 {
            color: white;
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }
        .empty-history p {
            color: #A0A0B0;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }
    </style>
@endpush

@section('content')
<div class="history-container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 1rem;">
        <h1 class="history-title">
            <i class="fas fa-clock-rotate-left" style="color: #e50914;"></i> Historial de Compras
        </h1>
        <a href="{{ route('cliente.dashboard') }}" class="btn-volver">
            <i class="fas fa-arrow-left"></i> Volver a mi cuenta
        </a>
    </div>

    @forelse($sales as $sale)
        @php
            $redeemCode = strtoupper('CV-' . str_pad($sale->id, 4, '0', STR_PAD_LEFT) . '-' . substr(md5($sale->id . $sale->created_at), 0, 6));
        @endphp
        <div class="history-card">
            <div class="history-card__header">
                <span class="history-card__date">
                    <i class="far fa-calendar-check" style="color: #e50914;"></i> Compra realizada el {{ $sale->created_at->format('d/m/Y H:i') }}
                </span>
                <span class="history-card__code" title="Código de canje en boletería">
                    {{ $redeemCode }}
                </span>
            </div>
            <div class="history-card__body" style="display: flex; flex-direction: column; gap: 1.5rem;">
                @foreach($sale->retailSales as $retailSale)
                    @php
                        $firstTicket = $retailSale->tickets->first();
                        $movieName = $firstTicket ? ($firstTicket->showtime->movie->name ?? $firstTicket->movie) : 'N/A';
                        $theaterName = $firstTicket ? ($firstTicket->theater->name ?? 'N/A') : 'N/A';
                        $dateTime = $firstTicket && $firstTicket->showtime ? $firstTicket->showtime->datetime : null;
                    @endphp
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 1.25rem; margin-bottom: 0.25rem;">
                        <div class="history-item">
                            <span class="history-item__label"><i class="fas fa-film"></i> Película</span>
                            <span class="history-item__val" style="font-weight: 700; color: #ffffff;">{{ $movieName }}</span>
                        </div>
                        <div class="history-item">
                            <span class="history-item__label"><i class="fas fa-video"></i> Sala</span>
                            <span class="history-item__val">{{ $theaterName }}</span>
                        </div>
                        <div class="history-item">
                            <span class="history-item__label"><i class="far fa-clock"></i> Fecha y Hora</span>
                            <span class="history-item__val">
                                {{ $dateTime ? $dateTime->format('d/m/Y H:i') : 'N/A' }}
                            </span>
                        </div>
                        <div class="history-item" style="grid-column: span 2;">
                            <span class="history-item__label"><i class="fas fa-ticket-alt"></i> Mis Entradas / Asientos ({{ $retailSale->cant }})</span>
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: 0.5rem;">
                                @if($retailSale->tickets && $retailSale->tickets->count() > 0)
                                    @foreach($retailSale->tickets->sortBy('amchair') as $t)
                                        <a href="{{ route('tickets.show', $t) }}" class="history-ticket-badge" title="Ver entrada digital para butaca {{ $t->amchair }}">
                                            <i class="fas fa-ticket-alt" style="color: #e50914; font-size: 0.75rem;"></i>
                                            Butaca {{ $t->amchair }}
                                        </a>
                                    @endforeach
                                @else
                                    <span class="history-item__val">N/A</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="history-card__footer">
                <span style="color: #A0A0B0; font-size: 0.95rem;">Estado: <strong style="color: #28a745; font-weight: 700;">Confirmada</strong></span>
                <span class="history-card__total">Total: ${{ number_format($sale->total, 0, ',', '.') }}</span>
            </div>
        </div>
    @empty
        <div class="empty-history">
            <i class="fas fa-ticket-alt"></i>
            <h3>No tienes compras registradas</h3>
            <p>¡Explora nuestra cartelera y compra tus entradas hoy mismo!</p>
            <a href="{{ route('movies.index') }}" class="btn-volver" style="border-radius: 30px;">
                <i class="fas fa-film"></i> Ver cartelera
            </a>
        </div>
    @endforelse
</div>
@endsection

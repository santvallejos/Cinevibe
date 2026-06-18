@extends('layouts.navbar-y-footer.app')

@section('title', 'Boleto Digital — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/cart-ticket.css') }}">
@endpush

@section('content')
<div class="ticket-page">
    <div class="ticket-wrapper">
        <div class="ticket-header">
            <h2><i class="fas fa-ticket-alt"></i> CineVibe Entrada</h2>
        </div>
        <div class="ticket-body">
            <h3 class="ticket-movie-title">{{ $ticket->showtime->movie->name ?? $ticket->movie }}</h3>
            
            <div class="ticket-grid">
                <div class="ticket-info-item">
                    <span class="ticket-label"><i class="fas fa-video" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Sala</span>
                    <span class="ticket-val">{{ $ticket->theater->name ?? 'Sala' }}</span>
                </div>
                <div class="ticket-info-item">
                    <span class="ticket-label"><i class="fas fa-couch" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Butaca</span>
                    <span class="ticket-val">Butaca {{ $ticket->amchair }}</span>
                </div>
                <div class="ticket-info-item">
                    <span class="ticket-label"><i class="far fa-calendar-alt" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Fecha</span>
                    <span class="ticket-val">{{ $ticket->showtime ? $ticket->showtime->datetime->format('d/m/Y') : '—' }}</span>
                </div>
                <div class="ticket-info-item">
                    <span class="ticket-label"><i class="far fa-clock" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Hora</span>
                    <span class="ticket-val">{{ $ticket->showtime ? $ticket->showtime->datetime->format('H:i') : '—' }}</span>
                </div>
            </div>

            <div class="ticket-divider">
                <div class="ticket-divider-line"></div>
            </div>

            <div class="ticket-qr-section">
                <div class="ticket-qr-container">
                    <div class="ticket-qr-scan-line"></div>
                    <img class="ticket-qr-img" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(route('tickets.show', $ticket)) }}" alt="Código QR Entrada">
                </div>
                <span class="ticket-label">ID de Entrada</span>
                <span class="ticket-code">{{ strtoupper(substr($ticket->id, 0, 8)) }}</span>
            </div>
        </div>
    </div>

    <div class="ticket-actions">
        <a href="{{ route('purchase.history') }}" class="btn-ticket btn-ticket-secondary">
            <i class="fas fa-arrow-left"></i> Volver al historial
        </a>
        <button onclick="window.print()" class="btn-ticket">
            <i class="fas fa-print"></i> Imprimir Boleto
        </button>
    </div>
</div>
@endsection

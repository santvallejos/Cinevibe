@extends('layouts.navbar-y-footer.app')

@section('title', 'Comprobante de Compra — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/cart-ticket.css') }}">
@endpush

@section('content')
<div class="ticket-page" style="max-width: 550px;">
    <div class="ticket-wrapper">
        <div class="ticket-header">
            <h2><i class="fas fa-file-invoice"></i> Comprobante de Compra</h2>
        </div>
        <div class="ticket-body" style="text-align: left; padding: 2rem 1.75rem;">
            <h3 style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: #ffb4aa; margin-top: 0; margin-bottom: 1.5rem; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px;">Detalle de las Entradas</h3>

            @foreach($sale->retailSales as $retailSale)
                @php
                    $firstTicket = $retailSale->tickets->first();
                    $movieName = $firstTicket ? ($firstTicket->showtime->movie->name ?? $firstTicket->movie) : 'N/A';
                    $theaterName = $firstTicket ? ($firstTicket->theater->name ?? 'N/A') : 'N/A';
                    $dateTime = $firstTicket && $firstTicket->showtime ? $firstTicket->showtime->datetime : null;
                    $seats = $retailSale->tickets->pluck('amchair')->sort()->implode(', ');
                @endphp

                <div style="margin-bottom: 1.5rem; border-bottom: 1px dashed rgba(255, 255, 255, 0.1); padding-bottom: 1.25rem;">
                    <h4 class="ticket-movie-title" style="margin-bottom: 0.75rem; font-size: 1.4rem; color: #fff; line-height: 1.25;">
                        {{ $movieName }}
                    </h4>
                    
                    <div class="ticket-grid" style="margin-bottom: 0; gap: 1rem 1.25rem;">
                        <div class="ticket-info-item">
                            <span class="ticket-label"><i class="fas fa-video" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Sala</span>
                            <span class="ticket-val" style="font-size: 1rem;">{{ $theaterName }}</span>
                        </div>
                        <div class="ticket-info-item">
                            <span class="ticket-label"><i class="fas fa-couch" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Butacas ({{ $retailSale->cant }})</span>
                            <span class="ticket-val" style="color: #F0C96A; font-size: 1rem;">{{ $seats ?: 'N/A' }}</span>
                        </div>
                        <div class="ticket-info-item">
                            <span class="ticket-label"><i class="far fa-calendar-alt" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Fecha</span>
                            <span class="ticket-val" style="font-size: 1rem;">{{ $dateTime ? $dateTime->format('d/m/Y') : '—' }}</span>
                        </div>
                        <div class="ticket-info-item">
                            <span class="ticket-label"><i class="far fa-clock" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Hora</span>
                            <span class="ticket-val" style="font-size: 1rem;">{{ $dateTime ? $dateTime->format('H:i') : '—' }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="ticket-divider" style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
                <div class="ticket-divider-line"></div>
            </div>

            <div class="ticket-qr-section" style="margin-top: 1rem;">
                <div class="ticket-qr-container">
                    <div class="ticket-qr-scan-line"></div>
                    <img class="ticket-qr-img" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(route('purchases.show', $sale)) }}" alt="Código QR Comprobante">
                </div>
                <span class="ticket-label">Código de Canje</span>
                <span class="ticket-code" style="font-size: 1.2rem; color: #ffb4aa; font-weight: 800; display: block; margin-bottom: 0.5rem; font-family: monospace;">
                    {{ $redeemCode }}
                </span>
                <span class="ticket-label" style="font-size: 0.85rem;">Total Pagado: <strong style="color: #28a745; font-size: 1.1rem; font-weight: 700;">${{ number_format($sale->total, 0, ',', '.') }}</strong></span>
            </div>
        </div>
    </div>

    <div class="ticket-actions">
        <a href="{{ route('purchase.history') }}" class="btn-ticket btn-ticket-secondary">
            <i class="fas fa-arrow-left"></i> Volver al historial
        </a>
        <button onclick="window.print()" class="btn-ticket">
            <i class="fas fa-print"></i> Imprimir Comprobante
        </button>
    </div>
</div>
@endsection

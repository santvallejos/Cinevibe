@extends('layouts.navbar-y-footer.app')

@section('title', 'Historial de Compras — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/cart-history.css') }}">
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
                            <span class="history-item__label"><i class="fas fa-ticket-alt"></i> Asientos ({{ $retailSale->cant }})</span>
                            <span class="history-item__val" style="margin-top: 0.25rem; display: block; font-weight: 500; color: #ffffff;">
                                @if($retailSale->tickets && $retailSale->tickets->count() > 0)
                                    {{ $retailSale->tickets->sortBy('amchair')->pluck('amchair')->implode(', ') }}
                                @else
                                    N/A
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="history-card__footer" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <span style="color: #A0A0B0; font-size: 0.95rem;">Estado: <strong style="color: #28a745; font-weight: 700;">Confirmada</strong></span>
                <div style="display: flex; align-items: center; gap: 1.5rem;">
                    <span class="history-card__total">Total: ${{ number_format($sale->total, 0, ',', '.') }}</span>
                    <a href="{{ route('purchases.show', $sale) }}" class="btn-volver" style="padding: 0.5rem 1.25rem; font-size: 0.85rem; border-radius: 8px;">
                        <i class="fas fa-file-invoice"></i> Ver Comprobante
                    </a>
                </div>
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

@extends('layouts.sin-navbar.app')

@section('title', 'Compra Exitosa — Cinevibe')

@push('styles')
    <link href="{{ asset('vendor/bootstrap/css/pages/cart-success.css') }}" rel="stylesheet">
@endpush

@section('content')
    {{-- Vista de confirmación exitosa con resumen de compra y código de canje --}}
    <main class="success-page">

        {{-- Contenedor central animado --}}
        <div class="success-container">

            {{-- Ícono de éxito con animación --}}
            <div class="success-icon-wrap">
                <div class="success-icon">
                    <span class="material-symbols-outlined">check_circle</span>
                </div>
                <div class="success-icon__glow"></div>
            </div>

            {{-- Mensaje principal --}}
            <h1 class="success-title">¡Compra Exitosa!</h1>
            <p class="success-subtitle">
                Tus entradas han sido reservadas. Presentá el código de canje en la boletería del cine.
            </p>

            {{-- Código de canje prominente --}}
            @php
                // Genera código de canje único basado en ID de la venta
                $redeemCode = strtoupper('CV-' . str_pad($sale->id, 4, '0', STR_PAD_LEFT) . '-' . substr(md5($sale->id . $sale->created_at), 0, 6));
            @endphp
            <div class="redeem-code-card">
                <p class="redeem-code-card__label">Código de Canje</p>
                <p class="redeem-code-card__code" id="redeemCode">{{ $redeemCode }}</p>
                <button class="redeem-code-card__copy" id="copyCodeBtn" type="button" title="Copiar código">
                    <span class="material-symbols-outlined">content_copy</span>
                    <span class="redeem-code-card__copy-text">Copiar</span>
                </button>
            </div>

            {{-- Tarjeta resumen de la compra --}}
            <div class="success-summary">
                <h3 class="success-summary__heading">Detalles de tu Compra</h3>

                <div class="success-summary__grid">
                    {{-- Película --}}
                    <div class="success-summary__item">
                        <span class="material-symbols-outlined success-summary__icon">movie</span>
                        <div>
                            <p class="success-summary__label">Película</p>
                            <p class="success-summary__val">
                                {{ $sale->retailSale->ticket->showtime->movie->name ?? 'N/A' }}
                            </p>
                        </div>
                    </div>

                    {{-- Sala --}}
                    <div class="success-summary__item">
                        <span class="material-symbols-outlined success-summary__icon">weekend</span>
                        <div>
                            <p class="success-summary__label">Sala</p>
                            <p class="success-summary__val">
                                {{ $sale->retailSale->ticket->theater->name ?? 'N/A' }}
                            </p>
                        </div>
                    </div>

                    {{-- Fecha y hora --}}
                    <div class="success-summary__item">
                        <span class="material-symbols-outlined success-summary__icon">calendar_today</span>
                        <div>
                            <p class="success-summary__label">Fecha y Hora</p>
                            <p class="success-summary__val">
                                @if($sale->retailSale->ticket->showtime)
                                    {{ $sale->retailSale->ticket->showtime->datetime->format('d/m/Y') }}
                                    a las {{ $sale->retailSale->ticket->showtime->datetime->format('H:i') }}
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Asientos --}}
                    <div class="success-summary__item">
                        <span class="material-symbols-outlined success-summary__icon">event_seat</span>
                        <div>
                            <p class="success-summary__label">Asientos ({{ $sale->retailSale->cant }})</p>
                            <p class="success-summary__val">
                                @if($sale->retailSale->tickets && $sale->retailSale->tickets->count() > 0)
                                    {{ $sale->retailSale->tickets->pluck('amchair')->sort()->implode(', ') }}
                                @else
                                    {{ $sale->retailSale->ticket->amchair ?? 'N/A' }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Línea de total --}}
                <div class="success-summary__total">
                    <span class="success-summary__total-label">Total Pagado</span>
                    <span class="success-summary__total-val">
                        ${{ number_format($sale->total, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            {{-- Acciones finales --}}
            <div class="success-actions">
                <a href="{{ route('movies.index') }}" class="success-actions__btn success-actions__btn--primary">
                    <span class="material-symbols-outlined">local_activity</span>
                    Volver a la Cartelera
                </a>
                <a href="{{ route('index') }}" class="success-actions__btn success-actions__btn--ghost">
                    <span class="material-symbols-outlined">home</span>
                    Ir al Inicio
                </a>
            </div>

        </div>
    </main>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        /**
         * Funcionalidad de copiar código de canje al portapapeles.
         */
        const copyBtn = document.getElementById('copyCodeBtn');
        const codeEl  = document.getElementById('redeemCode');

        if (copyBtn && codeEl) {
            copyBtn.addEventListener('click', function () {
                // Copia el texto del código al portapapeles
                navigator.clipboard.writeText(codeEl.textContent.trim()).then(function () {
                    // Feedback visual de copiado exitoso
                    const textEl = copyBtn.querySelector('.redeem-code-card__copy-text');
                    const originalText = textEl.textContent;
                    textEl.textContent = '¡Copiado!';
                    copyBtn.classList.add('redeem-code-card__copy--copied');

                    setTimeout(function () {
                        textEl.textContent = originalText;
                        copyBtn.classList.remove('redeem-code-card__copy--copied');
                    }, 2000);
                });
            });
        }
    });
    </script>
    @endpush
@endsection

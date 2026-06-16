@extends('layouts.sin-navbar.app')

@section('title', 'Confirmación y Pago — Cinevibe')

@push('styles')
    <link href="{{ asset('vendor/bootstrap/css/pages/cart-pay.css') }}" rel="stylesheet">
@endpush

@section('content')
    {{-- Main pago: grid 5/7 (summary + form) con orden invertido en mobile --}}
    <main class="pay">
        <div class="pay__grid">

            {{-- Summary (izquierda desktop, abajo mobile) --}}
            <section class="pay__summary">
                <div>
                    <h2 class="pay__heading">Resumen del Pedido</h2>

                    {{-- Tarjeta con poster + datos dinámicos de la función --}}
                    @foreach($items as $item)
                        <div class="summary-card" style="margin-bottom: var(--sp-4);">
                            {{-- Header con imagen + badge + título --}}
                            <div class="summary-card__media" style="height: 120px;">
                                <img alt="{{ $item['showtime']->movie->name }}" class="summary-card__img"
                                    src="{{ $item['showtime']->movie->image_url ? asset($item['showtime']->movie->image_url) : asset('img/peliculas/default.jpg') }}"
                                    onerror="this.onerror=null; this.src='{{ asset('img/peliculas/default.jpg') }}';">
                                <div class="summary-card__overlay"></div>
                                <div class="summary-card__meta" style="padding: var(--sp-3);">
                                    <span class="summary-card__badge" style="font-size: var(--fs-10);">{{ $item['showtime']->movie->category }}</span>
                                    <h3 class="summary-card__title" style="font-size: var(--fs-base);">{{ strtoupper($item['showtime']->movie->name) }}</h3>
                                </div>
                            </div>

                            {{-- Body: grid de datos + precios --}}
                            <div class="summary-card__body" style="padding: var(--sp-4);">
                                <div class="summary-card__grid" style="grid-template-columns: repeat(2, 1fr); gap: var(--sp-2); margin-bottom: var(--sp-3);">
                                    <div>
                                        <p class="summary-card__label" style="font-size: var(--fs-10);">Sala</p>
                                        <p class="summary-card__val" style="font-size: var(--fs-xs);">{{ $item['showtime']->theater->name }}</p>
                                    </div>
                                    <div>
                                        <p class="summary-card__label" style="font-size: var(--fs-10);">Fecha y Hora</p>
                                        <p class="summary-card__val" style="font-size: var(--fs-xs);">
                                            {{ $item['showtime']->datetime->format('d/m/Y') }} • {{ $item['showtime']->datetime->format('H:i') }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="summary-card__label" style="font-size: var(--fs-10);">Asientos</p>
                                        <p class="summary-card__val" style="font-size: var(--fs-xs);">{{ implode(', ', $item['amchairs']) }}</p>
                                    </div>
                                    <div>
                                        <p class="summary-card__label" style="font-size: var(--fs-10);">Subtotal</p>
                                        <p class="summary-card__val" style="font-size: var(--fs-xs); font-weight: var(--fw-bold); color: var(--color-secondary-container);">
                                            ${{ number_format($item['subtotal'], 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- Tarjeta de resumen general consolidado --}}
                    <div class="summary-card" style="margin-top: var(--sp-4);">
                        <div class="summary-card__body" style="padding: var(--sp-4);">
                            <div class="summary-card__prices">
                                <div class="summary-card__row">
                                    <span class="summary-card__row-label">Subtotal General</span>
                                    <span class="summary-card__row-val">${{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                                <div class="summary-card__row summary-card__row--total">
                                    <span class="summary-card__row-label">Total a Pagar</span>
                                    <span class="summary-card__row-val" style="color: var(--color-secondary-container); font-size: var(--fs-xl);">${{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Trust badges --}}
                    <div class="trust-badges">
                        <div class="trust-badges__item">
                            <span class="material-symbols-outlined trust-badges__icon">verified_user</span>
                            <span class="trust-badges__label">Seguridad SSL</span>
                        </div>
                        <div class="trust-badges__item">
                            <span class="material-symbols-outlined trust-badges__icon">payment_card</span>
                            <span class="trust-badges__label">Cumple PCI</span>
                        </div>
                        <div class="trust-badges__item">
                            <span class="material-symbols-outlined trust-badges__icon">encrypted</span>
                            <span class="trust-badges__label">AES-256</span>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Formulario de pago (derecha desktop, arriba mobile) --}}
            <section class="pay__form">
                <h2 class="pay__heading">Datos de Pago</h2>

                {{-- Formulario que envía POST a purchase.confirm --}}
                <form id="payForm" action="{{ route('cart.confirm') }}" method="POST">
                    @csrf

                    <div class="pay__form-wrap">

                        {{-- Selección método de pago --}}
                        <div class="pay-methods">
                            <label class="payment-option">
                                <input checked class="payment-option__input" name="payment" type="radio" value="credit_card">
                                <div class="payment-option__card">
                                    <span class="material-symbols-outlined payment-option__icon">credit_card</span>
                                    <span class="payment-option__label">Tarjeta de Crédito</span>
                                </div>
                            </label>
                            <label class="payment-option">
                                <input class="payment-option__input" name="payment" type="radio" value="wallet">
                                <div class="payment-option__card">
                                    <span class="material-symbols-outlined payment-option__icon">account_balance_wallet</span>
                                    <span class="payment-option__label">Billetera Digital</span>
                                </div>
                            </label>
                            <label class="payment-option">
                                <input class="payment-option__input" name="payment" type="radio" value="qr">
                                <div class="payment-option__card">
                                    <span class="material-symbols-outlined payment-option__icon">qr_code_2</span>
                                    <span class="payment-option__label">Escanear y Pagar</span>
                                </div>
                            </label>
                        </div>

                        {{-- Formulario tarjeta (simulado, no se valida realmente) --}}
                        <div class="card-form">
                            <div class="card-form__fields">
                                {{-- Nombre del titular --}}
                                <div class="card-input">
                                    <label class="card-input__label">Nombre del Titular</label>
                                    <input class="card-input__field card-input__field--upper"
                                        placeholder="NOMBRE APELLIDO" type="text">
                                </div>

                                {{-- Número de tarjeta + logos --}}
                                <div class="card-input">
                                    <label class="card-input__label">Número de Tarjeta</label>
                                    <div class="card-input__wrap">
                                        <input class="card-input__field"
                                            placeholder="0000 0000 0000 0000" type="text">
                                        <div class="card-input__logos">
                                            <img alt="Visa logo" class="card-input__logo"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaaoF4usrzxhW0iSqeaoLxBvkFqheLcp0xPMPIFUPmLjdiKY3yKUKzyiLxnUWMgPpLv4TfZSiREkYEmAD7BbXxx77sVz_F8cJhwDJ9_3v4XW5w6JDKjXFMVKNt0USlzQRPpYQKjZzJHUcfM4el1aJU4IzQl-jodTviWCXxpSTgJnHHn1BZCWeF3-TAmbhrMeF21zwUDCABoQYtmdxEbSGXLfe4NOZwF26dJiYQEcExoBIH9MG1bCitgPdrONLwsFLtaXNx0SI3PlTj">
                                            <img alt="Mastercard logo" class="card-input__logo"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD11hAOUmyQJuMZyF5KJJI8dDhnNH5NXxY9FdZtcf7UuJVILt4RIOdRYWnVWPtaPN7leAJcnF3sYJVYrM5GsuclKTe64NdNCAecQzJ8fNWowC8RrIcgR1yUkKUhrOp8x2AONNWhVCJA9NACPhwN1KJ1Gj36C00VUWjTEPglLslS-vReNGm90wX363y2cjOt7TZLpXbQEK68W-6b9Z0vb_H9raGOXC8L54qhf_6xFeiiOD8gN12n-A6z7MRYEc0GRijASzO0GJFz5Z4z">
                                        </div>
                                    </div>
                                </div>

                                {{-- Expiración + CVV --}}
                                <div class="card-form__row">
                                    <div class="card-input">
                                        <label class="card-input__label">Fecha de Vencimiento</label>
                                        <input class="card-input__field" placeholder="MM / YY" type="text">
                                    </div>
                                    <div class="card-input">
                                        <label class="card-input__label">CVV</label>
                                        <div class="card-input__wrap">
                                            <input class="card-input__field" placeholder="***" type="password">
                                            <span class="material-symbols-outlined card-input__help"
                                                title="Código de seguridad de 3 dígitos en el reverso de la tarjeta">help</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Checkbox guardar tarjeta --}}
                            <div class="save-card">
                                <input class="save-card__input" id="save_card" type="checkbox">
                                <label class="save-card__label" for="save_card">
                                    Guardar esta tarjeta para mis próximas funciones. Los datos están encriptados según nuestra
                                    <a class="save-card__link" href="{{ route('terms-and-conditions.index') }}">Política de Privacidad</a>.
                                </label>
                            </div>
                        </div>

                        {{-- CTA de confirmación --}}
                        <div class="pay-actions">
                            <button type="submit" class="pay-confirm">
                                Confirmar Compra — ${{ number_format($total, 0, ',', '.') }}
                                <span class="material-symbols-outlined">chevron_right</span>
                            </button>
                            <p class="pay-disclaimer">
                                Al confirmar tu compra, aceptas nuestros Términos de Venta y reconoces que las entradas no son reembolsables 2 horas antes de la función.
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>

    {{-- Mostrar errores flash del servidor --}}
    @if(session('error'))
        @push('scripts')
        <script>
            // Alerta simple para errores de disponibilidad de butacas
            alert('{{ session('error') }}');
        </script>
        @endpush
    @endif
@endsection

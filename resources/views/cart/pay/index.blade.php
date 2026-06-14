@extends('layouts.sin-navbar.app')

@section('title', 'Confirmación y Pago — ' . $showtime->movie->name)

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
                    <div class="summary-card">
                        {{-- Header con imagen + badge + título --}}
                        <div class="summary-card__media">
                            <img alt="{{ $showtime->movie->name }}" class="summary-card__img"
                                src="{{ $showtime->movie->image_url ? asset($showtime->movie->image_url) : asset('img/peliculas/default.jpg') }}">
                            <div class="summary-card__overlay"></div>
                            <div class="summary-card__meta">
                                <span class="summary-card__badge">{{ $showtime->movie->category }}</span>
                                <h3 class="summary-card__title">{{ strtoupper($showtime->movie->name) }}</h3>
                            </div>
                        </div>

                        {{-- Body: grid de datos + precios --}}
                        <div class="summary-card__body">
                            <div class="summary-card__grid">
                                <div>
                                    <p class="summary-card__label">Sala</p>
                                    <p class="summary-card__val">{{ $showtime->theater->name }}</p>
                                </div>
                                <div>
                                    <p class="summary-card__label">Fecha y Hora</p>
                                    <p class="summary-card__val">
                                        {{ $showtime->datetime->format('d/m/Y') }} • {{ $showtime->datetime->format('H:i') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="summary-card__label">Asientos</p>
                                    <p class="summary-card__val">{{ implode(', ', $amchairs) }}</p>
                                </div>
                                <div>
                                    <p class="summary-card__label">Duración</p>
                                    <p class="summary-card__val">{{ $showtime->movie->duration }}</p>
                                </div>
                            </div>

                            {{-- Líneas de precio --}}
                            <div class="summary-card__prices">
                                <div class="summary-card__row">
                                    <span class="summary-card__row-label">
                                        Precio de Entradas ({{ count($amchairs) }}x)
                                    </span>
                                    <span class="summary-card__row-val">
                                        ${{ number_format($subtotal, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div class="summary-card__row summary-card__row--total">
                                    <span class="summary-card__row-label">Total</span>
                                    <span class="summary-card__row-val">
                                        ${{ number_format($subtotal, 0, ',', '.') }}
                                    </span>
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
                <form id="payForm" action="{{ route('purchase.confirm') }}" method="POST">
                    @csrf
                    {{-- Inputs ocultos con datos de la compra --}}
                    <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
                    @foreach($amchairs as $amchair)
                        <input type="hidden" name="amchairs[]" value="{{ $amchair }}">
                    @endforeach

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
                                Confirmar Compra — ${{ number_format($subtotal, 0, ',', '.') }}
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

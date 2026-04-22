@extends('layouts.sin-navbar.app')

@section('title', 'Confirmación y Pago')

@section('content')
    {{-- Main pago: grid 5/7 (summary + form) con orden invertido en mobile --}}
    <main class="pay">
        <div class="pay__grid">

            {{-- Summary (izquierda desktop, abajo mobile) --}}
            <section class="pay__summary">
                <div>
                    <h2 class="pay__heading">Order Summary</h2>

                    {{-- Tarjeta con poster + datos --}}
                    <div class="summary-card">
                        {{-- Header con imagen + badge + título --}}
                        <div class="summary-card__media">
                            <img alt="Cinematic movie background" class="summary-card__img"
                                data-alt="cinematic widescreen shot of a dramatic movie scene with moody lighting and deep shadows in a modern theater setting"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnRuuKqFeURFE_pIptw0ltCx3eqjD6uW0TKlUgQVKP5LsqUSRy0nF7yueZqrzAzA4KHyjrWiwHjSXsxocAGEicT3eOjdUJwXbhQnIxwkQop2AnTYXI_KvOVGV9DVJXVKKGi6lccAhTqTDZajr_thNhhn7rrI1VPH0rTAYAc93ZcKjrNoDGiu5vmr9xdDiGAE42jP5Tzsh6t8BGl54AJhCpX4Ldg8I0VKljVxzkcsEdrH5fsK-SEYdfZOPWzKuJMA15GH6xH87Jsbp3">
                            <div class="summary-card__overlay"></div>
                            <div class="summary-card__meta">
                                <span class="summary-card__badge">Premiere Experience</span>
                                <h3 class="summary-card__title">NOCTURNAL ECHOES</h3>
                            </div>
                        </div>

                        {{-- Body: grid de datos + precios --}}
                        <div class="summary-card__body">
                            <div class="summary-card__grid">
                                <div>
                                    <p class="summary-card__label">Cinema</p>
                                    <p class="summary-card__val">The Grand Palladium, Hall 4</p>
                                </div>
                                <div>
                                    <p class="summary-card__label">Date &amp; Time</p>
                                    <p class="summary-card__val">Dec 14, 2024 • 20:45</p>
                                </div>
                                <div>
                                    <p class="summary-card__label">Seats</p>
                                    <p class="summary-card__val">VIP Lounge • J12, J13</p>
                                </div>
                                <div>
                                    <p class="summary-card__label">Format</p>
                                    <p class="summary-card__val">IMAX Laser 4K</p>
                                </div>
                            </div>

                            {{-- Líneas de precio --}}
                            <div class="summary-card__prices">
                                <div class="summary-card__row">
                                    <span class="summary-card__row-label">Ticket Price (2x)</span>
                                    <span class="summary-card__row-val">$48.00</span>
                                </div>
                                <div class="summary-card__row">
                                    <span class="summary-card__row-label">Booking Fee</span>
                                    <span class="summary-card__row-val">$4.50</span>
                                </div>
                                <div class="summary-card__row">
                                    <span class="summary-card__row-label">VAT (8%)</span>
                                    <span class="summary-card__row-val">$4.20</span>
                                </div>
                                <div class="summary-card__row summary-card__row--total">
                                    <span class="summary-card__row-label">Total Amount</span>
                                    <span class="summary-card__row-val">$56.70</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Trust badges --}}
                    <div class="trust-badges">
                        <div class="trust-badges__item">
                            <span class="material-symbols-outlined trust-badges__icon">verified_user</span>
                            <span class="trust-badges__label">SSL Secured</span>
                        </div>
                        <div class="trust-badges__item">
                            <span class="material-symbols-outlined trust-badges__icon">payment_card</span>
                            <span class="trust-badges__label">PCI Compliant</span>
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
                <h2 class="pay__heading">Payment Details</h2>

                <div class="pay__form-wrap">

                    {{-- Selección método de pago --}}
                    <div class="pay-methods">
                        <label class="payment-option">
                            <input checked class="payment-option__input" name="payment" type="radio">
                            <div class="payment-option__card">
                                <span class="material-symbols-outlined payment-option__icon">credit_card</span>
                                <span class="payment-option__label">Credit Card</span>
                            </div>
                        </label>
                        <label class="payment-option">
                            <input class="payment-option__input" name="payment" type="radio">
                            <div class="payment-option__card">
                                <span class="material-symbols-outlined payment-option__icon">account_balance_wallet</span>
                                <span class="payment-option__label">Digital Wallet</span>
                            </div>
                        </label>
                        <label class="payment-option">
                            <input class="payment-option__input" name="payment" type="radio">
                            <div class="payment-option__card">
                                <span class="material-symbols-outlined payment-option__icon">qr_code_2</span>
                                <span class="payment-option__label">Scan &amp; Pay</span>
                            </div>
                        </label>
                    </div>

                    {{-- Formulario tarjeta --}}
                    <div class="card-form">
                        <div class="card-form__fields">
                            {{-- Nombre del titular --}}
                            <div class="card-input">
                                <label class="card-input__label">Cardholder Name</label>
                                <input class="card-input__field card-input__field--upper"
                                    placeholder="ALEXANDER VANE" type="text">
                            </div>

                            {{-- Número de tarjeta + logos --}}
                            <div class="card-input">
                                <label class="card-input__label">Card Number</label>
                                <div class="card-input__wrap">
                                    <input class="card-input__field"
                                        placeholder="0000 0000 0000 0000" type="text">
                                    <div class="card-input__logos">
                                        <img alt="Visa logo" class="card-input__logo"
                                            data-alt="clean minimalist visa credit card brand logo in white on dark background"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaaoF4usrzxhW0iSqeaoLxBvkFqheLcp0xPMPIFUPmLjdiKY3yKUKzyiLxnUWMgPpLv4TfZSiREkYEmAD7BbXxx77sVz_F8cJhwDJ9_3v4XW5w6JDKjXFMVKNt0USlzQRPpYQKjZzJHUcfM4el1aJU4IzQl-jodTviWCXxpSTgJnHHn1BZCWeF3-TAmbhrMeF21zwUDCABoQYtmdxEbSGXLfe4NOZwF26dJiYQEcExoBIH9MG1bCitgPdrONLwsFLtaXNx0SI3PlTj">
                                        <img alt="Mastercard logo" class="card-input__logo"
                                            data-alt="clean minimalist mastercard credit card brand logo in white on dark background"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD11hAOUmyQJuMZyF5KJJI8dDhnNH5NXxY9FdZtcf7UuJVILt4RIOdRYWnVWPtaPN7leAJcnF3sYJVYrM5GsuclKTe64NdNCAecQzJ8fNWowC8RrIcgR1yUkKUhrOp8x2AONNWhVCJA9NACPhwN1KJ1Gj36C00VUWjTEPglLslS-vReNGm90wX363y2cjOt7TZLpXbQEK68W-6b9Z0vb_H9raGOXC8L54qhf_6xFeiiOD8gN12n-A6z7MRYEc0GRijASzO0GJFz5Z4z">
                                    </div>
                                </div>
                            </div>

                            {{-- Expiración + CVV --}}
                            <div class="card-form__row">
                                <div class="card-input">
                                    <label class="card-input__label">Expiry Date</label>
                                    <input class="card-input__field" placeholder="MM / YY" type="text">
                                </div>
                                <div class="card-input">
                                    <label class="card-input__label">CVV</label>
                                    <div class="card-input__wrap">
                                        <input class="card-input__field" placeholder="***" type="password">
                                        <span class="material-symbols-outlined card-input__help"
                                            title="3-digit security code on back of card">help</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Checkbox guardar tarjeta --}}
                        <div class="save-card">
                            <input class="save-card__input" id="save_card" type="checkbox">
                            <label class="save-card__label" for="save_card">
                                Save this card for my future premieres. Data is encrypted and managed according to our
                                <a class="save-card__link" href="#">Privacy Policy</a>.
                            </label>
                        </div>
                    </div>

                    {{-- CTA de confirmación --}}
                    <div class="pay-actions">
                        <button class="pay-confirm">
                            Confirm Purchase
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                        <p class="pay-disclaimer">
                            By confirming your purchase, you agree to our Terms of Sale and acknowledge that tickets are
                            non-refundable 2 hours prior to showtime.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

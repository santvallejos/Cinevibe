@extends('layouts.sin-navbar.app')

@section('title', 'Selección de Asientos')

@section('content')
    {{-- Main armchair: grid de asientos + sidebar de resumen --}}
    <main class="armchair">

        {{-- Área principal: pantalla + grid de asientos + leyenda --}}
        <div class="armchair__main">

            {{-- Indicador de pantalla curvada --}}
            <div class="screen-indicator">
                <div class="curved-screen screen-indicator__bar"></div>
                <div class="screen-indicator__label">Screen This Way</div>
            </div>

            {{-- Grid de asientos organizado por filas --}}
            <div class="seat-grid">

                {{-- Fila A (libre con 1 asiento seleccionado) --}}
                <div class="seat-row">
                    <span class="seat-row__label">A</span>
                    <div class="seat-row__seats">
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat-row__aisle"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--selected">
                            <span class="seat__label">A5</span>
                        </div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat-row__aisle"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                    </div>
                    <span class="seat-row__label">A</span>
                </div>

                {{-- Fila B (con asientos ocupados) --}}
                <div class="seat-row">
                    <span class="seat-row__label">B</span>
                    <div class="seat-row__seats">
                        <div class="seat seat--occupied">
                            <span class="material-symbols-outlined">close</span>
                        </div>
                        <div class="seat seat--occupied">
                            <span class="material-symbols-outlined">close</span>
                        </div>
                        <div class="seat-row__aisle"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat-row__aisle"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                    </div>
                    <span class="seat-row__label">B</span>
                </div>

                {{-- Fila P (Premium) --}}
                <div class="seat-row">
                    <span class="seat-row__label seat-row__label--premium">P</span>
                    <div class="seat-row__seats seat-row__seats--premium">
                        <div class="seat seat--premium">
                            <span class="material-symbols-outlined material-symbols-outlined--fill">star</span>
                        </div>
                        <div class="seat seat--premium-selected">
                            <span class="seat__label">P2</span>
                        </div>
                        <div class="seat seat--premium">
                            <span class="material-symbols-outlined material-symbols-outlined--fill">star</span>
                        </div>
                        <div class="seat seat--premium">
                            <span class="material-symbols-outlined material-symbols-outlined--fill">star</span>
                        </div>
                        <div class="seat seat--premium">
                            <span class="material-symbols-outlined material-symbols-outlined--fill">star</span>
                        </div>
                        <div class="seat seat--premium">
                            <span class="material-symbols-outlined material-symbols-outlined--fill">star</span>
                        </div>
                    </div>
                    <span class="seat-row__label seat-row__label--premium">P</span>
                </div>

                {{-- Fila F (libre) --}}
                <div class="seat-row">
                    <span class="seat-row__label">F</span>
                    <div class="seat-row__seats">
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat-row__aisle"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat-row__aisle"></div>
                        <div class="seat seat--available"></div>
                        <div class="seat seat--available"></div>
                    </div>
                    <span class="seat-row__label">F</span>
                </div>
            </div>

            {{-- Leyenda explicativa --}}
            <div class="seat-legend">
                <div class="seat-legend__item">
                    <div class="seat-legend__swatch seat-legend__swatch--available"></div>
                    <span class="seat-legend__label">Available</span>
                </div>
                <div class="seat-legend__item">
                    <div class="seat-legend__swatch seat-legend__swatch--selected"></div>
                    <span class="seat-legend__label">Selected</span>
                </div>
                <div class="seat-legend__item">
                    <div class="seat-legend__swatch seat-legend__swatch--occupied">
                        <span class="material-symbols-outlined seat-legend__icon">close</span>
                    </div>
                    <span class="seat-legend__label">Occupied</span>
                </div>
                <div class="seat-legend__item">
                    <div class="seat-legend__swatch seat-legend__swatch--premium">
                        <span class="material-symbols-outlined material-symbols-outlined--fill seat-legend__icon">star</span>
                    </div>
                    <span class="seat-legend__label">Premium</span>
                </div>
            </div>
        </div>

        {{-- Sidebar: resumen de pedido --}}
        <aside class="armchair__aside">

            {{-- Tarjeta principal del pedido --}}
            <div class="order-card">

                {{-- Bloque cinema --}}
                <div>
                    <h3 class="order-card__block-title">Cinema Location</h3>
                    <div class="order-card__cinema">
                        <div class="order-card__cinema-icon">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <div>
                            <p class="order-card__cinema-name">The Grand Velvet Theater</p>
                            <p class="order-card__cinema-hall">Hall 4, 3rd Floor</p>
                        </div>
                    </div>
                </div>

                {{-- Bloque asientos seleccionados --}}
                <div>
                    <h3 class="order-card__block-title">Selected Seats</h3>
                    <div class="order-card__seats">
                        <div class="seat-chip">
                            <span class="seat-chip__code">A5</span>
                            <span class="seat-chip__price">$18.50</span>
                            <button class="seat-chip__close">
                                <span class="material-symbols-outlined">close</span>
                            </button>
                        </div>
                        <div class="seat-chip">
                            <span class="seat-chip__code seat-chip__code--gold">P2</span>
                            <span class="seat-chip__price">$32.00</span>
                            <button class="seat-chip__close">
                                <span class="material-symbols-outlined">close</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Bloque total + CTA --}}
                <div class="order-card__total">
                    <div class="order-card__total-row">
                        <div>
                            <p class="order-card__total-label">Total Amount</p>
                            <p class="order-card__total-val">$50.50</p>
                        </div>
                        <p class="order-card__taxes">Incl. Taxes &amp; Fees</p>
                    </div>
                    <button class="btn btn--primary btn--block btn--lg">
                        Proceed to Payment
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                    <p class="order-card__note">
                        Seats will be reserved for 10:00 minutes after clicking proceed.
                    </p>
                </div>
            </div>

            {{-- Ad/promo inferior --}}
            <div class="promo-ad">
                <div class="promo-ad__bg">
                    <img class="promo-ad__img"
                        data-alt="close-up of golden buttery popcorn in a dark cinematic lighting setting with soft glowing highlights"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdC_z-0iKQypanetGIAhUymo3XVAOWsdQInoOrg87V14VEFTmmsEB_00zCCC282G9py1TcRuoMu-3XrNQ0Y2-n1OlRFSZ2t1wylJcOBem49N6wd7Ojn6duuC03D1nNLXSkFWpatK7YTYKz9Gy-XTJOEtHlgmX2vl_lBwrB5mR-TttUAytsAHYz9BzXw69hgfR1tp2cStHTKA__PafVcNrPgMivPYpuwWUlsrPxm7Dy2inE_KBDeXHa50cuvD4kW_JsoDE-H7BsksFc">
                </div>
                <div class="promo-ad__content">
                    <span class="promo-ad__kicker">Curator Exclusive</span>
                    <h4 class="promo-ad__title">Join Club for 20% off Snacks</h4>
                </div>
                <div class="promo-ad__add">
                    <span class="material-symbols-outlined">add</span>
                </div>
            </div>
        </aside>
    </main>
@endsection

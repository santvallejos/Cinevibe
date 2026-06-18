@extends('layouts.sin-navbar.app')

@section('title', 'Selección de Asientos — ' . $showtime->movie->name)

@push('styles')
    <link href="{{ asset('vendor/bootstrap/css/pages/cart-armchair.css') }}" rel="stylesheet">
@endpush

@section('content')
    {{-- Main armchair: grid de asientos + sidebar de resumen --}}
    <main class="armchair">

        {{-- Área principal: pantalla + grid de asientos + leyenda --}}
        <div class="armchair__main">

            {{-- Indicador de pantalla curvada --}}
            <div class="screen-indicator">
                <div class="curved-screen screen-indicator__bar"></div>
                <div class="screen-indicator__label">Pantalla</div>
            </div>

            {{-- Grid de asientos generado dinámicamente desde la configuración de la sala en base de datos --}}
            @php
                $unitPrice = (float) $showtime->theater->price;
            @endphp

            <div class="seat-grid" id="seatGrid">
                @foreach($seatsByRow as $rowLetter => $seats)
                    <div class="seat-row">
                        {{-- Etiqueta de fila izquierda --}}
                        <span class="seat-row__label">{{ $rowLetter }}</span>
                        <div class="seat-row__seats">
                            @foreach($seats as $seat)
                                @php
                                    $seatId = $seat->code;
                                    $isOccupied = in_array($seatId, $occupiedChairs);
                                @endphp

                                {{-- Pasillo antes del asiento si corresponde --}}
                                @if(in_array($seat->seat_number, [3, 8]))
                                    <div class="seat-row__aisle"></div>
                                @endif

                                @if($isOccupied)
                                    {{-- Asiento ocupado definitivamente: vendido en BD --}}
                                    <div class="seat seat--occupied" data-seat="{{ $seatId }}">
                                        <span class="material-symbols-outlined">close</span>
                                    </div>
                                @else
                                    {{-- Asiento disponible o reservado: el estado real lo define JS vía API --}}
                                    <div class="seat seat--available" data-seat="{{ $seatId }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- Etiqueta de fila derecha --}}
                        <span class="seat-row__label">{{ $rowLetter }}</span>
                    </div>
                @endforeach
            </div>

            {{-- Leyenda explicativa --}}
            <div class="seat-legend">
                <div class="seat-legend__item">
                    <div class="seat-legend__swatch seat-legend__swatch--available"></div>
                    <span class="seat-legend__label">Disponible</span>
                </div>
                <div class="seat-legend__item">
                    <div class="seat-legend__swatch seat-legend__swatch--selected"></div>
                    <span class="seat-legend__label">Seleccionado</span>
                </div>
                <div class="seat-legend__item">
                    <div class="seat-legend__swatch seat-legend__swatch--occupied">
                        <span class="material-symbols-outlined seat-legend__icon">close</span>
                    </div>
                    <span class="seat-legend__label">Ocupado</span>
                </div>
            </div>
        </div>

        {{-- Sidebar: resumen de pedido --}}
        <aside class="armchair__aside">

            {{-- Tarjeta principal del pedido --}}
            <div class="order-card">

                {{-- Bloque información película y función --}}
                <div>
                    <h3 class="order-card__block-title">Función Seleccionada</h3>
                    <div class="order-card__cinema">
                        <div class="order-card__cinema-icon">
                            <span class="material-symbols-outlined">movie</span>
                        </div>
                        <div>
                            <p class="order-card__cinema-name">{{ $showtime->movie->name }}</p>
                            <p class="order-card__cinema-hall">
                                {{ $showtime->theater->name }} ·
                                {{ $showtime->datetime->format('d/m/Y') }} a las {{ $showtime->datetime->format('H:i') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Bloque asientos seleccionados (se llena dinámicamente con JS) --}}
                <div>
                    <h3 class="order-card__block-title">Asientos Seleccionados</h3>
                    <div class="order-card__seats" id="selectedSeatsList">
                        {{-- Se llena dinámicamente con JavaScript --}}
                        <p class="order-card__empty-msg" id="noSeatsMsg" style="font-size: var(--fs-xs); color: var(--color-neutral-500); margin: 0;">
                            Hacé click en los asientos para seleccionarlos.
                        </p>
                    </div>
                </div>

                {{-- Bloque total + CTA --}}
                <div class="order-card__total">
                    <div class="order-card__total-row">
                        <div>
                            <p class="order-card__total-label">Total</p>
                            <p class="order-card__total-val" id="totalPrice">$0</p>
                        </div>
                        <p class="order-card__taxes">Incl. Impuestos y Tasas</p>
                    </div>

                    {{-- Formulario oculto que envía los datos al carrito (cart.add) --}}
                    <form id="checkoutForm" action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
                        {{-- Los inputs de amchairs[] se agregan dinámicamente con JS --}}
                        <div id="hiddenInputs"></div>

                        <button type="submit" name="action" value="checkout" class="btn btn--primary btn--block btn--lg" id="btnCheckout" disabled style="display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: var(--sp-2);">
                            Comprar Ahora
                            <span class="material-symbols-outlined">shopping_cart</span>
                        </button>

                        <button type="submit" name="action" value="add" class="btn btn--outline btn--block" id="btnAddToCart" disabled style="display: flex; align-items: center; justify-content: center; gap: 8px; border: 1px solid rgba(255, 255, 255, 0.15);">
                            Agregar al Carrito
                            <span class="material-symbols-outlined">add_shopping_cart</span>
                        </button>
                    </form>
                    {{-- Eliminada sección de temporizador y nota de reserva temporal por requerimiento --}}
                </div>
            </div>
        </aside>
    </main>

    @push('scripts')
    <script>
        window.CinevibeData = {
            unitPrice: {{ (float) $showtime->theater->price }}
        };
    </script>
    <script src="{{ asset('js/pages/cart.js') }}"></script>
    @endpush
@endsection

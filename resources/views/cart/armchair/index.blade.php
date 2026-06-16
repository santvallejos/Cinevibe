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

            {{-- Grid de asientos generado dinámicamente desde la configuración de la sala --}}
            @php
                // Define filas y cantidad de asientos por fila para la sala
                $rows = ['A', 'B', 'C', 'D', 'E', 'F'];
                $seatsPerRow = 10;
                $aisleAfter = [2, 7]; // Pasillos después del asiento 2 y 7
                $unitPrice = (float) $showtime->theater->price;
            @endphp

            <div class="seat-grid" id="seatGrid">
                @foreach($rows as $rowLetter)
                    <div class="seat-row">
                        {{-- Etiqueta de fila izquierda --}}
                        <span class="seat-row__label">{{ $rowLetter }}</span>
                        <div class="seat-row__seats">
                            @for($i = 1; $i <= $seatsPerRow; $i++)
                                @php
                                    $seatId = $rowLetter . $i;
                                    $isOccupied = in_array($seatId, $occupiedChairs);
                                @endphp

                                {{-- Pasillo antes del asiento si corresponde --}}
                                @if(in_array($i, [3, 8]))
                                    <div class="seat-row__aisle"></div>
                                @endif

                                @if($isOccupied)
                                    {{-- Asiento ocupado: no clickeable --}}
                                    <div class="seat seat--occupied" data-seat="{{ $seatId }}">
                                        <span class="material-symbols-outlined">close</span>
                                    </div>
                                @else
                                    {{-- Asiento disponible: clickeable para seleccionar --}}
                                    <div class="seat seat--available" data-seat="{{ $seatId }}">
                                    </div>
                                @endif
                            @endfor
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

                    <p class="order-card__note">
                        Los asientos se reservarán por 10:00 minutos tras hacer clic en proceder.
                    </p>
                </div>
            </div>
        </aside>
    </main>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        /**
         * Lógica de selección interactiva de butacas.
         * Gestiona estado de asientos, sidebar de resumen y formulario de checkout.
         */

        // Precio unitario del ticket (pasado desde el servidor)
        const unitPrice = {{ $unitPrice }};

        // Set para almacenar los asientos seleccionados
        const selectedSeats = new Set();

        // Referencias DOM
        const seatGrid       = document.getElementById('seatGrid');
        const seatsList       = document.getElementById('selectedSeatsList');
        const noSeatsMsg      = document.getElementById('noSeatsMsg');
        const totalPriceEl    = document.getElementById('totalPrice');
        const hiddenInputs    = document.getElementById('hiddenInputs');
        const btnCheckout     = document.getElementById('btnCheckout');
        const btnAddToCart    = document.getElementById('btnAddToCart');

        // Delegación de eventos en el grid de asientos
        seatGrid.addEventListener('click', function (e) {
            const seat = e.target.closest('.seat--available, .seat--selected');
            if (!seat) return; // Click fuera de un asiento válido

            const seatId = seat.dataset.seat;

            if (selectedSeats.has(seatId)) {
                // Deseleccionar
                selectedSeats.delete(seatId);
                seat.classList.remove('seat--selected');
                seat.classList.add('seat--available');
                seat.innerHTML = ''; // Quitar label
            } else {
                // Seleccionar
                selectedSeats.add(seatId);
                seat.classList.remove('seat--available');
                seat.classList.add('seat--selected');
                seat.innerHTML = '<span class="seat__label">' + seatId + '</span>';
            }

            // Actualizar sidebar y formulario
            updateSidebar();
        });

        /**
         * Actualiza la lista de chips, el total y los inputs ocultos del formulario.
         */
        function updateSidebar() {
            // Limpiar lista de chips e inputs ocultos
            seatsList.querySelectorAll('.seat-chip').forEach(el => el.remove());
            hiddenInputs.innerHTML = '';

            if (selectedSeats.size === 0) {
                // Sin asientos: mostrar mensaje y deshabilitar botones
                noSeatsMsg.style.display = '';
                totalPriceEl.textContent = '$0';
                btnCheckout.disabled = true;
                btnAddToCart.disabled = true;
                return;
            }

            // Ocultar mensaje y habilitar botones
            noSeatsMsg.style.display = 'none';
            btnCheckout.disabled = false;
            btnAddToCart.disabled = false;

            // Ordenar asientos alfabéticamente
            const sorted = Array.from(selectedSeats).sort();

            sorted.forEach(function (seatId) {
                // Crear chip visual para cada asiento seleccionado
                const chip = document.createElement('div');
                chip.className = 'seat-chip';
                chip.innerHTML =
                    '<span class="seat-chip__code">' + seatId + '</span>' +
                    '<span class="seat-chip__price">$' + Number(unitPrice).toLocaleString('es-AR') + '</span>' +
                    '<button type="button" class="seat-chip__close" data-remove="' + seatId + '">' +
                        '<span class="material-symbols-outlined">close</span>' +
                    '</button>';
                seatsList.appendChild(chip);

                // Crear input oculto para enviar al servidor
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'amchairs[]';
                input.value = seatId;
                hiddenInputs.appendChild(input);
            });

            // Calcular y mostrar total
            const total = selectedSeats.size * unitPrice;
            totalPriceEl.textContent = '$' + Number(total).toLocaleString('es-AR');
        }

        // Delegación de eventos para quitar asientos desde los chips del sidebar
        seatsList.addEventListener('click', function (e) {
            const btn = e.target.closest('[data-remove]');
            if (!btn) return;

            const seatId = btn.dataset.remove;
            selectedSeats.delete(seatId);

            // Restaurar visual del asiento en el grid
            const seatEl = seatGrid.querySelector('[data-seat="' + seatId + '"]');
            if (seatEl) {
                seatEl.classList.remove('seat--selected');
                seatEl.classList.add('seat--available');
                seatEl.innerHTML = '';
            }

            updateSidebar();
        });
    });
    </script>
    @endpush
@endsection

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
                                    {{-- Asiento ocupado definitivamente: vendido en BD --}}
                                    <div class="seat seat--occupied" data-seat="{{ $seatId }}">
                                        <span class="material-symbols-outlined">close</span>
                                    </div>
                                @else
                                    {{-- Asiento disponible o reservado: el estado real lo define JS vía API --}}
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
                    <div class="seat-legend__swatch seat-legend__swatch--reserved">
                        <span class="material-symbols-outlined seat-legend__icon">lock</span>
                    </div>
                    <span class="seat-legend__label">Reservado</span>
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

                    {{-- Contador de tiempo de reserva, visible solo al seleccionar asientos --}}
                    <div id="reservationTimer" style="display:none; text-align:center; margin-top: var(--sp-2);">
                        <p class="order-card__note" style="margin:0;">
                            Reserva expira en: <strong id="timerDisplay" style="color: var(--color-primary-400);">10:00</strong>
                        </p>
                    </div>

                    <p class="order-card__note">
                        Los asientos se reservan automáticamente al seleccionarlos.
                    </p>
                </div>
            </div>
        </aside>
    </main>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        /**
         * Lógica de selección de butacas con validación backend.
         * Cada clic reserva/libera el asiento vía API antes de actualizar la UI.
         * Un polling cada 12 segundos sincroniza cambios de otros usuarios en tiempo real.
         */

        const unitPrice    = {{ $unitPrice }};
        const showtimeId   = {{ $showtime->id }};
        const csrfToken    = '{{ csrf_token() }}';

        // URLs de la API usando las rutas de Laravel Blade
        const statusUrl     = '{{ route("api.seats.status") }}';
        const reserveUrl    = '{{ route("api.seats.reserve") }}';
        const releaseUrl    = '{{ route("api.seats.release") }}';
        const releaseAllUrl = '{{ route("api.seats.release-all") }}';

        // Asientos seleccionados por el usuario actual {seatId -> expiresAt timestamp}
        const selectedSeats = new Map();

        // Referencias DOM
        const seatGrid       = document.getElementById('seatGrid');
        const seatsList      = document.getElementById('selectedSeatsList');
        const noSeatsMsg     = document.getElementById('noSeatsMsg');
        const totalPriceEl    = document.getElementById('totalPrice');
        const hiddenInputs    = document.getElementById('hiddenInputs');
        const btnCheckout     = document.getElementById('btnCheckout');
        const btnAddToCart    = document.getElementById('btnAddToCart');
        const timerContainer = document.getElementById('reservationTimer');
        const timerDisplay   = document.getElementById('timerDisplay');

        // ─── Polling de estado ──────────────────────────────────────────
        let pollInterval = null;

        function startPolling() {
            if (pollInterval) return;
            pollInterval = setInterval(syncSeatStatus, 12000);
        }

        function stopPolling() {
            clearInterval(pollInterval);
            pollInterval = null;
        }

        /**
         * Consulta la API por el estado actual de las butacas.
         * Actualiza la UI: bloquea asientos reservados por otros, restaura los propios.
         */
        async function syncSeatStatus() {
            try {
                const res = await fetch(`${statusUrl}?showtime_id=${showtimeId}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                if (!res.ok) return;

                const data = await res.json();

                // Marcar asientos ocupados (vendidos definitivamente)
                data.occupied.forEach(seatId => {
                    const el = seatGrid.querySelector(`[data-seat="${seatId}"]`);
                    if (el && !el.classList.contains('seat--occupied')) {
                        el.classList.remove('seat--available', 'seat--selected', 'seat--reserved');
                        el.classList.add('seat--occupied');
                        el.innerHTML = '<span class="material-symbols-outlined">close</span>';
                        // Si lo tenía seleccionado el usuario, quitar del set
                        if (selectedSeats.has(seatId)) {
                            selectedSeats.delete(seatId);
                            updateSidebar();
                        }
                    }
                });

                // Marcar asientos reservados por otros usuarios
                data.reserved.forEach(seatId => {
                    const el = seatGrid.querySelector(`[data-seat="${seatId}"]`);
                    if (el && !el.classList.contains('seat--occupied') && !el.classList.contains('seat--selected')) {
                        el.classList.remove('seat--available');
                        el.classList.add('seat--reserved');
                        el.innerHTML = '<span class="material-symbols-outlined" style="font-size:14px;">lock</span>';
                    }
                });

                // Restaurar asientos que ya no están reservados por otros
                seatGrid.querySelectorAll('.seat--reserved').forEach(el => {
                    const seatId = el.dataset.seat;
                    if (!data.reserved.includes(seatId) && !data.occupied.includes(seatId)) {
                        el.classList.remove('seat--reserved');
                        el.classList.add('seat--available');
                        el.innerHTML = '';
                    }
                });

                // Renovar o inicializar reservas propias
                let mineChanged = false;
                data.mine.forEach(item => {
                    const seatId = item.amchair;
                    const expiresAt = new Date(item.expires_at).getTime();

                    if (!selectedSeats.has(seatId)) {
                        selectedSeats.set(seatId, expiresAt);
                        const seatEl = seatGrid.querySelector(`[data-seat="${seatId}"]`);
                        if (seatEl) {
                            seatEl.classList.remove('seat--available', 'seat--reserved');
                            seatEl.classList.add('seat--selected');
                            seatEl.innerHTML = `<span class="seat__label">${seatId}</span>`;
                        }
                        mineChanged = true;
                    } else {
                        selectedSeats.set(seatId, expiresAt);
                    }
                });

                if (mineChanged || data.mine.length > 0) {
                    updateSidebar();
                    startTimer();
                    startPolling();
                }

            } catch (e) {
                // Error de red: continuar silenciosamente
            }
        }

        // ─── Temporizador visual ────────────────────────────────────────

        let timerInterval = null;

        function startTimer() {
            timerContainer.style.display = '';
            updateTimerDisplay();
            if (timerInterval) return;
            timerInterval = setInterval(updateTimerDisplay, 1000);
        }

        function stopTimer() {
            clearInterval(timerInterval);
            timerInterval = null;
            timerContainer.style.display = 'none';
        }

        function updateTimerDisplay() {
            if (selectedSeats.size === 0) {
                stopTimer();
                return;
            }

            // Mostrar el tiempo de expiración más próximo entre todos los asientos seleccionados
            const minExpiry = Math.min(...selectedSeats.values());
            const remaining = Math.max(0, Math.floor((minExpiry - Date.now()) / 1000));

            const minutes = String(Math.floor(remaining / 60)).padStart(2, '0');
            const seconds = String(remaining % 60).padStart(2, '0');
            timerDisplay.textContent = `${minutes}:${seconds}`;

            if (remaining === 0) {
                timerDisplay.style.color = 'var(--color-error, #ef4444)';
            } else if (remaining < 120) {
                timerDisplay.style.color = 'var(--color-warning, #f59e0b)';
            } else {
                timerDisplay.style.color = 'var(--color-primary-400)';
            }
        }

        // ─── Reservar asiento (API call) ────────────────────────────────

        async function reserveSeat(seatEl, seatId) {
            seatEl.classList.add('seat--loading');
            seatEl.style.pointerEvents = 'none';

            try {
                const res = await fetch(reserveUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({ showtime_id: showtimeId, amchair: seatId }),
                });

                if (res.ok) {
                    const data = await res.json();
                    const expiresAt = new Date(data.expires_at).getTime();

                    // Marcar como seleccionado
                    selectedSeats.set(seatId, expiresAt);
                    seatEl.classList.remove('seat--available', 'seat--reserved', 'seat--loading');
                    seatEl.classList.add('seat--selected');
                    seatEl.innerHTML = `<span class="seat__label">${seatId}</span>`;

                    updateSidebar();
                    startTimer();
                    startPolling();
                } else {
                    const err = await res.json();

                    // Si está reservado por otro, marcarlo en la UI
                    seatEl.classList.remove('seat--loading');
                    seatEl.classList.remove('seat--available');
                    seatEl.classList.add('seat--reserved');
                    seatEl.innerHTML = '<span class="material-symbols-outlined" style="font-size:14px;">lock</span>';
                    seatEl.style.pointerEvents = '';

                    showToast(err.message || 'Este asiento no está disponible.', 'error');
                }
            } catch (e) {
                seatEl.classList.remove('seat--loading');
                seatEl.style.pointerEvents = '';
                showToast('Error de conexión. Intentá nuevamente.', 'error');
            }

            seatEl.style.pointerEvents = '';
        }

        // ─── Liberar asiento (API call) ─────────────────────────────────

        async function releaseSeat(seatEl, seatId) {
            selectedSeats.delete(seatId);
            seatEl.classList.remove('seat--selected');
            seatEl.classList.add('seat--available');
            seatEl.innerHTML = '';

            updateSidebar();

            if (selectedSeats.size === 0) {
                stopTimer();
                stopPolling();
            }

            // Liberar en backend (fire and forget)
            fetch(releaseUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ showtime_id: showtimeId, amchair: seatId }),
            }).catch(() => {});
        }

        // ─── Delegación de clics en el grid ────────────────────────────

        seatGrid.addEventListener('click', function (e) {
            const seat = e.target.closest('.seat--available, .seat--selected, .seat--reserved');
            if (!seat) return;

            const seatId = seat.dataset.seat;

            if (seat.classList.contains('seat--selected')) {
                releaseSeat(seat, seatId);
            } else if (seat.classList.contains('seat--available')) {
                reserveSeat(seat, seatId);
            } else if (seat.classList.contains('seat--reserved')) {
                showToast('Este asiento está siendo reservado por otro usuario.', 'warning');
            }
        });

        // ─── Sidebar ────────────────────────────────────────────────────

        function updateSidebar() {
            seatsList.querySelectorAll('.seat-chip').forEach(el => el.remove());
            hiddenInputs.innerHTML = '';

            if (selectedSeats.size === 0) {
                noSeatsMsg.style.display = '';
                totalPriceEl.textContent = '$0';
                btnCheckout.disabled = true;
                btnAddToCart.disabled = true;
                return;
            }

            noSeatsMsg.style.display = 'none';
            btnCheckout.disabled = false;
            btnAddToCart.disabled = false;

            const sorted = Array.from(selectedSeats.keys()).sort();

            sorted.forEach(function (seatId) {
                const chip = document.createElement('div');
                chip.className = 'seat-chip';
                chip.innerHTML =
                    `<span class="seat-chip__code">${seatId}</span>` +
                    `<span class="seat-chip__price">$${Number(unitPrice).toLocaleString('es-AR')}</span>` +
                    `<button type="button" class="seat-chip__close" data-remove="${seatId}">` +
                        '<span class="material-symbols-outlined">close</span>' +
                    '</button>';
                seatsList.appendChild(chip);

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'amchairs[]';
                input.value = seatId;
                hiddenInputs.appendChild(input);
            });

            const total = selectedSeats.size * unitPrice;
            totalPriceEl.textContent = '$' + Number(total).toLocaleString('es-AR');
        }

        // ─── Quitar asiento desde chip del sidebar ──────────────────────

        seatsList.addEventListener('click', function (e) {
            const btn = e.target.closest('[data-remove]');
            if (!btn) return;

            const seatId = btn.dataset.remove;
            const seatEl = seatGrid.querySelector(`[data-seat="${seatId}"]`);
            if (seatEl) releaseSeat(seatEl, seatId);
        });

        // ─── Liberar todas las reservas al salir de la página ──────────

        window.addEventListener('beforeunload', function () {
            if (selectedSeats.size === 0) return;

            // Usar navigator.sendBeacon para garantizar el envío aunque la página se cierre
            const payload = JSON.stringify({ showtime_id: showtimeId });
            const blob = new Blob([payload], { type: 'application/json' });

            // sendBeacon no permite headers personalizados, usamos un Form data alternativo
            const formData = new FormData();
            formData.append('showtime_id', showtimeId);
            formData.append('_token', csrfToken);
            navigator.sendBeacon(releaseAllUrl, formData);
        });

        // ─── Toast de notificación ──────────────────────────────────────

        function showToast(message, type = 'info') {
            const existing = document.getElementById('seat-toast');
            if (existing) existing.remove();

            const colors = {
                error:   'var(--color-error, #ef4444)',
                warning: 'var(--color-warning, #f59e0b)',
                info:    'var(--color-primary-400)',
                success: 'var(--color-success, #22c55e)',
            };

            const toast = document.createElement('div');
            toast.id = 'seat-toast';
            toast.style.cssText = `
                position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%);
                background: var(--color-surface-2, #1e1e2e); color: #fff;
                padding: 12px 20px; border-radius: 10px; z-index: 9999;
                border-left: 4px solid ${colors[type] || colors.info};
                box-shadow: 0 4px 20px rgba(0,0,0,0.4);
                font-size: 0.875rem; max-width: 90vw; text-align: center;
                animation: fadeInUp 0.25s ease;
            `;
            toast.textContent = message;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 4000);
        }

        // Agrega animación keyframe si no existe
        if (!document.getElementById('seat-toast-style')) {
            const style = document.createElement('style');
            style.id = 'seat-toast-style';
            style.textContent = `
                @keyframes fadeInUp {
                    from { opacity: 0; transform: translateX(-50%) translateY(12px); }
                    to   { opacity: 1; transform: translateX(-50%) translateY(0); }
                }
                .seat--loading {
                    opacity: 0.5;
                    cursor: wait !important;
                }
                .seat--reserved {
                    background: rgba(245, 158, 11, 0.15) !important;
                    border-color: rgba(245, 158, 11, 0.5) !important;
                    cursor: not-allowed !important;
                    color: #f59e0b;
                }
                .seat-legend__swatch--reserved {
                    background: rgba(245, 158, 11, 0.15);
                    border: 1.5px solid rgba(245, 158, 11, 0.5);
                    color: #f59e0b;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
            `;
            document.head.appendChild(style);
        }

        // Sincronización inicial para mostrar reservas activas de otros usuarios
        syncSeatStatus();
    });
    </script>
    @endpush
@endsection

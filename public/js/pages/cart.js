/**
 * cart.js — Lógica unificada para el flujo de carrito y compra (asientos y éxito)
 */
document.addEventListener('DOMContentLoaded', function () {
    // ─── 1. SELECCIÓN DE ASIENTOS (ARMCHAIR) ───
    const seatGrid = document.getElementById('seatGrid');
    if (seatGrid) {
        const unitPrice = window.CinevibeData?.unitPrice ?? 0;
        const selectedSeats = new Set();

        const seatsList = document.getElementById('selectedSeatsList');
        const noSeatsMsg = document.getElementById('noSeatsMsg');
        const totalPriceEl = document.getElementById('totalPrice');
        const hiddenInputs = document.getElementById('hiddenInputs');
        const btnCheckout = document.getElementById('btnCheckout');
        const btnAddToCart = document.getElementById('btnAddToCart');

        // Alternar selección de asiento
        function toggleSeat(seatEl, seatId) {
            if (selectedSeats.has(seatId)) {
                // Deseleccionar
                selectedSeats.delete(seatId);
                seatEl.classList.remove('seat--selected');
                seatEl.classList.add('seat--available');
                seatEl.innerHTML = '';
            } else {
                // Seleccionar
                selectedSeats.add(seatId);
                seatEl.classList.remove('seat--available');
                seatEl.classList.add('seat--selected');
                seatEl.innerHTML = `<span class="seat__label">${seatId}</span>`;
            }
            updateSidebar();
        }

        // Delegación de clics en el grid
        seatGrid.addEventListener('click', function (e) {
            const seat = e.target.closest('.seat--available, .seat--selected');
            if (!seat) return;

            const seatId = seat.dataset.seat;
            toggleSeat(seat, seatId);
        });

        // Actualizar Sidebar y inputs ocultos
        function updateSidebar() {
            if (!seatsList || !hiddenInputs || !totalPriceEl) return;

            // Limpiar los chips previos
            seatsList.querySelectorAll('.seat-chip').forEach(el => el.remove());
            hiddenInputs.innerHTML = '';

            if (selectedSeats.size === 0) {
                if (noSeatsMsg) noSeatsMsg.style.display = '';
                totalPriceEl.textContent = '$0';
                if (btnCheckout) btnCheckout.disabled = true;
                if (btnAddToCart) btnAddToCart.disabled = true;
                return;
            }

            if (noSeatsMsg) noSeatsMsg.style.display = 'none';
            if (btnCheckout) btnCheckout.disabled = false;
            if (btnAddToCart) btnAddToCart.disabled = false;

            const sorted = Array.from(selectedSeats).sort();

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

        // Quitar asiento desde chip del sidebar
        if (seatsList) {
            seatsList.addEventListener('click', function (e) {
                const btn = e.target.closest('[data-remove]');
                if (!btn) return;

                const seatId = btn.dataset.remove;
                const seatEl = seatGrid.querySelector(`[data-seat="${seatId}"]`);
                if (seatEl) {
                    toggleSeat(seatEl, seatId);
                }
            });
        }
    }

    // ─── 2. PANTALLA DE ÉXITO (SUCCESS) ───
    const copyBtn = document.getElementById('copyCodeBtn');
    const codeEl = document.getElementById('redeemCode');

    if (copyBtn && codeEl) {
        copyBtn.addEventListener('click', function () {
            // Copia el texto del código al portapapeles
            navigator.clipboard.writeText(codeEl.textContent.trim()).then(function () {
                // Feedback visual de copiado exitoso
                const textEl = copyBtn.querySelector('.redeem-code-card__copy-text');
                if (textEl) {
                    const originalText = textEl.textContent;
                    textEl.textContent = '¡Copiado!';
                    copyBtn.classList.add('redeem-code-card__copy--copied');

                    setTimeout(function () {
                        textEl.textContent = originalText;
                        copyBtn.classList.remove('redeem-code-card__copy--copied');
                    }, 2000);
                }
            });
        });
    }
});

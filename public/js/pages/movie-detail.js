/**
 * movie-detail.js — Interactividad de la vista detalle de película
 */
document.addEventListener('DOMContentLoaded', function () {
    // Obtener datos globales expuestos por Laravel
    const trailerUrl = window.CinevibeData?.trailerUrl ?? '';
    const armchairRoute = window.CinevibeData?.armchairRoute ?? '';

    // Selector de fechas
    const dateSelector = document.getElementById('dateSelector');
    if (dateSelector) {
        dateSelector.querySelectorAll('.booking__date').forEach(btn => {
            btn.addEventListener('click', function () {
                dateSelector.querySelectorAll('.booking__date')
                    .forEach(b => b.classList.remove('booking__date--active'));
                this.classList.add('booking__date--active');

                // Filtra los horarios para mostrar solo los que corresponden al día seleccionado
                const selectedDate = this.dataset.date;
                filterShowtimesByDate(selectedDate);
            });
        });
    }

    // Selector de horarios
    document.querySelectorAll('.booking__time').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.booking__time')
                .forEach(b => b.classList.remove('booking__time--active'));
            this.classList.add('booking__time--active');
            updateSummary(this);
        });
    });

    /**
     * Oculta horarios que no corresponden a la fecha seleccionada.
     */
    function filterShowtimesByDate(selectedDate) {
        document.querySelectorAll('.booking__time').forEach(btn => {
            if (btn.dataset.date === selectedDate) {
                btn.style.display = '';
            } else {
                btn.style.display = 'none';
                btn.classList.remove('booking__time--active');
            }
        });

        // Activa automáticamente el primer horario visible de la fecha
        const firstVisible = document.querySelector('.booking__time[style=""], .booking__time:not([style])');
        if (firstVisible) {
            firstVisible.classList.add('booking__time--active');
            updateSummary(firstVisible);
        }
    }

    /**
     * Actualiza el resumen de la función seleccionada (hora, sala, disponibilidad y precio).
     */
    function updateSummary(timeBtn) {
        const time       = timeBtn.dataset.time  ?? '—';
        const hall       = timeBtn.dataset.hall  ?? '—';
        const seats      = parseInt(timeBtn.dataset.seats ?? 0);
        const price      = timeBtn.dataset.price ?? '3000';
        const showtimeId = timeBtn.dataset.showtimeId ?? '';
        const maxSeats   = 80;

        const summaryVal = document.getElementById('summaryVal');
        if (summaryVal) {
            summaryVal.textContent = time + ' · ' + hall;
        }

        // Muestra el precio formateado en español
        const priceDisplay = document.getElementById('priceDisplay');
        if (priceDisplay) {
            priceDisplay.textContent = '$' + Number(price).toLocaleString('es-CL');
        }

        // Actualiza href del botón Reservar con el showtime_id seleccionado
        const btnReservar = document.getElementById('btnReservar');
        if (btnReservar && showtimeId && armchairRoute) {
            btnReservar.href = armchairRoute + '?showtime_id=' + showtimeId;
        }

        const pct  = Math.round((seats / maxSeats) * 100);
        const fill = document.getElementById('seatsFill');
        if (fill) {
            fill.style.width      = pct + '%';
            fill.style.background = seats <= 15 ? '#e53935' : seats <= 35 ? '#fb8c00' : '#43a047';
        }
    }

    // ── Lógica del Modal de Tráiler (YouTube) ──
    const openTrailerBtn = document.getElementById('openTrailerBtn');
    const trailerModal = document.getElementById('trailerModal');
    const trailerIframe = document.getElementById('trailerIframe');
    const closeTrailerBtn = document.getElementById('closeTrailer');

    /**
     * Parsea un URL de YouTube y devuelve su URL de embed.
     */
    function getYouTubeEmbedUrl(url) {
        if (!url) return 'https://www.youtube.com/embed/dQw4w9WgXcQ'; // Fallback a video demo
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        const match = url.match(regExp);
        if (match && match[2].length === 11) {
            return 'https://www.youtube.com/embed/' + match[2];
        }
        return url;
    }

    if (openTrailerBtn && trailerModal) {
        openTrailerBtn.addEventListener('click', function (e) {
            e.preventDefault();
            const embedUrl = getYouTubeEmbedUrl(trailerUrl);
            if (trailerIframe) {
                trailerIframe.src = embedUrl + "?autoplay=1";
            }
            trailerModal.classList.add('movie-trailer-modal--active');
            document.body.style.overflow = 'hidden'; // Evita scroll de fondo
        });
    }

    function closeTrailerModal() {
        if (trailerModal) {
            trailerModal.classList.remove('movie-trailer-modal--active');
            if (trailerIframe) {
                trailerIframe.src = ""; // Detiene la reproducción del vídeo
            }
            document.body.style.overflow = ''; // Restaura scroll
        }
    }

    if (closeTrailerBtn) {
        closeTrailerBtn.addEventListener('click', closeTrailerModal);
    }

    if (trailerModal) {
        trailerModal.addEventListener('click', function (e) {
            if (e.target === trailerModal) {
                closeTrailerModal();
            }
        });
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeTrailerModal();
        }
    });

    // Inicializa con la primer fecha activa al cargar la página
    const firstDate = document.querySelector('#dateSelector .booking__date--active');
    if (firstDate) {
        filterShowtimesByDate(firstDate.dataset.date);
    }
});

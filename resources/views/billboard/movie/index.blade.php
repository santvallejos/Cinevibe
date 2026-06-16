@extends('layouts.navbar-y-footer.app')

{{-- Título dinámico usando el nombre de la película --}}
@section('title', $movie->name . ' — Cinevibe')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/movie-detail.css') }}">
    <style>
        /* Estilos personalizados para la mejora de UI/UX de la película */
        .movie-title-large {
            font-family: var(--font-headline);
            font-size: 2.6rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 20px;
            text-transform: none;
            letter-spacing: -1px;
            line-height: 1.15;
        }

        /* Overlay interactivo para el Tráiler */
        .movie-featured-img {
            cursor: pointer;
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .movie-featured-img:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(229, 9, 20, 0.25);
        }
        .movie-featured-img__play-btn {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(10, 10, 15, 0.45);
            transition: all 0.3s ease;
        }
        .movie-featured-img:hover .movie-featured-img__play-btn {
            background: rgba(10, 10, 15, 0.75);
        }
        .movie-featured-img__play-btn span.material-symbols-outlined {
            font-size: 64px;
            color: #fff;
            text-shadow: 0 0 20px rgba(229, 9, 20, 0.8);
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .movie-featured-img:hover .movie-featured-img__play-btn span.material-symbols-outlined {
            transform: scale(1.12);
            color: #e50914;
        }
        .movie-featured-img__play-text {
            margin-top: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #fff;
            opacity: 0.9;
        }

        /* Ficha técnica y sinopsis a la izquierda */
        .movie-left-details {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .movie-left-details__block {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            transition: all 0.2s ease;
        }
        .movie-left-details__block:hover {
            border-color: rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.03);
        }
        .movie-left-details__title {
            font-family: var(--font-headline);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--color-neutral-500, #737373);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .movie-left-details__title::before {
            content: '';
            display: inline-block;
            width: 3px;
            height: 12px;
            background: #e50914;
            border-radius: 2px;
        }
        .movie-left-details__text {
            font-size: 0.9rem;
            line-height: 1.7;
            color: #a0a0b0;
            margin: 0;
        }
        .movie-left-details__genres {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .movie-ficha-simple {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .movie-ficha-simple__item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.9rem;
            color: #e5e2e1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            padding-bottom: 8px;
        }
        .movie-ficha-simple__item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        .movie-ficha-simple__item--column {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
        .movie-ficha-simple__label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.72rem;
            font-weight: 700;
            color: #737373;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .movie-ficha-simple__label span {
            font-size: 14px;
        }
        .movie-ficha-simple__val {
            font-weight: 600;
            color: #ffffff;
        }
        .movie-ficha-simple__formats {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }
        .movie-ficha-simple__fmt {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.68rem;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #bbb;
        }

        /* Modal de Tráiler (YouTube) */
        .movie-trailer-modal {
            position: fixed;
            inset: 0;
            z-index: 2000;
            background: rgba(10, 10, 15, 0.94);
            backdrop-filter: blur(16px);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .movie-trailer-modal--active {
            opacity: 1;
            pointer-events: auto;
        }
        .movie-trailer-modal__content {
            position: relative;
            width: 90%;
            max-width: 900px;
            background: #0f0f23;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
            overflow: hidden;
            transform: scale(0.95);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .movie-trailer-modal--active .movie-trailer-modal__content {
            transform: scale(1);
        }
        .movie-trailer-modal__close {
            position: absolute;
            top: 15px;
            right: 20px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.2s;
        }
        .movie-trailer-modal__close:hover {
            background: #e50914;
            transform: scale(1.1);
        }
        .movie-trailer-modal__video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* Relación de aspecto 16:9 */
            height: 0;
        }
        .movie-trailer-modal__video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 768px) {
            .movie-title-large {
                font-size: 2rem;
                margin-top: 10px;
            }
        }
    </style>
@endpush

@section('content')
    <main class="movie-page">

        {{-- Grid principal de la página de detalle --}}
        <section class="movie-content">
            <div class="movie-layout">

                {{-- Columna izquierda: póster de la película + sinopsis e info --}}
                <div class="movie-layout__poster">
                    <div class="movie-featured-img" id="openTrailerBtn">
                        {{-- Imagen dinámica con fallback si no hay --}}
                        <img
                            src="{{ $movie->image_url ? asset($movie->image_url) : asset('img/peliculas/default.jpg') }}"
                            alt="{{ $movie->name }}"
                            class="movie-featured-img__img"
                            onerror="this.onerror=null; this.src='{{ asset('img/peliculas/default.jpg') }}';"
                        >
                        {{-- Indicación visual de play --}}
                        <div class="movie-featured-img__play-btn">
                            <span class="material-symbols-outlined">play_circle</span>
                            <span class="movie-featured-img__play-text">Ver Tráiler</span>
                        </div>
                    </div>

                    {{-- Detalles e información debajo de la foto --}}
                    <div class="movie-left-details">
                        {{-- Categoría / géneros --}}
                        <div class="movie-left-details__block">
                            <h4 class="movie-left-details__title">Categoría</h4>
                            <div class="movie-left-details__genres">
                                @foreach(explode(',', $movie->category) as $genre)
                                    <span class="movie-genre-tag">{{ trim($genre) }}</span>
                                @endforeach
                            </div>
                        </div>

                        {{-- Sinopsis / descripción --}}
                        <div class="movie-left-details__block">
                            <h4 class="movie-left-details__title">Sinopsis</h4>
                            <p class="movie-left-details__text">
                                {{ $movie->description ?? 'Sin sinopsis disponible.' }}
                            </p>
                        </div>

                        {{-- Ficha técnica simplificada (sin estado) --}}
                        <div class="movie-left-details__block">
                            <h4 class="movie-left-details__title">Ficha Técnica</h4>
                            <div class="movie-ficha-simple">
                                <div class="movie-ficha-simple__item">
                                    <span class="movie-ficha-simple__label">
                                        <span class="material-symbols-outlined">schedule</span> Duración
                                    </span>
                                    <span class="movie-ficha-simple__val">{{ $movie->duration }}</span>
                                </div>
                                <div class="movie-ficha-simple__item">
                                    <span class="movie-ficha-simple__label">
                                        <span class="material-symbols-outlined">calendar_today</span> Estreno
                                    </span>
                                    <span class="movie-ficha-simple__val">
                                        {{ $movie->datepremire ? $movie->datepremire->format('d/m/Y') : '—' }}
                                    </span>
                                </div>
                                @if($movie->showtimes->count() > 0)
                                    <div class="movie-ficha-simple__item movie-ficha-simple__item--column">
                                        <span class="movie-ficha-simple__label">
                                            <span class="material-symbols-outlined">videocam</span> Salas Disponibles
                                        </span>
                                        <div class="movie-ficha-simple__formats">
                                            @foreach($movie->showtimes->unique('theater_id') as $showtime)
                                                <span class="movie-ficha-simple__fmt">{{ $showtime->theater->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Columna derecha: título + widget de reserva --}}
                <div class="movie-layout__info">

                    {{-- Título de la película --}}
                    <h2 class="movie-title-large">{{ $movie->name }}</h2>

                    {{-- Widget de booking: solo si hay funciones disponibles --}}
                    @if($movie->showtimes->count() > 0)
                        <div class="booking">

                            <h3 class="booking__title">
                                <span class="material-symbols-outlined material-symbols-outlined--fill">local_activity</span>
                                Reserve tu Función
                            </h3>

                            {{-- Selector de fechas: generado dinámicamente desde los showtimes --}}
                            <div class="booking__section">
                                <label class="booking__label">
                                    <span class="material-symbols-outlined">calendar_today</span>
                                    Fecha
                                </label>
                                <div class="booking__dates hide-scrollbar" id="dateSelector">
                                    @foreach($movie->showtimes->groupBy(fn($st) => \Carbon\Carbon::parse($st->datetime)->format('Y-m-d')) as $date => $group)
                                        @php $carbon = \Carbon\Carbon::parse($date); @endphp
                                        <div
                                            class="booking__date {{ $loop->first ? 'booking__date--active' : '' }}"
                                            data-date="{{ $date }}"
                                        >
                                            <span class="booking__date-dow">{{ strtoupper(substr($carbon->locale('es')->dayName, 0, 3)) }}</span>
                                            <span class="booking__date-num">{{ $carbon->format('d') }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Selector de horarios agrupados por sala --}}
                            <div class="booking__section">
                                <label class="booking__label">
                                    <span class="material-symbols-outlined">schedule</span>
                                    Horario y Sala
                                </label>

                                @foreach($movie->showtimes->groupBy('theater_id') as $theaterId => $showtimes)
                                    @php
                                        $theater = $showtimes->first()->theater;
                                        $theaterName = $theater->name;
                                        $theaterPrice = $theater->price ?? '3000';
                                    @endphp
                                    <div class="booking__times-group">
                                        <div class="booking__times-label booking__times-label--gold">
                                            <span class="material-symbols-outlined material-symbols-outlined--fill">workspace_premium</span>
                                            {{ $theaterName }}
                                        </div>
                                        <div class="booking__times" id="timeSelector">
                                            @foreach($showtimes as $showtime)
                                                @php $price = $showtime->theater->price ?? '3000'; @endphp
                                                <span
                                                    class="booking__time {{ $loop->first && $loop->parent->first ? 'booking__time--active' : '' }}"
                                                    data-time="{{ \Carbon\Carbon::parse($showtime->datetime)->format('H:i') }}"
                                                    data-hall="{{ $theaterName }}"
                                                    data-showtime-id="{{ $showtime->id }}"
                                                    data-date="{{ \Carbon\Carbon::parse($showtime->datetime)->format('Y-m-d') }}"
                                                    data-seats="50"
                                                    data-price="{{ $price }}"
                                                >
                                                    {{ \Carbon\Carbon::parse($showtime->datetime)->format('H:i') }}
                                                    <span class="booking__time-price">${{ number_format((float) $price, 0, ',', '.') }}</span>
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Barra indicadora de ocupación de butacas --}}
                            <div class="booking__seats-bar">
                                <div class="booking__seats-info">
                                    <span class="material-symbols-outlined">event_seat</span>
                                    <span id="seatsText">Selecciona un horario</span>
                                </div>
                                <div class="booking__seats-track">
                                    <div class="booking__seats-fill" id="seatsFill" style="width:0%;"></div>
                                </div>
                            </div>

                            {{-- Footer del widget: resumen seleccionado + precio + botón de reserva --}}
                            <div class="booking__footer">
                                <div class="booking__summary">
                                    <div class="booking__summary-label">
                                        Seleccionado:
                                        <span class="booking__summary-val" id="summaryVal">—</span>
                                    </div>
                                    <div class="booking__price" id="priceDisplay">—</div>
                                </div>

                                {{-- Botón que redirige al flujo de selección de butacas con showtime_id --}}
                                <a
                                    href="#"
                                    class="btn btn--primary btn--block btn--lg"
                                    id="btnReservar"
                                >
                                    <span class="material-symbols-outlined material-symbols-outlined--fill">confirmation_number</span>
                                    Reservar Asientos
                                </a>

                                <p class="booking__hint">
                                    <span class="material-symbols-outlined">info</span>
                                    Lugares limitados disponibles
                                </p>
                            </div>

                        </div>{{-- /booking --}}

                    @else
                        {{-- Mensaje cuando la película no tiene funciones asignadas aún --}}
                        <div class="booking">
                            <p style="text-align:center; padding: 2rem; color: var(--color-text-muted);">
                                <span class="material-symbols-outlined" style="display:block; font-size:2.5rem; margin-bottom:.5rem;">event_busy</span>
                                No hay funciones disponibles para esta película en este momento.
                            </p>
                        </div>
                    @endif

                </div>{{-- /movie-layout__info --}}

            </div>{{-- /movie-layout --}}
        </section>
    </main>

    {{-- Modal de Tráiler (YouTube) --}}
    <div id="trailerModal" class="movie-trailer-modal">
        <div class="movie-trailer-modal__content">
            <button class="movie-trailer-modal__close" id="closeTrailer">&times;</button>
            <div class="movie-trailer-modal__video-wrapper">
                <iframe id="trailerIframe" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        // Selector de fechas
        document.querySelectorAll('#dateSelector .booking__date').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('#dateSelector .booking__date')
                    .forEach(b => b.classList.remove('booking__date--active'));
                this.classList.add('booking__date--active');

                // Filtra los horarios para mostrar solo los que corresponden al día seleccionado
                const selectedDate = this.dataset.date;
                filterShowtimesByDate(selectedDate);
            });
        });

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

            document.getElementById('summaryVal').textContent = time + ' · ' + hall;
            document.getElementById('seatsText').textContent  = seats + ' butacas disponibles';
            
            // Muestra el precio formateado en español
            document.getElementById('priceDisplay').textContent = '$' + Number(price).toLocaleString('es-CL');

            // Actualiza href del botón Reservar con el showtime_id seleccionado
            const btnReservar = document.getElementById('btnReservar');
            if (btnReservar && showtimeId) {
                btnReservar.href = '{{ route('armchair.index') }}?showtime_id=' + showtimeId;
            }

            const pct  = Math.round((seats / maxSeats) * 100);
            const fill = document.getElementById('seatsFill');
            fill.style.width      = pct + '%';
            fill.style.background = seats <= 15 ? '#e53935' : seats <= 35 ? '#fb8c00' : '#43a047';
        }

        // ── Lógica del Modal de Tráiler (YouTube) ──
        const openTrailerBtn = document.getElementById('openTrailerBtn');
        const trailerModal = document.getElementById('trailerModal');
        const trailerIframe = document.getElementById('trailerIframe');
        const closeTrailerBtn = document.getElementById('closeTrailer');
        const trailerUrl = @json($movie->trailer_url);

        /**
         * Parsea un URL de YouTube y devuelve su URL de embed.
         * Si no existe o no coincide, retorna un fallback funcional.
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
                trailerIframe.src = embedUrl + "?autoplay=1";
                trailerModal.classList.add('movie-trailer-modal--active');
                document.body.style.overflow = 'hidden'; // Evita scroll de fondo
            });
        }

        function closeTrailerModal() {
            if (trailerModal) {
                trailerModal.classList.remove('movie-trailer-modal--active');
                trailerIframe.src = ""; // Detiene la reproducción del vídeo
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
        if (firstDate) filterShowtimesByDate(firstDate.dataset.date);

    });
    </script>
    @endpush

@endsection

@extends('layouts.navbar-y-footer.app')

{{-- Título dinámico usando el nombre de la película --}}
@section('title', $movie->name . ' — Cinevibe')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/movie-detail.css') }}">
@endpush

@section('content')
    <main class="movie-page">

        {{-- ── Grid principal de la página de detalle ── --}}
        <section class="movie-content">
            <div class="movie-layout">

                {{-- ── Columna izquierda: póster de la película ── --}}
                <div class="movie-layout__poster">
                    <div class="movie-featured-img">
                        {{-- Imagen dinámica: usa image_url si existe, si no muestra un placeholder --}}
                        <img
                            src="{{ $movie->image_url ? asset($movie->image_url) : asset('img/peliculas/default.jpg') }}"
                            alt="{{ $movie->name }}"
                            class="movie-featured-img__img"
                        >
                        <div class="movie-featured-img__overlay">
                            <div class="movie-featured-img__pills">
                                {{-- Badge de estado (Estreno, En cartelera, etc.) --}}
                                <span class="movie-pill movie-pill--gold">
                                    <span class="material-symbols-outlined material-symbols-outlined--fill">sell</span>
                                    {{ strtoupper($movie->state) }}
                                </span>
                                {{-- Categoría / género de la película --}}
                                <span class="movie-pill">{{ $movie->category }}</span>
                                {{-- Duración de la película --}}
                                <span class="movie-pill">{{ $movie->duration }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Columna derecha: información + booking ── --}}
                <div class="movie-layout__info">

                    {{-- Sinopsis --}}
                    <div class="movie-block">
                        <h3 class="movie-block__title">{{ $movie->name }}</h3>

                        {{-- Categoría como tags --}}
                        <div class="movie-block__genres">
                            @foreach(explode(',', $movie->category) as $genre)
                                <span class="movie-genre-tag">{{ trim($genre) }}</span>
                            @endforeach
                        </div>

                        {{-- Descripción de la película (si existe) --}}
                        @if($movie->description)
                            <p class="movie-block__text">{{ $movie->description }}</p>
                        @else
                            <p class="movie-block__text movie-block__text--muted">Sin sinopsis disponible.</p>
                        @endif
                    </div>

                    {{-- Ficha técnica --}}
                    <div class="movie-block">
                        <h3 class="movie-block__title">Ficha Técnica</h3>
                        <div class="movie-ficha">

                            {{-- Fila: Duración y Fecha de estreno --}}
                            <div class="movie-ficha__row">
                                <div class="movie-ficha__item">
                                    <span class="movie-ficha__label">
                                        <span class="material-symbols-outlined">schedule</span>
                                        Duración
                                    </span>
                                    <span class="movie-ficha__val">{{ $movie->duration }}</span>
                                </div>
                                <div class="movie-ficha__item">
                                    <span class="movie-ficha__label">
                                        <span class="material-symbols-outlined">calendar_today</span>
                                        Fecha de estreno
                                    </span>
                                    <span class="movie-ficha__val">
                                        {{-- Formatea la fecha en español si está disponible --}}
                                        {{ $movie->datepremire ? $movie->datepremire->format('d/m/Y') : '—' }}
                                    </span>
                                </div>
                            </div>

                            {{-- Salas donde se proyecta (extraída de los showtimes) --}}
                            @if($movie->showtimes->count() > 0)
                                <div class="movie-ficha__item">
                                    <span class="movie-ficha__label">
                                        <span class="material-symbols-outlined">videocam</span>
                                        Salas disponibles
                                    </span>
                                    <div class="movie-ficha__formats">
                                        {{-- Agrupa los showtimes por sala para no repetir --}}
                                        @foreach($movie->showtimes->unique('theater_id') as $showtime)
                                            <span class="movie-ficha__fmt">{{ $showtime->theater->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            {{-- Estado de la película --}}
                            <div class="movie-ficha__item">
                                <span class="movie-ficha__label">
                                    <span class="material-symbols-outlined">label</span>
                                    Estado
                                </span>
                                <span class="movie-ficha__val">{{ $movie->state }}</span>
                            </div>

                        </div>
                    </div>

                    {{-- ── Widget de booking: solo si hay funciones disponibles ── --}}
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
                                    {{-- Agrupa los showtimes por día para no repetir la misma fecha --}}
                                    @foreach($movie->showtimes->groupBy(fn($st) => \Carbon\Carbon::parse($st->datetime)->format('Y-m-d')) as $date => $group)
                                        @php $carbon = \Carbon\Carbon::parse($date); @endphp
                                        <div
                                            class="booking__date {{ $loop->first ? 'booking__date--active' : '' }}"
                                            data-date="{{ $date }}"
                                        >
                                            {{-- Nombre del día de la semana abreviado en español --}}
                                            <span class="booking__date-dow">{{ strtoupper(substr($carbon->locale('es')->dayName, 0, 3)) }}</span>
                                            <span class="booking__date-num">{{ $carbon->format('d') }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Selector de horarios: generado dinámicamente desde los showtimes --}}
                            <div class="booking__section">
                                <label class="booking__label">
                                    <span class="material-symbols-outlined">schedule</span>
                                    Horario
                                </label>

                                {{-- Agrupa los horarios por sala --}}
                                @foreach($movie->showtimes->groupBy('theater_id') as $theaterId => $showtimes)
                                    @php $theaterName = $showtimes->first()->theater->name; @endphp
                                    <div class="booking__times-group">
                                        <div class="booking__times-label booking__times-label--gold">
                                            <span class="material-symbols-outlined material-symbols-outlined--fill">workspace_premium</span>
                                            {{ $theaterName }}
                                        </div>
                                        <div class="booking__times" id="timeSelector">
                                            @foreach($showtimes as $showtime)
                                                <span
                                                    class="booking__time {{ $loop->first && $loop->parent->first ? 'booking__time--active' : '' }}"
                                                    data-time="{{ \Carbon\Carbon::parse($showtime->datetime)->format('H:i') }}"
                                                    data-hall="{{ $theaterName }}"
                                                    data-showtime-id="{{ $showtime->id }}"
                                                    data-date="{{ \Carbon\Carbon::parse($showtime->datetime)->format('Y-m-d') }}"
                                                    data-seats="50"
                                                >
                                                    {{ \Carbon\Carbon::parse($showtime->datetime)->format('H:i') }}
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

                            {{-- Footer del widget: resumen seleccionado + botón de reserva --}}
                            <div class="booking__footer">
                                <div class="booking__summary">
                                    <div class="booking__summary-label">
                                        Seleccionado:
                                        <span class="booking__summary-val" id="summaryVal">—</span>
                                    </div>
                                    <div class="booking__price" id="priceDisplay">—</div>
                                </div>

                                {{-- Botón que redirige al flujo de selección de butacas --}}
                                <a
                                    href="{{ route('armchair.index') }}"
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

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        // ── Selector de fechas ──
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

        // ── Selector de horarios ──
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
         * Compara el atributo data-date de cada span de horario.
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
         * Actualiza el resumen de la función seleccionada (hora, sala, disponibilidad).
         */
        function updateSummary(timeBtn) {
            const time     = timeBtn.dataset.time  ?? '—';
            const hall     = timeBtn.dataset.hall  ?? '—';
            const seats    = parseInt(timeBtn.dataset.seats ?? 0);
            const maxSeats = 80;

            document.getElementById('summaryVal').textContent = time + ' · ' + hall;
            document.getElementById('seatsText').textContent  = seats + ' butacas disponibles';
            document.getElementById('priceDisplay').textContent = 'Disponible';

            const pct  = Math.round((seats / maxSeats) * 100);
            const fill = document.getElementById('seatsFill');
            fill.style.width      = pct + '%';
            fill.style.background = seats <= 15 ? '#e53935' : seats <= 35 ? '#fb8c00' : '#43a047';
        }

        // Inicializa con la primer fecha activa al cargar la página
        const firstDate = document.querySelector('#dateSelector .booking__date--active');
        if (firstDate) filterShowtimesByDate(firstDate.dataset.date);

    });
    </script>
    @endpush

@endsection

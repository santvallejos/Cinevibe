@extends('layouts.navbar-y-footer.app')

@section('title', 'Michael')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movie-details.css') }}">
@endpush
@section('content')
    <main class="movie-page">

        {{-- Hero --}}
        <section class="movie-hero">
            <div class="movie-hero__bg"
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD9jzebMfnzPkQ8S68AErQ20LsyY63MCeO6PBcEHna_5t20gQpkWInTNHmDk_JUHXLtbCwfY7wZV-jt-eKwspEUpp-Le5_yT6jrW6vlrXEwIScGjKMm9wmWPkO7a_iq6nj5VydOGF9_8vZje6x1tVzDRysXmJfAvG599Nc9hHeD1ZmzaWDhy1y2nReAmgWLXXaCsZDMOkfSEyhVKPC-bJ2cgB744ECqahsuyCUegENMasZjU_9jXy6w76F4ciCPZqcTByayYnghf5xF');">
            </div>
            <div class="movie-hero__gradient"></div>

            <div class="movie-hero__content">
                <div class="movie-hero__wrap">
                    <div class="movie-hero__kicker">
                        <span class="material-symbols-outlined material-symbols-outlined--fill">star</span>
                        Premium Experience
                    </div>
                    <h1 class="movie-hero__title">MICHAEL</h1>
                    <div class="movie-hero__meta">
                        <span class="movie-hero__imdb">IMDb 8.9</span>
                        <span>Biografía</span>
                        <span>1h 38m</span>
                        <span>23 Abril, 2026</span>
                        <span class="movie-hero__badge">4K • Atmos</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- Grid principal --}}
        <section class="movie-content">
            <div class="movie-content__grid movie-content__grid--wide-aside">

                {{-- ── Columna izquierda ── --}}
                <div class="movie-content__main">

                    {{-- ★ Imagen destacada — tag corregido --}}
                    <div class="movie-featured-img">
                        <img
                            src="{{ asset('img/peliculas/MichaelJacjkson.jpg') }}"
                            alt="Michael"
                            class="movie-featured-img__img"
                        >
                        <div class="movie-featured-img__overlay">
                            <div class="movie-featured-img__pills">
                                <span class="movie-pill movie-pill--gold">
                                    <span class="material-symbols-outlined material-symbols-outlined--fill">star</span>
                                    IMDb 8.9
                                </span>
                                <span class="movie-pill">4K Ultra HD</span>
                                <span class="movie-pill">Dolby Atmos</span>
                            </div>
                        </div>
                    </div>

                    {{-- Sinopsis --}}
                    <div class="movie-block">
                        <div class="movie-block__genres">
                            <span class="movie-genre-tag">Biografía</span>
                            <span class="movie-genre-tag">Drama</span>
                        </div>
                        <p class="movie-block__text">
                            La película narra la vida de Michael Jackson más allá de la música, recorriendo su trayectoria desde el descubrimiento de su extraordinario talento como líder de los Jackson Five hasta convertirse en un artista visionario cuya ambición creativa le impulsó a convertirse en el artista más grande del mundo. Destacando tanto su vida fuera del escenario como algunas de las actuaciones más emblemáticas de sus inicios en solitario, la película ofrece al público un asiento en primera fila para ver a Michael Jackson como nunca antes. Aquí es donde comienza su historia
                        </p>
                    </div>

                    {{-- Ficha técnica --}}
                    <div class="movie-block">
                        <h3 class="movie-block__title">Información</h3>
                        <div class="movie-ficha">

                            <div class="movie-ficha__item">
                                <span class="movie-ficha__label">
                                    <span class="material-symbols-outlined">videocam</span>
                                    Formatos disponibles
                                </span>
                                <div class="movie-ficha__formats">
                                    <span class="movie-ficha__fmt">2D</span>
                                    <span class="movie-ficha__fmt">4D E-MOTION</span>
                                    <span class="movie-ficha__fmt">COMFORT</span>
                                    <span class="movie-ficha__fmt">XD DIGITAL</span>
                                    <span class="movie-ficha__fmt">D-BOX</span>
                                    <span class="movie-ficha__fmt movie-ficha__fmt--gold">PREMIUM CLASS</span>
                                </div>
                            </div>

                            <div class="movie-ficha__row">
                                <div class="movie-ficha__item">
                                    <span class="movie-ficha__label">
                                        <span class="material-symbols-outlined">schedule</span>
                                        Duración
                                    </span>
                                    <span class="movie-ficha__val">1h 38m</span>
                                </div>
                                <div class="movie-ficha__item">
                                    <span class="movie-ficha__label">
                                        <span class="material-symbols-outlined">calendar_today</span>
                                        Fecha de estreno
                                    </span>
                                    <span class="movie-ficha__val">23 Abril, 2026</span>
                                </div>
                            </div>

                            <div class="movie-ficha__item">
                                <span class="movie-ficha__label">
                                    <span class="material-symbols-outlined">business</span>
                                    Distribuidor
                                </span>
                                <span class="movie-ficha__val">UNITED INTERNATIONAL PICTURES S.R.L.</span>
                            </div>

                            <div class="movie-ficha__item">
                                <span class="movie-ficha__label">
                                    <span class="material-symbols-outlined">groups</span>
                                    Actores y Director
                                </span>
                                <span class="movie-ficha__val movie-ficha__val--muted">Próximamente</span>
                            </div>

                        </div>
                    </div>

                </div>{{-- /movie-content__main --}}

                {{-- ── ASIDE: booking widget ── --}}
                <aside class="movie-content__aside">
                    <div class="booking">

                        <h3 class="booking__title">
                            <span class="material-symbols-outlined material-symbols-outlined--fill">local_activity</span>
                            Reserve tu Función
                        </h3>

                        {{-- Fechas --}}
                        <div class="booking__section">
                            <label class="booking__label">
                                <span class="material-symbols-outlined">calendar_today</span>
                                Fecha
                            </label>
                            <div class="booking__dates hide-scrollbar" id="dateSelector">
                                <div class="booking__date booking__date--active" data-date="24">
                                    <span class="booking__date-dow">JUE</span>
                                    <span class="booking__date-num">24</span>
                                </div>
                                <div class="booking__date" data-date="25">
                                    <span class="booking__date-dow">VIE</span>
                                    <span class="booking__date-num">25</span>
                                </div>
                                <div class="booking__date" data-date="26">
                                    <span class="booking__date-dow">SÁB</span>
                                    <span class="booking__date-num">26</span>
                                </div>
                                <div class="booking__date" data-date="27">
                                    <span class="booking__date-dow">DOM</span>
                                    <span class="booking__date-num">27</span>
                                </div>
                                <div class="booking__date" data-date="28">
                                    <span class="booking__date-dow">LUN</span>
                                    <span class="booking__date-num">28</span>
                                </div>
                            </div>
                        </div>

                        {{-- Formato --}}
                        <div class="booking__section">
                            <label class="booking__label">
                                <span class="material-symbols-outlined">videocam</span>
                                Formato
                            </label>
                            <div class="booking__formats" id="formatSelector">
                                <button class="booking__fmt booking__fmt--active"  data-format="2D"            data-price="1500">2D</button>
                                <button class="booking__fmt"                        data-format="4D E-MOTION"   data-price="2400">4D E-MOTION</button>
                                <button class="booking__fmt"                        data-format="COMFORT"       data-price="1800">COMFORT</button>
                                <button class="booking__fmt"                        data-format="XD DIGITAL"    data-price="1900">XD DIGITAL</button>
                                <button class="booking__fmt"                        data-format="D-BOX"         data-price="2200">D-BOX</button>
                                <button class="booking__fmt booking__fmt--premium"  data-format="PREMIUM CLASS" data-price="2800">PREMIUM CLASS</button>
                            </div>
                        </div>

                        {{-- Horarios --}}
                        <div class="booking__section">
                            <label class="booking__label">
                                <span class="material-symbols-outlined">schedule</span>
                                Horario
                            </label>

                            <div class="booking__times-group">
                                <div class="booking__times-label booking__times-label--gold">
                                    <span class="material-symbols-outlined material-symbols-outlined--fill">workspace_premium</span>
                                    Gold Class · Dolby Cinema
                                </div>
                                <div class="booking__times" id="timeSelector">
                                    <span class="booking__time" data-time="14:30" data-hall="Sala 1" data-seats="48">14:30</span>
                                    <span class="booking__time" data-time="17:45" data-hall="Sala 1" data-seats="32">17:45</span>
                                    <span class="booking__time booking__time--active" data-time="20:15" data-hall="Sala 4" data-seats="12">20:15</span>
                                    <span class="booking__time" data-time="22:00" data-hall="Sala 4" data-seats="60">22:00</span>
                                </div>
                            </div>

                            <div class="booking__times-group">
                                <div class="booking__times-label booking__times-label--muted">
                                    <span class="material-symbols-outlined">movie</span>
                                    Standard · 4K Laser
                                </div>
                                <div class="booking__times">
                                    <span class="booking__time" data-time="15:00" data-hall="Sala 2" data-seats="75">15:00</span>
                                    <span class="booking__time" data-time="18:30" data-hall="Sala 2" data-seats="50">18:30</span>
                                    <span class="booking__time" data-time="21:15" data-hall="Sala 3" data-seats="20">21:15</span>
                                </div>
                            </div>
                        </div>

                        {{-- Barra de butacas --}}
                        <div class="booking__seats-bar">
                            <div class="booking__seats-info">
                                <span class="material-symbols-outlined">event_seat</span>
                                <span id="seatsText">12 butacas disponibles</span>
                            </div>
                            <div class="booking__seats-track">
                                <div class="booking__seats-fill" id="seatsFill" style="width:15%;background:#e53935;"></div>
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="booking__footer">
                            <div class="booking__summary">
                                <div class="booking__summary-label">
                                    Seleccionado:
                                    <span class="booking__summary-val" id="summaryVal">20:15 · Sala 4</span>
                                </div>
                                <div class="booking__price" id="priceDisplay">$1.500</div>
                            </div>
                            <button class="btn btn--primary btn--block btn--lg" id="btnReservar">
                                <span class="material-symbols-outlined material-symbols-outlined--fill">confirmation_number</span>
                                Reservar Asientos
                            </button>
                            <p class="booking__hint">
                                <span class="material-symbols-outlined">info</span>
                                Lugares limitados disponibles
                            </p>
                        </div>

                    </div>
                </aside>

            </div>
        </section>
    </main>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('#dateSelector .booking__date').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('#dateSelector .booking__date')
                    .forEach(b => b.classList.remove('booking__date--active'));
                this.classList.add('booking__date--active');
            });
        });

        document.querySelectorAll('#formatSelector .booking__fmt').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('#formatSelector .booking__fmt')
                    .forEach(b => b.classList.remove('booking__fmt--active'));
                this.classList.add('booking__fmt--active');
                updatePrice();
            });
        });

        document.querySelectorAll('.booking__time').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.booking__time')
                    .forEach(b => b.classList.remove('booking__time--active'));
                this.classList.add('booking__time--active');
                updateSummary(this);
            });
        });

        function updatePrice() {
            const fmtBtn = document.querySelector('#formatSelector .booking__fmt--active');
            const price  = fmtBtn ? parseInt(fmtBtn.dataset.price) : 1500;
            document.getElementById('priceDisplay').textContent = '$' + price.toLocaleString('es-AR');
        }

        function updateSummary(timeBtn) {
            const time     = timeBtn.dataset.time  ?? '—';
            const hall     = timeBtn.dataset.hall  ?? '—';
            const seats    = parseInt(timeBtn.dataset.seats ?? 0);
            const maxSeats = 80;

            document.getElementById('summaryVal').textContent = time + ' · ' + hall;
            document.getElementById('seatsText').textContent  = seats + ' butacas disponibles';

            const pct  = Math.round((seats / maxSeats) * 100);
            const fill = document.getElementById('seatsFill');
            fill.style.width      = pct + '%';
            fill.style.background = seats <= 15 ? '#e53935' : seats <= 35 ? '#fb8c00' : '#43a047';
        }

        document.getElementById('btnReservar').addEventListener('click', function () {
            const time   = document.querySelector('.booking__time--active')?.dataset.time    ?? '—';
            const hall   = document.querySelector('.booking__time--active')?.dataset.hall    ?? '—';
            const format = document.querySelector('#formatSelector .booking__fmt--active')?.dataset.format ?? '—';
            const date   = document.querySelector('#dateSelector .booking__date--active')?.dataset.date    ?? '—';
            alert(`Reservando:\nFecha: ${date}\nHorario: ${time}\nSala: ${hall}\nFormato: ${format}`);
        });
    });
    </script>
    @endpush

@endsection
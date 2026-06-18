@extends('layouts.navbar-y-footer.app')

{{-- Título dinámico usando el nombre de la película --}}
@section('title', $movie->name . ' — Cinevibe')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/movie-detail.css') }}">
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
        window.CinevibeData = {
            trailerUrl: @json($movie->trailer_url),
            armchairRoute: "{{ route('armchair.index') }}"
        };
    </script>
    <script src="{{ asset('js/pages/movie-detail.js') }}"></script>
    @endpush

@endsection

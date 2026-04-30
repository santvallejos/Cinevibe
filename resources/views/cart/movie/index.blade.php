@extends('layouts.sin-navbar.app')

@section('title', 'Selección de Película — Cinevibe')

@push('styles')
    <link href="{{ asset('vendor/bootstrap/css/pages/cart-movie.css') }}" rel="stylesheet">
@endpush

@section('content')
    <main class="movie-main">

        {{-- ===== HERO: imagen de portada + título y metadatos --}}
        <section class="movie-hero">
            {{-- Imagen de fondo vía inline style (dinámica por película) --}}
            <div class="movie-hero__bg"
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBMtPAZeDld5kH6F1Hg2bvbAdoDk5_TM9k6n1tWvvNXW2W33I2yA1WovgG3apK3vRMYRcWVc-0OYUrCjAHxNtCWXs4Gv9Acpkdsx1Q59GuIMLuOKnKUZy2V2F8wH-YbXY13qhrJ-OuDTCX52269wIvlZrWumlHdLOi8J5inu8l-eYiaVlTwe-oldt5B4OTcu_sbRthT77BRQ3xlLqckQo-FtEiUGEGSfsKy7k8naGNwZttxaN0miL_zVGMj5JsovRm4ncbw-GmkIf5C');">
            </div>
            <div class="movie-hero__overlay"></div>

            <div class="movie-hero__content">
                <span class="movie-hero__badge">Now Showing</span>
                <h1 class="movie-hero__title">INTERSTELLAR</h1>
                <div class="movie-hero__meta">
                    <span>Sci-Fi / Adventure</span>
                    <span class="movie-hero__dot"></span>
                    <span>169 min</span>
                    <span class="movie-hero__dot"></span>
                    <span class="movie-hero__rating">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        8.6
                    </span>
                </div>
            </div>
        </section>

        {{-- ===== PANEL DE CONFIGURACIÓN: Preferencias (izq) + Horarios (der) --}}
        <section class="movie-config">

            {{-- Columna izquierda: versión de audio + formato de sala --}}
            <div class="movie-prefs">

                {{-- Selector de versión: Original o Doblada --}}
                <div>
                    <h3 class="movie-prefs__title">Audio &amp; Subtitles</h3>
                    <div class="movie-version-list">

                        <label class="movie-version-option">
                            <input class="movie-version-input" type="radio" name="version" checked>
                            <div class="movie-version-card">
                                <span class="movie-version-label">Original Version (Subtitled)</span>
                                <div class="movie-version-indicator">
                                    <div class="movie-version-dot"></div>
                                </div>
                            </div>
                        </label>

                        <label class="movie-version-option">
                            <input class="movie-version-input" type="radio" name="version">
                            <div class="movie-version-card">
                                <span class="movie-version-label movie-version-label--muted">Dubbed (Local Language)</span>
                                <div class="movie-version-indicator">
                                    <div class="movie-version-dot"></div>
                                </div>
                            </div>
                        </label>

                    </div>
                </div>

                {{-- Selector de formato: IMAX o Digital --}}
                <div>
                    <h3 class="movie-prefs__title">Theatrical Experience</h3>
                    <div class="movie-format-list">

                        {{-- IMAX Laser 4K (premium) --}}
                        <label class="movie-format-option">
                            <input class="movie-format-input" type="radio" name="format" checked>
                            <div class="movie-format-card">
                                <div class="movie-format-card__flare"></div>
                                <div class="movie-format-card__header">
                                    <span class="movie-format-card__name">IMAX Laser 4K</span>
                                    <span class="movie-format-card__badge">Premium</span>
                                </div>
                                <p class="movie-format-card__desc">Expanded aspect ratio with next-generation laser
                                    projection.</p>
                                <div class="movie-format-card__footer">
                                    <span class="movie-format-card__price">+$5.00 Surcharge</span>
                                    <div class="movie-format-card__indicator">
                                        <div class="movie-format-card__indicator-dot"></div>
                                    </div>
                                </div>
                            </div>
                        </label>

                        {{-- Digital Premiere (estándar) --}}
                        <label class="movie-format-option">
                            <input class="movie-format-input" type="radio" name="format">
                            <div class="movie-format-card">
                                <div class="movie-format-card__header">
                                    <span class="movie-format-card__name movie-format-card__name--muted">Digital
                                        Premiere</span>
                                </div>
                                <p class="movie-format-card__desc">Standard 2K digital projection with Dolby Surround 7.1.
                                </p>
                                <div class="movie-format-card__footer">
                                    <span class="movie-format-card__price movie-format-card__price--muted">Included</span>
                                    <div class="movie-format-card__indicator">
                                        <div class="movie-format-card__indicator-dot"></div>
                                    </div>
                                </div>
                            </div>
                        </label>

                    </div>
                </div>

            </div>

            {{-- Columna derecha: selector de fecha + horarios disponibles --}}
            <div class="movie-schedule">

                {{-- Carrusel de fechas --}}
                <div>
                    <div class="movie-dates__header">
                        <h3 class="movie-prefs__title" style="margin:0">Select Date</h3>
                        <span class="movie-dates__month">November 2023</span>
                    </div>
                    <div class="movie-date-strip">
                        <button class="movie-date-btn">
                            <span class="movie-date-btn__day">Tue</span>
                            <span class="movie-date-btn__num">14</span>
                        </button>
                        <button class="movie-date-btn movie-date-btn--active">
                            <span class="movie-date-btn__day">Wed</span>
                            <span class="movie-date-btn__num">15</span>
                        </button>
                        <button class="movie-date-btn">
                            <span class="movie-date-btn__day">Thu</span>
                            <span class="movie-date-btn__num">16</span>
                        </button>
                        <button class="movie-date-btn">
                            <span class="movie-date-btn__day">Fri</span>
                            <span class="movie-date-btn__num">17</span>
                        </button>
                        <button class="movie-date-btn movie-date-btn--disabled" disabled>
                            <span class="movie-date-btn__day">Sat</span>
                            <span class="movie-date-btn__num">18</span>
                        </button>
                    </div>
                </div>

                {{-- Grilla de horarios disponibles --}}
                <div>
                    <h3 class="movie-showtimes__title">Available Showtimes</h3>
                    <div class="movie-showtime-groups">

                        {{-- Horarios IMAX --}}
                        <div class="movie-showtime-group">
                            <div class="movie-showtime-group__header">
                                <span class="material-symbols-outlined movie-showtime-group__icon">videocam</span>
                                <h4 class="movie-showtime-group__title">IMAX Laser 4K (Subtitled)</h4>
                            </div>
                            <div class="movie-time-btns">
                                <button class="movie-time-btn">14:30</button>
                                <button class="movie-time-btn movie-time-btn--active">18:00</button>
                                <button class="movie-time-btn">21:45</button>
                            </div>
                        </div>

                        {{-- Horarios Digital (grupo atenuado) --}}
                        <div class="movie-showtime-group movie-showtime-group--dim">
                            <div class="movie-showtime-group__header">
                                <span
                                    class="material-symbols-outlined movie-showtime-group__icon movie-showtime-group__icon--muted">theaters</span>
                                <h4 class="movie-showtime-group__title movie-showtime-group__title--muted">Digital Premiere
                                    (Subtitled)</h4>
                            </div>
                            <div class="movie-time-btns">
                                <button class="movie-time-btn--dim">13:15</button>
                                <button class="movie-time-btn--dim">16:40</button>
                                <button class="movie-time-btn--dim">20:10</button>
                                <button class="movie-time-btn--dim">23:30</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section>

        {{-- ===== BARRA DE ACCIÓN: fixed en mobile, sticky en desktop --}}
        <div class="movie-action-bar">
            <div class="movie-action-bar__inner">
                <div class="movie-action-bar__summary">
                    Selected: <strong>IMAX Laser 4K</strong> at <strong>18:00</strong>
                </div>
                <a href="{{ route('armchair.index') }}" class="movie-action-bar__cta">
                    Proceed to Seat Selection
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>
        </div>

    </main>
@endsection

@extends('layouts.navbar-y-footer.app')

@section('title', 'Cinevibe')

@section('content')
    <main class="home-main">

        {{-- Carrusel Bootstrap (conservado: clases Bootstrap nativas) --}}
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/home/carousel/carousel-1.png') }}" class="d-block w-100" alt="Combo Dúo">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/home/carousel/carousel-2.png') }}" class="d-block w-100" alt="Complejo">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/home/carousel/carousel-3.png') }}" class="d-block w-100" alt="Mario Galaxy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/home/carousel/carousel-4.png') }}" class="d-block w-100" alt="El diablo viste a la moda 2">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        {{-- Sección Now Showing: grid de tarjetas de películas --}}
        <section class="home-section home-section--surface">
            <div class="container">
                {{-- Cabecera de sección con badge + botón filtro --}}
                <header class="section-header">
                    <div class="section-header__inner">
                        <h2 class="section-header__title">En Cartelera</h2>
                    </div>
                </header>

                {{-- Carousel de tarjetas "En Cartelera" --}}
                <div class="movie-carousel" data-carousel>
                    <button class="movie-carousel__btn movie-carousel__btn--prev" aria-label="Anterior">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>

                    <div class="movie-carousel__track">
                        @forelse ($movies->filter(fn($m) => !in_array(strtolower($m->state), ['próximamente', 'proximamente'])) as $movie)
                            <article class="movie-card">
                                <div class="movie-card__poster">
                                    <a href="{{ route('movies.show', $movie->id) }}" class="movie-card__link">
                                        @if($movie->image_url)
                                            <img class="movie-card__img" src="{{ asset($movie->image_url) }}" alt="{{ $movie->name }}" onerror="this.onerror=null; this.src='{{ asset('img/peliculas/default.jpg') }}';">
                                        @else
                                            <img class="movie-card__img" src="{{ asset('img/peliculas/default.jpg') }}" alt="{{ $movie->name }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="movie-card__rating">
                                    <span class="movie-card__rating-value">{{ strtoupper($movie->state) }}</span>
                                </div>
                                <div class="movie-card__info">
                                    <div>
                                        <h3 class="movie-card__title">{{ $movie->name }}</h3>
                                        <p class="movie-card__genre">{{ $movie->category }}</p>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="no-movies-message" style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: var(--color-text-muted);">
                                <p>No hay películas disponibles en cartelera en este momento.</p>
                            </div>
                        @endforelse
                    </div>

                    <button class="movie-carousel__btn movie-carousel__btn--next" aria-label="Siguiente">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </section>

        {{-- Banner promocional "Velvet Club" --}}
        <section class="home-section home-section--compact">
            <div class="container">
                <div class="promo-banner">
                    {{-- Decoración icono gigante --}}
                    <div class="promo-banner__decor">
                        <span class="material-symbols-outlined material-symbols-outlined--fill promo-banner__decor-icon">confirmation_number</span>
                    </div>

                    {{-- Texto principal + CTAs --}}
                    <div class="promo-banner__content">
                        <h2 class="promo-banner__title">Unete a CINEVIBE</h2>
                        <p class="promo-banner__desc">
                            Obtén un 20% de descuento en todas las reservas, invitaciones exclusivas al estreno y palomitas de maíz gratis en cada visita. El estilo de vida cinematográfico definitivo te espera.
                        </p>
                        <div class="promo-banner__actions">
                            <button class="btn btn--secondary">Convertirse en miembro</button>
                            <button class="btn btn--ghost">
                                Aprender más
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </button>
                        </div>
                    </div>

                    {{-- Tarjeta de membresía decorativa flotante --}}
                    <div class="promo-banner__card-wrap">
                        <div class="promo-banner__card">
                            <div class="promo-banner__card-header">
                                <span class="promo-banner__logo">V | C</span>
                                <span class="material-symbols-outlined material-symbols-outlined--fill">auto_awesome</span>
                            </div>
                            <div class="promo-banner__card-body">
                                <div class="promo-banner__skel promo-banner__skel--3-4"></div>
                                <div class="promo-banner__skel promo-banner__skel--1-2"></div>
                                <div class="promo-banner__card-footer">
                                    <span class="promo-banner__pass">PASE PREMIUM</span>
                                    <div>
                                        <div class="promo-banner__since-label">Miembro Desde</div>
                                        <div class="promo-banner__since-year">2024</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- Bento Grid --}}
        <section class="home-section home-section--surface-lowest">
            <div class="container">
                <header class="section-header">
                    <div class="section-header__inner">
                        <h2 class="section-header__title">Experiencia Cinevibe</h2>
                    </div>
                </header>

                <div class="bento-grid">
                    <div class="bento-cell bento-cell--wide">
                        <img src="{{ asset('img/home/bento grid/bento-grid-2.png') }}" alt="Sala de cine premium">
                    </div>
                    <div class="bento-cell bento-cell--tall">
                        <img src="{{ asset('img/home/bento grid/bento-grid-4.png') }}" alt="Cartelera destacada">
                    </div>
                    <div class="bento-cell">
                        <img src="{{ asset('img/home/bento grid/bento-grid-1.png') }}" alt="Experiencia cinematográfica">
                    </div>
                    <div class="bento-cell">
                        <img src="{{ asset('img/home/bento grid/bento-grid-3.png') }}" alt="Combo y snacks">
                    </div>
                </div>
            </div>
        </section>

        {{-- Sección : grid de tarjetas de películas --}}
        <section class="home-section home-section--surface">
            <div class="container">
                {{-- Cabecera de sección con badge + botón filtro --}}
                <header class="section-header">
                    <div class="section-header__inner">
                        <h2 class="section-header__title">Proximamente...</h2>
                    </div>
                </header>

                {{-- Carousel de tarjetas "Proximamente" --}}
                <div class="movie-carousel" data-carousel>
                    <button class="movie-carousel__btn movie-carousel__btn--prev" aria-label="Anterior">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>

                    <div class="movie-carousel__track">
                        @forelse ($movies->filter(fn($m) => in_array(strtolower($m->state), ['próximamente', 'proximamente'])) as $movie)
                            <article class="movie-card">
                                <div class="movie-card__poster">
                                    @if($movie->image_url)
                                        <img class="movie-card__img" src="{{ asset($movie->image_url) }}" alt="{{ $movie->name }}" onerror="this.onerror=null; this.src='{{ asset('img/peliculas/default.jpg') }}';">
                                    @else
                                        <img class="movie-card__img" src="{{ asset('img/peliculas/default.jpg') }}" alt="{{ $movie->name }}">
                                    @endif
                                </div>
                                <div class="movie-card__rating">
                                    <span class="movie-card__rating-value">
                                        {{ $movie->datepremire ? $movie->datepremire->translatedFormat('d \d\e F') : 'PRÓXIMAMENTE' }}
                                    </span>
                                </div>
                                <div class="movie-card__info">
                                    <div>
                                        <h3 class="movie-card__title">{{ $movie->name }}</h3>
                                        <p class="movie-card__genre">{{ $movie->category }}</p>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="no-movies-message" style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: var(--color-text-muted);">
                                <p>No hay próximos estrenos programados por ahora.</p>
                            </div>
                        @endforelse
                    </div>

                    <button class="movie-carousel__btn movie-carousel__btn--next" aria-label="Siguiente">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/home/home.js') }}"></script>
@endpush

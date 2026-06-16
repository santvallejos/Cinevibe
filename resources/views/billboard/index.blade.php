@extends('layouts.navbar-y-footer.app')

@section('title', 'Movie')

@section('content')
    <main class="movie-page">

        {{-- BLOQUE 2: Cartelera --}}

        </div>
        <section class="home-section home-section--surface">
            <div class="container">
                <header class="section-header" style="flex-wrap: wrap; gap: 1rem;">
                    <div class="contact-hero__content">
                        <h1 class="movie-hero__title">Cartelera</h1>
                    </div>

                    <form action="{{ route('movies.index') }}" method="GET" class="section-header__actions" style="display: flex; gap: 0.5rem; flex-wrap: wrap; align-items: center; width: 100%; max-width: 600px; justify-content: flex-end;">
                        <input type="text" name="search" placeholder="Buscar película..." value="{{ request('search') }}" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; padding: 0.5rem 1rem; color: white; min-width: 200px; outline: none; font-size: 0.9rem;">
                        <select name="category" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; padding: 0.5rem 1rem; color: white; outline: none; font-size: 0.9rem;">
                            <option value="">Todas las categorías</option>
                            <option value="Comedia" {{ request('category') == 'Comedia' ? 'selected' : '' }}>Comedia</option>
                            <option value="Terror" {{ request('category') == 'Terror' ? 'selected' : '' }}>Terror</option>
                            <option value="Thriller" {{ request('category') == 'Thriller' ? 'selected' : '' }}>Thriller</option>
                            <option value="Aventuras" {{ request('category') == 'Aventuras' ? 'selected' : '' }}>Aventuras</option>
                            <option value="Animación" {{ request('category') == 'Animación' ? 'selected' : '' }}>Animación</option>
                        </select>
                        <button type="submit" class="btn" style="background: #e50914; color: white; border: none; border-radius: 6px; padding: 0.5rem 1rem; cursor: pointer; font-weight: bold; display: flex; align-items: center; gap: 0.25rem;">
                            <span class="material-symbols-outlined" style="font-size: 1.2rem;">search</span> Buscar
                        </button>
                        @if(request()->anyFilled(['search', 'category']))
                            <a href="{{ route('movies.index') }}" class="btn" style="background: rgba(255,255,255,0.1); color: white; border: none; border-radius: 6px; padding: 0.5rem 1rem; text-decoration: none; font-size: 0.9rem;">
                                Limpiar
                            </a>
                        @endif
                    </form>
                </header>

                <div class="movie-grid">
                    {{-- Iteración dinámica para renderizar películas en cartelera y estrenos activos --}}
                    @forelse ($movies->filter(fn($m) => !in_array(strtolower($m->state), ['próximamente', 'proximamente'])) as $movie)
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                {{-- Enlace a la vista de detalle de la película --}}
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
                        {{-- Mensaje de fallback si no hay películas activas en base de datos --}}
                        <div class="no-movies-message" style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: var(--color-text-muted);">
                            <p>No hay películas disponibles en cartelera en este momento.</p>
                        </div>
                    @endforelse
                </div>{{-- fin .movie-grid --}}
            </div>{{-- fin .container --}}
        </section>
        {{-- FIN BLOQUE 2 --}}


        {{-- Sección Próximamente --}}
        <section class="home-section home-section--surface-lowest">
            <div class="container">

                <header class="section-header section-header--divider">
                    <h2 class="section-header__title">PRÓXIMOS ESTRENOS</h2>
                    <div class="section-header__divider"></div>
                    <button class="section-header__action">
                        <span>View Calendar</span>
                    </button>
                </header>

                <div class="movie-grid">
                    {{-- Iteración dinámica para renderizar próximos estrenos --}}
                    @forelse ($movies->filter(fn($m) => in_array(strtolower($m->state), ['próximamente', 'proximamente'])) as $movie)
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                {{-- Las películas que no se han estrenado no tienen enlace al flujo de venta directa --}}
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
                        {{-- Fallback si no hay películas próximas programadas en base de datos --}}
                        <div class="no-movies-message" style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: var(--color-text-muted);">
                            <p>No hay próximos estrenos programados por ahora.</p>
                        </div>
                    @endforelse
                </div>{{-- fin .movie-grid --}}
            </div>{{-- fin .container --}}
        </section>
    </main>
@endsection

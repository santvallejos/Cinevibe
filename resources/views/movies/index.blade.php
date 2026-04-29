@extends('layouts.navbar-y-footer.app')

@section('title', 'Movie')

@section('content')
    <main class="movie-page">

        {{-- Hero --}}
        <section class="movie-hero">
            <div class="movie-hero__bg"
                style="background-image: url('{{ asset('img/fondo-movies.jpg') }}');">
            </div>
            <div class="movie-hero__gradient"></div>
            <div class="movie-hero__content">
                <div class="movie-hero__wrap">
                    <div class="movie-hero__kicker">
                        <span class="material-symbols-outlined material-symbols-outlined--fill">star</span>
                        Experiencia Premium
                    </div>
                    <h1 class="movie-hero__title">Cartelera</h1>
                </div>
            </div>
        </section>
        {{-- FIN hero --}}


        {{-- BLOQUE 2: Cartelera --}}
        <section class="home-section home-section--surface">
            <div class="container">
                <header class="section-header">
                    <div class="section-header__inner">
                        <span class="section-header__kicker">Live Experience</span>
                    </div>
                    <div class="section-header__actions">
                        <button class="btn btn--icon">
                            <span class="material-symbols-outlined">filter_list</span>
                        </button>
                    </div>
                </header>

                <div class="movie-grid">

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/supermario.jpg" alt="Super Mario Galaxy">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">SUPERMARIO GALAXY: LA PELICULA</h3>
                                <p class="movie-card__genre">Animacion, Aventura</p>
                            </div>
                            <div class="movie-card__footer">
                                <a href="{{ url('/movies/supermario') }}" class="btn btn--ticket">
                                    Comprar Boletos
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/proyectofindelmundo.jpg" alt="Proyecto Fin del Mundo">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">PROYECTO FIN DEL MUNDO</h3>
                                <p class="movie-card__genre">Ciencia Ficción</p>
                            </div>
                            <div class="movie-card__footer">
                                <a href="{{ url('/movies/proyectofindelmundo') }}" class="btn btn--ticket">
                                    Comprar Boletos
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/Nurenberg.jpg" alt="Nurenberg">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">NURENBERG: EL JUICIO DEL SIGLO</h3>
                                <p class="movie-card__genre">Drama</p>
                            </div>
                            <div class="movie-card__footer">
                                <a href="{{ url('/movies/nurenberg') }}" class="btn btn--ticket">
                                    Comprar Boletos
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/ElBufon2.jpg" alt="El Bufón 2">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">EL BUFÓN 2</h3>
                                <p class="movie-card__genre">Horror, Terror</p>
                            </div>
                            <div class="movie-card__footer">
                                <a href="{{ url('/movies/elbufon2') }}" class="btn btn--ticket">
                                    Comprar Boletos
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/mortalKombat.jpg" alt="Mortal Kombat II">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">MORTAL KOMBAT II</h3>
                                <p class="movie-card__genre">Acción</p>
                            </div>
                            <div class="movie-card__footer">
                                <a href="{{ url('/movies/mortalKombat') }}" class="btn btn--ticket">
                                    Comprar Boletos
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/Pelicula,eldiablo.jpg" alt="El Diablo Viste a la Moda">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">EL DIABLO VISTE A LA MODA</h3>
                                <p class="movie-card__genre">Comedia</p>
                            </div>
                            <div class="movie-card__footer">
                                <a href="{{ url('/movies/eldiablo') }}" class="btn btn--ticket">
                                    Comprar Boletos
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/MichaelJacjkson.jpg" alt="Michael">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">MICHAEL</h3>
                                <p class="movie-card__genre">Biografía, Drama</p>
                            </div>
                            <div class="movie-card__footer">
                                <a href="{{ url('/movies/michael') }}" class="btn btn--ticket">
                                    Comprar Boletos
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/Elmago.jpg" alt="El Mago del Kremlin">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">EL MAGO DEL KREMLIN</h3>
                                <p class="movie-card__genre">Thriller</p>
                            </div>
                            <div class="movie-card__footer">
                                <a href="{{ url('/movies/ElmagodelKremlin') }}" class="btn btn--ticket">
                                    Comprar Boletos
                                </a>
                            </div>
                        </div>
                    </article>

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

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/Spiderman1.jpg" alt="Spider-Man: Un Nuevo Día">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">30 DE JULIO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">SPIDER-MAN: UN NUEVO DÍA</h3>
                                <p class="movie-card__genre">Acción, Aventura</p>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/TOYSTORY5.jpg" alt="Toy Story 5">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">18 DE JUNIO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">TOY STORY 5</h3>
                                <p class="movie-card__genre">Animación, Aventura</p>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/LA ODISEA.jpg" alt="La Odisea">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">16 DE JULIO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">LA ODISEA</h3>
                                <p class="movie-card__genre">Aventura</p>
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img" src="/img/peliculas/Zonaderiesgo.jpg" alt="Zona de Riesgo">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">28 DE MAYO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">ZONA DE RIESGO</h3>
                                <p class="movie-card__genre">Thriller, Drama</p>
                            </div>
                        </div>
                    </article>

                </div>{{-- fin .movie-grid --}}
            </div>{{-- fin .container --}}
        </section>
        {{-- FIN Próximamente --}}


        {{-- BLOQUE 3: Banner promocional --}}
        <section class="home-section home-section--compact">
            <div class="container">
                <div class="promo-banner">
                    <div class="promo-banner__decor">
                        <span class="material-symbols-outlined material-symbols-outlined--fill promo-banner__decor-icon">confirmation_number</span>
                    </div>
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
                </div>
            </div>
        </section>
        {{-- FIN BLOQUE 3 --}}

    </main>
@endsection
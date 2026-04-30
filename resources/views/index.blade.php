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
                        {{-- Movie Card 1 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                      <img class="movie-card__img" src="/img/peliculas/supermario.jpg" alt="Super Mario Galaxy">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">ESTRENO</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">Supermario Galaxy: La pelicula</h3>
                                    <p class="movie-card__genre">Animacion, Aventura</p>
                                </div>
                               
                            </div>
                        </article>

                        {{-- Movie Card 2 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    <img class="movie-card__img" src="/img/peliculas/proyectofindelmundo.jpg" alt="Proyecto fin del mundo">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">ESTRENO</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">PROYECTO FIN DEL MUNDO</h3>
                                    <p class="movie-card__genre">Ciencia Ficción</p>
                                </div>
                               
                            </div>
                        </article>

                        {{-- Movie Card 3 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                     <img class="movie-card__img" src="/img/peliculas/Nurenberg.jpg" alt="Nurenberg: El Juicio del Siglo">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">ESTRENO</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">NUREMBERG: EL JUICIO DEL SIGLO</h3>
                                    <p class="movie-card__genre">Drama</p>
                                </div>
                                
                            </div>
                        </article>

                        {{-- Movie Card 4 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    <img class="movie-card__img" src="/img/peliculas/ElBufon2.jpg" alt="El Bufón 2">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">ESTRENO</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">EL BUFÓN 2</h3>
                                    <p class="movie-card__genre">Terror</p>
                                </div>
                               
                            </div>
                        </article>

                        {{-- Movie Card 5 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                      <img class="movie-card__img" src="/img/peliculas/mortalKombat.jpg" alt="Mortal Kombat">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">ESTRENO</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">MORTAL KOMBAT II</h3>
                                    <p class="movie-card__genre">Acción</p>
                                </div>
                                
                            </div>
                        </article>

                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
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
                                
                            </div>
                        </article>
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
                    

                    <div class="movie-carousel__track">
                        {{-- Movie Card 1 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                      <img class="movie-card__img" src="/img/peliculas/spiderman1.jpg" alt="Spiderman">
                            </div>
                            
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">SPIDER-MAN:UN NUEVO DIA</h3>
                                    <p class="movie-card__genre">Acción, Aventura</p>
                                </div>
                                
                            </div>
                        </article>

                        {{-- Movie Card 2 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                  <img class="movie-card__img" src="/img/peliculas/TOYSTORY5.jpg" alt="Toy Story 5">
                                  
                            </div>
                            
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">TOY STORY 5</h3>
                                    <p class="movie-card__genre">Animación, Aventura</p>
                                </div>
                               
                            </div>
                        </article>

                        {{-- Movie Card 3 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                     <img class="movie-card__img" src="/img/peliculas/LA ODISEA.jpg" alt="LA ODISEA">
                            </div>
                            
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">LA ODISEA</h3>
                                    <p class="movie-card__genre">Aventura</p>
                                </div>
                               
                            </div>
                        </article>

                        {{-- Movie Card 4 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                      <img class="movie-card__img" src="/img/peliculas/Zonaderiesgo.jpg" alt="Zona de Riesgo">
                            </div>
                            
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">ZONA DE RIESGO</h3>
                                    <p class="movie-card__genre">Thriller, Drama</p>
                                </div>
                                
                            </div>
                        </article>


                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/home/home.js') }}"></script>
@endpush

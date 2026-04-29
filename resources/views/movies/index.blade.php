@extends('layouts.navbar-y-footer.app')

@section('title', 'Movie')

@section('content')
    <main class="movie-page">
               
          


        {{-- BLOQUE 2: Cartelera --}}
            
        </div>
        <section class="home-section home-section--surface">
            <div class="container">
                <header class="section-header">
                    <div class="contact-hero__content">
          <h1 class="movie-hero__title">Cartelera</h1>
            
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
        <a href="{{ url('/movies/supermario') }}" class="movie-card__link">
            <img class="movie-card__img" src="/img/peliculas/supermario.jpg" alt="Super Mario Galaxy">
        </a>
    </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">SUPERMARIO GALAXY: LA PELICULA</h3>
                                <p class="movie-card__genre">Animacion, Aventura</p>
                            </div>
                           
                        </div>
                    </article>

                    <article class="movie-card">
    <div class="movie-card__poster">
        <a href="{{ url('/movies/proyectofindelmundo') }}" class="movie-card__link">
            <img class="movie-card__img" src="/img/peliculas/proyectofindelmundo.jpg" alt="Proyecto Fin del Mundo">
        </a>
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
                 <article class="movie-card">
                      <div class="movie-card__poster">
                    <a href="{{ url('/movies/nurenberg') }}" class="movie-card__link">
                    <img class="movie-card__img" src="/img/peliculas/Nurenberg.jpg" alt="Nurenberg">
        </a>
    </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">NURENBERG: EL JUICIO DEL SIGLO</h3>
                                <p class="movie-card__genre">Drama</p>
                            </div>
                            
                        </div>
                    </article>

                    <article class="movie-card">
    <div class="movie-card__poster">
        <a href="{{ url('/movies/elbufon2') }}" class="movie-card__link">
            <img class="movie-card__img" src="/img/peliculas/ElBufon2.jpg" alt="El Bufón 2">
        </a>
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
                            
                            </div>
                        </div>
                    </article>

                    <article class="movie-card">
    <div class="movie-card__poster">
        <a href="{{ url('/movies/mortalKombat') }}" class="movie-card__link">
            <img class="movie-card__img" src="/img/peliculas/mortalKombat.jpg" alt="Mortal Kombat II">
        </a>
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
        <a href="{{ url('/movies/eldiablo') }}" class="movie-card__link">
            <img class="movie-card__img" src="/img/peliculas/Pelicula,Eldiablo.jpg" alt="El Diablo Viste a la Moda">
        </a>
    </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">EL DIABLO VISTE A LA MODA</h3>
                                <p class="movie-card__genre">Comedia</p>
                            </div>
                       
                        </div>
                    </article>

                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <a href="{{ url('/movies/michael') }}" class="movie-card__link">
                                <img class="movie-card__img" src="/img/peliculas/MichaelJacjkson.jpg" alt="Michael">
                            </a>
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

                     <article class="movie-card">
    <div class="movie-card__poster">
        <a href="{{ url('/movies/ElmagodelKremlin') }}" class="movie-card__link">
            <img class="movie-card__img" src="/img/peliculas/Elmago.jpg" alt="El Mago del Kremlin">
        </a>
    </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">EL MAGO DEL KREMLIN</h3>
                                <p class="movie-card__genre">Thriller</p>
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



    </main>
@endsection
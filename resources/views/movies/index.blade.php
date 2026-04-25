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
                        Premium Experience
                    </div>
                    <h1 class="movie-hero__title">Cartelera</h1>
                
                </div>
            </div>
        </section>
        {{-- FIN hero --}}
 
 
 
 
        {{-- =====================================================
             BLOQUE 2: Cartelera — ancho completo, fuera del grid
        ====================================================== --}}
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
                            <img class="movie-card__img"
                                <img src="/img/peliculas/supermario.jpg">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">Supermario Galaxy: La pelicula</h3>
                                <p class="movie-card__genre">Animacion, Aventura</p>
                            </div>
                            <div class="movie-card__footer">
                              
                                <button class="btn btn--ticket">Comprar Boletos</button>
                            </div>
                        </div>
                    </article>
 
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                <img src="/img/peliculas/proyectofindelmundo.jpg">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">Proyecto Fin del Mundo</h3>
                                <p class="movie-card__genre">Ciencia Ficción</p>
                            </div>
                            <div class="movie-card__footer">
                             
                                <button class="btn btn--ticket">Comprar Boletos</button>
                            </div>
                        </div>
                    </article>
 
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                               <img src="/img/peliculas/Nurenberg.jpg">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">Nurenberg: El Juicio del siglo</h3>
                                <p class="movie-card__genre">Drama</p>
                            </div>
                            <div class="movie-card__footer">
                         
                                <button class="btn btn--ticket">Comprar Boletos</button>
                            </div>
                        </div>
                    </article>
 
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                src="/img/peliculas/ElBufon2.jpg">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">El Bufón 2</h3>
                                <p class="movie-card__genre">Horror, Terror</p>
                            </div>
                            <div class="movie-card__footer">
                               
                                <button class="btn btn--ticket">Comprar Boletos</button>
                            </div>
                        </div>
                    </article>
                     
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                src="/img/peliculas/ElBufon2.jpg">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">El Bufón 2</h3>
                                <p class="movie-card__genre">Horror, Terror</p>
                            </div>
                            <div class="movie-card__footer">
                               
                                <button class="btn btn--ticket">Comprar Boletos</button>
                            </div>
                        </div>
                    </article>
                     
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                src="/img/peliculas/ElBufon2.jpg">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">El Bufón 2</h3>
                                <p class="movie-card__genre">Horror, Terror</p>
                            </div>
                            <div class="movie-card__footer">
                               
                                <button class="btn btn--ticket">Comprar Boletos</button>
                            </div>
                        </div>
                    </article>
                     
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                src="/img/peliculas/ElBufon2.jpg">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">El Bufón 2</h3>
                                <p class="movie-card__genre">Horror, Terror</p>
                            </div>
                            <div class="movie-card__footer">
                               
                                <button class="btn btn--ticket">Comprar Boletos</button>
                            </div>
                        </div>
                    </article>
                     
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                src="/img/peliculas/ElBufon2.jpg">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">ESTRENO</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">El Bufón 2</h3>
                                <p class="movie-card__genre">Horror, Terror</p>
                            </div>
                            <div class="movie-card__footer">
                               
                                <button class="btn btn--ticket">Comprar Boletos</button>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        {{-- FIN BLOQUE 2 --}}
 
 
        {{-- Sección Coming Soon con scroll horizontal --}}
        <section class="home-section home-section--surface-lowest">
            <div class="container">
                {{-- Cabecera con divisor --}}
                <header class="section-header section-header--divider">
                    <h2 class="section-header__title">Proximamente</h2>
                    <div class="section-header__divider"></div>
                    <button class="section-header__action">
                        <span>View Calendar</span>
                    </button>
                </header>

                {{-- Lista horizontal con scroll snap --}}
                <div class="preview-row hide-scrollbar">
                    {{-- Preview 1 --}}
                    <article class="preview-card">
                        <div class="preview-card__media">
                            <img class="preview-card__img"
                                data-alt="Cinematic shot of a high-speed car chase at night with glowing taillights and blurred city lights in the background"
                               src="/img/peliculas/Spiderman1.jpg">
                        </div>
                        <h3 class="preview-card__title">Velocity: Drift Protocol</h3>
                        <p class="preview-card__meta">Directed by Marcus Thorne</p>
                    </article>

                    {{-- Preview 2 --}}
                    <article class="preview-card">
                        <div class="preview-card__media">
                            <img class="preview-card__img"
                                data-alt="Dramatic mountain peaks covered in snow under a starry night sky with deep purple and blue cinematic grading"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWwFyh93hqY68qn-pgjxZ1JeAZc8HYmSeGThKG7ZrsPF1Az0BExfnXUbYU_z3xXQ8H2iuArgr4ymg4IDAPKMesf9iPdYphBsIQFcoJMvNU14gGFKxlmARnG6Zgx5q9Nin8DGAYc8ev1CjwEtWvZip_ZNqa-cZu2ZDN2bGXZBbNmM1m1j-tkOCL8lCRPIkpdR8vQCVtIBrygDUywvM9dK4KTfLLxd4xsF9dDJ6wXgwjZ1xz2J9Fe1IM8VQGSwTNLPpgCk92jQeQHlYG">
                            <span class="preview-card__date">Jan 02</span>
                        </div>
                        <h3 class="preview-card__title">Summit of Silence</h3>
                        <p class="preview-card__meta">Documentary Feature</p>
                    </article>

                    {{-- Preview 3 --}}
                    <article class="preview-card">
                        <div class="preview-card__media">
                            <img class="preview-card__img"
                                data-alt="Dark fantasy landscape with a gothic castle silhouette against a massive moon and swirling magical particles"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjpVrA7Z10G0bdD9-HNzOY79zUTB9xwmknUkjHdj40xWNiE-OXxPgtIsMCKfCCEVEHLbQsB-xSFJ5sWrPUZVy_z0KpZ0upYUH9jX_daeYTLlTulYogZi7RzkKcgR7A5KfxbOEhFx_I0S5vcL9HPi2BBPDgPB9N9-Hm2mH4pgLl3JmxfsmAJyX6vns63HFRCLEbigFPFzqRZYi-IDd1ZPKoO9xCiRHBAtAWH_KXqYOkmROL5Os2OLFxBFO9yKeJ-J4xPmJPfn0kbVZ-">
                            <span class="preview-card__date">Jan 18</span>
                        </div>
                        <h3 class="preview-card__title">Eternal Kingdom</h3>
                        <p class="preview-card__meta">Epic Fantasy</p>
                    </article>

        {{-- =====================================================
             BLOQUE 3: Banner promocional — solo el promo, nada más
        ====================================================== --}}
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
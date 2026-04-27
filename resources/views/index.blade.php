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
                                    src="https://sacnkprodarcms.blob.core.windows.net/content/posters/HO00011952.jpg"
                                    alt="Supermario Galaxy: La pelicula">
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
                                    <span class="movie-card__price">$14.50</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
                                </div>
                            </div>
                        </article>

                        {{-- Movie Card 2 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBBLVDA2MCtEU5ft2iXQ4pyJGS0cB0SYUeYUznGChExeORmtNdndHHhqDhTlvjXH1AaG-dN3MWLnPwy66_gnOSm-yeO8zAbV2dGrcAaFesz_o-PAJnN5XWnNrgVm2AeqTLQZHBVwpxEUmr9L-7FRU7VLpkJsnJZoSPaCAU-nHkbl2MPXxxjj4Q6mfl5-Zqm8it9IbCfNZq34_92x7yNSG0ZoKtzOxk5OIKaZZfWxOTPTRPbTHDoGV7_sbPxrQVGz3KeXR9aWkPr9UE"
                                    alt="The Last Horizon">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">ESTRENO</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">The Last Horizon</h3>
                                    <p class="movie-card__genre">Ciencia Ficción, Aventura</p>
                                </div>
                                <div class="movie-card__footer">
                                    <span class="movie-card__price">$16.00</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
                                </div>
                            </div>
                        </article>

                        {{-- Movie Card 3 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAs27qMUsheNFHdVV5j_2tbQW7jgep4NM4_WV0MAzjYRlUfOvDcdmIwV_w8caFAuQ6c5LZ6AhZiBd5L56j5X-GOffd-Vh-GgxlpjH7hC2SoYrI2DZFArEaUddx4hAhJDE2w5Y9-wiAy0MVUZoZDS-MOwT7OyoWRqEZJglhrUjOLj2AN2fk3ABEK0mcUlYxx-58H2MdtnpVKSK8Ix_Ivj0z7-F6btZVsRjAtPk--khqS0oS6rqzPXMZ6CN-elj-HZUVGeXSvrfLRCUo1"
                                    alt="Velvet Dynasty">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">ESTRENO</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">Velvet Dynasty</h3>
                                    <p class="movie-card__genre">Drama, Historia</p>
                                </div>
                                <div class="movie-card__footer">
                                    <span class="movie-card__price">$13.00</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
                                </div>
                            </div>
                        </article>

                        {{-- Movie Card 4 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmaC_RMDeS-ntvPQeZycAzbVsAFwDD1nowI9oYMRW-083LezjlNaA9cCWKDs--Z4WgH5crUkUrEuvAyZ_goJViIGAPoopC6LN7ZS9FQoytjyYa9jzmNlV2Mz9W52iIyg13AMneeLPf5Arnzlu1v6CUhqUm9SSscZeQScfwss8LS5KpohR-8sMe8uw6ZjM4hZE9t1zJRtlX-qX7Ydf2RWeapuoBAFzPcm8QGMK1yNDA98DywoffU_TOh3dpTNMeeZUzbFH2SSuzDqb0"
                                    alt="Silence Speaks">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">ESTRENO</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">Silence Speaks</h3>
                                    <p class="movie-card__genre">Terror, Thriller</p>
                                </div>
                                <div class="movie-card__footer">
                                    <span class="movie-card__price">$14.50</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
                                </div>
                            </div>
                        </article>

                        {{-- Movie Card 5 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoiijhroebv0MaFNfyAi4iqm1v_K28CZ8QeVePKrXtgLDWx2aeUmhfY-15iYqX1pegr8th50c4VnrEQrV2NzWzTfEe7OPmVLpL-oEHzc1nKsX6SIr2s6m-b-RzI2zlI3iOWgSZgpMofYcTmmTS7ODse0LCEOZ_0mPNLhSXpaP9MXiZXO1NLw4BVIWpK6jVkSx4kFJORiszqWjQBbI2OOxAwe1die_-RaqUJwGED6Bn_RDO1Hgpz2AgQQSdGIrnsWjKT-0kt3B9kiRx"
                                    alt="Shadow of the City">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">ESTRENO</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">Shadow of the City</h3>
                                    <p class="movie-card__genre">Acción, Crimen</p>
                                </div>
                                <div class="movie-card__footer">
                                    <span class="movie-card__price">$14.50</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
                                </div>
                            </div>
                        </article>

                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://sacnkprodarcms.blob.core.windows.net/content/posters/HO00011952.jpg"
                                    alt="Supermario Galaxy: La pelicula">
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
                                    <span class="movie-card__price">$14.50</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
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
                        <h2 class="section-header__title">Proximamente</h2>
                    </div>
                </header>

                {{-- Carousel de tarjetas "Proximamente" --}}
                <div class="movie-carousel" data-carousel>
                    <button class="movie-carousel__btn movie-carousel__btn--prev" aria-label="Anterior">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>

                    <div class="movie-carousel__track">
                        {{-- Movie Card 1 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoiijhroebv0MaFNfyAi4iqm1v_K28CZ8QeVePKrXtgLDWx2aeUmhfY-15iYqX1pegr8th50c4VnrEQrV2NzWzTfEe7OPmVLpL-oEHzc1nKsX6SIr2s6m-b-RzI2zlI3iOWgSZgpMofYcTmmTS7ODse0LCEOZ_0mPNLhSXpaP9MXiZXO1NLw4BVIWpK6jVkSx4kFJORiszqWjQBbI2OOxAwe1die_-RaqUJwGED6Bn_RDO1Hgpz2AgQQSdGIrnsWjKT-0kt3B9kiRx"
                                    alt="Shadow of the City">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">★ 8.9</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">Shadow of the City</h3>
                                    <p class="movie-card__genre">Acción, Crimen</p>
                                </div>
                                <div class="movie-card__footer">
                                    <span class="movie-card__price">$14.50</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
                                </div>
                            </div>
                        </article>

                        {{-- Movie Card 2 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBBLVDA2MCtEU5ft2iXQ4pyJGS0cB0SYUeYUznGChExeORmtNdndHHhqDhTlvjXH1AaG-dN3MWLnPwy66_gnOSm-yeO8zAbV2dGrcAaFesz_o-PAJnN5XWnNrgVm2AeqTLQZHBVwpxEUmr9L-7FRU7VLpkJsnJZoSPaCAU-nHkbl2MPXxxjj4Q6mfl5-Zqm8it9IbCfNZq34_92x7yNSG0ZoKtzOxk5OIKaZZfWxOTPTRPbTHDoGV7_sbPxrQVGz3KeXR9aWkPr9UE"
                                    alt="The Last Horizon">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">★ 9.2</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">The Last Horizon</h3>
                                    <p class="movie-card__genre">Ciencia Ficción, Aventura</p>
                                </div>
                                <div class="movie-card__footer">
                                    <span class="movie-card__price">$16.00</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
                                </div>
                            </div>
                        </article>

                        {{-- Movie Card 3 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAs27qMUsheNFHdVV5j_2tbQW7jgep4NM4_WV0MAzjYRlUfOvDcdmIwV_w8caFAuQ6c5LZ6AhZiBd5L56j5X-GOffd-Vh-GgxlpjH7hC2SoYrI2DZFArEaUddx4hAhJDE2w5Y9-wiAy0MVUZoZDS-MOwT7OyoWRqEZJglhrUjOLj2AN2fk3ABEK0mcUlYxx-58H2MdtnpVKSK8Ix_Ivj0z7-F6btZVsRjAtPk--khqS0oS6rqzPXMZ6CN-elj-HZUVGeXSvrfLRCUo1"
                                    alt="Velvet Dynasty">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">★ 8.5</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">Velvet Dynasty</h3>
                                    <p class="movie-card__genre">Drama, Historia</p>
                                </div>
                                <div class="movie-card__footer">
                                    <span class="movie-card__price">$13.00</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
                                </div>
                            </div>
                        </article>

                        {{-- Movie Card 4 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmaC_RMDeS-ntvPQeZycAzbVsAFwDD1nowI9oYMRW-083LezjlNaA9cCWKDs--Z4WgH5crUkUrEuvAyZ_goJViIGAPoopC6LN7ZS9FQoytjyYa9jzmNlV2Mz9W52iIyg13AMneeLPf5Arnzlu1v6CUhqUm9SSscZeQScfwss8LS5KpohR-8sMe8uw6ZjM4hZE9t1zJRtlX-qX7Ydf2RWeapuoBAFzPcm8QGMK1yNDA98DywoffU_TOh3dpTNMeeZUzbFH2SSuzDqb0"
                                    alt="Silence Speaks">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">★ 7.8</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">Silence Speaks</h3>
                                    <p class="movie-card__genre">Terror, Thriller</p>
                                </div>
                                <div class="movie-card__footer">
                                    <span class="movie-card__price">$14.50</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
                                </div>
                            </div>
                        </article>

                        {{-- Movie Card 5 --}}
                        <article class="movie-card">
                            <div class="movie-card__poster">
                                <img class="movie-card__img"
                                    src="https://sacnkprodarcms.blob.core.windows.net/content/posters/HO00011952.jpg"
                                    alt="Supermario Galaxy: La pelicula">
                            </div>
                            <div class="movie-card__rating">
                                <span class="movie-card__rating-value">★ 9.0</span>
                            </div>
                            <div class="movie-card__info">
                                <div>
                                    <h3 class="movie-card__title">Supermario Galaxy: La pelicula</h3>
                                    <p class="movie-card__genre">Animacion, Aventura</p>
                                </div>
                                <div class="movie-card__footer">
                                    <span class="movie-card__price">$14.50</span>
                                    <button class="btn btn--ticket">Comprar Entradas</button>
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
    </main>
@endsection

@push('scripts')
<script>
    /* Inicializa cada carousel de películas: botones prev/next desplazan
       el track por el ancho de una card + gap */
    document.querySelectorAll('[data-carousel]').forEach(function(carousel) {
        var track = carousel.querySelector('.movie-carousel__track');
        var btnPrev = carousel.querySelector('.movie-carousel__btn--prev');
        var btnNext = carousel.querySelector('.movie-carousel__btn--next');

        /* Desplazamiento = ancho de la primera card + gap del track */
        function getScrollAmount() {
            var card = track.querySelector('.movie-card');
            if (!card) return 300;
            var gap = parseInt(getComputedStyle(track).gap) || 32;
            return card.offsetWidth + gap;
        }

        btnPrev.addEventListener('click', function() {
            track.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
        });

        btnNext.addEventListener('click', function() {
            track.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
        });

        /* Actualiza estado de botones según posición del scroll */
        function updateButtons() {
            btnPrev.disabled = track.scrollLeft <= 0;
            btnNext.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 1;
        }

        track.addEventListener('scroll', updateButtons);
        updateButtons();
    });
</script>
@endpush

@extends('layouts.navbar-y-footer.app')

@section('title', 'Cinevibe')

@section('content')
    <main class="home-main">

        {{-- Carrusel Bootstrap (conservado: clases Bootstrap nativas) --}}
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/carousel-1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel-2.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel-3.webp') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel-4.webp') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        {{-- Sección Now Showing: grid de tarjetas de películas --}}
        <section class="home-section home-section--surface">
            <div class="container">
                {{-- Cabecera de sección con badge + botón filtro --}}
                <header class="section-header">
                    <div class="section-header__inner">
                        <span class="section-header__kicker">Live Experience</span>
                        <h2 class="section-header__title">Now Showing</h2>
                    </div>
                    <div class="section-header__actions">
                        <button class="btn btn--icon">
                            <span class="material-symbols-outlined">filter_list</span>
                        </button>
                    </div>
                </header>

                {{-- Grid responsivo de tarjetas --}}
                <div class="movie-grid">
                    {{-- Movie Card 1 --}}
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                data-alt="Modern noir film poster aesthetic showing a detective in a rain-slicked city street at night under neon signs"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoiijhroebv0MaFNfyAi4iqm1v_K28CZ8QeVePKrXtgLDWx2aeUmhfY-15iYqX1pegr8th50c4VnrEQrV2NzWzTfEe7OPmVLpL-oEHzc1nKsX6SIr2s6m-b-RzI2zlI3iOWgSZgpMofYcTmmTS7ODse0LCEOZ_0mPNLhSXpaP9MXiZXO1NLw4BVIWpK6jVkSx4kFJORiszqWjQBbI2OOxAwe1die_-RaqUJwGED6Bn_RDO1Hgpz2AgQQSdGIrnsWjKT-0kt3B9kiRx">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">★ 8.9</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">Shadow of the City</h3>
                                <p class="movie-card__genre">Action, Crime</p>
                            </div>
                            <div class="movie-card__footer">
                                <span class="movie-card__price">$14.50</span>
                                <button class="btn btn--ticket">Buy Tickets</button>
                            </div>
                        </div>
                    </article>

                    {{-- Movie Card 2 --}}
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                data-alt="Conceptual film poster of a lone astronaut walking on a white salt flat under an enormous orange sun"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBBLVDA2MCtEU5ft2iXQ4pyJGS0cB0SYUeYUznGChExeORmtNdndHHhqDhTlvjXH1AaG-dN3MWLnPwy66_gnOSm-yeO8zAbV2dGrcAaFesz_o-PAJnN5XWnNrgVm2AeqTLQZHBVwpxEUmr9L-7FRU7VLpkJsnJZoSPaCAU-nHkbl2MPXxxjj4Q6mfl5-Zqm8it9IbCfNZq34_92x7yNSG0ZoKtzOxk5OIKaZZfWxOTPTRPbTHDoGV7_sbPxrQVGz3KeXR9aWkPr9UE">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">★ 9.2</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">The Last Horizon</h3>
                                <p class="movie-card__genre">Sci-Fi, Adventure</p>
                            </div>
                            <div class="movie-card__footer">
                                <span class="movie-card__price">$16.00</span>
                                <button class="btn btn--ticket">Buy Tickets</button>
                            </div>
                        </div>
                    </article>

                    {{-- Movie Card 3 --}}
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                data-alt="Cinematic portrait of a regal woman in ornate historical costume with soft candlelight and dark velvet background"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAs27qMUsheNFHdVV5j_2tbQW7jgep4NM4_WV0MAzjYRlUfOvDcdmIwV_w8caFAuQ6c5LZ6AhZiBd5L56j5X-GOffd-Vh-GgxlpjH7hC2SoYrI2DZFArEaUddx4hAhJDE2w5Y9-wiAy0MVUZoZDS-MOwT7OyoWRqEZJglhrUjOLj2AN2fk3ABEK0mcUlYxx-58H2MdtnpVKSK8Ix_Ivj0z7-F6btZVsRjAtPk--khqS0oS6rqzPXMZ6CN-elj-HZUVGeXSvrfLRCUo1">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">★ 8.5</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">Velvet Dynasty</h3>
                                <p class="movie-card__genre">Drama, History</p>
                            </div>
                            <div class="movie-card__footer">
                                <span class="movie-card__price">$13.00</span>
                                <button class="btn btn--ticket">Buy Tickets</button>
                            </div>
                        </div>
                    </article>

                    {{-- Movie Card 4 --}}
                    <article class="movie-card">
                        <div class="movie-card__poster">
                            <img class="movie-card__img"
                                data-alt="Abstract horror movie poster with a shadowy figure standing in a dimly lit doorway with red foggy atmosphere"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmaC_RMDeS-ntvPQeZycAzbVsAFwDD1nowI9oYMRW-083LezjlNaA9cCWKDs--Z4WgH5crUkUrEuvAyZ_goJViIGAPoopC6LN7ZS9FQoytjyYa9jzmNlV2Mz9W52iIyg13AMneeLPf5Arnzlu1v6CUhqUm9SSscZeQScfwss8LS5KpohR-8sMe8uw6ZjM4hZE9t1zJRtlX-qX7Ydf2RWeapuoBAFzPcm8QGMK1yNDA98DywoffU_TOh3dpTNMeeZUzbFH2SSuzDqb0">
                        </div>
                        <div class="movie-card__rating">
                            <span class="movie-card__rating-value">★ 7.8</span>
                        </div>
                        <div class="movie-card__info">
                            <div>
                                <h3 class="movie-card__title">Silence Speaks</h3>
                                <p class="movie-card__genre">Horror, Thriller</p>
                            </div>
                            <div class="movie-card__footer">
                                <span class="movie-card__price">$14.50</span>
                                <button class="btn btn--ticket">Buy Tickets</button>
                            </div>
                        </div>
                    </article>
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
                        <h2 class="promo-banner__title">Join THE VELVET CLUB</h2>
                        <p class="promo-banner__desc">
                            Get 20% off all bookings, exclusive premiere invites, and complimentary popcorn on every visit.
                            The ultimate cinematic lifestyle awaits.
                        </p>
                        <div class="promo-banner__actions">
                            <button class="btn btn--secondary">Become a Member</button>
                            <button class="btn btn--ghost">
                                Learn More
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
                                    <span class="promo-banner__pass">PREMIUM PASS</span>
                                    <div>
                                        <div class="promo-banner__since-label">Member Since</div>
                                        <div class="promo-banner__since-year">2024</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Sección Coming Soon con scroll horizontal --}}
        <section class="home-section home-section--surface-lowest">
            <div class="container">
                {{-- Cabecera con divisor --}}
                <header class="section-header section-header--divider">
                    <h2 class="section-header__title">Coming Soon</h2>
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
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDF3ELrrDj95rxc7aD_im6fBQMD_MOlyvn-Q2Mywqg-_xwRs5aMG-1aMdahBrBR9GeWoDUomvSADSBUZpHpVOcigseAgPz6ETZ4oJoaqqCVbSAwjy2sm3WQegqsFJdPil1jel70cX64cyg7Chwx0Dtd0CtXrBk1P6p6XFmKfksgjWG8-mwZJbB6WnESnzR5jscbiAPG3qa12antZuBosT1f5YZnU-TCzRUpF8JyNlTXO_5M_iTjnhPwQyznYWn_JY3xAAF0pGuVHz-P">
                            <span class="preview-card__date">Dec 15</span>
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

                    {{-- Preview 4 --}}
                    <article class="preview-card">
                        <div class="preview-card__media">
                            <img class="preview-card__img"
                                data-alt="Warm sunlight filtering through trees in an old European courtyard with people having dinner, soft cinematic look"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCs19Cx93fNncswMcvNTFqDMIBiTiOIUoNos0LfhCokMldnB7xFt3rLakcXGe_qCoLitTPBVkJbXuBzCBGhD60f6pQSIXTSM3wGmBUDhijj84fGiuqiMpGD2rehX243iYWmuAA1mNyzLZU109eYB5SBJRd7unQHMmJJuvXeP0_wY8Bq5qJ-L99RoEA_7Ph5qBvyyFY6c-U1UlpLTo9oZtphFBsD7DrTmgnDmkmkUo0ux49DXP90IT377B24XIpGiwHgI4lr3gsVQcC4">
                            <span class="preview-card__date">Feb 14</span>
                        </div>
                        <h3 class="preview-card__title">Midsummer Echoes</h3>
                        <p class="preview-card__meta">Romance, Comedy</p>
                    </article>
                </div>
            </div>
        </section>
    </main>
@endsection

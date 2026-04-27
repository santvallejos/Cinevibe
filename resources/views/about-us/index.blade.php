@extends('layouts.navbar-y-footer.app')

@section('title', 'Sobre Nosotros — Cinevibe')

@push('styles')
    <link href="{{ asset('vendor/bootstrap/css/pages/about-us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <main>

        {{-- ===== HERO: imagen de fondo con texto centrado ===== --}}
        <section class="about-hero">
            <div class="about-hero__bg-wrap">
                <img
                    class="about-hero__bg-img"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDKXWVqD7BFxXYRZMnkc8B9DmwJQxlwRTA1P5lAWFc7e7nmutT9OIG15wPB-qk6UjlWhlL6XOS4mpZhV7AfBJAhQZIRmLu2O6OeVbu8O99u40_uwvkp3JxtmUq9fvC1PKXcBxGWBGnwJk7JYngN4ZsMkV2f9KqkhBFGfRSiCz0Pv_mhI6n76doUYzhAP0ju35d43Av-tmosEOHhHtf6-rA9-y_XahHaBCrwDzDw1hsuk2AVfVy4OjFElOq4lExDMW7bgDRcwV3PNiTL"
                    alt="Luxurious cinema hall"
                >
                <div class="about-hero__overlay-gradient"></div>
                <div class="about-hero__overlay-dark"></div>
            </div>

            <div class="about-hero__content">
                <span class="about-hero__kicker">Nuestra Identidad</span>
                <h1 class="about-hero__title">
                    Nuestra Historia: <br>
                    <span class="about-hero__title-accent">El Arte de Curar el Cine</span>
                </h1>
                <div class="about-hero__divider"></div>
            </div>

            {{-- Flecha animada para indicar scroll --}}
            <div class="about-hero__scroll">
                <span class="material-symbols-outlined">keyboard_double_arrow_down</span>
            </div>
        </section>

        {{-- ===== MISIÓN: texto descriptivo + imagen --}}
        <section class="about-mission">
            <div class="about-mission__grid">
                <div class="about-mission__text">
                    <h2 class="about-mission__headline">Compromiso con la Exclusividad</h2>
                    <p class="about-mission__body about-mission__body--xl">
                        En <em class="about-mission__brand">The Velvet Curator</em>, no solo proyectamos
                        películas; preservamos la mística del séptimo arte. Nuestra misión es transformar
                        cada función en una gala privada, donde la calidad técnica se encuentra con la
                        hospitalidad de clase mundial.
                    </p>
                    <p class="about-mission__body about-mission__body--lg">
                        Desde la selección meticulosa de nuestra cartelera hasta el diseño acústico de
                        nuestras salas, cada detalle está pensado para el espectador que exige nada
                        menos que la perfección.
                    </p>
                </div>
                <div class="about-mission__image-wrap">
                    <img
                        class="about-mission__image"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCrIUAboNXw-i-Ua-gNx_cma4SCnEmkM85wQSe0qfmAzeM3VT3pBoVtpWuP-19kQjFALmoE6VQoYV4jQh6wfjSrhGBKXGDo6Pe9lQCuN7p_mtF6zVVYTuT17tduH2sW9R0kvXo0dpjsNGVOvBgIPRgKz09jq__I40xUUt0b4bIz_n69kTlVxdgs3ysF2cnPGGv-NduX2u4xxaA7QGBICjL-9SdNtVm-O-OyqvuAPtCS8HC6vafKFYZbQxEn1vTP5Ci15op-VcSiJcjo"
                        alt="Film projector"
                    >
                    <div class="about-mission__image-ring"></div>
                </div>
            </div>
        </section>

        {{-- ===== EXPERIENCIA: bento grid de servicios --}}
        <section class="about-experience">
            <div class="about-experience__inner">
                <div class="about-experience__header">
                    <h2 class="about-experience__title">La Experiencia Curada</h2>
                    <p class="about-experience__subtitle">Elevando los estándares del cine moderno</p>
                </div>

                <div class="about-experience__grid">

                    {{-- Screenings Privados — ocupa 2 columnas en desktop --}}
                    <div class="about-experience__card about-experience__card--wide">
                        <img
                            class="about-experience__card-img"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGjc5ZwuketOOhLkKiAm7HmKnjrl28pg1bolVkHAusD_ir5D6E0BrJ4KXSNzEC5XOQh_AA743ezHSmTUEdsIUbXX8syjy5uEJNqiBYgVEd1ykIkevXCsMC_r_xkZNlKyqxOFia8Jd5HCa3lVTK8faQxDgbYh1J4MNOALUkkhqkUdV6ck0CuTPfNm7f3rLPtpwpzwUb7tBYCxb-eG3I35-dtZNzZXfmEv8Dc09Gzh1s_xli0DWt2Ne4we_pN2umGeNxITOna-lg255Z"
                            alt="Private lounge"
                        >
                        <div class="about-experience__card-overlay"></div>
                        <div class="about-experience__card-body">
                            <span
                                class="material-symbols-outlined about-experience__card-icon"
                                style="font-variation-settings: 'FILL' 1"
                            >hotel_class</span>
                            <h3 class="about-experience__card-title">Screenings Privados</h3>
                            <p class="about-experience__card-text">Salas íntimas diseñadas para eventos exclusivos y estrenos a puerta cerrada.</p>
                        </div>
                    </div>

                    {{-- Gourmet Bar --}}
                    <div class="about-experience__card">
                        <img
                            class="about-experience__card-img"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvF6VX_96v0SpJEJXCJ-TFSx4WSLT9kUa6SkypDwMfh-Zj6R6NRGLASbQN4dDt6A5A2y1LPeAbNoM3AC3Qi51JFNwnsy6b8oWaKaD0iCrdwZ7dNqFBkMz2wRVcOG3Z74_-BAjbUr9CurrS3p4kYeXLQgIzKSJ6gPfPZd94h6p5s4j1dIVC60iraBvzNrb0kafQMbwfTYR-83ed9TAuPt-1M9srhFVYJxIQ35nL7lzALYXeu1oSU-ZfT7jsgEXxtZUmBQ3QfQJuSH0E"
                            alt="Gourmet concessions"
                        >
                        <div class="about-experience__card-overlay about-experience__card-overlay--heavy"></div>
                        <div class="about-experience__card-body">
                            <span class="material-symbols-outlined about-experience__card-icon">restaurant</span>
                            <h3 class="about-experience__card-title about-experience__card-title--sm">Gourmet Bar</h3>
                            <p class="about-experience__card-text about-experience__card-text--sm">Maridajes seleccionados y coctelería de autor inspirada en clásicos.</p>
                        </div>
                    </div>

                    {{-- Tecnología 8K --}}
                    <div class="about-experience__card">
                        <img
                            class="about-experience__card-img"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtb8rewkLZWjqgdCVmDy6jewERu1gcZEco1HeM4jx-ETE8goHE1lPuSwLzmnt87gk3STaU0DK6w0VMSqPOhoKAjnp92g7KAmh5tHX90wOMaX7OU_gpRBxBKgBZFQjUsLR13cLvjvnJBo0Tr45dMPLNTe9KArPdrMd8QL-j7xev4lEeEFq6BvObhxWMAk8BEtk8J93k1pamKcQrQFHeQU7EQNllBSDj7FnTab4S1WCoyrD3kgGLDPQJrKCFO9fFKwX-mUs3_QdV6isR"
                            alt="Cinematic sound"
                        >
                        <div class="about-experience__card-overlay about-experience__card-overlay--heavy"></div>
                        <div class="about-experience__card-body">
                            <span class="material-symbols-outlined about-experience__card-icon">surround_sound</span>
                            <h3 class="about-experience__card-title about-experience__card-title--sm">Tecnología 8K</h3>
                            <p class="about-experience__card-text about-experience__card-text--sm">Proyección láser y sistemas Dolby Atmos de última generación.</p>
                        </div>
                    </div>

                    {{-- The Curator Circle — membresía élite, sin imagen --}}
                    <div class="about-experience__curator">
                        <div class="about-experience__curator-bg"></div>
                        <div class="about-experience__curator-content">
                            <h3 class="about-experience__curator-title">The Curator Circle</h3>
                            <p class="about-experience__curator-text">
                                Únase a nuestra membresía élite y obtenga acceso a pre-estrenos mundiales,
                                asientos preferenciales permanentes y conserjería personalizada.
                            </p>
                            <div>
                                <button class="about-experience__curator-btn">Saber más</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- ===== LEGADO: línea de tiempo histórica --}}
        <section class="about-legacy">
            <div class="about-legacy__flare about-legacy__flare--top"></div>
            <div class="about-legacy__flare about-legacy__flare--bottom"></div>

            <div class="about-legacy__inner">
                <h2 class="about-legacy__title">Nuestro Legado</h2>

                <div class="about-legacy__timeline">

                    {{-- Entrada 1994 --}}
                    <div class="about-legacy__entry">
                        <div class="about-legacy__dot"></div>
                        <span class="about-legacy__year">1994</span>
                        <h4 class="about-legacy__entry-title">El Inicio de un Sueño</h4>
                        <p class="about-legacy__entry-text">
                            Nuestra primera sala abrió en el corazón de la ciudad con un solo propósito:
                            devolverle al cine su carácter de evento social y artístico. Comenzamos como
                            una pequeña filmoteca privada.
                        </p>
                    </div>

                    {{-- Entrada 2010 --}}
                    <div class="about-legacy__entry">
                        <div class="about-legacy__dot about-legacy__dot--dim"></div>
                        <span class="about-legacy__year">2010</span>
                        <h4 class="about-legacy__entry-title">Expansión Boutique</h4>
                        <p class="about-legacy__entry-text">
                            Consolidamos nuestra presencia nacional abriendo cinco sedes icónicas, cada una
                            diseñada por arquitectos de renombre para respetar la esencia de cada barrio.
                        </p>
                    </div>

                    {{-- Entrada actual --}}
                    <div class="about-legacy__entry">
                        <div class="about-legacy__dot"></div>
                        <span class="about-legacy__year">Hoy</span>
                        <h4 class="about-legacy__entry-title">El Referente del Lujo</h4>
                        <p class="about-legacy__entry-text">
                            Hoy, The Velvet Curator es sinónimo de excelencia cinematográfica a nivel
                            internacional, siendo la sede preferida para los festivales más prestigiosos
                            del mundo.
                        </p>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection

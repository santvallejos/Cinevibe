@extends('layouts.navbar-y-footer.app')

@section('title', 'ofertas')

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/ofertas.css') }}">

<style>
/* =========================================
   BENTO GRID MEJORADO
========================================= */
.bento-grid{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:1.25rem;
    align-items:stretch;
}

/* Columna derecha */
.bento-right{
    display:grid;
    grid-template-rows:220px 1fr;
    gap:1.25rem;
}

/* Las dos imágenes inferiores más grandes */
.bento-right-bottom{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:1.25rem;
    min-height:280px;
}

.bento-card{
    position:relative;
    overflow:hidden;
    border-radius:22px;
    background:#111;
    cursor:pointer;
    box-shadow:0 12px 30px rgba(0,0,0,.35);
    transition:all .35s ease;
}

.bento-card img{
    width:100%;
    height:100%;
    object-fit:cover;
    object-position:center;
    transition:transform .6s ease, filter .4s ease;
}

/* Imagen principal izquierda */
.bento-card--main{
    min-height:520px;
}

/* Overlay */
.bento-card::after{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(to top, rgba(0,0,0,.72), transparent 45%);
    opacity:.9;
    transition:.4s ease;
}

/* Hover */
.bento-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 50px rgba(0,0,0,.55);
}

.bento-card:hover img{
    transform:scale(1.08);
    filter:brightness(1.08);
}

.bento-card:hover::after{
    opacity:.45;
}

/* Botón */
.bento-btn{
    position:absolute;
    bottom:18px;
    left:18px;
    z-index:3;
    background:#e50914;
    color:#fff;
    border:none;
    border-radius:50px;
    padding:.7rem 1.2rem;
    font-size:.85rem;
    font-weight:700;
    letter-spacing:.04em;
    transition:.3s ease;
}

.bento-btn:hover{
    background:#ff1f2d;
    transform:scale(1.05);
}

/* Responsive */
@media(max-width:991px){

    .bento-grid{
        grid-template-columns:1fr;
    }

    .bento-right{
        grid-template-rows:auto;
    }

    .bento-right-bottom{
        grid-template-columns:1fr;
    }

    .bento-card--main{
        min-height:320px;
    }

    .bento-card{
        min-height:240px;
    }
}
</style>
@endpush

@section('content')

<div class="home-page">

{{-- HERO --}}
<section class="cs-hero d-flex align-items-center justify-content-center">
    <div class="cs-hero__bg"
        style="background-image:url('https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?w=1600&q=80');">
    </div>

    <div class="cs-hero__overlay"></div>

    <div class="cs-hero__content text-center px-3" style="max-width:800px;">
        <h1 class="cs-text-display-xl text-white mb-3">
            El Cine Sin Límites
        </h1>

        <p class="cs-text-body-lg text-white-50 mb-4">
            Miles de películas, series y documentales disponibles cuando quieras.
            Calidad 4K, audio Dolby y descarga sin conexión incluidos.
        </p>

        <a href="#membership" class="btn cs-btn cs-btn--primary">
            Comenzar Ahora
        </a>
    </div>
</section>

{{-- EXPERIENCIA CINEVIBE --}}
<section class="py-section">
    <div class="container-xl">

        <h2 class="cs-text-headline-lg text-white mb-4">
            Experiencia Cinevibe
        </h2>

        <div class="bento-grid">

            {{-- IZQUIERDA GRANDE --}}
            <div class="bento-card bento-card--main">
                <img src="{{ asset('img/home/bento grid/bento-grid-4.png') }}" alt="">
                <button class="bento-btn">Quiero la promo</button>
            </div>

            {{-- DERECHA --}}
            <div class="bento-right">

                {{-- Arriba --}}
                <div class="bento-card">
                    <img src="{{ asset('img/home/bento grid/bento-grid-2.png') }}" alt="">
                    <button class="bento-btn">Quiero la promo</button>
                </div>

                {{-- Abajo dos grandes --}}
                <div class="bento-right-bottom">

                    <div class="bento-card">
                        <img src="{{ asset('img/home/bento grid/bento-grid-1.png') }}" alt="">
                        <button class="bento-btn">Quiero la promo</button>
                    </div>

                    <div class="bento-card">
                        <img src="{{ asset('img/home/bento grid/bento-grid-3.png') }}" alt="">
                        <button class="bento-btn">Quiero la promo</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

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

@endsection
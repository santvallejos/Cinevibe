@extends('layouts.navbar-y-footer.app')

@section('title', 'Términos y Condiciones — Cinevibe')

@push('styles')
    <link href="{{ asset('vendor/bootstrap/css/pages/terms-and-conditions.css') }}" rel="stylesheet">
@endpush

@section('content')
    {{-- Wrapper principal con padding y max-width --}}
    <main class="tc">

        {{-- ===== HERO HEADER ===== --}}
        <header class="tc__header">
            <h1 class="tc__title">
                Términos <span class="tc__title-accent">&amp;</span> Condiciones
            </h1>
            <p class="tc__date">Última actualización: 12 de Mayo, 2024</p>

            {{-- Imagen hero con overlay y badge --}}
            <div class="tc__hero-img-wrap">
                <img class="tc__hero-img" alt="Theater Interior"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-WKoRAjkmfCMet_Eb9GsvyJj1Wk0qaRAhMat7o5rVbypk0zV-nIvwMPR8-d6p76jVdoI_IalaTNz4NLKi7pyP2jgdkR5RI9SzJP69KgJGhXsQvQYH8LNLse7KQsAN1bh9zp5rFcMqx_h6hAfh39FU3m7pxlll4b5LqXyhXLgA4vols8cxdO4yJ3HqLPPOzDFzQMisYKLsrjltmcw05OXxqncUTJN4ymCarSRFQM6etXkWqsZI2jG7gBUEEpq5etXlexUBN2bl1dxR">
                <div class="tc__hero-overlay"></div>
            </div>
        </header>

        {{-- ===== LAYOUT: sidebar fija + canvas de contenido ===== --}}
        <div class="tc__layout">

            {{-- Sidebar: tabla de contenidos (oculta en mobile) --}}
            <aside class="tc__sidebar">
                <nav class="tc__sidebar-nav">
                    <h3 class="tc__sidebar-title">Navegación</h3>
                    <ul class="tc__sidebar-list">
                        <li><a class="tc__sidebar-link" href="#intro">1. Introducción</a></li>
                        <li><a class="tc__sidebar-link" href="#club">2. Cinevibe Club</a></li>
                        <li><a class="tc__sidebar-link" href="#booking">3. Reservas &amp; Tickets</a></li>
                        <li><a class="tc__sidebar-link" href="#cancel">4. Cancelaciones</a></li>
                        <li><a class="tc__sidebar-link" href="#privacy">5. Privacidad</a></li>
                        <li><a class="tc__sidebar-link" href="#intellectual">6. Propiedad Intelectual</a></li>
                    </ul>
                </nav>
            </aside>

            {{-- Canvas: secciones de contenido legal --}}
            <div class="tc__canvas">

                {{-- Sección 01: Introducción --}}
                <section class="tc-section tc-section--low" id="intro">
                    <div class="tc-section__header">
                        <span class="tc-section__number">01.</span>
                        <h2 class="tc-section__title">Introducción</h2>
                    </div>
                    <p class="tc-section__text">
                        Bienvenido a Cinevibe, la experiencia definitiva en cinematografía curada. Al acceder a
                        nuestra plataforma y utilizar nuestros servicios, usted acepta estar sujeto a estos términos
                        y condiciones. Nuestra misión es ofrecer un entorno de exclusividad y confort
                        cinematográfico, lo cual requiere el cumplimiento de normativas específicas para mantener
                        los estándares de "The Velvet Curator".
                    </p>
                    <p class="tc-section__text--muted">
                        Estos términos rigen el uso del sitio web cinevibe.com, nuestras aplicaciones móviles y
                        todas las interacciones físicas dentro de nuestros complejos. Nos reservamos el derecho de
                        modificar estos términos en cualquier momento para reflejar cambios en la ley o en nuestra
                        oferta de servicios.
                    </p>
                </section>

                {{-- Sección 02: Cinevibe Club --}}
                <section class="tc-section tc-section--default" id="club">
                    {{-- Mancha de luz decorativa --}}
                    <div class="tc-section__flare"></div>

                    <div class="tc-section__header">
                        <span class="tc-section__number">02.</span>
                        <h2 class="tc-section__title">Cinevibe Club Membership</h2>
                    </div>
                    <p class="tc-section__text">
                        La membresía de Cinevibe Club es un privilegio personal e intransferible. Los beneficios
                        incluyen acceso a preventas exclusivas, eventos de curaduría y descuentos en nuestra
                        selección de concesiones gourmet.
                    </p>

                    {{-- Grid de tarjetas de beneficios --}}
                    <div class="tc-section__grid">
                        <div class="tc-card">
                            <span class="material-symbols-outlined tc-card__icon"
                                style="font-variation-settings: 'FILL' 1">stars</span>
                            <h4 class="tc-card__title">Renovación Automática</h4>
                            <p class="tc-card__text">Las cuotas se cargan mensualmente de forma automática.
                                Puede cancelar en cualquier momento antes del próximo ciclo de facturación.</p>
                        </div>
                        <div class="tc-card">
                            <span class="material-symbols-outlined tc-card__icon"
                                style="font-variation-settings: 'FILL' 1">verified_user</span>
                            <h4 class="tc-card__title">Uso Responsable</h4>
                            <p class="tc-card__text">El abuso de beneficios o comportamiento inapropiado
                                resultará en la revocación inmediata de la membresía sin reembolso.</p>
                        </div>
                    </div>
                </section>

                {{-- Sección 03: Reservas & Tickets --}}
                <section class="tc-section tc-section--accent" id="booking">
                    <div class="tc-section__header">
                        <span class="tc-section__number tc-section__number--primary">03.</span>
                        <h2 class="tc-section__title">Reservas &amp; Tickets</h2>
                    </div>
                    <p class="tc-section__text--muted" style="margin-bottom: var(--sp-6)">
                        La adquisición de un ticket garantiza el acceso a una sesión específica. Los asientos son
                        seleccionados en el momento de la compra y no pueden ser alterados una vez confirmada la
                        transacción sin la intervención de nuestro equipo de concierge.
                    </p>
                    <ul class="tc-list">
                        <li class="tc-list__item">
                            <span class="material-symbols-outlined tc-list__icon">confirmation_number</span>
                            <span>Los tickets digitales deben presentarse en la entrada para su escaneo.</span>
                        </li>
                        <li class="tc-list__item">
                            <span class="material-symbols-outlined tc-list__icon">timer</span>
                            <span>Se recomienda llegar 15 minutos antes de la función. No se permitirá el acceso una
                                vez pasados 20 minutos de iniciada la película.</span>
                        </li>
                    </ul>
                </section>

                {{-- Sección 04: Política de Cancelación --}}
                <section class="tc-section tc-section--highest" id="cancel">
                    <div class="tc-section__header">
                        <span class="tc-section__number">04.</span>
                        <h2 class="tc-section__title">Política de Cancelación</h2>
                    </div>
                    <p class="tc-section__text--muted" style="margin-bottom: var(--sp-8)">
                        Entendemos que los planes pueden cambiar. Nuestra política de reembolso está diseñada para ser
                        justa tanto para el espectador como para la curaduría de la sala.
                    </p>

                    {{-- Tabla de plazos y reembolsos --}}
                    <div class="tc-table-wrap">
                        <table class="tc-table">
                            <thead>
                                <tr class="tc-table__head-row">
                                    <th>Tiempo de Preaviso</th>
                                    <th>Reembolso / Crédito</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Más de 24 horas</td>
                                    <td class="tc-table__credit--full">100% Crédito Cinevibe</td>
                                </tr>
                                <tr>
                                    <td>Entre 2 y 24 horas</td>
                                    <td class="tc-table__credit--half">50% Crédito Cinevibe</td>
                                </tr>
                                <tr>
                                    <td>Menos de 2 horas</td>
                                    <td class="tc-table__credit--none">No reembolsable</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                {{-- Secciones 05 + 06: Privacidad y Propiedad Intelectual --}}
                <div class="tc-mini-grid">
                    <section class="tc-mini-card" id="privacy">
                        <h3 class="tc-mini-card__title">
                            <span class="material-symbols-outlined tc-mini-card__icon">lock</span>
                            Privacidad
                        </h3>
                        <p class="tc-mini-card__text">
                            Sus datos están protegidos bajo estándares de encriptación de nivel militar. Solo utilizamos
                            su información para mejorar su experiencia de curaduría. Consulte nuestra
                            <a class="tc-mini-card__link" href="#">Política de Privacidad Completa</a>
                            para más detalles.
                        </p>
                    </section>
                    <section class="tc-mini-card" id="intellectual">
                        <h3 class="tc-mini-card__title">
                            <span class="material-symbols-outlined tc-mini-card__icon">copyright</span>
                            Propiedad Intelectual
                        </h3>
                        <p class="tc-mini-card__text">
                            Todo el contenido, diseño y logotipos de Cinevibe son propiedad exclusiva de Cinevibe S.A.
                            Queda estrictamente prohibida la reproducción total o parcial sin autorización expresa por
                            escrito.
                        </p>
                    </section>
                </div>

            </div>{{-- /.tc__canvas --}}
        </div>{{-- /.tc__layout --}}
    </main>
@endsection

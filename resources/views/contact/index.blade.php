@extends('layouts.navbar-y-footer.app')

@section('title', 'Contacto — Cinevibe')

@push('styles')
    <link href="{{ asset('vendor/bootstrap/css/pages/contact.css') }}" rel="stylesheet">
@endpush

@section('content')
    {{-- pt-24 para compensar la navbar fija (96px) --}}
    <main style="padding-top: var(--sp-24)">

        {{-- ===== HERO: imagen de fondo con título centrado --}}
        <section class="contact-hero">
            <div class="contact-hero__bg-wrap">
                <img
                    class="contact-hero__bg-img"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDepj3aLGt2BL9EKd5uMBrssiKt03wVpVJvMcXXZCOMp2TWdlTnRiGYv-1P0arcrZn8x8ROg382tOV_rav_Es3M9vNFo4YM3JTDRCkR0Zbr0IoGdR5YaAGPXEs9FchwYxs_aH9qMbD7xHooUws84ZpDBqGsru2QRzIncHZSVMT375O24lbMsmnwsWNnwJUHyGM4810lFmS1UHtxv2nXE-Ay3u3wtOGjyqRZdGQK69IHvO2gf16I_5cKDLAtqARL-mIiT2j4FDBG0rks"
                    alt="Cinema interior"
                >
                <div class="contact-hero__overlay"></div>
            </div>
            <div class="contact-hero__content">
                <h1 class="contact-hero__title">Centro de Atención al Cliente</h1>
                <p class="contact-hero__subtitle">
                    Elevando tu viaje cinematográfico mediante un servicio impecable y un apoyo dedicado.
                </p>
            </div>
        </section>

        {{-- ===== GRID canales de contacto + formulario --}}
        <section class="contact-main">
            <div class="contact-main__grid">

                {{-- Columna izquierda: canales directos + tarjeta promo --}}
                <div class="contact-channels">
                    <div>
                        <h2 class="contact-channels__section-title">
                            <span class="contact-channels__accent"></span>
                            Direct Channels
                        </h2>
                        <div class="contact-channels__list">

                            {{-- Dirección --}}
                            <div class="contact-channel">
                                <div class="contact-channel__icon-box">
                                    <span class="material-symbols-outlined contact-channel__icon">location_on</span>
                                </div>
                                <div>
                                    <p class="contact-channel__label">Main Office</p>
                                    <p class="contact-channel__value">
                                        Calle de la Terciopelo 42, Chamberí<br>
                                        28010 Madrid, Spain
                                    </p>
                                </div>
                            </div>

                            {{-- Teléfono --}}
                            <div class="contact-channel">
                                <div class="contact-channel__icon-box">
                                    <span class="material-symbols-outlined contact-channel__icon">call</span>
                                </div>
                                <div>
                                    <p class="contact-channel__label">Concierge Line</p>
                                    <p class="contact-channel__value">+34 912 345 678</p>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="contact-channel">
                                <div class="contact-channel__icon-box">
                                    <span class="material-symbols-outlined contact-channel__icon">mail</span>
                                </div>
                                <div>
                                    <p class="contact-channel__label">Official Inquiry</p>
                                    <p class="contact-channel__value">curator@velvetcurator.com</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Tarjeta promocional de eventos privados --}}
                    <div class="contact-promo">
                        <div class="contact-promo__flare"></div>
                        <h3 class="contact-promo__title">Private Screenings</h3>
                        <p class="contact-promo__text">
                            Host your next gala or premiere in an atmosphere of unparalleled sophistication.
                        </p>
                        <a class="contact-promo__link" href="#">
                            Explore Events
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                </div>

                {{-- Columna derecha: formulario de consulta --}}
                <div class="contact-form-panel">
                    <h2 class="contact-form-panel__title">Sophisticated Inquiry</h2>
                    <form class="contact-form" action="#">

                        {{-- Nombre (label flotante) --}}
                        <div class="contact-field">
                            <input class="contact-field__input" id="name" type="text" placeholder=" ">
                            <label class="contact-field__label" for="name">Full Name</label>
                        </div>

                        {{-- Email (label flotante) --}}
                        <div class="contact-field">
                            <input class="contact-field__input" id="email" type="email" placeholder=" ">
                            <label class="contact-field__label" for="email">Email Address</label>
                        </div>

                        {{-- Asunto (select) --}}
                        <div class="contact-field">
                            <select class="contact-field__select" id="subject">
                                <option disabled selected value="">Subject of Interest</option>
                                <option value="booking">Ticketing &amp; Bookings</option>
                                <option value="membership">Velvet Membership</option>
                                <option value="events">Private Events</option>
                                <option value="other">General Feedback</option>
                            </select>
                        </div>

                        {{-- Mensaje (textarea con label flotante) --}}
                        <div class="contact-field">
                            <textarea class="contact-field__textarea" id="message" rows="4" placeholder=" "></textarea>
                            <label class="contact-field__label" for="message">Your Message</label>
                        </div>

                        <button class="contact-form__submit" type="submit">Submit Inquiry</button>
                    </form>
                </div>

            </div>
        </section>

        {{-- ===== FAQ: acordeón nativo con <details> --}}
        <section class="contact-faq">
            <div class="contact-faq__inner">
                <div class="contact-faq__header">
                    <h2 class="contact-faq__title">Curated Assistance</h2>
                    <p class="contact-faq__subtitle">Refined answers to your most frequent considerations.</p>
                </div>

                <div class="contact-faq__list">

                    <details class="contact-faq__item" open>
                        <summary class="contact-faq__summary">
                            <span class="contact-faq__question">How do I access the Velvet Lounge before my screening?</span>
                            <span class="material-symbols-outlined contact-faq__icon">expand_more</span>
                        </summary>
                        <div class="contact-faq__answer">
                            All patrons with a Premier or Private Box ticket may access the Velvet Lounge
                            45 minutes prior to their scheduled showtime. Simply present your digital
                            curator pass at the entrance on Level 2.
                        </div>
                    </details>

                    <details class="contact-faq__item">
                        <summary class="contact-faq__summary">
                            <span class="contact-faq__question">Can I modify a booking after confirmation?</span>
                            <span class="material-symbols-outlined contact-faq__icon">expand_more</span>
                        </summary>
                        <div class="contact-faq__answer">
                            Modifications can be curated up to 4 hours before the screening time. Please
                            navigate to 'My Curations' in your profile or contact our concierge line for
                            immediate assistance.
                        </div>
                    </details>

                    <details class="contact-faq__item">
                        <summary class="contact-faq__summary">
                            <span class="contact-faq__question">What are the benefits of the Membership program?</span>
                            <span class="material-symbols-outlined contact-faq__icon">expand_more</span>
                        </summary>
                        <div class="contact-faq__answer">
                            Membership offers tiered access to pre-releases, complementary gourmet
                            concessions, and our quarterly 'Director's Choice' private screenings.
                            Points are accumulated with every visit and can be redeemed for private
                            suite upgrades.
                        </div>
                    </details>

                    <details class="contact-faq__item">
                        <summary class="contact-faq__summary">
                            <span class="contact-faq__question">How are private events and screenings handled?</span>
                            <span class="material-symbols-outlined contact-faq__icon">expand_more</span>
                        </summary>
                        <div class="contact-faq__answer">
                            Our dedicated events team handles every detail, from bespoke catering menus
                            by our resident chef to technical support for corporate presentations. Please
                            use the inquiry form above to initiate a consultation.
                        </div>
                    </details>

                </div>
            </div>
        </section>

    </main>
@endsection

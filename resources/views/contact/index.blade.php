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
                            Canales Directos
                        </h2>
                        <div class="contact-channels__list">

                            {{-- Dirección --}}
                            <div class="contact-channel">
                                <div class="contact-channel__icon-box">
                                    <span class="material-symbols-outlined contact-channel__icon">location_on</span>
                                </div>
                                <div>
                                    <p class="contact-channel__label">Oficina Principal</p>
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
                                    <p class="contact-channel__label">Línea de Atención</p>
                                    <p class="contact-channel__value">+34 912 345 678</p>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="contact-channel">
                                <div class="contact-channel__icon-box">
                                    <span class="material-symbols-outlined contact-channel__icon">mail</span>
                                </div>
                                <div>
                                    <p class="contact-channel__label">Consultas Oficiales</p>
                                    <p class="contact-channel__value">contacto@cinevibe.com</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Tarjeta promocional de eventos privados --}}
                    <div class="contact-promo">
                        <div class="contact-promo__flare"></div>
                        <h3 class="contact-promo__title">Proyecciones Privadas</h3>
                        <p class="contact-promo__text">
                            Organiza tu próxima gala o premiere en un ambiente de sofisticación sin igual.
                        </p>
                        <a class="contact-promo__link" href="#">
                            Explorar Eventos
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                </div>

                {{-- Columna derecha: formulario de consulta --}}
                <div class="contact-form-panel">
                    <h2 class="contact-form-panel__title">Envíanos tu Consulta</h2>
                    <form class="contact-form" action="#">

                        {{-- Nombre (label flotante) --}}
                        <div class="contact-field">
                            <input class="contact-field__input" id="name" type="text" placeholder=" ">
                            <label class="contact-field__label" for="name">Nombre Completo</label>
                        </div>

                        {{-- Email (label flotante) --}}
                        <div class="contact-field">
                            <input class="contact-field__input" id="email" type="email" placeholder=" ">
                            <label class="contact-field__label" for="email">Correo Electrónico</label>
                        </div>

                        {{-- Asunto (select) --}}
                        <div class="contact-field">
                            <select class="contact-field__select" id="subject">
                                <option disabled selected value="">Asunto de Interés</option>
                                <option value="booking">Entradas y Reservas</option>
                                <option value="membership">Membresía Cinevibe</option>
                                <option value="events">Eventos Privados</option>
                                <option value="other">Comentarios Generales</option>
                            </select>
                        </div>

                        {{-- Mensaje (textarea con label flotante) --}}
                        <div class="contact-field">
                            <textarea class="contact-field__textarea" id="message" rows="4" placeholder=" "></textarea>
                            <label class="contact-field__label" for="message">Tu Mensaje</label>
                        </div>

                        <button class="contact-form__submit" type="submit">Enviar Consulta</button>
                    </form>
                </div>

            </div>
        </section>

        {{-- ===== FAQ: acordeón nativo con <details> --}}
        <section class="contact-faq">
            <div class="contact-faq__inner">
                <div class="contact-faq__header">
                    <h2 class="contact-faq__title">Preguntas Frecuentes</h2>
                    <p class="contact-faq__subtitle">Respuestas a las dudas más comunes de nuestros espectadores.</p>
                </div>

                <div class="contact-faq__list">

                    <details class="contact-faq__item" open>
                        <summary class="contact-faq__summary">
                            <span class="contact-faq__question">¿Cómo accedo a la sala VIP antes de mi función?</span>
                            <span class="material-symbols-outlined contact-faq__icon">expand_more</span>
                        </summary>
                        <div class="contact-faq__answer">
                            Todos los espectadores con entrada Premier o Palco Privado pueden acceder a la
                            sala VIP 45 minutos antes del horario de su función. Solo presenta tu pase
                            digital de Cinevibe en la entrada del Nivel 2.
                        </div>
                    </details>

                    <details class="contact-faq__item">
                        <summary class="contact-faq__summary">
                            <span class="contact-faq__question">¿Puedo modificar una reserva después de confirmarla?</span>
                            <span class="material-symbols-outlined contact-faq__icon">expand_more</span>
                        </summary>
                        <div class="contact-faq__answer">
                            Podés realizar modificaciones hasta 4 horas antes del horario de la función.
                            Ingresá a "Mis Reservas" en tu perfil o contactá nuestra línea de atención
                            para asistencia inmediata.
                        </div>
                    </details>

                    <details class="contact-faq__item">
                        <summary class="contact-faq__summary">
                            <span class="contact-faq__question">¿Cuáles son los beneficios de la Membresía Cinevibe?</span>
                            <span class="material-symbols-outlined contact-faq__icon">expand_more</span>
                        </summary>
                        <div class="contact-faq__answer">
                            La membresía ofrece acceso escalonado a preventas, consumiciones gourmet
                            gratuitas y proyecciones privadas trimestrales de la "Selección del Director".
                            Acumulás puntos con cada visita y podés canjearlos por upgrades de palco.
                        </div>
                    </details>

                    <details class="contact-faq__item">
                        <summary class="contact-faq__summary">
                            <span class="contact-faq__question">¿Cómo se gestionan los eventos y proyecciones privadas?</span>
                            <span class="material-symbols-outlined contact-faq__icon">expand_more</span>
                        </summary>
                        <div class="contact-faq__answer">
                            Nuestro equipo de eventos se ocupa de cada detalle, desde menús de catering
                            personalizados hasta soporte técnico para presentaciones corporativas. Usá
                            el formulario de consulta de arriba para iniciar una conversación con nosotros.
                        </div>
                    </details>

                </div>
            </div>
        </section>

    </main>
@endsection

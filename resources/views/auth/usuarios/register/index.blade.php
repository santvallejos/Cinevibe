@extends('layouts.sin-navbar.app')

@section('title', 'Register')

@section('content')
    {{-- Main registro: fondo cinematográfico + panel glass centrado --}}
    <main class="register">
        {{-- Fondo decorativo con imagen + overlay degradado --}}
        <div class="register__bg">
            <div class="register__bg-overlay"></div>
            <img alt="Cinematic Background" class="register__bg-img"
                data-alt="dramatic interior of a luxury cinema with red velvet seats and warm ambient lighting from the screen"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCy5hoLtcPjpZY8pyWu23_wqvWpHKRldivPkXbjCA5gp6WXxFK6J9SLciKaZrbyWgUUdzMJOYNvlhoKT5ukJC1qsq3qvf6bYFs_enxujBkraTFV0LHh3cd4TfK1b0wo1dJijcCm4p__fs8wMbfg7ISQRubmDO3ygIi79AIL9gpW9Ho3tuoxTborObBooAMJnEtcOVMiIiV2EBygbsK-hNcTxYC2yk_JRdCchkxSOBrdr9FTJItihcjKCWeR8c23bDSaJ3L95vOcuio" />
        </div>

        {{-- Blurs radiales decorativos de marca --}}
        <div class="register__flare register__flare--top-left"></div>
        <div class="register__flare register__flare--bottom-right"></div>

        {{-- Container principal del formulario --}}
        <section class="register__container">
            {{-- Marca arriba --}}
            <header class="register__brand">
                <h1 class="register__brand-title">CINEVIBE</h1>
                <p class="register__brand-tagline">¡Bienvenido! Creá tu cuenta en segundos</p>
            </header>

            {{-- Panel glass con formulario --}}
            <div class="register__panel">
                <header class="register__header">
                    <h2 class="register__title">Crea tu Cuenta</h2>
                    <p class="register__subtitle">Unite hoy y descubrí las mejores peliculas que tenemos para vos</p>
                </header>

                {{-- Formulario de registro --}}
                {{-- Alerta de errores de validación --}}
                @if ($errors->any())
                    <div class="register__alert register__alert--error">
                        <span class="material-symbols-outlined">error</span>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form class="register__form" method="POST" action="{{ route('register.submit') }}">
                    @csrf
                    {{-- Nombre completo --}}
                    <div class="form-field form-field--icon">
                        <label class="form-field__label" for="fullname">Nombre Completo</label>
                        <div class="form-field__control">
                            <span class="material-symbols-outlined form-field__icon">person</span>
                            <input class="form-field__input {{ $errors->has('name') ? 'form-field__input--error' : '' }}"
                                id="fullname" name="name" type="text"
                                placeholder="Roberto Ojeda"
                                value="{{ old('name') }}" autocomplete="name" />
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="form-field form-field--icon">
                        <label class="form-field__label" for="email">Correo Electrónico</label>
                        <div class="form-field__control">
                            <span class="material-symbols-outlined form-field__icon">mail</span>
                            <input class="form-field__input {{ $errors->has('email') ? 'form-field__input--error' : '' }}"
                                id="email" name="email" type="email"
                                placeholder="RobertoOjeda@cinevibe.com"
                                value="{{ old('email') }}" autocomplete="email" />
                        </div>
                    </div>

                    {{-- Password + confirmación en grid 2-cols --}}
                    <div class="form-grid-2">
                        <div class="form-field form-field--icon">
                            <label class="form-field__label" for="password">Contraseña</label>
                            <div class="form-field__control">
                                <span class="material-symbols-outlined form-field__icon">lock</span>
                                <input class="form-field__input {{ $errors->has('password') ? 'form-field__input--error' : '' }}"
                                    id="password" name="password" type="password"
                                    placeholder="••••••••" autocomplete="new-password" />
                            </div>
                        </div>
                        <div class="form-field form-field--icon">
                            <label class="form-field__label" for="confirm">Confirmar</label>
                            <div class="form-field__control">
                                <span class="material-symbols-outlined form-field__icon">verified_user</span>
                                {{-- CRUCIAL: name="password_confirmation" es el nombre que espera la regla `confirmed` de Laravel --}}
                                <input class="form-field__input {{ $errors->has('password_confirmation') ? 'form-field__input--error' : '' }}"
                                    id="confirm" name="password_confirmation" type="password"
                                    placeholder="••••••••" autocomplete="new-password" />
                            </div>
                        </div>
                    </div>

                    {{-- Acciones del formulario --}}
                    <div class="register__actions">
                        <button class="btn btn--gold btn--block gold-glow" type="submit">
                            Siguiente
                        </button>
                        <div class="register__switch">
                            <span class="register__switch-text">¿YA TIENES UNA CUENTA?</span>
                            <a class="register__switch-link" href="{{ route('login') }}">LOGIN</a>
                        </div>
                    </div>
                </form>

                {{-- Footer legal --}}
                <footer class="register__legal">
                    <p class="register__legal-text">
                        Al unirte, aceptas nuestra
                        <a class="register__legal-link" href="#">Política de Privacidad</a>
                        &amp;
                        <a class="register__legal-link" href="#">Términos de Selección</a>.
                    </p>
                </footer>
            </div>

            {{-- Badges inferiores decorativos (beneficios) --}}
            <div class="register__perks">
                <div class="register__perk">
                    <div class="register__perk-icon">
                        <span class="material-symbols-outlined">confirmation_number</span>
                    </div>
                    <div class="register__perk-label">Acceso Prioritario</div>
                </div>
                <div class="register__perk">
                    <div class="register__perk-icon">
                        <span class="material-symbols-outlined">auto_awesome</span>
                    </div>
                    <div class="register__perk-label">Festivales Curados</div>
                </div>
                <div class="register__perk">
                    <div class="register__perk-icon">
                        <span class="material-symbols-outlined">workspace_premium</span>
                    </div>
                    <div class="register__perk-label">Sin Publicidad. Puro Cine.</div>
                </div>
            </div>
        </section>
    </main>
@endsection

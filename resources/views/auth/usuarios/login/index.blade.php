@extends('layouts.sin-navbar.app')

@section('title', 'Login')

@section('content')
    {{-- Main login: grid editorial izquierda + formulario derecha --}}
    <main class="login">
        <div class="login__card">

            {{-- Columna editorial (oculta en mobile, solo lg+) --}}
            <div class="login__editorial">
                {{-- Cabecera editorial con kicker + headline + lead --}}
                <div>
                    <h1 class="login__kicker">CINEVIBE</h1>
                    <h2 class="login__headline">
                        La Experiencia <br />Cinevibe.
                    </h2>
                    <p class="login__lead">
                        Ingresa a un mundo de excelencia cinematográfica curada. Tu sala de cine privada te espera.
                    </p>
                </div>

                {{-- Social proof: avatares + contador --}}
                <div class="login__social-proof">
                    <div class="login__avatars">
                        <img alt="" class="login__avatar"
                            data-alt="Portrait of a male premium club member"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBI0j9-clde1yIsg2wTCIM6Uu-cedshObIlZcTtbOVR42ZII91yTHcivvspJtDq3lYCJ-r9r2-26ASMQnK6tuKaRxgeo7516sQuJwzbDUZxeZESlQoKHoPyK7yKImeS1EX5SbXXp9o4yRA08S4-SfOGm1LZEccqhl9fi3ZyVX0tSh_-i3X4TNkeo-_eRvVIzq16cemHdUEJbf9DxEnzIhv1TGnV0xzBFXd1QMsQRi3ZMuRkCLJjmgagABz4XF4cac-Um_FjozxUA0Zi" />
                        <img alt="" class="login__avatar"
                            data-alt="Portrait of a female premium club member"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCP5KAqYX3rprKPz_pdiJTPgS_Rs6eWeLfPcQ7bwCMIBQ44tSjwQGMFfLu5iGJhUkNIlpalph-2xxpnIVkFYN70IpS70bjD1yZ791SaXHx_XNoklW0TWGn6BrjJqjGvxHg38RHMLmXes8yeA-vBE68KzV6T16OQsQqHrMh98P9dpE8VvbNWh5p2dUMSB7gRGvARcxzlVXhMcr4ps4TcebkiFneMjeflaZSHpWjXaALScJk2Mi1IgZNt9EmxD-J6KqvYdCWkVAAK-vvg" />
                        <img alt="" class="login__avatar"
                            data-alt="Portrait of a male cinemagoer"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuACRyYsv51_VG-U5_pqReyC_UIQFhzQxqqNq3d0p2A2HNKJb4sySeKP-REhP2pjhcYw7lpDT36blCfwmrQ87QZBxlApNS7x3rtjsrdUWimye7FuStS55XIImqSrb-O3I9BUUgQ_cNqYVKQaytHWtUydTVTFcVz92ctlZYpfbLUnobaTBor_AGPbK3IODDENOG6b3AhOP5EtKsDjV_4h4oeAkeeiRBZvcQRSqCwm4vgnV6mBDRzmIhlQuXygtd-4W7N98RnQzb-UWq11" />
                    </div>
                    <span class="login__proof-label">ÚNETE A MÁS DE 12K CINÉFILOS</span>
                </div>

                {{-- Blur dorado decorativo --}}
                <div class="login__flare"></div>
            </div>

            {{-- Panel del formulario (glass-panel) --}}
            <div class="login__panel">
                {{-- Cabecera del panel --}}
                <div class="login__header">
                    <span class="login__mobile-brand">CINEVIBE</span>
                    <h3 class="login__title">Bienvenido Devuelta</h3>
                    <p class="login__subtitle">Porfavor ingresa tus datos para continuar.</p>
                </div>

                {{-- Formulario de autenticación --}}
                {{-- Alerta global de errores de validación --}}
                @if ($errors->any())
                    <div class="login__alert login__alert--error">
                        <span class="material-symbols-outlined">error</span>
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Alerta de sesión expirada u otros mensajes de estado --}}
                @if (session('status'))
                    <div class="login__alert login__alert--success">
                        <span class="material-symbols-outlined">check_circle</span>
                        {{ session('status') }}
                    </div>
                @endif

                <form class="login__form" method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    {{-- Email --}}
                    <div class="form-field">
                        <label class="form-field__label" for="email">Correo Electrónico</label>
                        <div class="form-field__control">
                            <input class="form-field__input form-field__input--filled {{ $errors->has('email') ? 'form-field__input--error' : '' }}"
                                id="email" name="email" type="email"
                                placeholder="name@luxury.com"
                                value="{{ old('email') }}" autocomplete="email" />
                            <span class="material-symbols-outlined form-field__icon form-field__icon--right">alternate_email</span>
                        </div>
                    </div>

                    {{-- Password + link olvidaste --}}
                    <div class="form-field">
                        <div class="form-field__header">
                            <label class="form-field__label" for="password">Contraseña</label>
                            <a class="form-field__aside" href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="form-field__control">
                            <input class="form-field__input form-field__input--filled"
                                id="password" name="password" type="password"
                                placeholder="••••••••" autocomplete="current-password" />
                            <span class="material-symbols-outlined form-field__icon form-field__icon--right">lock</span>
                        </div>
                    </div>

                    {{-- Botón submit --}}
                    <div>
                        <button class="btn btn--gold btn--block" type="submit">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>

                {{-- Switch a registro --}}
                <div class="login__switch">
                    <p class="login__switch-text">
                        ¿NO TIENES UNA CUENTA?
                        <a class="login__switch-link" href="{{ route('register.index') }}">REGISTRATE</a>
                    </p>
                </div>

                {{-- Accesos sociales (Google / iOS) --}}
                <div class="login__social">
                    <span class="login__social-label">O ingresa con</span>
                    <div class="login__social-icons">
                        <button class="login__social-btn">
                            <span class="material-symbols-outlined">google</span>
                        </button>
                        <button class="login__social-btn">
                            <span class="material-symbols-outlined">ios</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

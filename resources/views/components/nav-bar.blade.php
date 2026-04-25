{{-- ==========================================================
     nav-bar.blade.php — Barra de navegación superior
     Estilos en resources/css/components/nav-bar.css
     ========================================================== --}}
<nav class="nav-bar">
    {{-- Sección izquierda: logo + links principales --}}
    <div class="nav-bar__left">
        <span class="nav-bar__brand">Cinevibe</span>
<a class="nav-bar__link {{ request()->routeIs('index') ? 'nav-bar__link--active' : '' }}" href="{{ route('index') }}">Inicio</a>
<a class="nav-bar__link {{ request()->routeIs('movies.*') ? 'nav-bar__link--active' : '' }}" href="{{ route('movies.index') }}">Peliculas</a>
<a class="nav-bar__link" href="#">Ofertas</a>
<a class="nav-bar__link" href="#">Compra</a>
<a class="nav-bar__link" href="#">Contacto</a>
<a class="nav-bar__link" href="#">¿Quienes Somos?</a>

        </div>
    </div>

    {{-- Sección derecha: iconos + botones de autenticación --}}

        <div class="nav-bar__cta">
            <a class="nav-bar__login" href="{{ route('login.index') }}">Ingresar</a>
            <a class="nav-bar__register" href="{{ route('register.index') }}">Registrarse</a>
        </div>
    </div>
</nav>

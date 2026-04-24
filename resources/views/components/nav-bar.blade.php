{{-- ==========================================================
     nav-bar.blade.php — Barra de navegación superior
     Estilos en resources/css/components/nav-bar.css
     ========================================================== --}}
<nav class="nav-bar">
    {{-- Sección izquierda: logo + links principales --}}
    <div class="nav-bar__left">
        <span class="nav-bar__brand">Cinevibe</span>

        <div class="nav-bar__links">
            <a class="nav-bar__link nav-bar__link--active" href="#">Películas</a>
            <a class="nav-bar__link" href="#">Cines</a>
            <a class="nav-bar__link" href="#">Ofertas</a>
            <a class="nav-bar__link" href="#">Premium</a>
        </div>
    </div>

    {{-- Sección derecha: iconos + botones de autenticación --}}
    <div class="nav-bar__right">
        <div class="nav-bar__icons">
            <button class="material-symbols-outlined nav-bar__icon-btn">location_on</button>
            <button class="material-symbols-outlined nav-bar__icon-btn">search</button>
        </div>

        <div class="nav-bar__cta">
            <a class="nav-bar__login" href="{{ route('login.index') }}">Ingresar</a>
            <a class="nav-bar__register" href="{{ route('register.index') }}">Registrarse</a>
        </div>
    </div>
</nav>

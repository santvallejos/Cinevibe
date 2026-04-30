{{-- ==========================================================
     nav-bar.blade.php — Barra de navegación superior
     Estilos en public/vendor/bootstrap/css/components/nav-bar.css
     ========================================================== --}}
<nav class="nav-bar">

    {{-- Izquierda: logo + links (nav-bar__links se oculta en mobile via CSS) --}}
    <div class="nav-bar__left">
        <span class="nav-bar__brand">Cinevibe</span>

        <div class="nav-bar__links">
            <a class="nav-bar__link {{ request()->routeIs('index') ? 'nav-bar__link--active' : '' }}"
                href="{{ route('index') }}">Inicio</a>
            <a class="nav-bar__link {{ request()->routeIs('movies.*') ? 'nav-bar__link--active' : '' }}"
                href="{{ route('movies.index') }}">Peliculas</a>
            {{-- <a class="nav-bar__link" href="#">Ofertas</a> --}}
            <a class="nav-bar__link {{ request()->routeIs('cart.pay.index') ? 'nav-bar__link--active' : '' }}"
                href="{{ route('pay.index') }}">Compra</a>
            <a class="nav-bar__link {{ request()->routeIs('contact.*') ? 'nav-bar__link--active' : '' }}"
                href="{{ route('contact.index') }}">Contacto</a>
            <a class="nav-bar__link {{ request()->routeIs('about-us.*') ? 'nav-bar__link--active' : '' }}"
                href="{{ route('about-us.index') }}">¿Quiénes Somos?</a>
        </div>
    </div>

    {{-- Derecha: CTA desktop (oculto en mobile) + botón hamburguesa (oculto en desktop) --}}
    <div class="nav-bar__right">
        <div class="nav-bar__cta">
            <a class="nav-bar__login" href="{{ route('login.index') }}">Ingresar</a>
            <a class="nav-bar__register" href="{{ route('register.index') }}">Registrarse</a>
        </div>

        {{-- Botón hamburguesa: solo visible en mobile (<768px) --}}
        <button class="nav-bar__hamburger" id="nav-hamburger" aria-label="Abrir menú" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

{{-- Panel desplegable mobile — se abre/cierra con JS --}}
<div class="nav-bar__mobile" id="nav-mobile" aria-hidden="true">
    <a class="nav-bar__mobile-link {{ request()->routeIs('index') ? 'nav-bar__link--active' : '' }}"
        href="{{ route('index') }}">Inicio</a>
    <a class="nav-bar__mobile-link {{ request()->routeIs('movies.*') ? 'nav-bar__link--active' : '' }}"
        href="{{ route('movies.index') }}">Peliculas</a>
    <a class="nav-bar__mobile-link" href="#">Ofertas</a>
    <a class="nav-bar__mobile-link" href="#">Compra</a>
    <a class="nav-bar__mobile-link" href="#">Contacto</a>
    <a class="nav-bar__mobile-link" href="#">¿Quiénes Somos?</a>

    <div class="nav-bar__mobile-cta">
        <a class="nav-bar__login" href="{{ route('login.index') }}">Ingresar</a>
        <a class="nav-bar__register" href="{{ route('register.index') }}">Registrarse</a>
    </div>
</div>

{{-- Toggle hamburguesa: abre/cierra panel mobile --}}
<script>
    (function() {
        const btn = document.getElementById('nav-hamburger');
        const panel = document.getElementById('nav-mobile');

        btn.addEventListener('click', function() {
            const isOpen = panel.classList.toggle('nav-bar__mobile--open');
            btn.classList.toggle('nav-bar__hamburger--open', isOpen);
            btn.setAttribute('aria-expanded', isOpen);
            panel.setAttribute('aria-hidden', !isOpen);
        });

        // Cierra al hacer click fuera
        document.addEventListener('click', function(e) {
            if (!panel.contains(e.target) && !btn.contains(e.target)) {
                panel.classList.remove('nav-bar__mobile--open');
                btn.classList.remove('nav-bar__hamburger--open');
                btn.setAttribute('aria-expanded', 'false');
                panel.setAttribute('aria-hidden', 'true');
            }
        });
    })();
</script>

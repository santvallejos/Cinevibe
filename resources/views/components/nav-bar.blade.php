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
            {{-- Carrito --}}
    <a class="nav-bar__cart" href="{{ route('cliente.carrito') }}">
    <span class="material-symbols-outlined">
        shopping_cart
    </span>

    <span class="nav-bar__cart-badge">
        {{ count(session('cart', [])) }}
    </span>

</a>
            @auth
                {{-- Usuario autenticado: saludo + botón cerrar sesión --}}
                <a href="{{ route('dashboard') }}" class="nav-bar__user-greeting nav-bar__user-greeting--link">
    Hola, {{ Auth::user()->name }}
</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-bar__logout">
                        Cerrar Sesión
                    </button>
                </form>
            @else
                {{-- Invitado: links de login y registro --}}
                <a class="nav-bar__login" href="{{ route('login') }}">Ingresar</a>
                <a class="nav-bar__register" href="{{ route('register.index') }}">Registrarse</a>
            @endauth
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
   {{-- <a class="nav-bar__mobile-link"href="#">Ofertas</a> --}}
    <a class="nav-bar__mobile-link"
   href="{{ route('pay.index') }}">
   Compra
</a>

<a class="nav-bar__mobile-link"
   href="{{ route('contact.index') }}">
   Contacto
</a>

<a class="nav-bar__mobile-link"
   href="{{ route('about-us.index') }}">
   ¿Quiénes Somos?
</a>
    <div class="nav-bar__mobile-cta">
        @auth
            {{-- Usuario autenticado en mobile --}}
            <span class="nav-bar__user-greeting">Hola, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="nav-bar__logout">Cerrar Sesión</button>
            </form>
        @else
            <a class="nav-bar__login" href="{{ route('login') }}">Ingresar</a>
            <a class="nav-bar__register" href="{{ route('register.index') }}">Registrarse</a>
        @endauth
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

{{-- ==========================================================
     footer.blade.php — Pie de página global
     Estilos en resources/css/components/footer.css
     ========================================================== --}}
<footer class="footer">
    {{-- Grid principal: 4 columnas (brand + 3 grupos de links) --}}
    <div class="footer__grid">
        {{-- Columna 1: marca + descripción + redes sociales --}}
        <div class="footer__col">
            <span class="footer__brand">CINEVIBE</span>
            <p class="footer__desc">
                Elevando la experiencia cinematográfica a través de una selección y comodidad premium.
                Tu destino para la pura magia del cine.
            </p>
            <div class="footer__social">
                <a class="footer__social-btn" href="#">
                    <span class="material-symbols-outlined footer__social-icon">public</span>
                </a>
                <a class="footer__social-btn" href="#">
                    <span class="material-symbols-outlined footer__social-icon">alternate_email</span>
                </a>
            </div>
        </div>

        {{-- Columna 2: géneros --}}
        {{-- <div class="footer__col">
            <h4 class="footer__heading">Géneros</h4>
            <ul class="footer__list">
                <li><a class="footer__link" href="#">Acción</a></li>
                <li><a class="footer__link" href="#">Drama</a></li>
                <li><a class="footer__link" href="#">Ciencia Ficción</a></li>
                <li><a class="footer__link" href="#">Terror</a></li>
            </ul>
        </div> --}}

        {{-- Columna 3: experiencias --}}
        {{-- <div class="footer__col">
            <h4 class="footer__heading">Experiencia</h4>
            <ul class="footer__list">
                <li><a class="footer__link" href="#">Premium IMAX</a></li>
                <li><a class="footer__link" href="#">Sensaciones 4D</a></li>
                <li><a class="footer__link" href="#">El Lounge</a></li>
                <li><a class="footer__link" href="#">Eventos para Miembros</a></li>
            </ul>
        </div> --}}

        {{-- Columna 4: legal --}}
        <div class="footer__col">
            <h4 class="footer__heading">Legal</h4>
            <ul class="footer__list">
                {{-- <li><a class="footer__link" href="#">Politica de Privacidad</a></li> --}}
                <li><a class="footer__link" href="{{ route('terms-and-conditions.index') }}">Terminos y Condiciones</a>
                </li>
                <li><a class="footer__link" href="{{ route('about-us.index') }}">Sobre Nosotros</a></li>
                <li><a class="footer__link" href="{{ route('contact.index') }}">Contactanos Y Preguntas Frecuentes</a>
                </li>
            </ul>
        </div>
    </div>

    {{-- Copyright inferior --}}
    <div class="footer__bottom">
        <p class="footer__copy">&copy; 2024 THE VELVET CURATOR. A PREMIERE EXPERIENCE.</p>
    </div>
</footer>

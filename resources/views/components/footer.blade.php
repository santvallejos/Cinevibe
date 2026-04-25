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
        <div class="footer__col">
            <h4 class="footer__heading">Generos</h4>
            <ul class="footer__list">
                <li><a class="footer__link" href="#">Accion</a></li>
                <li><a class="footer__link" href="#">Drama</a></li>
                <li><a class="footer__link" href="#">Sci-Fi</a></li>
                <li><a class="footer__link" href="#">Horror</a></li>
            </ul>
        </div>

        {{-- Columna 3: experiencias --}}
        <div class="footer__col">
            <h4 class="footer__heading">Beneficios</h4>
            <ul class="footer__list">
                <li><a class="footer__link" href="#">Membresia Cinevibe</a></li>
                <li><a class="footer__link" href="#">Descuentos especiales</a></li>
                <li><a class="footer__link" href="#">Recompensas</a></li>
                <li><a class="footer__link" href="#">Estrenos Anticipados</a></li>
            </ul>
        </div>

        {{-- Columna 4: legal --}}
        <div class="footer__col">
            <h4 class="footer__heading">Legal</h4>
            <ul class="footer__list">
                <li><a class="footer__link" href="#">Politica de Privacidad</a></li>
                <li><a class="footer__link" href="#">Terminos y Condiciones</a></li>
                <li><a class="footer__link" href="#">Preguntas Frecuentes</a></li>
                <li><a class="footer__link" href="#">Contactanos</a></li>
            </ul>
        </div>
    </div>

    {{-- Copyright inferior --}}
    <div class="footer__bottom">
        <p class="footer__copy">&copy; 2026 THE CINEVIBE EXPERIENCE.</p>
    </div>
</footer>

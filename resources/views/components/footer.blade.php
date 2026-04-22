{{-- ==========================================================
     footer.blade.php — Pie de página global
     Estilos en resources/css/components/footer.css
     ========================================================== --}}
<footer class="footer">
    {{-- Grid principal: 4 columnas (brand + 3 grupos de links) --}}
    <div class="footer__grid">
        {{-- Columna 1: marca + descripción + redes sociales --}}
        <div class="footer__col">
            <span class="footer__brand">THE VELVET CURATOR</span>
            <p class="footer__desc">
                Elevating the cinematic experience through curated selection and premium comfort.
                Your destination for pure movie magic.
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
            <h4 class="footer__heading">Genres</h4>
            <ul class="footer__list">
                <li><a class="footer__link" href="#">Action</a></li>
                <li><a class="footer__link" href="#">Drama</a></li>
                <li><a class="footer__link" href="#">Sci-Fi</a></li>
                <li><a class="footer__link" href="#">Horror</a></li>
            </ul>
        </div>

        {{-- Columna 3: experiencias --}}
        <div class="footer__col">
            <h4 class="footer__heading">Experience</h4>
            <ul class="footer__list">
                <li><a class="footer__link" href="#">Premium IMAX</a></li>
                <li><a class="footer__link" href="#">4D Sensations</a></li>
                <li><a class="footer__link" href="#">The Lounge</a></li>
                <li><a class="footer__link" href="#">Member Events</a></li>
            </ul>
        </div>

        {{-- Columna 4: legal --}}
        <div class="footer__col">
            <h4 class="footer__heading">Legal</h4>
            <ul class="footer__list">
                <li><a class="footer__link" href="#">Privacy Policy</a></li>
                <li><a class="footer__link" href="#">Terms of Service</a></li>
                <li><a class="footer__link" href="#">Refund Policy</a></li>
                <li><a class="footer__link" href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>

    {{-- Copyright inferior --}}
    <div class="footer__bottom">
        <p class="footer__copy">&copy; 2024 THE VELVET CURATOR. A PREMIERE EXPERIENCE.</p>
    </div>
</footer>

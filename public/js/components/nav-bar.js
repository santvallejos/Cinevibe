/**
 * nav-bar.js — Control del menú hamburguesa móvil
 */
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('nav-hamburger');
    const panel = document.getElementById('nav-mobile');

    if (btn && panel) {
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
    }
});

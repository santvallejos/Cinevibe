/* Inicializa cada carousel de películas: botones prev/next desplazan
       el track por el ancho de una card + gap */
    document.querySelectorAll('[data-carousel]').forEach(function(carousel) {
        var track = carousel.querySelector('.movie-carousel__track');
        var btnPrev = carousel.querySelector('.movie-carousel__btn--prev');
        var btnNext = carousel.querySelector('.movie-carousel__btn--next');

        /* Desplazamiento = ancho de la primera card + gap del track */
        function getScrollAmount() {
            var card = track.querySelector('.movie-card');
            if (!card) return 300;
            var gap = parseInt(getComputedStyle(track).gap) || 32;
            return card.offsetWidth + gap;
        }

        btnPrev.addEventListener('click', function() {
            track.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
        });

        btnNext.addEventListener('click', function() {
            track.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
        });

        /* Actualiza estado de botones según posición del scroll */
        function updateButtons() {
            btnPrev.disabled = track.scrollLeft <= 0;
            btnNext.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 1;
        }

        track.addEventListener('scroll', updateButtons);
        updateButtons();
    });

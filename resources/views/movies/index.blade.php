@extends('layouts.navbar-y-footer.app')

@section('title', 'Movie')

@section('content')
    <main class="movie-page">

        {{-- Hero: imagen de fondo + gradiente + meta --}}
        <section class="movie-hero">
            {{-- Fondo con imagen inline (URL dinámica) --}}
            <div class="movie-hero__bg"
                data-alt="Cinematic wide shot of a futuristic neon city under heavy rain with dramatic deep red and blue lighting and mist"
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD9jzebMfnzPkQ8S68AErQ20LsyY63MCeO6PBcEHna_5t20gQpkWInTNHmDk_JUHXLtbCwfY7wZV-jt-eKwspEUpp-Le5_yT6jrW6vlrXEwIScGjKMm9wmWPkO7a_iq6nj5VydOGF9_8vZje6x1tVzDRysXmJfAvG599Nc9hHeD1ZmzaWDhy1y2nReAmgWLXXaCsZDMOkfSEyhVKPC-bJ2cgB744ECqahsuyCUegENMasZjU_9jXy6w76F4ciCPZqcTByayYnghf5xF');">
            </div>
            <div class="movie-hero__gradient"></div>

            {{-- Título + meta --}}
            <div class="movie-hero__content">
                <div class="movie-hero__wrap">
                    <div class="movie-hero__kicker">
                        <span class="material-symbols-outlined material-symbols-outlined--fill">star</span>
                        Experiencia Premium
                    </div>
                    <h1 class="movie-hero__title">ECHOS OF NEON</h1>
                    <div class="movie-hero__meta">
                        <span class="movie-hero__imdb">IMDb 8.9</span>
                        <span>Ciencia Ficción / Thriller</span>
                        <span>2h 45m</span>
                        <span>Dir. Elena Varkov</span>
                        <span class="movie-hero__badge">4K • Atmos</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- Contenido principal: grid 8/4 (detalles + booking widget) --}}
        <section class="movie-content">
            <div class="movie-content__grid">

                {{-- Columna principal: sinopsis + trailer + cast --}}
                <div class="movie-content__main">

                    {{-- Sinopsis --}}
                    <div class="movie-block">
                        <h3 class="movie-block__title">La Sinopsis</h3>
                        <p class="movie-block__text">
                            En una metrópolis en decadencia donde los recuerdos se comercian como moneda, un agente de recuperación
                            descubre un flujo de datos fragmentado que sugiere que la cúpula atmosférica de la ciudad no los
                            protege, sino que proyecta una realidad curada. A medida que las líneas entre el pensamiento orgánico y
                            la simulación sintética se difuminan, debe navegar por los corredores de la élite para
                            exponer la mentira arquitectónica definitiva.
                        </p>
                    </div>

                    {{-- Placeholder de trailer --}}
                    <div class="movie-trailer">
                        <div class="movie-trailer__bg"
                            data-alt="Dark dramatic film set with a heavy cinematic camera on tracks and professional lighting rig in silhouette"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAt4oTnEdAywSUg8_-wdDBEj8B4IrdNa5L_yPDDFJ_qBPF3-tz001YdgggHJ-73DjPxZewxW_TFyVt5pJOncpuFEis5cDPFTOE9B5A3c0CQeMp6j9agDPy8-dr1o1zLM4BsO0WJUBZ_Ql9PSh0Dm4a0k1YVExwIGgpGbgMszrVWJPWP4-L2dSRP1LibLlN4aOMHm4FytJJKCcmjqtD6AR2lH0klhBvXV1oUDLm4h_lEOzk6n4x_mfuJUFHBiBtFGhMvgS2K8cOYDrma');">
                        </div>
                        <div class="movie-trailer__play">
                            <div class="movie-trailer__play-btn">
                                <span class="material-symbols-outlined material-symbols-outlined--fill">play_arrow</span>
                            </div>
                        </div>
                        <div class="movie-trailer__label">Tráiler Oficial de Estreno</div>
                    </div>

                    {{-- Cast --}}
                    <div class="movie-block">
                        <header class="cast-header">
                            <h3 class="movie-block__title">Elenco Principal</h3>
                            <button class="cast-header__link">Créditos Completos</button>
                        </header>

                        <div class="cast-grid">
                            {{-- Actor 1 --}}
                            <div class="cast-card">
                                <div class="cast-card__media">
                                    <img alt="Actor Portrait" class="cast-card__img"
                                        data-alt="Professional headshot of a middle-aged actor with intense eyes and subtle salt and pepper beard against a dark grey background"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDvrjKzVT4tff_nopDCcsih50H1aBRBDePUfDexaRGIpOtGSVhDe3phUOSj00g-KKnnE6rfJ5g6MctfSzLbNRXGfzvJrQ6lkscL6-4K9pPxng4BPV3ypdfAFnanzKKWwwvyL7gnJDyeKFdyXD8Sx9zenRaTfvICLFCNUCjl2e_X_F76FpRt168d9uemAsnWxWypcCFWEC9qtBn-KnDnNqJuijnQCGi9Cq1oSeSSnP-b45s7yKy4TRDqduxkngQBJ_mfBiqkmkPaDXcX">
                                </div>
                                <h4 class="cast-card__name">Julian Thorne</h4>
                                <p class="cast-card__role">Agent Kaelen</p>
                            </div>
                            {{-- Actor 2 --}}
                            <div class="cast-card">
                                <div class="cast-card__media">
                                    <img alt="Actor Portrait" class="cast-card__img"
                                        data-alt="Close-up portrait of a young woman with sharp features and dramatic lighting highlighting her profile"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBad0us6h4m2l8BToiJL6kMC0-GoIbLeinF5gFFNSuwR1GC1ApviRhE-oi5o70cc8dbh3oW-3uF0jLAO-1a_yDkSe690eJV83oCs0IC0zMn2pfgzB2tuI_uqWbhWovAGurMnDzDKQDnUrnYfoqi-dMB1Y-kKvYv4aQKUTKO20yh7NSyN24-dbbQkCZ9nAasyjQEJXFwS9GmpWNEMfUNF--Uv4qZFKcoMxzlbKIEWFqOYdk_c8ZkFeSz9CRJ6OYZN-ot7rCKiXRwwr1w">
                                </div>
                                <h4 class="cast-card__name">Sarah Sterling</h4>
                                <p class="cast-card__role">The Architect</p>
                            </div>
                            {{-- Actor 3 --}}
                            <div class="cast-card">
                                <div class="cast-card__media">
                                    <img alt="Actor Portrait" class="cast-card__img"
                                        data-alt="Portrait of a sophisticated man in his 50s wearing a high-end black turtleneck, moody cinematic shadows"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAingFctB6bGcg2KAl3e28NafmtRDO4h8YFe8mZWaqdzSeWJm3k3ODpmEQatYbNslS7zzdtkWPAIDAvG67nXq84MURyW4eptXn02ucAMLXkNPKiUbghJ6hvzAXjTZZGEjf5Ql8Q58x4vF6rDQ8BrcOL0KylVkrdh1f3zgHSEdd6oV9E1zYJlBor3qRMJm2MiKc58h0taUSiQW9zum5f3RGy6jTSf9yK0Ai4v-wZc3a8Yh4RnlILT2-k_wU4J5Yn3WJjRsolj68Hfaa">
                                </div>
                                <h4 class="cast-card__name">Marcus Vane</h4>
                                <p class="cast-card__role">Chancellor Ives</p>
                            </div>
                            {{-- Actor 4 --}}
                            <div class="cast-card">
                                <div class="cast-card__media">
                                    <img alt="Actor Portrait" class="cast-card__img"
                                        data-alt="High-fashion portrait of a young woman with neon rim lighting on her hair, expressive and mysterious gaze"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBzpOExH4BPslg1dVodQV6CyYQP6OEq3vj8TZMcXk_fE-qykrb7mjUkpEnVnbpWge2qnMCkTcP-rEv4z5tcA4CAl_Y2NdahnmfIwsXs9A1RalwIo62rjnndK9KmYN60ptuzZ4UGx62LxGU0nKaFGULHeNseIt4j7VoxBft9sO6KoQ-TTctRQa6fPKS_IORl7o3XhkDqh4_x0QLNZDpQLQQUVqIfwgnartt8Ch-J-U_xdV_9GnDrAiDNbC0NOgbysV3kj18hPh7CS-dj">
                                </div>
                                <h4 class="cast-card__name">Lia Noir</h4>
                                <p class="cast-card__role">Synthetica</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Columna aside: booking widget --}}
                <aside class="movie-content__aside">
                    <div class="booking">
                        <div>
                            <h3 class="booking__title">Seleccionar Experiencia</h3>

                            {{-- Fechas horizontales --}}
                            <div class="booking__section">
                                <label class="booking__label">Seleccionar Fecha</label>
                                <div class="booking__dates hide-scrollbar">
                                    <div class="booking__date booking__date--active">
                                        <span class="booking__date-dow">JUE</span>
                                        <span class="booking__date-num">24</span>
                                    </div>
                                    <div class="booking__date">
                                        <span class="booking__date-dow">VIE</span>
                                        <span class="booking__date-num">25</span>
                                    </div>
                                    <div class="booking__date">
                                        <span class="booking__date-dow">SÁB</span>
                                        <span class="booking__date-num">26</span>
                                    </div>
                                    <div class="booking__date">
                                        <span class="booking__date-dow">DOM</span>
                                        <span class="booking__date-num">27</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Horarios por sala --}}
                            <div class="booking__section">
                                <label class="booking__label">Horarios</label>

                                {{-- Gold Class --}}
                                <div class="booking__times-group">
                                    <div class="booking__times-label booking__times-label--gold">Gold Class • Dolby Cinema</div>
                                    <div class="booking__times">
                                        <span class="booking__time">14:30</span>
                                        <span class="booking__time">17:45</span>
                                        <span class="booking__time booking__time--active">20:15</span>
                                        <span class="booking__time">22:00</span>
                                    </div>
                                </div>

                                {{-- Standard --}}
                                <div class="booking__times-group">
                                    <div class="booking__times-label booking__times-label--muted">Estándar • 4K Laser</div>
                                    <div class="booking__times">
                                        <span class="booking__time">15:00</span>
                                        <span class="booking__time">18:30</span>
                                        <span class="booking__time">21:15</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Footer con precio + CTA --}}
                        <div class="booking__footer">
                            <div class="booking__summary">
                                <div class="booking__summary-label">
                                    Seleccionado: <span class="booking__summary-val">20:15, Sala 4</span>
                                </div>
                                <div class="booking__price">$24.50</div>
                            </div>
                            <button class="btn btn--primary btn--block btn--lg">
                                Reservar Asientos
                            </button>
                            <p class="booking__hint">Lugares Limitados</p>
                        </div>
                    </div>
                </aside>
            </div>
        </section>
    </main>
@endsection

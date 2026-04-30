@extends('layouts.sin-navbar.app')

@section('title', 'Selección de Película — Cinevibe')

@push('styles')
    <link href="{{ asset('vendor/bootstrap/css/pages/cart-select-movie.css') }}" rel="stylesheet">
@endpush

@section('content')
    <main class="select-movie">

        {{-- ===== HEADER + BARRA DE FILTROS ===== --}}
        <div class="select-movie__header">
            <div>
                <h1 class="select-movie__title">Cartelera</h1>
                <p class="select-movie__subtitle">Discover the latest cinematic experiences. Curated selections playing near you.</p>
            </div>

            {{-- Filtros: estado + género + formato --}}
            <div class="select-movie__filters">
                <button class="select-movie__filter-btn">Now Showing</button>
                <button class="select-movie__filter-btn--ghost">Coming Soon</button>
                <div class="select-movie__filter-divider"></div>
                <button class="select-movie__filter-btn--ghost">
                    <span>Genre</span>
                    <span class="material-symbols-outlined" style="font-size: var(--fs-sm)">expand_more</span>
                </button>
                <button class="select-movie__filter-btn--ghost">
                    <span>Format</span>
                    <span class="material-symbols-outlined" style="font-size: var(--fs-sm)">expand_more</span>
                </button>
            </div>
        </div>

        {{-- ===== GRID DE PELÍCULAS ===== --}}
        <div class="select-movie__grid">

            {{-- Tarjeta 1: Dune Part Two (IMAX) --}}
            <div class="movie-card">
                <img
                    class="movie-card__img"
                    alt="Movie Poster"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCwYROzqTTBW-Q_uu3NUb0xWgni7jX-iflwLlW3mIrYCXW6NGjikL8CvBmTJ2c8EMg2seWtxuB5e4djCBjyAkaybGMtnUJ1rDD098mgEdCRDQpYPZHZhLTtHLlztIUUzD6fngCBMiB2jwDn0EAJaV-g5OqGVgP2dXHiqbGmwrsuFxviHmEdAgQIpRqc1n-WX5vI4bUEu7odtFTYn_sd-hAv8zHPHvZT5ChcJCNUUCwoCL6c-P1Be9IosrocMUuscRyewZ9WYlm3gziN"
                >
                <div class="movie-card__overlay"></div>
                <div class="movie-card__body">
                    <div class="movie-card__top">
                        <span class="movie-card__format movie-card__format--highlight">IMAX</span>
                        <div class="movie-card__rating">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1">star</span>
                            <span class="movie-card__rating-num">4.8</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="movie-card__name">Dune: Part Two</h3>
                        <p class="movie-card__meta">Sci-Fi, Adventure • 2h 46m</p>
                    </div>
                    <div class="movie-card__actions">
                        <a href="{{ route('cart.movie.index') }}" class="movie-card__cta">Book Tickets</a>
                        <button class="movie-card__info-btn">
                            <span class="material-symbols-outlined">info</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Tarjeta 2: Neon Genesis (4DX) --}}
            <div class="movie-card">
                <img
                    class="movie-card__img"
                    alt="Movie Poster"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuArrgyRFLumCgZFPIFZI7jbLhXtYCm3ETUku7eEg-BTg-C27pU_yVbW3gluiCNQjIBjEfYr_5Aa_Xh5_LFOt7ttyISXGSmQduxCmf4n_np8l6pDlZjjSh-AEGS9z0g0TpUGwjZJkHqx3MNlmjM_WI72_PHoBI56kN3dbF2Bpk9KHd_jl3roaGkLfZOMpwbdK_4y3Tg9vyow7Nj-2nnjNt2ZuIc7_4BKC2cyf7hlmvD81Po5QLG0EWZK-HcbHkHrhSUCcrNyOvL7AHS6"
                >
                <div class="movie-card__overlay"></div>
                <div class="movie-card__body">
                    <div class="movie-card__top">
                        <span class="movie-card__format movie-card__format--outline">4DX</span>
                        <div class="movie-card__rating">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1">star</span>
                            <span class="movie-card__rating-num">4.5</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="movie-card__name">Neon Genesis</h3>
                        <p class="movie-card__meta">Action, Thriller • 2h 15m</p>
                    </div>
                    <div class="movie-card__actions">
                        <a href="{{ route('cart.movie.index') }}" class="movie-card__cta">Book Tickets</a>
                        <button class="movie-card__info-btn">
                            <span class="material-symbols-outlined">info</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Tarjeta 3: The Director's Cut (Standard) --}}
            <div class="movie-card">
                <img
                    class="movie-card__img"
                    alt="Movie Poster"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCo-ku37Ex6qAH8xfVCLqSfcRxmPNtoXYQlw7FIc-6JsvuERarGPRjdvD1dHq7wubBnZChP77IAjbflKjhF_W6TTcXoBzFSjHSoTV1RLhKMMfrl4fUxi-ZczOYSwAnrmKvmhTbNIt7XWECEQj29206O1N7fnntckUegIyn6q6n-9Rg5kfuQU4KriPlKxMJagXazLhI2xDGf8v-eCIIXbuQDOtST1pQpR8BPUQvGrPxIzFDrq33B__F9bmLsKP4BJ3MAUTqoGnbhr1p5"
                >
                <div class="movie-card__overlay"></div>
                <div class="movie-card__body">
                    <div class="movie-card__top">
                        <span class="movie-card__format movie-card__format--outline">STANDARD</span>
                        <div class="movie-card__rating">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1">star</span>
                            <span class="movie-card__rating-num">4.9</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="movie-card__name">The Director's Cut</h3>
                        <p class="movie-card__meta">Drama, Indie • 1h 58m</p>
                    </div>
                    <div class="movie-card__actions">
                        <a href="{{ route('cart.movie.index') }}" class="movie-card__cta">Book Tickets</a>
                        <button class="movie-card__info-btn">
                            <span class="material-symbols-outlined">info</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Tarjeta 4: Echoes of Void (IMAX 3D) --}}
            <div class="movie-card">
                <img
                    class="movie-card__img"
                    alt="Movie Poster"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhGjOLLASE9v4oH0XPHUQdUqLkqMryz8VRpbS6CmbipNwsSmZNjmpU_f8D2jnX-QeEt_LU-XJUgZ498EkEBFnzkYYsZlW6MxNAD7i0Bd02B7l8j6Bj3BYeF9_W9wp-EvEzIILDZ2BOT4QO6TUF__G3EKu98e_ml4IdHTjRff1XqCR-U6AN5bJO3UAIlraY4zAlf53PQ-YpyPSYePPBHnq45pfOrfXlB85oUZ1o2XodbRja4ygxfbs6aZ8OdW2egoD-OYQ2oQLQ2Ir-"
                >
                <div class="movie-card__overlay"></div>
                <div class="movie-card__body">
                    <div class="movie-card__top">
                        <span class="movie-card__format movie-card__format--highlight">IMAX 3D</span>
                        <div class="movie-card__rating">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1">star</span>
                            <span class="movie-card__rating-num">4.2</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="movie-card__name">Echoes of Void</h3>
                        <p class="movie-card__meta">Fantasy, Mystery • 2h 20m</p>
                    </div>
                    <div class="movie-card__actions">
                        <a href="{{ route('cart.movie.index') }}" class="movie-card__cta">Book Tickets</a>
                        <button class="movie-card__info-btn">
                            <span class="material-symbols-outlined">info</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

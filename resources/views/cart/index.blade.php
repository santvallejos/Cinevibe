@extends('layouts.navbar-y-footer.app')

@section('title', 'Mi Carrito de Compras — Cinevibe')

@section('content')
    <div class="cart-page">
        <div class="cart-page__container">
            <h1 class="cart-page__title">Mi Carrito</h1>

            @if(session('error'))
                <div class="alert alert-danger" style="background: rgba(229, 9, 20, 0.1); border: 1px solid rgba(229, 9, 20, 0.2); color: #ffb4aa; border-radius: var(--radius-xl); padding: var(--sp-4); margin-bottom: var(--sp-6);">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" style="background: rgba(40, 167, 69, 0.1); border: 1px solid rgba(40, 167, 69, 0.2); color: #a3e635; border-radius: var(--radius-xl); padding: var(--sp-4); margin-bottom: var(--sp-6);">
                    {{ session('success') }}
                </div>
            @endif

            @if(count($items) > 0)
                <div class="cart-grid">
                    {{-- Listado de productos --}}
                    <div class="cart-items">
                        @foreach($items as $item)
                            <div class="cart-item">
                                <div class="cart-item__media">
                                    <img alt="{{ $item['showtime']->movie->name }}" class="cart-item__img"
                                         src="{{ $item['showtime']->movie->image_url ? asset($item['showtime']->movie->image_url) : asset('img/peliculas/default.jpg') }}"
                                         onerror="this.onerror=null; this.src='{{ asset('img/peliculas/default.jpg') }}';">
                                </div>
                                <div class="cart-item__content">
                                    <h3 class="cart-item__title">{{ strtoupper($item['showtime']->movie->name) }}</h3>
                                    <p class="cart-item__info">
                                        Sala: {{ $item['showtime']->theater->name }} | 
                                        Fecha: {{ $item['showtime']->datetime->format('d/m/Y') }} a las {{ $item['showtime']->datetime->format('H:i') }}
                                    </p>
                                    <div class="cart-item__seats">
                                        @foreach($item['amchairs'] as $seat)
                                            <span class="cart-item__seat-badge">{{ $seat }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="cart-item__actions">
                                    <span class="cart-item__price">${{ number_format($item['subtotal'], 0, ',', '.') }}</span>
                                    <form action="{{ route('cart.remove', $item['showtime']->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="cart-item__remove-btn">
                                            <span class="material-symbols-outlined">delete</span>
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Resumen de Compra --}}
                    <div class="cart-summary">
                        <div class="cart-summary-card">
                            <h2 class="cart-summary__heading">Resumen de Compra</h2>
                            <div class="cart-summary__row">
                                <span>Subtotal</span>
                                <span>${{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="cart-summary__row">
                                <span>Costo de servicio</span>
                                <span>Gratis</span>
                            </div>
                            <div class="cart-summary__row cart-summary__row--total">
                                <span>Total</span>
                                <span class="cart-summary__total-val">${{ number_format($total, 0, ',', '.') }}</span>
                            </div>

                            <div class="cart-summary__actions">
                                <a href="{{ route('cart.checkout') }}" class="btn btn--primary btn--block btn--lg" style="display: flex; align-items: center; justify-content: center; gap: 8px;">
                                    Proceder al Pago
                                    <span class="material-symbols-outlined">arrow_forward</span>
                                </a>
                                <a href="{{ route('index') }}" class="btn btn--outline btn--block" style="text-align: center; border: 1px solid rgba(255, 255, 255, 0.15); display: block;">
                                    Seguir Comprando
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- Carrito Vacío --}}
                <div class="cart-empty">
                    <span class="material-symbols-outlined cart-empty__icon">shopping_cart</span>
                    <h2 class="cart-empty__title">Tu carrito está vacío</h2>
                    <p class="cart-empty__text">Parece que aún no has seleccionado ninguna película para tu función de cine.</p>
                    <a href="{{ route('index') }}" class="btn btn--primary" style="display: inline-flex; align-items: center; gap: 8px;">
                        Ver Cartelera
                        <span class="material-symbols-outlined">movie</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

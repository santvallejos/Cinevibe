<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'CineVibe') }} — CineVibe</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-[#0a0a0f] text-[#e5e7eb] min-h-screen flex flex-col antialiased">

    {{-- Navbar --}}
    <header class="sticky top-0 z-50 bg-[#0a0a0f]/90 backdrop-blur-md border-b border-[#2a2a3d]">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
                <span class="text-2xl font-bold tracking-tight">
                    <span class="text-[#e63946]">Cine</span><span class="text-white">Vibe</span>
                </span>
            </a>

            {{-- Search --}}
            <form action="{{ route('home') }}" method="GET" class="flex-1 max-w-md hidden sm:block">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#6b7280]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input
                        type="search"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Buscar películas..."
                        class="w-full bg-[#1a1a26] border border-[#2a2a3d] rounded-lg pl-10 pr-4 py-2 text-sm text-[#e5e7eb] placeholder-[#6b7280] focus:outline-none focus:border-[#e63946] transition-colors"
                    >
                </div>
            </form>

            {{-- Nav links + Auth --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="hidden md:block text-sm text-[#6b7280] hover:text-white transition-colors">Cartelera</a>

                @auth
                    {{-- Cart --}}
                    <a href="#" class="relative p-2 text-[#6b7280] hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-9H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </a>

                    {{-- User dropdown --}}
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                        <button @click="open = !open" class="flex items-center gap-2 text-sm text-[#e5e7eb] hover:text-white transition-colors">
                            <div class="w-8 h-8 rounded-full bg-[#e63946] flex items-center justify-center font-semibold text-xs uppercase">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <svg class="w-4 h-4 text-[#6b7280]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="absolute right-0 mt-2 w-44 bg-[#1a1a26] border border-[#2a2a3d] rounded-lg shadow-xl py-1 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-[#e5e7eb] hover:bg-[#2a2a3d] transition-colors">Mi Perfil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-[#e5e7eb] hover:bg-[#2a2a3d] transition-colors">Mis Compras</a>
                            <hr class="border-[#2a2a3d] my-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-[#e63946] hover:bg-[#2a2a3d] transition-colors">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="" class="text-sm text-[#6b7280] hover:text-white transition-colors">Ingresar</a>
                    <a href="" class="text-sm bg-[#e63946] hover:bg-[#c1121f] text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Registrarse
                    </a>
                @endauth
            </div>
        </nav>
    </header>

    {{-- Main --}}
    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="border-t border-[#2a2a3d] bg-[#12121a] mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <span class="text-xl font-bold"><span class="text-[#e63946]">Cine</span><span class="text-white">Vibe</span></span>
                    <p class="mt-2 text-sm text-[#6b7280]">Tu plataforma digital para comprar boletos de cine sin filas.</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-3">Navegación</h4>
                    <ul class="space-y-2 text-sm text-[#6b7280]">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Cartelera</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Próximos Estrenos</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Candy Bar</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-3">Cuenta</h4>
                    <ul class="space-y-2 text-sm text-[#6b7280]">
                        @auth
                            <li><a href="#" class="hover:text-white transition-colors">Mi Perfil</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Mis Compras</a></li>
                        @else
                            <li><a href="" class="hover:text-white transition-colors">Ingresar</a></li>
                            <li><a href="" class="hover:text-white transition-colors">Registrarse</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-[#2a2a3d] text-center text-xs text-[#6b7280]">
                &copy; {{ date('Y') }} CineVibe — Proyecto Académico UNNE · Taller de Programación I
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

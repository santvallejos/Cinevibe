<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Cinevibe')</title>

    {{-- Google Fonts: Manrope (headlines) + Inter (body/labels) --}}
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Inter:wght@300..700&display=swap"
        rel="stylesheet">

    {{-- Material Symbols (iconos) --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    {{-- CSS propio del proyecto (ya incluye Bootstrap + design system) --}}
    <link href="{{ asset('vendor/bootstrap/css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    @stack('styles')
</head>

<body>

    {{-- Barra de navegación simplificada (solo logo para volver al inicio) --}}
    <nav class="nav-bar nav-bar--simple" style="display: flex; align-items: center; padding: 1rem 2rem; border-bottom: 1px solid rgba(255, 255, 255, 0.05); background: rgba(10, 10, 10, 0.8); backdrop-filter: blur(10px); height: 64px; position: sticky; top: 0; z-index: 1000;">
        <a href="{{ route('index') }}" style="text-decoration: none; display: flex; align-items: center;">
            <span class="nav-bar__brand" style="margin: 0;">Cinevibe</span>
        </a>
    </nav>

    {{-- Contenido específico de cada vista (sin nav-bar) --}}
    @yield('content')

    {{-- Pie de página global --}}
    <x-footer />

    {{-- Bootstrap JS bundle local — evita problemas de SRI con CDN --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>

</html>

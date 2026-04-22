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


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>

    {{-- Barra de navegación global --}}
    <x-nav-bar />

    {{-- Contenido específico de cada vista --}}
    @yield('content')

    {{-- Pie de página global --}}
    <x-footer />

    {{-- Bootstrap JS bundle — scripts al final del body para no bloquear render --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    @stack('scripts')
</body>

</html>

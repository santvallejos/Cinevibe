<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Cinevibe')</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Inter:wght@300..700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-primary-fixed": "#410001",
                        "primary-fixed": "#ffdad5",
                        "surface-variant": "#353534",
                        "surface-container-low": "#1c1b1b",
                        "surface-container": "#201f1f",
                        "surface-tint": "#ffb4aa",
                        "primary-container": "#e50914",
                        "on-primary-container": "#fff7f6",
                        "on-primary": "#690003",
                        "on-secondary-fixed-variant": "#5b4300",
                        "on-tertiary-fixed": "#410002",
                        "primary-fixed-dim": "#ffb4aa",
                        "on-error-container": "#ffdad6",
                        "tertiary-container": "#d6342e",
                        "tertiary": "#ffb4ab",
                        "on-tertiary-container": "#fff8f6",
                        "outline-variant": "#5e3f3b",
                        "on-secondary": "#3f2e00",
                        "on-error": "#690005",
                        "on-primary-fixed-variant": "#930007",
                        "surface-container-lowest": "#0e0e0e",
                        "surface-bright": "#393939",
                        "surface": "#131313",
                        "tertiary-fixed-dim": "#ffb4ab",
                        "surface-dim": "#131313",
                        "inverse-surface": "#e5e2e1",
                        "error-container": "#93000a",
                        "tertiary-fixed": "#ffdad6",
                        "outline": "#af8782",
                        "inverse-on-surface": "#313030",
                        "on-surface": "#e5e2e1",
                        "secondary-fixed": "#ffdf9e",
                        "secondary-container": "#fabd00",
                        "inverse-primary": "#c0000c",
                        "secondary-fixed-dim": "#fabd00",
                        "secondary": "#ffdf9e",
                        "surface-container-highest": "#353534",
                        "surface-container-high": "#2a2a2a",
                        "primary": "#ffb4aa",
                        "error": "#ffb4ab",
                        "on-secondary-container": "#6a4e00",
                        "on-surface-variant": "#e9bcb6",
                        "background": "#131313",
                        "on-secondary-fixed": "#261a00",
                        "on-tertiary-fixed-variant": "#93000b",
                        "on-tertiary": "#690005",
                        "on-background": "#e5e2e1"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-background text-on-surface font-body selection:bg-primary-container selection:text-on-primary-container">

    <x-nav-bar />

    @yield('content')

    <x-footer />

    @stack('scripts')
</body>

</html>

<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;family=Inter:wght@300..700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface": "#131313",
                    "on-tertiary-fixed": "#410002",
                    "on-error-container": "#ffdad6",
                    "surface-variant": "#353534",
                    "on-secondary": "#3f2e00",
                    "surface-container": "#201f1f",
                    "inverse-primary": "#c0000c",
                    "background": "#131313",
                    "tertiary-container": "#d6342e",
                    "on-secondary-container": "#6a4e00",
                    "secondary-fixed-dim": "#fabd00",
                    "outline-variant": "#5e3f3b",
                    "on-secondary-fixed": "#261a00",
                    "on-surface": "#e5e2e1",
                    "tertiary": "#ffb4ab",
                    "on-tertiary": "#690005",
                    "on-secondary-fixed-variant": "#5b4300",
                    "surface-tint": "#ffb4aa",
                    "surface-dim": "#131313",
                    "secondary": "#ffdf9e",
                    "on-primary-fixed": "#410001",
                    "on-primary-container": "#fff7f6",
                    "outline": "#af8782",
                    "on-tertiary-container": "#fff8f6",
                    "on-background": "#e5e2e1",
                    "on-primary": "#690003",
                    "inverse-on-surface": "#313030",
                    "surface-container-lowest": "#0e0e0e",
                    "surface-container-high": "#2a2a2a",
                    "primary-container": "#e50914",
                    "inverse-surface": "#e5e2e1",
                    "on-surface-variant": "#e9bcb6",
                    "primary": "#ffb4aa",
                    "error": "#ffb4ab",
                    "secondary-container": "#fabd00",
                    "surface-bright": "#393939",
                    "secondary-fixed": "#ffdf9e",
                    "primary-fixed-dim": "#ffb4aa",
                    "on-error": "#690005",
                    "on-tertiary-fixed-variant": "#93000b",
                    "error-container": "#93000a",
                    "on-primary-fixed-variant": "#930007",
                    "tertiary-fixed-dim": "#ffb4ab",
                    "tertiary-fixed": "#ffdad6",
                    "surface-container-highest": "#353534",
                    "surface-container-low": "#1c1b1b",
                    "primary-fixed": "#ffdad5"
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
        .cinematic-gradient {
            background: linear-gradient(135deg, #131313 0%, #0e0e0e 100%);
        }
        .gold-glow:hover {
            box-shadow: 0 0 25px rgba(250, 189, 0, 0.4);
        }
        .glass-panel {
            background: rgba(32, 31, 31, 0.6);
            backdrop-filter: blur(24px);
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body selection:bg-secondary-fixed-dim/30">
<main class="min-h-screen relative flex items-center justify-center overflow-hidden">
<!-- Background Artistic Element (Bleed Layout) -->
<div class="absolute inset-0 z-0">
<div class="absolute inset-0 bg-gradient-to-r from-surface via-surface/80 to-transparent z-10"></div>
<img alt="Cinematic Background" class="w-full h-full object-cover opacity-30 grayscale" data-alt="dramatic interior of a luxury cinema with red velvet seats and warm ambient lighting from the screen" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCy5hoLtcPjpZY8pyWu23_wqvWpHKRldivPkXbjCA5gp6WXxFK6J9SLciKaZrbyWgUUdzMJOYNvlhoKT5ukJC1qsq3qvf6bYFs_enxujBkraTFV0LHh3cd4TfK1b0wo1dJijcCm4p__fs8wMbfg7ISQRubmDO3ygIi79AIL9gpW9Ho3tuoxTborObBooAMJnEtcOVMiIiV2EBygbsK-hNcTxYC2yk_JRdCchkxSOBrdr9FTJItihcjKCWeR8c23bDSaJ3L95vOcuio"/>
</div>
<!-- Decorative Radial Blur for Brand Warmth -->
<div class="absolute -top-24 -left-24 w-96 h-96 bg-primary-container/10 rounded-full blur-[120px] pointer-events-none"></div>
<div class="absolute -bottom-24 -right-24 w-96 h-96 bg-secondary-fixed-dim/5 rounded-full blur-[120px] pointer-events-none"></div>
<!-- Registration Container -->
<section class="relative z-20 w-full max-w-xl px-6 py-12 md:px-12">
<div class="mb-12 text-center md:text-left">
<!-- Brand Logo (Immutable from JSON logic but placed for context) -->
<h1 class="text-3xl md:text-4xl font-black tracking-[0.2em] text-primary-container mb-2 font-headline">
                    CINEVIBE
                </h1>
<p class="text-on-surface/60 font-body text-sm tracking-[0.1em] uppercase">¡Bienvenido! Creá tu cuenta en segundos</p>
</div>
<div class="glass-panel rounded-xl p-8 md:p-12 shadow-2xl border border-white/5">
<header class="mb-10">
<h2 class="text-3xl font-bold font-headline text-on-surface tracking-tight mb-2">Crea tu Cuenta</h2>
<p class="text-on-surface/50 text-sm">Unite hoy y descubrí las mejores peliculas que tenemos para vos </p>
</header>
<form class="space-y-6">
<!-- Full Name -->
<div class="space-y-1">
<label class="text-[10px] uppercase tracking-[2px] text-secondary-fixed-dim font-bold" for="fullname">Nombre Completo</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-0 text-on-surface/30 text-lg">person</span>
<input class="w-full bg-transparent border-b border-outline-variant/30 py-3 pl-8 text-on-surface placeholder:text-on-surface/20 focus:outline-none focus:border-secondary-fixed-dim transition-colors duration-300" id="fullname" placeholder="Roberto Ojeda" type="text"/>
</div>
</div>
<!-- Email -->
<div class="space-y-1">
<label class="text-[10px] uppercase tracking-[2px] text-secondary-fixed-dim font-bold" for="email">Correo Electrónico</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-0 text-on-surface/30 text-lg">mail</span>
<input class="w-full bg-transparent border-b border-outline-variant/30 py-3 pl-8 text-on-surface placeholder:text-on-surface/20 focus:outline-none focus:border-secondary-fixed-dim transition-colors duration-300" id="email" placeholder="RobertoOjeda@cinevibe.com" type="email"/>
</div>
</div>
<!-- Password Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-1">
<label class="text-[10px] uppercase tracking-[2px] text-secondary-fixed-dim font-bold" for="password">Contraseña</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-0 text-on-surface/30 text-lg">lock</span>
<input class="w-full bg-transparent border-b border-outline-variant/30 py-3 pl-8 text-on-surface placeholder:text-on-surface/20 focus:outline-none focus:border-secondary-fixed-dim transition-colors duration-300" id="password" placeholder="••••••••" type="password"/>
</div>
</div>
<div class="space-y-1">
<label class="text-[10px] uppercase tracking-[2px] text-secondary-fixed-dim font-bold" for="confirm">Confirmar</label>
<div class="relative flex items-center">
<span class="material-symbols-outlined absolute left-0 text-on-surface/30 text-lg">verified_user</span>
<input class="w-full bg-transparent border-b border-outline-variant/30 py-3 pl-8 text-on-surface placeholder:text-on-surface/20 focus:outline-none focus:border-secondary-fixed-dim transition-colors duration-300" id="confirm" placeholder="••••••••" type="password"/>
</div>
</div>
</div>
<!-- Actions -->
<div class="pt-8 space-y-6">
<button class="w-full bg-secondary-fixed-dim text-on-secondary py-4 rounded-full font-headline font-extrabold text-sm uppercase tracking-[3px] gold-glow transition-all duration-300 active:scale-95" type="submit">
                            Siguiente
                        </button>
<div class="flex items-center justify-center space-x-2 text-xs tracking-wide">
<span class="text-on-surface/40">¿YA TIENES UNA CUENTA?</span>
<a class="text-secondary-fixed-dim font-bold hover:text-white transition-colors" <a href="{{ route('login') }}">LOGIN</a>
</div>
</div>
</form>
<!-- T&C -->
<footer class="mt-10 pt-6 border-t border-white/5 text-center">
<p class="text-[10px] text-on-surface/30 leading-relaxed uppercase tracking-wider">
                        Al unirte, aceptas nuestra <a class="underline hover:text-on-surface transition-colors" href="#">Política de Privacidad</a> &amp; <a class="underline hover:text-on-surface transition-colors" href="#">Términos de Selección</a>.
                    </p> Al unirte, aceptas nuestra Política de Privacidad y Términos de Selección.
</footer>
</div>
<!-- Contextual Editorial Element -->
<div class="mt-12 flex flex-col md:flex-row items-center justify-between gap-6 opacity-40 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-700">
<div class="flex items-center space-x-4">
<div class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center">
<span class="material-symbols-outlined text-secondary-fixed-dim">confirmation_number</span>
</div>
<div class="text-[10px] font-bold tracking-widest uppercase">Member First Access</div>
</div>
<div class="flex items-center space-x-4">
<div class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center">
<span class="material-symbols-outlined text-secondary-fixed-dim">auto_awesome</span>
</div>
<div class="text-[10px] font-bold tracking-widest uppercase">Curated Festivals</div>
</div>
<div class="flex items-center space-x-4">
<div class="w-12 h-12 rounded-lg bg-surface-container-high flex items-center justify-center">
<span class="material-symbols-outlined text-secondary-fixed-dim">workspace_premium</span>
</div>
<div class="text-[10px] font-bold tracking-widest uppercase">Zero Ads. Pure Cinema.</div>
</div>
</div>
</section>
</main>
<!--footers-->
<footer class="bg-surface-container-lowest py-8 px-8 border-t border-white/5 mt-auto">
<div class="flex flex-col md:flex-row justify-between items-center max-w-7xl mx-auto gap-4">
<div class="text-[10px] font-bold text-primary-container tracking-[3px]">CINEVIBE PREMIUM CINEMAS</div>
<div class="text-[10px] text-on-surface/30 tracking-widest">© 2026 ALL RIGHTS RESERVED.</div>
<div class="flex space-x-6">
<a class="text-[10px] text-on-surface/40 hover:text-secondary-fixed-dim transition-colors uppercase tracking-[2px]" href="#">Contact</a>
<a class="text-[10px] text-on-surface/40 hover:text-secondary-fixed-dim transition-colors uppercase tracking-[2px]" href="#">Press</a>
</div>
</div>
</footer>
</body></html>
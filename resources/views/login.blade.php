<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;family=Manrope:wght@400;600;700;800&amp;display=swap" rel="stylesheet"/>
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
        .text-shadow-premium {
            text-shadow: 0 4px 12px rgba(0,0,0,0.5);
        }
        .glass-panel {
            background: rgba(28, 27, 27, 0.7);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }
    </style>
</head>
<body class="bg-surface-container-lowest text-on-surface font-body min-h-screen flex flex-col overflow-hidden">
<!-- Hero Background with Bleed Layout -->
<div class="fixed inset-0 z-0">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest via-surface/60 to-transparent z-10"></div>
<img alt="" class="w-full h-full object-cover opacity-40 grayscale-[0.2]" data-alt="Cinematic wide shot of a classic luxury theater interior with red velvet seats and dramatic dim atmospheric lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDPY8vQ_-jC1hCHNR15L2hWxNs7T7xoeYjDASHwc-hgs3GWVdE8l0fjkazOV_FGcqKXTqaazgSXJJIsoLLHLSlSFaoZlcGwEMbCnh_RVlintLYS7PTceQfgk-ca023zatLERWUzfFw9T8X5Wj229s_AcQpIsM7FPSGqnNXcMQDmCElbE82QUahepLzSBBmX-YVWUfeXhomY0nVFIY6QvSJAuugxlRZTgQ111owfwqkHnGApJavYcn_ux8f8KwwNIt6jkl6okOAwk_a8"/>
</div>
<!-- Main Content Canvas -->
<main class="relative z-20 flex-grow flex items-center justify-center px-6 py-12 lg:py-24">
<div class="w-full max-w-5xl grid grid-cols-1 lg:grid-cols-12 gap-0 overflow-hidden rounded-xl shadow-2xl bg-surface-container-low/40">
<!-- Left Editorial Section -->
<div class="hidden lg:flex lg:col-span-7 flex-col justify-between p-12 relative overflow-hidden">
<div class="relative z-10">
<h1 class="text-secondary-fixed-dim font-headline text-lg font-bold tracking-[0.2em] mb-4 uppercase">CINEVIBE</h1>
<h2 class="text-on-surface font-headline text-5xl font-extrabold leading-tight tracking-tight mb-6">
                        The Velvet <br/>Curator Experience.
                    </h2>
<p class="text-on-surface/70 text-lg max-w-md leading-relaxed">
                        Step into a realm of curated cinematic excellence. Your private screening room awaits.
                    </p>
</div>
<div class="relative z-10 flex items-center space-x-6">
<div class="flex -space-x-3">
<img alt="" class="w-10 h-10 rounded-full border-2 border-surface" data-alt="Portrait of a male premium club member" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBI0j9-clde1yIsg2wTCIM6Uu-cedshObIlZcTtbOVR42ZII91yTHcivvspJtDq3lYCJ-r9r2-26ASMQnK6tuKaRxgeo7516sQuJwzbDUZxeZESlQoKHoPyK7yKImeS1EX5SbXXp9o4yRA08S4-SfOGm1LZEccqhl9fi3ZyVX0tSh_-i3X4TNkeo-_eRvVIzq16cemHdUEJbf9DxEnzIhv1TGnV0xzBFXd1QMsQRi3ZMuRkCLJjmgagABz4XF4cac-Um_FjozxUA0Zi"/>
<img alt="" class="w-10 h-10 rounded-full border-2 border-surface" data-alt="Portrait of a female premium club member" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCP5KAqYX3rprKPz_pdiJTPgS_Rs6eWeLfPcQ7bwCMIBQ44tSjwQGMFfLu5iGJhUkNIlpalph-2xxpnIVkFYN70IpS70bjD1yZ791SaXHx_XNoklW0TWGn6BrjJqjGvxHg38RHMLmXes8yeA-vBE68KzV6T16OQsQqHrMh98P9dpE8VvbNWh5p2dUMSB7gRGvARcxzlVXhMcr4ps4TcebkiFneMjeflaZSHpWjXaALScJk2Mi1IgZNt9EmxD-J6KqvYdCWkVAAK-vvg"/>
<img alt="" class="w-10 h-10 rounded-full border-2 border-surface" data-alt="Portrait of a male cinemagoer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuACRyYsv51_VG-U5_pqReyC_UIQFhzQxqqNq3d0p2A2HNKJb4sySeKP-REhP2pjhcYw7lpDT36blCfwmrQ87QZBxlApNS7x3rtjsrdUWimye7FuStS55XIImqSrb-O3I9BUUgQ_cNqYVKQaytHWtUydTVTFcVz92ctlZYpfbLUnobaTBor_AGPbK3IODDENOG6b3AhOP5EtKsDjV_4h4oeAkeeiRBZvcQRSqCwm4vgnV6mBDRzmIhlQuXygtd-4W7N98RnQzb-UWq11"/>
</div>
<span class="text-sm font-medium text-on-surface-variant tracking-wide">JOIN 12K+ CINEPHILES</span>
</div>
<!-- Abstract Gold Light Flare -->
<div class="absolute -top-24 -left-24 w-96 h-96 bg-secondary-fixed-dim/10 blur-[120px] rounded-full"></div>
</div>
<!-- Right Login Form Section -->
<div class="lg:col-span-5 glass-panel p-8 md:p-12 border-l border-white/5">
<div class="mb-10 text-center lg:text-left">
<div class="lg:hidden mb-6">
<span class="text-secondary-fixed-dim font-headline text-2xl font-black tracking-widest">CINEVIBE</span>
</div>
<h3 class="text-on-surface font-headline text-2xl font-bold mb-2">Bienvenido Devuelta</h3>
<p class="text-on-surface/60 text-sm">Porfavor ingresa tus datos para continuar.</p>
</div>
<form class="space-y-8">
<!-- Email Input -->
<div class="group relative">
<label class="block text-xs font-semibold text-secondary-fixed-dim uppercase tracking-widest mb-2 transition-all group-focus-within:text-secondary-fixed-dim/80" for="email">Correo Electrónico</label>
<div class="relative">
<input class="w-full bg-surface-container-lowest/50 border-0 border-b-2 border-outline-variant/30 py-3 px-0 text-on-surface focus:ring-0 focus:border-secondary-fixed-dim transition-all placeholder:text-neutral-600 font-medium" id="email" placeholder="name@luxury.com" type="email"/>
<span class="material-symbols-outlined absolute right-0 top-3 text-neutral-600 text-sm">alternate_email</span>
</div>
</div>
<!-- Password Input -->
<div class="group relative">
<div class="flex justify-between items-end mb-2">
<label class="block text-xs font-semibold text-secondary-fixed-dim uppercase tracking-widest transition-all group-focus-within:text-secondary-fixed-dim/80" for="password">Contraseña</label>
<a class="text-[10px] text-neutral-500 hover:text-on-surface transition-colors uppercase tracking-tighter" href="#">¿Olvidaste tu contraseña?</a>
</div>
<div class="relative">
<input class="w-full bg-surface-container-lowest/50 border-0 border-b-2 border-outline-variant/30 py-3 px-0 text-on-surface focus:ring-0 focus:border-secondary-fixed-dim transition-all placeholder:text-neutral-600 font-medium" id="password" placeholder="••••••••" type="password"/>
<span class="material-symbols-outlined absolute right-0 top-3 text-neutral-600 text-sm">lock</span>
</div>
</div>
<!-- Submit Action -->
<div class="pt-4">
<button class="w-full py-4 bg-gradient-to-br from-secondary-fixed-dim to-[#b89600] text-on-secondary font-headline font-extrabold uppercase tracking-widest rounded-full shadow-lg shadow-secondary-fixed-dim/20 hover:shadow-secondary-fixed-dim/40 transform hover:-translate-y-0.5 transition-all active:scale-[0.98]" type="submit">
                            Iniciar Sesión
                        </button>
</div>
</form>
<!-- Footer Links -->
<div class="mt-12 text-center">
<p class="text-neutral-500 text-sm">
                        ¿NO TIENES UNA CUENTA? 
                        <a class="text-on-surface font-bold ml-1 hover:text-secondary-fixed-dim transition-colors underline underline-offset-4 decoration-secondary-fixed-dim/30" <a href="{{ route('register') }}">REGISTRATE</a>
</p>
</div>
<!-- Social Access -->
<div class="mt-10 pt-10 border-t border-white/5 flex flex-col items-center">
<span class="text-[10px] text-neutral-600 uppercase tracking-[0.2em] mb-6">Or access via</span>
<div class="flex space-x-6">
<button class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-white/5 transition-colors group">
<span class="material-symbols-outlined text-neutral-400 group-hover:text-on-surface">google</span>
</button>
<button class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-white/5 transition-colors group">
<span class="material-symbols-outlined text-neutral-400 group-hover:text-on-surface">ios</span>
</button>
</div>
</div>
</div>
</div>
</main>
<!-- Content-specific Mini-Footer (Suppressed Global Footer as per Shell Rules) -->
<footer class="relative z-20 w-full py-8 px-12 border-t border-white/5">
<div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
<span class="text-[10px] font-medium tracking-[0.2em] text-neutral-600">© 2024 CINEVIBE PREMIUM CINEMAS. ALL RIGHTS RESERVED.</span>
<div class="flex space-x-8">
<a class="text-[10px] font-bold tracking-widest text-neutral-500 hover:text-secondary-fixed-dim uppercase transition-all" href="#">Privacy</a>
<a class="text-[10px] font-bold tracking-widest text-neutral-500 hover:text-secondary-fixed-dim uppercase transition-all" href="#">Terms</a>
<a class="text-[10px] font-bold tracking-widest text-neutral-500 hover:text-secondary-fixed-dim uppercase transition-all" href="#">Support</a>
</div>
</div>
</footer>
</body></html>
<!DOCTYPE html><html class="dark" lang="en"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;family=Inter:wght@300..700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
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
</head>
<body class="bg-background text-on-surface font-body selection:bg-primary-container selection:text-on-primary-container">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-neutral-900/80 backdrop-blur-xl shadow-2xl flex justify-between items-center px-8 py-4 max-w-full mx-auto">
<div class="flex items-center gap-12">
<span class="text-2xl font-black tracking-tighter text-red-600 dark:text-red-500 uppercase font-headline" style="">Cinevibe<br></span>
<div class="hidden md:flex items-center gap-8 font-headline tracking-tight">
<a class="text-red-500 font-bold border-b-2 border-red-600 pb-1" href="#" style="">Movies</a>
<a class="text-neutral-400 hover:text-neutral-100 transition-colors hover:text-red-400 transition-all duration-300" href="#" style="">Cinemas</a>
<a class="text-neutral-400 hover:text-neutral-100 transition-colors hover:text-red-400 transition-all duration-300" href="#" style="">Offers</a>
<a class="text-neutral-400 hover:text-neutral-100 transition-colors hover:text-red-400 transition-all duration-300" href="#" style="">Premium</a>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4 text-on-surface-variant">
<button class="material-symbols-outlined scale-95 active:opacity-80 transition-all" style="">location_on</button>
<button class="material-symbols-outlined scale-95 active:opacity-80 transition-all" style="">search</button>
</div>
<div class="hidden md:flex items-center gap-4">
<button class="text-on-surface font-semibold hover:text-primary transition-colors" style="">Log In</button>
<button class="bg-primary-container text-on-primary-container px-6 py-2 rounded-full font-bold uppercase text-sm tracking-widest hover:shadow-[0_0_20px_rgba(229,9,20,0.4)] transition-all" style="">register</button>
</div>
</div>
</nav>
<main class="pt-0">
<!-- Hero Section -->
<section class="relative h-[972px] w-full flex items-end overflow-hidden">
<div class="absolute inset-0 z-0">
<img class="w-full h-full object-cover object-center" data-alt="Cinematic wide shot of a dark science fiction landscape with dramatic red lighting and floating monolithic structures in a misty atmosphere" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyZbEEPP81WTUokuXxBZBaL7ygSj-YSoCBNNGzrJz8OSgCQ67nk_5NQa0iVb0xx0heUYjjpvU95oSKAtHUTe1GIrjcTHXWT9sXWly4UUVrEE7f-CDSSpC91GIQKdyvTJPV4p6hf-HCCPvu4Y0jM69ebUF1zheFYuw3PURHpNI12Xlx8i6E2w1GwjqfuqkYAH63AvZuXwASgxxEkyiHH-ZnSEr3ySih_XshMg-qjbZeSluiMQqi2jKRFmqem7qf0do_CPSFWYQGirSi" style="">
<div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>
<div class="absolute inset-0 bg-gradient-to-r from-background via-transparent to-transparent"></div>
</div>
<div class="container mx-auto px-8 pb-24 z-10">
<div class="max-w-3xl space-y-6">
<div class="flex items-center gap-3">
<span class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-widest" style="">Premiere</span>
<span class="text-on-surface-variant text-sm font-medium" style="">Science Fiction • 2h 45m</span>
</div>
<h1 class="text-7xl md:text-8xl font-headline font-extrabold tracking-tighter text-on-surface" style="">NEBULA<br>PROTOCOL</h1>
<p class="text-xl text-on-surface-variant max-w-xl leading-relaxed" style="">
                        In a future where stars go silent, one crew must venture into the void to restart the engine of existence. Experience the cinematic event of the decade.
                    </p>
<div class="flex items-center gap-4 pt-4">
<button class="bg-gradient-to-br from-primary to-primary-container text-on-primary-container px-10 py-4 rounded-full font-bold uppercase tracking-widest text-sm flex items-center gap-2 hover:shadow-[0_0_30px_rgba(229,9,20,0.5)] transition-all" style="">
<span class="material-symbols-outlined" style="font-variation-settings: &quot;FILL&quot; 1;">play_arrow</span>
                            Watch Trailer
                        </button>
<button class="bg-surface-container-highest/50 backdrop-blur-md text-on-surface border border-outline-variant/20 px-10 py-4 rounded-full font-bold uppercase tracking-widest text-sm hover:bg-surface-bright transition-all" style="">
                            Book Tickets
                        </button>
</div>
</div>
</div>
</section>
<!-- Now Showing Grid -->
<section class="py-24 bg-surface px-8">
<div class="container mx-auto">
<div class="flex justify-between items-end mb-12">
<div class="space-y-2">
<span class="text-primary font-bold tracking-widest uppercase text-sm" style="">Live Experience</span>
<h2 class="text-4xl font-headline font-bold" style="">Now Showing</h2>
</div>
<div class="flex gap-4">
<button class="p-3 rounded-full border border-outline-variant/20 hover:bg-surface-container-high transition-colors" style="">
<span class="material-symbols-outlined" style="">filter_list</span>
</button>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Movie Card 1 -->
<div class="group relative bg-surface-container rounded-xl overflow-hidden transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl">
<div class="aspect-[2/3] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Modern noir film poster aesthetic showing a detective in a rain-slicked city street at night under neon signs" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoiijhroebv0MaFNfyAi4iqm1v_K28CZ8QeVePKrXtgLDWx2aeUmhfY-15iYqX1pegr8th50c4VnrEQrV2NzWzTfEe7OPmVLpL-oEHzc1nKsX6SIr2s6m-b-RzI2zlI3iOWgSZgpMofYcTmmTS7ODse0LCEOZ_0mPNLhSXpaP9MXiZXO1NLw4BVIWpK6jVkSx4kFJORiszqWjQBbI2OOxAwe1die_-RaqUJwGED6Bn_RDO1Hgpz2AgQQSdGIrnsWjKT-0kt3B9kiRx" style="">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest via-transparent to-transparent opacity-90"></div>
</div>
<div class="absolute top-4 right-4 bg-surface-container-lowest/80 backdrop-blur-md px-3 py-1 rounded-lg">
<span class="text-secondary font-bold text-sm" style="">★ 8.9</span>
</div>
<div class="absolute bottom-0 left-0 right-0 p-6 space-y-4">
<div>
<h3 class="text-xl font-bold font-headline leading-tight" style="">Shadow of the City</h3>
<p class="text-on-surface-variant text-sm" style="">Action, Crime</p>
</div>
<div class="flex justify-between items-center pt-2">
<span class="text-xl font-bold" style="">$14.50</span>
<button class="bg-primary-container text-on-primary-container px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-primary transition-colors" style="">Buy Tickets</button>
</div>
</div>
</div>
<!-- Movie Card 2 -->
<div class="group relative bg-surface-container rounded-xl overflow-hidden transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl">
<div class="aspect-[2/3] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Conceptual film poster of a lone astronaut walking on a white salt flat under an enormous orange sun" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBBLVDA2MCtEU5ft2iXQ4pyJGS0cB0SYUeYUznGChExeORmtNdndHHhqDhTlvjXH1AaG-dN3MWLnPwy66_gnOSm-yeO8zAbV2dGrcAaFesz_o-PAJnN5XWnNrgVm2AeqTLQZHBVwpxEUmr9L-7FRU7VLpkJsnJZoSPaCAU-nHkbl2MPXxxjj4Q6mfl5-Zqm8it9IbCfNZq34_92x7yNSG0ZoKtzOxk5OIKaZZfWxOTPTRPbTHDoGV7_sbPxrQVGz3KeXR9aWkPr9UE" style="">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest via-transparent to-transparent opacity-90"></div>
</div>
<div class="absolute top-4 right-4 bg-surface-container-lowest/80 backdrop-blur-md px-3 py-1 rounded-lg">
<span class="text-secondary font-bold text-sm" style="">★ 9.2</span>
</div>
<div class="absolute bottom-0 left-0 right-0 p-6 space-y-4">
<div>
<h3 class="text-xl font-bold font-headline leading-tight" style="">The Last Horizon</h3>
<p class="text-on-surface-variant text-sm" style="">Sci-Fi, Adventure</p>
</div>
<div class="flex justify-between items-center pt-2">
<span class="text-xl font-bold" style="">$16.00</span>
<button class="bg-primary-container text-on-primary-container px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-primary transition-colors" style="">Buy Tickets</button>
</div>
</div>
</div>
<!-- Movie Card 3 -->
<div class="group relative bg-surface-container rounded-xl overflow-hidden transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl">
<div class="aspect-[2/3] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Cinematic portrait of a regal woman in ornate historical costume with soft candlelight and dark velvet background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAs27qMUsheNFHdVV5j_2tbQW7jgep4NM4_WV0MAzjYRlUfOvDcdmIwV_w8caFAuQ6c5LZ6AhZiBd5L56j5X-GOffd-Vh-GgxlpjH7hC2SoYrI2DZFArEaUddx4hAhJDE2w5Y9-wiAy0MVUZoZDS-MOwT7OyoWRqEZJglhrUjOLj2AN2fk3ABEK0mcUlYxx-58H2MdtnpVKSK8Ix_Ivj0z7-F6btZVsRjAtPk--khqS0oS6rqzPXMZ6CN-elj-HZUVGeXSvrfLRCUo1" style="">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest via-transparent to-transparent opacity-90"></div>
</div>
<div class="absolute top-4 right-4 bg-surface-container-lowest/80 backdrop-blur-md px-3 py-1 rounded-lg">
<span class="text-secondary font-bold text-sm" style="">★ 8.5</span>
</div>
<div class="absolute bottom-0 left-0 right-0 p-6 space-y-4">
<div>
<h3 class="text-xl font-bold font-headline leading-tight" style="">Velvet Dynasty</h3>
<p class="text-on-surface-variant text-sm" style="">Drama, History</p>
</div>
<div class="flex justify-between items-center pt-2">
<span class="text-xl font-bold" style="">$13.00</span>
<button class="bg-primary-container text-on-primary-container px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-primary transition-colors" style="">Buy Tickets</button>
</div>
</div>
</div>
<!-- Movie Card 4 -->
<div class="group relative bg-surface-container rounded-xl overflow-hidden transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl">
<div class="aspect-[2/3] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Abstract horror movie poster with a shadowy figure standing in a dimly lit doorway with red foggy atmosphere" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmaC_RMDeS-ntvPQeZycAzbVsAFwDD1nowI9oYMRW-083LezjlNaA9cCWKDs--Z4WgH5crUkUrEuvAyZ_goJViIGAPoopC6LN7ZS9FQoytjyYa9jzmNlV2Mz9W52iIyg13AMneeLPf5Arnzlu1v6CUhqUm9SSscZeQScfwss8LS5KpohR-8sMe8uw6ZjM4hZE9t1zJRtlX-qX7Ydf2RWeapuoBAFzPcm8QGMK1yNDA98DywoffU_TOh3dpTNMeeZUzbFH2SSuzDqb0" style="">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest via-transparent to-transparent opacity-90"></div>
</div>
<div class="absolute top-4 right-4 bg-surface-container-lowest/80 backdrop-blur-md px-3 py-1 rounded-lg">
<span class="text-secondary font-bold text-sm" style="">★ 7.8</span>
</div>
<div class="absolute bottom-0 left-0 right-0 p-6 space-y-4">
<div>
<h3 class="text-xl font-bold font-headline leading-tight" style="">Silence Speaks</h3>
<p class="text-on-surface-variant text-sm" style="">Horror, Thriller</p>
</div>
<div class="flex justify-between items-center pt-2">
<span class="text-xl font-bold" style="">$14.50</span>
<button class="bg-primary-container text-on-primary-container px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-primary transition-colors" style="">Buy Tickets</button>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Promotion Banner -->
<section class="py-12 px-8">
<div class="container mx-auto">
<div class="relative bg-gradient-to-r from-surface-container-low to-surface-container-high rounded-[2rem] p-12 overflow-hidden flex flex-col md:flex-row items-center gap-12 group">
<div class="absolute top-0 right-0 w-1/3 h-full opacity-10 pointer-events-none group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-[300px] absolute -right-20 -top-20" style="font-variation-settings: &quot;FILL&quot; 1;">confirmation_number</span>
</div>
<div class="relative z-10 space-y-6 flex-1 text-center md:text-left">
<h2 class="text-4xl md:text-5xl font-headline font-black tracking-tight leading-tight" style="">Join THE VELVET CLUB</h2>
<p class="text-on-surface-variant text-lg max-w-lg" style="">Get 20% off all bookings, exclusive premiere invites, and complimentary popcorn on every visit. The ultimate cinematic lifestyle awaits.</p>
<div class="flex flex-wrap justify-center md:justify-start gap-4 pt-4">
<button class="bg-secondary-container text-on-secondary-container px-10 py-4 rounded-full font-bold uppercase tracking-widest text-sm hover:scale-105 active:scale-95 transition-all" style="">Become a Member</button>
<button class="text-on-surface font-bold text-sm uppercase tracking-widest flex items-center gap-2 hover:gap-4 transition-all" style="">
                                Learn More
                                <span class="material-symbols-outlined" style="">arrow_forward</span>
</button>
</div>
</div>
<div class="relative z-10 w-full max-w-sm">
<div class="bg-surface-bright/40 backdrop-blur-xl border border-outline-variant/30 p-8 rounded-3xl shadow-2xl rotate-3 group-hover:rotate-0 transition-transform duration-500">
<div class="flex justify-between items-start mb-12">
<span class="text-primary font-black italic text-xl" style="">V | C</span>
<span class="material-symbols-outlined text-secondary-fixed-dim" style="font-variation-settings: &quot;FILL&quot; 1;">auto_awesome</span>
</div>
<div class="space-y-4">
<div class="h-4 w-3/4 bg-on-surface-variant/20 rounded"></div>
<div class="h-4 w-1/2 bg-on-surface-variant/20 rounded"></div>
<div class="pt-8 flex justify-between items-end">
<span class="font-headline font-bold text-lg tracking-widest" style="">PREMIUM PASS</span>
<div class="text-right">
<div class="text-[10px] uppercase opacity-50" style="">Member Since</div>
<div class="text-xs font-bold" style="">2024</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Coming Soon Horizontal Scroll -->
<section class="py-24 bg-surface-container-lowest px-8">
<div class="container mx-auto">
<div class="flex items-center gap-4 mb-12">
<h2 class="text-3xl font-headline font-bold" style="">Coming Soon</h2>
<div class="h-px flex-1 bg-outline-variant/20"></div>
<button class="flex items-center gap-2 text-on-surface-variant hover:text-on-surface transition-colors" style="">
<span class="text-sm font-bold uppercase tracking-widest" style="">View Calendar</span>
</button>
</div>
<div class="flex gap-8 overflow-x-auto hide-scrollbar pb-8 snap-x">
<!-- Preview 1 -->
<div class="min-w-[400px] snap-start group cursor-pointer">
<div class="relative aspect-video rounded-2xl overflow-hidden mb-6">
<img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Cinematic shot of a high-speed car chase at night with glowing taillights and blurred city lights in the background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDF3ELrrDj95rxc7aD_im6fBQMD_MOlyvn-Q2Mywqg-_xwRs5aMG-1aMdahBrBR9GeWoDUomvSADSBUZpHpVOcigseAgPz6ETZ4oJoaqqCVbSAwjy2sm3WQegqsFJdPil1jel70cX64cyg7Chwx0Dtd0CtXrBk1P6p6XFmKfksgjWG8-mwZJbB6WnESnzR5jscbiAPG3qa12antZuBosT1f5YZnU-TCzRUpF8JyNlTXO_5M_iTjnhPwQyznYWn_JY3xAAF0pGuVHz-P" style="">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest to-transparent opacity-60"></div>
<div class="absolute bottom-4 left-4">
<span class="bg-primary-container/20 backdrop-blur-md text-primary-fixed border border-primary-container/30 px-3 py-1 rounded text-[10px] font-bold uppercase tracking-tighter" style="">Dec 15</span>
</div>
</div>
<h3 class="text-xl font-bold font-headline group-hover:text-primary transition-colors" style="">Velocity: Drift Protocol</h3>
<p class="text-on-surface-variant text-sm mt-1" style="">Directed by Marcus Thorne</p>
</div>
<!-- Preview 2 -->
<div class="min-w-[400px] snap-start group cursor-pointer">
<div class="relative aspect-video rounded-2xl overflow-hidden mb-6">
<img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Dramatic mountain peaks covered in snow under a starry night sky with deep purple and blue cinematic grading" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWwFyh93hqY68qn-pgjxZ1JeAZc8HYmSeGThKG7ZrsPF1Az0BExfnXUbYU_z3xXQ8H2iuArgr4ymg4IDAPKMesf9iPdYphBsIQFcoJMvNU14gGFKxlmARnG6Zgx5q9Nin8DGAYc8ev1CjwEtWvZip_ZNqa-cZu2ZDN2bGXZBbNmM1m1j-tkOCL8lCRPIkpdR8vQCVtIBrygDUywvM9dK4KTfLLxd4xsF9dDJ6wXgwjZ1xz2J9Fe1IM8VQGSwTNLPpgCk92jQeQHlYG" style="">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest to-transparent opacity-60"></div>
<div class="absolute bottom-4 left-4">
<span class="bg-primary-container/20 backdrop-blur-md text-primary-fixed border border-primary-container/30 px-3 py-1 rounded text-[10px] font-bold uppercase tracking-tighter" style="">Jan 02</span>
</div>
</div>
<h3 class="text-xl font-bold font-headline group-hover:text-primary transition-colors" style="">Summit of Silence</h3>
<p class="text-on-surface-variant text-sm mt-1" style="">Documentary Feature</p>
</div>
<!-- Preview 3 -->
<div class="min-w-[400px] snap-start group cursor-pointer">
<div class="relative aspect-video rounded-2xl overflow-hidden mb-6">
<img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Dark fantasy landscape with a gothic castle silhouette against a massive moon and swirling magical particles" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjpVrA7Z10G0bdD9-HNzOY79zUTB9xwmknUkjHdj40xWNiE-OXxPgtIsMCKfCCEVEHLbQsB-xSFJ5sWrPUZVy_z0KpZ0upYUH9jX_daeYTLlTulYogZi7RzkKcgR7A5KfxbOEhFx_I0S5vcL9HPi2BBPDgPB9N9-Hm2mH4pgLl3JmxfsmAJyX6vns63HFRCLEbigFPFzqRZYi-IDd1ZPKoO9xCiRHBAtAWH_KXqYOkmROL5Os2OLFxBFO9yKeJ-J4xPmJPfn0kbVZ-" style="">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest to-transparent opacity-60"></div>
<div class="absolute bottom-4 left-4">
<span class="bg-primary-container/20 backdrop-blur-md text-primary-fixed border border-primary-container/30 px-3 py-1 rounded text-[10px] font-bold uppercase tracking-tighter" style="">Jan 18</span>
</div>
</div>
<h3 class="text-xl font-bold font-headline group-hover:text-primary transition-colors" style="">Eternal Kingdom</h3>
<p class="text-on-surface-variant text-sm mt-1" style="">Epic Fantasy</p>
</div>
<!-- Preview 4 -->
<div class="min-w-[400px] snap-start group cursor-pointer">
<div class="relative aspect-video rounded-2xl overflow-hidden mb-6">
<img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Warm sunlight filtering through trees in an old European courtyard with people having dinner, soft cinematic look" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCs19Cx93fNncswMcvNTFqDMIBiTiOIUoNos0LfhCokMldnB7xFt3rLakcXGe_qCoLitTPBVkJbXuBzCBGhD60f6pQSIXTSM3wGmBUDhijj84fGiuqiMpGD2rehX243iYWmuAA1mNyzLZU109eYB5SBJRd7unQHMmJJuvXeP0_wY8Bq5qJ-L99RoEA_7Ph5qBvyyFY6c-U1UlpLTo9oZtphFBsD7DrTmgnDmkmkUo0ux49DXP90IT377B24XIpGiwHgI4lr3gsVQcC4" style="">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest to-transparent opacity-60"></div>
<div class="absolute bottom-4 left-4">
<span class="bg-primary-container/20 backdrop-blur-md text-primary-fixed border border-primary-container/30 px-3 py-1 rounded text-[10px] font-bold uppercase tracking-tighter" style="">Feb 14</span>
</div>
</div>
<h3 class="text-xl font-bold font-headline group-hover:text-primary transition-colors" style="">Midsummer Echoes</h3>
<p class="text-on-surface-variant text-sm mt-1" style="">Romance, Comedy</p>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="w-full border-t border-neutral-800/30 bg-neutral-950">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-12 py-16 w-full">
<div class="space-y-6">
<span class="text-lg font-bold text-neutral-100 font-headline" style="">THE VELVET CURATOR</span>
<p class="text-neutral-500 font-body text-sm leading-relaxed max-w-xs" style="">Elevating the cinematic experience through curated selection and premium comfort. Your destination for pure movie magic.</p>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center hover:bg-primary-container transition-colors group" href="#" style="">
<span class="material-symbols-outlined text-lg group-hover:text-on-primary-container" style="">public</span>
</a>
<a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center hover:bg-primary-container transition-colors group" href="#" style="">
<span class="material-symbols-outlined text-lg group-hover:text-on-primary-container" style="">alternate_email</span>
</a>
</div>
</div>
<div class="space-y-6">
<h4 class="text-neutral-100 font-bold uppercase tracking-widest text-xs" style="">Genres</h4>
<ul class="space-y-4 text-neutral-500 font-body text-sm">
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Action</a></li>
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Drama</a></li>
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Sci-Fi</a></li>
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Horror</a></li>
</ul>
</div>
<div class="space-y-6">
<h4 class="text-neutral-100 font-bold uppercase tracking-widest text-xs" style="">Experience</h4>
<ul class="space-y-4 text-neutral-500 font-body text-sm">
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Premium IMAX</a></li>
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">4D Sensations</a></li>
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">The Lounge</a></li>
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Member Events</a></li>
</ul>
</div>
<div class="space-y-6">
<h4 class="text-neutral-100 font-bold uppercase tracking-widest text-xs" style="">Legal</h4>
<ul class="space-y-4 text-neutral-500 font-body text-sm">
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Privacy Policy</a></li>
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Terms of Service</a></li>
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Refund Policy</a></li>
<li class="" style=""><a class="hover:text-amber-500 transition-colors" href="#" style="">Contact Us</a></li>
</ul>
</div>
</div>
<div class="px-12 py-8 border-t border-neutral-800/20 text-center md:text-left">
<p class="text-neutral-500 font-body text-sm leading-relaxed" style="">© 2024 THE VELVET CURATOR. A PREMIERE EXPERIENCE.</p>
</div>
</footer>
</body></html>

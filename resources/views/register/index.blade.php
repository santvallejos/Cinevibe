@extends('layouts.sin-navbar')

@section('title', 'Register')

@section('content')
    <main class="min-h-screen relative flex items-center justify-center overflow-hidden">
        <!-- Background Artistic Element (Bleed Layout) -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-r from-surface via-surface/80 to-transparent z-10"></div>
            <img alt="Cinematic Background" class="w-full h-full object-cover opacity-30 grayscale"
                data-alt="dramatic interior of a luxury cinema with red velvet seats and warm ambient lighting from the screen"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCy5hoLtcPjpZY8pyWu23_wqvWpHKRldivPkXbjCA5gp6WXxFK6J9SLciKaZrbyWgUUdzMJOYNvlhoKT5ukJC1qsq3qvf6bYFs_enxujBkraTFV0LHh3cd4TfK1b0wo1dJijcCm4p__fs8wMbfg7ISQRubmDO3ygIi79AIL9gpW9Ho3tuoxTborObBooAMJnEtcOVMiIiV2EBygbsK-hNcTxYC2yk_JRdCchkxSOBrdr9FTJItihcjKCWeR8c23bDSaJ3L95vOcuio" />
        </div>
        <!-- Decorative Radial Blur for Brand Warmth -->
        <div
            class="absolute -top-24 -left-24 w-96 h-96 bg-primary-container/10 rounded-full blur-[120px] pointer-events-none">
        </div>
        <div
            class="absolute -bottom-24 -right-24 w-96 h-96 bg-secondary-fixed-dim/5 rounded-full blur-[120px] pointer-events-none">
        </div>
        <!-- Registration Container -->
        <section class="relative z-20 w-full max-w-xl px-6 py-12 md:px-12">
            <div class="mb-12 text-center md:text-left">
                <!-- Brand Logo (Immutable from JSON logic but placed for context) -->
                <h1 class="text-3xl md:text-4xl font-black tracking-[0.2em] text-primary-container mb-2 font-headline">
                    CINEVIBE
                </h1>
                <p class="text-on-surface/60 font-body text-sm tracking-[0.1em] uppercase">¡Bienvenido! Creá tu cuenta
                    en segundos</p>
            </div>
            <div class="glass-panel rounded-xl p-8 md:p-12 shadow-2xl border border-white/5">
                <header class="mb-10">
                    <h2 class="text-3xl font-bold font-headline text-on-surface tracking-tight mb-2">Crea tu Cuenta</h2>
                    <p class="text-on-surface/50 text-sm">Unite hoy y descubrí las mejores peliculas que tenemos para
                        vos </p>
                </header>
                <form class="space-y-6">
                    <!-- Full Name -->
                    <div class="space-y-1">
                        <label class="text-[10px] uppercase tracking-[2px] text-secondary-fixed-dim font-bold"
                            for="fullname">Nombre Completo</label>
                        <div class="relative flex items-center">
                            <span
                                class="material-symbols-outlined absolute left-0 text-on-surface/30 text-lg">person</span>
                            <input
                                class="w-full bg-transparent border-b border-outline-variant/30 py-3 pl-8 text-on-surface placeholder:text-on-surface/20 focus:outline-none focus:border-secondary-fixed-dim transition-colors duration-300"
                                id="fullname" placeholder="Roberto Ojeda" type="text" />
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="space-y-1">
                        <label class="text-[10px] uppercase tracking-[2px] text-secondary-fixed-dim font-bold"
                            for="email">Correo Electrónico</label>
                        <div class="relative flex items-center">
                            <span
                                class="material-symbols-outlined absolute left-0 text-on-surface/30 text-lg">mail</span>
                            <input
                                class="w-full bg-transparent border-b border-outline-variant/30 py-3 pl-8 text-on-surface placeholder:text-on-surface/20 focus:outline-none focus:border-secondary-fixed-dim transition-colors duration-300"
                                id="email" placeholder="RobertoOjeda@cinevibe.com" type="email" />
                        </div>
                    </div>
                    <!-- Password Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="text-[10px] uppercase tracking-[2px] text-secondary-fixed-dim font-bold"
                                for="password">Contraseña</label>
                            <div class="relative flex items-center">
                                <span
                                    class="material-symbols-outlined absolute left-0 text-on-surface/30 text-lg">lock</span>
                                <input
                                    class="w-full bg-transparent border-b border-outline-variant/30 py-3 pl-8 text-on-surface placeholder:text-on-surface/20 focus:outline-none focus:border-secondary-fixed-dim transition-colors duration-300"
                                    id="password" placeholder="••••••••" type="password" />
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] uppercase tracking-[2px] text-secondary-fixed-dim font-bold"
                                for="confirm">Confirmar</label>
                            <div class="relative flex items-center">
                                <span
                                    class="material-symbols-outlined absolute left-0 text-on-surface/30 text-lg">verified_user</span>
                                <input
                                    class="w-full bg-transparent border-b border-outline-variant/30 py-3 pl-8 text-on-surface placeholder:text-on-surface/20 focus:outline-none focus:border-secondary-fixed-dim transition-colors duration-300"
                                    id="confirm" placeholder="••••••••" type="password" />
                            </div>
                        </div>
                    </div>
                    <!-- Actions -->
                    <div class="pt-8 space-y-6">
                        <button
                            class="w-full bg-secondary-fixed-dim text-on-secondary py-4 rounded-full font-headline font-extrabold text-sm uppercase tracking-[3px] gold-glow transition-all duration-300 active:scale-95"
                            type="submit">
                            Siguiente
                        </button>
                        <div class="flex items-center justify-center space-x-2 text-xs tracking-wide">
                            <span class="text-on-surface/40">¿YA TIENES UNA CUENTA?</span>
                            <a class="text-secondary-fixed-dim font-bold hover:text-white transition-colors" <a
                                href="{{ route('login.index') }}">LOGIN</a>
                        </div>
                    </div>
                </form>
                <!-- T&C -->
                <footer class="mt-10 pt-6 border-t border-white/5 text-center">
                    <p class="text-[10px] text-on-surface/30 leading-relaxed uppercase tracking-wider">
                        Al unirte, aceptas nuestra <a class="underline hover:text-on-surface transition-colors"
                            href="#">Política de Privacidad</a> &amp; <a
                            class="underline hover:text-on-surface transition-colors" href="#">Términos de
                            Selección</a>.
                    </p> Al unirte, aceptas nuestra Política de Privacidad y Términos de Selección.
                </footer>
            </div>
            <!-- Contextual Editorial Element -->
            <div
                class="mt-12 flex flex-col md:flex-row items-center justify-between gap-6 opacity-40 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-700">
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
@endsection

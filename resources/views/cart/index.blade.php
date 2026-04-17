@extends('layouts.sin-navbar')

@section('title', 'Cart')

@section('content')
    <main class="min-h-screen pt-32 pb-40 px-6 max-w-7xl mx-auto flex flex-col lg:flex-row gap-12">
        <!-- Seat Selection Area -->
        <div class="flex-grow flex flex-col items-center">
            <!-- Curved Screen Indicator -->
            <div class="w-full max-w-2xl mb-24 relative">
                <div class="curved-screen h-8 w-full opacity-80"></div>
                <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 text-[10px] tracking-[0.4em] text-neutral-500 font-bold uppercase"
                    style="">Screen This Way</div>
            </div>
            <!-- Seat Grid -->
            <div class="seat-grid w-full space-y-4">
                <!-- Row labels + Grid -->
                <div class="flex flex-col gap-4">
                    <!-- Row A-H Generation -->
                    <div class="flex items-center justify-center gap-3">
                        <span class="w-6 text-[10px] font-bold text-neutral-600" style="">A</span>
                        <div class="flex gap-2">
                            <!-- Available -->
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 hover:border-primary/50 cursor-pointer transition-all">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 hover:border-primary/50 cursor-pointer transition-all">
                            </div>
                            <div class="w-4"></div> <!-- Aisle -->
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 hover:border-primary/50 cursor-pointer transition-all">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-primary-container shadow-[0_0_15px_rgba(229,9,20,0.4)] flex items-center justify-center cursor-pointer">
                                <span class="text-[10px] font-bold text-white" style="">A5</span>
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 hover:border-primary/50 cursor-pointer transition-all">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 hover:border-primary/50 cursor-pointer transition-all">
                            </div>
                            <div class="w-4"></div> <!-- Aisle -->
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 hover:border-primary/50 cursor-pointer transition-all">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 hover:border-primary/50 cursor-pointer transition-all">
                            </div>
                        </div>
                        <span class="w-6 text-[10px] font-bold text-neutral-600" style="">A</span>
                    </div>
                    <!-- Row B-E (Occupied states) -->
                    <div class="flex items-center justify-center gap-3">
                        <span class="w-6 text-[10px] font-bold text-neutral-600" style="">B</span>
                        <div class="flex gap-2">
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-lowest border border-neutral-800/50 flex items-center justify-center opacity-40 cursor-not-allowed">
                                <span class="material-symbols-outlined text-xs" style="">close</span>
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-lowest border border-neutral-800/50 flex items-center justify-center opacity-40 cursor-not-allowed">
                                <span class="material-symbols-outlined text-xs" style="">close</span>
                            </div>
                            <div class="w-4"></div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer transition-all">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer transition-all">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer transition-all">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer transition-all">
                            </div>
                            <div class="w-4"></div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer transition-all">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer transition-all">
                            </div>
                        </div>
                        <span class="w-6 text-[10px] font-bold text-neutral-600" style="">B</span>
                    </div>
                    <!-- Premium Row -->
                    <div class="flex items-center justify-center gap-3">
                        <span class="w-6 text-[10px] font-bold text-secondary-fixed-dim" style="">P</span>
                        <div class="flex gap-2 p-3 bg-secondary-container/5 rounded-2xl ring-1 ring-secondary-fixed-dim/20">
                            <div
                                class="w-8 h-8 rounded-lg bg-secondary-container/20 border border-secondary-fixed-dim/40 flex items-center justify-center cursor-pointer hover:bg-secondary-container transition-all">
                                <span class="material-symbols-outlined text-xs text-secondary-fixed-dim" data-weight="fill"
                                    style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-secondary-container shadow-[0_0_15px_rgba(250,189,0,0.3)] flex items-center justify-center cursor-pointer">
                                <span class="text-[10px] font-bold text-on-secondary-container" style="">P2</span>
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-secondary-container/20 border border-secondary-fixed-dim/40 flex items-center justify-center cursor-pointer hover:bg-secondary-container transition-all">
                                <span class="material-symbols-outlined text-xs text-secondary-fixed-dim" data-weight="fill"
                                    style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-secondary-container/20 border border-secondary-fixed-dim/40 flex items-center justify-center cursor-pointer hover:bg-secondary-container transition-all">
                                <span class="material-symbols-outlined text-xs text-secondary-fixed-dim" data-weight="fill"
                                    style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-secondary-container/20 border border-secondary-fixed-dim/40 flex items-center justify-center cursor-pointer hover:bg-secondary-container transition-all">
                                <span class="material-symbols-outlined text-xs text-secondary-fixed-dim" data-weight="fill"
                                    style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-secondary-container/20 border border-secondary-fixed-dim/40 flex items-center justify-center cursor-pointer hover:bg-secondary-container transition-all">
                                <span class="material-symbols-outlined text-xs text-secondary-fixed-dim" data-weight="fill"
                                    style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
                            </div>
                        </div>
                        <span class="w-6 text-[10px] font-bold text-secondary-fixed-dim" style="">P</span>
                    </div>
                    <!-- Row F -->
                    <div class="flex items-center justify-center gap-3">
                        <span class="w-6 text-[10px] font-bold text-neutral-600" style="">F</span>
                        <div class="flex gap-2">
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer">
                            </div>
                            <div class="w-4"></div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer">
                            </div>
                            <div class="w-4"></div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer">
                            </div>
                            <div
                                class="w-8 h-8 rounded-lg bg-surface-container-high border border-outline-variant/10 cursor-pointer">
                            </div>
                        </div>
                        <span class="w-6 text-[10px] font-bold text-neutral-600" style="">F</span>
                    </div>
                </div>
            </div>
            <!-- Legend -->
            <div class="mt-20 flex gap-8 py-6 px-12 bg-surface-container-low rounded-full ring-1 ring-outline-variant/10">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-surface-container-high border border-outline-variant/10"></div>
                    <span class="text-xs font-medium text-neutral-400" style="">Available</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-primary-container"></div>
                    <span class="text-xs font-medium text-neutral-400" style="">Selected</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-surface-container-lowest flex items-center justify-center">
                        <span class="material-symbols-outlined text-[8px]" style="">close</span>
                    </div>
                    <span class="text-xs font-medium text-neutral-400" style="">Occupied</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-secondary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-[8px] text-on-secondary-container" data-weight="fill"
                            style="font-variation-settings: &quot;FILL&quot; 1;">star</span>
                    </div>
                    <span class="text-xs font-medium text-neutral-400" style="">Premium</span>
                </div>
            </div>
        </div>
        <!-- Sidebar Summary -->
        <aside class="w-full lg:w-96 flex flex-col gap-6">
            <div class="bg-surface-container-low rounded-full p-8 space-y-8 sticky top-32">
                <div>
                    <h3 class="text-xs font-black uppercase tracking-widest text-neutral-500 mb-4" style="">Cinema
                        Location</h3>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-surface-container-highest flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary" style="">location_on</span>
                        </div>
                        <div>
                            <p class="font-bold text-on-surface" style="">The Grand Velvet Theater</p>
                            <p class="text-xs text-neutral-500" style="">Hall 4, 3rd Floor</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <h3 class="text-xs font-black uppercase tracking-widest text-neutral-500" style="">Selected
                        Seats</h3>
                    <div class="flex flex-wrap gap-3">
                        <div
                            class="bg-surface-container-high px-4 py-2 rounded-xl border border-outline-variant/20 flex items-center gap-3">
                            <span class="text-xs font-bold text-primary" style="">A5</span>
                            <span class="text-xs text-neutral-400" style="">$18.50</span>
                            <button class="hover:text-primary transition-colors" style="">
                                <span class="material-symbols-outlined text-sm" style="">close</span>
                            </button>
                        </div>
                        <div
                            class="bg-surface-container-high px-4 py-2 rounded-xl border border-outline-variant/20 flex items-center gap-3">
                            <span class="text-xs font-bold text-secondary-fixed-dim" style="">P2</span>
                            <span class="text-xs text-neutral-400" style="">$32.00</span>
                            <button class="hover:text-primary transition-colors" style="">
                                <span class="material-symbols-outlined text-sm" style="">close</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="pt-8 border-t border-neutral-800/50">
                    <div class="flex justify-between items-end mb-6">
                        <div>
                            <p class="text-xs font-bold text-neutral-500 uppercase tracking-widest" style="">Total
                                Amount</p>
                            <p class="text-3xl font-black text-on-surface font-headline tracking-tighter mt-1"
                                style="">$50.50</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] text-neutral-500 uppercase" style="">Incl. Taxes &amp; Fees</p>
                        </div>
                    </div>
                    <button
                        class="w-full py-5 bg-gradient-to-r from-primary to-primary-container rounded-full text-white font-black uppercase tracking-widest text-sm shadow-[0_8px_20px_rgba(229,9,20,0.3)] hover:shadow-[0_12px_30px_rgba(229,9,20,0.5)] active:scale-[0.98] transition-all flex items-center justify-center gap-3"
                        style="">
                        Proceed to Payment
                        <span class="material-symbols-outlined" style="">arrow_forward</span>
                    </button>
                    <p class="text-center text-[10px] text-neutral-600 mt-6 px-4" style="">
                        Seats will be reserved for 10:00 minutes after clicking proceed.
                    </p>
                </div>
            </div>
            <!-- Ad/Promo Card -->
            <div class="relative overflow-hidden rounded-full p-6 h-32 group cursor-pointer">
                <div class="absolute inset-0 bg-neutral-900 z-0">
                    <img class="w-full h-full object-cover opacity-30 group-hover:scale-110 transition-transform duration-700"
                        data-alt="close-up of golden buttery popcorn in a dark cinematic lighting setting with soft glowing highlights"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdC_z-0iKQypanetGIAhUymo3XVAOWsdQInoOrg87V14VEFTmmsEB_00zCCC282G9py1TcRuoMu-3XrNQ0Y2-n1OlRFSZ2t1wylJcOBem49N6wd7Ojn6duuC03D1nNLXSkFWpatK7YTYKz9Gy-XTJOEtHlgmX2vl_lBwrB5mR-TttUAytsAHYz9BzXw69hgfR1tp2cStHTKA__PafVcNrPgMivPYpuwWUlsrPxm7Dy2inE_KBDeXHa50cuvD4kW_JsoDE-H7BsksFc"
                        style="">
                </div>
                <div class="relative z-10 h-full flex flex-col justify-center">
                    <span class="text-[10px] font-bold text-secondary-fixed-dim uppercase tracking-[0.3em]"
                        style="">Curator Exclusive</span>
                    <h4 class="text-lg font-bold text-white" style="">Join Club for 20% off Snacks</h4>
                </div>
                <div
                    class="absolute top-1/2 -translate-y-1/2 right-6 z-10 w-10 h-10 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center border border-white/20">
                    <span class="material-symbols-outlined text-white" style="">add</span>
                </div>
            </div>
        </aside>
    </main>
@endsection

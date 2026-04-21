@extends('layouts.sin-navbar')

@section('title', 'Confirmación y Pago')

@section('content')
    <main class="min-h-screen pt-24 pb-20 px-6 lg:px-12 max-w-7xl mx-auto">
        <div class="flex flex-col lg:grid lg:grid-cols-12 gap-12">
            <!-- Left Side: Order Summary -->
            <section class="lg:col-span-5 order-2 lg:order-1">
                <div class="sticky top-28">
                    <h2 class="font-headline text-3xl font-extrabold tracking-tight mb-8" style="">Order Summary</h2>
                    <div class="bg-surface-container-low rounded-xl overflow-hidden shadow-xl">
                        <!-- Movie Poster Header -->
                        <div class="relative h-48 w-full">
                            <img alt="Cinematic movie background" class="w-full h-full object-cover opacity-60"
                                data-alt="cinematic widescreen shot of a dramatic movie scene with moody lighting and deep shadows in a modern theater setting"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnRuuKqFeURFE_pIptw0ltCx3eqjD6uW0TKlUgQVKP5LsqUSRy0nF7yueZqrzAzA4KHyjrWiwHjSXsxocAGEicT3eOjdUJwXbhQnIxwkQop2AnTYXI_KvOVGV9DVJXVKKGi6lccAhTqTDZajr_thNhhn7rrI1VPH0rTAYAc93ZcKjrNoDGiu5vmr9xdDiGAE42jP5Tzsh6t8BGl54AJhCpX4Ldg8I0VKljVxzkcsEdrH5fsK-SEYdfZOPWzKuJMA15GH6xH87Jsbp3"
                                style="">
                            <div class="absolute inset-0 bg-gradient-to-t from-surface-container-low to-transparent"></div>
                            <div class="absolute bottom-6 left-6">
                                <span
                                    class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest mb-2 inline-block"
                                    style="">
                                    Premiere Experience
                                </span>
                                <h3 class="font-headline text-2xl font-bold text-on-surface" style="">NOCTURNAL ECHOES
                                </h3>
                            </div>
                        </div>
                        <div class="p-8 space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-neutral-500 text-xs uppercase tracking-widest font-semibold mb-1"
                                        style="">Cinema</p>
                                    <p class="font-medium" style="">The Grand Palladium, Hall 4</p>
                                </div>
                                <div>
                                    <p class="text-neutral-500 text-xs uppercase tracking-widest font-semibold mb-1"
                                        style="">Date &amp; Time</p>
                                    <p class="font-medium" style="">Dec 14, 2024 • 20:45</p>
                                </div>
                                <div>
                                    <p class="text-neutral-500 text-xs uppercase tracking-widest font-semibold mb-1"
                                        style="">Seats</p>
                                    <p class="font-medium" style="">VIP Lounge • J12, J13</p>
                                </div>
                                <div>
                                    <p class="text-neutral-500 text-xs uppercase tracking-widest font-semibold mb-1"
                                        style="">Format</p>
                                    <p class="font-medium" style="">IMAX Laser 4K</p>
                                </div>
                            </div>
                            <div class="pt-6 space-y-3">
                                <div class="flex justify-between items-center text-on-surface-variant">
                                    <span class="body-lg" style="">Ticket Price (2x)</span>
                                    <span class="font-medium" style="">$48.00</span>
                                </div>
                                <div class="flex justify-between items-center text-on-surface-variant">
                                    <span class="body-lg" style="">Booking Fee</span>
                                    <span class="font-medium" style="">$4.50</span>
                                </div>
                                <div class="flex justify-between items-center text-on-surface-variant">
                                    <span class="body-lg" style="">VAT (8%)</span>
                                    <span class="font-medium" style="">$4.20</span>
                                </div>
                                <div class="pt-4 border-t border-neutral-800 flex justify-between items-center">
                                    <span class="font-headline text-xl font-bold" style="">Total Amount</span>
                                    <span class="font-headline text-2xl font-black text-secondary-fixed-dim"
                                        style="">$56.70</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Trust Badges -->
                    <div
                        class="mt-8 flex items-center justify-center gap-6 opacity-40 grayscale hover:grayscale-0 transition-all duration-500">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm" style="">verified_user</span>
                            <span class="text-[10px] uppercase tracking-widest font-bold" style="">SSL Secured</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm" style="">payment_card</span>
                            <span class="text-[10px] uppercase tracking-widest font-bold" style="">PCI
                                Compliant</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm" style="">encrypted</span>
                            <span class="text-[10px] uppercase tracking-widest font-bold" style="">AES-256</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Right Side: Payment Methods -->
            <section class="lg:col-span-7 order-1 lg:order-2">
                <h2 class="font-headline text-3xl font-extrabold tracking-tight mb-8" style="">Payment Details</h2>
                <div class="space-y-8">
                    <!-- Payment Selection -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <label class="relative cursor-pointer group" style="">
                            <input checked="" class="peer sr-only" name="payment" type="radio">
                            <div
                                class="p-6 bg-surface-container-high rounded-xl flex flex-col items-center gap-3 transition-all border border-transparent peer-checked:border-primary-container peer-checked:bg-surface-container-highest">
                                <span
                                    class="material-symbols-outlined text-3xl text-neutral-400 group-hover:text-primary transition-colors"
                                    style="">credit_card</span>
                                <span class="text-sm font-semibold tracking-wide" style="">Credit Card</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer group" style="">
                            <input class="peer sr-only" name="payment" type="radio">
                            <div
                                class="p-6 bg-surface-container-high rounded-xl flex flex-col items-center gap-3 transition-all border border-transparent peer-checked:border-primary-container peer-checked:bg-surface-container-highest">
                                <span
                                    class="material-symbols-outlined text-3xl text-neutral-400 group-hover:text-primary transition-colors"
                                    style="">account_balance_wallet</span>
                                <span class="text-sm font-semibold tracking-wide" style="">Digital Wallet</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer group" style="">
                            <input class="peer sr-only" name="payment" type="radio">
                            <div
                                class="p-6 bg-surface-container-high rounded-xl flex flex-col items-center gap-3 transition-all border border-transparent peer-checked:border-primary-container peer-checked:bg-surface-container-highest">
                                <span
                                    class="material-symbols-outlined text-3xl text-neutral-400 group-hover:text-primary transition-colors"
                                    style="">qr_code_2</span>
                                <span class="text-sm font-semibold tracking-wide" style="">Scan &amp; Pay</span>
                            </div>
                        </label>
                    </div>
                    <!-- Card Form -->
                    <div class="bg-surface-container p-8 lg:p-10 rounded-xl space-y-8">
                        <div class="space-y-6">
                            <div class="relative group">
                                <label class="block text-xs uppercase tracking-[0.2em] font-bold text-neutral-500 mb-2"
                                    style="">Cardholder Name</label>
                                <input
                                    class="w-full bg-transparent border-0 border-b-2 border-neutral-800 py-3 px-0 font-headline text-lg focus:border-outline transition-all placeholder:text-neutral-700 uppercase tracking-widest"
                                    placeholder="ALEXANDER VANE" type="text">
                            </div>
                            <div class="relative group">
                                <label class="block text-xs uppercase tracking-[0.2em] font-bold text-neutral-500 mb-2"
                                    style="">Card Number</label>
                                <div class="relative">
                                    <input
                                        class="w-full bg-transparent border-0 border-b-2 border-neutral-800 py-3 px-0 font-headline text-lg focus:border-outline transition-all placeholder:text-neutral-700 tracking-[0.1em]"
                                        placeholder="0000 0000 0000 0000" type="text">
                                    <div class="absolute right-0 top-1/2 -translate-y-1/2 flex gap-2">
                                        <img alt="Visa logo" class="h-6 w-auto grayscale brightness-150"
                                            data-alt="clean minimalist visa credit card brand logo in white on dark background"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaaoF4usrzxhW0iSqeaoLxBvkFqheLcp0xPMPIFUPmLjdiKY3yKUKzyiLxnUWMgPpLv4TfZSiREkYEmAD7BbXxx77sVz_F8cJhwDJ9_3v4XW5w6JDKjXFMVKNt0USlzQRPpYQKjZzJHUcfM4el1aJU4IzQl-jodTviWCXxpSTgJnHHn1BZCWeF3-TAmbhrMeF21zwUDCABoQYtmdxEbSGXLfe4NOZwF26dJiYQEcExoBIH9MG1bCitgPdrONLwsFLtaXNx0SI3PlTj"
                                            style="">
                                        <img alt="Mastercard logo" class="h-6 w-auto grayscale brightness-150"
                                            data-alt="clean minimalist mastercard credit card brand logo in white on dark background"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD11hAOUmyQJuMZyF5KJJI8dDhnNH5NXxY9FdZtcf7UuJVILt4RIOdRYWnVWPtaPN7leAJcnF3sYJVYrM5GsuclKTe64NdNCAecQzJ8fNWowC8RrIcgR1yUkKUhrOp8x2AONNWhVCJA9NACPhwN1KJ1Gj36C00VUWjTEPglLslS-vReNGm90wX363y2cjOt7TZLpXbQEK68W-6b9Z0vb_H9raGOXC8L54qhf_6xFeiiOD8gN12n-A6z7MRYEc0GRijASzO0GJFz5Z4z"
                                            style="">
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-8">
                                <div class="relative group">
                                    <label class="block text-xs uppercase tracking-[0.2em] font-bold text-neutral-500 mb-2"
                                        style="">Expiry Date</label>
                                    <input
                                        class="w-full bg-transparent border-0 border-b-2 border-neutral-800 py-3 px-0 font-headline text-lg focus:border-outline transition-all placeholder:text-neutral-700"
                                        placeholder="MM / YY" type="text">
                                </div>
                                <div class="relative group">
                                    <label class="block text-xs uppercase tracking-[0.2em] font-bold text-neutral-500 mb-2"
                                        style="">CVV</label>
                                    <div class="relative">
                                        <input
                                            class="w-full bg-transparent border-0 border-b-2 border-neutral-800 py-3 px-0 font-headline text-lg focus:border-outline transition-all placeholder:text-neutral-700"
                                            placeholder="***" type="password">
                                        <span
                                            class="material-symbols-outlined absolute right-0 top-1/2 -translate-y-1/2 text-neutral-500 cursor-help"
                                            title="3-digit security code on back of card" style="">help</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 bg-surface-container-lowest rounded-lg">
                            <input
                                class="mt-1 rounded bg-neutral-800 border-neutral-700 text-primary-container focus:ring-primary-container"
                                id="save_card" type="checkbox">
                            <label class="text-sm text-on-surface-variant leading-relaxed" for="save_card"
                                style="">
                                Save this card for my future premieres. Data is encrypted and managed according to our
                                <a class="text-primary hover:underline transition-all" href="#"
                                    style="">Privacy Policy</a>.
                            </label>
                        </div>
                    </div>
                    <!-- Action Button -->
                    <div class="space-y-4 pt-4">
                        <button
                            class="w-full py-6 rounded-full bg-gradient-primary text-on-primary-container font-headline font-black text-lg uppercase tracking-[0.15em] shadow-[0_10px_40px_rgba(229,9,20,0.3)] hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-3"
                            style="">
                            Confirm Purchase
                            <span class="material-symbols-outlined" style="">chevron_right</span>
                        </button>
                        <p class="text-center text-xs text-neutral-500 font-medium px-8 leading-relaxed" style="">
                            By confirming your purchase, you agree to our Terms of Sale and acknowledge that tickets are
                            non-refundable 2 hours prior to showtime.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

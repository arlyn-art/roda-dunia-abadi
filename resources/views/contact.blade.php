@extends('layouts.app')

@section('content')
    <section class="relative">
        <img src="{{ !empty($heroMedia) ? asset('storage/' . $heroMedia) : asset('img/featured-projects/thumbnail.jpeg') }}" 
            alt="Hero Projects" 
            class="w-full h-[35vh] object-cover object-center">
    </section>
    
    <div 
        x-data="{ 
            shown: false,
            init() {
                const observer = new IntersectionObserver(([entry]) => {
                    this.shown = entry.isIntersecting;
                }, { threshold: 0.1 });

                observer.observe(this.$el);
            }
        }"
        class="md:py-20 py-12 px-6 bg-white transition-all duration-700 ease-out"
        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
    >
        <div class="w-full md:container mx-auto px-6 xl:px-12 2xl:px-0">
            
            <div class="mb-12">
                <x-ui.title tag="h2" lineColor="primary" textColor="text-black" class="font-medium">
                    Contact Us
                </x-ui.title>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-100 border border-green-400 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
                <div class="lg:col-span-5 bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100 flex flex-col">
                    <div class="w-full h-[260px] md:h-[380px] relative">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0945763567493!2d106.7978189!3d-6.1158914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f10bc132b49%3A0x6b198c2534a2e505!2sPT.%20Roda%20Dunia%20Abadi!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full h-full">
                        </iframe>
                    </div>

                    <div class="bg-primary p-8 md:p-10 text-white flex flex-col justify-between">
                        <div>
                            <x-ui.title tag="h3" lineColor="white" textColor="text-white" class="mb-4 font-medium">
                                Head Office
                            </x-ui.title>
                            <p class="text-sm md:text-base leading-relaxed text-white/90">
                                Jl. Muara baru Komplek Pergudangan<br>
                                Blok A9-10 RT. 001 / 017,<br>
                                Kel Penjaringan, Kec Penjaringan<br>
                                Jakarta Utara 14440<br>
                                INDONESIA
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 bg-white p-2 md:p-4">
                    <form 
                        action="{{ route('contact.store') }}" 
                        method="POST" 
                        class="space-y-6"
                        x-data="{ submitting: false }"
                        @submit="submitting = true"
                    >
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-black mb-2">Nama Lengkap</label>
                            <input 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}"
                                required
                                class="w-full rounded-xl border border-gray-300 bg-white py-3.5 px-4 text-black focus:border-primary focus:outline-none transition"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-black mb-2">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                class="w-full rounded-xl border border-gray-300 bg-white py-3.5 px-4 text-black focus:border-primary focus:outline-none transition"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-black mb-2">Nomor Telephone</label>
                            <input 
                                type="text" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                class="w-full rounded-xl border border-gray-300 bg-white py-3.5 px-4 text-black focus:border-primary focus:outline-none transition"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-black mb-2">Perusahaan</label>
                            <input 
                                type="text" 
                                name="company" 
                                value="{{ old('company') }}"
                                class="w-full rounded-xl border border-gray-300 bg-white py-3.5 px-4 text-black focus:border-primary focus:outline-none transition"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-black mb-2">Message</label>
                            <textarea 
                                name="message" 
                                rows="6" 
                                required
                                class="w-full rounded-xl border border-gray-300 bg-white py-3.5 px-4 text-black focus:border-primary focus:outline-none transition resize-none"
                            >{{ old('message') }}</textarea>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-between pt-2 gap-4">
                            <div>
                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                @error('g-recaptcha-response')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <x-ui.button 
                                type="submit" 
                                variant="primary"
                                class="flex items-center justify-center min-w-[110px]"
                                ::disabled="submitting"
                            >
                                <span x-show="!submitting">SUBMIT</span>

                                <span x-show="submitting" x-cloak>
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </x-ui.button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
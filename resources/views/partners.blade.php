@extends('layouts.app')

@section('content')
    <section class="relative">
        <img src="/img/featured-projects/main-image.png" alt="" class="w-full h-[35vh] object-cover object-center">
    </section>

    <div class="md:py-20 py-12 px-6 bg-white">
        <div class="w-full md:container mx-auto">
            
            <div class="mb-12">
                <x-ui.title tag="h1" lineColor="primary" textColor="text-black">
                    Our Partners
                </x-ui.title>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach($partners as $index => $partner)
                    <div 
                        x-data="{
                            shown: false,
                            observer: null,
                            init() {
                                this.observer = new IntersectionObserver(([entry]) => {
                                    // Memicu animasi setiap kali elemen masuk/keluar dari viewport
                                    this.shown = entry.isIntersecting;
                                }, { 
                                    threshold: 0.1,
                                    rootMargin: '0px 0px -50px 0px' // Memicu sedikit lebih awal sebelum elemen benar-benar mentok bawah layar
                                });

                                this.observer.observe(this.$el);
                            }
                        }"
                        style="transition-delay: {{ ($index % 4) * 100 }}ms;"
                        class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transform transition-all duration-700 ease-out border border-gray-100 flex items-center justify-center h-[160px] md:h-[200px]"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    >
                        <img 
                            src="{{ asset($partner['image']) }}" 
                            alt="{{ $partner['name'] }}" 
                            class="max-h-full max-w-full object-contain transition duration-300"
                        >
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <section class="relative">
        <img src="{{ !empty($heroMedia) ? asset('storage/' . $heroMedia) : asset('img/featured-projects/thumbnail.jpeg') }}" 
            alt="Hero Projects" 
            class="w-full h-[35vh] object-cover object-center">
    </section>

    <div class="md:py-20 py-12 bg-white">
        <div class="w-full md:container mx-auto px-6 xl:px-12 2xl:px-0">
            
            <div class="mb-12">
                <x-ui.title tag="h2" lineColor="primary" textColor="text-black" class="font-medium">
                    Our Partners
                </x-ui.title>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-6 md:gap-8">
                @forelse($partners as $index => $partner)
                    <div 
                        x-data="{
                            shown: false,
                            observer: null,
                            init() {
                                this.observer = new IntersectionObserver(([entry]) => {
                                    this.shown = entry.isIntersecting;
                                }, { 
                                    threshold: 0.1,
                                    rootMargin: '0px 0px -50px 0px'
                                });

                                this.observer.observe(this.$el);
                            }
                        }"
                        style="transition-delay: {{ ($index % 4) * 100 }}ms;"
                        class="bg-white rounded-xl p-0 shadow-md hover:shadow-xl transform transition-all duration-700 ease-out border border-gray-100 flex items-center justify-center h-[240px] md:h-[280px] cursor-pointer"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    >
                        @if(!empty($partner->url))
                            <a href="{{ $partner->url }}" target="_blank" rel="noopener noreferrer" class="w-full h-full flex items-center justify-center">
                                <img 
                                    src="{{ Str::startsWith($partner->logo, 'img/') ? asset($partner->logo) : asset('storage/' . $partner->logo) }}" 
                                    alt="{{ $partner->name }}" 
                                    class="max-h-full max-w-full object-contain transition duration-300"
                                >
                            </a>
                        @else
                            <img 
                                src="{{ Str::startsWith($partner->logo, 'img/') ? asset($partner->logo) : asset('storage/' . $partner->logo) }}" 
                                alt="{{ $partner->name }}" 
                                class="max-h-full max-w-full object-contain transition duration-300"
                            >
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        <p>Belum ada data partner yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
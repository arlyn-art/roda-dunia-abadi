<section id="services" class="md:py-20 py-12 px-6 bg-secondary">
    <div class="w-full md:container mx-auto px-6 xl:px-12 2xl:px-0">
        <div x-data="{ shown: false }" 
             x-init="
                const observer = new IntersectionObserver(([entry]) => {
                    shown = entry.isIntersecting;
                }, { threshold: 0.15 });
                observer.observe($el);
             "
             class="transition-all duration-700 ease-out pb-8"
             :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
            <x-ui.title tag="h2" lineColor="primary" textColor="text-white" class="font-medium">
                Company News
            </x-ui.title>
        </div>

        <div
            x-data="{
                shown: false,
                observer: null,
                init() {
                    this.observer = new IntersectionObserver(([entry]) => {
                        this.shown = entry.isIntersecting;
                    }, { threshold: 0.15 });

                    this.observer.observe(this.$el);
                },
                destroy() {
                    this.observer?.disconnect();
                }
            }"
            class="transition-all duration-700 ease-out pb-8 md:bg-white bg-none md:py-12 md:px-14 py-0 px-0 rounded-2xl"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
        >
            <div class="relative">
                <div class="news-swiper swiper overflow-hidden">
                    <div class="swiper-wrapper">
                        @forelse($homeNews as $item)
                            @php 
                                $news = $item->news; 
                            @endphp

                            @if($news)
                                <article class="swiper-slide overflow-hidden md:bg-none bg-white md:rounded-none rounded-xl px-6 md:px-0 md:py-0 py-6 flex flex-col h-auto">
                                    <img src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}" class="mt-4 aspect-[4/3] w-full object-cover">
                                    
                                    <div class="flex flex-col items-start pt-4 flex-grow">
                                        <x-ui.title tag="h4" lineColor="none" textColor="text-black" class="font-bold">
                                            {{ $news->title }}
                                        </x-ui.title>
                                        
                                        <div class="mb-4 mt-1">
                                            <x-ui.paragraf tag="p" textColor="text-black/60" class="font-medium">
                                                posted by {{ $news->user->name ?? 'Admin' }} &nbsp;|&nbsp; {{ \Carbon\Carbon::parse($news->date)->format('M d, Y') }}
                                            </x-ui.paragraf>
                                        </div>


                                        <div class="mb-6 leading-relaxed">
                                            <x-ui.paragraf tag="p" textColor="text-black">
                                                {{ $news->excerpt }}
                                            </x-ui.paragraf>
                                        </div>
                                        
                                        <x-ui.button href="{{ route('articles.show', $news->slug) }}" class="mt-auto">
                                            <x-ui.paragraf tag="p" textColor="text-white">
                                                Baca Detail
                                            </x-ui.paragraf>
                                        </x-ui.button>
                                    </div>
                                </article>
                            @endif
                        @empty
                            <div class="swiper-slide px-6 text-center py-12 text-black md:text-black/70 w-full">
                                <p class="text-lg">Belum ada Company News yang diatur.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <button
                    type="button"
                    class="news-swiper-prev absolute left-[-48px] md:left-[-52px] top-1/2 -translate-y-1/2 z-40 cursor-pointer rounded-full p-3 shadow-md transition hover:bg-primary/90"
                    aria-label="Previous news"
                >
                    <img src="{{ asset('img/prev-red.png') }}" alt="" class="w-6 h-6">
                </button>

                <button
                    type="button"
                    class="news-swiper-next absolute right-[-48px] md:right-[-52px] top-1/2 -translate-y-1/2 z-40 cursor-pointer rounded-full p-3 shadow-md transition hover:bg-primary/90"
                    aria-label="Next news"
                >
                    <img src="{{ asset('img/prev-red.png') }}" alt="" class="w-6 h-6 rotate-180">
                </button>
            </div>
        </div>
    </div>
</section>
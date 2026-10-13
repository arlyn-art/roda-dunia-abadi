<section class="md:py-20 py-12 bg-primary text-white">
    <div class="w-full shadow-xl">
        <div class="md:container w-full mx-auto flex flex-row items-center justify-between gap-6 md:gap-0 pb-8 px-6 xl:px-12 2xl:px-0">
            <div
                x-data="{
                    shown: false,
                    observer: null,
                    init() {
                        this.observer = new IntersectionObserver(([entry]) => {
                            this.shown = entry.isIntersecting;
                        }, { threshold: 0.1 });

                        this.observer.observe(this.$el);
                    },
                    destroy() {
                        this.observer?.disconnect();
                    }
                }"
                class="justify-start transition-all duration-700 ease-out"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            >
                <x-ui.title tag="h1" lineColor="white" textColor="text-white">
                    Our Projects
                </x-ui.title>
            </div>

            <div
                x-data="{
                    shown: false,
                    observer: null,
                    init() {
                        this.observer = new IntersectionObserver(([entry]) => {
                            this.shown = entry.isIntersecting;
                        }, { threshold: 0.1 });

                        this.observer.observe(this.$el);
                    },
                    destroy() {
                        this.observer?.disconnect();
                    }
                }"
                class="justify-end transition-all duration-700 ease-out delay-150"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            >
                <x-ui.button href="/projects" variant="black" class="ml-auto">
                    See All Projects
                </x-ui.button>
            </div>
        </div>
    </div>

    <div class="md:container w-full mx-auto md:gap-0 px-12 xl:px-12 2xl:px-0 pt-12">
        <div
            x-data="{
                shown: false,
                observer: null,
                init() {
                    this.observer = new IntersectionObserver(([entry]) => {
                        this.shown = entry.isIntersecting;
                    }, { threshold: 0.1 });

                    this.observer.observe(this.$el);
                },
                destroy() {
                    this.observer?.disconnect();
                }
            }"
            class="relative transition-all duration-700 ease-out delay-200"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
        >
            <div class="swiper project-swiper">
                <div class="swiper-wrapper">
                    @forelse($homeProjects as $item)
                        @if($item->project)
                            <div class="swiper-slide">
                                <a href="{{ route('projects.show', $item->project->slug) }}" class="group relative block overflow-hidden rounded-xl">
                                    <img src="{{ $item->project->getFirstMediaUrl('thumbnail') ?: asset('img/featured-projects/main-image.png') }}" 
                                        alt="{{ $item->project->title }}" 
                                        class="w-full h-72 md:h-64 object-cover">
                                        <span class="absolute inset-0 flex items-center justify-center bg-black/80 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100 font-bold">
                                        {{ $item->project->title }}
                                    </span>
                                </a>
                            </div>
                        @endif
                    @empty
                        <div class="swiper-slide w-full text-center py-12 text-white/70">
                            <p class="text-lg">Belum ada proyek yang ditampilkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="project-swiper-prev absolute left-[-40px] xl:left-[-8px] 2xl:left-[-4rem] top-[50%] -translate-y-1/2 z-20 cursor-pointer hover:bg-primary/20 p-3 rounded-full transition">
                <img src="/img/prev-white.png" alt="Prev" class="w-6 h-6">
            </div>

            <div class="project-swiper-next absolute right-[-40px] xl:right-[-8px] 2xl:right-[-4rem] top-[50%] -translate-y-1/2 z-20 cursor-pointer hover:bg-primary/20 p-3 rounded-full transition">
                <img src="/img/prev-white.png" alt="Next" class="w-6 h-6 rotate-180">
            </div>
        </div>
    </div>
</section>
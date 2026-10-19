<section class="md:py-20 py-12 bg-white text-black">
    <div class="w-full">
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
                <x-ui.title tag="h2" lineColor="primary" textColor="text-black" class="font-medium">
                    Trusted By
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
                <x-ui.button href="/partners" variant="primary" class="ml-auto">
                    
                    <x-ui.paragraf tag="p" textColor="text-white">
                            See All Partners
                        </x-ui.paragraf>
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
            <div class="swiper trusted-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide flex items-center justify-center p-8">
                        <img src="/img/trusted/trusted-1.png" alt="Trusted Partner 1 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center p-8">
                        <img src="/img/trusted/trusted-2.png" alt="Trusted Partner 2 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center p-8">
                        <img src="/img/trusted/trusted-3.png" alt="Trusted Partner 3 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center p-8">
                        <img src="/img/trusted/trusted-4.png" alt="Trusted Partner 4 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center p-8">
                        <img src="/img/trusted/trusted-5.png" alt="Trusted Partner 5 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center p-8">
                        <img src="/img/trusted/trusted-1.png" alt="Trusted Partner 1 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>
                </div>
            </div>

            <div class="trusted-swiper-prev absolute left-[-40px] xl:left-[-32px] 2xl:left-[-4rem] top-[50%] -translate-y-1/2 z-20 cursor-pointer hover:bg-primary/20 p-3 rounded-full transition">
                <img src="/img/prev-red.png" alt="Prev" class="w-6 h-6">
            </div>

            <div class="trusted-swiper-next absolute right-[-40px] xl:right-[-32px] 2xl:right-[-4rem] top-[50%] -translate-y-1/2 z-20 cursor-pointer hover:bg-primary/20 p-3 rounded-full transition">
                <img src="/img/prev-red.png" alt="Next" class="w-6 h-6 rotate-180">
            </div>
        </div>
    </div>
</section>
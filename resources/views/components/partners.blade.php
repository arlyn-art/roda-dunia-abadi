<section class="md:py-20 py-12 bg-background text-black">
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
                <x-ui.title tag="h1" lineColor="primary" textColor="text-white">
                    Our Partners
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
            <div class="swiper partners-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide flex items-center justify-center">
                        <img src="/img/clients/clients-1.png" alt="partners Partner 1 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center">
                        <img src="/img/clients/clients-2.png" alt="partners Partner 2 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center">
                        <img src="/img/clients/clients-3.png" alt="partners Partner 3 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center">
                        <img src="/img/clients/clients-1.png" alt="partners Partner 4 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center">
                        <img src="/img/clients/clients-2.png" alt="partners Partner 5 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>

                    <div class="swiper-slide flex items-center justify-center">
                        <img src="/img/clients/clients-3.png" alt="partners Partner 1 Logo" class="pointer-events-none select-none w-full h-20 md:h-24 object-contain" draggable="false">
                    </div>
                </div>
            </div>

            <div class="partners-swiper-prev absolute left-[-40px] xl:left-[-8px] 2xl:left-[-4rem] top-[50%] -translate-y-1/2 z-20 cursor-pointer hover:bg-primary/20 p-3 rounded-full transition">
                <img src="/img/prev-white.png" alt="Prev" class="w-6 h-6">
            </div>

            <div class="partners-swiper-next absolute right-[-40px] xl:right-[-8px] 2xl:right-[-4rem] top-[50%] -translate-y-1/2 z-20 cursor-pointer hover:bg-primary/20 p-3 rounded-full transition">
                <img src="/img/prev-white.png" alt="Next" class="w-6 h-6 rotate-180">
            </div>
        </div>
    </div>
</section>
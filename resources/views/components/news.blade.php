<section id="services" class="md:py-20 py-12 px-6 bg-secondary">
    <div class="w-full md:container mx-auto px-6 xl:px-12 2xl:px-0">
        <div x-data="{ shown: false }" 
             x-init="
                const observer = new IntersectionObserver(([entry]) => {
                    if (entry.isIntersecting) {
                        shown = true;
                    } else {
                        shown = false;
                    }
                }, { threshold: 0.15 });
                observer.observe($el);
             "
             class="transition-all duration-700 ease-out pb-8"
             :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
            <x-ui.title tag="h1" lineColor="primary" textColor="text-white">
                Company News
            </x-ui.title>
        </div>

        <div
            x-data="{
                shown: false,
                showArrows: false,
                observer: null,
                init() {
                    this.observer = new IntersectionObserver(([entry]) => {
                        this.shown = entry.isIntersecting;
                    }, { threshold: 0.15 });

                    this.observer.observe(this.$el);

                    const swiper = new Swiper(this.$refs.newsSwiper, {
                        slidesPerView: 1,
                        spaceBetween: 24,
                        loop: true,
                        navigation: {
                            nextEl: this.$refs.newsNext,
                            prevEl: this.$refs.newsPrev,
                        },
                        breakpoints: {
                            640: { slidesPerView: 2 },
                            1024: { slidesPerView: 3 }
                        },
                        on: {
                            init: (swiper) => {
                                this.showArrows = swiper.slides.length > swiper.params.slidesPerView;
                            },
                            breakpoint: (swiper) => {
                                this.showArrows = swiper.slides.length > swiper.params.slidesPerView;
                            }
                        }
                    });
                },
                destroy() {
                    this.observer?.disconnect();
                }
            }"
            class="transition-all duration-700 ease-out pb-8 md:bg-white bg-none md:py-12 md:px-16 py-0 px-0 rounded-2xl"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
        >

            <div class="relative">
                <div x-ref="newsSwiper" class="swiper">
                    <div class="swiper-wrapper">
                        <article class="swiper-slide overflow-hidden md:bg-none bg-white md:rounded-none rounded-xl md:px-6 px-6 md:py-0 py-6">
                            <img src="/img/projects/projects-1.png" alt="Modern office interior" class="mt-4 h-56 w-full object-cover">
                            <div class="flex flex-col items-start pt-4">
                                <h3 class="text-xl font-bold text-black">Mengenal Tahapan Pekerjaan Sitework</h3>
                                <p class="mb-4 text-sm text-black/60 font-bold">posted by Admin  |  May 20, 2016</p>
                                <p class="mb-6 md:text-xl text-lg leading-relaxed text-black">Sebuah lahan kosong dapat terlihat sederhana. Namun, untuk mengubahnya menjadi area yang siap dibangun, dibutuhkan serangkaian pekerjaan yang terencana. Inilah yang dilakukan oleh Sitework Contractor</p>
                                <x-ui.button href="#" class="mt-auto">Baca Detail</x-ui.button>
                            </div>
                        </article>
                        <article class="swiper-slide overflow-hidden md:bg-none bg-white md:rounded-none rounded-xl md:px-6 px-6 md:py-0 py-6">
                            <img src="/img/projects/projects-2.png" alt="Modern office interior" class="mt-4 h-56 w-full object-cover">
                            <div class="flex flex-col items-start pt-4">
                                <h3 class="text-xl font-bold text-black">Pentingnya Site Preparation dalam Membangun Proyek yang Efisien</h3>
                                <p class="mb-4 text-sm text-black/60 font-bold">posted by Admin  |  May 12, 2016</p>
                                <p class="mb-6 md:text-xl text-lg leading-relaxed text-black">Setiap proyek konstruksi memiliki satu titik awal yang sama: lahan.Sebelum pondasi, struktur, gedung, maupun fasilitas lainnya mulai dibangun, kondisi lahan harus dipastikan siap untuk mendukung seluruh proses konstruksi. Inilah peran penting site preparation.</p>
                                <x-ui.button href="#" class="mt-auto">Baca Detail</x-ui.button>
                            </div>
                        </article>
                        <article class="swiper-slide overflow-hidden md:bg-none bg-white md:rounded-none rounded-xl md:px-6 px-6 md:py-0 py-6">
                            <img src="/img/projects/projects-3.png" alt="Modern office interior" class="mt-4 h-56 w-full object-cover">
                            <div class="flex flex-col items-start pt-4">
                                <h3 class="text-xl font-bold text-black">Fondasi Awal untuk Proyek Konstruksi yang Berkualitas</h3>
                                <p class="mb-4 text-sm text-black/60 font-bold">posted by Admin  |  Apr 21, 2016</p>
                                <p class="mb-6 md:text-xl text-lg leading-relaxed text-black">Dalam sebuah proyek konstruksi, keberhasilan pembangunan tidak hanya ditentukan oleh struktur bangunan yang terlihat di atas tanah. Sebelum pembangunan dimulai, terdapat tahapan penting yang menjadi dasar dari seluruh proses konstruksi, yaitu sitework.</p>
                                <x-ui.button href="#" class="mt-auto">Baca Detail</x-ui.button>
                            </div>
                        </article>
                    </div>
                </div>

                <button
                    type="button"
                    x-ref="newsPrev"
                    x-show="showArrows"
                    x-cloak
                    aria-label="Previous news"
                    class="absolute left-[-48px] md:left-[-52px] top-1/2 -translate-y-1/2 z-40 cursor-pointer rounded-full p-3 shadow-md transition hover:bg-primary/90"
                >
                    <img src="/img/prev-red.png" alt="" class="w-6 h-6">
                </button>

                <button
                    type="button"
                    x-ref="newsNext"
                    x-show="showArrows"
                    x-cloak
                    aria-label="Next news"
                    class="absolute right-[-48px] md:right-[-52px] top-1/2 -translate-y-1/2 z-40 cursor-pointer rounded-full p-3 shadow-md transition hover:bg-primary/90"
                >
                    <img src="/img/prev-red.png" alt="" class="w-6 h-6 rotate-180">
                </button>
            </div>
        </div>
    </div>
</section>
<section class="relative bg-primary"
     x-data="{ 
        shown: false,
        runAnimation() { this.shown = true; },
        resetAnimation() { this.shown = false; }
     }"
     x-init="
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    runAnimation();
                } else {
                    resetAnimation();
                }
            });
        }, { threshold: 0.2 });
        observer.observe($el);
     ">

    <div class="mx-auto lg:container w-full px-6 xl:px-12 2xl:px-0">

        <!-- Menggunakan flex flex-col-reverse lg:block agar di mobile gambar berada di bawah teks -->
        <div class="relative flex flex-col-reverse lg:block min-h-[620px] lg:min-h-[700px]">
            
            <!-- GAMBAR ORANG: Tetap dengan absolute-nya untuk layar besar, dan otomatis di bawah saat mobile -->
            <div class="pointer-events-none relative z-20 mt-8 md:mt-0 w-[100%] translate-x-0 lg:absolute lg:bottom-0 right-0 lg:w-[100%] lg:max-w-[780px] lg:translate-x-0 transition-all duration-1000 ease-out"
                 x-show="shown"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 style="display: none;">
                <img
                    src="{{ asset('img/people.png') }}"
                    alt="Professional Consultant"
                    class="block h-auto w-full"
                >
            </div>

            <div class="relative z-10 flex w-full items-center py-12 lg:min-h-[700px] lg:w-[46%] lg:py-24 transition-all duration-1000 ease-out"
                 x-show="shown"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 -translate-x-12"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 style="display: none;">
                
                <div class="max-w-2xl">
                    <x-ui.title tag="h1" lineColor="none" textColor="text-white" class="leading-[1.05] tracking-tight">
                        Ready to Start
                        <br>
                        Your Project?
                    </x-ui.title>

                    <p class="mt-8 max-w-2xl text-sm leading-8 text-white md:text-lg">
                        Pastikan Lahan Anda direncanakan dengan tepat sejak awal.
                        Konsultasikan kebutuhan proyek Anda bersama PT Roda
                        Dunia Abadi dan dapatkan konsultasi Gratis mengenai Site
                        Development, Infrastructure, Geotechnical Construction,
                        hingga pekerjaan lainnya.
                    </p>

                    <p class="mt-8 text-sm font-bold text-white md:text-xl">
                        Diskusikan proyek Anda bersama kami.
                    </p>

                    <div class="mt-8">
                        <x-ui.button
                            variant="black"
                            href="/contact"
                        >
                            FREE CONSULTATION
                        </x-ui.button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
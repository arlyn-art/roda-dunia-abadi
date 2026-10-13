<section id="services" class="md:py-20 py-12 px-6 bg-accent">
    <div class="w-full md:container mx-auto px-6 xl:px-12 2xl:px-0">
        
\        <div x-data="{ shown: false }" 
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
             class="transition-all duration-700 ease-out"
             :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
            <x-ui.title tag="h1" lineColor="primary" textColor="text-black">
                Our Services
            </x-ui.title>
        </div>

        <div class="flex flex-col gap-8 md:gap-12 mt-8">

            <article x-data="{ shown: false }" 
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
                     class="grid overflow-hidden rounded-xl bg-white shadow-md md:grid-cols-2 items-stretch transition-all duration-700 ease-out hover:scale-[1.02] hover:shadow-2xl"
                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                <img class="h-64 w-full object-cover md:h-full transition-all duration-1000 ease-out delay-200"
                     :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-105'"
                     src="/img/services/services-1.png" alt="Ruang kerja">
                
                <div class="relative overflow-hidden flex flex-col justify-center p-6 md:p-10 group">
                    <div class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300
                            bg-[radial-gradient(circle_at_1px_1px,theme(colors.primary)_1px,transparent_2.5px),linear-gradient(to_top_left,theme(colors.primary),white)] 
                            [background-size:8px_8px,100%_100%] 
                            [mask-image:linear-gradient(to_bottom_right,transparent_60%,black_100%)] 
                            [-webkit-mask-image:linear-gradient(to_bottom_right,transparent_60%,black_100%)]">
                    </div>

                    <div class="relative z-10 max-w-60 md:h-32 h-16 transition-all duration-700 ease-out delay-300"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
                        <img class="md:h-32 w-auto h-16" src="/img/services/icon-1.png" alt="Icon Layanan 1">   
                    </div>
                    <h2 class="relative z-10 my-3 text-primary md:text-4xl text-2xl font-semibold transition-all duration-700 ease-out delay-500"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
                        Site Development
                    </h2>
                    <p class="relative z-10 text-black md:text-lg text-sm transition-all duration-700 ease-out delay-700"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
                        Dari mulai Survey Topografi, Land clearing, Cut & Fill sampai kepada Site grading / Pembentukkan lahan agar siap digunakan untuk kebutuhan konstruksi Pondasi, pembangunan, maupun pengembangan area.
                    </p>
                </div>
            </article>

            <article x-data="{ shown: false }" 
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
                     class="grid overflow-hidden rounded-xl bg-white shadow-md md:grid-cols-2 items-stretch transition-all duration-700 ease-out hover:scale-[1.02] hover:shadow-2xl"
                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                <div class="order-2 relative overflow-hidden flex flex-col justify-center p-6 md:order-1 md:p-10 group">
                    <div class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300
                        bg-[radial-gradient(circle_at_1px_1px,theme(colors.primary)_1px,transparent_2.5px),linear-gradient(to_bottom_left,theme(colors.primary),white)] 
                        [background-size:8px_8px,100%_100%] 
                        [mask-image:linear-gradient(to_top_left,transparent_60%,black_100%)] 
                        [-webkit-mask-image:linear-gradient(to_top_left,transparent_60%,black_100%)]">
                    </div>
    
                    <div class="max-w-60 md:h-32 h-16 transition-all duration-700 ease-out delay-300"
                         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
                        <img class="md:h-32 w-auto h-16" src="/img/services/icon-2.png" alt="Icon Layanan 2">   
                    </div>
                    <h2 class="my-3 text-primary md:text-4xl text-2xl font-semibold transition-all duration-700 ease-out delay-500"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
                        Infrastructure & Civil Works
                    </h2>
                    <p class="text-black md:text-lg text-sm transition-all duration-700 ease-out delay-700"
                       :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
                        Meliputi Pekerjaan Jalan & perkerasan Sub grade, Drainase & Pengendalian air, Pekerjaan Jembatan, Pagar eton keliling, dan lainnya.
                    </p>
                </div>
                <img class="order-1 h-64 w-full object-cover md:order-2 md:h-full transition-all duration-1000 ease-out delay-200"
                     :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-105'"
                     src="/img/services/services-2.png" alt="Tim bekerja bersama">
            </article>

            <article x-data="{ shown: false }" 
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
                     class="grid overflow-hidden rounded-xl bg-white shadow-md md:grid-cols-2 items-stretch transition-all duration-700 ease-out hover:scale-[1.02] hover:shadow-2xl"
                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                <img class="h-64 w-full object-cover md:h-full transition-all duration-1000 ease-out delay-200"
                     :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-105'"
                     src="/img/services/services-3.png" alt="Area kerja">
                
                <div class="relative overflow-hidden flex flex-col justify-center p-6 md:p-10 group">
                    <div class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300
                            bg-[radial-gradient(circle_at_1px_1px,theme(colors.primary)_1px,transparent_2.5px),linear-gradient(to_top_left,theme(colors.primary),white)] 
                            [background-size:8px_8px,100%_100%] 
                            [mask-image:linear-gradient(to_bottom_right,transparent_60%,black_100%)] 
                            [-webkit-mask-image:linear-gradient(to_bottom_right,transparent_60%,black_100%)]">
                    </div>
                    <div class="max-w-60 md:h-32 h-16 transition-all duration-700 ease-out delay-300"
                         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
                        <img class="md:h-32 w-auto h-16" src="/img/services/icon-3.png" alt="Icon Layanan 3">   
                    </div>
                    <h2 class="my-3 text-primary md:text-4xl text-2xl font-semibold transition-all duration-700 ease-out delay-500"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
                        Geotechnical Construction
                    </h2>
                    <p class="text-black md:text-lg text-sm transition-all duration-700 ease-out delay-700"
                       :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
                        Meliputi Pekerjaan Pondasi Bored Pile, Soldier Pile & Retaining structure, Dinding penahan tanah (Retaining wall), Landslide mitigation, Slope protection & stabilization, Pond treatment, dan lainnya.
                    </p>
                </div>
            </article>

        </div>
    </div>
</section>
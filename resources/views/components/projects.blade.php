<section id="projects" class="md:py-20 py-12 px-6 bg-background text-white" 
    x-data="projectSlider()" 
    x-init="initSwiper()">
    <div class="w-full md:container mx-auto">
        <div class="mb-10">
            <x-ui.title tag="h2" lineColor="primary" textColor="text-white">
                Recent & Featured Projects
            </x-ui.title>
        </div>

        <div class="relative group">
            <div class="swiper project-swiper overflow-hidden rounded-2xl">
                <div class="swiper-wrapper">
                    <div class="swiper-slide px-6 xl:px-12 2xl:px-0 flex flex-col">
                        <div class="w-full h-[300px] md:h-[650px] rounded-xl overflow-hidden mb-8">
                            <img src="/img/featured-projects/main-image.png" alt="Proyek 1" class="w-full h-full object-cover">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xl md:text-2xl font-bold text-white mb-1">Proyek PT. Tirta Fresindo Jaya</h3>
                                <p class="text-white font-bold text-sm md:text-base mb-4">Secang - Magelang</p>
                                <span class="text-primary text-xs md:text-sm font-semibold uppercase tracking-wider block mb-1">TAHUN</span>
                                <p class="text-white font-medium mb-4">2026</p>
                                <span class="text-primary text-xs md:text-sm font-semibold uppercase tracking-wider block mb-1">PEKERJAAN</span>
                                <ul class="list-disc list-inside text-white text-sm space-y-1">
                                    <li>Cut & Fill</li>
                                    <li>Import tanah Urugan</li>
                                    <li>Pagar & Saluran Keliling</li>
                                </ul>
                            </div>
                            <div class="text-white text-sm md:text-base space-y-4">
                                <p>On Progress PT Roda Dunia Abadi dipercaya untuk melaksanakan pekerjaan pematangan tanah di proyek PT. Tirta Fresindo Jaya, Secang - Magelang.</p>
                                <p>Pekerjaan mencakup penyiapan dan pembentukan lahan untuk memastikan kondisi tanah siap mendukung tahapan pembangunan pabrik selanjutnya.</p>
                                <p>Challenge terbesar di project ini adalah ketepatan waktu pengerjaan area prioritas untuk kemudian diserahterimakan secara parsial kepada kontraktor pancang & sipil.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide p-6 md:p-10 flex flex-col justify-between" x-data="{ activeImage: 0 }">
                        <div class="w-full md:h-[650px] flex flex-col gap-4 mb-8">
                            
                            <div class="w-full flex-1 rounded-xl overflow-hidden bg-black/20">
                                <template x-for="(img, index) in images">
                                    <img :src="img" x-show="activeImage === index" alt="Proyek 2 Gallery" class="w-full h-full object-cover transition-opacity duration-300">
                                </template>
                            </div>

                            <div class="grid grid-cols-4 gap-3 h-20 md:h-24 shrink-0">
                                <template x-for="(img, index) in images">
                                    <div @click="activeImage = index" 
                                         class="h-full rounded-lg overflow-hidden cursor-pointer border-2 transition-all"
                                         :class="activeImage === index ? 'border-primary scale-[1.02]' : 'border-transparent opacity-60 hover:opacity-100'">
                                        <img :src="img" alt="Thumbnail" class="w-full h-full object-cover">
                                    </div>
                                </template>
                            </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xl md:text-2xl font-bold text-white mb-1">Pembangunan Infrastruktur Pabrik</h3>
                                <p class="text-gray-400 text-sm md:text-base mb-4">Kawasan Industri - Karawang</p>
                                <span class="text-primary text-xs md:text-sm font-semibold uppercase tracking-wider block mb-1">TAHUN</span>
                                <p class="text-white font-medium mb-4">2025</p>
                                <span class="text-primary text-xs md:text-sm font-semibold uppercase tracking-wider block mb-1">PEKERJAAN</span>
                                <ul class="list-disc list-inside text-white text-sm space-y-1">
                                    <li>Land Clearing & Grading</li>
                                    <li>Pondasi Bored Pile</li>
                                    <li>Drainase Utama Kawasan</li>
                                </ul>
                            </div>
                            <div class="text-white text-sm md:text-base space-y-4">
                                <p>Proyek skala besar yang mencakup persiapan lahan industri berat beserta sistem mitigasi air dan struktur penahan tanah.</p>
                                <p>Dikerjakan dengan standar keselamatan tinggi serta pengawasan ketat pada struktur geoteknik bawah tanah.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="swiper-button-prev-custom absolute left-[-16px] xl:left-[-8px] 2xl:left-[-4rem] md:top-[35%] top-[20%] -translate-y-1/2 z-20 cursor-pointer hover:bg-primary/20 p-3 rounded-full transition">
                <img src="/img/prev-red.png" alt="Prev" class="w-6 h-6">
            </div>
            <div class="swiper-button-next-custom absolute right-[-16px] xl:right-[-8px] 2xl:right-[-4rem] md:top-[35%] top-[20%] -translate-y-1/2 z-20 cursor-pointer hover:bg-primary/20 p-3 rounded-full transition">
                <img src="/img/prev-red.png" alt="Next" class="w-6 h-6 rotate-180">
            </div>

        </div>
    </div>
</section>
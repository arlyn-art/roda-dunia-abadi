@php
    $aboutTitle = $aboutSection['about_title'] ?? 'YOUR TRUSTED PARTNER IN SITEWORK';
    
    $aboutDescription = $aboutSection['about_description'] ?? '
    PT. Roda Dunia Abadi mulai didirikan pada tahun 1989. Perusahaan kami bergerak dalam bidang jasa Sipil Site 
    Work dan Infrastruktur. Bidang pekerjaan yang kami kerjakan adalah Pekerjaan Survey Topografi, Land Clearing & 
    Stripping, Galian & Urugan, Pekerjaan Jalan, Saluran Drainase, Pagar Panel Beton keliling, Retaining Wall, 
    Pencegahan Longsoran pada Lereng, Struktur Gabion / Bronjong, Pembuatan & Pengerukkan Pond Treatment, 
    Geotextile & Geomembrane, Dinding Soldier Pile, Pondasi Borpile, Concrete Yard, dan lainnya. 
    <br>
    <br>
    Sejak berdiri hingga sekarang, kami telah banyak mengerjakan proyek baik proyek berskala nasional seperti PLTU 
    Suralaya sampai ke project Kawasan Industri. Proyek-proyek yang kami kerjakan selama ini telah diselesaikan 
    dengan baik dan dikerjakan secara profesional dengan dukungan Alat Berat dan Armada Dump Truck yang kami 
    miliki serta para Pelaksana lapangan kami yang berpengalaman & Bersertifikat.';
    
    $aboutFile = $aboutSection['about_file'] ?? null;
    $fileUrl = $aboutFile ? (filter_var($aboutFile, FILTER_VALIDATE_URL) ? $aboutFile : asset('storage/' . $aboutFile)) : '#';
@endphp

<section id="about" class="w-full md:container mx-auto md:py-20 py-12 px-6 overflow-hidden"
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
    
    <div class="w-full md:w-2/3 mx-auto transition-all duration-1000 ease-out transform"
         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
        
        <div class="flex flex-col space-y-2 gap-4 items-center">
            <div class="w-24 h-1 bg-primary"></div>
            <h1 class="text-lg sm:text-4xl md:text-5xl text-primary font-bold text-center">
                {{ $aboutTitle }}
            </h1>
        </div>

        <div class="mt-4">
            <div class="text-black text-center text-[0.65rem] md:text-lg prose max-w-none">
                {!! $aboutDescription !!}
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            @if($aboutFile)
                <a href="{{ $fileUrl }}" target="_blank">
                    <x-ui.button variant="primary">
                        DOWNLOAD COMPANY PROFILE
                    </x-ui.button>
                </a>
            @else
                <x-ui.button href="#" variant="primary">
                    DOWNLOAD COMPANY PROFILE
                </x-ui.button>
            @endif
        </div>

    </div>
</section>
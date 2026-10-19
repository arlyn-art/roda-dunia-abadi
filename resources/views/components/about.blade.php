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
    
    <div class="w-full xl:w-3/4 2xl:w-2/3 mx-auto transition-all duration-1000 ease-out transform"
         :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
        
        <div class="flex flex-col space-y-2 gap-4 items-center">
            <div class="w-24 h-1 bg-primary"></div>
            <x-ui.title tag="h2" lineColor="none" textColor="text-primary" class="text-center" class="font-medium text-center">
                {{ $aboutTitle }}
            </x-ui.title>
        </div>

        <div class="mt-4 text-center">
            <x-ui.paragraf tag="p" textColor="text-black">
                {!! $aboutDescription !!}
            </x-ui.paragraf>
        </div>

        <div class="mt-8 flex justify-center">
            @if($aboutFile)
                <a href="{{ $fileUrl }}" target="_blank">
                    <x-ui.button variant="primary">
                        <x-ui.paragraf tag="p" textColor="text-white">
                            DOWNLOAD COMPANY PROFILE
                        </x-ui.paragraf>
                    </x-ui.button>
                </a>
            @else
                <x-ui.paragraf tag="p" textColor="text-white">
                    DOWNLOAD COMPANY PROFILE
                </x-ui.paragraf>
            @endif
        </div>

    </div>
</section>
<section class="relative w-full aspect-video max-h-[75vh] mx-auto md:mb-16 sm:mb-12 mb-6">
    <div class="swiper hero-swiper w-full h-full">
        <div class="swiper-wrapper">
            @php
                $items = !empty($heroSection) ? $heroSection : [
                    [
                        'hero_title' => 'BUILDING THE GROUND FOR SUCCESS',
                        'hero_subtitle' => '',
                        'hero_media' => null
                    ]
                ];
            @endphp

            @foreach($items as $item)
                @php
                    $media = $item['hero_media'] ?? null;
                    if (empty($media)) {
                        $media = env('CUSTOM_VIDEO');
                    }
                    $isVideo = $media && preg_match('/\.(mp4|webm|ogg|mov)$/i', $media);
                @endphp

                <div class="swiper-slide relative w-full h-full overflow-hidden">
                    @if($media)
                        @if($isVideo) 
                            <video class="w-full h-full object-cover hero-video" autoplay muted loop playsinline preload="auto"> 
                                <source src="{{ filter_var($media, FILTER_VALIDATE_URL) ? $media : asset('storage/' . $media) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ filter_var($media, FILTER_VALIDATE_URL) ? $media : asset('storage/' . $media) }}" class="w-full h-full object-cover" alt="Hero Media">
                        @endif
                    @else
                        <img src="{{ asset('img/home/main-image.png') }}" class="w-full h-full object-cover" alt="Main Hero Image">
                    @endif

                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                        <x-ui.title tag="h2" lineColor="none" textColor="text-white" class="tracking-wider uppercase drop-shadow-xl font-bold">
                            {{ $item['hero_title'] ?? '' }}
                        </x-ui.title>
                        @if(!empty($item['hero_subtitle']))
                            <p class="text-white text-xs sm:text-lg mt-2 drop-shadow-md max-w-2xl">
                                {{ $item['hero_subtitle'] }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-pagination"></div>
    </div>

    <div class="absolute bottom-[-3rem] sm:bottom-[-7rem] left-1/2 transform -translate-x-1/2 z-20 w-[90%] max-w-6xl bg-primary text-white rounded-tl-4xl rounded-br-4xl shadow-2xl py-4 px-4 sm:px-12 sm:py-12"
         x-data="{ 
            @foreach($supportSection as $index => $item)
                count{{ $index + 1 }}: 0,
            @endforeach
            runAnimation() {
                @foreach($supportSection as $index => $item)
                    this.count{{ $index + 1 }} = 0;
                    let target{{ $index + 1 }} = {{ $item['support_counting'] ?? 0 }};
                    let step{{ $index + 1 }} = target{{ $index + 1 }} > 50 ? Math.ceil(target{{ $index + 1 }} / 50) : 1;
                    let int{{ $index + 1 }} = setInterval(() => { 
                        if(this.count{{ $index + 1 }} < target{{ $index + 1 }}) {
                            this.count{{ $index + 1 }} += step{{ $index + 1 }};
                            if(this.count{{ $index + 1 }} > target{{ $index + 1 }}) {
                                this.count{{ $index + 1 }} = target{{ $index + 1 }};
                            }
                        } else { 
                            clearInterval(int{{ $index + 1 }}); 
                        } 
                    }, 40);
                @endforeach
            },
            resetAnimation() {
                @foreach($supportSection as $index => $item)
                    this.count{{ $index + 1 }} = 0;
                @endforeach
            }
         }"
         x-init="
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        runAnimation(); // Jalan setiap kali card masuk layar
                    } else {
                        resetAnimation(); // Reset ke 0 pas card benar-benar keluar layar
                    }
                });
            }, { 
                threshold: 0.1 
            });
            observer.observe($el);
         ">
            
        <div class="grid grid-cols-3 gap-6 justify-center items-center">
            @foreach($supportSection as $index => $item)
                @php
                    $isPlus = $item['is_plus'] ?? false;
                    $countVar = 'count' . ($index + 1);
                    
                    $mediaSrc = isset($item['support_media']) 
                        ? (filter_var($item['support_media'], FILTER_VALIDATE_URL) ? $item['support_media'] : asset('storage/' . $item['support_media']))
                        : asset('img/home/icon-' . ($index + 1) . '.png');
                @endphp

                <div class="flex items-center justify-center space-x-4 w-1/3 mx-auto">
                    <div class="md:w-16 md:h-16 w-8 h-8 flex items-center justify-center shrink-0">
                        <img src="{{ $mediaSrc }}" class="w-full h-auto object-contain" alt="{{ $item['support_title'] ?? 'Support Icon' }}">
                    </div>
                    <div class="flex flex-col items-start">
                        <span class="text-sm md:text-2xl xl:text-4xl font-extrabold" 
                            x-text="{{ $isPlus ? "('+' + $countVar)" : $countVar }}">
                            {{ $isPlus ? '+' : '' }}0
                        </span>
                        <div class="tracking-wider mt-1">
                            <p class="font-semibold text-white/90 2xl:text-[1.25rem] xl:text-[1.15rem] lg:text-[1rem] md:text-[0.85rem] sm:text-[0.65rem] text-[0.45rem] tracking-wide">
                                {{ $item['support_title'] ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
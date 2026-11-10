<section
    id="services"
    class="md:py-20 py-12 px-6 bg-background text-white"
>
    <div class="w-full md:container mx-auto">
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
            class="mb-10 px-6 xl:px-12 2xl:px-0"
        >
            <div
                class="transition-all duration-700 ease-out"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
            >
                <x-ui.title tag="h2" lineColor="primary" textColor="text-white" class="font-medium">
                    Recent & Featured Projects
                </x-ui.title>
            </div>
        </div>

        <div class="relative group">
            <div class="swiper featured-swiper overflow-hidden rounded-2xl">
                <div class="swiper-wrapper">
                    @forelse($featuredProjects as $item)
                        @if($item->project)
                            @php
                                $project = $item->project;
                                
                                $images = [];
                                $thumbnail = $project->getFirstMediaUrl('thumbnail');
                                $images[] = $thumbnail ?: asset('img/featured-projects/thumbnail.jpeg');

                                foreach ($project->getMedia('galeries') as $media) {
                                    $images[] = $media->getUrl();
                                }
                            @endphp

                            <div class="swiper-slide px-6 xl:px-12 2xl:px-0 flex flex-col">
                                <div
                                    x-data="{
                                        shown: false,
                                        activeImage: 0,
                                        images: @js($images),
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
                                >
                                    <div
                                        class="transition-all duration-700 ease-out"
                                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                                    >
                                        <div class="relative w-full h-[300px] md:h-[650px] rounded-xl overflow-hidden mb-8 bg-black/40">
                                            <template x-for="(img, index) in images" :key="index">
                                                <img
                                                    :src="img"
                                                    x-show="activeImage === index"
                                                    alt="Project Gallery Image"
                                                    class="w-full h-full object-cover transition-opacity duration-300"
                                                >
                                            </template>

                                            <template x-if="images.length > 1">
                                                <div
                                                    class="absolute bottom-0 left-0 right-0 flex gap-3 z-10 overflow-x-auto p-2 bg-black/40 backdrop-blur-md rounded-b-xl [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]"
                                                    @touchstart.stop
                                                    @touchmove.stop
                                                    style="touch-action: pan-x;"
                                                >
                                                    <template x-for="(img, index) in images" :key="index">
                                                        <div
                                                            @click="activeImage = index"
                                                            class="w-16 h-16 md:w-20 md:h-20 aspect-square rounded-lg overflow-hidden cursor-pointer border-2 shrink-0 transition-all shadow-lg"
                                                            :class="activeImage === index ? 'border-primary scale-105 opacity-100' : 'border-transparent opacity-60 hover:opacity-100'"
                                                        >
                                                            <img :src="img" alt="Thumbnail Preview" class="w-full h-full object-cover">
                                                        </div>
                                                    </template>
                                                </div>
                                            </template>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div>  
                                                <x-ui.title tag="h4" lineColor="none" textColor="text-white" class="mb-1 font-bold">
                                                    {{ $project->title }}
                                                </x-ui.title>
                                                
                                                <div class="mb-4">
                                                    <x-ui.paragraf tag="p" textColor="text-white" class="font-bold">
                                                        {{ $project->location }}
                                                    </x-ui.paragraf>
                                                </div>

                                                @if($project->years)
                                                    <div class="mb-4">
                                                        <div class="mb-1">
                                                            <x-ui.paragraf tag="span" textColor="text-primary" class="font-bold uppercase tracking-wide block">
                                                                TAHUN
                                                            </x-ui.paragraf>
                                                        </div>
                                                        <x-ui.paragraf tag="p" textColor="text-white" class="font-medium">
                                                            {{ $project->years }}
                                                        </x-ui.paragraf>
                                                    </div>
                                                @endif

                                                @if($project->working)
                                                    <div class="mb-4">
                                                        <div class="mb-1">
                                                            <x-ui.paragraf tag="span" textColor="text-primary" class="font-bold uppercase tracking-wide block">
                                                                PEKERJAAN
                                                            </x-ui.paragraf>
                                                        </div>
                                                        <x-ui.paragraf tag="p" textColor="text-white" class="font-medium">
                                                            {!! $project->working !!}
                                                        </x-ui.paragraf>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="text-white text-sm md:text-base space-y-4 md:col-span-2">
                                                @if($project->description)
                                                    <div class="prose prose-invert max-w-none tiptap-content">
                                                        <x-ui.paragraf tag="p" textColor="text-white" class="font-medium">
                                                            {!! $project->description !!}
                                                        </x-ui.paragraf>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="swiper-slide px-6 text-center py-12 text-white/70">
                            <p class="text-lg">Belum ada Featured Projects yang diatur.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="swiper-button-prev-custom absolute left-[-24px] xl:left-[-8px] 2xl:left-[-4rem] md:top-[35%] top-[20%] -translate-y-1/2 z-20 cursor-pointer hover:bg-white/60 p-3 rounded-full transition">
                <img src="/img/prev-red.png" alt="Prev" class="w-6 h-6">
            </div>

            <div class="swiper-button-next-custom absolute right-[-24px] xl:right-[-8px] 2xl:right-[-4rem] md:top-[35%] top-[20%] -translate-y-1/2 z-20 cursor-pointer hover:bg-white/60 p-3 rounded-full transition">
                <img src="/img/prev-red.png" alt="Next" class="w-6 h-6 rotate-180">
            </div>
        </div>
    </div>
</section>
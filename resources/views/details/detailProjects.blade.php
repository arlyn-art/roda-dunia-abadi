@extends('layouts.app')

@section('content')
<div class="w-full h-[35vh] overflow-hidden mb-12 bg-black/40">
    <img src="{{ $project->getFirstMediaUrl('thumbnail') ?: asset('img/featured-projects/main-image.png') }}" 
         alt="{{ $project->title }}" 
         class="w-full h-full object-cover">
</div>

<div 
    x-data="{ 
        activeImage: 0, 
        images: @js($images),
        shown: false,
        init() {
            const observer = new IntersectionObserver(([entry]) => {
                this.shown = entry.isIntersecting;
            }, { threshold: 0.1 });

            observer.observe(this.$el);
        }
    }"
    class="py-12 px-6 bg-white text-black transition-all duration-700 ease-out"
    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
>
    
    <div class="w-full md:container mx-auto px-6 xl:px-12 2xl:px-0">
        <div class="mb-12">
            <x-ui.title tag="h1" lineColor="primary" textColor="text-black">
                Our Projects
            </x-ui.title>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start mb-16">
            <div class="lg:col-span-5 flex flex-col space-y-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-black mb-2">{{ $project->title }}</h2>
                    <p class="text-gray-600 font-medium text-lg">{{ $project->location }}</p>
                </div>

                @if($project->years)
                    <div>
                        <span class="block text-xs font-bold tracking-wider text-primary uppercase mb-1">Tahun</span>
                        <span class="text-xl font-bold text-black">
                            {{ $project->years }}{{ $project->end_year ? ' - ' . $project->end_year : '' }}
                        </span>
                    </div>
                @endif

                @if($project->working)
                <div>
                    <span class="block text-xs font-bold tracking-wider text-primary uppercase mb-2">Pekerjaan</span>
                    <div class="prose prose-ul:list-disc prose-ol:list-decimal list-inside text-black font-semibold text-sm md:text-base">
                        {!! $project->working !!}
                    </div>
                </div>
                @endif

                @if($project->partner)
                <div>
                    <span class="block text-xs font-bold tracking-wider text-primary uppercase mb-1">Partner</span>
                    <span class="text-base font-semibold text-black">{{ $project->partner }}</span>
                </div>
                @endif
            </div>

            <div class="lg:col-span-7">
                <div class="relative w-full h-[300px] md:h-[500px] rounded-xl overflow-hidden bg-black/10 shadow-md">
                    
                    <template x-for="(img, index) in images" :key="index">
                        <img :src="img" 
                             x-show="activeImage === index" 
                             x-transition.opacity.duration.300ms
                             alt="Project Image" 
                             class="w-full h-full object-cover">
                    </template>

                    <template x-if="images.length > 1">
                        <div class="absolute bottom-0 left-0 right-0 flex gap-3 z-10 overflow-x-auto p-3 bg-black/40 backdrop-blur-md rounded-b-xl [&::-webkit-scrollbar]:hidden"
                             @touchstart.stop @touchmove.stop style="touch-action: pan-x;">
                            <template x-for="(img, index) in images" :key="index">
                                <div @click="activeImage = index"
                                     class="w-16 h-16 md:w-20 md:h-20 aspect-square rounded-lg overflow-hidden cursor-pointer border-2 shrink-0 transition-all shadow-lg"
                                     :class="activeImage === index ? 'border-primary scale-105 opacity-100' : 'border-transparent opacity-60 hover:opacity-100'">
                                    <img :src="img" alt="Thumbnail Preview" class="w-full h-full object-cover">
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        @if (trim(strip_tags($project->description ?? '')) !== '')
            <div class="mb-16 border-t border-gray-200 pt-8">
                <h3 class="text-2xl font-bold text-black mb-4">Tentang Proyek</h3>
                <div class="prose max-w-none text-black tiptap-content">
                    {!! $project->description !!}
                </div>
            </div>
        @endif


        <div class="border-t border-gray-300 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="w-full sm:w-auto">
                @if($previousProject)
                    <a href="{{ route('projects.show', $previousProject->slug) }}"
                        class="group relative inline-flex items-center gap-3 py-2 font-semibold text-black transition-all duration-300">

                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary text-white
                            opacity-100 translate-x-0
                            sm:opacity-0 sm:-translate-x-3
                            sm:transition-all sm:duration-300 sm:ease-out
                            sm:group-hover:translate-x-0 sm:group-hover:opacity-100">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </span>

                        <span class="relative z-10
                            after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-primary
                            sm:after:w-0 sm:after:transition-all sm:after:duration-300
                            sm:group-hover:after:w-full
                            sm:transition-transform sm:duration-300 sm:ease-out sm:group-hover:translate-x-1">
                            PREVIOUS PROJECT
                        </span>
                    </a>
                @endif
            </div>

            <div class="w-full sm:w-auto flex justify-end">
                @if($nextProject)
                    <a href="{{ route('projects.show', $nextProject->slug) }}"
                        class="group relative inline-flex items-center gap-3 py-2 font-semibold text-black transition-all duration-300">

                        <span class="relative z-10
                            after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-primary
                            sm:after:w-0 sm:after:transition-all sm:after:duration-300
                            sm:group-hover:after:w-full
                            sm:transition-transform sm:duration-300 sm:ease-out sm:group-hover:-translate-x-1">
                            NEXT PROJECT
                        </span>

                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary text-white
                            opacity-100 translate-x-0
                            sm:opacity-0 sm:translate-x-3
                            sm:transition-all sm:duration-300 sm:ease-out
                            sm:group-hover:translate-x-0 sm:group-hover:opacity-100">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                @endif
            </div>

        </div>

    </div>
</div>
@endsection
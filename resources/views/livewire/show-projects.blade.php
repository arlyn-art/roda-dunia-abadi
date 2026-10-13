<div class="md:py-20 py-12 px-6 bg-white">
    <div class="w-full md:container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start sm:items-center mb-12 gap-4">
            <x-ui.title tag="h1" lineColor="primary" textColor="text-black">
                Our Projects
            </x-ui.title>

            <div class="flex w-full flex-row items-center gap-3 sm:gap-4 md:w-auto">
                <div class="relative min-w-0 flex-1 bg-white sm:w-72 sm:flex-none">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </span>

                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search Keyword"
                        class="w-full rounded-lg border border-gray-700 bg-white py-4 pl-10 pr-3 text-black placeholder-black focus:border-primary focus:outline-none"
                    >
                </div>

                <div class="group relative w-auto shrink-0">
                    <span class="pointer-events-none absolute left-1 top-1/2 z-10 flex h-8 w-8 -translate-x-3 -translate-y-1/2 items-center justify-center rounded-full bg-primary text-white opacity-0 transition-all duration-300 ease-out group-hover:translate-x-2 group-hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>

                    <select
                        wire:model.live="sort"
                        class="w-auto cursor-pointer appearance-none rounded-lg bg-black py-4 pl-8 pr-8 font-semibold text-white transition-all duration-300 focus:outline-none sm:pl-12 group-hover:pl-12"
                    >
                        <option value="latest">Latest</option>
                        <option value="oldest">Oldest</option>
                    </select>

                    <span class="pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 text-white transition-transform duration-300 group-hover:rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $index => $project)
                <div 
                    x-data="{
                        shown: false,
                        observer: null,
                        init() {
                            this.observer = new IntersectionObserver(([entry]) => {
                                // Jika masuk viewport, set true. Jika keluar, set false agar bisa di-trigger ulang
                                this.shown = entry.isIntersecting;
                            }, { threshold: 0.1 });

                            this.observer.observe(this.$el);
                        }
                    }"
                    style="transition-delay: {{ ($index % 3) * 100 }}ms;"
                    class="transition-all duration-700 ease-out"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                >
                    <a href="{{ route('projects.show', $project->slug) }}" class="flex flex-col group cursor-pointer">
                        <div class="w-full h-[160px] md:h-[320px] overflow-hidden mb-4 bg-black/40">
                            <img src="{{ $project->getFirstMediaUrl('thumbnail') ?: asset('img/featured-projects/main-image.png') }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="sm:px-6 px-0">
                            <h3 class="text-sm md:text-xl font-bold text-black mb-1 group-hover:text-primary transition">{{ $project->title }}</h3>
                            <p class="text-black font-semibold text-sm">{{ $project->years }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-gray-400">
                    <p class="text-lg">No projects found.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12 flex justify-center">
            {{ $projects->links('vendor.pagination.custom') }}
        </div>

    </div>
</div>
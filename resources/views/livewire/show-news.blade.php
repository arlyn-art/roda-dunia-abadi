<div class="md:py-20 py-12 bg-white">
    <div class="w-full md:container mx-auto px-6 xl:px-12 2xl:px-0">
        <div class="flex flex-col md:flex-row justify-between items-start sm:items-center mb-12 gap-4">
            <x-ui.title tag="h2" lineColor="primary" textColor="text-black" class="font-medium">
                Articles
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
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles as $index => $article)
                <div 
                    x-data="{
                        shown: false,
                        observer: null,
                        init() {
                            this.observer = new IntersectionObserver(([entry]) => {
                                this.shown = entry.isIntersecting;
                            }, { threshold: 0.1 });

                            this.observer.observe(this.$el);
                        }
                    }"
                    style="transition-delay: {{ ($index % 3) * 100 }}ms;"
                    class="transition-all duration-700 ease-out"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                >
                    <a href="{{ route('articles.show', $article->slug) }}" class="flex flex-col group cursor-pointer">
                        <div class="w-full aspect-[4/3] overflow-hidden mb-4 bg-black/40">
                            <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        
                        <div class="px-0">
                            <h3 class="text-sm xl:text-[1.2rem] 2xl:text-xl font-bold text-black mb-2 group-hover:text-primary transition">
                                {{ $article->title }}
                            </h3>
                            
                            <div class="text-xs md:text-sm text-secondary font-semibold flex flex-col sm:flex-row items-start sm:items-center gap-1 sm:gap-2">
                                <span>Posted by {{ $article->user->name ?? 'Admin' }}</span>
                                <span class="hidden sm:block">|</span>
                                <span>{{ \Carbon\Carbon::parse($article->date)->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-gray-400">
                    <p class="text-lg">No articles found.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12 flex justify-center">
            {{ $articles->links('vendor.pagination.custom') }}
        </div>

    </div>
</div>
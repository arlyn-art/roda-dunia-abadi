@if ($paginator->hasPages())
    <nav class="flex items-center justify-center space-x-2">
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 text-gray-400 cursor-not-allowed">&lt;</span>
        @else
            <button type="button" wire:click="previousPage" wire:loading.attr="disabled" class="px-3 py-2 text-black hover:text-primary transition cursor-pointer">&lt;</button>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-2 text-gray-400">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="w-9 h-9 flex items-center justify-center rounded-full bg-primary text-white font-semibold cursor-pointer">
                            {{ $page }}
                        </span>
                    @else
                        <button type="button" wire:click="gotoPage({{ $page }})" class="w-9 h-9 flex items-center justify-center rounded-full text-black hover:bg-gray-100 font-semibold transition cursor-pointer">
                            {{ $page }}
                        </button>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <button type="button" wire:click="nextPage" wire:loading.attr="disabled" class="px-3 py-2 text-black hover:text-primary transition cursor-pointer">&gt;</button>
        @else
            <span class="px-3 py-2 text-gray-400 cursor-not-allowed">&gt;</span>
        @endif
    </nav>
@endif
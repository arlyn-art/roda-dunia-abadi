@if ($paginator->hasPages())
    <nav class="flex items-center justify-center space-x-2">
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 text-gray-400 cursor-not-allowed">&lt;</span>
        @else
            <button type="button" wire:click="previousPage" wire:loading.attr="disabled" class="px-3 py-2 text-black hover:text-primary transition cursor-pointer">&lt;</button>
        @endif

        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $startPage = max(2, min($currentPage - 1, $lastPage - 3));
            $endPage = min($lastPage - 1, max(4, $currentPage + 1));
        @endphp

        <button type="button" wire:click="gotoPage(1)" class="w-9 h-9 flex items-center justify-center rounded-full {{ $currentPage == 1 ? 'bg-primary text-white' : 'text-black hover:bg-gray-100' }} font-semibold transition cursor-pointer">1</button>

        @if ($startPage > 2)
            <span class="px-2 py-2 text-gray-400">...</span>
        @endif

        @for ($page = $startPage; $page <= $endPage; $page++)
            <button type="button" wire:click="gotoPage({{ $page }})" class="w-9 h-9 flex items-center justify-center rounded-full {{ $currentPage == $page ? 'bg-primary text-white' : 'text-black hover:bg-gray-100' }} font-semibold transition cursor-pointer">
                {{ $page }}
            </button>
        @endfor

        @if ($endPage < $lastPage - 1)
            <span class="px-2 py-2 text-gray-400">...</span>
        @endif

        @if ($lastPage > 1)
            <button type="button" wire:click="gotoPage({{ $lastPage }})" class="w-9 h-9 flex items-center justify-center rounded-full {{ $currentPage == $lastPage ? 'bg-primary text-white' : 'text-black hover:bg-gray-100' }} font-semibold transition cursor-pointer">{{ $lastPage }}</button>
        @endif

        @if ($paginator->hasMorePages())
            <button type="button" wire:click="nextPage" wire:loading.attr="disabled" class="px-3 py-2 text-black hover:text-primary transition cursor-pointer">&gt;</button>
        @else
            <span class="px-3 py-2 text-gray-400 cursor-not-allowed">&gt;</span>
        @endif
    </nav>
@endif
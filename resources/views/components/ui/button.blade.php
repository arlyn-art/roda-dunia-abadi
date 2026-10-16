@props([
    'variant' => 'red',
    'href'    => null,
    'type'    => 'button',
])

@php
    if ($variant === 'black') {
        $bgButton = 'bg-black text-white hover:bg-black/80';
        $bgCircle = 'bg-primary text-white';
    } else {
        $bgButton = 'bg-primary text-white hover:bg-primary/80';
        $bgCircle = 'bg-white text-primary';
    }

    $isLink = !empty($href) && $href !== '#';
    $tag = $isLink ? 'a' : 'button';
@endphp

<{{ $tag }} 
    @if($isLink) href="{{ $href }}" @else type="{{ $type }}" @endif 
    {{ $attributes->merge(['class' => "group relative inline-flex items-center justify-center overflow-hidden rounded-lg px-12 lg:px-12 xl:px-12 2xl:px-16 py-4 font-medium transition-all duration-300 {$bgButton} cursor-pointer"]) }}
>
    <span class="absolute left-1 lg:left-2 xl:left-2.5 2xl:left-4 flex 2xl:h-9 2xl:w-9 xl:h-6 xl:w-6 h-6 w-6 items-center justify-center rounded-full opacity-0 -translate-x-0 transition-all duration-300 ease-out group-hover:translate-x-6 group-hover:opacity-100 {{ $bgCircle }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="2xl:h-4 2xl:w-4 xl:h-2 xl:w-2 h-2 w-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </span>

    <span class="relative z-10 transition-transform duration-300 ease-out group-hover:translate-x-5">
        {{ $slot }}
    </span>
</{{ $tag }}>
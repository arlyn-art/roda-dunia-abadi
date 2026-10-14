@props([
    'variant' => 'red',
    'href'    => null,
    'type'    => 'button',
])

@php
    if ($variant === 'black') {
        $bgButton = 'bg-black text-white hover:bg-black/80';
        $bgCircle = 'bg-primary text-white';
        $text = 'text-[0.65rem] sm:text-lg';
    } else {
        $bgButton = 'bg-primary text-white hover:bg-primary/80';
        $bgCircle = 'bg-white text-primary';
        $text = 'text-[0.65rem] sm:text-lg';
    }

    $isLink = !empty($href) && $href !== '#';
    $tag = $isLink ? 'a' : 'button';
@endphp

<{{ $tag }} 
    @if($isLink) href="{{ $href }}" @else type="{{ $type }}" @endif 
    {{ $attributes->merge(['class' => "group relative inline-flex items-center justify-center overflow-hidden rounded-lg px-8 sm:px-16 py-4 font-medium transition-all duration-300 {$bgButton} {$text} cursor-pointer"]) }}
>
    <span class="absolute left-4 flex h-9 w-9 items-center justify-center rounded-full opacity-0 -translate-x-3 transition-all duration-300 ease-out group-hover:translate-x-6 group-hover:opacity-100 {{ $bgCircle }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </span>

    <span class="relative z-10 transition-transform duration-300 ease-out group-hover:translate-x-5">
        {{ $slot }}
    </span>
</{{ $tag }}>
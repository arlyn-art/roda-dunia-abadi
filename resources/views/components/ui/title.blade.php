@props([
    'lineColor' => 'primary', 
    'textColor' => 'text-white', 
    'tag'       => 'h3'          
])

@php
    $lineClass = match ($lineColor) {
        'white' => 'bg-white',
        default => 'bg-primary',
    };

    $sizeClasses = [
        'h1' => 'text-[clamp(1.75rem,2.5vw+1rem,3.75rem)]', 
        'h2' => 'text-[clamp(1.25rem,2vw+0.875rem,2.5rem)]',   
        'h3' => 'text-[clamp(0.75rem,1.5vw+0.75rem,1.5rem)]',
        'h4' => 'text-[clamp(0.5rem,1vw+0.55rem,1.25rem)]', 
    ];

    $tagSizeClass = $sizeClasses[$tag] ?? 'text-[clamp(1.25rem,2vw,2.5rem)]';

    $showLine = !in_array(strtolower($lineColor), ['none', 'transparent']);
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col space-y-1 items-start']) }}>
    @if ($showLine)
        <div class="w-16 h-1 {{ $lineClass }} mb-2"></div>
    @endif
    
    <{!! $tag !!} class="tracking-wide {{ $textColor }} {{ $tagSizeClass }}">
        {{ $slot }}
    </{!! $tag !!}>
</div>
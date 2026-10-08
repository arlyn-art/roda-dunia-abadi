@props([
    'lineColor' => 'primary', 
    'textColor' => 'text-white', 
    'tag'       => 'h3'          
])

@php
    $lineClass = $lineColor === 'white' ? 'bg-white' : 'bg-primary';

    $sizeClasses = [
        'h1' => 'text-lg sm:text-4xl md:text-5xl',
        'h2' => 'text-lg sm:text-xl md:text-3xl',
        'h3' => 'text-lg sm:text-xl md:text-2xl',
    ];

    $tagSizeClass = $sizeClasses[$tag] ?? 'md:text-5xl text-2xl';
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col space-y-1 items-start']) }}>
    <div class="w-16 h-1 {{ $lineClass }} mb-2"></div>
    
    <{!! $tag !!} class="font-bold tracking-wide {{ $textColor }} {{ $tagSizeClass }}">
        {{ $slot }}
    </{!! $tag !!}>
</div>
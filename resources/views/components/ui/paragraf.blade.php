@props([
    'textColor' => 'text-white', 
    'tag'       => 'p'          
])

@php
    $sizeClasses = [
        'p' => 'text-[clamp(0.55rem,0.5vw+0.65rem,0.95rem)]', 
        'span' => 'text-[clamp(0.75rem,0.5vw+0.65rem,0.1.15rem)]',
    ];

    $tagSizeClass = $sizeClasses[$tag] ?? 'text-[clamp(0.75rem,0.4vw+0.65rem,1rem)]';
@endphp

<{!! $tag !!} {{ $attributes->merge(['class' => "tracking-wide {$textColor} {$tagSizeClass}"]) }}>
    {{ $slot }}
</{!! $tag !!}>
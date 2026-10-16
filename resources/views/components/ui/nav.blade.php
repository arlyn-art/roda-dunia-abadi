@props([
    'tag'       => 'p'          
])

@php
    $sizeClasses = [
        'p' => '2xl:text-[0.95rem] xl:text-[0.85rem] lg:text-[0.7rem]', 
        'span' => 'text-[clamp(0.75rem,0.5vw+0.65rem,0.1.15rem)]',
    ];

    $tagSizeClass = $sizeClasses[$tag] ?? 'text-[clamp(0.75rem,0.4vw+0.65rem,1rem)]';
@endphp

<{!! $tag !!} {{ $attributes->merge(['class' => "{$tagSizeClass}"]) }}>
    {{ $slot }}
</{!! $tag !!}>
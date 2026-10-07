@props([
    'lineColor' => 'primary', 
    'textColor' => 'text-white', 
    'tag'       => 'h3'          
])

@php
    $lineClass = $lineColor === 'white' ? 'bg-white' : 'bg-primary';
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col space-y-1 items-start']) }}>
    <div class="w-10 h-1 {{ $lineClass }} mb-1"></div>
    
    <{!! $tag !!} class="text-xl font-bold tracking-wide {{ $textColor }}">
        {{ $slot }}
    </{!! $tag !!}>
</div>
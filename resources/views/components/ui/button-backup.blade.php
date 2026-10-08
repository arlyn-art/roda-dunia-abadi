@props([
    'variant' => 'red', 
    'href'    => '#',  
])

@php
    if ($variant === 'black') {
        // Ditambahkan /80 pada hover untuk efek transparan
        $bgButton = 'bg-black text-white hover:bg-black/80';
        $bgCircle = 'bg-primary text-white'; 
    } else {
        // Ditambahkan /80 pada hover untuk efek transparan
        $bgButton = 'bg-primary text-white hover:bg-primary/80';
        $bgCircle = 'bg-white text-primary'; 
    }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => "inline-flex items-center justify-between px-6 py-2 rounded-lg font-bold tracking-wider transition-all duration-300 group overflow-hidden shadow-md $bgButton relative"]) }}>
    
    <span class="text-xs sm:text-sm uppercase tracking-widest transition-opacity duration-300 ease-out group-hover:opacity-0 order-2 px-3">
        {{ $slot }}
    </span>

    <div class="w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 ease-out transform group-hover:translate-x-[calc(var(--btn-w,100px)-5rem)] {{ $bgCircle }} shadow-sm order-1"
         x-data 
         x-init="
            const updateWidth = () => {
                const btnWidth = $el.closest('a').offsetWidth;
                $el.style.setProperty('--btn-w', btnWidth + 'px');
            };
            updateWidth();
            window.addEventListener('resize', updateWidth);
         ">
        <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
        </svg>
    </div>

    <span class="absolute left-6 text-xs sm:text-sm uppercase tracking-widest opacity-0 transform -translate-x-3 transition-all duration-300 ease-out group-hover:opacity-100 group-hover:translate-x-0 pointer-events-none px-2">
        {{ $slot }}
    </span>

</a>
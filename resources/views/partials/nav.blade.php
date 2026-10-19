<div x-data="{ isScrolled: false, isOpen: false }" @scroll.window="isScrolled = (window.pageYOffset > 50)" class="relative">
    
    @php
        $navMenus = [
            ['label' => 'HOME', 'url' => '/', 'pattern' => '/'],
            ['label' => 'ABOUT US', 'url' => '/#about', 'pattern' => '*about*'],
            ['label' => 'SERVICES', 'url' => '/#services', 'pattern' => '*services*'],
            ['label' => 'PROJECTS', 'url' => '/projects', 'pattern' => 'projects*'],
            ['label' => 'PARTNERS', 'url' => '/partners', 'pattern' => 'partners*'],
            ['label' => 'NEWS', 'url' => '/news', 'pattern' => 'news*'],
            ['label' => 'CONTACT US', 'url' => '/contact', 'pattern' => 'contact*'],
        ];
    @endphp

    <header class="hidden md:block w-full bg-white border-b border-gray-100 px-6 xl:px-12 2xl:px-0">
        <div class="md:container w-full mx-auto pt-8 pb-12 flex justify-between items-center gap-4">
            <a href="/" class="flex items-center space-x-3">
                <div class="w-auto h-12 flex items-center justify-center">
                    <img src="/img/logo-red.png" alt="Logo" class="w-full h-full">
                </div>
                {{-- <div>
                    <span class="block font-black text-2xl tracking-wide text-gray-900">PT RODA DUNIA ABADI</span>
                    <span class="block text-sm font-semibold tracking-wider text-gray-600">SITEWORK CONTRACTOR</span>
                </div> --}}
            </a>

            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 flex items-center justify-center">
                    <img src="/img/phone.png" class="w-full h-auto" alt="Phone">
                </div>
                <div class="flex flex-col items-start">
                    <span class="block text-lg font-bold leading-5 text-black">ENQUIRY</span>
                    <span class="block text-lg font-bold text-primary">(021) 660 2327</span>
                </div>
            </div>
        </div>
    </header>

    <nav 
        :class="isScrolled ? 'w-full mx-auto fixed sm:top-0 top-0 left-0 right-0 shadow-2xl bg-white' : 'md:container w-full mx-auto md:absolute md:top-26 fixed top-0 left-0 right-0 shadow-md md:bg-secondary bg-white'" 
        class="z-50 transition-all duration-300 ease-in-out"
    >
        <div class="px-6 xl:px-12 2xl:px-0 flex items-center justify-between" :class="isScrolled ? 'md:container w-full mx-auto' : ''">
            
            <a 
                href="/"
                x-show="isScrolled || window.innerWidth < 768" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="flex items-center space-x-2 py-2 xl:w-1/4 w-auto"
            >
                <div class="w-auto h-10 md:h-12 flex items-center justify-center">
                    <img src="/img/logo-red.png" alt="Logo" class="w-full h-full">
                </div>
            </a>

            <div class="hidden md:flex font-bold tracking-wide w-full transition-all duration-300" :class="isScrolled ? 'container mx-auto lg:justify-end justify-start 2xl:text-lg xl:text-[0.85rem] lg:text-[0.75rem] md:text-[0.55rem] text-black' : 'justify-start xl:text-lg lg:text-[0.85rem] md:text-[0.55rem] text-white'">
                
                @foreach($navMenus as $menu)
                    @php
                        $isActive = request()->is($menu['pattern']);
                    @endphp
                    <a href="{{ $menu['url'] }}" class="relative sm:px-6 px-0 sm:py-4 py-0 transition group {{ $isActive ? 'font-black' : 'hover:bg-secondary-hover' }}">
                        <span class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-1 {{ $isActive ? 'bg-primary' : 'bg-transparent group-hover:bg-primary' }} transition-colors"></span>
                        <x-ui.nav tag="p">
                            {{ $menu['label'] }}
                        </x-ui.nav>
                    </a>
                @endforeach

            </div>

            <div class="flex items-center md:hidden py-3">
                <button @click="isOpen = !isOpen" class="text-black focus:outline-none p-2 rounded-lg hover:bg-secondary-hover">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div 
            x-show="isOpen" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="md:hidden bg-white/80 border-t border-gray-700 px-4 pt-2 pb-6 space-y-1 font-bold text-base"
            style="display: none;"
        >
            @foreach($navMenus as $menu)
                @php
                    $isActive = request()->is($menu['pattern']);
                @endphp
                <a href="{{ $menu['url'] }}" class="block px-4 py-3 rounded-lg {{ $isActive ? 'bg-gray-800 text-white border-l-4 border-primary' : 'text-black hover:bg-secondary-hover' }} transition">
                    {{ $menu['label'] }}
                </a>
            @endforeach
        </div>
    </nav>
</div>
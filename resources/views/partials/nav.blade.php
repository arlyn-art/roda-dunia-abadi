<div 
    x-data="{ 
        isScrolled: false, 
        isOpen: false,
        isHome: {{ request()->is('/') ? 'true' : 'false' }},
        activeSection: 'home',
        init() {
            // Watch perubahan isOpen untuk mengunci/membuka scroll body
            this.$watch('isOpen', value => {
                if (value) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });

            if (!this.isHome) {
                this.activeSection = '';
                return;
            }

            if (window.location.hash) {
                this.activeSection = window.location.hash.replace('#', '');
            }

            window.addEventListener('scroll', () => {
                if (!this.isHome) return;
                let scrollY = window.pageYOffset;

                if (scrollY < 300) {
                    this.activeSection = 'home';
                    return;
                }

                const aboutSec = document.getElementById('about');
                const servicesSec = document.getElementById('services');

                if (!aboutSec && !servicesSec) return;

                const aboutTop = aboutSec ? aboutSec.offsetTop - 150 : Infinity;
                const servicesTop = servicesSec ? servicesSec.offsetTop - 150 : Infinity;
                const servicesHeight = servicesSec ? servicesSec.offsetHeight : 0;

                if (servicesSec && scrollY >= (servicesTop + servicesHeight)) {
                    this.activeSection = 'home';
                    return;
                }

                if (servicesSec && scrollY >= servicesTop) {
                    this.activeSection = 'services';
                } else if (aboutSec && scrollY >= aboutTop) {
                    this.activeSection = 'about';
                } else {
                    this.activeSection = 'home';
                }
            });
        }
    }" 
    @scroll.window="isScrolled = (window.pageYOffset > 50)" 
    class="relative"
>
    
    @php
        $navMenus = [
            ['label' => 'HOME', 'url' => '/', 'id' => 'home', 'isRoute' => true],
            ['label' => 'ABOUT US', 'url' => '/#about', 'id' => 'about', 'isRoute' => false],
            ['label' => 'SERVICES', 'url' => '/#services', 'id' => 'services', 'isRoute' => false],
            ['label' => 'PROJECTS', 'url' => '/projects', 'id' => 'projects', 'isRoute' => true],
            ['label' => 'PARTNERS', 'url' => '/partners', 'id' => 'partners', 'isRoute' => true],
            ['label' => 'NEWS', 'url' => '/news', 'id' => 'news', 'isRoute' => true],
            ['label' => 'CONTACT US', 'url' => '/contact', 'id' => 'contact', 'isRoute' => true],
        ];
    @endphp

    <header class="hidden md:block w-full bg-white border-b border-gray-100 px-6 xl:px-12 2xl:px-0">
        <div class="md:container w-full mx-auto pt-8 pb-12 flex justify-between items-center gap-4">
            <a href="/" class="flex items-center space-x-3">
                <div class="w-auto h-12 flex items-center justify-center">
                    <img src="/img/logo-red.png" alt="Logo" class="w-full h-full">
                </div>
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
                class="flex items-center space-x-2 py-2 xl:w-1/4 w-auto"
            >
                <div class="w-auto h-10 xl:h-10 2xl:h-12 flex items-center justify-center">
                    <img src="/img/logo-red.png" alt="Logo" class="w-full h-full">
                </div>
            </a>

            <div class="hidden md:flex font-bold tracking-wide w-full transition-all duration-300" :class="isScrolled ? 'container mx-auto lg:justify-end justify-start 2xl:text-lg xl:text-[0.85rem] lg:text-[0.75rem] md:text-[0.55rem] text-black' : 'justify-start xl:text-lg lg:text-[0.85rem] md:text-[0.55rem] text-white'">
                
                @foreach($navMenus as $menu)
                    @php
                        $routeCheck = $menu['isRoute'] && request()->is(ltrim($menu['url'], '/'));
                    @endphp
                    
                    <a 
                        href="{{ $menu['url'] }}" 
                        @click="activeSection = '{{ $menu['id'] }}'"
                        class="relative sm:px-6 px-0 sm:py-4 py-0 transition group"
                        :class="( {{ $menu['isRoute'] ? ($routeCheck ? 'true' : 'false') : 'false' }} || activeSection === '{{ $menu['id'] }}' ) ? 'font-black' : 'hover:bg-secondary-hover'"
                    >
                        <span 
                            class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-1 transition-colors"
                            :class="( {{ $menu['isRoute'] ? ($routeCheck ? 'true' : 'false') : 'false' }} || activeSection === '{{ $menu['id'] }}' ) ? 'bg-primary' : 'bg-transparent group-hover:bg-primary'"
                        ></span>
                        <x-ui.nav tag="p">
                            {{ $menu['label'] }}
                        </x-ui.nav>
                    </a>
                @endforeach

            </div>

            <div class="flex items-center md:hidden py-3">
                <button @click="isOpen = !isOpen" class="text-black focus:outline-none p-2 rounded-lg hover:bg-secondary-hover cursor-pointer">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div 
            x-show="isOpen" 
            @click.outside="isOpen = false"
            class="md:hidden bg-white/95 backdrop-blur-md border-t border-gray-200 px-4 pt-2 pb-6 space-y-1 font-bold text-base shadow-xl"
            style="display: none;"
        >
            @foreach($navMenus as $menu)
                <a 
                    href="{{ $menu['url'] }}" 
                    @click="isOpen = false; activeSection = '{{ $menu['id'] }}'" 
                    class="block px-4 py-3 rounded-lg transition"
                    :class="activeSection === '{{ $menu['id'] }}' ? 'bg-gray-800 text-white border-l-4 border-primary' : 'text-black hover:bg-secondary-hover'"
                >
                    {{ $menu['label'] }}
                </a>
            @endforeach
        </div>
    </nav>
</div>
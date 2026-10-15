<div x-data="{ isScrolled: false, isOpen: false }" @scroll.window="isScrolled = (window.pageYOffset > 50)" class="relative">
    <header class="hidden md:block w-full bg-white border-b border-gray-100">
        <div class="md:container w-full mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-12 flex justify-between items-center gap-4">
            <a href="/" class="flex items-center space-x-3">
                <div class="w-16 h-16 flex items-center justify-center">
                    <img src="/img/logo-red.png" alt="Logo">
                </div>
                <div>
                    <span class="block font-black text-2xl tracking-wide text-gray-900">PT RODA DUNIA ABADI</span>
                    <span class="block text-sm font-semibold tracking-wider text-gray-600">SITEWORK CONTRACTOR</span>
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
        :class="isScrolled ? 'w-full mx-auto fixed sm:top-0 top-0 left-0 right-0 shadow-2xl bg-white' : 'md:container w-full mx-auto md:absolute md:top-28 fixed top-0 left-0 right-0 shadow-md md:bg-secondary bg-white'" 
        class="z-50 transition-all duration-300 ease-in-out"
    >
        <div class="px-4 sm:px-6 lg:px-8 flex items-center justify-between" :class="isScrolled ? 'md:container w-full mx-auto' : ''">
            
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
                <img src="/img/logo-red.png" class="w-12 h-12" alt="Logo Small">
                <div class="flex flex-col leading-tight">
                    <span class="font-bold text-black text-[0.85rem] md:text-[0.65rem] lg:text-xs xl:text-sm tracking-wider">PT RODA DUNIA ABADI</span>
                    <span class="block text-[0.65rem] md:text-[0.75rem] lg:text-xs xl:text-xs font-semibold text-black">SITEWORK CONTRACTOR</span>
                </div>
            </a>

            <div class="hidden md:flex font-bold tracking-wide w-full transition-all duration-300" :class="isScrolled ? 'container mx-auto lg:justify-end justify-start 2xl:text-lg xl:text-[1rem] lg:text-[0.75rem] md:text-[0.55rem] text-black' : 'justify-start xl:text-lg lg:text-[0.85rem] md:text-[0.55rem] text-white'">
                
                <!-- HOME -->
                <a href="/" class="relative sm:px-6 px-0 sm:py-4 py-0 transition group {{ request()->is('/') ? 'font-black' : 'hover:bg-secondary-hover' }}">
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-1 {{ request()->is('/') ? 'bg-primary' : 'bg-transparent group-hover:bg-primary' }} transition-colors"></span>
                    HOME
                </a>

                <!-- ABOUT US -->
                <a href="/#about" class="relative sm:px-6 px-0 sm:py-4 py-0 transition group {{ request()->is('*about*') ? 'font-black' : 'hover:bg-secondary-hover' }}">
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-1 {{ request()->is('*about*') ? 'bg-primary' : 'bg-transparent group-hover:bg-primary' }} transition-colors"></span>
                    ABOUT US
                </a>

                <!-- SERVICES -->
                <a href="/#services" class="relative sm:px-6 px-0 sm:py-4 py-0 transition group {{ request()->is('*services*') ? 'font-black' : 'hover:bg-secondary-hover' }}">
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-1 {{ request()->is('*services*') ? 'bg-primary' : 'bg-transparent group-hover:bg-primary' }} transition-colors"></span>
                    SERVICES
                </a>

                <!-- PROJECTS (Aktif di halaman projects & detail projects) -->
                <a href="/projects" class="relative sm:px-6 px-0 sm:py-4 py-0 transition group {{ request()->is('projects*') ? 'font-black' : 'hover:bg-secondary-hover' }}">
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-1 {{ request()->is('projects*') ? 'bg-primary' : 'bg-transparent group-hover:bg-primary' }} transition-colors"></span>
                    PROJECTS
                </a>

                <!-- PARTNERS -->
                <a href="/partners" class="relative sm:px-6 px-0 sm:py-4 py-0 transition group {{ request()->is('partners*') ? 'font-black' : 'hover:bg-secondary-hover' }}">
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-1 {{ request()->is('partners*') ? 'bg-primary' : 'bg-transparent group-hover:bg-primary' }} transition-colors"></span>
                    PARTNERS
                </a>

                <!-- NEWS -->
                <a href="/news" class="relative sm:px-6 px-0 sm:py-4 py-0 transition group {{ request()->is('news*') ? 'font-black' : 'hover:bg-secondary-hover' }}">
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-1 {{ request()->is('news*') ? 'bg-primary' : 'bg-transparent group-hover:bg-primary' }} transition-colors"></span>
                    NEWS
                </a>

                <!-- CONTACT US -->
                <a href="/contact" class="relative sm:px-6 px-0 sm:py-4 py-0 transition group {{ request()->is('contact*') ? 'font-black' : 'hover:bg-secondary-hover' }}">
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-1 {{ request()->is('contact*') ? 'bg-primary' : 'bg-transparent group-hover:bg-primary' }} transition-colors"></span>
                    CONTACT US
                </a>

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
            <a href="/" class="block px-4 py-3 rounded-lg {{ request()->is('/') ? 'bg-gray-800 text-white border-l-4 border-primary' : 'text-black hover:bg-secondary-hover' }} transition">HOME</a>
            <a href="/#about" class="block px-4 py-3 rounded-lg {{ request()->is('*about*') ? 'bg-gray-800 text-white border-l-4 border-primary' : 'text-black hover:bg-secondary-hover' }} transition">ABOUT US</a>
            <a href="/#services" class="block px-4 py-3 rounded-lg {{ request()->is('*services*') ? 'bg-gray-800 text-white border-l-4 border-primary' : 'text-black hover:bg-secondary-hover' }} transition">SERVICES</a>
            <a href="/projects" class="block px-4 py-3 rounded-lg {{ request()->is('projects*') ? 'bg-gray-800 text-white border-l-4 border-primary' : 'text-black hover:bg-secondary-hover' }} transition">PROJECTS</a>
            <a href="/partners" class="block px-4 py-3 rounded-lg {{ request()->is('partners*') ? 'bg-gray-800 text-white border-l-4 border-primary' : 'text-black hover:bg-secondary-hover' }} transition">PARTNERS</a>
            <a href="/news" class="block px-4 py-3 rounded-lg {{ request()->is('news*') ? 'bg-gray-800 text-white border-l-4 border-primary' : 'text-black hover:bg-secondary-hover' }} transition">NEWS</a>
            <a href="/contact" class="block px-4 py-3 rounded-lg {{ request()->is('contact*') ? 'bg-gray-800 text-white border-l-4 border-primary' : 'text-black hover:bg-secondary-hover' }} transition">CONTACT US</a>
        </div>
    </nav>
</div>
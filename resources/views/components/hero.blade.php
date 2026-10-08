<section class="relative w-full aspect-video max-h-[75vh] mx-auto md:mb-16 sm:mb-12 mb-6"
     x-data="{ 
        shown: false,
        count1: 0,
        count2: 0,
        count3: 0,
        runAnimation() {
            this.shown = true;
            this.count1 = 0;
            let int1 = setInterval(() => { if(this.count1 < 37) this.count1++; else clearInterval(int1); }, 60);
            
            this.count2 = 0;
            let int2 = setInterval(() => { if(this.count2 < 30) this.count2++; else clearInterval(int2); }, 60);
            
            this.count3 = 0;
            let int3 = setInterval(() => { if(this.count3 < 150) this.count3 += 3; else { this.count3 = 150; clearInterval(int3); } }, 60);
        },
        resetAnimation() {
            this.shown = false;
            this.count1 = 0;
            this.count2 = 0;
            this.count3 = 0;
        }
     }"
     x-init="
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    runAnimation();
                } else {
                    resetAnimation();
                }
            });
        }, { threshold: 0.3 });
        observer.observe($el);
     ">
    
    <div class="swiper hero-swiper w-full h-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide relative w-full h-full">
                <img src="/img/home/main-image.png" class="w-full h-full object-cover" alt="Main Hero Image">                
                <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                    <h1 class="text-white text-sm sm:text-4xl md:text-5xl font-extrabold tracking-wider uppercase drop-shadow-xl">
                        BUILDING THE GROUND FOR SUCCESS
                    </h1>
                </div>
            </div>
        </div>

        <div class="swiper-pagination"></div>
    </div>

    <div class="absolute bottom-[-4rem] sm:bottom-[-7rem] left-1/2 transform -translate-x-1/2 z-20 w-[90%] max-w-6xl bg-primary text-white rounded-tl-4xl rounded-br-4xl shadow-2xl py-4 px-4 sm:px-12 sm:py-12 transition-all duration-1000 ease-out"
         x-show="shown"
         x-transition:enter="transition ease-out duration-1000"
         x-transition:enter-start="opacity-0 translate-y-10"
         x-transition:enter-end="opacity-100 translate-y-0"
         style="display: none;"> 
        
        <div class="grid grid-cols-3 gap-6 justify-center items-center">
            
            <div class="flex items-center justify-center space-x-4 w-1/3 mx-auto">
                <div class="md:w-24 md:h-24 w-8 h-8 flex items-center justify-center shrink-0">
                    <img src="/img/home/icon-1.png" class="w-full h-auto object-contain" alt="Icon 1">
                </div>
                <div class="flex flex-col items-start">
                    <span class="text-sm sm:text-4xl font-extrabold" x-text="count1">0</span>
                    <span class="text-[0.5rem] sm:text-lg tracking-wider uppercase font-semibold text-white/90">YEARS OF EXCELLENCE</span>
                </div>
            </div>

            <div class="flex items-center justify-center space-x-4 w-1/3 mx-auto">
                <div class="md:w-16 md:h-16 w-8 h-8 flex items-center justify-center shrink-0">
                    <img src="/img/home/icon-2.png" class="w-full h-auto object-contain" alt="Icon 2">
                </div>
                <div class="flex flex-col items-start">
                    <span class="text-sm sm:text-4xl font-extrabold" x-text="'+' + count2">+0</span>
                    <span class="text-[0.5rem] sm:text-lg tracking-wider uppercase font-semibold text-white/90">TEAM OF EXPERTISE</span>
                </div>
            </div>

            <div class="flex items-center justify-center space-x-4 w-1/3 mx-auto">
                <div class="md:w-16 md:h-16 w-8 h-8 flex items-center justify-center shrink-0">
                    <img src="/img/home/icon-3.png" class="w-full h-auto object-contain" alt="Icon 3">
                </div>
                <div class="flex flex-col items-start">
                    <span class="text-sm sm:text-4xl font-extrabold" x-text="'+' + count3">+0</span>
                    <span class="text-[0.5rem] sm:text-lg tracking-wider uppercase font-semibold text-white/90">SITEWORK PROJECTS</span>
                </div>
            </div>

        </div>
    </div>
</section>
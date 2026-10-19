import Swiper from 'swiper/bundle';

document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.hero-swiper')) {
        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 7000, 
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            on: {
                init: function () {
                    playActiveSlideVideo(this);
                },
                slideChangeTransitionStart: function () {
                    playActiveSlideVideo(this);
                }
            }
        });

        function playActiveSlideVideo(swiperInstance) {
            document.querySelectorAll('.hero-video').forEach(video => {
                video.pause();
                video.currentTime = 0;
                video.onended = null;
            });

            const activeSlide = swiperInstance.slides[swiperInstance.activeIndex];
            
            if (activeSlide) {
                const activeVideo = activeSlide.querySelector('.hero-video');

                if (activeVideo) {
                    activeVideo.muted = true;
                    
                    const uniqueSlides = swiperInstance.el.querySelectorAll('.swiper-slide:not(.swiper-slide-duplicate)');
                    const totalRealSlides = uniqueSlides.length;

                    if (totalRealSlides <= 1) {
                        activeVideo.loop = true;
                    } else {
                        activeVideo.loop = false;
                        activeVideo.onended = function () {
                            if (swiperInstance.slides[swiperInstance.activeIndex] === activeSlide) {
                                swiperInstance.slideNext(); 
                            }
                        };
                    }

                    activeVideo.play().catch(error => {
                        console.log("Autoplay ditolak browser:", error);
                        swiperInstance.autoplay.start();
                    });
                } else {
                    swiperInstance.autoplay.start();
                }
            }
        }
    }

    if (document.querySelector('.project-swiper')) {
        new Swiper('.project-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: false,
            navigation: {
                nextEl: '.project-swiper-next',
                prevEl: '.project-swiper-prev',
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    }

    if (document.querySelector('.trusted-swiper')) {
        new Swiper('.trusted-swiper', {
            slidesPerView: 2,
            spaceBetween: 24,
            loop: true,
            navigation: {
                nextEl: '.trusted-swiper-next',
                prevEl: '.trusted-swiper-prev',
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
                1280: { slidesPerView: 5 },
            },
        });
    }

    if (document.querySelector('.partners-swiper')) {
        new Swiper('.partners-swiper', {
            slidesPerView: 2,
            spaceBetween: 24,
            loop: true,
            navigation: {
                nextEl: '.partners-swiper-next',
                prevEl: '.partners-swiper-prev',
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
                1280: { slidesPerView: 5 },
            },
        });
    }

    if (document.querySelector('.featured-swiper')) {
        new Swiper('.featured-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next-custom',
                prevEl: '.swiper-button-prev-custom',
            },
            observer: true, 
            observeParents: true,
        });
    }

    if (document.querySelector('.news-swiper')) {
        new Swiper('.news-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: false,
            navigation: {
                nextEl: '.news-swiper-next',
                prevEl: '.news-swiper-prev',
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            },
        });
    }
});
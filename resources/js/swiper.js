import Swiper from 'swiper/bundle';

document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.hero-swiper')) {
        new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
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
        });
    }

    if (document.querySelector('.project-swiper')) {
        new Swiper('.project-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
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
            slidesPerView: 1,
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
            slidesPerView: 1,
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
});
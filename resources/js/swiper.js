document.addEventListener('DOMContentLoaded', function () {
    // 1. Swiper untuk Hero Section (yang sudah ada sebelumnya)
    const heroSwiper = new Swiper('.hero-swiper', {
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
});

// 2. Fungsi Project Slider untuk Alpine.js (ditaruh di bawahnya)
document.addEventListener('alpine:init', () => {
    Alpine.data('projectSlider', () => ({
        images: [
            '/img/services/services-1.png',
            '/img/services/services-2.png',
            '/img/services/services-3.png',
            '/img/services/services-1.png' // Sesuaikan path galeri data ke-2
        ],
        init() {
            new Swiper(this.$el.querySelector('.project-swiper'), {
                slidesPerView: 1,
                spaceBetween: 30,
                // Non-autoslide, manual via tombol
                navigation: {
                    nextEl: this.$el.querySelector('.swiper-button-next-custom'),
                    prevEl: this.$el.querySelector('.swiper-button-prev-custom'),
                },
            });
        }
    }));
});
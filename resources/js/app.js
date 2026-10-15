import './bootstrap';
import './swiper';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import Alpine from 'alpinejs';

window.Swiper = Swiper;

if (!document.body.hasAttribute('data-disable-app-alpine')) {
    window.Alpine = Alpine;
    Alpine.start();
}
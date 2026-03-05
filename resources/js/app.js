import './bootstrap';
import 'bootstrap';
import '../css/app.css';

document.addEventListener("DOMContentLoaded", () => {
    const hero = document.querySelector('.hero-anime');
    if (hero) {
        hero.style.opacity = 0;
        hero.style.transition = "opacity 1.5s ease-in-out";
        setTimeout(() => hero.style.opacity = 1, 200);
    }
});
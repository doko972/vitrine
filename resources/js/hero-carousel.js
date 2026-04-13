/**
 * Hero Carousel — défilement automatique droite → gauche
 */
document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('heroCarousel');
    if (!carousel) return;

    const slides = Array.from(carousel.querySelectorAll('.hero-slide'));
    const dots   = Array.from(carousel.querySelectorAll('.carousel-dot'));
    if (slides.length < 2) return;

    let current  = 0;
    let timer    = null;
    const DELAY  = 5000; // 5s entre chaque slide

    const goTo = (next) => {
        if (next === current) return;

        slides[current].classList.add('is-leaving');
        slides[current].classList.remove('is-active');
        dots[current]?.classList.remove('is-active');

        slides[next].classList.add('is-active');
        dots[next]?.classList.add('is-active');

        const leaving = slides[current];
        leaving.addEventListener('transitionend', () => {
            leaving.classList.remove('is-leaving');
            leaving.style.transform = ''; // reset pour le prochain cycle
        }, { once: true });

        current = next;
    };

    const next = () => goTo((current + 1) % slides.length);

    const start = () => { timer = setInterval(next, DELAY); };
    const stop  = () => { clearInterval(timer); };

    // Dots cliquables
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            stop();
            goTo(i);
            start();
        });
    });

    // Pause au survol
    carousel.addEventListener('mouseenter', stop);
    carousel.addEventListener('mouseleave', start);

    start();
});

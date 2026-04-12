/**
 * Navigation : Menu burger + sticky header + scroll animations
 */
document.addEventListener('DOMContentLoaded', () => {
    // ─── Burger menu mobile ───────────────────────────────────────────────────
    const burger   = document.getElementById('navBurger');
    const mobileNav = document.getElementById('mobileNav');

    if (burger && mobileNav) {
        burger.addEventListener('click', () => {
            const isOpen = burger.classList.toggle('is-open');
            mobileNav.classList.toggle('is-open', isOpen);
            burger.setAttribute('aria-expanded', String(isOpen));
        });

        // Fermer en cliquant en dehors
        document.addEventListener('click', (e) => {
            if (!burger.contains(e.target) && !mobileNav.contains(e.target)) {
                burger.classList.remove('is-open');
                mobileNav.classList.remove('is-open');
                burger.setAttribute('aria-expanded', 'false');
            }
        });

        // Fermer sur les liens mobiles
        mobileNav.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                burger.classList.remove('is-open');
                mobileNav.classList.remove('is-open');
                burger.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // ─── Header sticky avec ombre ─────────────────────────────────────────────
    const header = document.getElementById('siteHeader');
    if (header) {
        const onScroll = () => {
            header.classList.toggle('scrolled', window.scrollY > 20);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    // ─── Animations au scroll (Intersection Observer) ─────────────────────────
    const animatedEls = document.querySelectorAll('.card, .team-card, .gallery-item, .about-grid');

    if (animatedEls.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -50px 0px' });

        animatedEls.forEach((el, i) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = `opacity 0.5s ease ${i * 0.07}s, transform 0.5s ease ${i * 0.07}s`;
            observer.observe(el);
        });
    }

    // ─── Navigation active selon ancre ───────────────────────────────────────
    const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');
    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });
});

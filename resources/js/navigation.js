/**
 * Navigation : Menu burger + sticky header + scroll animations
 */
document.addEventListener('DOMContentLoaded', () => {
    // ─── Burger menu mobile ───────────────────────────────────────────────────
    const burger   = document.getElementById('navBurger');
    const mobileNav = document.getElementById('mobileNav');

    const backdrop = document.getElementById('mobileNavBackdrop');
    const closeBtn = document.getElementById('mobileNavClose');

    const openMenu = () => {
        burger.classList.add('is-open');
        mobileNav.classList.add('is-open');
        backdrop && backdrop.classList.add('is-open');
        burger.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    };

    const closeMenu = () => {
        burger.classList.remove('is-open');
        mobileNav.classList.remove('is-open');
        backdrop && backdrop.classList.remove('is-open');
        burger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    };

    if (burger && mobileNav) {
        burger.addEventListener('click', () => {
            burger.classList.contains('is-open') ? closeMenu() : openMenu();
        });

        // Fermer via le bouton ✕ dans le panneau
        closeBtn && closeBtn.addEventListener('click', closeMenu);

        // Fermer en cliquant sur le backdrop
        backdrop && backdrop.addEventListener('click', closeMenu);

        // Fermer sur Échap
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileNav.classList.contains('is-open')) {
                closeMenu();
            }
        });

        // Fermer sur les liens mobiles
        mobileNav.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', closeMenu);
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

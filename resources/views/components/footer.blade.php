<footer class="site-footer">
    <div class="container footer-grid">
        {{-- Logo & tagline --}}
        <div class="footer-brand">
            @if(setting('logo_footer'))
                <img src="{{ Storage::url(setting('logo_footer')) }}" alt="{{ setting('site_name') }}" class="footer-logo-img">
            @else
                <span class="footer-logo-text">{{ setting('site_name', 'Vitrine') }}</span>
            @endif
            <p class="footer-tagline">{{ setting('footer_tagline', '') }}</p>
        </div>

        {{-- Navigation --}}
        <div class="footer-nav">
            <h3 class="footer-nav-title">Navigation</h3>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('entreprise.index') }}">Entreprise</a></li>
                <li><a href="{{ route('entreprise.contact') }}">Contact</a></li>
            </ul>
        </div>

        {{-- Coordonnées --}}
        <div class="footer-contact">
            <h3 class="footer-nav-title">Nous contacter</h3>
            @if(setting('contact_phone'))
                <p class="footer-contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13 19.79 19.79 0 0 1 1.61 4.38 2 2 0 0 1 3.58 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    {{ setting('contact_phone') }}
                </p>
            @endif
            @if(setting('contact_email'))
                <p class="footer-contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    {{ setting('contact_email') }}
                </p>
            @endif
            @if(setting('contact_address'))
                <p class="footer-contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    {{ setting('contact_address') }}
                </p>
            @endif
        </div>

        {{-- Réseaux sociaux --}}
        <div class="footer-social">
            <h3 class="footer-nav-title">Suivez-nous</h3>
            <div class="social-links">
                @if(setting('social_facebook'))
                    <a href="{{ setting('social_facebook') }}" target="_blank" rel="noopener" class="social-link" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                @endif
                @if(setting('social_instagram'))
                    <a href="{{ setting('social_instagram') }}" target="_blank" rel="noopener" class="social-link" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                @endif
                @if(setting('social_linkedin'))
                    <a href="{{ setting('social_linkedin') }}" target="_blank" rel="noopener" class="social-link" aria-label="LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                @endif
                @if(setting('social_twitter'))
                    <a href="{{ setting('social_twitter') }}" target="_blank" rel="noopener" class="social-link" aria-label="Twitter / X">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                @endif
                @if(setting('social_youtube'))
                    <a href="{{ setting('social_youtube') }}" target="_blank" rel="noopener" class="social-link" aria-label="YouTube">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.95C18.88 4 12 4 12 4s-6.88 0-8.59.47a2.78 2.78 0 0 0-1.95 1.95A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.53C5.12 20 12 20 12 20s6.88 0 8.59-.47a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="white"/></svg>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p>{{ setting('footer_copyright', '© ' . date('Y') . ' ' . setting('site_name', 'Vitrine') . '. Tous droits réservés.') }}</p>
        </div>
    </div>
</footer>

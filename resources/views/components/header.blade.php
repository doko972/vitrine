<header class="site-header" id="siteHeader">
    <div class="container header-inner">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="header-logo" aria-label="{{ setting('site_name', 'Accueil') }}">
            @if(setting('logo_header'))
                <img src="{{ Storage::url(setting('logo_header')) }}" alt="{{ setting('site_name', 'Logo') }}" class="logo-img">
            @else
                <span class="logo-text">{{ setting('site_name', 'Vitrine') }}</span>
            @endif
        </a>

        {{-- Navigation desktop --}}
        <nav class="main-nav" role="navigation" aria-label="Navigation principale">
            <ul class="nav-list">
                <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
                <li><a href="{{ route('entreprise.index') }}" class="nav-link {{ request()->routeIs('entreprise.index') ? 'active' : '' }}">Entreprise</a></li>
                <li><a href="{{ route('entreprise.contact') }}" class="nav-link {{ request()->routeIs('entreprise.contact') ? 'active' : '' }}">Contact</a></li>
                @auth
                    <li><a href="{{ route('dashboard.index') }}" class="nav-link nav-link--dashboard">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="nav-link">Connexion</a></li>
                @endauth
            </ul>
        </nav>

        {{-- Burger button --}}
        <button class="burger" id="navBurger" aria-label="Menu" aria-expanded="false" aria-controls="mobileNav">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
        </button>
    </div>

    {{-- Mobile nav --}}
    <nav class="mobile-nav" id="mobileNav" aria-label="Navigation mobile">
        <ul class="mobile-nav-list">
            <li><a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
            <li><a href="{{ route('entreprise.index') }}" class="mobile-nav-link {{ request()->routeIs('entreprise.index') ? 'active' : '' }}">Entreprise</a></li>
            <li><a href="{{ route('entreprise.contact') }}" class="mobile-nav-link {{ request()->routeIs('entreprise.contact') ? 'active' : '' }}">Contact</a></li>
            @auth
                <li><a href="{{ route('dashboard.index') }}" class="mobile-nav-link">Dashboard</a></li>
            @else
                <li><a href="{{ route('login') }}" class="mobile-nav-link">Connexion</a></li>
            @endauth
        </ul>
    </nav>
</header>

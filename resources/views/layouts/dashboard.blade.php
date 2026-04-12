<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard — {{ setting('site_name', 'Vitrine') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="dashboard-body">

<div class="dashboard-wrapper">
    {{-- Sidebar --}}
    <aside class="dashboard-sidebar" id="dashSidebar">
        <div class="sidebar-logo">
            @if(setting('logo_header'))
                <img src="{{ Storage::url(setting('logo_header')) }}" alt="{{ setting('site_name') }}" class="sidebar-logo-img">
            @else
                <span class="sidebar-logo-text">{{ setting('site_name', 'Vitrine') }}</span>
            @endif
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('dashboard.index') }}" class="sidebar-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                Tableau de bord
            </a>

            <div class="sidebar-section-title">Identité</div>
            <a href="{{ route('dashboard.settings.identity') }}" class="sidebar-link {{ request()->routeIs('dashboard.settings.identity') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 1 0-16 0"/></svg>
                Logo & Identité
            </a>
            <a href="{{ route('dashboard.settings.colors') }}" class="sidebar-link {{ request()->routeIs('dashboard.settings.colors') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 1 10 10"/></svg>
                Couleurs & Typographies
            </a>

            <div class="sidebar-section-title">Contenu</div>
            <a href="{{ route('dashboard.settings.content') }}" class="sidebar-link {{ request()->routeIs('dashboard.settings.content') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                Textes & Sections
            </a>
            <a href="{{ route('dashboard.media.index') }}" class="sidebar-link {{ request()->routeIs('dashboard.media.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                Images & Médias
            </a>

            <div class="sidebar-section-title">Configuration</div>
            <a href="{{ route('dashboard.settings.contact') }}" class="sidebar-link {{ request()->routeIs('dashboard.settings.contact') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                Infos Contact
            </a>
            <a href="{{ route('dashboard.settings.social') }}" class="sidebar-link {{ request()->routeIs('dashboard.settings.social') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                Réseaux Sociaux
            </a>

            <div class="sidebar-section-title">Messagerie</div>
            <a href="{{ route('dashboard.messages.index') }}" class="sidebar-link {{ request()->routeIs('dashboard.messages.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Messages
                @php $unread = \App\Models\ContactMessage::where('read', false)->count(); @endphp
                @if($unread > 0)
                    <span class="badge-count">{{ $unread }}</span>
                @endif
            </a>

            <div class="sidebar-section-title">Compte</div>
            <a href="{{ route('dashboard.profile.edit') }}" class="sidebar-link {{ request()->routeIs('dashboard.profile.*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                Mon Profil
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Voir le site
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link sidebar-logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <div class="dashboard-main">
        <header class="dashboard-topbar">
            <button class="burger-toggle" id="dashBurger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
            <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
            <div class="topbar-user">
                <span>{{ Auth::user()->name }}</span>
            </div>
        </header>

        <div class="dashboard-content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

@stack('scripts')
</body>
</html>

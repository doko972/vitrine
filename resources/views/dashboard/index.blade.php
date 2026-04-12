@extends('layouts.dashboard')

@section('page-title', 'Tableau de bord')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-value">{{ $stats['messages_total'] }}</div>
        <div class="stat-label">Messages reçus</div>
    </div>
    <div class="stat-card stat-card--warning">
        <div class="stat-value">{{ $stats['messages_unread'] }}</div>
        <div class="stat-label">Messages non lus</div>
    </div>
    <div class="stat-card stat-card--success">
        <div class="stat-value">{{ $stats['settings_count'] }}</div>
        <div class="stat-label">Paramètres configurés</div>
    </div>
</div>

<h2 class="dashboard-section-title" style="margin-top:0">Actions rapides</h2>
<div class="quick-actions">
    <a href="{{ route('dashboard.settings.identity') }}" class="quick-action-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 1 0-16 0"/></svg>
        <p>Identité</p>
    </a>
    <a href="{{ route('dashboard.settings.colors') }}" class="quick-action-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 1 10 10"/></svg>
        <p>Couleurs</p>
    </a>
    <a href="{{ route('dashboard.settings.content') }}" class="quick-action-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        <p>Contenu</p>
    </a>
    <a href="{{ route('dashboard.media.index') }}" class="quick-action-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        <p>Médias</p>
    </a>
    <a href="{{ route('dashboard.settings.social') }}" class="quick-action-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
        <p>Réseaux</p>
    </a>
    <a href="{{ route('dashboard.messages.index') }}" class="quick-action-card">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        <p>Messages</p>
    </a>
</div>
@endsection

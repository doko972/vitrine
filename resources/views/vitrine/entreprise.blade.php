@extends('layouts.app')

@section('title', 'Notre Entreprise')
@section('description', setting('about_text', ''))

@section('content')

{{-- ═══ PAGE HERO ═══ --}}
<section class="page-hero">
    <div class="container">
        <h1 class="page-hero-title">{{ setting('about_title', 'Notre Entreprise') }}</h1>
        <nav class="breadcrumb" aria-label="Fil d'Ariane">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/</span>
            <span>Entreprise</span>
        </nav>
    </div>
</section>

{{-- ═══ À PROPOS ═══ --}}
<section class="section section-about-full">
    <div class="container about-grid">
        <div class="about-text">
            <h2 class="section-title">{{ setting('about_title', 'À Propos de Nous') }}</h2>
            <p class="about-paragraph">{{ setting('about_text', '') }}</p>
        </div>
        <div class="about-image">
            @if(setting('about_image'))
                <img src="{{ Storage::url(setting('about_image')) }}" alt="À propos" loading="lazy">
            @else
                <div class="about-image-placeholder"></div>
            @endif
        </div>
    </div>
</section>

{{-- ═══ VALEURS ═══ --}}
@if(setting('values_visible', '1') == '1')
<section class="section section--alt" id="valeurs">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">{{ setting('values_title', 'Nos Valeurs') }}</h2>
        </div>
        <div class="cards-grid cards-grid--3">
            @foreach(setting_json('values_cards') as $card)
                <div class="card card-value">
                    <h3 class="card-title">{{ $card['title'] ?? '' }}</h3>
                    <p class="card-text">{{ $card['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══ ÉQUIPE ═══ --}}
@if(setting('team_visible', '1') == '1')
<section class="section" id="equipe">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">{{ setting('team_title', 'Notre Équipe') }}</h2>
        </div>
        <div class="team-grid">
            @foreach(setting_json('team_members') as $member)
                <div class="team-card">
                    <div class="team-card-photo">
                        @if(!empty($member['image']))
                            <img src="{{ Storage::url($member['image']) }}" alt="{{ $member['name'] ?? '' }}" loading="lazy">
                        @else
                            <div class="team-card-photo-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 1 0-16 0"/></svg>
                            </div>
                        @endif
                    </div>
                    <h3 class="team-card-name">{{ $member['name'] ?? '' }}</h3>
                    <p class="team-card-role">{{ $member['role'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══ GALERIE ═══ --}}
@if(setting('gallery_visible', '1') == '1')
    @php $galleryImages = setting_json('gallery_images'); @endphp
    @if(count($galleryImages) > 0)
    <section class="section section--alt" id="galerie">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">{{ setting('gallery_title', 'Notre Galerie') }}</h2>
            </div>
            <div class="gallery-grid">
                @foreach($galleryImages as $img)
                    <div class="gallery-item">
                        <img src="{{ Storage::url($img) }}" alt="Galerie" loading="lazy">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endif

{{-- ═══ CTA ═══ --}}
@if(setting('cta_visible', '1') == '1')
<section class="section section-cta">
    <div class="container text-center">
        <h2 class="cta-title">{{ setting('cta_title', 'Prêt à démarrer ?') }}</h2>
        <p class="cta-text">{{ setting('cta_text', '') }}</p>
        <a href="{{ route('entreprise.contact') }}" class="btn btn-accent btn-lg">
            {{ setting('cta_button_text', 'Nous contacter') }}
        </a>
    </div>
</section>
@endif

@endsection

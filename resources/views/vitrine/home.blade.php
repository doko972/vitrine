@extends('layouts.app')

@section('title', 'Accueil')
@section('description', setting('hero_subtitle', ''))

@section('content')

{{-- ═══ HERO ═══ --}}
@if(setting('hero_visible', '1') == '1')
<section class="hero" id="hero"
    @if(setting('hero_bg_image'))
        style="background-image: url('{{ Storage::url(setting('hero_bg_image')) }}')"
    @endif
>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h1 class="hero-title animate-fadeup">{{ setting('hero_title', 'Bienvenue') }}</h1>
        <p class="hero-subtitle animate-fadeup delay-1">{{ setting('hero_subtitle', '') }}</p>
        @if(setting('hero_cta_text'))
            <a href="{{ setting('hero_cta_url', '/entreprise') }}" class="btn btn-primary animate-fadeup delay-2">
                {{ setting('hero_cta_text') }}
            </a>
        @endif
    </div>
    <div class="hero-scroll-indicator">
        <span></span>
    </div>
</section>
@endif

{{-- ═══ SERVICES ═══ --}}
@if(setting('services_visible', '1') == '1')
<section class="section section-services" id="services">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">{{ setting('services_title', 'Nos Services') }}</h2>
            @if(setting('services_subtitle'))
                <p class="section-subtitle">{{ setting('services_subtitle') }}</p>
            @endif
        </div>
        <div class="cards-grid">
            @foreach(setting_json('services_cards') as $card)
                <div class="card card-service">
                    @if(!empty($card['icon']))
                        <div class="card-icon">{{ $card['icon'] }}</div>
                    @endif
                    <h3 class="card-title">{{ $card['title'] ?? '' }}</h3>
                    <p class="card-text">{{ $card['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══ À PROPOS ═══ --}}
@if(setting('about_visible', '1') == '1')
<section class="section section-about section--alt" id="about">
    <div class="container about-grid">
        <div class="about-text">
            <h2 class="section-title">{{ setting('about_title', 'À Propos') }}</h2>
            <p class="about-paragraph">{{ setting('about_text', '') }}</p>
            <a href="{{ route('entreprise.index') }}" class="btn btn-outline">En savoir plus</a>
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

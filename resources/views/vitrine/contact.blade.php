@extends('layouts.app')

@section('title', setting('contact_title', 'Contact'))
@section('description', setting('contact_subtitle', ''))

@section('content')

{{-- ═══ PAGE HERO ═══ --}}
<section class="page-hero">
    <div class="container">
        <h1 class="page-hero-title">{{ setting('contact_title', 'Contactez-nous') }}</h1>
        <nav class="breadcrumb" aria-label="Fil d'Ariane">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/</span>
            <a href="{{ route('entreprise.index') }}">Entreprise</a>
            <span>/</span>
            <span>Contact</span>
        </nav>
    </div>
</section>

<section class="section section-contact">
    <div class="container contact-layout">

        {{-- Formulaire --}}
        <div class="contact-form-wrapper">
            <h2 class="contact-form-title">{{ setting('contact_subtitle', 'Envoyez-nous un message') }}</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('entreprise.contact.send') }}" class="contact-form" novalidate>
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Nom complet <span class="required">*</span></label>
                    <input type="text" id="name" name="name" class="form-input @error('name') is-error @enderror"
                           value="{{ old('name') }}" placeholder="Votre nom" required>
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email" class="form-label">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" class="form-input @error('email') is-error @enderror"
                               value="{{ old('email') }}" placeholder="votre@email.fr" required>
                        @error('email')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="tel" id="phone" name="phone" class="form-input @error('phone') is-error @enderror"
                               value="{{ old('phone') }}" placeholder="+33 6 00 00 00 00">
                        @error('phone')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label">Sujet</label>
                    <input type="text" id="subject" name="subject" class="form-input @error('subject') is-error @enderror"
                           value="{{ old('subject') }}" placeholder="Objet de votre message">
                    @error('subject')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Message <span class="required">*</span></label>
                    <textarea id="message" name="message" rows="6" class="form-input form-textarea @error('message') is-error @enderror"
                              placeholder="Votre message..." required>{{ old('message') }}</textarea>
                    @error('message')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Envoyer le message
                </button>
            </form>
        </div>

        {{-- Coordonnées --}}
        <div class="contact-info">
            <h2 class="contact-info-title">Nos coordonnées</h2>

            @if(setting('contact_phone'))
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13 19.79 19.79 0 0 1 1.61 4.38 2 2 0 0 1 3.58 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <div>
                        <p class="contact-info-label">Téléphone</p>
                        <a href="tel:{{ setting('contact_phone') }}" class="contact-info-value">{{ setting('contact_phone') }}</a>
                    </div>
                </div>
            @endif

            @if(setting('contact_email'))
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <p class="contact-info-label">Email</p>
                        <a href="mailto:{{ setting('contact_email') }}" class="contact-info-value">{{ setting('contact_email') }}</a>
                    </div>
                </div>
            @endif

            @if(setting('contact_address'))
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <p class="contact-info-label">Adresse</p>
                        <p class="contact-info-value">{{ setting('contact_address') }}</p>
                    </div>
                </div>
            @endif

            {{-- Réseaux sociaux --}}
            @php
                $socials = array_filter([
                    'facebook'  => setting('social_facebook'),
                    'instagram' => setting('social_instagram'),
                    'linkedin'  => setting('social_linkedin'),
                    'twitter'   => setting('social_twitter'),
                    'youtube'   => setting('social_youtube'),
                ]);
            @endphp
            @if(count($socials) > 0)
                <div class="contact-social">
                    <p class="contact-info-label">Suivez-nous</p>
                    <div class="social-links">
                        @foreach($socials as $network => $url)
                            <a href="{{ $url }}" target="_blank" rel="noopener" class="social-link" aria-label="{{ ucfirst($network) }}">
                                {{ ucfirst($network) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection

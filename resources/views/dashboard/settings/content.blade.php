@extends('layouts.dashboard')
@section('page-title', 'Textes & Sections')

@section('content')
<form method="POST" action="{{ route('dashboard.settings.content.update') }}" enctype="multipart/form-data" class="dashboard-form" style="max-width:900px">
    @csrf

    <h2 class="dashboard-form-title">Textes & Sections</h2>

    {{-- ─── Section Hero ─── --}}
    <h3 class="dashboard-section-title">
        Section Hero
        <label style="float:right;font-size:.85rem;font-weight:500;cursor:pointer">
            <input type="hidden" name="hero_visible" value="0">
            <input type="checkbox" name="hero_visible" value="1" {{ ($settings['hero_visible']->value ?? '1') == '1' ? 'checked' : '' }}> Visible
        </label>
    </h3>
    <div class="form-group">
        <label class="form-label">Titre H1</label>
        <input type="text" name="hero_title" class="form-input" value="{{ $settings['hero_title']->value ?? '' }}">
    </div>
    <div class="form-group">
        <label class="form-label">Sous-titre</label>
        <textarea name="hero_subtitle" class="form-input form-textarea" rows="2">{{ $settings['hero_subtitle']->value ?? '' }}</textarea>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label class="form-label">Texte du bouton CTA</label>
            <input type="text" name="hero_cta_text" class="form-input" value="{{ $settings['hero_cta_text']->value ?? '' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Lien du bouton CTA</label>
            <input type="text" name="hero_cta_url" class="form-input" value="{{ $settings['hero_cta_url']->value ?? '/entreprise' }}">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Image de fond</label>
        <input type="file" name="hero_bg_image" class="form-input" accept="image/*" data-preview="prev_hero_bg">
        @if(setting('hero_bg_image'))
            <div class="image-preview">
                <img id="prev_hero_bg" src="{{ Storage::url(setting('hero_bg_image')) }}" alt="Hero bg">
            </div>
        @else
            <img id="prev_hero_bg" style="display:none;height:80px;margin-top:8px;border-radius:8px;object-fit:cover;">
        @endif
    </div>

    {{-- ─── Section Services ─── --}}
    <h3 class="dashboard-section-title">
        Section Services
        <label style="float:right;font-size:.85rem;font-weight:500;cursor:pointer">
            <input type="hidden" name="services_visible" value="0">
            <input type="checkbox" name="services_visible" value="1" {{ ($settings['services_visible']->value ?? '1') == '1' ? 'checked' : '' }}> Visible
        </label>
    </h3>
    <div class="form-row">
        <div class="form-group">
            <label class="form-label">Titre H2</label>
            <input type="text" name="services_title" class="form-input" value="{{ $settings['services_title']->value ?? '' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Sous-titre</label>
            <input type="text" name="services_subtitle" class="form-input" value="{{ $settings['services_subtitle']->value ?? '' }}">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Cartes services (JSON)</label>
        <textarea name="services_cards" class="form-input form-textarea" rows="5">{{ $settings['services_cards']->value ?? '[]' }}</textarea>
        <p style="font-size:.8rem;color:#6b7280;margin-top:.25rem">Format : <code>[{"title":"…","description":"…","icon":"⚡"}]</code></p>
    </div>

    {{-- ─── Section À propos ─── --}}
    <h3 class="dashboard-section-title">
        Section À propos
        <label style="float:right;font-size:.85rem;font-weight:500;cursor:pointer">
            <input type="hidden" name="about_visible" value="0">
            <input type="checkbox" name="about_visible" value="1" {{ ($settings['about_visible']->value ?? '1') == '1' ? 'checked' : '' }}> Visible
        </label>
    </h3>
    <div class="form-group">
        <label class="form-label">Titre H2</label>
        <input type="text" name="about_title" class="form-input" value="{{ $settings['about_title']->value ?? '' }}">
    </div>
    <div class="form-group">
        <label class="form-label">Texte</label>
        <textarea name="about_text" class="form-input form-textarea" rows="4">{{ $settings['about_text']->value ?? '' }}</textarea>
    </div>
    <div class="form-group">
        <label class="form-label">Image</label>
        <input type="file" name="about_image" class="form-input" accept="image/*" data-preview="prev_about_img">
        @if(setting('about_image'))
            <div class="image-preview">
                <img id="prev_about_img" src="{{ Storage::url(setting('about_image')) }}" alt="À propos">
            </div>
        @else
            <img id="prev_about_img" style="display:none;height:80px;margin-top:8px;border-radius:8px;object-fit:cover;">
        @endif
    </div>

    {{-- ─── Section Valeurs ─── --}}
    <h3 class="dashboard-section-title">
        Section Valeurs
        <label style="float:right;font-size:.85rem;font-weight:500;cursor:pointer">
            <input type="hidden" name="values_visible" value="0">
            <input type="checkbox" name="values_visible" value="1" {{ ($settings['values_visible']->value ?? '1') == '1' ? 'checked' : '' }}> Visible
        </label>
    </h3>
    <div class="form-group">
        <label class="form-label">Titre H2</label>
        <input type="text" name="values_title" class="form-input" value="{{ $settings['values_title']->value ?? '' }}">
    </div>
    <div class="form-group">
        <label class="form-label">Cartes valeurs (JSON)</label>
        <textarea name="values_cards" class="form-input form-textarea" rows="4">{{ $settings['values_cards']->value ?? '[]' }}</textarea>
    </div>

    {{-- ─── Section CTA ─── --}}
    <h3 class="dashboard-section-title">
        Section CTA
        <label style="float:right;font-size:.85rem;font-weight:500;cursor:pointer">
            <input type="hidden" name="cta_visible" value="0">
            <input type="checkbox" name="cta_visible" value="1" {{ ($settings['cta_visible']->value ?? '1') == '1' ? 'checked' : '' }}> Visible
        </label>
    </h3>
    <div class="form-row">
        <div class="form-group">
            <label class="form-label">Titre H2</label>
            <input type="text" name="cta_title" class="form-input" value="{{ $settings['cta_title']->value ?? '' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Texte du bouton</label>
            <input type="text" name="cta_button_text" class="form-input" value="{{ $settings['cta_button_text']->value ?? '' }}">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Texte</label>
        <textarea name="cta_text" class="form-input form-textarea" rows="2">{{ $settings['cta_text']->value ?? '' }}</textarea>
    </div>

    {{-- ─── Équipe ─── --}}
    <h3 class="dashboard-section-title">
        Section Équipe
        <label style="float:right;font-size:.85rem;font-weight:500;cursor:pointer">
            <input type="hidden" name="team_visible" value="0">
            <input type="checkbox" name="team_visible" value="1" {{ ($settings['team_visible']->value ?? '1') == '1' ? 'checked' : '' }}> Visible
        </label>
    </h3>
    <div class="form-group">
        <label class="form-label">Titre H2</label>
        <input type="text" name="team_title" class="form-input" value="{{ $settings['team_title']->value ?? '' }}">
    </div>
    <div class="form-group">
        <label class="form-label">Membres (JSON)</label>
        <textarea name="team_members" class="form-input form-textarea" rows="5">{{ $settings['team_members']->value ?? '[]' }}</textarea>
        <p style="font-size:.8rem;color:#6b7280;margin-top:.25rem">Format : <code>[{"name":"…","role":"…","image":null}]</code></p>
    </div>

    {{-- ─── Galerie ─── --}}
    <h3 class="dashboard-section-title">
        Section Galerie
        <label style="float:right;font-size:.85rem;font-weight:500;cursor:pointer">
            <input type="hidden" name="gallery_visible" value="0">
            <input type="checkbox" name="gallery_visible" value="1" {{ ($settings['gallery_visible']->value ?? '1') == '1' ? 'checked' : '' }}> Visible
        </label>
    </h3>
    <div class="form-group">
        <label class="form-label">Titre H2</label>
        <input type="text" name="gallery_title" class="form-input" value="{{ $settings['gallery_title']->value ?? '' }}">
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>
@endsection

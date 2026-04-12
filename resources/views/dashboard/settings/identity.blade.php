@extends('layouts.dashboard')
@section('page-title', 'Logo & Identité')

@section('content')
<form method="POST" action="{{ route('dashboard.settings.identity.update') }}" enctype="multipart/form-data" class="dashboard-form">
    @csrf

    <h2 class="dashboard-form-title">Logo & Identité du site</h2>

    <h3 class="dashboard-section-title">Informations générales</h3>

    <div class="form-group">
        <label class="form-label">Nom du site</label>
        <input type="text" name="site_name" class="form-input" value="{{ $settings['site_name']->value ?? '' }}">
    </div>
    <div class="form-group">
        <label class="form-label">Slogan</label>
        <input type="text" name="site_tagline" class="form-input" value="{{ $settings['site_tagline']->value ?? '' }}">
    </div>

    <h3 class="dashboard-section-title">Logos & Favicon</h3>

    {{-- Logo Header --}}
    <div class="form-group">
        <label class="form-label">Logo Header</label>
        <input type="file" name="logo_header" class="form-input" accept="image/*" data-preview="prev_logo_header">
        @if(setting('logo_header'))
            <div class="image-preview">
                <img id="prev_logo_header" src="{{ Storage::url(setting('logo_header')) }}" alt="Logo header">
                <a href="{{ route('dashboard.media.destroy', 'logo_header') }}"
                   onclick="return confirm('Supprimer ce logo ?')"
                   class="btn btn-sm btn-danger">Supprimer</a>
            </div>
        @else
            <img id="prev_logo_header" style="display:none;height:60px;margin-top:8px;">
        @endif
    </div>

    {{-- Logo Footer --}}
    <div class="form-group">
        <label class="form-label">Logo Footer</label>
        <input type="file" name="logo_footer" class="form-input" accept="image/*" data-preview="prev_logo_footer">
        @if(setting('logo_footer'))
            <div class="image-preview">
                <img id="prev_logo_footer" src="{{ Storage::url(setting('logo_footer')) }}" alt="Logo footer">
                <a href="{{ route('dashboard.media.destroy', 'logo_footer') }}"
                   onclick="return confirm('Supprimer ce logo ?')"
                   class="btn btn-sm btn-danger">Supprimer</a>
            </div>
        @else
            <img id="prev_logo_footer" style="display:none;height:60px;margin-top:8px;">
        @endif
    </div>

    {{-- Favicon --}}
    <div class="form-group">
        <label class="form-label">Favicon</label>
        <input type="file" name="favicon" class="form-input" accept="image/*" data-preview="prev_favicon">
        @if(setting('favicon'))
            <div class="image-preview">
                <img id="prev_favicon" src="{{ Storage::url(setting('favicon')) }}" alt="Favicon" style="height:32px;">
                <a href="{{ route('dashboard.media.destroy', 'favicon') }}"
                   onclick="return confirm('Supprimer le favicon ?')"
                   class="btn btn-sm btn-danger">Supprimer</a>
            </div>
        @else
            <img id="prev_favicon" style="display:none;height:32px;margin-top:8px;">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection

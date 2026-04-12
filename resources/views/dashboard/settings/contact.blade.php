@extends('layouts.dashboard')
@section('page-title', 'Configuration Contact')

@section('content')
<form method="POST" action="{{ route('dashboard.settings.contact.update') }}" class="dashboard-form">
    @csrf

    <h2 class="dashboard-form-title">Configuration du formulaire de contact</h2>

    <h3 class="dashboard-section-title">Coordonnées</h3>
    <div class="form-group">
        <label class="form-label">Email de destination</label>
        <input type="email" name="contact_email" class="form-input" value="{{ $settings['contact_email']->value ?? '' }}">
    </div>
    <div class="form-row">
        <div class="form-group">
            <label class="form-label">Téléphone</label>
            <input type="text" name="contact_phone" class="form-input" value="{{ $settings['contact_phone']->value ?? '' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Adresse</label>
            <input type="text" name="contact_address" class="form-input" value="{{ $settings['contact_address']->value ?? '' }}">
        </div>
    </div>

    <h3 class="dashboard-section-title">Textes de la page contact</h3>
    <div class="form-group">
        <label class="form-label">Titre de la page (H1)</label>
        <input type="text" name="contact_title" class="form-input" value="{{ $settings['contact_title']->value ?? '' }}">
    </div>
    <div class="form-group">
        <label class="form-label">Sous-titre</label>
        <input type="text" name="contact_subtitle" class="form-input" value="{{ $settings['contact_subtitle']->value ?? '' }}">
    </div>
    <div class="form-group">
        <label class="form-label">Message de confirmation après envoi</label>
        <textarea name="contact_confirm_msg" class="form-input form-textarea" rows="3">{{ $settings['contact_confirm_msg']->value ?? '' }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection

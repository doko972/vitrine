@extends('layouts.dashboard')
@section('page-title', 'Réseaux Sociaux')

@section('content')
<form method="POST" action="{{ route('dashboard.settings.social.update') }}" class="dashboard-form">
    @csrf

    <h2 class="dashboard-form-title">Liens Réseaux Sociaux</h2>
    <p style="color:#6b7280;font-size:.9rem;margin-bottom:1.5rem">Laissez vide pour masquer l'icône dans le footer.</p>

    @foreach([
        'social_facebook'  => ['label' => 'Facebook',    'placeholder' => 'https://facebook.com/votreprofil'],
        'social_instagram' => ['label' => 'Instagram',   'placeholder' => 'https://instagram.com/votreprofil'],
        'social_linkedin'  => ['label' => 'LinkedIn',    'placeholder' => 'https://linkedin.com/in/votreprofil'],
        'social_twitter'   => ['label' => 'Twitter / X', 'placeholder' => 'https://x.com/votrecompte'],
        'social_youtube'   => ['label' => 'YouTube',     'placeholder' => 'https://youtube.com/@votrechaine'],
    ] as $key => $info)
    <div class="form-group">
        <label class="form-label">{{ $info['label'] }}</label>
        <input type="url" name="{{ $key }}" class="form-input"
               value="{{ $settings[$key]->value ?? '' }}"
               placeholder="{{ $info['placeholder'] }}">
    </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection

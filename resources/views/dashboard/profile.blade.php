@extends('layouts.dashboard')
@section('page-title', 'Mon Profil')

@section('content')
<div style="display:grid;grid-template-columns:1fr;gap:1.5rem;max-width:700px;">

    {{-- Informations --}}
    <form method="POST" action="{{ route('dashboard.profile.update') }}" class="dashboard-form">
        @csrf
        @method('PATCH')
        <h2 class="dashboard-form-title">Informations du compte</h2>
        <div class="form-group">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-input @error('name') is-error @enderror" value="{{ old('name', $user->name) }}" required>
            @error('name')<p class="form-error">{{ $message }}</p>@enderror
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-input @error('email') is-error @enderror" value="{{ old('email', $user->email) }}" required>
            @error('email')<p class="form-error">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

    {{-- Mot de passe --}}
    <form method="POST" action="{{ route('dashboard.profile.password') }}" class="dashboard-form">
        @csrf
        @method('PUT')
        <h2 class="dashboard-form-title">Changer le mot de passe</h2>
        <div class="form-group">
            <label class="form-label">Mot de passe actuel</label>
            <input type="password" name="current_password" class="form-input @error('current_password') is-error @enderror" autocomplete="current-password">
            @error('current_password')<p class="form-error">{{ $message }}</p>@enderror
        </div>
        <div class="form-group">
            <label class="form-label">Nouveau mot de passe</label>
            <input type="password" name="password" class="form-input @error('password') is-error @enderror" autocomplete="new-password">
            @error('password')<p class="form-error">{{ $message }}</p>@enderror
        </div>
        <div class="form-group">
            <label class="form-label">Confirmer le nouveau mot de passe</label>
            <input type="password" name="password_confirmation" class="form-input" autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
    </form>

</div>
@endsection

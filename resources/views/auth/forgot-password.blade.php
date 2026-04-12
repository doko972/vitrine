<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié — {{ setting('site_name', 'Vitrine') }}</title>
    <style>
        :root {
            --color-primary: {{ setting('color_primary', '#2563eb') }};
            --color-secondary: {{ setting('color_secondary', '#1e40af') }};
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-logo">
            <a href="{{ route('home') }}">{{ setting('site_name', 'Vitrine') }}</a>
        </div>
        <h1 class="auth-title">Mot de passe oublié</h1>
        <p class="auth-subtitle">Entrez votre email pour recevoir un lien de réinitialisation.</p>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                       class="form-input @error('email') is-error @enderror"
                       value="{{ old('email') }}" required autofocus placeholder="votre@email.fr">
                @error('email')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Envoyer le lien</button>
        </form>

        <div class="auth-links">
            <a href="{{ route('login') }}">← Retour à la connexion</a>
        </div>
    </div>
</div>
</body>
</html>

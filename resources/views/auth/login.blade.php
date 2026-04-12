<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — {{ setting('site_name', 'Vitrine') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary:   {{ setting('color_primary',   '#2563eb') }};
            --color-secondary: {{ setting('color_secondary', '#1e40af') }};
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-logo">
            <a href="{{ route('home') }}">
                @if(setting('logo_header'))
                    <img src="{{ Storage::url(setting('logo_header')) }}" alt="{{ setting('site_name') }}">
                @else
                    {{ setting('site_name', 'Vitrine') }}
                @endif
            </a>
        </div>

        <h1 class="auth-title">Connexion</h1>
        <p class="auth-subtitle">Accédez à votre espace d'administration</p>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" id="email" name="email"
                       class="form-input @error('email') is-error @enderror"
                       value="{{ old('email') }}" required autofocus autocomplete="username"
                       placeholder="admin@vitrine.fr">
                @error('email')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">
                    Mot de passe
                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           style="float:right;font-size:.8rem;color:var(--color-primary)">Mot de passe oublié ?</a>
                    @endif
                </label>
                <input type="password" id="password" name="password"
                       class="form-input @error('password') is-error @enderror"
                       required autocomplete="current-password" placeholder="••••••••">
                @error('password')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:.5rem">
                <input type="checkbox" id="remember" name="remember" style="width:auto">
                <label for="remember" style="font-size:.875rem;color:#4b5563;cursor:pointer">Se souvenir de moi</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </form>

        <div class="auth-links">
            <a href="{{ route('home') }}">← Retour au site</a>
        </div>
    </div>
</div>
</body>
</html>

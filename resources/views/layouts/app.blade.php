<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', setting('site_name', 'Vitrine')) — {{ setting('site_name', 'Vitrine') }}</title>
    <meta name="description" content="@yield('description', setting('site_tagline', ''))">

    @if(setting('favicon'))
        <link rel="icon" type="image/x-icon" href="{{ Storage::url(setting('favicon')) }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --color-primary:   {{ setting('color_primary',   '#2563eb') }};
            --color-secondary: {{ setting('color_secondary', '#1e40af') }};
            --color-accent:    {{ setting('color_accent',    '#f59e0b') }};
            --color-text:      {{ setting('color_text',      '#1f2937') }};
            --color-bg:        {{ setting('color_bg',        '#ffffff') }};
            --font-heading:    '{{ setting('font_heading',   'Poppins') }}', sans-serif;
            --font-body:       '{{ setting('font_body',      'Inter') }}', sans-serif;
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    @include('components.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('components.footer')

    @stack('scripts')
</body>
</html>

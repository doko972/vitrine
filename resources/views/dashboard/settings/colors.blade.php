@extends('layouts.dashboard')
@section('page-title', 'Couleurs & Typographies')

@section('content')
<form method="POST" action="{{ route('dashboard.settings.colors.update') }}" class="dashboard-form">
    @csrf

    <h2 class="dashboard-form-title">Couleurs & Typographies</h2>

    <h3 class="dashboard-section-title">Palette de couleurs</h3>

    @foreach([
        'color_primary'   => 'Couleur primaire',
        'color_secondary' => 'Couleur secondaire',
        'color_accent'    => 'Couleur accent',
        'color_text'      => 'Couleur du texte',
        'color_bg'        => 'Couleur de fond',
    ] as $key => $label)
    <div class="form-group">
        <label class="form-label">{{ $label }}</label>
        <div class="color-field">
            <input type="color" name="{{ $key }}_picker" value="{{ $settings[$key]->value ?? '#000000' }}"
                   onchange="document.querySelector('[name={{ $key }}]').value = this.value">
            <input type="text" name="{{ $key }}" class="form-input color-hex"
                   value="{{ $settings[$key]->value ?? '' }}" placeholder="#000000" maxlength="7">
        </div>
    </div>
    @endforeach

    <h3 class="dashboard-section-title">Typographies</h3>
    <p style="font-size:.85rem;color:#6b7280;margin-bottom:1rem;">
        Entrez le nom exact d'une police Google Fonts (ex : Poppins, Roboto, Montserrat, Raleway…)
    </p>

    <div class="form-group">
        <label class="form-label">Police des titres (H1, H2, H3…)</label>
        <input type="text" name="font_heading" class="form-input" value="{{ $settings['font_heading']->value ?? 'Poppins' }}" placeholder="Poppins">
    </div>
    <div class="form-group">
        <label class="form-label">Police du corps de texte</label>
        <input type="text" name="font_body" class="form-input" value="{{ $settings['font_body']->value ?? 'Inter' }}" placeholder="Inter">
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection

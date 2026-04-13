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

    {{-- Type de hero --}}
    @php $heroType = $settings['hero_type']->value ?? 'classic'; @endphp
    <div class="form-group">
        <label class="form-label">Type de Hero</label>
        <div style="display:flex;gap:1rem;flex-wrap:wrap;margin-top:.5rem">
            @foreach(['classic' => ['label'=>'Classic','desc'=>'Image de fond + texte centré','icon'=>'🖼️'],
                       'carousel' => ['label'=>'Carousel','desc'=>'3 slides défilantes','icon'=>'🎠'],
                       'split'    => ['label'=>'Split','desc'=>'Texte gauche / image droite','icon'=>'⬛']] as $val => $opt)
            <label style="flex:1;min-width:150px;cursor:pointer">
                <input type="radio" name="hero_type" value="{{ $val }}" {{ $heroType === $val ? 'checked' : '' }}
                    style="display:none" onchange="document.querySelectorAll('.hero-type-panel').forEach(p=>p.style.display='none');document.getElementById('hero-panel-{{ $val }}').style.display='block'">
                <div class="hero-type-card {{ $heroType === $val ? 'selected' : '' }}" data-type="{{ $val }}"
                    style="border:2px solid {{ $heroType === $val ? 'var(--color-primary)' : '#e5e7eb' }};border-radius:8px;padding:.75rem 1rem;text-align:center;transition:border-color .2s">
                    <div style="font-size:1.6rem;margin-bottom:.25rem">{{ $opt['icon'] }}</div>
                    <div style="font-weight:600;font-size:.9rem">{{ $opt['label'] }}</div>
                    <div style="font-size:.78rem;color:#6b7280;margin-top:.2rem">{{ $opt['desc'] }}</div>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    {{-- Champs communs --}}
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

    {{-- Panel Classic & Split --}}
    <div id="hero-panel-classic" class="hero-type-panel" style="display:{{ $heroType !== 'carousel' ? 'block' : 'none' }}">
        <div class="form-group">
            <label class="form-label">Image de fond <span style="color:#6b7280;font-weight:400">(slide 1 pour le carousel)</span></label>
            <input type="file" name="hero_bg_image" class="form-input" accept="image/*" data-preview="prev_hero_bg">
            @if(setting('hero_bg_image'))
                <div class="image-preview">
                    <img id="prev_hero_bg" src="{{ Storage::url(setting('hero_bg_image')) }}" alt="Hero bg">
                </div>
            @else
                <img id="prev_hero_bg" style="display:none;height:80px;margin-top:8px;border-radius:8px;object-fit:cover;">
            @endif
        </div>
    </div>

    {{-- Panel Carousel --}}
    <div id="hero-panel-carousel" class="hero-type-panel" style="display:{{ $heroType === 'carousel' ? 'block' : 'none' }}">
        @foreach([['1','hero_bg_image','hero_title','hero_subtitle'],['2','hero_slide_2_img','hero_slide_2_title','hero_slide_2_sub'],['3','hero_slide_3_img','hero_slide_3_title','hero_slide_3_sub']] as $slide)
        @php [$n, $imgKey, $titleKey, $subKey] = $slide; @endphp
        <h4 style="font-size:.9rem;font-weight:600;color:#374151;margin:.75rem 0 .5rem">Slide {{ $n }}</h4>
        <div class="form-group">
            <label class="form-label">Image slide {{ $n }}</label>
            <input type="file" name="{{ $imgKey }}" class="form-input" accept="image/*" data-preview="prev_slide_{{ $n }}">
            @if(setting($imgKey))
                <div class="image-preview">
                    <img id="prev_slide_{{ $n }}" src="{{ Storage::url(setting($imgKey)) }}" alt="Slide {{ $n }}">
                </div>
            @else
                <img id="prev_slide_{{ $n }}" style="display:none;height:80px;margin-top:8px;border-radius:8px;object-fit:cover;">
            @endif
        </div>
        @if($n > 1)
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Titre slide {{ $n }} <span style="color:#6b7280;font-weight:400">(optionnel)</span></label>
                <input type="text" name="{{ $titleKey }}" class="form-input" placeholder="{{ $settings['hero_title']->value ?? 'Titre global par défaut' }}" value="{{ $settings[$titleKey]->value ?? '' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Sous-titre slide {{ $n }} <span style="color:#6b7280;font-weight:400">(optionnel)</span></label>
                <input type="text" name="{{ $subKey }}" class="form-input" placeholder="{{ $settings['hero_subtitle']->value ?? 'Sous-titre global par défaut' }}" value="{{ $settings[$subKey]->value ?? '' }}">
            </div>
        </div>
        @endif
        @endforeach
    </div>

    {{-- Panel Split (même image que classic) --}}
    <div id="hero-panel-split" class="hero-type-panel" style="display:none">
        {{-- Le panel split réutilise hero_bg_image — l'image est déjà dans hero-panel-classic --}}
    </div>

    <script>
    // Synchroniser les panels et les cartes au chargement et au changement
    (function() {
        const radios = document.querySelectorAll('input[name="hero_type"]');
        const cards  = document.querySelectorAll('.hero-type-card');

        function update(val) {
            document.querySelectorAll('.hero-type-panel').forEach(p => p.style.display = 'none');
            const target = document.getElementById('hero-panel-' + (val === 'split' ? 'classic' : val));
            if (target) target.style.display = 'block';
            if (val === 'carousel') {
                document.getElementById('hero-panel-carousel').style.display = 'block';
            }
            cards.forEach(c => {
                const sel = c.dataset.type === val;
                c.style.borderColor = sel ? 'var(--color-primary)' : '#e5e7eb';
            });
        }

        radios.forEach(r => r.addEventListener('change', e => update(e.target.value)));
        // État initial
        const checked = document.querySelector('input[name="hero_type"]:checked');
        if (checked) update(checked.value);
    })();
    </script>

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

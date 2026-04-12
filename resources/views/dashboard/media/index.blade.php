@extends('layouts.dashboard')
@section('page-title', 'Images & Médias')

@section('content')
<h2 class="dashboard-section-title" style="margin-top:0">Gestion des images</h2>

<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:1.5rem;">
    @foreach($imageSettings as $setting)
    <div style="background:#fff;border-radius:12px;padding:1.25rem;box-shadow:0 1px 4px rgba(0,0,0,.08);">
        <p style="font-weight:600;font-size:.9rem;margin-bottom:.75rem;color:#374151;">{{ $setting->label }}</p>

        @if($setting->value)
            <div style="margin-bottom:.75rem;">
                <img src="{{ Storage::url($setting->value) }}" alt="{{ $setting->label }}"
                     style="max-height:80px;max-width:100%;border-radius:8px;object-fit:contain;background:#f9fafb;padding:4px;border:1px solid #e5e7eb;">
            </div>
        @else
            <div style="height:60px;background:#f3f4f6;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#9ca3af;font-size:.8rem;margin-bottom:.75rem;">
                Aucune image
            </div>
        @endif

        <form method="POST" action="{{ route('dashboard.media.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="key" value="{{ $setting->key }}">
            <input type="file" name="image" class="form-input" accept="image/*" style="font-size:.8rem;padding:.4rem .6rem;margin-bottom:.5rem;">
            <div style="display:flex;gap:.5rem;">
                <button type="submit" class="btn btn-sm btn-primary" style="flex:1">Mettre à jour</button>
                @if($setting->value)
                    <a href="{{ route('dashboard.media.destroy', $setting->key) }}"
                       onclick="event.preventDefault();if(confirm('Supprimer cette image ?'))this.closest('form').action='{{ route('dashboard.media.destroy', $setting->key) }}',this.closest('form').submit();"
                       class="btn btn-sm btn-danger">✕</a>
                @endif
            </div>
        </form>
    </div>
    @endforeach
</div>

@if($imageSettings->isEmpty())
    <p style="color:#6b7280;text-align:center;padding:3rem;">Aucun paramètre image trouvé.</p>
@endif
@endsection

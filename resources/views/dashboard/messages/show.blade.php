@extends('layouts.dashboard')
@section('page-title', 'Message de ' . $message->name)

@section('content')
<div class="dashboard-form" style="max-width:680px;">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;padding-bottom:1rem;border-bottom:1px solid #e5e7eb;">
        <h2 style="font-size:1.25rem;font-weight:700;">{{ $message->subject ?? 'Message sans sujet' }}</h2>
        <a href="{{ route('dashboard.messages.index') }}" class="btn btn-sm btn-ghost">← Retour</a>
    </div>

    <dl style="display:grid;grid-template-columns:120px 1fr;gap:.75rem 1rem;margin-bottom:1.5rem;">
        <dt style="font-size:.8rem;color:#6b7280;font-weight:600;text-transform:uppercase;">De</dt>
        <dd>{{ $message->name }}</dd>

        <dt style="font-size:.8rem;color:#6b7280;font-weight:600;text-transform:uppercase;">Email</dt>
        <dd><a href="mailto:{{ $message->email }}" style="color:#2563eb;">{{ $message->email }}</a></dd>

        @if($message->phone)
        <dt style="font-size:.8rem;color:#6b7280;font-weight:600;text-transform:uppercase;">Tél.</dt>
        <dd>{{ $message->phone }}</dd>
        @endif

        <dt style="font-size:.8rem;color:#6b7280;font-weight:600;text-transform:uppercase;">Date</dt>
        <dd>{{ $message->created_at->format('d/m/Y à H:i') }}</dd>
    </dl>

    <div style="background:#f9fafb;border-radius:8px;padding:1.25rem;line-height:1.7;white-space:pre-wrap;color:#374151;">{{ $message->message }}</div>

    <div style="margin-top:1.5rem;display:flex;gap:.75rem;">
        <a href="mailto:{{ $message->email }}" class="btn btn-primary">
            Répondre par email
        </a>
        <form method="POST" action="{{ route('dashboard.messages.destroy', $message->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" data-confirm="Supprimer ce message ?">
                Supprimer
            </button>
        </form>
    </div>
</div>
@endsection

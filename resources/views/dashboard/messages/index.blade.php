@extends('layouts.dashboard')
@section('page-title', 'Messages de contact')

@section('content')
<div class="messages-table">
    <table>
        <thead>
            <tr>
                <th>Statut</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Sujet</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $msg)
            <tr class="{{ !$msg->read ? 'unread' : '' }}">
                <td>
                    @if(!$msg->read)
                        <span class="badge badge-unread">Nouveau</span>
                    @else
                        <span class="badge badge-read">Lu</span>
                    @endif
                </td>
                <td>{{ $msg->name }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ $msg->subject ?? '—' }}</td>
                <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                <td style="white-space:nowrap">
                    <a href="{{ route('dashboard.messages.show', $msg->id) }}" class="btn btn-sm btn-ghost">Lire</a>
                    <form method="POST" action="{{ route('dashboard.messages.destroy', $msg->id) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                data-confirm="Supprimer ce message définitivement ?">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;padding:3rem;color:#6b7280;">Aucun message reçu.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:1.5rem;">
    {{ $messages->links() }}
</div>
@endsection

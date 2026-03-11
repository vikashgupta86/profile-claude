{{-- messages/index.blade.php --}}
@extends('admin.layouts.app')
@section('title','Messages')
@section('page-title','Messages Inbox')
@section('content')
<div class="card">
    <div class="card-header"><span class="card-title">All Messages ({{ $messages->count() }})</span></div>
    <table>
        <thead><tr><th>FROM</th><th>SUBJECT</th><th>DATE</th><th>STATUS</th><th>ACTIONS</th></tr></thead>
        <tbody>
        @forelse($messages as $m)
        <tr style="{{ !$m->is_read ? 'border-left:2px solid var(--cyan)' : '' }}">
            <td>
                <div style="color:var(--text);font-weight:{{ !$m->is_read ? '600' : '400' }}">{{ $m->name }}</div>
                <div style="font-size:.78rem">{{ $m->email }}</div>
            </td>
            <td style="color:{{ !$m->is_read ? 'var(--text)' : 'var(--text-muted)' }}">{{ Str::limit($m->subject,50) }}</td>
            <td style="font-family:'JetBrains Mono',monospace;font-size:.75rem">{{ $m->created_at->format('d M Y') }}</td>
            <td>
                @if($m->is_read)
                    <span style="color:var(--text-muted);font-family:'JetBrains Mono',monospace;font-size:.65rem">READ</span>
                @else
                    <span style="color:var(--cyan);font-family:'JetBrains Mono',monospace;font-size:.65rem">● NEW</span>
                @endif
            </td>
            <td style="display:flex;gap:.5rem">
                <a href="{{ route('admin.messages.show',$m) }}" class="btn btn-outline btn-sm"><i class="fas fa-eye"></i></a>
                <form method="POST" action="{{ route('admin.messages.destroy',$m) }}" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align:center;padding:2rem;color:var(--text-muted)">No messages yet.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection

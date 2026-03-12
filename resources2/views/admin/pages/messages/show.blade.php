@extends('admin.layouts.app')
@section('title','Message')
@section('page-title','View Message')
@section('content')
<div class="card">
    <div style="margin-bottom:1.5rem">
        <div style="display:grid;grid-template-columns:auto 1fr;gap:.5rem 1.5rem;font-size:.9rem;margin-bottom:1.5rem">
            <span style="font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--cyan)">FROM</span>
            <span style="color:var(--text)">{{ $message->name }} &lt;{{ $message->email }}&gt;</span>
            <span style="font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--cyan)">SUBJECT</span>
            <span style="color:var(--text);font-weight:600">{{ $message->subject }}</span>
            <span style="font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--cyan)">DATE</span>
            <span style="color:var(--text-muted)">{{ $message->created_at->format('d M Y, H:i') }}</span>
        </div>
        <div style="background:var(--bg2);border:1px solid var(--border);padding:1.5rem;color:var(--text-muted);line-height:1.8;white-space:pre-wrap">{{ $message->message }}</div>
    </div>
    <div style="display:flex;gap:1rem">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-cyan"><i class="fas fa-reply"></i> Reply via Email</a>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Back</a>
        <form method="POST" action="{{ route('admin.messages.destroy',$message) }}" onsubmit="return confirm('Delete this message?')" style="margin-left:auto">
            @csrf @method('DELETE')
            <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
        </form>
    </div>
</div>
@endsection

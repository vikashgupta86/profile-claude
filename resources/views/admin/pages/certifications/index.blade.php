{{-- resources/views/admin/pages/certifications/index.blade.php --}}
@extends('admin.layouts.app')
@section('title','Certifications')
@section('page-title','Certifications Manager')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">All Certifications ({{ $certifications->count() }})</span>
        <a href="{{ route('admin.certifications.create') }}" class="btn btn-cyan"><i class="fas fa-plus"></i> Add</a>
    </div>
    <table>
        <thead><tr><th>TITLE</th><th>ISSUER</th><th>ICON</th><th>URL</th><th>ACTIONS</th></tr></thead>
        <tbody>
        @forelse($certifications as $c)
        <tr>
            <td style="color:var(--text)">{{ $c->title }}</td>
            <td>{{ $c->issuer }}</td>
            <td><i class="fas fa-{{ $c->icon }}" style="color:var(--cyan)"></i> {{ $c->icon }}</td>
            <td>{{ $c->certificate_url ? '✓' : '—' }}</td>
            <td style="display:flex;gap:.5rem">
                <a href="{{ route('admin.certifications.edit',$c) }}" class="btn btn-outline btn-sm"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{ route('admin.certifications.destroy',$c) }}" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align:center;padding:2rem;color:var(--text-muted)">No certifications yet.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection

{{-- experience/index.blade.php --}}
@extends('admin.layouts.app')
@section('title','Experience')
@section('page-title','Experience Manager')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Work Experience ({{ $experiences->count() }})</span>
        <a href="{{ route('admin.experience.create') }}" class="btn btn-cyan"><i class="fas fa-plus"></i> Add</a>
    </div>
    <table>
        <thead><tr><th>TITLE</th><th>COMPANY</th><th>PERIOD</th><th>CURRENT</th><th>ACTIONS</th></tr></thead>
        <tbody>
        @forelse($experiences as $e)
        <tr>
            <td style="color:var(--text)">{{ $e->title }}</td>
            <td>{{ $e->company }}</td>
            <td style="font-family:'JetBrains Mono',monospace;font-size:.75rem">{{ $e->duration }}</td>
            <td>{{ $e->is_current ? '<span style="color:var(--cyan)">YES</span>' : '—' }}</td>
            <td style="display:flex;gap:.5rem">
                <a href="{{ route('admin.experience.edit',$e) }}" class="btn btn-outline btn-sm"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{ route('admin.experience.destroy',$e) }}" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align:center;padding:2rem;color:var(--text-muted)">No experiences yet.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection

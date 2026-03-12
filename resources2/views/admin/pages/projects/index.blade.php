@extends('admin.layouts.app')
@section('title','Projects')
@section('page-title','Projects Manager')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">All Projects ({{ $projects->count() }})</span>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-cyan"><i class="fas fa-plus"></i> Add Project</a>
    </div>
    <table>
        <thead><tr><th>TITLE</th><th>CATEGORY</th><th>TECH STACK</th><th>FEATURED</th><th>ACTIONS</th></tr></thead>
        <tbody>
        @forelse($projects as $p)
        <tr>
            <td style="color:var(--text);font-weight:500">{{ $p->title }}</td>
            <td><span style="background:rgba(0,245,255,.1);color:var(--cyan);font-family:'JetBrains Mono',monospace;font-size:.7rem;padding:.2rem .6rem">{{ strtoupper($p->category) }}</span></td>
            <td style="font-size:.8rem">{{ implode(', ', array_slice($p->tech_stack, 0, 3)) }}{{ count($p->tech_stack) > 3 ? '...' : '' }}</td>
            <td>
                <form method="POST" action="{{ route('admin.projects.toggle-featured',$p) }}" style="display:inline">
                    @csrf
                    <button type="submit" style="background:none;border:none;cursor:pointer;color:{{ $p->is_featured ? '#FFD700' : 'var(--text-muted)' }};font-size:1.1rem"><i class="fas fa-star"></i></button>
                </form>
            </td>
            <td>
                <div style="display:flex;gap:.5rem">
                    <a href="{{ route('admin.projects.edit',$p) }}" class="btn btn-outline btn-sm"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.projects.destroy',$p) }}" onsubmit="return confirm('Delete this project?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align:center;padding:2rem;color:var(--text-muted)">No projects yet. <a href="{{ route('admin.projects.create') }}" style="color:var(--cyan)">Add one</a></td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection

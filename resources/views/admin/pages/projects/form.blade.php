@extends('admin.layouts.app')
@section('title', $project->id ? 'Edit Project' : 'Add Project')
@section('page-title', $project->id ? 'Edit Project' : 'Add New Project')

@section('content')
<div class="card">
    <form method="POST" action="{{ $project->id ? route('admin.projects.update',$project) : route('admin.projects.store') }}" enctype="multipart/form-data">
        @csrf
        @if($project->id) @method('PUT') @endif

        <div class="form-row">
            <div>
                <label class="form-label">PROJECT TITLE *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title',$project->title) }}" required>
            </div>
            <div>
                <label class="form-label">CATEGORY *</label>
                <select name="category" class="form-control" required>
                    @foreach(['laravel'=>'Laravel','php'=>'PHP','api'=>'API','government'=>'Government','other'=>'Other'] as $val=>$label)
                        <option value="{{ $val }}" {{ old('category',$project->category)==$val?'selected':'' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <label class="form-label">SHORT DESCRIPTION *</label>
        <input type="text" name="short_description" class="form-control" value="{{ old('short_description',$project->short_description) }}" placeholder="One line summary for cards" required>

        <label class="form-label">FULL DESCRIPTION *</label>
        <textarea name="description" class="form-control" style="min-height:150px" required>{{ old('description',$project->description) }}</textarea>

        <label class="form-label">TECH STACK * (comma separated)</label>
        <input type="text" name="tech_stack" class="form-control" value="{{ old('tech_stack', $project->id ? implode(', ',$project->tech_stack) : '') }}" placeholder="Laravel, PHP, MySQL, Bootstrap">

        <div class="form-row">
            <div>
                <label class="form-label">GITHUB URL</label>
                <input type="url" name="github_url" class="form-control" value="{{ old('github_url',$project->github_url) }}" placeholder="https://github.com/...">
            </div>
            <div>
                <label class="form-label">LIVE URL</label>
                <input type="url" name="live_url" class="form-control" value="{{ old('live_url',$project->live_url) }}" placeholder="https://...">
            </div>
        </div>

        <label class="form-label">THUMBNAIL IMAGE</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/*">
        @if($project->thumbnail)
            <p style="font-size:.8rem;color:var(--text-muted);margin-bottom:1rem"><i class="fas fa-image"></i> Current: {{ $project->thumbnail }}</p>
        @endif

        <div class="form-check">
            <input type="checkbox" name="is_featured" id="featured" value="1" {{ old('is_featured',$project->is_featured) ? 'checked' : '' }}>
            <label for="featured">Mark as Featured Project</label>
        </div>

        @if($errors->any())
            <div class="alert alert-error">{{ $errors->first() }}</div>
        @endif

        <div style="display:flex;gap:1rem">
            <button type="submit" class="btn btn-cyan"><i class="fas fa-save"></i> {{ $project->id ? 'Update' : 'Create' }} Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection

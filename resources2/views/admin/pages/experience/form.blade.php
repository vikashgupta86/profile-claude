@extends('admin.layouts.app')
@section('title', isset($experience->id) ? 'Edit Experience' : 'Add Experience')
@section('page-title', isset($experience->id) ? 'Edit Experience' : 'Add Experience')
@section('content')
<div class="card">
    <form method="POST" action="{{ isset($experience->id) ? route('admin.experience.update',$experience) : route('admin.experience.store') }}">
        @csrf @if(isset($experience->id)) @method('PUT') @endif
        <div class="form-row">
            <div>
                <label class="form-label">JOB TITLE *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title',$experience->title ?? '') }}" required>
            </div>
            <div>
                <label class="form-label">COMPANY *</label>
                <input type="text" name="company" class="form-control" value="{{ old('company',$experience->company ?? '') }}" required>
            </div>
        </div>
        <label class="form-label">LOCATION *</label>
        <input type="text" name="location" class="form-control" value="{{ old('location',$experience->location ?? '') }}" required>
        <div class="form-row">
            <div>
                <label class="form-label">START DATE *</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', isset($experience->start_date) ? $experience->start_date->format('Y-m-d') : '') }}" required>
            </div>
            <div>
                <label class="form-label">END DATE</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', isset($experience->end_date) ? $experience->end_date->format('Y-m-d') : '') }}">
            </div>
        </div>
        <div class="form-check">
            <input type="checkbox" name="is_current" id="is_current" value="1" {{ old('is_current', $experience->is_current ?? false) ? 'checked' : '' }}>
            <label for="is_current">This is my current job</label>
        </div>
        <label class="form-label">RESPONSIBILITIES * (one per line)</label>
        <textarea name="responsibilities" class="form-control" style="min-height:160px" required>{{ old('responsibilities', isset($experience->responsibilities) ? implode("\n",$experience->responsibilities) : '') }}</textarea>
        @if($errors->any())<div class="alert alert-error">{{ $errors->first() }}</div>@endif
        <div style="display:flex;gap:1rem;margin-top:.5rem">
            <button type="submit" class="btn btn-cyan"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('admin.experience.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection

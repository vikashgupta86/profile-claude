@extends('admin.layouts.app')
@section('title', $cert->id ? 'Edit Certification' : 'Add Certification')
@section('page-title', $cert->id ? 'Edit Certification' : 'Add Certification')
@section('content')
<div class="card">
    <form method="POST" action="{{ $cert->id ? route('admin.certifications.update',$cert) : route('admin.certifications.store') }}">
        @csrf @if($cert->id) @method('PUT') @endif
        <label class="form-label">TITLE *</label>
        <input type="text" name="title" class="form-control" value="{{ old('title',$cert->title) }}" required>
        <label class="form-label">ISSUER *</label>
        <input type="text" name="issuer" class="form-control" value="{{ old('issuer',$cert->issuer) }}" required>
        <label class="form-label">CERTIFICATE URL</label>
        <input type="url" name="certificate_url" class="form-control" value="{{ old('certificate_url',$cert->certificate_url) }}">
        <div class="form-row">
            <div>
                <label class="form-label">ICON (FontAwesome name)</label>
                <input type="text" name="icon" class="form-control" value="{{ old('icon',$cert->icon ?? 'award') }}" placeholder="award, code, database...">
            </div>
            <div>
                <label class="form-label">SORT ORDER</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order',$cert->sort_order ?? 0) }}">
            </div>
        </div>
        @if($errors->any())<div class="alert alert-error">{{ $errors->first() }}</div>@endif
        <div style="display:flex;gap:1rem">
            <button type="submit" class="btn btn-cyan"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('admin.certifications.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection

@extends('admin.layouts.app')
@section('title','Profile')
@section('page-title','Profile Settings')
@section('content')
<div style="display:grid;grid-template-columns:1.5fr 1fr;gap:1.5rem">
<div>
<div class="card">
    <div class="card-header"><span class="card-title">Update Profile</span></div>
    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-row">
            <div>
                <label class="form-label">FULL NAME</label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$admin->name) }}">
            </div>
            <div>
                <label class="form-label">EMAIL</label>
                <input type="email" name="email" class="form-control" value="{{ old('email',$admin->email) }}">
            </div>
        </div>
        <label class="form-label">BIO</label>
        <textarea name="bio" class="form-control">{{ old('bio',$admin->bio) }}</textarea>
        <div class="form-row">
            <div>
                <label class="form-label">PHONE</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone',$admin->phone) }}">
            </div>
            <div>
                <label class="form-label">LOCATION</label>
                <input type="text" name="location" class="form-control" value="{{ old('location',$admin->location) }}">
            </div>
        </div>
        <div class="form-row">
            <div>
                <label class="form-label">GITHUB URL</label>
                <input type="url" name="github_url" class="form-control" value="{{ old('github_url',$admin->github_url) }}">
            </div>
            <div>
                <label class="form-label">LINKEDIN URL</label>
                <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url',$admin->linkedin_url) }}">
            </div>
        </div>
        <div class="form-row">
            <div>
                <label class="form-label">PROFILE PHOTO</label>
                <input type="file" name="photo" class="form-control" accept="image/*">
                @if($admin->photo)<p style="font-size:.75rem;color:var(--text-muted)">Current: {{ $admin->photo }}</p>@endif
            </div>
            <div>
                <label class="form-label">RESUME PDF</label>
                <input type="file" name="resume_pdf" class="form-control" accept=".pdf">
                @if($admin->resume_pdf)<p style="font-size:.75rem;color:var(--text-muted)">Current: {{ $admin->resume_pdf }}</p>@endif
            </div>
        </div>
        @if($errors->any())<div class="alert alert-error">{{ $errors->first() }}</div>@endif
        <button type="submit" class="btn btn-cyan"><i class="fas fa-save"></i> Update Profile</button>
    </form>
</div>
</div>

<div>
<div class="card">
    <div class="card-header"><span class="card-title">Change Password</span></div>
    <form method="POST" action="{{ route('admin.profile.password') }}">
        @csrf @method('PUT')
        <label class="form-label">CURRENT PASSWORD</label>
        <input type="password" name="current_password" class="form-control" required>
        <label class="form-label">NEW PASSWORD</label>
        <input type="password" name="password" class="form-control" required>
        <label class="form-label">CONFIRM PASSWORD</label>
        <input type="password" name="password_confirmation" class="form-control" required>
        <button type="submit" class="btn btn-cyan"><i class="fas fa-key"></i> Update Password</button>
    </form>
</div>

<div class="card" style="margin-top:0">
    <div class="card-header"><span class="card-title">Account Stats</span></div>
    <div style="font-family:'JetBrains Mono',monospace;font-size:.78rem;color:var(--text-muted);line-height:2.2">
        <div>Profile Views: <span style="color:var(--gold)">{{ $admin->profile_views }}</span></div>
        <div>Member Since: <span style="color:var(--text)">{{ $admin->created_at->format('M Y') }}</span></div>
    </div>
</div>
</div>
</div>
@endsection

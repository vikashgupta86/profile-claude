{{-- resources/views/portfolio.blade.php --}}
@extends('layouts.app')

@section('content')
  @include('sections.hero')
  @include('sections.about', ['timeline' => $experiences])
  @include('sections.skills', ['skillGroups' => $skillGroups])
  @include('sections.experience', ['experiences' => $experiences])
  @include('sections.education', ['education' => $education])
  @include('sections.certifications', ['certifications' => $certifications])
  @include('sections.projects', ['projects' => $projects])
  @include('sections.contact')
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $portfolio->name ?? 'Vikash Kumar' }} — {{ $portfolio->title ?? 'Laravel Developer' }}</title>
<meta name="description" content="{{ $portfolio->meta_description ?? 'Laravel Developer specializing in scalable web applications and government-grade CMS solutions.' }}">

{{-- Fonts: Natural, editorial feel --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600;1,700&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Mono:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="{{asset('css/frontend.css')}}">
@include('partials.design-tokens')
@stack('styles')
</head>
<body>

@include('partials.cursor')
@include('partials.loader')

@include('sections.navigation')
@include('sections.mobile-drawer')

<main id="main-content">
    @yield('content')
</main>

@include('sections.footer')

@include('partials.toast')

@include('partials.scripts')

<div class="toast" id="toast"><i class="fas fa-check-circle"></i><span id="toastMsg"></span></div>

@stack('scripts')
</body>
</html>

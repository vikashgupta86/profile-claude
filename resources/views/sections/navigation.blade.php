{{--
    Navigation Section
    Data: $portfolio (name, nav_links, resume_url), $navLinks[]
--}}
@php
  $name = $portfolio->name ?? 'Vikash Kumar';
  $cleanName = preg_replace('/\s+/', '', $name);
  $initials = strtoupper(substr($cleanName, 0, 2));

  $navLinks = $navLinks ?? [
    ['href' => '#about',      'label' => 'About'],
    ['href' => '#skills',     'label' => 'Skills'],
    ['href' => '#experience', 'label' => 'Experience'],
    ['href' => '#projects',   'label' => 'Projects'],
    ['href' => '#contact',    'label' => 'Contact'],
  ];

  $resumeUrl = $portfolio->resume_url ?? '#';
@endphp

<!-- NAV -->
<nav id="nav">
  <div class="nav-in">
    <a href="#hero" class="nav-brand">{{ $initials }}.</a>
    <ul class="nav-links" id="navMenu">
      @foreach($navLinks as $link)
        <li><a href="{{ $link['href'] }}">{{ $link['label'] }}</a></li>
      @endforeach
    </ul>
    <a href="{{ $resumeUrl }}" class="nav-cta" download><span><i class="fas fa-download"></i>&nbsp; Download CV</span></a>
    <button class="nav-ham" id="burger"><span></span><span></span><span></span></button>
  </div>
</nav>

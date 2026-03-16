{{--
    Footer Section
    Data: $portfolio, $navLinks[], $socialLinks[]
--}}
@php
  $p    = $portfolio ?? null;
  $name = $p->name ?? 'Vikash Kumar';
  $year = date('Y');

  $navLinks = $navLinks ?? [
    ['href' => '#about',      'label' => 'About'],
    ['href' => '#skills',     'label' => 'Skills'],
    ['href' => '#experience', 'label' => 'Experience'],
    ['href' => '#projects',   'label' => 'Projects'],
    ['href' => '#contact',    'label' => 'Contact'],
  ];

  $socialLinks = $socialLinks ?? [
    ['href' => 'https://github.com/Vikashgupta95239',                  'icon' => 'fab fa-github',      'label' => 'GitHub'],
    ['href' => 'https://linkedin.com/in/vikash-kumar-computer-science', 'icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn'],
    ['href' => 'mailto:vikashkumarbth381@gmail.com',                    'icon' => 'fas fa-envelope',    'label' => 'Email'],
  ];
@endphp

<footer>
  <div class="foot-in">
    <div class="foot-logo">{{ strtoupper(substr($name,0,1)) . strtoupper(substr(str_replace(' ', '', $name),1,1)) }}.</div>
    <nav class="foot-nav">
      @foreach($navLinks as $link)
        <a href="{{ $link['href'] }}">{{ $link['label'] }}</a>
      @endforeach
    </nav>
    <div class="foot-soc">
      @foreach($socialLinks as $soc)
        <a href="{{ $soc['href'] }}" class="fsoc" aria-label="{{ $soc['label'] }}"
           {{ str_starts_with($soc['href'], 'http') ? 'target=_blank rel=noopener' : '' }}>
          <i class="{{ $soc['icon'] }}"></i>
        </a>
      @endforeach
    </div>
    <p class="foot-copy">© {{ $year }} {{ $name }} &nbsp;·&nbsp; Crafted with Laravel 12 &amp; passion &nbsp;·&nbsp; <a href="/admin">Admin Panel</a></p>
  </div>
</footer>

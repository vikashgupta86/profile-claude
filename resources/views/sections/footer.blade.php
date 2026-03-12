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
  <div class="foot-inner">

    <div class="foot-logo" aria-label="{{ $name }}">{{ $name }}</div>

    <nav class="foot-nav" aria-label="Footer navigation">
      @foreach($navLinks as $link)
        <a href="{{ $link['href'] }}">{{ $link['label'] }}</a>
      @endforeach
    </nav>

    <div class="foot-social">
      @foreach($socialLinks as $soc)
        <a href="{{ $soc['href'] }}" class="foot-soc" aria-label="{{ $soc['label'] }}"
           {{ str_starts_with($soc['href'], 'http') ? 'target=_blank rel=noopener' : '' }}>
          <i class="{{ $soc['icon'] }}" aria-hidden="true"></i>
        </a>
      @endforeach
    </div>

    <p class="foot-copy">
      © {{ $year }} {{ $name }} &nbsp;·&nbsp;
      Built with passion &nbsp;·&nbsp;
      <a href="/admin/login" target="_blank">Admin</a>
    </p>

  </div>
</footer>

<style>
/* ── Footer ── */
footer {
  background: var(--ink-1);
  border-top: 1px solid var(--brd);
  padding: clamp(32px,5.5vw,54px) var(--gutter);
}
.foot-inner {
  max-width: 1400px; margin: 0 auto;
  display: flex; flex-direction: column; align-items: center; gap: 18px;
}
.foot-logo {
  font-family: var(--serif); font-weight: 700; font-style: italic;
  font-size: clamp(1.5rem,2.8vw,2rem);
  background: linear-gradient(135deg, var(--amber), var(--amber-xl));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.foot-nav {
  display: flex; gap: clamp(12px,2.5vw,24px); flex-wrap: wrap; justify-content: center;
}
.foot-nav a {
  font-family: var(--mono); font-size: clamp(.5rem,.64vw,.6rem);
  color: var(--t-muted); text-decoration: none;
  letter-spacing: 1.5px; text-transform: uppercase; transition: color .2s;
}
.foot-nav a:hover { color: var(--amber-l); }
.foot-social { display: flex; gap: 8px; }
.foot-soc {
  width: 35px; height: 35px; border: 1px solid var(--brd);
  display: flex; align-items: center; justify-content: center;
  color: var(--t-muted); text-decoration: none; font-size: .84rem;
  transition: all .3s;
}
.foot-soc:hover { border-color: var(--amber-b); color: var(--amber-l); background: var(--amber-f); }
.foot-copy {
  font-family: var(--mono); font-size: clamp(.47rem,.6vw,.56rem);
  color: var(--t-faint); letter-spacing: .5px; text-align: center;
}
.foot-copy a { color: var(--amber-l); text-decoration: none; }
.foot-copy a:hover { text-decoration: underline; }
</style>

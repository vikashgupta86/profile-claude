{{--
    Mobile Drawer Section
    Data: $portfolio, $navLinks[], $socialLinks[]
--}}
@php
  $name = $portfolio->name ?? 'Vikash Kumar';
  $initials = strtoupper(substr($name, 0, 1)) . strtoupper(substr(strstr($name, ' '), 1, 1));
  $resumeUrl = $portfolio->resume_url ?? '#';

  $socialLinks = $socialLinks ?? [
    ['href' => 'https://github.com/Vikashgupta95239',                          'icon' => 'fab fa-github',      'label' => 'GitHub'],
    ['href' => 'https://linkedin.com/in/vikash-kumar-computer-science',         'icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn'],
    ['href' => 'mailto:vikashkumarbth381@gmail.com',                            'icon' => 'fas fa-envelope',    'label' => 'Email'],
    ['href' => 'tel:+919523919654',                                             'icon' => 'fas fa-phone',       'label' => 'Phone'],
  ];

  $navLinks = $navLinks ?? [
    ['href' => '#about',      'label' => 'About',      'index' => '01'],
    ['href' => '#skills',     'label' => 'Skills',     'index' => '02'],
    ['href' => '#experience', 'label' => 'Experience', 'index' => '03'],
    ['href' => '#projects',   'label' => 'Projects',   'index' => '04'],
    ['href' => '#contact',    'label' => 'Contact',    'index' => '05'],
  ];
@endphp

<div id="mobile-drawer" role="dialog" aria-modal="true" aria-label="Navigation menu">

  {{-- Header --}}
  <div class="drw-head">
    <span class="drw-logo" aria-hidden="true">{{ $initials }}.</span>
    <button class="drw-close" id="drawer-close" aria-label="Close menu">
      <i class="fas fa-times"></i>
    </button>
  </div>

  {{-- Nav links --}}
  <ul class="drw-nav" role="list">
    @foreach($navLinks as $link)
      <li>
        <a href="{{ $link['href'] }}" class="drw-link drawer-link">
          <span class="drw-label">{{ $link['label'] }}</span>
          <span class="drw-num">{{ $link['index'] }}</span>
        </a>
      </li>
    @endforeach
  </ul>

  {{-- Footer --}}
  <div class="drw-foot">
    <div class="drw-socials">
      @foreach($socialLinks as $soc)
        <a href="{{ $soc['href'] }}" class="drw-soc" aria-label="{{ $soc['label'] }}"
          {{ str_starts_with($soc['href'], 'http') ? 'target=_blank rel=noopener' : '' }}>
          <i class="{{ $soc['icon'] }}" aria-hidden="true"></i>
        </a>
      @endforeach
    </div>
    <a href="{{ $resumeUrl }}" class="drw-cta drawer-link" download>
      <i class="fas fa-download" aria-hidden="true"></i>
      Download Resume
    </a>
  </div>

</div>

<style>
/* ── Mobile Drawer ── */
#mobile-drawer {
  position: fixed; inset: 0; z-index: 690;
  background: rgba(13,11,9,.97);
  backdrop-filter: blur(36px);
  -webkit-backdrop-filter: blur(36px);
  display: flex; flex-direction: column;
  padding: 0 var(--gutter) clamp(28px,5vw,48px);
  transform: translateX(100%);
  transition: transform .5s var(--e2);
  overflow-y: auto;
}
#mobile-drawer.open { transform: translateX(0); }

.drw-head {
  height: 76px;
  display: flex; align-items: center; justify-content: space-between;
  border-bottom: 1px solid var(--brd);
  flex-shrink: 0;
}
.drw-logo {
  font-family: var(--serif); font-weight: 700; font-style: italic;
  font-size: 1.7rem;
  background: linear-gradient(135deg, var(--amber), var(--amber-xl));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.drw-close {
  width: 40px; height: 40px;
  border: 1px solid var(--brd); background: none;
  display: flex; align-items: center; justify-content: center;
  color: var(--t-muted); font-size: 1rem;
  transition: all .25s;
}
.drw-close:hover { border-color: var(--amber-b); color: var(--amber-l); }

/* Nav items */
.drw-nav { list-style: none; padding: clamp(24px,4vw,40px) 0; flex: 1; }
.drw-nav li {
  border-bottom: 1px solid var(--brd);
  opacity: 0; transform: translateX(24px);
  transition: opacity .4s var(--e1), transform .4s var(--e1);
}
#mobile-drawer.open .drw-nav li:nth-child(1){opacity:1;transform:none;transition-delay:.06s}
  #mobile-drawer.open .drw-nav li:nth-child(2){opacity:1;transform:none;transition-delay:.12s}
  #mobile-drawer.open .drw-nav li:nth-child(3){opacity:1;transform:none;transition-delay:.18s}
  #mobile-drawer.open .drw-nav li:nth-child(4){opacity:1;transform:none;transition-delay:.24s}
  #mobile-drawer.open .drw-nav li:nth-child(5){opacity:1;transform:none;transition-delay:.30s}
.drw-link {
  display: flex; justify-content: space-between; align-items: center;
  padding: clamp(16px,3vw,22px) 0;
  text-decoration: none;
  transition: padding-left .25s;
}
.drw-link:hover { padding-left: 10px; }
.drw-label {
  font-family: var(--serif); font-weight: 700; font-style: italic;
  font-size: clamp(1.6rem,6vw,2.6rem);
  color: var(--t-muted); line-height: 1;
  transition: color .25s;
}
.drw-link:hover .drw-label { color: var(--t-primary); }
.drw-num {
  font-family: var(--mono); font-size: .6rem;
  color: var(--amber); letter-spacing: 2px;
}

/* Footer */
.drw-foot {
  border-top: 1px solid var(--brd);
  padding-top: clamp(20px,3.5vw,32px);
  display: flex; flex-direction: column; gap: 16px;
}
.drw-socials { display: flex; gap: 10px; }
.drw-soc {
  width: 40px; height: 40px;
  border: 1px solid var(--brd); background: none;
  display: flex; align-items: center; justify-content: center;
  color: var(--t-muted); text-decoration: none; font-size: .86rem;
  transition: all .3s;
}
.drw-soc:hover { border-color: var(--amber-b); color: var(--amber-l); background: var(--amber-f); }
.drw-cta {
  display: flex; align-items: center; justify-content: center; gap: 9px;
  padding: 16px; text-decoration: none;
  background: linear-gradient(135deg, var(--amber), var(--amber-l));
  color: var(--ink-0);
  font-family: var(--sans); font-weight: 700; font-size: .92rem;
  animation: shimmer 4s linear infinite;
  background-size: 220%;
}
</style>

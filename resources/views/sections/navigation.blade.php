{{--
    Navigation Section
    Data: $portfolio (name, nav_links), $navLinks[]
--}}
@php
  $name = $portfolio->name ?? 'Vikash Kumar';
  $initials = strtoupper(substr($name, 0, 1)) . strtoupper(substr(strstr($name, ' '), 1, 1));

  $navLinks = $navLinks ?? [
    ['href' => '#about',      'label' => 'About',      'index' => '01'],
    ['href' => '#skills',     'label' => 'Skills',     'index' => '02'],
    ['href' => '#experience', 'label' => 'Experience', 'index' => '03'],
    ['href' => '#projects',   'label' => 'Projects',   'index' => '04'],
    ['href' => '#contact',    'label' => 'Contact',    'index' => '05'],
  ];

  $resumeUrl = $portfolio->resume_url ?? '#';
@endphp

<nav id="site-nav" aria-label="Main navigation">
  <div class="nav-bar">

    {{-- Logo --}}
    <a href="#hero" class="nav-logo" aria-label="{{ $name }} — Home">{{ $initials }}.</a>

    {{-- Desktop links --}}
    <ul class="nav-links" role="list">
      @foreach($navLinks as $link)
        <li>
          <a href="{{ $link['href'] }}" class="nav-link">
            <span class="nav-index">{{ $link['index'] }} /</span>
            {{ $link['label'] }}
          </a>
        </li>
      @endforeach
    </ul>

    {{-- Resume CTA --}}
    <a href="{{ $resumeUrl }}" class="nav-cta" target="_blank" rel="noopener" download>
      <span class="nav-cta-inner">
        <i class="fas fa-download" aria-hidden="true"></i>
        Resume
      </span>
    </a>

    {{-- Hamburger --}}
    <button class="nav-ham" id="nav-ham" aria-label="Toggle menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

  </div>
</nav>

<style>
/* ── Navigation ── */
#site-nav {
  position: fixed; top: 0; left: 0; right: 0;
  z-index: 700;
  transition: all .45s var(--e1);
}
.nav-bar {
  max-width: 1400px; margin: 0 auto;
  padding: 0 var(--gutter);
  height: 76px;
  display: flex; align-items: center; justify-content: space-between;
  gap: 24px;
  transition: height .4s var(--e1);
}
#site-nav.scrolled .nav-bar {
  height: 60px;
  background: rgba(13,11,9,.92);
  backdrop-filter: blur(28px);
  -webkit-backdrop-filter: blur(28px);
  border-bottom: 1px solid var(--brd);
  box-shadow: 0 2px 40px rgba(0,0,0,.6);
}

/* Logo */
.nav-logo {
  font-family: var(--serif);
  font-weight: 700; font-style: italic;
  font-size: 1.85rem; letter-spacing: -.5px;
  text-decoration: none; line-height: 1;
  background: linear-gradient(135deg, var(--amber), var(--amber-xl) 55%, var(--amber));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  flex-shrink: 0;
  position: relative;
}
.nav-logo::after {
  content: '';
  position: absolute; left: 0; bottom: -2px;
  width: 0; height: 1px;
  background: linear-gradient(90deg, var(--amber), transparent);
  transition: width .35s var(--e1);
}
.nav-logo:hover::after { width: 100%; }

/* Desktop links */
.nav-links {
  list-style: none; display: flex; align-items: center;
  gap: clamp(1.2rem, 2.6vw, 2.2rem);
  margin: 0 auto;
}
.nav-link {
  position: relative;
  font-family: var(--mono); font-size: .65rem;
  letter-spacing: 1.5px; text-transform: uppercase;
  color: var(--t-muted); text-decoration: none;
  padding-bottom: 3px;
  transition: color .25s;
  display: flex; flex-direction: column; align-items: center;
}
.nav-index {
  font-size: .46rem; color: var(--amber);
  letter-spacing: 1px; line-height: 1;
  margin-bottom: 2px; display: block;
  transition: color .25s;
}
.nav-link::after {
  content: ''; position: absolute; bottom: 0; left: 0;
  width: 0; height: 1px; background: var(--amber);
  transition: width .3s var(--e1);
}
.nav-link:hover { color: var(--t-primary); }
.nav-link:hover::after,
.nav-link.active::after { width: 100%; }
.nav-link.active { color: var(--amber-l); }
.nav-link.active .nav-index { color: var(--amber-l); }

/* CTA button */
.nav-cta {
  flex-shrink: 0;
  display: inline-flex; align-items: center; gap: 8px;
  padding: 9px 22px;
  border: 1px solid var(--amber-b);
  background: var(--amber-f);
  font-family: var(--mono); font-size: .63rem;
  letter-spacing: 1.5px; text-transform: uppercase;
  color: var(--amber); text-decoration: none;
  position: relative; overflow: hidden;
  transition: color .3s, box-shadow .3s;
}
.nav-cta::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(135deg, var(--amber), var(--amber-l));
  transform: translateX(-102%);
  transition: transform .36s var(--e1);
}
.nav-cta:hover::before { transform: translateX(0); }
.nav-cta:hover { color: var(--ink-0); box-shadow: 0 0 28px var(--amber-gg); }
.nav-cta-inner { position: relative; z-index: 1; display: flex; align-items: center; gap: 8px; }

/* Hamburger */
.nav-ham {
  display: none;
  flex-direction: column; justify-content: center; gap: 6px;
  width: 42px; height: 42px; padding: 6px;
  background: none; border: 1px solid var(--brd);
  flex-shrink: 0; transition: border-color .3s;
}
.nav-ham:hover { border-color: var(--amber-b); }
.nav-ham span {
  display: block; width: 100%; height: 1.5px;
  background: var(--t-primary);
  transition: transform .35s var(--e1), opacity .35s;
  transform-origin: center;
}
.nav-ham.open span:nth-child(1) { transform: translateY(7.5px) rotate(45deg); }
.nav-ham.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
.nav-ham.open span:nth-child(3) { transform: translateY(-7.5px) rotate(-45deg); }

/* Responsive */
@media (max-width: 1024px) {
  .nav-links, .nav-cta { display: none !important; }
  .nav-ham { display: flex; }
}
</style>

{{--
    Hero Section
    Data: $portfolio (name, title, bio, location, availability_status, stats[])
          $socialLinks[], $heroChips[]
--}}
@php
  $p = $portfolio ?? null;
  $name       = $p->name       ?? 'Vikash Kumar';
  $nameParts  = explode(' ', $name, 2);
  $firstName  = $nameParts[0];
  $lastName   = $nameParts[1] ?? '';
  $initials   = strtoupper(substr($firstName, 0, 1)) . strtoupper(substr($lastName, 0, 1));

  $title      = $p->title      ?? 'Laravel Developer';
  $bio        = $p->bio        ?? 'Building <strong>scalable web applications</strong> & government-grade CMS solutions with clean code, precision, and real-world impact across <strong>10+ projects</strong>. Specialized in <strong>REST APIs</strong>, Laravel & GIGW compliance.';
  $location   = $p->location   ?? 'New Delhi, India';
  $available  = $p->is_available ?? true;
  $resumeUrl  = $p->resume_url ?? '#';
  $image = $p?->photo ?? null;
  $imageUrl = $image ? Storage::url($image) : null;

  // Typewriter roles — pipe-separated string or array
  $typeRoles = is_array($p->type_roles ?? null)
    ? implode('|', $p->type_roles)
    : ($p->type_roles ?? 'Laravel Developer|PHP Developer|Backend Engineer|API Architect|CMS Specialist');

  // Stats
  $stats = $p->stats ?? [
    ['value' => '2+', 'label' => 'Years Exp.'],
    ['value' => '10+','label' => 'Projects'],
    ['value' => '3',  'label' => 'Companies'],
    ['value' => '6',  'label' => 'Certs'],
  ];

  // Social links
  $socialLinks = $socialLinks ?? [
    ['href' => 'https://github.com/Vikashgupta95239',                   'icon' => 'fab fa-github',      'label' => 'GitHub'],
    ['href' => 'https://linkedin.com/in/vikash-kumar-computer-science',  'icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn'],
    ['href' => 'mailto:vikashkumarbth381@gmail.com',                     'icon' => 'fas fa-envelope',    'label' => 'Email'],
    ['href' => 'tel:+919523919654',                                      'icon' => 'fas fa-phone',       'label' => 'Phone'],
  ];

  // Avatar floating chips
  $heroChips = $heroChips ?? [
    ['label' => 'Laravel 12', 'color' => '#C8860A'],
    ['label' => 'PHP 8.2',    'color' => '#4BAB7C'],
    ['label' => 'REST APIs',  'color' => '#5aaee8'],
  ];

 
@endphp

<section id="hero" aria-label="Hero">

  {{-- Background --}}
  <div class="hero-bg" aria-hidden="true">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="hero-grid"></div>
    <div class="slash sl-1"></div>
    <div class="slash sl-2"></div>
  </div>

  <div class="hero-wrap">

    {{-- ── LEFT CONTENT ── --}}
    <div class="hero-content">

      {{-- Availability pill --}}
      <div class="eyebrow">
        <span class="status-dot {{ $available ? 'live' : 'busy' }}" aria-hidden="true"></span>
        {{ $available ? 'Open to Full-Time' : 'Currently Busy' }}
        &nbsp;·&nbsp; {{ $location }}
      </div>

      {{-- Name --}}
      <h1 class="hero-name">
        <span class="name-first">{{ strtoupper($firstName) }}</span>
        <span class="name-last">{{ strtoupper($lastName) }}</span>
      </h1>

      {{-- Typewriter --}}
      <div class="role-row">
        <div class="role-pipe" aria-hidden="true"></div>
        <div class="role-text">
          <span id="typewriter" data-roles="{{ $typeRoles }}">{{ $title }}</span><span class="cursor-blink" aria-hidden="true">_</span>
        </div>
      </div>

      {{-- Bio --}}
      <p class="hero-bio">{!! $bio !!}</p>

      {{-- Stats --}}
      <div class="hero-stats" role="list">
        @foreach($stats as $stat)
          <div class="stat" role="listitem">
            <div class="stat-value">{{ $stat['value'] }}</div>
            <div class="stat-label">{{ $stat['label'] }}</div>
          </div>
        @endforeach
      </div>

      {{-- CTA buttons --}}
      <div class="hero-btns">
        <a href="{{ $resumeUrl }}" class="btn-primary" download>
          <i class="fas fa-download" aria-hidden="true"></i>Download CV
        </a>
        <a href="#projects" class="btn-secondary">
          <i class="fas fa-code" aria-hidden="true"></i>View Projects
        </a>
        <a href="#contact" class="btn-ghost">
          <i class="fas fa-paper-plane" aria-hidden="true"></i>Hire Me
        </a>
      </div>

      {{-- Social row --}}
      <div class="hero-social">
        <span class="social-label" aria-hidden="true">Connect</span>
        @foreach($socialLinks as $soc)
          <a href="{{ $soc['href'] }}" class="social-ico"
             aria-label="{{ $soc['label'] }}"
             {{ str_starts_with($soc['href'], 'http') ? 'target=_blank rel=noopener' : '' }}>
            <i class="{{ $soc['icon'] }}" aria-hidden="true"></i>
          </a>
        @endforeach
      </div>

    </div>

    {{-- ── RIGHT — Avatar ── --}}
    <div class="hero-avatar" aria-hidden="true">
      <div class="av-shell">
        <div class="av-ring-1"></div>
        <div class="av-ring-2"></div>
        <div class="av-frame">
          <div class="av-inner">
            @if($imageUrl)
            <div class="av-monogram"> <img src="{{ $imageUrl }}" alt="Vikash Kumar"></div>
          @else
            <div class="av-monogram">VK</div>
          @endif
           </div>
        </div>
        <div class="av-badge">
          <span class="status-dot live"></span>
          {{ $available ? 'Available for Work' : 'In a Project' }}
        </div>

        {{-- Floating chips --}}
        @foreach($heroChips as $i => $chip)
        
          <div class="av-chip chip-{{ $i + 1 }}">
            <span class="chip-dot" style="background: {{ $chip['color'] }}"></span>
        
            {{ $chip['label'] }}
      
          </div>
        
        @endforeach
        
      </div>
    </div>

  </div>

  {{-- Scroll indicator --}}
  <div class="scroll-cue" aria-hidden="true">
    <span>Scroll</span>
    <div class="scroll-line"></div>
  </div>

</section>

<style>
/* ── Hero ── */
#hero {
  min-height: 100svh;
  position: relative;
  display: flex; align-items: center;
  overflow: hidden; background: var(--ink-0);
}

/* Background layers */
.hero-bg { position: absolute; inset: 0; overflow: hidden; z-index: 0; pointer-events: none; }
.orb {
  position: absolute; border-radius: 50%;
  filter: blur(110px);
}
.orb-1 {
  width: min(860px, 130vw); aspect-ratio: 1;
  top: -25%; right: -18%;
  background: radial-gradient(circle, rgba(200,134,10,.08), transparent 68%);
  animation: orbFloat 22s ease-in-out infinite alternate;
}
.orb-2 {
  width: min(550px, 90vw); aspect-ratio: 1;
  bottom: -22%; left: -8%;
  background: radial-gradient(circle, rgba(74,171,124,.035), transparent 68%);
  animation: orbFloat 17s ease-in-out infinite alternate-reverse;
}
@keyframes orbFloat { 0% { transform: translate(0,0); } 100% { transform: translate(38px, 46px); } }

.hero-grid {
  position: absolute; inset: 0;
  background-image:
    linear-gradient(rgba(200,134,10,.022) 1px, transparent 1px),
    linear-gradient(90deg, rgba(200,134,10,.022) 1px, transparent 1px);
  background-size: 70px 70px;
}
.slash {
  position: absolute; top: 0;
  width: 1px; height: 100%;
  background: linear-gradient(transparent, rgba(200,134,10,.07), transparent);
}
.sl-1 { right: 22%; transform: skewX(-12deg); }
.sl-2 { right: 37%; transform: skewX(-12deg); opacity: .3; }

/* Hero layout */
.hero-wrap {
  position: relative; z-index: 2;
  width: 100%; max-width: 1400px; margin: 0 auto;
  padding: calc(76px + clamp(36px,6vw,72px)) var(--gutter) clamp(40px,6vw,72px);
  display: grid;
  grid-template-columns: 1fr minmax(0, min(400px, 36vw));
  gap: clamp(40px, 6vw, 96px);
  align-items: center;
  min-height: 100svh;
}

/* Eyebrow pill */
.eyebrow {
  display: inline-flex; align-items: center; gap: 10px;
  border: 1px solid var(--amber-b); background: var(--amber-f);
  padding: 6px 16px; margin-bottom: clamp(16px,2.8vw,28px);
  font-family: var(--mono); font-size: clamp(.5rem,.7vw,.61rem);
  color: var(--amber-l); letter-spacing: 2.5px; text-transform: uppercase;
  opacity: 0; animation: slideUp .6s .2s both;
}
.status-dot {
  width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0;
}
.status-dot.live {
  background: var(--green);
  box-shadow: 0 0 0 3px rgba(75,171,124,.22);
  animation: pulse 2s ease-in-out infinite;
}
.status-dot.busy {
  background: var(--amber-l);
  box-shadow: 0 0 0 3px rgba(200,134,10,.22);
}

/* Hero name */
h1.hero-name {
  font-family: var(--serif); font-weight: 700;
  font-size: clamp(3.5rem, 10vw, 11rem);
  line-height: .82; letter-spacing: -2px;
  margin-bottom: clamp(14px,2.2vw,22px);
  opacity: 0; animation: slideUp .9s .34s both;
}
.name-first { display: block; color: var(--t-primary); }
.name-last {
  display: block; font-style: italic;
  background: linear-gradient(110deg, var(--amber) 0%, var(--amber-xl) 30%, var(--amber-l) 60%, var(--amber) 100%);
  background-size: 220%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  animation: shimmer 5s linear infinite;
}

/* Role row */
.role-row {
  display: flex; align-items: center; gap: 13px;
  margin-bottom: clamp(16px, 2.5vw, 26px);
  opacity: 0; animation: slideUp .6s .52s both;
}
.role-pipe {
  width: 3px; height: clamp(20px,2.8vw,28px);
  background: linear-gradient(var(--amber), var(--amber-l));
  border-radius: 2px; flex-shrink: 0;
}
.role-text {
  font-family: var(--mono); font-size: clamp(.76rem,1.15vw,.96rem);
  color: var(--amber-l); display: flex; align-items: center; gap: 4px;
}
.cursor-blink { animation: blink .75s step-end infinite; color: var(--amber); }

/* Bio */
.hero-bio {
  font-family: var(--sans); font-size: clamp(.86rem,1.1vw,1rem);
  font-weight: 400; color: var(--t-secondary); line-height: 1.9;
  max-width: 520px; margin-bottom: clamp(22px,3.5vw,36px);
  opacity: 0; animation: slideUp .6s .68s both;
}
.hero-bio strong { color: var(--parch-1); font-weight: 600; }

/* Stats */
.hero-stats {
  display: flex; flex-wrap: wrap;
  margin-bottom: clamp(22px,3.5vw,36px);
  opacity: 0; animation: slideUp .6s .8s both;
}
.stat {
  padding: clamp(9px,1.6vw,16px) clamp(14px,2.2vw,28px);
  border: 1px solid var(--brd); border-left: none;
  text-align: center; transition: all .3s;
  position: relative; min-width: 68px; flex: 1;
}
.stat:first-child { border-left: 1px solid var(--brd); }
.stat::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0;
  height: 1px; background: linear-gradient(90deg, transparent, var(--amber), transparent);
  transform: scaleX(0); transition: transform .4s var(--e1);
}
.stat:hover::after { transform: scaleX(1); }
.stat:hover { background: var(--amber-f); }
.stat-value {
  font-family: var(--serif); font-weight: 700;
  font-size: clamp(1.7rem,3.5vw,2.7rem);
  line-height: 1;
  background: linear-gradient(135deg, var(--amber), var(--amber-xl));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.stat-label {
  font-family: var(--mono);
  font-size: clamp(.44rem,.6vw,.54rem);
  color: var(--t-faint); letter-spacing: 2px;
  margin-top: 5px; text-transform: uppercase;
}

/* Buttons */
.hero-btns {
  display: flex; flex-wrap: wrap; gap: clamp(8px,1.2vw,12px);
  margin-bottom: clamp(22px,3.5vw,36px);
  opacity: 0; animation: slideUp .6s .9s both;
}
.btn-primary {
  display: inline-flex; align-items: center; gap: 8px;
  padding: clamp(11px,1.4vw,15px) clamp(20px,2.8vw,30px);
  background: linear-gradient(135deg, var(--amber), var(--amber-l) 50%, var(--amber));
  background-size: 220%; color: var(--ink-0);
  font-family: var(--sans); font-weight: 700;
  font-size: clamp(.78rem,.98vw,.9rem);
  text-decoration: none; border: none;
  transition: transform .3s, box-shadow .3s;
  animation: shimmer 5s linear infinite;
}
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 14px 36px rgba(200,134,10,.3); }
.btn-secondary {
  display: inline-flex; align-items: center; gap: 8px;
  padding: clamp(10px,1.4vw,14px) clamp(18px,2.8vw,26px);
  background: transparent; border: 1px solid var(--amber-b);
  color: var(--amber-l); font-family: var(--sans); font-weight: 500;
  font-size: clamp(.78rem,.98vw,.9rem); text-decoration: none;
  transition: all .3s;
}
.btn-secondary:hover { background: var(--amber-f); border-color: var(--amber); color: var(--amber); transform: translateY(-3px); }
.btn-ghost {
  display: inline-flex; align-items: center; gap: 8px;
  padding: clamp(10px,1.4vw,14px) clamp(16px,2.5vw,22px);
  background: transparent; border: 1px solid var(--brd);
  color: var(--t-muted); font-family: var(--sans);
  font-size: clamp(.78rem,.98vw,.9rem); text-decoration: none;
  transition: all .3s;
}
.btn-ghost:hover { border-color: rgba(244,238,228,.18); color: var(--t-primary); transform: translateY(-3px); }

/* Social */
.hero-social {
  display: flex; align-items: center; flex-wrap: wrap; gap: 0;
  opacity: 0; animation: slideUp .6s 1s both;
}
.social-label {
  font-family: var(--mono); font-size: .5rem;
  color: var(--t-faint); letter-spacing: 3px; text-transform: uppercase;
  margin-right: 14px;
}
.social-ico {
  width: 40px; height: 40px;
  border: 1px solid var(--brd); border-left: none;
  display: flex; align-items: center; justify-content: center;
  color: var(--t-muted); text-decoration: none; font-size: .85rem;
  transition: all .3s;
}
.social-ico:first-of-type { border-left: 1px solid var(--brd); }
.social-ico:hover { background: var(--amber-f); color: var(--amber-l); border-color: var(--amber-b); }

/* ── Avatar ── */
.hero-avatar {
  display: flex; align-items: center; justify-content: center;
  opacity: 0; animation: fadeIn 1.2s 1.3s both;
}
.av-shell {
  position: relative;
  width: clamp(200px, 30vw, 380px);
  aspect-ratio: 1;
}
.av-ring-1 {
  position: absolute; inset: -38px; border-radius: 50%;
  border: 1px solid rgba(200,134,10,.1);
  animation: spin 28s linear infinite;
}
.av-ring-1::before {
  content: ''; position: absolute;
  width: 11px; height: 11px; border-radius: 50%;
  background: var(--amber); top: 50%; left: -5.5px;
  transform: translateY(-50%);
  box-shadow: 0 0 14px 4px rgba(200,134,10,.5);
}
.av-ring-1::after {
  content: ''; position: absolute;
  width: 7px; height: 7px; border-radius: 50%;
  background: var(--amber-l); bottom: 10%; right: -3.5px;
  box-shadow: 0 0 10px 3px rgba(200,134,10,.4);
}
.av-ring-2 {
  position: absolute; inset: -13px; border-radius: 50%;
  border: 1px dashed rgba(200,134,10,.1);
  animation: spin 18s linear infinite reverse;
}
.av-frame {
  position: absolute; inset: 0; border-radius: 50%; padding: 3px;
  background: linear-gradient(135deg, var(--amber), var(--amber-xl) 28%, rgba(200,134,10,.25) 58%, var(--amber-l));
  box-shadow: 0 0 55px rgba(200,134,10,.2), 0 0 120px rgba(200,134,10,.08);
  animation: glow 5s ease-in-out infinite;
}
.av-inner {
  width: 100%; height: 100%; border-radius: 50%;
  overflow: hidden; background: var(--ink-2);
  display: flex; align-items: center; justify-content: center;
}
.av-monogram {
  font-family: var(--serif); font-style: italic; font-weight: 700;
  font-size: clamp(3.5rem, 9vw, 7rem);
  background: linear-gradient(135deg, var(--amber), var(--amber-xl));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.av-badge {
  position: absolute; bottom: -14px; left: 50%; transform: translateX(-50%);
  white-space: nowrap;
  background: linear-gradient(135deg, var(--ink-1), var(--ink-2));
  border: 1px solid var(--amber-b);
  padding: 8px 20px;
  font-family: var(--mono); font-size: clamp(.5rem,.7vw,.61rem);
  color: var(--amber-l); letter-spacing: 2px; text-transform: uppercase;
  display: flex; align-items: center; gap: 9px;
  box-shadow: 0 6px 24px rgba(0,0,0,.5);
}
.av-chip {
  position: absolute; white-space: nowrap;
  background: rgba(13,11,9,.94); border: 1px solid var(--brd);
  backdrop-filter: blur(14px);
  padding: 8px 13px;
  font-family: var(--mono); font-size: .6rem; color: var(--t-primary);
  display: flex; align-items: center; gap: 7px;
  box-shadow: 0 5px 24px rgba(0,0,0,.5);
  transition: border-color .3s;
}
.av-chip:hover { border-color: var(--amber-b); }
.chip-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
.chip-1 { top: 5%;  right: -26%; animation: float 4s ease-in-out infinite; }
.chip-2 { bottom: 13%; right: -24%; animation: float 4s 1.3s ease-in-out infinite; }
.chip-3 { top: 38%; left: -30%; animation: float 4s .7s ease-in-out infinite; }

/* Scroll cue */
.scroll-cue {
  position: absolute; bottom: clamp(18px,3.5vw,36px);
  left: 50%; transform: translateX(-50%);
  display: flex; flex-direction: column; align-items: center; gap: 7px;
  z-index: 2; opacity: 0; animation: fadeIn 1s 3s both;
}
.scroll-cue span {
  font-family: var(--mono); font-size: .48rem;
  color: var(--t-faint); letter-spacing: 4px; text-transform: uppercase;
}
.scroll-line {
  width: 1px; height: 44px; overflow: hidden; position: relative;
}
.scroll-line::after {
  content: ''; position: absolute; top: -100%; left: 0;
  width: 100%; height: 100%;
  background: linear-gradient(transparent, var(--amber), transparent);
  animation: drop 2.3s ease-in-out infinite;
}

/* ── Responsive ── */
@media (max-width: 1024px) {
  .hero-wrap { grid-template-columns: 1fr; padding-top: calc(62px + 28px); min-height: auto; gap: 36px; }
  .hero-avatar { order: -1; }
  .av-shell { width: clamp(180px, 46vw, 260px); }
  .av-chip { display: none !important; }
  .hero-bio { max-width: 100%; }
}
@media (max-width: 768px) {
  .hero-stats { display: grid; grid-template-columns: 1fr 1fr; }
  .stat { border-left: 1px solid var(--brd) !important; }
  .hero-btns { flex-direction: column; }
  .hero-btns a { width: 100%; justify-content: center; }
  .social-label { display: none; }
}
</style>

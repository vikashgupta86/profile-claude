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

{{--
    Hero Section
    Data: $portfolio (name, title, bio, location, availability_status, stats[])
          $socialLinks[], $heroChips[]
--}}
@php
    $p = $portfolio ?? null;

    $name = $p->name ?? 'Vikash Kumar';
    $nameParts = explode(' ', $name, 2);
    $firstName = $nameParts[0];
    $lastName = $nameParts[1] ?? '';
    $title = $p->title ?? 'Laravel Developer';
    $bio =
        $p->bio ??
        'Building <strong>scalable web applications</strong> & government-grade CMS solutions with clean code, precision, and real-world impact across <strong>10+ projects</strong>. Specialized in <strong>REST APIs</strong> & GIGW compliance.';
    $location = $p->location ?? 'New Delhi, India';
    $available = $p->is_available ?? true;
    $resumeUrl = $p->resume_url ?? '#';

    // Typewriter roles - pipe-separated string or array
    $typeRoles = is_array($p->type_roles ?? null)
        ? implode('|', $p->type_roles)
        : $p->type_roles ?? 'Laravel Developer|PHP Developer|Backend Engineer|API Architect|CMS Specialist';

    // Stats
    $stats = $p->stats ?? [
        ['value' => '2+', 'label' => 'Years Exp.'],
        ['value' => '10+', 'label' => 'Projects'],
        ['value' => '3', 'label' => 'Companies'],
        ['value' => '6', 'label' => 'Certifications'],
    ];

    // Social links
    $socialLinks = $socialLinks ?? [
        ['href' => 'https://github.com/Vikashgupta95239', 'icon' => 'fab fa-github', 'label' => 'GitHub'],
        [
            'href' => 'https://linkedin.com/in/vikash-kumar-computer-science',
            'icon' => 'fab fa-linkedin-in',
            'label' => 'LinkedIn',
        ],
        ['href' => 'mailto:vikashkumarbth381@gmail.com', 'icon' => 'fas fa-envelope', 'label' => 'Email'],
        ['href' => 'tel:+919523919654', 'icon' => 'fas fa-phone', 'label' => 'Phone'],
    ];

    // Avatar floating chips
    $heroChips = $heroChips ?? [
        ['label' => 'Laravel 12', 'color' => 'var(--gold)'],
        ['label' => 'PHP 8.2', 'color' => '#78d97a'],
        ['label' => 'REST APIs', 'color' => '#6ab8f7'],
    ];
@endphp

<section id="hero">
    <div class="h-bg">
        <div class="h-orb1"></div>
        <div class="h-orb2"></div>
        <div class="h-grid"></div>
        <div class="h-diag"></div>
        <div class="h-diag2"></div>
    </div>
    <div class="hero-in">
        <div class="hero-left">
            <div class="h-eyebrow">
                <div class="h-dot"></div>{{ $available ? 'Open to Full-Time Opportunities' : 'Currently Busy' }}
                &nbsp;·&nbsp; {{ $location }}
            </div>
            <h1 class="h-name"><span class="n1">{{ strtoupper($firstName) }}</span><span
                    class="n2">{{ strtoupper($lastName) }}</span></h1>
            <div class="h-role">
                <div class="h-role-bar"></div>
                <div class="h-role-text"><span id="tw"
                        data-roles="{{ $typeRoles }}">{{ $title }}</span><span class="rcursor">_</span></div>
            </div>
            <p class="h-bio">{!! $bio !!}</p>
            <div class="h-stats">
                @foreach ($stats as $stat)
                    <div class="hst">
                        <div class="hst-n">{{ $stat['value'] }}</div>
                        <div class="hst-l">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
            <div class="h-btns">
                <a href="{{ $resumeUrl }}" class="btn-g" download><i class="fas fa-download"></i> Download CV</a>
                <a href="#projects" class="btn-o"><i class="fas fa-code"></i> View Projects</a>
                <a href="#contact" class="btn-w"><i class="fas fa-paper-plane"></i> Hire Me</a>
            </div>
            <div class="h-soc">
                <span class="h-soc-lbl">CONNECT</span>
                @foreach ($socialLinks as $soc)
                    <a href="{{ $soc['href'] }}" class="soc" aria-label="{{ $soc['label'] }}"
                        {{ str_starts_with($soc['href'], 'http') ? 'target=_blank rel=noopener' : '' }}>
                        <i class="{{ $soc['icon'] }}"></i>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="h-right">
            <div class="av">
                <div class="av-r1"></div>
                <div class="av-r2"></div>
                <div class="av-frame">

                    @if($imageUrl)
                      <div class="av-mono"> <img src="{{ $imageUrl }}" alt="Vikash Kumar"></div>
                    @else
                      <div class="av-mono">VK</div>
                    @endif
                  
                    {{-- <div class="av-in">
                        <div class="av-mono">{{ strtoupper(substr($firstName, 0, 1) . substr($lastName, 0, 1)) }}</div>
                    </div> --}}
                </div>
                <div class="av-badge">
                    <div class="h-dot"></div>{{ $available ? 'Available for Work' : 'In a Project' }}
                </div>
                @foreach ($heroChips as $i => $chip)
                    <div class="av-chip c{{ $i + 1 }}"><span class="cdot"
                            style="background:{{ $chip['color'] }}"></span>{{ $chip['label'] }}</div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="scroll-cue"><span>SCROLL</span>
        <div class="sc-line"></div>
    </div>
</section>





 
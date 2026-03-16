{{--
    About Section
    Data: $portfolio, $timeline[], $strengths[]
--}}

@php
  $p = $portfolio ?? null;

  $name        = $p->name        ?? 'Vikash Kumar';
  $role        = $p->title       ?? 'Laravel - PHP - API Developer';
  $location    = $p->location    ?? 'New Delhi';
  $available   = $p->is_available ?? true;
  $degree      = $p->degree      ?? 'B.Tech CSE - 8.33';
  $email       = $p->email       ?? 'vikashkumarbth381@gmail.com';
  $phone       = $p->phone       ?? '+91 95239 19654';
  $github      = $p->github      ?? 'https://github.com/Vikashgupta95239';
  $linkedin    = $p->linkedin    ?? 'https://linkedin.com/in/vikash-kumar-computer-science';
  $githubHandle = $p->github_handle ?? 'Vikashgupta95239';
  $linkedinHandle = $p->linkedin_handle ?? 'vikash-kumar-cs';

  $stats = $p->stats ?? [
    ['count' => 2, 'suffix' => '+', 'label' => 'Years Exp.'],
    ['count' => 10,'suffix' => '+', 'label' => 'Projects'],
    ['count' => 3, 'suffix' => '',  'label' => 'Companies'],
    ['count' => 6, 'suffix' => '',  'label' => 'Certs'],
  ];

  $aboutParagraphs = $p->about_paragraphs ?? [
    'Dedicated <strong>Laravel Developer</strong> with 2+ years of experience building scalable web applications and government-grade CMS platforms. I specialize in REST API integration, database optimization, and clean backend architecture.',
    'My proudest achievements include delivering <strong>GIGW & DBIM 3.0 compliant portals</strong> - government-standard solutions combining accessibility, security, and performance, serving thousands of real users across India.',
    'I write code that\'s not just functional - it\'s <strong>maintainable, scalable, and built to last</strong>. Every project receives my full attention to detail.',
  ];

  $timeline = $timeline ?? [
    ['role' => 'PHP Developer',             'company' => 'Webflit Technologies - New Delhi',  'period' => 'Jan 2025 - Present', 'current' => true],
    ['role' => 'Jr. PHP / Laravel Developer','company' => 'Megamind Softwares - New Delhi',   'period' => 'Oct 2023 - Dec 2024','current' => false],
    ['role' => 'Web Development Intern',    'company' => 'Zeetaminds Technologies - Bhopal',  'period' => 'Apr - Sep 2023',     'current' => false],
  ];

  $strengths = $strengths ?? [
    'Problem Solving','REST API Design','GIGW Compliance','WCAG / A11y',
    'DB Optimization','Team Collaboration','Quick Learner','Deadline-Driven',
  ];

  $tags = $p->tags ?? [
    '<i class="fas fa-map-marker-alt"></i> ' . e($location) . ', India',
    '<i class="fas fa-circle" style="font-size:.4rem;color:var(--green)"></i> ' . ($available ? 'Full-Time Available' : 'Currently Busy'),
    e($degree) . ' CGPA',
    'GIGW Compliant',
  ];
@endphp

<!-- ABOUT -->
<section id="about" class="section">
<div class="sec-max">
  <div class="about-grid">
    <div class="info-stack rv">
      <div class="prof-card">
        <div class="pc-name">{{ $name }}</div>
        <div class="pc-role">{{ $role }}</div>
        <div class="pc-tags">
          @foreach($tags as $tag)
            <span class="pc-tag">{!! $tag !!}</span>
          @endforeach
        </div>
      </div>
      <div class="stats-quad">
        @foreach($stats as $stat)
          <div class="sq">
            {{-- <div class="sq-n" data-t="{{ $stat['count'] }}" @if(!empty($stat['suffix'])) data-s="{{ $stat['suffix'] }}" @endif>0</div> --}}
            <div class="sq-l">{{ $stat['label'] }}</div>
          </div>
        @endforeach
      </div>
      <div class="cs-strip">
        <div class="cs-row"><div class="cs-ico"><i class="fas fa-envelope"></i></div><div><div class="cs-lbl">EMAIL</div><div class="cs-val"><a href="mailto:{{ $email }}">{{ $email }}</a></div></div></div>
        <div class="cs-row"><div class="cs-ico"><i class="fas fa-phone"></i></div><div><div class="cs-lbl">PHONE</div><div class="cs-val"><a href="tel:{{ preg_replace('/\s+/', '', $phone) }}">{{ $phone }}</a></div></div></div>
        <div class="cs-row"><div class="cs-ico"><i class="fab fa-github"></i></div><div><div class="cs-lbl">GITHUB</div><div class="cs-val"><a href="{{ $github }}" target="_blank" rel="noopener">{{ $githubHandle }}</a></div></div></div>
        <div class="cs-row"><div class="cs-ico"><i class="fab fa-linkedin-in"></i></div><div><div class="cs-lbl">LINKEDIN</div><div class="cs-val"><a href="{{ $linkedin }}" target="_blank" rel="noopener">{{ $linkedinHandle }}</a></div></div></div>
      </div>
    </div>
    <div class="about-right rv d1">
      <div class="sec-eye">Who I Am</div>
      <h2 class="sec-h">About <em>Me</em></h2>
      @foreach($aboutParagraphs as $para)
        <p class="ap">{!! $para !!}</p>
      @endforeach
      <div class="xp-mini">
        <div class="xpm-lbl">Career Timeline</div>
        @foreach($timeline as $item)
          <div class="xpm-row"><div class="xpm-dot {{ $item['current'] ? 'live' : '' }}"></div><div><div class="xpm-role">{{ $item['role'] }}</div><div class="xpm-co">{{ $item['company'] }}</div></div><div class="xpm-yr">{{ $item['period'] }}</div></div>
        @endforeach
      </div>
      <div class="sec-eye" style="margin-top:32px">Core Strengths</div>
      <div class="str-tags">
        @foreach($strengths as $s)
          <span class="str">{{ $s }}</span>
        @endforeach
      </div>
    </div>
  </div>
</div>
</section>

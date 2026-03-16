{{--
    Projects Section
    Data: $projects[] - each: {
      category, title, description, image_url (optional), tags[], github_url, live_url, confidential (bool)
    }
    $projectFilters[] - category slugs to show as filter buttons
--}}
@php
  $projects = $projects ?? [
    [
      'category'     => 'government',
      'title'        => 'Government Ministry Portal',
      'description'  => 'GIGW & DBIM 3.0 compliant portal with multilingual support, serving 50,000+ citizens.',
      'image_url'    => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=640&h=400&fit=crop&q=75',
      'tags'         => ['Laravel','PHP','MySQL','GIGW'],
      'github_url'   => null,
      'live_url'     => null,
      'confidential' => true,
    ],
    [
      'category'     => 'api',
      'title'        => 'REST API Job-to-PHP Platform',
      'description'  => 'Robust RESTful API system with JWT auth, rate limiting, and full Swagger documentation.',
      'image_url'    => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=640&h=400&fit=crop&q=75',
      'tags'         => ['Laravel','REST API','JWT'],
      'github_url'   => 'https://github.com/Vikashgupta95239',
      'live_url'     => null,
      'confidential' => false,
    ],
    [
      'category'     => 'laravel',
      'title'        => 'PHP Backend Module Review',
      'description'  => 'Modular Laravel backend with multi-role auth, dynamic forms, and scheduled task management.',
      'image_url'    => 'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=640&h=400&fit=crop&q=75',
      'tags'         => ['Laravel 10','Blade','MySQL'],
      'github_url'   => 'https://github.com/Vikashgupta95239',
      'live_url'     => null,
      'confidential' => false,
    ],
    [
      'category'     => 'php',
      'title'        => 'Web Application Dashboard',
      'description'  => 'Real-time analytics dashboard with chart visualizations, export features, and role-based reporting.',
      'image_url'    => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=640&h=400&fit=crop&q=75',
      'tags'         => ['PHP','CakePHP','Chart.js'],
      'github_url'   => 'https://github.com/Vikashgupta95239',
      'live_url'     => null,
      'confidential' => false,
    ],
    [
      'category'     => 'laravel',
      'title'        => 'E-Commerce Backend Platform',
      'description'  => 'Full-featured e-commerce with inventory management and Razorpay payment integration.',
      'image_url'    => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=640&h=400&fit=crop&q=75',
      'tags'         => ['Laravel 11','Razorpay','Redis'],
      'github_url'   => 'https://github.com/Vikashgupta95239',
      'live_url'     => null,
      'confidential' => false,
    ],
    [
      'category'     => 'government',
      'title'        => 'Accessibility Compliance Tool',
      'description'  => 'Automated WCAG 2.1 checker integrated into CMS to detect and fix accessibility violations.',
      'image_url'    => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=640&h=400&fit=crop&q=75',
      'tags'         => ['Laravel','WCAG','PHP'],
      'github_url'   => null,
      'live_url'     => null,
      'confidential' => true,
    ],
  ];

  $projectFilters = $projectFilters ?? [
    ['value' => 'all',        'label' => 'All'],
    ['value' => 'laravel',    'label' => 'Laravel'],
    ['value' => 'php',        'label' => 'PHP'],
    ['value' => 'api',        'label' => 'API'],
    ['value' => 'government', 'label' => 'Government'],
  ];
@endphp

<!-- PROJECTS -->
<section id="projects" class="section">
<div class="sec-max">
  <div class="proj-hd rv">
    <div><div class="sec-eye">Portfolio</div><h2 class="sec-h" style="margin-bottom:0">My <em>Projects</em></h2></div>
    <div class="pfilt">
      @foreach($projectFilters as $filter)
        <button type="button" class="pf {{ $loop->first ? 'on' : '' }}" data-f="{{ $filter['value'] }}">{{ $filter['label'] }}</button>
      @endforeach
    </div>
  </div>
  <div class="proj-grid rv d1" id="pg">
    @foreach($projects as $project)
      <div class="proj-card" data-cat="{{ $project['category'] }}"><div class="proj-thumb">
        @if(!empty($project['image_url']))
          <img src="{{ $project['image_url'] }}" alt="" loading="lazy">
        @else
          <div class="proj-thumb"></div>
        @endif
        <div class="proj-bar"><div class="bd" style="background:#ff5f57"></div><div class="bd" style="background:#ffbd2e"></div><div class="bd" style="background:#28c840"></div><div class="proj-url"></div></div><div class="proj-ov">
          @if($project['confidential'])
            <span class="pov"><i class="fas fa-lock"></i></span>
          @else
            @if(!empty($project['github_url']))
              <a href="{{ $project['github_url'] }}" target="_blank" class="pov"><i class="fab fa-github"></i></a>
            @endif
          @endif
        </div></div><div class="proj-body"><div class="proj-cat">{{ strtoupper($project['category']) }}</div><h3 class="proj-title">{{ $project['title'] }}</h3><p class="proj-desc">{{ $project['description'] }}</p><div class="proj-tags">
          @foreach($project['tags'] as $tag)
            <span class="proj-tag">{{ $tag }}</span>
          @endforeach
        </div><div class="proj-links">
          @if($project['confidential'])
            <span class="proj-link" style="opacity:.4;cursor:default"><i class="fas fa-lock"></i> Confidential</span>
          @else
            @if(!empty($project['github_url']))
              <a href="{{ $project['github_url'] }}" target="_blank" class="proj-link"><i class="fab fa-github"></i> GitHub</a>
            @endif
          @endif
        </div></div></div>
    @endforeach
  </div>
</div>
</section>

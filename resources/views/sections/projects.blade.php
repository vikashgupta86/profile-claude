{{--
    Projects Section
    Data: $projects[] — each: {
      category, title, description, image_url (optional), tags[], github_url, live_url, confidential (bool)
    }
    $projectFilters[] — category slugs to show as filter buttons
--}}
@php
  $projects = $projects ?? [
    [
      'category'     => 'government',
      'title'        => 'Government Ministry Portal',
      'description'  => 'GIGW & DBIM 3.0 compliant portal with multilingual support serving 50,000+ citizens.',
      'image_url'    => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=600&h=380&fit=crop&q=70',
      'tags'         => ['Laravel','PHP','MySQL','GIGW'],
      'github_url'   => null,
      'live_url'     => null,
      'confidential' => true,
    ],
    [
      'category'     => 'api',
      'title'        => 'REST API Job-to-PHP Platform',
      'description'  => 'Robust RESTful API with JWT auth, rate limiting & Swagger documentation.',
      'image_url'    => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&h=380&fit=crop&q=70',
      'tags'         => ['Laravel','REST API','JWT'],
      'github_url'   => 'https://github.com/Vikashgupta95239',
      'live_url'     => null,
      'confidential' => false,
    ],
    [
      'category'     => 'laravel',
      'title'        => 'PHP Backend Module Review',
      'description'  => 'Modular Laravel backend with multi-role auth, dynamic forms & scheduled tasks.',
      'image_url'    => 'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=600&h=380&fit=crop&q=70',
      'tags'         => ['Laravel 10','Blade','MySQL'],
      'github_url'   => 'https://github.com/Vikashgupta95239',
      'live_url'     => null,
      'confidential' => false,
    ],
    [
      'category'     => 'php',
      'title'        => 'Web Application Dashboard',
      'description'  => 'Real-time analytics with chart visualizations, export & role-based reporting.',
      'image_url'    => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=600&h=380&fit=crop&q=70',
      'tags'         => ['PHP','CakePHP','Chart.js'],
      'github_url'   => 'https://github.com/Vikashgupta95239',
      'live_url'     => null,
      'confidential' => false,
    ],
    [
      'category'     => 'laravel',
      'title'        => 'E-Commerce Backend Platform',
      'description'  => 'Full-featured e-commerce with inventory management & Razorpay integration.',
      'image_url'    => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=380&fit=crop&q=70',
      'tags'         => ['Laravel 11','Razorpay','Redis'],
      'github_url'   => 'https://github.com/Vikashgupta95239',
      'live_url'     => null,
      'confidential' => false,
    ],
    [
      'category'     => 'government',
      'title'        => 'Accessibility Compliance Tool',
      'description'  => 'Automated WCAG 2.1 checker integrated into CMS to detect accessibility violations.',
      'image_url'    => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=380&fit=crop&q=70',
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
    ['value' => 'government', 'label' => "Gov't"],
  ];
@endphp

<section id="projects" class="sec" style="background: var(--ink-0);">
  <div class="sec-in">

    {{-- Header + filters --}}
    <div class="proj-header rv">
      <div>
        <div class="tag">Portfolio</div>
        <h2 class="sh" style="margin-bottom:0">My <em>Projects</em></h2>
      </div>
      <div class="proj-filters" role="group" aria-label="Filter projects">
        @foreach($projectFilters as $filter)
          <button
            class="proj-filter {{ $loop->first ? 'active' : '' }}"
            data-filter="{{ $filter['value'] }}"
            aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
          >{{ $filter['label'] }}</button>
        @endforeach
      </div>
    </div>

    {{-- Project grid --}}
    <div class="proj-grid rv d1" id="project-grid">
      @foreach($projects as $project)
        <article class="project-card rv" data-category="{{ $project['category'] }}">

          {{-- Thumbnail --}}
          <div class="proj-thumb">
            @if(!empty($project['image_url']))
              <img
                src="{{ $project['image_url'] }}"
                alt="{{ $project['title'] }}"
                loading="lazy"
              >
            @else
              <div class="proj-thumb-placeholder">
                <i class="fas fa-code" aria-hidden="true"></i>
              </div>
            @endif

            {{-- Browser chrome --}}
            <div class="proj-chrome" aria-hidden="true">
              <span class="chrome-dot" style="background:#ff5f57"></span>
              <span class="chrome-dot" style="background:#ffbd2e"></span>
              <span class="chrome-dot" style="background:#28c840"></span>
              <div class="chrome-bar"></div>
            </div>

            {{-- Overlay --}}
            <div class="proj-overlay">
              @if(!$project['confidential'])
                @if(!empty($project['github_url']))
                  <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener"
                     class="overlay-btn" aria-label="View on GitHub">
                    <i class="fab fa-github" aria-hidden="true"></i>
                  </a>
                @endif
                @if(!empty($project['live_url']))
                  <a href="{{ $project['live_url'] }}" target="_blank" rel="noopener"
                     class="overlay-btn" aria-label="View Live">
                    <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                  </a>
                @endif
              @else
                <span class="overlay-btn" aria-label="Confidential">
                  <i class="fas fa-lock" aria-hidden="true"></i>
                </span>
              @endif
            </div>
          </div>

          {{-- Body --}}
          <div class="proj-body">
            <div class="proj-cat">{{ ucfirst($project['category']) }}</div>
            <h3 class="proj-title">{{ $project['title'] }}</h3>
            <p class="proj-desc">{{ $project['description'] }}</p>

            <div class="proj-tags">
              @foreach($project['tags'] as $tag)
                <span class="proj-tag">{{ $tag }}</span>
              @endforeach
            </div>

            <div class="proj-links">
              @if($project['confidential'])
                <span class="proj-link proj-link--locked">
                  <i class="fas fa-lock" aria-hidden="true"></i>Confidential
                </span>
              @else
                @if(!empty($project['github_url']))
                  <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener" class="proj-link">
                    <i class="fab fa-github" aria-hidden="true"></i>GitHub
                  </a>
                @endif
                @if(!empty($project['live_url']))
                  <a href="{{ $project['live_url'] }}" target="_blank" rel="noopener" class="proj-link">
                    <i class="fas fa-external-link-alt" aria-hidden="true"></i>Live Demo
                  </a>
                @endif
              @endif
            </div>
          </div>

        </article>
      @endforeach
    </div>

  </div>
</section>

<style>
/* ── Projects ── */
.proj-header {
  display: flex; align-items: flex-end; justify-content: space-between;
  flex-wrap: wrap; gap: 18px; margin-bottom: clamp(22px,3.5vw,38px);
}
.proj-filters { display: flex; gap: 7px; flex-wrap: wrap; }
.proj-filter {
  background: transparent; border: 1px solid var(--brd);
  color: var(--t-muted); padding: 6px 16px;
  font-family: var(--mono); font-size: clamp(.5rem,.64vw,.6rem);
  letter-spacing: .5px; text-transform: uppercase; transition: all .3s;
}
.proj-filter.active,
.proj-filter:hover {
  border-color: var(--amber-b); color: var(--amber-l); background: var(--amber-f);
}

.proj-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: clamp(9px,1.4vw,13px);
}
.project-card {
  background: var(--ink-1); border: 1px solid var(--brd);
  overflow: hidden; transition: all .4s;
}
.project-card:hover {
  border-color: var(--amber-b);
  transform: translateY(-5px);
  box-shadow: 0 22px 50px rgba(0,0,0,.65), 0 0 32px rgba(200,134,10,.04);
}

/* Thumbnail */
.proj-thumb {
  height: clamp(140px,15vw,192px);
  position: relative; overflow: hidden; background: var(--ink-2);
}
.proj-thumb img { height: 100%; transition: transform .6s var(--e1), filter .5s; filter: brightness(.6) saturate(.5); }
.project-card:hover .proj-thumb img { transform: scale(1.07); filter: brightness(.78) saturate(.82); }

.proj-thumb-placeholder {
  width: 100%; height: 100%;
  display: flex; align-items: center; justify-content: center;
  color: var(--t-faint); font-size: 3rem;
}
.proj-chrome {
  position: absolute; top: 0; left: 0; right: 0; height: 24px;
  background: rgba(0,0,0,.65); backdrop-filter: blur(4px);
  display: flex; align-items: center; gap: 5px; padding: 0 9px; z-index: 2;
}
.chrome-dot { width: 8px; height: 8px; border-radius: 50%; }
.chrome-bar { flex: 1; height: 8px; background: rgba(255,255,255,.07); border-radius: 2px; margin: 0 6px; }

.proj-overlay {
  position: absolute; inset: 0; z-index: 3;
  background: rgba(13,11,9,.82);
  display: flex; align-items: center; justify-content: center; gap: 11px;
  opacity: 0; transition: opacity .3s; backdrop-filter: blur(4px);
}
.project-card:hover .proj-overlay { opacity: 1; }
.overlay-btn {
  width: 44px; height: 44px; border-radius: 50%;
  border: 1.5px solid rgba(200,134,10,.45);
  display: flex; align-items: center; justify-content: center;
  color: var(--amber-l); font-size: .92rem; text-decoration: none;
  transition: all .3s;
}
.overlay-btn:hover {
  background: linear-gradient(135deg, var(--amber), var(--amber-l));
  border-color: transparent; color: var(--ink-0); transform: scale(1.12);
}

/* Body */
.proj-body { padding: clamp(12px,2vw,18px); }
.proj-cat {
  font-family: var(--mono); font-size: clamp(.48rem,.61vw,.55rem);
  color: var(--amber-l); letter-spacing: 2.5px; text-transform: uppercase; margin-bottom: 5px;
}
.proj-title {
  font-family: var(--serif); font-weight: 700; font-style: italic;
  font-size: clamp(.92rem,1.4vw,1.06rem); color: var(--t-primary);
  margin-bottom: 6px; line-height: 1.2;
}
.proj-desc {
  font-family: var(--sans); color: var(--t-secondary);
  font-size: clamp(.74rem,.9vw,.81rem); font-weight: 400;
  line-height: 1.75; margin-bottom: 10px;
}
.proj-tags { display: flex; flex-wrap: wrap; gap: 4px; margin-bottom: 10px; }
.proj-tag {
  background: var(--amber-f); border: 1px solid rgba(200,134,10,.11);
  color: var(--amber-l); padding: 2px 7px;
  font-family: var(--mono); font-size: clamp(.47rem,.6vw,.54rem);
}
.proj-links { display: flex; gap: 11px; }
.proj-link {
  font-family: var(--mono); font-size: clamp(.5rem,.64vw,.59rem);
  color: var(--t-secondary); text-decoration: none;
  display: flex; align-items: center; gap: 4px;
  transition: color .25s; border-bottom: 1px solid transparent; padding-bottom: 1px;
}
.proj-link:hover { color: var(--amber-l); border-color: rgba(200,134,10,.3); }
.proj-link--locked { opacity: .38; }

/* Responsive */
@media (max-width: 1024px) { .proj-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width: 768px)  {
  .proj-grid { grid-template-columns: 1fr; }
  .proj-header { flex-direction: column; align-items: flex-start; }
}
</style>

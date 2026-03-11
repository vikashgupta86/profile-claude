<section id="projects" class="sec">
<div class="secin">
  <div class="rv"><div class="seceye">Portfolio</div><h2 class="sech">My <span>Projects</span></h2></div>
  <div class="prfilter">
    <button class="prfb on" data-f="all">All</button>
    <button class="prfb" data-f="laravel">Laravel</button>
    <button class="prfb" data-f="php">PHP</button>
    <button class="prfb" data-f="api">API</button>
    <button class="prfb" data-f="government">Government</button>
  </div>
  <div class="prgrid" id="pg">
    @php
    $imgs = [
      'government' => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=640&h=400&fit=crop&auto=format&q=75',
      'api'        => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=640&h=400&fit=crop&auto=format&q=75',
      'laravel'    => 'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=640&h=400&fit=crop&auto=format&q=75',
      'php'        => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=640&h=400&fit=crop&auto=format&q=75',
      'other'      => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=640&h=400&fit=crop&auto=format&q=75',
    ];
    @endphp
    @foreach($projects as $i => $project)
    <div class="prcard rv" data-cat="{{ $project->category }}" style="transition-delay:{{ ($i % 3) * 0.08 }}s">
      <div class="prthumb">
        @if($project->thumbnail)
          <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" loading="lazy">
        @else
          <img src="{{ $imgs[$project->category] ?? $imgs['other'] }}" alt="{{ $project->title }}" loading="lazy">
        @endif
        <div class="prchrome">
          <div class="prdot" style="background:#ff5f57"></div>
          <div class="prdot" style="background:#ffbd2e"></div>
          <div class="prdot" style="background:#28c840"></div>
          <div class="url"></div>
        </div>
        <div class="prhover">
          @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank" class="prhbtn" title="GitHub"><i class="fab fa-github"></i></a>@endif
          @if($project->live_url)<a href="{{ $project->live_url }}" target="_blank" class="prhbtn" title="Live Demo" style="border-color:rgba(0,229,255,.5)"><i class="fas fa-external-link-alt"></i></a>@endif
          @if(!$project->github_url && !$project->live_url)<span class="prhbtn" style="opacity:.3;cursor:default;pointer-events:none"><i class="fas fa-lock"></i></span>@endif
        </div>
      </div>
      <div class="prbody">
        <div class="prcat">{{ strtoupper($project->category) }}</div>
        <h3 class="prnm">{{ $project->title }}</h3>
        <p class="prds">{{ $project->short_description }}</p>
        <div class="prpills">@foreach($project->tech_stack as $t)<span class="prpl">{{ $t }}</span>@endforeach</div>
        <div class="prlks">
          @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank" class="prlk"><i class="fab fa-github"></i> GitHub</a>@endif
          @if($project->live_url)<a href="{{ $project->live_url }}" target="_blank" class="prlk"><i class="fas fa-external-link-alt"></i> Live</a>@endif
          @if(!$project->github_url && !$project->live_url)<span class="prlk" style="opacity:.3;cursor:default"><i class="fas fa-lock"></i> Private</span>@endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>
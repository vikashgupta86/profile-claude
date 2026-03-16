{{--
    Skills Section
    Data: $skillGroups[] - each: { emoji, category, skills: [{name, percent}] }
--}}
@php
  $skillGroups = $skillGroups ?? [
    [
      'emoji'    => '⚙️',
      'category' => 'BACKEND',
      'skills'   => [
        ['name' => 'PHP',      'percent' => 92],
        ['name' => 'Laravel',  'percent' => 90],
        ['name' => 'CakePHP',  'percent' => 75],
      ],
    ],
    [
      'emoji'    => '🎨',
      'category' => 'FRONTEND',
      'skills'   => [
        ['name' => 'HTML / CSS',       'percent' => 88],
        ['name' => 'JavaScript',        'percent' => 80],
        ['name' => 'Bootstrap / AJAX',  'percent' => 85],
      ],
    ],
    [
      'emoji'    => '🗄️',
      'category' => 'DATABASE',
      'skills'   => [
        ['name' => 'MySQL',              'percent' => 88],
        ['name' => 'DB Design',          'percent' => 82],
        ['name' => 'Query Optimization', 'percent' => 78],
      ],
    ],
    [
      'emoji'    => '🔧',
      'category' => 'TOOLS & APIs',
      'skills'   => [
        ['name' => 'Git / GitHub',  'percent' => 85],
        ['name' => 'REST APIs',     'percent' => 90],
        ['name' => 'GIGW / WCAG',   'percent' => 80],
      ],
    ],
  ];
@endphp

<section id="skills" class="section">
<div class="sec-max">
  <div class="rv"><div class="sec-eye">Tech Stack</div><h2 class="sec-h">My <em>Skills</em></h2></div>
  <div class="sk-grid">
    @foreach($skillGroups as $i => $group)
      <div class="sk-card rv d{{ $i + 1 }}"><div class="sk-em">{{ $group['emoji'] }}</div><div class="sk-cat">{{ $group['category'] }}</div>
        @foreach($group['skills'] as $skill)
          <div class="sk-row"><div class="sk-top"><span class="sk-name">{{ $skill['name'] }}</span><span class="sk-pct">{{ $skill['percent'] }}%</span></div><div class="sk-track"><div class="sk-fill" data-w="{{ $skill['percent'] }}"></div></div></div>
        @endforeach
      </div>
    @endforeach
  </div>
</div>
</section>

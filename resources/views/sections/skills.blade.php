{{--
    Skills Section
    Data: $skillGroups[] — each: { emoji, category, skills: [{name, percent}] }
--}}
@php
  $skillGroups = $skillGroups ?? [
    [
      'emoji'    => '⚙️',
      'category' => 'Backend',
      'skills'   => [
        ['name' => 'PHP',      'percent' => 92],
        ['name' => 'Laravel',  'percent' => 90],
        ['name' => 'CakePHP',  'percent' => 75],
      ],
    ],
    [
      'emoji'    => '🎨',
      'category' => 'Frontend',
      'skills'   => [
        ['name' => 'HTML / CSS',       'percent' => 88],
        ['name' => 'JavaScript',        'percent' => 80],
        ['name' => 'Bootstrap / AJAX',  'percent' => 85],
      ],
    ],
    [
      'emoji'    => '🗄️',
      'category' => 'Database',
      'skills'   => [
        ['name' => 'MySQL',              'percent' => 88],
        ['name' => 'DB Design',          'percent' => 82],
        ['name' => 'Query Optimization', 'percent' => 78],
      ],
    ],
    [
      'emoji'    => '🔧',
      'category' => 'Tools & APIs',
      'skills'   => [
        ['name' => 'Git / GitHub',  'percent' => 85],
        ['name' => 'REST APIs',     'percent' => 90],
        ['name' => 'GIGW / WCAG',   'percent' => 80],
      ],
    ],
  ];
@endphp

<section id="skills" class="sec" style="background: var(--ink-0);">
  <div class="sec-in">

    <div class="rv">
      <div class="tag">Tech Stack</div>
      <h2 class="sh">My <em>Skills</em></h2>
    </div>

    <div class="skills-grid">
      @foreach($skillGroups as $i => $group)
        <div class="skill-card rv d{{ $i + 1 }}">
          <div class="sk-emoji" aria-hidden="true">{{ $group['emoji'] }}</div>
          <div class="sk-cat">{{ $group['category'] }}</div>

          @foreach($group['skills'] as $skill)
            <div class="sk-row">
              <div class="sk-meta">
                <span class="sk-name">{{ $skill['name'] }}</span>
                <span class="sk-pct">{{ $skill['percent'] }}%</span>
              </div>
              <div class="sk-track">
                <div class="skill-fill" data-w="{{ $skill['percent'] }}" style="width:0%"></div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>

  </div>
</section>

<style>
/* ── Skills ── */
.skills-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2px;
  background: var(--brd);
}
.skill-card {
  background: var(--ink-0);
  padding: clamp(18px,2.8vw,28px) clamp(14px,2.2vw,22px);
  position: relative; overflow: hidden; transition: all .4s;
}
.skill-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--amber), var(--amber-xl), transparent);
  transform: scaleX(0); transform-origin: left;
  transition: transform .4s var(--e1);
}
.skill-card:hover {
  background: var(--ink-1);
  transform: translateY(-4px);
  box-shadow: 0 16px 50px rgba(0,0,0,.5);
}
.skill-card:hover::before { transform: scaleX(1); }

.sk-emoji {
  font-size: clamp(1.4rem,2.4vw,1.9rem);
  margin-bottom: 9px; display: block;
}
.sk-cat {
  font-family: var(--mono); font-size: clamp(.5rem,.65vw,.6rem);
  color: var(--amber-l); letter-spacing: 3px; text-transform: uppercase;
  margin-bottom: clamp(12px,2.2vw,20px);
}
.sk-row { margin-bottom: clamp(9px,1.6vw,14px); }
.sk-meta {
  display: flex; justify-content: space-between;
  margin-bottom: 6px;
}
.sk-name {
  font-family: var(--sans); font-size: clamp(.76rem,.92vw,.84rem);
  font-weight: 400; color: var(--parch-2);
}
.sk-pct {
  font-family: var(--mono); font-size: clamp(.5rem,.62vw,.58rem);
  color: var(--amber);
}
.sk-track {
  height: 2px; background: rgba(200,134,10,.1); overflow: hidden;
}
.skill-fill {
  height: 100%;
  transition: width 1.6s var(--e2);
  background: linear-gradient(90deg, var(--amber), var(--amber-xl));
}

/* Responsive */
@media (max-width: 1280px) { .skills-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width: 768px)  { .skills-grid { grid-template-columns: 1fr; } }
</style>

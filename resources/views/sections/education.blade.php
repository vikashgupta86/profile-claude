{{--
    Education Section
    Data: $education[] — each: { period, location, emoji, degree, school, score }
--}}
@php
  $education = $education ?? [
    [
      'period'   => '2020 – 2024',
      'location' => 'Bhopal',
      'emoji'    => '🎓',
      'degree'   => 'B.Tech — Computer Science Engineering',
      'school'   => 'Sagar Group of Institutions',
      'score'    => 'CGPA: 8.33 / 10',
    ],
    [
      'period'   => '2018 – 2020',
      'location' => 'Bettiah',
      'emoji'    => '🏫',
      'degree'   => 'Intermediate — Science Stream',
      'school'   => 'MJK College Bettiah',
      'score'    => '76.20%',
    ],
    [
      'period'   => '2018',
      'location' => 'Bettiah',
      'emoji'    => '📚',
      'degree'   => 'Class X — Bihar State Board',
      'school'   => 'Alok Bharati Bettiah',
      'score'    => '75.80%',
    ],
  ];
@endphp

<section id="education" class="sec" style="background: var(--ink-2);">
  <div class="sec-in">

    <div class="rv">
      <div class="tag">Academic</div>
      <h2 class="sh">My <em>Education</em></h2>
    </div>

    <div class="edu-grid">
      @foreach($education as $i => $edu)
        <div class="edu-card rv d{{ $i + 1 }}">
          <div class="edu-period">{{ $edu['period'] }} · {{ $edu['location'] }}</div>
          <span class="edu-emoji" aria-hidden="true">{{ $edu['emoji'] }}</span>
          <div class="edu-degree">{{ $edu['degree'] }}</div>
          <div class="edu-school">{{ $edu['school'] }}</div>
          <div class="edu-score">{{ $edu['score'] }}</div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<style>
/* ── Education ── */
.edu-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2px; background: var(--brd);
}
.edu-card {
  background: var(--ink-2);
  padding: clamp(20px,3.2vw,32px) clamp(16px,2.6vw,26px);
  transition: all .4s; position: relative; overflow: hidden;
}
.edu-card::before {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--amber), var(--amber-xl));
  transform: scaleX(0); transform-origin: left;
  transition: transform .5s var(--e1);
}
.edu-card:hover { background: var(--ink-1); transform: translateY(-4px); }
.edu-card:hover::before { transform: scaleX(1); }

.edu-period {
  font-family: var(--mono); font-size: clamp(.48rem,.61vw,.56rem);
  color: var(--t-faint); letter-spacing: 2.5px; text-transform: uppercase;
  margin-bottom: 14px;
}
.edu-emoji {
  font-size: clamp(1.7rem,2.8vw,2.3rem); margin-bottom: 12px; display: block;
}
.edu-degree {
  font-family: var(--serif); font-weight: 700; font-style: italic;
  font-size: clamp(.88rem,1.4vw,1.04rem); color: var(--t-primary);
  margin-bottom: 5px; line-height: 1.3;
}
.edu-school {
  font-family: var(--sans); font-size: clamp(.76rem,.9vw,.84rem);
  font-weight: 400; color: var(--amber-l); margin-bottom: 13px;
}
.edu-score {
  display: inline-block;
  background: rgba(200,134,10,.07); border: 1px solid var(--amber-b);
  color: var(--amber-l); padding: 4px 13px;
  font-family: var(--mono); font-size: clamp(.5rem,.64vw,.6rem);
}

@media (max-width: 1024px) { .edu-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width: 600px)  { .edu-grid { grid-template-columns: 1fr; } }
</style>

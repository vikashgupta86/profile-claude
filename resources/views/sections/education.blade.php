{{--
    Education Section
    Data: $education[] - each: { period, location, emoji, degree, school, score }
--}}
@php
  $education = $education ?? [
    [
      'period'   => '2020 - 2024',
      'location' => 'Bhopal',
      'emoji'    => '🎓',
      'degree'   => 'B.Tech - Computer Science Engineering',
      'school'   => 'Sagar Group of Institutions',
      'score'    => 'CGPA: 8.33 / 10',
    ],
    [
      'period'   => '2018 - 2020',
      'location' => 'Bettiah',
      'emoji'    => '🏫',
      'degree'   => 'Intermediate - Science Stream',
      'school'   => 'MJK College Bettiah',
      'score'    => '76.20%',
    ],
    [
      'period'   => '2018',
      'location' => 'Bettiah',
      'emoji'    => '📚',
      'degree'   => 'Class X - Bihar State Board',
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
          <div class="edu-period">{{ $edu['period'] }} - {{ $edu['location'] }}</div>
          <span class="edu-emoji" aria-hidden="true">{{ $edu['emoji'] }}</span>
          <div class="edu-degree">{{ $edu['degree'] }}</div>
          <div class="edu-school">{{ $edu['school'] }}</div>
          <div class="edu-score">{{ $edu['score'] }}</div>
        </div>
      @endforeach
    </div>

  </div>
</section>
 

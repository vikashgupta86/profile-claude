{{--
    Experience Section
    Data: $experiences[] - each: {
      period, role, company, location, current (bool), badge (optional), bullets[]
    }
--}}
@php
  $experiences = $experiences ?? [
    [
      'period'   => 'JAN 2025 – PRESENT',
      'role'     => 'PHP Developer',
      'company'  => 'Webflit Technologies Pvt. Ltd.',
      'location' => 'New Delhi, India',
      'current'  => true,
      'badge'    => '● CURRENT',
      'bullets'  => [
        'Developed & maintained government portals fully compliant with GIGW & DBIM 3.0 standards',
        'Engineered RESTful APIs enabling seamless mobile-web data exchange for 50,000+ users',
        'Optimized complex MySQL queries, achieving 40% reduction in average response time',
        'Built WCAG 2.1 AA accessibility-first interfaces meeting government digital standards',
        'Collaborated with cross-functional teams using Git workflows and agile sprint cycles',
      ],
    ],
    [
      'period'   => 'OCT 2023 – DEC 2024',
      'role'     => 'Jr. PHP / Laravel Developer',
      'company'  => 'Megamind Softwares',
      'location' => 'New Delhi, India',
      'current'  => false,
      'badge'    => null,
      'bullets'  => [
        'Built scalable CMS and dynamic web applications using Laravel 9 & 10',
        'Implemented multi-role RBAC systems for complex multi-tenant SaaS platforms',
        'Integrated third-party payment gateways (Razorpay, PayU) and SMS/email APIs',
        'Delivered 5+ client projects on time with zero critical production bugs',
      ],
    ],
    [
      'period'   => 'APR 2023 – SEP 2023',
      'role'     => 'Web Development Intern',
      'company'  => 'Zeetaminds Technologies',
      'location' => 'Bhopal, India',
      'current'  => false,
      'badge'    => null,
      'bullets'  => [
        'Contributed to frontend development with HTML5, CSS3 & vanilla JavaScript',
        'Learned CakePHP MVC architecture, building reusable components and data models',
        'Designed responsive mobile-first interfaces using Bootstrap 5 grid system',
      ],
    ],
  ];
@endphp

<!-- EXPERIENCE -->
<section id="experience" class="section">
<div class="sec-max">
  <div class="rv"><div class="sec-eye">Career</div><h2 class="sec-h">Work <em>Experience</em></h2></div>
  <div class="tl">
    @foreach($experiences as $i => $exp)
      <div class="tl-e rv {{ $i > 0 ? 'd'.$i : '' }}"><div class="tl-dot {{ $exp['current'] ? 'now' : '' }}"></div>
        <div class="tl-block"><div class="tl-date">{{ $exp['period'] }}</div><div class="tl-head"><div class="tl-role">{{ $exp['role'] }}</div>@if(!empty($exp['badge']))<span class="tl-badge">{{ $exp['badge'] }}</span>@endif</div><div class="tl-company"><i class="fas fa-building"></i> {{ $exp['company'] }}</div><div class="tl-loc"><i class="fas fa-map-marker-alt"></i> {{ $exp['location'] }}</div><ul class="tl-list">@foreach($exp['bullets'] as $bullet)<li>{{ $bullet }}</li>@endforeach</ul></div>
      </div>
    @endforeach
  </div>
</div>
</section>

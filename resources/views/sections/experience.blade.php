{{--
    Experience Section
    Data: $experiences[] — each: {
      period, role, company, location, current (bool), badge (optional), bullets[]
    }
--}}
@php
  $experiences = $experiences ?? [
    [
      'period'   => 'Jan 2025 – Present',
      'role'     => 'PHP Developer',
      'company'  => 'Webflit Technologies Pvt. Ltd.',
      'location' => 'New Delhi, India',
      'current'  => true,
      'badge'    => '● Current',
      'bullets'  => [
        'Developed & maintained government portals fully compliant with GIGW & DBIM 3.0 standards',
        'Engineered RESTful APIs enabling seamless mobile-web data exchange for 50,000+ users',
        'Optimized complex MySQL queries, achieving 40% reduction in average response time',
        'Built WCAG 2.1 AA accessibility-first interfaces meeting government digital standards',
        'Collaborated with cross-functional teams via Git workflows and agile sprint cycles',
      ],
    ],
    [
      'period'   => 'Oct 2023 – Dec 2024',
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
      'period'   => 'Apr 2023 – Sep 2023',
      'role'     => 'Web Development Intern',
      'company'  => 'Zeetaminds Technologies',
      'location' => 'Bhopal, India',
      'current'  => false,
      'badge'    => null,
      'bullets'  => [
        'Contributed to frontend development with HTML5, CSS3 & vanilla JavaScript',
        'Learned CakePHP MVC architecture, building reusable components and data models',
        'Designed responsive mobile-first interfaces using Bootstrap 5',
      ],
    ],
  ];
@endphp

<section id="experience" class="sec" style="background: var(--ink-1);">
  <div class="sec-in">

    <div class="rv">
      <div class="tag">Career</div>
      <h2 class="sh">Work <em>Experience</em></h2>
    </div>

    <div class="exp-tl">
      @foreach($experiences as $i => $exp)
        <div class="exp-item rv {{ $i > 0 ? 'd'.$i : '' }}">
          <div class="exp-dot {{ $exp['current'] ? 'current' : '' }}"></div>
          <div class="exp-card">
            <div class="exp-period">{{ $exp['period'] }}</div>
            <div class="exp-head">
              <div class="exp-role">{{ $exp['role'] }}</div>
              @if(!empty($exp['badge']))
                <span class="exp-badge">{{ $exp['badge'] }}</span>
              @endif
            </div>
            <div class="exp-company">
              <i class="fas fa-building" aria-hidden="true"></i>
              {{ $exp['company'] }}
            </div>
            <div class="exp-loc">
              <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
              {{ $exp['location'] }}
            </div>
            <ul class="exp-list">
              @foreach($exp['bullets'] as $bullet)
                <li>{{ $bullet }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<style>
/* ── Experience timeline ── */
.exp-tl {
  position: relative;
  padding-left: clamp(26px,4.5vw,42px);
}
.exp-tl::before {
  content: ''; position: absolute;
  left: 7px; top: 14px; bottom: 14px;
  width: 1px;
  background: linear-gradient(var(--amber), rgba(200,134,10,.03));
}

.exp-item { position: relative; margin-bottom: 18px; }
.exp-dot {
  position: absolute;
  left: clamp(-26px,-4.5vw,-42px);
  top: 12px;
  width: 14px; height: 14px; border-radius: 50%;
  background: var(--ink-1);
  border: 2px solid rgba(200,134,10,.3);
  transition: all .3s;
}
.exp-dot.current {
  background: var(--amber); border-color: var(--amber);
  box-shadow: 0 0 0 4px rgba(200,134,10,.13), 0 0 18px rgba(200,134,10,.4);
}

.exp-card {
  background: var(--ink-2); border: 1px solid var(--brd);
  padding: clamp(16px,2.5vw,26px) clamp(14px,2.8vw,28px);
  position: relative; overflow: hidden; transition: all .4s;
}
.exp-card::after {
  content: ''; position: absolute; top: 0; left: 0; bottom: 0; width: 2px;
  background: linear-gradient(var(--amber), var(--amber-l));
  transform: scaleY(0); transform-origin: top;
  transition: transform .4s var(--e1);
}
.exp-card:hover { border-color: var(--amber-b); box-shadow: 0 6px 32px rgba(0,0,0,.4); }
.exp-card:hover::after { transform: scaleY(1); }

.exp-period {
  font-family: var(--mono); font-size: clamp(.5rem,.63vw,.58rem);
  color: var(--amber-l); letter-spacing: 2px; text-transform: uppercase;
  margin-bottom: 9px;
}
.exp-head { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 5px; }
.exp-role {
  font-family: var(--serif); font-weight: 700; font-style: italic;
  font-size: clamp(1.05rem,1.9vw,1.4rem); color: var(--t-primary);
}
.exp-badge {
  background: var(--amber-f); border: 1px solid var(--amber-b);
  color: var(--amber-l); font-family: var(--mono);
  font-size: .49rem; padding: 3px 9px; letter-spacing: 1.5px; text-transform: uppercase;
}
.exp-company {
  font-family: var(--sans); font-size: clamp(.8rem,.94vw,.88rem);
  font-weight: 500; color: var(--amber-l);
  display: flex; align-items: center; gap: 7px; margin-bottom: 4px;
}
.exp-loc {
  font-family: var(--mono); font-size: clamp(.5rem,.63vw,.58rem);
  color: var(--t-secondary);
  display: flex; align-items: center; gap: 5px;
  margin-bottom: clamp(10px,1.8vw,14px);
  text-transform: uppercase; letter-spacing: 1px;
}
.exp-list { list-style: none; display: flex; flex-direction: column; gap: 6px; }
.exp-list li {
  font-family: var(--sans); font-size: clamp(.8rem,.95vw,.87rem);
  font-weight: 400; color: var(--t-secondary);
  line-height: 1.8; padding-left: 16px; position: relative;
}
.exp-list li::before {
  content: '›'; position: absolute; left: 0;
  color: var(--amber); font-size: 1rem; line-height: 1.55;
}
</style>

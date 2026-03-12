{{--
    About Section
    Data: $portfolio, $timeline[], $strengths[]
--}}
@php
  $p = $portfolio ?? null;

  $name        = $p->name        ?? 'Vikash Kumar';
  $role        = $p->title       ?? 'Laravel · PHP · API Developer';
  $location    = $p->location    ?? 'New Delhi';
  $available   = $p->is_available ?? true;
  $degree      = $p->degree      ?? 'B.Tech CSE · 8.33';
  $email       = $p->email       ?? 'vikashkumarbth381@gmail.com';
  $phone       = $p->phone       ?? '+91 95239 19654';
  $github      = $p->github      ?? 'https://github.com/Vikashgupta95239';
  $linkedin    = $p->linkedin    ?? 'https://linkedin.com/in/vikash-kumar-computer-science';
  $githubHandle = $p->github_handle ?? 'Vikashgupta95239';
  $linkedinHandle = $p->linkedin_handle ?? 'vikash-kumar-cs';

  $stats = $p->stats ?? [
    ['count' => 2, 'suffix' => '+', 'label' => 'Years'],
    ['count' => 10,'suffix' => '+', 'label' => 'Projects'],
    ['count' => 3, 'suffix' => '',  'label' => 'Companies'],
    ['count' => 6, 'suffix' => '',  'label' => 'Certs'],
  ];

  $aboutParagraphs = $p->about_paragraphs ?? [
    'Dedicated <strong>Laravel Developer</strong> with 2+ years of experience building scalable web applications and government-grade CMS platforms. I specialize in REST API integration, database optimization, and clean backend architecture.',
    'My proudest achievements include delivering <strong>GIGW & DBIM 3.0 compliant portals</strong> — government-standard solutions combining accessibility, security, and performance, serving thousands of real users across India.',
    'I write code that\'s not just functional — it\'s <strong>maintainable, scalable, and built to last</strong>. Every project receives my full attention to detail.',
  ];

  $timeline = $timeline ?? [
    ['role' => 'PHP Developer',             'company' => 'Webflit Technologies · New Delhi',  'period' => 'Jan 2025 – Present', 'current' => true],
    ['role' => 'Jr. PHP / Laravel Developer','company' => 'Megamind Softwares · New Delhi',   'period' => 'Oct 2023 – Dec 2024','current' => false],
    ['role' => 'Web Development Intern',    'company' => 'Zeetaminds Technologies · Bhopal',  'period' => 'Apr – Sep 2023',     'current' => false],
  ];

  $strengths = $strengths ?? [
    'Problem Solving','REST API Design','GIGW Compliance','WCAG / A11y',
    'DB Optimization','Team Collaboration','Quick Learner','Deadline-Driven',
  ];

  $tags = $p->tags ?? ['New Delhi', $available ? 'Available' : 'Busy', $degree, 'GIGW Certified'];
@endphp

<section id="about" class="sec">
  <div class="sec-in">
    <div class="about-grid">

      {{-- ── LEFT: Info card column ── --}}
      <div class="info-col rv">

        {{-- Profile card --}}
        <div class="p-card">
          <div class="p-name">{{ $name }}</div>
          <div class="p-role">{{ $role }}</div>
          <div class="p-tags">
            @foreach($tags as $tag)
              <span class="p-tag">{{ $tag }}</span>
            @endforeach
          </div>
        </div>

        {{-- Number grid --}}
        <div class="num-grid">
          @foreach($stats as $stat)
            <div class="num-cell">
            
              <div class="num-label">{{ $stat['label'] }}</div>
            </div>
          @endforeach
        </div>

        {{-- Contact strip --}}
        <div class="c-strip">
          <div class="c-row">
            <div class="c-icon"><i class="fas fa-envelope"></i></div>
            <div><div class="c-key">Email</div>
              <div class="c-val"><a href="mailto:{{ $email }}">{{ $email }}</a></div>
            </div>
          </div>
          <div class="c-row">
            <div class="c-icon"><i class="fas fa-phone"></i></div>
            <div><div class="c-key">Phone</div>
              <div class="c-val"><a href="tel:{{ preg_replace('/\s+/', '', $phone) }}">{{ $phone }}</a></div>
            </div>
          </div>
          <div class="c-row">
            <div class="c-icon"><i class="fab fa-github"></i></div>
            <div><div class="c-key">GitHub</div>
              <div class="c-val"><a href="{{ $github }}" target="_blank" rel="noopener">{{ $githubHandle }}</a></div>
            </div>
          </div>
          <div class="c-row">
            <div class="c-icon"><i class="fab fa-linkedin-in"></i></div>
            <div><div class="c-key">LinkedIn</div>
              <div class="c-val"><a href="{{ $linkedin }}" target="_blank" rel="noopener">{{ $linkedinHandle }}</a></div>
            </div>
          </div>
        </div>

      </div>

      {{-- ── RIGHT: Bio text ── --}}
      <div class="about-body rv d1">
        <div class="tag">Who I Am</div>
        <h2 class="sh">About <em>Me</em></h2>

        @foreach($aboutParagraphs as $para)
          <p class="about-para">{!! $para !!}</p>
        @endforeach

        {{-- Mini timeline --}}
        <div class="mini-tl">
          <div class="mini-tl-head">Career Timeline</div>
          @foreach($timeline as $item)
            <div class="tl-row">
              <div class="tl-dot {{ $item['current'] ? 'live' : '' }}"></div>
              <div>
                <div class="tl-role">{{ $item['role'] }}</div>
                <div class="tl-company">{{ $item['company'] }}</div>
                <div class="tl-period">{{ $item['period'] }}</div>
              </div>
            </div>
          @endforeach
        </div>

        {{-- Core strengths --}}
        <div class="str-head">Core Strengths</div>
        <div class="str-tags">
          @foreach($strengths as $s)
            <span class="str-tag">{{ $s }}</span>
          @endforeach
        </div>

      </div>

    </div>
  </div>
</section>

<style>
/* ── About section ── */
#about {
  background: var(--ink-1);
  position: relative; overflow: hidden;
}
#about::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background: radial-gradient(ellipse 55% 45% at 85% 50%, rgba(200,134,10,.03), transparent 70%);
}

.about-grid {
  display: grid;
  grid-template-columns: clamp(260px,28vw,380px) 1fr;
  gap: clamp(28px,5vw,64px);
  align-items: start;
}

/* Profile card */
.info-col { display: flex; flex-direction: column; gap: 10px; }
.p-card {
  background: var(--ink-2); border: 1px solid var(--brd);
  padding: clamp(18px,2.8vw,28px); position: relative; overflow: hidden;
}
.p-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--amber), var(--amber-xl), transparent);
}
.p-name {
  font-family: var(--serif); font-weight: 700; font-style: italic;
  font-size: clamp(1.2rem,2.2vw,1.75rem); color: var(--t-primary);
  line-height: 1.1; margin-bottom: 5px;
}
.p-role {
  font-family: var(--mono); font-size: clamp(.5rem,.65vw,.6rem);
  color: var(--amber-l); letter-spacing: 2.5px; text-transform: uppercase;
  margin-bottom: 16px;
}
.p-tags { display: flex; flex-wrap: wrap; gap: 6px; }
.p-tag {
  background: var(--amber-f); border: 1px solid var(--amber-b);
  color: var(--amber-l); padding: 4px 11px;
  font-family: var(--mono); font-size: clamp(.5rem,.62vw,.58rem);
  letter-spacing: .3px; transition: all .3s;
}
.p-tag:hover {
  background: linear-gradient(135deg, var(--amber), var(--amber-l));
  color: var(--ink-0);
}

/* Number grid */
.num-grid {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 2px; background: var(--brd);
}
.num-cell {
  background: var(--ink-2);
  padding: clamp(12px,2vw,20px) clamp(8px,1.5vw,14px);
  text-align: center; transition: background .3s;
  position: relative; overflow: hidden;
}
.num-cell::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(90deg, transparent, var(--amber), transparent);
  transform: scaleX(0); transition: transform .4s var(--e1);
}
.num-cell:hover { background: var(--ink-3); }
.num-cell:hover::after { transform: scaleX(1); }
.num-val {
  font-family: var(--serif); font-weight: 700;
  font-size: clamp(1.8rem,3.5vw,2.7rem); line-height: 1;
  background: linear-gradient(135deg, var(--amber), var(--amber-xl));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.num-label {
  font-family: var(--mono); font-size: clamp(.43rem,.54vw,.52rem);
  color: var(--t-faint); letter-spacing: 2px; margin-top: 4px;
  text-transform: uppercase;
}

/* Contact strip */
.c-strip { background: var(--ink-2); border: 1px solid var(--brd); overflow: hidden; }
.c-row {
  display: flex; align-items: center; gap: 12px;
  padding: clamp(9px,1.4vw,13px) clamp(12px,1.8vw,17px);
  border-bottom: 1px solid var(--brd);
  transition: all .3s; position: relative;
}
.c-row:last-child { border-bottom: none; }
.c-row::before {
  content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 2px;
  background: linear-gradient(var(--amber), var(--amber-l));
  transform: scaleY(0); transition: transform .3s var(--e1);
}
.c-row:hover { background: var(--ink-3); padding-left: clamp(16px,2.4vw,22px); }
.c-row:hover::before { transform: scaleY(1); }
.c-icon {
  width: 32px; height: 32px; flex-shrink: 0;
  border: 1px solid var(--amber-b); background: var(--amber-f);
  display: flex; align-items: center; justify-content: center;
  color: var(--amber); font-size: .72rem; transition: all .3s;
}
.c-row:hover .c-icon {
  background: linear-gradient(135deg, var(--amber), var(--amber-l));
  color: var(--ink-0); border-color: transparent;
}
.c-key {
  font-family: var(--mono); font-size: .49rem;
  color: var(--t-faint); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 1px;
}
.c-val {
  font-family: var(--sans); font-size: clamp(.74rem,.9vw,.82rem);
  font-weight: 400; color: var(--t-primary);
  word-break: break-all;
}
.c-val a { color: var(--t-primary); text-decoration: none; transition: color .2s; }
.c-val a:hover { color: var(--amber-l); }

/* About body */
.about-para {
  font-family: var(--sans); font-size: clamp(.86rem,1.05vw,1rem);
  font-weight: 400; color: var(--t-secondary);
  line-height: 1.95; margin-bottom: 15px;
}
.about-para strong { color: var(--parch-2); font-weight: 600; }

/* Mini timeline */
.mini-tl { margin-top: clamp(22px,3.5vw,32px); }
.mini-tl-head {
  font-family: var(--mono); font-size: clamp(.5rem,.64vw,.58rem);
  color: var(--amber-l); letter-spacing: 3px; text-transform: uppercase;
  display: flex; align-items: center; gap: 10px; margin-bottom: 14px;
}
.mini-tl-head::before { content: ''; width: 14px; height: 1px; background: var(--amber); }
.tl-row {
  display: grid; grid-template-columns: auto 1fr;
  gap: clamp(10px,1.5vw,14px); align-items: start;
  padding: clamp(9px,1.4vw,13px) 0;
  border-bottom: 1px solid var(--brd);
}
.tl-row:last-child { border-bottom: none; }
.tl-dot {
  width: 9px; height: 9px; border-radius: 50%;
  border: 2px solid rgba(200,134,10,.3);
  background: transparent; flex-shrink: 0; margin-top: 5px;
}
.tl-dot.live { background: var(--amber); border-color: var(--amber); box-shadow: 0 0 9px rgba(200,134,10,.6); }
.tl-role { font-family: var(--sans); font-size: clamp(.82rem,.95vw,.9rem); font-weight: 600; color: var(--t-primary); margin-bottom: 2px; }
.tl-company { font-family: var(--mono); font-size: clamp(.5rem,.63vw,.58rem); color: var(--t-secondary); }
.tl-period { font-family: var(--mono); font-size: clamp(.48rem,.61vw,.56rem); color: var(--amber-l); margin-top: 3px; }

/* Strengths */
.str-head {
  font-family: var(--mono); font-size: clamp(.5rem,.64vw,.58rem);
  color: var(--amber-l); letter-spacing: 3px; text-transform: uppercase;
  display: flex; align-items: center; gap: 10px;
  margin: clamp(20px,3vw,28px) 0 13px;
}
.str-head::before { content: ''; width: 14px; height: 1px; background: var(--amber); }
.str-tags { display: flex; flex-wrap: wrap; gap: 7px; }
.str-tag {
  padding: 6px 13px; border: 1px solid var(--brd);
  color: var(--t-secondary); font-family: var(--mono);
  font-size: clamp(.5rem,.64vw,.58rem); letter-spacing: .3px;
  transition: all .3s;
}
.str-tag:hover { border-color: var(--amber-b); color: var(--amber-l); background: var(--amber-f); transform: translateY(-2px); }

/* Responsive */
@media (max-width: 1024px) { .about-grid { grid-template-columns: 1fr; gap: 36px; } }
</style>

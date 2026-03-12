{{--
    Certifications Section
    Data: $certifications[] — each: { icon, name, issuer, issuer_icon, cert_url }
--}}
@php
  $certifications = $certifications ?? [
    [
      'icon'        => 'fas fa-code',
      'name'        => 'Full Stack Web Development Masterclass',
      'issuer'      => 'Udemy',
      'issuer_icon' => 'fas fa-building',
      'cert_url'    => '#',
    ],
    [
      'icon'        => 'fas fa-database',
      'name'        => 'The SQL Programming Masterclass – Beginner to Expert',
      'issuer'      => 'Udemy',
      'issuer_icon' => 'fas fa-building',
      'cert_url'    => '#',
    ],
    [
      'icon'        => 'fas fa-laptop-code',
      'name'        => 'MasterClass: Learn HTML5 with Notes for Beginners',
      'issuer'      => 'Udemy',
      'issuer_icon' => 'fas fa-building',
      'cert_url'    => '#',
    ],
    [
      'icon'        => 'fas fa-sitemap',
      'name'        => 'Data Structures and Algorithms in Java',
      'issuer'      => 'Udemy',
      'issuer_icon' => 'fas fa-building',
      'cert_url'    => '#',
    ],
    [
      'icon'        => 'fas fa-lightbulb',
      'name'        => 'Design Thinking for Innovation and Productivity',
      'issuer'      => 'Coursera',
      'issuer_icon' => 'fab fa-google',
      'cert_url'    => '#',
    ],
    [
      'icon'        => 'fab fa-google',
      'name'        => 'Using ChatGPT to Enhance Creativity & Productivity',
      'issuer'      => 'Coursera',
      'issuer_icon' => 'fab fa-google',
      'cert_url'    => '#',
    ],
  ];
@endphp

<section id="certs" class="sec" style="background: var(--ink-1);">
  <div class="sec-in">

    <div class="rv">
      <div class="tag">Credentials</div>
      <h2 class="sh">My <em>Certifications</em></h2>
    </div>

    <div class="cert-grid">
      @foreach($certifications as $i => $cert)
        <div class="cert-card rv d{{ ($i % 5) + 1 }}">
          <div class="cert-ico">
            <i class="{{ $cert['icon'] }}" aria-hidden="true"></i>
          </div>
          <div class="cert-name">{{ $cert['name'] }}</div>
          <div class="cert-issuer">
            <i class="{{ $cert['issuer_icon'] }}" aria-hidden="true"></i>
            {{ $cert['issuer'] }}
          </div>
          @if(!empty($cert['cert_url']) && $cert['cert_url'] !== '#')
            <a href="{{ $cert['cert_url'] }}" target="_blank" rel="noopener" class="cert-link">
              <i class="fas fa-external-link-alt" aria-hidden="true"></i>View Certificate
            </a>
          @else
            <span class="cert-link cert-link--disabled" aria-label="Certificate link pending">
              <i class="fas fa-clock" aria-hidden="true"></i>Link Pending
            </span>
          @endif
        </div>
      @endforeach
    </div>

  </div>
</section>

<style>
/* ── Certifications ── */
.cert-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: clamp(9px,1.4vw,13px);
}
.cert-card {
  background: var(--ink-2); border: 1px solid var(--brd);
  padding: clamp(16px,2.5vw,24px);
  display: flex; flex-direction: column;
  transition: all .4s; position: relative; overflow: hidden;
}
.cert-card::before {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(90deg, var(--amber), var(--amber-xl), transparent);
  transform: scaleX(0); transform-origin: left;
  transition: transform .4s var(--e1);
}
.cert-card:hover {
  border-color: var(--amber-b);
  transform: translateY(-4px);
  box-shadow: 0 16px 44px rgba(0,0,0,.5);
}
.cert-card:hover::before { transform: scaleX(1); }

.cert-ico {
  width: 42px; height: 42px;
  border: 1px solid var(--amber-b); background: var(--amber-f);
  display: flex; align-items: center; justify-content: center;
  color: var(--amber); font-size: 1.1rem; margin-bottom: 13px;
  transition: all .3s;
}
.cert-card:hover .cert-ico {
  background: linear-gradient(135deg, var(--amber), var(--amber-l));
  color: var(--ink-0);
}
.cert-name {
  font-family: var(--sans); font-size: clamp(.82rem,.97vw,.92rem);
  font-weight: 600; color: var(--t-primary);
  margin-bottom: 7px; line-height: 1.4; flex: 1;
}
.cert-issuer {
  font-family: var(--sans); font-size: clamp(.72rem,.85vw,.78rem);
  font-weight: 400; color: var(--t-secondary);
  display: flex; align-items: center; gap: 5px;
  margin-bottom: 13px;
}
.cert-link {
  display: inline-flex; align-items: center; gap: 5px;
  font-family: var(--mono); font-size: clamp(.5rem,.63vw,.59rem);
  color: var(--amber-l); text-decoration: none;
  border: 1px solid var(--amber-b); padding: 5px 12px;
  background: var(--amber-f); transition: all .3s;
  align-self: flex-start; margin-top: auto;
}
.cert-link:hover {
  background: linear-gradient(135deg, var(--amber), var(--amber-l));
  color: var(--ink-0); border-color: transparent;
}
.cert-link--disabled { opacity: .45; }

@media (max-width: 1024px) { .cert-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width: 600px)  { .cert-grid { grid-template-columns: 1fr; } }
</style>

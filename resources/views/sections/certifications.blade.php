{{--
    Certifications Section
    Data: $certifications[] - each: { icon, name, issuer, issuer_icon, cert_url }
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
      'name'        => 'The SQL Programming Masterclass - Beginner to Expert',
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

 

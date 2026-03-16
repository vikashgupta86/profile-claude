{{--
    Contact Section
    Data: $portfolio (email, phone, location, linkedin), $contactInfo[]
--}}
@php
  $p = $portfolio ?? null;

  $contactInfo = $contactInfo ?? [
    [
      'icon'  => 'fas fa-envelope',
      'key'   => 'EMAIL',
      'value' => $p->email ?? 'vikashkumarbth381@gmail.com',
      'href'  => 'mailto:' . ($p->email ?? 'vikashkumarbth381@gmail.com'),
    ],
    [
      'icon'  => 'fas fa-phone',
      'key'   => 'PHONE',
      'value' => $p->phone ?? '+91 95239 19654',
      'href'  => 'tel:' . preg_replace('/\s+/', '', $p->phone ?? '+919523919654'),
    ],
    [
      'icon'  => 'fas fa-map-marker-alt',
      'key'   => 'LOCATION',
      'value' => ($p->location ?? 'New Delhi') . ', India 🇮🇳',
      'href'  => null,
    ],
    [
      'icon'  => 'fab fa-linkedin-in',
      'key'   => 'LINKEDIN',
      'value' => $p->linkedin_handle ?? 'vikash-kumar-computer-science',
      'href'  => $p->linkedin ?? 'https://linkedin.com/in/vikash-kumar-computer-science',
      'external' => true,
    ],
  ];

  $intro = $p->contact_intro ?? "Have a project, opportunity, or want to connect? I'm always open to new challenges. I respond within 24 hours.";
@endphp

<!-- CONTACT -->
<section id="contact" class="section">
<div class="sec-max">
  <div class="rv"><div class="sec-eye">Get In Touch</div><h2 class="sec-h">Contact <em>Me</em></h2></div>
  <div class="ct-layout">
    <div class="rv">
      <p class="ct-p">{{ $intro }}</p>
      @foreach($contactInfo as $info)
        <div class="ct-row"><div class="ct-ico"><i class="{{ $info['icon'] }}"></i></div><div><div class="ct-k">{{ $info['key'] }}</div><div class="ct-v">
          @if(!empty($info['href']))
            <a href="{{ $info['href'] }}" {{ !empty($info['external']) ? 'target=_blank rel=noopener' : '' }}>{{ $info['value'] }}</a>
          @else
            {{ $info['value'] }}
          @endif
        </div></div></div>
      @endforeach
    </div>
    <div class="rv d1">
      <form id="cf">
        <div class="fr">
          <div class="fg"><label class="fl">YOUR NAME</label><input class="fi" type="text" name="name" placeholder="John Doe" required></div>
          <div class="fg"><label class="fl">EMAIL ADDRESS</label><input class="fi" type="email" name="email" placeholder="john@company.com" required></div>
        </div>
        <div class="fg"><label class="fl">SUBJECT</label><input class="fi" type="text" name="subject" placeholder="Laravel Developer Opportunity" required></div>
        <div class="fg"><label class="fl">YOUR MESSAGE</label><textarea class="fi" name="message" placeholder="Hi Vikash, I'd love to discuss..." required></textarea></div>
        <button type="submit" class="fsub" id="sb"><i class="fas fa-paper-plane"></i> SEND MESSAGE</button>
      </form>
    </div>
  </div>
</div>
</section>

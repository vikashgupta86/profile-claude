{{--
    Contact Section
    Data: $portfolio (email, phone, location, linkedin), $contactInfo[]
--}}
@php
  $p = $portfolio ?? null;

  $contactInfo = $contactInfo ?? [
    [
      'icon'  => 'fas fa-envelope',
      'key'   => 'Email',
      'value' => $p->email ?? 'vikashkumarbth381@gmail.com',
      'href'  => 'mailto:' . ($p->email ?? 'vikashkumarbth381@gmail.com'),
    ],
    [
      'icon'  => 'fas fa-phone',
      'key'   => 'Phone',
      'value' => $p->phone ?? '+91 95239 19654',
      'href'  => 'tel:' . preg_replace('/\s+/', '', $p->phone ?? '+919523919654'),
    ],
    [
      'icon'  => 'fas fa-map-marker-alt',
      'key'   => 'Location',
      'value' => ($p->location ?? 'New Delhi') . ', India 🇮🇳',
      'href'  => null,
    ],
    [
      'icon'  => 'fab fa-linkedin-in',
      'key'   => 'LinkedIn',
      'value' => $p->linkedin_handle ?? 'vikash-kumar-computer-science',
      'href'  => $p->linkedin ?? 'https://linkedin.com/in/vikash-kumar-computer-science',
      'external' => true,
    ],
  ];

  $intro = $p->contact_intro ?? "Have a project, opportunity, or want to connect? I'm always open to new challenges and collaborations. I respond within 24 hours.";
@endphp

<section id="contact" class="sec" style="background: var(--ink-2); position:relative; overflow:hidden;">

  {{-- Background glow --}}
  <div style="position:absolute;bottom:-260px;right:-160px;width:580px;height:580px;border-radius:50%;background:radial-gradient(circle,rgba(200,134,10,.04),transparent 65%);pointer-events:none;" aria-hidden="true"></div>

  <div class="sec-in">
    <div class="rv">
      <div class="tag">Get In Touch</div>
      <h2 class="sh">Contact <em>Me</em></h2>
    </div>

    <div class="ct-grid">

      {{-- ── Left: info ── --}}
      <div class="rv">
        <p class="ct-intro">{{ $intro }}</p>

        @foreach($contactInfo as $info)
          <div class="ct-row">
            <div class="ct-icon"><i class="{{ $info['icon'] }}" aria-hidden="true"></i></div>
            <div>
              <div class="ct-key">{{ $info['key'] }}</div>
              <div class="ct-val">
                @if(!empty($info['href']))
                  <a href="{{ $info['href'] }}"
                     {{ !empty($info['external']) ? 'target=_blank rel=noopener' : '' }}>
                    {{ $info['value'] }}
                  </a>
                @else
                  {{ $info['value'] }}
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{-- ── Right: form ── --}}
      <div class="rv d1">
        <form id="contact-form" novalidate>
          @csrf
          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="name">Your Name</label>
              <input class="form-input" id="name" type="text" name="name"
                     placeholder="John Doe" required autocomplete="name">
            </div>
            <div class="form-group">
              <label class="form-label" for="email">Email Address</label>
              <input class="form-input" id="email" type="email" name="email"
                     placeholder="john@company.com" required autocomplete="email">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="subject">Subject</label>
            <input class="form-input" id="subject" type="text" name="subject"
                   placeholder="Laravel Developer Opportunity" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="message">Your Message</label>
            <textarea class="form-input" id="message" name="message"
                      placeholder="Hi Vikash, I'd love to discuss…" required></textarea>
          </div>
          <button type="submit" class="form-submit" id="submit-btn">
            <i class="fas fa-paper-plane" aria-hidden="true"></i>
            Send Message
          </button>
        </form>
      </div>

    </div>
  </div>
</section>

<style>
/* ── Contact ── */
.ct-grid {
  display: grid;
  grid-template-columns: 1fr 1.55fr;
  gap: clamp(36px,6vw,80px);
  align-items: start;
}
.ct-intro {
  font-family: var(--sans); color: var(--t-secondary);
  line-height: 1.9; font-size: clamp(.86rem,1.04vw,.98rem);
  font-weight: 400; margin-bottom: clamp(18px,2.8vw,26px);
}
.ct-row {
  display: flex; align-items: flex-start; gap: 12px;
  padding: clamp(9px,1.4vw,13px);
  border: 1px solid transparent; transition: all .3s; margin-bottom: 2px;
}
.ct-row:hover { border-color: var(--brd); background: var(--ink-3); }
.ct-icon {
  width: 40px; height: 40px; flex-shrink: 0;
  border: 1px solid var(--amber-b); background: var(--amber-f);
  display: flex; align-items: center; justify-content: center;
  color: var(--amber); font-size: .84rem; transition: all .3s;
}
.ct-row:hover .ct-icon {
  background: linear-gradient(135deg, var(--amber), var(--amber-l));
  color: var(--ink-0); border-color: transparent;
}
.ct-key {
  font-family: var(--mono); font-size: clamp(.47rem,.6vw,.55rem);
  color: var(--t-faint); letter-spacing: 2.5px; text-transform: uppercase;
  margin-bottom: 2px;
}
.ct-val {
  font-family: var(--sans); color: var(--t-primary);
  font-size: clamp(.8rem,.95vw,.87rem); font-weight: 400; word-break: break-all;
}
.ct-val a { color: var(--t-primary); text-decoration: none; transition: color .2s; }
.ct-val a:hover { color: var(--amber-l); }

/* Form */
.form-group { margin-bottom: 11px; }
.form-label {
  display: block; font-family: var(--mono);
  font-size: clamp(.47rem,.6vw,.55rem); color: var(--amber-l);
  letter-spacing: 2.5px; text-transform: uppercase; margin-bottom: 6px;
}
.form-input {
  width: 100%; background: var(--ink-1); border: 1px solid var(--brd);
  color: var(--t-primary);
  padding: clamp(10px,1.5vw,13px) clamp(11px,1.8vw,15px);
  font-family: var(--sans); font-size: clamp(.82rem,.97vw,.9rem);
  font-weight: 400; outline: none; transition: all .3s;
  -webkit-appearance: none;
}
.form-input::placeholder { color: rgba(122,113,104,.32); }
.form-input:focus {
  border-color: var(--amber-b); background: var(--ink-2);
  box-shadow: 0 0 0 3px rgba(200,134,10,.06);
}
textarea.form-input { min-height: clamp(100px,13vw,130px); resize: vertical; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
.form-submit {
  width: 100%; padding: clamp(12px,1.7vw,15px); margin-top: 6px;
  background: linear-gradient(135deg, var(--amber), var(--amber-l) 50%, var(--amber));
  background-size: 220%; color: var(--ink-0);
  font-family: var(--sans); font-weight: 700;
  font-size: clamp(.82rem,.98vw,.9rem); letter-spacing: .5px;
  border: none; transition: all .3s;
  display: flex; align-items: center; justify-content: center; gap: 8px;
  animation: shimmer 5s linear infinite;
}
.form-submit:hover { transform: translateY(-2px); box-shadow: 0 11px 30px rgba(200,134,10,.22); }
.form-submit:disabled { opacity: .45; transform: none; box-shadow: none; }

/* Responsive */
@media (max-width: 1024px) { .ct-grid { grid-template-columns: 1fr; } }
@media (max-width: 600px)  { .form-row { grid-template-columns: 1fr; } }
</style>

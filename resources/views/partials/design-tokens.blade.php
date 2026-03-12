<style>
/* ══════════════════════════════════════════════
   DESIGN TOKENS — Natural Editorial Palette
   Fonts: Lora (serif) + DM Sans (body) + DM Mono
══════════════════════════════════════════════ */
:root {
  /* ── Ink palette (deep warm darks) ── */
  --ink-0: #0D0B09;
  --ink-1: #131008;
  --ink-2: #1A1610;
  --ink-3: #22190F;
  --ink-4: #2C2016;
  --ink-5: #37291D;

  /* ── Parchment / warm cream accents ── */
  --parch-0: #F8F3EA;
  --parch-1: #EDE5D6;
  --parch-2: #DCCFB8;
  --parch-3: #C9BAA0;

  /* ── Ochre / amber accent ── */
  --amber:   #C8860A;
  --amber-l: #E0A030;
  --amber-xl:#F0BA58;
  --amber-f:  rgba(200,134,10,.07);
  --amber-b:  rgba(200,134,10,.22);
  --amber-gg: rgba(200,134,10,.14);

  /* ── Text ── */
  --t-primary:   #F4EEE4;
  --t-secondary: #B8AFA0;
  --t-muted:     #7A7168;
  --t-faint:     #3E3830;

  /* ── Borders & overlays ── */
  --brd: rgba(244,238,228,.055);
  --brd-strong: rgba(244,238,228,.12);

  /* ── Status ── */
  --green: #4BAB7C;
  --red:   #C85555;

  /* ── Fonts ── */
  --serif: 'Lora', Georgia, serif;
  --sans:  'DM Sans', -apple-system, sans-serif;
  --mono:  'DM Mono', 'Fira Mono', monospace;

  /* ── Easing ── */
  --e1: cubic-bezier(.4,0,.2,1);
  --e2: cubic-bezier(.19,1,.22,1);

  /* ── Spacing ── */
  --gutter: clamp(20px,5vw,72px);
  --py:     clamp(72px,9vw,128px);
}

/* ══════════════════════════════════════════════
   RESET + BASE
══════════════════════════════════════════════ */
*, ::before, ::after { box-sizing: border-box; margin: 0; padding: 0; }
html {
  scroll-behavior: smooth;
  scrollbar-width: thin;
  scrollbar-color: var(--amber) var(--ink-0);
}
::-webkit-scrollbar { width: 3px; }
::-webkit-scrollbar-thumb { background: linear-gradient(var(--amber), var(--amber-l)); border-radius: 2px; }

body {
  background: var(--ink-0);
  color: var(--t-primary);
  font-family: var(--sans);
  font-weight: 400;
  overflow-x: hidden;
  line-height: 1.75;
  cursor: none;                 /* custom cursor */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
img { display: block; width: 100%; object-fit: cover; }
a, button { cursor: none; }

/* touch devices: restore native cursor */
@media (hover: none) {
  body, a, button { cursor: auto; }
  #cursor-dot, #cursor-ring { display: none !important; }
}

/* ── Shared Section ── */
.sec { padding: var(--py) var(--gutter); }
.sec-in { max-width: 1400px; margin: 0 auto; }

/* ── Eyebrow tag ── */
.tag {
  font-family: var(--mono);
  font-size: clamp(.52rem,.68vw,.62rem);
  color: var(--amber-l);
  letter-spacing: 4px;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 10px;
}
.tag::before {
  content: '';
  width: 20px; height: 1px;
  background: linear-gradient(90deg, var(--amber), transparent);
}

/* ── Section heading ── */
.sh {
  font-family: var(--serif);
  font-weight: 700;
  font-size: clamp(2rem, 5.5vw, 5rem);
  line-height: .88;
  letter-spacing: -.5px;
  color: var(--t-primary);
  margin-bottom: clamp(32px, 5vw, 60px);
}
.sh em {
  font-style: italic;
  background: linear-gradient(110deg, var(--amber), var(--amber-xl));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* ── Reveal animation ── */
.rv {
  opacity: 0;
  transform: translateY(28px);
  transition: opacity .75s var(--e1), transform .75s var(--e1);
}
.rv.in { opacity: 1 !important; transform: none !important; }
.d1 { transition-delay: .09s; }
.d2 { transition-delay: .18s; }
.d3 { transition-delay: .27s; }
.d4 { transition-delay: .36s; }
.d5 { transition-delay: .45s; }

/* ── Keyframes ── */
@keyframes shimmer { to { background-position: 220% 50%; } }
@keyframes fadeIn  { from { opacity: 0; } to { opacity: 1; } }
@keyframes slideUp { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: none; } }
@keyframes blink   { 0%,100% { opacity: 1; } 50% { opacity: 0; } }
@keyframes pulse   { 0%,100% { transform: scale(1); } 50% { transform: scale(1.5); } }
@keyframes spin    { to { transform: rotate(360deg); } }
@keyframes glow    {
  0%,100% { box-shadow: 0 0 50px rgba(200,134,10,.2), 0 0 110px rgba(200,134,10,.07); }
  50%     { box-shadow: 0 0 78px rgba(200,134,10,.42), 0 0 160px rgba(200,134,10,.16); }
}
@keyframes float   { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-9px); } }
@keyframes drop    { 0% { top: -100%; } 100% { top: 200%; } }
</style>

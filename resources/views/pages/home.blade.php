<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vikash Kumar — Laravel Developer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Satoshi:wght@300;400;500;700;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
/* ══════════════════════════════════════
   DESIGN TOKENS
══════════════════════════════════════ */
:root {
  --black:   #030308;
  --deep:    #070712;
  --card:    #0B0B1E;
  --raised:  #0F0F28;
  --border:  rgba(255,255,255,.07);
  --border2: rgba(99,179,237,.25);

  --cyan:    #63B3ED;
  --cyan2:   rgba(99,179,237,.15);
  --cyan3:   rgba(99,179,237,.06);
  --glow:    rgba(99,179,237,.4);

  --purple:  #B794F4;
  --purple2: rgba(183,148,244,.12);

  --gold:    #F6C90E;
  --gold2:   rgba(246,201,14,.12);

  --green:   #48BB78;
  --red:     #FC8181;

  --white:   #F7F8FF;
  --muted:   #8892B0;
  --dim:     #3A3F5C;

  --font-display: 'Clash Display', sans-serif;
  --font-body:    'Satoshi', sans-serif;
  --font-code:    'JetBrains Mono', monospace;

  --ease:    cubic-bezier(.4,0,.2,1);
  --spring:  cubic-bezier(.175,.885,.32,1.275);
  --snap:    cubic-bezier(.19,1,.22,1);
}

/* ══════════════════════════════════════
   RESET
══════════════════════════════════════ */
*,::before,::after { box-sizing: border-box; margin: 0; padding: 0 }
html { scroll-behavior: smooth; scrollbar-width: thin; scrollbar-color: var(--cyan) var(--deep) }
::-webkit-scrollbar { width: 3px }
::-webkit-scrollbar-thumb { background: var(--cyan) }
body { background: var(--black); color: var(--white); font-family: var(--font-body); overflow-x: hidden; line-height: 1.6 }
img { display: block; max-width: 100% }

/* ══════════════════════════════════════
   LOADER
══════════════════════════════════════ */
#loader {
  position: fixed; inset: 0; z-index: 9999; background: var(--black);
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  transition: opacity .5s var(--ease), visibility .5s;
}
#loader.done { opacity: 0; visibility: hidden }
.ld-mark {
  font-family: var(--font-display); font-size: clamp(4rem,10vw,7rem);
  font-weight: 700; letter-spacing: -4px; line-height: 1;
  background: linear-gradient(135deg, var(--cyan) 0%, var(--purple) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.ld-line { width: 1px; height: 60px; background: linear-gradient(var(--cyan), transparent);
  margin: 16px auto; animation: grow .4s .3s var(--ease) both }
.ld-txt { font-family: var(--font-code); font-size: .65rem; letter-spacing: 5px;
  color: var(--muted); animation: fadeUp .4s .5s var(--ease) both }
.ld-bar { width: 120px; height: 1px; background: var(--border); overflow: hidden; margin-top: 24px }
.ld-prog { height: 100%; background: linear-gradient(90deg, var(--cyan), var(--purple));
  animation: fill 2.2s var(--ease) forwards }
@keyframes grow { from { height: 0 } to { height: 60px } }
@keyframes fill { from { width: 0 } to { width: 100% } }

/* ══════════════════════════════════════
   NAVIGATION
══════════════════════════════════════ */
#nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 500;
  padding: 22px 6%; transition: all .4s var(--ease);
}
#nav.stuck {
  padding: 14px 6%;
  background: rgba(3,3,8,.88);
  backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);
  border-bottom: 1px solid var(--border);
}
.nav-w { max-width: 1280px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between }
.nav-logo {
  font-family: var(--font-display); font-size: 1.5rem; font-weight: 700;
  letter-spacing: -1px; text-decoration: none;
  background: linear-gradient(90deg, var(--cyan), var(--purple));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.nav-links { list-style: none; display: flex; gap: 2.2rem }
.nav-links a {
  font-family: var(--font-code); font-size: .68rem; color: var(--muted);
  text-decoration: none; letter-spacing: 1px; transition: color .2s; position: relative; padding-bottom: 3px;
}
.nav-links a .idx { color: var(--cyan); font-size: .58rem; margin-right: 3px }
.nav-links a:hover, .nav-links a.act { color: var(--white) }
.nav-links a::after { content: ''; position: absolute; bottom: 0; left: 0; width: 0; height: 1px; background: var(--cyan); transition: width .3s var(--ease) }
.nav-links a:hover::after, .nav-links a.act::after { width: 100% }
.nav-cta {
  font-family: var(--font-code); font-size: .68rem; letter-spacing: 1px;
  color: var(--cyan); border: 1px solid var(--border2); padding: 8px 20px;
  text-decoration: none; transition: all .3s; display: flex; align-items: center; gap: 7px;
}
.nav-cta:hover { background: var(--cyan); color: var(--black); box-shadow: 0 0 28px var(--glow) }
.nav-hamburger { display: none; flex-direction: column; gap: 5px; background: none; border: none; cursor: pointer; padding: 3px }
.nav-hamburger span { width: 22px; height: 1.5px; background: var(--white); display: block; transition: all .3s }

/* ══════════════════════════════════════
   HERO  — cinematic full-bleed design
══════════════════════════════════════ */
#hero {
  min-height: 100vh; position: relative; overflow: hidden;
  display: flex; align-items: center;
  background: var(--black);
}

/* Diagonal grid lines */
#hero::before {
  content: ''; position: absolute; inset: 0; z-index: 0; pointer-events: none;
  background-image:
    linear-gradient(rgba(99,179,237,.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(99,179,237,.04) 1px, transparent 1px);
  background-size: 60px 60px;
  mask-image: radial-gradient(ellipse 90% 85% at 50% 50%, black 40%, transparent 100%);
  -webkit-mask-image: radial-gradient(ellipse 90% 85% at 50% 50%, black 40%, transparent 100%);
}
/* Large sweep glow behind everything */
#hero::after {
  content: ''; position: absolute; z-index: 0; pointer-events: none;
  width: 120%; height: 120%; top: -10%; left: -10%;
  background:
    radial-gradient(ellipse 55% 60% at 70% 50%, rgba(99,179,237,.055) 0%, transparent 65%),
    radial-gradient(ellipse 40% 40% at 25% 70%, rgba(183,148,244,.04) 0%, transparent 60%);
}

.hero-inner {
  position: relative; z-index: 2; max-width: 1320px; margin: 0 auto;
  padding: 0 6%; width: 100%;
  display: grid; grid-template-columns: 1fr 440px;
  gap: 80px; align-items: center;
  min-height: 100vh; padding-top: 92px; padding-bottom: 60px;
}

/* ─── Left text ─── */
/* Pill tag */
.hero-tag {
  display: inline-flex; align-items: center; gap: 9px;
  background: rgba(99,179,237,.08); border: 1px solid rgba(99,179,237,.2);
  border-radius: 100px;
  padding: 6px 16px 6px 10px;
  font-family: var(--font-code); font-size: .65rem;
  color: var(--cyan); letter-spacing: 2px; margin-bottom: 28px;
  opacity: 0; animation: fadeUp .6s .05s var(--ease) both;
}
.status-dot {
  width: 7px; height: 7px; border-radius: 50%; background: var(--green);
  box-shadow: 0 0 0 2px rgba(72,187,120,.25), 0 0 8px var(--green);
  animation: blink-dot 2s ease-in-out infinite; flex-shrink: 0;
}
@keyframes blink-dot { 0%,100%{opacity:.6;transform:scale(1)} 50%{opacity:1;transform:scale(1.3)} }

/* Giant name */
h1.hero-name {
  font-family: var(--font-display); font-weight: 700;
  font-size: clamp(4.5rem,8.5vw,9.5rem); line-height: .86; letter-spacing: -5px;
  margin-bottom: 18px;
  opacity: 0; animation: fadeUp .7s .18s var(--ease) both;
}
.hero-name .n1 { display: block; color: var(--white) }
.hero-name .n2 {
  display: block; position: relative;
  background: linear-gradient(110deg, var(--cyan) 0%, var(--purple) 50%, var(--gold) 100%);
  background-size: 200% 100%;
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  animation: shimmer 5s linear infinite;
}
@keyframes shimmer { 0%{background-position:200% 0} 100%{background-position:-200% 0} }

/* Role typewriter */
.hero-role-wrap {
  display: flex; align-items: center; gap: 12px; margin-bottom: 22px;
  opacity: 0; animation: fadeUp .6s .34s var(--ease) both;
}
.hero-role-bar { width: 3px; height: 22px; background: linear-gradient(var(--cyan), var(--purple)); border-radius: 2px; flex-shrink: 0 }
.hero-role {
  font-family: var(--font-code); font-size: 1rem; color: var(--gold);
  display: flex; align-items: center; gap: 8px; min-height: 1.5rem;
}
.hero-cursor { animation: cursor-blink .7s step-end infinite }
@keyframes cursor-blink { 0%,100%{opacity:1} 50%{opacity:0} }

/* Bio */
.hero-bio {
  font-size: 1.05rem; color: var(--muted); line-height: 1.85; max-width: 500px;
  margin-bottom: 32px;
  opacity: 0; animation: fadeUp .6s .46s var(--ease) both;
}
.hero-bio strong { color: var(--white); font-weight: 600 }

/* Stat row */
.hero-stats {
  display: flex; gap: 32px; margin-bottom: 34px;
  opacity: 0; animation: fadeUp .6s .56s var(--ease) both;
}
.hstat {
  display: flex; flex-direction: column; gap: 2px;
  padding-right: 32px; border-right: 1px solid var(--border);
}
.hstat:last-child { border-right: none; padding-right: 0 }
.hstat-n {
  font-family: var(--font-display); font-size: 2.2rem; font-weight: 700; line-height: 1;
  background: linear-gradient(135deg, var(--cyan), var(--purple));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.hstat-l { font-family: var(--font-code); font-size: .58rem; color: var(--muted); letter-spacing: 2px; text-transform: uppercase }

/* Buttons */
.hero-btns {
  display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 32px;
  opacity: 0; animation: fadeUp .6s .66s var(--ease) both;
}
.btn-primary {
  display: inline-flex; align-items: center; gap: 9px;
  padding: 14px 28px; font-family: var(--font-body); font-weight: 700; font-size: .9rem;
  background: linear-gradient(135deg, var(--cyan), var(--purple));
  color: var(--black); text-decoration: none; border: none; cursor: pointer;
  clip-path: polygon(0 0,calc(100% - 10px) 0,100% 10px,100% 100%,0 100%);
  transition: all .3s; position: relative; overflow: hidden;
}
.btn-primary::after { content: ''; position: absolute; inset: 0; background: rgba(255,255,255,.15); opacity: 0; transition: opacity .3s }
.btn-primary:hover::after { opacity: 1 }
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 18px 44px rgba(99,179,237,.35) }
.btn-secondary {
  display: inline-flex; align-items: center; gap: 9px;
  padding: 13px 28px; font-family: var(--font-body); font-weight: 600; font-size: .9rem;
  background: transparent; color: var(--cyan); border: 1px solid var(--border2);
  text-decoration: none; cursor: pointer; transition: all .3s;
}
.btn-secondary:hover { background: var(--cyan2); border-color: var(--cyan); transform: translateY(-3px) }
.btn-ghost {
  display: inline-flex; align-items: center; gap: 9px;
  padding: 13px 28px; font-family: var(--font-body); font-weight: 600; font-size: .9rem;
  background: transparent; color: var(--muted); border: 1px solid var(--border);
  text-decoration: none; cursor: pointer; transition: all .3s;
}
.btn-ghost:hover { border-color: var(--muted); color: var(--white); transform: translateY(-3px) }

/* Socials */
.hero-socials {
  display: flex; align-items: center; gap: 0;
  opacity: 0; animation: fadeUp .6s .76s var(--ease) both;
}
.hero-socials-label { font-family: var(--font-code); font-size: .58rem; color: var(--dim); letter-spacing: 2px; margin-right: 16px }
.soc-btn {
  width: 40px; height: 40px; border: 1px solid var(--border); border-left: none;
  display: flex; align-items: center; justify-content: center;
  color: var(--muted); font-size: .88rem; text-decoration: none; transition: all .3s;
}
.soc-btn:first-of-type { border-left: 1px solid var(--border) }
.soc-btn:hover { background: var(--cyan3); color: var(--cyan); border-color: var(--border2) }

/* ─── Right: Avatar ─── */
.hero-visual {
  display: flex; align-items: center; justify-content: center;
  opacity: 0; animation: fadeIn 1s 1.6s both;
}
.av-shell { position: relative; width: 400px; height: 400px; flex-shrink: 0 }

/* Outer orbit ring with trail */
.av-ring1 {
  position: absolute; inset: -32px; border-radius: 50%;
  border: 1px dashed rgba(99,179,237,.12);
  animation: rotate 26s linear infinite;
}
.av-ring1::before, .av-ring1::after {
  content: ''; position: absolute; border-radius: 50%;
}
.av-ring1::before {
  width: 10px; height: 10px; background: var(--cyan);
  top: 50%; left: -5px; transform: translateY(-50%);
  box-shadow: 0 0 14px 3px rgba(99,179,237,.5);
}
.av-ring1::after {
  width: 6px; height: 6px; background: var(--gold);
  bottom: 10%; right: -3px;
  box-shadow: 0 0 8px 2px rgba(246,201,14,.4);
}
.av-ring2 {
  position: absolute; inset: -12px; border-radius: 50%;
  border: 1px solid rgba(183,148,244,.15);
  animation: rotate 16s linear infinite reverse;
}
.av-ring2::before {
  content: ''; position: absolute; width: 8px; height: 8px;
  background: var(--purple); border-radius: 50%;
  bottom: -4px; left: 50%; transform: translateX(-50%);
  box-shadow: 0 0 10px 2px rgba(183,148,244,.45);
}
@keyframes rotate { to { transform: rotate(360deg) } }

/* Photo shape — hexagonal clip */
.av-outer {
  position: absolute; inset: 0;
  background: linear-gradient(135deg, var(--cyan), var(--purple), var(--gold));
  border-radius: 50%;
  padding: 3px;
  box-shadow:
    0 0 40px rgba(99,179,237,.35),
    0 0 100px rgba(99,179,237,.12),
    0 0 200px rgba(99,179,237,.05);
  animation: glow-pulse 4s ease-in-out infinite;
}
@keyframes glow-pulse {
  0%,100%{ box-shadow: 0 0 40px rgba(99,179,237,.3), 0 0 100px rgba(99,179,237,.1) }
  50%{ box-shadow: 0 0 60px rgba(99,179,237,.5), 0 0 140px rgba(99,179,237,.2), 0 0 200px rgba(183,148,244,.1) }
}
.av-inner {
  width: 100%; height: 100%; border-radius: 50%; overflow: hidden;
  background: var(--raised);
  display: flex; align-items: center; justify-content: center;
}
.av-inner img { width: 100%; height: 100%; object-fit: cover; object-position: top center; border-radius: 50% }
.av-monogram {
  font-family: var(--font-display); font-size: 6.5rem; font-weight: 700; line-height: 1;
  background: linear-gradient(135deg, var(--cyan), var(--purple));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}

/* Status badge */
.av-badge {
  position: absolute; bottom: -20px; left: 50%; transform: translateX(-50%);
  white-space: nowrap;
  background: linear-gradient(135deg, rgba(11,11,30,.96), rgba(15,15,40,.96));
  border: 1px solid rgba(99,179,237,.3);
  padding: 8px 24px; font-family: var(--font-code); font-size: .63rem;
  color: var(--cyan); letter-spacing: 2.5px;
  display: flex; align-items: center; gap: 10px;
  backdrop-filter: blur(20px);
  box-shadow: 0 4px 24px rgba(0,0,0,.5), 0 0 20px rgba(99,179,237,.1);
  clip-path: polygon(8px 0%,100% 0%,calc(100% - 8px) 100%,0% 100%);
}
.badge-dot {
  width: 7px; height: 7px; border-radius: 50%; background: var(--green);
  box-shadow: 0 0 0 3px rgba(72,187,120,.2), 0 0 8px var(--green);
  animation: blink-dot 2s ease-in-out infinite; flex-shrink: 0;
}

/* Floating tech chips — better positioned */
.av-chip {
  position: absolute; white-space: nowrap;
  background: rgba(8,8,22,.92); border: 1px solid rgba(255,255,255,.1);
  backdrop-filter: blur(16px); padding: 8px 16px;
  font-family: var(--font-code); font-size: .63rem; color: var(--white);
  display: flex; align-items: center; gap: 8px;
  box-shadow: 0 8px 32px rgba(0,0,0,.6), 0 0 0 1px rgba(99,179,237,.05);
  transition: border-color .3s;
}
.av-chip:hover { border-color: rgba(99,179,237,.3) }
.chip-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0 }
.chip-label { font-size: .6rem; color: var(--muted); display: block; margin-top: 1px }
.chip-a { top: 2%; right: -28%; animation: chip-float 4s ease-in-out infinite }
.chip-b { bottom: 14%; right: -24%; animation: chip-float 4s 1.4s ease-in-out infinite }
.chip-c { top: 36%; left: -30%; animation: chip-float 4s .7s ease-in-out infinite }
@keyframes chip-float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-11px)} }

/* Scroll hint */
.scroll-hint {
  position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%);
  display: flex; flex-direction: column; align-items: center; gap: 8px;
  opacity: 0; animation: fadeIn 1s 3.5s both; z-index: 2;
}
.scroll-hint span { font-family: var(--font-code); font-size: .55rem; color: var(--dim); letter-spacing: 4px }
.scroll-line { width: 1px; height: 48px; overflow: hidden; position: relative }
.scroll-line::after {
  content: ''; position: absolute; top: -100%; left: 0; width: 100%; height: 100%;
  background: linear-gradient(transparent, var(--cyan), transparent);
  animation: scroll-drop 2s ease-in-out infinite;
}
@keyframes scroll-drop { 0%{top:-100%} 100%{top:200%} }

/* ══════════════════════════════════════
   SHARED LAYOUT PRIMITIVES
══════════════════════════════════════ */
.section { padding: 100px 6% }
.section-inner { max-width: 1280px; margin: 0 auto }
.section-eye {
  font-family: var(--font-code); font-size: .65rem; color: var(--cyan);
  letter-spacing: 3.5px; display: flex; align-items: center; gap: 10px; margin-bottom: 8px;
}
.section-eye::before { content: ''; width: 20px; height: 1px; background: var(--cyan) }
.section-h {
  font-family: var(--font-display); font-size: clamp(2.2rem,3.8vw,3.4rem);
  font-weight: 700; line-height: .93; letter-spacing: -2px; color: var(--white); margin-bottom: 52px;
}
.section-h em { font-style: normal; color: var(--cyan) }

/* Reveal animations */
.rv { opacity: 0; transform: translateY(24px); transition: opacity .6s var(--ease), transform .6s var(--ease) }
.rv.in { opacity: 1 !important; transform: none !important }
.d1{transition-delay:.08s} .d2{transition-delay:.17s} .d3{transition-delay:.26s} .d4{transition-delay:.35s}

/* ══════════════════════════════════════
   ABOUT  —  premium bento-grid layout
══════════════════════════════════════ */
#about {
  background: var(--deep);
  position: relative; overflow: hidden;
}
#about::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background: radial-gradient(ellipse 60% 50% at 20% 50%, rgba(99,179,237,.04) 0%, transparent 65%);
}
.about-grid { display: grid; grid-template-columns: 380px 1fr; gap: 60px; align-items: start }

/* ── Bento left panel ── */
.about-panel { display: flex; flex-direction: column; gap: 12px }

/* Name card with gradient accent bar */
.info-card {
  background: var(--card); border: 1px solid var(--border);
  padding: 28px; position: relative; overflow: hidden; transition: border-color .3s;
}
.info-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, var(--cyan) 0%, var(--purple) 50%, var(--gold) 100%);
}
/* Decorative corner */
.info-card::after {
  content: ''; position: absolute; bottom: 0; right: 0;
  width: 80px; height: 80px;
  background: radial-gradient(circle at bottom right, rgba(99,179,237,.06) 0%, transparent 70%);
}
.info-card:hover { border-color: rgba(99,179,237,.2) }
.info-name {
  font-family: var(--font-display); font-size: 1.8rem; font-weight: 700;
  letter-spacing: -1px; color: var(--white); margin-bottom: 4px;
}
.info-title {
  font-family: var(--font-code); font-size: .66rem; color: var(--cyan);
  letter-spacing: 2.5px; margin-bottom: 18px;
}
.info-badges { display: flex; flex-wrap: wrap; gap: 7px }
.info-badge {
  background: rgba(99,179,237,.07); border: 1px solid rgba(99,179,237,.15);
  color: var(--cyan); padding: 4px 11px;
  font-family: var(--font-code); font-size: .62rem; letter-spacing: .5px;
  transition: all .3s; display: flex; align-items: center; gap: 5px;
}
.info-badge:hover { background: var(--cyan2); border-color: var(--cyan) }

/* 2×2 stats grid */
.stats-block { display: grid; grid-template-columns: 1fr 1fr; gap: 1px; background: var(--border) }
.stat-cell {
  background: var(--card); padding: 22px 18px; text-align: center;
  transition: background .3s; position: relative; overflow: hidden;
  cursor: default;
}
.stat-cell::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(99,179,237,.04) 0%, transparent 60%);
  opacity: 0; transition: opacity .3s;
}
.stat-cell::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--cyan), var(--purple));
  transform: scaleX(0); transition: transform .45s var(--ease);
}
.stat-cell:hover::before { opacity: 1 }
.stat-cell:hover { background: var(--raised) }
.stat-cell:hover::after { transform: scaleX(1) }
.stat-num {
  font-family: var(--font-display); font-size: 2.8rem; font-weight: 700; line-height: 1;
  background: linear-gradient(135deg, var(--cyan) 0%, var(--purple) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.stat-lbl { font-family: var(--font-code); font-size: .56rem; color: var(--muted); letter-spacing: 2.5px; margin-top: 6px; text-transform: uppercase }

/* Contact strip */
.contact-strip { background: var(--card); border: 1px solid var(--border); overflow: hidden }
.cs-row {
  display: flex; align-items: center; gap: 14px; padding: 12px 18px;
  border-bottom: 1px solid var(--border); transition: all .3s; position: relative;
}
.cs-row:last-child { border-bottom: none }
.cs-row::before {
  content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 2px;
  background: linear-gradient(var(--cyan), var(--purple));
  transform: scaleY(0); transition: transform .3s var(--ease);
}
.cs-row:hover { background: var(--raised); padding-left: 22px }
.cs-row:hover::before { transform: scaleY(1) }
.cs-ico {
  width: 34px; height: 34px; background: rgba(99,179,237,.07);
  border: 1px solid rgba(99,179,237,.18);
  display: flex; align-items: center; justify-content: center;
  color: var(--cyan); font-size: .78rem; flex-shrink: 0; transition: all .3s;
}
.cs-row:hover .cs-ico { background: rgba(99,179,237,.15); box-shadow: 0 0 14px rgba(99,179,237,.2) }
.cs-lbl { font-family: var(--font-code); font-size: .56rem; color: var(--muted); letter-spacing: 2.5px; margin-bottom: 2px }
.cs-val { font-size: .86rem; color: var(--white) }
.cs-val a { color: var(--white); text-decoration: none; transition: color .3s }
.cs-val a:hover { color: var(--cyan) }

/* ── Right text ── */
.about-body-col .section-h { margin-bottom: 22px }
.about-p { color: var(--muted); line-height: 1.92; font-size: .98rem; margin-bottom: 16px }
.about-p strong { color: var(--white); font-weight: 600 }

/* Experience mini timeline inside about */
.about-xp { margin-top: 28px }
.about-xp-title { font-family: var(--font-code); font-size: .62rem; color: var(--cyan); letter-spacing: 3px; margin-bottom: 16px; display: flex; align-items: center; gap: 10px }
.about-xp-title::before { content: ''; width: 16px; height: 1px; background: var(--cyan) }
.xp-row { display: flex; align-items: center; gap: 14px; padding: 10px 0; border-bottom: 1px solid var(--border) }
.xp-row:last-child { border-bottom: none }
.xp-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--cyan3); border: 1.5px solid var(--cyan); flex-shrink: 0 }
.xp-dot.now { background: var(--cyan); box-shadow: 0 0 8px rgba(99,179,237,.6) }
.xp-info { flex: 1 }
.xp-role { font-size: .9rem; color: var(--white); font-weight: 600 }
.xp-co { font-family: var(--font-code); font-size: .62rem; color: var(--muted); margin-top: 1px }
.xp-yr { font-family: var(--font-code); font-size: .6rem; color: var(--cyan); white-space: nowrap }

/* Strength chips */
.strengths { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 24px }
.strength {
  background: rgba(99,179,237,.06); border: 1px solid rgba(99,179,237,.14);
  color: var(--cyan); padding: 6px 14px;
  font-family: var(--font-code); font-size: .64rem; letter-spacing: .8px;
  transition: all .3s; position: relative; overflow: hidden;
}
.strength::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(135deg, var(--cyan2), transparent);
  opacity: 0; transition: opacity .3s;
}
.strength:hover::before { opacity: 1 }
.strength:hover { border-color: var(--cyan); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(99,179,237,.12) }

/* ══════════════════════════════════════
   SKILLS
══════════════════════════════════════ */
#skills { background: var(--deep) }
.skills-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 14px }
.skill-card {
  background: var(--card); border: 1px solid var(--border);
  padding: 24px 20px; transition: all .4s; position: relative; overflow: hidden;
}
.skill-card::before {
  content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 2px;
  background: linear-gradient(var(--cyan), var(--purple));
  transform: scaleY(0); transform-origin: top; transition: transform .4s var(--ease);
}
.skill-card:hover { border-color: rgba(99,179,237,.2); transform: translateY(-4px); box-shadow: 0 20px 50px rgba(0,0,0,.6), 0 0 30px rgba(99,179,237,.04) }
.skill-card:hover::before { transform: scaleY(1) }
.sk-em { font-size: 1.8rem; margin-bottom: 8px }
.sk-label { font-family: var(--font-code); font-size: .64rem; color: var(--cyan); letter-spacing: 2.5px; margin-bottom: 20px }
.sk-row { margin-bottom: 13px }
.sk-top { display: flex; justify-content: space-between; margin-bottom: 5px }
.sk-name { font-size: .82rem; color: var(--white) }
.sk-pct { font-family: var(--font-code); font-size: .65rem; color: var(--cyan) }
.sk-track { height: 2px; background: rgba(255,255,255,.06); border-radius: 1px; overflow: hidden }
.sk-fill { height: 100%; background: linear-gradient(90deg, var(--cyan), var(--purple)); width: 0; transition: width 1.5s var(--snap); border-radius: 1px }

/* ══════════════════════════════════════
   EXPERIENCE
══════════════════════════════════════ */
#experience { background: var(--black) }
.timeline { position: relative; padding-left: 38px }
.timeline::before {
  content: ''; position: absolute; left: 7px; top: 14px; bottom: 14px;
  width: 1px; background: linear-gradient(var(--cyan), rgba(99,179,237,.04));
}
.tl-entry { position: relative; margin-bottom: 20px }
.tl-bullet {
  position: absolute; left: -38px; top: 10px; width: 14px; height: 14px; border-radius: 50%;
  background: var(--black); border: 2px solid rgba(99,179,237,.3); transition: all .3s;
}
.tl-bullet.current {
  background: var(--cyan); border-color: var(--cyan);
  box-shadow: 0 0 16px var(--glow), 0 0 40px rgba(99,179,237,.2);
}
.tl-block {
  background: var(--card); border: 1px solid var(--border);
  padding: 24px 26px; transition: all .4s; position: relative; overflow: hidden;
}
.tl-block::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(90deg, var(--cyan), var(--purple), transparent);
  transform: scaleX(0); transform-origin: left; transition: transform .4s var(--ease);
}
.tl-block:hover { border-color: rgba(99,179,237,.18); box-shadow: 0 8px 40px rgba(0,0,0,.4) }
.tl-block:hover::before { transform: scaleX(1) }
.tl-date { font-family: var(--font-code); font-size: .62rem; color: var(--cyan); letter-spacing: 2px; margin-bottom: 8px }
.tl-head { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 4px }
.tl-role { font-family: var(--font-display); font-size: 1.2rem; font-weight: 600; color: var(--white) }
.tl-badge { background: rgba(99,179,237,.1); border: 1px solid rgba(99,179,237,.22); color: var(--cyan); font-family: var(--font-code); font-size: .56rem; padding: 2px 9px; letter-spacing: 1.5px }
.tl-company { color: var(--gold); font-size: .9rem; margin-bottom: 3px; display: flex; align-items: center; gap: 6px }
.tl-loc { font-family: var(--font-code); font-size: .62rem; color: var(--muted); margin-bottom: 14px; display: flex; align-items: center; gap: 5px }
.tl-list { list-style: none; display: flex; flex-direction: column; gap: 6px }
.tl-list li { color: var(--muted); font-size: .86rem; line-height: 1.7; padding-left: 15px; position: relative }
.tl-list li::before { content: '›'; position: absolute; left: 0; color: var(--cyan); font-size: 1.1rem; line-height: 1.45 }

/* ══════════════════════════════════════
   EDUCATION
══════════════════════════════════════ */
#education { background: var(--deep) }
.edu-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 14px }
.edu-card {
  background: var(--card); border: 1px solid var(--border);
  padding: 24px 20px; transition: all .4s; position: relative; overflow: hidden;
}
.edu-card::after {
  content: ''; position: absolute; top: 0; right: 0;
  width: 80px; height: 80px;
  background: radial-gradient(circle, rgba(99,179,237,.06) 0%, transparent 70%);
  transition: all .5s;
}
.edu-card:hover { border-color: rgba(99,179,237,.18); transform: translateY(-4px); box-shadow: 0 20px 50px rgba(0,0,0,.5) }
.edu-card:hover::after { width: 160px; height: 160px }
.edu-icon { font-size: 2rem; margin-bottom: 12px }
.edu-degree { font-family: var(--font-body); font-size: .98rem; font-weight: 700; color: var(--white); margin-bottom: 5px; line-height: 1.3 }
.edu-school { color: var(--cyan); font-size: .84rem; margin-bottom: 4px }
.edu-period { font-family: var(--font-code); font-size: .62rem; color: var(--muted); margin-bottom: 13px; display: flex; align-items: center; gap: 5px }
.edu-score { background: var(--gold2); border: 1px solid rgba(246,201,14,.22); color: var(--gold); font-family: var(--font-code); font-size: .68rem; padding: 4px 12px; display: inline-block }

/* ══════════════════════════════════════
   CERTIFICATIONS
══════════════════════════════════════ */
#certs { background: var(--black) }
.certs-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 14px }
.cert-card {
  background: var(--card); border: 1px solid var(--border);
  padding: 22px; display: flex; flex-direction: column; transition: all .4s; position: relative; overflow: hidden;
}
.cert-card::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--cyan), var(--purple));
  transform: scaleX(0); transform-origin: left; transition: transform .4s var(--ease);
}
.cert-card:hover { border-color: rgba(99,179,237,.2); transform: translateY(-4px); box-shadow: 0 20px 50px rgba(0,0,0,.5) }
.cert-card:hover::after { transform: scaleX(1) }
.cert-icon { font-size: 1.8rem; color: var(--cyan); margin-bottom: 11px }
.cert-name { font-size: .94rem; font-weight: 700; color: var(--white); margin-bottom: 5px; line-height: 1.35; flex: 1 }
.cert-issuer { color: var(--muted); font-size: .8rem; margin-bottom: 13px; display: flex; align-items: center; gap: 5px }
.cert-issuer i { color: var(--gold); font-size: .68rem }
.cert-link {
  background: transparent; border: 1px solid var(--border); color: var(--muted);
  padding: 5px 13px; font-family: var(--font-code); font-size: .63rem;
  cursor: pointer; transition: all .3s; text-decoration: none;
  display: inline-flex; align-items: center; gap: 5px; letter-spacing: 1px;
  align-self: flex-start; margin-top: auto;
}
.cert-link:hover { border-color: var(--cyan); color: var(--cyan) }

/* ══════════════════════════════════════
   PROJECTS
══════════════════════════════════════ */
#projects { background: var(--deep) }
.proj-filters { display: flex; gap: 8px; margin-bottom: 32px; flex-wrap: wrap }
.pf {
  background: transparent; border: 1px solid var(--border); color: var(--muted);
  padding: 6px 17px; font-family: var(--font-code); font-size: .65rem;
  cursor: pointer; letter-spacing: 1px; transition: all .3s;
}
.pf.on, .pf:hover { border-color: var(--cyan); color: var(--cyan); background: var(--cyan3) }
.proj-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px }
.proj-card {
  background: var(--card); border: 1px solid var(--border);
  overflow: hidden; transition: all .4s;
}
.proj-card:hover { border-color: rgba(99,179,237,.2); transform: translateY(-5px); box-shadow: 0 28px 60px rgba(0,0,0,.7), 0 0 40px rgba(99,179,237,.05) }
.proj-thumb { height: 192px; position: relative; overflow: hidden }
.proj-thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform .6s var(--ease), filter .6s; filter: brightness(.7) saturate(.75) }
.proj-card:hover .proj-thumb img { transform: scale(1.07); filter: brightness(.88) saturate(1) }
.proj-chrome {
  position: absolute; top: 0; left: 0; right: 0; height: 26px;
  background: rgba(0,0,0,.55); backdrop-filter: blur(4px);
  display: flex; align-items: center; gap: 5px; padding: 0 10px; z-index: 2;
}
.proj-chrome .url { flex: 1; height: 10px; background: rgba(255,255,255,.07); border-radius: 2px; margin: 0 8px }
.dot { width: 8px; height: 8px; border-radius: 50% }
.proj-overlay {
  position: absolute; inset: 0; z-index: 3; background: rgba(3,3,8,.8);
  display: flex; align-items: center; justify-content: center; gap: 12px;
  opacity: 0; transition: opacity .3s;
}
.proj-card:hover .proj-overlay { opacity: 1 }
.proj-ov-btn {
  width: 46px; height: 46px; border-radius: 50%;
  border: 2px solid rgba(255,255,255,.28);
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 1rem; text-decoration: none; transition: all .3s;
}
.proj-ov-btn:hover { background: var(--cyan); border-color: var(--cyan); color: var(--black); transform: scale(1.1) }
.proj-body { padding: 16px }
.proj-cat { font-family: var(--font-code); font-size: .6rem; color: var(--gold); letter-spacing: 2.5px; margin-bottom: 5px; text-transform: uppercase }
.proj-title { font-family: var(--font-display); font-size: 1rem; font-weight: 600; color: var(--white); margin-bottom: 7px; line-height: 1.25 }
.proj-desc { color: var(--muted); font-size: .82rem; line-height: 1.72; margin-bottom: 11px }
.proj-tags { display: flex; flex-wrap: wrap; gap: 4px; margin-bottom: 12px }
.proj-tag { background: var(--cyan3); border: 1px solid rgba(99,179,237,.14); color: var(--cyan); padding: 3px 8px; font-family: var(--font-code); font-size: .6rem }
.proj-links { display: flex; gap: 13px }
.proj-link { color: var(--muted); font-family: var(--font-code); font-size: .64rem; text-decoration: none; display: flex; align-items: center; gap: 4px; transition: color .3s; border-bottom: 1px solid transparent; padding-bottom: 1px }
.proj-link:hover { color: var(--cyan); border-color: var(--cyan) }

/* ══════════════════════════════════════
   CONTACT
══════════════════════════════════════ */
#contact { background: var(--black) }
.contact-layout { display: grid; grid-template-columns: 1fr 1.55fr; gap: 64px; align-items: start }
.contact-intro { color: var(--muted); line-height: 1.9; font-size: .97rem; margin-bottom: 28px }
.contact-row {
  display: flex; align-items: flex-start; gap: 13px;
  margin-bottom: 16px; padding: 13px; border: 1px solid transparent;
  transition: all .3s;
}
.contact-row:hover { border-color: var(--border); background: var(--card) }
.contact-ico { width: 42px; height: 42px; background: var(--cyan3); border: 1px solid rgba(99,179,237,.18); display: flex; align-items: center; justify-content: center; color: var(--cyan); font-size: .9rem; flex-shrink: 0; transition: all .3s }
.contact-row:hover .contact-ico { background: var(--cyan2); box-shadow: 0 0 18px rgba(99,179,237,.15) }
.contact-key { font-family: var(--font-code); font-size: .6rem; color: var(--cyan); letter-spacing: 2.5px; margin-bottom: 2px }
.contact-val { color: var(--white); font-size: .9rem }
.contact-val a { color: var(--white); text-decoration: none; transition: color .3s }
.contact-val a:hover { color: var(--cyan) }

/* Form */
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 13px }
.form-group { margin-bottom: 14px }
.form-lbl { display: block; font-family: var(--font-code); font-size: .6rem; color: var(--cyan); letter-spacing: 2.5px; margin-bottom: 6px }
.form-ctrl {
  width: 100%; background: var(--card); border: 1px solid var(--border); color: var(--white);
  padding: 13px 15px; font-family: var(--font-body); font-size: .92rem;
  outline: none; border-radius: 0; -webkit-appearance: none; transition: all .3s;
}
.form-ctrl::placeholder { color: rgba(136,146,176,.4) }
.form-ctrl:focus { border-color: var(--cyan); background: var(--raised); box-shadow: 0 0 0 3px rgba(99,179,237,.06) }
textarea.form-ctrl { min-height: 138px; resize: vertical }
.form-submit {
  width: 100%; padding: 14px; margin-top: 8px;
  background: linear-gradient(135deg, var(--cyan), var(--purple));
  color: var(--black); font-family: var(--font-body); font-weight: 800; font-size: .88rem;
  letter-spacing: 1.5px; border: none; cursor: pointer; transition: all .3s;
  display: flex; align-items: center; justify-content: center; gap: 9px;
  position: relative; overflow: hidden;
}
.form-submit::after { content: ''; position: absolute; inset: 0; background: rgba(255,255,255,.1); opacity: 0; transition: opacity .3s }
.form-submit:hover::after { opacity: 1 }
.form-submit:hover { transform: translateY(-2px); box-shadow: 0 14px 36px rgba(99,179,237,.25) }
.form-submit:disabled { opacity: .5; cursor: not-allowed; transform: none; box-shadow: none }

/* ══════════════════════════════════════
   TOAST
══════════════════════════════════════ */
.toast {
  position: fixed; bottom: 22px; right: 22px; z-index: 9999;
  background: var(--card); border: 1px solid var(--cyan);
  padding: 13px 20px; color: var(--white);
  display: flex; align-items: center; gap: 10px; max-width: 290px;
  box-shadow: 0 10px 40px rgba(0,0,0,.6);
  transform: translateY(80px); opacity: 0; transition: all .4s var(--ease);
}
.toast.show { transform: translateY(0); opacity: 1 }
.toast.err { border-color: var(--red) }
.toast i { color: var(--cyan); font-size: 1rem }
.toast.err i { color: var(--red) }

/* ══════════════════════════════════════
   FOOTER
══════════════════════════════════════ */
footer { background: var(--deep); border-top: 1px solid var(--border); padding: 48px 6% }
.footer-inner { max-width: 1280px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; gap: 20px }
.footer-logo { font-family: var(--font-display); font-size: 2rem; font-weight: 700; letter-spacing: -2px; background: linear-gradient(90deg, var(--cyan), var(--purple)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text }
.footer-nav { display: flex; gap: 26px; flex-wrap: wrap; justify-content: center }
.footer-nav a { font-family: var(--font-code); font-size: .65rem; color: var(--muted); text-decoration: none; letter-spacing: 1.5px; transition: color .3s }
.footer-nav a:hover { color: var(--cyan) }
.footer-socials { display: flex; gap: 9px }
.footer-soc { width: 36px; height: 36px; border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; color: var(--muted); text-decoration: none; font-size: .85rem; transition: all .3s }
.footer-soc:hover { border-color: var(--cyan); color: var(--cyan); background: var(--cyan3) }
.footer-copy { font-family: var(--font-code); font-size: .62rem; color: var(--muted); letter-spacing: 1px; text-align: center }
.footer-copy a { color: var(--cyan); text-decoration: none }

/* ══════════════════════════════════════
   KEYFRAMES
══════════════════════════════════════ */
@keyframes fadeUp { from{opacity:0;transform:translateY(18px)} to{opacity:1;transform:translateY(0)} }
@keyframes fadeIn { from{opacity:0} to{opacity:1} }

/* ══════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════ */
@media(max-width:1100px){
  .hero-inner{grid-template-columns:1fr;padding-top:100px;min-height:auto;gap:48px}
  .hero-visual{order:-1;justify-content:center}
  .av-shell{width:260px;height:260px}
  .av-chip{display:none}
  .hero-stats{gap:20px}
  .hstat{padding-right:20px}
  .about-grid{grid-template-columns:1fr}
  .skills-grid,.edu-grid,.certs-grid,.proj-grid{grid-template-columns:1fr 1fr}
  .contact-layout{grid-template-columns:1fr}
}
@media(max-width:768px){
  .nav-links,.nav-cta{display:none}
  .nav-hamburger{display:flex}
  .nav-links.open{display:flex;flex-direction:column;position:absolute;top:100%;left:0;right:0;background:rgba(3,3,8,.97);padding:18px 6%;gap:16px;border-bottom:1px solid var(--border)}
  .skills-grid,.edu-grid,.certs-grid,.proj-grid{grid-template-columns:1fr}
  .form-row{grid-template-columns:1fr}
  .section{padding:68px 6%}
  .hero-stats{flex-wrap:wrap;gap:16px}
  .hero-socials-label{display:none}
}
</style>
</head>
<body>

<!-- LOADER -->
<div id="loader">
  <div class="ld-mark">VK.</div>
  <div class="ld-line"></div>
  <div class="ld-txt">LARAVEL DEVELOPER</div>
  <div class="ld-bar"><div class="ld-prog"></div></div>
</div>

<!-- NAVIGATION -->
<nav id="nav">
  <div class="nav-w">
    <a href="#hero" class="nav-logo">VK.</a>
    <ul class="nav-links" id="navMenu">
      <li><a href="#about"      class="nl"><span class="idx">01/</span>About</a></li>
      <li><a href="#skills"     class="nl"><span class="idx">02/</span>Skills</a></li>
      <li><a href="#experience" class="nl"><span class="idx">03/</span>Experience</a></li>
      <li><a href="#projects"   class="nl"><span class="idx">04/</span>Projects</a></li>
      <li><a href="#contact"    class="nl"><span class="idx">05/</span>Contact</a></li>
    </ul>
    <a href="{{ route('resume.download') }}" class="nav-cta"><i class="fas fa-download"></i> Resume</a>
    <button class="nav-hamburger" id="burger"><span></span><span></span><span></span></button>
  </div>
</nav>

<!-- ████ HERO ████ -->
<section id="hero">
  <div class="hero-inner">

    <!-- Text -->
    <div class="hero-text">
      <div class="hero-tag"><div class="status-dot"></div>Open to Opportunities &nbsp;·&nbsp; Full-Time Available</div>

      <h1 class="hero-name">
        <span class="n1">VIKASH</span>
        <span class="n2">KUMAR</span>
      </h1>

      <div class="hero-role-wrap">
        <div class="hero-role-bar"></div>
        <div class="hero-role">
          <span id="tw"></span><span class="hero-cursor">_</span>
        </div>
      </div>

      <p class="hero-bio">
        Building <strong>scalable web applications</strong> &amp; government-grade CMS solutions
        with clean code, precision, and real-world impact across 10+ projects.
      </p>

      <div class="hero-stats">
        <div class="hstat"><div class="hstat-n">2+</div><div class="hstat-l">Years Exp.</div></div>
        <div class="hstat"><div class="hstat-n">10+</div><div class="hstat-l">Projects</div></div>
        <div class="hstat"><div class="hstat-n">3</div><div class="hstat-l">Companies</div></div>
        <div class="hstat"><div class="hstat-n">6</div><div class="hstat-l">Certs</div></div>
      </div>

      <div class="hero-btns">
        <a href="{{ route('resume.download') }}" class="btn-primary"><i class="fas fa-download"></i> Download CV</a>
        <a href="#projects" class="btn-secondary"><i class="fas fa-code"></i> My Projects</a>
        <a href="#contact"  class="btn-ghost"><i class="fas fa-paper-plane"></i> Hire Me</a>
      </div>

      <div class="hero-socials">
        <span class="hero-socials-label">FOLLOW</span>
        <a href="https://github.com/Vikashgupta95239" target="_blank" class="soc-btn" title="GitHub"><i class="fab fa-github"></i></a>
        <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" class="soc-btn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        <a href="mailto:vikashkumarbth381@gmail.com" class="soc-btn" title="Email"><i class="fas fa-envelope"></i></a>
        <a href="tel:+919523919654" class="soc-btn" title="Phone"><i class="fas fa-phone"></i></a>
      </div>
    </div>

    <!-- Avatar — ONLY photo on entire page -->
    <div class="hero-visual">
      <div class="av-shell">
        <div class="av-ring1"></div>
        <div class="av-ring2"></div>
        <div class="av-outer">
          <div class="av-inner">
            @if($admin?->photo)
              <img src="{{ Storage::url($admin->photo) }}" alt="Vikash Kumar">
            @else
              <div class="av-monogram">VK</div>
            @endif
          </div>
        </div>
        <div class="av-badge"><div class="badge-dot"></div>Available for Work</div>
        <div class="av-chip chip-a">
          <span class="chip-dot" style="background:var(--cyan)"></span>
          <span>Laravel 12</span>
        </div>
        <div class="av-chip chip-b">
          <span class="chip-dot" style="background:var(--green)"></span>
          <span>PHP 8.2</span>
        </div>
        <div class="av-chip chip-c">
          <span class="chip-dot" style="background:var(--purple)"></span>
          <span>REST APIs</span>
        </div>
      </div>
    </div>

  </div>
  <div class="scroll-hint">
    <span>SCROLL DOWN</span>
    <div class="scroll-line"></div>
  </div>
</section>

<!-- ████ ABOUT ████ — Info cards only, NO photo -->
<section id="about" class="section">
<div class="section-inner">
  <div class="about-grid">

    <!-- Left: Info panel -->
    <div class="about-panel rv">
      <!-- Name card -->
      <div class="info-card">
        <div class="info-name">Vikash Kumar</div>
        <div class="info-title">Laravel · PHP · API Developer</div>
        <div class="info-badges">
          <span class="info-badge"><i class="fas fa-map-marker-alt"></i> New Delhi, India</span>
          <span class="info-badge"><i class="fas fa-circle" style="font-size:.4rem;color:var(--green)"></i> Full-Time Available</span>
          <span class="info-badge">B.Tech CSE · 8.33 CGPA</span>
        </div>
      </div>

      <!-- Stats -->
      <div class="stats-block">
        <div class="stat-cell"><div class="stat-num" data-t="2" data-s="+">0</div><div class="stat-lbl">Years Exp.</div></div>
        <div class="stat-cell"><div class="stat-num" data-t="10" data-s="+">0</div><div class="stat-lbl">Projects</div></div>
        <div class="stat-cell"><div class="stat-num" data-t="3" data-s="">0</div><div class="stat-lbl">Companies</div></div>
        <div class="stat-cell"><div class="stat-num" data-t="6" data-s="">0</div><div class="stat-lbl">Certs</div></div>
      </div>

      <!-- Contact strip -->
      <div class="contact-strip">
        <div class="cs-row"><div class="cs-ico"><i class="fas fa-envelope"></i></div><div><div class="cs-lbl">EMAIL</div><div class="cs-val"><a href="mailto:vikashkumarbth381@gmail.com">vikashkumarbth381@gmail.com</a></div></div></div>
        <div class="cs-row"><div class="cs-ico"><i class="fas fa-phone"></i></div><div><div class="cs-lbl">PHONE</div><div class="cs-val"><a href="tel:+919523919654">+91 95239 19654</a></div></div></div>
        <div class="cs-row"><div class="cs-ico"><i class="fab fa-github"></i></div><div><div class="cs-lbl">GITHUB</div><div class="cs-val"><a href="https://github.com/Vikashgupta95239" target="_blank">Vikashgupta95239</a></div></div></div>
        <div class="cs-row"><div class="cs-ico"><i class="fab fa-linkedin-in"></i></div><div><div class="cs-lbl">LINKEDIN</div><div class="cs-val"><a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank">vikash-kumar-cs</a></div></div></div>
      </div>
    </div>

    <!-- Right: Bio + strengths + mini timeline -->
    <div class="about-body-col rv d1">
      <div class="section-eye">Who I Am</div>
      <h2 class="section-h">About <em>Me</em></h2>

      <p class="about-p">Dedicated <strong>Laravel Developer</strong> with 2+ years of experience building scalable web applications and CMS solutions. Skilled in REST API integration, database design, and backend performance optimization.</p>
      <p class="about-p">I specialize in delivering secure, government-grade projects — including <strong>GIGW & DBIM 3.0 compliant</strong> portals — combining clean code principles with real-world impact that reaches thousands of users.</p>

      <!-- Mini experience timeline -->
      <div class="about-xp">
        <div class="about-xp-title">Recent Experience</div>
        @foreach($experiences->take(3) as $exp)
        <div class="xp-row">
          <div class="xp-dot {{ $exp->is_current ? 'now' : '' }}"></div>
          <div class="xp-info">
            <div class="xp-role">{{ $exp->title }}</div>
            <div class="xp-co">{{ $exp->company }} · {{ $exp->location }}</div>
          </div>
          <div class="xp-yr">{{ $exp->duration }}</div>
        </div>
        @endforeach
      </div>

      <!-- Strength chips -->
      <div class="section-eye" style="margin-top:28px">Core Strengths</div>
      <div class="strengths">
        <span class="strength">Problem Solving</span>
        <span class="strength">REST API Design</span>
        <span class="strength">GIGW Compliance</span>
        <span class="strength">WCAG / A11y</span>
        <span class="strength">DB Optimization</span>
        <span class="strength">Team Collaboration</span>
        <span class="strength">Quick Learner</span>
        <span class="strength">Deadline-Driven</span>
      </div>
    </div>

  </div>
</div>
</section>

<!-- ████ SKILLS ████ -->
<section id="skills" class="section">
<div class="section-inner">
  <div class="rv"><div class="section-eye">Tech Stack</div><h2 class="section-h">My <em>Skills</em></h2></div>
  <div class="skills-grid">
    <div class="skill-card rv d1">
      <div class="sk-em">⚙️</div><div class="sk-label">BACKEND</div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">PHP</span><span class="sk-pct">92%</span></div><div class="sk-track"><div class="sk-fill" data-w="92"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">Laravel</span><span class="sk-pct">90%</span></div><div class="sk-track"><div class="sk-fill" data-w="90"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">CakePHP</span><span class="sk-pct">75%</span></div><div class="sk-track"><div class="sk-fill" data-w="75"></div></div></div>
    </div>
    <div class="skill-card rv d2">
      <div class="sk-em">🎨</div><div class="sk-label">FRONTEND</div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">HTML / CSS</span><span class="sk-pct">88%</span></div><div class="sk-track"><div class="sk-fill" data-w="88"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">JavaScript</span><span class="sk-pct">80%</span></div><div class="sk-track"><div class="sk-fill" data-w="80"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">Bootstrap / AJAX</span><span class="sk-pct">85%</span></div><div class="sk-track"><div class="sk-fill" data-w="85"></div></div></div>
    </div>
    <div class="skill-card rv d3">
      <div class="sk-em">🗄️</div><div class="sk-label">DATABASE</div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">MySQL</span><span class="sk-pct">88%</span></div><div class="sk-track"><div class="sk-fill" data-w="88"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">DB Design</span><span class="sk-pct">82%</span></div><div class="sk-track"><div class="sk-fill" data-w="82"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">Query Optimization</span><span class="sk-pct">78%</span></div><div class="sk-track"><div class="sk-fill" data-w="78"></div></div></div>
    </div>
    <div class="skill-card rv d4">
      <div class="sk-em">🔧</div><div class="sk-label">TOOLS & APIs</div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">Git / GitHub</span><span class="sk-pct">85%</span></div><div class="sk-track"><div class="sk-fill" data-w="85"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">REST APIs</span><span class="sk-pct">90%</span></div><div class="sk-track"><div class="sk-fill" data-w="90"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-name">GIGW / WCAG</span><span class="sk-pct">80%</span></div><div class="sk-track"><div class="sk-fill" data-w="80"></div></div></div>
    </div>
  </div>
</div>
</section>

<!-- ████ EXPERIENCE ████ -->
<section id="experience" class="section" style="background:var(--deep)">
<div class="section-inner">
  <div class="rv"><div class="section-eye">Career</div><h2 class="section-h">Work <em>Experience</em></h2></div>
  <div class="timeline">
    @foreach($experiences as $exp)
    <div class="tl-entry rv">
      <div class="tl-bullet {{ $exp->is_current ? 'current' : '' }}"></div>
      <div class="tl-block">
        <div class="tl-date">{{ strtoupper($exp->duration) }}</div>
        <div class="tl-head">
          <div class="tl-role">{{ $exp->title }}</div>
          @if($exp->is_current)<span class="tl-badge">● CURRENT</span>@endif
        </div>
        <div class="tl-company"><i class="fas fa-building"></i> {{ $exp->company }}</div>
        <div class="tl-loc"><i class="fas fa-map-marker-alt"></i> {{ $exp->location }}</div>
        <ul class="tl-list">@foreach($exp->responsibilities as $r)<li>{{ $r }}</li>@endforeach</ul>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>

<!-- ████ EDUCATION ████ -->
<section id="education" class="section">
<div class="section-inner">
  <div class="rv"><div class="section-eye">Academic</div><h2 class="section-h">My <em>Education</em></h2></div>
  <div class="edu-grid">
    <div class="edu-card rv d1"><div class="edu-icon">🎓</div><div class="edu-degree">B.Tech — Computer Science Engineering</div><div class="edu-school">Sagar Group of Institutions</div><div class="edu-period"><i class="fas fa-calendar-alt"></i> 2020–2024 · Bhopal</div><div class="edu-score">CGPA: 8.33 / 10</div></div>
    <div class="edu-card rv d2"><div class="edu-icon">🏫</div><div class="edu-degree">Intermediate (Science)</div><div class="edu-school">MJK College Bettiah</div><div class="edu-period"><i class="fas fa-calendar-alt"></i> 2018–2020 · Bettiah</div><div class="edu-score">76.20%</div></div>
    <div class="edu-card rv d3"><div class="edu-icon">📚</div><div class="edu-degree">Class X — State Board</div><div class="edu-school">Alok Bharati Bettiah</div><div class="edu-period"><i class="fas fa-calendar-alt"></i> 2018 · Bettiah</div><div class="edu-score">75.80%</div></div>
  </div>
</div>
</section>

<!-- ████ CERTIFICATIONS ████ -->
<section id="certs" class="section" style="background:var(--deep)">
<div class="section-inner">
  <div class="rv"><div class="section-eye">Credentials</div><h2 class="section-h">My <em>Certifications</em></h2></div>
  <div class="certs-grid">
    @foreach($certifications as $cert)
    <div class="cert-card rv">
      <div class="cert-icon"><i class="fas fa-{{ $cert->icon ?? 'award' }}"></i></div>
      <div class="cert-name">{{ $cert->title }}</div>
      <div class="cert-issuer"><i class="fas fa-building"></i> {{ $cert->issuer }}</div>
      @if($cert->certificate_url)<a href="{{ $cert->certificate_url }}" target="_blank" class="cert-link"><i class="fas fa-external-link-alt"></i> View Certificate</a>@endif
    </div>
    @endforeach
  </div>
</div>
</section>

<!-- ████ PROJECTS ████ -->
<section id="projects" class="section">
<div class="section-inner">
  <div class="rv"><div class="section-eye">Portfolio</div><h2 class="section-h">My <em>Projects</em></h2></div>
  <div class="proj-filters">
    <button class="pf on" data-f="all">All</button>
    <button class="pf" data-f="laravel">Laravel</button>
    <button class="pf" data-f="php">PHP</button>
    <button class="pf" data-f="api">API</button>
    <button class="pf" data-f="government">Government</button>
  </div>
  <div class="proj-grid" id="projGrid">
    @php
    $imgs=['government'=>'https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=640&h=400&fit=crop&q=75','api'=>'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=640&h=400&fit=crop&q=75','laravel'=>'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=640&h=400&fit=crop&q=75','php'=>'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=640&h=400&fit=crop&q=75','other'=>'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=640&h=400&fit=crop&q=75'];
    @endphp
    @foreach($projects as $project)
    <div class="proj-card rv" data-cat="{{ $project->category }}">
      <div class="proj-thumb">
        <img src="{{ $project->thumbnail ? Storage::url($project->thumbnail) : ($imgs[$project->category] ?? $imgs['other']) }}" alt="{{ $project->title }}" loading="lazy">
        <div class="proj-chrome"><div class="dot" style="background:#ff5f57"></div><div class="dot" style="background:#ffbd2e"></div><div class="dot" style="background:#28c840"></div><div class="url"></div></div>
        <div class="proj-overlay">
          @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank" class="proj-ov-btn"><i class="fab fa-github"></i></a>@endif
          @if($project->live_url)<a href="{{ $project->live_url }}" target="_blank" class="proj-ov-btn"><i class="fas fa-external-link-alt"></i></a>@endif
          @if(!$project->github_url && !$project->live_url)<span class="proj-ov-btn" style="opacity:.3;cursor:default"><i class="fas fa-lock"></i></span>@endif
        </div>
      </div>
      <div class="proj-body">
        <div class="proj-cat">{{ strtoupper($project->category) }}</div>
        <h3 class="proj-title">{{ $project->title }}</h3>
        <p class="proj-desc">{{ $project->short_description }}</p>
        <div class="proj-tags">@foreach($project->tech_stack as $t)<span class="proj-tag">{{ $t }}</span>@endforeach</div>
        <div class="proj-links">
          @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank" class="proj-link"><i class="fab fa-github"></i> GitHub</a>@endif
          @if($project->live_url)<a href="{{ $project->live_url }}" target="_blank" class="proj-link"><i class="fas fa-external-link-alt"></i> Live</a>@endif
          @if(!$project->github_url && !$project->live_url)<span class="proj-link" style="opacity:.3;cursor:default"><i class="fas fa-lock"></i> Private</span>@endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>

<!-- ████ CONTACT ████ -->
<section id="contact" class="section" style="background:var(--deep)">
<div class="section-inner">
  <div class="rv"><div class="section-eye">Get In Touch</div><h2 class="section-h">Contact <em>Me</em></h2></div>
  <div class="contact-layout">
    <div class="rv">
      <p class="contact-intro">Have a project, opportunity, or just want to connect? I'm always open to new challenges and collaborations. I respond quickly.</p>
      <div class="contact-row"><div class="contact-ico"><i class="fas fa-envelope"></i></div><div><div class="contact-key">EMAIL</div><div class="contact-val"><a href="mailto:vikashkumarbth381@gmail.com">vikashkumarbth381@gmail.com</a></div></div></div>
      <div class="contact-row"><div class="contact-ico"><i class="fas fa-phone"></i></div><div><div class="contact-key">PHONE</div><div class="contact-val"><a href="tel:+919523919654">+91 95239 19654</a></div></div></div>
      <div class="contact-row"><div class="contact-ico"><i class="fas fa-map-marker-alt"></i></div><div><div class="contact-key">LOCATION</div><div class="contact-val">New Delhi, India 🇮🇳</div></div></div>
      <div class="contact-row"><div class="contact-ico"><i class="fab fa-linkedin-in"></i></div><div><div class="contact-key">LINKEDIN</div><div class="contact-val"><a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank">vikash-kumar-computer-science</a></div></div></div>
    </div>
    <div class="rv d1">
      <form id="cf">@csrf
        <div class="form-row">
          <div class="form-group"><label class="form-lbl" for="fn">YOUR NAME</label><input class="form-ctrl" type="text" id="fn" name="name" placeholder="John Doe" required></div>
          <div class="form-group"><label class="form-lbl" for="fe">EMAIL ADDRESS</label><input class="form-ctrl" type="email" id="fe" name="email" placeholder="john@company.com" required></div>
        </div>
        <div class="form-group"><label class="form-lbl" for="fs">SUBJECT</label><input class="form-ctrl" type="text" id="fs" name="subject" placeholder="Laravel Developer Opportunity" required></div>
        <div class="form-group"><label class="form-lbl" for="fm">MESSAGE</label><textarea class="form-ctrl" id="fm" name="message" placeholder="Hi Vikash, I'd like to discuss..." required></textarea></div>
        <button type="submit" class="form-submit" id="sb"><i class="fas fa-paper-plane"></i> SEND MESSAGE</button>
      </form>
    </div>
  </div>
</div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div class="footer-logo">VK.</div>
    <nav class="footer-nav">
      <a href="#about">About</a><a href="#skills">Skills</a><a href="#experience">Experience</a><a href="#projects">Projects</a><a href="#contact">Contact</a>
    </nav>
    <div class="footer-socials">
      <a href="https://github.com/Vikashgupta95239" target="_blank" class="footer-soc"><i class="fab fa-github"></i></a>
      <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" class="footer-soc"><i class="fab fa-linkedin-in"></i></a>
      <a href="mailto:vikashkumarbth381@gmail.com" class="footer-soc"><i class="fas fa-envelope"></i></a>
    </div>
    <p class="footer-copy">© {{ date('Y') }} Vikash Kumar &nbsp;·&nbsp; Built with Laravel 12 &amp; ❤️ &nbsp;·&nbsp; <a href="/admin">Admin Panel</a></p>
  </div>
</footer>

<div class="toast" id="toast"><i class="fas fa-check-circle"></i><span id="toastMsg"></span></div>

<script>
/* ─ Loader ─ */
window.addEventListener('load', () =>
  setTimeout(() => document.getElementById('loader').classList.add('done'), 2500)
);

/* ─ Nav ─ */
const navEl = document.getElementById('nav');
window.addEventListener('scroll', () => navEl.classList.toggle('stuck', scrollY > 55), {passive:true});
document.getElementById('burger').addEventListener('click', () =>
  document.getElementById('navMenu').classList.toggle('open')
);
window.addEventListener('scroll', () => {
  let cur = '';
  document.querySelectorAll('section[id]').forEach(s => { if (scrollY >= s.offsetTop - 260) cur = s.id });
  document.querySelectorAll('.nl').forEach(a => a.classList.toggle('act', a.getAttribute('href') === '#' + cur));
}, {passive:true});

/* ─ Typewriter ─ */
const roles = ['Laravel Developer','PHP Developer','Backend Engineer','API Architect','CMS Specialist'];
let ri = 0, ci = 0, del = false;
const tw = document.getElementById('tw');
function type() {
  const w = roles[ri];
  if (!del) { tw.textContent = w.slice(0, ++ci); if (ci === w.length) { del = true; setTimeout(type, 2000); return } }
  else { tw.textContent = w.slice(0, --ci); if (ci === 0) { del = false; ri = (ri + 1) % roles.length } }
  setTimeout(type, del ? 45 : 115);
}
setTimeout(type, 2000);

/* ─ Reveal ─ */
function reveal(el) {
  el.classList.add('in');
  el.querySelectorAll('.sk-fill[data-w]').forEach(b => { b.style.width = b.dataset.w + '%' });
  el.querySelectorAll('.stat-num[data-t]').forEach(n => {
    if (n.dataset.done) return; n.dataset.done = '1';
    const tg = parseInt(n.dataset.t), sf = n.dataset.s || '';
    let c = 0;
    const tm = setInterval(() => { c = Math.min(c + tg / 55, tg); n.textContent = Math.floor(c) + sf; if (c >= tg) clearInterval(tm) }, 22);
  });
}
const obs = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) reveal(e.target) }), { threshold: 0, rootMargin: '0px 0px -20px 0px' });
document.querySelectorAll('.rv').forEach(el => obs.observe(el));
window.addEventListener('scroll', () => {
  document.querySelectorAll('.rv:not(.in)').forEach(el => {
    if (el.getBoundingClientRect().top < window.innerHeight + 10) reveal(el);
  });
}, {passive:true});
setTimeout(() => document.querySelectorAll('.rv:not(.in)').forEach(reveal), 2600);

/* ─ Project filter ─ */
document.querySelectorAll('.pf').forEach(b => {
  b.addEventListener('click', () => {
    document.querySelectorAll('.pf').forEach(x => x.classList.remove('on'));
    b.classList.add('on');
    const f = b.dataset.f;
    document.querySelectorAll('.proj-card').forEach(c => { c.style.display = (f === 'all' || c.dataset.cat === f) ? '' : 'none' });
  });
});

/* ─ Contact form ─ */
document.getElementById('cf').addEventListener('submit', async e => {
  e.preventDefault();
  const sb = document.getElementById('sb');
  sb.disabled = true; sb.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
  try {
    const r = await fetch('{{ route("contact.send") }}', { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }, body: new FormData(e.target) });
    const j = await r.json();
    showToast(j.message, j.success ? 'ok' : 'err');
    if (j.success) e.target.reset();
  } catch { showToast('Something went wrong. Please try again.', 'err') }
  finally { sb.disabled = false; sb.innerHTML = '<i class="fas fa-paper-plane"></i> SEND MESSAGE' }
});

function showToast(msg, type) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.className = 'toast' + (type === 'err' ? ' err' : '');
  t.querySelector('i').className = 'fas fa-' + (type === 'err' ? 'exclamation-circle' : 'check-circle');
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 5000);
}

/* ─ Smooth scroll ─ */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    e.preventDefault();
    const el = document.querySelector(a.getAttribute('href'));
    if (el) el.scrollIntoView({ behavior: 'smooth' });
  });
});
</script>
</body>
</html>

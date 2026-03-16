{{-- resources/views/portfolio.blade.php --}}
{{-- @extends('layouts.app')

@section('content')
  @include('sections.hero')
  @include('sections.about', ['timeline' => $experiences])
  @include('sections.skills', ['skillGroups' => $skillGroups])
  @include('sections.experience', ['experiences' => $experiences])
  @include('sections.education', ['education' => $education])
  @include('sections.certifications', ['certifications' => $certifications])
  @include('sections.projects', ['projects' => $projects])
  @include('sections.contact')
@endsection --}}
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vikash Kumar — Laravel Developer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,300;400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>

:root {
  --bg:       #0E0E10;
  --bg1:      #141416;
  --bg2:      #1A1A1E;
  --bg3:      #202026;
  --surface:  #26262E;

  --ink:      #EEEEF2;
  --ink2:     #A0A0B0;
  --ink3:     #606070;
  --ink4:     #38383E;

  --lime:     #C6FF4E;
  --lime-dim: rgba(198,255,78,.12);
  --lime-glow:rgba(198,255,78,.25);

  --coral:    #FF6B4A;
  --sky:      #7AB3FF;
  --warm:     #FFD580;

  --card-brd: rgba(255,255,255,.07);
  --card-bg:  rgba(255,255,255,.03);

  --f-display:'Bricolage Grotesque', sans-serif;
  --f-body:   'DM Sans', sans-serif;
  --f-mono:   'DM Mono', monospace;

  --ease:     cubic-bezier(.25,.46,.45,.94);
  --bounce:   cubic-bezier(.34,1.56,.64,1);
}

*, ::before, ::after { box-sizing: border-box; margin: 0; padding: 0 }
html { scroll-behavior: smooth; scrollbar-width: thin; scrollbar-color: var(--lime) var(--bg1) }
::-webkit-scrollbar { width: 3px }
::-webkit-scrollbar-thumb { background: var(--lime); border-radius: 99px }
body {
  background: var(--bg);
  color: var(--ink);
  font-family: var(--f-body);
  font-size: 16px;
  line-height: 1.6;
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
}
img { display: block; max-width: 100% }
a { cursor: pointer }

/* ─────────────────────────────
   LOADER
───────────────────────────── */
#loader {
  position: fixed; inset: 0; z-index: 9000;
  background: var(--bg);
  display: flex; align-items: center; justify-content: center;
  transition: opacity .5s var(--ease), visibility .5s;
}
#loader.out { opacity: 0; visibility: hidden }
.ld-inner { text-align: center }
.ld-name {
  font-family: var(--f-display); font-size: clamp(3rem,8vw,6rem);
  font-weight: 800; letter-spacing: -3px; line-height: 1; color: var(--ink);
}
.ld-name span { color: var(--lime) }
.ld-track { width: 100%; height: 1px; background: var(--ink4); margin-top: 24px; overflow: hidden }
.ld-fill { height: 100%; background: var(--lime); animation: ldfill 2.2s var(--ease) forwards }
@keyframes ldfill { from { width: 0 } to { width: 100% } }

/* ─────────────────────────────
   NAV
───────────────────────────── */
#nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 100;
  padding: 22px 6%;
  transition: all .35s var(--ease);
}
#nav.scrolled {
  background: rgba(14,14,16,.92);
  backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
  padding: 14px 6%;
  border-bottom: 1px solid var(--ink4);
}
.nav-inner {
  max-width: 1200px; margin: 0 auto;
  display: flex; align-items: center; justify-content: space-between;
}
.nav-logo {
  font-family: var(--f-display); font-size: 1.25rem; font-weight: 800;
  letter-spacing: -0.5px; text-decoration: none; color: var(--ink);
}
.nav-logo span { color: var(--lime) }
.nav-links { list-style: none; display: flex; gap: 2rem; align-items: center }
.nav-links a {
  font-size: .875rem; font-weight: 500; color: var(--ink2);
  text-decoration: none; transition: color .2s; letter-spacing: .01em;
}
.nav-links a:hover, .nav-links a.on { color: var(--ink) }
.nav-cta {
  font-size: .875rem; font-weight: 600; letter-spacing: .02em;
  color: var(--bg); background: var(--lime);
  padding: 9px 22px; border-radius: 99px;
  text-decoration: none; transition: all .25s var(--ease);
}
.nav-cta:hover { background: #d4ff6e; transform: translateY(-1px); box-shadow: 0 8px 24px var(--lime-glow) }
.nav-ham { display: none; flex-direction: column; gap: 5px; background: none; border: none; cursor: pointer; padding: 3px }
.nav-ham span { width: 22px; height: 1.5px; background: var(--ink); display: block; transition: all .3s }

/* ─────────────────────────────
   HERO
───────────────────────────── */
#hero {
  min-height: 100svh; position: relative; overflow: hidden;
  display: flex; flex-direction: column; justify-content: flex-end;
  padding: 0 6% 72px;
}

/* Subtle noise grain */
#hero::before {
  content: ''; position: absolute; inset: 0; z-index: 0; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.035'/%3E%3C/svg%3E");
  opacity: .5;
}

/* Big radial glow at top-right behind photo */
#hero::after {
  content: ''; position: absolute; z-index: 0; pointer-events: none;
  width: 700px; height: 700px;
  top: -200px; right: -100px;
  background: radial-gradient(circle, rgba(198,255,78,.07) 0%, transparent 65%);
}

.hero-photo-wrap {
  position: absolute; top: 0; right: 6%; height: 100%;
  display: flex; align-items: flex-end;
  z-index: 1; pointer-events: none;
  opacity: 0; animation: heroImgIn 1s .4s var(--ease) both;
}
@keyframes heroImgIn {
  from { opacity: 0; transform: translateY(30px) }
  to   { opacity: 1; transform: translateY(0) }
}
.hero-photo {
  width: 420px; height: 560px;
  object-fit: cover; object-position: top center;
  border-radius: 220px 220px 0 0;
  filter: grayscale(15%);
}
.hero-photo-fallback {
  width: 420px; height: 560px;
  border-radius: 220px 220px 0 0;
  background: linear-gradient(180deg, var(--bg3) 0%, var(--bg2) 100%);
  display: flex; align-items: center; justify-content: center;
  font-family: var(--f-display); font-size: 8rem; font-weight: 800;
  color: var(--lime); letter-spacing: -4px;
}

/* left text content */
.hero-content { position: relative; z-index: 2; max-width: 640px }

.hero-status {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--bg2); border: 1px solid var(--ink4);
  padding: 6px 14px; border-radius: 99px;
  font-size: .8rem; font-weight: 500; color: var(--ink2);
  margin-bottom: 28px;
  opacity: 0; animation: fadeUp .5s .1s var(--ease) both;
}
.status-pip { width: 7px; height: 7px; border-radius: 50%; background: var(--lime); flex-shrink: 0; animation: pip 2s ease-in-out infinite }
@keyframes pip { 0%,100%{opacity:.5; box-shadow:none} 50%{opacity:1; box-shadow:0 0 0 4px rgba(198,255,78,.2)} }

h1.hero-h {
  font-family: var(--f-display); font-weight: 800;
  font-size: clamp(3.8rem, 7.5vw, 8rem);
  line-height: .92; letter-spacing: -4px;
  margin-bottom: 24px;
  opacity: 0; animation: fadeUp .6s .2s var(--ease) both;
}
.hero-h .line { display: block }
.hero-h .accent { color: var(--lime) }

.hero-tagline {
  font-size: 1.1rem; color: var(--ink2); line-height: 1.7;
  max-width: 500px; margin-bottom: 36px; font-weight: 400;
  opacity: 0; animation: fadeUp .6s .32s var(--ease) both;
}
.hero-tagline strong { color: var(--ink); font-weight: 600 }

.hero-actions {
  display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 48px;
  opacity: 0; animation: fadeUp .6s .44s var(--ease) both;
}
.btn-solid {
  display: inline-flex; align-items: center; gap: 9px;
  background: var(--lime); color: var(--bg);
  font-weight: 700; font-size: .9rem; padding: 13px 28px;
  border-radius: 99px; border: none; cursor: pointer;
  text-decoration: none; transition: all .25s var(--ease);
}
.btn-solid:hover { background: #d4ff6e; transform: translateY(-2px); box-shadow: 0 12px 32px var(--lime-glow) }
.btn-outline {
  display: inline-flex; align-items: center; gap: 9px;
  background: transparent; color: var(--ink);
  font-weight: 600; font-size: .9rem; padding: 12px 28px;
  border-radius: 99px; border: 1.5px solid var(--ink4);
  text-decoration: none; cursor: pointer; transition: all .25s var(--ease);
}
.btn-outline:hover { border-color: var(--ink2); transform: translateY(-2px) }
.btn-text {
  display: inline-flex; align-items: center; gap: 8px;
  background: transparent; color: var(--ink2);
  font-weight: 600; font-size: .9rem; padding: 12px 20px;
  border: none; text-decoration: none; cursor: pointer; transition: color .2s;
}
.btn-text:hover { color: var(--ink) }

/* Bottom row — stats + socials */
.hero-foot {
  display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 24px;
  opacity: 0; animation: fadeUp .6s .56s var(--ease) both;
}
.hero-stats { display: flex; gap: 32px }
.hstat {}
.hstat-n { font-family: var(--f-display); font-size: 2rem; font-weight: 800; color: var(--ink); line-height: 1; letter-spacing: -1px }
.hstat-n em { color: var(--lime); font-style: normal }
.hstat-l { font-size: .75rem; color: var(--ink3); margin-top: 2px; letter-spacing: .02em }
.hero-socs { display: flex; gap: 8px }
.hsoc {
  width: 40px; height: 40px; border-radius: 50%;
  border: 1.5px solid var(--ink4);
  display: flex; align-items: center; justify-content: center;
  color: var(--ink2); font-size: .85rem; text-decoration: none; transition: all .25s;
}
.hsoc:hover { border-color: var(--lime); color: var(--lime); background: var(--lime-dim) }

/* Scroll hint line */
.scroll-hint {
  position: absolute; bottom: 32px; left: 50%; transform: translateX(-50%);
  display: flex; flex-direction: column; align-items: center; gap: 8px; z-index: 2;
  opacity: 0; animation: fadeIn 1s 2.5s both;
}
.scroll-hint span { font-size: .7rem; color: var(--ink3); letter-spacing: .1em; writing-mode: vertical-lr }
.scroll-hint-bar { width: 1px; height: 50px; background: linear-gradient(var(--lime), transparent) }

/* ─────────────────────────────
   SHARED
───────────────────────────── */
.section { padding: 100px 6% }
.sec-inner { max-width: 1200px; margin: 0 auto }
.sec-label {
  font-size: .75rem; font-weight: 600; letter-spacing: .12em;
  color: var(--lime); text-transform: uppercase; margin-bottom: 10px;
  display: flex; align-items: center; gap: 10px;
}
.sec-label::before { content: ''; width: 24px; height: 1.5px; background: var(--lime); border-radius: 1px; flex-shrink: 0 }
.sec-title {
  font-family: var(--f-display); font-size: clamp(2.2rem,4vw,3.5rem);
  font-weight: 800; letter-spacing: -2px; line-height: .95; color: var(--ink);
  margin-bottom: 56px;
}
.sec-title em { font-style: italic; color: var(--lime) }
.rv { opacity: 0; transform: translateY(20px); transition: opacity .55s var(--ease), transform .55s var(--ease) }
.rv.in { opacity: 1 !important; transform: none !important }
.d1{transition-delay:.06s}.d2{transition-delay:.12s}.d3{transition-delay:.18s}.d4{transition-delay:.24s}

/* ─────────────────────────────
   ABOUT
───────────────────────────── */
#about { background: var(--bg1) }
.about-wrap { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: start }

/* Left: facts */
.about-facts { display: flex; flex-direction: column; gap: 0 }
.fact-row {
  display: flex; align-items: center; justify-content: space-between;
  padding: 18px 0; border-bottom: 1px solid var(--ink4);
  transition: padding-left .25s var(--ease);
}
.fact-row:hover { padding-left: 8px }
.fact-row:first-child { border-top: 1px solid var(--ink4) }
.fact-key { font-size: .8rem; font-weight: 500; color: var(--ink3); letter-spacing: .08em; text-transform: uppercase }
.fact-val { font-size: .95rem; font-weight: 500; color: var(--ink); text-align: right }
.fact-val a { color: var(--ink); text-decoration: none; transition: color .2s }
.fact-val a:hover { color: var(--lime) }
.fact-val .dot { display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: var(--lime); margin-right: 6px; vertical-align: middle }

/* Stats 2×2 */
.about-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 2px; margin-top: 24px; background: var(--ink4) }
.astat {
  background: var(--bg2); padding: 24px 20px;
  position: relative; overflow: hidden; transition: background .3s;
}
.astat:hover { background: var(--bg3) }
.astat-n {
  font-family: var(--f-display); font-size: 2.8rem; font-weight: 800;
  line-height: 1; letter-spacing: -2px; color: var(--lime);
}
.astat-l { font-size: .78rem; color: var(--ink2); margin-top: 4px; font-weight: 500 }

/* Right: bio text */
.about-body {}
.about-body .sec-title { margin-bottom: 24px }
.about-p { font-size: 1.05rem; color: var(--ink2); line-height: 1.85; margin-bottom: 18px; font-weight: 400 }
.about-p strong { color: var(--ink); font-weight: 600 }

.about-chips { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 28px }
.chip {
  background: var(--card-bg); border: 1px solid var(--card-brd);
  color: var(--ink2); padding: 6px 14px; border-radius: 99px;
  font-size: .8rem; font-weight: 500; transition: all .2s;
}
.chip:hover { border-color: var(--lime); color: var(--lime); background: var(--lime-dim) }

/* Mini XP */
.about-xp { margin-top: 36px }
.xp-label { font-size: .75rem; font-weight: 600; letter-spacing: .1em; color: var(--lime); text-transform: uppercase; margin-bottom: 18px }
.xp-item {
  display: flex; gap: 16px; padding: 14px 0;
  border-bottom: 1px solid var(--ink4); transition: padding-left .2s;
}
.xp-item:last-child { border-bottom: none }
.xp-item:hover { padding-left: 6px }
.xp-dot { width: 10px; height: 10px; border-radius: 50%; background: var(--ink4); flex-shrink: 0; margin-top: 6px; border: 2px solid var(--ink4); transition: all .3s }
.xp-dot.now { background: var(--lime); border-color: var(--lime); box-shadow: 0 0 0 4px rgba(198,255,78,.2) }
.xp-item:hover .xp-dot { border-color: var(--lime) }
.xp-role { font-size: .95rem; font-weight: 600; color: var(--ink) }
.xp-co { font-size: .82rem; color: var(--ink2); margin-top: 2px }
.xp-yr { font-size: .78rem; color: var(--ink3); margin-left: auto; white-space: nowrap; padding-top: 3px }

/* ─────────────────────────────
   SKILLS
───────────────────────────── */
#skills { background: var(--bg) }
.skills-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 16px }
.skill-card {
  background: var(--bg1); border: 1px solid var(--ink4);
  padding: 28px 24px; border-radius: 12px;
  transition: all .3s var(--ease); position: relative; overflow: hidden;
}
.skill-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: var(--lime); transform: scaleX(0); transform-origin: left;
  transition: transform .4s var(--ease);
}
.skill-card:hover { border-color: rgba(198,255,78,.2); transform: translateY(-4px); box-shadow: 0 20px 48px rgba(0,0,0,.5) }
.skill-card:hover::before { transform: scaleX(1) }
.sk-ic { font-size: 1.8rem; margin-bottom: 10px }
.sk-cat { font-size: .72rem; font-weight: 600; letter-spacing: .1em; color: var(--lime); text-transform: uppercase; margin-bottom: 20px }
.sk-row { margin-bottom: 14px }
.sk-info { display: flex; justify-content: space-between; margin-bottom: 6px }
.sk-name { font-size: .875rem; font-weight: 500; color: var(--ink) }
.sk-pct { font-family: var(--f-mono); font-size: .75rem; color: var(--ink2) }
.sk-track { height: 3px; background: var(--ink4); border-radius: 99px; overflow: hidden }
.sk-fill { height: 100%; background: linear-gradient(90deg, var(--lime), #8fff3a); border-radius: 99px; width: 0; transition: width 1.6s var(--ease) }

/* ─────────────────────────────
   EXPERIENCE
───────────────────────────── */
#experience { background: var(--bg1) }
.exp-list { display: flex; flex-direction: column; gap: 4px }
.exp-item {
  background: var(--bg2); border: 1px solid var(--ink4);
  border-radius: 12px; overflow: hidden; transition: all .3s;
}
.exp-item:hover { border-color: rgba(198,255,78,.2); box-shadow: 0 8px 32px rgba(0,0,0,.4) }
.exp-header {
  display: grid; grid-template-columns: auto 1fr auto;
  align-items: center; gap: 20px; padding: 24px 28px; cursor: pointer;
}
.exp-num {
  font-family: var(--f-mono); font-size: .72rem; color: var(--lime);
  background: var(--lime-dim); padding: 4px 10px; border-radius: 6px;
  font-weight: 500; white-space: nowrap;
}
.exp-meta { flex: 1 }
.exp-role { font-family: var(--f-display); font-size: 1.15rem; font-weight: 700; color: var(--ink); letter-spacing: -.3px; margin-bottom: 2px }
.exp-co { font-size: .875rem; color: var(--ink2) }
.exp-dur { font-family: var(--f-mono); font-size: .72rem; color: var(--ink3); text-align: right }
.exp-badge { display: inline-block; background: var(--lime); color: var(--bg); font-size: .65rem; font-weight: 700; padding: 2px 8px; border-radius: 99px; margin-top: 4px }
.exp-body { padding: 0 28px 24px; border-top: 1px solid var(--ink4); padding-top: 20px }
.exp-body ul { list-style: none; display: flex; flex-direction: column; gap: 8px }
.exp-body ul li { font-size: .9rem; color: var(--ink2); line-height: 1.7; padding-left: 18px; position: relative }
.exp-body ul li::before { content: '→'; position: absolute; left: 0; color: var(--lime); font-size: .85rem }

/* ─────────────────────────────
   EDUCATION
───────────────────────────── */
#education { background: var(--bg) }
.edu-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px }
.edu-card {
  background: var(--bg1); border: 1px solid var(--ink4);
  padding: 28px 24px; border-radius: 12px; transition: all .3s;
  display: flex; flex-direction: column; gap: 8px;
}
.edu-card:hover { border-color: rgba(198,255,78,.2); transform: translateY(-4px); box-shadow: 0 20px 48px rgba(0,0,0,.5) }
.edu-ic { font-size: 2rem }
.edu-deg { font-size: 1rem; font-weight: 700; color: var(--ink); line-height: 1.35 }
.edu-sch { font-size: .84rem; color: var(--lime); font-weight: 500 }
.edu-yr { font-size: .78rem; color: var(--ink3); display: flex; align-items: center; gap: 5px }
.edu-score {
  display: inline-block; margin-top: 6px;
  background: rgba(255,213,128,.1); border: 1px solid rgba(255,213,128,.2);
  color: var(--warm); font-family: var(--f-mono); font-size: .75rem;
  padding: 4px 12px; border-radius: 6px; width: fit-content;
}

/* ─────────────────────────────
   CERTIFICATIONS
───────────────────────────── */
#certs { background: var(--bg1) }
.certs-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px }
.cert-card {
  background: var(--bg2); border: 1px solid var(--ink4);
  padding: 24px; border-radius: 12px; display: flex; flex-direction: column;
  gap: 10px; transition: all .3s;
}
.cert-card:hover { border-color: rgba(198,255,78,.2); transform: translateY(-4px); box-shadow: 0 20px 48px rgba(0,0,0,.5) }
.cert-ic { font-size: 1.7rem; color: var(--lime) }
.cert-nm { font-size: .95rem; font-weight: 600; color: var(--ink); line-height: 1.35; flex: 1 }
.cert-issuer { font-size: .8rem; color: var(--ink2); display: flex; align-items: center; gap: 5px }
.cert-link {
  display: inline-flex; align-items: center; gap: 6px;
  font-size: .78rem; font-weight: 600; color: var(--lime);
  text-decoration: none; margin-top: auto; transition: gap .2s;
}
.cert-link:hover { gap: 10px }

/* ─────────────────────────────
   PROJECTS
───────────────────────────── */
#projects { background: var(--bg) }
.proj-filters { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 36px }
.pf {
  font-size: .82rem; font-weight: 500;
  background: var(--bg1); border: 1.5px solid var(--ink4);
  color: var(--ink2); padding: 7px 18px; border-radius: 99px;
  cursor: pointer; transition: all .22s;
}
.pf:hover, .pf.on { background: var(--lime); border-color: var(--lime); color: var(--bg) }
.proj-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 20px }
.proj-card {
  background: var(--bg1); border: 1px solid var(--ink4);
  border-radius: 12px; overflow: hidden; transition: all .35s var(--ease);
}
.proj-card:hover { border-color: rgba(198,255,78,.25); transform: translateY(-6px); box-shadow: 0 28px 60px rgba(0,0,0,.6) }
.proj-img { height: 200px; overflow: hidden; position: relative }
.proj-img img {
  width: 100%; height: 100%; object-fit: cover;
  transition: transform .5s var(--ease), filter .5s;
  filter: brightness(.75) saturate(.8);
}
.proj-card:hover .proj-img img { transform: scale(1.05); filter: brightness(.88) saturate(1) }
/* Browser chrome */
.chrome { position: absolute; top: 0; left: 0; right: 0; height: 28px; background: rgba(0,0,0,.6); backdrop-filter: blur(4px); display: flex; align-items: center; gap: 5px; padding: 0 12px; z-index: 1 }
.chrome .ball { width: 9px; height: 9px; border-radius: 50% }
.chrome-url { flex: 1; height: 13px; background: rgba(255,255,255,.08); border-radius: 4px; margin: 0 10px }
/* Hover overlay */
.proj-ov {
  position: absolute; inset: 0; z-index: 2; background: rgba(14,14,16,.75);
  display: flex; align-items: center; justify-content: center; gap: 12px;
  opacity: 0; transition: opacity .3s;
}
.proj-card:hover .proj-ov { opacity: 1 }
.proj-ov-btn {
  width: 48px; height: 48px; border-radius: 50%;
  background: var(--bg1); border: 2px solid rgba(255,255,255,.2);
  display: flex; align-items: center; justify-content: center;
  color: var(--ink); font-size: 1rem; text-decoration: none; transition: all .25s;
}
.proj-ov-btn:hover { background: var(--lime); border-color: var(--lime); color: var(--bg); transform: scale(1.08) }
.proj-body { padding: 20px }
.proj-tag { font-size: .72rem; font-weight: 600; letter-spacing: .08em; color: var(--lime); text-transform: uppercase; margin-bottom: 6px }
.proj-name { font-family: var(--f-display); font-size: 1.05rem; font-weight: 700; color: var(--ink); margin-bottom: 8px; letter-spacing: -.2px; line-height: 1.3 }
.proj-desc { font-size: .85rem; color: var(--ink2); line-height: 1.7; margin-bottom: 14px }
.proj-stack { display: flex; flex-wrap: wrap; gap: 5px; margin-bottom: 14px }
.proj-stack span { font-size: .72rem; background: var(--card-bg); border: 1px solid var(--card-brd); color: var(--ink2); padding: 3px 9px; border-radius: 5px }
.proj-links { display: flex; gap: 14px }
.proj-link { font-size: .8rem; font-weight: 500; color: var(--ink2); text-decoration: none; display: flex; align-items: center; gap: 5px; transition: color .2s }
.proj-link:hover { color: var(--lime) }

/* ─────────────────────────────
   CONTACT
───────────────────────────── */
#contact { background: var(--bg1) }
.co-wrap { display: grid; grid-template-columns: 1fr 1.4fr; gap: 72px; align-items: start }
.co-head {}
.co-intro { font-size: 1.05rem; color: var(--ink2); line-height: 1.8; margin-bottom: 36px }
.co-details { display: flex; flex-direction: column; gap: 0 }
.co-row {
  display: flex; align-items: center; gap: 14px;
  padding: 14px 0; border-bottom: 1px solid var(--ink4);
  transition: padding-left .2s;
}
.co-row:hover { padding-left: 8px }
.co-row:first-child { border-top: 1px solid var(--ink4) }
.co-ico { width: 38px; height: 38px; background: var(--bg2); border: 1px solid var(--ink4); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--lime); font-size: .85rem; flex-shrink: 0; transition: all .2s }
.co-row:hover .co-ico { background: var(--lime-dim); border-color: rgba(198,255,78,.3) }
.co-lbl { font-size: .72rem; font-weight: 600; letter-spacing: .08em; color: var(--ink3); text-transform: uppercase }
.co-val { font-size: .9rem; color: var(--ink) }
.co-val a { color: var(--ink); text-decoration: none; transition: color .2s }
.co-val a:hover { color: var(--lime) }
/* Form */
.form-group { margin-bottom: 16px }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px }
.form-label { display: block; font-size: .78rem; font-weight: 600; color: var(--ink2); margin-bottom: 7px; letter-spacing: .03em }
.form-input {
  width: 100%; background: var(--bg2); border: 1.5px solid var(--ink4); color: var(--ink);
  padding: 13px 16px; border-radius: 10px; font-family: var(--f-body);
  font-size: .92rem; outline: none; transition: all .25s; -webkit-appearance: none;
}
.form-input::placeholder { color: var(--ink4) }
.form-input:focus { border-color: var(--lime); background: var(--bg3); box-shadow: 0 0 0 3px rgba(198,255,78,.08) }
textarea.form-input { min-height: 140px; resize: vertical }
.form-submit {
  width: 100%; padding: 14px; margin-top: 8px;
  background: var(--lime); color: var(--bg);
  font-family: var(--f-body); font-weight: 700; font-size: .95rem;
  border: none; border-radius: 99px; cursor: pointer; transition: all .25s;
  display: flex; align-items: center; justify-content: center; gap: 9px;
}
.form-submit:hover { background: #d4ff6e; transform: translateY(-2px); box-shadow: 0 12px 32px var(--lime-glow) }
.form-submit:disabled { opacity: .5; cursor: not-allowed; transform: none; box-shadow: none }

/* ─────────────────────────────
   TOAST
───────────────────────────── */
.toast {
  position: fixed; bottom: 22px; right: 22px; z-index: 9999;
  background: var(--bg2); border: 1.5px solid var(--lime);
  padding: 14px 20px; border-radius: 12px; color: var(--ink);
  display: flex; align-items: center; gap: 10px; max-width: 300px;
  box-shadow: 0 12px 40px rgba(0,0,0,.5), 0 0 24px rgba(198,255,78,.1);
  transform: translateY(80px); opacity: 0; transition: all .35s var(--ease);
}
.toast.show { transform: translateY(0); opacity: 1 }
.toast.err { border-color: var(--coral) }
.toast i { color: var(--lime); font-size: 1rem }
.toast.err i { color: var(--coral) }

/* ─────────────────────────────
   FOOTER
───────────────────────────── */
footer { background: var(--bg); border-top: 1px solid var(--ink4); padding: 48px 6% }
.ft { max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; gap: 20px }
.ft-logo { font-family: var(--f-display); font-size: 1.8rem; font-weight: 800; letter-spacing: -1px; color: var(--ink) }
.ft-logo span { color: var(--lime) }
.ft-nav { display: flex; gap: 24px; flex-wrap: wrap; justify-content: center }
.ft-nav a { font-size: .875rem; font-weight: 500; color: var(--ink2); text-decoration: none; transition: color .2s }
.ft-nav a:hover { color: var(--lime) }
.ft-soc { display: flex; gap: 8px }
.ft-si { width: 36px; height: 36px; border-radius: 50%; border: 1.5px solid var(--ink4); display: flex; align-items: center; justify-content: center; color: var(--ink2); text-decoration: none; font-size: .82rem; transition: all .2s }
.ft-si:hover { border-color: var(--lime); color: var(--lime); background: var(--lime-dim) }
.ft-copy { font-size: .8rem; color: var(--ink3); text-align: center }
.ft-copy a { color: var(--lime); text-decoration: none }

/* ─────────────────────────────
   ANIMATIONS
───────────────────────────── */
@keyframes fadeUp { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }
@keyframes fadeIn { from{opacity:0} to{opacity:1} }

/* ─────────────────────────────
   RESPONSIVE
───────────────────────────── */
@media(max-width:1100px){
  .hero-photo-wrap { display: none }
  #hero { justify-content: center; padding: 120px 6% 60px }
  .about-wrap { grid-template-columns: 1fr }
  .skills-grid { grid-template-columns: 1fr 1fr }
  .edu-grid, .certs-grid, .proj-grid { grid-template-columns: 1fr 1fr }
  .co-wrap { grid-template-columns: 1fr }
}
@media(max-width:768px){
  .nav-links, .nav-cta { display: none }
  .nav-ham { display: flex }
  .nav-links.open { display: flex; flex-direction: column; position: absolute; top: 100%; left: 0; right: 0; background: rgba(14,14,16,.97); padding: 20px 6%; gap: 14px; border-bottom: 1px solid var(--ink4) }
  .skills-grid, .edu-grid, .certs-grid, .proj-grid { grid-template-columns: 1fr }
  .form-row { grid-template-columns: 1fr }
  .section { padding: 68px 6% }
  .hero-stats { gap: 20px }
}
</style>
</head>
<body>

<!-- LOADER -->
<div id="loader">
  <div class="ld-inner" style="width:200px">
    <div class="ld-name">Vikash<span>.</span></div>
    <div class="ld-track"><div class="ld-fill"></div></div>
  </div>
</div>

<!-- NAV -->
<nav id="nav">
  <div class="nav-inner">
    <a href="#hero" class="nav-logo">Vikash<span>.</span></a>
    <ul class="nav-links" id="nm">
      <li><a href="#about"      class="nl">About</a></li>
      <li><a href="#skills"     class="nl">Skills</a></li>
      <li><a href="#experience" class="nl">Experience</a></li>
      <li><a href="#projects"   class="nl">Projects</a></li>
      <li><a href="#contact"    class="nl">Contact</a></li>
    </ul>
    <a href="{{ route('resume.download') }}" class="nav-cta">Download CV</a>
    <button class="nav-ham" id="ham"><span></span><span></span><span></span></button>
  </div>
</nav>

<!-- ██ HERO ██ -->
<section id="hero">

  <!-- Photo — right side, only instance on the page -->
  <div class="hero-photo-wrap">
    @if($admin?->photo)
      <img src="{{ Storage::url($admin->photo) }}" alt="Vikash Kumar" class="hero-photo">
    @else
      <div class="hero-photo-fallback">VK</div>
    @endif
  </div>

  <div class="hero-content">
    <div class="hero-status">
      <div class="status-pip"></div>
      Available for full-time roles
    </div>

    <h1 class="hero-h">
      <span class="line">Laravel</span>
      <span class="line">Developer<span class="accent">.</span></span>
    </h1>

    <p class="hero-tagline">
      I'm <strong>Vikash Kumar</strong> — I build scalable web applications
      and government-grade platforms with <strong>clean, maintainable code</strong>
      that makes a real difference.
    </p>

    <div class="hero-actions">
      <a href="#projects" class="btn-solid"><i class="fas fa-eye"></i> See My Work</a>
      <a href="#contact"  class="btn-outline"><i class="fas fa-paper-plane"></i> Hire Me</a>
      <a href="{{ route('resume.download') }}" class="btn-text"><i class="fas fa-download"></i> Resume</a>
    </div>

    <div class="hero-foot">
      <div class="hero-stats">
        <div class="hstat">
          <div class="hstat-n">2<em>+</em></div>
          <div class="hstat-l">Years experience</div>
        </div>
        <div class="hstat">
          <div class="hstat-n">10<em>+</em></div>
          <div class="hstat-l">Projects shipped</div>
        </div>
        <div class="hstat">
          <div class="hstat-n">3</div>
          <div class="hstat-l">Companies worked</div>
        </div>
      </div>
      <div class="hero-socs">
        <a href="https://github.com/Vikashgupta95239"  target="_blank" class="hsoc" title="GitHub"><i class="fab fa-github"></i></a>
        <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" class="hsoc" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        <a href="mailto:vikashkumarbth381@gmail.com" class="hsoc" title="Email"><i class="fas fa-envelope"></i></a>
        <a href="tel:+919523919654" class="hsoc" title="Phone"><i class="fas fa-phone"></i></a>
      </div>
    </div>
  </div>

</section>

<!-- ██ ABOUT ██ -->
<section id="about" class="section">
<div class="sec-inner">
  <div class="about-wrap">

    <!-- Left: quick facts + stats -->
    <div class="rv">
      <div class="sec-label">Quick facts</div>
      <div class="about-facts">
        <div class="fact-row"><span class="fact-key">Location</span><span class="fact-val">New Delhi, India 🇮🇳</span></div>
        <div class="fact-row"><span class="fact-key">Status</span><span class="fact-val"><span class="dot"></span>Available now</span></div>
        <div class="fact-row"><span class="fact-key">Role</span><span class="fact-val">Laravel / PHP Developer</span></div>
        <div class="fact-row"><span class="fact-key">Email</span><span class="fact-val"><a href="mailto:vikashkumarbth381@gmail.com">vikashkumarbth381@gmail.com</a></span></div>
        <div class="fact-row"><span class="fact-key">Phone</span><span class="fact-val"><a href="tel:+919523919654">+91 95239 19654</a></span></div>
        <div class="fact-row"><span class="fact-key">Degree</span><span class="fact-val">B.Tech CSE · 8.33 CGPA</span></div>
      </div>
      <div class="about-stats">
        <div class="astat"><div class="astat-n" data-t="2" data-s="+">0</div><div class="astat-l">Years exp.</div></div>
        <div class="astat"><div class="astat-n" data-t="10" data-s="+">0</div><div class="astat-l">Projects</div></div>
        <div class="astat"><div class="astat-n" data-t="3" data-s="">0</div><div class="astat-l">Companies</div></div>
        <div class="astat"><div class="astat-n" data-t="6" data-s="">0</div><div class="astat-l">Certificates</div></div>
      </div>
    </div>

    <!-- Right: story -->
    <div class="about-body rv d1">
      <div class="sec-label">About me</div>
      <h2 class="sec-title">The person<br>behind the <em>code</em></h2>
      <p class="about-p">I'm a dedicated <strong>Laravel & PHP developer</strong> with a focus on building things that actually work — cleanly architected, well-tested, and ready to scale. I've spent the last 2+ years delivering real projects for real users.</p>
      <p class="about-p">I specialise in <strong>government-grade CMS platforms</strong> (GIGW, DBIM 3.0 compliant), REST API design, and database optimisation. When I write code, I think about the engineer who reads it next.</p>

      <div class="xp-label" style="margin-top:32px">Where I've worked</div>
      @foreach($experiences->take(3) as $exp)
      <div class="xp-item">
        <div class="xp-dot {{ $exp->is_current ? 'now' : '' }}"></div>
        <div style="flex:1">
          <div class="xp-role">{{ $exp->title }}</div>
          <div class="xp-co">{{ $exp->company }} · {{ $exp->location }}</div>
        </div>
        <div class="xp-yr">{{ $exp->duration }}</div>
      </div>
      @endforeach

      <div class="about-chips" style="margin-top:28px">
        <span class="chip">Problem solving</span>
        <span class="chip">REST APIs</span>
        <span class="chip">GIGW compliance</span>
        <span class="chip">DB optimisation</span>
        <span class="chip">WCAG / A11y</span>
        <span class="chip">Team player</span>
        <span class="chip">Quick learner</span>
        <span class="chip">Deadline-driven</span>
      </div>
    </div>

  </div>
</div>
</section>

<!-- ██ SKILLS ██ -->
<section id="skills" class="section">
<div class="sec-inner">
  <div class="rv">
    <div class="sec-label">What I work with</div>
    <h2 class="sec-title">Skills &amp; <em>Stack</em></h2>
  </div>
  <div class="skills-grid">
    <div class="skill-card rv d1">
      <div class="sk-ic">⚙️</div><div class="sk-cat">Backend</div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">PHP</span><span class="sk-pct">92%</span></div><div class="sk-track"><div class="sk-fill" data-w="92"></div></div></div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">Laravel</span><span class="sk-pct">90%</span></div><div class="sk-track"><div class="sk-fill" data-w="90"></div></div></div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">CakePHP</span><span class="sk-pct">75%</span></div><div class="sk-track"><div class="sk-fill" data-w="75"></div></div></div>
    </div>
    <div class="skill-card rv d2">
      <div class="sk-ic">🎨</div><div class="sk-cat">Frontend</div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">HTML / CSS</span><span class="sk-pct">88%</span></div><div class="sk-track"><div class="sk-fill" data-w="88"></div></div></div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">JavaScript</span><span class="sk-pct">80%</span></div><div class="sk-track"><div class="sk-fill" data-w="80"></div></div></div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">Bootstrap / AJAX</span><span class="sk-pct">85%</span></div><div class="sk-track"><div class="sk-fill" data-w="85"></div></div></div>
    </div>
    <div class="skill-card rv d3">
      <div class="sk-ic">🗄️</div><div class="sk-cat">Database</div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">MySQL</span><span class="sk-pct">88%</span></div><div class="sk-track"><div class="sk-fill" data-w="88"></div></div></div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">DB Design</span><span class="sk-pct">82%</span></div><div class="sk-track"><div class="sk-fill" data-w="82"></div></div></div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">Query Optimisation</span><span class="sk-pct">78%</span></div><div class="sk-track"><div class="sk-fill" data-w="78"></div></div></div>
    </div>
    <div class="skill-card rv d4">
      <div class="sk-ic">🔧</div><div class="sk-cat">Tools</div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">Git / GitHub</span><span class="sk-pct">85%</span></div><div class="sk-track"><div class="sk-fill" data-w="85"></div></div></div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">REST APIs</span><span class="sk-pct">90%</span></div><div class="sk-track"><div class="sk-fill" data-w="90"></div></div></div>
      <div class="sk-row"><div class="sk-info"><span class="sk-name">GIGW / WCAG</span><span class="sk-pct">80%</span></div><div class="sk-track"><div class="sk-fill" data-w="80"></div></div></div>
    </div>
  </div>
</div>
</section>

<!-- ██ EXPERIENCE ██ -->
<section id="experience" class="section" style="background:var(--bg1)">
<div class="sec-inner">
  <div class="rv">
    <div class="sec-label">Career</div>
    <h2 class="sec-title">Where I've <em>worked</em></h2>
  </div>
  <div class="exp-list">
    @foreach($experiences as $exp)
    <div class="exp-item rv">
      <div class="exp-header">
        <span class="exp-num">{{ strtoupper($exp->duration) }}</span>
        <div class="exp-meta">
          <div class="exp-role">{{ $exp->title }}</div>
          <div class="exp-co">{{ $exp->company }} · <span style="color:var(--ink3)">{{ $exp->location }}</span></div>
          @if($exp->is_current)<span class="exp-badge">Current</span>@endif
        </div>
        <div class="exp-dur"></div>
      </div>
      <div class="exp-body">
        <ul>@foreach($exp->responsibilities as $r)<li>{{ $r }}</li>@endforeach</ul>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>

<!-- ██ EDUCATION ██ -->
<section id="education" class="section">
<div class="sec-inner">
  <div class="rv">
    <div class="sec-label">Education</div>
    <h2 class="sec-title">Academic <em>background</em></h2>
  </div>
  <div class="edu-grid">
    <div class="edu-card rv d1"><div class="edu-ic">🎓</div><div class="edu-deg">B.Tech — Computer Science Engineering</div><div class="edu-sch">Sagar Group of Institutions</div><div class="edu-yr"><i class="fas fa-calendar-alt"></i> 2020–2024 · Bhopal</div><div class="edu-score">CGPA 8.33 / 10</div></div>
    <div class="edu-card rv d2"><div class="edu-ic">🏫</div><div class="edu-deg">Intermediate (Science)</div><div class="edu-sch">MJK College Bettiah</div><div class="edu-yr"><i class="fas fa-calendar-alt"></i> 2018–2020 · Bettiah</div><div class="edu-score">76.20%</div></div>
    <div class="edu-card rv d3"><div class="edu-ic">📚</div><div class="edu-deg">Class X — State Board</div><div class="edu-sch">Alok Bharati Bettiah</div><div class="edu-yr"><i class="fas fa-calendar-alt"></i> 2018 · Bettiah</div><div class="edu-score">75.80%</div></div>
  </div>
</div>
</section>

<!-- ██ CERTIFICATIONS ██ -->
<section id="certs" class="section" style="background:var(--bg1)">
<div class="sec-inner">
  <div class="rv">
    <div class="sec-label">Credentials</div>
    <h2 class="sec-title">Certifications</h2>
  </div>
  <div class="certs-grid">
    @foreach($certifications as $cert)
    <div class="cert-card rv">
      <div class="cert-ic"><i class="fas fa-{{ $cert->icon ?? 'award' }}"></i></div>
      <div class="cert-nm">{{ $cert->title }}</div>
      <div class="cert-issuer"><i class="fas fa-building" style="color:var(--warm);font-size:.7rem"></i> {{ $cert->issuer }}</div>
      @if($cert->certificate_url)<a href="{{ $cert->certificate_url }}" target="_blank" class="cert-link"><i class="fas fa-arrow-up-right-from-square" style="font-size:.72rem"></i> View certificate</a>@endif
    </div>
    @endforeach
  </div>
</div>
</section>

<!-- ██ PROJECTS ██ -->
<section id="projects" class="section">
<div class="sec-inner">
  <div class="rv">
    <div class="sec-label">Work</div>
    <h2 class="sec-title">Selected <em>projects</em></h2>
  </div>
  <div class="proj-filters rv">
    <button class="pf on" data-f="all">All</button>
    <button class="pf" data-f="laravel">Laravel</button>
    <button class="pf" data-f="php">PHP</button>
    <button class="pf" data-f="api">API</button>
    <button class="pf" data-f="government">Government</button>
  </div>
  <div class="proj-grid" id="pg">
    @php
    $imgs=['government'=>'https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=640&h=400&fit=crop&q=75','api'=>'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=640&h=400&fit=crop&q=75','laravel'=>'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=640&h=400&fit=crop&q=75','php'=>'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=640&h=400&fit=crop&q=75','other'=>'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=640&h=400&fit=crop&q=75'];
    @endphp
    @foreach($projects as $project)
    <div class="proj-card rv" data-cat="{{ $project->category }}">
      <div class="proj-img">
        <img src="{{ $project->thumbnail ? Storage::url($project->thumbnail) : ($imgs[$project->category] ?? $imgs['other']) }}" alt="{{ $project->title }}" loading="lazy">
        <div class="chrome">
          <div class="ball" style="background:#ff5f57"></div>
          <div class="ball" style="background:#ffbd2e"></div>
          <div class="ball" style="background:#28c840"></div>
          <div class="chrome-url"></div>
        </div>
        <div class="proj-ov">
          @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank" class="proj-ov-btn"><i class="fab fa-github"></i></a>@endif
          @if($project->live_url)<a href="{{ $project->live_url }}" target="_blank" class="proj-ov-btn"><i class="fas fa-external-link-alt"></i></a>@endif
          @if(!$project->github_url && !$project->live_url)<span class="proj-ov-btn" style="opacity:.3;cursor:default"><i class="fas fa-lock"></i></span>@endif
        </div>
      </div>
      <div class="proj-body">
        <div class="proj-tag">{{ strtoupper($project->category) }}</div>
        <h3 class="proj-name">{{ $project->title }}</h3>
        <p class="proj-desc">{{ $project->short_description }}</p>
        <div class="proj-stack">@foreach($project->tech_stack as $t)<span>{{ $t }}</span>@endforeach</div>
        <div class="proj-links">
          @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank" class="proj-link"><i class="fab fa-github"></i> GitHub</a>@endif
          @if($project->live_url)<a href="{{ $project->live_url }}" target="_blank" class="proj-link"><i class="fas fa-external-link-alt"></i> Live demo</a>@endif
          @if(!$project->github_url && !$project->live_url)<span class="proj-link" style="opacity:.35;cursor:default"><i class="fas fa-lock"></i> Private</span>@endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>

<!-- ██ CONTACT ██ -->
<section id="contact" class="section" style="background:var(--bg1)">
<div class="sec-inner">
  <div class="rv">
    <div class="sec-label">Contact</div>
    <h2 class="sec-title">Let's work <em>together</em></h2>
  </div>
  <div class="co-wrap">
    <div class="rv">
      <p class="co-intro">Have a project in mind, a role to fill, or just want to say hello? I'm always happy to talk. I usually reply within a day.</p>
      <div class="co-details">
        <div class="co-row"><div class="co-ico"><i class="fas fa-envelope"></i></div><div><div class="co-lbl">Email</div><div class="co-val"><a href="mailto:vikashkumarbth381@gmail.com">vikashkumarbth381@gmail.com</a></div></div></div>
        <div class="co-row"><div class="co-ico"><i class="fas fa-phone"></i></div><div><div class="co-lbl">Phone</div><div class="co-val"><a href="tel:+919523919654">+91 95239 19654</a></div></div></div>
        <div class="co-row"><div class="co-ico"><i class="fas fa-map-marker-alt"></i></div><div><div class="co-lbl">Based in</div><div class="co-val">New Delhi, India 🇮🇳</div></div></div>
        <div class="co-row"><div class="co-ico"><i class="fab fa-linkedin-in"></i></div><div><div class="co-lbl">LinkedIn</div><div class="co-val"><a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank">vikash-kumar-computer-science</a></div></div></div>
      </div>
    </div>
    <div class="rv d1">
      <form id="cf">@csrf
        <div class="form-row">
          <div class="form-group"><label class="form-label" for="fn">Your name</label><input class="form-input" type="text" id="fn" name="name" placeholder="John Smith" required></div>
          <div class="form-group"><label class="form-label" for="fe">Email address</label><input class="form-input" type="email" id="fe" name="email" placeholder="john@company.com" required></div>
        </div>
        <div class="form-group"><label class="form-label" for="fs">Subject</label><input class="form-input" type="text" id="fs" name="subject" placeholder="Laravel project opportunity" required></div>
        <div class="form-group"><label class="form-label" for="fm">Message</label><textarea class="form-input" id="fm" name="message" placeholder="Hi Vikash, I'd love to discuss..." required></textarea></div>
        <button type="submit" class="form-submit" id="sb"><i class="fas fa-paper-plane"></i> Send message</button>
      </form>
    </div>
  </div>
</div>
</section>

<!-- FOOTER -->
<footer>
  <div class="ft">
    <div class="ft-logo">Vikash<span>.</span></div>
    <nav class="ft-nav">
      <a href="#about">About</a><a href="#skills">Skills</a><a href="#experience">Experience</a><a href="#projects">Projects</a><a href="#contact">Contact</a>
    </nav>
    <div class="ft-soc">
      <a href="https://github.com/Vikashgupta95239" target="_blank" class="ft-si"><i class="fab fa-github"></i></a>
      <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" class="ft-si"><i class="fab fa-linkedin-in"></i></a>
      <a href="mailto:vikashkumarbth381@gmail.com" class="ft-si"><i class="fas fa-envelope"></i></a>
    </div>
    <p class="ft-copy">© {{ date('Y') }} Vikash Kumar · Built with Laravel 12 · <a href="/admin">Admin</a></p>
  </div>
</footer>

<div class="toast" id="toast"><i class="fas fa-check-circle"></i><span id="toastMsg"></span></div>

<script>
/* Loader */
window.addEventListener('load', () =>
  setTimeout(() => document.getElementById('loader').classList.add('out'), 2500)
);

/* Nav */
const nav = document.getElementById('nav');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 50), {passive:true});
document.getElementById('ham').addEventListener('click', () => document.getElementById('nm').classList.toggle('open'));
window.addEventListener('scroll', () => {
  let c = '';
  document.querySelectorAll('section[id]').forEach(s => { if (scrollY >= s.offsetTop - 260) c = s.id });
  document.querySelectorAll('.nl').forEach(a => a.classList.toggle('on', a.getAttribute('href') === '#' + c));
}, {passive:true});

/* Typewriter — simple, human */
const roles = ['Laravel Developer', 'PHP Developer', 'Backend Engineer', 'API Architect', 'CMS Specialist'];
let ri = 0, ci = 0, del = false;
const tw = document.getElementById('tw');
if (tw) {
  function type() {
    const w = roles[ri];
    if (!del) { tw.textContent = w.slice(0,++ci); if (ci === w.length) { del = true; setTimeout(type, 2200); return } }
    else { tw.textContent = w.slice(0,--ci); if (ci === 0) { del = false; ri = (ri+1)%roles.length } }
    setTimeout(type, del ? 42 : 105);
  }
  setTimeout(type, 2800);
}

/* Reveal */
function reveal(el) {
  el.classList.add('in');
  el.querySelectorAll('.sk-fill[data-w]').forEach(b => { b.style.width = b.dataset.w + '%' });
  el.querySelectorAll('.astat-n[data-t]').forEach(n => {
    if (n.dataset.done) return; n.dataset.done = '1';
    const tg = parseInt(n.dataset.t), sf = n.dataset.s || '';
    let c = 0;
    const t = setInterval(() => { c = Math.min(c + tg/55, tg); n.textContent = Math.floor(c) + sf; if (c >= tg) clearInterval(t) }, 22);
  });
}
const obs = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) reveal(e.target) }), {threshold: 0, rootMargin: '0px 0px -20px 0px'});
document.querySelectorAll('.rv').forEach(el => obs.observe(el));
window.addEventListener('scroll', () => document.querySelectorAll('.rv:not(.in)').forEach(el => { if (el.getBoundingClientRect().top < window.innerHeight + 10) reveal(el) }), {passive:true});
setTimeout(() => document.querySelectorAll('.rv:not(.in)').forEach(reveal), 2800);

/* Filter */
document.querySelectorAll('.pf').forEach(b => {
  b.addEventListener('click', () => {
    document.querySelectorAll('.pf').forEach(x => x.classList.remove('on'));
    b.classList.add('on');
    const f = b.dataset.f;
    document.querySelectorAll('.proj-card').forEach(c => { c.style.display = (f === 'all' || c.dataset.cat === f) ? '' : 'none' });
  });
});

/* Contact */
document.getElementById('cf').addEventListener('submit', async e => {
  e.preventDefault();
  const sb = document.getElementById('sb');
  sb.disabled = true; sb.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending…';
  try {
    const r = await fetch('{{ route("contact.send") }}', { method:'POST', headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}','Accept':'application/json'}, body: new FormData(e.target) });
    const j = await r.json();
    toast(j.message, j.success ? 'ok' : 'err');
    if (j.success) e.target.reset();
  } catch { toast('Something went wrong. Please try again.', 'err') }
  finally { sb.disabled = false; sb.innerHTML = '<i class="fas fa-paper-plane"></i> Send message' }
});
function toast(msg, type) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.className = 'toast' + (type === 'err' ? ' err' : '');
  t.querySelector('i').className = 'fas fa-' + (type === 'err' ? 'exclamation-circle' : 'check-circle');
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 5000);
}

/* Smooth scroll */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    e.preventDefault();
    const el = document.querySelector(a.getAttribute('href'));
    if (el) el.scrollIntoView({behavior:'smooth'});
  });
});
</script>
</body>
</html>

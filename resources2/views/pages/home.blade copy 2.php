<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vikash Kumar — Laravel Developer</title>
<meta name="description" content="Vikash Kumar — Laravel & PHP Developer building scalable web apps and government-grade CMS solutions.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
/* ════════════════════════════════════════
   TOKENS
════════════════════════════════════════ */
:root {
  --bg:    #050508;
  --bg1:   #080810;
  --bg2:   #0c0c18;
  --bg3:   #101022;
  --bg4:   #141430;

  --a:     #0EA5E9;   /* sky blue accent */
  --a1:    rgba(14,165,233,.15);
  --a2:    rgba(14,165,233,.07);
  --ag:    rgba(14,165,233,.5);

  --b:     #8B5CF6;   /* violet secondary */
  --b1:    rgba(139,92,246,.15);

  --gold:  #F59E0B;
  --gold1: rgba(245,158,11,.15);

  --green: #10B981;

  --t:     #F8F8FF;
  --t1:    #C4C4E0;
  --t2:    #7878A0;
  --t3:    #3A3A60;

  --brd:   rgba(255,255,255,.06);
  --brd2:  rgba(14,165,233,.2);
  --card:  rgba(12,12,24,.95);

  --ease:  cubic-bezier(.4,0,.2,1);
  --spring: cubic-bezier(.175,.885,.32,1.275);
}

/* ════════════════════════════════════════
   RESET & BASE
════════════════════════════════════════ */
*,::before,::after { box-sizing:border-box; margin:0; padding:0 }
html {
  scroll-behavior: smooth;
  scrollbar-width: thin;
  scrollbar-color: var(--a) var(--bg1);
}
::-webkit-scrollbar { width: 4px }
::-webkit-scrollbar-track { background: var(--bg1) }
::-webkit-scrollbar-thumb { background: var(--a); border-radius: 2px }
body {
  background: var(--bg);
  color: var(--t);
  font-family: 'Outfit', sans-serif;
  overflow-x: hidden;
  line-height: 1.6;
}

/* ════════════════════════════════════════
   LOADER
════════════════════════════════════════ */
#loader {
  position: fixed; inset: 0; z-index: 9999;
  background: var(--bg);
  display: flex; flex-direction: column;
  align-items: center; justify-content: center; gap: 0;
  transition: opacity .6s var(--ease), visibility .6s;
}
#loader.out { opacity: 0; visibility: hidden }
.ld-logo {
  font-family: 'Outfit', sans-serif;
  font-size: clamp(3rem,8vw,6rem);
  font-weight: 900;
  letter-spacing: -3px;
  background: linear-gradient(135deg, var(--a) 0%, var(--b) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  background-clip: text;
}
.ld-txt {
  font-family: 'JetBrains Mono', monospace;
  font-size: .68rem; letter-spacing: 5px; color: var(--t2);
  margin: 8px 0 28px;
}
.ld-track { width: 160px; height: 1px; background: var(--brd); overflow: hidden }
.ld-fill {
  height: 100%;
  background: linear-gradient(90deg, var(--a), var(--b));
  animation: ldFill 2.2s var(--ease) forwards;
}
@keyframes ldFill { from{width:0} to{width:100%} }

/* ════════════════════════════════════════
   NAVIGATION
════════════════════════════════════════ */
#nav {
  position: fixed; top: 0; inset-inline: 0; z-index: 100;
  padding: 20px 5%;
  transition: all .4s var(--ease);
}
#nav.scrolled {
  background: rgba(5,5,8,.88);
  backdrop-filter: blur(24px);
  -webkit-backdrop-filter: blur(24px);
  padding: 12px 5%;
  border-bottom: 1px solid var(--brd);
}
.nav-inner {
  max-width: 1260px; margin: 0 auto;
  display: flex; align-items: center; justify-content: space-between;
}
.nav-logo {
  font-family: 'Outfit', sans-serif;
  font-size: 1.4rem; font-weight: 900; letter-spacing: -1px;
  text-decoration: none;
  background: linear-gradient(90deg, var(--a), var(--b));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  background-clip: text;
}
.nav-links { display: flex; gap: 2rem; list-style: none }
.nav-links a {
  font-family: 'JetBrains Mono', monospace;
  font-size: .72rem; color: var(--t2);
  text-decoration: none; letter-spacing: 1px;
  transition: color .25s; position: relative; padding-bottom: 2px;
}
.nav-links a .n { color: var(--a); margin-right: 4px; font-size: .62rem }
.nav-links a:hover, .nav-links a.active { color: var(--t) }
.nav-links a::after {
  content: ''; position: absolute; bottom: 0; left: 0;
  width: 0; height: 1px; background: var(--a);
  transition: width .3s var(--ease);
}
.nav-links a:hover::after, .nav-links a.active::after { width: 100% }
.nav-cta {
  font-family: 'JetBrains Mono', monospace;
  font-size: .7rem; letter-spacing: 1px;
  color: var(--a); border: 1px solid var(--brd2);
  padding: 8px 20px; text-decoration: none;
  transition: all .3s; display: flex; align-items: center; gap: 7px;
}
.nav-cta:hover {
  background: var(--a); color: var(--bg);
  box-shadow: 0 0 30px var(--ag);
}
.nav-burger {
  display: none; flex-direction: column; gap: 5px;
  background: none; border: none; cursor: pointer; padding: 3px;
}
.nav-burger span {
  width: 22px; height: 1.5px; background: var(--t); display: block;
  transition: all .3s;
}

/* ════════════════════════════════════════
   HERO
════════════════════════════════════════ */
#hero {
  min-height: 100vh; position: relative; overflow: hidden;
  display: flex; align-items: center;
}
/* Noise texture overlay */
#hero::before {
  content: ''; position: absolute; inset: 0; z-index: 1;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
  pointer-events: none; opacity: .4;
}
.hero-glow-a {
  position: absolute; z-index: 0;
  width: 800px; height: 800px;
  left: -15%; top: -10%;
  background: radial-gradient(circle, rgba(14,165,233,.07) 0%, transparent 65%);
  animation: breathe 7s ease-in-out infinite;
}
.hero-glow-b {
  position: absolute; z-index: 0;
  width: 600px; height: 600px;
  right: -5%; bottom: -10%;
  background: radial-gradient(circle, rgba(139,92,246,.06) 0%, transparent 65%);
  animation: breathe 7s 3.5s ease-in-out infinite;
}
@keyframes breathe {
  0%,100% { transform: scale(1); opacity: .8 }
  50%      { transform: scale(1.15); opacity: 1 }
}
/* Dot grid */
.hero-grid {
  position: absolute; inset: 0; z-index: 0;
  background-image: radial-gradient(circle, rgba(14,165,233,.12) 1px, transparent 1px);
  background-size: 40px 40px;
  mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
  -webkit-mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
}
.hero-wrap {
  position: relative; z-index: 2;
  max-width: 1260px; margin: 0 auto; padding: 0 5%;
  width: 100%; display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px; align-items: center;
  min-height: 100vh; padding-top: 80px; padding-bottom: 60px;
}
/* ── Hero Left ── */
.hero-eyebrow {
  display: inline-flex; align-items: center; gap: 10px;
  font-family: 'JetBrains Mono', monospace;
  font-size: .72rem; color: var(--a); letter-spacing: 3px;
  margin-bottom: 20px;
  opacity: 0; animation: slideUp .6s .1s var(--ease) forwards;
}
.hero-eyebrow::before {
  content: ''; width: 32px; height: 1px; background: var(--a); flex-shrink: 0;
}
.hero-eyebrow-dot {
  width: 6px; height: 6px; border-radius: 50%; background: var(--a);
  animation: pulse 1.5s ease-in-out infinite;
}
h1.hero-name {
  font-family: 'Outfit', sans-serif;
  font-size: clamp(3.8rem,7vw,7rem);
  font-weight: 900; line-height: .92; letter-spacing: -3px;
  margin-bottom: 16px;
  opacity: 0; animation: slideUp .6s .25s var(--ease) forwards;
}
.hero-name .line1 { color: var(--t); display: block }
.hero-name .line2 {
  display: block;
  background: linear-gradient(90deg, var(--a) 0%, var(--b) 60%, var(--gold) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  background-clip: text;
}
.hero-role {
  font-family: 'JetBrains Mono', monospace;
  font-size: 1rem; color: var(--gold);
  margin-bottom: 20px; min-height: 1.6rem;
  display: flex; align-items: center; gap: 8px;
  opacity: 0; animation: slideUp .6s .4s var(--ease) forwards;
}
.hero-role .slash { color: var(--t3); margin-right: 2px }
.hero-cursor { animation: blink .7s step-end infinite }
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }
.hero-desc {
  font-size: 1.05rem; color: var(--t1); line-height: 1.8;
  max-width: 460px; margin-bottom: 32px;
  opacity: 0; animation: slideUp .6s .55s var(--ease) forwards;
}
/* Stat pills */
.hero-stats {
  display: flex; gap: 20px; margin-bottom: 32px;
  opacity: 0; animation: slideUp .6s .65s var(--ease) forwards;
}
.hstat {
  display: flex; flex-direction: column; gap: 2px;
  padding: 12px 18px;
  border: 1px solid var(--brd);
  background: var(--bg2);
  position: relative; overflow: hidden;
  transition: border-color .3s;
}
.hstat:hover { border-color: var(--brd2) }
.hstat::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0;
  height: 2px;
  background: linear-gradient(90deg, var(--a), var(--b));
}
.hstat-num {
  font-family: 'Outfit', sans-serif;
  font-size: 1.8rem; font-weight: 800; line-height: 1;
  background: linear-gradient(135deg, var(--a), var(--b));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  background-clip: text;
}
.hstat-lbl {
  font-family: 'JetBrains Mono', monospace;
  font-size: .62rem; color: var(--t2); letter-spacing: 1.5px;
}
/* Buttons */
.hero-btns {
  display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 32px;
  opacity: 0; animation: slideUp .6s .75s var(--ease) forwards;
}
.btn-fill {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 13px 28px;
  background: linear-gradient(135deg, var(--a), var(--b));
  color: #fff; font-family: 'Outfit', sans-serif;
  font-weight: 700; font-size: .88rem; letter-spacing: .5px;
  text-decoration: none; border: none; cursor: pointer;
  transition: all .3s; position: relative; overflow: hidden;
}
.btn-fill::after {
  content: ''; position: absolute; inset: 0;
  background: rgba(255,255,255,.12);
  opacity: 0; transition: opacity .3s;
}
.btn-fill:hover::after { opacity: 1 }
.btn-fill:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(14,165,233,.3) }
.btn-outline {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 12px 28px;
  background: transparent; color: var(--a);
  font-family: 'Outfit', sans-serif; font-weight: 700; font-size: .88rem;
  border: 1px solid var(--brd2); text-decoration: none; cursor: pointer;
  transition: all .3s;
}
.btn-outline:hover {
  background: var(--a1); border-color: var(--a);
  transform: translateY(-2px);
}
.btn-ghost {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 12px 28px;
  background: transparent; color: var(--t1);
  font-family: 'Outfit', sans-serif; font-weight: 600; font-size: .88rem;
  border: 1px solid var(--brd); text-decoration: none; cursor: pointer;
  transition: all .3s;
}
.btn-ghost:hover { border-color: var(--t2); color: var(--t); transform: translateY(-2px) }
/* Social */
.hero-socials {
  display: flex; gap: 10px;
  opacity: 0; animation: slideUp .6s .85s var(--ease) forwards;
}
.soc-link {
  width: 40px; height: 40px;
  border: 1px solid var(--brd);
  display: flex; align-items: center; justify-content: center;
  color: var(--t2); font-size: .9rem; text-decoration: none;
  transition: all .3s;
}
.soc-link:hover {
  border-color: var(--a); color: var(--a);
  background: var(--a2); transform: translateY(-3px);
}
/* ── Hero Right — Avatar ── */
.hero-right {
  display: flex; align-items: center; justify-content: center;
  opacity: 0; animation: fadeIn 1s 1.2s var(--ease) forwards;
}
.av-wrap { position: relative; width: 360px; height: 360px }
/* Animated orbit rings */
.av-orbit1 {
  position: absolute; inset: -24px; border-radius: 50%;
  border: 1px dashed rgba(14,165,233,.15);
  animation: orbit 20s linear infinite;
}
.av-orbit1::before {
  content: ''; position: absolute; width: 8px; height: 8px;
  background: var(--a); border-radius: 50%;
  top: 50%; left: -4px; transform: translateY(-50%);
  box-shadow: 0 0 10px var(--a);
}
.av-orbit2 {
  position: absolute; inset: -10px; border-radius: 50%;
  border: 1px solid rgba(139,92,246,.2);
  animation: orbit 12s linear infinite reverse;
}
.av-orbit2::before {
  content: ''; position: absolute; width: 6px; height: 6px;
  background: var(--b); border-radius: 50%;
  bottom: -3px; left: 50%; transform: translateX(-50%);
  box-shadow: 0 0 8px var(--b);
}
@keyframes orbit { to { transform: rotate(360deg) } }
/* Glow ring */
.av-glow {
  position: absolute; inset: 0; border-radius: 50%;
  border: 2px solid var(--a);
  box-shadow: 0 0 30px rgba(14,165,233,.4), 0 0 80px rgba(14,165,233,.1),
              inset 0 0 30px rgba(14,165,233,.05);
}
/* Photo */
.av-photo {
  position: absolute; inset: 10px; border-radius: 50%; overflow: hidden;
  background: linear-gradient(135deg, var(--bg3), var(--bg4));
  display: flex; align-items: center; justify-content: center;
}
.av-photo img {
  width: 100%; height: 100%; object-fit: cover; border-radius: 50%;
}
.av-initials {
  font-family: 'Outfit', sans-serif; font-size: 5.5rem; font-weight: 900;
  background: linear-gradient(135deg, var(--a), var(--b));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  background-clip: text; line-height: 1;
}
/* Badge */
.av-badge {
  position: absolute; bottom: -14px; left: 50%; transform: translateX(-50%);
  white-space: nowrap;
  background: var(--bg2); border: 1px solid var(--brd2);
  padding: 6px 20px;
  font-family: 'JetBrains Mono', monospace; font-size: .65rem;
  color: var(--a); letter-spacing: 2px;
  display: flex; align-items: center; gap: 8px;
}
.av-badge-dot {
  width: 6px; height: 6px; border-radius: 50%; background: var(--green);
  box-shadow: 0 0 8px var(--green);
  animation: pulse 1.5s ease-in-out infinite;
}
/* Floating tech tags */
.av-tag {
  position: absolute; white-space: nowrap;
  background: rgba(12,12,24,.92);
  border: 1px solid var(--brd); backdrop-filter: blur(12px);
  padding: 7px 14px;
  font-family: 'JetBrains Mono', monospace; font-size: .65rem; color: var(--t);
  display: flex; align-items: center; gap: 6px;
  box-shadow: 0 4px 20px rgba(0,0,0,.4);
  animation: float 3.5s ease-in-out infinite;
}
.av-tag .dot { width: 6px; height: 6px; border-radius: 50% }
.av-tag.t1 { top: 8%; right: -22%; animation-delay: 0s }
.av-tag.t2 { bottom: 22%; right: -20%; animation-delay: 1.2s }
.av-tag.t3 { top: 35%; left: -24%; animation-delay: .6s }
/* Scroll hint */
.hero-scroll {
  position: absolute; bottom: 28px; left: 50%;
  transform: translateX(-50%);
  display: flex; flex-direction: column; align-items: center; gap: 6px;
  opacity: 0; animation: fadeIn 1s 3s forwards;
}
.hero-scroll span {
  font-family: 'JetBrains Mono', monospace;
  font-size: .58rem; color: var(--t2); letter-spacing: 3px;
}
.scroll-line {
  width: 1px; height: 44px;
  background: linear-gradient(var(--a), transparent);
  animation: scrollLine 2s ease-in-out infinite;
}
@keyframes scrollLine {
  0%,100%{ transform:scaleY(1); opacity:1 }
  50%{ transform:scaleY(.35); opacity:.3 }
}

/* ════════════════════════════════════════
   SHARED SECTION STYLES
════════════════════════════════════════ */
.section { padding: 100px 5% }
.sec-in { max-width: 1260px; margin: 0 auto }
.sec-label {
  font-family: 'JetBrains Mono', monospace;
  font-size: .7rem; color: var(--a); letter-spacing: 3.5px;
  display: flex; align-items: center; gap: 10px; margin-bottom: 8px;
}
.sec-label::before { content: ''; width: 22px; height: 1px; background: var(--a) }
.sec-title {
  font-family: 'Outfit', sans-serif;
  font-size: clamp(2.2rem, 3.8vw, 3.4rem);
  font-weight: 900; line-height: .95; letter-spacing: -2px;
  color: var(--t); margin-bottom: 52px;
}
.sec-title em { font-style: normal; color: var(--a) }
/* Reveal */
.rv {
  opacity: 0; transform: translateY(28px);
  transition: opacity .65s var(--ease), transform .65s var(--ease);
}
.rv.in { opacity: 1 !important; transform: none !important }
.d1{transition-delay:.08s} .d2{transition-delay:.16s}
.d3{transition-delay:.24s} .d4{transition-delay:.32s}

/* ════════════════════════════════════════
   ABOUT
════════════════════════════════════════ */
#about { background: linear-gradient(180deg, var(--bg) 0%, var(--bg1) 100%) }
.about-grid {
  display: grid; grid-template-columns: 320px 1fr; gap: 72px; align-items: start;
}
/* Photo */
.photo-col {}
.photo-frame {
  position: relative; width: 100%; aspect-ratio: 3/4; overflow: hidden;
  border: 1px solid var(--brd);
}
.photo-frame img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  filter: brightness(.85) saturate(.85);
  transition: filter .5s;
}
.photo-frame:hover img { filter: brightness(.95) saturate(1) }
.photo-frame-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(180deg, transparent 40%, rgba(5,5,8,.92) 100%);
  pointer-events: none;
}
.photo-frame-tag {
  position: absolute; bottom: 0; left: 0; right: 0; padding: 20px;
}
.photo-name {
  font-family: 'Outfit', sans-serif; font-size: 1.15rem; font-weight: 700; color: var(--t);
}
.photo-role {
  font-family: 'JetBrains Mono', monospace; font-size: .66rem; color: var(--a);
  letter-spacing: 2px; margin-top: 3px;
}
.photo-fallback {
  width: 100%; height: 100%;
  background: linear-gradient(160deg, var(--bg2), var(--bg3), var(--bg4));
  display: flex; flex-direction: column;
  align-items: center; justify-content: center; gap: 10px;
}
.photo-fallback .fi {
  font-family: 'Outfit', sans-serif; font-size: 7rem; font-weight: 900;
  background: linear-gradient(135deg, var(--a), var(--b));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  background-clip: text; line-height: 1;
}
.photo-deco {
  position: absolute; top: 14px; left: 14px; right: -14px; bottom: -14px;
  border: 1px solid var(--brd2); z-index: -1; pointer-events: none;
}
/* Stats grid */
.about-stats {
  display: grid; grid-template-columns: 1fr 1fr; gap: 1px;
  background: var(--brd); margin-top: 14px;
}
.astat {
  background: var(--bg2); padding: 16px 14px; text-align: center;
  transition: background .3s; position: relative; overflow: hidden;
}
.astat::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--a), var(--b));
  transform: scaleX(0); transition: transform .4s var(--ease);
}
.astat:hover { background: var(--bg3) }
.astat:hover::after { transform: scaleX(1) }
.astat-n {
  font-family: 'Outfit', sans-serif; font-size: 2.2rem; font-weight: 900; line-height: 1;
  background: linear-gradient(135deg, var(--a), var(--b));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  background-clip: text;
}
.astat-l {
  font-family: 'JetBrains Mono', monospace; font-size: .6rem;
  color: var(--t2); letter-spacing: 2px; margin-top: 4px;
}
/* About text */
.about-text .sec-title { margin-bottom: 20px }
.about-body { color: var(--t1); line-height: 1.9; font-size: .97rem; margin-bottom: 16px }
.skill-chips { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 20px }
.skill-chip {
  background: var(--a2); border: 1px solid rgba(14,165,233,.18);
  color: var(--a); padding: 5px 14px;
  font-family: 'JetBrains Mono', monospace; font-size: .68rem; letter-spacing: 1px;
  transition: all .3s;
}
.skill-chip:hover { background: var(--a1); border-color: var(--a) }

/* ════════════════════════════════════════
   SKILLS
════════════════════════════════════════ */
#skills { background: var(--bg1) }
.skills-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 16px }
.skill-card {
  background: var(--card); border: 1px solid var(--brd);
  padding: 26px 22px; transition: all .4s; position: relative; overflow: hidden;
}
.skill-card::before {
  content: ''; position: absolute; top: 0; left: 0; bottom: 0; width: 2px;
  background: linear-gradient(180deg, var(--a), var(--b));
  transform: scaleY(0); transform-origin: top; transition: transform .4s var(--ease);
}
.skill-card:hover {
  border-color: rgba(14,165,233,.18);
  transform: translateY(-4px);
  box-shadow: 0 20px 50px rgba(0,0,0,.6), 0 0 30px rgba(14,165,233,.05);
}
.skill-card:hover::before { transform: scaleY(1) }
.sk-ico { font-size: 1.8rem; margin-bottom: 8px }
.sk-title {
  font-family: 'JetBrains Mono', monospace; font-size: .68rem;
  color: var(--a); letter-spacing: 2.5px; margin-bottom: 20px;
}
.sk-row { margin-bottom: 14px }
.sk-lbl {
  display: flex; justify-content: space-between;
  font-size: .82rem; color: var(--t1); margin-bottom: 5px;
}
.sk-lbl span {
  font-family: 'JetBrains Mono', monospace; font-size: .68rem; color: var(--a);
}
.sk-bar { height: 2px; background: rgba(255,255,255,.06); border-radius: 1px; overflow: hidden }
.sk-fill {
  height: 100%; background: linear-gradient(90deg, var(--a), var(--b));
  width: 0; transition: width 1.5s var(--ease); border-radius: 1px;
}

/* ════════════════════════════════════════
   EXPERIENCE
════════════════════════════════════════ */
#experience { background: var(--bg) }
.timeline { position: relative; padding-left: 36px }
.timeline::before {
  content: ''; position: absolute; left: 6px; top: 10px; bottom: 10px;
  width: 1px;
  background: linear-gradient(180deg, var(--a), rgba(14,165,233,.04));
}
.tl-item { position: relative; margin-bottom: 24px }
.tl-dot {
  position: absolute; left: -36px; top: 10px;
  width: 13px; height: 13px; border-radius: 50%;
  background: var(--bg); border: 2px solid rgba(14,165,233,.35);
  transition: all .3s;
}
.tl-dot.active {
  background: var(--a); border-color: var(--a);
  box-shadow: 0 0 16px rgba(14,165,233,.7), 0 0 40px rgba(14,165,233,.2);
}
.tl-card {
  background: var(--card); border: 1px solid var(--brd);
  padding: 24px 26px; transition: all .4s; position: relative; overflow: hidden;
}
.tl-card::after {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(90deg, var(--a), var(--b), transparent);
  transform: scaleX(0); transform-origin: left; transition: transform .4s var(--ease);
}
.tl-card:hover { border-color: rgba(14,165,233,.18); box-shadow: 0 8px 40px rgba(0,0,0,.4) }
.tl-card:hover::after { transform: scaleX(1) }
.tl-period {
  font-family: 'JetBrains Mono', monospace; font-size: .66rem;
  color: var(--a); letter-spacing: 2px; margin-bottom: 8px;
}
.tl-row { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 4px }
.tl-title {
  font-family: 'Outfit', sans-serif; font-size: 1.2rem; font-weight: 700; color: var(--t);
}
.tl-badge {
  background: rgba(14,165,233,.1); border: 1px solid rgba(14,165,233,.25);
  color: var(--a); font-family: 'JetBrains Mono', monospace;
  font-size: .58rem; padding: 2px 9px; letter-spacing: 1.5px;
}
.tl-company { color: var(--gold); font-size: .9rem; margin-bottom: 3px; display: flex; align-items: center; gap: 6px }
.tl-location {
  font-family: 'JetBrains Mono', monospace; font-size: .66rem;
  color: var(--t2); margin-bottom: 14px; display: flex; align-items: center; gap: 5px;
}
.tl-list { list-style: none; display: flex; flex-direction: column; gap: 6px }
.tl-list li {
  color: var(--t1); font-size: .88rem; line-height: 1.68;
  padding-left: 16px; position: relative;
}
.tl-list li::before {
  content: '›'; position: absolute; left: 0; color: var(--a);
  font-size: 1.1rem; line-height: 1.45;
}

/* ════════════════════════════════════════
   EDUCATION
════════════════════════════════════════ */
#education { background: var(--bg1) }
.edu-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px }
.edu-card {
  background: var(--card); border: 1px solid var(--brd);
  padding: 26px 22px; transition: all .4s; position: relative; overflow: hidden;
}
.edu-card::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(14,165,233,.04), transparent 55%);
  opacity: 0; transition: opacity .4s;
}
.edu-card:hover {
  border-color: rgba(14,165,233,.18);
  transform: translateY(-4px);
  box-shadow: 0 20px 50px rgba(0,0,0,.5);
}
.edu-card:hover::before { opacity: 1 }
.edu-ico { font-size: 2.2rem; margin-bottom: 14px }
.edu-degree { font-family: 'Outfit', sans-serif; font-size: 1rem; font-weight: 700; color: var(--t); margin-bottom: 5px; line-height: 1.3 }
.edu-school { color: var(--a); font-size: .85rem; margin-bottom: 4px }
.edu-year {
  font-family: 'JetBrains Mono', monospace; font-size: .66rem;
  color: var(--t2); margin-bottom: 14px; display: flex; align-items: center; gap: 5px;
}
.edu-score {
  background: var(--gold1); border: 1px solid rgba(245,158,11,.25);
  color: var(--gold); font-family: 'JetBrains Mono', monospace;
  font-size: .72rem; padding: 4px 12px; display: inline-block;
}

/* ════════════════════════════════════════
   CERTIFICATIONS
════════════════════════════════════════ */
#certs { background: var(--bg) }
.certs-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px }
.cert-card {
  background: var(--card); border: 1px solid var(--brd);
  padding: 22px; transition: all .4s; display: flex; flex-direction: column;
  position: relative; overflow: hidden;
}
.cert-card::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--a), var(--b));
  transform: scaleX(0); transform-origin: left; transition: transform .4s var(--ease);
}
.cert-card:hover {
  border-color: rgba(14,165,233,.2);
  transform: translateY(-4px);
  box-shadow: 0 20px 50px rgba(0,0,0,.5), 0 0 30px rgba(14,165,233,.05);
}
.cert-card:hover::after { transform: scaleX(1) }
.cert-ico { font-size: 1.9rem; color: var(--a); margin-bottom: 12px }
.cert-name { font-family: 'Outfit', sans-serif; font-size: .95rem; font-weight: 700; color: var(--t); margin-bottom: 5px; line-height: 1.35; flex: 1 }
.cert-issuer { color: var(--t2); font-size: .82rem; margin-bottom: 14px; display: flex; align-items: center; gap: 5px }
.cert-issuer i { color: var(--gold); font-size: .72rem }
.cert-btn {
  background: transparent; border: 1px solid var(--brd); color: var(--t2);
  padding: 5px 14px; font-family: 'JetBrains Mono', monospace; font-size: .66rem;
  cursor: pointer; transition: all .3s; text-decoration: none;
  display: inline-flex; align-items: center; gap: 5px; letter-spacing: 1px;
  align-self: flex-start; margin-top: auto;
}
.cert-btn:hover { border-color: var(--a); color: var(--a) }

/* ════════════════════════════════════════
   PROJECTS
════════════════════════════════════════ */
#projects { background: var(--bg1) }
.proj-filters { display: flex; gap: 8px; margin-bottom: 36px; flex-wrap: wrap }
.pfbtn {
  background: transparent; border: 1px solid var(--brd); color: var(--t2);
  padding: 6px 18px; font-family: 'JetBrains Mono', monospace; font-size: .68rem;
  cursor: pointer; letter-spacing: 1px; transition: all .3s;
}
.pfbtn.on, .pfbtn:hover { border-color: var(--a); color: var(--a); background: var(--a2) }
.proj-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 20px }
.proj-card {
  background: var(--card); border: 1px solid var(--brd);
  overflow: hidden; transition: all .4s;
}
.proj-card:hover {
  border-color: rgba(14,165,233,.2);
  transform: translateY(-5px);
  box-shadow: 0 28px 60px rgba(0,0,0,.7), 0 0 40px rgba(14,165,233,.06);
}
.proj-thumb { height: 200px; position: relative; overflow: hidden }
.proj-thumb img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform .55s var(--ease), filter .55s;
  filter: brightness(.72) saturate(.8);
}
.proj-card:hover .proj-thumb img {
  transform: scale(1.06); filter: brightness(.85) saturate(1);
}
/* Browser chrome */
.proj-chrome {
  position: absolute; top: 0; left: 0; right: 0;
  height: 28px; background: rgba(0,0,0,.55);
  backdrop-filter: blur(6px);
  display: flex; align-items: center; gap: 5px; padding: 0 12px; z-index: 2;
}
.proj-chrome .url-bar {
  flex: 1; height: 12px; background: rgba(255,255,255,.07);
  border-radius: 2px; margin: 0 10px;
}
.traffic { width: 8px; height: 8px; border-radius: 50% }
/* Hover overlay */
.proj-overlay {
  position: absolute; inset: 0; z-index: 3;
  background: rgba(5,5,8,.78);
  display: flex; align-items: center; justify-content: center; gap: 14px;
  opacity: 0; transition: opacity .35s;
}
.proj-card:hover .proj-overlay { opacity: 1 }
.proj-ov-btn {
  width: 48px; height: 48px; border-radius: 50%;
  border: 2px solid rgba(255,255,255,.3);
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 1.1rem; text-decoration: none;
  transition: all .3s;
}
.proj-ov-btn:hover {
  background: var(--a); border-color: var(--a);
  color: var(--bg); transform: scale(1.1);
}
.proj-body { padding: 18px }
.proj-cat {
  font-family: 'JetBrains Mono', monospace; font-size: .64rem;
  color: var(--gold); letter-spacing: 2.5px; margin-bottom: 6px; text-transform: uppercase;
}
.proj-name { font-family: 'Outfit', sans-serif; font-size: 1.05rem; font-weight: 700; color: var(--t); margin-bottom: 8px; line-height: 1.25 }
.proj-desc { color: var(--t1); font-size: .83rem; line-height: 1.7; margin-bottom: 12px }
.proj-tags { display: flex; flex-wrap: wrap; gap: 4px; margin-bottom: 14px }
.proj-tag {
  background: var(--a2); border: 1px solid rgba(14,165,233,.15);
  color: var(--a); padding: 3px 9px;
  font-family: 'JetBrains Mono', monospace; font-size: .64rem;
}
.proj-links { display: flex; gap: 14px }
.proj-link {
  color: var(--t2); font-family: 'JetBrains Mono', monospace; font-size: .68rem;
  text-decoration: none; display: flex; align-items: center; gap: 4px;
  transition: color .3s; border-bottom: 1px solid transparent; padding-bottom: 1px;
}
.proj-link:hover { color: var(--a); border-color: var(--a) }

/* ════════════════════════════════════════
   CONTACT
════════════════════════════════════════ */
#contact { background: var(--bg) }
.contact-grid { display: grid; grid-template-columns: 1fr 1.55fr; gap: 72px; align-items: start }
.contact-intro { color: var(--t1); line-height: 1.9; font-size: .97rem; margin-bottom: 36px }
.contact-item {
  display: flex; align-items: flex-start; gap: 14px;
  margin-bottom: 20px; padding: 14px; border: 1px solid transparent;
  transition: border-color .3s, background .3s;
}
.contact-item:hover { border-color: var(--brd); background: var(--bg2) }
.contact-ico {
  width: 44px; height: 44px; flex-shrink: 0;
  background: var(--a2); border: 1px solid rgba(14,165,233,.2);
  display: flex; align-items: center; justify-content: center;
  color: var(--a); font-size: .95rem; transition: all .3s;
}
.contact-item:hover .contact-ico { background: var(--a1); box-shadow: 0 0 20px rgba(14,165,233,.15) }
.contact-lbl {
  font-family: 'JetBrains Mono', monospace; font-size: .64rem;
  color: var(--a); letter-spacing: 2.5px; margin-bottom: 3px;
}
.contact-val { color: var(--t); font-size: .92rem }
.contact-val a { color: var(--t); text-decoration: none; transition: color .3s }
.contact-val a:hover { color: var(--a) }
/* Form */
.form-group { margin-bottom: 16px }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px }
.form-label {
  display: block; font-family: 'JetBrains Mono', monospace;
  font-size: .64rem; color: var(--a); letter-spacing: 2.5px; margin-bottom: 7px;
}
.form-input {
  width: 100%; background: var(--bg2); border: 1px solid var(--brd);
  color: var(--t); padding: 13px 16px;
  font-family: 'Outfit', sans-serif; font-size: .92rem;
  transition: all .3s; outline: none; border-radius: 0;
}
.form-input::placeholder { color: rgba(120,120,160,.5) }
.form-input:focus { border-color: var(--a); background: var(--bg3); box-shadow: 0 0 0 3px rgba(14,165,233,.06) }
textarea.form-input { min-height: 140px; resize: vertical }
.form-submit {
  width: 100%; padding: 15px;
  background: linear-gradient(135deg, var(--a), var(--b));
  color: #fff; font-family: 'Outfit', sans-serif;
  font-weight: 800; font-size: .9rem; letter-spacing: 1.5px;
  border: none; cursor: pointer; transition: all .3s;
  display: flex; align-items: center; justify-content: center; gap: 10px;
  margin-top: 8px; position: relative; overflow: hidden;
}
.form-submit::after {
  content: ''; position: absolute; inset: 0;
  background: rgba(255,255,255,.12); opacity: 0; transition: opacity .3s;
}
.form-submit:hover::after { opacity: 1 }
.form-submit:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(14,165,233,.25) }
.form-submit:disabled { opacity: .5; cursor: not-allowed; transform: none; box-shadow: none }

/* ════════════════════════════════════════
   TOAST
════════════════════════════════════════ */
.toast {
  position: fixed; bottom: 24px; right: 24px; z-index: 9999;
  background: var(--bg2); border: 1px solid var(--a);
  padding: 14px 20px; color: var(--t);
  font-family: 'Outfit', sans-serif;
  display: flex; align-items: center; gap: 10px; max-width: 300px;
  box-shadow: 0 10px 40px rgba(0,0,0,.6);
  transform: translateY(80px); opacity: 0;
  transition: all .4s var(--ease);
}
.toast.show { transform: translateY(0); opacity: 1 }
.toast.error { border-color: #ef4444 }
.toast i { font-size: 1.1rem; color: var(--a) }
.toast.error i { color: #ef4444 }

/* ════════════════════════════════════════
   FOOTER
════════════════════════════════════════ */
footer {
  background: var(--bg1); border-top: 1px solid var(--brd);
  padding: 52px 5%;
}
.footer-inner {
  max-width: 1260px; margin: 0 auto;
  display: flex; flex-direction: column; align-items: center; gap: 22px;
}
.footer-logo {
  font-family: 'Outfit', sans-serif; font-size: 2rem; font-weight: 900; letter-spacing: -2px;
  background: linear-gradient(90deg, var(--a), var(--b));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  background-clip: text;
}
.footer-nav { display: flex; gap: 28px; flex-wrap: wrap; justify-content: center }
.footer-nav a {
  font-family: 'JetBrains Mono', monospace; font-size: .68rem;
  color: var(--t2); text-decoration: none; letter-spacing: 1.5px; transition: color .3s;
}
.footer-nav a:hover { color: var(--a) }
.footer-socials { display: flex; gap: 10px }
.footer-soc {
  width: 36px; height: 36px; border: 1px solid var(--brd);
  display: flex; align-items: center; justify-content: center;
  color: var(--t2); text-decoration: none; font-size: .88rem; transition: all .3s;
}
.footer-soc:hover { border-color: var(--a); color: var(--a); background: var(--a2) }
.footer-copy {
  font-family: 'JetBrains Mono', monospace; font-size: .66rem;
  color: var(--t2); letter-spacing: 1px; text-align: center;
}
.footer-copy a { color: var(--a); text-decoration: none }

/* ════════════════════════════════════════
   ANIMATIONS
════════════════════════════════════════ */
@keyframes slideUp {
  from { opacity:0; transform:translateY(22px) }
  to   { opacity:1; transform:translateY(0) }
}
@keyframes fadeIn { from{opacity:0} to{opacity:1} }
@keyframes float {
  0%,100% { transform:translateY(0) }
  50%     { transform:translateY(-9px) }
}
@keyframes pulse {
  0%,100% { opacity:.6; transform:scale(1) }
  50%     { opacity:1; transform:scale(1.15) }
}

/* ════════════════════════════════════════
   RESPONSIVE
════════════════════════════════════════ */
@media(max-width:1100px){
  .hero-wrap { grid-template-columns:1fr; padding-top:110px; min-height:auto }
  .hero-right { order:-1 }
  .av-wrap { width:260px; height:260px }
  .av-tag { display:none }
  .about-grid { grid-template-columns:1fr }
  .skills-grid { grid-template-columns:1fr 1fr }
  .proj-grid { grid-template-columns:1fr 1fr }
  .contact-grid { grid-template-columns:1fr }
}
@media(max-width:768px){
  .nav-links, .nav-cta { display:none }
  .nav-burger { display:flex }
  .nav-links.open {
    display:flex; flex-direction:column;
    position:absolute; top:100%; left:0; right:0;
    background:rgba(5,5,8,.96); padding:20px 5%;
    gap:18px; border-bottom:1px solid var(--brd);
  }
  .skills-grid, .edu-grid, .certs-grid, .proj-grid { grid-template-columns:1fr }
  .form-row { grid-template-columns:1fr }
  .section { padding:72px 5% }
  .hero-stats { flex-wrap:wrap }
}
</style>
</head>
<body>

<!-- LOADER -->
<div id="loader">
  <div class="ld-logo">VK.</div>
  <div class="ld-txt">LARAVEL DEVELOPER</div>
  <div class="ld-track"><div class="ld-fill"></div></div>
</div>

<!-- NAVIGATION -->
<nav id="nav">
  <div class="nav-inner">
    <a href="#hero" class="nav-logo">VK.</a>
    <ul class="nav-links" id="navMenu">
      <li><a href="#about"      class="navl"><span class="n">01/</span>About</a></li>
      <li><a href="#skills"     class="navl"><span class="n">02/</span>Skills</a></li>
      <li><a href="#experience" class="navl"><span class="n">03/</span>Experience</a></li>
      <li><a href="#projects"   class="navl"><span class="n">04/</span>Projects</a></li>
      <li><a href="#contact"    class="navl"><span class="n">05/</span>Contact</a></li>
    </ul>
    <a href="{{ route('resume.download') }}" class="nav-cta">
      <i class="fas fa-download"></i> Resume
    </a>
    <button class="nav-burger" id="burger">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- ═══ HERO ═══ -->
<section id="hero">
  <div class="hero-grid"></div>
  <div class="hero-glow-a"></div>
  <div class="hero-glow-b"></div>
  <div class="hero-wrap">

    <!-- Left -->
    <div class="hero-left">
      <div class="hero-eyebrow">
        <div class="hero-eyebrow-dot"></div>
        Available for Work
      </div>
      <h1 class="hero-name">
        <span class="line1">VIKASH</span>
        <span class="line2">KUMAR</span>
      </h1>
      <div class="hero-role">
        <span class="slash">//</span>
        <span id="tw"></span><span class="hero-cursor">_</span>
      </div>
      <p class="hero-desc">
        Building scalable web applications &amp; government-grade CMS solutions with clean code, precision, and real-world impact.
      </p>
      <div class="hero-stats">
        <div class="hstat">
          <div class="hstat-num">2+</div>
          <div class="hstat-lbl">YEARS EXP.</div>
        </div>
        <div class="hstat">
          <div class="hstat-num">10+</div>
          <div class="hstat-lbl">PROJECTS</div>
        </div>
        <div class="hstat">
          <div class="hstat-num">3</div>
          <div class="hstat-lbl">COMPANIES</div>
        </div>
      </div>
      <div class="hero-btns">
        <a href="{{ route('resume.download') }}" class="btn-fill">
          <i class="fas fa-download"></i> Download CV
        </a>
        <a href="#projects" class="btn-outline">
          <i class="fas fa-code"></i> My Projects
        </a>
        <a href="#contact" class="btn-ghost">
          <i class="fas fa-paper-plane"></i> Hire Me
        </a>
      </div>
      <div class="hero-socials">
        <a href="https://github.com/Vikashgupta95239" target="_blank" class="soc-link" title="GitHub"><i class="fab fa-github"></i></a>
        <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" class="soc-link" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        <a href="mailto:vikashkumarbth381@gmail.com" class="soc-link" title="Email"><i class="fas fa-envelope"></i></a>
        <a href="tel:+919523919654" class="soc-link" title="Phone"><i class="fas fa-phone"></i></a>
      </div>
    </div>

    <!-- Right — Avatar -->
    <div class="hero-right">
      <div class="av-wrap">
        <div class="av-orbit1"></div>
        <div class="av-orbit2"></div>
        <div class="av-glow"></div>
        <div class="av-photo">
          @if($admin?->photo)
            <img src="{{ Storage::url($admin->photo) }}" alt="Vikash Kumar">
          @else
            <div class="av-initials">VK</div>
          @endif
        </div>
        <div class="av-badge">
          <div class="av-badge-dot"></div>
          Open to Opportunities
        </div>
        <div class="av-tag t1"><div class="dot" style="background:#0EA5E9;width:6px;height:6px;border-radius:50%"></div> Laravel 12</div>
        <div class="av-tag t2"><div class="dot" style="background:#10B981;width:6px;height:6px;border-radius:50%"></div> PHP 8.2</div>
        <div class="av-tag t3"><div class="dot" style="background:#8B5CF6;width:6px;height:6px;border-radius:50%"></div> MySQL</div>
      </div>
    </div>

  </div>
  <div class="hero-scroll">
    <span>SCROLL</span>
    <div class="scroll-line"></div>
  </div>
</section>

<!-- ═══ ABOUT ═══ -->
<section id="about" class="section">
<div class="sec-in">
  <div class="about-grid">

    <!-- Photo column -->
    <div class="rv">
      <div style="position:relative">
        <div class="photo-frame">
          @if($admin?->photo)
            <img src="{{ Storage::url($admin->photo) }}" alt="Vikash Kumar">
          @else
            <div class="photo-fallback">
              <div class="fi">VK</div>
            </div>
          @endif
          <div class="photo-frame-overlay"></div>
          <div class="photo-frame-tag">
            <div class="photo-name">Vikash Kumar</div>
            <div class="photo-role">Laravel · PHP · API</div>
          </div>
        </div>
        <div class="photo-deco"></div>
      </div>
      <div class="about-stats">
        <div class="astat"><div class="astat-n" data-t="2" data-s="+">0</div><div class="astat-l">YEARS EXP.</div></div>
        <div class="astat"><div class="astat-n" data-t="10" data-s="+">0</div><div class="astat-l">PROJECTS</div></div>
        <div class="astat"><div class="astat-n" data-t="3" data-s="">0</div><div class="astat-l">COMPANIES</div></div>
        <div class="astat"><div class="astat-n" data-t="6" data-s="">0</div><div class="astat-l">CERTIFICATES</div></div>
      </div>
    </div>

    <!-- Text column -->
    <div class="rv d1 about-text">
      <div class="sec-label">Who I Am</div>
      <h2 class="sec-title">About <em>Me</em></h2>
      <p class="about-body">{{ $admin?->bio ?? 'Dedicated Laravel Developer with 2+ years of experience in building scalable web applications and CMS solutions. Skilled in REST API integration, database design, backend performance optimization, and delivering secure government and enterprise-level projects (GIGW, DBIM 3.0).' }}</p>
      <p class="about-body">I thrive at the intersection of clean code and real-world impact — from ministry-level government portals to high-performance API architectures. Every line I write is intentional, maintainable, and built to last.</p>
      <div class="sec-label" style="margin-top:24px">Core Strengths</div>
      <div class="skill-chips">
        <span class="skill-chip">Problem Solving</span>
        <span class="skill-chip">REST API Design</span>
        <span class="skill-chip">GIGW Compliance</span>
        <span class="skill-chip">WCAG / A11y</span>
        <span class="skill-chip">DB Optimization</span>
        <span class="skill-chip">Team Collaboration</span>
        <span class="skill-chip">Quick Learner</span>
        <span class="skill-chip">Deadline-Driven</span>
      </div>
    </div>

  </div>
</div>
</section>

<!-- ═══ SKILLS ═══ -->
<section id="skills" class="section">
<div class="sec-in">
  <div class="rv">
    <div class="sec-label">Tech Stack</div>
    <h2 class="sec-title">My <em>Skills</em></h2>
  </div>
  <div class="skills-grid">
    <div class="skill-card rv d1">
      <div class="sk-ico">⚙️</div>
      <div class="sk-title">BACKEND</div>
      <div class="sk-row"><div class="sk-lbl">PHP <span>92%</span></div><div class="sk-bar"><div class="sk-fill" data-w="92"></div></div></div>
      <div class="sk-row"><div class="sk-lbl">Laravel <span>90%</span></div><div class="sk-bar"><div class="sk-fill" data-w="90"></div></div></div>
      <div class="sk-row"><div class="sk-lbl">CakePHP <span>75%</span></div><div class="sk-bar"><div class="sk-fill" data-w="75"></div></div></div>
    </div>
    <div class="skill-card rv d2">
      <div class="sk-ico">🎨</div>
      <div class="sk-title">FRONTEND</div>
      <div class="sk-row"><div class="sk-lbl">HTML / CSS <span>88%</span></div><div class="sk-bar"><div class="sk-fill" data-w="88"></div></div></div>
      <div class="sk-row"><div class="sk-lbl">JavaScript / jQuery <span>80%</span></div><div class="sk-bar"><div class="sk-fill" data-w="80"></div></div></div>
      <div class="sk-row"><div class="sk-lbl">Bootstrap / AJAX <span>85%</span></div><div class="sk-bar"><div class="sk-fill" data-w="85"></div></div></div>
    </div>
    <div class="skill-card rv d3">
      <div class="sk-ico">🗄️</div>
      <div class="sk-title">DATABASE</div>
      <div class="sk-row"><div class="sk-lbl">MySQL <span>88%</span></div><div class="sk-bar"><div class="sk-fill" data-w="88"></div></div></div>
      <div class="sk-row"><div class="sk-lbl">Database Design <span>82%</span></div><div class="sk-bar"><div class="sk-fill" data-w="82"></div></div></div>
      <div class="sk-row"><div class="sk-lbl">Query Optimization <span>78%</span></div><div class="sk-bar"><div class="sk-fill" data-w="78"></div></div></div>
    </div>
    <div class="skill-card rv d4">
      <div class="sk-ico">🔧</div>
      <div class="sk-title">TOOLS</div>
      <div class="sk-row"><div class="sk-lbl">Git / GitHub <span>85%</span></div><div class="sk-bar"><div class="sk-fill" data-w="85"></div></div></div>
      <div class="sk-row"><div class="sk-lbl">REST APIs <span>90%</span></div><div class="sk-bar"><div class="sk-fill" data-w="90"></div></div></div>
      <div class="sk-row"><div class="sk-lbl">GIGW / WCAG <span>80%</span></div><div class="sk-bar"><div class="sk-fill" data-w="80"></div></div></div>
    </div>
  </div>
</div>
</section>

<!-- ═══ EXPERIENCE ═══ -->
<section id="experience" class="section">
<div class="sec-in">
  <div class="rv">
    <div class="sec-label">Career Journey</div>
    <h2 class="sec-title">Work <em>Experience</em></h2>
  </div>
  <div class="timeline">
    @foreach($experiences as $exp)
    <div class="tl-item rv">
      <div class="tl-dot {{ $exp->is_current ? 'active' : '' }}"></div>
      <div class="tl-card">
        <div class="tl-period">{{ strtoupper($exp->duration) }}</div>
        <div class="tl-row">
          <div class="tl-title">{{ $exp->title }}</div>
          @if($exp->is_current)<span class="tl-badge">● CURRENT</span>@endif
        </div>
        <div class="tl-company"><i class="fas fa-building"></i> {{ $exp->company }}</div>
        <div class="tl-location"><i class="fas fa-map-marker-alt"></i> {{ $exp->location }}</div>
        <ul class="tl-list">
          @foreach($exp->responsibilities as $r)<li>{{ $r }}</li>@endforeach
        </ul>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>

<!-- ═══ EDUCATION ═══ -->
<section id="education" class="section">
<div class="sec-in">
  <div class="rv">
    <div class="sec-label">Academic Background</div>
    <h2 class="sec-title">My <em>Education</em></h2>
  </div>
  <div class="edu-grid">
    <div class="edu-card rv d1">
      <div class="edu-ico">🎓</div>
      <div class="edu-degree">B.Tech. — Computer Science Engineering</div>
      <div class="edu-school">Sagar Group of Institutions</div>
      <div class="edu-year"><i class="fas fa-calendar-alt"></i> July 2020 – June 2024 · Bhopal</div>
      <div class="edu-score">CGPA: 8.33 / 10</div>
    </div>
    <div class="edu-card rv d2">
      <div class="edu-ico">🏫</div>
      <div class="edu-degree">Intermediate (Science)</div>
      <div class="edu-school">MJK College Bettiah</div>
      <div class="edu-year"><i class="fas fa-calendar-alt"></i> June 2018 – May 2020 · Bettiah</div>
      <div class="edu-score">76.20%</div>
    </div>
    <div class="edu-card rv d3">
      <div class="edu-ico">📚</div>
      <div class="edu-degree">Class X — State Board</div>
      <div class="edu-school">Alok Bharati Bettiah</div>
      <div class="edu-year"><i class="fas fa-calendar-alt"></i> June 2018 · Bettiah</div>
      <div class="edu-score">75.80%</div>
    </div>
  </div>
</div>
</section>

<!-- ═══ CERTIFICATIONS ═══ -->
<section id="certs" class="section" style="background:var(--bg1)">
<div class="sec-in">
  <div class="rv">
    <div class="sec-label">Credentials</div>
    <h2 class="sec-title">My <em>Certifications</em></h2>
  </div>
  <div class="certs-grid">
    @foreach($certifications as $cert)
    <div class="cert-card rv">
      <div class="cert-ico"><i class="fas fa-{{ $cert->icon ?? 'award' }}"></i></div>
      <div class="cert-name">{{ $cert->title }}</div>
      <div class="cert-issuer"><i class="fas fa-building"></i> {{ $cert->issuer }}</div>
      @if($cert->certificate_url)
        <a href="{{ $cert->certificate_url }}" target="_blank" class="cert-btn">
          <i class="fas fa-external-link-alt"></i> View Certificate
        </a>
      @endif
    </div>
    @endforeach
  </div>
</div>
</section>

<!-- ═══ PROJECTS ═══ -->
<section id="projects" class="section">
<div class="sec-in">
  <div class="rv">
    <div class="sec-label">Portfolio</div>
    <h2 class="sec-title">My <em>Projects</em></h2>
  </div>
  <div class="proj-filters">
    <button class="pfbtn on" data-f="all">All Projects</button>
    <button class="pfbtn" data-f="laravel">Laravel</button>
    <button class="pfbtn" data-f="php">PHP</button>
    <button class="pfbtn" data-f="api">API</button>
    <button class="pfbtn" data-f="government">Government</button>
  </div>
  <div class="proj-grid" id="projGrid">
    @php
    $dummyImgs = [
      'government' => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=640&h=400&fit=crop&q=75',
      'api'        => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=640&h=400&fit=crop&q=75',
      'laravel'    => 'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=640&h=400&fit=crop&q=75',
      'php'        => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=640&h=400&fit=crop&q=75',
      'other'      => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=640&h=400&fit=crop&q=75',
    ];
    @endphp
    @foreach($projects as $project)
    <div class="proj-card rv" data-cat="{{ $project->category }}">
      <div class="proj-thumb">
        <img
          src="{{ $project->thumbnail ? Storage::url($project->thumbnail) : ($dummyImgs[$project->category] ?? $dummyImgs['other']) }}"
          alt="{{ $project->title }}" loading="lazy">
        <div class="proj-chrome">
          <div class="traffic" style="background:#ff5f57"></div>
          <div class="traffic" style="background:#ffbd2e"></div>
          <div class="traffic" style="background:#28c840"></div>
          <div class="url-bar"></div>
        </div>
        <div class="proj-overlay">
          @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank" class="proj-ov-btn" title="GitHub"><i class="fab fa-github"></i></a>
          @endif
          @if($project->live_url)
            <a href="{{ $project->live_url }}" target="_blank" class="proj-ov-btn" title="Live Demo"><i class="fas fa-external-link-alt"></i></a>
          @endif
          @if(!$project->github_url && !$project->live_url)
            <span class="proj-ov-btn" style="opacity:.3;cursor:default"><i class="fas fa-lock"></i></span>
          @endif
        </div>
      </div>
      <div class="proj-body">
        <div class="proj-cat">{{ strtoupper($project->category) }}</div>
        <h3 class="proj-name">{{ $project->title }}</h3>
        <p class="proj-desc">{{ $project->short_description }}</p>
        <div class="proj-tags">
          @foreach($project->tech_stack as $t)<span class="proj-tag">{{ $t }}</span>@endforeach
        </div>
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

<!-- ═══ CONTACT ═══ -->
<section id="contact" class="section" style="background:var(--bg1)">
<div class="sec-in">
  <div class="rv">
    <div class="sec-label">Get In Touch</div>
    <h2 class="sec-title">Contact <em>Me</em></h2>
  </div>
  <div class="contact-grid">
    <div class="rv">
      <p class="contact-intro">Have a project, opportunity, or just want to connect? I'm always open to new challenges and collaborations.</p>
      <div class="contact-item">
        <div class="contact-ico"><i class="fas fa-envelope"></i></div>
        <div><div class="contact-lbl">EMAIL</div><div class="contact-val"><a href="mailto:vikashkumarbth381@gmail.com">vikashkumarbth381@gmail.com</a></div></div>
      </div>
      <div class="contact-item">
        <div class="contact-ico"><i class="fas fa-phone"></i></div>
        <div><div class="contact-lbl">PHONE</div><div class="contact-val"><a href="tel:+919523919654">+91 95239 19654</a></div></div>
      </div>
      <div class="contact-item">
        <div class="contact-ico"><i class="fas fa-map-marker-alt"></i></div>
        <div><div class="contact-lbl">LOCATION</div><div class="contact-val">New Delhi, India 🇮🇳</div></div>
      </div>
      <div class="contact-item">
        <div class="contact-ico"><i class="fab fa-linkedin-in"></i></div>
        <div><div class="contact-lbl">LINKEDIN</div><div class="contact-val"><a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank">vikash-kumar-computer-science</a></div></div>
      </div>
    </div>
    <div class="rv d1">
      <form id="contactForm">
        @csrf
        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="fname">YOUR NAME</label>
            <input class="form-input" type="text" id="fname" name="name" placeholder="John Doe" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="femail">EMAIL ADDRESS</label>
            <input class="form-input" type="email" id="femail" name="email" placeholder="john@company.com" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label" for="fsubj">SUBJECT</label>
          <input class="form-input" type="text" id="fsubj" name="subject" placeholder="Laravel Developer Opportunity" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="fmsg">MESSAGE</label>
          <textarea class="form-input" id="fmsg" name="message" placeholder="Hi Vikash, I'd like to discuss..." required></textarea>
        </div>
        <button type="submit" class="form-submit" id="submitBtn">
          <i class="fas fa-paper-plane"></i> SEND MESSAGE
        </button>
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
      <a href="#about">About</a>
      <a href="#skills">Skills</a>
      <a href="#experience">Experience</a>
      <a href="#projects">Projects</a>
      <a href="#contact">Contact</a>
    </nav>
    <div class="footer-socials">
      <a href="https://github.com/Vikashgupta95239" target="_blank" class="footer-soc"><i class="fab fa-github"></i></a>
      <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" class="footer-soc"><i class="fab fa-linkedin-in"></i></a>
      <a href="mailto:vikashkumarbth381@gmail.com" class="footer-soc"><i class="fas fa-envelope"></i></a>
    </div>
    <p class="footer-copy">
      © {{ date('Y') }} Vikash Kumar &nbsp;·&nbsp; Built with Laravel 12 &amp; ❤️ &nbsp;·&nbsp;
      <a href="/admin">Admin Panel</a>
    </p>
  </div>
</footer>

<!-- Toast -->
<div class="toast" id="toast">
  <i class="fas fa-check-circle"></i>
  <span id="toastMsg"></span>
</div>

<script>
/* ─────────────────────────────────────
   LOADER
───────────────────────────────────── */
window.addEventListener('load', () =>
  setTimeout(() => document.getElementById('loader').classList.add('out'), 2400)
);

/* ─────────────────────────────────────
   NAVIGATION
───────────────────────────────────── */
const nav = document.getElementById('nav');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 60), {passive:true});

document.getElementById('burger').addEventListener('click', () =>
  document.getElementById('navMenu').classList.toggle('open')
);

// Active link on scroll
window.addEventListener('scroll', () => {
  let cur = '';
  document.querySelectorAll('section[id]').forEach(s => {
    if (scrollY >= s.offsetTop - 280) cur = s.id;
  });
  document.querySelectorAll('.navl').forEach(a =>
    a.classList.toggle('active', a.getAttribute('href') === '#' + cur)
  );
}, {passive:true});

/* ─────────────────────────────────────
   TYPEWRITER
───────────────────────────────────── */
const roles = ['Laravel Developer','PHP Developer','Backend Engineer','API Architect','CMS Specialist'];
let ri = 0, ci = 0, deleting = false;
const tw = document.getElementById('tw');
function type() {
  const word = roles[ri];
  if (!deleting) {
    tw.textContent = word.slice(0, ++ci);
    if (ci === word.length) { deleting = true; setTimeout(type, 2000); return; }
  } else {
    tw.textContent = word.slice(0, --ci);
    if (ci === 0) { deleting = false; ri = (ri + 1) % roles.length; }
  }
  setTimeout(type, deleting ? 45 : 110);
}
setTimeout(type, 1800);

/* ─────────────────────────────────────
   REVEAL ON SCROLL
───────────────────────────────────── */
function revealEl(el) {
  el.classList.add('in');
  // Skill bars
  el.querySelectorAll('.sk-fill[data-w]').forEach(b => { b.style.width = b.dataset.w + '%'; });
  // Counters
  el.querySelectorAll('.astat-n[data-t]').forEach(n => {
    if (n.dataset.done) return; n.dataset.done = '1';
    const target = parseInt(n.dataset.t), suffix = n.dataset.s || '';
    let count = 0;
    const timer = setInterval(() => {
      count = Math.min(count + target / 55, target);
      n.textContent = Math.floor(count) + suffix;
      if (count >= target) clearInterval(timer);
    }, 22);
  });
}

// IntersectionObserver (primary)
if ('IntersectionObserver' in window) {
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) revealEl(e.target); });
  }, { threshold: 0, rootMargin: '0px 0px -30px 0px' });
  document.querySelectorAll('.rv').forEach(el => obs.observe(el));
}

// Scroll fallback
window.addEventListener('scroll', () => {
  document.querySelectorAll('.rv:not(.in)').forEach(el => {
    const r = el.getBoundingClientRect();
    if (r.top < window.innerHeight + 10) revealEl(el);
  });
}, {passive:true});

// Safety timeout
setTimeout(() => document.querySelectorAll('.rv:not(.in)').forEach(revealEl), 2800);

/* ─────────────────────────────────────
   PROJECT FILTER
───────────────────────────────────── */
document.querySelectorAll('.pfbtn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.pfbtn').forEach(b => b.classList.remove('on'));
    btn.classList.add('on');
    const f = btn.dataset.f;
    document.querySelectorAll('.proj-card').forEach(c => {
      c.style.display = (f === 'all' || c.dataset.cat === f) ? '' : 'none';
    });
  });
});

/* ─────────────────────────────────────
   CONTACT FORM
───────────────────────────────────── */
document.getElementById('contactForm').addEventListener('submit', async e => {
  e.preventDefault();
  const btn = document.getElementById('submitBtn');
  btn.disabled = true;
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
  try {
    const res = await fetch('{{ route("contact.send") }}', {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
      body: new FormData(e.target)
    });
    const data = await res.json();
    showToast(data.message, data.success ? 'ok' : 'err');
    if (data.success) e.target.reset();
  } catch {
    showToast('Something went wrong. Please try again.', 'err');
  } finally {
    btn.disabled = false;
    btn.innerHTML = '<i class="fas fa-paper-plane"></i> SEND MESSAGE';
  }
});

function showToast(msg, type) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.className = 'toast' + (type === 'err' ? ' error' : '');
  t.querySelector('i').className = 'fas fa-' + (type === 'err' ? 'exclamation-circle' : 'check-circle');
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 5000);
}

/* ─────────────────────────────────────
   SMOOTH SCROLL
───────────────────────────────────── */
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

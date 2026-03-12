<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vikash Kumar — Laravel Developer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
/* ══════════════════════════════
   DESIGN TOKENS
══════════════════════════════ */
:root{
  /* navy palette */
  --n0:#02060E; --n1:#050C1C; --n2:#071228; --n3:#0B1834;
  --n4:#101F3E; --n5:#162548;

  /* gold palette */
  --g1:#C4A245; --g2:#D9BA6A; --g3:#EDD490;
  --gf:rgba(196,162,69,.07);
  --gb:rgba(196,162,69,.2);
  --gg:rgba(196,162,69,.16);

  /* text */
  --w: #F4F1E8; --w2:#CBC5B4; --w3:#8590A8; --w4:#3E4A68;

  /* util */
  --brd:rgba(244,241,232,.055);
  --grn:#3DB877; --red:#E05252;

  /* fonts */
  --serif:'Cormorant Garamond',Georgia,serif;
  --sans:'Plus Jakarta Sans',-apple-system,sans-serif;
  --mono:'JetBrains Mono',monospace;

  /* easing */
  --e1:cubic-bezier(.4,0,.2,1);
  --e2:cubic-bezier(.19,1,.22,1);
  --e3:cubic-bezier(.175,.885,.32,1.275);

  /* spacing — fluid */
  --gutter:clamp(18px,5vw,72px);
  --py:clamp(64px,9vw,128px);
}

/* ══════════════════════════════
   RESET
══════════════════════════════ */
*,::before,::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;scrollbar-width:thin;scrollbar-color:var(--g1) var(--n0)}
::-webkit-scrollbar{width:2px}
::-webkit-scrollbar-thumb{background:linear-gradient(var(--g1),var(--g2))}
body{background:var(--n0);color:var(--w);font-family:var(--sans);overflow-x:hidden;line-height:1.7;cursor:none}
img{display:block;width:100%;object-fit:cover}
a,button{cursor:none}
@media(hover:none){
  body,a,button{cursor:auto}
  #csr,#csr2{display:none!important}
}

/* ══════════════════════════════
   CURSOR
══════════════════════════════ */
#csr{position:fixed;width:7px;height:7px;background:var(--g2);border-radius:50%;pointer-events:none;z-index:99999;transform:translate(-50%,-50%);transition:width .2s,height .2s;mix-blend-mode:screen}
#csr2{position:fixed;width:30px;height:30px;border:1px solid rgba(196,162,69,.38);border-radius:50%;pointer-events:none;z-index:99998;transform:translate(-50%,-50%)}
body:has(a:hover) #csr,body:has(button:hover) #csr{width:16px;height:16px}

/* ══════════════════════════════
   LOADER
══════════════════════════════ */
#ldr{position:fixed;inset:0;z-index:9000;background:var(--n0);display:flex;flex-direction:column;align-items:center;justify-content:center;transition:opacity .8s var(--e1),visibility .8s}
#ldr.out{opacity:0;visibility:hidden;pointer-events:none}
.ldr-mark{font-family:var(--serif);font-weight:700;font-size:clamp(5rem,15vw,11rem);line-height:.85;letter-spacing:-3px;background:linear-gradient(135deg,var(--g1),var(--g3) 40%,var(--g1) 70%,var(--g2));background-size:220%;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmer 3s linear infinite}
.ldr-sub{font-family:var(--mono);font-size:clamp(.52rem,.75vw,.64rem);letter-spacing:6px;color:var(--w3);margin-top:16px;animation:rUp .5s .3s both}
.ldr-bar{width:130px;height:1px;background:rgba(196,162,69,.1);margin-top:28px;overflow:hidden}
.ldr-prog{height:100%;background:linear-gradient(90deg,transparent,var(--g1),transparent);animation:sweep 2.6s var(--e1) forwards}
@keyframes shimmer{to{background-position:220% 50%}}
@keyframes sweep{from{width:0;margin-left:0}to{width:100%;margin-left:0}}
@keyframes rUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:none}}
@keyframes fIn{from{opacity:0}to{opacity:1}}

/* ══════════════════════════════
   NAVIGATION  (fully rebuilt)
══════════════════════════════ */
#nav{
  position:fixed;top:0;left:0;right:0;z-index:700;
  transition:all .45s var(--e1);
}
.nav-bar{
  max-width:1440px;margin:0 auto;
  padding:0 var(--gutter);
  height:78px;
  display:flex;align-items:center;justify-content:space-between;
  gap:24px;
  transition:height .4s var(--e1);
}
/* scrolled */
#nav.on .nav-bar{
  height:62px;
  background:rgba(2,6,14,.9);
  backdrop-filter:blur(28px);-webkit-backdrop-filter:blur(28px);
  border-bottom:1px solid var(--brd);
  box-shadow:0 2px 32px rgba(0,0,0,.5);
}

/* — Logo — */
.logo{
  font-family:var(--serif);font-weight:700;font-style:italic;
  font-size:1.9rem;letter-spacing:-.5px;
  text-decoration:none;line-height:1;
  background:linear-gradient(135deg,var(--g1),var(--g3) 55%,var(--g2));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  position:relative;flex-shrink:0;
}
.logo::after{
  content:'';position:absolute;left:0;bottom:-2px;
  width:0;height:1px;
  background:linear-gradient(90deg,var(--g1),transparent);
  transition:width .35s var(--e1);
}
.logo:hover::after{width:100%}

/* — Desktop links — */
.nav-links{
  list-style:none;display:flex;align-items:center;
  gap:clamp(1.2rem,2.8vw,2.4rem);
  margin:0 auto; /* center between logo and CTA */
}
.nav-links a{
  position:relative;
  font-family:var(--mono);font-size:.67rem;
  letter-spacing:1.5px;text-transform:uppercase;
  color:var(--w3);text-decoration:none;
  padding-bottom:3px;
  transition:color .25s;
  display:flex;flex-direction:column;align-items:center;
}
.nav-links a .n-idx{
  font-size:.48rem;color:var(--g1);
  letter-spacing:1px;line-height:1;
  margin-bottom:2px;display:block;
  transition:color .25s;
}
.nav-links a::after{
  content:'';position:absolute;bottom:0;left:0;
  width:0;height:1px;background:var(--g1);
  transition:width .3s var(--e1);
}
.nav-links a:hover{color:var(--w)}
.nav-links a:hover::after,.nav-links a.act::after{width:100%}
.nav-links a.act{color:var(--g2)}
.nav-links a.act .n-idx{color:var(--g2)}

/* — CTA — */
.nav-cta{
  flex-shrink:0;
  display:inline-flex;align-items:center;gap:8px;
  padding:9px 22px;
  border:1px solid var(--gb);
  background:var(--gf);
  font-family:var(--mono);font-size:.65rem;
  letter-spacing:1.5px;text-transform:uppercase;
  color:var(--g1);text-decoration:none;
  position:relative;overflow:hidden;
  transition:color .3s,box-shadow .3s;
}
.nav-cta::before{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,var(--g1),var(--g2));
  transform:translateX(-102%);
  transition:transform .36s var(--e1);
}
.nav-cta:hover::before{transform:translateX(0)}
.nav-cta:hover{color:var(--n0);box-shadow:0 0 28px var(--gg)}
.nav-cta-t{position:relative;z-index:1;display:flex;align-items:center;gap:8px}

/* — Hamburger icon — */
.nav-ham{
  display:none;
  flex-direction:column;justify-content:center;gap:6px;
  width:42px;height:42px;padding:6px;
  background:none;border:1px solid var(--brd);
  flex-shrink:0;transition:border-color .3s;
}
.nav-ham:hover{border-color:var(--gb)}
.nav-ham span{
  display:block;width:100%;height:1.5px;
  background:var(--w);
  transition:transform .35s var(--e1),opacity .35s;
  transform-origin:center;
}
.nav-ham.open span:nth-child(1){transform:translateY(7.5px) rotate(45deg)}
.nav-ham.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.nav-ham.open span:nth-child(3){transform:translateY(-7.5px) rotate(-45deg)}

/* — Full-screen mobile drawer — */
#drawer{
  position:fixed;inset:0;z-index:690;
  background:rgba(2,6,14,.97);
  backdrop-filter:blur(36px);-webkit-backdrop-filter:blur(36px);
  display:flex;flex-direction:column;
  padding:0 var(--gutter) clamp(28px,5vw,48px);
  transform:translateX(100%);
  transition:transform .48s var(--e2);
  overflow-y:auto;
}
#drawer.open{transform:translateX(0)}

.drw-head{
  height:78px;display:flex;align-items:center;
  justify-content:space-between;
  border-bottom:1px solid var(--brd);
  flex-shrink:0;
}
.drw-logo{
  font-family:var(--serif);font-weight:700;font-style:italic;
  font-size:1.7rem;
  background:linear-gradient(135deg,var(--g1),var(--g3));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
}
.drw-close{
  width:40px;height:40px;border:1px solid var(--brd);
  background:none;display:flex;align-items:center;
  justify-content:center;color:var(--w3);font-size:1rem;
  transition:all .25s;
}
.drw-close:hover{border-color:var(--gb);color:var(--g2)}

.drw-nav{list-style:none;padding:clamp(24px,4vw,40px) 0;flex:1}
.drw-nav li{
  border-bottom:1px solid var(--brd);
  opacity:0;transform:translateX(24px);
  transition:opacity .4s var(--e1),transform .4s var(--e1);
}
#drawer.open .drw-nav li:nth-child(1){opacity:1;transform:none;transition-delay:.08s}
#drawer.open .drw-nav li:nth-child(2){opacity:1;transform:none;transition-delay:.14s}
#drawer.open .drw-nav li:nth-child(3){opacity:1;transform:none;transition-delay:.2s}
#drawer.open .drw-nav li:nth-child(4){opacity:1;transform:none;transition-delay:.26s}
#drawer.open .drw-nav li:nth-child(5){opacity:1;transform:none;transition-delay:.32s}
.drw-nav a{
  display:flex;justify-content:space-between;align-items:center;
  padding:clamp(16px,3vw,22px) 0;
  text-decoration:none;
  transition:padding-left .25s;
}
.drw-nav a:hover{padding-left:10px}
.drw-n-title{
  font-family:var(--serif);font-weight:700;font-style:italic;
  font-size:clamp(1.7rem,6vw,2.8rem);color:var(--w3);
  line-height:1;transition:color .25s;
}
.drw-nav a:hover .drw-n-title{color:var(--w)}
.drw-n-num{
  font-family:var(--mono);font-size:.6rem;
  color:var(--g1);letter-spacing:2px;
}

.drw-foot{
  border-top:1px solid var(--brd);
  padding-top:clamp(20px,3.5vw,32px);
  display:flex;flex-direction:column;gap:18px;
}
.drw-socials{display:flex;gap:10px}
.drw-soc{
  width:40px;height:40px;border:1px solid var(--brd);
  display:flex;align-items:center;justify-content:center;
  color:var(--w3);text-decoration:none;font-size:.88rem;
  transition:all .3s;
}
.drw-soc:hover{border-color:var(--gb);color:var(--g2);background:var(--gf)}
.drw-cta{
  display:flex;align-items:center;justify-content:center;gap:8px;
  padding:15px;text-decoration:none;
  background:linear-gradient(135deg,var(--g1),var(--g2));
  color:var(--n0);font-family:var(--sans);font-weight:700;font-size:.9rem;
  animation:shimmer 4s linear infinite;background-size:220%;
}

/* ══════════════════════════════
   HERO
══════════════════════════════ */
#hero{
  min-height:100svh;position:relative;
  display:flex;align-items:center;
  overflow:hidden;background:var(--n0);
}
/* background layers */
.hbg{position:absolute;inset:0;overflow:hidden;z-index:0;pointer-events:none}
.orb{position:absolute;border-radius:50%;filter:blur(110px)}
.orb1{width:min(850px,130vw);aspect-ratio:1;top:-25%;right:-18%;background:radial-gradient(circle,rgba(196,162,69,.09),transparent 68%);animation:obf 20s ease-in-out infinite alternate}
.orb2{width:min(550px,90vw);aspect-ratio:1;bottom:-22%;left:-8%;background:radial-gradient(circle,rgba(74,158,219,.04),transparent 68%);animation:obf 16s ease-in-out infinite alternate-reverse}
@keyframes obf{0%{transform:translate(0,0)}100%{transform:translate(35px,42px)}}
.hgrid{position:absolute;inset:0;background-image:linear-gradient(rgba(196,162,69,.024) 1px,transparent 1px),linear-gradient(90deg,rgba(196,162,69,.024) 1px,transparent 1px);background-size:68px 68px}
.hslash{position:absolute;top:0;width:1px;height:100%;background:linear-gradient(transparent,rgba(196,162,69,.08),transparent)}
.hs1{right:22%;transform:skewX(-12deg)}
.hs2{right:36%;transform:skewX(-12deg);opacity:.35}

/* hero layout */
.hero-wrap{
  position:relative;z-index:2;
  width:100%;max-width:1440px;margin:0 auto;
  padding:calc(78px + clamp(36px,6vw,72px)) var(--gutter) clamp(40px,6vw,72px);
  display:grid;
  grid-template-columns:1fr minmax(0,min(400px,36vw));
  gap:clamp(40px,6vw,96px);
  align-items:center;
  min-height:100svh;
}

/* eyebrow pill */
.eyebrow{
  display:inline-flex;align-items:center;gap:10px;
  border:1px solid var(--gb);background:var(--gf);
  padding:6px 16px;margin-bottom:clamp(16px,2.8vw,28px);
  font-family:var(--mono);font-size:clamp(.52rem,.72vw,.63rem);
  color:var(--g2);letter-spacing:2.5px;text-transform:uppercase;
  opacity:0;animation:rUp .6s .2s both;
}
.pdot{
  width:7px;height:7px;border-radius:50%;
  background:var(--grn);flex-shrink:0;
  box-shadow:0 0 0 3px rgba(61,184,119,.2);
  animation:pulse 2s ease-in-out infinite;
}
@keyframes pulse{0%,100%{transform:scale(1)}50%{transform:scale(1.45)}}

/* big name */
h1.hname{
  font-family:var(--serif);font-weight:700;
  font-size:clamp(3.6rem,10.5vw,11.5rem);
  line-height:.8;
  letter-spacing:clamp(-2px,-4px,-5px);
  margin-bottom:clamp(14px,2.2vw,22px);
  opacity:0;animation:rUp .9s .34s both;
}
.hname .n1{display:block;color:var(--w)}
.hname .n2{
  display:block;font-style:italic;
  background:linear-gradient(110deg,var(--g1) 0%,var(--g3) 30%,var(--g2) 60%,var(--g1) 100%);
  background-size:220%;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  animation:shimmer 5s linear infinite;
}

/* typewriter role */
.role-row{
  display:flex;align-items:center;gap:13px;
  margin-bottom:clamp(16px,2.5vw,26px);
  opacity:0;animation:rUp .6s .52s both;
}
.role-pipe{
  width:3px;height:clamp(20px,2.8vw,28px);
  background:linear-gradient(var(--g1),var(--g2));
  border-radius:2px;flex-shrink:0;
}
.role-txt{
  font-family:var(--mono);font-size:clamp(.76rem,1.15vw,.98rem);
  color:var(--g2);display:flex;align-items:center;gap:4px;
}
.rcur{animation:blink .75s step-end infinite;color:var(--g1)}
@keyframes blink{0%,100%{opacity:1}50%{opacity:0}}

/* bio paragraph */
.hbio{
  font-family:var(--sans);font-size:clamp(.86rem,1.1vw,1.03rem);
  font-weight:400;color:var(--w3);line-height:1.9;
  max-width:520px;margin-bottom:clamp(22px,3.5vw,36px);
  opacity:0;animation:rUp .6s .68s both;
}
.hbio strong{color:var(--w2);font-weight:600}

/* stat bar */
.hstats{
  display:flex;flex-wrap:wrap;
  margin-bottom:clamp(22px,3.5vw,38px);
  opacity:0;animation:rUp .6s .8s both;
}
.hst{
  padding:clamp(9px,1.6vw,16px) clamp(14px,2.2vw,30px);
  border:1px solid var(--brd);border-left:none;
  text-align:center;transition:all .3s;
  position:relative;min-width:72px;flex:1;
}
.hst:first-child{border-left:1px solid var(--brd)}
.hst::after{content:'';position:absolute;bottom:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--g1),transparent);transform:scaleX(0);transition:transform .4s var(--e1)}
.hst:hover::after{transform:scaleX(1)}.hst:hover{background:var(--gf)}
.hst-n{
  font-family:var(--serif);font-size:clamp(1.7rem,3.5vw,2.7rem);
  font-weight:700;line-height:1;
  background:linear-gradient(135deg,var(--g1),var(--g3));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
}
.hst-l{
  font-family:var(--mono);
  font-size:clamp(.44rem,.6vw,.56rem);
  color:var(--w4);letter-spacing:2px;
  margin-top:5px;text-transform:uppercase;
}

/* CTA buttons */
.hbtns{
  display:flex;flex-wrap:wrap;gap:clamp(8px,1.2vw,12px);
  margin-bottom:clamp(22px,3.5vw,36px);
  opacity:0;animation:rUp .6s .9s both;
}
.btn-primary{
  display:inline-flex;align-items:center;gap:8px;
  padding:clamp(11px,1.4vw,15px) clamp(20px,2.8vw,32px);
  background:linear-gradient(135deg,var(--g1),var(--g2) 50%,var(--g1));
  background-size:220%;color:var(--n0);
  font-family:var(--sans);font-weight:700;font-size:clamp(.78rem,.98vw,.9rem);
  text-decoration:none;border:none;
  transition:transform .3s,box-shadow .3s;
  animation:shimmer 5s linear infinite;
}
.btn-primary:hover{transform:translateY(-3px);box-shadow:0 14px 36px rgba(196,162,69,.3)}
.btn-sec{
  display:inline-flex;align-items:center;gap:8px;
  padding:clamp(10px,1.4vw,14px) clamp(18px,2.8vw,28px);
  background:transparent;border:1px solid var(--gb);
  color:var(--g2);font-family:var(--sans);font-weight:500;
  font-size:clamp(.78rem,.98vw,.9rem);text-decoration:none;
  transition:all .3s;
}
.btn-sec:hover{background:var(--gf);border-color:var(--g1);color:var(--g1);transform:translateY(-3px)}
.btn-ghost{
  display:inline-flex;align-items:center;gap:8px;
  padding:clamp(10px,1.4vw,14px) clamp(16px,2.5vw,24px);
  background:transparent;border:1px solid var(--brd);
  color:var(--w3);font-family:var(--sans);
  font-size:clamp(.78rem,.98vw,.9rem);text-decoration:none;
  transition:all .3s;
}
.btn-ghost:hover{border-color:rgba(244,241,232,.2);color:var(--w);transform:translateY(-3px)}

/* social row */
.hsoc{
  display:flex;align-items:center;flex-wrap:wrap;gap:0;
  opacity:0;animation:rUp .6s 1s both;
}
.hsoc-lbl{
  font-family:var(--mono);font-size:.52rem;color:var(--w4);
  letter-spacing:3px;text-transform:uppercase;margin-right:14px;
}
.soca{
  width:40px;height:40px;border:1px solid var(--brd);border-left:none;
  display:flex;align-items:center;justify-content:center;
  color:var(--w3);text-decoration:none;font-size:.86rem;
  transition:all .3s;
}
.soca:first-of-type{border-left:1px solid var(--brd)}
.soca:hover{background:var(--gf);color:var(--g2);border-color:var(--gb)}

/* avatar column */
.hav{
  display:flex;align-items:center;justify-content:center;
  opacity:0;animation:fIn 1.2s 1.3s both;
}
.av-shell{
  position:relative;
  width:clamp(200px,30vw,380px);
  aspect-ratio:1;
}
.av-r1{position:absolute;inset:-38px;border-radius:50%;border:1px solid rgba(196,162,69,.1);animation:spin 28s linear infinite}
.av-r1::before{content:'';position:absolute;width:11px;height:11px;border-radius:50%;background:var(--g1);top:50%;left:-5.5px;transform:translateY(-50%);box-shadow:0 0 14px 4px rgba(196,162,69,.5)}
.av-r1::after{content:'';position:absolute;width:7px;height:7px;border-radius:50%;background:var(--g2);bottom:10%;right:-3.5px;box-shadow:0 0 10px 3px rgba(196,162,69,.4)}
.av-r2{position:absolute;inset:-13px;border-radius:50%;border:1px dashed rgba(196,162,69,.1);animation:spin 18s linear infinite reverse}
@keyframes spin{to{transform:rotate(360deg)}}
.av-frame{
  position:absolute;inset:0;border-radius:50%;padding:3px;
  background:linear-gradient(135deg,var(--g1),var(--g3) 28%,rgba(196,162,69,.28) 58%,var(--g2));
  box-shadow:0 0 55px rgba(196,162,69,.22),0 0 120px rgba(196,162,69,.09);
  animation:glow 5s ease-in-out infinite;
}
@keyframes glow{0%,100%{box-shadow:0 0 50px rgba(196,162,69,.2),0 0 110px rgba(196,162,69,.07)}50%{box-shadow:0 0 78px rgba(196,162,69,.4),0 0 155px rgba(196,162,69,.16)}}
.av-inner{width:100%;height:100%;border-radius:50%;overflow:hidden;background:var(--n2);display:flex;align-items:center;justify-content:center}
.av-mono{
  font-family:var(--serif);font-style:italic;font-weight:700;
  font-size:clamp(3.5rem,9vw,7rem);
  background:linear-gradient(135deg,var(--g1),var(--g3));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
}
.av-badge{
  position:absolute;bottom:-13px;left:50%;transform:translateX(-50%);white-space:nowrap;
  background:linear-gradient(135deg,var(--n1),var(--n2));
  border:1px solid var(--gb);
  padding:8px 20px;
  font-family:var(--mono);font-size:clamp(.5rem,.72vw,.62rem);
  color:var(--g2);letter-spacing:2px;text-transform:uppercase;
  display:flex;align-items:center;gap:9px;
  box-shadow:0 6px 24px rgba(0,0,0,.5);
}
.av-chip{
  position:absolute;white-space:nowrap;
  background:rgba(2,6,14,.94);border:1px solid var(--brd);
  backdrop-filter:blur(14px);
  padding:8px 13px;
  font-family:var(--mono);font-size:.61rem;color:var(--w);
  display:flex;align-items:center;gap:7px;
  box-shadow:0 5px 24px rgba(0,0,0,.5);
  transition:border-color .3s;
}
.av-chip:hover{border-color:var(--gb)}
.cdot{width:7px;height:7px;border-radius:50%;flex-shrink:0}
.chip1{top:5%;right:-26%;animation:fl 4s ease-in-out infinite}
.chip2{bottom:13%;right:-24%;animation:fl 4s 1.3s ease-in-out infinite}
.chip3{top:38%;left:-30%;animation:fl 4s .7s ease-in-out infinite}
@keyframes fl{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}

/* scroll cue */
.scrl{
  position:absolute;bottom:clamp(18px,3.5vw,36px);
  left:50%;transform:translateX(-50%);
  display:flex;flex-direction:column;align-items:center;gap:7px;
  z-index:2;opacity:0;animation:fIn 1s 3s both;
}
.scrl span{font-family:var(--mono);font-size:.5rem;color:var(--w4);letter-spacing:4px;text-transform:uppercase}
.scrl-ln{width:1px;height:44px;overflow:hidden;position:relative}
.scrl-ln::after{content:'';position:absolute;top:-100%;left:0;width:100%;height:100%;background:linear-gradient(transparent,var(--g1),transparent);animation:drp 2.3s ease-in-out infinite}
@keyframes drp{0%{top:-100%}100%{top:200%}}

/* ══════════════════════════════
   SHARED SECTION STYLES
══════════════════════════════ */
.sec{padding:var(--py) var(--gutter)}
.sec-in{max-width:1440px;margin:0 auto}

/* eyebrow label */
.tag{
  font-family:var(--mono);font-size:clamp(.52rem,.68vw,.62rem);
  color:var(--g2);letter-spacing:4px;text-transform:uppercase;
  display:flex;align-items:center;gap:12px;margin-bottom:10px;
}
.tag::before{content:'';width:22px;height:1px;background:linear-gradient(90deg,var(--g1),transparent)}

/* section headline */
.sh{
  font-family:var(--serif);font-weight:700;
  font-size:clamp(2rem,5.5vw,5.2rem);
  line-height:.86;letter-spacing:clamp(-1px,-2.5px,-3px);
  color:var(--w);margin-bottom:clamp(32px,5vw,64px);
}
.sh em{
  font-style:italic;
  background:linear-gradient(110deg,var(--g1),var(--g3));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
}

/* reveal animation */
.rv{opacity:0;transform:translateY(24px);transition:opacity .7s var(--e1),transform .7s var(--e1)}
.rv.in{opacity:1!important;transform:none!important}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}
.d4{transition-delay:.32s}.d5{transition-delay:.4s}

/* ══════════════════════════════
   ABOUT
══════════════════════════════ */
#about{background:var(--n1);position:relative;overflow:hidden}
#about::before{content:'';position:absolute;inset:0;pointer-events:none;background:radial-gradient(ellipse 55% 45% at 85% 50%,rgba(196,162,69,.035),transparent 70%)}

.about-grid{
  display:grid;
  grid-template-columns:clamp(260px,28vw,390px) 1fr;
  gap:clamp(28px,5vw,68px);
  align-items:start;
}

/* left info column */
.info-col{display:flex;flex-direction:column;gap:10px}

.pcard{
  background:var(--n2);border:1px solid var(--brd);
  padding:clamp(18px,2.8vw,30px);position:relative;overflow:hidden;
}
.pcard::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--g1),var(--g3),transparent)}
.pcard-name{
  font-family:var(--serif);font-weight:700;font-style:italic;
  font-size:clamp(1.3rem,2.4vw,1.85rem);
  color:var(--w);line-height:1.1;margin-bottom:5px;
}
.pcard-role{
  font-family:var(--mono);font-size:clamp(.52rem,.68vw,.62rem);
  color:var(--g2);letter-spacing:2.5px;text-transform:uppercase;margin-bottom:16px;
}
.pcards-tags{display:flex;flex-wrap:wrap;gap:6px}
.ptag{
  background:var(--gf);border:1px solid var(--gb);
  color:var(--g2);padding:4px 11px;
  font-family:var(--mono);font-size:clamp(.52rem,.64vw,.6rem);
  letter-spacing:.3px;transition:all .3s;
}
.ptag:hover{background:linear-gradient(135deg,var(--g1),var(--g2));color:var(--n0)}

/* 2x2 number grid */
.num-grid{display:grid;grid-template-columns:1fr 1fr;gap:2px;background:var(--brd)}
.ng{
  background:var(--n2);
  padding:clamp(12px,2vw,20px) clamp(8px,1.5vw,14px);
  text-align:center;transition:background .3s;
  position:relative;cursor:default;overflow:hidden;
}
.ng::after{content:'';position:absolute;bottom:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--g1),transparent);transform:scaleX(0);transition:transform .4s var(--e1)}
.ng:hover{background:var(--n3)}.ng:hover::after{transform:scaleX(1)}
.ng-n{
  font-family:var(--serif);font-weight:700;
  font-size:clamp(1.8rem,3.8vw,2.8rem);line-height:1;
  background:linear-gradient(135deg,var(--g1),var(--g3));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
}
.ng-l{font-family:var(--mono);font-size:clamp(.44rem,.56vw,.54rem);color:var(--w4);letter-spacing:2px;margin-top:4px;text-transform:uppercase}

/* contact strip */
.cstrip{background:var(--n2);border:1px solid var(--brd);overflow:hidden}
.crow{
  display:flex;align-items:center;gap:12px;
  padding:clamp(9px,1.4vw,13px) clamp(12px,1.8vw,17px);
  border-bottom:1px solid var(--brd);
  transition:all .3s;position:relative;
}
.crow:last-child{border-bottom:none}
.crow::before{content:'';position:absolute;left:0;top:0;bottom:0;width:2px;background:linear-gradient(var(--g1),var(--g2));transform:scaleY(0);transition:transform .3s var(--e1)}
.crow:hover{background:var(--n3);padding-left:clamp(16px,2.4vw,22px)}.crow:hover::before{transform:scaleY(1)}
.crow-ico{
  width:32px;height:32px;flex-shrink:0;
  border:1px solid var(--gb);background:var(--gf);
  display:flex;align-items:center;justify-content:center;
  color:var(--g1);font-size:.72rem;transition:all .3s;
}
.crow:hover .crow-ico{background:linear-gradient(135deg,var(--g1),var(--g2));color:var(--n0);border-color:transparent}
.crow-l{font-family:var(--mono);font-size:.51rem;color:var(--w4);letter-spacing:2px;text-transform:uppercase;margin-bottom:1px}
.crow-v{font-family:var(--sans);font-size:clamp(.76rem,.92vw,.84rem);font-weight:400;color:var(--w)}
.crow-v a{color:var(--w);text-decoration:none;transition:color .2s}.crow-v a:hover{color:var(--g2)}

/* right about text */
.about-r .sh{margin-bottom:clamp(12px,2vw,20px)}
.ap{
  font-family:var(--sans);font-size:clamp(.86rem,1.05vw,1rem);
  font-weight:400;color:var(--w3);line-height:1.95;margin-bottom:15px;
}
.ap strong{color:var(--w2);font-weight:600}

/* mini timeline */
.xtl{margin-top:clamp(22px,3.5vw,32px)}
.xtl-h{
  font-family:var(--mono);font-size:clamp(.52rem,.66vw,.6rem);
  color:var(--g2);letter-spacing:3px;text-transform:uppercase;
  display:flex;align-items:center;gap:10px;margin-bottom:15px;
}
.xtl-h::before{content:'';width:14px;height:1px;background:var(--g1)}
.xrow{
  display:grid;grid-template-columns:auto 1fr;
  gap:clamp(10px,1.5vw,14px);align-items:start;
  padding:clamp(9px,1.4vw,13px) 0;border-bottom:1px solid var(--brd);
}
.xrow:last-child{border-bottom:none}
.xdot{width:9px;height:9px;border-radius:50%;border:2px solid rgba(196,162,69,.3);background:transparent;flex-shrink:0;margin-top:5px}
.xdot.live{background:var(--g1);border-color:var(--g1);box-shadow:0 0 9px rgba(196,162,69,.6)}
.xright{}
.xrole{font-family:var(--sans);font-size:clamp(.82rem,.96vw,.92rem);font-weight:600;color:var(--w);margin-bottom:2px}
.xco{font-family:var(--mono);font-size:clamp(.52rem,.65vw,.6rem);color:var(--w3)}
.xyr{font-family:var(--mono);font-size:clamp(.5rem,.63vw,.58rem);color:var(--g2);margin-top:3px}

/* strengths */
.str-head{
  font-family:var(--mono);font-size:clamp(.52rem,.66vw,.6rem);
  color:var(--g2);letter-spacing:3px;text-transform:uppercase;
  display:flex;align-items:center;gap:10px;
  margin:clamp(20px,3vw,30px) 0 13px;
}
.str-head::before{content:'';width:14px;height:1px;background:var(--g1)}
.strtags{display:flex;flex-wrap:wrap;gap:7px}
.strt{
  padding:6px 13px;border:1px solid var(--brd);
  color:var(--w3);font-family:var(--mono);
  font-size:clamp(.52rem,.66vw,.6rem);letter-spacing:.3px;
  transition:all .3s;cursor:default;
}
.strt:hover{border-color:var(--gb);color:var(--g2);background:var(--gf);transform:translateY(-2px)}

/* ══════════════════════════════
   SKILLS
══════════════════════════════ */
#skills{background:var(--n0)}
.sk-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:2px;background:var(--brd);
}
.skc{
  background:var(--n0);
  padding:clamp(18px,2.8vw,28px) clamp(14px,2.2vw,22px);
  position:relative;overflow:hidden;transition:all .4s;
}
.skc::before{
  content:'';position:absolute;top:0;left:0;right:0;height:2px;
  background:linear-gradient(90deg,var(--g1),var(--g3),transparent);
  transform:scaleX(0);transform-origin:left;transition:transform .4s var(--e1);
}
.skc:hover{background:var(--n1);transform:translateY(-4px);box-shadow:0 16px 50px rgba(0,0,0,.5)}
.skc:hover::before{transform:scaleX(1)}
.sk-em{font-size:clamp(1.4rem,2.4vw,1.9rem);margin-bottom:9px}
.sk-cat{
  font-family:var(--mono);font-size:clamp(.5rem,.65vw,.6rem);
  color:var(--g2);letter-spacing:3px;text-transform:uppercase;
  margin-bottom:clamp(12px,2.2vw,20px);
}
.sk-row{margin-bottom:clamp(9px,1.6vw,14px)}
.sk-top{display:flex;justify-content:space-between;margin-bottom:6px}
.sk-nm{font-family:var(--sans);font-size:clamp(.76rem,.92vw,.84rem);font-weight:400;color:var(--w2)}
.sk-pc{font-family:var(--mono);font-size:clamp(.52rem,.64vw,.6rem);color:var(--g1)}
.sk-tr{height:2px;background:rgba(196,162,69,.1);overflow:hidden}
.sk-fl{height:100%;width:0;transition:width 1.6s var(--e2);background:linear-gradient(90deg,var(--g1),var(--g3))}

/* ══════════════════════════════
   EXPERIENCE
══════════════════════════════ */
#experience{background:var(--n1)}
.tl{position:relative;padding-left:clamp(26px,4.5vw,42px)}
.tl::before{content:'';position:absolute;left:7px;top:14px;bottom:14px;width:1px;background:linear-gradient(var(--g1),rgba(196,162,69,.03))}
.tl-e{position:relative;margin-bottom:18px}
.tl-dot{
  position:absolute;
  left:clamp(-26px,-4.5vw,-42px);
  top:12px;width:14px;height:14px;
  border-radius:50%;background:var(--n1);
  border:2px solid rgba(196,162,69,.3);transition:all .3s;
}
.tl-dot.now{background:var(--g1);border-color:var(--g1);box-shadow:0 0 0 4px rgba(196,162,69,.13),0 0 18px rgba(196,162,69,.4)}
.tlb{
  background:var(--n2);border:1px solid var(--brd);
  padding:clamp(16px,2.5vw,26px) clamp(14px,2.8vw,28px);
  position:relative;overflow:hidden;transition:all .4s;
}
.tlb::after{content:'';position:absolute;top:0;left:0;bottom:0;width:2px;background:linear-gradient(var(--g1),var(--g2));transform:scaleY(0);transform-origin:top;transition:transform .4s var(--e1)}
.tlb:hover{border-color:var(--gb);box-shadow:0 6px 32px rgba(0,0,0,.4)}.tlb:hover::after{transform:scaleY(1)}
.tl-dt{
  font-family:var(--mono);font-size:clamp(.5rem,.64vw,.59rem);
  color:var(--g2);letter-spacing:2px;text-transform:uppercase;margin-bottom:9px;
}
.tl-head{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:5px}
.tl-role{
  font-family:var(--serif);font-weight:700;font-style:italic;
  font-size:clamp(1.05rem,1.9vw,1.42rem);color:var(--w);
}
.tl-badge{
  background:var(--gf);border:1px solid var(--gb);
  color:var(--g2);font-family:var(--mono);
  font-size:.51rem;padding:3px 9px;letter-spacing:1.5px;text-transform:uppercase;
}
.tl-co{
  font-family:var(--sans);font-size:clamp(.8rem,.95vw,.9rem);
  font-weight:500;color:var(--g2);
  display:flex;align-items:center;gap:7px;margin-bottom:4px;
}
.tl-loc{
  font-family:var(--mono);font-size:clamp(.5rem,.64vw,.59rem);
  color:var(--w3);display:flex;align-items:center;gap:5px;
  margin-bottom:clamp(10px,1.8vw,14px);text-transform:uppercase;letter-spacing:1px;
}
.tl-ul{list-style:none;display:flex;flex-direction:column;gap:6px}
.tl-ul li{
  font-family:var(--sans);font-size:clamp(.8rem,.96vw,.88rem);
  font-weight:400;color:var(--w3);line-height:1.8;
  padding-left:16px;position:relative;
}
.tl-ul li::before{content:'›';position:absolute;left:0;color:var(--g1);font-size:1rem;line-height:1.55}

/* ══════════════════════════════
   EDUCATION
══════════════════════════════ */
#education{background:var(--n2)}
.edu-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:2px;background:var(--brd)}
.educ{
  background:var(--n2);
  padding:clamp(20px,3.2vw,32px) clamp(16px,2.6vw,26px);
  transition:all .4s;position:relative;overflow:hidden;
}
.educ::before{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--g1),var(--g3));transform:scaleX(0);transform-origin:left;transition:transform .5s var(--e1)}
.educ:hover{background:var(--n1);transform:translateY(-4px)}.educ:hover::before{transform:scaleX(1)}
.edu-yr{font-family:var(--mono);font-size:clamp(.5rem,.63vw,.58rem);color:var(--w4);letter-spacing:2.5px;text-transform:uppercase;margin-bottom:14px}
.edu-ico{font-size:clamp(1.7rem,2.8vw,2.3rem);margin-bottom:12px;display:block}
.edu-deg{font-family:var(--serif);font-weight:700;font-style:italic;font-size:clamp(.88rem,1.4vw,1.04rem);color:var(--w);margin-bottom:5px;line-height:1.3}
.edu-sch{font-family:var(--sans);font-size:clamp(.76rem,.9vw,.84rem);font-weight:400;color:var(--g2);margin-bottom:13px}
.edu-score{display:inline-block;background:rgba(196,162,69,.07);border:1px solid var(--gb);color:var(--g2);padding:4px 13px;font-family:var(--mono);font-size:clamp(.52rem,.66vw,.62rem)}

/* ══════════════════════════════
   CERTIFICATIONS
══════════════════════════════ */
#certs{background:var(--n1)}
.cert-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:clamp(9px,1.4vw,13px)}
.certc{
  background:var(--n2);border:1px solid var(--brd);
  padding:clamp(16px,2.5vw,24px);
  display:flex;flex-direction:column;
  transition:all .4s;position:relative;overflow:hidden;
}
.certc::before{content:'';position:absolute;bottom:0;left:0;right:0;height:1px;background:linear-gradient(90deg,var(--g1),var(--g3),transparent);transform:scaleX(0);transform-origin:left;transition:transform .4s var(--e1)}
.certc:hover{border-color:var(--gb);transform:translateY(-4px);box-shadow:0 16px 44px rgba(0,0,0,.5)}.certc:hover::before{transform:scaleX(1)}
.cert-ico{
  width:42px;height:42px;border:1px solid var(--gb);background:var(--gf);
  display:flex;align-items:center;justify-content:center;
  color:var(--g1);font-size:1.1rem;margin-bottom:13px;transition:all .3s;
}
.certc:hover .cert-ico{background:linear-gradient(135deg,var(--g1),var(--g2));color:var(--n0)}
.cert-nm{font-family:var(--sans);font-size:clamp(.82rem,.98vw,.93rem);font-weight:600;color:var(--w);margin-bottom:7px;line-height:1.4;flex:1}
.cert-iss{font-family:var(--sans);font-size:clamp(.72rem,.86vw,.79rem);font-weight:400;color:var(--w3);display:flex;align-items:center;gap:5px;margin-bottom:13px}
.cert-lnk{
  display:inline-flex;align-items:center;gap:5px;
  font-family:var(--mono);font-size:clamp(.52rem,.65vw,.61rem);
  color:var(--g2);text-decoration:none;
  border:1px solid var(--gb);padding:5px 12px;
  background:var(--gf);transition:all .3s;align-self:flex-start;margin-top:auto;
}
.cert-lnk:hover{background:linear-gradient(135deg,var(--g1),var(--g2));color:var(--n0);border-color:transparent}

/* ══════════════════════════════
   PROJECTS
══════════════════════════════ */
#projects{background:var(--n0)}
.proj-hdr{
  display:flex;align-items:flex-end;justify-content:space-between;
  flex-wrap:wrap;gap:18px;margin-bottom:clamp(22px,3.5vw,38px);
}
.pfg{display:flex;gap:7px;flex-wrap:wrap}
.pf{
  background:transparent;border:1px solid var(--brd);
  color:var(--w3);padding:6px 16px;
  font-family:var(--mono);font-size:clamp(.52rem,.66vw,.62rem);
  letter-spacing:.5px;text-transform:uppercase;transition:all .3s;
}
.pf.on,.pf:hover{border-color:var(--gb);color:var(--g2);background:var(--gf)}
.proj-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:clamp(9px,1.4vw,13px)}
.pjc{background:var(--n1);border:1px solid var(--brd);overflow:hidden;transition:all .4s}
.pjc:hover{border-color:var(--gb);transform:translateY(-5px);box-shadow:0 22px 50px rgba(0,0,0,.65),0 0 32px rgba(196,162,69,.04)}
.pj-thumb{height:clamp(140px,15vw,195px);position:relative;overflow:hidden}
.pj-thumb img{height:100%;transition:transform .6s var(--e1),filter .5s;filter:brightness(.6) saturate(.5)}
.pjc:hover .pj-thumb img{transform:scale(1.07);filter:brightness(.78) saturate(.82)}
.pj-bar{position:absolute;top:0;left:0;right:0;height:24px;background:rgba(0,0,0,.65);backdrop-filter:blur(4px);display:flex;align-items:center;gap:5px;padding:0 9px;z-index:2}
.bdc{width:8px;height:8px;border-radius:50%}
.pj-url{flex:1;height:8px;background:rgba(255,255,255,.07);border-radius:2px;margin:0 6px}
.pj-ov{position:absolute;inset:0;z-index:3;background:rgba(2,6,14,.82);display:flex;align-items:center;justify-content:center;gap:11px;opacity:0;transition:opacity .3s;backdrop-filter:blur(4px)}
.pjc:hover .pj-ov{opacity:1}
.povb{width:44px;height:44px;border-radius:50%;border:1.5px solid rgba(196,162,69,.45);display:flex;align-items:center;justify-content:center;color:var(--g2);font-size:.92rem;text-decoration:none;transition:all .3s}
.povb:hover{background:linear-gradient(135deg,var(--g1),var(--g2));border-color:transparent;color:var(--n0);transform:scale(1.12)}
.pj-body{padding:clamp(12px,2vw,18px)}
.pj-cat{font-family:var(--mono);font-size:clamp(.5rem,.63vw,.57rem);color:var(--g2);letter-spacing:2.5px;text-transform:uppercase;margin-bottom:5px}
.pj-title{font-family:var(--serif);font-weight:700;font-style:italic;font-size:clamp(.92rem,1.4vw,1.06rem);color:var(--w);margin-bottom:6px;line-height:1.2}
.pj-desc{font-family:var(--sans);color:var(--w3);font-size:clamp(.74rem,.9vw,.81rem);font-weight:400;line-height:1.75;margin-bottom:10px}
.pj-tags{display:flex;flex-wrap:wrap;gap:4px;margin-bottom:10px}
.pj-tag{background:var(--gf);border:1px solid rgba(196,162,69,.11);color:var(--g2);padding:2px 7px;font-family:var(--mono);font-size:clamp(.49rem,.62vw,.56rem)}
.pj-lks{display:flex;gap:11px}
.pj-lk{font-family:var(--mono);font-size:clamp(.52rem,.66vw,.61rem);color:var(--w3);text-decoration:none;display:flex;align-items:center;gap:4px;transition:color .25s;border-bottom:1px solid transparent;padding-bottom:1px}
.pj-lk:hover{color:var(--g2);border-color:rgba(196,162,69,.3)}

/* ══════════════════════════════
   CONTACT
══════════════════════════════ */
#contact{background:var(--n2);position:relative;overflow:hidden}
#contact::before{content:'';position:absolute;bottom:-260px;right:-160px;width:580px;height:580px;border-radius:50%;background:radial-gradient(circle,rgba(196,162,69,.045),transparent 65%);pointer-events:none}
.ct-grid{
  display:grid;grid-template-columns:1fr 1.55fr;
  gap:clamp(36px,6vw,80px);align-items:start;
}
.ct-p{font-family:var(--sans);color:var(--w3);line-height:1.9;font-size:clamp(.86rem,1.04vw,.98rem);font-weight:400;margin-bottom:clamp(18px,2.8vw,26px)}
.ctrow{display:flex;align-items:flex-start;gap:12px;padding:clamp(9px,1.4vw,13px);border:1px solid transparent;transition:all .3s;margin-bottom:2px}
.ctrow:hover{border-color:var(--brd);background:var(--n3)}
.ct-ico{width:40px;height:40px;border:1px solid var(--gb);background:var(--gf);display:flex;align-items:center;justify-content:center;color:var(--g1);font-size:.84rem;flex-shrink:0;transition:all .3s}
.ctrow:hover .ct-ico{background:linear-gradient(135deg,var(--g1),var(--g2));color:var(--n0);border-color:transparent}
.ct-k{font-family:var(--mono);font-size:clamp(.49rem,.62vw,.57rem);color:var(--w4);letter-spacing:2.5px;text-transform:uppercase;margin-bottom:2px}
.ct-v{font-family:var(--sans);color:var(--w);font-size:clamp(.8rem,.96vw,.88rem);font-weight:400}
.ct-v a{color:var(--w);text-decoration:none;transition:color .2s}.ct-v a:hover{color:var(--g2)}

/* form */
.fg{margin-bottom:11px}
.fl{display:block;font-family:var(--mono);font-size:clamp(.49rem,.62vw,.57rem);color:var(--g2);letter-spacing:2.5px;text-transform:uppercase;margin-bottom:6px}
.fi{
  width:100%;background:var(--n1);border:1px solid var(--brd);
  color:var(--w);padding:clamp(10px,1.5vw,13px) clamp(11px,1.8vw,15px);
  font-family:var(--sans);font-size:clamp(.82rem,.98vw,.91rem);font-weight:400;
  outline:none;transition:all .3s;-webkit-appearance:none;
}
.fi::placeholder{color:rgba(133,144,168,.32)}.fi:focus{border-color:var(--gb);background:var(--n2);box-shadow:0 0 0 3px rgba(196,162,69,.05)}
textarea.fi{min-height:clamp(100px,13vw,130px);resize:vertical}
.frw{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.fsub{
  width:100%;padding:clamp(12px,1.7vw,15px);margin-top:6px;
  background:linear-gradient(135deg,var(--g1),var(--g2) 50%,var(--g1));
  background-size:220%;color:var(--n0);
  font-family:var(--sans);font-weight:700;font-size:clamp(.82rem,.98vw,.9rem);
  letter-spacing:.5px;border:none;
  transition:all .3s;display:flex;align-items:center;justify-content:center;gap:8px;
  animation:shimmer 5s linear infinite;
}
.fsub:hover{transform:translateY(-2px);box-shadow:0 11px 30px rgba(196,162,69,.22)}
.fsub:disabled{opacity:.45;transform:none;box-shadow:none}

/* ══════════════════════════════
   TOAST
══════════════════════════════ */
.toast{
  position:fixed;
  bottom:clamp(12px,2.5vw,22px);right:clamp(12px,2.5vw,22px);
  z-index:9999;background:var(--n2);border:1px solid var(--gb);
  padding:12px 18px;color:var(--w);
  display:flex;align-items:center;gap:9px;
  max-width:min(290px,90vw);
  box-shadow:0 9px 32px rgba(0,0,0,.65);
  transform:translateY(80px);opacity:0;transition:all .4s var(--e1);
  font-family:var(--sans);font-size:.84rem;
}
.toast.show{transform:translateY(0);opacity:1}
.toast.err{border-color:rgba(224,82,82,.38)}
.toast i{color:var(--g1);font-size:.95rem}.toast.err i{color:var(--red)}

/* ══════════════════════════════
   FOOTER
══════════════════════════════ */
footer{background:var(--n1);border-top:1px solid var(--brd);padding:clamp(32px,5.5vw,54px) var(--gutter)}
.foot-in{max-width:1440px;margin:0 auto;display:flex;flex-direction:column;align-items:center;gap:18px}
.foot-logo{
  font-family:var(--serif);font-weight:700;font-style:italic;
  font-size:clamp(1.5rem,2.8vw,2.1rem);
  background:linear-gradient(135deg,var(--g1),var(--g3));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
}
.foot-nav{display:flex;gap:clamp(12px,2.5vw,26px);flex-wrap:wrap;justify-content:center}
.foot-nav a{font-family:var(--mono);font-size:clamp(.52rem,.66vw,.62rem);color:var(--w3);text-decoration:none;letter-spacing:1.5px;text-transform:uppercase;transition:color .2s}
.foot-nav a:hover{color:var(--g2)}
.foot-soc{display:flex;gap:8px}
.fsoc{width:35px;height:35px;border:1px solid var(--brd);display:flex;align-items:center;justify-content:center;color:var(--w3);text-decoration:none;font-size:.84rem;transition:all .3s}
.fsoc:hover{border-color:var(--gb);color:var(--g2);background:var(--gf)}
.foot-copy{font-family:var(--mono);font-size:clamp(.48rem,.62vw,.58rem);color:var(--w4);letter-spacing:.5px;text-align:center}
.foot-copy a{color:var(--g2);text-decoration:none}

/* ══════════════════════════════
   RESPONSIVE  — meticulous
══════════════════════════════ */

/* ≤ 1280 — large tablet / small laptop */
@media(max-width:1280px){
  .sk-grid{grid-template-columns:repeat(2,1fr)}
  .hero-wrap{grid-template-columns:1fr min(340px,40vw)}
}

/* ≤ 1024 — tablet landscape */
@media(max-width:1024px){
  /* nav */
  .nav-links,.nav-cta{display:none!important}
  .nav-ham{display:flex}

  /* hero */
  .hero-wrap{
    grid-template-columns:1fr;
    padding-top:calc(62px + 28px);
    min-height:auto;gap:36px;
  }
  .hav{order:-1}
  .av-shell{width:clamp(180px,46vw,260px)}
  .av-chip{display:none!important}
  .hbio{max-width:100%}

  /* about */
  .about-grid{grid-template-columns:1fr;gap:36px}

  /* grids */
  .edu-grid{grid-template-columns:repeat(2,1fr)}
  .cert-grid{grid-template-columns:repeat(2,1fr)}
  .proj-grid{grid-template-columns:repeat(2,1fr)}

  /* contact */
  .ct-grid{grid-template-columns:1fr;gap:36px}
}

/* ≤ 768 — tablet portrait */
@media(max-width:768px){
  /* hero stats: 2×2 grid */
  .hstats{display:grid;grid-template-columns:1fr 1fr}
  .hst{border-left:1px solid var(--brd)!important;border-top:none}
  .hst:nth-child(n+3){border-top:none}

  /* buttons full-width */
  .hbtns{flex-direction:column}
  .hbtns a{width:100%;justify-content:center}

  /* grids 1-col */
  .sk-grid{grid-template-columns:1fr}
  .edu-grid{grid-template-columns:1fr}
  .cert-grid{grid-template-columns:1fr}
  .proj-grid{grid-template-columns:1fr}
  .frw{grid-template-columns:1fr}

  /* proj header stack */
  .proj-hdr{flex-direction:column;align-items:flex-start}

  /* contact */
  .ct-grid{grid-template-columns:1fr}

  /* hide label on social row */
  .hsoc-lbl{display:none}
}

/* ≤ 480 — large phones */
@media(max-width:480px){
  :root{--gutter:clamp(14px,4.5vw,24px)}
  h1.hname{letter-spacing:-1.5px}
  .hstats{grid-template-columns:1fr 1fr}
  .sh{margin-bottom:clamp(22px,4vw,36px)}
  .num-grid{grid-template-columns:1fr 1fr}
  .ldr-bar{width:100px}
  .xtl-h,.str-head{flex-wrap:wrap}
  .xrow{grid-template-columns:auto 1fr}
}

/* ≤ 360 — small phones */
@media(max-width:360px){
  h1.hname{font-size:clamp(3rem,13vw,4rem)}
  .hstats{grid-template-columns:1fr 1fr}
  .pfg{gap:5px}
}
</style>
</head>
<body>

<!-- CURSOR -->
<div id="csr"></div><div id="csr2"></div>

<!-- LOADER -->
<div id="ldr">
  <div class="ldr-mark">VK.</div>
  <div class="ldr-sub">Laravel Developer &nbsp;·&nbsp; Portfolio 2026</div>
  <div class="ldr-bar"><div class="ldr-prog"></div></div>
</div>

<!-- ════ NAVIGATION ════ -->
<nav id="nav">
  <div class="nav-bar">

    <a href="#hero" class="logo">VK.</a>

    <ul class="nav-links">
      <li><a href="#about"><span class="n-idx">01 /</span>About</a></li>
      <li><a href="#skills"><span class="n-idx">02 /</span>Skills</a></li>
      <li><a href="#experience"><span class="n-idx">03 /</span>Experience</a></li>
      <li><a href="#projects"><span class="n-idx">04 /</span>Projects</a></li>
      <li><a href="#contact"><span class="n-idx">05 /</span>Contact</a></li>
    </ul>

    <a href="#" class="nav-cta">
      <span class="nav-cta-t"><i class="fas fa-download"></i>Resume</span>
    </a>

    <button class="nav-ham" id="ham" aria-label="Open menu">
      <span></span><span></span><span></span>
    </button>

  </div>
</nav>

<!-- ════ MOBILE DRAWER ════ -->
<div id="drawer">
  <div class="drw-head">
    <span class="drw-logo">VK.</span>
    <button class="drw-close" id="drw-close" aria-label="Close menu">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <ul class="drw-nav">
    <li><a href="#about" class="drw-lk"><span class="drw-n-title">About</span><span class="drw-n-num">01</span></a></li>
    <li><a href="#skills" class="drw-lk"><span class="drw-n-title">Skills</span><span class="drw-n-num">02</span></a></li>
    <li><a href="#experience" class="drw-lk"><span class="drw-n-title">Experience</span><span class="drw-n-num">03</span></a></li>
    <li><a href="#projects" class="drw-lk"><span class="drw-n-title">Projects</span><span class="drw-n-num">04</span></a></li>
    <li><a href="#contact" class="drw-lk"><span class="drw-n-title">Contact</span><span class="drw-n-num">05</span></a></li>
  </ul>

  <div class="drw-foot">
    <div class="drw-socials">
      <a href="https://github.com/Vikashgupta95239" target="_blank" class="drw-soc"><i class="fab fa-github"></i></a>
      <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" class="drw-soc"><i class="fab fa-linkedin-in"></i></a>
      <a href="mailto:vikashkumarbth381@gmail.com" class="drw-soc"><i class="fas fa-envelope"></i></a>
      <a href="tel:+919523919654" class="drw-soc"><i class="fas fa-phone"></i></a>
    </div>
    <a href="#" class="drw-cta"><i class="fas fa-download"></i> Download Resume</a>
  </div>
</div>

<!-- ════ HERO ════ -->
<section id="hero">
  <div class="hbg">
    <div class="orb orb1"></div>
    <div class="orb orb2"></div>
    <div class="hgrid"></div>
    <div class="hslash hs1"></div>
    <div class="hslash hs2"></div>
  </div>

  <div class="hero-wrap">
    <!-- LEFT -->
    <div class="hero-l">
      <div class="eyebrow">
        <div class="pdot"></div>
        Open to Full-Time &nbsp;·&nbsp; New Delhi, India
      </div>

      <h1 class="hname">
        <span class="n1">VIKASH</span>
        <span class="n2">KUMAR</span>
      </h1>

      <div class="role-row">
        <div class="role-pipe"></div>
        <div class="role-txt">
          <span id="tw">Laravel Developer</span><span class="rcur">_</span>
        </div>
      </div>

      <p class="hbio">
        Building <strong>scalable web applications</strong> &amp; government-grade
        CMS solutions with clean code, precision, and real-world impact across
        <strong>10+ projects</strong>. Specialized in <strong>REST APIs</strong>,
        Laravel &amp; GIGW compliance.
      </p>

      <div class="hstats">
        <div class="hst"><div class="hst-n">2+</div><div class="hst-l">Years Exp.</div></div>
        <div class="hst"><div class="hst-n">10+</div><div class="hst-l">Projects</div></div>
        <div class="hst"><div class="hst-n">3</div><div class="hst-l">Companies</div></div>
        <div class="hst"><div class="hst-n">6</div><div class="hst-l">Certs</div></div>
      </div>

      <div class="hbtns">
        <a href="#" class="btn-primary"><i class="fas fa-download"></i>Download CV</a>
        <a href="#projects" class="btn-sec"><i class="fas fa-code"></i>View Projects</a>
        <a href="#contact" class="btn-ghost"><i class="fas fa-paper-plane"></i>Hire Me</a>
      </div>

      <div class="hsoc">
        <span class="hsoc-lbl">Connect</span>
        <a href="https://github.com/Vikashgupta95239" target="_blank" class="soca"><i class="fab fa-github"></i></a>
        <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" class="soca"><i class="fab fa-linkedin-in"></i></a>
        <a href="mailto:vikashkumarbth381@gmail.com" class="soca"><i class="fas fa-envelope"></i></a>
        <a href="tel:+919523919654" class="soca"><i class="fas fa-phone"></i></a>
      </div>
    </div>

    <!-- RIGHT — Avatar -->
    <div class="hav">
      <div class="av-shell">
        <div class="av-r1"></div>
        <div class="av-r2"></div>
        <div class="av-frame">
          <div class="av-inner"><div class="av-mono">VK</div></div>
        </div>
        <div class="av-badge"><div class="pdot"></div>Available for Work</div>
        <div class="av-chip chip1"><span class="cdot" style="background:var(--g1)"></span>Laravel 12</div>
        <div class="av-chip chip2"><span class="cdot" style="background:#3DB877"></span>PHP 8.2</div>
        <div class="av-chip chip3"><span class="cdot" style="background:#5aaee8"></span>REST APIs</div>
      </div>
    </div>
  </div>

  <div class="scrl">
    <span>Scroll</span>
    <div class="scrl-ln"></div>
  </div>
</section>

<!-- ════ ABOUT ════ -->
<section id="about" class="sec">
<div class="sec-in">
  <div class="about-grid">

    <!-- left info column -->
    <div class="info-col rv">
      <div class="pcard">
        <div class="pcard-name">Vikash Kumar</div>
        <div class="pcard-role">Laravel · PHP · API Developer</div>
        <div class="pcards-tags">
          <span class="ptag"><i class="fas fa-map-marker-alt"></i> New Delhi</span>
          <span class="ptag"><i class="fas fa-circle" style="font-size:.36rem;color:var(--grn)"></i> Available</span>
          <span class="ptag">B.Tech CSE · 8.33</span>
          <span class="ptag">GIGW Certified</span>
        </div>
      </div>

      <div class="num-grid">
        <div class="ng"><div class="ng-n" data-t="2" data-s="+">0</div><div class="ng-l">Years</div></div>
        <div class="ng"><div class="ng-n" data-t="10" data-s="+">0</div><div class="ng-l">Projects</div></div>
        <div class="ng"><div class="ng-n" data-t="3">0</div><div class="ng-l">Companies</div></div>
        <div class="ng"><div class="ng-n" data-t="6">0</div><div class="ng-l">Certs</div></div>
      </div>

      <div class="cstrip">
        <div class="crow"><div class="crow-ico"><i class="fas fa-envelope"></i></div><div><div class="crow-l">Email</div><div class="crow-v"><a href="mailto:vikashkumarbth381@gmail.com">vikashkumarbth381@gmail.com</a></div></div></div>
        <div class="crow"><div class="crow-ico"><i class="fas fa-phone"></i></div><div><div class="crow-l">Phone</div><div class="crow-v"><a href="tel:+919523919654">+91 95239 19654</a></div></div></div>
        <div class="crow"><div class="crow-ico"><i class="fab fa-github"></i></div><div><div class="crow-l">GitHub</div><div class="crow-v"><a href="https://github.com/Vikashgupta95239" target="_blank">Vikashgupta95239</a></div></div></div>
        <div class="crow"><div class="crow-ico"><i class="fab fa-linkedin-in"></i></div><div><div class="crow-l">LinkedIn</div><div class="crow-v"><a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank">vikash-kumar-cs</a></div></div></div>
      </div>
    </div>

    <!-- right bio -->
    <div class="about-r rv d1">
      <div class="tag">Who I Am</div>
      <h2 class="sh">About <em>Me</em></h2>
      <p class="ap">Dedicated <strong>Laravel Developer</strong> with 2+ years of experience building scalable web applications and government-grade CMS platforms. I specialize in REST API integration, database optimization, and clean backend architecture.</p>
      <p class="ap">My proudest achievements include delivering <strong>GIGW &amp; DBIM 3.0 compliant portals</strong> — government-standard solutions combining accessibility, security, and performance, serving thousands of real users across India.</p>
      <p class="ap">I write code that's not just functional — it's <strong>maintainable, scalable, and built to last</strong>. Every project gets my full attention to detail.</p>

      <div class="xtl">
        <div class="xtl-h">Career Timeline</div>
        <div class="xrow"><div class="xdot live"></div><div class="xright"><div class="xrole">PHP Developer</div><div class="xco">Webflit Technologies · New Delhi</div><div class="xyr">Jan 2025 – Present</div></div></div>
        <div class="xrow"><div class="xdot"></div><div class="xright"><div class="xrole">Jr. PHP / Laravel Developer</div><div class="xco">Megamind Softwares · New Delhi</div><div class="xyr">Oct 2023 – Dec 2024</div></div></div>
        <div class="xrow"><div class="xdot"></div><div class="xright"><div class="xrole">Web Development Intern</div><div class="xco">Zeetaminds Technologies · Bhopal</div><div class="xyr">Apr – Sep 2023</div></div></div>
      </div>

      <div class="str-head">Core Strengths</div>
      <div class="strtags">
        <span class="strt">Problem Solving</span><span class="strt">REST API Design</span>
        <span class="strt">GIGW Compliance</span><span class="strt">WCAG / A11y</span>
        <span class="strt">DB Optimization</span><span class="strt">Team Collaboration</span>
        <span class="strt">Quick Learner</span><span class="strt">Deadline-Driven</span>
      </div>
    </div>

  </div>
</div>
</section>

<!-- ════ SKILLS ════ -->
<section id="skills" class="sec">
<div class="sec-in">
  <div class="rv"><div class="tag">Tech Stack</div><h2 class="sh">My <em>Skills</em></h2></div>
  <div class="sk-grid">
    <div class="skc rv d1"><div class="sk-em">⚙️</div><div class="sk-cat">Backend</div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">PHP</span><span class="sk-pc">92%</span></div><div class="sk-tr"><div class="sk-fl" data-w="92"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">Laravel</span><span class="sk-pc">90%</span></div><div class="sk-tr"><div class="sk-fl" data-w="90"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">CakePHP</span><span class="sk-pc">75%</span></div><div class="sk-tr"><div class="sk-fl" data-w="75"></div></div></div>
    </div>
    <div class="skc rv d2"><div class="sk-em">🎨</div><div class="sk-cat">Frontend</div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">HTML / CSS</span><span class="sk-pc">88%</span></div><div class="sk-tr"><div class="sk-fl" data-w="88"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">JavaScript</span><span class="sk-pc">80%</span></div><div class="sk-tr"><div class="sk-fl" data-w="80"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">Bootstrap / AJAX</span><span class="sk-pc">85%</span></div><div class="sk-tr"><div class="sk-fl" data-w="85"></div></div></div>
    </div>
    <div class="skc rv d3"><div class="sk-em">🗄️</div><div class="sk-cat">Database</div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">MySQL</span><span class="sk-pc">88%</span></div><div class="sk-tr"><div class="sk-fl" data-w="88"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">DB Design</span><span class="sk-pc">82%</span></div><div class="sk-tr"><div class="sk-fl" data-w="82"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">Query Optimization</span><span class="sk-pc">78%</span></div><div class="sk-tr"><div class="sk-fl" data-w="78"></div></div></div>
    </div>
    <div class="skc rv d4"><div class="sk-em">🔧</div><div class="sk-cat">Tools &amp; APIs</div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">Git / GitHub</span><span class="sk-pc">85%</span></div><div class="sk-tr"><div class="sk-fl" data-w="85"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">REST APIs</span><span class="sk-pc">90%</span></div><div class="sk-tr"><div class="sk-fl" data-w="90"></div></div></div>
      <div class="sk-row"><div class="sk-top"><span class="sk-nm">GIGW / WCAG</span><span class="sk-pc">80%</span></div><div class="sk-tr"><div class="sk-fl" data-w="80"></div></div></div>
    </div>
  </div>
</div>
</section>

<!-- ════ EXPERIENCE ════ -->
<section id="experience" class="sec" style="background:var(--n1)">
<div class="sec-in">
  <div class="rv"><div class="tag">Career</div><h2 class="sh">Work <em>Experience</em></h2></div>
  <div class="tl">
    <div class="tl-e rv">
      <div class="tl-dot now"></div>
      <div class="tlb">
        <div class="tl-dt">Jan 2025 – Present</div>
        <div class="tl-head"><div class="tl-role">PHP Developer</div><span class="tl-badge">● Current</span></div>
        <div class="tl-co"><i class="fas fa-building"></i>Webflit Technologies Pvt. Ltd.</div>
        <div class="tl-loc"><i class="fas fa-map-marker-alt"></i>New Delhi, India</div>
        <ul class="tl-ul">
          <li>Developed &amp; maintained government portals fully compliant with GIGW &amp; DBIM 3.0 standards</li>
          <li>Engineered RESTful APIs enabling seamless mobile-web data exchange for 50,000+ users</li>
          <li>Optimized complex MySQL queries, achieving 40% reduction in average response time</li>
          <li>Built WCAG 2.1 AA accessibility-first interfaces meeting government digital standards</li>
          <li>Collaborated with cross-functional teams via Git workflows and agile sprint cycles</li>
        </ul>
      </div>
    </div>
    <div class="tl-e rv d1">
      <div class="tl-dot"></div>
      <div class="tlb">
        <div class="tl-dt">Oct 2023 – Dec 2024</div>
        <div class="tl-head"><div class="tl-role">Jr. PHP / Laravel Developer</div></div>
        <div class="tl-co"><i class="fas fa-building"></i>Megamind Softwares</div>
        <div class="tl-loc"><i class="fas fa-map-marker-alt"></i>New Delhi, India</div>
        <ul class="tl-ul">
          <li>Built scalable CMS and dynamic web applications using Laravel 9 &amp; 10</li>
          <li>Implemented multi-role RBAC systems for complex multi-tenant SaaS platforms</li>
          <li>Integrated third-party payment gateways (Razorpay, PayU) and SMS/email APIs</li>
          <li>Delivered 5+ client projects on time with zero critical production bugs</li>
        </ul>
      </div>
    </div>
    <div class="tl-e rv d2">
      <div class="tl-dot"></div>
      <div class="tlb">
        <div class="tl-dt">Apr 2023 – Sep 2023</div>
        <div class="tl-head"><div class="tl-role">Web Development Intern</div></div>
        <div class="tl-co"><i class="fas fa-building"></i>Zeetaminds Technologies</div>
        <div class="tl-loc"><i class="fas fa-map-marker-alt"></i>Bhopal, India</div>
        <ul class="tl-ul">
          <li>Contributed to frontend development with HTML5, CSS3 &amp; vanilla JavaScript</li>
          <li>Learned CakePHP MVC architecture, building reusable components and data models</li>
          <li>Designed responsive mobile-first interfaces using Bootstrap 5</li>
        </ul>
      </div>
    </div>
  </div>
</div>
</section>

<!-- ════ EDUCATION ════ -->
<section id="education" class="sec" style="background:var(--n2)">
<div class="sec-in">
  <div class="rv"><div class="tag">Academic</div><h2 class="sh">My <em>Education</em></h2></div>
  <div class="edu-grid">
    <div class="educ rv d1"><div class="edu-yr">2020 – 2024 · Bhopal</div><span class="edu-ico">🎓</span><div class="edu-deg">B.Tech — Computer Science Engineering</div><div class="edu-sch">Sagar Group of Institutions</div><div class="edu-score">CGPA: 8.33 / 10</div></div>
    <div class="educ rv d2"><div class="edu-yr">2018 – 2020 · Bettiah</div><span class="edu-ico">🏫</span><div class="edu-deg">Intermediate — Science Stream</div><div class="edu-sch">MJK College Bettiah</div><div class="edu-score">76.20%</div></div>
    <div class="educ rv d3"><div class="edu-yr">2018 · Bettiah</div><span class="edu-ico">📚</span><div class="edu-deg">Class X — Bihar State Board</div><div class="edu-sch">Alok Bharati Bettiah</div><div class="edu-score">75.80%</div></div>
  </div>
</div>
</section>

<!-- ════ CERTIFICATIONS ════ -->
<section id="certs" class="sec" style="background:var(--n1)">
<div class="sec-in">
  <div class="rv"><div class="tag">Credentials</div><h2 class="sh">My <em>Certifications</em></h2></div>
  <div class="cert-grid">
    <div class="certc rv"><div class="cert-ico"><i class="fas fa-code"></i></div><div class="cert-nm">Full Stack Web Development Masterclass</div><div class="cert-iss"><i class="fas fa-building" style="color:var(--g2)"></i>Udemy</div><a href="#" class="cert-lnk"><i class="fas fa-external-link-alt"></i>View Certificate</a></div>
    <div class="certc rv d1"><div class="cert-ico"><i class="fas fa-database"></i></div><div class="cert-nm">The SQL Programming Masterclass – Beginner to Expert</div><div class="cert-iss"><i class="fas fa-building" style="color:var(--g2)"></i>Udemy</div><a href="#" class="cert-lnk"><i class="fas fa-external-link-alt"></i>View Certificate</a></div>
    <div class="certc rv d2"><div class="cert-ico"><i class="fas fa-laptop-code"></i></div><div class="cert-nm">MasterClass: Learn HTML5 with Notes for Beginners</div><div class="cert-iss"><i class="fas fa-building" style="color:var(--g2)"></i>Udemy</div><a href="#" class="cert-lnk"><i class="fas fa-external-link-alt"></i>View Certificate</a></div>
    <div class="certc rv d3"><div class="cert-ico"><i class="fas fa-sitemap"></i></div><div class="cert-nm">Data Structures and Algorithms in Java</div><div class="cert-iss"><i class="fas fa-building" style="color:var(--g2)"></i>Udemy</div><a href="#" class="cert-lnk"><i class="fas fa-external-link-alt"></i>View Certificate</a></div>
    <div class="certc rv d4"><div class="cert-ico"><i class="fas fa-lightbulb"></i></div><div class="cert-nm">Design Thinking for Innovation and Productivity</div><div class="cert-iss"><i class="fab fa-google" style="color:var(--g2)"></i>Coursera</div><a href="#" class="cert-lnk"><i class="fas fa-external-link-alt"></i>View Certificate</a></div>
    <div class="certc rv d5"><div class="cert-ico"><i class="fab fa-google"></i></div><div class="cert-nm">Using ChatGPT to Enhance Creativity &amp; Productivity</div><div class="cert-iss"><i class="fab fa-google" style="color:var(--g2)"></i>Coursera</div><a href="#" class="cert-lnk"><i class="fas fa-external-link-alt"></i>View Certificate</a></div>
  </div>
</div>
</section>

<!-- ════ PROJECTS ════ -->
<section id="projects" class="sec">
<div class="sec-in">
  <div class="proj-hdr rv">
    <div><div class="tag">Portfolio</div><h2 class="sh" style="margin-bottom:0">My <em>Projects</em></h2></div>
    <div class="pfg">
      <button class="pf on" data-f="all">All</button>
      <button class="pf" data-f="laravel">Laravel</button>
      <button class="pf" data-f="php">PHP</button>
      <button class="pf" data-f="api">API</button>
      <button class="pf" data-f="government">Gov't</button>
    </div>
  </div>
  <div class="proj-grid rv d1" id="pg">
    <div class="pjc" data-cat="government"><div class="pj-thumb"><img src="https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=600&h=380&fit=crop&q=70" alt="" loading="lazy"><div class="pj-bar"><div class="bdc" style="background:#ff5f57"></div><div class="bdc" style="background:#ffbd2e"></div><div class="bdc" style="background:#28c840"></div><div class="pj-url"></div></div><div class="pj-ov"><span class="povb"><i class="fas fa-lock"></i></span></div></div><div class="pj-body"><div class="pj-cat">Government</div><h3 class="pj-title">Government Ministry Portal</h3><p class="pj-desc">GIGW &amp; DBIM 3.0 compliant portal with multilingual support serving 50,000+ citizens.</p><div class="pj-tags"><span class="pj-tag">Laravel</span><span class="pj-tag">PHP</span><span class="pj-tag">MySQL</span><span class="pj-tag">GIGW</span></div><div class="pj-lks"><span class="pj-lk" style="opacity:.38;cursor:default"><i class="fas fa-lock"></i>Confidential</span></div></div></div>

    <div class="pjc" data-cat="api"><div class="pj-thumb"><img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&h=380&fit=crop&q=70" alt="" loading="lazy"><div class="pj-bar"><div class="bdc" style="background:#ff5f57"></div><div class="bdc" style="background:#ffbd2e"></div><div class="bdc" style="background:#28c840"></div><div class="pj-url"></div></div><div class="pj-ov"><a href="https://github.com/Vikashgupta95239" target="_blank" class="povb"><i class="fab fa-github"></i></a></div></div><div class="pj-body"><div class="pj-cat">API</div><h3 class="pj-title">REST API Job-to-PHP Platform</h3><p class="pj-desc">Robust RESTful API with JWT auth, rate limiting &amp; Swagger documentation.</p><div class="pj-tags"><span class="pj-tag">Laravel</span><span class="pj-tag">REST API</span><span class="pj-tag">JWT</span></div><div class="pj-lks"><a href="https://github.com/Vikashgupta95239" target="_blank" class="pj-lk"><i class="fab fa-github"></i>GitHub</a></div></div></div>

    <div class="pjc" data-cat="laravel"><div class="pj-thumb"><img src="https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=600&h=380&fit=crop&q=70" alt="" loading="lazy"><div class="pj-bar"><div class="bdc" style="background:#ff5f57"></div><div class="bdc" style="background:#ffbd2e"></div><div class="bdc" style="background:#28c840"></div><div class="pj-url"></div></div><div class="pj-ov"><a href="https://github.com/Vikashgupta95239" target="_blank" class="povb"><i class="fab fa-github"></i></a></div></div><div class="pj-body"><div class="pj-cat">Laravel</div><h3 class="pj-title">PHP Backend Module Review</h3><p class="pj-desc">Modular Laravel backend with multi-role auth, dynamic forms &amp; scheduled tasks.</p><div class="pj-tags"><span class="pj-tag">Laravel 10</span><span class="pj-tag">Blade</span><span class="pj-tag">MySQL</span></div><div class="pj-lks"><a href="https://github.com/Vikashgupta95239" target="_blank" class="pj-lk"><i class="fab fa-github"></i>GitHub</a></div></div></div>

    <div class="pjc" data-cat="php"><div class="pj-thumb"><img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=600&h=380&fit=crop&q=70" alt="" loading="lazy"><div class="pj-bar"><div class="bdc" style="background:#ff5f57"></div><div class="bdc" style="background:#ffbd2e"></div><div class="bdc" style="background:#28c840"></div><div class="pj-url"></div></div><div class="pj-ov"><a href="https://github.com/Vikashgupta95239" target="_blank" class="povb"><i class="fab fa-github"></i></a></div></div><div class="pj-body"><div class="pj-cat">PHP</div><h3 class="pj-title">Web Application Dashboard</h3><p class="pj-desc">Real-time analytics with chart visualizations, export &amp; role-based reporting.</p><div class="pj-tags"><span class="pj-tag">PHP</span><span class="pj-tag">CakePHP</span><span class="pj-tag">Chart.js</span></div><div class="pj-lks"><a href="https://github.com/Vikashgupta95239" target="_blank" class="pj-lk"><i class="fab fa-github"></i>GitHub</a></div></div></div>

    <div class="pjc" data-cat="laravel"><div class="pj-thumb"><img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=380&fit=crop&q=70" alt="" loading="lazy"><div class="pj-bar"><div class="bdc" style="background:#ff5f57"></div><div class="bdc" style="background:#ffbd2e"></div><div class="bdc" style="background:#28c840"></div><div class="pj-url"></div></div><div class="pj-ov"><a href="https://github.com/Vikashgupta95239" target="_blank" class="povb"><i class="fab fa-github"></i></a></div></div><div class="pj-body"><div class="pj-cat">Laravel</div><h3 class="pj-title">E-Commerce Backend Platform</h3><p class="pj-desc">Full-featured e-commerce with inventory management &amp; Razorpay integration.</p><div class="pj-tags"><span class="pj-tag">Laravel 11</span><span class="pj-tag">Razorpay</span><span class="pj-tag">Redis</span></div><div class="pj-lks"><a href="https://github.com/Vikashgupta95239" target="_blank" class="pj-lk"><i class="fab fa-github"></i>GitHub</a></div></div></div>

    <div class="pjc" data-cat="government"><div class="pj-thumb"><img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=380&fit=crop&q=70" alt="" loading="lazy"><div class="pj-bar"><div class="bdc" style="background:#ff5f57"></div><div class="bdc" style="background:#ffbd2e"></div><div class="bdc" style="background:#28c840"></div><div class="pj-url"></div></div><div class="pj-ov"><span class="povb"><i class="fas fa-lock"></i></span></div></div><div class="pj-body"><div class="pj-cat">Government</div><h3 class="pj-title">Accessibility Compliance Tool</h3><p class="pj-desc">Automated WCAG 2.1 checker integrated into CMS to detect accessibility violations.</p><div class="pj-tags"><span class="pj-tag">Laravel</span><span class="pj-tag">WCAG</span><span class="pj-tag">PHP</span></div><div class="pj-lks"><span class="pj-lk" style="opacity:.38;cursor:default"><i class="fas fa-lock"></i>Confidential</span></div></div></div>
  </div>
</div>
</section>

<!-- ════ CONTACT ════ -->
<section id="contact" class="sec" style="background:var(--n2)">
<div class="sec-in">
  <div class="rv"><div class="tag">Get In Touch</div><h2 class="sh">Contact <em>Me</em></h2></div>
  <div class="ct-grid">
    <div class="rv">
      <p class="ct-p">Have a project, opportunity, or want to connect? I'm always open to new challenges and collaborations. I respond within 24 hours.</p>
      <div class="ctrow"><div class="ct-ico"><i class="fas fa-envelope"></i></div><div><div class="ct-k">Email</div><div class="ct-v"><a href="mailto:vikashkumarbth381@gmail.com">vikashkumarbth381@gmail.com</a></div></div></div>
      <div class="ctrow"><div class="ct-ico"><i class="fas fa-phone"></i></div><div><div class="ct-k">Phone</div><div class="ct-v"><a href="tel:+919523919654">+91 95239 19654</a></div></div></div>
      <div class="ctrow"><div class="ct-ico"><i class="fas fa-map-marker-alt"></i></div><div><div class="ct-k">Location</div><div class="ct-v">New Delhi, India 🇮🇳</div></div></div>
      <div class="ctrow"><div class="ct-ico"><i class="fab fa-linkedin-in"></i></div><div><div class="ct-k">LinkedIn</div><div class="ct-v"><a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank">vikash-kumar-computer-science</a></div></div></div>
    </div>
    <div class="rv d1">
      <form id="cf">
        <div class="frw">
          <div class="fg"><label class="fl">Your Name</label><input class="fi" type="text" name="name" placeholder="John Doe" required></div>
          <div class="fg"><label class="fl">Email Address</label><input class="fi" type="email" name="email" placeholder="john@company.com" required></div>
        </div>
        <div class="fg"><label class="fl">Subject</label><input class="fi" type="text" name="subject" placeholder="Laravel Developer Opportunity" required></div>
        <div class="fg"><label class="fl">Your Message</label><textarea class="fi" name="message" placeholder="Hi Vikash, I'd love to discuss..." required></textarea></div>
        <button type="submit" class="fsub" id="sb"><i class="fas fa-paper-plane"></i>Send Message</button>
      </form>
    </div>
  </div>
</div>
</section>

<!-- ════ FOOTER ════ -->
<footer>
  <div class="foot-in">
    <div class="foot-logo">Vikash Kumar</div>
    <nav class="foot-nav">
      <a href="#about">About</a><a href="#skills">Skills</a>
      <a href="#experience">Experience</a><a href="#projects">Projects</a><a href="#contact">Contact</a>
    </nav>
    <div class="foot-soc">
      <a href="https://github.com/Vikashgupta95239" target="_blank" class="fsoc"><i class="fab fa-github"></i></a>
      <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" class="fsoc"><i class="fab fa-linkedin-in"></i></a>
      <a href="mailto:vikashkumarbth381@gmail.com" class="fsoc"><i class="fas fa-envelope"></i></a>
    </div>
    <p class="foot-copy">© 2026 Vikash Kumar &nbsp;·&nbsp; Built with Laravel 12 &amp; passion &nbsp;·&nbsp; <a href="/admin">Admin Panel</a></p>
  </div>
</footer>

<div class="toast" id="toast"><i class="fas fa-check-circle"></i><span id="tmsg"></span></div>

<script>
/* Cursor */
const csr=document.getElementById('csr'),csr2=document.getElementById('csr2');
let mx=0,my=0,rx=0,ry=0;
document.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY;csr.style.left=mx+'px';csr.style.top=my+'px'});
(function loop(){rx+=(mx-rx)*.12;ry+=(my-ry)*.12;csr2.style.left=rx+'px';csr2.style.top=ry+'px';requestAnimationFrame(loop)})();

/* Loader */
window.addEventListener('load',()=>setTimeout(()=>document.getElementById('ldr').classList.add('out'),3000));

/* Nav scroll + active */
const nav=document.getElementById('nav');
window.addEventListener('scroll',()=>{
  nav.classList.toggle('on',scrollY>55);
  let cur='';
  document.querySelectorAll('section[id]').forEach(s=>{if(scrollY>=s.offsetTop-320)cur=s.id});
  document.querySelectorAll('.nav-links a').forEach(a=>a.classList.toggle('act',a.getAttribute('href')==='#'+cur));
},{passive:true});

/* Hamburger + drawer */
const ham=document.getElementById('ham'),drw=document.getElementById('drawer');
function openMenu(){ham.classList.add('open');drw.classList.add('open');document.body.style.overflow='hidden'}
function closeMenu(){ham.classList.remove('open');drw.classList.remove('open');document.body.style.overflow=''}
ham.addEventListener('click',()=>drw.classList.contains('open')?closeMenu():openMenu());
document.getElementById('drw-close').addEventListener('click',closeMenu);
document.querySelectorAll('.drw-lk,.drw-cta').forEach(a=>a.addEventListener('click',closeMenu));
document.addEventListener('keydown',e=>{if(e.key==='Escape')closeMenu()});

/* Typewriter */
const roles=['Laravel Developer','PHP Developer','Backend Engineer','API Architect','CMS Specialist'];
let ri=0,ci=0,del=false;const tw=document.getElementById('tw');
function type(){
  const w=roles[ri];
  if(!del){tw.textContent=w.slice(0,++ci);if(ci===w.length){del=true;setTimeout(type,2500);return}}
  else{tw.textContent=w.slice(0,--ci);if(ci===0){del=false;ri=(ri+1)%roles.length}}
  setTimeout(type,del?40:108);
}
setTimeout(type,2200);

/* Reveal + counters + bars */
function reveal(el){
  el.classList.add('in');
  el.querySelectorAll('.sk-fl[data-w]').forEach(b=>b.style.width=b.dataset.w+'%');
  el.querySelectorAll('[data-t]').forEach(n=>{
    if(n._done)return;n._done=true;
    const tg=+n.dataset.t,sf=n.dataset.s||'';let c=0;
    const t=setInterval(()=>{c=Math.min(c+tg/50,tg);n.textContent=Math.floor(c)+sf;if(c>=tg)clearInterval(t)},20);
  });
}
const obs=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)reveal(e.target)}),{threshold:0,rootMargin:'0px 0px -16px 0px'});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));
setTimeout(()=>document.querySelectorAll('.rv:not(.in)').forEach(reveal),3300);

/* Project filter */
document.querySelectorAll('.pf').forEach(b=>b.addEventListener('click',()=>{
  document.querySelectorAll('.pf').forEach(x=>x.classList.remove('on'));
  b.classList.add('on');const f=b.dataset.f;
  document.querySelectorAll('.pjc').forEach(c=>c.style.display=(f==='all'||c.dataset.cat===f)?'':'none');
}));

/* Contact form */
document.getElementById('cf').addEventListener('submit',async e=>{
  e.preventDefault();
  const sb=document.getElementById('sb');
  sb.disabled=true;sb.innerHTML='<i class="fas fa-spinner fa-spin"></i> Sending…';
  await new Promise(r=>setTimeout(r,1500));
  toast("Message sent! I'll be in touch soon.",'ok');
  e.target.reset();sb.disabled=false;
  sb.innerHTML='<i class="fas fa-paper-plane"></i> Send Message';
});
function toast(msg,t){
  const el=document.getElementById('toast');
  document.getElementById('tmsg').textContent=msg;
  el.className='toast'+(t==='err'?' err':'');
  el.querySelector('i').className='fas fa-'+(t==='err'?'exclamation-circle':'check-circle');
  el.classList.add('show');setTimeout(()=>el.classList.remove('show'),5000);
}

/* Smooth scroll */
document.querySelectorAll('a[href^="#"]').forEach(a=>a.addEventListener('click',e=>{
  e.preventDefault();
  const el=document.querySelector(a.getAttribute('href'));
  if(el)el.scrollIntoView({behavior:'smooth'});
}));
</script>
</body>
</html>
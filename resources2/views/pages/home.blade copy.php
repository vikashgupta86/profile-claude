<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vikash Kumar - Laravel Developer & PHP Engineer. Building scalable web applications & government-grade CMS solutions.">
    <meta property="og:title" content="Vikash Kumar | Laravel Developer">
    <meta property="og:description" content="Building scalable web applications & government-grade CMS solutions">
    <meta property="og:type" content="website">
    <title>Vikash Kumar | Laravel Developer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500;700&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --bg: #0A0A0B;
            --bg2: #111114;
            --bg3: #161619;
            --cyan: #00F5FF;
            --cyan-dim: rgba(0,245,255,0.15);
            --cyan-glow: rgba(0,245,255,0.4);
            --gold: #FFD700;
            --gold-dim: rgba(255,215,0,0.15);
            --text: #E8E8EE;
            --text-muted: #8888A0;
            --border: rgba(255,255,255,0.06);
            --card: rgba(22,22,25,0.8);
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        html{scroll-behavior:smooth;scrollbar-width:thin;scrollbar-color:var(--cyan) var(--bg)}
        ::-webkit-scrollbar{width:4px}::-webkit-scrollbar-track{background:var(--bg)}::-webkit-scrollbar-thumb{background:var(--cyan);border-radius:2px}
        body{background:var(--bg);color:var(--text);font-family:'DM Sans',sans-serif;overflow-x:hidden;cursor:none}

        /* Custom Cursor */
        .cursor{position:fixed;width:12px;height:12px;background:var(--cyan);border-radius:50%;pointer-events:none;z-index:9999;transition:transform .1s;mix-blend-mode:difference}
        .cursor-ring{position:fixed;width:40px;height:40px;border:1px solid var(--cyan);border-radius:50%;pointer-events:none;z-index:9998;transition:all .15s ease;opacity:.5}
        .cursor-ring.hovered{width:60px;height:60px;opacity:.8;border-color:var(--gold)}

        /* Loading Screen */
        #loader{position:fixed;inset:0;background:var(--bg);z-index:10000;display:flex;align-items:center;justify-content:center;flex-direction:column;transition:opacity .8s ease}
        #loader.hidden{opacity:0;pointer-events:none}
        .loader-text{font-family:'Syne',sans-serif;font-size:clamp(2rem,5vw,4rem);font-weight:800;color:var(--cyan);animation:pulse 1s ease-in-out infinite}
        .loader-bar{width:200px;height:2px;background:var(--bg3);margin-top:20px;border-radius:1px;overflow:hidden}
        .loader-bar-fill{height:100%;background:linear-gradient(90deg,var(--cyan),var(--gold));width:0;animation:load 2s ease forwards}
        @keyframes load{to{width:100%}}
        @keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}

        /* Navigation */
        nav{position:fixed;top:0;left:0;right:0;z-index:100;padding:1.2rem 5%;transition:all .3s ease}
        nav.scrolled{background:rgba(10,10,11,0.85);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);padding:.8rem 5%}
        .nav-inner{display:flex;align-items:center;justify-content:space-between;max-width:1400px;margin:0 auto}
        .nav-logo{font-family:'Syne',sans-serif;font-size:1.4rem;font-weight:800;color:var(--cyan);text-decoration:none;letter-spacing:2px}
        .nav-logo span{color:var(--gold)}
        .nav-links{display:flex;gap:2.5rem;list-style:none}
        .nav-links a{font-family:'JetBrains Mono',monospace;font-size:.8rem;color:var(--text-muted);text-decoration:none;transition:color .3s;position:relative;letter-spacing:1px}
        .nav-links a::before{content:attr(data-num);color:var(--cyan);margin-right:4px;font-size:.7rem}
        .nav-links a:hover,.nav-links a.active{color:var(--text)}
        .nav-links a::after{content:'';position:absolute;bottom:-4px;left:0;width:0;height:1px;background:var(--cyan);transition:width .3s}
        .nav-links a:hover::after,.nav-links a.active::after{width:100%}
        .nav-cta{background:transparent;border:1px solid var(--cyan);color:var(--cyan);padding:.5rem 1.2rem;font-family:'JetBrains Mono',monospace;font-size:.8rem;cursor:pointer;transition:all .3s;text-decoration:none;letter-spacing:1px}
        .nav-cta:hover{background:var(--cyan);color:var(--bg)}
        .nav-hamburger{display:none;flex-direction:column;gap:5px;cursor:pointer;background:none;border:none;padding:5px}
        .nav-hamburger span{width:24px;height:2px;background:var(--text);transition:all .3s;display:block}

        /* Hero */
        #hero{min-height:100vh;position:relative;display:flex;align-items:center;overflow:hidden}
        #matrix-canvas{position:absolute;inset:0;opacity:.07}
        .hero-content{position:relative;z-index:2;max-width:1400px;margin:0 auto;padding:0 5%;padding-top:100px;display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center}
        .hero-text{}
        .hero-greeting{font-family:'JetBrains Mono',monospace;font-size:.9rem;color:var(--cyan);letter-spacing:3px;margin-bottom:1rem;display:flex;align-items:center;gap:10px;opacity:0;animation:fadeUp .8s .3s forwards}
        .hero-greeting::before{content:'';width:40px;height:1px;background:var(--cyan)}
        .hero-name{font-family:'Syne',sans-serif;font-size:clamp(3rem,7vw,6rem);font-weight:800;line-height:1;margin-bottom:1rem;opacity:0;animation:fadeUp .8s .5s forwards}
        .hero-name .first{color:var(--text)}
        .hero-name .last{color:var(--cyan);-webkit-text-stroke:0;text-shadow:0 0 40px var(--cyan-glow)}
        .hero-role{font-family:'JetBrains Mono',monospace;font-size:1.4rem;color:var(--gold);margin-bottom:1.5rem;min-height:2rem;opacity:0;animation:fadeUp .8s .7s forwards}
        .hero-role .cursor-blink{animation:blink .7s infinite}
        @keyframes blink{0%,100%{opacity:1}50%{opacity:0}}
        .hero-tagline{font-size:1.1rem;color:var(--text-muted);line-height:1.7;max-width:500px;margin-bottom:2.5rem;opacity:0;animation:fadeUp .8s .9s forwards}
        .hero-btns{display:flex;gap:1rem;flex-wrap:wrap;opacity:0;animation:fadeUp .8s 1.1s forwards}
        .btn-primary{background:var(--cyan);color:var(--bg);padding:.9rem 2rem;font-family:'Syne',sans-serif;font-weight:700;font-size:.9rem;border:none;cursor:pointer;transition:all .3s;text-decoration:none;display:inline-flex;align-items:center;gap:.5rem;letter-spacing:1px}
        .btn-primary:hover{background:var(--gold);transform:translateY(-2px);box-shadow:0 10px 30px rgba(255,215,0,.2)}
        .btn-outline{background:transparent;color:var(--cyan);padding:.9rem 2rem;font-family:'Syne',sans-serif;font-weight:700;font-size:.9rem;border:1px solid var(--cyan);cursor:pointer;transition:all .3s;text-decoration:none;display:inline-flex;align-items:center;gap:.5rem;letter-spacing:1px}
        .btn-outline:hover{background:var(--cyan-dim);transform:translateY(-2px);box-shadow:0 10px 30px var(--cyan-dim)}
        .btn-ghost{background:transparent;color:var(--text-muted);padding:.9rem 2rem;font-family:'Syne',sans-serif;font-weight:700;font-size:.9rem;border:1px solid var(--border);cursor:pointer;transition:all .3s;text-decoration:none;display:inline-flex;align-items:center;gap:.5rem;letter-spacing:1px}
        .btn-ghost:hover{border-color:var(--text-muted);color:var(--text)}
        .hero-social{display:flex;gap:1.5rem;margin-top:2rem;opacity:0;animation:fadeUp .8s 1.3s forwards}
        .hero-social a{color:var(--text-muted);font-size:1.2rem;transition:all .3s}
        .hero-social a:hover{color:var(--cyan);transform:translateY(-3px)}
        .hero-img-wrap{display:flex;align-items:center;justify-content:center;opacity:0;animation:fadeIn 1s 1s forwards}
        .hero-avatar{width:320px;height:320px;border-radius:50%;border:2px solid var(--cyan);padding:6px;position:relative;box-shadow:0 0 60px var(--cyan-glow),0 0 120px rgba(0,245,255,.1)}
        .hero-avatar::before{content:'';position:absolute;inset:-8px;border-radius:50%;border:1px solid rgba(0,245,255,.2);animation:rotate 8s linear infinite}
        .hero-avatar::after{content:'';position:absolute;inset:-16px;border-radius:50%;border:1px dashed rgba(255,215,0,.15);animation:rotate 12s linear infinite reverse}
        .hero-avatar img,.hero-avatar-placeholder{width:100%;height:100%;border-radius:50%;object-fit:cover;background:var(--bg3);display:flex;align-items:center;justify-content:center;color:var(--cyan);font-size:5rem}
        @keyframes rotate{to{transform:rotate(360deg)}}
        @keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
        @keyframes fadeIn{from{opacity:0}to{opacity:1}}
        .scroll-indicator{position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:.5rem;opacity:0;animation:fadeIn 1s 2s forwards}
        .scroll-indicator span{font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--text-muted);letter-spacing:2px}
        .scroll-line{width:1px;height:60px;background:linear-gradient(var(--cyan),transparent);animation:scrollLine 2s ease-in-out infinite}
        @keyframes scrollLine{0%,100%{opacity:1;transform:scaleY(1)}50%{opacity:.3}}

        /* Sections */
        section{padding:7rem 5%;max-width:1400px;margin:0 auto}
        .section-label{font-family:'JetBrains Mono',monospace;font-size:.8rem;color:var(--cyan);letter-spacing:3px;margin-bottom:.8rem;display:flex;align-items:center;gap:10px}
        .section-label::before{content:'';width:30px;height:1px;background:var(--cyan)}
        .section-title{font-family:'Syne',sans-serif;font-size:clamp(2rem,4vw,3.5rem);font-weight:800;color:var(--text);margin-bottom:1rem;line-height:1.1}
        .section-title span{color:var(--cyan)}
        .reveal{opacity:0;transform:translateY(30px);transition:opacity .8s ease,transform .8s ease}
        .reveal.visible{opacity:1;transform:translateY(0)}

        /* About */
        #about{padding-top:7rem}
        .about-grid{display:grid;grid-template-columns:1fr 1.6fr;gap:5rem;align-items:center;margin-top:4rem}
        .about-img-col{position:relative}
        .about-photo{width:100%;aspect-ratio:3/4;background:var(--bg3);border:1px solid var(--border);position:relative;overflow:hidden}
        .about-photo::before{content:'<Developer/>';font-family:'JetBrains Mono',monospace;font-size:.8rem;color:var(--cyan);position:absolute;top:1rem;left:1rem;z-index:2;opacity:.6}
        .about-photo-placeholder{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:5rem;color:var(--text-muted)}
        .about-deco{position:absolute;top:20px;left:20px;right:-20px;bottom:-20px;border:1px solid var(--cyan-dim);z-index:-1}
        .about-stats{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-top:2rem}
        .stat-box{background:var(--bg3);border:1px solid var(--border);padding:1.2rem;text-align:center;transition:all .3s}
        .stat-box:hover{border-color:var(--cyan);box-shadow:0 0 20px var(--cyan-dim)}
        .stat-num{font-family:'Syne',sans-serif;font-size:2rem;font-weight:800;color:var(--cyan)}
        .stat-label{font-size:.8rem;color:var(--text-muted);font-family:'JetBrains Mono',monospace;letter-spacing:1px}
        .about-text p{color:var(--text-muted);line-height:1.9;margin-bottom:1.5rem;font-size:1.05rem}
        .strengths{display:flex;flex-wrap:wrap;gap:.6rem;margin-top:1.5rem}
        .strength-tag{background:var(--cyan-dim);border:1px solid rgba(0,245,255,.3);color:var(--cyan);padding:.4rem 1rem;font-family:'JetBrains Mono',monospace;font-size:.75rem;letter-spacing:1px;transition:all .3s}
        .strength-tag:hover{background:rgba(0,245,255,.25);box-shadow:0 0 15px var(--cyan-dim)}

        /* Skills */
        #skills{background:var(--bg2);padding:7rem 5%}
        #skills .inner{max-width:1400px;margin:0 auto}
        .skills-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:2rem;margin-top:4rem}
        .skill-card{background:var(--card);border:1px solid var(--border);padding:2rem;transition:all .4s;position:relative;overflow:hidden}
        .skill-card::before{content:'';position:absolute;top:0;left:0;width:3px;height:0;background:var(--cyan);transition:height .4s}
        .skill-card:hover{border-color:rgba(0,245,255,.3);transform:translateY(-4px);box-shadow:0 20px 40px rgba(0,0,0,.4),0 0 40px var(--cyan-dim)}
        .skill-card:hover::before{height:100%}
        .skill-cat{font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--cyan);letter-spacing:2px;margin-bottom:1.2rem}
        .skill-cat-icon{font-size:1.5rem;margin-bottom:.8rem;color:var(--gold)}
        .skill-items{display:flex;flex-direction:column;gap:.8rem}
        .skill-item label{display:flex;justify-content:space-between;font-size:.85rem;color:var(--text-muted);margin-bottom:.3rem;font-family:'DM Sans',sans-serif}
        .skill-item label span{color:var(--cyan);font-family:'JetBrains Mono',monospace;font-size:.75rem}
        .skill-bar{height:3px;background:var(--border);border-radius:2px;overflow:hidden}
        .skill-fill{height:100%;background:linear-gradient(90deg,var(--cyan),var(--gold));width:0;transition:width 1.5s ease;border-radius:2px}

        /* Experience */
        .timeline{position:relative;margin-top:4rem;padding-left:3rem}
        .timeline::before{content:'';position:absolute;left:0;top:0;bottom:0;width:1px;background:linear-gradient(var(--cyan),transparent)}
        .timeline-item{position:relative;margin-bottom:3.5rem}
        .timeline-dot{position:absolute;left:-3.4rem;top:.4rem;width:14px;height:14px;background:var(--bg);border:2px solid var(--cyan);border-radius:50%;box-shadow:0 0 15px var(--cyan-glow)}
        .timeline-dot.current{background:var(--cyan);box-shadow:0 0 20px var(--cyan)}
        .timeline-card{background:var(--card);border:1px solid var(--border);padding:2rem;transition:all .4s}
        .timeline-card:hover{border-color:rgba(0,245,255,.3);box-shadow:0 0 30px var(--cyan-dim)}
        .timeline-period{font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--cyan);letter-spacing:2px;margin-bottom:.5rem}
        .timeline-title{font-family:'Syne',sans-serif;font-size:1.3rem;font-weight:700;color:var(--text);margin-bottom:.3rem}
        .timeline-company{color:var(--gold);font-size:.9rem;margin-bottom:.3rem;display:flex;align-items:center;gap:.5rem}
        .timeline-location{color:var(--text-muted);font-size:.8rem;font-family:'JetBrains Mono',monospace;margin-bottom:1rem}
        .timeline-list{list-style:none;display:flex;flex-direction:column;gap:.5rem}
        .timeline-list li{color:var(--text-muted);font-size:.9rem;line-height:1.6;padding-left:1rem;position:relative}
        .timeline-list li::before{content:'▶';position:absolute;left:0;color:var(--cyan);font-size:.5rem;top:.4rem}
        .current-badge{background:var(--cyan-dim);border:1px solid var(--cyan);color:var(--cyan);font-family:'JetBrains Mono',monospace;font-size:.65rem;padding:.2rem .6rem;letter-spacing:1px;margin-left:.8rem}

        /* Education */
        .edu-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem;margin-top:4rem}
        .edu-card{background:var(--card);border:1px solid var(--border);padding:2rem;transition:all .4s;position:relative}
        .edu-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--cyan),transparent);transform:scaleX(0);transition:transform .4s}
        .edu-card:hover{transform:translateY(-4px);box-shadow:0 20px 40px rgba(0,0,0,.4)}
        .edu-card:hover::after{transform:scaleX(1)}
        .edu-icon{font-size:2rem;color:var(--gold);margin-bottom:1rem}
        .edu-degree{font-family:'Syne',sans-serif;font-size:1.1rem;font-weight:700;color:var(--text);margin-bottom:.3rem}
        .edu-school{color:var(--cyan);font-size:.9rem;margin-bottom:.3rem}
        .edu-year{font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--text-muted);margin-bottom:.5rem}
        .edu-score{background:var(--gold-dim);border:1px solid rgba(255,215,0,.3);color:var(--gold);font-family:'JetBrains Mono',monospace;font-size:.8rem;padding:.3rem .8rem;display:inline-block;margin-top:.5rem}

        /* Certifications */
        #certifications{background:var(--bg2);padding:7rem 5%}
        #certifications .inner{max-width:1400px;margin:0 auto}
        .cert-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:4rem}
        .cert-card{background:var(--card);border:1px solid var(--border);padding:1.8rem;transition:all .4s;position:relative;overflow:hidden}
        .cert-card::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,var(--cyan-dim),transparent);opacity:0;transition:opacity .4s}
        .cert-card:hover{border-color:rgba(0,245,255,.3);transform:translateY(-4px);box-shadow:0 20px 40px rgba(0,0,0,.4),0 0 40px var(--cyan-dim)}
        .cert-card:hover::before{opacity:1}
        .cert-icon{font-size:2rem;color:var(--cyan);margin-bottom:1rem;position:relative}
        .cert-title{font-family:'Syne',sans-serif;font-size:1rem;font-weight:700;color:var(--text);margin-bottom:.4rem;line-height:1.3;position:relative}
        .cert-issuer{color:var(--text-muted);font-size:.85rem;margin-bottom:1.2rem;position:relative}
        .cert-btn{background:transparent;border:1px solid var(--border);color:var(--text-muted);padding:.4rem 1rem;font-family:'JetBrains Mono',monospace;font-size:.75rem;cursor:pointer;transition:all .3s;text-decoration:none;display:inline-block;position:relative}
        .cert-btn:hover{border-color:var(--cyan);color:var(--cyan)}

        /* Projects */
        .filter-bar{display:flex;gap:.8rem;margin:3rem 0;flex-wrap:wrap}
        .filter-btn{background:transparent;border:1px solid var(--border);color:var(--text-muted);padding:.5rem 1.2rem;font-family:'JetBrains Mono',monospace;font-size:.75rem;cursor:pointer;transition:all .3s;letter-spacing:1px}
        .filter-btn.active,.filter-btn:hover{border-color:var(--cyan);color:var(--cyan);background:var(--cyan-dim)}
        .projects-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(340px,1fr));gap:2rem}
        .project-card{background:var(--card);border:1px solid var(--border);overflow:hidden;transition:all .4s;position:relative}
        .project-card:hover{border-color:rgba(0,245,255,.3);transform:translateY(-6px);box-shadow:0 30px 60px rgba(0,0,0,.5),0 0 50px var(--cyan-dim)}
        .project-thumb{height:200px;background:var(--bg3);display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden}
        .project-thumb-placeholder{font-size:3rem;color:var(--text-muted);z-index:1}
        .project-thumb-overlay{position:absolute;inset:0;background:linear-gradient(135deg,rgba(0,245,255,.1),rgba(255,215,0,.05));opacity:0;transition:opacity .4s}
        .project-card:hover .project-thumb-overlay{opacity:1}
        .project-body{padding:1.8rem}
        .project-cat{font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--gold);letter-spacing:2px;margin-bottom:.5rem;text-transform:uppercase}
        .project-title{font-family:'Syne',sans-serif;font-size:1.2rem;font-weight:700;color:var(--text);margin-bottom:.8rem}
        .project-desc{color:var(--text-muted);font-size:.9rem;line-height:1.7;margin-bottom:1.2rem}
        .tech-badges{display:flex;flex-wrap:wrap;gap:.4rem;margin-bottom:1.5rem}
        .tech-badge{background:var(--cyan-dim);border:1px solid rgba(0,245,255,.2);color:var(--cyan);padding:.25rem .6rem;font-family:'JetBrains Mono',monospace;font-size:.7rem}
        .project-links{display:flex;gap:.8rem}
        .project-link{color:var(--text-muted);font-family:'JetBrains Mono',monospace;font-size:.75rem;text-decoration:none;display:flex;align-items:center;gap:.4rem;transition:color .3s;padding:.4rem 0;border-bottom:1px solid transparent}
        .project-link:hover{color:var(--cyan);border-color:var(--cyan)}

        /* Contact */
        #contact{background:var(--bg2);padding:7rem 5%}
        #contact .inner{max-width:1400px;margin:0 auto}
        .contact-grid{display:grid;grid-template-columns:1fr 1.5fr;gap:5rem;margin-top:4rem}
        .contact-info-item{display:flex;align-items:flex-start;gap:1.2rem;margin-bottom:2rem}
        .contact-icon{width:44px;height:44px;background:var(--cyan-dim);border:1px solid rgba(0,245,255,.3);display:flex;align-items:center;justify-content:center;color:var(--cyan);flex-shrink:0;font-size:1rem}
        .contact-info-label{font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--cyan);letter-spacing:2px;margin-bottom:.3rem}
        .contact-info-val{color:var(--text);font-size:.95rem}
        .contact-info-val a{color:var(--text);text-decoration:none;transition:color .3s}
        .contact-info-val a:hover{color:var(--cyan)}
        .form-group{margin-bottom:1.5rem;position:relative}
        .form-group input,.form-group textarea{width:100%;background:var(--bg3);border:1px solid var(--border);color:var(--text);padding:1rem 1.2rem;font-family:'DM Sans',sans-serif;font-size:.95rem;transition:all .3s;outline:none}
        .form-group input:focus,.form-group textarea:focus{border-color:var(--cyan);box-shadow:0 0 15px var(--cyan-dim)}
        .form-group textarea{min-height:140px;resize:vertical}
        .form-group label{position:absolute;left:1.2rem;top:1rem;color:var(--text-muted);font-size:.9rem;transition:all .3s;pointer-events:none;background:var(--bg3);padding:0 .3rem}
        .form-group input:focus~label,.form-group input:not(:placeholder-shown)~label,
        .form-group textarea:focus~label,.form-group textarea:not(:placeholder-shown)~label{top:-.6rem;font-size:.75rem;color:var(--cyan)}
        .toast{position:fixed;bottom:2rem;right:2rem;background:var(--bg3);border:1px solid var(--cyan);color:var(--text);padding:1rem 1.5rem;font-family:'DM Sans',sans-serif;z-index:1000;transform:translateY(100px);opacity:0;transition:all .4s}
        .toast.show{transform:translateY(0);opacity:1}
        .toast.error{border-color:#ff4444;color:#ff4444}

        /* Footer */
        footer{background:var(--bg);border-top:1px solid var(--border);padding:3rem 5%;text-align:center}
        .footer-inner{max-width:1400px;margin:0 auto}
        .footer-logo{font-family:'Syne',sans-serif;font-size:1.8rem;font-weight:800;color:var(--cyan);margin-bottom:1rem}
        .footer-social{display:flex;gap:1.5rem;justify-content:center;margin-bottom:1.5rem}
        .footer-social a{color:var(--text-muted);font-size:1.1rem;transition:all .3s;width:40px;height:40px;border:1px solid var(--border);display:flex;align-items:center;justify-content:center}
        .footer-social a:hover{color:var(--cyan);border-color:var(--cyan);box-shadow:0 0 15px var(--cyan-dim)}
        .footer-copy{font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--text-muted)}

        /* Mobile */
        @media(max-width:1024px){.hero-content{grid-template-columns:1fr;text-align:center}.hero-greeting{justify-content:center}.hero-tagline{margin:0 auto 2.5rem}.hero-btns{justify-content:center}.hero-social{justify-content:center}.hero-img-wrap{order:-1}.hero-avatar{width:220px;height:220px}.about-grid{grid-template-columns:1fr}.contact-grid{grid-template-columns:1fr}}
        @media(max-width:768px){nav{padding:.8rem 5%}.nav-links,.nav-cta{display:none}.nav-hamburger{display:flex}.nav-links.open{display:flex;flex-direction:column;position:absolute;top:100%;left:0;right:0;background:rgba(10,10,11,.95);padding:1.5rem;border-bottom:1px solid var(--border)}.skills-grid,.edu-grid,.cert-grid{grid-template-columns:1fr}.timeline{padding-left:1.5rem}.timeline-dot{left:-1.9rem}}
    </style>
</head>
<body>

<!-- Custom Cursor -->
<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- Loader -->
<div id="loader">
    <div class="loader-text">VK.</div>
    <div class="loader-bar"><div class="loader-bar-fill"></div></div>
</div>

<!-- Navigation -->
<nav id="navbar">
    <div class="nav-inner">
        <a href="#hero" class="nav-logo">VK<span>.</span></a>
        <ul class="nav-links" id="navLinks">
            <li><a href="#about" data-num="01" class="nav-link">About</a></li>
            <li><a href="#skills" data-num="02" class="nav-link">Skills</a></li>
            <li><a href="#experience" data-num="03" class="nav-link">Experience</a></li>
            <li><a href="#projects" data-num="04" class="nav-link">Projects</a></li>
            <li><a href="#contact" data-num="05" class="nav-link">Contact</a></li>
        </ul>
        <a href="{{ route('resume.download') }}" class="nav-cta">Download CV</a>
        <button class="nav-hamburger" id="hamburger" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- HERO -->
<section id="hero">
    <canvas id="matrix-canvas"></canvas>
    <div class="hero-content">
        <div class="hero-text">
            <div class="hero-greeting">Hello, World!</div>
            <h1 class="hero-name">
                <span class="first">VIKASH</span><br>
                <span class="last">KUMAR</span>
            </h1>
            <div class="hero-role">
                <span id="typewriter"></span><span class="cursor-blink">|</span>
            </div>
            <p class="hero-tagline">Building scalable web applications & government-grade CMS solutions with precision and performance.</p>
            <div class="hero-btns">
                <a href="{{ route('resume.download') }}" class="btn-primary"><i class="fas fa-download"></i> Download Resume</a>
                <a href="#projects" class="btn-outline"><i class="fas fa-code"></i> View Projects</a>
                <a href="#contact" class="btn-ghost"><i class="fas fa-envelope"></i> Hire Me</a>
            </div>
            <div class="hero-social">
                <a href="https://github.com/Vikashgupta95239" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
                <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                <a href="mailto:vikashkumarbth381@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
        <div class="hero-img-wrap">
            <div class="hero-avatar">
                <div class="hero-avatar-placeholder">
                    @if($admin?->photo)
                        <img src="{{ Storage::url($admin->photo) }}" alt="Vikash Kumar">
                    @else
                        <i class="fas fa-user"></i>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <span>SCROLL</span>
        <div class="scroll-line"></div>
    </div>
</section>

<!-- ABOUT -->
<section id="about">
    <div class="reveal">
        <div class="section-label">Who I Am</div>
        <h2 class="section-title">About <span>Me</span></h2>
    </div>
    <div class="about-grid">
        <div class="about-img-col reveal">
            <div class="about-photo">
                <div class="about-photo-placeholder"><i class="fas fa-terminal"></i></div>
            </div>
            <div class="about-deco"></div>
            <div class="about-stats">
                <div class="stat-box">
                    <div class="stat-num" data-target="2">0</div>
                    <div class="stat-label">Years Exp.</div>
                </div>
                <div class="stat-box">
                    <div class="stat-num" data-target="10">0</div>
                    <div class="stat-label">Projects</div>
                </div>
                <div class="stat-box">
                    <div class="stat-num" data-target="3">0</div>
                    <div class="stat-label">Companies</div>
                </div>
                <div class="stat-box">
                    <div class="stat-num" data-target="6">0</div>
                    <div class="stat-label">Certificates</div>
                </div>
            </div>
        </div>
        <div class="about-text reveal">
            <div class="section-label">Professional Summary</div>
            <h3 class="section-title" style="font-size:2rem">Dedicated <span>Laravel</span> Developer</h3>
            <p>{{ $admin?->bio ?? 'Dedicated Laravel Developer with 2+ years of experience in building scalable web applications and CMS solutions. Skilled in REST API integration, database design, backend performance optimization, and delivering secure government and enterprise-level projects (GIGW, DBIM 3.0).' }}</p>
            <p>I thrive at the intersection of clean code and real-world impact — from ministry-level government portals to high-performance API architectures. Every line I write is intentional, maintainable, and built to last.</p>
            <div class="section-label" style="margin-top:2rem">Key Strengths</div>
            <div class="strengths">
                <span class="strength-tag">Problem Solving</span>
                <span class="strength-tag">Team Collaboration</span>
                <span class="strength-tag">REST API Design</span>
                <span class="strength-tag">GIGW Compliance</span>
                <span class="strength-tag">Accessibility (WCAG)</span>
                <span class="strength-tag">Database Optimization</span>
                <span class="strength-tag">Quick Learner</span>
                <span class="strength-tag">Deadline-Oriented</span>
            </div>
        </div>
    </div>
</section>

<!-- SKILLS -->
<div id="skills">
<section class="inner">
    <div class="reveal">
        <div class="section-label">Tech Stack</div>
        <h2 class="section-title">My <span>Skills</span></h2>
    </div>
    <div class="skills-grid">
        <div class="skill-card reveal">
            <div class="skill-cat-icon"><i class="fas fa-server"></i></div>
            <div class="skill-cat">BACKEND</div>
            <div class="skill-items">
                <div class="skill-item"><label>PHP <span>92%</span></label><div class="skill-bar"><div class="skill-fill" data-width="92"></div></div></div>
                <div class="skill-item"><label>Laravel <span>90%</span></label><div class="skill-bar"><div class="skill-fill" data-width="90"></div></div></div>
                <div class="skill-item"><label>CakePHP <span>75%</span></label><div class="skill-bar"><div class="skill-fill" data-width="75"></div></div></div>
            </div>
        </div>
        <div class="skill-card reveal">
            <div class="skill-cat-icon"><i class="fas fa-paint-brush"></i></div>
            <div class="skill-cat">FRONTEND</div>
            <div class="skill-items">
                <div class="skill-item"><label>HTML/CSS <span>88%</span></label><div class="skill-bar"><div class="skill-fill" data-width="88"></div></div></div>
                <div class="skill-item"><label>JavaScript/jQuery <span>80%</span></label><div class="skill-bar"><div class="skill-fill" data-width="80"></div></div></div>
                <div class="skill-item"><label>Bootstrap/AJAX <span>85%</span></label><div class="skill-bar"><div class="skill-fill" data-width="85"></div></div></div>
            </div>
        </div>
        <div class="skill-card reveal">
            <div class="skill-cat-icon"><i class="fas fa-database"></i></div>
            <div class="skill-cat">DATABASE</div>
            <div class="skill-items">
                <div class="skill-item"><label>MySQL <span>88%</span></label><div class="skill-bar"><div class="skill-fill" data-width="88"></div></div></div>
                <div class="skill-item"><label>Database Design <span>82%</span></label><div class="skill-bar"><div class="skill-fill" data-width="82"></div></div></div>
                <div class="skill-item"><label>Query Optimization <span>78%</span></label><div class="skill-bar"><div class="skill-fill" data-width="78"></div></div></div>
            </div>
        </div>
        <div class="skill-card reveal">
            <div class="skill-cat-icon"><i class="fas fa-tools"></i></div>
            <div class="skill-cat">TOOLS & PRACTICES</div>
            <div class="skill-items">
                <div class="skill-item"><label>Git / Version Control <span>85%</span></label><div class="skill-bar"><div class="skill-fill" data-width="85"></div></div></div>
                <div class="skill-item"><label>REST APIs <span>90%</span></label><div class="skill-bar"><div class="skill-fill" data-width="90"></div></div></div>
                <div class="skill-item"><label>GIGW / WCAG Compliance <span>80%</span></label><div class="skill-bar"><div class="skill-fill" data-width="80"></div></div></div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- EXPERIENCE -->
<section id="experience">
    <div class="reveal">
        <div class="section-label">Career Journey</div>
        <h2 class="section-title">Work <span>Experience</span></h2>
    </div>
    <div class="timeline">
        @foreach($experiences as $exp)
        <div class="timeline-item reveal">
            <div class="timeline-dot {{ $exp->is_current ? 'current' : '' }}"></div>
            <div class="timeline-card">
                <div class="timeline-period">{{ $exp->duration }}</div>
                <div class="timeline-title">
                    {{ $exp->title }}
                    @if($exp->is_current)<span class="current-badge">CURRENT</span>@endif
                </div>
                <div class="timeline-company"><i class="fas fa-building"></i> {{ $exp->company }}</div>
                <div class="timeline-location"><i class="fas fa-map-marker-alt"></i> {{ $exp->location }}</div>
                <ul class="timeline-list">
                    @foreach($exp->responsibilities as $r)
                        <li>{{ $r }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- EDUCATION -->
<section id="education" style="background:var(--bg2);padding:7rem 5%">
<div style="max-width:1400px;margin:0 auto">
    <div class="reveal">
        <div class="section-label">Academic Background</div>
        <h2 class="section-title">My <span>Education</span></h2>
    </div>
    <div class="edu-grid">
        <div class="edu-card reveal">
            <div class="edu-icon"><i class="fas fa-graduation-cap"></i></div>
            <div class="edu-degree">B.Tech. — Computer Science Engineering</div>
            <div class="edu-school">Sagar Group of Institutions</div>
            <div class="edu-year"><i class="fas fa-calendar"></i> July 2020 – June 2024 · Bhopal, India</div>
            <div class="edu-score">CGPA: 8.33</div>
        </div>
        <div class="edu-card reveal">
            <div class="edu-icon"><i class="fas fa-school"></i></div>
            <div class="edu-degree">Intermediate (Science)</div>
            <div class="edu-school">MJK College Bettiah</div>
            <div class="edu-year"><i class="fas fa-calendar"></i> June 2018 – May 2020 · Bettiah, India</div>
            <div class="edu-score">76.20%</div>
        </div>
        <div class="edu-card reveal">
            <div class="edu-icon"><i class="fas fa-book"></i></div>
            <div class="edu-degree">Class X</div>
            <div class="edu-school">Alok Bharati Bettiah</div>
            <div class="edu-year"><i class="fas fa-calendar"></i> June 2018 · Bettiah, India</div>
            <div class="edu-score">75.80%</div>
        </div>
    </div>
</div>
</section>

<!-- CERTIFICATIONS -->
<div id="certifications">
<section class="inner">
    <div class="reveal">
        <div class="section-label">Credentials</div>
        <h2 class="section-title">My <span>Certifications</span></h2>
    </div>
    <div class="cert-grid">
        @foreach($certifications as $cert)
        <div class="cert-card reveal">
            <div class="cert-icon"><i class="fas fa-{{ $cert->icon ?? 'award' }}"></i></div>
            <div class="cert-title">{{ $cert->title }}</div>
            <div class="cert-issuer">{{ $cert->issuer }}</div>
            @if($cert->certificate_url)
                <a href="{{ $cert->certificate_url }}" target="_blank" class="cert-btn"><i class="fas fa-external-link-alt"></i> View Certificate</a>
            @endif
        </div>
        @endforeach
    </div>
</section>
</div>

<!-- PROJECTS -->
<section id="projects">
    <div class="reveal">
        <div class="section-label">Portfolio</div>
        <h2 class="section-title">My <span>Projects</span></h2>
    </div>
    <div class="filter-bar">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="laravel">Laravel</button>
        <button class="filter-btn" data-filter="php">PHP</button>
        <button class="filter-btn" data-filter="api">API</button>
        <button class="filter-btn" data-filter="government">Government</button>
    </div>
    <div class="projects-grid" id="projectsGrid">
        @foreach($projects as $project)
        <div class="project-card reveal" data-category="{{ $project->category }}">
            <div class="project-thumb">
                @if($project->thumbnail)
                    <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" style="width:100%;height:100%;object-fit:cover">
                @else
                    <div class="project-thumb-placeholder"><i class="fas fa-code"></i></div>
                @endif
                <div class="project-thumb-overlay"></div>
            </div>
            <div class="project-body">
                <div class="project-cat">{{ strtoupper($project->category) }}</div>
                <h3 class="project-title">{{ $project->title }}</h3>
                <p class="project-desc">{{ $project->short_description }}</p>
                <div class="tech-badges">
                    @foreach($project->tech_stack as $tech)
                        <span class="tech-badge">{{ $tech }}</span>
                    @endforeach
                </div>
                <div class="project-links">
                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="project-link"><i class="fab fa-github"></i> GitHub</a>
                    @endif
                    @if($project->live_url)
                        <a href="{{ $project->live_url }}" target="_blank" class="project-link"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- CONTACT -->
<div id="contact">
<section class="inner">
    <div class="reveal">
        <div class="section-label">Get In Touch</div>
        <h2 class="section-title">Contact <span>Me</span></h2>
    </div>
    <div class="contact-grid">
        <div class="reveal">
            <div class="contact-info-item">
                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                <div>
                    <div class="contact-info-label">EMAIL</div>
                    <div class="contact-info-val"><a href="mailto:vikashkumarbth381@gmail.com">vikashkumarbth381@gmail.com</a></div>
                </div>
            </div>
            <div class="contact-info-item">
                <div class="contact-icon"><i class="fas fa-phone"></i></div>
                <div>
                    <div class="contact-info-label">PHONE</div>
                    <div class="contact-info-val"><a href="tel:+919523919654">+91 95239 19654</a></div>
                </div>
            </div>
            <div class="contact-info-item">
                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <div class="contact-info-label">LOCATION</div>
                    <div class="contact-info-val">New Delhi, India</div>
                </div>
            </div>
            <div class="contact-info-item">
                <div class="contact-icon"><i class="fab fa-linkedin"></i></div>
                <div>
                    <div class="contact-info-label">LINKEDIN</div>
                    <div class="contact-info-val"><a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank">vikash-kumar-computer-science</a></div>
                </div>
            </div>
        </div>
        <div class="reveal">
            <form id="contactForm">
                @csrf
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder=" " required>
                    <label for="name">Your Name</label>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder=" " required>
                    <label for="email">Your Email</label>
                </div>
                <div class="form-group">
                    <input type="text" id="subject" name="subject" placeholder=" " required>
                    <label for="subject">Subject</label>
                </div>
                <div class="form-group">
                    <textarea id="message" name="message" placeholder=" " required></textarea>
                    <label for="message">Message</label>
                </div>
                <button type="submit" class="btn-primary" style="width:100%;justify-content:center" id="submitBtn">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
    </div>
</section>
</div>

<!-- Footer -->
<footer>
    <div class="footer-inner">
        <div class="footer-logo">VK.</div>
        <div class="footer-social">
            <a href="https://github.com/Vikashgupta95239" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://linkedin.com/in/vikash-kumar-computer-science" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="mailto:vikashkumarbth381@gmail.com"><i class="fas fa-envelope"></i></a>
        </div>
        <p class="footer-copy">© {{ date('Y') }} Vikash Kumar. Crafted with Laravel & passion. <a href="/admin" style="color:var(--cyan);text-decoration:none">Admin</a></p>
    </div>
</footer>

<div class="toast" id="toast"></div>

<script>
// Loader
window.addEventListener('load',()=>setTimeout(()=>{document.getElementById('loader').classList.add('hidden')},2200));

// Cursor
const cursor=document.getElementById('cursor'),ring=document.getElementById('cursorRing');
let mx=0,my=0,rx=0,ry=0;
document.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY;cursor.style.left=mx-6+'px';cursor.style.top=my-6+'px'});
(function animRing(){rx+=(mx-rx)*.12;ry+=(my-ry)*.12;ring.style.left=rx-20+'px';ring.style.top=ry-20+'px';requestAnimationFrame(animRing)})();
document.querySelectorAll('a,button').forEach(el=>{el.addEventListener('mouseenter',()=>ring.classList.add('hovered'));el.addEventListener('mouseleave',()=>ring.classList.remove('hovered'))});

// Matrix Canvas
const canvas=document.getElementById('matrix-canvas'),ctx=canvas.getContext('2d');
canvas.width=window.innerWidth;canvas.height=window.innerHeight;
window.addEventListener('resize',()=>{canvas.width=window.innerWidth;canvas.height=window.innerHeight});
const chars='LARAVEL PHP MYSQL GIT API CMS 01アイウエオカキクケコ'.split('');
const cols=Math.floor(canvas.width/18);const drops=Array(cols).fill(1);
function drawMatrix(){ctx.fillStyle='rgba(10,10,11,0.05)';ctx.fillRect(0,0,canvas.width,canvas.height);ctx.fillStyle='#00F5FF';ctx.font='14px JetBrains Mono';drops.forEach((y,i)=>{const c=chars[Math.floor(Math.random()*chars.length)];ctx.fillText(c,i*18,y*18);if(y*18>canvas.height&&Math.random()>.975)drops[i]=0;drops[i]++})}
setInterval(drawMatrix,50);

// Typewriter
const roles=['Laravel Developer','PHP Developer','Backend Engineer','API Architect'];
let ri=0,ci=0,del=false;
const tw=document.getElementById('typewriter');
function type(){const word=roles[ri];if(!del){tw.textContent=word.slice(0,++ci);if(ci===word.length){del=true;setTimeout(type,1500);return}}else{tw.textContent=word.slice(0,--ci);if(ci===0){del=false;ri=(ri+1)%roles.length}}setTimeout(type,del?60:100)}
setTimeout(type,1500);

// Navbar scroll
const navbar=document.getElementById('navbar');
window.addEventListener('scroll',()=>{navbar.classList.toggle('scrolled',window.scrollY>50)});

// Hamburger
document.getElementById('hamburger').addEventListener('click',()=>document.getElementById('navLinks').classList.toggle('open'));

// Active nav
const sections=document.querySelectorAll('section[id]');
window.addEventListener('scroll',()=>{let cur='';sections.forEach(s=>{if(window.scrollY>=s.offsetTop-200)cur=s.id});document.querySelectorAll('.nav-link').forEach(a=>{a.classList.toggle('active',a.getAttribute('href')==='#'+cur)})});

// Reveal on scroll
const observer=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('visible');if(e.target.querySelector('.skill-fill')){e.target.querySelectorAll('.skill-fill').forEach(bar=>{bar.style.width=bar.dataset.width+'%'})}if(e.target.querySelector('.stat-num')){e.target.querySelectorAll('.stat-num').forEach(n=>{animateCounter(n,parseInt(n.dataset.target),n.textContent.includes('+'))})}}}),{threshold:.2}});
document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));

// Counter animation
function animateCounter(el,target,plus=false){let c=0;const inc=target/50;const t=setInterval(()=>{c=Math.min(c+inc,target);el.textContent=Math.floor(c)+(plus?'+':'');if(c>=target)clearInterval(t)},30)}

// Project filter
document.querySelectorAll('.filter-btn').forEach(btn=>{btn.addEventListener('click',()=>{document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));btn.classList.add('active');const f=btn.dataset.filter;document.querySelectorAll('.project-card').forEach(c=>{c.style.display=(f==='all'||c.dataset.category===f)?'':'none'})})});

// Contact form
document.getElementById('contactForm').addEventListener('submit',async e=>{e.preventDefault();const btn=document.getElementById('submitBtn');btn.disabled=true;btn.innerHTML='<i class="fas fa-spinner fa-spin"></i> Sending...';const data=new FormData(e.target);try{const r=await fetch('{{ route("contact.send") }}',{method:'POST',headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}','Accept':'application/json'},body:data});const j=await r.json();showToast(j.message,j.success?'success':'error');if(j.success)e.target.reset()}catch(err){showToast('Something went wrong. Please try again.','error')}finally{btn.disabled=false;btn.innerHTML='<i class="fas fa-paper-plane"></i> Send Message'}});

function showToast(msg,type='success'){const t=document.getElementById('toast');t.textContent=msg;t.className='toast'+(type==='error'?' error':'');t.classList.add('show');setTimeout(()=>t.classList.remove('show'),4000)}

// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(a=>{a.addEventListener('click',e=>{e.preventDefault();const el=document.querySelector(a.getAttribute('href'));if(el)el.scrollIntoView({behavior:'smooth'})})});
</script>
</body>
</html>

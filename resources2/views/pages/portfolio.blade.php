<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Vikash Kumar | Laravel Developer</title>
  <meta name="description" content="Portfolio of Vikash Kumar, Laravel Developer and PHP Developer specializing in scalable web apps, CMS, and secure government-grade solutions." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    :root {
      --ink: #0b1016;
      --ink-2: #17202a;
      --muted: #5e6a78;
      --paper: #f6f1ea;
      --clay: #efe6db;
      --moss: #2f6f5e;
      --saffron: #f4a63b;
      --rust: #d46a4c;
      --ocean: #1e5f74;
      --shadow: 0 24px 60px rgba(11, 16, 22, 0.18);
      --radius: 18px;
      --ease: cubic-bezier(.2,.8,.2,1);
    }
    * { box-sizing: border-box; }
    body {
      font-family: "Plus Jakarta Sans", system-ui, sans-serif;
      color: var(--ink);
      background:
        radial-gradient(1200px 600px at 10% 0%, rgba(47, 111, 94, 0.12), transparent 60%),
        radial-gradient(1000px 500px at 90% 10%, rgba(244, 166, 59, 0.12), transparent 60%),
        var(--paper);
    }
    .display { font-family: "Fraunces", serif; }
    .mono { font-family: "JetBrains Mono", monospace; }
    .nav-glass {
      background: rgba(246, 241, 234, 0.85);
      backdrop-filter: blur(14px);
      border-bottom: 1px solid rgba(11,16,22,.08);
    }
    .hero {
      min-height: 92vh;
      display: grid;
      align-items: center;
      padding: 7rem 0 4rem;
      position: relative;
      overflow: hidden;
    }
    .hero::after {
      content: "";
      position: absolute;
      inset: -10% -20% auto -20%;
      height: 60%;
      background:
        radial-gradient(400px 400px at 20% 50%, rgba(212, 106, 76, 0.18), transparent 60%),
        radial-gradient(300px 300px at 80% 40%, rgba(30, 95, 116, 0.18), transparent 60%);
      z-index: 0;
    }
    .hero-card {
      background: linear-gradient(135deg, #fff, var(--clay));
      border-radius: var(--radius);
      padding: 2.6rem;
      box-shadow: var(--shadow);
      border: 1px solid rgba(11,16,22,.06);
      position: relative;
      z-index: 1;
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      background: rgba(47,111,94,.12);
      color: var(--moss);
      border: 1px solid rgba(47,111,94,.2);
      padding: .4rem .9rem;
      border-radius: 999px;
      font-size: .75rem;
      letter-spacing: .12rem;
      text-transform: uppercase;
    }
    .pulse {
      width: 8px; height: 8px; border-radius: 50%;
      background: var(--moss);
      box-shadow: 0 0 0 6px rgba(47,111,94,.18);
      animation: pulse 1.8s ease-in-out infinite;
    }
    @keyframes pulse { 0%,100% { transform: scale(1); } 50% { transform: scale(1.3); } }
    .hero-title { font-size: clamp(2.8rem, 5vw, 4.6rem); line-height: 1.05; }
    .hero-sub { color: var(--muted); font-size: 1.05rem; }
    .btn-brand {
      background: linear-gradient(135deg, var(--moss), var(--saffron));
      border: none; color: var(--ink); font-weight: 700;
      box-shadow: 0 12px 30px rgba(47,111,94,.25);
    }
    .btn-ghost { border: 1px solid rgba(11,16,22,.15); color: var(--ink); }
    .hero-visual {
      position: relative;
      border-radius: var(--radius);
      overflow: hidden;
      min-height: 420px;
      box-shadow: var(--shadow);
      background:
        linear-gradient(120deg, rgba(11,16,22,.08), transparent 40%),
        radial-gradient(260px 260px at 80% 20%, rgba(47,111,94,.35), transparent 60%),
        radial-gradient(220px 220px at 20% 80%, rgba(244,166,59,.35), transparent 60%),
        #ffffff;
    }
    .hero-visual-content {
      position: absolute; inset: 0; z-index: 2;
      display: grid; place-items: center;
      text-align: center; padding: 2rem;
    }
    .portrait {
      width: 140px; height: 140px; border-radius: 24px;
      background: linear-gradient(135deg, var(--moss), var(--saffron));
      display: grid; place-items: center;
      font-size: 2.3rem; color: #fff; font-weight: 700;
      box-shadow: 0 14px 36px rgba(11,16,22,.2);
      transform: rotate(-2deg);
    }
    .stat {
      padding: 1rem 1.2rem; border-radius: 14px;
      background: #fff; border: 1px solid rgba(11,16,22,.07);
      box-shadow: var(--shadow);
    }
    .section { padding: 5rem 0; }
    .section-title { font-size: clamp(2.1rem, 4vw, 3.1rem); margin-bottom: .9rem; }
    .card-soft {
      border: 1px solid rgba(11,16,22,.08);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      background: #fff;
    }
    .skill-chip {
      padding: .5rem .9rem;
      background: rgba(47,111,94,.12);
      border: 1px solid rgba(47,111,94,.2);
      border-radius: 999px;
      font-size: .85rem;
    }
    .timeline {
      border-left: 2px dashed rgba(11,16,22,.2);
      padding-left: 1.5rem;
    }
    .timeline-item { position: relative; padding-bottom: 1.8rem; }
    .timeline-item::before {
      content: "";
      position: absolute;
      left: -11px; top: 4px;
      width: 14px; height: 14px; border-radius: 50%;
      background: var(--moss);
      box-shadow: 0 0 0 6px rgba(47,111,94,.15);
    }
    .project-img {
      border-top-left-radius: var(--radius);
      border-top-right-radius: var(--radius);
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .contact-box {
      background: linear-gradient(135deg, #fff, var(--clay));
      border: 1px solid rgba(11,16,22,.08);
      border-radius: var(--radius);
      padding: 2rem;
      box-shadow: var(--shadow);
    }
    .footer {
      background: var(--ink-2);
      color: #e8eef6;
      padding: 2.5rem 0;
    }
    .footer a { color: #e8eef6; text-decoration: none; }
    .reveal { opacity: 0; transform: translateY(20px); transition: all .6s var(--ease); }
    .reveal.in { opacity: 1; transform: translateY(0); }
    .tag {
      display: inline-flex; align-items: center; gap: .5rem;
      padding: .3rem .7rem; border-radius: 999px;
      border: 1px solid rgba(11,16,22,.12);
      background: rgba(255,255,255,.8);
      font-size: .75rem;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top nav-glass">
    <div class="container">
      <a class="navbar-brand fw-bold display" href="#top">VK</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="nav" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto gap-lg-3">
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
          <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
          <li class="nav-item"><a class="nav-link" href="#education">Education</a></li>
          <li class="nav-item"><a class="nav-link" href="#certs">Certifications</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <header id="top" class="container hero">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6">
        <div class="hero-card reveal">
          <div class="hero-badge mb-3"><span class="pulse"></span> Open to opportunities</div>
          <h1 class="hero-title display">Vikash Kumar</h1>
          <p class="mono text-uppercase small mb-2">Laravel Developer · PHP Developer</p>
          <p class="hero-sub mb-4">
            Dedicated Laravel Developer with 2+ years of experience building scalable web applications
            and CMS solutions. Strong in REST API integration, database design, and performance optimization
            with secure government and enterprise-grade delivery (GIGW, DBIM 3.0).
          </p>
          <div class="d-flex flex-wrap gap-2">
            <a href="#experience" class="btn btn-brand px-4 py-2">View Experience</a>
            <a href="#contact" class="btn btn-ghost px-4 py-2">Contact</a>
          </div>
          <div class="row mt-4 g-3">
            <div class="col-6 col-md-4">
              <div class="stat text-center">
                <div class="fs-4 fw-bold">2+ yrs</div>
                <div class="text-muted small">Experience</div>
              </div>
            </div>
            <div class="col-6 col-md-4">
              <div class="stat text-center">
                <div class="fs-4 fw-bold">Gov-Grade</div>
                <div class="text-muted small">Compliance</div>
              </div>
            </div>
            <div class="col-6 col-md-4">
              <div class="stat text-center">
                <div class="fs-4 fw-bold">APIs</div>
                <div class="text-muted small">Integration</div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-wrap gap-2 mt-4">
            <span class="tag mono">New Delhi, India</span>
            <span class="tag mono">+91 95239 19654</span>
            <span class="tag mono">vikashkumarbth381@gmail.com</span>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="hero-visual reveal">
          <div class="hero-visual-content">
            <div class="portrait">VK</div>
            <div class="mt-3">
              <div class="fw-bold">Backend · CMS · APIs</div>
              <div class="text-muted">Laravel • PHP • MySQL</div>
            </div>
            <div class="d-flex gap-2 mt-3 flex-wrap justify-content-center">
              <span class="tag mono">GIGW</span>
              <span class="tag mono">DBIM 3.0</span>
              <span class="tag mono">Security</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="about" class="section">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6 reveal">
          <h2 class="section-title display">Professional Summary</h2>
          <p>
            Dedicated Laravel Developer with 2+ years of experience in building scalable web applications
            and CMS solutions. Skilled in REST API integration, database design, backend performance optimization,
            and delivering secure government and enterprise-level projects (GIGW, DBIM 3.0).
          </p>
          <div class="d-flex flex-wrap gap-2 mt-3">
            <span class="skill-chip">REST API Integration</span>
            <span class="skill-chip">Database Design</span>
            <span class="skill-chip">Performance Optimization</span>
            <span class="skill-chip">Secure Delivery</span>
          </div>
        </div>
        <div class="col-lg-6 reveal">
          <div class="card-soft p-4">
            <h5 class="fw-bold">Strengths</h5>
            <ul class="mb-0">
              <li>Strong problem-solving and analytical skills</li>
              <li>Excellent communication and teamwork abilities</li>
              <li>Adaptable and quick learner with attention to detail</li>
              <li>Work under pressure and meet deadlines</li>
              <li>Proficient in PHP, Laravel, CakePHP, HTML, CSS, JavaScript</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="skills" class="section bg-white">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4 reveal">
          <h2 class="section-title display">Skills</h2>
          <p class="text-muted">A strong backend core with full-stack collaboration tools.</p>
        </div>
        <div class="col-lg-8 reveal">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Backend</div>
                <div class="text-muted small">PHP, Laravel, CakePHP</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Frontend</div>
                <div class="text-muted small">HTML, CSS, JavaScript, Bootstrap</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Database</div>
                <div class="text-muted small">MySQL, schema design, optimization</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Tools</div>
                <div class="text-muted small">Git, jQuery, AJAX, Problem-Solving</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Collaboration</div>
                <div class="text-muted small">Teamwork, adaptability, communication</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Compliance</div>
                <div class="text-muted small">GIGW, DBIM 3.0, security audits</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="experience" class="section">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-5 reveal">
          <h2 class="section-title display">Experience</h2>
          <p class="text-muted">Hands-on backend delivery in enterprise and government environments.</p>
        </div>
        <div class="col-lg-7 reveal">
          <div class="timeline">
            <div class="timeline-item">
              <div class="fw-bold">PHP Developer</div>
              <div class="text-muted">ABM Knowledgeware Ltd · India · Jan 2026 - Present</div>
              <ul class="mb-0">
                <li>Backend development, bug fixing, and feature enhancements</li>
                <li>Collaborated to deliver scalable and maintainable solutions</li>
                <li>Worked on web-based applications end-to-end</li>
              </ul>
            </div>
            <div class="timeline-item">
              <div class="fw-bold">Jr. PHP / Laravel Developer</div>
              <div class="text-muted">Silver Touch Technologies Ltd. · New Delhi · Jan 2024 - Dec 2025</div>
              <ul class="mb-0">
                <li>Completed 6 months professional training in PHP and Laravel</li>
                <li>Delivered government websites with GIGW and DBIM 3.0 compliance</li>
                <li>Handled requirements, client meetings, and deployments</li>
                <li>Resolved accessibility, STQC, and security audit issues</li>
                <li>Built and optimized backend CMS modules</li>
                <li>Integrated APIs with government and third-party services</li>
              </ul>
            </div>
            <div class="timeline-item">
              <div class="fw-bold">Web Development Intern</div>
              <div class="text-muted">iNeuron Intelligence Pvt Ltd · Bangalore · Jul 2023 - Dec 2023</div>
              <ul class="mb-0">
                <li>Assisted in UI component development</li>
                <li>Supported bug fixes, maintenance, and minor feature updates</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="education" class="section bg-white">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-5 reveal">
          <h2 class="section-title display">Education</h2>
          <p class="text-muted">Academic foundation in computer science.</p>
        </div>
        <div class="col-lg-7 reveal">
          <div class="card-soft p-4">
            <div class="fw-bold">B.Tech – Computer Science Engineering</div>
            <div class="text-muted">Sagar Group of Institutions · Bhopal</div>
            <div class="mt-2">July 2020 - June 2024 · CGPA: 8.33</div>
          </div>
          <div class="card-soft p-4 mt-3">
            <div class="fw-bold">Intermediate</div>
            <div class="text-muted">MJK College Bettiah · Bettiah</div>
            <div class="mt-2">June 2018 - May 2020 · 76.20%</div>
          </div>
          <div class="card-soft p-4 mt-3">
            <div class="fw-bold">Class X (State Board)</div>
            <div class="text-muted">Alok Bharati Bettiah · Bettiah</div>
            <div class="mt-2">June 2018 · 75.80%</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="certs" class="section">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-5 reveal">
          <h2 class="section-title display">Certifications</h2>
          <p class="text-muted">Continuous learning focused on full-stack and backend excellence.</p>
        </div>
        <div class="col-lg-7 reveal">
          <div class="card-soft p-4">
            <ul class="mb-0">
              <li>Full Stack Web Development — Internshala</li>
              <li>The SQL Programming Essentials — Udemy</li>
              <li>Master Laravel 2025: From Zero to Pro — Udemy</li>
              <li>Data Structures and Algorithms (C++) — iNeuron</li>
              <li>Master Prompt Strategies to Communicate with AI — Udemy</li>
              <li>Master ChatGPT to Enhance Creativity and Productivity — Udemy</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="section">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6 reveal">
          <h2 class="section-title display">Contact</h2>
          <p class="text-muted">Open to backend opportunities and collaborations.</p>
          <div class="contact-box">
            <div class="mb-2"><span class="mono small">Email</span> • vikashkumarbth381@gmail.com</div>
            <div class="mb-2"><span class="mono small">Phone</span> • +91 95239 19654</div>
            <div class="mb-2"><span class="mono small">Location</span> • New Delhi, India</div>
            <div class="mb-2"><span class="mono small">LinkedIn</span> • linkedin.com/in/vikash-kumar-computer-science</div>
            <div class="mb-0"><span class="mono small">GitHub</span> • github.com/Vikashgupta95239</div>
          </div>
        </div>
        <div class="col-lg-6 reveal">
          <div class="card-soft p-4">
            <div class="fw-bold mb-3">Quick Message</div>
            <form>
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Your name" />
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="you@email.com" />
              </div>
              <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea rows="4" class="form-control" placeholder="Tell me about your project"></textarea>
              </div>
              <button type="button" class="btn btn-brand w-100">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
      <div class="display fw-bold">Vikash Kumar</div>
      <div class="mono small">Laravel Developer · PHP Developer</div>
      <div class="small">© {{ date('Y') }} All rights reserved.</div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });
    reveals.forEach(el => observer.observe(el));

    document.querySelectorAll('a[href^="#"]').forEach(link => {
      link.addEventListener('click', (e) => {
        const target = document.querySelector(link.getAttribute('href'));
        if (!target) return;
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
      });
    });
  </script>
</body>
</html>

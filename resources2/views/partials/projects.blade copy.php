<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Vikash Kumar | Backend Developer</title>
  <meta name="description" content="Portfolio of Vikash Kumar, backend developer specializing in Laravel, PHP, APIs, and database design." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700;800&family=Playfair+Display:wght@500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    :root {
      --ink: #0b0f14;
      --slate: #233244;
      --muted: #6b7a90;
      --paper: #f6f2ea;
      --sand: #efe6da;
      --teal: #0fb6a6;
      --amber: #ffb347;
      --copper: #e07a5f;
      --shadow: 0 20px 60px rgba(11, 15, 20, 0.15);
      --radius: 18px;
      --ease: cubic-bezier(.2,.8,.2,1);
    }
    * { box-sizing: border-box; }
    body {
      font-family: "Manrope", system-ui, sans-serif;
      color: var(--ink);
      background:
        radial-gradient(1200px 600px at 10% 10%, rgba(15, 182, 166, 0.08), transparent 60%),
        radial-gradient(900px 500px at 90% 20%, rgba(255, 179, 71, 0.08), transparent 60%),
        var(--paper);
    }
    .brand-serif { font-family: "Playfair Display", serif; }
    .mono { font-family: "JetBrains Mono", monospace; }
    .nav-blur {
      backdrop-filter: blur(12px);
      background: rgba(246, 242, 234, 0.8);
      border-bottom: 1px solid rgba(11, 15, 20, 0.08);
    }
    .hero {
      min-height: 92vh;
      display: grid;
      align-items: center;
      padding: 7rem 0 4rem;
    }
    .hero-card {
      background: linear-gradient(135deg, #ffffff, var(--sand));
      border-radius: var(--radius);
      padding: 2.5rem;
      box-shadow: var(--shadow);
      border: 1px solid rgba(11, 15, 20, 0.06);
    }
    .hero-badge {
      background: rgba(15, 182, 166, 0.1);
      color: var(--teal);
      border: 1px solid rgba(15, 182, 166, 0.2);
      padding: .4rem .9rem;
      border-radius: 999px;
      font-size: .75rem;
      letter-spacing: .12rem;
      text-transform: uppercase;
      display: inline-flex;
      align-items: center;
      gap: .5rem;
    }
    .pulse {
      width: 8px; height: 8px; border-radius: 50%;
      background: var(--teal);
      box-shadow: 0 0 0 6px rgba(15, 182, 166, 0.15);
      animation: pulse 1.8s ease-in-out infinite;
    }
    @keyframes pulse { 0%,100% { transform: scale(1); } 50% { transform: scale(1.3); } }
    .hero-title { font-size: clamp(2.6rem, 5vw, 4.4rem); line-height: 1.05; }
    .hero-sub { color: var(--muted); font-size: 1.05rem; }
    .btn-brand {
      background: linear-gradient(135deg, var(--teal), var(--amber));
      border: none; color: var(--ink);
      font-weight: 700;
      box-shadow: 0 12px 30px rgba(15, 182, 166, 0.25);
    }
    .btn-ghost { border: 1px solid rgba(11,15,20,.15); color: var(--ink); }
    .hero-visual {
      position: relative;
      border-radius: var(--radius);
      overflow: hidden;
      background: linear-gradient(135deg, rgba(15,182,166,.15), rgba(255,179,71,.2));
      min-height: 420px;
      box-shadow: var(--shadow);
    }
    .hero-visual::after {
      content: "";
      position: absolute;
      inset: 14px;
      border-radius: 14px;
      background:
        linear-gradient(120deg, rgba(11,15,20,.08), transparent 40%),
        radial-gradient(240px 240px at 80% 20%, rgba(15,182,166,.35), transparent 60%),
        radial-gradient(200px 200px at 20% 80%, rgba(224,122,95,.35), transparent 60%),
        #fff;
    }
    .hero-visual-content {
      position: absolute; inset: 0; z-index: 2;
      display: grid; place-items: center;
      text-align: center; padding: 2rem;
    }
    .initials {
      width: 120px; height: 120px; border-radius: 50%;
      background: linear-gradient(135deg, var(--teal), var(--amber));
      display: grid; place-items: center;
      font-size: 2.2rem; color: #fff; font-weight: 700;
      box-shadow: 0 12px 30px rgba(11,15,20,.2);
    }
    .stat {
      padding: 1rem 1.2rem; border-radius: 14px;
      background: #fff; border: 1px solid rgba(11,15,20,.07);
      box-shadow: var(--shadow);
    }
    .section {
      padding: 5rem 0;
    }
    .section-title {
      font-size: clamp(2rem, 4vw, 3rem);
      margin-bottom: 1rem;
    }
    .card-soft {
      border: 1px solid rgba(11,15,20,.08);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      background: #fff;
    }
    .skill-chip {
      padding: .5rem .9rem;
      background: rgba(15,182,166,.1);
      border: 1px solid rgba(15,182,166,.2);
      border-radius: 999px;
      font-size: .85rem;
    }
    .timeline {
      border-left: 2px dashed rgba(11,15,20,.2);
      padding-left: 1.5rem;
    }
    .timeline-item { position: relative; padding-bottom: 1.8rem; }
    .timeline-item::before {
      content: "";
      position: absolute;
      left: -11px; top: 4px;
      width: 14px; height: 14px; border-radius: 50%;
      background: var(--teal);
      box-shadow: 0 0 0 6px rgba(15,182,166,.15);
    }
    .project-img {
      border-top-left-radius: var(--radius);
      border-top-right-radius: var(--radius);
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .contact-box {
      background: linear-gradient(135deg, #fff, var(--sand));
      border: 1px solid rgba(11,15,20,.08);
      border-radius: var(--radius);
      padding: 2rem;
      box-shadow: var(--shadow);
    }
    .footer {
      background: var(--slate);
      color: #e8eef6;
      padding: 2.5rem 0;
    }
    .footer a { color: #e8eef6; text-decoration: none; }
    .reveal { opacity: 0; transform: translateY(20px); transition: all .6s var(--ease); }
    .reveal.in { opacity: 1; transform: translateY(0); }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top nav-blur">
    <div class="container">
      <a class="navbar-brand fw-bold brand-serif" href="#top">VK</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="nav" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto gap-lg-3">
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
          <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
          <li class="nav-item"><a class="nav-link" href="#education">Education</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <header id="top" class="container hero">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6">
        <div class="hero-card reveal">
          <div class="hero-badge mb-3"><span class="pulse"></span> Available for backend roles</div>
          <h1 class="hero-title brand-serif">Vikash Kumar</h1>
          <p class="mono text-uppercase small mb-2">Laravel | PHP | REST APIs | MySQL</p>
          <p class="hero-sub mb-4">
            Backend developer focused on fast, secure, and scalable web systems.
            I build clean APIs, efficient databases, and reliable deployments that feel effortless to users.
          </p>
          <div class="d-flex flex-wrap gap-2">
            <a href="#projects" class="btn btn-brand px-4 py-2">View Projects</a>
            <a href="#contact" class="btn btn-ghost px-4 py-2">Hire Me</a>
          </div>
          <div class="row mt-4 g-3">
            <div class="col-6 col-md-4">
              <div class="stat text-center">
                <div class="fs-4 fw-bold">30+</div>
                <div class="text-muted small">APIs built</div>
              </div>
            </div>
            <div class="col-6 col-md-4">
              <div class="stat text-center">
                <div class="fs-4 fw-bold">2+ yrs</div>
                <div class="text-muted small">Experience</div>
              </div>
            </div>
            <div class="col-6 col-md-4">
              <div class="stat text-center">
                <div class="fs-4 fw-bold">15+</div>
                <div class="text-muted small">Live projects</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="hero-visual reveal">
          <div class="hero-visual-content">
            <div class="initials">VK</div>
            <div class="mt-3">
              <div class="fw-bold">Backend Systems</div>
              <div class="text-muted">APIs, CMS, Admin Panels</div>
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
          <h2 class="section-title brand-serif">About Me</h2>
          <p>
            I craft backend platforms that scale. My focus is on clean architecture, readable code,
            and performance-driven delivery. From authentication flows to database optimization,
            I make sure every feature is production-ready.
          </p>
          <p class="text-muted">
            I enjoy building for public-facing portals, CMS dashboards, and government-grade systems
            with strong accessibility and compliance standards.
          </p>
          <div class="d-flex flex-wrap gap-2 mt-3">
            <span class="skill-chip">REST API Design</span>
            <span class="skill-chip">Database Modeling</span>
            <span class="skill-chip">Caching & Performance</span>
            <span class="skill-chip">Security Best Practices</span>
          </div>
        </div>
        <div class="col-lg-6 reveal">
          <div class="card-soft p-4">
            <h5 class="fw-bold">What I Deliver</h5>
            <ul class="mb-0">
              <li>Stable, secure APIs with clear documentation</li>
              <li>Optimized queries and efficient data pipelines</li>
              <li>Reliable admin panels and CMS experiences</li>
              <li>Clean deployment workflow and environment setup</li>
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
          <h2 class="section-title brand-serif">Skills</h2>
          <p class="text-muted">A focused backend stack with essential frontend and DevOps support.</p>
        </div>
        <div class="col-lg-8 reveal">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Backend</div>
                <div class="text-muted small">Laravel, PHP, CakePHP, Node basics</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Databases</div>
                <div class="text-muted small">MySQL, schema design, optimization</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">API & Security</div>
                <div class="text-muted small">JWT, OAuth, rate limiting, validation</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Frontend</div>
                <div class="text-muted small">HTML, CSS, Bootstrap, jQuery</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Tools</div>
                <div class="text-muted small">Git, Postman, VS Code, Linux</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-3">
                <div class="fw-bold">Deployment</div>
                <div class="text-muted small">Shared hosting, VPS basics, CI-ready</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="projects" class="section">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
          <h2 class="section-title brand-serif">Featured Projects</h2>
          <p class="text-muted">A few representative builds with strong backend focus.</p>
        </div>
        <span class="mono text-uppercase small">2023 - 2026</span>
      </div>
      <div class="row g-4">
        <div class="col-md-4 reveal">
          <div class="card-soft h-100">
            <img class="project-img" alt="Project A"
                 src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='900' height='600'><defs><linearGradient id='g' x1='0' x2='1' y1='0' y2='1'><stop stop-color='%230fb6a6'/><stop offset='1' stop-color='%23ffb347'/></linearGradient></defs><rect width='100%25' height='100%25' fill='url(%23g)'/><text x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' font-size='42' font-family='Manrope' fill='white'>Gov Portal</text></svg>">
            <div class="p-3">
              <h5 class="fw-bold">Government Portal</h5>
              <p class="text-muted small">Secure CMS, GIGW compliant, multi-role admin and audit logs.</p>
              <div class="mono small">Laravel • MySQL • REST</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 reveal">
          <div class="card-soft h-100">
            <img class="project-img" alt="Project B"
                 src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='900' height='600'><defs><linearGradient id='g' x1='0' x2='1' y1='0' y2='1'><stop stop-color='%23e07a5f'/><stop offset='1' stop-color='%23f4f1de'/></linearGradient></defs><rect width='100%25' height='100%25' fill='url(%23g)'/><text x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' font-size='42' font-family='Manrope' fill='%230b0f14'>HRMS Suite</text></svg>">
            <div class="p-3">
              <h5 class="fw-bold">HRMS Suite</h5>
              <p class="text-muted small">Attendance, payroll, leave workflows with robust role controls.</p>
              <div class="mono small">Laravel • Bootstrap • MySQL</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 reveal">
          <div class="card-soft h-100">
            <img class="project-img" alt="Project C"
                 src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='900' height='600'><defs><linearGradient id='g' x1='0' x2='1' y1='0' y2='1'><stop stop-color='%230b0f14'/><stop offset='1' stop-color='%23233244'/></linearGradient></defs><rect width='100%25' height='100%25' fill='url(%23g)'/><text x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' font-size='42' font-family='Manrope' fill='white'>API Gateway</text></svg>">
            <div class="p-3">
              <h5 class="fw-bold">API Gateway</h5>
              <p class="text-muted small">Unified REST APIs with throttling, caching, and logging.</p>
              <div class="mono small">PHP • JWT • Redis</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="experience" class="section bg-white">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-5 reveal">
          <h2 class="section-title brand-serif">Experience</h2>
          <p class="text-muted">Recent roles and responsibilities focused on backend systems.</p>
        </div>
        <div class="col-lg-7 reveal">
          <div class="timeline">
            <div class="timeline-item">
              <div class="fw-bold">Laravel Developer</div>
              <div class="text-muted">Asha Websoft • 2024 - Present</div>
              <ul class="mb-0">
                <li>Built REST APIs for multiple client portals and dashboards</li>
                <li>Optimized database queries and improved load times</li>
                <li>Implemented role-based access and audit logs</li>
              </ul>
            </div>
            <div class="timeline-item">
              <div class="fw-bold">PHP Developer</div>
              <div class="text-muted">Freelance • 2023 - 2024</div>
              <ul class="mb-0">
                <li>Delivered CMS builds with custom admin modules</li>
                <li>Integrated payment gateways and notification systems</li>
                <li>Maintained hosting, backups, and deployments</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="education" class="section">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-5 reveal">
          <h2 class="section-title brand-serif">Education</h2>
          <p class="text-muted">Academic background in computer science.</p>
        </div>
        <div class="col-lg-7 reveal">
          <div class="card-soft p-4">
            <div class="fw-bold">B.Tech in Computer Science Engineering</div>
            <div class="text-muted">Sagar Group of Institutions • 2020 - 2024</div>
            <div class="mt-2">CGPA: 8.33 / 10</div>
          </div>
          <div class="card-soft p-4 mt-3">
            <div class="fw-bold">Intermediate (Science)</div>
            <div class="text-muted">MJK College Bettiah • 2018 - 2020</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="section">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6 reveal">
          <h2 class="section-title brand-serif">Let’s Build Together</h2>
          <p class="text-muted">Share your project goals and I will respond with a clear plan and timeline.</p>
          <div class="contact-box">
            <div class="mb-2"><span class="mono small">Email</span> • vikashkumarbth381@gmail.com</div>
            <div class="mb-2"><span class="mono small">Phone</span> • +91 95239 19654</div>
            <div class="mb-0"><span class="mono small">Location</span> • New Delhi, India</div>
          </div>
        </div>
        <div class="col-lg-6 reveal">
          <div class="card-soft p-4">
            <div class="fw-bold mb-3">Quick Message</div>
            <form>
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Your name">
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="you@email.com">
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
      <div class="brand-serif fw-bold">Vikash Kumar</div>
      <div class="mono small">Backend Developer • Laravel • APIs</div>
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
<!-- codex 
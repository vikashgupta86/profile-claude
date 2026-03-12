<script>
/* ══════════════════════════════════════════
   GLOBAL SCRIPTS — portfolio.js
══════════════════════════════════════════ */

/* ── Custom Cursor ── */
(function initCursor() {
  const dot  = document.getElementById('cursor-dot');
  const ring = document.getElementById('cursor-ring');
  if (!dot || !ring) return;

  let mx = 0, my = 0, rx = 0, ry = 0;

  document.addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    dot.style.left = mx + 'px';
    dot.style.top  = my + 'px';
  });

  (function loop() {
    rx += (mx - rx) * .11;
    ry += (my - ry) * .11;
    ring.style.left = rx + 'px';
    ring.style.top  = ry + 'px';
    requestAnimationFrame(loop);
  })();
})();

/* ── Loader ── */
window.addEventListener('load', () => {
  setTimeout(() => {
    document.getElementById('loader')?.classList.add('out');
  }, 2800);
});

/* ── Navigation: scroll state + active link ── */
(function initNav() {
  const nav = document.getElementById('site-nav');
  if (!nav) return;

  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 55);

    // Highlight active section link
    let current = '';
    document.querySelectorAll('section[id]').forEach(s => {
      if (window.scrollY >= s.offsetTop - 300) current = s.id;
    });
    document.querySelectorAll('.nav-link').forEach(a => {
      a.classList.toggle('active', a.getAttribute('href') === '#' + current);
    });
  }, { passive: true });
})();

/* ── Hamburger / Mobile Drawer ── */
(function initDrawer() {
  const ham   = document.getElementById('nav-ham');
  const drawer = document.getElementById('mobile-drawer');
  const close  = document.getElementById('drawer-close');
  if (!ham || !drawer) return;

  const open  = () => { ham.classList.add('open'); drawer.classList.add('open'); document.body.style.overflow = 'hidden'; };
  const shut  = () => { ham.classList.remove('open'); drawer.classList.remove('open'); document.body.style.overflow = ''; };

  ham.addEventListener('click', () => drawer.classList.contains('open') ? shut() : open());
  close?.addEventListener('click', shut);
  document.querySelectorAll('.drawer-link').forEach(a => a.addEventListener('click', shut));
  document.addEventListener('keydown', e => { if (e.key === 'Escape') shut(); });
})();

/* ── Typewriter effect ── */
(function initTypewriter() {
  const el = document.getElementById('typewriter');
  if (!el) return;

  const roles = (el.dataset.roles || 'Laravel Developer').split('|').map(r => r.trim());
  let ri = 0, ci = 0, deleting = false;

  function type() {
    const word = roles[ri];
    if (!deleting) {
      el.textContent = word.slice(0, ++ci);
      if (ci === word.length) { deleting = true; setTimeout(type, 2400); return; }
    } else {
      el.textContent = word.slice(0, --ci);
      if (ci === 0) { deleting = false; ri = (ri + 1) % roles.length; }
    }
    setTimeout(type, deleting ? 40 : 105);
  }
  setTimeout(type, 2000);
})();

/* ── Scroll Reveal + Counters + Skill Bars ── */
(function initReveal() {
  function reveal(el) {
    el.classList.add('in');

    // Skill bars
    el.querySelectorAll('.skill-fill[data-w]').forEach(b => {
      b.style.width = b.dataset.w + '%';
    });

    // Counting numbers
    el.querySelectorAll('[data-count]').forEach(n => {
      if (n._done) return;
      n._done = true;
      const target  = +n.dataset.count;
      const suffix  = n.dataset.suffix || '';
      let   current = 0;
      const timer = setInterval(() => {
        current = Math.min(current + target / 50, target);
        n.textContent = Math.floor(current) + suffix;
        if (current >= target) clearInterval(timer);
      }, 20);
    });
  }

  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) reveal(e.target); });
  }, { threshold: 0, rootMargin: '0px 0px -16px 0px' });

  document.querySelectorAll('.rv').forEach(el => obs.observe(el));

  // Fallback: reveal remaining after loader
  setTimeout(() => {
    document.querySelectorAll('.rv:not(.in)').forEach(reveal);
  }, 3200);
})();

/* ── Project Filter ── */
(function initFilter() {
  document.querySelectorAll('.proj-filter').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.proj-filter').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.dataset.filter;
      document.querySelectorAll('.project-card').forEach(card => {
        const show = filter === 'all' || card.dataset.category === filter;
        card.style.display = show ? '' : 'none';
        // Re-trigger reveal if newly shown
        if (show) setTimeout(() => card.classList.add('in'), 10);
      });
    });
  });
})();

/* ── Smooth Scroll ── */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    e.preventDefault();
    const target = document.querySelector(a.getAttribute('href'));
    if (target) target.scrollIntoView({ behavior: 'smooth' });
  });
});

/* ── Toast helper ── */
window.showToast = function(msg, type = 'ok') {
  const el  = document.getElementById('toast');
  const txt = document.getElementById('toast-msg');
  if (!el || !txt) return;
  txt.textContent = msg;
  el.className = 'toast' + (type === 'err' ? ' err' : '');
  el.querySelector('.toast-ico').className =
    'fas fa-' + (type === 'err' ? 'exclamation-circle' : 'check-circle') + ' toast-ico';
  el.classList.add('show');
  setTimeout(() => el.classList.remove('show'), 5000);
};

/* ── Contact form ── */
(function initForm() {
  const form = document.getElementById('contact-form');
  if (!form) return;

  form.addEventListener('submit', async e => {
    e.preventDefault();
    const btn = document.getElementById('submit-btn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending…';

    try {
      const res = await fetch('{{ route("contact.send") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json',
        },
        body: JSON.stringify(Object.fromEntries(new FormData(form))),
      });
      const data = await res.json();
      if (res.ok) {
        showToast(data.message || "Message sent! I'll reply soon.", 'ok');
        form.reset();
      } else {
        showToast(data.message || 'Something went wrong.', 'err');
      }
    } catch {
      showToast('Network error. Please try again.', 'err');
    } finally {
      btn.disabled = false;
      btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
    }
  });
})();
</script>

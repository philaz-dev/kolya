/* ============================================
   THE OFFSET — Main JavaScript
   Navigation, scroll reveals, parallax, menu
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ---- Navigation Scroll ----
  const nav = document.querySelector('.nav');
  const scrollThreshold = 80;

  function handleNavScroll() {
    if (window.scrollY > scrollThreshold) {
      nav.classList.add('nav--scrolled');
    } else {
      nav.classList.remove('nav--scrolled');
    }
  }

  window.addEventListener('scroll', handleNavScroll, { passive: true });
  handleNavScroll();

  // ---- Mobile Menu Toggle ----
  const toggle = document.querySelector('.nav__toggle');
  const overlay = document.querySelector('.nav__overlay');

  if (toggle && overlay) {
    toggle.addEventListener('click', () => {
      const isOpen = document.body.classList.toggle('menu-open');
      toggle.setAttribute('aria-expanded', isOpen);
    });

    // Close menu on link click
    overlay.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        document.body.classList.remove('menu-open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // ---- Scroll Reveal (Intersection Observer) ----
  if (!prefersReducedMotion) {
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.15,
      rootMargin: '0px 0px -40px 0px'
    });

    document.querySelectorAll('.reveal').forEach(el => {
      revealObserver.observe(el);
    });
  } else {
    // Show everything immediately if reduced motion
    document.querySelectorAll('.reveal').forEach(el => {
      el.classList.add('is-visible');
    });
  }

  // ---- Word-by-Word Reveal (Hero Headlines) ----
  document.querySelectorAll('.word-reveal').forEach(headline => {
    const text = headline.textContent.trim();
    headline.innerHTML = '';

    // Split by lines (using <br> markers or newlines)
    const words = text.split(/\s+/);
    words.forEach((word, i) => {
      const span = document.createElement('span');
      span.classList.add('word');
      span.textContent = word;
      span.style.transitionDelay = `${i * 80}ms`;
      headline.appendChild(span);

      // Add space between words
      if (i < words.length - 1) {
        headline.appendChild(document.createTextNode(' '));
      }
    });

    if (!prefersReducedMotion) {
      const wordObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            headline.querySelectorAll('.word').forEach(w => {
              w.classList.add('is-visible');
            });
            wordObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.2 });

      wordObserver.observe(headline);
    } else {
      headline.querySelectorAll('.word').forEach(w => {
        w.classList.add('is-visible');
      });
    }
  });

  // ---- Parallax ----
  if (!prefersReducedMotion) {
    const parallaxElements = document.querySelectorAll('.parallax-img');
    let ticking = false;

    function updateParallax() {
      const scrollY = window.scrollY;
      const windowHeight = window.innerHeight;

      parallaxElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        const elementCenter = rect.top + rect.height / 2;
        const viewportCenter = windowHeight / 2;
        const offset = (elementCenter - viewportCenter) * 0.12;
        el.style.transform = `translateY(${offset}px)`;
      });

      ticking = false;
    }

    window.addEventListener('scroll', () => {
      if (!ticking) {
        requestAnimationFrame(updateParallax);
        ticking = true;
      }
    }, { passive: true });
  }

  // ---- FAQ Accordion ----
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const answer = item.querySelector('.faq-answer');
      const isOpen = item.classList.contains('is-open');

      // Close all other items
      document.querySelectorAll('.faq-item.is-open').forEach(openItem => {
        if (openItem !== item) {
          openItem.classList.remove('is-open');
          openItem.querySelector('.faq-answer').style.maxHeight = '0';
        }
      });

      // Toggle current
      if (isOpen) {
        item.classList.remove('is-open');
        answer.style.maxHeight = '0';
      } else {
        item.classList.add('is-open');
        answer.style.maxHeight = answer.scrollHeight + 'px';
      }
    });
  });

  // ---- Active Nav Link ----
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav__links a').forEach(link => {
    const href = link.getAttribute('href').replace('./', '').replace('/', '');
    if (href === currentPage || (currentPage === '' && href === 'index.html')) {
      link.classList.add('active');
    }
  });
});

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        initParticles();
        initScrollProgress();
        initHeader();

        if (typeof gsap === 'undefined') return;
        gsap.registerPlugin(ScrollTrigger);

        gsap.from('.hero-badge', { opacity: 0, y: 20, duration: 0.7, delay: 0.1, ease: 'power3.out' });
        gsap.from('.hero-title', { opacity: 0, y: 40, duration: 0.9, delay: 0.2, ease: 'power3.out' });
        gsap.from('.hero-subtitle', { opacity: 0, y: 24, duration: 0.8, delay: 0.35, ease: 'power3.out' });
        gsap.from('.hero-actions .btn', { opacity: 0, y: 20, duration: 0.6, delay: 0.5, stagger: 0.08, ease: 'power2.out' });
        gsap.from('.hero-panel', { opacity: 0, x: 24, duration: 0.8, delay: 0.4, ease: 'power3.out' });
        gsap.from('.hero-stats .stat-card', { opacity: 0, y: 24, duration: 0.6, delay: 0.6, stagger: 0.07, ease: 'power2.out' });

        gsap.utils.toArray('.section-label').forEach(function (el) {
            gsap.from(el, {
                scrollTrigger: { trigger: el, start: 'top 88%' },
                opacity: 0, x: -30, duration: 0.7, ease: 'power2.out',
            });
        });
        gsap.utils.toArray('.section-title').forEach(function (el) {
            gsap.from(el, {
                scrollTrigger: { trigger: el, start: 'top 88%' },
                opacity: 0, y: 40, duration: 0.9, ease: 'power3.out',
            });
        });

        gsap.utils.toArray('.stat-card[data-count]').forEach(function (card, i) {
            gsap.from(card, {
                scrollTrigger: { trigger: card, start: 'top 88%' },
                opacity: 0, y: 40, scale: 0.95, duration: 0.65, delay: i * 0.08, ease: 'back.out(1.5)',
            });
        });

        gsap.utils.toArray('.value-card').forEach(function (card, i) {
            gsap.from(card, {
                scrollTrigger: { trigger: card, start: 'top 88%' },
                opacity: 0, y: 40, duration: 0.7, delay: i * 0.1, ease: 'power3.out',
            });
        });

        gsap.utils.toArray('.project-showcase').forEach(function (card, i) {
            gsap.from(card, {
                scrollTrigger: { trigger: card, start: 'top 90%' },
                opacity: 0, x: i % 2 === 0 ? -40 : 40, duration: 0.85, ease: 'power3.out',
            });
            var imgWrap = card.querySelector('.project-showcase-visual');
            if (imgWrap) initTilt(imgWrap);
        });

        gsap.utils.toArray('.service-card').forEach(function (card, i) {
            gsap.from(card, {
                scrollTrigger: { trigger: card, start: 'top 88%' },
                opacity: 0, y: 50, duration: 0.75, delay: i * 0.08, ease: 'power3.out',
            });
        });

        gsap.from('.about-layout', { scrollTrigger: { trigger: '.about-layout', start: 'top 82%' }, opacity: 0, y: 32, duration: 0.8, ease: 'power3.out' });
        gsap.from('.contact-form', { scrollTrigger: { trigger: '.contact-layout', start: 'top 78%' }, opacity: 0, y: 32, duration: 0.8, ease: 'power3.out' });

        document.querySelectorAll('.stat-card[data-count]').forEach(function (card) {
            var target = parseInt(card.dataset.count, 10);
            var numEl = card.querySelector('.stat-number');
            if (!numEl) return;
            ScrollTrigger.create({
                trigger: card, start: 'top 88%', once: true,
                onEnter: function () {
                    gsap.to({ val: 0 }, {
                        val: target, duration: 2.2, ease: 'power2.out',
                        onUpdate: function () { numEl.textContent = Math.round(this.targets()[0].val); },
                    });
                },
            });
        });

        gsap.to('.hero-orb--1', { x: 40, y: -30, duration: 6, repeat: -1, yoyo: true, ease: 'sine.inOut' });
        gsap.to('.hero-orb--2', { x: -30, y: 40, duration: 7, repeat: -1, yoyo: true, ease: 'sine.inOut' });

        var glow = document.querySelector('.cursor-glow');
        if (glow && window.matchMedia('(pointer:fine)').matches) {
            document.addEventListener('mousemove', function (e) {
                gsap.to(glow, { x: e.clientX, y: e.clientY, duration: 0.5, ease: 'power2.out' });
            });
        }

        document.querySelectorAll('.btn--primary, .btn--outline').forEach(function (btn) {
            btn.addEventListener('mouseenter', function () {
                gsap.to(btn, { scale: 1.04, duration: 0.25, ease: 'power2.out' });
            });
            btn.addEventListener('mouseleave', function () {
                gsap.to(btn, { scale: 1, duration: 0.25, ease: 'power2.out' });
            });
        });

        initMobileNav();
        initContactForm();
        initProjectHero();
        initScrollSpy();
        initHashNavigation();
        initLangSwitcher();
    });

    function initLangSwitcher() {
        var switcher = document.getElementById('langSwitcher');
        var btn = document.getElementById('langSwitcherBtn');
        if (!switcher || !btn) return;

        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = switcher.classList.toggle('open');
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });

        document.addEventListener('click', function (e) {
            if (!switcher.contains(e.target)) {
                switcher.classList.remove('open');
                btn.setAttribute('aria-expanded', 'false');
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                switcher.classList.remove('open');
                btn.setAttribute('aria-expanded', 'false');
            }
        });
    }

    function initHashNavigation() {
        var sectionIds = ['home', 'about', 'services', 'projects', 'contact'];
        var headerOffset = 110;

        function scrollToSection(id, behavior) {
            var el = document.getElementById(id);
            if (!el) return false;
            var top = el.getBoundingClientRect().top + window.scrollY - headerOffset;
            window.scrollTo({ top: Math.max(0, top), behavior: behavior || 'smooth' });
            return true;
        }

        function isHomePage() {
            var path = window.location.pathname.replace(/\/+$/, '') || '/';
            return path === '/' || /^\/(ro|en|ru)$/.test(path) || /index\.php$/.test(path);
        }

        function handleHashScroll(behavior) {
            var hash = (window.location.hash || '').replace('#', '');
            if (hash && sectionIds.indexOf(hash) !== -1) {
                scrollToSection(hash, behavior);
            }
        }

        document.querySelectorAll('a[href*="#"]').forEach(function (link) {
            var href = link.getAttribute('href') || '';
            var hashIdx = href.indexOf('#');
            if (hashIdx === -1) return;
            var sectionId = href.slice(hashIdx + 1);
            if (sectionIds.indexOf(sectionId) === -1) return;

            link.addEventListener('click', function (e) {
                var pathPart = href.slice(0, hashIdx).replace(/\/+$/, '') || '/';
                var onHome = isHomePage();
                var isRelativeHash = hashIdx === 0;
                var samePage = isRelativeHash || (onHome && (
                    pathPart === '/' || pathPart === '' ||
                    pathPart === window.location.pathname.replace(/\/+$/, '') ||
                    /^\/(ro|en|ru)$/.test(pathPart)
                ));

                if (samePage) {
                    e.preventDefault();
                    history.pushState(null, '', '#' + sectionId);
                    scrollToSection(sectionId, 'smooth');
                    var navPill = document.querySelector('.nav-pill');
                    if (navPill) navPill.classList.remove('open');
                }
            });
        });

        if (window.location.hash) {
            requestAnimationFrame(function () {
                requestAnimationFrame(function () {
                    handleHashScroll('auto');
                    setTimeout(function () { handleHashScroll('auto'); }, 300);
                    setTimeout(function () { handleHashScroll('auto'); }, 800);
                });
            });
        }

        window.addEventListener('hashchange', function () {
            handleHashScroll('smooth');
        });
    }

    function initHeader() {
        var header = document.getElementById('siteHeader');
        if (!header) return;
        ScrollTrigger.create({
            start: 60,
            onUpdate: function (self) {
                header.classList.toggle('is-scrolled', self.scroll() > 40);
            },
        });
    }

    function initScrollProgress() {
        var bar = document.getElementById('scrollProgress');
        if (!bar) return;
        window.addEventListener('scroll', function () {
            var h = document.documentElement.scrollHeight - window.innerHeight;
            bar.style.width = h > 0 ? ((window.scrollY / h) * 100) + '%' : '0%';
        }, { passive: true });
    }

    function initParticles() {
        var canvas = document.getElementById('particles');
        if (!canvas) return;
        var ctx = canvas.getContext('2d');
        var particles = [];
        var count = 48;

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resize();
        window.addEventListener('resize', resize);

        for (var i = 0; i < count; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                r: Math.random() * 2 + 0.5,
                vx: (Math.random() - 0.5) * 0.4,
                vy: (Math.random() - 0.5) * 0.4,
            });
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            var accent = getComputedStyle(document.documentElement).getPropertyValue('--accent').trim() || '#6366f1';
            particles.forEach(function (p) {
                p.x += p.vx; p.y += p.vy;
                if (p.x < 0 || p.x > canvas.width) p.vx *= -1;
                if (p.y < 0 || p.y > canvas.height) p.vy *= -1;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = accent;
                ctx.globalAlpha = 0.35;
                ctx.fill();
            });
            requestAnimationFrame(draw);
        }
        draw();
    }

    function initTilt(el) {
        if (!window.matchMedia('(pointer:fine)').matches) return;
        el.addEventListener('mousemove', function (e) {
            var rect = el.getBoundingClientRect();
            var x = (e.clientX - rect.left) / rect.width - 0.5;
            var y = (e.clientY - rect.top) / rect.height - 0.5;
            gsap.to(el, { scale: 1.03, rotateY: x * 6, rotateX: -y * 6, duration: 0.35, ease: 'power2.out', transformPerspective: 600 });
        });
        el.addEventListener('mouseleave', function () {
            gsap.to(el, { scale: 1, rotateY: 0, rotateX: 0, duration: 0.5, ease: 'power3.out' });
        });
    }

    function initMobileNav() {
        var burger = document.getElementById('navBurger');
        var navPill = document.querySelector('.nav-pill');
        if (!burger || !navPill) return;
        burger.addEventListener('click', function () { navPill.classList.toggle('open'); });
        navPill.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () { navPill.classList.remove('open'); });
        });
    }

    function initContactForm() {
        var form = document.getElementById('contactForm');
        var feedback = document.getElementById('formFeedback');
        if (!form || !feedback) return;
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            feedback.textContent = '';
            feedback.className = 'form-feedback';
            var btn = form.querySelector('button[type="submit"]');
            btn.disabled = true;
            fetch(form.action, { method: 'POST', body: new FormData(form) })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    feedback.textContent = data.message;
                    feedback.className = 'form-feedback ' + (data.success ? 'success' : 'error');
                    if (data.success) form.reset();
                })
                .catch(function () {
                    feedback.textContent = 'Error';
                    feedback.className = 'form-feedback error';
                })
                .finally(function () { btn.disabled = false; });
        });
    }

    function initScrollSpy() {
        var navLinks = document.querySelectorAll('.nav-link[data-section]');
        if (!navLinks.length) return;

        var sectionIds = ['home', 'about', 'services', 'projects', 'contact'];
        var sections = sectionIds.map(function (id) {
            return document.getElementById(id);
        }).filter(Boolean);

        if (!sections.length) return;

        function setActive(sectionId) {
            navLinks.forEach(function (link) {
                link.classList.toggle('is-active', link.dataset.section === sectionId);
            });
        }

        if (typeof ScrollTrigger !== 'undefined') {
            sections.forEach(function (section) {
                ScrollTrigger.create({
                    trigger: section,
                    start: 'top 42%',
                    end: 'bottom 42%',
                    onEnter: function () { setActive(section.id); },
                    onEnterBack: function () { setActive(section.id); },
                });
            });
        } else {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) setActive(entry.target.id);
                });
            }, { rootMargin: '-42% 0px -42% 0px', threshold: 0 });
            sections.forEach(function (s) { observer.observe(s); });
        }

        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                setActive(link.dataset.section);
            });
        });

        var hash = (window.location.hash || '').replace('#', '');
        if (hash && sectionIds.indexOf(hash) !== -1) {
            setActive(hash);
        } else {
            setActive(sections[0].id);
        }
    }

    function initProjectHero() {
        if (typeof gsap === 'undefined') return;
        var banner = document.querySelector('.project-hero-banner');
        if (!banner) return;
        gsap.from('.project-breadcrumb', { opacity: 0, y: -8, duration: 0.5, ease: 'power2.out' });
        gsap.from('.project-hero-banner .project-hero-title', { opacity: 0, y: 32, duration: 0.8, delay: 0.08, ease: 'power3.out' });
        gsap.from('.project-hero-banner .project-hero-desc', { opacity: 0, y: 20, duration: 0.7, delay: 0.16, ease: 'power3.out' });
        gsap.from('.project-actions', { opacity: 0, y: 16, duration: 0.6, delay: 0.28, ease: 'power2.out' });
        gsap.utils.toArray('.gallery-item').forEach(function (item, i) {
            gsap.from(item, { opacity: 0, y: 24, duration: 0.5, delay: i * 0.05, ease: 'power2.out' });
        });
        gsap.utils.toArray('.project-related-card').forEach(function (card, i) {
            gsap.from(card, { opacity: 0, y: 20, duration: 0.5, delay: i * 0.07, ease: 'power2.out' });
        });
    }
})();

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var dataEl = document.getElementById('lightboxData');
        var lightbox = document.getElementById('lightbox');
        if (!dataEl || !lightbox) return;

        var items = [];
        try {
            items = JSON.parse(dataEl.textContent || '[]');
        } catch (e) {
            return;
        }
        if (!items.length) return;

        var imgEl = document.getElementById('lightboxImage');
        var captionEl = document.getElementById('lightboxCaption');
        var counterEl = document.getElementById('lightboxCounter');
        var current = 0;

        function render(index) {
            current = (index + items.length) % items.length;
            var item = items[current];
            imgEl.classList.add('is-loading');
            imgEl.onload = function () { imgEl.classList.remove('is-loading'); };
            imgEl.src = item.src;
            imgEl.alt = item.alt || '';
            if (captionEl) captionEl.textContent = item.alt || '';
            if (counterEl) counterEl.textContent = (current + 1) + ' / ' + items.length;
        }

        function open(index) {
            render(index);
            lightbox.hidden = false;
            lightbox.setAttribute('aria-hidden', 'false');
            document.body.classList.add('lightbox-open');
            document.documentElement.style.overflow = 'hidden';
            var closeBtn = lightbox.querySelector('.lightbox-close');
            if (closeBtn) closeBtn.focus();
        }

        function close() {
            lightbox.hidden = true;
            lightbox.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('lightbox-open');
            document.documentElement.style.overflow = '';
            imgEl.src = '';
        }

        document.querySelectorAll('[data-lightbox-index]').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                open(parseInt(btn.dataset.lightboxIndex, 10) || 0);
            });
        });

        lightbox.querySelectorAll('[data-lightbox-close]').forEach(function (el) {
            el.addEventListener('click', close);
        });

        var inner = lightbox.querySelector('.lightbox-inner');
        if (inner) {
            inner.addEventListener('click', function (e) { e.stopPropagation(); });
        }

        var prev = lightbox.querySelector('[data-lightbox-prev]');
        var next = lightbox.querySelector('[data-lightbox-next]');
        if (prev) prev.addEventListener('click', function (e) { e.stopPropagation(); render(current - 1); });
        if (next) next.addEventListener('click', function (e) { e.stopPropagation(); render(current + 1); });

        document.addEventListener('keydown', function (e) {
            if (lightbox.hidden) return;
            if (e.key === 'Escape') close();
            if (e.key === 'ArrowLeft' && prev) render(current - 1);
            if (e.key === 'ArrowRight' && next) render(current + 1);
        });
    });
})();

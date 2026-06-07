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
        }

        function close() {
            lightbox.hidden = true;
            lightbox.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('lightbox-open');
            imgEl.src = '';
        }

        document.querySelectorAll('[data-lightbox-index]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                open(parseInt(btn.dataset.lightboxIndex, 10) || 0);
            });
        });

        lightbox.querySelectorAll('[data-lightbox-close]').forEach(function (el) {
            el.addEventListener('click', close);
        });

        var prev = lightbox.querySelector('[data-lightbox-prev]');
        var next = lightbox.querySelector('[data-lightbox-next]');
        if (prev) prev.addEventListener('click', function () { render(current - 1); });
        if (next) next.addEventListener('click', function () { render(current + 1); });

        document.addEventListener('keydown', function (e) {
            if (lightbox.hidden) return;
            if (e.key === 'Escape') close();
            if (e.key === 'ArrowLeft' && prev) render(current - 1);
            if (e.key === 'ArrowRight' && next) render(current + 1);
        });
    });
})();

(function () {
    'use strict';

    const STORAGE_KEY = 'visio-theme';
    const html = document.documentElement;

    function getPreferredTheme() {
        const stored = localStorage.getItem(STORAGE_KEY);
        if (stored === 'dark' || stored === 'light') return stored;
        return 'light';
    }

    function applyTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem(STORAGE_KEY, theme);
    }

    function initTheme() {
        var preferred = getPreferredTheme();
        if (html.getAttribute('data-theme') !== preferred) {
            applyTheme(preferred);
        }
    }

    initTheme();

    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('themeToggle');
        if (!toggle) return;

        toggle.addEventListener('click', function () {
            const current = html.getAttribute('data-theme');
            applyTheme(current === 'dark' ? 'light' : 'dark');
        });
    });
})();

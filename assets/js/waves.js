(function () {
    'use strict';

    function initWaveConnectors() {
        var canvas = document.getElementById('waveCanvas');
        if (!canvas) return;

        var ctx = canvas.getContext('2d');
        var anchors = [];
        var mouse = { x: -9999, y: -9999 };
        var t = 0;
        var rafId = null;

        function getAccent() {
            return getComputedStyle(document.documentElement).getPropertyValue('--accent').trim() || '#6366f1';
        }

        function collectAnchors() {
            anchors = Array.from(document.querySelectorAll('[data-wave-anchor]')).map(function (el) {
                var rect = el.getBoundingClientRect();
                return {
                    el: el,
                    x: rect.left + rect.width / 2,
                    y: rect.top + rect.height / 2,
                };
            });
        }

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            collectAnchors();
        }

        function drawWave(x1, y1, x2, y2, phase, alpha) {
            var dx = x2 - x1;
            var dy = y2 - y1;
            var dist = Math.sqrt(dx * dx + dy * dy);
            if (dist < 80) return;

            var steps = Math.max(24, Math.floor(dist / 12));
            var amp = Math.min(28, dist * 0.06);
            var perpX = -dy / dist;
            var perpY = dx / dist;

            ctx.beginPath();
            ctx.moveTo(x1, y1);

            for (var i = 1; i <= steps; i++) {
                var p = i / steps;
                var bx = x1 + dx * p;
                var by = y1 + dy * p;
                var wave = Math.sin(p * Math.PI * 3 + phase) * amp * Math.sin(p * Math.PI);
                ctx.lineTo(bx + perpX * wave, by + perpY * wave);
            }

            var accent = getAccent();
            ctx.strokeStyle = accent;
            ctx.globalAlpha = alpha;
            ctx.lineWidth = 1.2;
            ctx.stroke();

            ctx.beginPath();
            ctx.arc(x2, y2, 3, 0, Math.PI * 2);
            ctx.fillStyle = accent;
            ctx.globalAlpha = alpha * 0.8;
            ctx.fill();
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            collectAnchors();
            t += 0.015;

            for (var i = 0; i < anchors.length; i++) {
                for (var j = i + 1; j < anchors.length; j++) {
                    var a = anchors[i];
                    var b = anchors[j];
                    var dx = a.x - b.x;
                    var dy = a.y - b.y;
                    var dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist > 900) continue;
                    var alpha = Math.max(0.04, 0.22 - dist / 4200);
                    drawWave(a.x, a.y, b.x, b.y, t + i * 0.7 + j * 0.4, alpha);
                }
            }

            anchors.forEach(function (a) {
                var dx = mouse.x - a.x;
                var dy = mouse.y - a.y;
                var dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 220) {
                    drawWave(a.x, a.y, mouse.x, mouse.y, t * 2, 0.12 * (1 - dist / 220));
                }
            });

            ctx.globalAlpha = 1;
            rafId = requestAnimationFrame(draw);
        }

        resize();
        window.addEventListener('resize', resize);
        if (window.matchMedia('(pointer:fine)').matches) {
            window.addEventListener('mousemove', function (e) {
                mouse.x = e.clientX;
                mouse.y = e.clientY;
            }, { passive: true });
        }

        draw();

        return function destroy() {
            if (rafId) cancelAnimationFrame(rafId);
        };
    }

    document.addEventListener('DOMContentLoaded', initWaveConnectors);
})();

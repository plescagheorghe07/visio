(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        initConnectorPaths();
        initHeroFlowLines();
        initTechMarquee();
        initOrbitNodes();
    });

    function initConnectorPaths() {
        document.querySelectorAll('.connector-path').forEach(function (path) {
            var len = path.getTotalLength();
            path.style.strokeDasharray = len;
            path.style.strokeDashoffset = len;

            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.create({
                    trigger: path.closest('.wave-bridge') || path,
                    start: 'top 90%',
                    end: 'bottom 10%',
                    onEnter: function () { animatePath(path, len); },
                    onEnterBack: function () { animatePath(path, len); },
                });
            } else {
                animatePath(path, len);
            }
        });
    }

    function animatePath(path, len) {
        path.style.transition = 'stroke-dashoffset 2s cubic-bezier(0.4, 0, 0.2, 1)';
        path.style.strokeDashoffset = '0';
    }

    function initHeroFlowLines() {
        var svg = document.querySelector('.hero-flow-svg');
        if (!svg) return;

        var paths = svg.querySelectorAll('.hero-flow-path');
        paths.forEach(function (path, i) {
            var len = path.getTotalLength();
            path.style.strokeDasharray = len;
            path.style.strokeDashoffset = len;

            setTimeout(function () {
                path.style.transition = 'stroke-dashoffset 2.5s cubic-bezier(0.4, 0, 0.2, 1)';
                path.style.strokeDashoffset = '0';
            }, 400 + i * 300);
        });

        if (typeof gsap !== 'undefined' && paths.length) {
            gsap.to('.hero-flow-node', {
                x: 200,
                y: -30,
                duration: 4,
                repeat: -1,
                yoyo: true,
                ease: 'sine.inOut',
            });
        }
    }

    function initTechMarquee() {
        /* tech marquee removed — using static .tech-cloud */
    }

    function initOrbitNodes() {
        document.querySelectorAll('.orbit-node').forEach(function (node, i) {
            if (typeof gsap === 'undefined') return;
            gsap.to(node, {
                y: '+=12',
                duration: 2 + i * 0.4,
                repeat: -1,
                yoyo: true,
                ease: 'sine.inOut',
                delay: i * 0.2,
            });
        });
    }
})();

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        // Form tabs
        document.querySelectorAll('.tab-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var tab = btn.dataset.tab;
                document.querySelectorAll('.tab-btn').forEach(function (b) { b.classList.remove('active'); });
                document.querySelectorAll('.tab-panel').forEach(function (p) { p.classList.remove('active'); });
                btn.classList.add('active');
                var panel = document.getElementById('tab-' + tab);
                if (panel) panel.classList.add('active');
            });
        });

        // Contact message modal
        var modal = document.getElementById('msgModal');
        var modalBody = document.getElementById('modalBody');
        var modalClose = document.getElementById('modalClose');

        if (modal) {
            document.querySelectorAll('.view-msg').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    modalBody.textContent = btn.dataset.msg;
                    modal.classList.remove('hidden');
                });
            });
            if (modalClose) {
                modalClose.addEventListener('click', function () { modal.classList.add('hidden'); });
            }
            modal.addEventListener('click', function (e) {
                if (e.target === modal) modal.classList.add('hidden');
            });
        }

        document.querySelectorAll('.copy-track').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var text = btn.dataset.copy || '';
                if (!text) return;
                var done = function () {
                    var label = btn.textContent;
                    btn.textContent = 'Copiat!';
                    setTimeout(function () { btn.textContent = label; }, 1500);
                };
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text).then(done).catch(function () {
                        fallbackCopy(text);
                        done();
                    });
                } else {
                    fallbackCopy(text);
                    done();
                }
            });
        });

        function fallbackCopy(text) {
            var ta = document.createElement('textarea');
            ta.value = text;
            ta.style.position = 'fixed';
            ta.style.left = '-9999px';
            document.body.appendChild(ta);
            ta.select();
            try { document.execCommand('copy'); } catch (e) {}
            document.body.removeChild(ta);
        }
    });
})();

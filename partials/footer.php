    </main>
    <?php
    $loadLightbox = $loadLightbox ?? false;
    track_page_view($pageTitle ?? null);
    ?>
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <a href="<?= home_href() ?>" class="logo">
                    <img class="logo-img" src="<?= brand_logo_href() ?>" alt="Visio" width="32" height="32">
                    <span class="logo-text">Visio</span>
                </a>
                <p class="footer-tagline"><?= e(__('footer_tagline')) ?></p>
                <p class="footer-leader"><?= e(__('footer_leader')) ?></p>
            </div>
            <div class="footer-links">
                <h4><?= e(__('nav_services')) ?></h4>
                <ul>
                    <li><a href="<?= home_href() ?>#services">SaaS</a></li>
                    <li><a href="<?= home_href() ?>#services">Full Stack</a></li>
                    <li><a href="<?= home_href() ?>#services">SEO</a></li>
                    <li><a href="<?= home_href() ?>#services">UI/UX</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4><?= e(__('nav_projects')) ?></h4>
                <ul>
                    <li><a href="<?= project_href('guestmemories') ?>">GuestMemories</a></li>
                    <li><a href="<?= project_href('eduguide') ?>">EduGuide</a></li>
                    <li><a href="<?= project_href('dentadent') ?>">DentaDent</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4><?= e(__('nav_contact')) ?></h4>
                <a href="mailto:plescagheorghe07@gmail.com">plescagheorghe07@gmail.com</a>
                <a href="<?= home_href() ?>#contact" class="btn btn--sm btn--primary"><?= e(__('hero_cta_contact')) ?></a>
            </div>
        </div>
        <div class="footer-bottom container">
            <p>&copy; <?= date('Y') ?> Visio. <?= e(__('footer_rights')) ?></p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="<?= asset('js/theme.js') ?>"></script>
    <script src="<?= asset('js/main.js') ?>"></script>
    <?php if (!empty($loadLightbox)): ?>
    <script src="<?= asset('js/lightbox.js') ?>"></script>
    <?php endif; ?>
</body>
</html>

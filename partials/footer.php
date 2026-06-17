    </main>
    <?php
    $loadLightbox = $loadLightbox ?? false;
    track_page_view($pageTitle ?? null);
    ?>
    <footer class="site-footer">
        <div class="footer-cta">
            <div class="container footer-cta__inner">
                <div class="footer-cta__text" data-wave-anchor>
                    <strong><?= e(__('footer_cta_title')) ?></strong>
                    <p><?= e(__('footer_cta_desc')) ?></p>
                </div>
                <a href="<?= home_href() ?>#contact" class="btn btn--primary btn--lg"><?= e(__('hero_cta_contact')) ?></a>
            </div>
        </div>
        <div class="container footer-grid">
            <div class="footer-brand" data-wave-anchor>
                <a href="<?= home_href() ?>" class="logo">
                    <img class="logo-img" src="<?= brand_logo_href() ?>" alt="Visio — Agenție Software SaaS Moldova" width="32" height="32">
                    <span class="logo-text">Visio<span class="logo-dot">.</span></span>
                </a>
                <p class="footer-tagline"><?= e(__('footer_tagline')) ?></p>
                <p class="footer-leader"><?= e(__('footer_leader')) ?></p>
                <div class="footer-social">
                    <a href="mailto:plescagheorghe07@gmail.com" aria-label="Email">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </a>
                    <a href="<?= home_href() ?>#projects" aria-label="<?= e(__('nav_projects')) ?>">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    </a>
                </div>
            </div>
            <div class="footer-links">
                <h4>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    <?= e(__('nav_services')) ?>
                </h4>
                <ul>
                    <li><a href="<?= home_href() ?>#services"><?= e(__('service_saas_title')) ?></a></li>
                    <li><a href="<?= home_href() ?>#services"><?= e(__('service_web_title')) ?></a></li>
                    <li><a href="<?= home_href() ?>#services"><?= e(__('service_seo_title')) ?></a></li>
                    <li><a href="<?= home_href() ?>#services"><?= e(__('service_design_title')) ?></a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    <?= e(__('nav_projects')) ?>
                </h4>
                <ul>
                    <li><a href="<?= project_href('guestmemories') ?>">GuestMemories</a></li>
                    <li><a href="<?= project_href('eduguide') ?>">EduGuide</a></li>
                    <li><a href="<?= project_href('dentadent') ?>">DentaDent</a></li>
                    <li><a href="<?= home_href() ?>#projects"><?= e(__('footer_all_projects')) ?></a></li>
                </ul>
            </div>
            <div class="footer-contact" data-wave-anchor>
                <h4>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    <?= e(__('nav_contact')) ?>
                </h4>
                <a href="mailto:plescagheorghe07@gmail.com">plescagheorghe07@gmail.com</a>
                <p class="footer-location">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <?= e(__('contact_location')) ?>
                </p>
                <a href="<?= home_href() ?>#contact" class="btn btn--sm btn--primary"><?= e(__('hero_cta_contact')) ?></a>
            </div>
        </div>

        <section class="footer-seo" aria-label="SEO">
            <div class="container">
                <h2 class="footer-seo__title"><?= e(__('footer_seo_title')) ?></h2>
                <p class="footer-seo__text"><?= e(__('footer_seo_text')) ?></p>
                <div class="footer-seo__tags">
                    <?php
                    $seoTags = [
                        'chisinau', 'moldova', 'site', 'webapp', 'dezvoltare', 'programare', 'saas',
                        'fullstack', 'php', 'react', 'nextjs', 'seo', 'design', 'software', 'webdesign',
                        'aplicatiweb', 'platforme', 'it', 'tech', 'startup', 'crearewebsite', 'agentieweb',
                        'developer', 'mysql', 'postgresql', 'gsap', 'uiux', 'enterprise', 'edtech', 'fintech',
                    ];
                    foreach ($seoTags as $tag):
                    ?>
                    <a href="<?= home_href() ?>#services" class="footer-seo__tag">#<?= e($tag) ?></a>
                    <?php endforeach; ?>
                </div>
                <p class="footer-seo__keywords"><?= e(__('footer_seo_keywords')) ?></p>
            </div>
        </section>

        <div class="footer-bottom container">
            <p>&copy; <?= date('Y') ?> Visio — <?= e(__('footer_rights')) ?></p>
            <nav class="footer-bottom__nav" aria-label="Footer">
                <a href="<?= home_href() ?>#about"><?= e(__('nav_about')) ?></a>
                <a href="<?= home_href() ?>#services"><?= e(__('nav_services')) ?></a>
                <a href="<?= home_href() ?>#projects"><?= e(__('nav_projects')) ?></a>
                <a href="<?= home_href() ?>#process"><?= e(__('nav_process')) ?></a>
                <a href="<?= home_href() ?>#faq"><?= e(__('nav_faq')) ?></a>
                <a href="<?= home_href() ?>#contact"><?= e(__('nav_contact')) ?></a>
            </nav>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="<?= e(asset_url('js/theme.js')) ?>"></script>
    <script src="<?= e(asset_url('js/waves.js')) ?>"></script>
    <script src="<?= e(asset_url('js/main.js')) ?>"></script>
    <?php if (!empty($loadLightbox)): ?>
    <script src="<?= e(asset_url('js/lightbox.js')) ?>"></script>
    <?php endif; ?>
</body>
</html>

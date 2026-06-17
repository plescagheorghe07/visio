    </main>
    <?php
    $loadLightbox = $loadLightbox ?? false;
    track_page_view($pageTitle ?? null);
    ?>
    <footer class="site-footer site-footer--v2">
        <div class="footer-cta-band">
            <div class="container footer-cta-inner">
                <div class="footer-cta-text">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    <div>
                        <strong><?= e(__('footer_cta_title')) ?></strong>
                        <span><?= e(__('footer_cta_sub')) ?></span>
                    </div>
                </div>
                <a href="<?= home_href() ?>#contact" class="btn btn--primary btn--lg btn--glow"><?= e(__('hero_cta_contact')) ?></a>
            </div>
        </div>

        <div class="container footer-grid footer-grid--v2">
            <div class="footer-brand">
                <a href="<?= home_href() ?>" class="logo logo--footer">
                    <img class="logo-img" src="<?= brand_logo_href() ?>" alt="Visio — Agenție Software SaaS Moldova" width="40" height="40">
                    <span class="logo-text">Visio<span class="logo-dot">.</span></span>
                </a>
                <p class="footer-tagline"><?= e(__('footer_tagline')) ?></p>
                <p class="footer-leader"><?= e(__('footer_leader')) ?></p>
                <div class="footer-social">
                    <a href="mailto:plescagheorghe07@gmail.com" class="footer-social-link" aria-label="Email">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </a>
                    <a href="https://plescagheorghe.vercel.app/ro" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Portfolio">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </a>
                </div>
            </div>

            <div class="footer-links">
                <h4>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    <?= e(__('nav_services')) ?>
                </h4>
                <ul>
                    <li><a href="<?= home_href() ?>#services"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg> SaaS Platforms</a></li>
                    <li><a href="<?= home_href() ?>#services"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg> Full Stack Development</a></li>
                    <li><a href="<?= home_href() ?>#services"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg> SEO & Performance</a></li>
                    <li><a href="<?= home_href() ?>#services"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg> UI/UX & Animations</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h4>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    <?= e(__('nav_projects')) ?>
                </h4>
                <ul>
                    <li><a href="<?= project_href('guestmemories') ?>"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg> GuestMemories</a></li>
                    <li><a href="<?= project_href('eduguide') ?>"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg> EduGuide</a></li>
                    <li><a href="<?= project_href('dentadent') ?>"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg> DentaDent</a></li>
                    <li><a href="<?= home_href() ?>#projects"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg> <?= e(__('footer_all_projects')) ?></a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h4>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    <?= e(__('nav_contact')) ?>
                </h4>
                <a href="mailto:plescagheorghe07@gmail.com" class="footer-email">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    plescagheorghe07@gmail.com
                </a>
                <p class="footer-location">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <?= e(__('contact_location')) ?>
                </p>
                <a href="<?= home_href() ?>#contact" class="btn btn--sm btn--primary"><?= e(__('hero_cta_contact')) ?></a>
            </div>
        </div>

        <div class="footer-seo footer-seo--v2">
            <div class="container">
                <h2 class="footer-seo-title"><?= e(__('footer_seo_title')) ?></h2>
                <p class="footer-seo-text"><?= e(__('footer_seo_text')) ?></p>
                <p class="footer-seo-text footer-seo-text--extra"><?= e(__('footer_seo_text2')) ?></p>
                <div class="footer-seo-tags" aria-label="<?= e(__('footer_seo_tags_label')) ?>">
                    <?php
                    $seoTags = array_filter(array_map('trim', explode(',', __('footer_seo_tags'))));
                    foreach ($seoTags as $seoTag):
                        $tagSlug = preg_replace('/^#/', '', $seoTag);
                    ?>
                    <a href="<?= home_href() ?>#services" class="footer-hashtag" title="<?= e($tagSlug) ?>"><?= e($seoTag) ?></a>
                    <?php endforeach; ?>
                </div>
                <p class="footer-seo-keywords"><?= e(__('footer_seo_keywords')) ?></p>
            </div>
        </div>

        <div class="footer-bottom container">
            <p>&copy; <?= date('Y') ?> Visio — <?= e(__('footer_rights')) ?></p>
            <div class="footer-bottom-links">
                <a href="<?= home_href() ?>#about"><?= e(__('nav_about')) ?></a>
                <a href="<?= home_href() ?>#services"><?= e(__('nav_services')) ?></a>
                <a href="<?= home_href() ?>#projects"><?= e(__('nav_projects')) ?></a>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="<?= asset('js/theme.js') ?>"></script>
    <script src="<?= asset('js/waves.js') ?>"></script>
    <script src="<?= asset('js/main.js') ?>"></script>
    <?php if (!empty($loadLightbox)): ?>
    <script src="<?= asset('js/lightbox.js') ?>"></script>
    <?php endif; ?>
</body>
</html>

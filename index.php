<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/includes/bootstrap.php';

$lang = current_lang();
$projects = projects_repo()->getAllActive();
$projectCount = count($projects);
$tagCount = count(projects_repo()->getAllTags());

$pageTitle = __('meta_title');
$pageDescription = __('meta_description');
$pageKeywords = __('meta_keywords');
$canonicalUrl = home_url($lang);

require __DIR__ . '/partials/header.php';

$services = [
    ['icon' => 'cloud', 'title' => 'service_saas_title', 'desc' => 'service_saas_desc', 'features' => 'service_saas_features', 'tags' => 'service_saas_tags', 'num' => '01', 'featured' => true, 'link' => '#contact'],
    ['icon' => 'code', 'title' => 'service_web_title', 'desc' => 'service_web_desc', 'features' => 'service_web_features', 'tags' => 'service_web_tags', 'num' => '02', 'featured' => false, 'link' => '#projects'],
    ['icon' => 'search', 'title' => 'service_seo_title', 'desc' => 'service_seo_desc', 'features' => 'service_seo_features', 'tags' => 'service_seo_tags', 'num' => '03', 'featured' => false, 'link' => '#about'],
    ['icon' => 'palette', 'title' => 'service_design_title', 'desc' => 'service_design_desc', 'features' => 'service_design_features', 'tags' => 'service_design_tags', 'num' => '04', 'featured' => false, 'link' => '#contact'],
];

$aboutValues = array_filter(array_map('trim', explode('|', __('about_values'))));
$techMarquee = array_filter(array_map('trim', explode(',', __('about_tech_marquee'))));
$bridgeIndex = 0;
?>

<!-- ═══ HERO — Construim viitorul ═══ -->
<section class="hero hero--v2" id="home">
    <div class="hero-mesh" aria-hidden="true"></div>
    <div class="hero-noise" aria-hidden="true"></div>
    <div class="hero-orb hero-orb--1"></div>
    <div class="hero-orb hero-orb--2"></div>
    <div class="hero-orb hero-orb--3"></div>

    <div class="hero-flow-lines" aria-hidden="true">
        <svg class="hero-flow-svg" viewBox="0 0 600 500" fill="none">
            <path class="hero-flow-path" d="M50,250 C150,100 250,400 350,250 S550,100 550,250" stroke="url(#heroFlowGrad)" stroke-width="2"/>
            <path class="hero-flow-path" d="M80,300 C200,180 320,420 440,280 S520,150 560,320" stroke="url(#heroFlowGrad)" stroke-width="1.5" opacity="0.5"/>
            <defs>
                <linearGradient id="heroFlowGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#5b5ef7"/>
                    <stop offset="50%" stop-color="#7c3aed"/>
                    <stop offset="100%" stop-color="#db2777"/>
                </linearGradient>
            </defs>
            <circle class="hero-flow-node" r="5" fill="#5b5ef7"/>
        </svg>
    </div>

    <div class="container hero-layout">
        <div class="hero-main">
            <div class="hero-badge-row">
                <span class="badge hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    <?= e(__('hero_badge')) ?>
                </span>
                <span class="hero-live">
                    <span class="hero-live-dot"></span>
                    <?= e(__('hero_live')) ?>
                </span>
            </div>

            <h1 class="hero-title hero-title--split">
                <span class="hero-line hero-line--1"><?= e(__('hero_title_1')) ?></span>
                <span class="hero-line hero-line--2 hero-gradient-text"><?= e(__('hero_title_2')) ?></span>
                <span class="hero-line hero-line--3"><?= e(__('hero_title_3')) ?></span>
            </h1>

            <p class="hero-subtitle"><?= e(__('hero_subtitle')) ?></p>

            <div class="hero-actions">
                <a href="#projects" class="btn btn--primary btn--lg btn--glow">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                    <?= e(__('hero_cta_projects')) ?>
                </a>
                <a href="#contact" class="btn btn--outline btn--lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    <?= e(__('hero_cta_contact')) ?>
                </a>
            </div>

            <nav class="hero-quicknav" aria-label="<?= e(__('hero_quicknav')) ?>">
                <a href="#about" class="hero-quicknav-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
                    <?= e(__('nav_about')) ?>
                </a>
                <a href="#services" class="hero-quicknav-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    <?= e(__('nav_services')) ?>
                </a>
                <a href="#projects" class="hero-quicknav-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    <?= e(__('nav_projects')) ?>
                </a>
            </nav>
        </div>

        <div class="hero-side">
            <div class="hero-orbit-wrap">
                <div class="hero-orbit-ring hero-orbit-ring--1"></div>
                <div class="hero-orbit-ring hero-orbit-ring--2"></div>
                <div class="hero-orbit-center">
                    <img src="<?= brand_logo_href() ?>" alt="Visio" width="48" height="48">
                </div>
                <?php
                $orbitTech = ['PHP', 'React', 'Next.js', 'GSAP', 'MySQL', 'SEO'];
                foreach ($orbitTech as $ti => $tech):
                    $angle = ($ti / count($orbitTech)) * 360;
                ?>
                <div class="orbit-node" style="--angle: <?= $angle ?>deg" title="<?= e($tech) ?>">
                    <span><?= e($tech) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="container hero-stats-bar">
        <div class="stat-card stat-card--inline" data-count="<?= $projectCount ?>">
            <div class="stat-icon" aria-hidden="true">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="stat-body">
                <span class="stat-number">0</span>
                <span class="stat-label"><?= e(__('stats_projects')) ?></span>
            </div>
        </div>
        <div class="stat-card stat-card--inline" data-count="<?= max($tagCount, 15) ?>">
            <div class="stat-icon" aria-hidden="true">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
            <div class="stat-body">
                <span class="stat-number">0</span>
                <span class="stat-label"><?= e(__('stats_technologies')) ?></span>
            </div>
        </div>
        <div class="stat-card stat-card--inline" data-count="3">
            <div class="stat-icon" aria-hidden="true">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <div class="stat-body">
                <span class="stat-number">0</span>
                <span class="stat-label"><?= e(__('stats_languages')) ?></span>
            </div>
        </div>
        <div class="stat-card stat-card--inline" data-count="100">
            <div class="stat-icon" aria-hidden="true">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <div class="stat-body">
                <span class="stat-number">0</span><span class="stat-suffix">%</span>
                <span class="stat-label"><?= e(__('stats_satisfaction')) ?></span>
            </div>
        </div>
    </div>

    <div class="hero-scroll">
        <a href="#about" class="scroll-indicator" aria-label="<?= e(__('nav_about')) ?>"></a>
    </div>
</section>

<?php $from = 'home'; $to = 'about'; $index = $bridgeIndex++; require __DIR__ . '/partials/wave-bridge.php'; ?>

<!-- ═══ DESPRE ═══ -->
<section class="about section section--v2" id="about">
    <div class="section-bg-pattern" aria-hidden="true"></div>
    <div class="container">
        <div class="section-header section-header--center">
            <span class="section-label">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
                <?= e(__('about_label')) ?>
            </span>
            <h2 class="section-title"><?= e(__('about_title')) ?></h2>
            <p class="section-subtitle section-subtitle--center"><?= e(__('about_intro')) ?></p>
        </div>

        <div class="about-values">
            <?php foreach ($aboutValues as $vi => $value):
                $parts = array_map('trim', explode(':', $value, 2));
                $vTitle = $parts[0] ?? '';
                $vDesc = $parts[1] ?? '';
                $icons = ['zap', 'shield', 'rocket', 'globe'];
                $icon = $icons[$vi % count($icons)];
            ?>
            <article class="value-card">
                <div class="value-icon value-icon--<?= e($icon) ?>" aria-hidden="true">
                    <?php if ($icon === 'zap'): ?>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    <?php elseif ($icon === 'shield'): ?>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <?php elseif ($icon === 'rocket'): ?>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09zM12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/></svg>
                    <?php else: ?>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    <?php endif; ?>
                </div>
                <h3><?= e($vTitle) ?></h3>
                <p><?= e($vDesc) ?></p>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="about-detail">
            <div class="about-detail-text">
                <p><?= e(__('about_text')) ?></p>
                <p><?= e(__('about_text2')) ?></p>
                <a href="#services" class="btn btn--outline btn--sm about-cta">
                    <?= e(__('about_cta')) ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="about-leader-card">
                <div class="about-leader-avatar" aria-hidden="true">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <div>
                    <strong>Pleșca Gheorghe</strong>
                    <span><?= e(__('about_leader_role')) ?></span>
                </div>
                <div class="about-leader-badges">
                    <span class="tag">Full Stack</span>
                    <span class="tag">PHP</span>
                    <span class="tag">React</span>
                </div>
            </div>
        </div>

        <?php if ($techMarquee): ?>
        <div class="tech-marquee" aria-label="Tech stack">
            <div class="tech-marquee-track">
                <?php foreach ($techMarquee as $tech): ?>
                <span class="tech-marquee-item">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="4"/></svg>
                    <?= e($tech) ?>
                </span>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php $from = 'about'; $to = 'services'; $index = $bridgeIndex++; require __DIR__ . '/partials/wave-bridge.php'; ?>

<!-- ═══ SERVICII ═══ -->
<section class="services section section--v2" id="services">
    <div class="container">
        <div class="section-header">
            <span class="section-label">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                <?= e(__('services_label')) ?>
            </span>
            <h2 class="section-title"><?= e(__('services_title')) ?></h2>
            <p class="section-subtitle"><?= e(__('services_subtitle')) ?></p>
        </div>

        <div class="services-hub" aria-hidden="true">
            <svg class="services-hub-svg" viewBox="0 0 800 400">
                <path class="hub-path" d="M100,200 Q400,50 700,200" stroke="var(--accent)" stroke-width="1" fill="none" opacity="0.2"/>
                <path class="hub-path" d="M100,200 Q400,350 700,200" stroke="var(--accent)" stroke-width="1" fill="none" opacity="0.2"/>
            </svg>
        </div>

        <div class="services-bento">
            <?php foreach ($services as $svc):
                $features = array_filter(array_map('trim', explode('|', __($svc['features']))));
                $tags = array_filter(array_map('trim', explode(',', __($svc['tags']))));
            ?>
            <article class="service-card service-card--<?= e($svc['icon']) ?><?= $svc['featured'] ? ' service-card--featured' : '' ?>">
                <div class="service-card-glow" aria-hidden="true"></div>
                <div class="service-card-top">
                    <div class="service-icon" aria-hidden="true">
                        <?php if ($svc['icon'] === 'cloud'): ?>
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/></svg>
                        <?php elseif ($svc['icon'] === 'code'): ?>
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                        <?php elseif ($svc['icon'] === 'search'): ?>
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                        <?php else: ?>
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="13.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="10.5" r="2.5"/><circle cx="8.5" cy="7.5" r="2.5"/><circle cx="6.5" cy="12.5" r="2.5"/></svg>
                        <?php endif; ?>
                    </div>
                    <span class="service-num"><?= e($svc['num']) ?></span>
                </div>
                <h3><?= e(__($svc['title'])) ?></h3>
                <p class="service-desc"><?= e(__($svc['desc'])) ?></p>
                <?php if ($features): ?>
                <ul class="service-features">
                    <?php foreach ($features as $feat): ?>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
                        <?= e($feat) ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if ($tags): ?>
                <div class="service-tags">
                    <?php foreach ($tags as $tag): ?>
                    <span class="service-tag"><?= e($tag) ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <a href="<?= e($svc['link']) ?>" class="service-link">
                    <?= e(__('service_learn_more')) ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php $from = 'services'; $to = 'projects'; $index = $bridgeIndex++; require __DIR__ . '/partials/wave-bridge.php'; ?>

<!-- ═══ PROIECTE ═══ -->
<section class="projects section section--v2" id="projects">
    <div class="container">
        <div class="section-header section-header--center">
            <span class="section-label">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                <?= e(__('projects_label')) ?>
            </span>
            <h2 class="section-title"><?= e(__('projects_title')) ?></h2>
            <p class="section-subtitle section-subtitle--center"><?= e(__('projects_subtitle')) ?></p>
        </div>

        <div class="projects-showcase">
            <?php foreach ($projects as $i => $project):
                $title = lang_field($project, 'title');
                $desc = lang_field($project, 'description');
                $cover = projects_repo()->getCoverImage((int) $project['id']);
                $tags = projects_repo()->getTags((int) $project['id']);
                $imgSrc = $cover ? upload_url($cover['image_path']) : brand_logo_href();
                $indexNum = str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT);
                $category = $tags[0] ?? 'Web App';
                $reverse = $i % 2 === 1;
            ?>
            <article class="project-showcase<?= $reverse ? ' project-showcase--reverse' : '' ?>">
                <a href="<?= project_href($project['slug']) ?>" class="project-showcase-link">
                    <div class="project-showcase-visual">
                        <span class="project-showcase-num"><?= $indexNum ?></span>
                        <img src="<?= e($imgSrc) ?>" alt="<?= e($title) ?> — Visio Moldova" loading="lazy"
                             onerror="this.src='<?= brand_logo_href() ?>'">
                        <div class="project-showcase-overlay">
                            <span class="project-showcase-cta">
                                <?= e(__('project_view')) ?>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
                            </span>
                        </div>
                    </div>
                    <div class="project-showcase-content">
                        <div class="project-showcase-meta">
                            <span class="project-showcase-cat">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/></svg>
                                <?= e($category) ?>
                            </span>
                            <?php if (count($tags) > 1): ?>
                            <span class="project-showcase-tech-count"><?= count($tags) ?> <?= e(__('project_tech_count')) ?></span>
                            <?php endif; ?>
                        </div>
                        <h3><?= e($title) ?></h3>
                        <p><?= e(mb_substr($desc, 0, 200)) ?><?= mb_strlen($desc) > 200 ? '…' : '' ?></p>
                        <?php if ($tags): ?>
                        <div class="project-tags">
                            <?php foreach (array_slice($tags, 0, 6) as $tag): ?>
                            <span class="tag"><?= e($tag) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php $from = 'projects'; $to = 'contact'; $index = $bridgeIndex++; require __DIR__ . '/partials/wave-bridge.php'; ?>

<!-- ═══ CONTACT ═══ -->
<section class="contact section section--v2" id="contact">
    <div class="contact-bg-glow" aria-hidden="true"></div>
    <div class="container contact-layout">
        <div class="contact-info">
            <span class="section-label">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <?= e(__('contact_label')) ?>
            </span>
            <h2 class="section-title"><?= e(__('contact_title')) ?></h2>
            <p class="contact-lead"><?= e(__('contact_subtitle')) ?></p>

            <div class="contact-cards">
                <a href="mailto:plescagheorghe07@gmail.com" class="contact-card">
                    <div class="contact-card-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <strong><?= e(__('contact_email_label')) ?></strong>
                        <span>plescagheorghe07@gmail.com</span>
                    </div>
                </a>
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <strong><?= e(__('contact_location_label')) ?></strong>
                        <span><?= e(__('contact_location')) ?></span>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                        <strong><?= e(__('contact_response_label')) ?></strong>
                        <span><?= e(__('contact_response')) ?></span>
                    </div>
                </div>
            </div>
        </div>

        <form class="contact-form contact-form--v2" id="contactForm" action="<?= api_href('api/contact.php') ?>" method="POST">
            <div class="contact-form-header">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                <span><?= e(__('contact_form_title')) ?></span>
            </div>
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <div class="form-row">
                <div class="form-group">
                    <label for="name"><?= e(__('contact_name')) ?></label>
                    <input type="text" id="name" name="name" required maxlength="120" placeholder="<?= e(__('contact_name')) ?>">
                </div>
                <div class="form-group">
                    <label for="email"><?= e(__('contact_email')) ?></label>
                    <input type="email" id="email" name="email" required maxlength="255" placeholder="email@exemplu.com">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone"><?= e(__('contact_phone')) ?></label>
                    <input type="tel" id="phone" name="phone" maxlength="40" placeholder="+373 ...">
                </div>
                <div class="form-group">
                    <label for="subject"><?= e(__('contact_subject')) ?></label>
                    <input type="text" id="subject" name="subject" maxlength="255" placeholder="<?= e(__('contact_subject')) ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="message"><?= e(__('contact_message')) ?></label>
                <textarea id="message" name="message" rows="5" required maxlength="5000" placeholder="<?= e(__('contact_message')) ?>"></textarea>
            </div>
            <div class="form-feedback" id="formFeedback"></div>
            <button type="submit" class="btn btn--primary btn--lg btn--glow btn--full">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                <?= e(__('contact_send')) ?>
            </button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

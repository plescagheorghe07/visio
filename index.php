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

$techStack = ['PHP', 'React', 'Next.js', 'MySQL', 'PostgreSQL', 'GSAP', 'Node.js', 'TypeScript', 'Tailwind CSS', 'Docker', 'REST API', 'SEO', 'SaaS', 'GraphQL', 'Redis', 'Vercel'];

$services = [
    [
        'num' => '01',
        'icon' => 'cloud',
        'title' => 'service_saas_title',
        'desc' => 'service_saas_desc',
        'features' => ['service_saas_f1', 'service_saas_f2', 'service_saas_f3', 'service_saas_f4', 'service_saas_f5'],
        'tags' => ['SaaS', 'Cloud', 'PHP', 'MySQL', 'Stripe'],
    ],
    [
        'num' => '02',
        'icon' => 'code',
        'title' => 'service_web_title',
        'desc' => 'service_web_desc',
        'features' => ['service_web_f1', 'service_web_f2', 'service_web_f3', 'service_web_f4', 'service_web_f5'],
        'tags' => ['React', 'Next.js', 'PHP', 'REST API', 'PostgreSQL'],
    ],
    [
        'num' => '03',
        'icon' => 'search',
        'title' => 'service_seo_title',
        'desc' => 'service_seo_desc',
        'features' => ['service_seo_f1', 'service_seo_f2', 'service_seo_f3', 'service_seo_f4', 'service_seo_f5'],
        'tags' => ['SEO', 'Google', 'Schema.org', 'Performance', 'Indexare'],
    ],
    [
        'num' => '04',
        'icon' => 'palette',
        'title' => 'service_design_title',
        'desc' => 'service_design_desc',
        'features' => ['service_design_f1', 'service_design_f2', 'service_design_f3', 'service_design_f4', 'service_design_f5'],
        'tags' => ['UI/UX', 'GSAP', 'Design', 'Responsive', 'Figma'],
    ],
];

$aboutFeatures = [
    ['icon' => 'zap', 'title' => 'about_feat1_title', 'desc' => 'about_feat1_desc'],
    ['icon' => 'globe', 'title' => 'about_feat2_title', 'desc' => 'about_feat2_desc'],
    ['icon' => 'sparkles', 'title' => 'about_feat3_title', 'desc' => 'about_feat3_desc'],
    ['icon' => 'layers', 'title' => 'about_feat4_title', 'desc' => 'about_feat4_desc'],
];
?>

<section class="hero" id="home">
    <div class="hero-bg">
        <div class="hero-orb hero-orb--1"></div>
        <div class="hero-orb hero-orb--2"></div>
        <div class="hero-orb hero-orb--3"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container hero-content">
        <div class="hero-meta" data-wave-anchor>
            <span class="badge hero-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                <?= e(__('hero_badge')) ?>
            </span>
            <span class="hero-status">
                <span class="hero-status__dot"></span>
                <?= e(__('hero_status')) ?>
            </span>
        </div>
        <h1 class="hero-title">
            <span class="hero-line"><?= e(__('hero_title')) ?></span>
            <span class="hero-line hero-line--accent"><?= e(__('hero_title_accent')) ?></span>
        </h1>
        <p class="hero-subtitle"><?= e(__('hero_subtitle')) ?></p>
        <div class="hero-actions">
            <a href="#projects" class="btn btn--primary btn--lg">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                <?= e(__('hero_cta_projects')) ?>
            </a>
            <a href="#contact" class="btn btn--outline btn--lg">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <?= e(__('hero_cta_contact')) ?>
            </a>
        </div>
        <div class="hero-quicklinks">
            <a href="#about" class="hero-quicklink" data-wave-anchor>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/></svg>
                <?= e(__('nav_about')) ?>
            </a>
            <a href="#services" class="hero-quicklink" data-wave-anchor>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                <?= e(__('nav_services')) ?>
            </a>
            <a href="#projects" class="hero-quicklink" data-wave-anchor>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                <?= e(__('nav_projects')) ?>
            </a>
        </div>
    </div>
    <div class="hero-scroll">
        <span class="scroll-indicator"></span>
    </div>
</section>

<section class="stats section">
    <div class="container stats-grid">
        <div class="stat-card" data-count="<?= $projectCount ?>" data-wave-anchor>
            <div class="stat-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
            </div>
            <span class="stat-number">0</span>
            <span class="stat-label"><?= e(__('stats_projects')) ?></span>
        </div>
        <div class="stat-card" data-count="<?= max($tagCount, 15) ?>" data-wave-anchor>
            <div class="stat-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
            <span class="stat-number">0</span>
            <span class="stat-label"><?= e(__('stats_technologies')) ?></span>
        </div>
        <div class="stat-card" data-count="100" data-wave-anchor>
            <div class="stat-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <span class="stat-number">0</span>
            <span class="stat-suffix">%</span>
            <span class="stat-label"><?= e(__('stats_satisfaction')) ?></span>
        </div>
    </div>
</section>

<section class="tech-marquee section section--compact" aria-label="<?= e(__('tech_marquee_label')) ?>">
    <div class="container">
        <p class="tech-marquee__label"><?= e(__('tech_marquee_label')) ?></p>
    </div>
    <div class="tech-marquee__wrap">
        <div class="tech-marquee__track">
            <?php foreach (array_merge($techStack, $techStack) as $tech): ?>
            <span class="tech-chip"><?= e($tech) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about section" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-visual" data-wave-anchor>
                <div class="about-card about-card--leader">
                    <div class="about-card__avatar">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/></svg>
                    </div>
                    <div>
                        <strong><?= e(__('about_leader_name')) ?></strong>
                        <span><?= e(__('about_leader_role')) ?></span>
                    </div>
                </div>
                <?php foreach (array_slice($aboutFeatures, 0, 3) as $i => $feat): ?>
                <div class="about-card about-card--<?= $i + 1 ?>">
                    <span class="about-card-label"><?= e(__($feat['title'])) ?></span>
                    <span class="about-card-value"><?= e(__($feat['desc'])) ?></span>
                </div>
                <?php endforeach; ?>
                <div class="about-glow"></div>
            </div>
            <div class="about-text">
                <span class="section-label"><?= e(__('about_label')) ?></span>
                <h2 class="section-title"><?= e(__('about_title')) ?></h2>
                <p class="about-lead"><?= e(__('about_lead')) ?></p>
                <p><?= e(__('about_text')) ?></p>
                <p><?= e(__('about_text2')) ?></p>
                <a href="#services" class="btn btn--primary about-cta">
                    <?= e(__('about_cta')) ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
        <div class="about-features">
            <?php foreach ($aboutFeatures as $feat): ?>
            <article class="about-feature" data-wave-anchor>
                <div class="about-feature__icon about-feature__icon--<?= e($feat['icon']) ?>">
                    <?php if ($feat['icon'] === 'zap'): ?>
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    <?php elseif ($feat['icon'] === 'globe'): ?>
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    <?php elseif ($feat['icon'] === 'sparkles'): ?>
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3zM5 19l1 3 1-3 3-1-3-1-1-3-1 3-3 1 3 1z"/></svg>
                    <?php else: ?>
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                    <?php endif; ?>
                </div>
                <h3><?= e(__($feat['title'])) ?></h3>
                <p><?= e(__($feat['desc'])) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="services section" id="services">
    <div class="container">
        <div class="section-header">
            <span class="section-label" data-wave-anchor><?= e(__('services_label')) ?></span>
            <h2 class="section-title"><?= e(__('services_title')) ?></h2>
            <p class="section-subtitle"><?= e(__('services_subtitle')) ?></p>
        </div>
        <div class="services-grid">
            <?php foreach ($services as $svc): ?>
            <article class="service-card" data-wave-anchor>
                <div class="service-card__head">
                    <span class="service-num"><?= $svc['num'] ?></span>
                    <div class="service-icon service-icon--<?= e($svc['icon']) ?>">
                        <?php if ($svc['icon'] === 'cloud'): ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/></svg>
                        <?php elseif ($svc['icon'] === 'code'): ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                        <?php elseif ($svc['icon'] === 'search'): ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                        <?php else: ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="13.5" cy="6.5" r="2.5"/><circle cx="19" cy="17" r="2"/><circle cx="6" cy="12" r="2"/><path d="M12 6.5V12l4.5 2"/></svg>
                        <?php endif; ?>
                    </div>
                </div>
                <h3><?= e(__($svc['title'])) ?></h3>
                <p class="service-card__desc"><?= e(__($svc['desc'])) ?></p>
                <ul class="service-features">
                    <?php foreach ($svc['features'] as $fKey): ?>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        <?= e(__($fKey)) ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="service-tags">
                    <?php foreach ($svc['tags'] as $tag): ?>
                    <span class="tag"><?= e($tag) ?></span>
                    <?php endforeach; ?>
                </div>
                <a href="#contact" class="service-card__link">
                    <?= e(__('service_learn_more')) ?>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="projects section" id="projects">
    <div class="container">
        <div class="section-header">
            <span class="section-label" data-wave-anchor><?= e(__('projects_label')) ?></span>
            <h2 class="section-title"><?= e(__('projects_title')) ?></h2>
            <p class="section-subtitle"><?= e(__('projects_subtitle')) ?></p>
        </div>
        <div class="projects-grid">
            <?php foreach ($projects as $i => $project):
                $title = lang_field($project, 'title');
                $desc = lang_field($project, 'description');
                $cover = projects_repo()->getCoverImage((int) $project['id']);
                $tags = projects_repo()->getTags((int) $project['id']);
                $imgSrc = $cover ? upload_url($cover['image_path']) : brand_logo_href();
                $primaryTag = $tags[0] ?? 'Web';
                $num = str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT);
            ?>
            <article class="project-card" data-wave-anchor>
                <a href="<?= project_href($project['slug']) ?>" class="project-card-link">
                    <div class="project-card__top">
                        <span class="project-card__index"><?= $num ?></span>
                        <span class="project-card__category"><?= e($primaryTag) ?></span>
                    </div>
                    <div class="project-card-image">
                        <img src="<?= e($imgSrc) ?>" alt="<?= e($title) ?> — Visio Moldova" loading="lazy"
                             onerror="this.src='<?= brand_logo_href() ?>'">
                        <div class="project-card-overlay">
                            <span class="project-card__cta">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                <?= e(__('project_view')) ?>
                            </span>
                        </div>
                    </div>
                    <div class="project-card-body">
                        <h3><?= e($title) ?></h3>
                        <p><?= e(mb_substr($desc, 0, 140)) ?><?= mb_strlen($desc) > 140 ? '…' : '' ?></p>
                        <div class="project-card__meta">
                            <?php if ($tags): ?>
                            <div class="project-tags">
                                <?php foreach (array_slice($tags, 0, 5) as $tag): ?>
                                <span class="tag"><?= e($tag) ?></span>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <span class="project-card__tech-count">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                                <?= count($tags) ?> <?= e(__('project_tech_count')) ?>
                            </span>
                        </div>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="contact section" id="contact">
    <div class="container contact-grid">
        <div class="contact-info" data-wave-anchor>
            <span class="section-label"><?= e(__('contact_label')) ?></span>
            <h2 class="section-title"><?= e(__('contact_title')) ?></h2>
            <p><?= e(__('contact_subtitle')) ?></p>
            <div class="contact-details">
                <div class="contact-detail">
                    <div class="contact-detail__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <strong><?= e(__('contact_email_label')) ?></strong>
                        <a href="mailto:plescagheorghe07@gmail.com">plescagheorghe07@gmail.com</a>
                    </div>
                </div>
                <div class="contact-detail">
                    <div class="contact-detail__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <strong><?= e(__('contact_location_label')) ?></strong>
                        <span><?= e(__('contact_location')) ?></span>
                    </div>
                </div>
                <div class="contact-detail">
                    <div class="contact-detail__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                        <strong><?= e(__('contact_response_label')) ?></strong>
                        <span><?= e(__('contact_response')) ?></span>
                    </div>
                </div>
            </div>
        </div>
        <form class="contact-form" id="contactForm" action="<?= api_href('api/contact.php') ?>" method="POST" data-wave-anchor>
            <h3 class="contact-form__title"><?= e(__('contact_form_title')) ?></h3>
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <div class="form-row">
                <div class="form-group">
                    <label for="name"><?= e(__('contact_name')) ?></label>
                    <input type="text" id="name" name="name" required maxlength="120" placeholder="<?= e(__('contact_name')) ?>">
                </div>
                <div class="form-group">
                    <label for="email"><?= e(__('contact_email')) ?></label>
                    <input type="email" id="email" name="email" required maxlength="255" placeholder="email@example.com">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone"><?= e(__('contact_phone')) ?></label>
                    <input type="tel" id="phone" name="phone" maxlength="40" placeholder="+373">
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
            <button type="submit" class="btn btn--primary btn--lg">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                <?= e(__('contact_send')) ?>
            </button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

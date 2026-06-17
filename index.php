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
    ['icon' => 'cloud', 'title' => 'service_saas_title', 'desc' => 'service_saas_desc', 'features' => 'service_saas_features', 'tags' => 'service_saas_tags', 'num' => '01', 'featured' => true],
    ['icon' => 'code', 'title' => 'service_web_title', 'desc' => 'service_web_desc', 'features' => 'service_web_features', 'tags' => 'service_web_tags', 'num' => '02', 'featured' => false],
    ['icon' => 'search', 'title' => 'service_seo_title', 'desc' => 'service_seo_desc', 'features' => 'service_seo_features', 'tags' => 'service_seo_tags', 'num' => '03', 'featured' => false],
    ['icon' => 'palette', 'title' => 'service_design_title', 'desc' => 'service_design_desc', 'features' => 'service_design_features', 'tags' => 'service_design_tags', 'num' => '04', 'featured' => false],
];

$aboutValues = array_filter(array_map('trim', explode('|', __('about_values'))));
$techStack = array_filter(array_map('trim', explode(',', __('about_tech_marquee'))));
?>

<section class="hero" id="home">
    <div class="hero-bg">
        <div class="hero-orb hero-orb--1"></div>
        <div class="hero-orb hero-orb--2"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container hero-shell">
        <div class="hero-wrap">
            <div class="hero-copy">
                <span class="badge hero-badge"><?= e(__('hero_badge')) ?></span>
                <h1 class="hero-title"><?= e(__('hero_title')) ?></h1>
                <p class="hero-subtitle"><?= e(__('hero_subtitle')) ?></p>
                <div class="hero-actions">
                    <a href="#projects" class="btn btn--primary btn--lg"><?= e(__('hero_cta_projects')) ?></a>
                    <a href="#contact" class="btn btn--outline btn--lg"><?= e(__('hero_cta_contact')) ?></a>
                </div>
            </div>
            <aside class="hero-panel" aria-label="Tech stack">
                <p class="hero-panel-label"><?= e(__('hero_stack_label')) ?></p>
                <ul class="hero-stack-list">
                    <?php foreach (array_slice($techStack, 0, 8) as $tech): ?>
                    <li><?= e($tech) ?></li>
                    <?php endforeach; ?>
                </ul>
            </aside>
        </div>

        <div class="hero-stats">
            <div class="stat-card stat-card--hero" data-count="<?= $projectCount ?>">
                <span class="stat-number">0</span>
                <span class="stat-label"><?= e(__('stats_projects')) ?></span>
            </div>
            <div class="stat-card stat-card--hero" data-count="<?= max($tagCount, 15) ?>">
                <span class="stat-number">0</span>
                <span class="stat-label"><?= e(__('stats_technologies')) ?></span>
            </div>
            <div class="stat-card stat-card--hero" data-count="3">
                <span class="stat-number">0</span>
                <span class="stat-label"><?= e(__('stats_languages')) ?></span>
            </div>
            <div class="stat-card stat-card--hero" data-count="100">
                <span class="stat-number">0</span><span class="stat-suffix">%</span>
                <span class="stat-label"><?= e(__('stats_satisfaction')) ?></span>
            </div>
        </div>
    </div>
</section>

<section class="about section" id="about">
    <div class="container about-layout">
        <div class="about-main">
            <span class="section-label"><?= e(__('about_label')) ?></span>
            <h2 class="section-title"><?= e(__('about_title')) ?></h2>
            <p class="about-lead"><?= e(__('about_intro')) ?></p>
            <p><?= e(__('about_text')) ?></p>
            <p><?= e(__('about_text2')) ?></p>
            <a href="#services" class="btn btn--outline btn--sm"><?= e(__('about_cta')) ?></a>
        </div>
        <div class="about-side">
            <div class="about-values">
                <?php foreach ($aboutValues as $value):
                    $parts = array_map('trim', explode(':', $value, 2));
                ?>
                <article class="value-card">
                    <h3><?= e($parts[0] ?? '') ?></h3>
                    <p><?= e($parts[1] ?? '') ?></p>
                </article>
                <?php endforeach; ?>
            </div>
            <div class="about-leader-card">
                <strong>Pleșca Gheorghe</strong>
                <span><?= e(__('about_leader_role')) ?></span>
                <div class="about-leader-badges">
                    <span class="tag">Full Stack</span>
                    <span class="tag">PHP</span>
                    <span class="tag">React</span>
                </div>
            </div>
        </div>
    </div>
    <?php if ($techStack): ?>
    <div class="container">
        <p class="tech-stack-label"><?= e(__('hero_stack_label')) ?></p>
        <div class="tech-stack">
            <?php foreach ($techStack as $tech): ?>
            <span class="tech-stack-item"><?= e($tech) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</section>

<section class="services section" id="services">
    <div class="container">
        <div class="section-header">
            <span class="section-label"><?= e(__('services_label')) ?></span>
            <h2 class="section-title"><?= e(__('services_title')) ?></h2>
            <p class="section-subtitle"><?= e(__('services_subtitle')) ?></p>
        </div>
        <div class="services-bento">
            <?php foreach ($services as $svc):
                $features = array_filter(array_map('trim', explode('|', __($svc['features']))));
                $tags = array_filter(array_map('trim', explode(',', __($svc['tags']))));
            ?>
            <article class="service-card<?= $svc['featured'] ? ' service-card--featured' : '' ?>">
                <div class="service-card-top">
                    <span class="service-num"><?= e($svc['num']) ?></span>
                </div>
                <h3><?= e(__($svc['title'])) ?></h3>
                <p class="service-desc"><?= e(__($svc['desc'])) ?></p>
                <?php if ($features): ?>
                <ul class="service-features">
                    <?php foreach ($features as $feat): ?>
                    <li><?= e($feat) ?></li>
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
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="projects section" id="projects">
    <div class="container">
        <div class="section-header">
            <span class="section-label"><?= e(__('projects_label')) ?></span>
            <h2 class="section-title"><?= e(__('projects_title')) ?></h2>
            <p class="section-subtitle"><?= e(__('projects_subtitle')) ?></p>
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
                        <img src="<?= e($imgSrc) ?>" alt="<?= e($title) ?>" loading="lazy"
                             onerror="this.src='<?= brand_logo_href() ?>'">
                    </div>
                    <div class="project-showcase-content">
                        <div class="project-showcase-meta">
                            <span class="project-showcase-cat"><?= e($category) ?></span>
                            <?php if (count($tags) > 1): ?>
                            <span class="project-showcase-tech-count"><?= count($tags) ?> <?= e(__('project_tech_count')) ?></span>
                            <?php endif; ?>
                        </div>
                        <h3><?= e($title) ?></h3>
                        <p><?= e(mb_substr($desc, 0, 180)) ?><?= mb_strlen($desc) > 180 ? '…' : '' ?></p>
                        <?php if ($tags): ?>
                        <div class="project-tags">
                            <?php foreach (array_slice($tags, 0, 5) as $tag): ?>
                            <span class="tag"><?= e($tag) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <span class="project-showcase-link-text"><?= e(__('project_view')) ?> →</span>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="contact section" id="contact">
    <div class="container contact-layout">
        <div class="contact-info">
            <span class="section-label"><?= e(__('contact_label')) ?></span>
            <h2 class="section-title"><?= e(__('contact_title')) ?></h2>
            <p class="contact-lead"><?= e(__('contact_subtitle')) ?></p>
            <div class="contact-cards">
                <a href="mailto:plescagheorghe07@gmail.com" class="contact-card">
                    <strong><?= e(__('contact_email_label')) ?></strong>
                    <span>plescagheorghe07@gmail.com</span>
                </a>
                <div class="contact-card">
                    <strong><?= e(__('contact_location_label')) ?></strong>
                    <span><?= e(__('contact_location')) ?></span>
                </div>
                <div class="contact-card">
                    <strong><?= e(__('contact_response_label')) ?></strong>
                    <span><?= e(__('contact_response')) ?></span>
                </div>
            </div>
        </div>
        <form class="contact-form" id="contactForm" action="<?= api_href('api/contact.php') ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <div class="form-row">
                <div class="form-group">
                    <label for="name"><?= e(__('contact_name')) ?></label>
                    <input type="text" id="name" name="name" required maxlength="120">
                </div>
                <div class="form-group">
                    <label for="email"><?= e(__('contact_email')) ?></label>
                    <input type="email" id="email" name="email" required maxlength="255">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone"><?= e(__('contact_phone')) ?></label>
                    <input type="tel" id="phone" name="phone" maxlength="40">
                </div>
                <div class="form-group">
                    <label for="subject"><?= e(__('contact_subject')) ?></label>
                    <input type="text" id="subject" name="subject" maxlength="255">
                </div>
            </div>
            <div class="form-group">
                <label for="message"><?= e(__('contact_message')) ?></label>
                <textarea id="message" name="message" rows="5" required maxlength="5000"></textarea>
            </div>
            <div class="form-feedback" id="formFeedback"></div>
            <button type="submit" class="btn btn--primary btn--lg btn--full"><?= e(__('contact_send')) ?></button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

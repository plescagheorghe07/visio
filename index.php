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

$aboutPoints = array_filter(array_map('trim', explode('|', __('about_points'))));
$techStack = array_filter(array_map('trim', explode(',', __('about_tech_marquee'))));
?>

<section class="hero hero--clean" id="home">
    <div class="hero-surface" aria-hidden="true"></div>
    <div class="container hero-inner">
        <p class="hero-eyebrow"><?= e(__('hero_eyebrow')) ?></p>
        <h1 class="hero-headline">
            <?= e(__('hero_headline_1')) ?><span class="hero-headline-accent"><?= e(__('hero_headline_accent')) ?></span><?= e(__('hero_headline_2')) ?>
        </h1>
        <p class="hero-lead"><?= e(__('hero_subtitle')) ?></p>
        <div class="hero-cta-row">
            <a href="#projects" class="btn btn--primary btn--lg"><?= e(__('hero_cta_projects')) ?></a>
            <a href="#contact" class="btn btn--ghost btn--lg"><?= e(__('hero_cta_contact')) ?></a>
        </div>
        <dl class="hero-metrics">
            <div class="hero-metric" data-count="<?= $projectCount ?>">
                <dt><?= e(__('stats_projects')) ?></dt>
                <dd><span class="metric-num">0</span></dd>
            </div>
            <div class="hero-metric" data-count="<?= max($tagCount, 15) ?>">
                <dt><?= e(__('stats_technologies')) ?></dt>
                <dd><span class="metric-num">0</span></dd>
            </div>
            <div class="hero-metric" data-count="3">
                <dt><?= e(__('stats_languages')) ?></dt>
                <dd><span class="metric-num">0</span></dd>
            </div>
            <div class="hero-metric" data-count="100">
                <dt><?= e(__('stats_satisfaction')) ?></dt>
                <dd><span class="metric-num">0</span>%</dd>
            </div>
        </dl>
    </div>
</section>

<section class="about section" id="about">
    <div class="container about-split">
        <div class="about-copy">
            <span class="section-label"><?= e(__('about_label')) ?></span>
            <h2 class="section-title"><?= e(__('about_title')) ?></h2>
            <p class="about-intro"><?= e(__('about_intro')) ?></p>
            <p><?= e(__('about_text')) ?></p>
            <?php if ($aboutPoints): ?>
            <ul class="about-points">
                <?php foreach ($aboutPoints as $point): ?>
                <li><?= e($point) ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <p class="about-outro"><?= e(__('about_text2')) ?></p>
        </div>
        <aside class="about-aside">
            <div class="about-aside-card">
                <p class="about-aside-label"><?= e(__('about_leader_role')) ?></p>
                <p class="about-aside-name">Pleșca Gheorghe</p>
                <p class="about-aside-desc"><?= e(__('about_aside_text')) ?></p>
                <a href="#services" class="about-aside-link"><?= e(__('about_cta')) ?> →</a>
            </div>
            <?php if ($techStack): ?>
            <div class="tech-stack-block">
                <p class="tech-stack-label"><?= e(__('about_tech_label')) ?></p>
                <div class="tech-stack-grid">
                    <?php foreach ($techStack as $tech): ?>
                    <span class="tech-chip"><?= e($tech) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </aside>
    </div>
</section>

<section class="services section" id="services">
    <div class="container">
        <div class="section-header">
            <span class="section-label"><?= e(__('services_label')) ?></span>
            <h2 class="section-title"><?= e(__('services_title')) ?></h2>
            <p class="section-subtitle"><?= e(__('services_subtitle')) ?></p>
        </div>
        <div class="services-grid">
            <?php foreach ($services as $svc):
                $features = array_filter(array_map('trim', explode('|', __($svc['features']))));
                $tags = array_filter(array_map('trim', explode(',', __($svc['tags']))));
            ?>
            <article class="service-card<?= $svc['featured'] ? ' service-card--featured' : '' ?>">
                <div class="service-card-head">
                    <span class="service-num"><?= e($svc['num']) ?></span>
                    <h3><?= e(__($svc['title'])) ?></h3>
                </div>
                <p class="service-desc"><?= e(__($svc['desc'])) ?></p>
                <?php if ($features): ?>
                <ul class="service-features service-features--checks">
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
                        <span class="project-showcase-cat"><?= e($category) ?></span>
                        <h3><?= e($title) ?></h3>
                        <p><?= e(mb_substr($desc, 0, 180)) ?><?= mb_strlen($desc) > 180 ? '…' : '' ?></p>
                        <?php if ($tags): ?>
                        <div class="project-tags">
                            <?php foreach (array_slice($tags, 0, 5) as $tag): ?>
                            <span class="tag"><?= e($tag) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <span class="project-showcase-link-label"><?= e(__('project_view')) ?> →</span>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="contact section" id="contact">
    <div class="container contact-split">
        <div class="contact-copy">
            <span class="section-label"><?= e(__('contact_label')) ?></span>
            <h2 class="section-title"><?= e(__('contact_title')) ?></h2>
            <p class="contact-lead"><?= e(__('contact_subtitle')) ?></p>
            <ul class="contact-facts">
                <li>
                    <strong><?= e(__('contact_email_label')) ?></strong>
                    <a href="mailto:plescagheorghe07@gmail.com">plescagheorghe07@gmail.com</a>
                </li>
                <li>
                    <strong><?= e(__('contact_location_label')) ?></strong>
                    <span><?= e(__('contact_location')) ?></span>
                </li>
                <li>
                    <strong><?= e(__('contact_response_label')) ?></strong>
                    <span><?= e(__('contact_response')) ?></span>
                </li>
            </ul>
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
            <button type="submit" class="btn btn--primary btn--lg"><?= e(__('contact_send')) ?></button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

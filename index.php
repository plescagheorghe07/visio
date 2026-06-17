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
?>

<section class="hero" id="home">
    <div class="hero-bg">
        <div class="hero-orb hero-orb--1"></div>
        <div class="hero-orb hero-orb--2"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container hero-content">
        <span class="badge hero-badge"><?= e(__('hero_badge')) ?></span>
        <h1 class="hero-title">
        <span class="hero-line"><?= e(__('hero_title')) ?></span>
        </h1>
        <p class="hero-subtitle"><?= e(__('hero_subtitle')) ?></p>
        <div class="hero-actions">
            <a href="#projects" class="btn btn--primary btn--lg"><?= e(__('hero_cta_projects')) ?></a>
            <a href="#contact" class="btn btn--outline btn--lg"><?= e(__('hero_cta_contact')) ?></a>
        </div>
    </div>
    <div class="hero-scroll">
        <span class="scroll-indicator"></span>
    </div>
</section>

<section class="stats section">
    <div class="container stats-grid">
        <div class="stat-card" data-count="<?= $projectCount ?>">
            <span class="stat-number">0</span>
            <span class="stat-label"><?= e(__('stats_projects')) ?></span>
        </div>
        <div class="stat-card" data-count="<?= max($tagCount, 15) ?>">
            <span class="stat-number">0</span>
            <span class="stat-label"><?= e(__('stats_technologies')) ?></span>
        </div>
        <div class="stat-card" data-count="3">
            <span class="stat-number">0</span>
            <span class="stat-label"><?= e(__('stats_languages')) ?></span>
        </div>
        <div class="stat-card" data-count="100">
            <span class="stat-number">0</span>
            <span class="stat-suffix">%</span>
            <span class="stat-label"><?= e(__('stats_satisfaction')) ?></span>
        </div>
    </div>
</section>

<section class="about section" id="about">
    <div class="container about-grid">
        <div class="about-visual">
            <div class="about-card about-card--1">
                <span class="about-card-label">PHP</span>
                <span class="about-card-value">High Performance</span>
            </div>
            <div class="about-card about-card--2">
                <span class="about-card-label">GSAP</span>
                <span class="about-card-value">Animations</span>
            </div>
            <div class="about-card about-card--3">
                <span class="about-card-label">SEO</span>
                <span class="about-card-value">Schema.org</span>
            </div>
            <div class="about-glow"></div>
        </div>
        <div class="about-text">
            <span class="section-label"><?= e(__('about_label')) ?></span>
            <h2 class="section-title"><?= e(__('about_title')) ?></h2>
            <p><?= e(__('about_text')) ?></p>
            <p><?= e(__('about_text2')) ?></p>
        </div>
    </div>
</section>

<section class="services section" id="services">
    <div class="container">
        <div class="section-header services-header">
            <span class="section-label"><?= e(__('services_label')) ?></span>
            <h2 class="section-title"><?= e(__('services_title')) ?></h2>
            <p class="section-subtitle"><?= e(__('services_subtitle')) ?></p>
        </div>
        <div class="services-bento">
            <?php
            $services = [
                [
                    'icon' => 'cloud',
                    'title' => 'service_saas_title',
                    'desc' => 'service_saas_desc',
                    'features' => 'service_saas_features',
                    'tags' => 'service_saas_tags',
                    'num' => '01',
                    'featured' => true,
                ],
                [
                    'icon' => 'code',
                    'title' => 'service_web_title',
                    'desc' => 'service_web_desc',
                    'features' => 'service_web_features',
                    'tags' => 'service_web_tags',
                    'num' => '02',
                    'featured' => false,
                ],
                [
                    'icon' => 'search',
                    'title' => 'service_seo_title',
                    'desc' => 'service_seo_desc',
                    'features' => 'service_seo_features',
                    'tags' => 'service_seo_tags',
                    'num' => '03',
                    'featured' => false,
                ],
                [
                    'icon' => 'palette',
                    'title' => 'service_design_title',
                    'desc' => 'service_design_desc',
                    'features' => 'service_design_features',
                    'tags' => 'service_design_tags',
                    'num' => '04',
                    'featured' => false,
                ],
            ];
            foreach ($services as $svc):
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
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="13.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="10.5" r="2.5"/><circle cx="8.5" cy="7.5" r="2.5"/><circle cx="6.5" cy="12.5" r="2.5"/><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/></svg>
                        <?php endif; ?>
                    </div>
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
        <div class="projects-grid">
            <?php foreach ($projects as $i => $project):
                $title = lang_field($project, 'title');
                $desc = lang_field($project, 'description');
                $cover = projects_repo()->getCoverImage((int) $project['id']);
                $tags = projects_repo()->getTags((int) $project['id']);
                $imgSrc = $cover ? upload_url($cover['image_path']) : brand_logo_href();
                $indexNum = str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT);
                $category = $tags[0] ?? 'Web App';
                $isFeatured = $i === 0;
            ?>
            <article class="project-card<?= $isFeatured ? ' project-card--featured' : '' ?>">
                <a href="<?= project_href($project['slug']) ?>" class="project-card-inner">
                    <div class="project-card-visual">
                        <span class="project-card-index" aria-hidden="true"><?= $indexNum ?></span>
                        <img src="<?= e($imgSrc) ?>" alt="<?= e($title) ?> — <?= e(__('projects_label')) ?> Visio" loading="lazy"
                             onerror="this.src='<?= brand_logo_href() ?>'">
                        <div class="project-card-gradient" aria-hidden="true"></div>
                        <div class="project-card-hover">
                            <span class="project-card-cta"><?= e(__('project_view')) ?></span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
                        </div>
                    </div>
                    <div class="project-card-content">
                        <div class="project-card-meta">
                            <span class="project-card-category"><?= e($category) ?></span>
                            <?php if (count($tags) > 1): ?>
                            <span class="project-card-extra">+<?= count($tags) - 1 ?> tech</span>
                            <?php endif; ?>
                        </div>
                        <h3><?= e($title) ?></h3>
                        <p><?= e(mb_substr($desc, 0, 140)) ?><?= mb_strlen($desc) > 140 ? '…' : '' ?></p>
                        <?php if ($tags): ?>
                        <div class="project-tags">
                            <?php foreach (array_slice($tags, 0, 5) as $tag): ?>
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

<section class="contact section" id="contact">
    <div class="container contact-grid">
        <div class="contact-info">
            <span class="section-label"><?= e(__('contact_label')) ?></span>
            <h2 class="section-title"><?= e(__('contact_title')) ?></h2>
            <p><?= e(__('contact_subtitle')) ?></p>
            <div class="contact-details">
                <a href="mailto:plescagheorghe07@gmail.com">plescagheorghe07@gmail.com</a>
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
            <button type="submit" class="btn btn--primary btn--lg"><?= e(__('contact_send')) ?></button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

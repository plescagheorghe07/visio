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
        <div class="section-header">
            <span class="section-label"><?= e(__('services_label')) ?></span>
            <h2 class="section-title"><?= e(__('services_title')) ?></h2>
        </div>
        <div class="services-grid">
            <?php
            $services = [
                ['service_saas_title', 'service_saas_desc', '01'],
                ['service_web_title', 'service_web_desc', '02'],
                ['service_seo_title', 'service_seo_desc', '03'],
                ['service_design_title', 'service_design_desc', '04'],
            ];
            foreach ($services as [$titleKey, $descKey, $num]):
            ?>
            <article class="service-card">
                <span class="service-num"><?= $num ?></span>
                <h3><?= e(__($titleKey)) ?></h3>
                <p><?= e(__($descKey)) ?></p>
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
            <?php foreach ($projects as $project):
                $title = lang_field($project, 'title');
                $desc = lang_field($project, 'description');
                $cover = projects_repo()->getCoverImage((int) $project['id']);
                $tags = projects_repo()->getTags((int) $project['id']);
                $imgSrc = $cover ? upload_url($cover['image_path']) : brand_logo_href();
            ?>
            <article class="project-card">
                <a href="<?= project_href($project['slug']) ?>" class="project-card-link">
                    <div class="project-card-image">
                        <img src="<?= e($imgSrc) ?>" alt="<?= e($title) ?>" loading="lazy"
                             onerror="this.src='<?= brand_logo_href() ?>'">
                        <div class="project-card-overlay">
                            <span><?= e(__('project_view')) ?> →</span>
                        </div>
                    </div>
                    <div class="project-card-body">
                        <h3><?= e($title) ?></h3>
                        <p><?= e(mb_substr($desc, 0, 120)) ?>...</p>
                        <?php if ($tags): ?>
                        <div class="project-tags">
                            <?php foreach (array_slice($tags, 0, 4) as $tag): ?>
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

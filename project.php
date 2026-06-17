<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

$lang = current_lang();
$slug = trim($_GET['slug'] ?? '');

if ($slug === '') {
    header('Location: ' . home_url(), true, 301);
    exit;
}

$project = projects_repo()->findBySlug($slug);

if (!$project) {
    http_response_code(404);
    $pageTitle = __('404_title') . ' | Visio';
    $canonicalUrl = home_url();
    require __DIR__ . '/partials/header.php';
    echo '<section class="section error-page"><div class="container"><h1>' . e(__('404_title')) . '</h1><p>' . e(__('404_text')) . '</p><a href="' . home_href() . '" class="btn btn--primary">' . e(__('404_back')) . '</a></div></section>';
    require __DIR__ . '/partials/footer.php';
    exit;
}

$tags = projects_repo()->getTags((int) $project['id']);
$images = projects_repo()->getImages((int) $project['id']);
$title = lang_field($project, 'title');
$description = lang_field($project, 'description');
$metaTitle = lang_field($project, 'meta_title') ?: $title . ' | Visio';
$metaDesc = lang_field($project, 'meta_desc') ?: mb_substr($description, 0, 160);

$pageTitle = $metaTitle;
$pageDescription = $metaDesc;
$pageKeywords = implode(', ', array_merge($tags, ['Visio', 'SaaS', 'PHP', 'Moldova', 'dezvoltare software', 'Chișinău']));
$canonicalUrl = project_url($slug, $lang);
$hreflangUrls = [];
foreach (app_config('languages') as $code) {
    $hreflangUrls[$code] = project_url($slug, $code);
}
$extraSchema = project_schema_json($project, $tags, $lang);

$cover = $images[0] ?? null;
$coverSrc = $cover ? upload_url($cover['image_path']) : brand_logo_href();
$ogImage = $cover ? upload_url($cover['image_path']) : null;
$galleryItems = [];
foreach ($images as $i => $img) {
    $galleryItems[] = [
        'src' => upload_url($img['image_path']),
        'alt' => lang_field($img, 'alt') ?: $title,
    ];
}
$loadLightbox = count($galleryItems) > 0;
$primaryTag = $tags[0] ?? 'Web';

require __DIR__ . '/partials/header.php';
?>

<div class="project-page project-page--v2">
<section class="project-hero project-hero--v2 section">
    <div class="fx-grid-bg" aria-hidden="true"></div>
    <div class="container">
        <nav class="project-breadcrumb" aria-label="Breadcrumb">
            <a href="<?= home_href() ?>" class="project-breadcrumb__link">Visio</a>
            <span class="project-breadcrumb__sep">/</span>
            <a href="<?= home_href() ?>#projects" class="project-breadcrumb__link"><?= e(__('nav_projects')) ?></a>
            <span class="project-breadcrumb__sep">/</span>
            <span class="project-breadcrumb__current"><?= e($title) ?></span>
        </nav>

        <div class="project-hero__grid">
            <div class="project-hero__main">
                <div class="project-hero__tags">
                    <span class="project-hero__tag project-hero__tag--primary"><?= e($primaryTag) ?></span>
                    <?php if (!empty($project['website_link'])): ?>
                    <span class="project-hero__tag project-hero__tag--live">Live</span>
                    <?php endif; ?>
                </div>
                <h1 class="project-hero-title"><?= e($title) ?></h1>
                <p class="project-hero-desc"><?= e($description) ?></p>

                <div class="project-hero-actions">
                    <?php if (!empty($project['website_link'])): ?>
                    <a href="<?= e($project['website_link']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn--primary btn--lg">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                        <?= e(__('project_website')) ?>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($project['github_link'])): ?>
                    <a href="<?= e($project['github_link']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn--outline btn--lg">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                        <?= e(__('project_github')) ?>
                    </a>
                    <?php endif; ?>
                    <a href="<?= home_href() ?>#contact" class="btn btn--outline btn--lg">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        <?= e(__('hero_cta_contact')) ?>
                    </a>
                </div>
            </div>

            <aside class="project-hero__aside fx-border-glow">
                <div class="project-hero__cover">
                    <img src="<?= e($coverSrc) ?>" alt="<?= e($title) ?> — Visio Moldova" loading="eager"
                         onerror="this.src='<?= brand_logo_href() ?>'">
                    <div class="project-hero__cover-shine"></div>
                </div>
                <div class="project-aside-stats">
                    <div class="project-aside-stat">
                        <span class="project-aside-stat__val"><?= count($tags) ?>+</span>
                        <span class="project-aside-stat__lbl"><?= e(__('project_tech_count')) ?></span>
                    </div>
                    <div class="project-aside-stat">
                        <span class="project-aside-stat__val">100%</span>
                        <span class="project-aside-stat__lbl"><?= e(__('project_responsive')) ?></span>
                    </div>
                    <div class="project-aside-stat">
                        <span class="project-aside-stat__val">SEO</span>
                        <span class="project-aside-stat__lbl"><?= e(__('project_optimized')) ?></span>
                    </div>
                </div>
                <div class="project-aside-meta">
                    <div class="project-aside-meta__row">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
                        <span><?= e($primaryTag) ?></span>
                    </div>
                    <div class="project-aside-meta__row">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>Visio · Chișinău, Moldova</span>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php if ($galleryItems): ?>
<section class="project-gallery project-gallery--v2 section">
    <div class="container">
        <div class="section-header section-header--fx">
            <span class="section-label"><?= e(__('project_gallery')) ?></span>
            <h2 class="section-title section-title--sm"><?= e(__('project_gallery_title')) ?></h2>
            <p class="section-subtitle"><?= count($galleryItems) ?> <?= e(__('project_gallery')) ?></p>
        </div>
        <div class="gallery-grid gallery-grid--v2" id="projectGallery">
            <?php foreach ($galleryItems as $i => $item): ?>
            <button type="button" class="gallery-item gallery-item--v2<?= $i === 0 ? ' gallery-item--featured' : '' ?>" data-lightbox-index="<?= $i ?>" aria-label="<?= e($item['alt']) ?>">
                <img src="<?= e($item['src']) ?>" alt="<?= e($item['alt']) ?>" loading="lazy"
                     onerror="this.src='<?= brand_logo_href() ?>'">
                <span class="gallery-item__overlay">
                    <span class="gallery-zoom">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                        <?= e(__('project_view')) ?>
                    </span>
                </span>
            </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($tags): ?>
<section class="project-tech project-tech--v2 section">
    <div class="container">
        <div class="section-header section-header--fx">
            <span class="section-label"><?= e(__('project_tech_stack')) ?></span>
            <h2 class="section-title section-title--sm"><?= e(__('project_tech_title')) ?></h2>
        </div>
        <div class="tech-tags tech-tags--v2">
            <?php foreach ($tags as $tag): ?>
            <span class="tag tag--lg"><?= e($tag) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="project-seo-block section">
    <div class="container">
        <article class="project-seo-card fx-border-glow">
            <h2><?= e(__('project_seo_title')) ?>: <?= e($title) ?></h2>
            <p><?= e(__('project_seo_text')) ?></p>
            <p><?= e($description) ?></p>
            <p><strong>Visio</strong> — <?= e(__('footer_seo_keywords')) ?></p>
        </article>
    </div>
</section>

<section class="project-cta project-cta--v2 section">
    <div class="container">
        <div class="project-cta__box fx-border-glow">
            <div class="project-cta__icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <h2><?= e(__('project_cta_title')) ?></h2>
            <p><?= e(__('project_cta_desc')) ?></p>
            <a href="<?= home_href() ?>#contact" class="btn btn--primary btn--lg">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <?= e(__('hero_cta_contact')) ?>
            </a>
        </div>
    </div>
</section>
</div>

<?php if ($galleryItems): ?>
<div class="lightbox lightbox--v2" id="lightbox" hidden aria-hidden="true" role="dialog" aria-modal="true" aria-label="Galerie imagini">
    <div class="lightbox-backdrop" data-lightbox-close></div>
    <div class="lightbox-inner">
        <div class="lightbox-toolbar">
            <div class="lightbox-counter" id="lightboxCounter"></div>
            <button type="button" class="lightbox-close" data-lightbox-close aria-label="Închide">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <?php if (count($galleryItems) > 1): ?>
        <button type="button" class="lightbox-arrow lightbox-prev" data-lightbox-prev aria-label="Imaginea anterioară">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
        </button>
        <button type="button" class="lightbox-arrow lightbox-next" data-lightbox-next aria-label="Imaginea următoare">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </button>
        <?php endif; ?>
        <figure class="lightbox-figure">
            <img id="lightboxImage" src="" alt="">
            <figcaption id="lightboxCaption"></figcaption>
        </figure>
    </div>
</div>
<script type="application/json" id="lightboxData"><?= json_encode($galleryItems, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
<?php endif; ?>

<?php require __DIR__ . '/partials/footer.php'; ?>

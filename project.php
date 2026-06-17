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
$allProjects = projects_repo()->getAllActive();
$relatedProjects = array_slice(array_values(array_filter($allProjects, fn($p) => $p['slug'] !== $slug)), 0, 3);

$title = lang_field($project, 'title');
$description = lang_field($project, 'description');
$metaTitle = lang_field($project, 'meta_title') ?: $title . ' | Visio';
$metaDesc = lang_field($project, 'meta_desc') ?: mb_substr($description, 0, 160);

$pageTitle = $metaTitle;
$pageDescription = $metaDesc;
$pageKeywords = implode(', ', array_merge($tags, ['Visio', 'SaaS', 'PHP', 'Moldova', 'Chișinău', 'dezvoltare web']));
$canonicalUrl = project_url($slug, $lang);
$hreflangUrls = [];
foreach (app_config('languages') as $code) {
    $hreflangUrls[$code] = project_url($slug, $code);
}
$extraSchema = project_schema_json($project, $tags, $lang);

$cover = $images[0] ?? null;
$ogImage = $cover ? upload_url($cover['image_path']) : null;
$coverSrc = $cover ? upload_url($cover['image_path']) : brand_logo_href();
$galleryItems = [];
foreach ($images as $i => $img) {
    $galleryItems[] = [
        'src' => upload_url($img['image_path']),
        'alt' => lang_field($img, 'alt') ?: $title,
    ];
}
$loadLightbox = count($galleryItems) > 0;
$hasWebsite = !empty($project['website_link']);
$hasGithub = !empty($project['github_link']);

require __DIR__ . '/partials/header.php';
?>

<div class="project-page">
    <section class="project-hero">
        <div class="project-hero-media" aria-hidden="true">
            <img src="<?= e($coverSrc) ?>" alt="" loading="eager" onerror="this.style.display='none'">
        </div>
        <div class="container project-hero-body">
            <nav class="project-breadcrumb" aria-label="Breadcrumb">
                <a href="<?= home_href() ?>">Visio</a>
                <span>/</span>
                <a href="<?= home_href() ?>#projects"><?= e(__('nav_projects')) ?></a>
                <span>/</span>
                <span aria-current="page"><?= e($title) ?></span>
            </nav>

            <div class="project-hero-content">
                <span class="project-hero-type"><?= e($tags[0] ?? 'Web Application') ?></span>
                <h1 class="project-hero-title"><?= e($title) ?></h1>
                <p class="project-hero-desc"><?= e($description) ?></p>

                <div class="project-actions">
                    <?php if ($hasWebsite || $hasGithub): ?>
                    <div class="project-actions-group">
                        <?php if ($hasWebsite): ?>
                        <a href="<?= e($project['website_link']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                            <?= e(__('project_website')) ?> ↗
                        </a>
                        <?php endif; ?>
                        <?php if ($hasGithub): ?>
                        <a href="<?= e($project['github_link']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn--outline btn--on-dark">
                            <?= e(__('project_github')) ?> ↗
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <a href="<?= home_href() ?>#contact" class="project-actions-contact"><?= e(__('hero_cta_contact')) ?> →</a>
                </div>

                <?php if ($tags): ?>
                <div class="project-hero-tags">
                    <?php foreach ($tags as $tag): ?>
                    <span class="tag tag--on-dark"><?= e($tag) ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <dl class="project-hero-meta">
                    <div>
                        <dt><?= e(__('project_location')) ?></dt>
                        <dd><?= e(__('contact_location')) ?></dd>
                    </div>
                    <div>
                        <dt><?= e(__('project_agency')) ?></dt>
                        <dd>Visio</dd>
                    </div>
                    <div>
                        <dt><?= e(__('project_tech_stack')) ?></dt>
                        <dd><?= count($tags) ?> <?= e(__('project_tech_count')) ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <?php if ($galleryItems): ?>
    <section class="project-gallery section">
        <div class="container">
            <h2 class="section-title section-title--sm"><?= e(__('project_gallery')) ?></h2>
            <div class="gallery-grid" id="projectGallery">
                <?php foreach ($galleryItems as $i => $item): ?>
                <button type="button" class="gallery-item" data-lightbox-index="<?= $i ?>" aria-label="<?= e($item['alt']) ?>">
                    <img src="<?= e($item['src']) ?>" alt="<?= e($item['alt']) ?>" loading="lazy"
                         onerror="this.src='<?= brand_logo_href() ?>'">
                    <span class="gallery-zoom" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                    </span>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="lightbox" id="lightbox" hidden aria-hidden="true" role="dialog" aria-modal="true" aria-label="Galerie">
        <div class="lightbox-backdrop" data-lightbox-close></div>
        <div class="lightbox-inner">
            <button type="button" class="lightbox-close" data-lightbox-close aria-label="Închide">&times;</button>
            <?php if (count($galleryItems) > 1): ?>
            <button type="button" class="lightbox-arrow lightbox-prev" data-lightbox-prev aria-label="Anterior">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button type="button" class="lightbox-arrow lightbox-next" data-lightbox-next aria-label="Următor">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </button>
            <?php endif; ?>
            <figure class="lightbox-figure">
                <img id="lightboxImage" src="" alt="">
                <figcaption id="lightboxCaption"></figcaption>
            </figure>
            <?php if (count($galleryItems) > 1): ?>
            <div class="lightbox-counter" id="lightboxCounter"></div>
            <?php endif; ?>
        </div>
    </div>
    <script type="application/json" id="lightboxData"><?= json_encode($galleryItems, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
    <?php endif; ?>

    <?php if ($relatedProjects): ?>
    <section class="project-related section">
        <div class="container">
            <h2 class="section-title section-title--sm"><?= e(__('project_related_title')) ?></h2>
            <div class="project-related-grid">
                <?php foreach ($relatedProjects as $rp):
                    $rpTitle = lang_field($rp, 'title');
                    $rpCover = projects_repo()->getCoverImage((int) $rp['id']);
                    $rpImg = $rpCover ? upload_url($rpCover['image_path']) : brand_logo_href();
                    $rpTags = projects_repo()->getTags((int) $rp['id']);
                ?>
                <a href="<?= project_href($rp['slug']) ?>" class="project-related-card">
                    <div class="project-related-img">
                        <img src="<?= e($rpImg) ?>" alt="<?= e($rpTitle) ?>" loading="lazy"
                             onerror="this.src='<?= brand_logo_href() ?>'">
                    </div>
                    <div class="project-related-body">
                        <span class="project-related-cat"><?= e($rpTags[0] ?? 'Web App') ?></span>
                        <h3><?= e($rpTitle) ?></h3>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="project-cta-band">
        <div class="container project-cta-band-inner">
            <p><?= e(__('contact_title')) ?></p>
            <a href="<?= home_href() ?>#contact" class="btn btn--primary"><?= e(__('hero_cta_contact')) ?></a>
        </div>
    </section>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>

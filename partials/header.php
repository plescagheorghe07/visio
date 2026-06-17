<?php
/** @var string $pageTitle */
/** @var string|null $pageDescription */
/** @var string|null $pageKeywords */
/** @var string|null $extraSchema */
/** @var string|null $ogImage */
$lang = current_lang();
$isHomePage = empty($_GET['slug']);
$navHash = function (string $section) use ($isHomePage): string {
    return $isHomePage ? '#' . $section : home_href() . '#' . $section;
};
$pageTitle = $pageTitle ?? __('meta_title');
$pageDescription = $pageDescription ?? __('meta_description');
$pageKeywords = $pageKeywords ?? __('meta_keywords');
$canonicalUrl = $canonicalUrl ?? home_url($lang);
$ogImage = og_image_url($ogImage ?? null);
$ogImageType = str_ends_with(strtolower(parse_url($ogImage, PHP_URL_PATH) ?: ''), '.png')
    ? 'image/png'
    : (str_ends_with(strtolower(parse_url($ogImage, PHP_URL_PATH) ?: ''), '.svg') ? 'image/svg+xml' : 'image/jpeg');
$ogImagePath = __DIR__ . '/../assets/img/visio.png';
$ogImageWidth = 512;
$ogImageHeight = 512;
if (is_file($ogImagePath)) {
    $size = @getimagesize($ogImagePath);
    if ($size) {
        $ogImageWidth = (int) $size[0];
        $ogImageHeight = (int) $size[1];
    }
}

$hreflangUrls = $hreflangUrls ?? [];
foreach (app_config('languages', ['ro', 'en', 'ru']) as $code) {
    if (!isset($hreflangUrls[$code])) {
        $hreflangUrls[$code] = home_url($code);
    }
}
?>
<!DOCTYPE html>
<html lang="<?= e($lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark">
    <base href="<?= e(rtrim(base_url(), '/') . '/') ?>">
    <script>
    (function () {
        var key = 'visio-theme';
        var theme = 'light';
        try {
            var stored = localStorage.getItem(key);
            if (stored === 'dark' || stored === 'light') {
                theme = stored;
            }
        } catch (e) {}
        document.documentElement.setAttribute('data-theme', theme);
    })();
    </script>
    <style>
        html, body { background-color: #f8f9fc; color-scheme: light; }
        html[data-theme="dark"], html[data-theme="dark"] body { background-color: #0a0a0f; color-scheme: dark; }
    </style>
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="keywords" content="<?= e($pageKeywords) ?>">
    <meta name="author" content="Visio — Pleșca Gheorghe">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="O06VlzBh8s8lIiWbt8i9QZAHq_2QikI5hahmfzUH6Go">
    <meta name="geo.region" content="MD-CU">
    <meta name="geo.placename" content="Chișinău, Moldova">
    <meta name="geo.position" content="47.0105;28.8638">
    <meta name="ICBM" content="47.0105, 28.8638">
    <link rel="canonical" href="<?= e($canonicalUrl) ?>">
    <link rel="icon" href="<?= site_icon_href() ?>" type="image/png">
    <link rel="shortcut icon" href="<?= site_icon_href() ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?= site_icon_href() ?>">
    <?php foreach ($hreflangUrls as $code => $href): ?>
    <link rel="alternate" hreflang="<?= e($code) ?>" href="<?= e($href) ?>">
    <?php endforeach; ?>
    <link rel="alternate" hreflang="x-default" href="<?= e(home_url('ro')) ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:url" content="<?= e($canonicalUrl) ?>">
    <meta property="og:site_name" content="Visio">
    <meta property="og:image" content="<?= e($ogImage) ?>">
    <meta property="og:image:secure_url" content="<?= e($ogImage) ?>">
    <meta property="og:image:type" content="<?= e($ogImageType) ?>">
    <meta property="og:image:width" content="<?= $ogImageWidth ?>">
    <meta property="og:image:height" content="<?= $ogImageHeight ?>">
    <meta property="og:image:alt" content="Visio — Agenție Software SaaS">
    <meta property="og:locale" content="<?= $lang === 'ro' ? 'ro_RO' : ($lang === 'ru' ? 'ru_RU' : 'en_US') ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($pageDescription) ?>">
    <meta name="twitter:image" content="<?= e($ogImage) ?>">
    <meta name="twitter:image:alt" content="Visio">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/main.css') ?>">
    <script type="application/ld+json"><?= organization_schema_json() ?></script>
    <script type="application/ld+json"><?= website_schema_json() ?></script>
    <?php if (!empty($extraSchema)): ?>
    <script type="application/ld+json"><?= $extraSchema ?></script>
    <?php endif; ?>
</head>
<body>
    <div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>
    <div class="cursor-glow" aria-hidden="true"></div>
    <canvas id="particles" class="particles-canvas" aria-hidden="true"></canvas>

    <header class="site-header" id="siteHeader">
        <div class="header-inner container">
            <a href="<?= home_href() ?>" class="logo logo--header" aria-label="Visio">
                <img class="logo-img" src="<?= brand_logo_href() ?>" alt="Visio" width="36" height="36">
                <span class="logo-text">Visio<span class="logo-dot">.</span></span>
            </a>

            <nav class="nav-pill" aria-label="Main">
                <ul class="nav-links" id="navLinks">
                    <li><a href="<?= e($navHash('home')) ?>" class="nav-link" data-section="home"><?= e(__('nav_home')) ?></a></li>
                    <li><a href="<?= e($navHash('about')) ?>" class="nav-link" data-section="about"><?= e(__('nav_about')) ?></a></li>
                    <li><a href="<?= e($navHash('services')) ?>" class="nav-link" data-section="services"><?= e(__('nav_services')) ?></a></li>
                    <li><a href="<?= e($navHash('projects')) ?>" class="nav-link" data-section="projects"><?= e(__('nav_projects')) ?></a></li>
                    <li><a href="<?= e($navHash('contact')) ?>" class="nav-link nav-link--cta" data-section="contact"><?= e(__('nav_contact')) ?></a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <div class="lang-switcher" id="langSwitcher">
                    <button type="button" class="lang-switcher-btn" id="langSwitcherBtn" aria-expanded="false" aria-haspopup="listbox" aria-label="<?= e(__('lang_switch')) ?>">
                        <svg class="lang-globe" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        <span class="lang-current"><?= strtoupper($lang) ?></span>
                        <svg class="lang-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <ul class="lang-dropdown" role="listbox" aria-label="<?= e(__('lang_switch')) ?>">
                        <?php foreach (app_config('languages') as $code):
                            $href = !empty($_GET['slug'])
                                ? project_href((string) $_GET['slug'], $code)
                                : home_href($code);
                        ?>
                        <li role="option" aria-selected="<?= $lang === $code ? 'true' : 'false' ?>">
                            <a href="<?= e($href) ?>" class="lang-option <?= $lang === $code ? 'is-active' : '' ?>" hreflang="<?= e($code) ?>" lang="<?= e($code) ?>">
                                <span class="lang-option-code"><?= strtoupper($code) ?></span>
                                <span class="lang-option-name"><?= e(__('lang_' . $code)) ?></span>
                                <?php if ($lang === $code): ?>
                                <svg class="lang-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <button class="theme-toggle" id="themeToggle" aria-label="<?= e(__('theme_dark')) ?>">
                    <svg class="icon-sun" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                    <svg class="icon-moon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>
                <button class="nav-burger" id="navBurger" aria-label="Menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>
    <main>

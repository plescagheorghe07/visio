<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

header('Content-Type: application/xml; charset=utf-8');

try {
    $projects = projects_repo()->getAllActive();
} catch (Throwable) {
    $projects = [];
}

$langs = app_config('languages', ['ro', 'en', 'ru']);

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
echo '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

foreach ($langs as $lang) {
    $loc = home_url($lang);
    echo "  <url>\n";
    echo '    <loc>' . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <priority>1.0</priority>\n";
    foreach ($langs as $alt) {
        echo '    <xhtml:link rel="alternate" hreflang="' . htmlspecialchars($alt, ENT_XML1) . '" href="' . htmlspecialchars(home_url($alt), ENT_XML1) . "\" />\n";
    }
    echo "  </url>\n";
}

foreach ($projects as $project) {
    $slug = (string) ($project['slug'] ?? '');
    if ($slug === '') {
        continue;
    }
    $updated = $project['updated_at'] ?? $project['created_at'] ?? null;
    $lastmod = $updated ? date('Y-m-d', strtotime((string) $updated)) : date('Y-m-d');

    foreach ($langs as $lang) {
        $loc = project_url($slug, $lang);
        echo "  <url>\n";
        echo '    <loc>' . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
        echo '    <lastmod>' . htmlspecialchars($lastmod, ENT_XML1) . "</lastmod>\n";
        echo "    <changefreq>monthly</changefreq>\n";
        echo "    <priority>0.8</priority>\n";
        foreach ($langs as $alt) {
            echo '    <xhtml:link rel="alternate" hreflang="' . htmlspecialchars($alt, ENT_XML1) . '" href="' . htmlspecialchars(project_url($slug, $alt), ENT_XML1) . "\" />\n";
        }
        echo "  </url>\n";
    }
}

echo '</urlset>';

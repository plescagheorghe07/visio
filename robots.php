<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

header('Content-Type: text/plain; charset=utf-8');

$base = rtrim(base_url(), '/');

echo "User-agent: *\n";
echo "Allow: /\n";
echo "\n";
echo "Disallow: /admin/\n";
echo "Disallow: /config/\n";
echo "Disallow: /core/\n";
echo "Disallow: /includes/\n";
echo "Disallow: /api/\n";
echo "\n";
echo "Sitemap: {$base}/sitemap.xml\n";

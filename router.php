<?php

declare(strict_types=1);

/**
 * Router pentru PHP built-in server:
 *   php -S localhost:3000 router.php
 */

$_SERVER['VISIO_ROUTER'] = '1';

$root = __DIR__;
$uri  = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$uri  = urldecode($uri);

// Normalize trailing slash (except root)
if ($uri !== '/' && str_ends_with($uri, '/')) {
    $uri = rtrim($uri, '/');
}

// Fișiere statice existente — lasă serverul PHP să le servească
if ($uri !== '/') {
    $static = $root . $uri;
    if (is_file($static)) {
        return false;
    }
}

// ── API ──────────────────────────────────────────────────────
if ($uri === '/api/contact' || $uri === '/api/contact.php') {
    require $root . '/api/contact.php';
    return true;
}

// ── Sitemap ──────────────────────────────────────────────────
if ($uri === '/sitemap.xml') {
    require $root . '/sitemap.php';
    return true;
}

// ── Admin ────────────────────────────────────────────────────
if (preg_match('#^/admin(?:/(.+))?$#', $uri, $m)) {
    $sub = $m[1] ?? 'index.php';
    if ($sub === '' || $sub === '/') {
        $sub = 'index.php';
    }
    if (!str_contains($sub, '.')) {
        $sub .= '.php';
    }
    $adminFile = $root . '/admin/' . $sub;
    if (is_file($adminFile)) {
        require $adminFile;
        return true;
    }
    http_response_code(404);
    echo '404 Admin not found';
    return true;
}

// ── Rădăcină → RO ────────────────────────────────────────────
if ($uri === '/') {
    header('Location: /ro', true, 302);
    exit;
}

// ── Homepage multilingv ──────────────────────────────────────
if (preg_match('#^/(ro|en|ru)$#', $uri, $m)) {
    $_GET['lang'] = $m[1];
    require $root . '/index.php';
    return true;
}

// ── Proiecte (pretty URLs) ───────────────────────────────────
$projectRoutes = [
    '#^/ro/proiecte/([a-z0-9-]+)$#'  => 'ro',
    '#^/en/projects/([a-z0-9-]+)$#'   => 'en',
    '#^/ru/proekty/([a-z0-9-]+)$#'    => 'ru',
    '#^/(ro|en|ru)/proiecte/([a-z0-9-]+)$#' => null,
];

foreach ($projectRoutes as $pattern => $lang) {
    if (preg_match($pattern, $uri, $m)) {
        if ($lang === null) {
            $_GET['lang'] = $m[1];
            $_GET['slug'] = $m[2];
        } else {
            $_GET['lang'] = $lang;
            $_GET['slug'] = $m[1];
        }
        require $root . '/project.php';
        return true;
    }
}

// ── Fallback direct PHP ──────────────────────────────────────
if ($uri === '/index.php') {
    require $root . '/index.php';
    return true;
}

if ($uri === '/project.php') {
    require $root . '/project.php';
    return true;
}

http_response_code(404);
echo '<!DOCTYPE html><html><head><title>404</title></head><body>';
echo '<h1>404 — Pagina nu există</h1>';
echo '<p>URI: ' . htmlspecialchars($uri) . '</p>';
echo '<p><a href="/ro">Înapoi acasă</a></p>';
echo '<p style="color:#888;font-size:0.85rem">Rulezi cu PHP built-in server? Folosește: <code>php -S 127.0.0.1:8000 router.php</code></p>';
echo '</body></html>';
return true;

<?php

declare(strict_types=1);

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/ProjectRepository.php';
require_once __DIR__ . '/../core/ContactRepository.php';
require_once __DIR__ . '/../core/UserRepository.php';
require_once __DIR__ . '/../core/TranslationWriter.php';
require_once __DIR__ . '/../core/AnalyticsRepository.php';
require_once __DIR__ . '/../includes/analytics.php';

$config = require __DIR__ . '/../config/config.php';
date_default_timezone_set($config['timezone']);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function app_config(string $key, mixed $default = null): mixed
{
    static $cfg;
    $cfg ??= require __DIR__ . '/../config/config.php';
    return $cfg[$key] ?? $default;
}

function db(): PDO
{
    return Visio\Core\Database::connect();
}

function projects_repo(): Visio\Core\ProjectRepository
{
    static $repo;
    $repo ??= new Visio\Core\ProjectRepository(db());
    return $repo;
}

function contacts_repo(): Visio\Core\ContactRepository
{
    static $repo;
    $repo ??= new Visio\Core\ContactRepository(db());
    return $repo;
}

function users_repo(): Visio\Core\UserRepository
{
    static $repo;
    $repo ??= new Visio\Core\UserRepository(db());
    return $repo;
}

function translations_writer(): Visio\Core\TranslationWriter
{
    static $writer;
    $writer ??= new Visio\Core\TranslationWriter();
    return $writer;
}

function analytics_repo(): Visio\Core\AnalyticsRepository
{
    static $repo;
    $repo ??= new Visio\Core\AnalyticsRepository(db());
    return $repo;
}

function current_lang(): string
{
    $langs = app_config('languages', ['ro', 'en', 'ru']);
    $lang = $_GET['lang'] ?? $_SESSION['lang'] ?? app_config('default_lang', 'ro');
    if (!in_array($lang, $langs, true)) {
        $lang = app_config('default_lang', 'ro');
    }
    $_SESSION['lang'] = $lang;
    return $lang;
}

function load_translations(string $lang): array
{
    static $cache = [];
    if (!isset($cache[$lang])) {
        $file = __DIR__ . "/../config/lang_{$lang}.php";
        $cache[$lang] = is_file($file) ? require $file : [];
    }
    return $cache[$lang];
}

function __(string $key, ?string $lang = null): string
{
    $lang ??= current_lang();
    $translations = load_translations($lang);
    return $translations[$key] ?? $key;
}

function lang_field(array $row, string $field, ?string $lang = null): string
{
    $lang ??= current_lang();
    $key = "{$field}_{$lang}";
    if (!empty($row[$key])) {
        return $row[$key];
    }
    return $row["{$field}_ro"] ?? '';
}

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Calea web către rădăcina proiectului (ex: /Visio sau '').
 */
function base_path(): string
{
    static $cached = null;
    if ($cached !== null) {
        return $cached;
    }

    $override = app_config('base_path');
    if ($override !== null) {
        if ($override === '' || $override === '/') {
            $cached = '';
            return $cached;
        }
        if (is_string($override)) {
            $cached = '/' . trim(str_replace('\\', '/', $override), '/');
            if ($cached === '/') {
                $cached = '';
            }
            return $cached;
        }
    }

    $docRoot = $_SERVER['DOCUMENT_ROOT'] ?? '';
    $docRootReal = $docRoot !== '' ? realpath($docRoot) : false;
    $appRoot = realpath(dirname(__DIR__));
    $docRootNorm = $docRootReal ? str_replace('\\', '/', (string) $docRootReal) : '';
    $appRootNorm = $appRoot ? str_replace('\\', '/', (string) $appRoot) : '';

    if ($docRootNorm !== '' && $appRootNorm !== '' && str_starts_with($appRootNorm, $docRootNorm)) {
        $relative = substr($appRootNorm, strlen($docRootNorm));
        $cached = ($relative === '' || $relative === '/') ? '' : $relative;
        return $cached;
    }

    // Nu folosi SCRIPT_NAME (/ro/index.php) — doar scripturile reale din rădăcina app
    $scriptFile = str_replace('\\', '/', $_SERVER['SCRIPT_FILENAME'] ?? '');
    if ($scriptFile !== '' && $appRootNorm !== '' && str_starts_with($scriptFile, $appRootNorm)) {
        $entry = substr($scriptFile, strlen($appRootNorm));
        if (preg_match('#^/(index|project|sitemap)\.php$#', $entry)) {
            $cached = '';
            return $cached;
        }
    }

    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $dir = dirname($script);
    if (str_ends_with($dir, '/admin')) {
        $dir = dirname($dir);
    }
    $cached = ($dir === '/' || $dir === '.') ? '' : $dir;
    return $cached;
}

/**
 * URL complet către rădăcina site-ului (pentru canonical, sitemap, Schema.org).
 */
function base_url(): string
{
    static $cached = null;
    if ($cached !== null) {
        return $cached;
    }

    $configured = app_config('app_url');
    if (is_string($configured) && $configured !== '') {
        $cached = rtrim($configured, '/');
        return $cached;
    }

    $scheme = 'http';
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || strtolower($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https') {
        $scheme = 'https';
    }
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $cached = $scheme . '://' . $host . base_path();
    return $cached;
}

function project_segment(?string $lang = null): string
{
    $lang ??= current_lang();
    return match ($lang) {
        'en'    => 'projects',
        'ru'    => 'proekty',
        default => 'proiecte',
    };
}

function pretty_urls_enabled(): bool
{
    static $enabled = null;
    if ($enabled !== null) {
        return $enabled;
    }
    if (php_sapi_name() === 'cli-server') {
        $enabled = !empty($_SERVER['VISIO_ROUTER']);
        return $enabled;
    }
    $enabled = true;
    return $enabled;
}

function home_href(?string $lang = null): string
{
    $lang ??= current_lang();
    if (!pretty_urls_enabled()) {
        return base_path() . '/index.php?lang=' . urlencode($lang);
    }
    return base_path() . '/' . $lang . '/';
}

function home_url(?string $lang = null): string
{
    $lang ??= current_lang();
    return rtrim(base_url(), '/') . '/' . $lang . '/';
}

function project_href(string $slug, ?string $lang = null): string
{
    $lang ??= current_lang();
    if (!pretty_urls_enabled()) {
        return base_path() . '/project.php?lang=' . urlencode($lang) . '&slug=' . urlencode($slug);
    }
    return base_path() . '/' . $lang . '/' . project_segment($lang) . '/' . rawurlencode($slug);
}

function project_url(string $slug, ?string $lang = null): string
{
    $lang ??= current_lang();
    if (!pretty_urls_enabled()) {
        return rtrim(base_url(), '/') . '/project.php?lang=' . urlencode($lang) . '&slug=' . urlencode($slug);
    }
    return rtrim(base_url(), '/') . '/' . $lang . '/' . project_segment($lang) . '/' . rawurlencode($slug);
}

function admin_url(string $path = ''): string
{
    $path = ltrim($path, '/');
    return base_path() . '/admin' . ($path !== '' ? '/' . $path : '');
}

function api_href(string $path = 'api/contact.php'): string
{
    return base_path() . '/' . ltrim($path, '/');
}

function url(string $path = '', ?string $lang = null): string
{
    $lang ??= current_lang();

    if ($path === '' || $path === '/') {
        return home_url($lang);
    }

    if (preg_match('/project\.php\?slug=([a-z0-9-]+)/i', $path, $m)) {
        return project_url($m[1], $lang);
    }

    $path = ltrim($path, '/');
    if (str_starts_with($path, 'api/')) {
        return api_href($path);
    }

    return rtrim(base_url(), '/') . '/' . $path;
}

function asset(string $path): string
{
    $root = base_path();
    $url = ($root === '' ? '' : rtrim($root, '/')) . '/assets/' . ltrim($path, '/');
    $url = str_starts_with($url, '/') ? $url : '/' . $url;

    $file = dirname(__DIR__) . '/assets/' . ltrim(str_replace('\\', '/', $path), '/');
    if (is_file($file)) {
        $url .= '?v=' . filemtime($file);
    }

    return $url;
}

function document_base_url(): string
{
    $scheme = 'http';
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || strtolower($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https') {
        $scheme = 'https';
    }
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $bp = base_path();
    return $scheme . '://' . $host . ($bp === '' ? '/' : rtrim($bp, '/') . '/');
}

function asset_url(string $path): string
{
    return rtrim(document_base_url(), '/') . asset($path);
}

function absolute_url(string $path): string
{
    if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
        return $path;
    }
    $path = str_starts_with($path, '/') ? $path : '/' . $path;
    $bp = base_path();
    if ($bp !== '' && (str_starts_with($path, $bp . '/') || $path === $bp)) {
        return rtrim(base_url(), '/') . substr($path, strlen($bp));
    }
    return rtrim(base_url(), '/') . $path;
}

function brand_logo_href(): string
{
    return asset('img/visio_notext.png');
}

function site_icon_href(): string
{
    return asset('img/visio_notext.png');
}

function social_share_image_href(): string
{
    return asset('img/visio_notext.png');
}

function brand_logo_url(): string
{
    return absolute_url(brand_logo_href());
}

function site_icon_url(): string
{
    return absolute_url(site_icon_href());
}

function social_share_image_url(): string
{
    return absolute_url(social_share_image_href());
}

function og_image_url(?string $override = null): string
{
    if ($override !== null && $override !== '') {
        return absolute_url($override);
    }
    return social_share_image_url();
}

function upload_url(string $path): string
{
    $root = base_path();
    $url = ($root === '' ? '' : rtrim($root, '/')) . '/' . ltrim(str_replace('\\', '/', $path), '/');
    return str_starts_with($url, '/') ? $url : '/' . $url;
}

function slugify(string $text): string
{
    $text = mb_strtolower($text, 'UTF-8');
    $text = preg_replace('/[^\p{L}\p{N}\s-]/u', '', $text) ?? '';
    $text = preg_replace('/[\s-]+/', '-', trim($text)) ?? '';
    return $text;
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_verify(?string $token): bool
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], (string) $token);
}

function is_logged_in(): bool
{
    return !empty($_SESSION['admin_id']);
}

function require_auth(): void
{
    if (!is_logged_in()) {
        header('Location: ' . admin_url('login.php'));
        exit;
    }
}

function flash(string $key, ?string $message = null): ?string
{
    if ($message !== null) {
        $_SESSION['flash'][$key] = $message;
        return null;
    }
    $val = $_SESSION['flash'][$key] ?? null;
    unset($_SESSION['flash'][$key]);
    return $val;
}

function json_response(array $data, int $code = 200): never
{
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

function project_schema_json(array $project, array $tags, string $lang): string
{
    $title = lang_field($project, 'title', $lang);
    $desc = lang_field($project, 'description', $lang);
    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'SoftwareApplication',
        'name'        => $title,
        'description' => $desc,
        'applicationCategory' => 'WebApplication',
        'operatingSystem'     => 'Web',
        'author' => [
            '@type' => 'Organization',
            'name'  => 'Visio',
            'url'   => base_url(),
            'founder' => [
                '@type' => 'Person',
                'name'  => 'Pleșca Gheorghe',
            ],
        ],
        'keywords' => implode(', ', $tags),
    ];
    if (!empty($project['website_link'])) {
        $schema['url'] = $project['website_link'];
    }
    return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

function organization_schema_json(): string
{
    $lang = current_lang();
    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => 'Visio',
        'url'      => base_url(),
        'logo'     => social_share_image_url(),
        'description' => __('meta_description'),
        'founder' => [
            '@type' => 'Person',
            'name'  => 'Pleșca Gheorghe',
            'email' => 'plescagheorghe07@gmail.com',
        ],
        'areaServed' => ['MD', 'RO', 'EU'],
        'knowsAbout' => ['PHP', 'MySQL', 'SaaS', 'React', 'Next.js', 'SEO', 'Web Development'],
        'sameAs' => [
            'https://plescagheorghe.vercel.app/ro',
            'https://guestmemories.md/ro',
        ],
    ];
    return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

<?php

declare(strict_types=1);

/**
 * Tracking vizitatori — apelat din footer public.
 */
function track_page_view(?string $pageTitle = null): void
{
    static $tracked = false;
    if ($tracked) {
        return;
    }
    $tracked = true;

    $script = $_SERVER['SCRIPT_NAME'] ?? '';
    if (str_contains($script, '/admin/') || str_contains($script, 'sitemap') || str_contains($script, '/api/')) {
        return;
    }

    try {
        $repo = analytics_repo();
    } catch (Throwable) {
        return;
    }

    $ip = get_client_ip();
    $ua = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 500);
    $hash = hash('sha256', $ip . '|' . $ua);
    $geo = resolve_geo($ip);

    if (empty($_SESSION['analytics_session'])) {
        $_SESSION['analytics_session'] = bin2hex(random_bytes(16));
    }

    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $referrer = substr($_SERVER['HTTP_REFERER'] ?? '', 0, 500) ?: null;

    $repo->trackVisit([
        'visitor_hash' => $hash,
        'ip_address'   => $ip,
        'country'      => $geo['country'] ?? null,
        'city'         => $geo['city'] ?? null,
        'region'       => $geo['region'] ?? null,
        'user_agent'   => $ua,
        'page_path'    => $path,
        'page_title'   => $pageTitle,
        'lang'         => current_lang(),
        'referrer'     => $referrer,
        'session_id'   => $_SESSION['analytics_session'],
    ]);
}

function get_client_ip(): string
{
    foreach (['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'] as $key) {
        if (empty($_SERVER[$key])) {
            continue;
        }
        $ip = explode(',', (string) $_SERVER[$key])[0];
        $ip = trim($ip);
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return $ip;
        }
    }
    return '0.0.0.0';
}

function resolve_geo(string $ip): array
{
    if ($ip === '0.0.0.0' || $ip === '127.0.0.1' || str_starts_with($ip, '192.168.') || str_starts_with($ip, '10.')) {
        return ['country' => 'Local', 'city' => 'Development', 'region' => ''];
    }

    $cacheKey = 'geo_' . md5($ip);
    if (!empty($_SESSION[$cacheKey])) {
        return $_SESSION[$cacheKey];
    }

    $ctx = stream_context_create(['http' => ['timeout' => 2]]);
    $json = @file_get_contents(
        'http://ip-api.com/json/' . urlencode($ip) . '?fields=status,country,city,regionName',
        false,
        $ctx
    );

    if (!$json) {
        return [];
    }

    $data = json_decode($json, true);
    if (!is_array($data) || ($data['status'] ?? '') !== 'success') {
        return [];
    }

    $geo = [
        'country' => $data['country'] ?? null,
        'city'    => $data['city'] ?? null,
        'region'  => $data['regionName'] ?? null,
    ];
    $_SESSION[$cacheKey] = $geo;
    return $geo;
}

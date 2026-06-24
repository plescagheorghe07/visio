<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

$logId = trim((string) ($_GET['log_id'] ?? ''));

if ($logId !== '') {
    try {
        $ip = function_exists('get_client_ip') ? get_client_ip() : ($_SERVER['REMOTE_ADDR'] ?? null);
        $ua = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 500) ?: null;
        email_tracks_repo()->markOpened($logId, $ip, $ua);
    } catch (Throwable) {
        // Pixelul trebuie să răspundă mereu, chiar dacă DB e indisponibil.
    }
}

header('Content-Type: image/gif');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

// 1×1 transparent GIF
echo base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
exit;

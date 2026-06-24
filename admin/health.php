<?php

declare(strict_types=1);

/**
 * Diagnostic admin — șterge sau restricționează după debug.
 * Acces: /admin/health.php
 */
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: text/plain; charset=utf-8');

$root = dirname(__DIR__);
$checks = [];

function check(string $label, callable $fn): void
{
    global $checks;
    try {
        $fn();
        $checks[] = ['ok', $label];
    } catch (Throwable $e) {
        $checks[] = ['fail', $label . ' — ' . $e->getMessage() . ' @ ' . $e->getFile() . ':' . $e->getLine()];
    }
}

echo "Visio admin health check\n";
echo str_repeat('=', 40) . "\n";
echo 'PHP: ' . PHP_VERSION . "\n";
echo 'SAPI: ' . PHP_SAPI . "\n";
echo 'Root: ' . $root . "\n\n";

check('includes/bootstrap.php exists', fn () => assert(file_exists($root . '/includes/bootstrap.php')));
check('core/EmailTrackRepository.php exists', fn () => assert(file_exists($root . '/core/EmailTrackRepository.php')));
check('admin/includes/header.php syntax', function () use ($root) {
    $file = $root . '/admin/includes/header.php';
    $code = file_get_contents($file);
    if ($code === false) {
        throw new RuntimeException('Cannot read header.php');
    }
    token_get_all($code, TOKEN_PARSE);
});

check('bootstrap loads', function () use ($root) {
    require_once $root . '/includes/bootstrap.php';
});

check('database connection', function () {
    db()->query('SELECT 1');
});

check('contact_messages table', function () {
    contacts_repo()->countUnread();
});

check('email_tracks table', function () {
    email_tracks_repo()->countUnopened();
});

check('header.php includes', function () use ($root) {
    $_SESSION['admin_id'] = 1;
    $_SESSION['admin_name'] = 'Health';
    $pageTitle = 'Health';
    ob_start();
    require $root . '/admin/includes/header.php';
    $html = ob_get_clean();
    if ($html === '' || !str_contains($html, 'Visio Admin')) {
        throw new RuntimeException('header.php produced empty or invalid output');
    }
});

foreach ($checks as [$status, $msg]) {
    echo ($status === 'ok' ? '[OK]  ' : '[FAIL]') . ' ' . $msg . "\n";
}

echo "\nDone.\n";

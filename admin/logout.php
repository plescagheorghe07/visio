<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';

$_SESSION = [];
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}
header('Location: ' . admin_url('login.php'));
exit;

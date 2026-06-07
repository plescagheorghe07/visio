<?php
/** @var string $pageTitle */
if (!function_exists('app_config')) {
    require_once __DIR__ . '/../../includes/bootstrap.php';
}
require_auth();
$self = basename($_SERVER['PHP_SELF'] ?? '');
?>
<!DOCTYPE html>
<html lang="ro" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle ?? 'Admin') ?> — Visio Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/admin.css') ?>">
</head>
<body class="admin-body">
    <aside class="admin-sidebar">
        <a href="<?= admin_url('index.php') ?>" class="sidebar-brand">
            <img class="logo-icon" src="<?= brand_logo_href() ?>" alt="Visio">
            <span>Visio Admin</span>
        </a>
        <nav class="sidebar-nav">
            <a href="<?= admin_url('index.php') ?>" class="<?= $self === 'index.php' ? 'active' : '' ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>
            <a href="<?= admin_url('analytics.php') ?>" class="<?= $self === 'analytics.php' ? 'active' : '' ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
                Analitice
            </a>
            <a href="<?= admin_url('projects.php') ?>" class="<?= str_contains($self, 'project') ? 'active' : '' ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                Proiecte
            </a>
            <a href="<?= admin_url('contacts.php') ?>" class="<?= $self === 'contacts.php' ? 'active' : '' ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                Contacte
                <?php $unread = contacts_repo()->countUnread(); if ($unread): ?>
                <span class="nav-badge"><?= $unread ?></span>
                <?php endif; ?>
            </a>
            <a href="<?= admin_url('translations.php') ?>" class="<?= $self === 'translations.php' ? 'active' : '' ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                Traduceri
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="<?= home_href() ?>" target="_blank">Vezi site-ul ↗</a>
            <a href="<?= admin_url('logout.php') ?>" class="logout-link">Deconectare</a>
        </div>
    </aside>
    <div class="admin-main">
        <header class="admin-topbar">
            <h1><?= e($pageTitle ?? 'Admin') ?></h1>
            <span class="admin-user"><?= e($_SESSION['admin_name'] ?? '') ?></span>
        </header>
        <div class="admin-content">

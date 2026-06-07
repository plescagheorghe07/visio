<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_auth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_verify($_POST['csrf_token'] ?? null)) {
    header('Location: ' . admin_url('projects.php'));
    exit;
}

$id = (int) ($_POST['id'] ?? 0);
if ($id > 0) {
    $images = projects_repo()->getImages($id);
    foreach ($images as $img) {
        $fullPath = __DIR__ . '/../' . $img['image_path'];
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }
    projects_repo()->delete($id);
    flash('success', 'Proiect șters cu succes.');
}

header('Location: ' . admin_url('projects.php'));
exit;

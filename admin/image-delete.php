<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_auth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_verify($_POST['csrf_token'] ?? null)) {
    header('Location: projects.php');
    exit;
}

$imageId = (int) ($_POST['image_id'] ?? 0);
$projectId = (int) ($_POST['project_id'] ?? 0);

if ($imageId > 0) {
    $path = projects_repo()->deleteImage($imageId);
    if ($path) {
        $fullPath = __DIR__ . '/../' . $path;
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }
}

header('Location: ' . admin_url('project-edit.php?id=' . $projectId));
exit;

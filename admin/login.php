<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';

if (is_logged_in()) {
    header('Location: ' . admin_url('index.php'));
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify($_POST['csrf_token'] ?? null)) {
        $error = 'Invalid request.';
    } else {
        $user = users_repo()->verify(
            trim($_POST['email'] ?? ''),
            $_POST['password'] ?? ''
        );
        if ($user) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_name'] = $user['name'];
            $_SESSION['admin_email'] = $user['email'];
            header('Location: ' . admin_url('index.php'));
            exit;
        }
        $error = 'Email sau parolă incorectă.';
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Visio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/admin.css') ?>">
</head>
<body class="admin-login">
    <div class="login-card">
        <div class="login-brand">
            <span class="logo-icon">V</span>
            <h1>Visio Admin</h1>
            <p>Panou de administrare</p>
        </div>
        <?php if ($error): ?>
        <div class="alert alert-error"><?= e($error) ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required autofocus
                       value="<?= e($_POST['email'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="password">Parolă</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn--primary btn--block">Autentificare</button>
        </form>
        <a href="<?= url() ?>" class="login-back">← Înapoi la site</a>
    </div>
</body>
</html>

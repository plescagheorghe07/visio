<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_auth();

$writer = translations_writer();
$lang = $_GET['lang'] ?? 'ro';
if (!in_array($lang, ['ro', 'en', 'ru'], true)) {
    $lang = 'ro';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_verify($_POST['csrf_token'] ?? null)) {
    $postLang = $_POST['lang'] ?? 'ro';
    $keys = $_POST['keys'] ?? [];
    $values = $_POST['values'] ?? [];
    $translations = [];

    foreach ($keys as $i => $key) {
        $key = trim($key);
        if ($key !== '') {
            $translations[$key] = $values[$i] ?? '';
        }
    }

    if ($writer->saveTranslations($postLang, $translations)) {
        flash('success', "Traducerile pentru {$postLang} au fost salvate.");
    } else {
        flash('error', 'Eroare la salvarea traducerilor.');
    }
    header('Location: ' . admin_url('translations.php?lang=' . $postLang));
    exit;
}

$pageTitle = 'Traduceri';
$translations = $writer->getTranslations($lang);
$success = flash('success');
$error = flash('error');

require __DIR__ . '/includes/header.php';
?>

<?php if ($success): ?>
<div class="alert alert-success"><?= e($success) ?></div>
<?php endif; ?>
<?php if ($error): ?>
<div class="alert alert-error"><?= e($error) ?></div>
<?php endif; ?>

<div class="lang-tabs">
    <?php foreach (['ro' => 'Română', 'en' => 'English', 'ru' => 'Русский'] as $code => $label): ?>
    <a href="<?= admin_url('translations.php?lang=' . $code) ?>" class="lang-tab <?= $lang === $code ? 'active' : '' ?>"><?= $label ?></a>
    <?php endforeach; ?>
</div>

<form method="POST" class="admin-form translations-form">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <input type="hidden" name="lang" value="<?= e($lang) ?>">

    <table class="admin-table">
        <thead>
            <tr><th style="width:30%">Cheie</th><th>Traducere</th></tr>
        </thead>
        <tbody>
            <?php foreach ($translations as $key => $value): ?>
            <tr>
                <td>
                    <code><?= e($key) ?></code>
                    <input type="hidden" name="keys[]" value="<?= e($key) ?>">
                </td>
                <td>
                    <?php if (strlen($value) > 80): ?>
                    <textarea name="values[]" rows="2"><?= e($value) ?></textarea>
                    <?php else: ?>
                    <input type="text" name="values[]" value="<?= e($value) ?>">
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="form-actions">
        <button type="submit" class="btn btn--primary">Salvează traducerile</button>
    </div>
</form>

<?php require __DIR__ . '/includes/footer.php'; ?>

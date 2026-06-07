<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_auth();

$pageTitle = 'Editează proiect';
$repo = projects_repo();
$id = (int) ($_GET['id'] ?? 0);
$project = $id ? $repo->findById($id) : null;
$tags = $id ? implode(', ', $repo->getTags($id)) : '';
$images = $id ? $repo->getImages($id) : [];
$errors = [];
$success = flash('success');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Token invalid. Reîncarcă pagina.';
    } else {
        $id = (int) ($_POST['id'] ?? $id);
        $data = [
            'slug'           => slugify($_POST['slug'] ?? $_POST['title_ro'] ?? ''),
            'title_ro'       => trim($_POST['title_ro'] ?? ''),
            'title_en'       => trim($_POST['title_en'] ?? ''),
            'title_ru'       => trim($_POST['title_ru'] ?? ''),
            'description_ro' => trim($_POST['description_ro'] ?? ''),
            'description_en' => trim($_POST['description_en'] ?? ''),
            'description_ru' => trim($_POST['description_ru'] ?? ''),
            'meta_title_ro'  => trim($_POST['meta_title_ro'] ?? ''),
            'meta_title_en'  => trim($_POST['meta_title_en'] ?? ''),
            'meta_title_ru'  => trim($_POST['meta_title_ru'] ?? ''),
            'meta_desc_ro'   => trim($_POST['meta_desc_ro'] ?? ''),
            'meta_desc_en'   => trim($_POST['meta_desc_en'] ?? ''),
            'meta_desc_ru'   => trim($_POST['meta_desc_ru'] ?? ''),
            'github_link'    => trim($_POST['github_link'] ?? ''),
            'website_link'   => trim($_POST['website_link'] ?? ''),
            'is_featured'    => isset($_POST['is_featured']) ? 1 : 0,
            'is_active'      => isset($_POST['is_active']) ? 1 : 0,
            'sort_order'     => (int) ($_POST['sort_order'] ?? 0),
        ];

        if ($data['title_ro'] === '') {
            $errors[] = 'Titlul RO este obligatoriu.';
        }
        if ($data['slug'] === '') {
            $errors[] = 'Slug-ul este obligatoriu.';
        }

        if (empty($errors)) {
            try {
                if ($id) {
                    $repo->update($id, $data);
                } else {
                    $id = $repo->create($data);
                }

                $tagList = array_filter(array_map('trim', explode(',', $_POST['tags'] ?? '')));
                $repo->syncTags($id, $tagList);

                if (!empty($_FILES['images']['name'][0])) {
                    $uploadDir = app_config('uploads_path') . '/projects/' . $data['slug'];
                    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
                        throw new RuntimeException('Nu s-a putut crea folderul uploads.');
                    }

                    $allowed = app_config('allowed_ext');
                    $maxSize = app_config('max_upload');
                    $uploadErrors = [];

                    foreach ($_FILES['images']['name'] as $i => $name) {
                        if (empty($name)) {
                            continue;
                        }
                        $err = $_FILES['images']['error'][$i];
                        if ($err !== UPLOAD_ERR_OK) {
                            $uploadErrors[] = "{$name}: eroare upload ({$err})";
                            continue;
                        }
                        if ($_FILES['images']['size'][$i] > $maxSize) {
                            $uploadErrors[] = "{$name}: fișier prea mare";
                            continue;
                        }

                        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                        if (!in_array($ext, $allowed, true)) {
                            $uploadErrors[] = "{$name}: format neacceptat";
                            continue;
                        }

                        $filename = uniqid('img_', true) . '.' . $ext;
                        $dest = $uploadDir . '/' . $filename;
                        if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $dest)) {
                            $relativePath = 'uploads/projects/' . $data['slug'] . '/' . $filename;
                            $hasCover = !empty($repo->getImages($id));
                            $repo->addImage($id, $relativePath, [
                                'ro' => $data['title_ro'],
                                'en' => $data['title_en'],
                                'ru' => $data['title_ru'],
                            ], !$hasCover, $i);
                        }
                    }

                    if ($uploadErrors) {
                        flash('error', implode('; ', $uploadErrors));
                    }
                }

                flash('success', 'Proiect salvat cu succes.');
                header('Location: ' . admin_url('project-edit.php?id=' . $id));
                exit;
            } catch (Throwable $e) {
                $errors[] = 'Eroare la salvare: ' . $e->getMessage();
            }
        }

        $project = array_merge($project ?? [], $data);
        $tags = $_POST['tags'] ?? '';
    }
}

function admin_field(?array $p, string $key, string $default = ''): string
{
    return e((string) ($p[$key] ?? $default));
}

require __DIR__ . '/includes/header.php';
$errorFlash = flash('error');
?>

<?php if ($success): ?>
<div class="alert alert-success"><?= e($success) ?></div>
<?php endif; ?>
<?php if ($errorFlash): ?>
<div class="alert alert-error"><?= e($errorFlash) ?></div>
<?php endif; ?>
<?php if ($errors): ?>
<div class="alert alert-error"><?= e(implode(' ', $errors)) ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data" class="admin-form" id="projectForm">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <input type="hidden" name="id" value="<?= (int) $id ?>">

    <div class="form-tabs">
        <button type="button" class="tab-btn active" data-tab="general">General</button>
        <button type="button" class="tab-btn" data-tab="ro">Română</button>
        <button type="button" class="tab-btn" data-tab="en">English</button>
        <button type="button" class="tab-btn" data-tab="ru">Русский</button>
        <button type="button" class="tab-btn" data-tab="seo">SEO</button>
        <button type="button" class="tab-btn" data-tab="media">Imagini</button>
    </div>

    <div class="tab-panel active" id="tab-general">
        <div class="form-row">
            <div class="form-group">
                <label>Slug (URL)</label>
                <input type="text" name="slug" value="<?= admin_field($project, 'slug') ?>" required>
            </div>
            <div class="form-group">
                <label>Ordine sortare</label>
                <input type="number" name="sort_order" value="<?= admin_field($project, 'sort_order', '0') ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Website link</label>
                <input type="url" name="website_link" value="<?= admin_field($project, 'website_link') ?>">
            </div>
            <div class="form-group">
                <label>GitHub link</label>
                <input type="url" name="github_link" value="<?= admin_field($project, 'github_link') ?>">
            </div>
        </div>
        <div class="form-group">
            <label>Tech Stack (separate prin virgulă)</label>
            <input type="text" name="tags" value="<?= e($tags) ?>" placeholder="PHP, MySQL, React">
        </div>
        <div class="form-checks">
            <label><input type="checkbox" name="is_featured" <?= !empty($project['is_featured']) ? 'checked' : '' ?>> Featured</label>
            <label><input type="checkbox" name="is_active" <?= ($project === null || !empty($project['is_active'])) ? 'checked' : '' ?>> Activ</label>
        </div>
    </div>

    <?php foreach (['ro' => 'Română', 'en' => 'English', 'ru' => 'Русский'] as $code => $label): ?>
    <div class="tab-panel" id="tab-<?= $code ?>">
        <div class="form-group">
            <label>Titlu (<?= $label ?>)</label>
            <input type="text" name="title_<?= $code ?>" value="<?= admin_field($project, "title_{$code}") ?>" <?= $code === 'ro' ? 'required' : '' ?>>
        </div>
        <div class="form-group">
            <label>Descriere (<?= $label ?>)</label>
            <textarea name="description_<?= $code ?>" rows="8"><?= admin_field($project, "description_{$code}") ?></textarea>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="tab-panel" id="tab-seo">
        <?php foreach (['ro' => 'RO', 'en' => 'EN', 'ru' => 'RU'] as $code => $label): ?>
        <h3 class="seo-block-title">SEO — <?= $label ?></h3>
        <div class="form-group">
            <label>Meta Title</label>
            <input type="text" name="meta_title_<?= $code ?>" value="<?= admin_field($project, "meta_title_{$code}") ?>" maxlength="255">
        </div>
        <div class="form-group">
            <label>Meta Description</label>
            <textarea name="meta_desc_<?= $code ?>" rows="3" maxlength="320"><?= admin_field($project, "meta_desc_{$code}") ?></textarea>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="tab-panel" id="tab-media">
        <div class="form-group">
            <label>Adaugă imagini (multiple, max 5MB fiecare)</label>
            <input type="file" name="images[]" accept="image/jpeg,image/png,image/webp,image/gif" multiple>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn--primary">Salvează proiect</button>
        <a href="<?= admin_url('projects.php') ?>" class="btn btn--outline">Anulează</a>
    </div>
</form>

<?php if ($images): ?>
<div class="admin-form image-manager">
    <h3>Imagini existente</h3>
    <div class="image-grid">
        <?php foreach ($images as $img): ?>
        <div class="image-thumb">
            <img src="<?= e(upload_url($img['image_path'])) ?>" alt="">
            <?php if ($img['is_cover']): ?><span class="cover-badge">Cover</span><?php endif; ?>
            <form method="POST" action="<?= admin_url('image-delete.php') ?>" class="delete-img-form">
                <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                <input type="hidden" name="image_id" value="<?= (int) $img['id'] ?>">
                <input type="hidden" name="project_id" value="<?= (int) $id ?>">
                <button type="submit" class="btn btn--sm btn--danger" onclick="return confirm('Ștergi imaginea?')">Șterge</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>

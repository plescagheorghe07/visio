<?php
$pageTitle = 'Proiecte';
require __DIR__ . '/includes/header.php';

$projects = projects_repo()->getAll();
$success = flash('success');
?>

<?php if ($success): ?>
<div class="alert alert-success"><?= e($success) ?></div>
<?php endif; ?>

<div class="panel-header">
    <p class="text-muted"><?= count($projects) ?> proiecte în total</p>
    <a href="<?= admin_url('project-edit.php') ?>" class="btn btn--primary">+ Adaugă proiect</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Titlu (RO)</th>
            <th>Slug</th>
            <th>Featured</th>
            <th>Activ</th>
            <th>Ordine</th>
            <th>Acțiuni</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $p): ?>
        <tr>
            <td><?= (int) $p['id'] ?></td>
            <td><?= e($p['title_ro']) ?></td>
            <td><code><?= e($p['slug']) ?></code></td>
            <td><?= $p['is_featured'] ? '✓' : '—' ?></td>
            <td><?= $p['is_active'] ? '✓' : '✗' ?></td>
            <td><?= (int) $p['sort_order'] ?></td>
            <td class="actions">
                <a href="<?= admin_url('project-edit.php?id=' . (int) $p['id']) ?>" class="btn btn--sm">Editează</a>
                <form method="POST" action="<?= admin_url('project-delete.php') ?>" class="inline-form"
                      onsubmit="return confirm('Ștergi acest proiect?');">
                    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                    <input type="hidden" name="id" value="<?= (int) $p['id'] ?>">
                    <button type="submit" class="btn btn--sm btn--danger">Șterge</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/includes/footer.php'; ?>

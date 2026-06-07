<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_verify($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? '';
    $id = (int) ($_POST['id'] ?? 0);
    if ($id > 0) {
        if ($action === 'read') {
            contacts_repo()->markRead($id);
        } elseif ($action === 'delete') {
            contacts_repo()->delete($id);
            flash('success', 'Mesaj șters.');
        }
    }
    header('Location: ' . admin_url('contacts.php'));
    exit;
}

$pageTitle = 'Mesaje contact';
$messages = contacts_repo()->getAll();
$success = flash('success');

require __DIR__ . '/includes/header.php';
?>

<?php if ($success): ?>
<div class="alert alert-success"><?= e($success) ?></div>
<?php endif; ?>

<table class="admin-table">
    <thead>
        <tr>
            <th>Status</th>
            <th>Nume</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Subiect</th>
            <th>Data</th>
            <th>Acțiuni</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $msg): ?>
        <tr class="<?= $msg['is_read'] ? '' : 'unread' ?>">
            <td><?= $msg['is_read'] ? 'Citit' : '<span class="badge-new">Nou</span>' ?></td>
            <td><?= e($msg['name']) ?></td>
            <td><a href="mailto:<?= e($msg['email']) ?>"><?= e($msg['email']) ?></a></td>
            <td><?= e($msg['phone'] ?? '—') ?></td>
            <td><?= e($msg['subject'] ?? '—') ?></td>
            <td><?= e(date('d.m.Y H:i', strtotime($msg['created_at']))) ?></td>
            <td class="actions">
                <button type="button" class="btn btn--sm view-msg" data-msg="<?= e($msg['message']) ?>">Citește</button>
                <?php if (!$msg['is_read']): ?>
                <form method="POST" class="inline-form">
                    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                    <input type="hidden" name="action" value="read">
                    <input type="hidden" name="id" value="<?= (int) $msg['id'] ?>">
                    <button type="submit" class="btn btn--sm">Marchează citit</button>
                </form>
                <?php endif; ?>
                <form method="POST" class="inline-form" onsubmit="return confirm('Ștergi mesajul?');">
                    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= (int) $msg['id'] ?>">
                    <button type="submit" class="btn btn--sm btn--danger">Șterge</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div id="msgModal" class="modal hidden">
    <div class="modal-content">
        <button class="modal-close" id="modalClose">&times;</button>
        <p id="modalBody"></p>
    </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>

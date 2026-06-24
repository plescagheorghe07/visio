<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_auth();

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_verify($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? '';

    if ($action === 'create') {
        $label = trim((string) ($_POST['label'] ?? ''));
        $email = trim((string) ($_POST['recipient_email'] ?? ''));
        $logId = trim((string) ($_POST['log_id'] ?? ''));

        try {
            email_tracks_repo()->create(
                $label !== '' ? $label : null,
                $email !== '' ? $email : null,
                $logId !== '' ? $logId : null
            );
            flash('success', 'Tracking creat. Copiază pixelul în email.');
        } catch (Throwable $e) {
            $error = $e->getMessage();
        }
    } elseif ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            email_tracks_repo()->delete($id);
            flash('success', 'Tracking șters.');
        }
    }

    if ($error === null) {
        header('Location: ' . admin_url('email-tracks.php'));
        exit;
    }
}

$pageTitle = 'Email tracking';
$tracks = [];
try {
    $tracks = email_tracks_repo()->getAll();
} catch (Throwable $e) {
    $error = $error ?? 'Tabelul email_tracks lipsește. Rulează database_email_tracks.sql în phpMyAdmin.';
}
$success = flash('success');

require __DIR__ . '/includes/header.php';
?>

<?php if ($success): ?>
<div class="alert alert-success"><?= e($success) ?></div>
<?php endif; ?>

<?php if ($error): ?>
<div class="alert alert-error"><?= e($error) ?></div>
<?php endif; ?>

<div class="admin-form" style="margin-bottom: 24px;">
    <h2 style="margin: 0 0 16px; font-size: 1.1rem;">Tracking nou</h2>
    <form method="POST" class="admin-form" style="padding: 0; border: none;">
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <input type="hidden" name="action" value="create">
        <div class="form-row">
            <div class="form-group">
                <label for="label">Etichetă (opțional)</label>
                <input type="text" id="label" name="label" maxlength="255" placeholder="ex: Ofertă DentaDent">
            </div>
            <div class="form-group">
                <label for="recipient_email">Email destinatar (opțional)</label>
                <input type="email" id="recipient_email" name="recipient_email" maxlength="255" placeholder="client@example.com">
            </div>
        </div>
        <div class="form-group">
            <label for="log_id">ID tracking (opțional — lăsat gol = generat automat)</label>
            <input type="text" id="log_id" name="log_id" maxlength="64" pattern="[a-zA-Z0-9_-]+" placeholder="abc123xyz">
        </div>
        <button type="submit" class="btn btn--primary">Creează tracking</button>
    </form>
</div>

<p class="admin-hint" style="margin-bottom: 20px; color: var(--admin-muted); font-size: 0.9rem;">
    Inserează pixelul în corpul emailului. La prima deschidere, statusul devine <strong>Deschis</strong>.
</p>

<table class="admin-table">
    <thead>
        <tr>
            <th>Status</th>
            <th>ID (log_id)</th>
            <th>Etichetă</th>
            <th>Destinatar</th>
            <th>Deschideri</th>
            <th>Prima deschidere</th>
            <th>Ultima deschidere</th>
            <th>Creat</th>
            <th>Pixel / URL</th>
            <th>Acțiuni</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!$tracks): ?>
        <tr>
            <td colspan="10" style="text-align:center;color:var(--admin-muted);">Niciun tracking încă.</td>
        </tr>
        <?php endif; ?>
        <?php foreach ($tracks as $track):
            $pixelUrl = email_track_pixel_url($track['log_id']);
            $pixelHtml = '<img src="' . $pixelUrl . '" width="1" height="1" style="display:none !important;" alt="" />';
        ?>
        <tr class="<?= $track['is_opened'] ? '' : 'unread' ?>">
            <td>
                <?php if ($track['is_opened']): ?>
                <span class="badge-opened">Deschis</span>
                <?php else: ?>
                <span class="badge-new">Nedeschis</span>
                <?php endif; ?>
            </td>
            <td><code><?= e($track['log_id']) ?></code></td>
            <td><?= e($track['label'] ?? '—') ?></td>
            <td><?= $track['recipient_email'] ? '<a href="mailto:' . e($track['recipient_email']) . '">' . e($track['recipient_email']) . '</a>' : '—' ?></td>
            <td><?= (int) $track['open_count'] ?></td>
            <td><?= $track['first_opened_at'] ? e(date('d.m.Y H:i', strtotime($track['first_opened_at']))) : '—' ?></td>
            <td><?= $track['last_opened_at'] ? e(date('d.m.Y H:i', strtotime($track['last_opened_at']))) : '—' ?></td>
            <td><?= e(date('d.m.Y H:i', strtotime($track['created_at']))) ?></td>
            <td class="actions">
                <button type="button" class="btn btn--sm copy-track" data-copy="<?= e($pixelHtml) ?>">Copiază pixel</button>
                <button type="button" class="btn btn--sm copy-track" data-copy="<?= e($pixelUrl) ?>">Copiază URL</button>
            </td>
            <td class="actions">
                <form method="POST" class="inline-form" onsubmit="return confirm('Ștergi acest tracking?');">
                    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= (int) $track['id'] ?>">
                    <button type="submit" class="btn btn--sm btn--danger">Șterge</button>
                </form>
            </td>
        </tr>
        <?php if ($track['is_opened'] && ($track['ip_address'] || $track['user_agent'])): ?>
        <tr class="track-meta-row">
            <td colspan="10" style="font-size:0.82rem;color:var(--admin-muted);padding-top:0;">
                <?php if ($track['ip_address']): ?>IP: <?= e($track['ip_address']) ?><?php endif; ?>
                <?php if ($track['user_agent']): ?> · UA: <?= e(mb_substr($track['user_agent'], 0, 120)) ?><?php endif; ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/includes/footer.php'; ?>

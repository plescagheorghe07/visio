<?php
$pageTitle = 'Dashboard';
require __DIR__ . '/includes/header.php';

$projectCount = projects_repo()->countActive();
$unreadContacts = contacts_repo()->countUnread();
$recentContacts = array_slice(contacts_repo()->getAll(5), 0, 5);
?>

<div class="dashboard">
    <div class="stats-row">
        <div class="dash-card">
            <span class="dash-card-value"><?= $projectCount ?></span>
            <span class="dash-card-label">Proiecte active</span>
        </div>
        <div class="dash-card">
            <span class="dash-card-value"><?= $unreadContacts ?></span>
            <span class="dash-card-label">Mesaje necitite</span>
        </div>
        <div class="dash-card">
            <span class="dash-card-value">3</span>
            <span class="dash-card-label">Limbi (RO/EN/RU)</span>
        </div>
    </div>

    <div class="dash-grid">
        <div class="dash-panel">
            <div class="panel-header">
                <h2>Mesaje recente</h2>
                <a href="<?= admin_url('contacts.php') ?>" class="btn btn--sm">Vezi toate</a>
            </div>
            <?php if (empty($recentContacts)): ?>
            <p class="text-muted">Niciun mesaj încă.</p>
            <?php else: ?>
            <table class="admin-table">
                <thead>
                    <tr><th>Nume</th><th>Email</th><th>Data</th><th></th></tr>
                </thead>
                <tbody>
                    <?php foreach ($recentContacts as $msg): ?>
                    <tr class="<?= $msg['is_read'] ? '' : 'unread' ?>">
                        <td><?= e($msg['name']) ?></td>
                        <td><?= e($msg['email']) ?></td>
                        <td><?= e(date('d.m.Y H:i', strtotime($msg['created_at']))) ?></td>
                        <td><?= $msg['is_read'] ? '' : '<span class="badge-new">Nou</span>' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
        <div class="dash-panel">
            <div class="panel-header">
                <h2>Acțiuni rapide</h2>
            </div>
            <div class="quick-actions">
                <a href="<?= admin_url('project-edit.php') ?>" class="quick-btn">+ Adaugă proiect</a>
                <a href="<?= admin_url('projects.php') ?>" class="quick-btn">Gestionează proiecte</a>
                <a href="<?= admin_url('translations.php') ?>" class="quick-btn">Editează traduceri</a>
                <a href="<?= admin_url('contacts.php') ?>" class="quick-btn">Mesaje contact</a>
                <a href="<?= admin_url('analytics.php') ?>" class="quick-btn">Analitice trafic</a>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>

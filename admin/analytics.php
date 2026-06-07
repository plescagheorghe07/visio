<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';
require_auth();

$pageTitle = 'Analitice';
$overview = ['total_views' => 0, 'unique_today' => 0, 'unique_week' => 0, 'unique_month' => 0, 'views_today' => 0, 'views_week' => 0, 'views_month' => 0];
$topPages = [];
$viewsByDay = [];
$topCountries = [];
$recent = [];

try {
    $repo = analytics_repo();
    $overview = $repo->getOverview();
    $topPages = $repo->getTopPages(30, 12);
    $viewsByDay = $repo->getViewsByDay(14);
    $topCountries = $repo->getTopCountries(8);
    $recent = $repo->getRecentVisitors(15);
} catch (Throwable) {
    $dbError = 'Tabelele analytics lipsesc. Rulează database_analytics.sql în MySQL.';
}

$maxDayViews = max(array_column($viewsByDay, 'views') ?: [1]);

require __DIR__ . '/includes/header.php';
?>

<?php if (!empty($dbError)): ?>
<div class="alert alert-error"><?= e($dbError) ?></div>
<?php else: ?>

<div class="stats-row stats-row--4">
    <div class="dash-card">
        <span class="dash-card-value"><?= number_format($overview['total_views']) ?></span>
        <span class="dash-card-label">Total vizualizări</span>
    </div>
    <div class="dash-card">
        <span class="dash-card-value"><?= number_format($overview['views_today']) ?></span>
        <span class="dash-card-label">Vizualizări azi</span>
    </div>
    <div class="dash-card">
        <span class="dash-card-value"><?= number_format($overview['views_week']) ?></span>
        <span class="dash-card-label">Săptămâna asta</span>
    </div>
    <div class="dash-card">
        <span class="dash-card-value"><?= number_format($overview['views_month']) ?></span>
        <span class="dash-card-label">Luna asta</span>
    </div>
</div>

<div class="stats-row">
    <div class="dash-card">
        <span class="dash-card-value"><?= number_format($overview['unique_today']) ?></span>
        <span class="dash-card-label">Vizitatori unici azi</span>
    </div>
    <div class="dash-card">
        <span class="dash-card-value"><?= number_format($overview['unique_week']) ?></span>
        <span class="dash-card-label">Unici săptămânal</span>
    </div>
    <div class="dash-card">
        <span class="dash-card-value"><?= number_format($overview['unique_month']) ?></span>
        <span class="dash-card-label">Unici lunar</span>
    </div>
</div>

<div class="dash-grid">
    <div class="dash-panel">
        <div class="panel-header"><h2>Trafic ultimele 14 zile</h2></div>
        <div class="chart-bars">
            <?php foreach ($viewsByDay as $row): ?>
            <?php $h = max(4, (int) (($row['views'] / $maxDayViews) * 100)); ?>
            <div class="chart-bar-wrap" title="<?= e($row['d']) ?>: <?= (int) $row['views'] ?> views">
                <div class="chart-bar" style="height:<?= $h ?>%"></div>
                <span class="chart-label"><?= e(date('d.m', strtotime($row['d']))) ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="dash-panel">
        <div class="panel-header"><h2>Top țări</h2></div>
        <ul class="country-list">
            <?php foreach ($topCountries as $c): ?>
            <li><span><?= e($c['country']) ?></span><strong><?= number_format((int) $c['views']) ?></strong></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="dash-grid">
    <div class="dash-panel">
        <div class="panel-header"><h2>Top pagini (30 zile)</h2></div>
        <table class="admin-table">
            <thead><tr><th>Pagină</th><th>Views</th><th>Unici</th></tr></thead>
            <tbody>
                <?php foreach ($topPages as $p): ?>
                <tr>
                    <td><code><?= e($p['page_path']) ?></code></td>
                    <td><?= number_format((int) $p['views']) ?></td>
                    <td><?= number_format((int) $p['unique_views']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="dash-panel">
        <div class="panel-header"><h2>Activitate recentă</h2></div>
        <table class="admin-table">
            <thead><tr><th>Locație</th><th>Pagină</th><th>Când</th></tr></thead>
            <tbody>
                <?php foreach ($recent as $r): ?>
                <tr>
                    <td><?= e(trim(($r['city'] ?? '') . ', ' . ($r['country'] ?? ''), ', ')) ?: '—' ?></td>
                    <td><code><?= e($r['page_path']) ?></code></td>
                    <td><?= e(date('d.m H:i', strtotime($r['viewed_at']))) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<p class="text-muted analytics-note">Loguri zilnice: <code>storage/logs/visits-YYYY-MM-DD.log</code></p>

<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>

<?php

declare(strict_types=1);

namespace Visio\Core;

use PDO;

final class AnalyticsRepository
{
    public function __construct(private PDO $db) {}

    public function trackVisit(array $data): void
    {
        $hash = $data['visitor_hash'];
        $visitorId = $this->upsertVisitor($hash, $data);

        $stmt = $this->db->prepare(
            'INSERT INTO analytics_pageviews (visitor_id, page_path, page_title, lang, referrer, session_id)
             VALUES (?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute([
            $visitorId,
            $data['page_path'],
            $data['page_title'] ?? null,
            $data['lang'] ?? null,
            $data['referrer'] ?? null,
            $data['session_id'] ?? null,
        ]);

        $this->appendLogFile($data);
    }

    private function upsertVisitor(string $hash, array $data): int
    {
        $stmt = $this->db->prepare('SELECT id FROM analytics_visitors WHERE visitor_hash = ? LIMIT 1');
        $stmt->execute([$hash]);
        $id = $stmt->fetchColumn();

        if ($id) {
            $this->db->prepare(
                'UPDATE analytics_visitors SET last_visit = NOW(), visit_count = visit_count + 1,
                 country = COALESCE(?, country), city = COALESCE(?, city), region = COALESCE(?, region)
                 WHERE id = ?'
            )->execute([
                $data['country'] ?? null,
                $data['city'] ?? null,
                $data['region'] ?? null,
                $id,
            ]);
            return (int) $id;
        }

        $this->db->prepare(
            'INSERT INTO analytics_visitors (visitor_hash, ip_address, country, city, region, user_agent)
             VALUES (?, ?, ?, ?, ?, ?)'
        )->execute([
            $hash,
            $data['ip_address'] ?? null,
            $data['country'] ?? null,
            $data['city'] ?? null,
            $data['region'] ?? null,
            $data['user_agent'] ?? null,
        ]);

        return (int) $this->db->lastInsertId();
    }

    private function appendLogFile(array $data): void
    {
        $dir = dirname(__DIR__) . '/storage/logs';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $file = $dir . '/visits-' . date('Y-m-d') . '.log';
        $line = json_encode([
            'time'     => date('c'),
            'path'     => $data['page_path'],
            'lang'     => $data['lang'] ?? null,
            'country'  => $data['country'] ?? null,
            'city'     => $data['city'] ?? null,
            'referrer' => $data['referrer'] ?? null,
            'ip'       => $data['ip_address'] ?? null,
        ], JSON_UNESCAPED_UNICODE) . PHP_EOL;
        file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
    }

    public function getOverview(): array
    {
        return [
            'total_views'    => (int) $this->db->query('SELECT COUNT(*) FROM analytics_pageviews')->fetchColumn(),
            'unique_today'   => $this->countUniqueVisitors('day'),
            'unique_week'    => $this->countUniqueVisitors('week'),
            'unique_month'   => $this->countUniqueVisitors('month'),
            'views_today'    => $this->countViews('day'),
            'views_week'     => $this->countViews('week'),
            'views_month'    => $this->countViews('month'),
        ];
    }

    private function countViews(string $period): int
    {
        $sql = match ($period) {
            'day'   => 'SELECT COUNT(*) FROM analytics_pageviews WHERE viewed_at >= CURDATE()',
            'week'  => 'SELECT COUNT(*) FROM analytics_pageviews WHERE viewed_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)',
            default => 'SELECT COUNT(*) FROM analytics_pageviews WHERE viewed_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)',
        };
        return (int) $this->db->query($sql)->fetchColumn();
    }

    private function countUniqueVisitors(string $period): int
    {
        $sql = match ($period) {
            'day'   => 'SELECT COUNT(DISTINCT visitor_id) FROM analytics_pageviews WHERE viewed_at >= CURDATE()',
            'week'  => 'SELECT COUNT(DISTINCT visitor_id) FROM analytics_pageviews WHERE viewed_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)',
            default => 'SELECT COUNT(DISTINCT visitor_id) FROM analytics_pageviews WHERE viewed_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)',
        };
        return (int) $this->db->query($sql)->fetchColumn();
    }

    public function getTopPages(int $days = 30, int $limit = 15): array
    {
        $stmt = $this->db->prepare(
            'SELECT page_path, page_title, COUNT(*) AS views,
                    COUNT(DISTINCT visitor_id) AS unique_views
             FROM analytics_pageviews
             WHERE viewed_at >= DATE_SUB(CURDATE(), INTERVAL ? DAY)
             GROUP BY page_path, page_title
             ORDER BY views DESC
             LIMIT ?'
        );
        $stmt->bindValue(1, $days, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getViewsByDay(int $days = 30): array
    {
        $stmt = $this->db->prepare(
            'SELECT DATE(viewed_at) AS d, COUNT(*) AS views,
                    COUNT(DISTINCT visitor_id) AS unique_views
             FROM analytics_pageviews
             WHERE viewed_at >= DATE_SUB(CURDATE(), INTERVAL ? DAY)
             GROUP BY DATE(viewed_at)
             ORDER BY d ASC'
        );
        $stmt->execute([$days]);
        return $stmt->fetchAll();
    }

    public function getTopCountries(int $limit = 10): array
    {
        $stmt = $this->db->prepare(
            'SELECT COALESCE(v.country, "Unknown") AS country, COUNT(p.id) AS views
             FROM analytics_pageviews p
             LEFT JOIN analytics_visitors v ON v.id = p.visitor_id
             GROUP BY v.country
             ORDER BY views DESC
             LIMIT ?'
        );
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getRecentVisitors(int $limit = 20): array
    {
        $stmt = $this->db->prepare(
            'SELECT v.country, v.city, v.ip_address, p.page_path, p.viewed_at
             FROM analytics_pageviews p
             JOIN analytics_visitors v ON v.id = p.visitor_id
             ORDER BY p.viewed_at DESC
             LIMIT ?'
        );
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

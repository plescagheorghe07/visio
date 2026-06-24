<?php

declare(strict_types=1);

namespace Visio\Core;

use PDO;

final class EmailTrackRepository
{
    public function __construct(private PDO $db) {}

    public function create(?string $label = null, ?string $recipientEmail = null, ?string $logId = null): array
    {
        $logId = $this->normalizeLogId($logId ?? $this->generateLogId());
        if ($logId === '') {
            throw new \InvalidArgumentException('ID tracking invalid.');
        }
        if ($this->findByLogId($logId) !== null) {
            throw new \InvalidArgumentException('Acest ID există deja.');
        }

        $stmt = $this->db->prepare(
            'INSERT INTO email_tracks (log_id, label, recipient_email)
             VALUES (?, ?, ?)'
        );
        $stmt->execute([
            $logId,
            $label !== null && $label !== '' ? $label : null,
            $recipientEmail !== null && $recipientEmail !== '' ? $recipientEmail : null,
        ]);

        $row = $this->findById((int) $this->db->lastInsertId());
        return $row ?? [];
    }

    public function getAll(int $limit = 200): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM email_tracks ORDER BY created_at DESC LIMIT ?'
        );
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM email_tracks WHERE id = ? LIMIT 1');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function findByLogId(string $logId): ?array
    {
        $logId = $this->normalizeLogId($logId);
        if ($logId === '') {
            return null;
        }
        $stmt = $this->db->prepare('SELECT * FROM email_tracks WHERE log_id = ? LIMIT 1');
        $stmt->execute([$logId]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function markOpened(string $logId, ?string $ip = null, ?string $userAgent = null): bool
    {
        $track = $this->findByLogId($logId);
        if ($track === null) {
            return false;
        }

        $stmt = $this->db->prepare(
            'UPDATE email_tracks
             SET is_opened = 1,
                 open_count = open_count + 1,
                 first_opened_at = COALESCE(first_opened_at, NOW()),
                 last_opened_at = NOW(),
                 ip_address = COALESCE(ip_address, ?),
                 user_agent = COALESCE(user_agent, ?)
             WHERE id = ?'
        );
        $stmt->execute([
            $ip,
            $userAgent !== null ? substr($userAgent, 0, 500) : null,
            (int) $track['id'],
        ]);

        return true;
    }

    public function delete(int $id): void
    {
        $this->db->prepare('DELETE FROM email_tracks WHERE id = ?')->execute([$id]);
    }

    public function countUnopened(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM email_tracks WHERE is_opened = 0')->fetchColumn();
    }

    private function generateLogId(): string
    {
        do {
            $id = bin2hex(random_bytes(6));
        } while ($this->findByLogId($id) !== null);

        return $id;
    }

    private function normalizeLogId(string $logId): string
    {
        $logId = strtolower(trim($logId));
        $logId = preg_replace('/[^a-z0-9_-]/', '', $logId) ?? '';
        return substr($logId, 0, 64);
    }
}

<?php

declare(strict_types=1);

namespace Visio\Core;

use PDO;

final class ContactRepository
{
    public function __construct(private PDO $db) {}

    public function create(array $data): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO contact_messages (name, email, phone, subject, message, ip_address, user_agent)
             VALUES (?,?,?,?,?,?,?)'
        );
        $stmt->execute([
            $data['name'], $data['email'], $data['phone'] ?? null,
            $data['subject'] ?? null, $data['message'],
            $data['ip_address'] ?? null, $data['user_agent'] ?? null,
        ]);
        return (int) $this->db->lastInsertId();
    }

    public function getAll(int $limit = 100): array
    {
        $stmt = $this->db->prepare('SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT ?');
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countUnread(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM contact_messages WHERE is_read = 0')->fetchColumn();
    }

    public function markRead(int $id): void
    {
        $this->db->prepare('UPDATE contact_messages SET is_read = 1 WHERE id = ?')->execute([$id]);
    }

    public function delete(int $id): void
    {
        $this->db->prepare('DELETE FROM contact_messages WHERE id = ?')->execute([$id]);
    }
}

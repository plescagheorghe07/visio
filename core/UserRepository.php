<?php

declare(strict_types=1);

namespace Visio\Core;

use PDO;

final class UserRepository
{
    public function __construct(private PDO $db) {}

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function verify(string $email, string $password): ?array
    {
        $user = $this->findByEmail($email);
        if (!$user || !password_verify($password, $user['password'])) {
            return null;
        }
        return $user;
    }
}

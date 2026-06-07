<?php

declare(strict_types=1);

namespace Visio\Core;

use PDO;

final class ProjectRepository
{
    public function __construct(private PDO $db) {}

    public function getAllActive(): array
    {
        $stmt = $this->db->query(
            'SELECT * FROM projects WHERE is_active = 1 ORDER BY sort_order ASC, id ASC'
        );
        return $stmt->fetchAll();
    }

    public function getFeatured(): array
    {
        $stmt = $this->db->query(
            'SELECT * FROM projects WHERE is_active = 1 AND is_featured = 1 ORDER BY sort_order ASC LIMIT 4'
        );
        return $stmt->fetchAll();
    }

    public function findBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM projects WHERE slug = ? AND is_active = 1 LIMIT 1');
        $stmt->execute([$slug]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM projects WHERE id = ? LIMIT 1');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM projects ORDER BY sort_order ASC, id ASC');
        return $stmt->fetchAll();
    }

    public function getTags(int $projectId): array
    {
        $stmt = $this->db->prepare('SELECT tag_name FROM project_tags WHERE project_id = ? ORDER BY tag_name');
        $stmt->execute([$projectId]);
        return array_column($stmt->fetchAll(), 'tag_name');
    }

    public function getImages(int $projectId): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM project_images WHERE project_id = ? ORDER BY is_cover DESC, sort_order ASC, id ASC'
        );
        $stmt->execute([$projectId]);
        return $stmt->fetchAll();
    }

    public function getCoverImage(int $projectId): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM project_images WHERE project_id = ? ORDER BY is_cover DESC, sort_order ASC LIMIT 1'
        );
        $stmt->execute([$projectId]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function countActive(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM projects WHERE is_active = 1')->fetchColumn();
    }

    public function create(array $data): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO projects (slug, title_ro, title_en, title_ru, description_ro, description_en, description_ru,
             meta_title_ro, meta_title_en, meta_title_ru, meta_desc_ro, meta_desc_en, meta_desc_ru,
             github_link, website_link, is_featured, is_active, sort_order)
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)'
        );
        $stmt->execute([
            $data['slug'], $data['title_ro'], $data['title_en'], $data['title_ru'],
            $data['description_ro'], $data['description_en'], $data['description_ru'],
            $data['meta_title_ro'] ?? null, $data['meta_title_en'] ?? null, $data['meta_title_ru'] ?? null,
            $data['meta_desc_ro'] ?? null, $data['meta_desc_en'] ?? null, $data['meta_desc_ru'] ?? null,
            $data['github_link'] ?: null, $data['website_link'] ?: null,
            (int) ($data['is_featured'] ?? 0), (int) ($data['is_active'] ?? 1), (int) ($data['sort_order'] ?? 0),
        ]);
        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, array $data): void
    {
        $stmt = $this->db->prepare(
            'UPDATE projects SET slug=?, title_ro=?, title_en=?, title_ru=?,
             description_ro=?, description_en=?, description_ru=?,
             meta_title_ro=?, meta_title_en=?, meta_title_ru=?,
             meta_desc_ro=?, meta_desc_en=?, meta_desc_ru=?,
             github_link=?, website_link=?, is_featured=?, is_active=?, sort_order=?
             WHERE id=?'
        );
        $stmt->execute([
            $data['slug'], $data['title_ro'], $data['title_en'], $data['title_ru'],
            $data['description_ro'], $data['description_en'], $data['description_ru'],
            $data['meta_title_ro'] ?? null, $data['meta_title_en'] ?? null, $data['meta_title_ru'] ?? null,
            $data['meta_desc_ro'] ?? null, $data['meta_desc_en'] ?? null, $data['meta_desc_ru'] ?? null,
            $data['github_link'] ?: null, $data['website_link'] ?: null,
            (int) ($data['is_featured'] ?? 0), (int) ($data['is_active'] ?? 1), (int) ($data['sort_order'] ?? 0),
            $id,
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM projects WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function syncTags(int $projectId, array $tags): void
    {
        $this->db->prepare('DELETE FROM project_tags WHERE project_id = ?')->execute([$projectId]);
        $stmt = $this->db->prepare('INSERT INTO project_tags (project_id, tag_name) VALUES (?, ?)');
        foreach ($tags as $tag) {
            $tag = trim($tag);
            if ($tag !== '') {
                $stmt->execute([$projectId, $tag]);
            }
        }
    }

    public function addImage(int $projectId, string $path, array $alt = [], bool $isCover = false, int $sort = 0): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO project_images (project_id, image_path, alt_ro, alt_en, alt_ru, is_cover, sort_order)
             VALUES (?,?,?,?,?,?,?)'
        );
        $stmt->execute([
            $projectId, $path,
            $alt['ro'] ?? null, $alt['en'] ?? null, $alt['ru'] ?? null,
            $isCover ? 1 : 0, $sort,
        ]);
        return (int) $this->db->lastInsertId();
    }

    public function deleteImage(int $imageId): ?string
    {
        $stmt = $this->db->prepare('SELECT image_path FROM project_images WHERE id = ?');
        $stmt->execute([$imageId]);
        $path = $stmt->fetchColumn();
        if ($path) {
            $this->db->prepare('DELETE FROM project_images WHERE id = ?')->execute([$imageId]);
        }
        return $path ?: null;
    }

    public function getAllTags(): array
    {
        $stmt = $this->db->query('SELECT DISTINCT tag_name FROM project_tags ORDER BY tag_name');
        return array_column($stmt->fetchAll(), 'tag_name');
    }
}

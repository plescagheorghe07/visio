-- Email open tracking (rulează o singură dată în phpMyAdmin)
CREATE TABLE IF NOT EXISTS `email_tracks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_id` varchar(64) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `recipient_email` varchar(255) DEFAULT NULL,
  `is_opened` tinyint(1) NOT NULL DEFAULT 0,
  `open_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `first_opened_at` timestamp NULL DEFAULT NULL,
  `last_opened_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email_tracks_log_id` (`log_id`),
  KEY `idx_email_tracks_opened` (`is_opened`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

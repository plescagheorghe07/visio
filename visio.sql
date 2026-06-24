-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql110.infinityfree.com
-- Generation Time: Jun 07, 2026 at 11:12 AM
-- Server version: 11.4.12-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_42056622_visio`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics_pageviews`
--

CREATE TABLE `analytics_pageviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` int(10) UNSIGNED DEFAULT NULL,
  `page_path` varchar(500) NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `lang` char(2) DEFAULT NULL,
  `referrer` varchar(500) DEFAULT NULL,
  `session_id` varchar(64) DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analytics_pageviews`
--

INSERT INTO `analytics_pageviews` (`id`, `visitor_id`, `page_path`, `page_title`, `lang`, `referrer`, `session_id`, `viewed_at`) VALUES
(1, 1, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:25:36'),
(2, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:27:16'),
(3, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:27:23'),
(4, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:27:32'),
(5, 2, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', NULL, '2411add3c591a42612fe5bd16f41918c', '2026-05-30 17:28:51'),
(6, 1, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:30:31'),
(7, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:31:02'),
(8, 1, '/ro/proiecte/dentadent', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:31:09'),
(9, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:32:13'),
(10, 1, '/index.php', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:32:14'),
(11, 1, '/project.php', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'http://localhost:3000/index.php?lang=ro', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:32:20'),
(12, 1, '/project.php', 'GuestMemories - Platformă evenimente SaaS | Visio', 'ro', 'http://localhost:3000/index.php?lang=ro', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:32:29'),
(13, 3, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', NULL, '54514d2961a43bca5586b790560a377c', '2026-05-30 17:32:41'),
(14, 1, '/index.php', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/project.php?lang=ro&slug=guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:32:44'),
(15, 1, '/index.php', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/project.php?lang=ro&slug=guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:33:10'),
(16, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/index.php?lang=ro', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:33:12'),
(17, 1, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:33:20'),
(18, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/portfolio', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:34:23'),
(19, 1, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:34:26'),
(20, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 17:34:28'),
(21, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:43:20'),
(22, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:44:46'),
(23, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:45:05'),
(24, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:45:20'),
(25, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:45:50'),
(26, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:46:04'),
(27, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:46:14'),
(28, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/dentadent', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:46:33'),
(29, 1, '/ro/proiecte/guestmemories', 'GuestMemories - Platformă evenimente SaaS | Visio', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:47:23'),
(30, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:47:28'),
(31, 1, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:47:47'),
(32, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:48:02'),
(33, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:48:12'),
(34, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:48:28'),
(35, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:48:59'),
(36, 1, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:49:05'),
(37, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:49:35'),
(38, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:50:25'),
(39, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:50:39'),
(40, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:51:12'),
(41, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:51:54'),
(42, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:52:01'),
(43, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:52:16'),
(44, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:52:44'),
(45, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:52:49'),
(46, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:52:56'),
(47, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:53:07'),
(48, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:54:22'),
(49, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:54:29'),
(50, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/guestmemories', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:54:38'),
(51, 1, '/ro/proiecte/guestmemories', 'GuestMemories - Platformă evenimente SaaS | Visio', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:54:47'),
(52, 1, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:58:14'),
(53, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:58:16'),
(54, 1, '/ro/proiecte/eduguide', 'EduGuide - Alege instituția educațională | Visio', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:58:22'),
(55, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/eduguide', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:58:33'),
(56, 1, '/ro/proiecte/mmds-ceiti', 'MMDS CEITI — Dezvoltare software educațional | Visio', 'ro', 'http://localhost:3000/ro/', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:58:48'),
(57, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 18:58:52'),
(58, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:01:29'),
(59, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:01:46'),
(60, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:01:56'),
(61, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:03:08'),
(62, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:04:43'),
(63, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:04:50'),
(64, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:04:58'),
(65, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:06:34'),
(66, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro/proiecte/mmds-ceiti', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:06:38'),
(67, 1, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:06:44'),
(68, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:06:46'),
(69, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:09:03'),
(70, 1, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://localhost:3000/ro', 'f16d65734c73bae6e54d186e56f984a4', '2026-05-30 19:14:37'),
(71, 4, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/', '31ea0719f61a266b7bf9395d9dffcfb0', '2026-05-30 19:23:34'),
(72, 5, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'https://visio.page.gd/ro/proiecte/dentadent', '445cab238bf64288ee424d426b092179', '2026-05-30 19:23:49'),
(73, 6, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro', 'bad6363611808c7d76dc0e23575e926d', '2026-05-30 19:24:32'),
(74, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:25:05'),
(75, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:25:53'),
(76, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:25:55'),
(77, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:25:58'),
(78, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:25:59'),
(79, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:26:00'),
(80, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:26:01'),
(81, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:26:01'),
(82, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:26:22'),
(83, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:26:27'),
(84, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:28:26'),
(85, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:28:28'),
(86, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:28:28'),
(87, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:28:29'),
(88, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:28:30'),
(89, 8, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/', 'b852e12b4d1d26d678ff56fa95e24717', '2026-05-30 19:29:11'),
(90, 9, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'https://visio.page.gd/ro/proiecte/dentadent', '68b3c6454e4a9060d8643d1301fec923', '2026-05-30 19:29:15'),
(91, 10, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'https://visio.page.gd/ro/proiecte/dentadent', '46963222272d3092826ee57d9a4ac968', '2026-05-30 19:29:26'),
(92, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:30:25'),
(93, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:36:00'),
(94, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:36:43'),
(95, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:36:55'),
(96, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:37:08'),
(97, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:37:17'),
(98, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:37:18'),
(99, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:37:38'),
(100, 7, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:37:46'),
(101, 7, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:38:52'),
(102, 7, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:39:30'),
(103, 7, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:39:53'),
(104, 7, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:40:37'),
(105, 7, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'https://visio.page.gd/ro/?lang=ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:40:47'),
(106, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/proiecte/portfolio', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:40:49'),
(107, 7, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'https://visio.page.gd/ro/', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 19:40:56'),
(108, 11, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', 'ce3ac5e5f2407341aabdc080a9330092', '2026-05-30 19:41:44'),
(109, 12, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'c93b1cf903bc912d16ba3960a646396f', '2026-05-30 19:55:06'),
(110, 13, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'c61cd7342025572b416b72248c69dd35', '2026-05-30 19:55:06'),
(111, 14, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'fda21ba5e60b7734d63961b95848d490', '2026-05-30 19:55:06'),
(112, 12, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '4a36298f452fa4307faba4355e4f59b3', '2026-05-30 19:55:06'),
(113, 12, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '3c5668a99bce0c1c46ae4b6cdbed1bc5', '2026-05-30 19:56:07'),
(114, 13, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'e745587a0cc3ced5457a9c9d7abaff08', '2026-05-30 19:56:07'),
(115, 15, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro', '279b51b1dca3a52743ff025e8516dce9', '2026-05-30 19:56:15'),
(116, 14, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6a0f2b94392f640f78a482b7b09618d4', '2026-05-30 19:57:15'),
(117, 15, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '279b51b1dca3a52743ff025e8516dce9', '2026-05-30 19:57:37'),
(118, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:00:20'),
(119, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:03:18'),
(120, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:04:25'),
(121, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:04:34'),
(122, 16, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '64397a3f2312a74e9894dfe677b60a71', '2026-05-30 20:05:40'),
(123, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:07:56'),
(124, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:08:57'),
(125, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:09:11'),
(126, 7, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:09:22'),
(127, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:10:56'),
(128, 7, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:17:19'),
(129, 7, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'https://visio.page.gd/ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:21:57'),
(130, 7, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'https://visio.page.gd/ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:22:01'),
(131, 7, '/ro/proiecte/eduguide', 'EduGuide - Alege instituția educațională | Visio', 'ro', 'https://visio.page.gd/ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:22:05'),
(132, 7, '/ro/proiecte/eduguide', 'EduGuide - Alege instituția educațională | Visio', 'ro', 'https://visio.page.gd/ro', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:22:13'),
(133, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/proiecte/eduguide', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:22:22'),
(134, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/proiecte/eduguide', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-30 20:22:28'),
(135, 17, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '327c2faa499e19225324bdc107e19681', '2026-05-30 21:38:31'),
(136, 18, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'eeb5ca2416dbd298191025ea97a7a38d', '2026-05-30 21:39:03'),
(137, 19, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '203d2c9393b24cc88e0c2da3d7b946d1', '2026-05-30 21:39:05'),
(138, 20, '/ro/proiecte/eduguide', 'EduGuide - Alege instituția educațională | Visio', 'ro', NULL, '8e4ee17d25d858aa574a4b0145a802aa', '2026-05-31 00:29:39'),
(139, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-31 07:01:46'),
(140, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-31 07:02:13'),
(141, 7, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'https://visio.page.gd/ro/', '6ba23fd4fab1c9779cad54fef8129da8', '2026-05-31 07:02:42'),
(142, 21, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 08:19:23'),
(143, 21, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 08:20:47'),
(144, 21, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 08:20:48'),
(145, 21, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 08:59:36'),
(146, 21, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 08:59:42'),
(147, 21, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 08:59:47'),
(148, 21, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'https://visio.page.gd/ro/', '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 08:59:53'),
(149, 21, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/proiecte/dentadent', '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 08:59:58'),
(150, 22, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'a7df622b9e23eab9b37c1de20a0807df', '2026-05-31 12:05:16'),
(151, 23, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', '2d79a25527b1c1f82337edb740af5637', '2026-05-31 13:23:57'),
(152, 23, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '2d79a25527b1c1f82337edb740af5637', '2026-05-31 13:33:46'),
(153, 23, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://127.0.0.1:8000/', '2d79a25527b1c1f82337edb740af5637', '2026-05-31 13:51:32'),
(154, 21, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'https://visio.page.gd/ro/', '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 14:54:17'),
(155, 21, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/proiecte/dentadent', '8f55b1360c5b730a777f82271f1be7a0', '2026-05-31 14:54:21'),
(156, 23, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://web.telegram.org/', '2d79a25527b1c1f82337edb740af5637', '2026-05-31 14:58:02'),
(157, 24, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '7f4f90ebb750a20873201905d9ec3e87', '2026-06-01 05:55:28'),
(158, 7, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', '72e4f8a29fe011d44ab958924def352d', '2026-06-01 07:35:47'),
(159, 7, '/ro/proiecte/eduguide', 'EduGuide - Alege instituția educațională | Visio', 'ro', 'https://visio.page.gd/?i=1', '72e4f8a29fe011d44ab958924def352d', '2026-06-01 07:35:53'),
(160, 7, '/ro/proiecte/dentadent', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'ro', 'https://visio.page.gd/?i=1', '72e4f8a29fe011d44ab958924def352d', '2026-06-01 07:35:56'),
(161, 7, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '72e4f8a29fe011d44ab958924def352d', '2026-06-01 07:39:38'),
(162, 25, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'e36af0376e811c1a29a2d5a528025f64', '2026-06-02 10:07:05'),
(163, 25, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', 'e36af0376e811c1a29a2d5a528025f64', '2026-06-02 10:07:07'),
(164, 25, '/ro/proiecte/coffeshop-exam', 'Proiect C# WinForms: Gestiune Comenzi Cafenea (Bilet 30) - Pleșca Gheorghe', 'ro', 'https://visio.page.gd/ro/', 'e36af0376e811c1a29a2d5a528025f64', '2026-06-02 10:07:14'),
(165, 25, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/proiecte/coffeshop-exam', 'e36af0376e811c1a29a2d5a528025f64', '2026-06-02 10:07:22'),
(166, 25, '/ro/proiecte/coffeshop-exam', 'Proiect C# WinForms: Gestiune Comenzi Cafenea (Bilet 30) - Pleșca Gheorghe', 'ro', 'https://visio.page.gd/ro/', 'e36af0376e811c1a29a2d5a528025f64', '2026-06-02 10:07:33'),
(167, 25, '/ro/proiecte/coffeshop-exam', 'Proiect C# WinForms: Gestiune Comenzi Cafenea (Bilet 30) - Pleșca Gheorghe', 'ro', NULL, 'e36af0376e811c1a29a2d5a528025f64', '2026-06-02 10:08:32'),
(168, 25, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/proiecte/coffeshop-exam', 'e36af0376e811c1a29a2d5a528025f64', '2026-06-02 10:08:43'),
(169, 24, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '67331c1f1e4c567a23b699b8adf83983', '2026-06-02 14:05:04'),
(170, 22, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'da83fcbe31e55d0542d365ac21c3f259', '2026-06-05 22:25:40'),
(171, 23, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '251df4b9bb6408faa3342890ce7295ac', '2026-06-06 11:59:14'),
(172, 26, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '65a871f2a63a82021a95fd097a8f904c', '2026-06-06 12:09:59'),
(173, 27, '/Visio/', 'meta_title', 'ro', NULL, '3acb70a0661dee58634980aba124094f', '2026-06-06 12:48:38'),
(174, 27, '/', 'meta_title', 'ro', NULL, '251df4b9bb6408faa3342890ce7295ac', '2026-06-06 12:50:03'),
(175, 27, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '251df4b9bb6408faa3342890ce7295ac', '2026-06-06 12:51:16'),
(176, 27, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '251df4b9bb6408faa3342890ce7295ac', '2026-06-06 12:51:39'),
(177, 27, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '251df4b9bb6408faa3342890ce7295ac', '2026-06-06 12:53:48'),
(178, 27, '/en/', 'Visio - SaaS Software Agency | Custom Platform Development Moldova', 'en', 'https://visio.page.gd/', '251df4b9bb6408faa3342890ce7295ac', '2026-06-06 12:53:51'),
(179, 27, '/ru/', 'Visio - SaaS агентство | Разработка платформ на заказ Молдова', 'ru', 'https://visio.page.gd/en/', '251df4b9bb6408faa3342890ce7295ac', '2026-06-06 12:53:52'),
(180, 27, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ru/', '251df4b9bb6408faa3342890ce7295ac', '2026-06-06 12:53:59'),
(181, 27, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', '3af5fff4b31f87b22ee8ba1054579d08', '2026-06-06 13:02:14'),
(182, 28, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro', 'a992aee198a4341a6d04723f63a31f25', '2026-06-06 13:19:53'),
(183, 28, '/ru/', 'Visio - SaaS агентство | Разработка платформ на заказ Молдова', 'ru', 'https://visio.page.gd/ro?i=1', 'a992aee198a4341a6d04723f63a31f25', '2026-06-06 13:19:58'),
(184, 29, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro', '1aa711f6e8bd84ab27734c3fd629d464', '2026-06-06 13:24:03'),
(185, 29, '/ro/proiecte/coffeshop-exam', 'Proiect C# WinForms: Gestiune Comenzi Cafenea (Bilet 30) - Pleșca Gheorghe', 'ro', 'https://visio.page.gd/ro?i=1', '1aa711f6e8bd84ab27734c3fd629d464', '2026-06-06 13:24:31'),
(186, 29, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro', '1aa711f6e8bd84ab27734c3fd629d464', '2026-06-06 13:24:45'),
(187, 30, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro', '1aa711f6e8bd84ab27734c3fd629d464', '2026-06-06 15:40:01'),
(188, 31, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://web.telegram.org/', '251df4b9bb6408faa3342890ce7295ac', '2026-06-06 17:06:39'),
(189, 22, '/ru/', 'Visio - SaaS агентство | Разработка платформ на заказ Молдова', 'ru', NULL, '71d398f60ef33afa515d58155996cee7', '2026-06-06 23:03:10'),
(190, 32, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/', '1aa711f6e8bd84ab27734c3fd629d464', '2026-06-07 09:24:56'),
(191, 33, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:09:24'),
(192, 33, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:11:56'),
(193, 33, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:12:12'),
(194, 33, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:12:14'),
(195, 33, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:18:51'),
(196, 33, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:18:53'),
(197, 33, '/ro/proiecte/portfolio', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'ro', 'http://visio.md/', '251df4b9bb6408faa3342890ce7295ac', '2026-06-07 10:19:00'),
(198, 33, '/ro/proiecte/guestmemories', 'GuestMemories - Platformă evenimente SaaS | Visio', 'ro', 'http://visio.md/', '251df4b9bb6408faa3342890ce7295ac', '2026-06-07 10:19:06'),
(199, 33, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/proiecte/guestmemories', '251df4b9bb6408faa3342890ce7295ac', '2026-06-07 10:19:08'),
(200, 33, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/', '251df4b9bb6408faa3342890ce7295ac', '2026-06-07 10:19:12'),
(201, 33, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/proiecte/guestmemories', '251df4b9bb6408faa3342890ce7295ac', '2026-06-07 10:19:13'),
(202, 33, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:19:16'),
(203, 33, '/en', 'Visio - SaaS Software Agency | Custom Platform Development Moldova', 'en', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:19:19'),
(204, 33, '/ru/', 'Visio - SaaS агентство | Разработка платформ на заказ Молдова', 'ru', 'http://visio.md/', '251df4b9bb6408faa3342890ce7295ac', '2026-06-07 10:19:31'),
(205, 33, '/en', 'Visio - SaaS Software Agency | Custom Platform Development Moldova', 'en', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:19:39'),
(206, 33, '/ru', 'Visio - SaaS агентство | Разработка платформ на заказ Молдова', 'ru', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:19:42'),
(207, 33, '/', 'Visio - SaaS агентство | Разработка платформ на заказ Молдова', 'ru', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:20:42'),
(208, 33, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', '251df4b9bb6408faa3342890ce7295ac', '2026-06-07 10:20:46'),
(209, 33, '/', 'Visio - SaaS агентство | Разработка платформ на заказ Молдова', 'ru', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:20:59'),
(210, 34, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', 'de54645ba3ee06261bb7ef9efeecd31f', '2026-06-07 10:21:03'),
(211, 32, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', 'fb1631b1d6e6ddd9e1a19a4da93cec52', '2026-06-07 10:23:05'),
(212, 32, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '1aa711f6e8bd84ab27734c3fd629d464', '2026-06-07 10:23:12'),
(213, 32, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'fb1631b1d6e6ddd9e1a19a4da93cec52', '2026-06-07 10:23:13'),
(214, 35, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', '920d7d2d770833a9ff7a88eb3a48a689', '2026-06-07 10:25:53'),
(215, 33, '/', 'Visio - SaaS агентство | Разработка платформ на заказ Молдова', 'ru', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:31:10'),
(216, 33, '/', 'Visio - SaaS агентство | Разработка платформ на заказ Молдова', 'ru', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:31:17'),
(217, 33, '/ro', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 10:31:24'),
(218, 36, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', '2580d31558c2d8b223ca2f1da7c365c1', '2026-06-07 10:55:00'),
(219, 36, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '2580d31558c2d8b223ca2f1da7c365c1', '2026-06-07 10:55:01'),
(220, 37, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', '601c20791dc31c8ceb510ccd37a62f5c', '2026-06-07 10:55:07'),
(221, 37, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '601c20791dc31c8ceb510ccd37a62f5c', '2026-06-07 10:55:07'),
(222, 38, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', 'de64f7ccde7e673cf78c9d2bf473ea52', '2026-06-07 10:55:12'),
(223, 38, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'de64f7ccde7e673cf78c9d2bf473ea52', '2026-06-07 10:55:13'),
(224, 39, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', 'c9c464d2427c6a1ed596a4ef5a91b149', '2026-06-07 11:02:46'),
(225, 39, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'c9c464d2427c6a1ed596a4ef5a91b149', '2026-06-07 11:02:47'),
(226, 40, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', 'd9367024dc0239c9c7bb84a6df45f46c', '2026-06-07 11:02:53'),
(227, 40, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'd9367024dc0239c9c7bb84a6df45f46c', '2026-06-07 11:02:54'),
(228, 41, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', '1481a93b471caf3ae1e7618a91aee638', '2026-06-07 11:03:00'),
(229, 41, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '1481a93b471caf3ae1e7618a91aee638', '2026-06-07 11:03:01'),
(230, 42, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'e417db787494282d9687404349fee048', '2026-06-07 11:03:05'),
(231, 43, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'ce531ccbdb0f6af7f0c6ac173ff8fdad', '2026-06-07 11:03:54'),
(232, 44, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', 'eb5235c230308b93a4ae9cd10fdef450', '2026-06-07 11:53:50'),
(233, 33, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 11:59:28'),
(234, 33, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '05dcd33322a57a0c236e52607362852f', '2026-06-07 11:59:33'),
(235, 45, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', '06eeec2de2167ecdd5141ca8dc136f88', '2026-06-07 12:15:56'),
(236, 46, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', '5c4fdfe21689f528b1f8f775222ee711', '2026-06-07 12:16:04'),
(237, 47, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', 'f32d6ca49cdfbfae4950b542c21c0909', '2026-06-07 13:22:07'),
(238, 21, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', 'bd89b68a32110d7a184b80db23c5f081', '2026-06-07 13:33:56'),
(239, 21, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'bd89b68a32110d7a184b80db23c5f081', '2026-06-07 13:35:04'),
(240, 21, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'bd89b68a32110d7a184b80db23c5f081', '2026-06-07 13:35:11'),
(241, 21, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', 'dda0de4ebfd9bb37569da763b4e9d40a', '2026-06-07 13:35:20'),
(242, 21, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'bd89b68a32110d7a184b80db23c5f081', '2026-06-07 13:35:23'),
(243, 21, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', 'dda0de4ebfd9bb37569da763b4e9d40a', '2026-06-07 13:35:27'),
(244, 21, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'bd89b68a32110d7a184b80db23c5f081', '2026-06-07 13:35:39'),
(245, 21, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'bd89b68a32110d7a184b80db23c5f081', '2026-06-07 13:35:43'),
(246, 48, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', '7ce1c240f770fa9bc7e5816fa74e33ef', '2026-06-07 13:39:42'),
(247, 49, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', '87ccd97e2b41743a77066415a0e0bbd4', '2026-06-07 13:40:27'),
(248, 50, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', '66399f26ca6a21a9b3abe00c82daf34e', '2026-06-07 13:46:16'),
(249, 32, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, 'fb1631b1d6e6ddd9e1a19a4da93cec52', '2026-06-07 13:49:12'),
(250, 51, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', '2e7fa8ae25be88d5cfeb461d74a78db4', '2026-06-07 14:01:49'),
(251, 51, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '199aa9965952795e1e42569c858950b6', '2026-06-07 14:01:50'),
(252, 21, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'http://visio.md/', 'bd89b68a32110d7a184b80db23c5f081', '2026-06-07 14:03:03'),
(253, 52, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.md/', '7e934bc44681f98ca8594a10a0f5acfd', '2026-06-07 14:03:14'),
(254, 52, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/', '41d77ae241eb7e096453c9360da61f27', '2026-06-07 14:03:22'),
(255, 52, '/ro/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', 'https://visio.page.gd/ro/?i=1', '41d77ae241eb7e096453c9360da61f27', '2026-06-07 14:03:25'),
(256, 52, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '41d77ae241eb7e096453c9360da61f27', '2026-06-07 15:10:44'),
(257, 52, '/', 'Visio - Agenție Software SaaS | Dezvoltare platforme la comandă Moldova', 'ro', NULL, '41d77ae241eb7e096453c9360da61f27', '2026-06-07 15:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `analytics_visitors`
--

CREATE TABLE `analytics_visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `visitor_hash` char(64) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `country` varchar(80) DEFAULT NULL,
  `city` varchar(120) DEFAULT NULL,
  `region` varchar(120) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `first_visit` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_visit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visit_count` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analytics_visitors`
--

INSERT INTO `analytics_visitors` (`id`, `visitor_hash`, `ip_address`, `country`, `city`, `region`, `user_agent`, `first_visit`, `last_visit`, `visit_count`) VALUES
(1, 'fdc389615bfaf0dfd8b4b8d6d6660276e3055d1f45e199b88c11a6072d92b474', '127.0.0.1', 'Local', 'Development', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 OPR/131.0.0.0', '2026-05-30 17:25:36', '2026-05-30 19:14:37', 68),
(2, '783be134535654a8b1e896bcc14b3d3716d0f1aff7b9ed8d2468408c4cfb76bf', '127.0.0.1', 'Local', 'Development', '', 'curl/8.13.0', '2026-05-30 17:28:51', '2026-05-30 17:28:51', 1),
(3, '39b0dddacba4d594a4f764d6f9dac84caa7e0d92c0d3e65015ebfde5a337f70a', '::1', NULL, NULL, NULL, 'curl/8.13.0', '2026-05-30 17:32:41', '2026-05-30 17:32:41', 1),
(4, '1e946c1e20fd3cee4a18c5a9fb5b65951e185fd624a12e383cc8132643be3428', '64.144.219.182', 'United States', 'Chicago', 'Illinois', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.7258.5 Safari/537.36', '2026-05-30 19:23:34', '2026-05-30 19:23:34', 1),
(5, '134c36e614e07207935b2b5e544b0129b715eb8b70346273b9d62908e5d19f56', '108.165.94.22', 'United States', 'Atlanta', 'Georgia', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.7258.5 Safari/537.36', '2026-05-30 19:23:49', '2026-05-30 19:23:49', 1),
(6, 'aa981538e8db03392b3b5f5bc7d3d54476034a109e9fb31ce5a120488d104ff1', '155.254.59.241', 'Netherlands', 'Amsterdam', 'North Holland', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.7258.5 Safari/537.36', '2026-05-30 19:24:32', '2026-05-30 19:24:32', 1),
(7, 'bb7a9a0767143d0986323f145ec2c02b056823b5434170ac8ca2897d9784f227', '87.255.80.41', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 OPR/131.0.0.0', '2026-05-30 19:25:05', '2026-06-01 07:39:38', 54),
(8, '8a201825331197e543fd4ace3497e1503d070f9e9106ebde379d08128ed71cfd', '104.194.218.111', 'Spain', 'Madrid', 'Madrid', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.7258.5 Safari/537.36', '2026-05-30 19:29:11', '2026-05-30 19:29:11', 1),
(9, '2a29b0d9387240e5d0ee05837f5dc3ac259cbdb12774bf31eef1c3d5aad103f5', '147.136.81.116', 'India', 'New Delhi', 'National Capital Territory of Delhi', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.7258.5 Safari/537.36', '2026-05-30 19:29:15', '2026-05-30 19:29:15', 1),
(10, '388e4fb110a9009291da777ba1d56debccdff43405cf264ed56edd1fb276d2ee', '207.199.188.31', 'United States', 'Chicago', 'Illinois', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.7258.5 Safari/537.36', '2026-05-30 19:29:26', '2026-05-30 19:29:26', 1),
(11, 'd73004d505df56b55b86fb317d42536c16b1e7ac5d473f30550d72edcaf94987', '87.255.80.41', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/23C55 Safari/604.1', '2026-05-30 19:41:44', '2026-05-30 19:41:44', 1),
(12, '868f76fbf02145e6922726a487f893677b0f53390447502b21aef8c9c787c48a', '66.249.93.228', 'United States', 'Mountain View', 'California', 'Mozilla/5.0 (compatible; Google-Site-Verification/1.0)', '2026-05-30 19:55:06', '2026-05-30 19:56:07', 3),
(13, 'c7929805ba2f50c7f38c28734f0d90fb9b14940e0b770f3c6b72a8e5278d82ae', '66.249.93.227', 'United States', 'Mountain View', 'California', 'Mozilla/5.0 (compatible; Google-Site-Verification/1.0)', '2026-05-30 19:55:06', '2026-05-30 19:56:07', 2),
(14, '8eb6c01761df999f398d2181c6801f5d1dc4e86f734d6d9892f696c2255c3624', '66.249.93.226', 'United States', 'Mountain View', 'California', 'Mozilla/5.0 (compatible; Google-Site-Verification/1.0)', '2026-05-30 19:55:06', '2026-05-30 19:57:15', 2),
(15, 'f9bcdfa140efd9da2340c633e9af07811e095aa1c6f41230bc66c02628e4bad4', '94.139.154.167', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', '2026-05-30 19:56:15', '2026-05-30 19:57:37', 2),
(16, '416dbaa5c9f48b2e26e022ca0945cf850a90254e24e3da8ddb18845216355ed0', '157.254.125.88', 'United States', 'New York', 'New York', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2026-05-30 20:05:40', '2026-05-30 20:05:40', 1),
(17, '387dd3a1f46a55d08a0587306b4ca8a3d87e2c2671f5de44bd7d580713b01a92', '66.249.74.160', 'United States', 'Seattle', 'Washington', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.7778.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2026-05-30 21:38:31', '2026-05-30 21:38:31', 1),
(18, '9b3966ff23b260a1ae5cb257fb66dea13052c2e921f233909f72a1b30ae6d394', '66.249.74.168', 'United States', 'Seattle', 'Washington', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2026-05-30 21:39:03', '2026-05-30 21:39:03', 1),
(19, '9d23f2a962d0bbad9bc7beaa8bed4e9d97bddeb751a70c24b2bf51fefd808f64', '66.249.74.168', 'United States', 'Seattle', 'Washington', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2026-05-30 21:39:05', '2026-05-30 21:39:05', 1),
(20, '80845d576cca1a523883d6d1a20f8d26c579c022859c108786785ffb33cd2aa3', '66.249.74.160', 'United States', 'Seattle', 'Washington', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2026-05-31 00:29:39', '2026-05-31 00:29:39', 1),
(21, 'eeb6cce2f619b6cfb16af3bd55675981ea5adb24d9e30fa792c79be22ed208c3', '89.28.43.137', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2026-05-31 08:19:23', '2026-06-07 14:03:03', 19),
(22, 'c556f0cd039450a45b30ee176612706f7a787319192b7679a4b6a4c7d147eb1c', '66.249.74.168', 'United States', 'Seattle', 'Washington', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.7778.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2026-05-31 12:05:16', '2026-06-06 23:03:10', 3),
(23, '82a417a94a798d287a5a19298bfbe01e18d73c7f1edf7f1293f93aa52697d0b3', '89.28.43.137', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-05-31 13:23:57', '2026-06-06 11:59:14', 5),
(24, '0fa123f22712ae3613021d7ca73f384ca335fd56c8e348c6c8004e40fe60008f', '66.249.74.169', 'United States', 'Seattle', 'Washington', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.7778.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2026-06-01 05:55:28', '2026-06-02 14:05:04', 2),
(25, 'c219720dbe678fc018a02dbe1a86559b6a5cda0fe722732b0e3b54cefec72c17', '37.233.13.45', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-02 10:07:05', '2026-06-02 10:08:43', 7),
(26, '3e8670718a67850c34502c12bda95adcad23a51736f2acc599a829ab918765ae', '66.80.37.185', 'United States', 'Chicago', 'Illinois', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2026-06-06 12:09:59', '2026-06-06 12:09:59', 1),
(27, '30bbf0e9c4e776a1b50f84031aa509aed4eafeae09412dd05c073fa497e029af', '46.166.63.180', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-06 12:48:38', '2026-06-06 13:02:14', 9),
(28, 'ff98205fbf9cc5bd08817354ba273fde1f1e8ba3041f0bcfba20469836c83b31', '94.243.70.110', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-06-06 13:19:53', '2026-06-06 13:19:58', 2),
(29, 'c0d3adba341434b46dc90fa16eae4cd7683574d841a1149e1a461d9baa2770c8', '46.166.63.180', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-06-06 13:24:03', '2026-06-06 13:24:45', 3),
(30, '897fa6f65e35f76aa977fdf0c627a55912b80ca81303263a8260509325b27c7b', '87.255.80.41', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-06-06 15:40:01', '2026-06-06 15:40:01', 1),
(31, '5d53a2e3ba407cb2f4a6377d7f165797c05d7727448531d60f98b0cadcf551df', '87.255.80.41', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', '2026-06-06 17:06:39', '2026-06-06 17:06:39', 1),
(32, 'ab856f1e7630aab32cacf321f3854b31c1b21666e3cff316f4d3d4003f00fdd9', '89.28.43.137', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-06-07 09:24:56', '2026-06-07 13:49:12', 5),
(33, 'fc8b8222520c2991cb6f0ebaab48b672a400f8c7121a89524ceb949816f250ee', '89.28.43.137', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0', '2026-06-07 10:09:24', '2026-06-07 11:59:33', 24),
(34, '8c0b30fef92def2c3455894d24dd2d92aa043354909e80e0a4ad79b3ef5cb41b', '170.82.0.144', 'United States', 'Richmond', 'Virginia', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-07 10:21:03', '2026-06-07 10:21:03', 1),
(35, 'e7026e1c83ab254227e98f99a8d1e43a22ed29311c4797ee7d7f9ea5b05c8cb4', '44.227.127.2', 'United States', 'Portland', 'Oregon', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/142.0.0.0 Safari/537.36', '2026-06-07 10:25:53', '2026-06-07 10:25:53', 1),
(36, 'c1af40f3f41dde032c2e62fa993314d46fca6ddfc22982a7a14bb4c2b32710b8', '34.55.244.220', 'United States', 'Council Bluffs', 'Iowa', 'Mozilla/5.0 (SymbianOS/9.4; U; Series60/5.0 SonyEricssonP100/01; Profile/MIDP-2.1 Configuration/CLDC-1.1) AppleWebKit/525 (KHTML, like Gecko) Version/3.0 Safari/525', '2026-06-07 10:55:00', '2026-06-07 10:55:01', 2),
(37, '7bed7b6ab702017c04081fd1ee3c12781265526330b2e1e23d8d76cc6db35ed1', '34.55.244.220', 'United States', 'Council Bluffs', 'Iowa', 'Mozilla/5.0 (SymbianOS/9.1; U; en-us) AppleWebKit/413 (KHTML, like Gecko) Safari/413 es50', '2026-06-07 10:55:07', '2026-06-07 10:55:07', 2),
(38, '49e890b268e11a2ad6192ee62d50cc2eb14aeccf7269897210be54a53fa1a91f', '34.55.244.220', 'United States', 'Council Bluffs', 'Iowa', 'Mozilla/5.0 (Windows; U; Windows CE 5.1; rv:1.8.1a3) Gecko/20060610 Minimo/0.016', '2026-06-07 10:55:12', '2026-06-07 10:55:13', 2),
(39, 'da6687aeffdbc09e8e8971073f9f4f5b5e46d583d739c323eae6be8808226db4', '35.188.1.172', 'United States', 'Council Bluffs', 'Iowa', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11) AppleWebKit/601.1.56 (KHTML, like Gecko) Version/9.0 Safari/601.1.56', '2026-06-07 11:02:46', '2026-06-07 11:02:47', 2),
(40, '0acdb674cb37e04e44644f7e9463f3b2afc7161e29a2ac9986e786fab292154c', '35.188.1.172', 'United States', 'Council Bluffs', 'Iowa', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2859.0 Safari/537.36', '2026-06-07 11:02:53', '2026-06-07 11:02:54', 2),
(41, '3e6f2be19df4ab4c86e2465e8987311b0d681f4d64dd172e9990e04ce8d165fc', '35.188.1.172', 'United States', 'Council Bluffs', 'Iowa', 'Mozilla/5.0 (X11; FreeBSD amd64) AppleWebKit/537.4 (KHTML like Gecko) Chrome/22.0.1229.79 Safari/537.4', '2026-06-07 11:03:00', '2026-06-07 11:03:01', 2),
(42, 'fca1100f101372b5964c8c10e14fca07e9b1abdac4fb1770af00963ede4d24de', '136.116.48.71', 'United States', 'Council Bluffs', 'Iowa', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.91 Safari/537.36 Vivaldi/1.92.917.39', '2026-06-07 11:03:05', '2026-06-07 11:03:05', 1),
(43, '3020683a519539fe1b69ee8bc98e3881d48afb70e00ec97bae93373d7813ed33', '34.67.142.149', 'United States', 'Council Bluffs', 'Iowa', 'Mozilla/5.0 (X11; Linux 3.8-6.dmz.1-liquorix-686) KHTML/4.8.4 (like Gecko) Konqueror/4.8', '2026-06-07 11:03:54', '2026-06-07 11:03:54', 1),
(44, 'e87090c500e33e810b9fbf0ad132ca76cab904da89ab994123b83aa16f9b36b4', '69.91.132.191', 'United Kingdom', 'Leeds', 'England', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-06-07 11:53:50', '2026-06-07 11:53:50', 1),
(45, 'a1008af24219864fa90d429f43cd636f5eb79e50ea1680adb6e3f0a7446ec05a', '35.163.233.84', 'United States', 'Portland', 'Oregon', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.7827.53 Safari/537.36 Edge/18.19582', '2026-06-07 12:15:56', '2026-06-07 12:15:56', 1),
(46, 'b5e09f371d5a9b99e7b616c3cc8d90664d1d8f972c258716fa0374ebfd21e1e6', '35.163.233.84', 'United States', 'Portland', 'Oregon', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G965U Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.7827.53 Mobile Safari/537.36', '2026-06-07 12:16:04', '2026-06-07 12:16:04', 1),
(47, '61f99ccfc6280784387237ade54760bc5bfbdd5ba02fc0b3ce8abc4e9c2f93f5', '52.16.245.145', 'Ireland', 'Dublin', 'Leinster', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', '2026-06-07 13:22:07', '2026-06-07 13:22:07', 1),
(48, '07497daaf852c8e3e48463b3a7e0dbd862d2675979e1aa70dbc3343e174a38aa', '54.202.21.112', 'United States', 'Portland', 'Oregon', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.7827.53 Safari/537.36 Edge/18.19582', '2026-06-07 13:39:42', '2026-06-07 13:39:42', 1),
(49, '0879275e7fc1e2e09ad869256deb66f29af27cb6b09643be051c38eefcd2af11', '54.202.21.112', 'United States', 'Portland', 'Oregon', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Mobile/15E148 Safari/604.1', '2026-06-07 13:40:27', '2026-06-07 13:40:27', 1),
(50, '8247d1d912693c3790286e3a2b1b24c9622468f1f131eaadc263ae329983669b', '44.243.241.26', 'United States', 'Portland', 'Oregon', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0', '2026-06-07 13:46:16', '2026-06-07 13:46:16', 1),
(51, '8354d660f0ef685b5f7ea889a33cc4173d6a541d9187854714947ca154a21215', '98.86.237.181', 'United States', 'Ashburn', 'Virginia', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-06-07 14:01:49', '2026-06-07 14:01:50', 2),
(52, 'bac37a247a31586a5789dea079e299250f90f300ca453a65b8024df79108bd37', '89.28.43.137', 'Moldova', 'Chisinau', 'Chișinău Municipality', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Safari/605.1.15', '2026-06-07 14:03:14', '2026-06-07 15:11:32', 5);

-- --------------------------------------------------------

--
-- Table structure for table `email_tracks`
--

CREATE TABLE `email_tracks` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_id` varchar(64) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `recipient_email` varchar(255) DEFAULT NULL,
  `is_opened` tinyint(1) NOT NULL DEFAULT 0,
  `open_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `first_opened_at` timestamp NULL DEFAULT NULL,
  `last_opened_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `ip_address`, `user_agent`, `is_read`, `created_at`) VALUES
(2, 'Plesca Gheorghe', 'plescagheorghe07@gmail.com', NULL, 'Cooperare', 'Doresc sa cooperam impreuna! Am o afacere mica si doresc un website pentru el', '89.28.43.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 1, '2026-05-31 08:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(160) NOT NULL,
  `title_ro` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `description_ro` text NOT NULL,
  `description_en` text NOT NULL,
  `description_ru` text NOT NULL,
  `meta_title_ro` varchar(255) DEFAULT NULL,
  `meta_title_en` varchar(255) DEFAULT NULL,
  `meta_title_ru` varchar(255) DEFAULT NULL,
  `meta_desc_ro` varchar(320) DEFAULT NULL,
  `meta_desc_en` varchar(320) DEFAULT NULL,
  `meta_desc_ru` varchar(320) DEFAULT NULL,
  `github_link` varchar(500) DEFAULT NULL,
  `website_link` varchar(500) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `slug`, `title_ro`, `title_en`, `title_ru`, `description_ro`, `description_en`, `description_ru`, `meta_title_ro`, `meta_title_en`, `meta_title_ru`, `meta_desc_ro`, `meta_desc_en`, `meta_desc_ru`, `github_link`, `website_link`, `is_featured`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'dentadent', 'DentaDent - Platformă stomatologică', 'DentaDent - Dental Clinic Platform', 'DentaDent - Стоматологическая платформа', 'Platformă web modernă pentru clinică stomatologică: programări online, prezentare servicii, echipă medicală și contact rapid. Dezvoltată de echipa Visio sub coordonarea lui Pleșca Gheorghe.', 'Modern web platform for a dental clinic: online appointments, services showcase, medical team and fast contact. Built by Visio team led by Pleșca Gheorghe.', 'Современная веб-платформа для стоматологической клиники: онлайн-запись, услуги, команда врачей и быстрая связь. Разработано командой Visio под руководством Pleșca Gheorghe.', 'DentaDent — Dezvoltare web clinică stomatologică | Visio', 'DentaDent — Dental clinic web development | Visio', 'DentaDent — Разработка сайта стоматологии | Visio', 'Platformă stomatologică cu programări online, dezvoltată de agenția Visio — SaaS, PHP, design modern.', 'Dental platform with online booking, developed by Visio agency — SaaS, PHP, modern design.', 'Стоматологическая платформа с онлайн-записью от агентства Visio — SaaS, PHP, современный дизайн.', NULL, 'https://dentadent.freedev.app/ro/', 1, 1, 1, '2026-05-30 17:05:10', '2026-05-30 17:20:43'),
(2, 'portfolio', 'Portfolio Full Stack', 'Pleșca Gheorghe — Full Stack Portfolio', 'Pleșca Gheorghe — Full Stack портфолио', 'Site-portfolio personal pentru liderul echipei Visio: competențe Full Stack, proiecte, carieră și contact. Animații GSAP, temă light/dark, multilingv RO/EN.', 'Personal portfolio for Visio team leader: Full Stack skills, projects, career and contact. GSAP animations, light/dark theme, RO/EN multilingual.', 'Личное портфолио лидера Visio: Full Stack навыки, проекты, карьера и контакты. GSAP анимации, светлая/тёмная тема, RO/EN.', 'Portfolio Full Stack Pleșca Gheorghe | Visio', 'Full Stack Portfolio Pleșca Gheorghe | Visio', 'Full Stack портфолио Pleșca Gheorghe | Visio', 'Portfolio dezvoltator Full Stack — PHP, React, infrastructură scalabilă. Proiect Visio.', 'Full Stack developer portfolio — PHP, React, scalable infrastructure. Visio project.', 'Портфолио Full Stack разработчика — PHP, React, масштабируемая инфраструктура. Проект Visio.', NULL, 'https://plescagheorghe.vercel.app/ro', 1, 1, 2, '2026-05-30 17:05:10', '2026-05-30 17:19:34'),
(3, 'guestmemories', 'GuestMemories - Amintiri de la evenimente', 'GuestMemories - Event Memory Platform', 'GuestMemories - Платформа воспоминаний с мероприятий', 'Platformă SaaS pentru nunți și evenimente: upload poze/video de la oaspeți, albume tematice, felicitări, galerie live, cod QR personalizat și descărcare album complet.', 'SaaS platform for weddings and events: guest photo/video upload, themed albums, greetings, live gallery, custom QR code and full album download.', 'SaaS платформа для свадеб и мероприятий: загрузка фото/видео гостями, тематические альбомы, поздравления, live-галерея, QR-код и скачивание альбома.', 'GuestMemories - Platformă evenimente SaaS | Visio', 'GuestMemories - Event SaaS Platform | Visio', 'GuestMemories - SaaS платформа для мероприятий | Visio', 'GuestMemories: poze live, QR, albume tematice — dezvoltare SaaS de la Visio, Moldova.', 'GuestMemories: live photos, QR, themed albums — SaaS development by Visio, Moldova.', 'GuestMemories: live фото, QR, тематические альбомы — SaaS разработка Visio, Молдова.', NULL, 'https://guestmemories.md/ro', 1, 1, 3, '2026-05-30 17:05:10', '2026-05-30 17:22:00'),
(4, 'eduguide', 'EduGuide - Platformă educațională Moldova', 'EduGuide - Educational Platform Moldova', 'EduGuide - Образовательная платформа Молдовы', 'Platformă educațională națională: licee, colegii, universități, școli profesionale din Moldova. Căutare avansată, filtre, evaluări și comparare specializări.', 'National educational platform: high schools, colleges, universities, vocational schools in Moldova. Advanced search, filters, ratings and specialization comparison.', 'Национальная образовательная платформа: лицеи, колледжи, университеты, профессиональные школы Молдовы. Поиск, фильтры, рейтинги и сравнение специальностей.', 'EduGuide - Alege instituția educațională | Visio', 'EduGuide - Choose your educational institution | Visio', 'EduGuide - Выбор учебного заведения | Visio', 'EduGuide: 300+ instituții, 1000+ specializări — platformă edtech dezvoltată de Visio.', 'EduGuide: 300+ institutions, 1000+ specializations — edtech platform by Visio.', 'EduGuide: 300+ учреждений, 1000+ специальностей — edtech платформа от Visio.', NULL, 'https://eduguide.guestmemories.md', 1, 1, 4, '2026-05-30 17:05:10', '2026-05-30 18:56:38'),
(5, 'itmedialig', 'IT MediaLIG - Platforma ligii de fotbal CEITI', 'IT MediaLIG - CEITI Football League Platform', 'IT MediaLIG - Платформа футбольной лиги CEITI', 'Platformă media dedicată domeniului IT: articole, resurse și conținut pentru liga de fotbal a CEITI. Design responsive, performanță optimizată.', 'Media platform dedicated to the IT field: articles, resources, and content for the CEITI football league. Responsive design, optimized performance.', 'Медиа-платформа, посвященная IT-сфере: статьи, ресурсы и контент для футбольной лиги CEITI. Адаптивный дизайн, оптимизированная производительность.', 'IT MediaLIG — Platformă IT Moldova | Visio', 'IT MediaLIG — IT Platform Moldova | Visio', 'IT MediaLIG — IT платформа Молдовы | Visio', 'IT MediaLIG: conținut tech, articole și resurse — dezvoltare web Visio.', 'IT MediaLIG: tech content, articles and resources — Visio web development.', 'IT MediaLIG: tech контент, статьи и ресурсы — веб-разработка Visio.', NULL, 'https://itmedialig.vercel.app', 0, 1, 5, '2026-05-30 17:05:10', '2026-05-30 19:10:01'),
(6, 'mmds-ceiti', 'MMDS CEITI - Site de tip prezentare a unui proiect CEITI', 'MMDS CEITI - CEITI Project Presentation Website', 'MMDS CEITI - Сайт-презентация проекта CEITI', 'Site de tip prezentare a unui proiect CEITI: interfață de tip prezentare, liste si informatii generale despre proiect.', 'Presentation-style website for a CEITI project: showcase interface, lists, and general information about the project.', 'Сайт-презентация проекта CEITI: интерфейс для презентации, списки и общая информация о проекте.', 'MMDS CEITI — Dezvoltare software educațional | Visio', 'MMDS CEITI — Educational software development | Visio', 'MMDS CEITI — Разработка ПО для образования | Visio', 'MMDS CEITI: management date instituții educaționale — proiect enterprise Visio.', 'MMDS CEITI: educational institution data management — Visio enterprise project.', 'MMDS CEITI: управление данными учебных заведений — enterprise проект Visio.', NULL, 'https://mmds.ceiti.md', 0, 1, 6, '2026-05-30 17:05:10', '2026-05-30 19:08:17'),
(7, 'mediaelev-ceiti', 'MediaElev CEITI - Site de tip prezentare a unui proiect CEITI', 'MediaElev CEITI - CEITI Project Presentation Website', 'MediaElev CEITI - Сайт-презентация проекта CEITI', 'Platformă digitală pentru elevi CEITI: resurse educaționale, media și instrumente de colaborare într-un mediu modern și accesibil.', 'Presentation-style website for a CEITI project: showcase interface, lists, and general information about the project.', 'Сайт-презентация проекта CEITI: интерфейс для презентации, списки и общая информация о проекте.', 'MediaElev CEITI — Platformă elevi | Visio', 'MediaElev CEITI — Student Platform | Visio', 'MediaElev CEITI — Платформа для учеников | Visio', 'MediaElev CEITI: resurse digitale pentru elevi — dezvoltare web Visio.', 'MediaElev CEITI: digital resources for students — Visio web development.', 'MediaElev CEITI: цифровые ресурсы для учеников — веб-разработка Visio.', NULL, 'https://mediaelev.ceiti.md', 0, 1, 7, '2026-05-30 17:05:10', '2026-05-30 19:10:45'),
(8, 'ce-ceiti', 'CE-CEITI - Platforma de adminstrare a datelor electronice a consiliului elevilor', 'CE-CEITI - Student Council Electronic Data Management Platform', 'CE-CEITI - Платформа управления электронными данными студсовета', 'CE-CEITI - Platforma de adminstrare a datelor electronice a consiliului elevilor: elevi curenti, resurse si evenimente ale Consiliului Elevilor din centrului de excelență IT.', 'Electronic data management platform for the student council: current students, resources, and events for the Student Council of the IT Center of Excellence.', 'Платформа управления электронными данными студенческого совета: текущие студенты, ресурсы и мероприятия Студенческого совета Центра передового опыта в области IT.', 'CE-CEITI — Portal CEITI | Visio', 'CE-CEITI — CEITI Portal | Visio', 'CE-CEITI — Портал CEITI | Visio', 'CE-CEITI: portal instituțional educațional — proiect web Visio, PHP, design modern.', 'CE-CEITI: institutional educational portal — Visio web project, PHP, modern design.', 'CE-CEITI: институциональный образовательный портал — веб-проект Visio, PHP, современный дизайн.', NULL, 'https://ce-ceiti.vercel.app', 0, 1, 8, '2026-05-30 17:05:10', '2026-05-30 19:14:27'),
(9, 'coffeshop-exam', 'Aplicație de Gestiune Comenzi Cafenea - Examen Programare Vizuală (Biletul 30)', 'Cafe Order Management System - Windows Forms Exam Project (Ticket 30)', 'Система управления заказами в кафе – Экзаменационный проект WinForms (Билет 30)', 'O aplicație desktop de tip WinForms dezvoltată în C# (.NET Framework 4.7.2) pentru gestionarea și înregistrarea comenzilor dintr-o cafenea. Proiectul a fost realizat ca probă practică în cadrul examenului de Programare Vizuală la CEITI (Biletul 30). Aplicația integrează o interfață grafică intuitivă cu controale specifice (RadioButtons, CheckBoxes) și o bază de date SQL Server pentru stocarea, ștergerea și vizualizarea istoricului de comenzi într-un mod securizat și eficient.', 'A desktop WinForms application developed in C# (.NET Framework 4.7.2) designed to simulate and manage a cafe ordering system. Created as part of the practical exam for the Visual Programming course (Ticket 30), this project demonstrates UI/UX principles using native controls (RadioButtons, CheckBoxes) alongside a structured backend. It features full CRUD-like operations connected to a SQL Server database via an encapsulated DatabaseManager class, allowing users to save, delete, and view order history within a modal data grid.', 'Десктопное приложение Windows Forms, разработанное на языке C# (.NET Framework 4.7.2) для автоматизации и регистрации заказов в кафе. Проект выполнен в качестве практической части экзамена по Визуальному программированию (Билет 30). Программа сочетает в себе интуитивно понятный графический интерфейс (использование RadioButton, CheckBox) и интеграцию с базой данных SQL Server для надежного сохранения, удаления и просмотра истории заказов через модальное окно с компонентом DataGridView.', 'Proiect C# WinForms: Gestiune Comenzi Cafenea (Bilet 30) - Pleșca Gheorghe', 'C# WinForms Project: Cafe Order Management (Ticket 30) - Plesca Gheorghe', 'Проект C# WinForms: Управление заказами кафе (Билет 30) – Плешка Георгий', 'Explorează aplicația WinForms C# cu integrare SQL Server, dezvoltată de Pleșca Gheorghe ca proiect de examen. Include arhitectura bazei de date și managementul comenzilor.', 'Check out this C# WinForms desktop app with SQL Server integration by Plesca Gheorghe. Developed for the Visual Programming exam, featuring automated database setup.', 'Экзаменационный проект на C# WinForms и SQL Server от Плешка Георгия. Приложение для оформления заказов в кафе с сохранением истории в базу данных.', 'https://github.com/f3rdhvh/ExamenPV_PlescaGheorghe_Bilet30/tree/main', NULL, 0, 1, 9, '2026-06-02 10:05:29', '2026-06-02 10:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_ro` varchar(255) DEFAULT NULL,
  `alt_en` varchar(255) DEFAULT NULL,
  `alt_ru` varchar(255) DEFAULT NULL,
  `is_cover` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image_path`, `alt_ro`, `alt_en`, `alt_ru`, `is_cover`, `sort_order`, `created_at`) VALUES
(9, 2, 'uploads/projects/portfolio/img_6a1b1c3be239f6.26789350.png', 'Portfolio Full Stack', 'Pleșca Gheorghe — Full Stack Portfolio', 'Pleșca Gheorghe — Full Stack портфолио', 1, 0, '2026-05-30 17:19:55'),
(10, 1, 'uploads/projects/dentadent/img_6a1b1c90ba1d47.05669231.png', 'DentaDent - Platformă stomatologică', 'DentaDent - Dental Clinic Platform', 'DentaDent - Стоматологическая платформа', 1, 0, '2026-05-30 17:21:20'),
(11, 3, 'uploads/projects/guestmemories/img_6a1b1cce8f97c1.21296261.png', 'GuestMemories - Amintiri de la evenimente', 'GuestMemories - Event Memory Platform', 'GuestMemories - Платформа воспоминаний с мероприятий', 1, 0, '2026-05-30 17:22:22'),
(12, 3, 'uploads/projects/guestmemories/img_6a1b1ce821f561.22568612.png', 'GuestMemories - Amintiri de la evenimente', 'GuestMemories - Event Memory Platform', 'GuestMemories - Платформа воспоминаний с мероприятий', 0, 0, '2026-05-30 17:22:48'),
(13, 3, 'uploads/projects/guestmemories/img_6a1b1cece8cd95.47801769.png', 'GuestMemories - Amintiri de la evenimente', 'GuestMemories - Event Memory Platform', 'GuestMemories - Платформа воспоминаний с мероприятий', 0, 0, '2026-05-30 17:22:52'),
(14, 3, 'uploads/projects/guestmemories/img_6a1b1cfaa58881.91092405.png', 'GuestMemories - Amintiri de la evenimente', 'GuestMemories - Event Memory Platform', 'GuestMemories - Платформа воспоминаний с мероприятий', 0, 0, '2026-05-30 17:23:06'),
(15, 3, 'uploads/projects/guestmemories/img_6a1b1d1becb319.37878689.png', 'GuestMemories - Amintiri de la evenimente', 'GuestMemories - Event Memory Platform', 'GuestMemories - Платформа воспоминаний с мероприятий', 0, 0, '2026-05-30 17:23:39'),
(16, 3, 'uploads/projects/guestmemories/img_6a1b1d27ec05c0.14574942.png', 'GuestMemories - Amintiri de la evenimente', 'GuestMemories - Event Memory Platform', 'GuestMemories - Платформа воспоминаний с мероприятий', 0, 0, '2026-05-30 17:23:51'),
(17, 4, 'uploads/projects/eduguide/img_6a1b32fd178908.07508929.png', 'EduGuide - Platformă educațională Moldova', 'EduGuide - Educational Platform Moldova', 'EduGuide - Образовательная платформа Молдовы', 1, 0, '2026-05-30 18:57:01'),
(18, 4, 'uploads/projects/eduguide/img_6a1b3309816554.21270082.png', 'EduGuide - Platformă educațională Moldova', 'EduGuide - Educational Platform Moldova', 'EduGuide - Образовательная платформа Молдовы', 0, 0, '2026-05-30 18:57:13'),
(19, 4, 'uploads/projects/eduguide/img_6a1b332233bf05.58129138.png', 'EduGuide - Platformă educațională Moldova', 'EduGuide - Educational Platform Moldova', 'EduGuide - Образовательная платформа Молдовы', 0, 0, '2026-05-30 18:57:38'),
(20, 4, 'uploads/projects/eduguide/img_6a1b333db22434.75338317.png', 'EduGuide - Platformă educațională Moldova', 'EduGuide - Educational Platform Moldova', 'EduGuide - Образовательная платформа Молдовы', 0, 0, '2026-05-30 18:58:05'),
(21, 5, 'uploads/projects/itmedialig/img_6a1b3442992dc3.57703765.png', 'IT MediaLIG — Platforma ligii de fotbal CEITI', 'IT MediaLIG — CEITI Football League Platform', 'IT MediaLIG — Платформа футбольной лиги CEITI', 0, 0, '2026-05-30 19:02:26'),
(22, 5, 'uploads/projects/itmedialig/img_6a1b3452b55a56.52842896.png', 'IT MediaLIG — Platforma ligii de fotbal CEITI', 'IT MediaLIG — CEITI Football League Platform', 'IT MediaLIG — Платформа футбольной лиги CEITI', 0, 0, '2026-05-30 19:02:42'),
(23, 5, 'uploads/projects/itmedialig/img_6a1b34661ae624.72785580.png', 'IT MediaLIG — Platforma ligii de fotbal CEITI', 'IT MediaLIG — CEITI Football League Platform', 'IT MediaLIG — Платформа футбольной лиги CEITI', 0, 0, '2026-05-30 19:03:02'),
(24, 6, 'uploads/projects/mmds-ceiti/img_6a1b35b9072e32.09036520.png', 'MMDS CEITI - Site de tip prezentare a unui proiect CEITI', 'MMDS CEITI - CEITI Project Presentation Website', 'MMDS CEITI - Сайт-презентация проекта CEITI', 1, 0, '2026-05-30 19:08:41'),
(25, 6, 'uploads/projects/mmds-ceiti/img_6a1b35ccb6aff3.54038282.png', 'MMDS CEITI - Site de tip prezentare a unui proiect CEITI', 'MMDS CEITI - CEITI Project Presentation Website', 'MMDS CEITI - Сайт-презентация проекта CEITI', 0, 0, '2026-05-30 19:09:00'),
(26, 7, 'uploads/projects/mediaelev-ceiti/img_6a1b36552873e5.33693394.png', 'MediaElev CEITI - Site de tip prezentare a unui proiect CEITI', 'MediaElev CEITI - CEITI Project Presentation Website', 'MediaElev CEITI - Сайт-презентация проекта CEITI', 1, 0, '2026-05-30 19:11:17'),
(27, 7, 'uploads/projects/mediaelev-ceiti/img_6a1b3665c38802.73373807.png', 'MediaElev CEITI - Site de tip prezentare a unui proiect CEITI', 'MediaElev CEITI - CEITI Project Presentation Website', 'MediaElev CEITI - Сайт-презентация проекта CEITI', 0, 0, '2026-05-30 19:11:33'),
(28, 7, 'uploads/projects/mediaelev-ceiti/img_6a1b367396cc13.08418237.png', 'MediaElev CEITI - Site de tip prezentare a unui proiect CEITI', 'MediaElev CEITI - CEITI Project Presentation Website', 'MediaElev CEITI - Сайт-презентация проекта CEITI', 0, 0, '2026-05-30 19:11:47'),
(29, 7, 'uploads/projects/mediaelev-ceiti/img_6a1b3687ea7eb3.69561890.png', 'MediaElev CEITI - Site de tip prezentare a unui proiect CEITI', 'MediaElev CEITI - CEITI Project Presentation Website', 'MediaElev CEITI - Сайт-презентация проекта CEITI', 0, 0, '2026-05-30 19:12:07'),
(30, 8, 'uploads/projects/ce-ceiti/img_6a1b36aa0e1c81.44948526.png', 'CE-CEITI — Portal instituțional', 'CE-CEITI — Institutional Portal', 'CE-CEITI — Институциональный портал', 1, 0, '2026-05-30 19:12:42'),
(31, 9, 'uploads/projects/coffeshop-exam/img_6a1eab1a5917f5.67344804.png', 'Aplicație de Gestiune Comenzi Cafenea - Examen Programare Vizuală (Biletul 30)', 'Cafe Order Management System - Windows Forms Exam Project (Ticket 30)', 'Система управления заказами в кафе – Экзаменационный проект WinForms (Билет 30)', 1, 0, '2026-06-02 10:06:18'),
(32, 9, 'uploads/projects/coffeshop-exam/img_6a1eab1a5a5846.63952463.png', 'Aplicație de Gestiune Comenzi Cafenea - Examen Programare Vizuală (Biletul 30)', 'Cafe Order Management System - Windows Forms Exam Project (Ticket 30)', 'Система управления заказами в кафе – Экзаменационный проект WinForms (Билет 30)', 0, 1, '2026-06-02 10:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `project_tags`
--

CREATE TABLE `project_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `tag_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_tags`
--

INSERT INTO `project_tags` (`id`, `project_id`, `tag_name`) VALUES
(47, 2, 'GSAP'),
(48, 2, 'Next.js'),
(49, 2, 'React'),
(50, 2, 'Tailwind CSS'),
(51, 2, 'TypeScript'),
(56, 1, 'JavaScript'),
(57, 1, 'MySQL'),
(58, 1, 'PHP'),
(59, 1, 'Responsive Design'),
(96, 3, 'Cloud Storage'),
(97, 3, 'MySQL'),
(98, 3, 'PHP'),
(99, 3, 'QR Code'),
(100, 3, 'Real-time'),
(101, 3, 'SaaS'),
(127, 4, 'EdTech'),
(128, 4, 'Next.js'),
(129, 4, 'PostgreSQL'),
(130, 4, 'REST API'),
(131, 4, 'Search Engine'),
(168, 6, 'CSS'),
(169, 6, 'HTML'),
(170, 6, 'JS'),
(171, 6, 'Project presentation'),
(172, 5, 'CMS'),
(173, 5, 'Next.js'),
(174, 5, 'React'),
(175, 5, 'Vercel'),
(192, 7, 'LMS'),
(193, 7, 'Media Streaming'),
(194, 7, 'MySQL'),
(195, 7, 'PHP'),
(200, 8, 'Institutional Portal'),
(201, 8, 'Next.js'),
(202, 8, 'React'),
(203, 8, 'SEO'),
(213, 9, '.NET'),
(214, 9, 'TSQL'),
(215, 9, 'Windows Forms');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(120) NOT NULL DEFAULT 'Administrator',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `created_at`, `updated_at`) VALUES
(1, 'plescagheorghe07@gmail.com', '$2y$10$wePukxQjkdHGNJWQIo.NbuEzfu/k0WgbTtvvbWM9t4HI2IGuKMZ/e', 'Pleșca Gheorghe', '2026-05-30 17:05:09', '2026-05-30 17:05:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analytics_pageviews`
--
ALTER TABLE `analytics_pageviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pageviews_date` (`viewed_at`),
  ADD KEY `idx_pageviews_path` (`page_path`(191)),
  ADD KEY `idx_pageviews_visitor` (`visitor_id`);

--
-- Indexes for table `analytics_visitors`
--
ALTER TABLE `analytics_visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_visitor_hash` (`visitor_hash`),
  ADD KEY `idx_visitors_country` (`country`);

--
-- Indexes for table `email_tracks`
--
ALTER TABLE `email_tracks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email_tracks_log_id` (`log_id`),
  ADD KEY `idx_email_tracks_opened` (`is_opened`,`created_at`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_contact_read` (`is_read`,`created_at`),
  ADD KEY `idx_contact_email` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_projects_slug` (`slug`),
  ADD KEY `idx_projects_featured` (`is_featured`,`is_active`,`sort_order`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_project_images_project` (`project_id`,`sort_order`);

--
-- Indexes for table `project_tags`
--
ALTER TABLE `project_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_project_tags_project` (`project_id`),
  ADD KEY `idx_project_tags_name` (`tag_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_users_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analytics_pageviews`
--
ALTER TABLE `analytics_pageviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `analytics_visitors`
--
ALTER TABLE `analytics_visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `email_tracks`
--
ALTER TABLE `email_tracks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `project_tags`
--
ALTER TABLE `project_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analytics_pageviews`
--
ALTER TABLE `analytics_pageviews`
  ADD CONSTRAINT `fk_pageviews_visitor` FOREIGN KEY (`visitor_id`) REFERENCES `analytics_visitors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `fk_project_images_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_tags`
--
ALTER TABLE `project_tags`
  ADD CONSTRAINT `fk_project_tags_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

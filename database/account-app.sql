-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2025 at 02:10 AM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u509854057_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_image_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `created_by`, `document_name`, `doc_type`, `document_image_path`, `created_at`, `updated_at`) VALUES
(5, 8, 1, 'egg', 'aadhar_card', '/tmp/phpzDi3Bl', '2025-02-02 04:44:11', '2025-02-02 04:44:11'),
(6, 8, 1, 'egg111', 'rc_book', '/tmp/php1NeNnd', '2025-02-02 04:44:34', '2025-02-02 04:44:34'),
(7, 8, 1, 'egg555', 'rc_book', '/tmp/phphgZ9Gn', '2025-02-02 04:45:57', '2025-02-02 04:45:57'),
(8, 8, 1, 'sdfghnjm,', 'bank_statement', '/tmp/phpSvogGs', '2025-02-02 04:47:09', '2025-02-02 04:47:09'),
(9, 8, 1, 'egg555666', 'pan_card', '/tmp/phpYnN1vg', '2025-02-02 04:47:54', '2025-02-02 04:47:54'),
(10, 8, 1, 'egg555dfg', 'aadhar_card', 'images/20250202104249.png', '2025-02-02 05:12:49', '2025-02-02 05:12:49'),
(11, 8, 1, 'eggdfghjk', 'pan_card', 'images/20250202104347.png', '2025-02-02 05:13:47', '2025-02-02 05:13:47'),
(12, 8, 1, 'sdfgnm,./', 'aadhar_card', 'images/20250202104405.png', '2025-02-02 05:14:05', '2025-02-02 05:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'necessitatibus', 'At aut quis architecto explicabo.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(2, 'vero', 'A quae accusamus quos atque.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(3, 'ut', 'Voluptatem dicta quas placeat quidem animi tempora.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(4, 'rem', 'In dicta et facere adipisci.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(5, 'eaque', 'Tempore est magnam vitae adipisci.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(6, 'repudiandae', 'Aut ab delectus in voluptatem molestiae.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(7, 'maiores', 'Amet vero qui aut dolore omnis debitis voluptatem in.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(8, 'quibusdam', 'Dolorem quia aliquam optio voluptate.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(9, 'culpa', 'Autem autem error ipsam eaque error.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(10, 'sunt', 'Ut fuga voluptatem sed maxime eveniet repellendus.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(11, 'rerum', 'Iure deleniti placeat aspernatur velit illo.', '2025-01-29 20:40:06', '2025-01-29 20:40:06'),
(12, 'et', 'Similique dolorum voluptatum aut omnis eos.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(13, 'quia', 'Qui voluptatum placeat dolor omnis quibusdam mollitia temporibus repellendus.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(14, 'consequatur', 'Dignissimos accusantium eaque consequuntur doloremque expedita mollitia numquam voluptas.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(15, 'corrupti', 'Sint magni non consequuntur quo aliquam qui iste.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(16, 'aut', 'Eius officiis reiciendis in et et.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(17, 'praesentium', 'Rerum eligendi error sit similique.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(18, 'neque', 'Rerum et at cum dicta.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(19, 'odit', 'Nesciunt asperiores hic error exercitationem accusamus laudantium.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(20, 'totam', 'Expedita itaque consequatur architecto laudantium soluta dolor assumenda.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(21, 'a', 'Voluptas impedit expedita optio illum molestiae harum reiciendis nemo.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(22, 'non', 'Vitae veritatis delectus quam molestiae consequuntur asperiores.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(23, 'quo', 'In dicta possimus quia non.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(24, 'facere', 'Consequatur et ut quasi sint et.', '2025-01-29 20:40:07', '2025-01-29 20:40:07'),
(25, 'consequuntur', 'Eos saepe autem iste sint.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(26, 'modi', 'Vel fuga reprehenderit et quos.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(27, 'voluptatibus', 'Aperiam libero nemo commodi sint quaerat.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(28, 'saepe', 'Impedit sit ea in sed officia quis reiciendis.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(29, 'cumque', 'Aspernatur ut expedita recusandae perferendis.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(30, 'voluptatem', 'Voluptatem sequi optio inventore eum.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(31, 'earum', 'Et architecto quae dolor officiis officiis.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(32, 'soluta', 'Laborum reprehenderit sit id repellat vitae sequi.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(33, 'est', 'Excepturi et tenetur sed quas et ullam.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(34, 'asperiores', 'Quasi consequatur eum saepe nobis incidunt cumque.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(35, 'nostrum', 'Culpa nemo architecto eveniet quae rem ut veniam aut.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(36, 'inventore', 'Natus aut sit ut nemo.', '2025-01-29 20:40:08', '2025-01-29 20:40:08'),
(37, 'iste', 'Qui ex dolorem optio distinctio praesentium aliquam nam tempore.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(38, 'nihil', 'Reiciendis eaque iure illum sunt.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(39, 'perspiciatis', 'Officia facere temporibus dolor magni deserunt.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(40, 'ratione', 'Est omnis praesentium quaerat atque est non.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(41, 'eveniet', 'Cumque pariatur sapiente enim asperiores.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(42, 'distinctio', 'Sunt veritatis fuga in ut blanditiis eligendi.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(43, 'molestiae', 'Numquam aperiam assumenda ut dolor.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(44, 'velit', 'Totam quam recusandae doloribus soluta in beatae commodi.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(45, 'libero', 'Saepe non laborum laudantium autem hic natus.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(46, 'id', 'Quo magni consequatur mollitia molestiae.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(47, 'odio', 'Amet perferendis vitae aspernatur impedit sequi.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(48, 'vitae', 'Aut odit quia natus hic laudantium sed modi et.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(49, 'debitis', 'Cupiditate quis nihil architecto.', '2025-01-29 20:40:09', '2025-01-29 20:40:09'),
(50, 'natus', 'Repellat voluptatem molestiae minus ab quis ratione dolores.', '2025-01-29 20:40:09', '2025-01-29 20:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2025_01_20_163511_create_groups_table', 1),
(13, '2025_01_25_081304_create_documents_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('business','private','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'private',
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `father_full_name`, `dob`, `email`, `user_type`, `gst_number`, `role`, `password`, `created_at`, `updated_at`, `group_id`) VALUES
(1, 'admin', 'admin', 'admin', 'test', '1990-01-01', 'admin@admin.com', 'admin', NULL, 'user', '$2y$12$n/ZgMXe.XOoCKK/1gayJIuoALNM.ZOs28Nksc0Logp.ZokAfOY1xO', '2025-01-29 10:33:54', '2025-01-29 10:33:54', NULL),
(2, 'clemens.ledner', 'Brennon', 'Wyman', 'Schmidt', '1985-11-29', 'friesen.melba@example.net', 'private', NULL, 'user', '$2y$12$NV2yBdaDoTo2HZt.ZkuHVuwK31rhDmXPD/mKV.tBtkf8s7LPTTIf6', '2025-01-29 10:37:35', '2025-01-29 10:37:35', NULL),
(3, 'haskell37', 'Alessandro', 'McCullough', 'Barrows', '1981-06-04', 'fnader@example.com', 'private', NULL, 'user', '$2y$12$3/pUp.qej31A1Pr0PKUrcuUX7Fq890rVLOm38IkvdDGqJ.0TOAb.6', '2025-01-29 10:37:35', '2025-02-02 03:57:14', 21),
(4, 'cummings.tyrel', 'Krystel', 'Hintz', 'Bogisich', '1988-06-04', 'mya.stamm@example.net', 'private', NULL, 'user', '$2y$12$.rnod6zR6yyv9FvUd2dNSuURtUPCaVsQ2OvNSsUUUbIm4BGmM0Zke', '2025-01-29 10:37:35', '2025-02-02 03:58:52', 21),
(5, 'wjohns', 'Tyreek', 'Hane', 'Willms', '1988-12-02', 'ross90@example.net', 'private', NULL, 'user', '$2y$12$XCaZDwaORiZmhdBPdmClAOFinzwwju8F8X7JJZryDXAjZ2fOk.HjC', '2025-01-29 10:37:35', '2025-01-29 10:37:35', NULL),
(6, 'reynold96', 'Kitty', 'Aufderhar', 'Monahan', '1990-02-17', 'jaiden21@example.com', 'private', NULL, 'user', '$2y$12$wM2G7cqKznH.K8DywMJv3emIw2RVerq6FTz6r5l8QQkQ4.dvbVcg6', '2025-01-29 10:37:35', '2025-01-29 10:37:35', NULL),
(7, 'derick.carroll', 'Eino', 'Baumbach', 'Auer', '1988-08-10', 'tdaniel@example.net', 'private', NULL, 'user', '$2y$12$VI9n99R.Ov7U5sYCaWA/J.QkWH.F89h4Gq8BBan8htFOIwDuLtUgi', '2025-01-29 10:37:35', '2025-02-02 03:59:12', 34),
(8, 'ebuckridge', 'Aaliyah', 'Morar', 'Blanda', '1982-01-26', 'rrempel@example.net', 'private', NULL, 'user', '$2y$12$PBi0p/RiB3Ad7liL6xj9he6T00exuWKnFAXXyCT8eeTEIktuulMg.', '2025-01-29 10:37:35', '2025-02-02 03:59:12', 34),
(9, 'herman.tommie', 'Trevor', 'Hammes', 'Wilkinson', '1999-12-07', 'dubuque.jamar@example.org', 'private', NULL, 'user', '$2y$12$2jjSbeaxDl7ChYhGyFbjZu7Rz5Q86sYmJCbO09NI.si/UZfiS0n0y', '2025-01-29 10:37:35', '2025-02-02 03:59:12', 34),
(10, 'cortney.corwin', 'Gladyce', 'Lueilwitz', 'Littel', '1995-08-29', 'jhaag@example.com', 'private', NULL, 'user', '$2y$12$8joP6Bf3tfq66RMycu61XODppP71tNysGNree8ZlMrwVfeicc64JC', '2025-01-29 10:37:35', '2025-01-29 10:37:35', NULL),
(11, 'tkonopelski', 'Randi', 'Deckow', 'Harvey', '1981-08-10', 'candida28@example.org', 'private', NULL, 'user', '$2y$12$t.YqwVoBEGoyllDwDJYMIe2afj6t05owNL8fUeK3GIMIgs7JNqCLe', '2025-01-29 10:37:35', '2025-01-29 10:37:35', NULL),
(12, 'max96', 'Marc', 'Langosh', 'Wiegand', '1983-11-27', 'schiller.pat@example.com', 'private', NULL, 'user', '$2y$12$e5iI9SMhyYcx7rozkmCK0OcLiA70yJqKFPDk5BX1MXh8kdDAhT.l.', '2025-01-29 10:37:35', '2025-01-29 10:37:35', NULL),
(13, 'emclaughlin', 'Laury', 'Daugherty', 'Zulauf', '1979-10-26', 'braun.federico@example.net', 'private', NULL, 'user', '$2y$12$RmT5rltrgEiG4uhii34VvOhEMVxNAuhwuOxAanHmBBsVAec0/NnRa', '2025-01-29 10:37:35', '2025-01-29 10:37:35', NULL),
(14, 'garett.mann', 'Arely', 'McGlynn', 'Jones', '1989-06-10', 'lthompson@example.net', 'private', NULL, 'user', '$2y$12$VIVCDVphMJrX5/8Cg8kwdeQHrNUNWmDHQuPA40rKTf2IGVgKlU1pa', '2025-01-29 10:37:35', '2025-01-29 10:37:35', NULL),
(15, 'markus.dach', 'Layne', 'Beatty', 'Auer', '1990-04-26', 'katrine.white@example.net', 'private', NULL, 'user', '$2y$12$wFSFxz84yodDcZBdXByeNOGaWItJvcHiaHwHDXCD817GFgNAVRGN6', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(16, 'mckenzie.brendon', 'Pauline', 'Boehm', 'Beier', '1982-06-07', 'uleffler@example.net', 'private', NULL, 'user', '$2y$12$31cf.tCTm/Z41SwKFIVM2OpIdhXeifK7PjCUH9gQl7yyUnl0Ochkq', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(17, 'edna89', 'Zackery', 'Bergstrom', 'Wisozk', '1992-09-19', 'maymie29@example.org', 'private', NULL, 'user', '$2y$12$0ekOLaZpNDdpwrP85YaLrOmBwB8q9Z74Z6Sp8bF3uq/Y7GUzaV9Ja', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(18, 'hwisoky', 'Antonette', 'Kessler', 'Steuber', '1976-12-04', 'murazik.kailee@example.com', 'private', NULL, 'user', '$2y$12$otRi5bB689.VvY1X2XgfNeJ1A8vS2A6ekbFxhb0DydTnM2SAwccyu', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(19, 'oswald.mann', 'Petra', 'Sporer', 'Connelly', '1985-08-22', 'koss.carson@example.net', 'private', NULL, 'user', '$2y$12$XN5dsoa48kbg0EKak.3Hh.ckyfMRKNsKKV4NXKafCAJmDlScC.tSO', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(20, 'micah.walsh', 'Johnson', 'Marquardt', 'Volkman', '1989-11-27', 'konopelski.fay@example.net', 'private', NULL, 'user', '$2y$12$jdT3BdpFhrQdSIB2/oqFQuxDGRoiDHyoQq.Y4TQZSzgZDpX6cZqnm', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(21, 'schneider.carmine', 'Elody', 'Langworth', 'Nienow', '1985-12-11', 'swest@example.com', 'private', NULL, 'user', '$2y$12$x4/4H1uP3eqI1KQBiuSvG.ClzuIMxnlNalkHYIeX0AWwaKXYP32Vy', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(22, 'fhoppe', 'Jasmin', 'Kovacek', 'Wunsch', '1979-04-27', 'kirk18@example.org', 'private', NULL, 'user', '$2y$12$vcPd/AcfB7oPbHcZYOPwseeqzMxxQUxdkeeTHGKJWkUPTJUgZJZ3G', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(23, 'violet.lemke', 'Geovany', 'Volkman', 'Rosenbaum', '1974-11-26', 'grady.aurelio@example.org', 'private', NULL, 'user', '$2y$12$QTsfWJFQjRuyT1kCEcBva.YYqfwktPwV.JlqJya4t9OuqkYFA6Xlm', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(24, 'kaleigh.stroman', 'Karlee', 'Hill', 'Botsford', '1987-05-10', 'kertzmann.darrel@example.org', 'private', NULL, 'user', '$2y$12$.sIYrCOaKYutQwk0CpOkGuaVnBgRHRKMS3Ta8RaK2LkqKZ2ATQwa.', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(25, 'christelle.lesch', 'Fay', 'Schneider', 'Monahan', '1975-09-22', 'telly17@example.com', 'private', NULL, 'user', '$2y$12$XAMLg.H5IDrX.Oqh0zgc7uYx/LZQZYDUIS7X/x7OFvZ1AattfAVgS', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(26, 'shakira.nikolaus', 'Andres', 'Watsica', 'McDermott', '1986-01-10', 'lottie.macejkovic@example.org', 'private', NULL, 'user', '$2y$12$yIIePTR6uhNm1hqZWCQr0.z2X5.NSWNKW7GwVNt0WnPepCPYnepKi', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(27, 'ruben.von', 'Blaze', 'Graham', 'Auer', '1978-02-06', 'davin.heaney@example.com', 'private', NULL, 'user', '$2y$12$9ubgA/Zsdq2OeA3hGCzBpuCuw2VQM7eX3EXpYfGonikxZlOePoinK', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(28, 'kmoen', 'Nelle', 'Hansen', 'Morissette', '1977-07-09', 'tkling@example.com', 'private', NULL, 'user', '$2y$12$raCiJ.FCjfzlolzC2iZn/eVpzRZjDXgjVkvQAe8fc/HjQG5CneNhe', '2025-01-29 10:37:36', '2025-01-29 10:37:36', NULL),
(29, 'xnolan', 'Harley', 'Stoltenberg', 'Nicolas', '1995-04-23', 'cmorissette@example.com', 'private', NULL, 'user', '$2y$12$saf.GsGU/o5Am1mTbjnC0ODka/G8h2ehNR133EkFpJKz9T8xmd2Sq', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(30, 'dagmar90', 'Rickie', 'Larson', 'Streich', '1981-03-18', 'iroob@example.org', 'private', NULL, 'user', '$2y$12$txa2fRn1BVKChWk3Efb/eOI4Kh0nWlZcEHC0IH5j5mmoaZbL7woHC', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(31, 'alexandria.goldner', 'Bryana', 'Hahn', 'Rutherford', '1995-08-09', 'zmayert@example.org', 'private', NULL, 'user', '$2y$12$pSTcHJ5cZrOBkB9R5MDCoOoNFe8a0NuNXmubWoIrk1qQRv0IQKcla', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(32, 'parisian.leland', 'Cortney', 'Hagenes', 'Beahan', '1999-02-09', 'mathew64@example.net', 'private', NULL, 'user', '$2y$12$SnEhEDKRKGQbypLvmP03XuuqOglq6XHoHck9iJSIMavexWfFBNe0W', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(33, 'elliot.grimes', 'Zelda', 'Lindgren', 'Hilpert', '1983-12-14', 'camryn42@example.com', 'private', NULL, 'user', '$2y$12$xfaL8gW/HaqAZszcUiBCfOyJFYnHhqsVeZSIBsV3aUxOcrPi2MEF.', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(34, 'robel.cesar', 'Kaylie', 'Buckridge', 'O\'Keefe', '1977-11-14', 'erunolfsson@example.com', 'private', NULL, 'user', '$2y$12$QgrZDhC2XnTqWc.QTBLzIOTgFL.Xbm4ZWTdFS5mT30DmGiHp1GwXi', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(35, 'mschmidt', 'Dorris', 'Pollich', 'Koch', '1991-05-28', 'mcclure.silas@example.org', 'private', NULL, 'user', '$2y$12$C76LUOkRCPovc1Jle0Tn3enX3wnbgfiEqBw6cVLLw843ZQGZMNh0C', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(36, 'vicenta73', 'Johnny', 'Daniel', 'Ritchie', '1970-04-02', 'qauer@example.com', 'private', NULL, 'user', '$2y$12$Cjo0JN5iuNcfBm0UOlvEGuh18TU2OLW0TLmLE954KcuRZTcFkfSoK', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(37, 'raegan.oconner', 'Dennis', 'Schulist', 'Waelchi', '1986-09-12', 'ethiel@example.com', 'private', NULL, 'user', '$2y$12$Xgapx9KcAlBlIn0UqBxCjeV7sOVxTJyZGWc.jANjqtjn7BlyIdIAK', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(38, 'mccullough.thaddeus', 'Royce', 'Altenwerth', 'Waelchi', '1994-01-22', 'towne.reyna@example.net', 'private', NULL, 'user', '$2y$12$gNS2T0mA1v7rliyCwYtVd.xtNvdgp8Gjt044T.07V4QM7C3uSrBcu', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(39, 'franecki.mitchel', 'Noemy', 'Haley', 'Bahringer', '1981-12-06', 'hpowlowski@example.net', 'private', NULL, 'user', '$2y$12$YgV7/qjrQ3otrNu1zk0bbOqTdG9beOTCoXVVjiJpQBaHYGIPgMoIu', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(40, 'kuhn.carolyne', 'Kylee', 'Lockman', 'Kohler', '1971-08-27', 'fay21@example.org', 'private', NULL, 'user', '$2y$12$BUslo1FQtMsSYOzhJGgO1e.N5xtXAlvBZ0rHKXzC2YtJa/hOeuPMm', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(41, 'opal.borer', 'Darryl', 'Kerluke', 'Murazik', '1979-02-21', 'narciso.carroll@example.net', 'private', NULL, 'user', '$2y$12$pQtHko7a7t51a6Isq8HsceoAQ5ACHNH13n8txL5W2Cg4q6Yi48JR2', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(42, 'petra.von', 'Sean', 'Conn', 'Shields', '1993-06-13', 'deangelo51@example.org', 'private', NULL, 'user', '$2y$12$UBRSzCsdV1CJrzcQ7UZMsOmXuHEdQwAyr68MDH7sL2FTCj.LIgqnK', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(43, 'kschneider', 'William', 'Lehner', 'Lesch', '1993-01-04', 'shanahan.price@example.net', 'private', NULL, 'user', '$2y$12$zAgjE7JAYf1/kc5u2hoO5.b1gysOgpbcrVawN0MssdFNvnaG3uhb.', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(44, 'cole.kenton', 'Edyth', 'Nicolas', 'Reichel', '1972-03-07', 'ohodkiewicz@example.net', 'private', NULL, 'user', '$2y$12$M5txPqQUDaVEs8makc.VTeq.wQ6KgZYGAQO7iAv0P9Ru6YxvWkns6', '2025-01-29 10:37:37', '2025-01-29 10:37:37', NULL),
(45, 'jaskolski.raoul', 'Lauren', 'Hackett', 'Blanda', '1985-09-20', 'marvin.macey@example.org', 'private', NULL, 'user', '$2y$12$Wld6gRGpGFFl8QpOZLzyP.mfta/lYS67wrbldn0lRv/ip7AN2vOuu', '2025-01-29 10:37:38', '2025-01-29 10:37:38', NULL),
(46, 'ariane.terry', 'Gilbert', 'Sipes', 'Torphy', '1986-09-05', 'irwin47@example.com', 'private', NULL, 'user', '$2y$12$HwbtvcYBfr3iMUgNFAYkuOdomuvxmLXILXb9dh4Ju2lgrVrqGkFFi', '2025-01-29 10:37:38', '2025-01-29 10:37:38', NULL),
(47, 'schiller.hubert', 'Georgiana', 'McKenzie', 'Goodwin', '1998-09-06', 'bradtke.kayla@example.org', 'private', NULL, 'user', '$2y$12$ZDDTg2mq/Z8lC55K/3GUNeVcAaRcsldxJKFFDPMU5i/f64Psq/YNO', '2025-01-29 10:37:38', '2025-01-29 10:37:38', NULL),
(48, 'bcorkery', 'Lori', 'Blick', 'Grant', '1990-09-08', 'kohler.irma@example.com', 'private', NULL, 'user', '$2y$12$7pVLZVbXWSHobTBdCYpTv.8sxMGj523MuiWPWxwII0e1VAtv2x2ji', '2025-01-29 10:37:38', '2025-01-29 10:37:38', NULL),
(49, 'luella.ondricka', 'Telly', 'Bartoletti', 'Predovic', '1992-06-02', 'lilliana96@example.com', 'private', NULL, 'user', '$2y$12$L7QcPQIAGJGOkeZDzTgzs.Jb8oDxrDj7a7A4MAy.873mX5ahjQ5um', '2025-01-29 10:37:38', '2025-01-29 10:37:38', NULL),
(50, 'ima.gulgowski', 'Alize', 'Kihn', 'Rath', '1985-08-04', 'obrekke@example.net', 'private', NULL, 'user', '$2y$12$47WqE/0Pfvs1NxIGR/2O.OopRJr2m3DnsCfMP2K5RhcPQXf7BYwoS', '2025-01-29 10:37:38', '2025-01-29 10:37:38', NULL),
(51, 'chelsey68', 'Asia', 'Reichel', 'O\'Conner', '1978-10-30', 'wisozk.kamille@example.com', 'private', NULL, 'user', '$2y$12$4VwZsTsmEzlbfGt5fIHGvedqAIzoVtXPqbd4D3Xp3N58gIwXpXMBG', '2025-01-29 10:37:38', '2025-01-29 10:37:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`),
  ADD KEY `documents_created_by_foreign` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_group_id_foreign` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

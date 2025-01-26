-- Adminer 4.8.1 MySQL 8.0.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `breezy_sessions`;
CREATE TABLE `breezy_sessions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `authenticatable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticatable_id` bigint unsigned NOT NULL,
  `panel_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `expires_at` timestamp NULL DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `breezy_sessions_authenticatable_type_authenticatable_id_index` (`authenticatable_type`,`authenticatable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab',	'i:2;',	1737207364),
('356a192b7913b04c54574d18c28d46e6395428ab:timer',	'i:1737207364;',	1737207364),
('677a6758ede7c659767a58233d0f7d126fde225b',	'i:1;',	1736602638),
('677a6758ede7c659767a58233d0f7d126fde225b:timer',	'i:1736602638;',	1736602638),
('a17961fa74e9275d529f489537f179c05d50c2f3',	'i:1;',	1737739688),
('a17961fa74e9275d529f489537f179c05d50c2f3:timer',	'i:1737739688;',	1737739688),
('spatie.permission.cache',	'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:68:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"view_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:14:\"view_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"create_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:12:\"update_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:13:\"restore_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:17:\"restore_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:15:\"replicate_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:13:\"reorder_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"delete_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:16:\"delete_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:18:\"force_delete_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:22:\"force_delete_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:12:\"view_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:16:\"view_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"create_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:14:\"update_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:15:\"restore_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:19:\"restore_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:17:\"replicate_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"reorder_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:14:\"delete_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:18:\"delete_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:20:\"force_delete_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:24:\"force_delete_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:22:\"view_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:26:\"view_any_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:24:\"create_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:24:\"update_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:25:\"restore_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:29:\"restore_any_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:27:\"replicate_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:25:\"reorder_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:24:\"delete_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:28:\"delete_any_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:30:\"force_delete_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:34:\"force_delete_any_product::category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:9:\"view_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:13:\"view_any_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:11:\"create_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:11:\"update_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:12:\"restore_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:16:\"restore_any_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:14:\"replicate_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"reorder_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:11:\"delete_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:15:\"delete_any_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:17:\"force_delete_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:21:\"force_delete_any_unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:12:\"restore_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:16:\"restore_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:14:\"replicate_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:12:\"reorder_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:17:\"force_delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:21:\"force_delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:18:\"page_MyProfilePage\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:11:\"page_Themes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}',	1737787720),
('theme',	's:6:\"sunset\";',	2051337985);

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1' COMMENT '0 : inactive, 1 : active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_product_id_foreign` (`product_id`),
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `qty`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1,	5,	5,	3,	NULL,	0,	'2025-01-20 06:02:28',	'2025-01-20 06:02:50'),
(2,	5,	2,	2,	NULL,	0,	'2025-01-20 06:02:35',	'2025-01-20 06:02:50'),
(3,	5,	1,	4,	NULL,	0,	'2025-01-20 06:04:16',	'2025-01-20 06:04:33'),
(4,	5,	3,	4,	NULL,	0,	'2025-01-20 06:04:22',	'2025-01-20 06:04:33'),
(5,	5,	2,	4,	NULL,	0,	'2025-01-20 06:07:54',	'2025-01-20 06:08:13'),
(6,	5,	5,	3,	NULL,	0,	'2025-01-20 06:08:02',	'2025-01-20 06:08:13'),
(7,	5,	2,	3,	NULL,	0,	'2025-01-20 06:11:42',	'2025-01-20 06:12:01'),
(8,	5,	5,	1,	NULL,	0,	'2025-01-20 06:11:48',	'2025-01-20 06:12:01'),
(9,	5,	1,	3,	NULL,	0,	'2025-01-20 06:13:21',	'2025-01-20 06:19:14'),
(10,	5,	5,	8,	NULL,	0,	'2025-01-20 06:20:25',	'2025-01-20 06:20:38'),
(11,	5,	5,	5,	NULL,	0,	'2025-01-20 06:21:11',	'2025-01-20 06:21:20'),
(12,	5,	5,	4,	NULL,	0,	'2025-01-20 06:26:27',	'2025-01-20 06:56:30'),
(13,	5,	5,	3,	NULL,	0,	'2025-01-20 07:14:44',	'2025-01-20 07:15:43'),
(14,	5,	5,	5,	NULL,	0,	'2025-01-23 17:03:38',	'2025-01-23 17:03:53'),
(15,	5,	1,	1,	NULL,	0,	'2025-01-24 04:42:25',	'2025-01-24 06:26:36'),
(16,	5,	2,	4,	NULL,	0,	'2025-01-24 06:22:41',	'2025-01-24 06:26:36');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE `general_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posthog_html_snippet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_metadata` json DEFAULT NULL,
  `email_settings` json DEFAULT NULL,
  `email_from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_network` json DEFAULT NULL,
  `more_configs` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `general_settings` (`id`, `site_name`, `site_description`, `site_logo`, `site_favicon`, `theme_color`, `support_email`, `support_phone`, `google_analytics_id`, `posthog_html_snippet`, `seo_title`, `seo_keywords`, `seo_metadata`, `email_settings`, `email_from_address`, `email_from_name`, `social_network`, `more_configs`, `created_at`, `updated_at`) VALUES
(1,	'Devrillia Seafood',	'Seafood store based in bali',	NULL,	NULL,	NULL,	'devrillia.info@gmail.com',	'08123123123',	NULL,	NULL,	NULL,	NULL,	'[]',	'{\"smtp_host\": null, \"smtp_port\": null, \"smtp_timeout\": null, \"smtp_password\": null, \"smtp_username\": null, \"amazon_ses_key\": null, \"mailgun_domain\": null, \"mailgun_secret\": null, \"postmark_token\": null, \"smtp_encryption\": null, \"mailgun_endpoint\": null, \"amazon_ses_region\": null, \"amazon_ses_secret\": null, \"default_email_provider\": \"smtp\"}',	NULL,	NULL,	'{\"tiktok\": null, \"youtube\": null, \"facebook\": null, \"linkedin\": null, \"whatsapp\": null, \"instagram\": null, \"pinterest\": null, \"x_twitter\": null}',	NULL,	'2025-01-08 16:54:27',	'2025-01-08 16:56:42');

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'App\\Models\\Product',	1,	'574048d8-6020-47a9-8ad0-ddb3e848736a',	'default',	'grilled-seafood4',	'01JGR4YC163X41SKEZJ4KQYS3B.jpg',	'image/jpeg',	'public',	'public',	4633695,	'[]',	'[]',	'{\"preview\": true}',	'[]',	1,	'2025-01-03 23:54:43',	'2025-01-03 23:54:44'),
(2,	'App\\Models\\Product',	2,	'a81e705f-c7e6-4b03-a0df-01ccbe6fb5b2',	'default',	'grilled-seafood5',	'01JGZ91M0TWWE9PXA6NQ6F3ZPF.jpg',	'image/jpeg',	'public',	'public',	1404663,	'[]',	'[]',	'{\"preview\": true}',	'[]',	1,	'2025-01-06 18:21:05',	'2025-01-06 18:21:05'),
(3,	'App\\Models\\Product',	3,	'8df39608-a567-4430-be74-bbaa41e0ac05',	'default',	'grilled-process',	'01JGZK1P7BS4KQ1ZJY6BPN368M.jpg',	'image/jpeg',	'public',	'public',	2506132,	'[]',	'[]',	'{\"preview\": true}',	'[]',	1,	'2025-01-06 21:15:53',	'2025-01-06 21:15:53'),
(4,	'App\\Models\\Product',	4,	'27d0dfc9-41d7-4ec6-a061-bb35748dc8e1',	'default',	'Fresh Fish Image (1)',	'01JHWSXPPS46PCT5ATXFPCS8QF.jpeg',	'image/jpeg',	'public',	'public',	13872,	'[]',	'[]',	'{\"preview\": true}',	'[]',	1,	'2025-01-18 05:34:01',	'2025-01-18 05:34:01'),
(5,	'App\\Models\\Product',	5,	'd230aee7-bf8d-4938-9634-f092634f69f7',	'default',	'Fresh Fish Image (2)',	'01JHWSZPJBDCB88RAFGTRS0BE5.jpeg',	'image/jpeg',	'public',	'public',	13559,	'[]',	'[]',	'{\"preview\": true}',	'[]',	1,	'2025-01-18 05:35:06',	'2025-01-18 05:35:06'),
(6,	'App\\Models\\Product',	5,	'0f1fb6df-2610-4304-b9a5-51dab88caedf',	'default',	'Fresh Fish Image',	'01JHWSZPKAPCZG9P9BDQRAAJGT.jpeg',	'image/jpeg',	'public',	'public',	12792,	'[]',	'[]',	'{\"preview\": true}',	'[]',	2,	'2025-01-18 05:35:06',	'2025-01-18 05:35:06');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'0001_01_01_000000_create_users_table',	1),
(2,	'0001_01_01_000001_create_cache_table',	1),
(3,	'0001_01_01_000002_create_jobs_table',	1),
(4,	'2024_12_29_033517_create_units_table',	1),
(5,	'2024_12_30_012501_create_breezy_sessions_table',	1),
(6,	'2024_12_30_022830_add_themes_settings_to_users_table',	1),
(7,	'2024_12_30_025122_create_product_categories_table',	1),
(8,	'2024_12_30_025130_create_products_table',	1),
(9,	'2024_12_31_011339_create_media_table',	1),
(10,	'2025_01_02_034323_create_orders_table',	1),
(11,	'2025_01_02_034340_create_carts_table',	1),
(12,	'2025_01_02_080035_create_payment_methods_table',	1),
(13,	'2025_01_02_080038_create_payments_table',	1),
(14,	'2025_01_03_002925_create_order_items_table',	1),
(15,	'2025_01_04_131956_create_permission_tables',	2),
(16,	'2025_01_09_003610_create_general-settings_table',	3),
(17,	'2025_01_09_003611_add_logo_favicon_columns_to_general_settings_table',	3);

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1,	'App\\Models\\User',	1),
(1,	'App\\Models\\User',	2),
(2,	'App\\Models\\User',	2),
(2,	'App\\Models\\User',	6);

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `total`, `note`, `created_at`, `updated_at`) VALUES
(1,	1,	5,	3,	80000.00,	240000.00,	NULL,	'2025-01-20 06:02:50',	'2025-01-20 06:02:50'),
(2,	1,	2,	2,	200000.00,	400000.00,	NULL,	'2025-01-20 06:02:50',	'2025-01-20 06:02:50'),
(3,	2,	1,	4,	100000.00,	400000.00,	NULL,	'2025-01-20 06:04:33',	'2025-01-20 06:04:33'),
(4,	2,	3,	4,	200000.00,	800000.00,	NULL,	'2025-01-20 06:04:33',	'2025-01-20 06:04:33'),
(5,	3,	2,	4,	200000.00,	800000.00,	NULL,	'2025-01-20 06:08:13',	'2025-01-20 06:08:13'),
(6,	3,	5,	3,	80000.00,	240000.00,	NULL,	'2025-01-20 06:08:13',	'2025-01-20 06:08:13'),
(7,	4,	2,	3,	200000.00,	600000.00,	NULL,	'2025-01-20 06:12:01',	'2025-01-20 06:12:01'),
(8,	4,	5,	1,	80000.00,	80000.00,	NULL,	'2025-01-20 06:12:01',	'2025-01-20 06:12:01'),
(9,	5,	1,	3,	100000.00,	300000.00,	NULL,	'2025-01-20 06:19:14',	'2025-01-20 06:19:14'),
(10,	6,	5,	8,	80000.00,	640000.00,	NULL,	'2025-01-20 06:20:38',	'2025-01-20 06:20:38'),
(11,	7,	5,	5,	80000.00,	400000.00,	NULL,	'2025-01-20 06:21:20',	'2025-01-20 06:21:20'),
(12,	8,	5,	5,	80000.00,	400000.00,	NULL,	'2025-01-20 06:21:23',	'2025-01-20 06:21:23'),
(13,	9,	5,	5,	80000.00,	400000.00,	NULL,	'2025-01-20 06:21:36',	'2025-01-20 06:21:36'),
(14,	10,	5,	4,	80000.00,	320000.00,	NULL,	'2025-01-20 06:56:30',	'2025-01-20 06:56:30'),
(15,	11,	5,	3,	80000.00,	240000.00,	NULL,	'2025-01-20 07:15:43',	'2025-01-20 07:15:43'),
(16,	12,	5,	5,	80000.00,	400000.00,	NULL,	'2025-01-23 17:03:53',	'2025-01-23 17:03:53'),
(17,	13,	1,	1,	100000.00,	100000.00,	NULL,	'2025-01-24 06:26:36',	'2025-01-24 06:26:36'),
(18,	13,	2,	4,	200000.00,	800000.00,	NULL,	'2025-01-24 06:26:36',	'2025-01-24 06:26:36');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ticket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 : new,  1 : process, 2 : delivering; 3 : finished; 4 : canceled;',
  `total` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_method` bigint unsigned DEFAULT '0',
  `payment_status` tinyint DEFAULT '0' COMMENT '0 : unconfirmed; 1: confirmed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `payment_method` (`payment_method`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payment_method`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `ticket`, `user_id`, `status`, `total`, `tax`, `grand_total`, `shipping_address`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1,	'J5aIORf8qB',	5,	1,	640000.00,	70400.00,	710400.00,	'Jalanin aja dulu ya ges ya',	1,	1,	'2025-01-20 06:02:50',	'2025-01-24 09:21:43'),
(2,	't0BTZbecgS',	5,	2,	1200000.00,	132000.00,	1332000.00,	'test development',	1,	0,	'2025-01-20 06:04:33',	'2025-01-24 09:22:18'),
(3,	'1mS6fdLXIR',	5,	0,	1040000.00,	114400.00,	1154400.00,	'Test development',	1,	0,	'2025-01-20 06:08:13',	'2025-01-20 06:08:13'),
(4,	'a7P6MTXKQS',	5,	0,	680000.00,	74800.00,	754800.00,	'Test development',	1,	0,	'2025-01-20 06:12:01',	'2025-01-20 06:12:01'),
(5,	'Bgybvs5eZD',	5,	0,	300000.00,	33000.00,	333000.00,	'Test development',	1,	0,	'2025-01-20 06:19:14',	'2025-01-20 06:19:14'),
(6,	'JCsxWr4LHm',	5,	0,	640000.00,	70400.00,	710400.00,	'Disana aja taruh mas',	1,	0,	'2025-01-20 06:20:38',	'2025-01-20 06:20:38'),
(7,	'F4uehj8t9z',	5,	0,	400000.00,	44000.00,	444000.00,	'Development test',	1,	0,	'2025-01-20 06:21:20',	'2025-01-20 06:21:20'),
(8,	'F4uehj8t9z',	5,	0,	400000.00,	44000.00,	444000.00,	'Development test',	1,	0,	'2025-01-20 06:21:23',	'2025-01-20 06:21:23'),
(9,	'F4uehj8t9z',	5,	0,	400000.00,	44000.00,	444000.00,	'Development test',	1,	0,	'2025-01-20 06:21:36',	'2025-01-20 06:21:36'),
(10,	'56MHUOgeSJ',	5,	0,	320000.00,	35200.00,	355200.00,	'Development test',	1,	0,	'2025-01-20 06:56:30',	'2025-01-20 06:56:30'),
(11,	'2mYiZMFLeO',	5,	0,	240000.00,	26400.00,	266400.00,	'Test development',	1,	0,	'2025-01-20 07:15:43',	'2025-01-20 07:15:43'),
(12,	'VolcIg3SJX',	5,	0,	400000.00,	44000.00,	444000.00,	'Test development!',	1,	0,	'2025-01-23 17:03:53',	'2025-01-23 17:03:53'),
(13,	'tyAKvBoXiG',	5,	1,	900000.00,	99000.00,	999000.00,	'Development test',	1,	1,	'2025-01-24 06:26:36',	'2025-01-24 09:27:21');

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE `payment_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `payment_methods` (`id`, `name`, `account_no`, `created_at`, `updated_at`) VALUES
(1,	'Cash On Delivery',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'view_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(2,	'view_any_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(3,	'create_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(4,	'update_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(5,	'restore_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(6,	'restore_any_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(7,	'replicate_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(8,	'reorder_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(9,	'delete_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(10,	'delete_any_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(11,	'force_delete_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(12,	'force_delete_any_order',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(13,	'view_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(14,	'view_any_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(15,	'create_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(16,	'update_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(17,	'restore_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(18,	'restore_any_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(19,	'replicate_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(20,	'reorder_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(21,	'delete_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(22,	'delete_any_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(23,	'force_delete_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(24,	'force_delete_any_product',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(25,	'view_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(26,	'view_any_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(27,	'create_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(28,	'update_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(29,	'restore_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(30,	'restore_any_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(31,	'replicate_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(32,	'reorder_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(33,	'delete_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(34,	'delete_any_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(35,	'force_delete_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(36,	'force_delete_any_product::category',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(37,	'view_role',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(38,	'view_any_role',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(39,	'create_role',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(40,	'update_role',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(41,	'delete_role',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(42,	'delete_any_role',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(43,	'view_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(44,	'view_any_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(45,	'create_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(46,	'update_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(47,	'restore_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(48,	'restore_any_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(49,	'replicate_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(50,	'reorder_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(51,	'delete_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(52,	'delete_any_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(53,	'force_delete_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(54,	'force_delete_any_unit',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(55,	'view_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(56,	'view_any_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(57,	'create_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(58,	'update_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(59,	'restore_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(60,	'restore_any_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(61,	'replicate_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(62,	'reorder_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(63,	'delete_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(64,	'delete_any_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(65,	'force_delete_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(66,	'force_delete_any_user',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(67,	'page_MyProfilePage',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(68,	'page_Themes',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27');

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'Fresh Fish',	'fresh-fish',	'2025-01-03 23:33:42',	'2025-01-03 23:33:42'),
(2,	'Lobster',	'lobster',	'2025-01-03 23:33:51',	'2025-01-03 23:33:51');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_unit` decimal(10,2) NOT NULL,
  `unit_id` bigint unsigned NOT NULL,
  `stock_status` tinyint DEFAULT '1' COMMENT '0 : Out of stock, 1 : In stock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_unit_id_foreign` (`unit_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `price_per_unit`, `unit_id`, `stock_status`, `created_at`, `updated_at`) VALUES
(1,	1,	'Red Sniper',	'red-sniper',	'Fresh red sniper ',	100000.00,	1,	1,	'2025-01-03 23:54:43',	'2025-01-06 21:14:41'),
(2,	2,	'Black Stone Lobster',	'black-stone-lobster',	'God damn good',	200000.00,	1,	1,	'2025-01-06 18:19:40',	'2025-01-06 18:20:28'),
(3,	1,	'Baracuda',	'baracuda',	'Feeling good, like i should',	200000.00,	1,	1,	'2025-01-06 21:15:53',	'2025-01-06 21:15:53'),
(4,	1,	'White Sniper',	'white-sniper',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam unde tempore nemo atque neque inventore provident quidem veritatis? Laboriosam quibusdam libero deserunt, veniam incidunt iure quisquam quas asperiores reprehenderit aliquid!',	100000.00,	1,	1,	'2025-01-18 05:34:01',	'2025-01-18 05:34:01'),
(5,	1,	'Tuna',	'tuna',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam unde tempore nemo atque neque inventore provident quidem veritatis? Laboriosam quibusdam libero deserunt, veniam incidunt iure quisquam quas asperiores reprehenderit aliquid!',	80000.00,	5,	1,	'2025-01-18 05:35:06',	'2025-01-18 05:35:06');

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1,	1),
(2,	1),
(3,	1),
(4,	1),
(5,	1),
(6,	1),
(7,	1),
(8,	1),
(9,	1),
(10,	1),
(11,	1),
(12,	1),
(13,	1),
(14,	1),
(15,	1),
(16,	1),
(17,	1),
(18,	1),
(19,	1),
(20,	1),
(21,	1),
(22,	1),
(23,	1),
(24,	1),
(25,	1),
(26,	1),
(27,	1),
(28,	1),
(29,	1),
(30,	1),
(31,	1),
(32,	1),
(33,	1),
(34,	1),
(35,	1),
(36,	1),
(37,	1),
(38,	1),
(39,	1),
(40,	1),
(41,	1),
(42,	1),
(43,	1),
(44,	1),
(45,	1),
(46,	1),
(47,	1),
(48,	1),
(49,	1),
(50,	1),
(51,	1),
(52,	1),
(53,	1),
(54,	1),
(55,	1),
(56,	1),
(57,	1),
(58,	1),
(59,	1),
(60,	1),
(61,	1),
(62,	1),
(63,	1),
(64,	1),
(65,	1),
(66,	1),
(67,	1),
(68,	1);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'web',	'2025-01-04 05:33:27',	'2025-01-04 05:33:27'),
(2,	'customer',	'web',	'2025-01-04 05:33:48',	'2025-01-04 05:33:48');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BKCPkpP4VrGhxBaFY5bfNz56hqcLfb5YthlpJWrx',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1d1RHdoSHJ0R043U0Y4SlFqVGpiYTlVNjZzT25FNG05b0RzbkpXVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vZS1jb21tZXJjZS50ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',	1737900166),
('Nt8wRDzt53WWPVBHX8adbBnqauYzpKE3S8dkqPIa',	5,	'127.0.0.1',	'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaEJ3UGtwaTl4TzlTWWxDRTlYUTg1eEJoWldFM3h6RVFGZnIwc091eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vZS1jb21tZXJjZS50ZXN0L29yZGVyL1ZvbGNJZzNTSlgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjI5OiJodHRwczovL2UtY29tbWVyY2UudGVzdC9hZG1pbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==',	1737739756),
('vRrqpEtUO5Zf4d3PegPlI1q2kxDazGtyHnUWK4qC',	1,	'127.0.0.1',	'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36',	'YTo2OntzOjY6Il90b2tlbiI7czo0MDoib0tnYkRVRDd3aWhUa2FVbG52SWdld1lVQkNPYUVKenROVXBObzNnRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vZS1jb21tZXJjZS50ZXN0L2FkbWluL29yZGVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJEhOVWZrdDNpRy80WFkwUUg0WmpWUnVsMkhDRmRwSkY3R2hjd3kwSzEuLk1VeHduNS45OVdtIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',	1737739641);

DROP TABLE IF EXISTS `units`;
CREATE TABLE `units` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_letter_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `units` (`id`, `name`, `unit_letter_code`, `created_at`, `updated_at`) VALUES
(1,	'Kilograms',	'kgs',	'2025-01-03 23:37:52',	'2025-01-03 23:39:47'),
(2,	'Grams',	'g',	'2025-01-03 23:39:14',	'2025-01-03 23:39:14'),
(3,	'Pack',	'pack',	'2025-01-03 23:39:28',	'2025-01-03 23:39:28'),
(4,	'Pieces',	'pcs',	'2025-01-03 23:39:39',	'2025-01-03 23:39:39'),
(5,	'Ons',	'ons',	'2025-01-06 18:41:50',	'2025-01-06 18:41:50');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `avatar`, `created_at`, `updated_at`, `theme`, `theme_color`) VALUES
(1,	'admin',	'admin@devdemo.com',	NULL,	NULL,	'$2y$12$HNUfkt3iG/4XY0QH4ZjVRul2HCFdpJF7Ghcwy0K1..MUxwn5.99Wm',	NULL,	'01JGRR0NK2NWWN3Z698E2T0BQR.jpg',	'2025-01-03 23:32:41',	'2025-01-04 05:34:44',	'default',	NULL),
(2,	'Customer1',	'customer1@devdemo.com',	'08123123123',	NULL,	'$2y$12$l0Sx.PX9hr0Ovhr6Tr/X/OMJUdAfU9z22Bsu50HHB4MOZftb8ORQm',	NULL,	NULL,	'2025-01-04 05:48:01',	'2025-01-04 05:48:13',	'default',	NULL),
(3,	'Triyoga Dibrata',	'ntd@devdemo.com',	'+6287761563895',	NULL,	'$2y$12$HCdQ/oJOhEKYZkMwvm2IW.tdLUAT3bzBrdRtQ37pJ7uWwkbG/897.',	NULL,	NULL,	'2025-01-11 05:36:18',	'2025-01-11 05:36:18',	'default',	NULL),
(4,	'Dev Cutomer',	'custdev@devdemo.com',	'081123123123',	NULL,	'$2y$12$a4u76zP/e1FC7G0OJcAdCuCWX.u8wpztQGXtYv4J3HkD2GQc7pv56',	NULL,	NULL,	'2025-01-17 19:32:59',	'2025-01-17 19:32:59',	'default',	NULL),
(5,	'Giri Prasta',	'gp@devdemo.com',	'087765432123',	NULL,	'$2y$12$a4DHC/YxqYxNEokxyvLwBOoyEsB7NjYh8GwhGC5rY5fkT3WBZZ5ZK',	NULL,	NULL,	'2025-01-18 00:07:46',	'2025-01-18 00:07:46',	'default',	NULL),
(6,	'made brata',	'mdb@gmail.com',	'089119229339',	NULL,	'$2y$12$9sntYsuXQ4ka8lSyRS8WUub.Omz6V.mFcjGF6gwAShp5vEU.Gl/Mu',	NULL,	NULL,	'2025-01-18 05:21:47',	'2025-01-18 05:21:47',	'default',	NULL);

-- 2025-01-26 14:05:03

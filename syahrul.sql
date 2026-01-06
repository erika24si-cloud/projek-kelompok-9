-- --------------------------------------------------------
-- Host:                         mysql-erika-sie.alwaysdata.net
-- Server version:               10.11.15-MariaDB - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for erika-sie_db_laravel
CREATE DATABASE IF NOT EXISTS `erika-sie_db_laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `erika-sie_db_laravel`;

-- Dumping structure for table erika-sie_db_laravel.aset
CREATE TABLE IF NOT EXISTS `aset` (
  `aset_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint(20) unsigned NOT NULL,
  `kode_aset` varchar(255) NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `nilai_perolehan` decimal(15,2) NOT NULL,
  `kondisi` enum('baik','rusak','perbaikan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `media` varchar(255) NOT NULL,
  PRIMARY KEY (`aset_id`),
  UNIQUE KEY `aset_kode_aset_unique` (`kode_aset`),
  KEY `aset_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `aset_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriAset` (`kategori_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.aset: ~1 rows (approximately)
INSERT INTO `aset` (`aset_id`, `kategori_id`, `kode_aset`, `nama_aset`, `tgl_perolehan`, `nilai_perolehan`, `kondisi`, `created_at`, `updated_at`, `media`) VALUES
	(1, 3, 'jhbhub', 'nikbnjbn', '2026-01-06', 50000.00, 'rusak', '2026-01-06 15:35:02', '2026-01-06 15:35:02', 'aset/3UGzqzdKKGINW5VtvIfJrRwdkffRU4a7Jr7YbcWL.png');

-- Dumping structure for table erika-sie_db_laravel.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.cache: ~4 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-total_kategori', 'i:20;', 1767720774),
	('laravel-cache-total_lokasi', 'i:1;', 1767720778),
	('laravel-cache-total_mutasi', 'i:1;', 1767720776),
	('laravel-cache-total_pemeliharaan', 'i:2;', 1767720777);

-- Dumping structure for table erika-sie_db_laravel.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.cache_locks: ~0 rows (approximately)

-- Dumping structure for table erika-sie_db_laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table erika-sie_db_laravel.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.jobs: ~0 rows (approximately)

-- Dumping structure for table erika-sie_db_laravel.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.job_batches: ~0 rows (approximately)

-- Dumping structure for table erika-sie_db_laravel.kategoriAset
CREATE TABLE IF NOT EXISTS `kategoriAset` (
  `kategori_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kategori_id`),
  UNIQUE KEY `kategoriaset_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.kategoriAset: ~20 rows (approximately)
INSERT INTO `kategoriAset` (`kategori_id`, `nama`, `kode`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'ut qui', 'KAT-3989', 'Quisquam nisi veniam rerum quia deleniti neque. Ea non sed aut sed libero.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(2, 'dolorum nihil', 'KAT-8983', 'Repudiandae maxime possimus fuga ex iure fuga molestiae. Laborum omnis omnis modi corrupti atque.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(3, 'eos tempore', 'KAT-7282', 'Quo earum dignissimos quas sed officia odio. Magni enim eligendi eveniet facilis.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(4, 'dolorum non', 'KAT-8159', 'Magni accusantium laudantium voluptas. Voluptatem et rerum sed. Laboriosam ipsam vero sunt.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(5, 'eligendi id', 'KAT-6376', 'Sit possimus eum sunt qui fuga qui. Doloremque earum totam enim dolor.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(6, 'exercitationem laudantium', 'KAT-1757', 'Exercitationem blanditiis iure consequatur tenetur. Illo dolore temporibus aut dolores.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(7, 'culpa alias', 'KAT-7342', 'Et voluptate nihil adipisci. Commodi est iste corporis nostrum vero. Nulla non rem a quis.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(8, 'iste exercitationem', 'KAT-6363', 'Facilis velit consectetur illo debitis dignissimos. Voluptas non rerum quo et repudiandae.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(9, 'veniam aut', 'KAT-1783', 'Laudantium odio fugit ducimus. Quod consequatur ut quisquam itaque suscipit eos cumque.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(10, 'voluptas et', 'KAT-8737', 'Dolor perspiciatis nam repudiandae et. Aut iusto et sunt cumque soluta.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(11, 'modi illo', 'KAT-5945', 'Ut incidunt consequatur omnis et. Ut voluptas voluptatem odio et necessitatibus.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(12, 'veniam modi', 'KAT-7423', 'Et eum culpa voluptatem nulla asperiores similique. Nulla recusandae et soluta quia reiciendis.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(13, 'esse deserunt', 'KAT-2219', 'Porro nisi tenetur quas nulla accusamus in. Mollitia laborum eum ad rerum aut.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(14, 'sunt doloremque', 'KAT-5043', 'Et nobis perspiciatis error in. Facere repellendus eum sit aut porro voluptas.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(15, 'et officiis', 'KAT-1895', 'Pariatur maiores excepturi aut saepe aliquid. Et quam delectus vero eum et.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(16, 'quam unde', 'KAT-5116', 'In non repellendus est ut quam. Possimus iure illum soluta harum.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(17, 'quidem ducimus', 'KAT-0321', 'Quam aperiam quibusdam rem ipsa ut. Doloribus cumque architecto voluptas est ea eius optio.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(18, 'eveniet et', 'KAT-9623', 'Ex tenetur perferendis quia eligendi eaque libero. Dolorum deserunt vero rerum quia eaque non.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(19, 'sit adipisci', 'KAT-7945', 'Autem quam quia qui illo ut et. Vitae rem itaque et et. Nam dolore quia aut quia.', '2026-01-06 15:17:10', '2026-01-06 15:17:10'),
	(20, 'amet voluptas', 'KAT-0703', 'Sed excepturi dolore nemo repellendus consequatur maxime. Suscipit dolore tempora fugit et.', '2026-01-06 15:17:10', '2026-01-06 15:17:10');

-- Dumping structure for table erika-sie_db_laravel.lokasi_aset
CREATE TABLE IF NOT EXISTS `lokasi_aset` (
  `lokasi_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aset_id` int(10) unsigned NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `lokasi_text` text NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `media` varchar(255) NOT NULL,
  PRIMARY KEY (`lokasi_id`),
  KEY `lokasi_aset_aset_id_foreign` (`aset_id`),
  CONSTRAINT `lokasi_aset_aset_id_foreign` FOREIGN KEY (`aset_id`) REFERENCES `aset` (`aset_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.lokasi_aset: ~1 rows (approximately)
INSERT INTO `lokasi_aset` (`lokasi_id`, `aset_id`, `keterangan`, `lokasi_text`, `rt`, `rw`, `created_at`, `updated_at`, `media`) VALUES
	(1, 1, 'l nijb kjjnh', 'bhubvihgbo', '002', '003', '2026-01-06 15:35:31', '2026-01-06 15:35:31', 'lokasi-aset/NwT2Ap7NxJCl3wFjoHwVxAg5qvn57ijyygZgDOfP.png');

-- Dumping structure for table erika-sie_db_laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.migrations: ~14 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_11_11_024634_create_kategori_aset_table', 1),
	(5, '2025_11_12_005548_create_aset_table', 1),
	(6, '2025_11_14_123101_create_warga_table', 1),
	(7, '2025_12_15_124804_create_lokasi_aset_table', 1),
	(8, '2025_12_15_142023_create_pemeliharaan_aset_table', 1),
	(9, '2025_12_16_111252_add_role_column_to_users_table', 1),
	(10, '2025_12_17_004451_create_mutasi_aset_table', 1),
	(11, '2025_12_20_055403_add_media_to_aset_table', 1),
	(12, '2025_12_20_061953_add_media_to_lokasi_aset_table', 1),
	(13, '2025_12_20_063633_add_media_to_pemeliharaan_aset_table', 1),
	(14, '2025_12_20_065627_add_profile_to_users_table', 1);

-- Dumping structure for table erika-sie_db_laravel.mutasi_aset
CREATE TABLE IF NOT EXISTS `mutasi_aset` (
  `mutasi_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aset_id` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_mutasi` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mutasi_id`),
  KEY `mutasi_aset_aset_id_foreign` (`aset_id`),
  CONSTRAINT `mutasi_aset_aset_id_foreign` FOREIGN KEY (`aset_id`) REFERENCES `aset` (`aset_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.mutasi_aset: ~1 rows (approximately)
INSERT INTO `mutasi_aset` (`mutasi_id`, `aset_id`, `tanggal`, `jenis_mutasi`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 1, '2026-01-06', 'iuhiughyiu', 'hvbikhiyyvgikgb', '2026-01-06 15:36:06', '2026-01-06 15:36:06');

-- Dumping structure for table erika-sie_db_laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table erika-sie_db_laravel.pemeliharaan_aset
CREATE TABLE IF NOT EXISTS `pemeliharaan_aset` (
  `pemeliharaan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aset_id` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `tindakan` text NOT NULL,
  `biaya` decimal(10,2) NOT NULL,
  `pelaksana` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `media` varchar(255) NOT NULL,
  PRIMARY KEY (`pemeliharaan_id`),
  KEY `pemeliharaan_aset_aset_id_foreign` (`aset_id`),
  CONSTRAINT `pemeliharaan_aset_aset_id_foreign` FOREIGN KEY (`aset_id`) REFERENCES `aset` (`aset_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.pemeliharaan_aset: ~5 rows (approximately)
INSERT INTO `pemeliharaan_aset` (`pemeliharaan_id`, `aset_id`, `tanggal`, `tindakan`, `biaya`, `pelaksana`, `created_at`, `updated_at`, `media`) VALUES
	(1, 1, '2026-01-06', 'mnojnoklon', 30000.00, 'icsniducnsd', '2026-01-06 15:35:52', '2026-01-06 15:35:52', 'pemeliharaan-aset/cQzmtTKHyyWFW18i3JkcZ92JpuN3WAxf0bKPCUt1.png'),
	(2, 1, '2026-01-06', 'nnnnnnnnnnn', 4564.00, 'nnnnnnnnnnnnnn', '2026-01-06 16:27:12', '2026-01-06 16:27:12', 'pemeliharaan-aset/W7P8X1vj1QDaIEEEuFNEVXvablRWNv88h31HdpWY.jpg'),
	(3, 1, '2026-01-06', 'maintenance', 1000000.00, 'wahyu', '2026-01-06 16:29:58', '2026-01-06 16:29:58', 'pemeliharaan-aset/FKN9zzS1O1jzhv3ifZBpWrCaCelBdZ6cdbhSypTu.jpg'),
	(4, 1, '2026-01-06', 'Service berkala', 100000.00, 'tipenn', '2026-01-06 16:31:06', '2026-01-06 16:31:06', 'pemeliharaan-aset/5TKHbiO6ZeVFzmm8baogBF6jVFlOIxtXndrkToQv.jpg'),
	(5, 1, '2026-01-06', 'pergantian sparepart', 200000.00, 'arya sigma', '2026-01-06 16:32:07', '2026-01-06 16:32:07', 'pemeliharaan-aset/sFqs7vOG6F4oy2Gs0DsaCv9ydbzfXWrmK2rwFKX6.jpg');

-- Dumping structure for table erika-sie_db_laravel.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.sessions: ~15 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('43gFRzMOPnR4AzOtwtF5yRNCNy0o96mF3BlA5PHi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/2.1.50 Chrome/138.0.7204.251 Electron/37.7.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXlyMHdveUQ1MFFqN2lRNEV6clVBUVRmUU9TQXFZWlp5eVdNa2U2biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767719750),
	('9a5qjOzUS5CdEb7l7LgML4rzs98ciWcWjWGUxUc9', NULL, '125.165.106.95', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXcwd3FNQ0FNZWpjWkJMVzRadnJMSThwOHVTZU5kSjI0dVZJaGdoZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vc3lhaHJ1bC1zaWUuYWx3YXlzZGF0YS5uZXQva2F0ZWdvcmktYXNldCI7czo1OiJyb3V0ZSI7czoxOToia2F0ZWdvcmktYXNldC5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767720751),
	('ChE1Kuvyh5LrO0hYPO7Si3R86w3WqZECNYzZWXNQ', NULL, '103.190.46.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHgyZHppQ0NNamFDZGJVdE1vU0xrUDkzRlBnUjNFbW5GMlhnRnFhMCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc3lhaHJ1bC1zaWUuYWx3YXlzZGF0YS5uZXQiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767721959),
	('evUGvvqA5DiUDQoA0cJmZQAFr1lHgCcF9kDRxOtA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/2.1.50 Chrome/138.0.7204.251 Electron/37.7.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielIzcmJIRnhnOHRQQ09YZ2djc1ZKOEtMMjJQR0V3MnR0Y0FuTVhIOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767720090),
	('eYbVAHV9oFm84oo62IROXdOywhX7TB1d85BMIyas', NULL, '103.190.46.130', 'WhatsApp/2.2587.9 W', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmdQZkQzSHJzY1ZZSEk2UDZuZTBMaXRrNWdoNjBvSXVCVzBUTGpZTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZXJpa2Etc2llLmFsd2F5c2RhdGEubmV0L2F1dGgiO3M6NToicm91dGUiO3M6NDoiYXV0aCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767720220),
	('eYnKQjFsprww4xq9QV1wAFdKRTDFcg93dlsFJmaK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0RMVFQyenExcUtpTVh0RURyN1U2djc4N0ZWdnNIMWtkc2g2d1V1NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW1lbGloYXJhYW4tYXNldD9wYWdlPTIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767720747),
	('Ktn3pLfwUqDnmbWPpKHHBKCbA5UY5n30T4BaYZin', NULL, '125.165.106.95', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMktqNlRtWUxJYXNzc3FaVEtEVTNNQjdqRGFNNUkxeU5MVm5VOTlnZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vZXJpa2Etc2llLmFsd2F5c2RhdGEubmV0L3JlZ2lzdGVyIjtzOjU6InJvdXRlIjtzOjEzOiJhdXRoLnJlZ2lzdGVyIjt9fQ==', 1767719745),
	('mTjDWBz9Hv2YcPDaQ3WkIeLnh1yYDyKihXIhRIZm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/2.1.50 Chrome/138.0.7204.251 Electron/37.7.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkttUmtFQkdIaElkNTVUUlRqbkhEc2lpWG5mMVc3dUpIcUVkZkQ3QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767719747),
	('U04lYkd1dvDQQlWCOKMwreSEZX8qewOSLcqQ9UO5', 1, '125.165.106.95', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMUxENHJmVmFQVDBRcGJBUkM1bEV5QmpZUTN6cjlKc1VjcjdNMGt6SiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vZXJpa2Etc2llLmFsd2F5c2RhdGEubmV0L3dhcmdhIjtzOjU6InJvdXRlIjtzOjExOiJ3YXJnYS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxMDoibGFzdF9sb2dpbiI7TzoyNToiSWxsdW1pbmF0ZVxTdXBwb3J0XENhcmJvbiI6Mzp7czo0OiJkYXRlIjtzOjI2OiIyMDI2LTAxLTA2IDE3OjE4OjMzLjk2NDI2MyI7czoxMzoidGltZXpvbmVfdHlwZSI7aTozO3M6ODoidGltZXpvbmUiO3M6MzoiVVRDIjt9fQ==', 1767720885),
	('uK8oph8Bn1uNnlJLxMr6O4QjC92RWFhcvbtx5liY', NULL, '149.34.244.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 OPR/125.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVhsQk9TRXhaYWk5T0drbjJkWDR1a2FnS21OVnhhZTUxdUNZbmRURCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vZXJpa2Etc2llLmFsd2F5c2RhdGEubmV0L2xvZ2luIjtzOjU6InJvdXRlIjtzOjU6ImxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767718655),
	('WY0mslO6o8AVlWhEuOyuaKuW7q5gRwDebF3OOnl0', NULL, '149.154.161.196', 'TelegramBot (like TwitterBot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEd0QVVMbm5GeWhPYXRxejIxRzd4NUdScXFQbEswV3hSbTVGRzdaVyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc3lhaHJ1bC1zaWUuYWx3YXlzZGF0YS5uZXQiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767719577),
	('XeiwBOqPAF4NLr4mcZKTlIvylhIkxk5KugO40Vps', NULL, '103.189.123.8', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUNTcFdSOGQzUHM0ejlkSTFob1VabFp5bnl2SUpySEpLaTF0bjZTQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vZXJpa2Etc2llLmFsd2F5c2RhdGEubmV0IjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767719899),
	('Zdq77XGDmepsccGzbwerbSJC1qEByt6xxUT5bvO8', 2, '103.190.46.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSFZKMXI0dU1qZEtUb3RPcWxZVGk2STNXZnptYUtiWXhPYVlwN0pVMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vZXJpa2Etc2llLmFsd2F5c2RhdGEubmV0L3BlbWVsaWhhcmFhbkFzZXQiO3M6NToicm91dGUiO3M6MjI6InBlbWVsaWhhcmFhbkFzZXQuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTA6Imxhc3RfbG9naW4iO086MjU6IklsbHVtaW5hdGVcU3VwcG9ydFxDYXJib24iOjM6e3M6NDoiZGF0ZSI7czoyNjoiMjAyNi0wMS0wNiAxNzoyNjoxNC4wNDg4MTciO3M6MTM6InRpbWV6b25lX3R5cGUiO2k6MztzOjg6InRpbWV6b25lIjtzOjM6IlVUQyI7fX0=', 1767720728),
	('zQmubUbYxq0clTOLzPn2c0lgRCxkEZ464II0r7d9', NULL, '125.165.106.95', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFpqMW9relNvMmozS0l0ZTRrVnFhZlh3V2hsaXNtaFAxRjNQNWpjeSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vZXJpa2Etc2llLmFsd2F5c2RhdGEubmV0IjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767719894),
	('ztWn7vVR6si1NqGgJJkY27J7cKyEPy5t47Dn7xfV', NULL, '125.165.106.95', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGxXenFUTU9ycnM1d2pyRUVseUlIY1RWRFVVa0x5anFwTjU2ZWlLaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc3lhaHJ1bC1zaWUuYWx3YXlzZGF0YS5uZXQiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767719746);

-- Dumping structure for table erika-sie_db_laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `profile`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'erika', '', 'erika@mail.com', 'admin', NULL, '$2y$12$DRcb//4yhaUYJsUvaGzC4.nl0Dv6rSLIHUxgNajl/InvIb0ydb0w.', NULL, '2026-01-06 15:11:50', '2026-01-06 15:34:15'),
	(2, 'syahrul', 'https://ui-avatars.com/api/?name=syahrul&background=random&color=fff', 'syahrul1@gmail.com', 'admin', NULL, '$2y$12$nfiw5Tcm9ODm.nTaSNuL7e6ozL4Gecn5/NfAK/jJCiAe08PqBnoM.', NULL, '2026-01-06 16:26:14', '2026-01-06 16:26:14');

-- Dumping structure for table erika-sie_db_laravel.warga
CREATE TABLE IF NOT EXISTS `warga` (
  `warga_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`warga_id`),
  UNIQUE KEY `warga_no_ktp_unique` (`no_ktp`),
  UNIQUE KEY `warga_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table erika-sie_db_laravel.warga: ~9 rows (approximately)
INSERT INTO `warga` (`warga_id`, `no_ktp`, `nama`, `jenis_kelamin`, `agama`, `pekerjaan`, `telp`, `email`, `created_at`, `updated_at`) VALUES
	(1, '7304630701000782', 'Hardi Wahyudin', 'Laki-laki', 'Kristen', 'Tukang Las / Pandai Besi', '0676 5545 1140', 'irfan.lailasari@example.net', '2026-01-06 15:25:46', '2026-01-06 15:25:46'),
	(2, '3509122507999575', 'Asmianto Utama', 'Perempuan', 'Hindu', 'Hakim', '0470 7097 0162', 'eva.natsir@example.com', '2026-01-06 15:25:46', '2026-01-06 15:25:46'),
	(3, '8109085808204388', 'Elvina Uyainah', 'Perempuan', 'Hindu', 'Pramusaji', '086490976911', 'pharyanti@example.com', '2026-01-06 15:27:24', '2026-01-06 15:27:24'),
	(4, '1221211502096930', 'Ridwan Hardiansyah', 'Laki-laki', 'Islam', 'Programmer', '082819568459', 'suryatmi.prayogo@example.com', '2026-01-06 15:27:25', '2026-01-06 15:27:25'),
	(5, '9126711012128121', 'Muni Laksana Uwais S.Pd', 'Perempuan', 'Khonghucu', 'Seniman', '081820975849', 'tari.suwarno@example.net', '2026-01-06 15:27:25', '2026-01-06 15:27:25'),
	(6, '3319470312217215', 'Omar Simanjuntak M.Pd', 'Laki-laki', 'Katolik', 'Pendeta', '087735352940', 'mala.susanti@example.com', '2026-01-06 15:27:25', '2026-01-06 15:27:25'),
	(7, '1405955605091627', 'Yunita Nuraini', 'Laki-laki', 'Hindu', 'Apoteker', '084973734724', 'maheswara.ida@example.org', '2026-01-06 15:27:25', '2026-01-06 15:27:25'),
	(8, '3328970411029901', 'Balijan Haryanto', 'Laki-laki', 'Buddha', 'Peternak', '084548749876', 'blaksita@example.com', '2026-01-06 15:27:25', '2026-01-06 15:27:25'),
	(9, '7373894402061729', 'Septi Kusmawati', 'Perempuan', 'Islam', 'Tukang Jahit', '082043573420', 'susanti.dina@example.net', '2026-01-06 15:27:25', '2026-01-06 15:27:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

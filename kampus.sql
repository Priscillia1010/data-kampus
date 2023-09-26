-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for kampus
CREATE DATABASE IF NOT EXISTS `kampus` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `kampus`;

-- Dumping structure for table kampus.dosens
CREATE TABLE IF NOT EXISTS `dosens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kampus.dosens: ~6 rows (approximately)
INSERT INTO `dosens` (`id`, `nama`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'udin', 'udin@gmail.com', '2023-09-26 05:05:09', '2023-09-26 05:05:44'),
	(2, 'budi', 'budi@gmail.com', '2023-09-26 05:06:11', '2023-09-26 05:06:11'),
	(3, 'siti', 'siti@gmail.com', '2023-09-26 05:06:26', '2023-09-26 05:06:26'),
	(4, 'ayu', 'ayu@gmail.com', '2023-09-26 05:06:42', '2023-09-26 05:06:42'),
	(5, 'ika', 'ika@gmail.com', '2023-09-26 05:06:56', '2023-09-26 05:06:56'),
	(6, 'michael', 'michael@gmail.com', '2023-09-26 05:11:15', '2023-09-26 05:11:15');

-- Dumping structure for table kampus.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table kampus.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table kampus.jurusans
CREATE TABLE IF NOT EXISTS `jurusans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fakultas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kampus.jurusans: ~6 rows (approximately)
INSERT INTO `jurusans` (`id`, `fakultas`, `jurusan`, `created_at`, `updated_at`) VALUES
	(1, 'teknik', 'sipil', '2023-09-26 05:07:14', '2023-09-26 05:07:14'),
	(2, 'kesehatan', 'kedokteran', '2023-09-26 05:07:29', '2023-09-26 05:07:29'),
	(3, 'komputer', 'informatika', '2023-09-26 05:07:50', '2023-09-26 05:07:50'),
	(4, 'bisnis', 'ekonomi', '2023-09-26 05:08:01', '2023-09-26 05:08:01'),
	(5, 'pariwisata', 'perhotelan', '2023-09-26 05:08:16', '2023-09-26 05:08:16'),
	(6, 'hukum', 'hukum', '2023-09-26 05:11:41', '2023-09-26 05:11:41');

-- Dumping structure for table kampus.mahasiswas
CREATE TABLE IF NOT EXISTS `mahasiswas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kampus.mahasiswas: ~6 rows (approximately)
INSERT INTO `mahasiswas` (`id`, `nama`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'razha', 'razha10@gmail.com', '2023-08-31 14:27:24', '2023-08-31 14:27:24'),
	(2, 'priscil', 'priscil@gmail.com', '2023-08-31 14:33:13', '2023-08-31 14:33:13'),
	(3, 'budi', 'budi@gmail.com', '2023-08-31 14:33:13', '2023-08-31 14:33:13'),
	(4, 'siti', 'siti@gmail.com', '2023-08-31 14:33:13', '2023-08-31 14:33:13'),
	(5, 'rika', 'rika@gmail.com', '2023-09-26 05:08:45', '2023-09-26 05:08:45'),
	(6, 'rangga', 'rangga@gmail.com', '2023-09-26 05:09:12', '2023-09-26 05:09:12');

-- Dumping structure for table kampus.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kampus.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_08_10_114448_create_mahasiswas_table', 1),
	(6, '2023_08_11_020625_create_jurusans_table', 1),
	(7, '2023_08_11_065835_create_dosens_table', 1);

-- Dumping structure for table kampus.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kampus.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table kampus.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kampus.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table kampus.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kampus.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Mahasiswa', 'mahasiswa@gmail.com', NULL, '$2y$10$j3LtXtsU17G.Fto.0a6W8Oh5ngdeKor.8aCH7dTzmoXDq87tDSHqS', 0, NULL, '2023-09-05 05:32:07', '2023-09-05 05:32:07'),
	(2, 'Admin', 'super-admin@gmail.com', NULL, '$2y$10$FcFU.m8Xh87Njg9AtC/08.hmRraEZmbx4vRJnhNTfQyIXkGJ5gpiK', 1, NULL, '2023-09-05 05:32:07', '2023-09-05 05:32:07'),
	(3, 'Dosen', 'dosen@gmail.com', NULL, '$2y$10$1vysAhOlPpmyC3w9PLtABOa90CYYcRewGoJ6Hdl8QqE5KaZfB8Q62', 2, NULL, '2023-09-05 05:32:07', '2023-09-05 05:32:07');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

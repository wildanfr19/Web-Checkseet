-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_checkseet
CREATE DATABASE IF NOT EXISTS `db_checkseet` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_checkseet`;

-- Dumping structure for table db_checkseet.checkseet_in
CREATE TABLE IF NOT EXISTS `checkseet_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `items_id` int(11) DEFAULT '0',
  `lama_pemeriksaan` varchar(30) DEFAULT NULL,
  `nama_pemakai` varchar(16) DEFAULT NULL,
  `jenis` varchar(12) DEFAULT NULL,
  `tahun` date DEFAULT NULL,
  `kode_asset` varchar(12) DEFAULT NULL,
  `semester` varchar(1) DEFAULT NULL,
  `mark` varchar(10) DEFAULT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `approve_by_1` varchar(40) DEFAULT NULL,
  `approve_date_1` timestamp NULL DEFAULT NULL,
  `approve_by_2` varchar(50) DEFAULT NULL,
  `approve_date_2` timestamp NULL DEFAULT NULL,
  `approve_by_3` varchar(50) DEFAULT NULL,
  `approve_date_3` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

-- Dumping data for table db_checkseet.checkseet_in: ~49 rows (approximately)
DELETE FROM `checkseet_in`;
INSERT INTO `checkseet_in` (`id`, `items_id`, `lama_pemeriksaan`, `nama_pemakai`, `jenis`, `tahun`, `kode_asset`, `semester`, `mark`, `catatan`, `created_by`, `created_date`, `approve_by_1`, `approve_date_1`, `approve_by_2`, `approve_date_2`, `approve_by_3`, `approve_date_3`) VALUES
	(50, 1, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', NULL, '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(51, 2, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(52, 3, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(53, 4, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(54, 5, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(55, 6, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(56, 7, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(57, 8, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', NULL, '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(58, 9, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(59, 10, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(60, 11, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(61, 12, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(62, 13, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(63, 14, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(64, 15, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(65, 16, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(66, 17, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(67, 18, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(68, 19, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(69, 20, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(70, 21, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(71, 22, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(72, 23, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(73, 24, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(74, 25, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(75, 26, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(76, 27, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(77, 28, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(78, 29, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(79, 30, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(80, 31, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(81, 32, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(82, 33, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(83, 34, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(84, 35, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(85, 36, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(86, 37, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(87, 38, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(88, 39, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(89, 40, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(90, 41, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(91, 42, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(92, 43, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(93, 44, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(94, 45, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(95, 46, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(96, 47, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', '', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(97, 48, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL),
	(98, 49, '40', 'Abdul Manaf', 'laptop', '2023-12-12', 'NBK1676', '1', 'baik', '-', 'Ahmad Ramdhani', '2023-12-11 18:29:06', NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table db_checkseet.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table db_checkseet.master_items
CREATE TABLE IF NOT EXISTS `master_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `items` text,
  `standard` text,
  `kategori` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Dumping data for table db_checkseet.master_items: ~45 rows (approximately)
DELETE FROM `master_items`;
INSERT INTO `master_items` (`id`, `items`, `standard`, `kategori`) VALUES
	(1, 'Casing CPU dan Power Supplu', 'Bersih & Berfungsi Normal', 'Hardware'),
	(2, 'Boatherboard & Slot', 'Bersih & Berfungsi Normal', 'Hardware'),
	(3, 'SDRAM & DDRAM', 'Bersih & Berfungsi Normal', 'Hardware'),
	(4, 'Hardisk Drive ( HDD )', 'Defrag & No Bad Sector', 'Hardware'),
	(5, 'All Drive (CDR/DVDR/FLOOFY)', 'Bersih & Berfungsi Normal', 'Hardware'),
	(6, 'OnBoard & Extension Card', 'Bersih & Berfungsi Normal', 'Hardware'),
	(7, '( NIC, VGA, Sound, etc )', '-', 'Hardware'),
	(8, 'OnBoard & Extension Port', 'Bersih & Berfungsi Normal', 'Hardware'),
	(9, '(USB, LPT,COM, PS2)', '-', 'Hardware'),
	(10, 'Fan', 'Bersih & Berfungsi Normal', 'Hardware'),
	(11, '( Processor, Casing, VGA )', '-', 'Hardware'),
	(12, 'Cabling dalam PC', 'Bersih & Rapi', 'Hardware'),
	(13, '( Kabel Power, HDD )', '-', 'Hardware'),
	(14, 'Keyboard & Mouse', 'Bersih & Berfungsi Normal', 'Hardware'),
	(15, 'Monitor & LCD', 'Bersih & Berfungsi Normal', 'Hardware'),
	(16, 'Mur Pengunci', 'Terpasang Kencang', 'Hardware'),
	(17, 'Bios', '-', 'Software'),
	(18, '- CPU Temperatur', '35 - 50 C', 'Software'),
	(19, '- MB Temperatur', '25 - 30 C', 'Software'),
	(20, '- USB Configurasi', 'Enable', 'Software'),
	(21, '- System Date Time', 'Waktu Sesuai', 'Software'),
	(22, '- Password', 'Set Password', 'Software'),
	(23, 'Operating System', '-', 'Software'),
	(24, 'Windows', '-', 'Software'),
	(25, '- Temp / Prefect Folder', 'Bersih dari file sampah', 'Software'),
	(26, '- Backup File ( Jika Perlu )', 'Success', 'Software'),
	(27, '- LAN (IP, Firewall, WorkGroup )', 'Setting & Berfungsi Normal', 'Software'),
	(28, '- Registry', 'Bersih dari Registry', 'Software'),
	(29, '- User Account Control', 'Terpassword', 'Software'),
	(30, 'Linux', '-', 'Software'),
	(31, '- System & Service Monitor', 'Setting & Berfungsi Normal', 'Software'),
	(32, '- File Log ( car/log/message)', 'Tidak ditemukan error', 'Software'),
	(33, '- LAN ( IP, Route, DNS )', 'Setting & Berfungsi Normal', 'Software'),
	(34, '- Firewall', 'Setting & Berfungsi Normal', 'Software'),
	(35, '- Temp / Prefect Folder', 'Bersih dari file sampah', 'Software'),
	(36, 'Antivirus', 'Antivirus Update', 'Software'),
	(37, 'General Application', '-', 'Software'),
	(38, '- Ms Office', 'Berjalan Normal', 'Software'),
	(39, 'Acrobat Reader', 'Berjalan Normal', 'Software'),
	(40, '- Internet Browser ( IE/Firefox )', 'Berjalan Normal', 'Software'),
	(41, '- MUA ( Outlook )', 'Berjalan Normal', 'Software'),
	(42, 'Design Application ( Optional )', '-', 'Software'),
	(43, '- UG NX', 'Berjalan Normal', 'Software'),
	(44, '- Autocad', 'Berjalan Normal', 'Software'),
	(45, '- Master Cam', 'Berjalan Normal', 'Software'),
	(46, '- Cymatron', 'Berjalan Normal', 'Software'),
	(47, 'Finance Application ( Optional )', '-', 'Software'),
	(48, '- Myob', 'Berjalan Normal', 'Software'),
	(49, '- Espt', 'Berjalan Normal', 'Software');

-- Dumping structure for table db_checkseet.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.migrations: ~6 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2022_05_13_015148_laratrust_setup_tables', 1),
	(5, '2022_05_13_020037_create_module_table', 1),
	(6, '2022_05_13_025220_create_modules_table', 1);

-- Dumping structure for table db_checkseet.modules
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modules_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.modules: ~5 rows (approximately)
DELETE FROM `modules`;
INSERT INTO `modules` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Module Setting', '2022-05-17 00:26:49', '2022-05-18 00:47:08'),
	(2, 'Module', '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(3, 'Module Permission', '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(4, 'Module User', '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(5, 'Module Role', '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(12, 'Module Checkseet', '2023-11-14 22:03:38', '2023-11-14 22:03:38');

-- Dumping structure for table db_checkseet.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table db_checkseet.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.permissions: ~27 rows (approximately)
DELETE FROM `permissions`;
INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `module_id`, `created_at`, `updated_at`) VALUES
	(1, 'manage-setting', 'Manage Setting', 'Bisa Memanage Setting', 1, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(2, 'create-setting', 'Create Setting', 'Bisa Membuat Setting', 1, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(3, 'edit-setting', 'Edit Setting', 'Bisa Mengedit Setting', 1, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(4, 'manage-module', 'Manage Module', 'Bisa Memanage Module', 2, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(5, 'create-module', 'Create Module', 'Bisa Membuat Module', 2, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(6, 'edit-module', 'Edit Module', 'Bisa Mengedit Module', 2, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(7, 'delete-module', 'Delete Module', 'Bisa Menghapus Module', 2, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(8, 'manage-permission', 'Manage Permission', 'Bisa Memanage Permission', 3, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(9, 'edit-permission', 'Edit Permission', 'Bisa Mengedit Permission', 3, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(10, 'manage-user', 'Manage User', 'Bisa Memanage User', 4, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(11, 'create-user', 'Create User', 'Bisa Membuat User', 4, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(12, 'edit-user', 'Edit User', 'Bisa Mengedit User', 4, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(13, 'reset-password', 'Reset Password User', 'Bisa Mengganti Password User', 4, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(14, 'manage-account', 'Manage Account Profile', 'Bisa Memanage Profile', 4, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(15, 'edit-account', 'Edit Account Profile', 'Bisa Mengedit Profile', 4, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(16, 'change-password-account', 'Reset Password Profile', 'Bisa Mengganti Password Profile', 4, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(17, 'manage-role', 'Manage Role', 'Bisa Memanage Role', 5, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(18, 'create-role', 'Create Role', 'Bisa Membuat Role', 5, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(19, 'edit-role', 'Edit Role', 'Bisa Mengedit Role', 5, '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(22, 'create-permission', 'Create permission', 'Bisa menambahkan permission', 3, '2022-05-17 21:35:20', '2022-05-17 21:35:20'),
	(24, 'delete-permission', 'Delete Permission', 'Bisa menghapus permission', 3, '2022-05-17 21:39:22', '2022-05-17 21:39:22'),
	(25, 'delete-role', 'Delete Role', 'Bisa menghapus Role', 5, '2022-05-17 21:42:23', '2022-05-17 21:42:52'),
	(26, 'delete-user', 'Delete user', 'Bisa menghapus user', 4, '2022-05-17 21:44:50', '2022-05-17 21:44:50'),
	(56, 'manage-index-checkseet', 'Manage Index Checkseet', 'Manage Index Checkseet', 12, '2023-11-14 22:04:14', '2023-11-14 22:04:14'),
	(57, 'create-checkseet', 'Create Checkseet', 'Create Checkseet', 12, '2023-11-19 19:33:20', '2023-11-19 19:33:20'),
	(58, 'edit-checkseet', 'Edit Checkseet', 'Edit Checkseet', 12, '2023-11-19 19:33:37', '2023-11-19 19:33:37'),
	(59, 'delete-checkseet', 'Delete Checkseet', 'Delete Checkseet', 12, '2023-11-19 19:34:31', '2023-11-19 19:34:31'),
	(60, 'master-item', 'Mastem Item', 'data acuan', 12, '2023-12-08 00:48:07', '2023-12-08 00:48:07'),
	(61, 'view-checkseet', 'view checkseet', 'untuk melihat data yang sudah sebelumnya diinputkan', 12, '2023-12-08 08:19:01', '2023-12-08 08:19:01'),
	(62, 'approve-ict', 'Approve ICT', 'Approve ICT', 12, '2023-12-11 00:32:48', '2023-12-11 00:32:48');

-- Dumping structure for table db_checkseet.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.permission_role: ~24 rows (approximately)
DELETE FROM `permission_role`;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(22, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(56, 9),
	(61, 9),
	(56, 10),
	(57, 10),
	(58, 10),
	(59, 10),
	(60, 10),
	(61, 10),
	(56, 11),
	(61, 11);

-- Dumping structure for table db_checkseet.permission_user
CREATE TABLE IF NOT EXISTS `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.permission_user: ~0 rows (approximately)
DELETE FROM `permission_user`;

-- Dumping structure for table db_checkseet.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.roles: ~4 rows (approximately)
DELETE FROM `roles`;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Administrator', 'Ini adalah Role Admin', '2022-05-17 00:26:49', '2022-05-17 00:26:49'),
	(9, 'departemen-head', 'Departemen Head', 'Departemen Head', '2023-11-14 21:28:17', '2023-11-14 21:28:17'),
	(10, 'ict-adyawinsa', 'ICT Adyawinsa', 'ICT Adyawinsa', '2023-11-14 21:29:17', '2023-11-14 21:29:17'),
	(11, 'user', 'User', 'User', '2023-11-14 21:29:41', '2023-11-14 21:29:41');

-- Dumping structure for table db_checkseet.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.role_user: ~1 rows (approximately)
DELETE FROM `role_user`;
INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
	(1, 1, 'App\\User'),
	(9, 10, 'App\\User'),
	(10, 8, 'App\\User'),
	(11, 9, 'App\\User');

-- Dumping structure for table db_checkseet.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_asset` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_checkseet.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `kode_asset`) VALUES
	(1, 'ICT ADW', 'admin@gmail.com', 'admin', NULL, '$2y$10$tTyzV0K8C7vi/LrpYIznduJU8oDrSechvHm5AgO5S0MsBKT9e1.Mm', '0NoR0Wl2yBysuWCHf8C5cSeimO0AKFatZ7jWnEVL3LwEzZ7rsx8sVbRGToYL', '2022-05-17 00:26:49', '2023-11-14 21:25:23', '-'),
	(8, 'Ahmad Ramdhani', 'ahmad.ramdhani@adyawinsa.com', 'dani', NULL, '$2y$10$rKTDj/5.9i5Yz1BQw5.oHe3JrAijPpvXQ7X295tjHyp4WesjcFFpG', NULL, '2023-11-14 21:30:49', '2023-11-14 21:30:49', '-'),
	(9, 'Abdul Manaf', 'abdulmanaf@adyawinsa.com', 'abdulmanaf', NULL, '$2y$10$BbS/srLPUMBMX6XP/00bNuI5UDAe5sWIzjmuNcT61gqJ3DUGzqur.', NULL, '2023-12-11 19:55:25', '2023-12-11 19:55:25', 'NBK1676'),
	(10, 'Abraham Sulaeman', 'absulaeman@adyawinsa.com', 'absulaeman', NULL, '$2y$10$AVwxDTB6YKDYkl1RgLDNgOZb8.LSlYNgvC39bnsclUyd1CpbKra2W', NULL, '2023-12-11 23:08:03', '2023-12-11 23:08:03', '-');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

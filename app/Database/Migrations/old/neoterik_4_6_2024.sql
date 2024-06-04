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


-- Dumping database structure for neoterik
CREATE DATABASE IF NOT EXISTS `neoterik` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `neoterik`;

-- Dumping structure for table neoterik.activity_assessment
CREATE TABLE IF NOT EXISTS `activity_assessment` (
  `aa_id` int NOT NULL AUTO_INCREMENT,
  `aa_activity_desc` varchar(50) DEFAULT NULL,
  `aa_assessment_desc` varchar(50) DEFAULT NULL,
  `aa_is_parental_involved` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`aa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.activity_assessment: 3 rows
/*!40000 ALTER TABLE `activity_assessment` DISABLE KEYS */;
INSERT INTO `activity_assessment` (`aa_id`, `aa_activity_desc`, `aa_assessment_desc`, `aa_is_parental_involved`) VALUES
	(3, '1. Buka buku dan mula belajar.\r\n2. Set Induksi\r\n3.', 'Membuat peperiksaan tertutup.', 'Y'),
	(4, 'wwwwwwwwwwwwwwwwwwwwwwwwwwww', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Y'),
	(5, 'asdasd', 'asdasd', 'Y');
/*!40000 ALTER TABLE `activity_assessment` ENABLE KEYS */;

-- Dumping structure for table neoterik.cluster_main
CREATE TABLE IF NOT EXISTS `cluster_main` (
  `cm_id` int NOT NULL AUTO_INCREMENT,
  `cm_code` varchar(50) DEFAULT '0',
  `cm_desc` varchar(50) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.cluster_main: 3 rows
/*!40000 ALTER TABLE `cluster_main` DISABLE KEYS */;
INSERT INTO `cluster_main` (`cm_id`, `cm_code`, `cm_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A2000', 'Perkembangan Manusia', NULL, NULL, NULL),
	(2, 'A2001', 'Kemandirian Spesis', NULL, NULL, NULL),
	(3, '1', 'Perkembangan Haiwan', NULL, NULL, NULL);
/*!40000 ALTER TABLE `cluster_main` ENABLE KEYS */;

-- Dumping structure for table neoterik.cluster_subject_mapping
CREATE TABLE IF NOT EXISTS `cluster_subject_mapping` (
  `csm_id` int NOT NULL AUTO_INCREMENT,
  `cm_id` int NOT NULL,
  `sm_id` int NOT NULL,
  PRIMARY KEY (`csm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.cluster_subject_mapping: ~0 rows (approximately)

-- Dumping structure for table neoterik.domain
CREATE TABLE IF NOT EXISTS `domain` (
  `d_id` int NOT NULL AUTO_INCREMENT,
  `d_name` varchar(50) DEFAULT NULL,
  `gd_id` int DEFAULT NULL,
  `sm_id` int DEFAULT NULL,
  `dskpn_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain: 57 rows
/*!40000 ALTER TABLE `domain` DISABLE KEYS */;
INSERT INTO `domain` (`d_id`, `d_name`, `gd_id`, `sm_id`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(136, 'Simulasi', 28, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(135, 'Berasaskan Pengalaman', 27, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(134, 'Kontekstual', 27, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(133, 'Pembelajaran Masteri', 27, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(132, 'Berasaskan Projek', 27, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(130, 'Inkuiri', 27, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(131, 'Berasaskan Masalah', 27, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(129, 'Goal-Directed Learning', 26, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(115, '(KI3) Kemahiran Kepimpinan', 24, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(116, '(KI4) Kemahiran Kerja Berpasukan', 24, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(117, '(KI5) Pembelajaran Berterusan Dan Pengurusan Maklu', 24, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(118, '(KI6) Kemahiran Keusahawanan', 24, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(119, '(KI7) Moral dan Etika Profesional', 24, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(120, 'Active Learning', 25, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(121, 'Collaborative Learning', 25, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(122, 'Constructive Learning', 25, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(123, 'Authentic Learning', 25, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(124, 'Goal-Directed Learning', 25, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(125, 'Entry Level', 26, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(126, 'Adaptation Level', 26, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(127, 'Infussion Level', 26, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(128, 'Transformation Level', 26, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(114, '(KI2) Kemahiran Komunikasi', 24, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(113, '(KI1) Pemikiran Kritis & Kemahiran Penyelesaian Ma', 24, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(112, '(DKM16) Kepimpinan (Kp)', 23, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(111, '(DKM15) Kesedaran Sosial & Budaya (KSB)', 23, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(110, '(DKM14) Penyesuaian Diri (PD)', 23, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(109, '(DKM13) Kegigihan', 23, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(108, '(DKM12) Inisiatif', 23, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(107, '(DKM11) Inkuiri (Ik)', 23, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(106, '(DKM10) Kolaborasi (K)', 22, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(105, '(DKM9) Komunikasi (Kom)', 22, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(104, '(DKM8) Kreativiti (Kr)', 22, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(103, '(DKM7) Pemikiran Kritis & Penyelesaian Masalah (PK', 22, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(102, '(DKM6) Literasi Kebudayaan Sivik dan Nilai (LKSN)', 21, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(101, '(DKM5) Literasi Kewangan (LW)', 21, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(100, 'DKM4: Literasi ICT (LICT)', 21, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(99, 'DKM3: Literasi Saintifik (LS)', 21, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(98, 'DKM2: Numerasi (N)', 21, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(97, 'DKM1: Literasi (L)', 21, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(137, 'Main Peranan', 28, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(138, 'Nyanyian', 28, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(139, 'Bercerita', 28, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(140, 'Lain-lain', 28, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(141, 'Kri', 29, 50, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(142, 'Tri', 29, 50, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(143, 'Mpti', 29, 50, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(144, 'Pdnkk', 29, 49, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(145, 'jpj', 29, 49, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(146, 'zxXzx', 29, 51, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(147, 'ZxZxzxzx', 29, 51, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(148, 'asasasa', 29, 52, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(149, 'asasasas', 29, 52, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(150, 'asasas', 29, 53, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(151, 'asasass', 29, 53, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(152, 'asdsad', 29, 57, 12, '2024-05-30 17:02:22', '2024-05-30 17:02:22', NULL),
	(153, 'asdasda', 29, 58, 13, '2024-05-30 17:27:31', '2024-05-30 17:27:31', NULL);
/*!40000 ALTER TABLE `domain` ENABLE KEYS */;

-- Dumping structure for table neoterik.domain_group
CREATE TABLE IF NOT EXISTS `domain_group` (
  `dg_id` int NOT NULL AUTO_INCREMENT,
  `dg_title` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`dg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_group: 9 rows
/*!40000 ALTER TABLE `domain_group` DISABLE KEYS */;
INSERT INTO `domain_group` (`dg_id`, `dg_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(27, 'Pendekatan', '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(26, 'Integrasi Teknologi', '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(25, 'Reka Bentuk Instruksi', '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(24, '7 Kemahiran Insaniah', '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(23, 'Kualiti Keperibadian', '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(22, 'Kemandirian', '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(21, 'Pengetahuan Asas', '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(28, 'Kaedah', '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL),
	(29, 'Kompetensi Teras', '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL);
/*!40000 ALTER TABLE `domain_group` ENABLE KEYS */;

-- Dumping structure for table neoterik.domain_mapping
CREATE TABLE IF NOT EXISTS `domain_mapping` (
  `dm_id` int NOT NULL AUTO_INCREMENT,
  `dm_isChecked` enum('Y','N') DEFAULT NULL,
  `d_id` int DEFAULT NULL,
  `ls_id` int DEFAULT NULL,
  `dskpn_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`dm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_mapping: 102 rows
/*!40000 ALTER TABLE `domain_mapping` DISABLE KEYS */;
INSERT INTO `domain_mapping` (`dm_id`, `dm_isChecked`, `d_id`, `ls_id`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(52, 'Y', 105, 48, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(53, 'Y', 109, 48, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(54, 'Y', 110, 48, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(55, 'Y', 112, 48, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(56, 'N', 141, 49, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(57, 'N', 142, 49, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(58, 'N', 143, 49, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(59, 'N', 144, 48, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(60, 'N', 145, 48, 9, '2024-05-24 09:19:34', '2024-05-24 09:19:34', NULL),
	(61, 'Y', 121, NULL, 9, '2024-05-24 09:20:09', '2024-05-24 09:20:09', NULL),
	(62, 'Y', 123, NULL, 9, '2024-05-24 09:20:11', '2024-05-24 09:20:11', NULL),
	(63, 'Y', 127, NULL, 9, '2024-05-24 09:20:11', '2024-05-24 09:20:11', NULL),
	(64, 'Y', 128, NULL, 9, '2024-05-24 09:20:11', '2024-05-24 09:20:11', NULL),
	(65, 'Y', 134, NULL, 9, '2024-05-24 09:20:11', '2024-05-24 09:20:11', NULL),
	(66, 'Y', 135, NULL, 9, '2024-05-24 09:20:11', '2024-05-24 09:20:11', NULL),
	(51, 'Y', 103, 48, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(50, 'Y', 102, 48, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(49, 'Y', 100, 48, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(48, 'Y', 112, 49, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(47, 'Y', 109, 49, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(46, 'Y', 108, 49, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(45, 'Y', 106, 49, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(44, 'Y', 103, 49, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(43, 'Y', 101, 49, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(42, 'Y', 98, 49, 9, '2024-05-24 09:15:19', '2024-05-24 09:15:19', NULL),
	(67, 'Y', 137, NULL, 9, '2024-05-24 09:20:11', '2024-05-24 09:20:11', NULL),
	(68, 'Y', 139, NULL, 9, '2024-05-24 09:20:11', '2024-05-24 09:20:11', NULL),
	(69, 'Y', 140, NULL, 9, '2024-05-24 09:20:11', '2024-05-24 09:20:11', NULL),
	(70, 'Y', 97, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(71, 'Y', 98, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(72, 'Y', 99, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(73, 'Y', 100, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(74, 'Y', 101, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(75, 'Y', 102, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(76, 'Y', 103, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(77, 'Y', 104, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(78, 'Y', 107, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(79, 'Y', 108, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(80, 'Y', 109, 50, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(81, 'Y', 97, 51, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(82, 'Y', 98, 51, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(83, 'Y', 99, 51, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(84, 'Y', 105, 51, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(85, 'Y', 106, 51, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(86, 'Y', 110, 51, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(87, 'Y', 111, 51, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(88, 'Y', 112, 51, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(89, 'Y', 100, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(90, 'Y', 101, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(91, 'Y', 102, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(92, 'Y', 103, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(93, 'Y', 104, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(94, 'Y', 105, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(95, 'Y', 106, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(96, 'Y', 107, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(97, 'Y', 108, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(98, 'Y', 109, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(99, 'Y', 110, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(100, 'Y', 111, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(101, 'Y', 112, 52, 10, '2024-05-29 14:41:33', '2024-05-29 14:41:33', NULL),
	(102, 'Y', 146, 50, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(103, 'N', 147, 50, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(104, 'N', 148, 51, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(105, 'Y', 149, 51, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(106, 'Y', 150, 52, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(107, 'N', 151, 52, 10, '2024-05-29 14:42:06', '2024-05-29 14:42:06', NULL),
	(108, 'Y', 120, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(109, 'Y', 121, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(110, 'Y', 122, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(111, 'Y', 125, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(112, 'Y', 128, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(113, 'Y', 129, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(114, 'Y', 130, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(115, 'Y', 131, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(116, 'Y', 132, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(117, 'Y', 133, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(118, 'Y', 134, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(119, 'Y', 135, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(120, 'Y', 136, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(121, 'Y', 137, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(122, 'Y', 138, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(123, 'Y', 139, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(124, 'Y', 140, NULL, 10, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(126, 'Y', 101, 56, 12, '2024-05-30 17:02:15', '2024-05-30 17:02:15', NULL),
	(127, 'Y', 102, 56, 12, '2024-05-30 17:02:16', '2024-05-30 17:02:16', NULL),
	(128, 'Y', 103, 56, 12, '2024-05-30 17:02:16', '2024-05-30 17:02:16', NULL),
	(129, 'Y', 104, 56, 12, '2024-05-30 17:02:16', '2024-05-30 17:02:16', NULL),
	(130, 'Y', 108, 56, 12, '2024-05-30 17:02:16', '2024-05-30 17:02:16', NULL),
	(131, 'Y', 109, 56, 12, '2024-05-30 17:02:16', '2024-05-30 17:02:16', NULL),
	(132, 'N', 152, 56, 12, '2024-05-30 17:02:22', '2024-05-30 17:02:22', NULL),
	(133, 'Y', 124, NULL, 12, '2024-05-30 17:02:35', '2024-05-30 17:02:35', NULL),
	(134, 'Y', 129, NULL, 12, '2024-05-30 17:02:35', '2024-05-30 17:02:35', NULL),
	(135, 'Y', 135, NULL, 12, '2024-05-30 17:02:35', '2024-05-30 17:02:35', NULL),
	(136, 'Y', 140, NULL, 12, '2024-05-30 17:02:35', '2024-05-30 17:02:35', NULL),
	(137, 'Y', 97, 57, 13, '2024-05-30 17:27:21', '2024-05-30 17:27:21', NULL),
	(138, 'Y', 106, 57, 13, '2024-05-30 17:27:21', '2024-05-30 17:27:21', NULL),
	(139, 'Y', 112, 57, 13, '2024-05-30 17:27:21', '2024-05-30 17:27:21', NULL),
	(140, 'Y', 153, 57, 13, '2024-05-30 17:27:31', '2024-05-30 17:27:31', NULL),
	(141, 'Y', 120, NULL, 13, '2024-05-30 17:31:58', '2024-05-30 17:31:58', NULL),
	(142, 'Y', 129, NULL, 13, '2024-05-30 17:31:58', '2024-05-30 17:31:58', NULL),
	(143, 'Y', 135, NULL, 13, '2024-05-30 17:31:58', '2024-05-30 17:31:58', NULL),
	(144, 'Y', 136, NULL, 13, '2024-05-30 17:31:58', '2024-05-30 17:31:58', NULL);
/*!40000 ALTER TABLE `domain_mapping` ENABLE KEYS */;

-- Dumping structure for table neoterik.dskpn
CREATE TABLE IF NOT EXISTS `dskpn` (
  `dskpn_id` int NOT NULL AUTO_INCREMENT,
  `dskpn_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `dskpn_theme` varchar(50) NOT NULL,
  `dskpn_sub_theme` varchar(50) NOT NULL,
  `tm_id` int NOT NULL DEFAULT '0',
  `op_id` int DEFAULT '0',
  `aa_id` int DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `dskpn_status` varchar(50) DEFAULT NULL,
  `dskpn_remarks` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`dskpn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.dskpn: 7 rows
/*!40000 ALTER TABLE `dskpn` DISABLE KEYS */;
INSERT INTO `dskpn` (`dskpn_id`, `dskpn_code`, `dskpn_theme`, `dskpn_sub_theme`, `tm_id`, `op_id`, `aa_id`, `created_at`, `updated_at`, `deleted_at`, `approved_at`, `created_by`, `approved_by`, `dskpn_status`, `dskpn_remarks`) VALUES
	(9, NULL, 'Individu', 'Respirasi', 8, 25, 3, '2024-05-24 09:12:28', '2024-05-24 11:07:50', NULL, NULL, '48283', NULL, NULL, NULL),
	(10, NULL, 'Individu', 'anak ayam', 7, 26, 4, '2024-05-29 14:40:22', '2024-05-31 15:38:27', NULL, '2024-05-31 15:38:27', '48283', '48283', '1', NULL),
	(11, NULL, '-- Sila Pilih Tema --', '', 7, 27, NULL, '2024-05-29 14:59:11', '2024-05-31 16:13:49', NULL, '2024-05-31 16:13:49', '48283', '48283', '1', 'aku tak suka mung! aku reject'),
	(12, NULL, 'Masyarakat', 'sadasdasd', 7, 28, 5, '2024-05-30 17:01:53', '2024-05-31 16:01:38', NULL, '2024-05-31 16:01:38', '48283', '48283', '2', 'asdasd'),
	(13, NULL, 'Keluarga', '', 7, 32, NULL, '2024-05-30 17:26:05', '2024-05-31 16:08:38', NULL, '2024-05-31 16:08:38', '48283', '48283', '1', NULL),
	(14, NULL, 'Keluarga', 'cubaanjay', 7, 33, NULL, '2024-05-31 14:14:18', '2024-05-31 16:14:55', NULL, '2024-05-31 16:14:55', '48283', '48283', '2', 'asdasd'),
	(15, 'K1T1-006', 'Individu', 'ayam', 7, 34, NULL, '2024-05-31 14:16:39', '2024-05-31 16:17:51', NULL, '2024-05-31 16:17:51', '48283', '48283', '2', 'perlu membaiki beberapa perkara, antaranya lorem i');
/*!40000 ALTER TABLE `dskpn` ENABLE KEYS */;

-- Dumping structure for table neoterik.extra_additional_field
CREATE TABLE IF NOT EXISTS `extra_additional_field` (
  `eaf_id` int NOT NULL AUTO_INCREMENT,
  `eaf_desc` varchar(50) DEFAULT NULL,
  `dm_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`eaf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.extra_additional_field: 3 rows
/*!40000 ALTER TABLE `extra_additional_field` DISABLE KEYS */;
INSERT INTO `extra_additional_field` (`eaf_id`, `eaf_desc`, `dm_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Mengaji', 69, '2024-05-24 09:20:11', '2024-05-24 09:20:11', NULL),
	(3, 'tetetetetetet', 125, '2024-05-29 14:42:31', '2024-05-29 14:42:31', NULL),
	(4, 'aaaaaaaaaaaaaa', 136, '2024-05-30 17:02:35', '2024-05-30 17:02:35', NULL);
/*!40000 ALTER TABLE `extra_additional_field` ENABLE KEYS */;

-- Dumping structure for table neoterik.learning_aid
CREATE TABLE IF NOT EXISTS `learning_aid` (
  `la_id` int NOT NULL AUTO_INCREMENT,
  `la_desc` varchar(50) DEFAULT NULL,
  `dskpn_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`la_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.learning_aid: 9 rows
/*!40000 ALTER TABLE `learning_aid` DISABLE KEYS */;
INSERT INTO `learning_aid` (`la_id`, `la_desc`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, 'Kertas Mahjong', 9, '2024-05-24 11:07:50', '2024-05-24 11:07:50', NULL),
	(5, 'Slide Matematik', 9, '2024-05-24 11:07:50', '2024-05-24 11:07:50', NULL),
	(4, 'Komputer Riba', 9, '2024-05-24 11:07:50', '2024-05-24 11:07:50', NULL),
	(7, 'phone', 10, '2024-05-29 14:43:01', '2024-05-29 14:43:01', NULL),
	(8, 'laptop', 10, '2024-05-29 14:43:01', '2024-05-29 14:43:01', NULL),
	(9, 'lcd', 10, '2024-05-29 14:43:01', '2024-05-29 14:43:01', NULL),
	(10, 'anak ayam', 12, '2024-05-30 17:03:01', '2024-05-30 17:03:01', NULL),
	(11, 'anak itik', 12, '2024-05-30 17:03:01', '2024-05-30 17:03:01', NULL),
	(12, 'anak ikan', 12, '2024-05-30 17:03:01', '2024-05-30 17:03:01', NULL);
/*!40000 ALTER TABLE `learning_aid` ENABLE KEYS */;

-- Dumping structure for table neoterik.learning_standard
CREATE TABLE IF NOT EXISTS `learning_standard` (
  `ls_id` int NOT NULL AUTO_INCREMENT,
  `ls_details` varchar(50) DEFAULT '',
  `sm_id` int DEFAULT NULL,
  `dskpn_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`ls_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.learning_standard: 12 rows
/*!40000 ALTER TABLE `learning_standard` DISABLE KEYS */;
INSERT INTO `learning_standard` (`ls_id`, `ls_details`, `sm_id`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(49, '3. Murid boleh mengungkapkan ekspresi', 50, 9, '2024-05-24 09:12:28', '2024-05-24 09:12:28', NULL),
	(48, '1. Murid boleh belajar sains', 49, 9, '2024-05-24 09:12:28', '2024-05-24 09:12:28', NULL),
	(50, 'Cubaan', 51, 10, '2024-05-29 14:40:22', '2024-05-29 14:40:22', NULL),
	(51, 'Cubaan 1', 52, 10, '2024-05-29 14:40:22', '2024-05-29 14:40:22', NULL),
	(52, 'Cubaan 2', 53, 10, '2024-05-29 14:40:22', '2024-05-29 14:40:22', NULL),
	(53, 'sains sss', 54, 11, '2024-05-29 14:59:11', '2024-05-29 14:59:11', NULL),
	(54, 'kotakkkk', 55, 11, '2024-05-29 14:59:11', '2024-05-29 14:59:11', NULL),
	(55, 'katikkk', 56, 11, '2024-05-29 14:59:11', '2024-05-29 14:59:11', NULL),
	(56, 'sadsadasdsad', 57, 12, '2024-05-30 17:01:53', '2024-05-30 17:01:53', NULL),
	(57, 'asdasda', 58, 13, '2024-05-30 17:26:05', '2024-05-30 17:26:05', NULL),
	(58, 'cubaanjay', 59, 14, '2024-05-31 14:14:18', '2024-05-31 14:14:18', NULL),
	(59, 'anak ayam', 60, 15, '2024-05-31 14:16:39', '2024-05-31 14:16:39', NULL);
/*!40000 ALTER TABLE `learning_standard` ENABLE KEYS */;

-- Dumping structure for table neoterik.objective_performance
CREATE TABLE IF NOT EXISTS `objective_performance` (
  `op_id` int NOT NULL AUTO_INCREMENT,
  `op_desc` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`op_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.objective_performance: 10 rows
/*!40000 ALTER TABLE `objective_performance` DISABLE KEYS */;
INSERT INTO `objective_performance` (`op_id`, `op_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(25, 'Menjadikan murid mampu berfikir aras tinggi', '2024-05-24 09:12:26', '2024-05-24 09:12:26', NULL),
	(26, 'Cubaan prestasi', '2024-05-29 14:40:22', '2024-05-29 14:40:22', NULL),
	(27, 'tetetetete', '2024-05-29 14:59:11', '2024-05-29 14:59:11', NULL),
	(28, 'asdasdsadsa', '2024-05-30 17:01:53', '2024-05-30 17:01:53', NULL),
	(29, '', '2024-05-30 17:24:28', '2024-05-30 17:24:28', NULL),
	(30, '', '2024-05-30 17:24:36', '2024-05-30 17:24:36', NULL),
	(31, '', '2024-05-30 17:25:20', '2024-05-30 17:25:20', NULL),
	(32, 'asdsad', '2024-05-30 17:26:05', '2024-05-30 17:26:05', NULL),
	(33, 'ayam', '2024-05-31 14:14:18', '2024-05-31 14:14:18', NULL),
	(34, 'asdasdsa', '2024-05-31 14:16:39', '2024-05-31 14:16:39', NULL);
/*!40000 ALTER TABLE `objective_performance` ENABLE KEYS */;

-- Dumping structure for table neoterik.standard_performance
CREATE TABLE IF NOT EXISTS `standard_performance` (
  `sp_id` int NOT NULL AUTO_INCREMENT,
  `sp_tp_level` int DEFAULT NULL,
  `sp_tp_level_desc` varchar(50) DEFAULT NULL,
  `sm_id` int DEFAULT NULL,
  `dskpn_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.standard_performance: 17 rows
/*!40000 ALTER TABLE `standard_performance` DISABLE KEYS */;
INSERT INTO `standard_performance` (`sp_id`, `sp_tp_level`, `sp_tp_level_desc`, `sm_id`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(42, 2, 'membentuk matematik', 50, 9, '2024-05-24 09:15:02', '2024-05-24 09:15:02', NULL),
	(41, 1, 'mengkaji matematik', 50, 9, '2024-05-24 09:15:02', '2024-05-24 09:15:02', NULL),
	(40, 3, 'mengaji sains', 49, 9, '2024-05-24 09:15:02', '2024-05-24 09:15:02', NULL),
	(39, 2, 'menterjemah sains', 49, 9, '2024-05-24 09:15:02', '2024-05-24 09:15:02', NULL),
	(38, 1, 'menilai sains', 49, 9, '2024-05-24 09:15:02', '2024-05-24 09:15:02', NULL),
	(43, 1, 'test', 51, 10, '2024-05-29 14:40:51', '2024-05-29 14:40:51', NULL),
	(44, 2, 'test1', 51, 10, '2024-05-29 14:40:51', '2024-05-29 14:40:51', NULL),
	(45, 3, 'test2', 51, 10, '2024-05-29 14:40:51', '2024-05-29 14:40:51', NULL),
	(46, 1, 'test', 52, 10, '2024-05-29 14:40:51', '2024-05-29 14:40:51', NULL),
	(47, 2, 'test2', 52, 10, '2024-05-29 14:40:51', '2024-05-29 14:40:51', NULL),
	(48, 1, 'test', 53, 10, '2024-05-29 14:40:51', '2024-05-29 14:40:51', NULL),
	(49, 1, 'eeee', 54, 11, '2024-05-29 14:59:29', '2024-05-29 14:59:29', NULL),
	(50, 1, 'ssss', 55, 11, '2024-05-29 14:59:29', '2024-05-29 14:59:29', NULL),
	(51, 1, 'aaaa', 56, 11, '2024-05-29 14:59:29', '2024-05-29 14:59:29', NULL),
	(52, 1, 'asdasdsd', 57, 12, '2024-05-30 17:02:02', '2024-05-30 17:02:02', NULL),
	(53, 2, 'asdasd', 57, 12, '2024-05-30 17:02:02', '2024-05-30 17:02:02', NULL),
	(54, 1, 'asdasdasdasd', 58, 13, '2024-05-30 17:26:14', '2024-05-30 17:26:14', NULL);
/*!40000 ALTER TABLE `standard_performance` ENABLE KEYS */;

-- Dumping structure for table neoterik.subject_main
CREATE TABLE IF NOT EXISTS `subject_main` (
  `sm_id` int NOT NULL AUTO_INCREMENT,
  `sm_code` varchar(50) DEFAULT NULL,
  `sm_desc` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.subject_main: 12 rows
/*!40000 ALTER TABLE `subject_main` DISABLE KEYS */;
INSERT INTO `subject_main` (`sm_id`, `sm_code`, `sm_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(50, 'nHLKCo2', 'Matematik', '2024-05-24 09:12:28', '2024-05-24 09:12:28', NULL),
	(49, 'BVCot9M', 'Sains', '2024-05-24 09:12:28', '2024-05-24 09:12:28', NULL),
	(51, 'JESPWVL', 'Cubaan', '2024-05-29 14:40:22', '2024-05-29 14:40:22', NULL),
	(52, '5P1Uof2', 'Cubaan 1', '2024-05-29 14:40:22', '2024-05-29 14:40:22', NULL),
	(53, 'eIzVjIT', 'Cubaan 2', '2024-05-29 14:40:22', '2024-05-29 14:40:22', NULL),
	(54, '57vhJSp', 'sains', '2024-05-29 14:59:11', '2024-05-29 14:59:11', NULL),
	(55, '2mFiMaI', 'kotak', '2024-05-29 14:59:11', '2024-05-29 14:59:11', NULL),
	(56, '8IQ5fxo', 'katik', '2024-05-29 14:59:11', '2024-05-29 14:59:11', NULL),
	(57, 'KwFTwtF', 'asdasdasd', '2024-05-30 17:01:53', '2024-05-30 17:01:53', NULL),
	(58, 'cBclzvM', 'asdasd', '2024-05-30 17:26:05', '2024-05-30 17:26:05', NULL),
	(59, 'DwDWBIf', 'Cubaan', '2024-05-31 14:14:18', '2024-05-31 14:14:18', NULL),
	(60, 'kYoYY0s', 'dskpn_baru', '2024-05-31 14:16:39', '2024-05-31 14:16:39', NULL);
/*!40000 ALTER TABLE `subject_main` ENABLE KEYS */;

-- Dumping structure for table neoterik.topic_main
CREATE TABLE IF NOT EXISTS `topic_main` (
  `tm_id` int NOT NULL AUTO_INCREMENT,
  `tm_desc` varchar(50) DEFAULT '0',
  `tm_year` varchar(50) DEFAULT NULL,
  `cm_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`tm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.topic_main: 9 rows
/*!40000 ALTER TABLE `topic_main` DISABLE KEYS */;
INSERT INTO `topic_main` (`tm_id`, `tm_desc`, `tm_year`, `cm_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(7, 'Jantung dan Pernafasan Manusia', '1', 1, '2024-05-17 12:52:49', '2024-05-19 11:34:54', NULL),
	(14, 'Kehidupan selepas Meninggal', '4', 2, '2024-05-21 14:16:39', '2024-05-21 14:16:52', NULL),
	(8, 'Pernafasan dan Respirasi', '4', 1, '2024-05-19 12:32:26', '2024-05-19 12:32:26', NULL),
	(9, 'Tenaga ATP dan TDP, respirasi', '4', 1, '2024-05-19 12:33:18', '2024-05-19 12:33:18', NULL),
	(10, 'Bebola Mata dan Kanta', '3', 1, '2024-05-19 12:34:12', '2024-05-19 12:34:12', NULL),
	(11, 'Pertumbuhan Spora', '3', 2, '2024-05-19 12:34:40', '2024-05-21 14:17:12', NULL),
	(12, 'Belahan dedua', '4', 2, '2024-05-19 12:35:47', '2024-05-21 14:17:30', NULL),
	(13, 'Proses Kemenjadian Embryo', '4', 2, '2024-05-19 12:36:46', '2024-05-21 14:17:14', NULL),
	(16, 'Pertumbuhan dan Pembiakan Haiwan', '3', 2, '2024-05-22 07:57:23', '2024-05-22 07:57:23', NULL);
/*!40000 ALTER TABLE `topic_main` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

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
CREATE DATABASE IF NOT EXISTS `neoterik` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `neoterik`;

-- Dumping structure for table neoterik.domain
CREATE TABLE IF NOT EXISTS `domain` (
  `dmn_id` int NOT NULL AUTO_INCREMENT,
  `dmn_dg_id` int DEFAULT NULL,
  `dmn_code` varchar(50) NOT NULL,
  `dmn_desc` varchar(255) DEFAULT NULL,
  `dmn_created_at` datetime DEFAULT NULL,
  `dmn_updated_at` datetime DEFAULT NULL,
  `dmn_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`dmn_code`),
  UNIQUE KEY `dmn_id` (`dmn_id`),
  KEY `FK_domain_domain_group` (`dmn_dg_id`),
  CONSTRAINT `FK_domain_domain_group` FOREIGN KEY (`dmn_dg_id`) REFERENCES `domain_group` (`dg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain: ~23 rows (approximately)
INSERT INTO `domain` (`dmn_id`, `dmn_dg_id`, `dmn_code`, `dmn_desc`, `dmn_created_at`, `dmn_updated_at`, `dmn_deleted_at`) VALUES
	(1, 1, 'DKM1', 'Literasi (L)', NULL, NULL, NULL),
	(10, 2, 'DKM10', 'Kolaborasi (K)', NULL, NULL, NULL),
	(11, 3, 'DKM11', 'Inkuiri (Ik)', NULL, NULL, NULL),
	(12, 3, 'DKM12', 'Inisiatif (Is)', NULL, NULL, NULL),
	(13, 3, 'DKM13', 'Kegigihan (Kg)', NULL, NULL, NULL),
	(14, 3, 'DKM14', 'Penyesuaian Diri (PD)', NULL, NULL, NULL),
	(15, 3, 'DKM15', 'Kesedaran Sosial & Budaya (KSB)', NULL, NULL, NULL),
	(16, 3, 'DKM16', 'Kepimpinan (Kp)', NULL, NULL, NULL),
	(2, 1, 'DKM2', 'Numerasi (N)', NULL, NULL, NULL),
	(3, 1, 'DKM3', 'Literasi Saintifik (LS)', NULL, NULL, NULL),
	(4, 1, 'DKM4', 'Literasi ICT (LICT)', NULL, NULL, NULL),
	(5, 1, 'DKM5', 'Literasi Kewangan (LW)', NULL, NULL, NULL),
	(6, 1, 'DKM6', 'Literasi Kebudayaan Sivik & Nilai (LKSN)', NULL, NULL, NULL),
	(7, 2, 'DKM7', 'Pemikiran Kritis & Penyelesaian Masalah (PKPM)', NULL, NULL, NULL),
	(8, 2, 'DKM8', 'Kreativiti (Kr)', NULL, NULL, NULL),
	(9, 2, 'DKM9', 'Komunikasi (Kom)', NULL, NULL, NULL),
	(18, 4, 'KI1', 'Pemikiran Kritis & Kemahiran Penyelesaian Masalah', NULL, NULL, NULL),
	(19, 4, 'KI2', 'Kemahiran Komunikasi', NULL, NULL, NULL),
	(20, 4, 'KI3', 'Kemahiran Kepimpinan', NULL, NULL, NULL),
	(21, 4, 'KI4', 'Kemahiran Kerja Berpasukan', NULL, NULL, NULL),
	(22, 4, 'KI5', 'Pembelajaran Berterusan Dan Pengurusan Maklumat', NULL, NULL, NULL),
	(23, 4, 'KI6', 'Kemahiran Keusahawanan', NULL, NULL, NULL),
	(24, 4, 'KI7', 'Moral Dan Etika Profesional', NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

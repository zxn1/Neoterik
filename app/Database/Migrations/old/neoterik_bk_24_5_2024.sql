-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.72-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for neoterik
CREATE DATABASE IF NOT EXISTS `neoterik` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `neoterik`;

-- Dumping structure for table neoterik.activity_assessment
CREATE TABLE IF NOT EXISTS `activity_assessment` (
  `aa_id` int(11) NOT NULL AUTO_INCREMENT,
  `aa_activity_desc` varchar(50) DEFAULT NULL,
  `aa_assessment_desc` varchar(50) DEFAULT NULL,
  `aa_is_parental_involved` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`aa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.activity_assessment: 0 rows
/*!40000 ALTER TABLE `activity_assessment` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_assessment` ENABLE KEYS */;

-- Dumping structure for table neoterik.cluster_main
CREATE TABLE IF NOT EXISTS `cluster_main` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `cm_code` varchar(50) DEFAULT '0',
  `cm_desc` varchar(50) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.cluster_main: 2 rows
/*!40000 ALTER TABLE `cluster_main` DISABLE KEYS */;
REPLACE INTO `cluster_main` (`cm_id`, `cm_code`, `cm_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A2000', 'Perkembangan Manusia', NULL, NULL, NULL),
	(2, 'A2001', 'Kemandirian Spesis', NULL, NULL, NULL);
/*!40000 ALTER TABLE `cluster_main` ENABLE KEYS */;

-- Dumping structure for table neoterik.domain
CREATE TABLE IF NOT EXISTS `domain` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(50) DEFAULT NULL,
  `gd_id` int(11) DEFAULT NULL,
  `sm_id` int(11) DEFAULT NULL,
  `dskpn_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain: 28 rows
/*!40000 ALTER TABLE `domain` DISABLE KEYS */;
REPLACE INTO `domain` (`d_id`, `d_name`, `gd_id`, `sm_id`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(32, '(DKM13) Kegigihan', 9, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(31, '(DKM12) Inisiatif', 9, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(30, '(DKM11) Inkuiri (Ik)', 9, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(29, '(DKM10) Kolaborasi (K)', 8, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(28, '(DKM9) Komunikasi (Kom)', 8, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(27, '(DKM8) Kreativiti (Kr)', 8, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(26, '(DKM7) Pemikiran Kritis & Penyelesaian Masalah (PK', 8, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(25, '(DKM6) Literasi Kebudayaan Sivik dan Nilai (LKSN)', 7, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(24, '(DKM5) Literasi Kewangan (LW)', 7, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(23, 'DKM4: Literasi ICT (LICT)', 7, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(22, 'DKM3: Literasi Saintifik (LS)', 7, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(21, 'DKM2: Numerasi (N)', 7, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(20, 'DKM1: Literasi (L)', 7, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(33, '(DKM14) Penyesuaian Diri (PD)', 9, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(34, '(DKM15) Kesedaran Sosial & Budaya (KSB)', 9, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(35, '(DKM16) Kepimpinan (Kp)', 9, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(36, '(KI1) Pemikiran Kritis & Kemahiran Penyelesaian Ma', 10, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(37, '(KI2) Kemahiran Komunikasi', 10, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(38, '(KI3) Kemahiran Kepimpinan', 10, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(39, '(KI4) Kemahiran Kerja Berpasukan', 10, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(40, '(KI5) Pembelajaran Berterusan Dan Pengurusan Maklu', 10, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(41, '(KI6) Kemahiran Keusahawanan', 10, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(42, '(KI7) Moral dan Etika Profesional', 10, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(43, 'Kri', 11, 46, 8, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL),
	(44, 'Tri', 11, 46, 8, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL),
	(45, 'Pr', 11, 46, 8, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL),
	(46, 'TTi', 11, 45, 8, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL),
	(47, 'Sr', 11, 45, 8, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL);
/*!40000 ALTER TABLE `domain` ENABLE KEYS */;

-- Dumping structure for table neoterik.domain_group
CREATE TABLE IF NOT EXISTS `domain_group` (
  `dg_id` int(11) NOT NULL AUTO_INCREMENT,
  `dg_title` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`dg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_group: 5 rows
/*!40000 ALTER TABLE `domain_group` DISABLE KEYS */;
REPLACE INTO `domain_group` (`dg_id`, `dg_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(9, 'Kualiti Keperibadian', '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(8, 'Kemandirian', '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(7, 'Pengetahuan Asas', '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(10, '7 Kemahiran Insaniah', '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(11, 'Kompetensi Teras', '2024-05-23 01:56:16', '2024-05-23 01:56:16', NULL);
/*!40000 ALTER TABLE `domain_group` ENABLE KEYS */;

-- Dumping structure for table neoterik.domain_mapping
CREATE TABLE IF NOT EXISTS `domain_mapping` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_isChecked` enum('Y','N') DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `ls_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`dm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_mapping: 16 rows
/*!40000 ALTER TABLE `domain_mapping` DISABLE KEYS */;
REPLACE INTO `domain_mapping` (`dm_id`, `dm_isChecked`, `d_id`, `ls_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Y', 22, 45, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(2, 'Y', 23, 45, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(3, 'Y', 27, 45, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(4, 'Y', 29, 45, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(5, 'Y', 34, 45, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(6, 'Y', 35, 45, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(7, 'Y', 24, 44, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(8, 'Y', 28, 44, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(9, 'Y', 29, 44, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(10, 'Y', 32, 44, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(11, 'Y', 33, 44, '2024-05-22 18:19:38', '2024-05-22 18:19:38', NULL),
	(12, 'Y', 43, 45, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL),
	(13, 'Y', 44, 45, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL),
	(14, 'N', 45, 45, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL),
	(15, 'Y', 46, 44, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL),
	(16, 'N', 47, 44, '2024-05-22 18:24:21', '2024-05-22 18:24:21', NULL);
/*!40000 ALTER TABLE `domain_mapping` ENABLE KEYS */;

-- Dumping structure for table neoterik.dskpn
CREATE TABLE IF NOT EXISTS `dskpn` (
  `dskpn_id` int(11) NOT NULL AUTO_INCREMENT,
  `dskpn_theme` varchar(50) NOT NULL,
  `dskpn_sub_theme` varchar(50) NOT NULL,
  `tm_id` int(11) NOT NULL DEFAULT '0',
  `op_id` int(11) DEFAULT '0',
  `aa_id` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dskpn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.dskpn: 6 rows
/*!40000 ALTER TABLE `dskpn` DISABLE KEYS */;
REPLACE INTO `dskpn` (`dskpn_id`, `dskpn_theme`, `dskpn_sub_theme`, `tm_id`, `op_id`, `aa_id`, `created_at`, `updated_at`, `deleted_at`, `approved_at`, `created_by`, `approved_by`) VALUES
	(1, '', '', 9, 14, NULL, '2024-05-22 02:34:15', '2024-05-22 02:34:15', NULL, NULL, NULL, NULL),
	(2, '', '', 7, 17, NULL, '2024-05-22 08:47:37', '2024-05-22 08:47:37', NULL, NULL, NULL, NULL),
	(3, 'Individu', 'cubaan kali ke 2', 9, 18, NULL, '2024-05-22 08:50:51', '2024-05-22 08:50:51', NULL, NULL, NULL, NULL),
	(4, 'Keluarga', 'asdasdasd', 10, 19, NULL, '2024-05-22 13:28:42', '2024-05-22 13:28:42', NULL, NULL, NULL, NULL),
	(5, 'Masyarakat', 'apa2 je la', 7, 20, NULL, '2024-05-22 13:57:24', '2024-05-22 13:57:24', NULL, NULL, NULL, NULL),
	(6, 'Keluarga', 'test', 7, 21, NULL, '2024-05-22 14:05:58', '2024-05-22 14:05:58', NULL, NULL, NULL, NULL),
	(7, 'Individu', 'test', 8, 22, NULL, '2024-05-22 15:41:12', '2024-05-22 15:41:12', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `dskpn` ENABLE KEYS */;

-- Dumping structure for table neoterik.learning_aid
CREATE TABLE IF NOT EXISTS `learning_aid` (
  `la_id` int(11) NOT NULL AUTO_INCREMENT,
  `la_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`la_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.learning_aid: 0 rows
/*!40000 ALTER TABLE `learning_aid` DISABLE KEYS */;
/*!40000 ALTER TABLE `learning_aid` ENABLE KEYS */;

-- Dumping structure for table neoterik.learning_standard
CREATE TABLE IF NOT EXISTS `learning_standard` (
  `ls_id` int(11) NOT NULL AUTO_INCREMENT,
  `ls_details` varchar(50) DEFAULT '',
  `sm_id` int(11) DEFAULT NULL,
  `dskpn_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`ls_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.learning_standard: 16 rows
/*!40000 ALTER TABLE `learning_standard` DISABLE KEYS */;
REPLACE INTO `learning_standard` (`ls_id`, `ls_details`, `sm_id`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(45, '2. Algebra', 46, 8, '2024-05-22 18:18:22', '2024-05-22 18:18:22', NULL),
	(44, '1. Belajar Respirasi', 45, 8, '2024-05-22 18:18:22', '2024-05-22 18:18:22', NULL);
/*!40000 ALTER TABLE `learning_standard` ENABLE KEYS */;

-- Dumping structure for table neoterik.objective_performance
CREATE TABLE IF NOT EXISTS `objective_performance` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `op_desc` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`op_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.objective_performance: 8 rows
/*!40000 ALTER TABLE `objective_performance` DISABLE KEYS */;
REPLACE INTO `objective_performance` (`op_id`, `op_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(23, 'Menilai Respirasi menggunakan ungkapan algebra.', '2024-05-22 18:18:20', '2024-05-22 18:18:20', NULL);
/*!40000 ALTER TABLE `objective_performance` ENABLE KEYS */;

-- Dumping structure for table neoterik.standard_performance
CREATE TABLE IF NOT EXISTS `standard_performance` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_tp_level` int(11) DEFAULT NULL,
  `sp_tp_level_desc` varchar(50) DEFAULT NULL,
  `sm_id` int(11) DEFAULT NULL,
  `dskpn_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.standard_performance: 5 rows
/*!40000 ALTER TABLE `standard_performance` DISABLE KEYS */;
REPLACE INTO `standard_performance` (`sp_id`, `sp_tp_level`, `sp_tp_level_desc`, `sm_id`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(31, 1, 'Menulis ungkapan algebra', 46, 8, '2024-05-22 18:19:03', '2024-05-22 18:19:03', NULL),
	(30, 3, 'Mensyukuri kehidupan', 45, 8, '2024-05-22 18:19:03', '2024-05-22 18:19:03', NULL),
	(29, 2, 'Menilai Kehidupan', 45, 8, '2024-05-22 18:19:03', '2024-05-22 18:19:03', NULL),
	(28, 1, 'Menilai kejuruteraan', 45, 8, '2024-05-22 18:19:03', '2024-05-22 18:19:03', NULL),
	(32, 2, 'Merumuskan formula matematik', 46, 8, '2024-05-22 18:19:03', '2024-05-22 18:19:03', NULL);
/*!40000 ALTER TABLE `standard_performance` ENABLE KEYS */;

-- Dumping structure for table neoterik.subject_main
CREATE TABLE IF NOT EXISTS `subject_main` (
  `sm_id` int(11) NOT NULL AUTO_INCREMENT,
  `sm_code` varchar(50) DEFAULT NULL,
  `sm_desc` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.subject_main: 16 rows
/*!40000 ALTER TABLE `subject_main` DISABLE KEYS */;
REPLACE INTO `subject_main` (`sm_id`, `sm_code`, `sm_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(46, 'CBUeqbW', 'Matematik', '2024-05-22 18:18:22', '2024-05-22 18:18:22', NULL),
	(45, '62JFYVG', 'Sains', '2024-05-22 18:18:22', '2024-05-22 18:18:22', NULL);
/*!40000 ALTER TABLE `subject_main` ENABLE KEYS */;

-- Dumping structure for table neoterik.topic_main
CREATE TABLE IF NOT EXISTS `topic_main` (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_desc` varchar(50) DEFAULT '0',
  `tm_year` varchar(50) DEFAULT NULL,
  `cm_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`tm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.topic_main: 9 rows
/*!40000 ALTER TABLE `topic_main` DISABLE KEYS */;
REPLACE INTO `topic_main` (`tm_id`, `tm_desc`, `tm_year`, `cm_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(7, 'Jantung dan Pernafasan Manusia', '1', 1, '2024-05-17 12:52:49', '2024-05-19 11:34:54', NULL),
	(14, 'Kehidupan selepas Meninggal', '4', 2, '2024-05-21 14:16:39', '2024-05-21 14:16:52', NULL),
	(8, 'Pernafasan dan Respirasi', '4', 1, '2024-05-19 12:32:26', '2024-05-19 12:32:26', NULL),
	(9, 'Tenaga ATP dan TDP, respirasi', '4', 1, '2024-05-19 12:33:18', '2024-05-19 12:33:18', NULL),
	(10, 'Bebola Mata dan Kanta', '3', 1, '2024-05-19 12:34:12', '2024-05-19 12:34:12', NULL),
	(11, 'Pertumbuhan Spora', '3', 2, '2024-05-19 12:34:40', '2024-05-21 14:17:12', NULL),
	(12, 'Belahan dedua', '4', 2, '2024-05-19 12:35:47', '2024-05-21 14:17:30', NULL),
	(13, 'Proses Kemenjadian Embryo', '4', 2, '2024-05-19 12:36:46', '2024-05-21 14:17:14', NULL),
	(16, 'topik 1', '3', 2, '2024-05-22 07:57:23', '2024-05-22 07:57:23', NULL);
/*!40000 ALTER TABLE `topic_main` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

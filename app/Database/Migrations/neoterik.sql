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
  `aa_activity_desc` longtext,
  `aa_assessment_desc` longtext,
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.cluster_main: 3 rows
/*!40000 ALTER TABLE `cluster_main` DISABLE KEYS */;
REPLACE INTO `cluster_main` (`cm_id`, `cm_code`, `cm_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'C2000', 'Perkembangan Manusia', NULL, NULL, NULL),
	(2, 'A2001', 'Kemandirian Spesis', NULL, NULL, NULL),
	(3, 'B2002', 'Perkembangan Haiwan', NULL, NULL, NULL);
/*!40000 ALTER TABLE `cluster_main` ENABLE KEYS */;

-- Dumping structure for table neoterik.cluster_subject_mapping
CREATE TABLE IF NOT EXISTS `cluster_subject_mapping` (
  `csm_id` int(11) NOT NULL AUTO_INCREMENT,
  `cm_id` int(11) NOT NULL,
  `sm_id` int(11) NOT NULL,
  PRIMARY KEY (`csm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.cluster_subject_mapping: ~0 rows (approximately)
/*!40000 ALTER TABLE `cluster_subject_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `cluster_subject_mapping` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain: 44 rows
/*!40000 ALTER TABLE `domain` DISABLE KEYS */;
REPLACE INTO `domain` (`d_id`, `d_name`, `gd_id`, `sm_id`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
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
	(140, 'Lain-lain', 28, NULL, NULL, '2024-05-24 09:10:57', '2024-05-24 09:10:57', NULL);
/*!40000 ALTER TABLE `domain` ENABLE KEYS */;

-- Dumping structure for table neoterik.domain_group
CREATE TABLE IF NOT EXISTS `domain_group` (
  `dg_id` int(11) NOT NULL AUTO_INCREMENT,
  `dg_title` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`dg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_group: 9 rows
/*!40000 ALTER TABLE `domain_group` DISABLE KEYS */;
REPLACE INTO `domain_group` (`dg_id`, `dg_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
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
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_isChecked` enum('Y','N') DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `ls_id` int(11) DEFAULT NULL,
  `dskpn_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`dm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_mapping: 0 rows
/*!40000 ALTER TABLE `domain_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `domain_mapping` ENABLE KEYS */;

-- Dumping structure for table neoterik.dskpn
CREATE TABLE IF NOT EXISTS `dskpn` (
  `dskpn_id` int(11) NOT NULL AUTO_INCREMENT,
  `dskpn_code` varchar(50) DEFAULT NULL,
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
  `dskpn_status` varchar(50) DEFAULT NULL,
  `dskpn_remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dskpn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.dskpn: 0 rows
/*!40000 ALTER TABLE `dskpn` DISABLE KEYS */;
/*!40000 ALTER TABLE `dskpn` ENABLE KEYS */;

-- Dumping structure for table neoterik.extra_additional_field
CREATE TABLE IF NOT EXISTS `extra_additional_field` (
  `eaf_id` int(11) NOT NULL AUTO_INCREMENT,
  `eaf_desc` varchar(255) DEFAULT NULL,
  `dm_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`eaf_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.extra_additional_field: 0 rows
/*!40000 ALTER TABLE `extra_additional_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `extra_additional_field` ENABLE KEYS */;

-- Dumping structure for table neoterik.learning_aid
CREATE TABLE IF NOT EXISTS `learning_aid` (
  `la_id` int(11) NOT NULL AUTO_INCREMENT,
  `la_desc` varchar(50) DEFAULT NULL,
  `dskpn_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.learning_standard: 0 rows
/*!40000 ALTER TABLE `learning_standard` DISABLE KEYS */;
/*!40000 ALTER TABLE `learning_standard` ENABLE KEYS */;

-- Dumping structure for table neoterik.objective_performance
CREATE TABLE IF NOT EXISTS `objective_performance` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `op_desc` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`op_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.objective_performance: 0 rows
/*!40000 ALTER TABLE `objective_performance` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.standard_performance: 0 rows
/*!40000 ALTER TABLE `standard_performance` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.subject_main: 0 rows
/*!40000 ALTER TABLE `subject_main` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.topic_main: 0 rows
/*!40000 ALTER TABLE `topic_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `topic_main` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

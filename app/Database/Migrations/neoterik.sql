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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain: 23 rows
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
	(42, '(KI7) Moral dan Etika Profesional', 10, NULL, NULL, '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL);
/*!40000 ALTER TABLE `domain` ENABLE KEYS */;

-- Dumping structure for table neoterik.domain_group
CREATE TABLE IF NOT EXISTS `domain_group` (
  `dg_id` int(11) NOT NULL AUTO_INCREMENT,
  `dg_title` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`dg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_group: 4 rows
/*!40000 ALTER TABLE `domain_group` DISABLE KEYS */;
REPLACE INTO `domain_group` (`dg_id`, `dg_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(9, 'Kualiti Keperibadian', '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(8, 'Kemandirian', '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(7, 'Pengetahuan Asas', '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL),
	(10, '7 Kemahiran Insaniah', '2024-05-21 13:09:12', '2024-05-21 13:09:12', NULL);
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_mapping: 0 rows
/*!40000 ALTER TABLE `domain_mapping` DISABLE KEYS */;
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
	(27, '2. Algebra', 28, 1, '2024-05-22 02:34:15', '2024-05-22 02:34:15', NULL),
	(26, '1. Kejuruteraan', 27, 1, '2024-05-22 02:34:15', '2024-05-22 02:34:15', NULL),
	(28, 'asdasd', 29, NULL, '2024-05-22 07:47:37', '2024-05-22 07:47:37', NULL),
	(29, 'asdasd', 30, NULL, '2024-05-22 07:47:37', '2024-05-22 07:47:37', NULL),
	(30, 'asdasd', 31, NULL, '2024-05-22 07:47:37', '2024-05-22 07:47:37', NULL),
	(31, 'Test', 32, 2, '2024-05-22 08:47:37', '2024-05-22 08:47:37', NULL),
	(32, 'CUbcubasdas', 33, 3, '2024-05-22 08:50:51', '2024-05-22 08:50:51', NULL),
	(33, 'asdasd', 34, 3, '2024-05-22 08:50:51', '2024-05-22 08:50:51', NULL),
	(34, 'asdasda', 35, 3, '2024-05-22 08:50:51', '2024-05-22 08:50:51', NULL),
	(35, 'TEST', 36, 4, '2024-05-22 13:28:42', '2024-05-22 13:28:42', NULL),
	(36, 'SETSET', 37, 4, '2024-05-22 13:28:42', '2024-05-22 13:28:42', NULL),
	(37, 'SETSET', 38, 4, '2024-05-22 13:28:42', '2024-05-22 13:28:42', NULL),
	(38, 'asdasd', 39, 5, '2024-05-22 13:57:24', '2024-05-22 13:57:24', NULL),
	(39, 'asdasd', 40, 5, '2024-05-22 13:57:24', '2024-05-22 13:57:24', NULL),
	(40, 'Jamilsd', 41, 5, '2024-05-22 13:57:24', '2024-05-22 13:57:24', NULL),
	(41, 'sasda', 42, 6, '2024-05-22 14:05:58', '2024-05-22 14:05:58', NULL),
	(42, '1. How are you doing?', 43, 7, '2024-05-22 15:41:12', '2024-05-22 15:41:12', NULL),
	(43, '2. good also', 44, 7, '2024-05-22 15:41:12', '2024-05-22 15:41:12', NULL);
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
	(14, 'Kejuruteraan Algebra', '2024-05-22 02:34:13', '2024-05-22 02:34:13', NULL),
	(15, 'asdasds', '2024-05-22 07:47:37', '2024-05-22 07:47:37', NULL),
	(16, 'asdasd', '2024-05-22 08:46:13', '2024-05-22 08:46:13', NULL),
	(17, 'asdasd', '2024-05-22 08:47:37', '2024-05-22 08:47:37', NULL),
	(18, 'asdasd', '2024-05-22 08:50:51', '2024-05-22 08:50:51', NULL),
	(19, 'SADASD', '2024-05-22 13:28:42', '2024-05-22 13:28:42', NULL),
	(20, 'asdsadas', '2024-05-22 13:57:24', '2024-05-22 13:57:24', NULL),
	(21, 'sadsa', '2024-05-22 14:05:58', '2024-05-22 14:05:58', NULL),
	(22, 'Good to hear~', '2024-05-22 15:41:09', '2024-05-22 15:41:09', NULL);
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
	(25, 2, 'Mencipta 2', 28, 1, '2024-05-22 02:48:44', '2024-05-22 02:48:44', NULL),
	(24, 1, 'Mencipta 1', 28, 1, '2024-05-22 02:48:44', '2024-05-22 02:48:44', NULL),
	(23, 3, 'Menilai 3', 27, 1, '2024-05-22 02:48:44', '2024-05-22 02:48:44', NULL),
	(22, 2, 'Menilai 2', 27, 1, '2024-05-22 02:48:44', '2024-05-22 02:48:44', NULL),
	(21, 1, 'Menilai 1', 27, 1, '2024-05-22 02:48:44', '2024-05-22 02:48:44', NULL),
	(26, 1, '', 43, 7, '2024-05-22 16:07:25', '2024-05-22 16:07:25', NULL),
	(27, 1, '', 44, 7, '2024-05-22 16:07:25', '2024-05-22 16:07:25', NULL);
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
	(28, 'nhG6iJw', 'Matematik', '2024-05-22 02:34:15', '2024-05-22 02:34:15', NULL),
	(27, '7IfO8I0', 'Sains', '2024-05-22 02:34:15', '2024-05-22 02:34:15', NULL),
	(29, 'ztK4dp3', 'Sains', '2024-05-22 07:47:37', '2024-05-22 07:47:37', NULL),
	(30, '2HSHEo5', 'Sejarah', '2024-05-22 07:47:37', '2024-05-22 07:47:37', NULL),
	(31, 'rugRtk5', 'Ayam', '2024-05-22 07:47:37', '2024-05-22 07:47:37', NULL),
	(32, 'ajwcYn1', 'Test', '2024-05-22 08:47:37', '2024-05-22 08:47:37', NULL),
	(33, 'VdR5zP6', 'Cuba', '2024-05-22 08:50:51', '2024-05-22 08:50:51', NULL),
	(34, 'Izhwdzy', 'sadasd', '2024-05-22 08:50:51', '2024-05-22 08:50:51', NULL),
	(35, 'U4MtBLB', 'asdasdasd', '2024-05-22 08:50:51', '2024-05-22 08:50:51', NULL),
	(36, '1MQAD8q', 'TEST', '2024-05-22 13:28:42', '2024-05-22 13:28:42', NULL),
	(37, 'OEfo4e5', 'TEST', '2024-05-22 13:28:42', '2024-05-22 13:28:42', NULL),
	(38, 'X0g2VoJ', 'TEST', '2024-05-22 13:28:42', '2024-05-22 13:28:42', NULL),
	(39, '65XOsnG', 'asdas', '2024-05-22 13:57:24', '2024-05-22 13:57:24', NULL),
	(40, 'OaXeJc4', 'asdasd', '2024-05-22 13:57:24', '2024-05-22 13:57:24', NULL),
	(41, 'IFGVnnr', 'asdas', '2024-05-22 13:57:24', '2024-05-22 13:57:24', NULL),
	(42, 'hji085X', 'sadsa', '2024-05-22 14:05:58', '2024-05-22 14:05:58', NULL),
	(43, '11w917K', 'Hello Everybody', '2024-05-22 15:41:12', '2024-05-22 15:41:12', NULL),
	(44, 'CbO0t7K', 'I am good, how are you?', '2024-05-22 15:41:12', '2024-05-22 15:41:12', NULL);
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

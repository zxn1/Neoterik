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
  `dskpn_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain: 0 rows
/*!40000 ALTER TABLE `domain` DISABLE KEYS */;
/*!40000 ALTER TABLE `domain` ENABLE KEYS */;

-- Dumping structure for table neoterik.domain_group
CREATE TABLE IF NOT EXISTS `domain_group` (
  `dg_id` int(11) NOT NULL AUTO_INCREMENT,
  `dg_title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_group: 0 rows
/*!40000 ALTER TABLE `domain_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `domain_group` ENABLE KEYS */;

-- Dumping structure for table neoterik.domain_mapping
CREATE TABLE IF NOT EXISTS `domain_mapping` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_isChecked` enum('Y','N') DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`dm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.domain_mapping: 0 rows
/*!40000 ALTER TABLE `domain_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `domain_mapping` ENABLE KEYS */;

-- Dumping structure for table neoterik.dskpn
CREATE TABLE IF NOT EXISTS `dskpn` (
  `dskpn_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_id` int(11) DEFAULT '0',
  `op_id` int(11) DEFAULT '0',
  `aa_id` int(11) DEFAULT '0',
  `created_by` datetime DEFAULT NULL,
  `updated_by` datetime DEFAULT NULL,
  `approved_by` datetime DEFAULT NULL,
  PRIMARY KEY (`dskpn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.dskpn: 0 rows
/*!40000 ALTER TABLE `dskpn` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.learning_standard: 0 rows
/*!40000 ALTER TABLE `learning_standard` DISABLE KEYS */;
REPLACE INTO `learning_standard` (`ls_id`, `ls_details`, `sm_id`, `dskpn_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '1. Kemahiran Hidup.\r\n2. Kemahiran Visual.', 2, NULL, '2024-05-20 11:31:38', '2024-05-20 11:31:38', NULL),
	(2, '1. Kemahiran Menjadi Jurutera', 3, NULL, '2024-05-20 11:31:38', '2024-05-20 11:31:38', NULL);
/*!40000 ALTER TABLE `learning_standard` ENABLE KEYS */;

-- Dumping structure for table neoterik.objective_performance
CREATE TABLE IF NOT EXISTS `objective_performance` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `op_desc` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`op_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.objective_performance: 0 rows
/*!40000 ALTER TABLE `objective_performance` DISABLE KEYS */;
REPLACE INTO `objective_performance` (`op_id`, `op_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Yang saya tahu, saya tak tahu. Betul.', '2024-05-20 11:31:36', '2024-05-20 11:31:36', NULL);
/*!40000 ALTER TABLE `objective_performance` ENABLE KEYS */;

-- Dumping structure for table neoterik.standard_performance
CREATE TABLE IF NOT EXISTS `standard_performance` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_tp_level` int(11) DEFAULT NULL,
  `sp_tp_level_desc` varchar(50) DEFAULT NULL,
  `sm_id` int(11) DEFAULT NULL,
  `dskpn_id` int(11) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.subject_main: 0 rows
/*!40000 ALTER TABLE `subject_main` DISABLE KEYS */;
REPLACE INTO `subject_main` (`sm_id`, `sm_code`, `sm_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Pw8uO7M', 'Sains', '2024-05-20 11:31:38', '2024-05-20 11:31:38', NULL),
	(3, 'RQrFO8E', 'Jurutera', '2024-05-20 11:31:38', '2024-05-20 11:31:38', NULL);
/*!40000 ALTER TABLE `subject_main` ENABLE KEYS */;

-- Dumping structure for table neoterik.topic_main
CREATE TABLE IF NOT EXISTS `topic_main` (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_desc` varchar(50) DEFAULT '0',
  `tm_sub_theme` varchar(50) DEFAULT NULL,
  `tm_theme` varchar(50) DEFAULT NULL,
  `tm_year` varchar(50) DEFAULT NULL,
  `cm_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`tm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table neoterik.topic_main: 10 rows
/*!40000 ALTER TABLE `topic_main` DISABLE KEYS */;
REPLACE INTO `topic_main` (`tm_id`, `tm_desc`, `tm_sub_theme`, `tm_theme`, `tm_year`, `cm_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, 'asdad dasd asd saf a af ds fa', 'adsad', 'adada', '123', 1, '2024-05-17 11:05:03', '2024-05-19 12:31:52', '2024-05-19 12:31:52'),
	(5, 'asdafasga a f saf adf af saf ', 'tset', 'asdad', '23', 2, '2024-05-17 11:04:33', '2024-05-19 12:31:57', '2024-05-19 12:31:57'),
	(4, 'fafa', 'asda', 'fafafa', '1231', 1, '2024-05-17 10:30:43', '2024-05-19 12:31:48', '2024-05-19 12:31:48'),
	(7, 'Jantung dan Pernafasan Manusia', 'tesa', 'asdada', '1313', 1, '2024-05-17 12:52:49', '2024-05-19 11:34:54', NULL),
	(8, 'Pernafasan dan Respirasi', 'test', 'Individu', '4', 1, '2024-05-19 12:32:26', '2024-05-19 12:32:26', NULL),
	(9, 'Tenaga ATP dan TDP, respirasi', 'test', 'Kumpulan', '4', 1, '2024-05-19 12:33:18', '2024-05-19 12:33:18', NULL),
	(10, 'Bebola Mata dan Kanta', 'test', 'Individu', '3', 1, '2024-05-19 12:34:12', '2024-05-19 12:34:12', NULL),
	(11, 'Pertumbuhan Spora', 'test', 'Individu', '3', 2, '2024-05-19 12:34:40', '2024-05-19 12:34:40', NULL),
	(12, 'Belahan dedua', 'test', 'Kumpulan', '4', 2, '2024-05-19 12:35:47', '2024-05-19 12:35:47', NULL),
	(13, 'Proses Kemenjadian Embryo', 'test', 'Individu', '4', 2, '2024-05-19 12:36:46', '2024-05-19 12:36:46', NULL);
/*!40000 ALTER TABLE `topic_main` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

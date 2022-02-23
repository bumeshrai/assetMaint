-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2016 at 03:46 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assetReg`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1463365720),
('admin', '5', 1463365736),
('operator', '1', 1463383129),
('role_createEquipment', '1', 1465286648);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin', NULL, NULL, 1463365416, 1463365416),
('createEquipment', 2, 'Create New Equipment', NULL, NULL, 1463365416, 1463365416),
('createEquipmentName', 2, 'Create Equipment Class', NULL, NULL, 1463365416, 1463365416),
('createManufacturer', 2, 'Create Manufacturer', NULL, NULL, 1463365416, 1463365416),
('deleteEquipment', 2, 'Delete Equipment', NULL, NULL, 1463365416, 1463365416),
('deleteEquipmentName', 2, 'Delete Equipment Class', NULL, NULL, 1463365416, 1463365416),
('deleteManufacturer', 2, 'Delete Manufacturer', NULL, NULL, 1463365416, 1463365416),
('operator', 1, 'operator', NULL, NULL, 1463365416, 1463365416),
('role_createEquipment', 1, 'Create New Equipment', NULL, NULL, 1463365416, 1463365416),
('role_createEquipmentName', 1, 'Create Equipment Class', NULL, NULL, 1463365416, 1463365416),
('role_createManufacturer', 1, 'Create Manufacturer', NULL, NULL, 1463365416, 1463365416),
('role_deleteEquipment', 1, 'Delete Equipment', NULL, NULL, 1463365416, 1463365416),
('role_deleteEquipmentName', 1, 'Delete Equipment Class', NULL, NULL, 1463365416, 1463365416),
('role_deleteManufacturer', 1, 'Delete Manufacturer', NULL, NULL, 1463365416, 1463365416),
('role_updateEquipment', 1, 'Update Equipment', NULL, NULL, 1463365416, 1463365416),
('role_updateEquipmentName', 1, 'Update Equipment Class', NULL, NULL, 1463365416, 1463365416),
('role_updateManufacturer', 1, 'Update Manufacturer', NULL, NULL, 1463365416, 1463365416),
('updateEquipment', 2, 'Update Equipment', NULL, NULL, 1463365416, 1463365416),
('updateEquipmentName', 2, 'Update Equipment Class', NULL, NULL, 1463365416, 1463365416),
('updateManufacturer', 2, 'Update Manufacturer', NULL, NULL, 1463365416, 1463365416);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'createEquipment'),
('operator', 'createEquipment'),
('role_createEquipment', 'createEquipment'),
('role_createEquipmentName', 'createEquipmentName'),
('role_createManufacturer', 'createManufacturer'),
('role_deleteEquipment', 'deleteEquipment'),
('role_deleteEquipmentName', 'deleteEquipmentName'),
('role_deleteManufacturer', 'deleteManufacturer'),
('role_updateEquipment', 'updateEquipment'),
('role_updateEquipmentName', 'updateEquipmentName'),
('role_updateManufacturer', 'updateManufacturer');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `breakdown`
--

CREATE TABLE IF NOT EXISTS `breakdown` (
  `bd_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_code` varchar(20) NOT NULL,
  `reported_by` varchar(255) NOT NULL,
  `attended` tinyint(1) NOT NULL DEFAULT '0',
  `reporting_time` int(11) NOT NULL,
  `attended_by` varchar(255) DEFAULT NULL,
  `repaired_time` int(11) DEFAULT NULL,
  `bd_description` longtext,
  `repair_description` longtext,
  PRIMARY KEY (`bd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `breakdown`
--

INSERT INTO `breakdown` (`bd_id`, `asset_code`, `reported_by`, `attended`, `reporting_time`, `attended_by`, `repaired_time`, `bd_description`, `repair_description`) VALUES
(1, '0200260017000101', 'Premkumar', 1, 1469084239, 'Premkumar', 1469094721, 'test', 'restored _test');

-- --------------------------------------------------------

--
-- Table structure for table `corridor`
--

CREATE TABLE IF NOT EXISTS `corridor` (
  `corr_id` int(2) NOT NULL AUTO_INCREMENT,
  `corr_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`corr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `corridor`
--

INSERT INTO `corridor` (`corr_id`, `corr_name`) VALUES
(1, 'Corridor 1'),
(2, 'Corridor 2'),
(3, 'OCC Admin Building');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `equip_id` int(11) NOT NULL AUTO_INCREMENT,
  `corr_id` int(2) NOT NULL,
  `ename_id` int(4) NOT NULL,
  `manuf_id` int(4) NOT NULL,
  `enos_id` int(4) NOT NULL,
  `level_id` int(2) NOT NULL,
  `stn_id` int(4) NOT NULL,
  `installation_date` date DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_major_overhaul` date DEFAULT NULL,
  `last_minor_maintenance` date DEFAULT NULL,
  PRIMARY KEY (`equip_id`),
  KEY `equipment_ibfk_1` (`corr_id`),
  KEY `equipment_ibfk_2` (`ename_id`),
  KEY `equipment_ibfk_3` (`level_id`),
  KEY `equipment_ibfk_4` (`stn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=71 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equip_id`, `corr_id`, `ename_id`, `manuf_id`, `enos_id`, `level_id`, `stn_id`, `installation_date`, `asset_code`, `last_major_overhaul`, `last_minor_maintenance`) VALUES
(1, 2, 18, 2, 1, 1, 26, '2015-06-15', '0200260018000101', NULL, NULL),
(2, 2, 17, 1, 1, 1, 26, '2015-06-15', '0200260017000101', NULL, NULL),
(3, 2, 18, 2, 3, 61, 26, '2015-06-15', '0200260018000361', NULL, NULL),
(4, 2, 18, 2, 2, 62, 26, '2015-06-15', '0200260018000262', NULL, NULL),
(5, 2, 18, 2, 4, 58, 26, '2016-04-13', '0200260018000458', NULL, NULL),
(6, 2, 17, 1, 2, 72, 26, '2015-06-15', '0200260017000201', NULL, NULL),
(7, 2, 17, 1, 3, 3, 26, '2015-06-15', '0200260017000301', NULL, NULL),
(8, 2, 17, 1, 4, 71, 26, '2015-06-15', '0200260017000460', NULL, NULL),
(9, 2, 17, 1, 5, 71, 26, '2015-06-15', '0200260017000560', NULL, NULL),
(10, 2, 17, 1, 6, 60, 26, '2015-06-15', '0200260017000660', NULL, NULL),
(11, 2, 18, 2, 1, 5, 14, '2015-06-15', '0200140018000105', NULL, NULL),
(12, 2, 18, 2, 2, 64, 14, '2016-06-15', '0200140018000264', NULL, NULL),
(13, 2, 18, 2, 3, 63, 14, '2015-06-16', '0200140018000363', NULL, NULL),
(14, 2, 18, 2, 4, 4, 14, '2015-06-16', '0200140018000404', NULL, NULL),
(15, 1, 17, 1, 6, 65, 14, '2015-06-15', '0100140017000665', NULL, NULL),
(16, 1, 17, 1, 8, 66, 14, '2015-06-15', '0100140017000866', NULL, NULL),
(17, 1, 17, 1, 10, 7, 14, '2015-06-15', '0100140017001007', NULL, NULL),
(18, 1, 17, 1, 12, 6, 14, '2015-06-15', '0100140017001206', NULL, NULL),
(19, 2, 17, 1, 18, 68, 14, '2015-06-16', '0200140017001868', NULL, NULL),
(20, 2, 17, 1, 20, 67, 14, '2015-06-16', '0200140017002067', NULL, NULL),
(21, 2, 17, 1, 22, 14, 14, '2015-06-16', '0200140017002214', NULL, NULL),
(22, 2, 17, 1, 24, 15, 14, '2015-06-16', '0200140017002415', NULL, NULL),
(23, 2, 18, 2, 1, 3, 31, '2015-06-15', '0200310018000103', NULL, NULL),
(24, 2, 18, 2, 2, 69, 31, '2015-06-15', '0200310018000269', NULL, NULL),
(25, 2, 18, 2, 3, 60, 31, '2015-06-05', '0200310018000360', NULL, NULL),
(26, 2, 18, 2, 4, 70, 31, '2015-06-05', '0200310018000470', NULL, NULL),
(27, 2, 17, 1, 4, 60, 31, '2015-06-05', '0200310017000460', NULL, NULL),
(28, 2, 17, 1, 5, 59, 31, '2015-06-05', '0200310017000559', NULL, NULL),
(29, 2, 17, 1, 1, 72, 31, '2015-06-05', '0200310017000172', NULL, NULL),
(30, 2, 17, 1, 1, 3, 28, '2015-06-05', '0200280017000103', NULL, NULL),
(31, 2, 17, 1, 2, 3, 28, '2015-06-05', '0200280017000203', NULL, NULL),
(32, 2, 17, 1, 3, 2, 28, '2015-06-05', '0200280017000302', NULL, NULL),
(33, 2, 17, 1, 4, 60, 28, '2015-06-15', '0200280017000460', NULL, NULL),
(34, 2, 17, 1, 5, 60, 28, '2015-06-15', '0200280017000560', NULL, NULL),
(35, 2, 17, 1, 6, 59, 28, '2015-06-15', '0200280017000659', NULL, NULL),
(36, 2, 18, 2, 1, 3, 28, '2015-06-05', '0200280018000103', NULL, NULL),
(37, 2, 18, 2, 2, 69, 28, '2015-06-05', '0200280018000269', NULL, NULL),
(38, 2, 18, 2, 3, 60, 28, '2015-06-15', '0200280018000360', NULL, NULL),
(39, 2, 18, 2, 4, 70, 28, '2015-06-15', '0200280018000470', NULL, NULL),
(40, 2, 18, 2, 1, 1, 27, '2015-06-15', '0200270018000101', NULL, NULL),
(41, 2, 18, 2, 2, 60, 27, '2015-06-15', '0200270018000260', NULL, NULL),
(42, 2, 18, 2, 3, 70, 27, '2015-06-15', '0200270018000370', NULL, NULL),
(43, 2, 17, 1, 1, 1, 27, '2015-06-15', '0200270017000101', NULL, NULL),
(44, 2, 17, 1, 2, 1, 27, '2015-06-15', '0200270017000201', NULL, NULL),
(45, 2, 17, 1, 3, 1, 27, '2015-06-15', '0200270017000301', NULL, NULL),
(46, 2, 17, 1, 4, 1, 27, '2015-06-15', '0200270017000401', NULL, NULL),
(47, 2, 17, 1, 5, 70, 27, '2015-06-15', '0200270017000570', NULL, NULL),
(48, 2, 17, 1, 6, 59, 27, '2015-06-15', '0200270017000659', NULL, NULL),
(49, 2, 17, 1, 7, 71, 27, '2015-06-15', '0200270017000771', NULL, NULL),
(50, 2, 17, 1, 8, 60, 27, '2015-06-15', '0200270017000860', NULL, NULL),
(51, 2, 18, 2, 1, 8, 29, '2015-06-15', '0200290018000108', NULL, NULL),
(52, 2, 18, 2, 6, 12, 29, '2015-06-15', '0200290018000612', NULL, NULL),
(53, 2, 18, 2, 7, 13, 29, '2015-06-15', '0200290018000713', NULL, NULL),
(54, 2, 18, 2, 8, 9, 29, '2015-06-15', '0200290018000809', NULL, NULL),
(55, 2, 17, 1, 1, 1, 29, '2015-06-15', '0200290017000101', NULL, NULL),
(56, 2, 17, 1, 4, 10, 29, '2015-06-15', '0200290017000410', NULL, NULL),
(57, 2, 17, 1, 5, 12, 29, '2015-06-15', '0200290017000512', NULL, NULL),
(58, 2, 17, 1, 6, 13, 29, '2015-06-15', '0200290017000613', NULL, NULL),
(59, 2, 18, 2, 1, 1, 30, '2015-06-15', '0200300018000101', NULL, NULL),
(60, 2, 18, 2, 2, 60, 30, '2015-06-15', '0200300018000260', NULL, NULL),
(61, 2, 18, 2, 3, 70, 30, '2015-06-15', '0200300018000370', NULL, NULL),
(62, 2, 17, 1, 3, 1, 30, '2015-06-15', '0200300017000301', NULL, NULL),
(63, 2, 17, 1, 8, 60, 30, '2015-06-15', '0200300017000860', NULL, NULL),
(64, 2, 17, 1, 9, 70, 30, '2015-06-15', '0200300017000970', NULL, NULL),
(67, 2, 17, 1, 7, 73, 4, '2015-04-06', '0200040017000773', NULL, NULL),
(68, 2, 17, 1, 11, 74, 4, '2015-12-10', '0200040017001174', NULL, NULL),
(69, 3, 18, 2, 1, 75, 26, '2014-04-14', '0300260018000175', NULL, NULL),
(70, 3, 18, 2, 2, 75, 26, '2014-04-14', '0300260018000275', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_name`
--

CREATE TABLE IF NOT EXISTS `equipment_name` (
  `ename_id` int(4) NOT NULL AUTO_INCREMENT,
  `ename_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `maint_daily` int(1) NOT NULL DEFAULT '0',
  `maint_weekly` int(1) NOT NULL DEFAULT '0',
  `maint_fortnightly` int(1) NOT NULL DEFAULT '0',
  `maint_monthly` int(1) NOT NULL DEFAULT '0',
  `maint_quaterly` int(1) NOT NULL DEFAULT '0',
  `maint_biannual` int(1) NOT NULL DEFAULT '0',
  `maint_annual` int(1) NOT NULL DEFAULT '0',
  `maint_biennial` int(1) NOT NULL DEFAULT '0',
  `maint_triennial` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ename_id`),
  KEY `ename_id` (`ename_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `equipment_name`
--

INSERT INTO `equipment_name` (`ename_id`, `ename_name`, `maint_daily`, `maint_weekly`, `maint_fortnightly`, `maint_monthly`, `maint_quaterly`, `maint_biannual`, `maint_annual`, `maint_biennial`, `maint_triennial`) VALUES
(1, 'Tunnel Ventilation Fan', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Trackway Exhaust Fan', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Tunnel Ventilation Damper', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Draught Relief Damper', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Trackway Exhaust Damper', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Tunnel Ventilation Fan Cone', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Trackway Exhaust Fan Cone', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'TVF Sound Attenuator', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'TEF Sound Attenuator', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Tunnel Booster Fan', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'TVF VSD', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Motor Control Centre', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Damper Distribution Board', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'Ventilation Control Panel', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'TVS Distribution Board', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'TEF VSD', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'Escalator', 0, 0, 0, 1, 1, 1, 1, 0, 0),
(18, 'Lift', 0, 0, 0, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `escalator`
--

CREATE TABLE IF NOT EXISTS `escalator` (
  `escl_id` int(4) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL,
  `clean_component_list` int(1) NOT NULL DEFAULT '0',
  `lubricate_chains` int(1) NOT NULL DEFAULT '0',
  `grease_shaft_bushes` int(1) NOT NULL DEFAULT '0',
  `quaterly_visual_check` int(1) NOT NULL DEFAULT '0',
  `halfyearly_visual_check` int(1) NOT NULL DEFAULT '0',
  `annual_visual_check` int(1) NOT NULL DEFAULT '0',
  `monthly_step_inspection` int(1) NOT NULL DEFAULT '0',
  `quaterly_step_inspection` int(1) NOT NULL DEFAULT '0',
  `halfyearly_step_inspection` int(1) NOT NULL DEFAULT '0',
  `annual_step_inspection` int(1) NOT NULL DEFAULT '0',
  `monthly_step_chain_inspection` int(1) NOT NULL DEFAULT '0',
  `halfyearly_step_chain_inspection` int(1) NOT NULL DEFAULT '0',
  `annual_step_chain_inspection` int(1) NOT NULL DEFAULT '0',
  `monthly_comb_inspection` int(1) NOT NULL DEFAULT '0',
  `annual_comb_inspection` int(1) NOT NULL DEFAULT '0',
  `handrail_inspection` int(1) NOT NULL DEFAULT '0',
  `drive_chain_inspection` int(1) NOT NULL DEFAULT '0',
  `monthly_machinery_inspection` int(1) NOT NULL DEFAULT '0',
  `halfyearly_machinery_inspection` int(1) NOT NULL DEFAULT '0',
  `annual_machinery_inspection` int(1) NOT NULL DEFAULT '0',
  `monthly_brake_inspection` int(1) NOT NULL DEFAULT '0',
  `halfyearly_brake_inspection` int(1) NOT NULL DEFAULT '0',
  `monthly_safety_function` int(1) NOT NULL DEFAULT '0',
  `halfyearly_safety_function` int(1) NOT NULL DEFAULT '0',
  `monthly_operative_function` int(1) NOT NULL DEFAULT '0',
  `halfyearly_operative_function` int(1) NOT NULL DEFAULT '0',
  `annual_operative_function` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`escl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `escalator`
--

INSERT INTO `escalator` (`escl_id`, `freq_id`, `clean_component_list`, `lubricate_chains`, `grease_shaft_bushes`, `quaterly_visual_check`, `halfyearly_visual_check`, `annual_visual_check`, `monthly_step_inspection`, `quaterly_step_inspection`, `halfyearly_step_inspection`, `annual_step_inspection`, `monthly_step_chain_inspection`, `halfyearly_step_chain_inspection`, `annual_step_chain_inspection`, `monthly_comb_inspection`, `annual_comb_inspection`, `handrail_inspection`, `drive_chain_inspection`, `monthly_machinery_inspection`, `halfyearly_machinery_inspection`, `annual_machinery_inspection`, `monthly_brake_inspection`, `halfyearly_brake_inspection`, `monthly_safety_function`, `halfyearly_safety_function`, `monthly_operative_function`, `halfyearly_operative_function`, `annual_operative_function`, `description`, `asset_code`, `maint_type_id`, `eng_id`, `contractor`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 'Monthly Master List', 'master', 4, 0, 'master', NULL, NULL),
(2, 5, 1, 1, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '3 Monthly Master List', 'master', 5, 0, 'master', NULL, NULL),
(3, 6, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, '6 Monthly Master List', 'master', 6, 0, 'master', NULL, NULL),
(4, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Annual Master List', 'master', 7, 0, 'master', NULL, NULL),
(5, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200280017000560', 4, 11, 'JLPL', '2016-07-12', NULL),
(6, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200280017000659', 4, 12, 'JLPL', '2016-07-13', NULL),
(7, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200280017000659', 4, 12, 'JLPL', '2016-07-13', NULL),
(8, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200280017000302', 4, 12, 'JLPL', '2016-07-13', NULL),
(9, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200290017000410', 4, 12, 'JLPL', '2016-07-15', NULL),
(10, 0, 1, 1, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200290017000101', 5, 12, 'JLPL', '2016-07-15', NULL),
(11, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '0200290017000613', 7, 12, 'JLPL', '2016-07-16', NULL),
(12, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200290017000512', 4, 12, 'JLPL', '2016-07-16', NULL),
(13, 0, 1, 1, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200300017000970', 5, 12, 'JLPL', '2016-07-19', NULL),
(16, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200300017000860', 4, 12, 'JLPL', '2016-07-20', NULL),
(17, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200300017000301', 4, 12, 'JLPL', '2016-07-20', NULL),
(18, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200310017000460', 4, 12, 'JLPL', '2016-07-21', NULL),
(19, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, '', '0200310017000559', 6, 12, 'JLPL', '2016-07-21', NULL),
(20, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200310017000172', 4, 12, 'JLPL', '2016-07-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `level_id` int(2) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=76 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'Street - Concourse'),
(2, 'Street - Concourse - Up Line towards SMM'),
(3, 'Street - Concourse - Down Line towards SMM'),
(4, 'Street - Platform - Up Line Towards SMM'),
(5, 'Street - Platform - Down Line Towards SCC'),
(6, 'Street - Lower Platform - Up Line Towards SAP'),
(7, 'Street - Lower Platform - Down Line towards SAP'),
(8, 'Street - Link Bridge - Up Line'),
(9, 'Street - Link Bridge - Down Line'),
(10, 'Concourse - Link Bridge - Up Line'),
(11, 'Concourse - Link Bridge - Down Line'),
(12, 'Link Bridge - Platform - Up Line'),
(13, 'Link Bridge - Platform - Down Line'),
(14, 'Lower Platform - Upper Platform-Upline towards SMM'),
(15, 'Lower Platform-Upper Platform-Downline towards SMM'),
(16, 'Concourse - MEP'),
(17, 'Platform LHS'),
(18, 'Platform RHS'),
(19, 'Concourse LHS'),
(20, 'Concourse RHS'),
(21, 'Street Level Entrance 1'),
(22, 'Street Level Entrance 2'),
(23, 'Street Level Entrance 3'),
(24, 'Street Level Entrance 4'),
(25, 'Ancillary Building Basement'),
(26, 'Ancillary Building Ground'),
(27, 'Ancillary Building First Floor'),
(28, 'Ancillary Building Terrace'),
(29, 'TVS Vent Shaft LHS 1'),
(30, 'TVS Vent Shaft LHS 2'),
(31, 'TVS Vent Shaft RHS 1'),
(32, 'TVS Vent Shaft RHS 2'),
(33, 'VAC Vent Shaft D08 LHS'),
(34, 'VAC Vent Shaft D08 RHS'),
(35, 'Platform LHS Down Tunnel'),
(36, 'Platform LHS Up Tunnel'),
(37, 'Platform RHS Down Tunnel'),
(38, 'Platform RHS Up Tunnel'),
(39, 'Concourse SCR'),
(40, 'OCC Theatre'),
(41, 'OCC CER3'),
(42, 'Airport Tunnel Airport Side'),
(43, 'Airport Tunnel OTA Side'),
(44, 'Mayday Park Up Tunnel'),
(45, 'Mayday Park Down Tunnel'),
(46, 'Portal Up Tunnel'),
(47, 'Portal Down Tunnel'),
(48, 'UPE Duct Down Line'),
(49, 'UPE Duct Up Line'),
(50, 'OTE Duct Down Line'),
(51, 'OTE Duct Up Line'),
(52, 'Concourse - LHS M09.1'),
(53, 'Concourse - RHS  M09.2'),
(54, 'Platform - LHS  M09.3'),
(55, 'Platform - RHS M09.4'),
(56, 'Ancillary Building Chiller Plant Room M05'),
(57, 'VAC - Critical Equipment Rooms'),
(58, 'Street - FOB / Skywalk'),
(59, 'Concourse - Platform - upline towards SMM'),
(60, 'Concourse - Platform - downline towards SMM'),
(61, 'Platform - FOB'),
(62, 'Concourse - FOB - downline'),
(63, 'Street - Platform - Up Line Towards SCC'),
(64, 'Street - Platform - Down Line Towards SMM'),
(65, 'Street - Lower Platform - Up Line Towards SWA'),
(66, 'Street - Lower Platform - Down Line towards SWA'),
(67, 'Lower Platform - Upper Platform-Upline towards SCC'),
(68, 'Lower Platform-Upper Platform-Downline towards SCC'),
(69, 'Street - Concourse - Up Line towards SCC'),
(70, 'Concourse - Platform - upline towards SCC'),
(71, 'Concourse - Platform - downline towards SCC'),
(72, 'Street - Concourse - Down Line towards SCC'),
(73, 'Street - FOB MMC side'),
(74, 'Street - FOB Park Station side'),
(75, 'Ground - sixth floor');

-- --------------------------------------------------------

--
-- Table structure for table `lift`
--

CREATE TABLE IF NOT EXISTS `lift` (
  `lift_id` int(4) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL,
  `monthly_cleaning_list` int(1) NOT NULL DEFAULT '0',
  `quaterly_cleaning_list` int(1) NOT NULL DEFAULT '0',
  `halfyearly_cleaning_list` int(1) NOT NULL DEFAULT '0',
  `lubricate` int(1) NOT NULL DEFAULT '0',
  `monthly_visual_check` int(1) NOT NULL DEFAULT '0',
  `halfyearly_visual_check` int(1) NOT NULL DEFAULT '0',
  `annual_visual_check` int(1) NOT NULL DEFAULT '0',
  `monthly_hoistway_inspection` int(1) NOT NULL DEFAULT '0',
  `quaterly_hoistway_inspection` int(1) NOT NULL DEFAULT '0',
  `halfyearly_hoistway_inspection` int(1) NOT NULL DEFAULT '0',
  `monthly_door_inspection` int(1) NOT NULL DEFAULT '0',
  `quaterly_door_inspection` int(1) NOT NULL DEFAULT '0',
  `monthly_car_cabin_inspection` int(1) NOT NULL DEFAULT '0',
  `annual_car_cabin_inspection` int(1) NOT NULL DEFAULT '0',
  `monthly_safety_function` int(1) NOT NULL DEFAULT '0',
  `halfyearly_safety_function` int(1) NOT NULL DEFAULT '0',
  `annual_safety_function` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`lift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `lift`
--

INSERT INTO `lift` (`lift_id`, `freq_id`, `monthly_cleaning_list`, `quaterly_cleaning_list`, `halfyearly_cleaning_list`, `lubricate`, `monthly_visual_check`, `halfyearly_visual_check`, `annual_visual_check`, `monthly_hoistway_inspection`, `quaterly_hoistway_inspection`, `halfyearly_hoistway_inspection`, `monthly_door_inspection`, `quaterly_door_inspection`, `monthly_car_cabin_inspection`, `annual_car_cabin_inspection`, `monthly_safety_function`, `halfyearly_safety_function`, `annual_safety_function`, `description`, `asset_code`, `maint_type_id`, `eng_id`, `contractor`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 'Monthly Master List', 'master', 4, 0, 'master', NULL, NULL),
(2, 5, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 1, 0, 1, 0, 0, '3 Monthly Master List', 'master', 5, 0, 'master', NULL, NULL),
(3, 6, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, '6 Monthly Master List', 'master', 6, 0, 'master', NULL, NULL),
(4, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Annual Master List', 'master', 7, 0, 'master', NULL, NULL),
(7, 4, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200280018000269', 4, 10, 'JLPL', '2016-07-12', NULL),
(8, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200280018000103', 4, 10, 'JLPL', '2016-07-12', NULL),
(10, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 1, 0, 1, 0, 0, '', '0200280018000360', 5, 10, 'JLPL', '2016-07-13', NULL),
(11, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200280018000470', 4, 10, 'JLPL', '2016-07-13', NULL),
(23, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200290018000108', 4, 10, 'JLPL', '2016-07-14', NULL),
(31, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '0200290018000612', 7, 10, 'JLPL', '2016-07-15', NULL),
(35, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200290018000713', 4, 10, 'JLPL', '2016-07-16', NULL),
(36, 4, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200290018000713', 4, 10, 'JLPL', '2016-07-16', NULL),
(37, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200290018000809', 4, 10, 'JLPL', '2016-07-18', NULL),
(38, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 1, 0, 1, 0, 0, '', '0200300018000101', 5, 10, 'JLPL', '2016-07-19', NULL),
(40, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200300018000260', 4, 10, 'JLPL', '2016-07-20', NULL),
(41, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200300018000370', 4, 10, 'JLPL', '2016-07-21', NULL),
(42, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, '', '0200310018000103', 6, 10, 'JLPL', '2016-07-22', NULL),
(43, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, '', '0200310018000269', 4, 10, 'JLPL', '2016-07-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locate_api_controller`
--

CREATE TABLE IF NOT EXISTS `locate_api_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_name` varchar(50) NOT NULL,
  `view_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `locate_api_controller`
--

INSERT INTO `locate_api_controller` (`id`, `equipment_name`, `view_name`) VALUES
(1, 'Tunnel Ventilation Fan', 'tunnel-ventilation-fan'),
(2, 'Tunnel Exhaust Fan', 'tunnel-exhaust-fan'),
(3, 'Tunnel Ventilation Damper', 'tunnel-ventilation-damper'),
(4, 'Draught Relief Damper', 'draught-relief-damper'),
(5, 'Trackway Exhaust Damper', 'trackway-exhaust-damper'),
(6, 'Tunnel Ventilation Fan Cone', 'tunnel-ventilation-fan-cone'),
(7, 'Trackway Exhaust Fan Cone', 'trackway-exhaust-fan-cone'),
(8, 'TVF Sound Attenuator', 'tvf-sound-attenuator'),
(9, 'TEF Sound Attenuator', 'tef-sound-attenuator'),
(10, 'Tunnel Booster Fan', 'tunnel-booster-fan'),
(11, 'TVF VSD', 'tvf-vsd'),
(12, 'Motor Control Centre', 'motor-control-centre'),
(13, 'Damper Distribution Board', 'damper-distribution-board'),
(14, 'Ventilation Control Panel', 'ventilation-control-panel'),
(15, 'TVS Distribution Board', 'tvs-distribution-board'),
(16, 'TEF VSD', 'tef-vsd'),
(17, 'Lift', 'lift'),
(18, 'Escalator', 'escalator');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_contracts`
--

CREATE TABLE IF NOT EXISTS `maintenance_contracts` (
  `mcntrct_id` int(11) NOT NULL AUTO_INCREMENT,
  `mcntrct_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contract_amount_in_inr` decimal(20,2) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `LOA_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mcntrct_live` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mcntrct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_frequency`
--

CREATE TABLE IF NOT EXISTS `maintenance_frequency` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL,
  `frequency` varchar(25) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `maintenance_frequency`
--

INSERT INTO `maintenance_frequency` (`id`, `freq_id`, `frequency`, `description`) VALUES
(1, 0, 'workorderSaved', 'Generated work order is saved with this frequency code'),
(2, 1, 'maint_daily', NULL),
(3, 2, 'maint_weekly', NULL),
(4, 3, 'maint_fortnightly', NULL),
(5, 4, 'maint_monthly', NULL),
(6, 5, 'maint_quaterly', NULL),
(7, 6, 'maint_biannual', NULL),
(8, 7, 'maint_annual', NULL),
(9, 8, 'maint_biennial', NULL),
(10, 9, 'maint_triennial', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_next_due`
--

CREATE TABLE IF NOT EXISTS `maintenance_next_due` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maint_daily` date NOT NULL DEFAULT '3099-12-12',
  `maint_weekly` date NOT NULL DEFAULT '3099-12-12',
  `maint_fortnightly` date NOT NULL DEFAULT '3099-12-12',
  `maint_monthly` date NOT NULL DEFAULT '3099-12-12',
  `maint_quaterly` date NOT NULL DEFAULT '3099-12-12',
  `maint_biannual` date NOT NULL DEFAULT '3099-12-12',
  `maint_annual` date NOT NULL DEFAULT '3099-12-12',
  `maint_biennial` date NOT NULL DEFAULT '3099-12-12',
  `maint_triennial` date NOT NULL DEFAULT '3099-12-12',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `maintenance_next_due`
--

INSERT INTO `maintenance_next_due` (`id`, `asset_code`, `controller`, `maint_daily`, `maint_weekly`, `maint_fortnightly`, `maint_monthly`, `maint_quaterly`, `maint_biannual`, `maint_annual`, `maint_biennial`, `maint_triennial`) VALUES
(1, '0200260018000101', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-01', '2016-09-01', '2016-12-01', '2017-06-01', '2018-06-01', '2019-06-01'),
(2, '0200260017000101', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-05', '2016-09-01', '2016-12-01', '2017-06-01', '2017-06-01', '2018-06-01'),
(3, '0200260018000262', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-02', '2016-08-02', '2016-11-02', '2017-05-02', '2018-05-02', '2019-05-02'),
(4, '0200260018000361', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-05', '2016-10-05', '2016-10-03', '2017-04-03', '2018-04-03', '2019-04-03'),
(5, '0200260018000458', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '3099-12-12', '3099-12-12', '3099-12-12', '3099-12-12', '3099-12-12', '3099-12-12'),
(6, '0200260017000201', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-01', '2016-08-01', '2016-11-01', '2017-05-01', '2018-05-01', '2019-05-01'),
(7, '0200260017000301', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-05', '2016-10-05', '2016-10-03', '2017-04-03', '2018-04-03', '2019-04-03'),
(8, '0200260017000460', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-02', '2016-12-02', '2016-09-02', '2017-03-02', '2018-03-02', '2019-03-02'),
(9, '0200260017000560', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-05', '2016-11-03', '2016-08-03', '2017-02-03', '2018-02-03', '2019-02-03'),
(10, '0200260017000660', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-03', '2016-10-03', '2017-07-03', '2017-01-03', '2018-01-03', '2019-01-03'),
(11, '0200140018000105', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-27', '2016-10-05', '2017-03-27', '2016-09-27', '2017-09-27', '2018-06-27'),
(12, '0200140018000264', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-27', '2016-11-27', '2017-02-27', '2016-08-27', '2017-08-27', '2018-08-27'),
(13, '0200140018000363', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-28', '2016-10-28', '2017-01-28', '2016-07-28', '2017-07-28', '2018-07-28'),
(14, '0200140018000404', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-29', '2016-09-29', '2016-12-29', '2017-06-29', '2017-06-29', '2018-06-29'),
(15, '0100140017000665', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-26', '2016-09-26', '2017-06-26', '2016-12-26', '2017-12-26', '2018-12-26'),
(16, '0100140017000866', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-26', '2016-08-26', '2016-05-26', '2016-11-26', '2017-11-26', '2018-11-26'),
(17, '0100140017001007', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-27', '2016-07-27', '2017-04-27', '2016-10-27', '2017-10-27', '2018-10-27'),
(18, '0100140017001206', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-27', '2016-12-27', '2017-03-27', '2016-09-27', '2017-09-27', '2018-09-27'),
(19, '0200140017001868', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-28', '2016-11-28', '2017-02-26', '2016-08-28', '2017-08-28', '2018-08-28'),
(20, '0200140017002067', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-28', '2016-10-28', '2017-01-28', '2016-07-28', '2017-07-28', '2018-07-28'),
(21, '0200140017002214', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-29', '2016-09-29', '2016-12-29', '2017-06-29', '3099-12-12', '3099-12-12'),
(22, '0200140017002415', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-29', '2016-08-29', '2016-11-29', '2016-05-29', '3099-12-12', '3099-12-12'),
(23, '0200270018000101', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-05', '2016-12-03', '2016-09-03', '2017-03-03', '3099-12-12', '3099-12-12'),
(24, '0200270018000260', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-04', '2016-11-04', '2016-08-04', '2017-02-04', '2018-02-04', '2019-02-04'),
(25, '0200270018000370', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-05', '2016-10-05', '2017-07-05', '2017-01-05', '3099-12-12', '3099-12-12'),
(26, '0200270017000101', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-03', '2016-09-03', '2017-06-03', '2016-12-03', '3099-12-12', '3099-12-12'),
(27, '0200270017000260', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-03', '2016-08-03', '2017-05-03', '2016-11-03', '3099-12-12', '3099-12-12'),
(28, '0200270017000370', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-04', '2017-01-04', '2017-04-04', '2016-10-04', '3099-12-12', '3099-12-12'),
(29, '0200270017000401', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-04', '2016-12-04', '2017-03-04', '2016-09-04', '3099-12-12', '3099-12-12'),
(30, '0200270017000570', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-05', '2016-11-05', '2017-02-05', '2016-08-05', '3099-12-12', '3099-12-12'),
(31, '0200270017000659', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-05', '2016-10-05', '2017-01-05', '2017-07-05', '2018-07-05', '2019-07-05'),
(32, '0200270017000771', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-06', '2016-09-06', '2016-12-06', '2017-06-06', '2018-06-06', '2019-06-06'),
(33, '0200270017000860', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-06', '2016-08-06', '2016-11-06', '2017-05-06', '2018-05-06', '2019-05-06'),
(34, '0200280018000103', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-07', '2016-09-07', '2017-01-05', '2016-12-07', '2017-12-07', '2018-12-07'),
(35, '0200280018000269', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-08', '2016-08-08', '2017-05-08', '2016-11-08', '2017-11-08', '2018-11-08'),
(36, '0200280018000360', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-08', '2017-01-08', '2017-04-08', '2016-10-08', '2017-10-08', '2018-10-08'),
(37, '0200280018000470', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-09', '2016-12-09', '2017-03-09', '2016-09-09', '2017-09-09', '2018-09-09'),
(38, '0200290018000108', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-12', '2016-11-12', '2017-02-12', '2016-08-12', '2017-08-12', '2018-08-12'),
(39, '0200290018000612', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-13', '2016-10-13', '2017-03-13', '2017-07-13', '2018-07-13', '2019-07-13'),
(40, '0200290018000713', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-14', '2016-09-14', '2016-12-14', '2017-06-14', '2018-06-14', '2019-06-14'),
(41, '0200290018000809', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-18', '2016-08-15', '2016-11-15', '2017-05-15', '3099-12-12', '3099-12-12'),
(42, '0200290017000101', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-14', '2016-07-14', '2017-04-14', '2016-10-14', '3099-12-12', '3099-12-12'),
(43, '0200290017000410', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-14', '2016-12-14', '2017-03-14', '2016-09-14', '2017-09-14', '2018-09-14'),
(44, '0200290017000512', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-15', '2016-11-15', '2017-02-15', '2016-08-15', '2017-08-15', '2018-08-15'),
(45, '0200290017000613', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-15', '2016-10-15', '2017-01-15', '2016-07-15', '3099-12-12', '3099-12-12'),
(46, '0200300018000101', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-15', '2016-10-19', '2016-10-15', '2017-04-15', '3099-12-12', '3099-12-12'),
(47, '0200300018000260', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-20', '2016-12-18', '2016-09-18', '2017-03-18', '3099-12-12', '3099-12-12'),
(48, '0200300018000370', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-21', '2016-11-20', '2016-08-20', '2017-02-20', '3099-12-12', '3099-12-12'),
(49, '0200300017000301', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-20', '2016-09-16', '2016-12-16', '2017-06-16', '2018-06-16', '2019-06-16'),
(50, '0200300017000860', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-20', '2016-08-17', '2016-11-17', '2017-05-17', '2018-05-17', '2019-05-17'),
(51, '0200300017000970', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-18', '2016-10-19', '2016-10-18', '2017-04-18', '3099-12-12', '3099-12-12'),
(52, '0200310018000103', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-21', '2016-10-21', '2017-01-22', '2017-01-21', '3099-12-12', '3099-12-12'),
(53, '0200310018000269', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-23', '2016-09-22', '2017-06-22', '2016-12-22', '3099-12-12', '3099-12-12'),
(54, '0200310018000360', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-23', '2016-08-23', '2017-05-23', '2016-11-23', '3099-12-12', '3099-12-12'),
(55, '0200310018000470', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-24', '2016-07-24', '2017-04-24', '2016-10-24', '3099-12-12', '3099-12-12'),
(56, '0200310017000172', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-22', '2016-12-20', '2016-09-20', '2017-03-20', '3099-12-12', '3099-12-12'),
(57, '0200310017000460', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-21', '2017-11-21', '2016-08-21', '2017-02-21', '3099-12-12', '3099-12-12'),
(58, '0200310017000559', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-20', '2016-10-20', '2017-01-21', '2017-01-20', '3099-12-12', '3099-12-12'),
(59, '0200280017000103', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-08', '2017-01-08', '2016-10-08', '2017-04-08', '2018-04-08', '2019-04-08'),
(60, '0200280017000203', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-08', '2016-12-08', '2016-09-08', '2017-03-08', '2018-03-08', '2019-03-08'),
(61, '0200280017000302', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-09', '2016-11-09', '2016-08-09', '2017-02-09', '2018-02-09', '2019-02-09'),
(62, '0200280017000460', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-11', '2016-10-09', '2016-07-11', '2017-07-11', '2018-07-11', '2019-07-11'),
(63, '0200280017000560', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-08-10', '2016-09-11', '2017-06-11', '2016-12-11', '2017-12-11', '2018-12-11'),
(64, '0200280017000659', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-09-11', '2016-08-11', '2017-05-11', '2016-11-11', '2017-11-11', '2018-11-11'),
(65, '0200040017000773', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-06-10', '2016-11-10', '2016-08-10', '2017-04-10', '3099-12-12', '3099-12-12'),
(66, '0200040017001174', 'escalator', '3099-12-12', '3099-12-12', '3099-12-12', '2016-07-10', '2016-06-10', '2016-09-10', '2017-03-10', '3099-12-12', '3099-12-12'),
(67, '0300260018000175', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-06-24', '2016-08-24', '2016-11-24', '2017-05-24', '3099-12-12', '3099-12-12'),
(68, '0300260018000275', 'lift', '3099-12-12', '3099-12-12', '3099-12-12', '2016-06-25', '2016-07-25', '2016-10-25', '2017-04-25', '3099-12-12', '3099-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_sheet_master`
--

CREATE TABLE IF NOT EXISTS `maintenance_sheet_master` (
  `msheet_id` int(11) NOT NULL AUTO_INCREMENT,
  `msheet_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `equip_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `periodicity_days` int(4) NOT NULL,
  `time_alloted_hrs` int(4) NOT NULL,
  `manpower` int(2) NOT NULL,
  `spl_tool_req` int(1) NOT NULL DEFAULT '0',
  `major_maintenance` int(1) NOT NULL DEFAULT '0',
  `minor_maintenance` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msheet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_types`
--

CREATE TABLE IF NOT EXISTS `maintenance_types` (
  `maint_type_id` int(2) DEFAULT NULL,
  `maint_type_id_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manuf_id` int(5) NOT NULL AUTO_INCREMENT,
  `ename_id` int(4) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_person` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`manuf_id`),
  KEY `manufacturer_ibfk_1` (`ename_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manuf_id`, `ename_id`, `name`, `country`, `contact_person`, `contact_phone`, `contact_email`) VALUES
(1, 17, 'SJEC', 'China', 'David Jin', '+18934597987', 'david.jin@sjec.com.cn'),
(2, 18, 'JLPL', 'India', 'Kartikeyan', '+919381923779', 'vk@johnsonliftsltd.com');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1461130611),
('m140209_132017_init', 1462510841),
('m140403_174025_create_account_table', 1462510842),
('m140504_113157_update_tables', 1462510844),
('m140504_130429_create_token_table', 1462510845),
('m140830_171933_fix_ip_field', 1462510845),
('m140830_172703_change_account_table_name', 1462510845),
('m141222_110026_update_ip_field', 1462510845),
('m141222_135246_alter_username_length', 1462510846),
('m150614_103145_update_social_account_table', 1462510847),
('m150623_212711_fix_username_notnull', 1462510847);

-- --------------------------------------------------------

--
-- Table structure for table `sms_recipient`
--

CREATE TABLE IF NOT EXISTS `sms_recipient` (
  `sms_id` int(4) NOT NULL AUTO_INCREMENT,
  `ename_id` int(4) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sms_id`),
  KEY `sms_recepient_ibfk_1` (`ename_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sms_recipient`
--

INSERT INTO `sms_recipient` (`sms_id`, `ename_id`, `mobile`, `email`) VALUES
(1, 18, '+919445868313', 'cgmei.cmrl@tn.gov.in'),
(2, 18, '+919445868200', 'jgmle.cmrl@tn.gov.in'),
(3, 17, '+919445868313', 'cgmei.cmrl@tn.gov.in'),
(4, 17, '+919445868200', 'jgmle.cmrl@tn.gov.in'),
(5, 17, '+919445893857', 'balacmrl@gmail.com'),
(6, 17, '+919445893853', 'ps.purusoth@yahoo.com'),
(7, 18, '+919445893857', 'balacmrl@gmail.com'),
(8, 18, '+919445893853', 'ps.purusoth@yahoo.com'),
(9, 18, '+919445868317', 'amle@cmrl.gov.in'),
(10, 17, '+919445868317', 'amle@cmrl.gov.in'),
(11, 18, '+917338725192', 'manojkumar.cmrl@johnsonliftsltd.com'),
(12, 17, '+917338725192', 'manojkumar.cmrl@johnsonliftsltd.com');

-- --------------------------------------------------------

--
-- Table structure for table `station_code`
--

CREATE TABLE IF NOT EXISTS `station_code` (
  `stn_id` int(4) NOT NULL AUTO_INCREMENT,
  `station_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `station_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corr_id` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`stn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `station_code`
--

INSERT INTO `station_code` (`stn_id`, `station_name`, `station_code`, `corr_id`) VALUES
(1, 'Washermenpet Metro', 'SWA', 1),
(2, 'Mannadi', 'SMA', 1),
(3, 'High Court', 'SHC', 1),
(4, 'Central metro', 'SCC', 1),
(5, 'Government Estate', 'SGE', 1),
(6, 'LIC', 'SLI', 1),
(7, 'Thousand Lights', 'STL', 1),
(8, 'AG - DMS', 'SGM', 1),
(9, 'Teynampet', 'STE', 1),
(10, 'Nandanam', 'SCR', 1),
(11, 'Saidapet Metro', 'SSA', 1),
(12, 'Little Mount', 'SLM', 1),
(13, 'Guindy Metro', 'SGU', 1),
(14, 'Alandur', 'SAL', 1),
(15, 'Nanganallur Road', 'SOT', 1),
(16, 'Meenambakkam Metro', 'SME', 1),
(17, 'Airport', 'SAP', 1),
(18, 'Egmore Metro', 'SEG', 2),
(19, 'Nehru Park', 'SNP', 2),
(20, 'Kilpauk', 'SKM', 2),
(21, 'Pachaiyappa''s College', 'SPC', 2),
(22, 'Shenoy Nagar', 'SSN', 2),
(23, 'Anna Nagar East', 'SAE', 2),
(24, 'Anna Nagar Tower', 'SAT', 2),
(25, 'Thirumangalam', 'STI', 2),
(26, 'Koyambedu', 'SKO', 2),
(27, 'CMBT', 'SCM', 2),
(28, 'Arumbakkam', 'SAR', 2),
(29, 'Vadapalani', 'SVA', 2),
(30, 'Ashok Nagar', 'SAN', 2),
(31, 'Ekkattuthangal', 'SSI', 2),
(32, 'St. Thomas Mount Metro', 'SMM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tunnel_ventilation_damper`
--

CREATE TABLE IF NOT EXISTS `tunnel_ventilation_damper` (
  `tvd_id` int(4) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL,
  `actuator_cam_check` int(1) DEFAULT '0',
  `actuator_cam_setting` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blades_cleaned` int(1) DEFAULT '0',
  `linkages_check` int(1) DEFAULT '0',
  `linkage_moving_smooth` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manual_close_open_check` int(1) DEFAULT '0',
  `actuator_spring_tightness` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frame_nuts_tightness_check` int(1) DEFAULT '0',
  `frame_corroded` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `actuator_wiring_ok` int(1) DEFAULT '0',
  `blades_open_alignment_ok` int(1) DEFAULT '0',
  `blades_close_alignment_ok` int(1) DEFAULT '0',
  `close_open_sound` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `limit_switch_signal_check` int(1) DEFAULT '0',
  `physical_inspection` int(1) DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`tvd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tunnel_ventilation_damper`
--

INSERT INTO `tunnel_ventilation_damper` (`tvd_id`, `freq_id`, `actuator_cam_check`, `actuator_cam_setting`, `blades_cleaned`, `linkages_check`, `linkage_moving_smooth`, `manual_close_open_check`, `actuator_spring_tightness`, `frame_nuts_tightness_check`, `frame_corroded`, `actuator_wiring_ok`, `blades_open_alignment_ok`, `blades_close_alignment_ok`, `close_open_sound`, `limit_switch_signal_check`, `physical_inspection`, `description`, `asset_code`, `maint_type_id`, `eng_id`, `contractor`, `created_at`, `updated_at`) VALUES
(1, 2, 0, '', 0, 0, '', 0, '', 0, '', 0, 0, 0, '', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 5, 1, 'yes', 1, 1, 'yes', 1, 'yes', 1, 'yes', 1, 1, 1, 'yes', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tunnel_ventilation_fan`
--

CREATE TABLE IF NOT EXISTS `tunnel_ventilation_fan` (
  `tvf_id` int(4) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL,
  `check_impeller_blade` int(1) DEFAULT '0',
  `check_impeller_wing_root` int(1) DEFAULT '0',
  `impeller_blade_condition` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clean_motor_casing` int(1) DEFAULT '0',
  `lubricate_motor` int(1) DEFAULT '0',
  `electrical_insulation` int(1) DEFAULT '0',
  `electrical_terminal` int(1) DEFAULT '0',
  `check_manual_operation` int(1) DEFAULT '0',
  `check_emergency_stop` int(1) DEFAULT '0',
  `check_flexible_connector` int(1) DEFAULT '0',
  `vibration_isolater_level` int(1) DEFAULT '0',
  `physical_inspection` int(1) DEFAULT '0',
  `noise_level_in_db` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fan_vibration_reading` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blade_tip_clearance_reading` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`tvf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tunnel_ventilation_fan`
--

INSERT INTO `tunnel_ventilation_fan` (`tvf_id`, `freq_id`, `check_impeller_blade`, `check_impeller_wing_root`, `impeller_blade_condition`, `clean_motor_casing`, `lubricate_motor`, `electrical_insulation`, `electrical_terminal`, `check_manual_operation`, `check_emergency_stop`, `check_flexible_connector`, `vibration_isolater_level`, `physical_inspection`, `noise_level_in_db`, `fan_vibration_reading`, `blade_tip_clearance_reading`, `description`, `asset_code`, `maint_type_id`, `eng_id`, `contractor`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 4, 1, 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 5, 1, 0, '', 1, 1, 0, 1, 0, 0, 1, 0, 1, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 6, 1, 1, 'yes', 1, 1, 1, 1, 1, 0, 1, 1, 1, 'yes', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 7, 1, 1, 'yes', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'yes', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-05-27', NULL),
(7, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-03', NULL),
(8, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-03', NULL),
(9, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-03', NULL),
(10, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-03', NULL),
(11, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-03', NULL),
(12, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-06', NULL),
(13, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-06', NULL),
(14, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organisation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `last_login` date DEFAULT NULL,
  `last_latitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT '13.0738342',
  `last_longitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT '80.1933406',
  `status` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `mobile`, `organisation`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `last_login`, `last_latitude`, `last_longitude`, `status`) VALUES
(1, 'cgmei', 'cgmei.cmrl@tn.gov.in', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', '9445868000', 'CMRL', 'm2TkBSlAQKNMIEEyp8iwxMkDbXft8f2L', 1462530139, NULL, NULL, NULL, 0, 1469082326, '2016-07-21', '13.0741214', '80.1940104', 10),
(2, 'jgmtvs', 'jgmtvs.cmrl@tn.gov.in', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', '9445868000', 'CMRL', 'MBhbEF1e1k8TimYKWYocCOTGVlz6DGyN', NULL, NULL, 1462530146, NULL, 0, 1465056650, '2016-06-04', '13.0737921', '80.1937575', 10),
(3, 'admin', 'admin.cmrl@tn.gov.in', '$2a$10$vCkYc3H9OvSVt9n.R/mi3ORO2.89CJvZnj1AfYxhBGS.xlSOBfwlO', '9445868313', 'CMRL', 'w5Tn7c2x6cQD-tbe17svdH1ZTvI8iD7B', 1462530159, 'cgmei.cmrl@tn.gov.in', NULL, NULL, 0, 0, '0000-00-00', '13.0738342', '80.1937575', 10),
(4, 'madhavan', 'jgmle@cmrl.gov.in', '$2y$13$iSVpdo1eyqRyOQ47IhYBMeiWE63.J4juXazf/klhTL22ppr3N0d8y', '9445868200', 'CMRL', 'dO7wdvWATCu2bnUf-TncF9MNlZWDLHfG', NULL, NULL, NULL, '218.248.28.146', 1465542817, 1467012542, '2016-06-27', '13.0738875', '80.1934564', 10),
(5, 'pspurusoth', 'ps.purusoth@yahoo.com', '$2y$13$JlEe5R/KOu0sYEorFZUErepXyzvhY1mgLffNSyb8G6uSmqPmy1JXC', '9884269759', 'CMRL', 'ioVTEz0Jmi7-m4QyiJkpZOuCcP0M3SIz', NULL, NULL, NULL, '218.248.28.146', 1466165007, 1467273159, '2016-06-30', '13.0740547', '80.1747771', 10),
(6, 'balamurugan', 'balacmrl@gmail.com', '$2y$13$X4sbRqXwXGt8BlQZ6OfWa.PPdPx4qbVHaXfFArKmUoDUrwtJcr2/a', '9445893857', 'CMRL', '_6ABwdnfqRoe6RPWxUGqQZyBOP80aX2H', NULL, NULL, NULL, '218.248.28.146', 1466499402, 1467286253, '2016-06-30', '13.0735909', '80.1939193', 10),
(7, 'Premkumar', 'amle@cmrl.gov.in', '$2y$13$6iQxAl2olboAA9WXqv7tnuKdMpJTC4XZkPNcb3it1Sp3PA7JBg9QC', '9445868317', 'CMRL', 'nfAssCZcuKwfyJ1beEMMrEHL7I7hp1xm', NULL, NULL, NULL, '218.248.28.146', 1467011551, 1469094689, '2016-07-21', '13.0740076', '80.1939665', 10),
(8, 'Manoj Kumar', 'manojkumar.cmrl@johnsonliftsltd.com', '$2y$13$D.Izt1ngQuXzIhXqIKqGc.wc8YK36NCYa.G2qKTO44QtWc3hoAydm', '7338725192', 'JLPL', 'hnor9mGzQ3kQxC63GS-MZe68GmLjbyJh', NULL, NULL, NULL, '218.248.28.146', 1467011748, 1467629155, '2016-07-04', '13.0971401', '80.1976556', 10),
(9, 'Nandakumar', 'nandabagayam@gmail.com', '$2y$13$BPrlbKQaCbQs4EQxVQhUE.YE.nQz4rXXMvOLyOfxplD3cAkFJQtb6', '+919894789333', 'JLPL', 'a7KfBLY2l14zylE3-Qbm-uX7ncUcCmMA', NULL, NULL, NULL, '218.248.28.146', 1467185408, 1467185408, '2016-06-29', '13.0738342', '80.1937575', 10),
(10, 'Dillibabu', 'sdillibabu623@gmail.com', '$2y$13$xhURa/gwR6AgixxCRHm1euJ30v2.xzuvrFx6151TOkIv82wkTaeTa', '+917358777810', 'JLPL', 'ojbMSZSxVitu4Am7laMNvT1Za3rZcO3-', NULL, NULL, NULL, '218.248.28.146', 1467185631, 1469245373, '2016-07-23', '13.0168537', '80.2054638', 10),
(11, 'Rajendran', 'rajendran93455@gmaul.com', '$2y$13$ocATuBIJ.yRVGJBB0CMUW.qceEPPJz7VEgRVsdZfXlLk4i2aDECja', '+919962092848', 'JLPL', 'y3czwrbIAoaUXd0CFO6F-brsTL9Qf7HU', NULL, NULL, NULL, '218.248.28.146', 1467185769, 1468839583, '2016-07-18', '13.0608141', '80.2103447', 10),
(12, 'Sadhasivam', 'sadhasivam.ps@gmail.com', '$2y$13$bbJi0JfB9yKmq97btQ46XebUy04Kw7vzWSfvfQUtwUVBqvnUJRC/C', '+919944110413', 'JLPL', '4yd13c_c1vDlvfsxlXLL0ccEmD8T0Hnk', NULL, NULL, NULL, '218.248.28.146', 1467185910, 1469315638, '2016-07-23', '13.0035201', '80.2002739', 10);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`corr_id`) REFERENCES `corridor` (`corr_id`),
  ADD CONSTRAINT `equipment_ibfk_2` FOREIGN KEY (`ename_id`) REFERENCES `equipment_name` (`ename_id`),
  ADD CONSTRAINT `equipment_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`),
  ADD CONSTRAINT `equipment_ibfk_4` FOREIGN KEY (`stn_id`) REFERENCES `station_code` (`stn_id`);

--
-- Constraints for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD CONSTRAINT `manufacturer_ibfk_1` FOREIGN KEY (`ename_id`) REFERENCES `equipment_name` (`ename_id`);

--
-- Constraints for table `sms_recipient`
--
ALTER TABLE `sms_recipient`
  ADD CONSTRAINT `sms_recipient_ibfk_1` FOREIGN KEY (`ename_id`) REFERENCES `equipment_name` (`ename_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

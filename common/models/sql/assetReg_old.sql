-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2016 at 06:59 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
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
('operator', '1', 1463383129);

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
-- Table structure for table `corridor`
--

CREATE TABLE IF NOT EXISTS `corridor` (
  `corr_id` int(2) NOT NULL AUTO_INCREMENT,
  `corr_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`corr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `corridor`
--

INSERT INTO `corridor` (`corr_id`, `corr_name`) VALUES
(1, 'Corridor 1'),
(2, 'Corridor 2');

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE IF NOT EXISTS `engineer` (
  `eng_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `mcntrct_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`eng_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

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
(18, 'LIFT', 0, 0, 0, 1, 1, 1, 1, 0, 0);

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
  `quaterly_visual_check` int(1) NOT NULL DEFAULT '4',
  `halfyearly_visual_check` int(1) NOT NULL DEFAULT '4',
  `annual_visual_check` int(1) NOT NULL DEFAULT '4',
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
  `contractor` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`escl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `escalator`
--

INSERT INTO `escalator` (`escl_id`, `freq_id`, `clean_component_list`, `lubricate_chains`, `grease_shaft_bushes`, `quaterly_visual_check`, `halfyearly_visual_check`, `annual_visual_check`, `monthly_step_inspection`, `quaterly_step_inspection`, `halfyearly_step_inspection`, `annual_step_inspection`, `monthly_step_chain_inspection`, `halfyearly_step_chain_inspection`, `annual_step_chain_inspection`, `monthly_comb_inspection`, `annual_comb_inspection`, `handrail_inspection`, `drive_chain_inspection`, `monthly_machinery_inspection`, `halfyearly_machinery_inspection`, `annual_machinery_inspection`, `monthly_brake_inspection`, `halfyearly_brake_inspection`, `monthly_safety_function`, `halfyearly_safety_function`, `monthly_operative_function`, `halfyearly_operative_function`, `annual_operative_function`, `description`, `asset_code`, `maint_type_id`, `eng_id`, `contractor`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 5, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 6, 1, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 7, 1, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `level_id` int(2) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'Street - Concourse'),
(2, 'Street - Concourse - Up Line'),
(3, 'Street - Concourse - Down Line'),
(4, 'Street - Platform - Up Line'),
(5, 'Street - Platform - Down Line'),
(6, 'Street - Lower Platform - Up Line'),
(7, 'Street - Lower Platform - Down Line'),
(8, 'Street - Link Bridge - Up Line'),
(9, 'Street - Link Bridge - Down Line'),
(10, 'Concourse - Link Bridge - Up Line'),
(11, 'Concourse - Link Bridge - Down Line'),
(12, 'Link Bridge - Platform - Up Line'),
(13, 'Link Bridge - Platform - Down Line'),
(14, 'Lower Platform - Upper Platform - Up Line'),
(15, 'Lower Platform - Upper Platform - Down Line'),
(16, 'OCC Building Lift'),
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
(57, 'VAC - Critical Equipment Rooms');

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
  `monthly_visual_check` int(1) NOT NULL DEFAULT '4',
  `halfyearly_visual_check` int(1) NOT NULL DEFAULT '4',
  `annual_visual_check` int(1) NOT NULL DEFAULT '4',
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
  `contractor` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`lift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lift`
--

INSERT INTO `lift` (`lift_id`, `freq_id`, `monthly_cleaning_list`, `quaterly_cleaning_list`, `halfyearly_cleaning_list`, `lubricate`, `monthly_visual_check`, `halfyearly_visual_check`, `annual_visual_check`, `monthly_hoistway_inspection`, `quaterly_hoistway_inspection`, `halfyearly_hoistway_inspection`, `monthly_door_inspection`, `quaterly_door_inspection`, `monthly_car_cabin_inspection`, `annual_car_cabin_inspection`, `monthly_safety_function`, `halfyearly_safety_function`, `annual_safety_function`, `description`, `asset_code`, `maint_type_id`, `eng_id`, `contractor`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 5, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 6, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'Tunnel Ventilation Fan', 'tunnel-ventilation-fans'),
(2, 'Tunnel Exhaust Fan', 'tunnel-exhaust-fans'),
(3, 'Tunnel Ventilation Damper', 'tunnel-ventilation-dampers'),
(4, 'Draught Relief Damper', 'draught-relief-dampers'),
(5, 'Trackway Exhaust Damper', 'trackway-exhaust-dampers'),
(6, 'Tunnel Ventilation Fan Cone', 'tunnel-ventilation-fan-cones'),
(7, 'Trackway Exhaust Fan Cone', 'trackway-exhaust-fan-cones'),
(8, 'TVF Sound Attenuator', 'tvf-sound-attenuators'),
(9, 'TEF Sound Attenuator', 'tef-sound-attenuators'),
(10, 'Tunnel Booster Fan', 'tunnel-booster-fans'),
(11, 'TVF VSD', 'tvf-vsds'),
(12, 'Motor Control Centre', 'motor-control-centres'),
(13, 'Damper Distribution Board', 'damper-distribution-boards'),
(14, 'Ventilation Control Panel', 'ventilation-control-panels'),
(15, 'TVS Distribution Board', 'tvs-distribution-boards'),
(16, 'TEF VSD', 'tef-vsds'),
(17, 'Lift', 'lifts'),
(18, 'Escalator', 'escalators');

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
  `mcntrct_live` int(1) NOT NULL,
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
(2, 1, 'daily', NULL),
(3, 2, 'weekly', NULL),
(4, 3, 'fortnightly', NULL),
(5, 4, 'monthly', NULL),
(6, 5, 'quaterly', NULL),
(7, 6, 'biannual', NULL),
(8, 7, 'annual', NULL),
(9, 8, 'biennial', NULL),
(10, 9, 'triennial', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(2, 18, 'JLPL', 'India', 'Kartikeyan', '+919381923779', '');

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
  `contractor` int(11) DEFAULT NULL,
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
  `contractor` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`tvf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tunnel_ventilation_fan`
--

INSERT INTO `tunnel_ventilation_fan` (`tvf_id`, `freq_id`, `check_impeller_blade`, `check_impeller_wing_root`, `impeller_blade_condition`, `clean_motor_casing`, `lubricate_motor`, `electrical_insulation`, `electrical_terminal`, `check_manual_operation`, `check_emergency_stop`, `check_flexible_connector`, `vibration_isolater_level`, `physical_inspection`, `noise_level_in_db`, `fan_vibration_reading`, `blade_tip_clearance_reading`, `description`, `asset_code`, `maint_type_id`, `eng_id`, `contractor`, `created_at`) VALUES
(1, 2, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 4, 1, 0, '', 1, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 5, 1, 0, '', 1, 1, 0, 1, 0, 0, 1, 0, 1, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 6, 1, 1, 'yes', 1, 1, 1, 1, 1, 0, 1, 1, 1, 'yes', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 7, 1, 1, 'yes', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'yes', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `status`) VALUES
(1, 'cgmei', 'cgmei.cmrl@tn.gov.in', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', 'w5Tn7c2x6cQD-tbe17svdH1ZTvI8iD7B', 1462530139, NULL, NULL, NULL, 0, 1461826713, 1, 10),
(2, 'jgmtvs', 'jgmtvs.cmrl@tn.gov.in', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', 'MBhbEF1e1k8TimYKWYocCOTGVlz6DGyN', NULL, NULL, 1462530146, NULL, 0, 0, 1, 10),
(3, 'dmtvs', 'dmtvs.cmrl@tn.gov.in', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', 'OqpqsQenI6PF2mIihv-tF3I5-eT_Uglo', NULL, NULL, 1462530152, NULL, 0, 0, 1, 10),
(4, 'jetvs', 'jetvs.cmrl@tn.gov.in', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', 'w5Tn7c2x6cQD-tbe17svdH1ZTvI8iD7B', 1462530155, NULL, NULL, NULL, 0, 0, 1, 10),
(5, 'admin', 'admin.cmrl@tn.gov.in', '$2a$10$vCkYc3H9OvSVt9n.R/mi3ORO2.89CJvZnj1AfYxhBGS.xlSOBfwlO', 'w5Tn7c2x6cQD-tbe17svdH1ZTvI8iD7B', 1462530159, NULL, NULL, NULL, 0, 0, 1, 10);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

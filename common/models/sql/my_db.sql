-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2017 at 02:41 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

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
-- Table structure for table `ac_pump`
--

CREATE TABLE IF NOT EXISTS `ac_pump` (
  `ac_pump_id` int(11) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL DEFAULT '0',
  `monthly_cleaning` int(1) NOT NULL DEFAULT '0',
  `quarterly_cleaning` int(1) NOT NULL DEFAULT '0',
  `quarterly_leak_testing` int(1) NOT NULL DEFAULT '0',
  `quarterly_record_the_reading` int(1) NOT NULL DEFAULT '0',
  `monthly_sensible_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_sensible_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_lubrication_check` int(1) NOT NULL DEFAULT '0',
  `monthly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `halfyearly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_mechanical_check` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`ac_pump_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ahu`
--

CREATE TABLE IF NOT EXISTS `ahu` (
  `ahu_id` int(11) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL DEFAULT '0',
  `weekly_cleaning` int(1) NOT NULL DEFAULT '0',
  `quarterly_cleaning` int(1) NOT NULL DEFAULT '0',
  `annually_cleaning` int(1) NOT NULL DEFAULT '0',
  `daily_record_the_readings` int(1) NOT NULL DEFAULT '0',
  `halfyearly_record_the_readings` int(1) NOT NULL DEFAULT '0',
  `halfyearly_sensible_check` int(1) NOT NULL DEFAULT '0',
  `annually_sensible_check` int(1) NOT NULL DEFAULT '0',
  `monthly_tightness_check` int(1) NOT NULL DEFAULT '0',
  `annually_tightness_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_lubircation` int(1) NOT NULL DEFAULT '0',
  `quarterly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_mechanical_check` int(1) NOT NULL DEFAULT '0',
  `halfyearly_mechanical_check` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`ahu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chiller`
--

CREATE TABLE IF NOT EXISTS `chiller` (
  `chiller_id` int(11) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL DEFAULT '0',
  `quarterly_functional_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_leak_testing_check` int(1) NOT NULL DEFAULT '0',
  `daily_record_the_reading` int(1) NOT NULL DEFAULT '0',
  `quarterly_record_the_reading` int(1) NOT NULL DEFAULT '0',
  `quarterly_sensible_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`chiller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cooling_tower`
--

CREATE TABLE IF NOT EXISTS `cooling_tower` (
  `cooling_tower_id` int(11) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL DEFAULT '0',
  `monthly_cleaning` int(1) NOT NULL DEFAULT '0',
  `quarterly_cleaning` int(1) NOT NULL DEFAULT '0',
  `daily_sensible_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_sensible_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_lubrication_check` int(1) NOT NULL DEFAULT '0',
  `monthly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_mechanical_check` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`cooling_tower_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fcu`
--

CREATE TABLE IF NOT EXISTS `fcu` (
  `fcu_id` int(11) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL DEFAULT '0',
  `weekly_cleaning` int(1) NOT NULL DEFAULT '0',
  `quarterly_cleaning` int(1) NOT NULL DEFAULT '0',
  `annually_cleaning` int(1) NOT NULL DEFAULT '0',
  `quarterly_sensible_check` int(1) NOT NULL DEFAULT '0',
  `annually_sensible_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_tightness_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`fcu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vac_electrical_panel`
--

CREATE TABLE IF NOT EXISTS `vac_electrical_panel` (
  `vac_electrical_panel_id` int(11) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL DEFAULT '0',
  `monthly_record_the_reading` int(1) NOT NULL DEFAULT '0',
  `quartely_electrical_check` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`vac_electrical_panel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vac_fan`
--

CREATE TABLE IF NOT EXISTS `vac_fan` (
  `vac_fan_id` int(11) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL DEFAULT '0',
  `quarterly_cleaning` int(1) NOT NULL DEFAULT '0',
  `quarterly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`vac_fan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vrf`
--

CREATE TABLE IF NOT EXISTS `vrf` (
  `vrf_id` int(11) NOT NULL AUTO_INCREMENT,
  `freq_id` int(3) NOT NULL DEFAULT '0',
  `weekly_cleaning` int(1) NOT NULL DEFAULT '0',
  `monthly_cleaning` int(1) NOT NULL DEFAULT '0',
  `quarterly_cleaning` int(1) NOT NULL DEFAULT '0',
  `annually_cleaning` int(1) NOT NULL DEFAULT '0',
  `monthly_functional_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_functional_check` int(1) NOT NULL DEFAULT '0',
  `monthly_record_the_readings` int(1) NOT NULL DEFAULT '0',
  `quarterly_sensible_check` int(1) NOT NULL DEFAULT '0',
  `weekly_lubrication_check` int(1) NOT NULL DEFAULT '0',
  `weekly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_electrical_check` int(1) NOT NULL DEFAULT '0',
  `annually_electrical_check` int(1) NOT NULL DEFAULT '0',
  `quarterly_mechanical_check` int(1) NOT NULL DEFAULT '0',
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`vrf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

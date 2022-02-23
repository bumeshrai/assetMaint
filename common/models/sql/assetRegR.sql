-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2016 at 10:24 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=267 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equip_id`, `corr_id`, `ename_id`, `manuf_id`, `enos_id`, `level_id`, `stn_id`, `installation_date`, `asset_code`, `last_major_overhaul`, `last_minor_maintenance`) VALUES
(1, 2, 3, 10, 1, 3, 25, '2014-10-11', '0200250003000103', NULL, NULL),
(2, 2, 3, 10, 2, 3, 25, '2015-09-12', '0200250003000203', NULL, NULL),
(3, 2, 3, 10, 3, 4, 25, '2015-09-13', '0200250003000304', NULL, NULL),
(4, 2, 3, 10, 4, 4, 25, '2015-10-16', '0200250003000404', NULL, NULL),
(5, 2, 11, 11, 1, 3, 25, '2015-10-19', '0200250011000103', NULL, NULL),
(6, 2, 11, 11, 2, 3, 25, '2015-10-22', '0200250011000203', NULL, NULL),
(7, 2, 11, 11, 3, 4, 25, '2015-09-26', '0200250011000304', NULL, NULL),
(8, 2, 11, 11, 4, 4, 25, '2015-10-14', '0200250011000404', NULL, NULL),
(9, 2, 159, 17, 1, 3, 25, '2015-10-18', '0200250159000103', NULL, NULL),
(10, 2, 159, 17, 2, 3, 25, '2015-10-15', '0200250159000203', NULL, NULL),
(11, 2, 159, 17, 3, 3, 25, '2015-09-10', '0200250159000303', NULL, NULL),
(12, 2, 159, 17, 4, 3, 25, '2015-10-14', '0200250159000403', NULL, NULL),
(13, 2, 14, 18, 1, 3, 25, '0015-02-21', '0200250014000103', NULL, NULL),
(14, 2, 14, 18, 2, 3, 25, '2015-09-09', '0200250014000203', NULL, NULL),
(15, 2, 14, 18, 3, 3, 25, '2015-10-06', '0200250014000303', NULL, NULL),
(16, 2, 14, 18, 4, 3, 25, '2015-10-07', '0200250014000403', NULL, NULL),
(17, 2, 14, 18, 5, 3, 25, '2015-09-15', '0200250014000503', NULL, NULL),
(18, 2, 14, 18, 6, 4, 25, '2015-11-08', '0200250014000604', NULL, NULL),
(19, 2, 14, 18, 7, 4, 25, '2015-11-11', '0200250014000704', NULL, NULL),
(20, 2, 14, 18, 8, 4, 25, '2015-12-08', '0200250014000804', NULL, NULL),
(21, 2, 14, 18, 9, 4, 25, '2015-08-19', '0200250014000904', NULL, NULL),
(22, 2, 14, 18, 10, 4, 25, '2015-11-20', '0200250014001004', NULL, NULL),
(23, 2, 5, 12, 1, 3, 25, '2015-09-09', '0200250005000103', NULL, NULL),
(24, 2, 5, 12, 2, 3, 25, '2015-10-05', '0200250005000203', NULL, NULL),
(25, 2, 5, 12, 3, 3, 25, '2015-11-09', '0200250005000303', NULL, NULL),
(26, 2, 5, 12, 4, 3, 25, '2015-08-15', '0200250005000403', NULL, NULL),
(27, 2, 5, 12, 5, 4, 25, '2015-09-19', '0200250005000504', NULL, NULL),
(28, 2, 5, 12, 6, 4, 25, '2016-10-08', '0200250005000604', NULL, NULL),
(29, 2, 5, 12, 7, 4, 25, '2015-09-07', '0200250005000704', NULL, NULL),
(30, 2, 5, 12, 8, 4, 25, '2015-10-08', '0200250005000804', NULL, NULL),
(31, 2, 117, 0, 1, 3, 25, '2015-12-08', '0200250117000103', NULL, NULL),
(32, 2, 117, 16, 2, 3, 25, '2015-12-07', '0200250117000203', NULL, NULL),
(33, 2, 117, 16, 3, 3, 25, '2015-09-30', '0200250117000303', NULL, NULL),
(34, 2, 117, 16, 4, 3, 25, '2016-11-08', '0200250117000403', NULL, NULL),
(35, 2, 5, 12, 9, 3, 25, '2015-09-09', '0200250005000903', NULL, NULL),
(36, 2, 5, 12, 10, 3, 25, '2015-09-11', '0200250005001003', NULL, NULL),
(37, 2, 5, 12, 11, 1, 25, '2015-09-08', '0200250005001101', NULL, NULL),
(38, 2, 5, 12, 12, 4, 25, '2015-11-19', '0200250005001204', NULL, NULL),
(39, 2, 1, 9, 1, 3, 25, '2015-11-21', '0200250001000103', NULL, NULL),
(40, 2, 1, 9, 2, 3, 25, '2016-09-05', '0200250001000203', NULL, NULL),
(41, 2, 1, 9, 3, 4, 25, '2015-09-06', '0200250001000304', NULL, NULL),
(42, 2, 1, 9, 4, 4, 25, '2015-10-09', '0200250001000404', NULL, NULL),
(43, 2, 109, 14, 1, 3, 25, '2015-09-05', '0200250109000103', NULL, NULL),
(44, 2, 109, 14, 3, 3, 25, '2015-11-12', '0200250109000303', NULL, NULL),
(45, 2, 109, 14, 4, 3, 25, '2015-09-15', '0200250109000403', NULL, NULL),
(46, 2, 109, 14, 2, 3, 25, '2015-11-12', '0200250109000203', NULL, NULL),
(47, 2, 109, 9, 5, 4, 25, '2015-09-09', '0200250109000504', NULL, NULL),
(48, 2, 109, 14, 6, 4, 25, '2015-12-20', '0200250109000604', NULL, NULL),
(49, 2, 109, 14, 7, 4, 25, '2015-12-31', '0200250109000704', NULL, NULL),
(50, 2, 109, 14, 8, 4, 25, '2015-02-11', '0200250109000804', NULL, NULL),
(51, 2, 165, 20, 1, 3, 25, '2016-04-01', '0200250165000103', NULL, NULL),
(52, 2, 165, 20, 2, 3, 25, '2016-02-08', '0200250165000203', NULL, NULL),
(53, 2, 166, 21, 1, 3, 25, '2015-11-05', '0200250166000103', NULL, NULL),
(54, 2, 166, 22, 2, 4, 25, '2015-10-08', '0200250166000204', NULL, NULL),
(55, 2, 167, 22, 1, 3, 25, '2015-11-05', '0200250167000103', NULL, NULL),
(56, 2, 167, 22, 2, 4, 25, '2015-09-05', '0200250167000204', NULL, NULL),
(57, 2, 165, 20, 3, 4, 25, '2015-11-06', '0200250165000304', NULL, NULL),
(58, 2, 165, 20, 4, 4, 25, '2016-01-08', '0200250165000404', NULL, NULL),
(59, 2, 170, 24, 1, 3, 25, '2015-11-08', '0200250170000103', NULL, NULL),
(60, 2, 170, 24, 2, 3, 25, '2015-09-22', '0200250170000203', NULL, NULL),
(61, 2, 170, 24, 3, 4, 25, '2015-09-06', '0200250170000304', NULL, NULL),
(62, 2, 170, 24, 4, 4, 25, '2015-11-10', '0200250170000404', NULL, NULL),
(63, 2, 110, 15, 2, 3, 25, '2015-10-09', '0200250110000203', NULL, NULL),
(64, 2, 110, 15, 3, 3, 25, '2015-10-17', '0200250110000303', NULL, NULL),
(65, 2, 110, 15, 4, 3, 25, '2015-11-19', '0200250110000403', NULL, NULL),
(66, 2, 1, 9, 1, 3, 24, '2015-11-05', '0200240001000103', NULL, NULL),
(67, 2, 1, 9, 2, 3, 24, '2015-11-08', '0200240001000203', NULL, NULL),
(68, 2, 1, 9, 4, 4, 24, '2015-08-05', '0200240001000404', NULL, NULL),
(69, 2, 1, 9, 3, 4, 24, '2015-07-05', '0200240001000304', NULL, NULL),
(70, 2, 3, 10, 1, 3, 24, '2015-09-08', '0200240003000103', NULL, NULL),
(71, 2, 3, 10, 2, 3, 24, '2015-11-09', '0200240003000203', NULL, NULL),
(72, 2, 3, 10, 3, 4, 24, '2015-08-07', '0200240003000304', NULL, NULL),
(73, 2, 3, 10, 4, 4, 24, '2015-08-19', '0200240003000404', NULL, NULL),
(74, 2, 5, 12, 1, 3, 24, '2015-09-04', '0200240005000103', NULL, NULL),
(75, 2, 5, 12, 2, 3, 24, '2015-11-11', '0200240005000203', NULL, NULL),
(76, 2, 5, 12, 3, 3, 24, '2015-12-03', '0200240005000303', NULL, NULL),
(77, 2, 5, 12, 4, 3, 24, '2015-11-04', '0200240005000403', NULL, NULL),
(78, 2, 5, 12, 5, 3, 24, '2015-12-09', '0200240005000503', NULL, NULL),
(79, 2, 5, 12, 6, 3, 24, '2015-09-07', '0200240005000603', NULL, NULL),
(80, 2, 5, 12, 7, 4, 24, '2015-12-01', '0200240005000704', NULL, NULL),
(81, 2, 5, 12, 8, 4, 24, '2015-09-30', '0200240005000804', NULL, NULL),
(82, 2, 5, 12, 9, 4, 24, '2015-12-08', '0200240005000904', NULL, NULL),
(83, 2, 5, 12, 10, 4, 24, '2015-10-08', '0200240005001004', NULL, NULL),
(84, 2, 5, 12, 11, 4, 24, '2015-11-11', '0200240005001104', NULL, NULL),
(85, 2, 5, 12, 12, 4, 24, '2015-12-02', '0200240005001204', NULL, NULL),
(86, 2, 11, 11, 1, 3, 24, '2015-12-11', '0200240011000103', NULL, NULL),
(87, 2, 11, 11, 2, 3, 24, '2015-09-08', '0200240011000203', NULL, NULL),
(88, 2, 11, 11, 3, 4, 24, '2015-09-13', '0200240011000304', NULL, NULL),
(89, 2, 11, 11, 4, 4, 24, '2015-12-10', '0200240011000404', NULL, NULL),
(90, 2, 14, 18, 1, 3, 24, '2015-12-10', '0200240014000103', NULL, NULL),
(91, 2, 14, 18, 2, 3, 24, '2015-11-05', '0200240014000203', NULL, NULL),
(92, 2, 14, 18, 3, 3, 24, '2015-12-01', '0200240014000303', NULL, NULL),
(93, 2, 14, 18, 4, 3, 24, '2015-11-05', '0200240014000403', NULL, NULL),
(94, 2, 14, 18, 5, 3, 24, '2015-12-14', '0200240014000503', NULL, NULL),
(95, 2, 14, 18, 6, 4, 24, '2015-11-08', '0200240014000604', NULL, NULL),
(96, 2, 14, 18, 7, 4, 24, '2015-12-11', '0200240014000704', NULL, NULL),
(97, 2, 14, 18, 8, 4, 24, '2015-09-19', '0200240014000804', NULL, NULL),
(98, 2, 14, 18, 9, 4, 24, '2015-12-20', '0200240014000904', NULL, NULL),
(99, 2, 14, 18, 10, 4, 24, '2015-11-11', '0200240014001004', NULL, NULL),
(100, 2, 109, 14, 1, 3, 24, '2015-12-01', '0200240109000103', NULL, NULL),
(101, 2, 109, 14, 2, 3, 24, '2015-09-17', '0200240109000203', NULL, NULL),
(102, 2, 109, 14, 3, 3, 24, '2015-12-29', '0200240109000303', NULL, NULL),
(103, 2, 109, 14, 4, 3, 24, '2015-09-04', '0200240109000403', NULL, NULL),
(104, 2, 109, 14, 6, 4, 24, '2015-12-08', '0200240109000604', NULL, NULL),
(105, 2, 109, 14, 7, 4, 24, '2015-08-07', '0200240109000704', NULL, NULL),
(106, 2, 109, 14, 8, 4, 24, '2015-12-04', '0200240109000804', NULL, NULL),
(107, 2, 110, 15, 1, 3, 24, '2015-09-11', '0200240110000103', NULL, NULL),
(108, 2, 110, 15, 1, 3, 25, '2015-09-04', '0200250110000103', NULL, NULL),
(109, 2, 110, 15, 2, 3, 24, '2015-09-05', '0200240110000203', NULL, NULL),
(110, 2, 110, 15, 3, 3, 24, '2015-11-12', '0200240110000303', NULL, NULL),
(111, 2, 110, 15, 4, 3, 24, '2015-11-15', '0200240110000403', NULL, NULL),
(112, 2, 117, 16, 1, 3, 24, '2015-09-15', '0200240117000103', NULL, NULL),
(113, 2, 117, 16, 2, 3, 24, '2015-12-22', '0200240117000203', NULL, NULL),
(114, 2, 117, 16, 3, 3, 24, '2015-09-18', '0200240117000303', NULL, NULL),
(115, 2, 117, 16, 4, 3, 24, '2015-11-15', '0200240117000403', NULL, NULL),
(116, 2, 159, 17, 1, 3, 24, '2015-12-11', '0200240159000103', NULL, NULL),
(117, 2, 159, 17, 2, 3, 24, '2015-09-18', '0200240159000203', NULL, NULL),
(118, 2, 159, 17, 3, 3, 24, '2015-11-13', '0200240159000303', NULL, NULL),
(119, 2, 159, 17, 4, 3, 24, '2015-12-14', '0200240159000403', NULL, NULL),
(120, 2, 165, 20, 1, 3, 24, '2015-09-14', '0200240165000103', NULL, NULL),
(121, 2, 165, 20, 2, 3, 24, '2015-09-19', '0200240165000203', NULL, NULL),
(122, 2, 165, 20, 3, 4, 24, '2015-10-11', '0200240165000304', NULL, NULL),
(123, 2, 165, 20, 4, 4, 24, '2015-10-10', '0200240165000404', NULL, NULL),
(124, 2, 170, 24, 1, 3, 24, '2015-02-11', '0200240170000103', NULL, NULL),
(125, 2, 170, 24, 2, 3, 24, '2015-10-01', '0200240170000203', NULL, NULL),
(126, 2, 170, 24, 3, 4, 24, '2015-10-21', '0200240170000304', NULL, NULL),
(127, 2, 170, 24, 4, 4, 24, '2015-10-20', '0200240170000404', NULL, NULL),
(128, 2, 167, 22, 1, 3, 24, '2015-10-12', '0200240167000103', NULL, NULL),
(129, 2, 167, 22, 2, 4, 24, '2015-10-13', '0200240167000204', NULL, NULL),
(130, 2, 166, 21, 1, 3, 24, '2015-10-12', '0200240166000103', NULL, NULL),
(131, 2, 166, 21, 2, 4, 24, '2015-10-13', '0200240166000204', NULL, NULL),
(132, 2, 109, 14, 5, 4, 24, '2015-11-10', '0200240109000504', NULL, NULL),
(133, 2, 167, 22, 1, 3, 23, '2015-10-01', '0200230167000103', NULL, NULL),
(134, 2, 167, 22, 2, 4, 23, '2015-11-11', '0200230167000204', NULL, NULL),
(135, 2, 11, 11, 1, 3, 23, '2016-01-01', '0200230011000103', NULL, NULL),
(136, 2, 11, 11, 2, 3, 23, '2016-02-21', '0200230011000203', NULL, NULL),
(137, 2, 11, 11, 3, 4, 23, '2015-10-03', '0200230011000304', NULL, NULL),
(138, 2, 11, 11, 4, 4, 23, '2015-10-04', '0200230011000404', NULL, NULL),
(139, 2, 166, 21, 1, 3, 23, '2015-12-10', '0200230166000103', NULL, NULL),
(140, 2, 166, 21, 2, 4, 23, '2015-12-11', '0200230166000204', NULL, NULL),
(141, 2, 159, 17, 1, 3, 23, '2015-10-11', '0200230159000103', NULL, NULL),
(142, 2, 159, 17, 2, 3, 23, '2015-10-05', '0200230159000203', NULL, NULL),
(143, 2, 159, 17, 3, 3, 23, '2015-11-10', '0200230159000303', NULL, NULL),
(144, 2, 159, 17, 4, 3, 23, '2015-10-11', '0200230159000403', NULL, NULL),
(145, 2, 170, 24, 1, 3, 23, '2015-11-12', '0200230170000103', NULL, NULL),
(146, 2, 170, 24, 2, 3, 23, '2015-09-10', '0200230170000203', NULL, NULL),
(147, 2, 170, 24, 3, 4, 23, '2015-09-10', '0200230170000304', NULL, NULL),
(148, 2, 170, 24, 4, 4, 23, '2015-09-05', '0200230170000404', NULL, NULL),
(149, 2, 14, 18, 1, 3, 23, '2015-09-11', '0200230014000103', NULL, NULL),
(150, 2, 14, 18, 2, 3, 23, '2015-09-19', '0200230014000203', NULL, NULL),
(151, 2, 14, 18, 3, 3, 23, '2015-12-10', '0200230014000303', NULL, NULL),
(152, 2, 14, 18, 4, 3, 23, '2015-10-05', '0200230014000403', NULL, NULL),
(153, 2, 14, 18, 5, 3, 23, '2015-12-10', '0200230014000503', NULL, NULL),
(154, 2, 14, 18, 6, 4, 23, '2015-10-06', '0200230014000604', NULL, NULL),
(155, 2, 14, 18, 7, 4, 23, '2015-12-10', '0200230014000704', NULL, NULL),
(156, 2, 14, 18, 8, 4, 23, '2015-09-08', '0200230014000804', NULL, NULL),
(157, 2, 14, 18, 9, 4, 23, '2015-11-12', '0200230014000904', NULL, NULL),
(158, 2, 14, 18, 10, 4, 23, '2015-11-02', '0200230014001004', NULL, NULL),
(159, 2, 3, 10, 1, 3, 23, '2016-01-03', '0200230003000103', NULL, NULL),
(160, 2, 3, 10, 2, 3, 23, '2016-02-04', '0200230003000203', NULL, NULL),
(161, 2, 3, 10, 3, 4, 23, '2015-11-02', '0200230003000304', NULL, NULL),
(162, 2, 3, 10, 4, 4, 23, '2015-11-10', '0200230003000404', NULL, NULL),
(163, 2, 110, 15, 1, 3, 23, '2015-12-11', '0200230110000103', NULL, NULL),
(164, 2, 110, 15, 2, 3, 23, '2015-12-12', '0200230110000203', NULL, NULL),
(165, 2, 110, 15, 3, 3, 23, '2015-10-14', '0200230110000303', NULL, NULL),
(166, 2, 110, 15, 4, 3, 23, '2015-12-14', '0200230110000403', NULL, NULL),
(167, 2, 5, 12, 1, 3, 23, '2015-11-17', '0200230005000103', NULL, NULL),
(168, 2, 5, 12, 2, 3, 23, '2015-09-11', '0200230005000203', NULL, NULL),
(169, 2, 5, 12, 3, 3, 23, '2015-09-11', '0200230005000303', NULL, NULL),
(170, 2, 5, 12, 4, 3, 23, '2015-09-07', '0200230005000403', NULL, NULL),
(171, 2, 5, 12, 5, 3, 23, '2015-08-09', '0200230005000503', NULL, NULL),
(172, 2, 5, 12, 6, 3, 23, '2015-07-08', '0200230005000603', NULL, NULL),
(173, 2, 5, 12, 7, 4, 23, '2015-08-08', '0200230005000704', NULL, NULL),
(174, 2, 5, 12, 8, 4, 23, '2015-08-10', '0200230005000804', NULL, NULL),
(175, 2, 5, 12, 9, 4, 23, '2015-08-10', '0200230005000904', NULL, NULL),
(176, 2, 5, 12, 10, 4, 23, '2015-08-10', '0200230005001004', NULL, NULL),
(177, 2, 5, 12, 11, 4, 23, '2015-09-08', '0200230005001104', NULL, NULL),
(178, 2, 5, 12, 12, 4, 23, '2015-08-09', '0200230005001204', NULL, NULL),
(179, 2, 1, 9, 1, 3, 23, '2015-09-08', '0200230001000103', NULL, NULL),
(180, 2, 1, 9, 2, 3, 23, '2015-09-05', '0200230001000203', NULL, NULL),
(181, 2, 1, 9, 3, 4, 23, '2015-12-09', '0200230001000304', NULL, NULL),
(182, 2, 1, 9, 4, 4, 23, '2015-11-08', '0200230001000404', NULL, NULL),
(183, 2, 109, 14, 1, 3, 23, '2015-09-08', '0200230109000103', NULL, NULL),
(184, 2, 109, 14, 2, 3, 23, '2015-08-07', '0200230109000203', NULL, NULL),
(185, 2, 109, 19, 3, 3, 23, '2015-09-09', '0200230109000303', NULL, NULL),
(186, 2, 109, 14, 4, 3, 23, '2015-10-04', '0200230109000403', NULL, NULL),
(187, 2, 109, 14, 5, 4, 23, '2015-10-05', '0200230109000504', NULL, NULL),
(188, 2, 109, 14, 6, 4, 23, '2015-11-05', '0200230109000604', NULL, NULL),
(189, 2, 110, 15, 7, 4, 23, '2015-10-06', '0200230110000704', NULL, NULL),
(190, 2, 109, 14, 8, 4, 23, '2015-10-06', '0200230109000804', NULL, NULL),
(191, 2, 117, 16, 1, 3, 23, '2015-10-12', '0200230117000103', NULL, NULL),
(192, 2, 117, 16, 2, 3, 23, '2015-10-09', '0200230117000203', NULL, NULL),
(193, 2, 117, 16, 3, 3, 23, '2015-10-06', '0200230117000303', NULL, NULL),
(194, 2, 117, 16, 4, 3, 23, '2015-10-03', '0200230117000403', NULL, NULL),
(195, 2, 165, 20, 1, 3, 23, '2015-12-03', '0200230165000103', NULL, NULL),
(196, 2, 165, 20, 2, 3, 23, '2015-12-06', '0200230165000203', NULL, NULL),
(197, 2, 165, 20, 3, 4, 23, '2015-10-09', '0200230165000304', NULL, NULL),
(198, 2, 165, 20, 4, 4, 23, '2015-09-06', '0200230165000404', NULL, NULL),
(199, 2, 167, 22, 1, 3, 22, '2016-01-11', '0200220167000103', NULL, NULL),
(200, 2, 167, 22, 2, 4, 22, '2015-10-03', '0200220167000204', NULL, NULL),
(201, 2, 11, 11, 1, 3, 22, '2015-11-06', '0200220011000103', NULL, NULL),
(202, 2, 11, 11, 2, 3, 22, '2015-10-07', '0200220011000203', NULL, NULL),
(203, 2, 11, 11, 3, 4, 22, '2015-10-08', '0200220011000304', NULL, NULL),
(204, 2, 11, 11, 4, 4, 22, '2015-10-09', '0200220011000404', NULL, NULL),
(205, 2, 166, 21, 1, 3, 22, '2015-10-04', '0200220166000103', NULL, NULL),
(206, 2, 166, 21, 2, 4, 22, '2015-10-05', '0200220166000204', NULL, NULL),
(207, 2, 159, 17, 1, 3, 22, '2015-10-05', '0200220159000103', NULL, NULL),
(208, 2, 159, 17, 2, 3, 11, '2015-10-05', '0200110159000203', NULL, NULL),
(209, 2, 159, 17, 3, 3, 22, '2015-10-05', '0200220159000303', NULL, NULL),
(210, 2, 159, 17, 4, 3, 22, '2015-09-08', '0200220159000403', NULL, NULL),
(211, 2, 170, 24, 1, 3, 22, '2015-09-07', '0200220170000103', NULL, NULL),
(212, 2, 170, 24, 2, 3, 22, '2015-09-07', '0200220170000203', NULL, NULL),
(213, 2, 170, 24, 3, 4, 22, '2015-10-05', '0200220170000304', NULL, NULL),
(215, 2, 14, 18, 1, 3, 22, '2015-09-06', '0200220014000103', NULL, NULL),
(216, 2, 14, 18, 2, 3, 22, '2015-11-06', '0200220014000203', NULL, NULL),
(217, 2, 14, 18, 3, 3, 22, '2015-09-03', '0200220014000303', NULL, NULL),
(218, 2, 14, 18, 4, 3, 22, '2015-10-08', '0200220014000403', NULL, NULL),
(219, 2, 14, 18, 5, 3, 22, '2015-09-06', '0200220014000503', NULL, NULL),
(220, 2, 14, 18, 6, 4, 22, '2015-09-06', '0200220014000604', NULL, NULL),
(221, 2, 14, 18, 7, 4, 22, '2015-09-05', '0200220014000704', NULL, NULL),
(222, 1, 14, 18, 8, 4, 22, '2015-11-12', '0100220014000804', NULL, NULL),
(223, 2, 14, 18, 9, 4, 22, '2015-10-06', '0200220014000904', NULL, NULL),
(224, 2, 14, 18, 10, 4, 22, '2015-12-10', '0200220014001004', NULL, NULL),
(225, 2, 3, 10, 1, 3, 22, '2015-12-06', '0200220003000103', NULL, NULL),
(226, 2, 3, 10, 2, 3, 22, '2015-12-09', '0200220003000203', NULL, NULL),
(228, 2, 3, 10, 3, 4, 22, '2015-09-19', '0200220003000304', NULL, NULL),
(229, 2, 3, 10, 4, 4, 22, '2015-11-06', '0200220003000404', NULL, NULL),
(230, 2, 110, 15, 1, 3, 22, '2016-01-11', '0200220110000103', NULL, NULL),
(231, 2, 110, 15, 2, 3, 22, '2016-01-12', '0200220110000203', NULL, NULL),
(232, 2, 110, 15, 3, 3, 22, '2016-01-13', '0200220110000303', NULL, NULL),
(233, 2, 110, 15, 4, 3, 22, '2016-01-16', '0200220110000403', NULL, NULL),
(234, 2, 5, 12, 1, 3, 22, '2016-01-06', '0200220005000103', NULL, NULL),
(235, 2, 5, 12, 2, 3, 22, '2016-01-08', '0200220005000203', NULL, NULL),
(236, 2, 5, 12, 3, 3, 22, '2016-01-05', '0200220005000303', NULL, NULL),
(237, 2, 5, 12, 4, 3, 22, '2016-01-08', '0200220005000403', NULL, NULL),
(238, 2, 5, 12, 5, 3, 22, '2016-01-09', '0200220005000503', NULL, NULL),
(239, 2, 5, 12, 6, 3, 22, '2016-01-03', '0200220005000603', NULL, NULL),
(240, 2, 5, 12, 7, 4, 22, '2016-02-05', '0200220005000704', NULL, NULL),
(241, 2, 5, 12, 8, 4, 22, '2016-02-09', '0200220005000804', NULL, NULL),
(242, 2, 5, 12, 9, 4, 22, '2016-02-06', '0200220005000904', NULL, NULL),
(243, 2, 5, 12, 10, 4, 22, '2016-02-10', '0200220005001004', NULL, NULL),
(244, 2, 5, 12, 11, 4, 22, '2016-02-11', '0200220005001104', NULL, NULL),
(245, 2, 5, 12, 12, 4, 22, '2016-02-12', '0200220005001204', NULL, NULL),
(246, 2, 1, 9, 1, 3, 22, '2016-01-20', '0200220001000103', NULL, NULL),
(247, 2, 1, 9, 2, 3, 22, '2016-02-21', '0200220001000203', NULL, NULL),
(248, 2, 1, 9, 3, 4, 22, '2016-02-22', '0200220001000304', NULL, NULL),
(249, 2, 1, 9, 4, 4, 22, '2016-02-24', '0200220001000404', NULL, NULL),
(250, 2, 109, 14, 1, 3, 22, '2016-02-25', '0200220109000103', NULL, NULL),
(251, 2, 109, 14, 2, 3, 22, '2016-03-05', '0200220109000203', NULL, NULL),
(252, 2, 109, 14, 3, 3, 22, '2016-03-04', '0200220109000303', NULL, NULL),
(253, 2, 109, 14, 4, 3, 22, '2016-03-06', '0200220109000403', NULL, NULL),
(254, 2, 109, 14, 5, 4, 22, '2016-03-10', '0200220109000504', NULL, NULL),
(255, 2, 109, 14, 6, 4, 22, '2016-03-09', '0200220109000604', NULL, NULL),
(256, 2, 109, 14, 7, 4, 11, '2016-03-08', '0200110109000704', NULL, NULL),
(257, 2, 109, 14, 8, 4, 22, '2016-03-16', '0200220109000804', NULL, NULL),
(258, 2, 117, 16, 1, 3, 22, '2016-02-11', '0200220117000103', NULL, NULL),
(259, 2, 117, 16, 2, 3, 22, '2016-03-06', '0200220117000203', NULL, NULL),
(260, 2, 117, 16, 3, 3, 22, '2016-03-11', '0200220117000303', NULL, NULL),
(261, 2, 117, 16, 4, 3, 22, '2016-03-20', '0200220117000403', NULL, NULL),
(262, 2, 165, 20, 1, 3, 22, '2016-03-21', '0200220165000103', NULL, NULL),
(263, 2, 165, 20, 2, 3, 22, '2016-03-22', '0200220165000203', NULL, NULL),
(264, 2, 165, 20, 3, 4, 22, '2016-03-04', '0200220165000304', NULL, NULL),
(265, 2, 165, 20, 4, 4, 22, '2016-03-09', '0200220165000404', NULL, NULL),
(266, 2, 109, 14, 8, 4, 22, '2016-02-06', '0200220109000804', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_name`
--

CREATE TABLE IF NOT EXISTS `equipment_name` (
  `ename_id` int(4) NOT NULL AUTO_INCREMENT,
  `ename_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ename_id`),
  KEY `ename_id` (`ename_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=171 ;

--
-- Dumping data for table `equipment_name`
--

INSERT INTO `equipment_name` (`ename_id`, `ename_name`) VALUES
(1, 'Tunnel Ventilation Fan'),
(3, 'Trackway Exhaust Fan'),
(5, 'Tunnel Ventilation Damper'),
(11, 'Draught Relief Damper'),
(14, 'Trackway Exhaust Damper'),
(109, 'Tunnel Ventilation fan cone'),
(110, 'Trackway Exhaust Fan cone'),
(117, 'TVF-Sound Attenuator'),
(159, 'TEF-Sound Attenuator'),
(164, 'Tunnel Booster Fan'),
(165, 'TVF-VSD'),
(166, 'Motor control centre'),
(167, 'Damper Distribution board'),
(168, 'Ventilation control panel'),
(169, 'Tunnel ventilation system - Distribution board'),
(170, 'TEF-VSD');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `level_id` int(2) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'Platform LHS'),
(2, 'Platform RHS'),
(3, 'Concourse LHS'),
(4, 'Concourse RHS'),
(5, 'Street Level Enterance 1'),
(6, 'Street Level Enterance 2'),
(7, 'Street Level Enterance 3'),
(8, 'Street Level Enterance 4'),
(9, 'Ancillary Building Basement'),
(10, 'Ancillary Building Ground'),
(11, 'Ancillary Building First Floor'),
(12, 'Ancillary Building Terrace'),
(13, 'TVS Vent Shaft LHS 1'),
(14, 'TVS Vent Shaft LHS 2'),
(15, 'TVS Vent Shaft RHS 1'),
(16, 'TVS Vent Shaft RHS 2'),
(17, 'VAC Vent Shaft 1'),
(18, 'VAC Vent Shaft 1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manuf_id`, `ename_id`, `name`, `country`, `contact_person`, `contact_phone`, `contact_email`) VALUES
(9, 1, 'Flakwoods', 'UK', '', '', ''),
(10, 3, 'Flakwoods', 'UK', '', '', ''),
(11, 11, 'Trox', 'Malaysia', '', '', ''),
(12, 5, 'Trox', 'Malasia', '', '', ''),
(14, 109, 'TAP Engg', 'Chennai-India', '', '', ''),
(15, 110, 'TAP Engg', 'Chennai, India', '', '', ''),
(16, 117, 'ETA', 'Chennai-India', '', '', ''),
(17, 159, 'ETA', 'Chennai, India', '', '', ''),
(18, 14, 'Trox', 'Malaysia', '', '', ''),
(19, 164, 'Flakwoods', 'UK', '', '', ''),
(20, 165, 'Danfoss', 'USA', '', '', ''),
(21, 166, 'Tricolite', 'India', '', '', ''),
(22, 167, 'Tricolite', 'India', '', '', ''),
(23, 168, 'I2ST ', '', '', '', ''),
(24, 170, 'Danfoss', 'Denmark', '', '', '');

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
('m140209_132017_init', 1462527187),
('m140403_174025_create_account_table', 1462527187),
('m140504_113157_update_tables', 1462527187),
('m140504_130429_create_token_table', 1462527188),
('m140830_171933_fix_ip_field', 1462527188),
('m140830_172703_change_account_table_name', 1462527188),
('m141222_110026_update_ip_field', 1462527188),
('m141222_135246_alter_username_length', 1462527188),
('m150614_103145_update_social_account_table', 1462527188),
('m150623_212711_fix_username_notnull', 1462527188);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

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
(27, 'Arumbakkam', 'SAR', 2),
(28, 'Vadapalani', 'SVA', 2),
(29, 'Ashok Nagar', 'SAN', 2),
(30, 'Ekkattuthangal', 'SSI', 2),
(31, 'St. Thomas Mount Metro', 'SMM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tunnel_ventilation_damper`
--

CREATE TABLE IF NOT EXISTS `tunnel_ventilation_damper` (
  `tvd_id` int(4) NOT NULL AUTO_INCREMENT,
  `clean_blades` int(1) DEFAULT '0',
  `clean_blades_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `check_linkages` int(1) DEFAULT '0',
  `check_linkages_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `manual_closeopen` int(1) DEFAULT '0',
  `manual_closeopen_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `frame_tightness` int(1) DEFAULT '0',
  `frame_tightness_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `actuator_wiring` int(1) DEFAULT '0',
  `actuator_wiring_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maint_type_id` int(2) DEFAULT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`tvd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tunnel_ventilation_damper`
--

INSERT INTO `tunnel_ventilation_damper` (`tvd_id`, `clean_blades`, `clean_blades_d`, `check_linkages`, `check_linkages_d`, `manual_closeopen`, `manual_closeopen_d`, `frame_tightness`, `frame_tightness_d`, `actuator_wiring`, `actuator_wiring_d`, `description`, `asset_code`, `maint_type_id`, `eng_id`, `contractor`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cleaned the blades', 1, 'Linkages fine', 1, 'Opened Closed 5 times', 1, 'Was tight', 1, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 'Blades were clean', 1, 'Linkages broken, fixed', 0, 'Switch not accessible', 1, 'Was tight', 1, 'To be cleaned', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Cleaned the blades', 1, 'Linkages fine', 1, 'Opened Closed 5 times', 1, 'Was tight', 1, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tunnel_ventilation_fan`
--

CREATE TABLE IF NOT EXISTS `tunnel_ventilation_fan` (
  `tvf_id` int(4) NOT NULL AUTO_INCREMENT,
  `check_impeller` int(1) DEFAULT '0',
  `check_impeller_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lubricate_motor` int(1) DEFAULT '0',
  `lubricate_motor_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `secure_wiring` int(1) DEFAULT '0',
  `secure_wiring_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `clean_terminal_box` int(1) DEFAULT '0',
  `clean_terminal_box_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `check_insulation` int(1) DEFAULT '0',
  `check_insulation_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `check_blade_tips` int(1) DEFAULT '0',
  `check_blade_tips_d` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tighten_flexi_nuts` int(1) DEFAULT '0',
  `tighten_flexi_nuts_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `general_cleaning` int(1) DEFAULT '0',
  `general_cleaning_d` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `maint_type_id` int(2) NOT NULL,
  `eng_id` int(4) DEFAULT NULL,
  `contractor` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`tvf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `access_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cgmei', '', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', NULL, 'w5Tn7c2x6cQD-tbe17svdH1ZTvI8iD7B', 'cgmei.cmrl@tn.gov.in', 10, 0, 1461826713),
(2, 'jgmtvs', '', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', NULL, NULL, 'jgmtvs.cmrl@tn.gov.in', 10, 0, 0),
(3, 'dmtvs', '', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', NULL, NULL, 'dmtvs.cmrl@tn.gov.in', 10, 0, 0),
(4, 'jetvs', '', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', NULL, NULL, 'jetvs.cmrl@tn.gov.in', 10, 0, 0),
(5, 'admin', '', '$2a$10$vCkYc3H9OvSVt9n.R/mi3ORO2.89CJvZnj1AfYxhBGS.xlSOBfwlO', NULL, NULL, 'admin.cmrl@tn.gov.in', 10, 0, 0);

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

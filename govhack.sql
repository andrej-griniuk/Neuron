-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2015 at 01:15 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `govhack`
--

-- --------------------------------------------------------

--
-- Table structure for table `citations`
--

CREATE TABLE IF NOT EXISTS `citations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `citing_id` varchar(255) NOT NULL,
  `cited_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `citing_id` (`citing_id`),
  KEY `cited_id` (`cited_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventors`
--

CREATE TABLE IF NOT EXISTS `inventors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `patent_id` varchar(255) NOT NULL,
  `pct_app` varchar(255) NOT NULL,
  `appln_id` int(11) NOT NULL,
  `inv_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `reg_code` varchar(255) NOT NULL,
  `ctry_code` varchar(255) NOT NULL,
  `reg_share` decimal(6,5) unsigned DEFAULT NULL,
  `inv_share` decimal(6,5) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patent_id` (`patent_id`),
  KEY `inv_name` (`inv_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE IF NOT EXISTS `patents` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `publication_date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `keyword` (`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

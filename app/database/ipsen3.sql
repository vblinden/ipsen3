-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 12:31 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ipsen3`
--
CREATE DATABASE IF NOT EXISTS `ipsen3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ipsen3`;

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE IF NOT EXISTS `general` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `vat`, `created_at`, `updated_at`) VALUES
(1, 21, '0000-00-00 00:00:00', '2013-12-09 10:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_11_30_103812_create_users_table', 1),
('2013_12_05_113145_create_vehicle_table', 2),
('2013_12_05_113853_create_vehicleoptions_table', 3),
('2013_12_05_114129_create_vehiclereview_table', 3),
('2013_12_05_114447_create_vehiclecategory_table', 3),
('2013_12_05_114651_create_vehicledamage_table', 3),
('2013_12_05_120135_create_users_add', 4),
('2013_12_05_133829_create_usersroles_table', 5),
('2013_12_05_195440_add_image_vehicle', 6),
('2013_12_06_190320_create_roles_table', 7),
('2013_12_09_112132_create_general_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE IF NOT EXISTS `userroles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`user_id`, `role_id`) VALUES
(0, 0),
(0, 0),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `addresslineone` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `addresslinetwo` varchar(320) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `licensenumber` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `passportnumber` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `kvknumber` varchar(320) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vatnumber` varchar(320) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `firstname`, `lastname`, `addresslineone`, `addresslinetwo`, `city`, `zipcode`, `country`, `phonenumber`, `licensenumber`, `passportnumber`, `kvknumber`, `vatnumber`, `business`, `created_at`, `updated_at`) VALUES
(1, '$2y$08$UosAEKZ7ZVzgnxCFIpTQNOE.HP88m4ONO.l24GRJxK9bVdLZcLVV6', 'vbvanderlinden@gmail.com', 'Vincent', 'van der Linden', 'Hallincqhof 6', NULL, 'Dordrecht', '3311DD', 'Nederland', '0640356771', '9123', '9123901', '', '', 0, '2013-12-05 11:49:53', '2013-12-06 22:05:43'),
(2, '$2y$08$mZz6TNwacrej9g.ApywFVOBQxtaZa3zFwTBQwYRcRxmpBWATKheE6', 'deamus@gmail.com', 'Deam', 'Kop', 'H.R. Holst-erf 224', NULL, 'Dordrecht', '3315 TH', 'Nederland', '634188996', '0687281937891', '781238192', '', '', 0, '2013-12-05 11:52:21', '2013-12-05 11:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclecategory`
--

CREATE TABLE IF NOT EXISTS `vehiclecategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vehiclecategory`
--

INSERT INTO `vehiclecategory` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Personenauto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Bedrijfswagen', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Motor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Scooter', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicledamage`
--

CREATE TABLE IF NOT EXISTS `vehicledamage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicleid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `damage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicleoptions`
--

CREATE TABLE IF NOT EXISTS `vehicleoptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicleid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehiclereviews`
--

CREATE TABLE IF NOT EXISTS `vehiclereviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicleid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `milage` int(11) NOT NULL,
  `licenseplate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usage` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hourlyrate` double NOT NULL,
  `vehiclecategoryid` int(11) NOT NULL,
  `vehiclereviewid` int(11) NOT NULL,
  `vehicleoptionsid` int(11) NOT NULL,
  `vehicledamageid` int(11) NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `categoryid`, `brand`, `model`, `milage`, `licenseplate`, `usage`, `comment`, `color`, `hourlyrate`, `vehiclecategoryid`, `vehiclereviewid`, `vehicleoptionsid`, `vehicledamageid`, `locked`, `created_at`, `updated_at`, `image`) VALUES
(13, 0, 'Suzuki', 'GSX-R 1000', 0, '12-12-12', 5, 'Splinternieuw aangeschaft.', 'Wit met blauw', 1213, 3, 0, 0, 0, 0, '2013-12-07 10:03:00', '2013-12-07 21:40:02', 'KvPjunzVXKKTOB04hkC0.jpg'),
(17, 0, 'Audi', 'A6', 12093, '11-11-11', 12, '', 'Zwart', 1, 1, 0, 0, 0, 0, '2013-12-07 21:30:31', '2013-12-09 09:51:42', '2zzdlgKbXsZKHEXKZOEy.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.31)
# Database: ipsen3
# Generation Time: 2013-12-28 16:37:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `name`, `admin_user_id`, `created_at`, `updated_at`)
VALUES
  (4,'New Border Studio Enterprises Ltd',11,'2013-12-28 15:51:07','2013-12-28 15:51:07');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table company_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company_user`;

CREATE TABLE `company_user` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `company_user` WRITE;
/*!40000 ALTER TABLE `company_user` DISABLE KEYS */;

INSERT INTO `company_user` (`company_id`, `user_id`)
VALUES
  (4,11),
  (4,2),
  (4,1);

/*!40000 ALTER TABLE `company_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table general
# ------------------------------------------------------------

DROP TABLE IF EXISTS `general`;

CREATE TABLE `general` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `general` WRITE;
/*!40000 ALTER TABLE `general` DISABLE KEYS */;

INSERT INTO `general` (`id`, `vat`, `created_at`, `updated_at`)
VALUES
  (1,21,'0000-00-00 00:00:00','2013-12-09 11:29:44');

/*!40000 ALTER TABLE `general` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table invoices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reservation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;

INSERT INTO `invoices` (`id`, `user_id`, `vehicle_id`, `startdate`, `enddate`, `price`, `total`, `created_at`, `updated_at`, `reservation_id`)
VALUES
  (11,1,18,'0000-00-00 00:00:00','0000-00-00 00:00:00',6120,7405.2,'2013-12-25 22:18:10','2013-12-25 22:18:10',51),
  (12,1,18,'0000-00-00 00:00:00','0000-00-00 00:00:00',6120,7405.2,'2013-12-25 22:19:31','2013-12-25 22:19:31',51),
  (13,2,18,'2014-02-19 00:00:00','2014-07-16 00:00:00',46704,56511.84,'2013-12-25 22:22:02','2013-12-25 22:43:27',52),
  (14,1,18,'0000-00-00 00:00:00','0000-00-00 00:00:00',46704,56511.84,'2013-12-25 22:22:27','2013-12-25 22:22:27',52),
  (15,1,35,'2013-12-28 00:00:00','2014-01-04 00:00:00',42294,51175.74,'2013-12-25 22:44:45','2013-12-25 22:49:59',53),
  (16,1,35,'2013-12-26 00:00:00','2013-12-27 00:00:00',6000,7260,'2013-12-26 10:37:58','2013-12-26 10:37:58',54),
  (17,1,20,'2014-03-07 00:00:00','2014-11-13 00:00:00',1433561.4,1734609.294,'2013-12-26 15:18:43','2013-12-26 15:22:20',57),
  (18,2,18,'2014-01-02 00:00:00','2014-01-21 00:00:00',5472,6621.12,'2013-12-28 12:16:27','2013-12-28 12:16:27',58);

/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
  ('2013_11_30_103812_create_users_table',1),
  ('2013_12_05_113145_create_vehicle_table',2),
  ('2013_12_05_113853_create_vehicleoptions_table',3),
  ('2013_12_05_114129_create_vehiclereview_table',3),
  ('2013_12_05_114447_create_vehiclecategory_table',3),
  ('2013_12_05_114651_create_vehicledamage_table',3),
  ('2013_12_05_120135_create_users_add',4),
  ('2013_12_05_133829_create_usersroles_table',5),
  ('2013_12_05_195440_add_image_vehicle',6),
  ('2013_12_06_190320_create_roles_table',7),
  ('2013_12_09_112132_create_general_table',8),
  ('2013_12_19_121236_create_reservation_table',9),
  ('2013_12_24_124345_create_invoice_table',10),
  ('2013_12_28_144827_create_business_table',11);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reservation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservation`;

CREATE TABLE `reservation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `startdate` text COLLATE utf8_unicode_ci NOT NULL,
  `enddate` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) DEFAULT NULL,
  `sended_review_mail` tinyint(11) NOT NULL,
  `picked_up` tinyint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;

INSERT INTO `reservation` (`id`, `user_id`, `vehicle_id`, `startdate`, `enddate`, `price`, `created_at`, `updated_at`, `status`, `sended_review_mail`, `picked_up`)
VALUES
  (39,1,18,'12/22/2013','12/25/2013',NULL,'2013-12-22 14:21:49','2013-12-26 19:25:20',1,1,0),
  (40,1,20,'12/22/2013','12/31/2013',NULL,'2013-12-22 14:40:09','2013-12-26 19:25:21',0,1,0),
  (41,1,22,'12/22/2013','12/31/2013',NULL,'2013-12-22 14:47:05','2013-12-26 19:25:21',1,1,0),
  (42,1,13,'12/24/2013','12/27/2013',NULL,'2013-12-22 14:53:26','2013-12-26 19:25:22',0,1,0),
  (43,1,13,'12/24/2013','12/27/2013',NULL,'2013-12-22 14:54:54','2013-12-26 19:25:23',0,1,0),
  (44,1,22,'12/22/2013','10/03/2015',NULL,'2013-12-22 15:04:02','2013-12-22 15:04:02',0,0,0),
  (46,1,49,'12/24/2013','12/25/2013',NULL,'2013-12-22 15:07:39','2013-12-26 19:25:24',0,1,0),
  (47,1,13,'01/01/2014','01/13/2014',NULL,'2013-12-23 12:42:16','2013-12-23 12:42:16',0,0,0),
  (48,1,22,'12/24/2013','12/26/2013',NULL,'2013-12-23 23:05:56','2013-12-26 19:25:24',1,1,0),
  (49,1,20,'01/03/2014','01/27/2014',NULL,'2013-12-24 20:32:27','2013-12-24 20:32:27',0,0,0),
  (51,1,18,'01/31/2014','02/20/2014',NULL,'2013-12-25 22:17:04','2013-12-25 22:17:04',0,0,0),
  (52,2,18,'02/19/2014','07/16/2014',NULL,'2013-12-25 22:21:59','2013-12-25 22:40:09',1,0,0),
  (57,1,20,'03/07/2014','11/13/2014',NULL,'2013-12-26 15:18:39','2013-12-26 15:20:53',1,0,0),
  (58,2,18,'01/02/2014','01/21/2014',NULL,'2013-12-28 12:16:23','2013-12-28 12:16:23',0,0,0);

/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reservation_vehicle_option
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservation_vehicle_option`;

CREATE TABLE `reservation_vehicle_option` (
  `reservation_id` int(11) DEFAULT NULL,
  `vehicle_option_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `reservation_vehicle_option` WRITE;
/*!40000 ALTER TABLE `reservation_vehicle_option` DISABLE KEYS */;

INSERT INTO `reservation_vehicle_option` (`reservation_id`, `vehicle_option_id`)
VALUES
  (25,1),
  (25,10),
  (26,1),
  (27,8),
  (27,10),
  (28,1),
  (29,1),
  (30,1),
  (31,1),
  (32,1),
  (33,1),
  (34,1),
  (35,1),
  (36,1),
  (37,1),
  (38,1),
  (39,1),
  (39,6),
  (39,7),
  (40,6),
  (40,7),
  (41,7),
  (41,8),
  (41,10),
  (42,6),
  (43,8),
  (47,6),
  (48,1),
  (51,8),
  (51,10),
  (52,6),
  (52,7),
  (52,10),
  (53,10),
  (57,8);

/*!40000 ALTER TABLE `reservation_vehicle_option` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reviews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;

INSERT INTO `reviews` (`id`, `vehicle_id`, `user_id`, `comment`, `rating`, `created_at`, `updated_at`)
VALUES
  (1,34,1,'Super tol!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (3,0,1,'Super tol!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (4,0,1,'Super tol!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (5,0,1,'Super tol!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (6,0,1,'Super tol!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (7,0,1,'Super tol!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (8,0,1,'Super tol! SALADE SNACKBAR!',5,'2013-12-23 14:35:41','2013-12-23 15:19:16');

/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`)
VALUES
  (1,'admin'),
  (2,'Zakelijk');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table userroles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userroles`;

CREATE TABLE `userroles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `userroles` WRITE;
/*!40000 ALTER TABLE `userroles` DISABLE KEYS */;

INSERT INTO `userroles` (`user_id`, `role_id`)
VALUES
  (1,1);

/*!40000 ALTER TABLE `userroles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
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
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `password`, `email`, `firstname`, `lastname`, `addresslineone`, `addresslinetwo`, `city`, `zipcode`, `country`, `phonenumber`, `licensenumber`, `passportnumber`, `kvknumber`, `vatnumber`, `business`, `company_id`, `created_at`, `updated_at`)
VALUES
  (1,'$2y$08$UosAEKZ7ZVzgnxCFIpTQNOE.HP88m4ONO.l24GRJxK9bVdLZcLVV6','vbvanderlinden@gmail.com','Vincent','van der Linden','Hallincqhof','6','Dordrecht','3311DD','Nederland','0640356771','9123','9123901','','',1,4,'2013-12-05 12:49:53','2013-12-28 16:36:08'),
  (2,'$2y$08$mZz6TNwacrej9g.ApywFVOBQxtaZa3zFwTBQwYRcRxmpBWATKheE6','deamus@gmail.com','Deam','Kop','H.R. Holst-erf 224',NULL,'Dordrecht','3315 TH','Nederland','634188996','0687281937891','781238192','','',0,4,'2013-12-05 12:52:21','2013-12-28 16:34:56'),
  (11,'$2y$08$wa7twoLCmpjkIRRUpBO.m.q.GV5P.uUYOBD6t./mgxvXBrfo54riK','vblinden@outlook.com','Vincent','van der Linden','Hallincqhof','14','Dordrecht','3311DD','Zuid-Holland','1623566062','123','123','123','123',1,4,'2013-12-28 15:51:07','2013-12-28 16:31:02');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehiclecategory
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehiclecategory`;

CREATE TABLE `vehiclecategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `vehiclecategory` WRITE;
/*!40000 ALTER TABLE `vehiclecategory` DISABLE KEYS */;

INSERT INTO `vehiclecategory` (`id`, `name`, `created_at`, `updated_at`)
VALUES
  (1,'Personenauto','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (2,'Bedrijfswagen','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (3,'Motor','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (4,'Scooter','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `vehiclecategory` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehicledamage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicledamage`;

CREATE TABLE `vehicledamage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicleid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `damage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table vehicleoptions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicleoptions`;

CREATE TABLE `vehicleoptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `vehicleoptions` WRITE;
/*!40000 ALTER TABLE `vehicleoptions` DISABLE KEYS */;

INSERT INTO `vehicleoptions` (`id`, `name`, `price`, `created_at`, `updated_at`)
VALUES
  (6,'All-risk verzekering',1.25,'2013-12-18 22:55:37','2013-12-18 22:55:37'),
  (7,'Inzittende verzekering',0.5,'2013-12-18 22:55:49','2013-12-19 19:43:00'),
  (8,'WA verzekering',0.5,'2013-12-18 22:56:08','2013-12-19 19:43:14'),
  (10,'Tomtom',0.25,'2013-12-21 10:29:14','2013-12-22 14:49:11');

/*!40000 ALTER TABLE `vehicleoptions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehiclereviews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehiclereviews`;

CREATE TABLE `vehiclereviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicleid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table vehicles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;

INSERT INTO `vehicles` (`id`, `categoryid`, `brand`, `model`, `milage`, `licenseplate`, `usage`, `comment`, `color`, `hourlyrate`, `vehiclecategoryid`, `vehiclereviewid`, `vehicleoptionsid`, `vehicledamageid`, `locked`, `created_at`, `updated_at`, `image`)
VALUES
  (13,0,'Suzuki','GSX-R 1000',0,'12-12-12',5,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Wit met blauw',3,3,0,0,0,0,'2013-12-07 11:03:00','2013-12-10 07:19:23','KvPjunzVXKKTOB04hkC0.jpg'),
  (18,0,'BMW','X6',4512,'13-13-13',1,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Wit',12,1,0,0,0,0,'2013-12-10 07:40:37','2013-12-10 07:40:37','WtgUoiIhsTyuFV3huixM.jpg'),
  (20,0,'Lamborghini','Aventador',10,'15-15-15',3,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Mat zwart',250,1,0,0,0,0,'2013-12-10 07:46:25','2013-12-10 07:55:08','AtDgiR86xL7zhtblppZ7.jpg'),
  (22,0,'Daihatsu','Cuore',109381,'17-17-17',4,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Rood',2,1,0,0,0,0,'2013-12-10 07:52:48','2013-12-10 07:54:28','XYUcuBRNJ1jkNtGwHTlA.jpg'),
  (23,0,'Volkswagen','Transporter',89123,'01-01-01',15,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Zwart',12,2,0,0,0,0,'2013-12-11 08:07:45','2013-12-11 08:07:45','So3uF619zwJKNKaz38Er.jpg'),
  (34,0,'BMW','X6',4512,'13-13-13',1,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Wit',12,1,0,0,0,0,'2013-12-10 07:40:37','2013-12-10 07:40:37','WtgUoiIhsTyuFV3huixM.jpg'),
  (35,0,'Lamborghini','Aventador',10,'15-15-15',3,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Mat zwart',250,1,0,0,0,0,'2013-12-10 07:46:25','2013-12-10 07:55:08','AtDgiR86xL7zhtblppZ7.jpg'),
  (37,0,'Daihatsu','Cuore',109381,'17-17-17',4,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Rood',2,1,0,0,0,0,'2013-12-10 07:52:48','2013-12-10 07:54:28','XYUcuBRNJ1jkNtGwHTlA.jpg'),
  (38,0,'Volkswagen','Transporter',89123,'01-01-01',15,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Zwart',12,2,0,0,0,0,'2013-12-11 08:07:45','2013-12-11 08:07:45','So3uF619zwJKNKaz38Er.jpg'),
  (39,0,'Vespa','Oldskool',12930,'01-NFJ-1',20,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Rood',5,4,0,0,0,0,'2013-12-11 08:35:20','2013-12-11 08:35:33','2zknt3GMHlx3OB7seuG9.jpg'),
  (43,0,'BMW','X6',4512,'13-13-13',1,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Wit',12,1,0,0,0,0,'2013-12-10 07:40:37','2013-12-10 07:40:37','WtgUoiIhsTyuFV3huixM.jpg'),
  (44,0,'Lamborghini','Aventador',10,'15-15-15',3,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Mat zwart',250,1,0,0,0,0,'2013-12-10 07:46:25','2013-12-10 07:55:08','AtDgiR86xL7zhtblppZ7.jpg'),
  (46,0,'Daihatsu','Cuore',109381,'17-17-17',4,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Rood',2,1,0,0,0,0,'2013-12-10 07:52:48','2013-12-10 07:54:28','XYUcuBRNJ1jkNtGwHTlA.jpg'),
  (47,0,'Volkswagen','Transporter',89123,'01-01-01',15,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Zwart',12,2,0,0,0,0,'2013-12-11 08:07:45','2013-12-11 08:07:45','So3uF619zwJKNKaz38Er.jpg'),
  (49,0,'Audi','A6',124,'12-12-12',12,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.\0','Zwart',12,1,0,0,0,0,'2013-12-11 13:14:57','2013-12-11 13:14:57','iIyIXhwU9PTjMBo2C6Uc.jpg');

/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

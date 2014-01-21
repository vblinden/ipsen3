# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 172.22.22.22 (MySQL 5.5.34-0ubuntu0.12.04.1-log)
# Database: leenmeij
# Generation Time: 2014-01-21 22:09:45 +0000
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
  `skin` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latestnews` text COLLATE utf8_unicode_ci,
  `latestnewsenglish` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `general` WRITE;
/*!40000 ALTER TABLE `general` DISABLE KEYS */;

INSERT INTO `general` (`id`, `vat`, `skin`, `latestnews`, `latestnewsenglish`, `created_at`, `updated_at`)
VALUES
  (1,21,'Standaard','De afgelopen maanden zijn wij druk bezig geweest met het ontwikkelen van een nieuwe website, die binnenkort volledig online zal komen. De website heeft een nieuwe frisse uitstraling gekregen, en beschikt over talloze nieuwe functies en mogelijkheden om u als klant nog beter van dienst te kunnen zijn. <br/><br/>\r\n\r\nDe nieuwe website voor LeenMeij is ontwikkeld in samenwerking met Vinnie & Deampie Enterprises Ltd, een full-service internetbureau dat gespecialiseerd is in het bedenken, ontwerpen en bouwen van hoogwaardige internetapplicaties. De nieuwe website is overzichtelijker en gebruiksvriendelijker, waar we er blij mee zijn.','The last few months ..','0000-00-00 00:00:00','2014-01-21 20:54:35');

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
  (20,24,50,'2014-01-21 00:00:00','2014-01-25 00:00:00',408,493.68,'2014-01-21 21:55:45','2014-01-21 21:55:45',64);

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
  (64,24,50,'01/21/2014','01/25/2014',NULL,'2014-01-21 21:55:37','2014-01-21 21:55:37',0,0,0);

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
  (64,7),
  (64,8),
  (64,10);

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
  (1,34,1,'De auto was top!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (3,0,1,'Goede service en betaalbaar!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (4,0,1,'Alles is goed geregeld!',4,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (5,0,1,'Ik kreeg korting omdat ik twee maanden van te voren had gereserveerd!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (6,0,1,'Geweldig bedrijf, hele goede service',5,'2013-12-23 14:35:41','2013-12-23 14:41:41'),
  (7,0,1,'Geholpen door mensen met kennis!',5,'2013-12-23 14:35:41','2013-12-23 14:41:41');

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
  (2,'Zakelijk'),
  (3,'Balie'),
  (4,'Garage');

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
  (1,1),
  (24,1);

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
  (2,'$2y$08$mZz6TNwacrej9g.ApywFVOBQxtaZa3zFwTBQwYRcRxmpBWATKheE6','deamus@gmail.com','Deam','Kop','H.R. Holst-erf','224','Dordrecht','3315 TH','Nederland','634188996','0687281937891','781238192','','',0,4,'2013-12-05 12:52:21','2013-12-28 16:34:56'),
  (24,'$2y$08$J7pKKqwEauqfloHL2Au6O.hvZdZlSGknuyB1sasBwtZG.XK0/IFCS','admin@admin.nl','Administrator','Administrator','Hallincqhof','14','Dordrecht','3311DD','Nederland','0612345678','1234','1234',NULL,NULL,0,0,'2014-01-21 20:52:09','2014-01-21 20:52:09');

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


# Dump of table vehicles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `milage` int(11) NOT NULL,
  `licenseplate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vehicleusage` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hourlyrate` double NOT NULL,
  `vehiclecategoryid` int(11) NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;

INSERT INTO `vehicles` (`id`, `brand`, `model`, `milage`, `licenseplate`, `vehicleusage`, `comment`, `color`, `hourlyrate`, `vehiclecategoryid`, `locked`, `created_at`, `updated_at`, `image`)
VALUES
  (50,'Ford','Fiesta',1234,'01-01-01',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Blauw',3,1,0,'2014-01-21 21:20:21','2014-01-21 21:20:21','YjJFml5j9VPhxwllDEjq.jpg'),
  (51,'Ford','Focus',1234,'02-02-02',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Groen',4,1,0,'2014-01-21 21:20:58','2014-01-21 21:20:58','si6Ryhqkgw1sMRPD6iwt.jpg'),
  (52,'Ford','Mondeo',1234,'03-03-03',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Rood',2,1,0,'2014-01-21 21:21:34','2014-01-21 21:21:34','i7u5UcDcL9jLgQ9Jvazh.jpg'),
  (53,'Mercedes','C Klasse',1234,'04-04-04',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Wit',8,1,0,'2014-01-21 21:22:21','2014-01-21 21:22:21','MsnUUPV9OWfDco3d81Up.jpg'),
  (54,'Audi','A6 Station',1234,'05-05-05',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Grijs',5,1,0,'2014-01-21 21:23:13','2014-01-21 21:23:13','hwdXMiQnX6ev8uK8qrAg.jpg'),
  (55,'Volkswagen','Caddy',1234,'06-06-06',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Rood',2,2,0,'2014-01-21 21:24:43','2014-01-21 21:24:43','g0vY3Ec5GmC865gb3iiN.jpg'),
  (56,'Volkswagen','Transporter',1234,'07-07-07',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Blauw',2,2,0,'2014-01-21 21:25:33','2014-01-21 21:25:33','yDbCLlbmaeUenLmBWX4i.jpg'),
  (57,'Ford','Transit',1234,'09-09-09',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Blauw',2.5,2,0,'2014-01-21 21:27:18','2014-01-21 21:27:18','dae4hXBpJRDHl31PEhL3.jpg'),
  (58,'Mercedes','E Klasse',1234,'10-10-10',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Zwart',10,1,0,'2014-01-21 21:29:35','2014-01-21 21:29:35','XgQcytqykOXkPGAqQKmC.jpg'),
  (59,'Ford','Galaxy',1234,'11-11-11',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Zwart',1,2,0,'2014-01-21 21:30:27','2014-01-21 21:30:27','KaJBoj85ims3mPL0V8En.jpg'),
  (60,'Volkswagen','Touran',1234,'12-12-12',10,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Bruin',3,1,0,'2014-01-21 21:32:56','2014-01-21 21:32:56','rAPp1qApLl9jzlXQVmI7.jpg'),
  (61,'Harley Davidson','XR1200X',1234,'20-20-20',20,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Zwart',8,3,0,'2014-01-21 21:37:47','2014-01-21 21:37:47','2LavYi80lZBwpU3fH95N.jpg'),
  (62,'Honda','NC750',1234,'21-21-21',18,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Grijs met zwart',1.5,3,0,'2014-01-21 21:42:24','2014-01-21 21:42:24','DJizgeYlSwYlBQC1Us1l.jpg'),
  (63,'Kawasaki','Ninja ZX-6-R',1234,'31-31-31',24,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Groen',2,3,0,'2014-01-21 21:47:05','2014-01-21 21:47:05','dwLKqD1GQZkfDXEvP5kD.jpg'),
  (64,'Yamaha','BW50',1234,'41-41-41',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Blauw',0.3,4,0,'2014-01-21 21:50:54','2014-01-21 21:50:54','BsldA76jyNI3AXWIM1ZK.jpg'),
  (65,'Aprilia','SR50',1234,'51-51-51',40,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Zwart met rood',0.15,4,0,'2014-01-21 21:52:17','2014-01-21 21:52:17','Ld7WSAV28iQeOfMqSirO.jpg'),
  (66,'Piaggo','MP3',1234,'66-66-66',12,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, cupiditate, laudantium aut ipsa dolores ut facilis sint explicabo ratione iure quos quidem ab perferendis consectetur recusandae repudiandae magni? Molestias, sequi.','Grijs',0.85,4,0,'2014-01-21 21:53:35','2014-01-21 21:54:24','qPLTlHPFIDMQieN2kIZK.jpg');

/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

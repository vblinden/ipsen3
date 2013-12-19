CREATE DATABASE  IF NOT EXISTS `ipsen3` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ipsen3`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: ipsen3
-- ------------------------------------------------------
-- Server version	5.6.15-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `general`
--

DROP TABLE IF EXISTS `general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general`
--

LOCK TABLES `general` WRITE;
/*!40000 ALTER TABLE `general` DISABLE KEYS */;
INSERT INTO `general` VALUES (1,21,'0000-00-00 00:00:00','2013-12-09 10:29:44');
/*!40000 ALTER TABLE `general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2013_11_30_103812_create_users_table',1),('2013_12_05_113145_create_vehicle_table',2),('2013_12_05_113853_create_vehicleoptions_table',3),('2013_12_05_114129_create_vehiclereview_table',3),('2013_12_05_114447_create_vehiclecategory_table',3),('2013_12_05_114651_create_vehicledamage_table',3),('2013_12_05_120135_create_users_add',4),('2013_12_05_133829_create_usersroles_table',5),('2013_12_05_195440_add_image_vehicle',6),('2013_12_06_190320_create_roles_table',7),('2013_12_09_112132_create_general_table',8),('2013_12_19_121236_create_reservation_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `startdate` text COLLATE utf8_unicode_ci NOT NULL,
  `enddate` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (2,1,17,'12/19/2013','12/20/2013',NULL,'2013-12-19 12:15:38','2013-12-19 12:15:38'),(3,1,13,'12/20/2013','12/21/2013',NULL,'2013-12-19 12:16:18','2013-12-19 12:16:18'),(4,1,13,'12/19/2013','12/20/2013',NULL,'2013-12-19 12:22:37','2013-12-19 12:22:37');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_vehicle_option`
--

DROP TABLE IF EXISTS `reservation_vehicle_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_vehicle_option` (
  `reservation_id` int(11) DEFAULT NULL,
  `vehicle_option_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_vehicle_option`
--

LOCK TABLES `reservation_vehicle_option` WRITE;
/*!40000 ALTER TABLE `reservation_vehicle_option` DISABLE KEYS */;
INSERT INTO `reservation_vehicle_option` VALUES (2,5),(3,1),(3,5),(3,6),(3,7),(3,8),(4,7),(1,5),(1,5),(1,6),(1,5),(1,6),(4,7),(4,9);
/*!40000 ALTER TABLE `reservation_vehicle_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userroles`
--

DROP TABLE IF EXISTS `userroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userroles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userroles`
--

LOCK TABLES `userroles` WRITE;
/*!40000 ALTER TABLE `userroles` DISABLE KEYS */;
INSERT INTO `userroles` VALUES (0,0),(0,0),(1,1);
/*!40000 ALTER TABLE `userroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'$2y$08$UosAEKZ7ZVzgnxCFIpTQNOE.HP88m4ONO.l24GRJxK9bVdLZcLVV6','vbvanderlinden@gmail.com','Vincent','van der Linden','Hallincqhof','6','Dordrecht','3311DD','Nederland','0640356771','9123','9123901','','',0,'2013-12-05 11:49:53','2013-12-19 09:56:47'),(2,'$2y$08$mZz6TNwacrej9g.ApywFVOBQxtaZa3zFwTBQwYRcRxmpBWATKheE6','deamus@gmail.com','Deam','Kop','H.R. Holst-erf 224',NULL,'Dordrecht','3315 TH','Nederland','634188996','0687281937891','781238192','','',0,'2013-12-05 11:52:21','2013-12-05 11:52:21'),(8,'$2y$08$2Y0fSk3aVW3MvBRp150.teYogpz11KUzbx6qlQuQ4Q38T7/1RkS/a','zuigpik@asd.nl','Floris','Admiraal','asdasd',NULL,'asdad','asdasd','asdad','dsada','dasd','asdad','','',1,'2013-12-10 14:21:50','2013-12-10 14:24:10'),(9,'$2y$08$octGlZqZxkv5hlC8pEcaS.xWB3u2tPfB1IJEjtg7PTTkEefEC1o3G','Karel@henk.nl','henk','karelse','123123',NULL,'123123','123123','123123','12132','123123','123123','','',1,'2013-12-10 14:22:47','2013-12-10 14:22:47');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiclecategory`
--

DROP TABLE IF EXISTS `vehiclecategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiclecategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiclecategory`
--

LOCK TABLES `vehiclecategory` WRITE;
/*!40000 ALTER TABLE `vehiclecategory` DISABLE KEYS */;
INSERT INTO `vehiclecategory` VALUES (1,'Personenauto','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Bedrijfswagen','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Motor','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Scooter','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `vehiclecategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicledamage`
--

DROP TABLE IF EXISTS `vehicledamage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicledamage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicleid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `damage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicledamage`
--

LOCK TABLES `vehicledamage` WRITE;
/*!40000 ALTER TABLE `vehicledamage` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicledamage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicleoptions`
--

DROP TABLE IF EXISTS `vehicleoptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicleoptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicleoptions`
--

LOCK TABLES `vehicleoptions` WRITE;
/*!40000 ALTER TABLE `vehicleoptions` DISABLE KEYS */;
INSERT INTO `vehicleoptions` VALUES (1,'Skibox',1.75,'2013-12-18 21:04:45','2013-12-18 21:42:42'),(5,'Dakdrager',0.75,'2013-12-18 21:55:23','2013-12-18 21:55:23'),(6,'All-risk verzekering',1.25,'2013-12-18 21:55:37','2013-12-18 21:55:37'),(7,'Inzittende verzekering',0.402,'2013-12-18 21:55:49','2013-12-18 21:55:49'),(8,'WA verzekering',0.65,'2013-12-18 21:56:08','2013-12-18 21:56:08'),(9,'Michiel',0,'2013-12-19 13:20:23','2013-12-19 13:20:23');
/*!40000 ALTER TABLE `vehicleoptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiclereviews`
--

DROP TABLE IF EXISTS `vehiclereviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiclereviews`
--

LOCK TABLES `vehiclereviews` WRITE;
/*!40000 ALTER TABLE `vehiclereviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehiclereviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (13,0,'Suzuki','GSX-R 1000',0,'12-12-12',5,' The new bike gained 14 lb (6.4 kg) over the 2006 model which was due to its new exhaust system and new emissions regulations. To counter this weight increase, Suzuki claimed improved aerodynamics along with a faster revving engine and larger throttle bod','Wit met blauw',1213,3,0,0,0,0,'2013-12-07 10:03:00','2013-12-09 12:10:51','a91XcrsCQyWnAJmQS8cj.jpg'),(17,0,'Audi','A6',12093,'11-11-11',12,'a 2.8-litre FSI V6 with 204 horsepower (152 kW) and a 300 horsepower (224 kW), 3.0-litre supercharged FSI engine – and three diesel engines – a 2.0-litre inline four-cylinder and a 3.0-litre turbocharged diesel engine in three states of tune.','Zwart',1,1,0,0,0,0,'2013-12-07 21:30:31','2013-12-09 18:15:07','3EBILVfhScwL4Ew2zJkV.jpg');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-19 20:18:57

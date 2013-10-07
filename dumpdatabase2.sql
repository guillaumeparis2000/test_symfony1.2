-- MySQL dump 10.13  Distrib 5.1.66, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ofertix
-- ------------------------------------------------------
-- Server version	5.1.66-0+squeeze1

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
-- Table structure for table `sf_guard_group`
--

DROP TABLE IF EXISTS `sf_guard_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_group_U_1` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group`
--

LOCK TABLES `sf_guard_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_group` DISABLE KEYS */;
INSERT INTO `sf_guard_group` VALUES (1,'contabilidad','contabilidad'),(2,'produccion','produccion'),(3,'comercial','comercial'),(4,'callcenter','callcenter');
/*!40000 ALTER TABLE `sf_guard_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group_permission`
--

DROP TABLE IF EXISTS `sf_guard_group_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_FI_2` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_FK_1` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group_permission`
--

LOCK TABLES `sf_guard_group_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_group_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_group_permission` VALUES (1,3),(2,4),(3,5),(4,6);
/*!40000 ALTER TABLE `sf_guard_group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_permission`
--

DROP TABLE IF EXISTS `sf_guard_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_permission_U_1` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_permission`
--

LOCK TABLES `sf_guard_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_permission` VALUES (1,'impares','impares\r\n'),(2,'pares','pares\r\n'),(3,'contabilidad','contabilidad'),(4,'produccion','produccion'),(5,'comercial','comercial'),(6,'callcenter','callcenter');
/*!40000 ALTER TABLE `sf_guard_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_remember_key`
--

DROP TABLE IF EXISTS `sf_guard_remember_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_remember_key` (
  `user_id` int(11) NOT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`ip_address`),
  CONSTRAINT `sf_guard_remember_key_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_remember_key`
--

LOCK TABLES `sf_guard_remember_key` WRITE;
/*!40000 ALTER TABLE `sf_guard_remember_key` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_remember_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user`
--

DROP TABLE IF EXISTS `sf_guard_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_user_U_1` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user`
--

LOCK TABLES `sf_guard_user` WRITE;
/*!40000 ALTER TABLE `sf_guard_user` DISABLE KEYS */;
INSERT INTO `sf_guard_user` VALUES (1,'contabilidad01','sha1','dc19bfde3c1b7025bd2e274cb59c2c28','7e90a2d2ed3700773e94d8540650176c4747a8b3','2013-10-06 18:36:22','2013-10-07 18:20:54',1,0),(2,'contabilidad02','sha1','dc97e3e874476a5d37e16690e369ad5e','9fac005ff9ba45cdc262740052862c2cfe55c35b','2013-10-06 18:36:37','2013-10-07 17:55:35',1,0),(3,'admin','sha1','efacc7166bdfcaeb033cb216ea0c45ca','a1d6f921110ccb1beeda51be15f7a9418f88a798','2013-10-06 18:41:42','2013-10-07 18:32:59',1,1),(4,'produccion01','sha1','c852e3874175b887a41b66845a3b852b','60fb77430deb00aac250b23c72d0dfe2b79817c6','2013-10-06 18:46:34','2013-10-07 18:30:16',1,0),(5,'produccion02','sha1','93ebe1727489311fed525ec37ddc709d','3717c0fa64770adedc8edf48eebb4c9a4307592c','2013-10-06 18:46:45','2013-10-07 18:30:33',1,0),(6,'comercial01','sha1','e105964743429cbd11de301a4beafcec','6ecf255de27ec1d523ab84fa23b068aba093799b','2013-10-06 18:46:56','2013-10-07 18:30:46',1,0),(7,'comercial02','sha1','4a4e6c33a7150bb5931c5bb68551acc4','99f103f294ad9e204082c3342dc78545a0edd338','2013-10-06 18:47:12','2013-10-07 18:30:54',1,0),(8,'callcenter01','sha1','fe7df875e9edd7acfe55a413ed39a027','4095e277ff6d73232b01f50b8cd0ca40b9a7b71a','2013-10-06 18:47:28','2013-10-07 18:31:07',1,0),(9,'callcenter02','sha1','6e3ee070c171346b29d93776159068b2','27ba8a138e51641b1e89afe1df1e7fdcde425f65','2013-10-06 18:47:42','2013-10-07 18:31:15',1,0);
/*!40000 ALTER TABLE `sf_guard_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_group`
--

DROP TABLE IF EXISTS `sf_guard_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_FI_2` (`group_id`),
  CONSTRAINT `sf_guard_user_group_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_FK_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_group`
--

LOCK TABLES `sf_guard_user_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_group` DISABLE KEYS */;
INSERT INTO `sf_guard_user_group` VALUES (1,1),(2,1),(4,2),(5,2),(6,3),(7,3),(8,4),(9,4);
/*!40000 ALTER TABLE `sf_guard_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_permission`
--

DROP TABLE IF EXISTS `sf_guard_user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_FI_2` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_permission`
--

LOCK TABLES `sf_guard_user_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_user_permission` VALUES (1,1),(4,1),(6,1),(7,1),(8,1),(2,2),(4,2),(5,2),(7,2),(9,2);
/*!40000 ALTER TABLE `sf_guard_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-07 18:41:07

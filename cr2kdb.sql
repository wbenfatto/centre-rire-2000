-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: cr2kdb
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth`
--

LOCK TABLES `auth` WRITE;
/*!40000 ALTER TABLE `auth` DISABLE KEYS */;
INSERT INTO `auth` VALUES (1,'cr2k','202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `arrived` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `statut` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `situation` varchar(255) NOT NULL,
  `nas` varchar(50) NOT NULL,
  `cp12` varchar(100) NOT NULL,
  `cle` varchar(100) NOT NULL,
  `found` varchar(255) NOT NULL,
  `profile` mediumtext NOT NULL,
  `objectives` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table1`
--

DROP TABLE IF EXISTS `table1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table1`
--

LOCK TABLES `table1` WRITE;
/*!40000 ALTER TABLE `table1` DISABLE KEYS */;
/*!40000 ALTER TABLE `table1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table2`
--

DROP TABLE IF EXISTS `table2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table2`
--

LOCK TABLES `table2` WRITE;
/*!40000 ALTER TABLE `table2` DISABLE KEYS */;
/*!40000 ALTER TABLE `table2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table3`
--

DROP TABLE IF EXISTS `table3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table3` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table3`
--

LOCK TABLES `table3` WRITE;
/*!40000 ALTER TABLE `table3` DISABLE KEYS */;
/*!40000 ALTER TABLE `table3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table4`
--

DROP TABLE IF EXISTS `table4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table4` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table4`
--

LOCK TABLES `table4` WRITE;
/*!40000 ALTER TABLE `table4` DISABLE KEYS */;
/*!40000 ALTER TABLE `table4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table5`
--

DROP TABLE IF EXISTS `table5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table5` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table5`
--

LOCK TABLES `table5` WRITE;
/*!40000 ALTER TABLE `table5` DISABLE KEYS */;
/*!40000 ALTER TABLE `table5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table6`
--

DROP TABLE IF EXISTS `table6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table6` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table6`
--

LOCK TABLES `table6` WRITE;
/*!40000 ALTER TABLE `table6` DISABLE KEYS */;
/*!40000 ALTER TABLE `table6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table7`
--

DROP TABLE IF EXISTS `table7`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table7` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table7`
--

LOCK TABLES `table7` WRITE;
/*!40000 ALTER TABLE `table7` DISABLE KEYS */;
/*!40000 ALTER TABLE `table7` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-18 12:35:39

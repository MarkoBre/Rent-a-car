-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: rent_a_car
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `person` (
  `personId` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`personId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (2,'Goran','Pivo','Toga','ajradipls','1987-08-18',1),(10,'Goran','Konjovic','Offenburg','Germany','1993-12-12',1),(11,'Marko','Vukadinovic','Bor','Serbia','2003-08-18',1),(12,'Igor','Smrdomudic','Belgrade','Serbia','1690-09-09',0),(13,'Mihajlo','Vukadonovic','MojPas','ToJE','1999-09-06',1),(14,'Edo','Sef','Pomalo','Svuda','1420-09-06',1),(15,'Nikola','Pecic','Bor','Serbia','2001-11-16',1),(21,'Mitic','Mali','Tupavi','Decko','1977-04-17',1);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rent`
--

DROP TABLE IF EXISTS `rent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `personId` int DEFAULT NULL,
  `vehicleId` int DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personId` (`personId`),
  KEY `vehicleId` (`vehicleId`),
  CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `person` (`personId`),
  CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`vehicleId`) REFERENCES `vehicle` (`vehicleId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rent`
--

LOCK TABLES `rent` WRITE;
/*!40000 ALTER TABLE `rent` DISABLE KEYS */;
INSERT INTO `rent` VALUES (1,2,3,'2022-12-30 12:37:00','2022-12-31 20:44:00'),(2,10,13,'2021-11-07 12:30:00','2021-12-07 12:30:00'),(3,11,18,'1999-10-12 12:12:00','1999-12-12 12:12:00'),(4,12,21,'2003-08-18 22:22:00','2003-11-18 22:22:00'),(5,13,14,'2022-12-08 17:00:00','2022-12-22 03:30:00'),(6,14,19,'2023-02-22 15:00:00','2023-03-22 15:00:00'),(7,21,16,'2022-12-07 12:00:00','2022-12-21 04:05:00');
/*!40000 ALTER TABLE `rent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle` (
  `vehicleId` int NOT NULL AUTO_INCREMENT,
  `manufacturer` varchar(255) DEFAULT NULL,
  `vehicleModel` varchar(255) DEFAULT NULL,
  `vehicleEngine` varchar(255) DEFAULT NULL,
  `vehicleYear` int DEFAULT NULL,
  `isRented` tinyint(1) DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT NULL,
  `consumptionPer100Km` float DEFAULT NULL,
  PRIMARY KEY (`vehicleId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (3,'Renault','Megane','1.5 DCI',2010,127,-69,27),(10,'Hyundai','Tucson','1.6 T-GDI',2022,0,1,13),(11,'Kia','Sorento','2.2 CRDI',2021,0,1,10),(12,'Volkswagen','T-Cross Life','1.0 TSI',2022,0,1,11),(13,'BMW','X5 X-Drive','3.0 NZM',2020,127,-69,16),(14,'Audi','Q5 Sportback','2.2 MRS',2019,69,-69,15),(15,'Fiat','Tipo','1.0',2020,0,1,8),(16,'Renault','Clio','1.0',2022,69,1,7),(17,'Opel','Astra J Sedan','1.4 Turbo',2020,0,1,6),(18,'Citroen','C5','2.0d',2015,127,-69,9),(19,'Volkswagen','Golf 6','1.6 TDI',2012,69,1,11),(20,'Dodge','Journey','2.0 CRD',2009,0,1,13),(21,'Volkswagen','Polo','1.4',2012,127,-69,5);
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-22  3:37:14

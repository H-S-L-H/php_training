-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: login_sample_db
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `codes`
--

DROP TABLE IF EXISTS `codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `codes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(125) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `expire` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `expire` (`expire`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codes`
--

LOCK TABLES `codes` WRITE;
/*!40000 ALTER TABLE `codes` DISABLE KEYS */;
INSERT INTO `codes` VALUES (1,'hello@gmail.com','42070',1645694464),(2,'hello@gmail.com','59365',1645694515),(3,'hansulinnhtet@gmail.com','20400',1645696516),(4,'hansulinnhtet@gmail.com','9381',1645696815),(5,'hansulinnhtet@gmail.com','38334',1645696937),(6,'hansulinnhtet@gmail.com','69786',1645697102),(7,'hansulinnhtet@gmail.com','32202',1645698227),(8,'hansulinnhtet@gmail.com','26885',1645698249),(9,'hansulinnhtet@gmail.com','78813',1645698324),(10,'hansulinnhtet@gmail.com','3524',1645698331),(11,'hansulinnhtet@gmail.com','60747',1645698832),(12,'hansulinnhtet@gmail.com','60505',1645699112),(13,'hansulinnhtet@gmail.com','81404',1645699164),(14,'hansulinnhtet@gmail.com','17550',1645699308),(15,'hansulinnhtet@gmail.com','47446',1645699412),(16,'hansulinnhtet@gmail.com','18575',1645699559),(17,'hansulinnhtet@gmail.com','6832',1645700143),(18,'hansulinnhtet@gmail.com','42612',1645700307),(19,'hansulinnhtet@gmail.com','21748',1645700469),(20,'hansulinnhtet@gmail.com','1193',1645708601);
/*!40000 ALTER TABLE `codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-24 21:30:23

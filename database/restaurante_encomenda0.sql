-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: restaurante
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `encomenda`
--

DROP TABLE IF EXISTS `encomenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encomenda` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `dataSubmissao` varchar(45) NOT NULL,
  `montante` float NOT NULL,
  `cliente_id` int unsigned NOT NULL,
  `restaurante_id` int unsigned NOT NULL,
  `estado_id` int unsigned NOT NULL,
  `ementa_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encomenda_ementa` (`ementa_id`),
  KEY `fk_encomenda_cliente` (`cliente_id`),
  KEY `fk_encomenda_restaurante` (`restaurante_id`),
  KEY `fk_encomenda_estado` (`estado_id`),
  CONSTRAINT `fk_encomenda_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `fk_encomenda_ementa` FOREIGN KEY (`ementa_id`) REFERENCES `ementa` (`id`),
  CONSTRAINT `fk_encomenda_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`),
  CONSTRAINT `fk_encomenda_restaurante` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurante` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encomenda`
--

LOCK TABLES `encomenda` WRITE;
/*!40000 ALTER TABLE `encomenda` DISABLE KEYS */;
INSERT INTO `encomenda` VALUES (8,'2023-06-02 14:17:39',5.3,1,1,5,10),(9,'2023-06-02 14:34:24',2.9,1,1,5,9),(10,'2023-06-02 14:34:24',2.9,1,1,5,9),(11,'2023-06-02 14:34:24',2.9,1,1,5,9),(13,'2023-06-02 14:34:49',2.9,1,1,4,9),(15,'2023-06-02 14:35:41',5.3,1,1,4,10),(16,'2023-06-02 14:35:41',5.3,1,1,4,10),(17,'2023-06-02 14:35:41',5.3,1,1,4,10),(19,'2023-06-02 14:36:50',2.9,1,1,4,9),(23,'2023-06-06 20:54:03',1,1,1,3,13),(24,'2023-06-06 21:01:01',1,1,1,3,13),(25,'2023-06-06 21:05:44',1,1,1,3,13),(26,'2023-06-06 21:10:21',1,1,1,3,13),(27,'2023-06-06 21:11:43',1,1,1,3,13),(28,'2023-06-06 21:19:05',1,1,1,3,13),(29,'2023-06-06 21:19:38',1,1,1,3,13),(30,'2023-06-06 21:20:20',1,1,1,3,13),(31,'2023-06-06 21:22:57',1,1,1,3,13),(32,'2023-06-06 21:25:28',1,1,1,3,13),(33,'2023-06-06 21:27:27',1,1,1,3,13),(34,'2023-06-06 21:42:27',1,1,1,3,13),(35,'2023-06-06 22:31:47',1.9,1,1,4,12),(37,'2023-06-06 22:33:26',1.9,1,1,3,12),(38,'2023-06-06 22:34:43',1.9,1,1,3,12),(39,'2023-06-06 22:34:51',1.9,1,1,3,12),(40,'2023-06-06 22:35:06',1.9,1,1,3,12),(41,'2023-06-06 22:35:22',1.9,1,1,3,12),(42,'2023-06-06 22:38:22',1.9,1,1,4,12),(43,'2023-06-06 22:38:58',1.9,1,1,3,12);
/*!40000 ALTER TABLE `encomenda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-07 12:27:29

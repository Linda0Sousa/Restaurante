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
-- Table structure for table `ementa`
--

DROP TABLE IF EXISTS `ementa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ementa` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `preco` float NOT NULL,
  `imagem` varchar(300) NOT NULL,
  `restaurante_id` int unsigned NOT NULL,
  `estado_id` int unsigned NOT NULL,
  `tipo_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ementas_restaurante` (`restaurante_id`),
  KEY `fk_ementas_estado` (`estado_id`),
  KEY `fk_ementas_tipo` (`tipo_id`),
  CONSTRAINT `fk_ementas_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`),
  CONSTRAINT `fk_ementas_restaurante` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurante` (`id`),
  CONSTRAINT `fk_ementas_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ementa`
--

LOCK TABLES `ementa` WRITE;
/*!40000 ALTER TABLE `ementa` DISABLE KEYS */;
INSERT INTO `ementa` VALUES (9,'novasBatatas','nova descrição para batatas',2.9,'../pratos/img/WwII41M-spyro-wallpapers.jpg',1,1,6),(10,'hamburger','pao com hamburguer',5.3,'../pratos/img/WwII41M-spyro-wallpapers.jpg',1,1,5),(12,'teste','teste',1.9,'../pratos/img/wp7080156-anime-programming-wallpapers.jpg',1,1,5),(13,'Linda Inês Cordeiro Sousa','teste',1,'../pratos/img/wp4932296-programming-minimal-wallpapers.jpg',1,1,3),(14,'teste','teste',1,'../pratos/img/',1,2,6),(15,'teste','teste',1,'../pratos/img/batata.jpg',1,2,6);
/*!40000 ALTER TABLE `ementa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-07 12:33:49

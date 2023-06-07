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
-- Table structure for table `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilizador` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(90) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `password` varchar(1500) NOT NULL,
  `perfil_id` int unsigned NOT NULL,
  `situacao_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_utilizador_perfil` (`perfil_id`),
  KEY `fk_utilizador_situacao` (`situacao_id`),
  CONSTRAINT `fk_utilizador_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  CONSTRAINT `fk_utilizador_situacao` FOREIGN KEY (`situacao_id`) REFERENCES `situacao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilizador`
--

LOCK TABLES `utilizador` WRITE;
/*!40000 ALTER TABLE `utilizador` DISABLE KEYS */;
INSERT INTO `utilizador` VALUES (1,'cliente@gmail.com','Linda','$2y$10$vsj5fF15jo11PCejxDGE3el42W37W/gkqkqV7ax45ZhpFdUd8XUIO',2,1),(2,'restaurante@gmail.com','O Salgadinho','$2y$10$xZteMkzitqvG1rM3WkFvouhDO.2NzSVl9oKTjOW5.6cv7hMjM35Mu',3,1),(3,'sousalinda522@gmail.com','linda','$2y$10$YNw3yYVGS7eq42vPzXP1/eqkKSsqXptn9JR0/d7mvoBCnvBpRHgi2',1,1),(4,'restaurante2@gmail.com','linda','$2y$10$45INT0S4kCgTrDk5HXH77u6i1cTtVMOyzgJQCViGdOUjWm/.0XPMC',3,1),(5,'sousalida522@gmail.com','linda','$2y$10$wcjfS6pc2DL2nqDOkB69G.kTWHx.zPdR16Dlw2njJHKjuEhqc0MzK',2,1),(6,'soinda@gmail.com','linda','$2y$10$aQhU6kTy7qa.4qPVUljbAeXKPx5HtUYs9eenS7kAFWmFUkhC0eBaC',2,1),(7,'soina@gmail.com','linda','$2y$10$BiSrYbAcQ0PTFIVgRCQruOjL2RiJJLuCh3SnIFsF1q0xBkHl319mm',2,1),(9,'email@email.com','o escondido ','$2y$10$ukYR2LU1O34oawxMitlbiOd6aXru6x85vEDZEBvUFUSrZDltJQXdq',3,1);
/*!40000 ALTER TABLE `utilizador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-07 12:33:48

CREATE DATABASE  IF NOT EXISTS `restaurante` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `restaurante`;
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
-- Table structure for table `restaurante`
--

DROP TABLE IF EXISTS `restaurante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurante` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `designacao` varchar(120) NOT NULL,
  `nif` int NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(200) NOT NULL,
  `horaAbertura` time NOT NULL,
  `horaFecho` time NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `tlm` varchar(20) NOT NULL,
  `webpage` varchar(100) NOT NULL,
  `nomeResponsavel` varchar(90) NOT NULL,
  `tlmResponsavel` varchar(90) NOT NULL,
  `metodoPagamento` varchar(90) NOT NULL,
  `segunda` tinyint(1) DEFAULT NULL,
  `terca` tinyint(1) DEFAULT NULL,
  `quarta` tinyint(1) DEFAULT NULL,
  `quinta` tinyint(1) DEFAULT NULL,
  `sexta` tinyint(1) DEFAULT NULL,
  `sabado` tinyint(1) DEFAULT NULL,
  `domingo` tinyint(1) DEFAULT NULL,
  `estado_id` int unsigned NOT NULL,
  `morada_id` int unsigned NOT NULL,
  `utilizador_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_restaurante_utilizador` (`utilizador_id`),
  KEY `fk_restaurante_morada` (`morada_id`),
  KEY `fk_restaurante_estado` (`estado_id`),
  CONSTRAINT `fk_restaurante_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`),
  CONSTRAINT `fk_restaurante_morada` FOREIGN KEY (`morada_id`) REFERENCES `morada` (`id`),
  CONSTRAINT `fk_restaurante_utilizador` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizador` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurante`
--

LOCK TABLES `restaurante` WRITE;
/*!40000 ALTER TABLE `restaurante` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurante` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-23  9:51:17

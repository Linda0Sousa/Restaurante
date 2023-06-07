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
  `utilizador_id` int unsigned NOT NULL,
  `nome` varchar(90) NOT NULL,
  `nif` int NOT NULL,
  `designacao` varchar(90) NOT NULL,
  `horaAbertura` varchar(90) NOT NULL,
  `horaFecho` varchar(90) NOT NULL,
  `tlm` int NOT NULL,
  `tlf` int NOT NULL,
  `webpage` varchar(120) NOT NULL,
  `nomeResponsavel` varchar(120) NOT NULL,
  `tlmResponsavel` varchar(120) NOT NULL,
  `morada_id` int unsigned NOT NULL,
  `email` varchar(120) NOT NULL,
  `situacao_id` int unsigned NOT NULL,
  `password` varchar(300) NOT NULL,
  `segunda` tinyint(1) DEFAULT NULL,
  `terca` tinyint(1) DEFAULT NULL,
  `quarta` tinyint(1) DEFAULT NULL,
  `quinta` tinyint(1) DEFAULT NULL,
  `sexta` tinyint(1) DEFAULT NULL,
  `sabado` tinyint(1) DEFAULT NULL,
  `domingo` tinyint(1) DEFAULT NULL,
  `MBway` tinyint(1) DEFAULT NULL,
  `visa` tinyint(1) DEFAULT NULL,
  `multibanco` tinyint(1) DEFAULT NULL,
  `numerario` tinyint(1) DEFAULT NULL,
  `cheque` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_restaurante_morada` (`morada_id`),
  KEY `fk_restaurante_situacao` (`situacao_id`),
  KEY `fk_restaurante_utilizador` (`utilizador_id`),
  CONSTRAINT `fk_restaurante_morada` FOREIGN KEY (`morada_id`) REFERENCES `morada` (`id`),
  CONSTRAINT `fk_restaurante_situacao` FOREIGN KEY (`situacao_id`) REFERENCES `situacao` (`id`),
  CONSTRAINT `fk_restaurante_utilizador` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizador` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurante`
--

LOCK TABLES `restaurante` WRITE;
/*!40000 ALTER TABLE `restaurante` DISABLE KEYS */;
INSERT INTO `restaurante` VALUES (1,2,'O Salgadinho',123456789,'designacao 1','2023-05-29 12:00:00','2023-05-29 18:00:00',916854163,12345668,'aMinhapagina.com','responsavel','9123415678',3,'restaurante@gmail.com',1,'$2y$10$xZteMkzitqvG1rM3WkFvouhDO.2NzSVl9oKTjOW5.6cv7hMjM35Mu',1,0,1,1,0,0,0,1,0,0,0,0),(3,9,'o escondido ',123456789,'o escondido','2023-06-05 12:34:00','3747-06-05 14:41:29',913459098,12345668,'aMinhapagina.com','responsavel','9123415678',7,'email@email.com',1,'$2y$10$TEGfIUD0rItd/X1lyHSom.O80jNjeFYi5HU9s2NHT8qr/JwNbT3CG',0,0,0,1,1,0,0,0,0,0,1,0);
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

-- Dump completed on 2023-06-07 12:33:50

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `utilizador_id` int unsigned NOT NULL,
  `morada_id` int unsigned NOT NULL,
  `tlm` varchar(90) NOT NULL,
  `nif` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_utilizador_morada` (`morada_id`),
  KEY `fk_cliente_utilizador` (`utilizador_id`),
  CONSTRAINT `fk_cliente_utilizador` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizador` (`id`),
  CONSTRAINT `fk_utilizador_morada` FOREIGN KEY (`morada_id`) REFERENCES `morada` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,1,2,'916854163',123456789);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'disponivel'),(2,'indisponível'),(3,'pendente'),(4,'confirmado'),(5,'enviado');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `morada`
--

DROP TABLE IF EXISTS `morada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `morada` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rua` varchar(90) NOT NULL,
  `numPorta` int NOT NULL,
  `codigoPostal` varchar(90) NOT NULL,
  `localidade` varchar(90) NOT NULL,
  `pais` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `morada`
--

LOCK TABLES `morada` WRITE;
/*!40000 ALTER TABLE `morada` DISABLE KEYS */;
INSERT INTO `morada` VALUES (1,'Rua De Cima',81,'9708-089','Lagoa','Portugal'),(2,'Rua De Cima',81,'9708-089','Lagoa','Portugal'),(3,'Rua De Cima',81,'9708-089','Lagoa','Portugal'),(4,'Olhos de agua',81,'9708-089','Ponta Delgada','Portugal'),(5,'Rua De Cima',81,'1209-124','Ponta Delgada','Portugal'),(6,'Rua De Cima',81,'1209-124','Ponta Delgada','Portugal'),(7,'aaaaaas',89,'9708-089','Lagoa','Portugal');
/*!40000 ALTER TABLE `morada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfil` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'administrador'),(2,'cliente'),(3,'restaurante');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `situacao`
--

DROP TABLE IF EXISTS `situacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `situacao` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `situacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `situacao`
--

LOCK TABLES `situacao` WRITE;
/*!40000 ALTER TABLE `situacao` DISABLE KEYS */;
INSERT INTO `situacao` VALUES (1,'activo'),(2,'bloqueado'),(3,'pendente');
/*!40000 ALTER TABLE `situacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'entradas'),(2,'sobremesas'),(3,'sopas'),(4,'peixe'),(5,'carne'),(6,'vegetariano'),(7,'bebidas');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Dumping events for database 'restaurante'
--

--
-- Dumping routines for database 'restaurante'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-07 12:41:28

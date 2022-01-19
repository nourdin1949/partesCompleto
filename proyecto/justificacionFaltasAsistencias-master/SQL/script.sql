CREATE DATABASE  IF NOT EXISTS `JustificacionFaltas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `JustificacionFaltas`;
-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: JustificacionFaltas
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.2

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
-- Table structure for table `Departamentos`
--

DROP TABLE IF EXISTS `Departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Departamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Departamentos`
--

LOCK TABLES `Departamentos` WRITE;
/*!40000 ALTER TABLE `Departamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Docente`
--

DROP TABLE IF EXISTS `Docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Docente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idDepartamento` int DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `nrp` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Docente_1_idx` (`idDepartamento`),
  CONSTRAINT `fk_Docente_1` FOREIGN KEY (`idDepartamento`) REFERENCES `Departamentos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Docente`
--

LOCK TABLES `Docente` WRITE;
/*!40000 ALTER TABLE `Docente` DISABLE KEYS */;
/*!40000 ALTER TABLE `Docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Documentos`
--

DROP TABLE IF EXISTS `Documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Documentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ruta` varchar(45) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Documentos`
--

LOCK TABLES `Documentos` WRITE;
/*!40000 ALTER TABLE `Documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Justificacion`
--

DROP TABLE IF EXISTS `Justificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Justificacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `fecha_firma` date DEFAULT NULL,
  `horas_lectivas` int DEFAULT NULL,
  `horas_colectivas` int DEFAULT NULL,
  `docente` int DEFAULT NULL,
  `documentos` int DEFAULT NULL,
  `motivo` int DEFAULT NULL,
  `otros_motivos` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Justificacion_1_idx` (`docente`),
  KEY `fk_Justificacion_2_idx` (`documentos`),
  KEY `fk_Justificacion_3_idx` (`motivo`),
  KEY `fk_Justificacion_4_idx` (`otros_motivos`),
  CONSTRAINT `fk_Justificacion_1` FOREIGN KEY (`docente`) REFERENCES `Docente` (`id`),
  CONSTRAINT `fk_Justificacion_2` FOREIGN KEY (`documentos`) REFERENCES `Documentos` (`id`),
  CONSTRAINT `fk_Justificacion_3` FOREIGN KEY (`motivo`) REFERENCES `Motivos` (`id`),
  CONSTRAINT `fk_Justificacion_4` FOREIGN KEY (`otros_motivos`) REFERENCES `Otros_Motivos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Justificacion`
--

LOCK TABLES `Justificacion` WRITE;
/*!40000 ALTER TABLE `Justificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `Justificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Motivos`
--

DROP TABLE IF EXISTS `Motivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Motivos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Motivos`
--

LOCK TABLES `Motivos` WRITE;
/*!40000 ALTER TABLE `Motivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Motivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Otros_Motivos`
--

DROP TABLE IF EXISTS `Otros_Motivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Otros_Motivos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Otros_Motivos`
--

LOCK TABLES `Otros_Motivos` WRITE;
/*!40000 ALTER TABLE `Otros_Motivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Otros_Motivos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
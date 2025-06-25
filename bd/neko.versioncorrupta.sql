CREATE DATABASE  IF NOT EXISTS `adso_nekonek` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `adso_nekonek`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: adso_nekonek
-- ------------------------------------------------------
-- Server version	9.3.0

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
-- Table structure for table `anime`
--

DROP TABLE IF EXISTS `anime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anime` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `c_id` int NOT NULL,
  `a_temporada` int DEFAULT NULL,
  `a_capitulo` int DEFAULT NULL,
  `a_video` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`a_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anime`
--

LOCK TABLES `anime` WRITE;
/*!40000 ALTER TABLE `anime` DISABLE KEYS */;
/*!40000 ALTER TABLE `anime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblioteca`
--

DROP TABLE IF EXISTS `biblioteca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `biblioteca` (
  `b_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `c_id` int NOT NULL,
  `b_estado` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `b_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`b_id`),
  UNIQUE KEY `u_id` (`u_id`,`c_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `usuarios` (`u_id`),
  CONSTRAINT `biblioteca_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblioteca`
--

LOCK TABLES `biblioteca` WRITE;
/*!40000 ALTER TABLE `biblioteca` DISABLE KEYS */;
/*!40000 ALTER TABLE `biblioteca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenido`
--

DROP TABLE IF EXISTS `contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenido` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_titulo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `c_descripcion` text COLLATE utf8mb4_general_ci,
  `c_canepisodios` int DEFAULT NULL,
  `c_tipo` int NOT NULL,
  `c_pais` int NOT NULL,
  `c_estado` int NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `c_tipo` (`c_tipo`),
  KEY `c_pais` (`c_pais`),
  KEY `c_estado` (`c_estado`),
  CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`c_tipo`) REFERENCES `t_contenido` (`t_id`),
  CONSTRAINT `contenido_ibfk_2` FOREIGN KEY (`c_pais`) REFERENCES `paises` (`p_id`),
  CONSTRAINT `contenido_ibfk_3` FOREIGN KEY (`c_estado`) REFERENCES `estado` (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenido`
--

LOCK TABLES `contenido` WRITE;
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenido_generos`
--

DROP TABLE IF EXISTS `contenido_generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenido_generos` (
  `c_id` int NOT NULL,
  `g_id` int NOT NULL,
  PRIMARY KEY (`c_id`,`g_id`),
  KEY `g_id` (`g_id`),
  CONSTRAINT `contenido_generos_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`),
  CONSTRAINT `contenido_generos_ibfk_2` FOREIGN KEY (`g_id`) REFERENCES `generos` (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenido_generos`
--

LOCK TABLES `contenido_generos` WRITE;
/*!40000 ALTER TABLE `contenido_generos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido_generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `e_id` int NOT NULL AUTO_INCREMENT,
  `e_nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `e_estado` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'emision',NULL),(2,'finalizado',NULL),(3,'cancelado',NULL),(4,'pausado',NULL);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generos` (
  `g_id` int NOT NULL AUTO_INCREMENT,
  `g_nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `g_genero` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'accion',NULL),(2,'aventura',NULL),(3,'comedia',NULL),(4,'ciencia_ficcion',NULL),(5,'drama',NULL),(6,'fantasia',NULL),(7,'romance',NULL),(8,'terror',NULL);
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manga`
--

DROP TABLE IF EXISTS `manga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manga` (
  `m_id` int NOT NULL AUTO_INCREMENT,
  `c_id` int NOT NULL,
  `m_contenido` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `m_numeropag` int DEFAULT NULL,
  `m_capitulo` int DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manga`
--

LOCK TABLES `manga` WRITE;
/*!40000 ALTER TABLE `manga` DISABLE KEYS */;
/*!40000 ALTER TABLE `manga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `novela`
--

DROP TABLE IF EXISTS `novela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `novela` (
  `n_id` int NOT NULL AUTO_INCREMENT,
  `c_id` int NOT NULL,
  `n_contenido` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `n_volumen` int DEFAULT NULL,
  PRIMARY KEY (`n_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `novela_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `novela`
--

LOCK TABLES `novela` WRITE;
/*!40000 ALTER TABLE `novela` DISABLE KEYS */;
/*!40000 ALTER TABLE `novela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paises` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `p_nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (1,'corea'),(2,'china'),(3,'japon');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reportes`
--

DROP TABLE IF EXISTS `reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportes` (
  `r_id` int NOT NULL AUTO_INCREMENT,
  `motivo_r` int NOT NULL,
  `r_descripcion` text COLLATE utf8mb4_general_ci,
  `u_id` int NOT NULL,
  `c_id` int NOT NULL,
  `r_fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`r_id`),
  KEY `motivo_r` (`motivo_r`),
  KEY `u_id` (`u_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`motivo_r`) REFERENCES `t_reporte` (`t_r_id`),
  CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `usuarios` (`u_id`),
  CONSTRAINT `reportes_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reportes`
--

LOCK TABLES `reportes` WRITE;
/*!40000 ALTER TABLE `reportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `r_id` int NOT NULL AUTO_INCREMENT,
  `r_nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'editor'),(2,'lector'),(3,'administrador');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_contenido`
--

DROP TABLE IF EXISTS `t_contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_contenido` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `t_nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_contenido`
--

LOCK TABLES `t_contenido` WRITE;
/*!40000 ALTER TABLE `t_contenido` DISABLE KEYS */;
INSERT INTO `t_contenido` VALUES (1,'anime'),(2,'novelas'),(3,'manga');
/*!40000 ALTER TABLE `t_contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_reporte`
--

DROP TABLE IF EXISTS `t_reporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_reporte` (
  `t_r_id` int NOT NULL AUTO_INCREMENT,
  `t_reporte` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`t_r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_reporte`
--

LOCK TABLES `t_reporte` WRITE;
/*!40000 ALTER TABLE `t_reporte` DISABLE KEYS */;
INSERT INTO `t_reporte` VALUES (1,'contenido_inapropiado'),(2,'copyright'),(3,'otros');
/*!40000 ALTER TABLE `t_reporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `rol_u` int NOT NULL,
  `u_nombre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `u_apodo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `u_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `u_telefono` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `u_fondo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `u_perfil` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `u_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `u_sobreti` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`u_id`),
  KEY `rol_u` (`rol_u`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_u`) REFERENCES `roles` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-25 16:55:26

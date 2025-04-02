-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: nekonek
-- ------------------------------------------------------
-- Server version	8.0.41

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
-- Table structure for table `biblioteca_series`
--

CREATE TABLE `biblioteca_series` (
  `biblioteca_id` int NOT NULL,
  `serie_id` int NOT NULL,
  `fecha_agregado` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`biblioteca_id`,`serie_id`),
  KEY `serie_id` (`serie_id`),
  CONSTRAINT `biblioteca_series_ibfk_1` FOREIGN KEY (`biblioteca_id`) REFERENCES `bibliotecas_usuarios` (`biblioteca_id`) ON DELETE CASCADE,
  CONSTRAINT `biblioteca_series_ibfk_2` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblioteca_series`
--

LOCK TABLES `biblioteca_series` WRITE;
/*!40000 ALTER TABLE `biblioteca_series` DISABLE KEYS */;
/*!40000 ALTER TABLE `biblioteca_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bibliotecas_usuarios`

CREATE TABLE `bibliotecas_usuarios` (
  `biblioteca_id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `es_publica` tinyint(1) DEFAULT '0',
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`biblioteca_id`),
  UNIQUE KEY `unq_usuario_nombre` (`usuario_id`,`nombre`),
  CONSTRAINT `bibliotecas_usuarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bibliotecas_usuarios`
--

LOCK TABLES `bibliotecas_usuarios` WRITE;
/*!40000 ALTER TABLE `bibliotecas_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `bibliotecas_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `episodios`
--

DROP TABLE IF EXISTS `episodios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `episodios` (
  `episodio_id` int NOT NULL AUTO_INCREMENT,
  `serie_id` int NOT NULL,
  `numero` int NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo_archivo` enum('video','imagen','pdf') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ruta_archivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preview_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paginas` int DEFAULT '1',
  `duracion` int DEFAULT NULL COMMENT 'En segundos (solo video)',
  `fecha_subida` datetime DEFAULT CURRENT_TIMESTAMP,
  `orden` smallint NOT NULL,
  PRIMARY KEY (`episodio_id`),
  UNIQUE KEY `unq_serie_orden` (`serie_id`,`orden`),
  KEY `idx_orden` (`orden`),
  CONSTRAINT `episodios_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `episodios`
--

LOCK TABLES `episodios` WRITE;
/*!40000 ALTER TABLE `episodios` DISABLE KEYS */;
/*!40000 ALTER TABLE `episodios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupos` (
  `grupo_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `icono_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_creador` int NOT NULL,
  PRIMARY KEY (`grupo_id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `usuario_creador` (`usuario_creador`),
  FULLTEXT KEY `idx_nombre` (`nombre`),
  CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`usuario_creador`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_acciones`
--

DROP TABLE IF EXISTS `historial_acciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial_acciones` (
  `accion_id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `tipo_accion` enum('ban','advertencia','eliminacion','aprobacion') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `objetivo_id` int NOT NULL,
  `objetivo_tipo` enum('usuario','serie','capitulo') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detalle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `fecha_accion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`accion_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `idx_accion_tipo` (`tipo_accion`),
  KEY `idx_objetivo` (`objetivo_tipo`,`objetivo_id`),
  CONSTRAINT `historial_acciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_acciones`
--

LOCK TABLES `historial_acciones` WRITE;
/*!40000 ALTER TABLE `historial_acciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial_acciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reportes`
--

DROP TABLE IF EXISTS `reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportes` (
  `reporte_id` int NOT NULL AUTO_INCREMENT,
  `serie_id` int DEFAULT NULL,
  `episodio_id` int DEFAULT NULL,
  `usuario_reportante` int NOT NULL,
  `usuario_reportado` int DEFAULT NULL,
  `motivo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` enum('pendiente','resuelto','falso_positivo') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pendiente',
  `fecha_reporte` datetime DEFAULT CURRENT_TIMESTAMP,
  `accion_tomada` enum('advertencia','eliminacion','ninguna') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'ninguna',
  `moderador_id` int DEFAULT NULL,
  PRIMARY KEY (`reporte_id`),
  KEY `serie_id` (`serie_id`),
  KEY `episodio_id` (`episodio_id`),
  KEY `usuario_reportante` (`usuario_reportante`),
  KEY `usuario_reportado` (`usuario_reportado`),
  KEY `moderador_id` (`moderador_id`),
  KEY `idx_estado` (`estado`),
  CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE SET NULL,
  CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`episodio_id`) REFERENCES `episodios` (`episodio_id`) ON DELETE SET NULL,
  CONSTRAINT `reportes_ibfk_3` FOREIGN KEY (`usuario_reportante`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE,
  CONSTRAINT `reportes_ibfk_4` FOREIGN KEY (`usuario_reportado`) REFERENCES `usuarios` (`usuario_id`) ON DELETE SET NULL,
  CONSTRAINT `reportes_ibfk_5` FOREIGN KEY (`moderador_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE SET NULL
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
-- Table structure for table `seguidores`
--

DROP TABLE IF EXISTS `seguidores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seguidores` (
  `usuario_id` int NOT NULL,
  `serie_id` int NOT NULL,
  `fecha_seguimiento` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuario_id`,`serie_id`),
  KEY `serie_id` (`serie_id`),
  CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE,
  CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguidores`
--

LOCK TABLES `seguidores` WRITE;
/*!40000 ALTER TABLE `seguidores` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguidores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `series` (
  `serie_id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `portada_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario_id` int NOT NULL,
  `tipo_contenido` enum('animacion','dibujo','novela') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` enum('pendiente','aprobado','rechazado') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pendiente',
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`serie_id`),
  KEY `usuario_id` (`usuario_id`),
  FULLTEXT KEY `idx_busqueda` (`titulo`,`descripcion`),
  CONSTRAINT `series_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series`
--

LOCK TABLES `series` WRITE;
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
/*!40000 ALTER TABLE `series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series_grupos`
--

DROP TABLE IF EXISTS `series_grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `series_grupos` (
  `serie_id` int NOT NULL,
  `grupo_id` int NOT NULL,
  `fecha_asociacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`serie_id`,`grupo_id`),
  KEY `grupo_id` (`grupo_id`),
  CONSTRAINT `series_grupos_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE,
  CONSTRAINT `series_grupos_ibfk_2` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`grupo_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series_grupos`
--

LOCK TABLES `series_grupos` WRITE;
/*!40000 ALTER TABLE `series_grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `series_grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series_guardadas`
--

DROP TABLE IF EXISTS `series_guardadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `series_guardadas` (
  `usuario_id` int NOT NULL,
  `serie_id` int NOT NULL,
  `fecha_guardado` datetime DEFAULT CURRENT_TIMESTAMP,
  `etiqueta` enum('favoritos','pendiente','vistos') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'favoritos',
  PRIMARY KEY (`usuario_id`,`serie_id`),
  KEY `serie_id` (`serie_id`),
  KEY `idx_etiqueta` (`etiqueta`),
  CONSTRAINT `series_guardadas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE,
  CONSTRAINT `series_guardadas_ibfk_2` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series_guardadas`
--

LOCK TABLES `series_guardadas` WRITE;
/*!40000 ALTER TABLE `series_guardadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `series_guardadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `usuario_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '/default_avatar.png',
  `rol` enum('usuario','moderador','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'usuario',
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `idx_rol` (`rol`),
  KEY `idx_username` (`username`)
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

-- Dump completed on 2025-03-31  9:51:36

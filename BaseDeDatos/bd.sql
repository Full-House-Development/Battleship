-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apoyo`
--

DROP TABLE IF EXISTS `apoyo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apoyo` (
  `id_apoyo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(15) DEFAULT NULL,
  `texto_apoyo` varchar(1000) DEFAULT NULL,
  `respuesta_apoyo` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_apoyo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apoyo`
--

LOCK TABLES `apoyo` WRITE;
/*!40000 ALTER TABLE `apoyo` DISABLE KEYS */;
/*!40000 ALTER TABLE `apoyo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(15) DEFAULT NULL,
  `id_publicacion` int(11) DEFAULT NULL,
  `tiempo_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto_comentario` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juego_terminado`
--

DROP TABLE IF EXISTS `juego_terminado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juego_terminado` (
  `id_juego` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_ganador` varchar(15) DEFAULT NULL,
  `id_usuario_perdedor` varchar(15) DEFAULT NULL,
  `puntos_ganador` int(11) DEFAULT NULL,
  `puntos_perdedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_juego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juego_terminado`
--

LOCK TABLES `juego_terminado` WRITE;
/*!40000 ALTER TABLE `juego_terminado` DISABLE KEYS */;
/*!40000 ALTER TABLE `juego_terminado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partida_en_curso`
--

DROP TABLE IF EXISTS `partida_en_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partida_en_curso` (
  `id_juego` int(11) NOT NULL AUTO_INCREMENT,
  `coordenadas_uno` varchar(25) DEFAULT NULL,
  `coordenadas_dos` varchar(25) DEFAULT NULL,
  `id_usuario_retador` int(11) DEFAULT NULL,
  `id_usuario_retado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_juego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partida_en_curso`
--

LOCK TABLES `partida_en_curso` WRITE;
/*!40000 ALTER TABLE `partida_en_curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `partida_en_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicaciones` (
  `id_publicaciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(15) DEFAULT NULL,
  `texto_publicacion` varchar(1000) DEFAULT NULL,
  `tiempo_publicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reaccion` varchar(16) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_publicaciones`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones`
--

LOCK TABLES `publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
INSERT INTO `publicaciones` VALUES (1,'davidalencia','esto es una publicacion? de ejémplo, con una coma+ enmedió y un punto . en otro punto','2017-05-23 10:53:27','3,0','davidalencia');
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reportar`
--

DROP TABLE IF EXISTS `reportar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reportar` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(1) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `respuesta` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_reporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reportar`
--

LOCK TABLES `reportar` WRITE;
/*!40000 ALTER TABLE `reportar` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` varchar(15) NOT NULL,
  `foto` varchar(10) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `nacimiento_usuario` date DEFAULT NULL,
  `correo_usuario` varchar(100) DEFAULT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `apellido_usuario` varchar(100) DEFAULT NULL,
  `oregano` varchar(34) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('davidalencia','73.jpg','esto no es un hash','1999-05-20','davidalencia@gmail.com','david','valencia', "oregano");
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-23 11:09:01

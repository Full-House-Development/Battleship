-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: 132.248.96.53    Database: 132.248.96.53
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (1,'robérto64',1,'2017-05-24 03:56:58','Que triste fue decirnos adios'),(2,'aaron64',2,'2017-05-24 03:56:58','Cuando nos adorabamos más!'),(3,'david64',3,'2017-05-24 03:56:58','Hasta la golondrina emigró'),(4,'fernanda64',4,'2017-05-24 03:56:58','Presagiando el dolor'),(5,'kevin64@}]+?¿¡!',5,'2017-05-24 03:56:58','He podido ayudarme a vivir'),(6,'angy64',6,'2017-05-24 03:56:59','Heeee podido ayudarme a viviiiirrr'),(7,'marco6464',1,'2017-05-25 03:37:21','buena publicacion'),(8,'marco6464',1,'2017-05-25 03:39:34','buena esa calamardo'),(9,'aaron64',1,'2017-05-25 03:41:57','pienso lo mismo'),(10,'angy64',1,'2017-05-25 03:48:55','no lo creo chicos'),(11,'angy64',6,'2017-05-25 03:52:02','A poco dije eso??? No me hagan caso chicos'),(12,'angy64',2,'2017-05-25 05:56:41','Esta cancion me pone muy triste'),(13,'BolárdenasMelón',1,'2017-05-26 04:10:05','y vaya que emigró esa grandísima golondrina <3 ?'),(14,'BolárdenasMelón',11,'2017-05-26 05:33:09','pues no me parece correcto'),(15,'BolárdenasMelón',22,'2017-05-26 06:09:43','Eso esta muy bien'),(16,'BolárdenasMelón',22,'2017-05-26 06:12:17','No eso no esta bien'),(17,'BolárdenasMelón',22,'2017-05-26 06:14:36','Pues me pareció bien'),(18,'BolárdenasMelón',22,'2017-05-26 06:24:00','Ya digan la verdad'),(19,'BolárdenasMelón',22,'2017-05-26 06:25:21','sefsfsfsf'),(20,'BolárdenasMelón',22,'2017-05-26 06:29:29','sfgdsgshhhh'),(21,'BolárdenasMelón',22,'2017-05-26 06:32:22','ttttttt'),(22,'BolárdenasMelón',22,'2017-05-26 06:38:14','sssssssss'),(23,'BolárdenasMelón',22,'2017-05-26 06:41:19','eeeeeee'),(24,'BolárdenasMelón',22,'2017-05-26 06:43:27','rrrrrrrr'),(25,'BolárdenasMelón',22,'2017-05-26 06:45:38','aaaaaaaaaaa'),(26,'BolárdenasMelón',22,'2017-05-26 06:45:59','esto ya salio bien'),(27,'BolárdenasMelón',22,'2017-05-26 06:46:59','perfecto'),(28,'BolárdenasMelón',22,'2017-05-26 06:47:05','perfecto'),(29,'BolárdenasMelón',22,'2017-05-26 06:47:17','fthhyy'),(30,'BolárdenasMelón',22,'2017-05-26 06:47:32','fthhyy'),(31,'BolárdenasMelón',22,'2017-05-26 06:48:30','wfwttwtw'),(32,'BolárdenasMelón',22,'2017-05-26 06:48:43','e4tee'),(33,'BolárdenasMelón',22,'2017-05-26 06:50:12','maravilloso'),(34,'BolárdenasMelón',22,'2017-05-26 06:51:08','dgdgg'),(35,'BolárdenasMelón',22,'2017-05-26 06:53:03','gweniak'),(36,'BolárdenasMelón',22,'2017-05-26 06:53:09','erggsgeg'),(37,'BolárdenasMelón',23,'2017-05-26 06:53:24','uppsss'),(38,'BolárdenasMelón',25,'2017-05-26 06:54:50','esto ya quedó'),(39,'BolárdenasMelón',25,'2017-05-26 07:35:59','ya casi'),(40,'BolárdenasMelón',25,'2017-05-26 07:48:32','knkjkjlkjl'),(41,'BolárdenasMelón',25,'2017-05-26 07:54:29','es hermsos'),(42,'BolárdenasMelón',1,'2017-05-26 08:02:57','yo si'),(43,'BolárdenasMelón',25,'2017-05-26 18:10:17','Esta muy chido');
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
  `id_partida` int(11) NOT NULL AUTO_INCREMENT,
  `coordenadas_uno` varchar(215) DEFAULT NULL,
  `coordenadas_dos` varchar(215) DEFAULT NULL,
  `id_usuario_uno` varchar(20) DEFAULT NULL,
  `id_usuario_dos` varchar(20) DEFAULT NULL,
  `tiro` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_partida`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partida_en_curso`
--

LOCK TABLES `partida_en_curso` WRITE;
/*!40000 ALTER TABLE `partida_en_curso` DISABLE KEYS */;
INSERT INTO `partida_en_curso` VALUES (1,'undefined1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,2,1:1,1,1,1,2,1,1,1,2,1:1,1,1,1,2,1,1,1,2,1:1,2,2,1,2,1,2,1,2,1:1,2,2,1,1,1,2,1,1,1:1,1,2,1,1,1,2,1,1,1:1,1,2,1,1,1,1,1,1,1:1,1,2,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:','undefined1,1,1,1,2,1,1,1,1,1:1,2,1,2,2,1,1,1,1,1:2,2,2,2,2,1,1,1,1,1:2,2,2,2,2,1,1,1,1,1:1,1,2,2,2,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:','karlitamiau','david123','1#s21'),(2,'undefined1,1,1,1,1,1,1,1,1,1:1,1,1,2,1,1,1,1,1,1:1,1,1,2,1,1,2,1,1,1:1,1,1,2,1,1,2,1,2,1:1,2,1,1,2,1,2,1,2,1:1,2,1,1,2,1,2,1,2,1:1,1,1,1,2,1,1,1,2,1:1,1,1,1,1,1,1,1,2,1:1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:','undefined1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,2,1,1:1,1,2,1,2,1,2,2,1,1:1,2,2,1,2,1,2,2,1,1:1,2,2,1,2,1,2,2,1,1:1,1,2,1,1,1,1,2,1,1:1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:1,1,1,1,1,1,1,1,1,1:','karlitamiau','david123','1#s12');
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones`
--

LOCK TABLES `publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
INSERT INTO `publicaciones` VALUES (1,'davidalencia','esto es una publicacion? de ejémplo, con una coma+ enmedió y un punto . en otro punto','2017-05-23 10:53:27','3,0','davidalencia'),(2,'aaron64','Cuando nos adorabamos más!','2017-05-24 02:44:05',NULL,NULL),(3,'david64','Hasta la golondrina emigró','2017-05-24 02:44:05',NULL,NULL),(4,'fernanda64','Presagiando el dolor','2017-05-24 02:44:05',NULL,NULL),(5,'kevin64@}]+?¿¡!','He podido ayudarme a vivir','2017-05-24 02:44:05',NULL,NULL),(6,'angy64','Heeee podido ayudarme a viviiiirrr','2017-05-24 02:44:30',NULL,NULL),(7,'robérto64','Que triste fue decirnos adios','2017-05-24 02:44:31',NULL,NULL),(8,'aaron64','Cuando nos adorabamos más!','2017-05-24 02:44:33',NULL,NULL),(9,'BolárdenasMelón','Eso estuvo genial','2017-05-26 05:28:20',NULL,NULL),(10,'BolárdenasMelón','Eso ya no esta genial','2017-05-26 05:30:14',NULL,NULL),(11,'BolárdenasMelón','gegege','2017-05-26 05:32:37',NULL,NULL),(12,'BolárdenasMelón','gegege','2017-05-26 05:32:37',NULL,NULL),(13,'BolárdenasMelón','no entiendo por que','2017-05-26 05:35:09',NULL,NULL),(14,'BolárdenasMelón','gbthty','2017-05-26 05:36:24',NULL,NULL),(15,'BolárdenasMelón','thrthrhr','2017-05-26 05:36:50',NULL,NULL),(16,'BolárdenasMelón','hnyjtjytjt','2017-05-26 05:38:20',NULL,NULL),(17,'BolárdenasMelón','Soy el mejor en el mar','2017-05-26 05:39:03',NULL,NULL),(18,'BolárdenasMelón','suele suceder','2017-05-26 05:42:33',NULL,NULL),(19,'BolárdenasMelón','rgegege','2017-05-26 05:44:12',NULL,NULL),(20,'BolárdenasMelón','rgegege','2017-05-26 05:44:12',NULL,NULL),(21,'BolárdenasMelón','fghhfh','2017-05-26 05:44:43',NULL,NULL),(22,'BolárdenasMelón','dtgeerge','2017-05-26 05:44:54',NULL,NULL),(23,'BolárdenasMelón','fgbfhbfhb','2017-05-26 05:51:10',NULL,NULL),(24,'BolárdenasMelón','rrtrhrh','2017-05-26 05:52:11',NULL,NULL),(25,'BolárdenasMelón','rtgrgrrgrg','2017-05-26 05:52:23',NULL,NULL),(26,'BolárdenasMelón','Esto ya me gustó','2017-05-26 08:01:00',NULL,NULL),(27,'BolárdenasMelón','Me llamo bolo','2017-05-26 18:10:34',NULL,NULL);
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
  `reportador` varchar(30) DEFAULT NULL,
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
  `busqueda` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('*aarongn22','epn','86b3868b64e7b0d6aeb24412d64dc55b339c28c949e1602225227be2db0bc9ecfe0e6aaabb4b389ea328d63764178a480a57b88ae652832f357bea99a9c7ec6a','2000-01-22','aaron_gaytan@live.com','Administrador','Gaytán','f1e7778c081903abd8302d1948700038','AdministradorGaytan'),('aaron64',NULL,NULL,NULL,NULL,'Aarón',NULL,NULL,NULL),('aarongn22','putin','9ecab26ecb66eb8cb4ee0708df3400bbaa3dc21c89811832650985efde558fad664eeaa05128ff339313f12d3e70be37c05e503e03f1dcd5c5d639f97a5dfce0','2000-01-22','aaron_shark_gn@outlook.es','AarÃ³n','GaytÃ¡n','05a6ab158d340e3fe97321bc0bacf78f','AaronGaytan'),('angy64',NULL,NULL,NULL,NULL,'Angélica',NULL,NULL,NULL),('BolárdenasMelón','hitler','aff00670e5118015462351919c3ec12e0fd723bd1bd73e754635194e87c395f5144899387ba9d61fa067c410c87a6bb89d25764608a145e2b0493d0350bb8287','2001-06-12','bolita50@hotmail.com','Bolárdenas','Melón','0cdb8620e2b5aeb4aa22ac71ba01d617','BolardenasMelon'),('david64',NULL,NULL,NULL,NULL,'David',NULL,NULL,NULL),('davidalencia','73.jpg','esto no es un hash','1999-05-20','davidalencia@gmail.com','david','valencia','oregano',NULL),('dominospizza','epn','6f284fefc33219321b8cc0cc8e4914b911f1bbee8346a474ab726199c22e309cf885475abc7a6172e7e8b031bc1aa8689260b51d1a37c13c7454e2899131a9a8','2005-07-11','domingo7@hotmail.com','Filgino','Domingo','768f24259f1ed61c89f029a9490ec568','FilginoDomingo'),('fer7sg','trudeau','06fb00a2c77085892d09237a06090128bf4f1534ea1b1eb2c925571143fc49716637f7644261c8f2eb981e795bb4ff0ed21401ecb3a159073381869269b2cdbd','2000-07-25','fer_sanchez_25_07@hotmail.com','Fernanda','SÃ¡nchez','8cfeda11e442ae6b37e7be556d4ac914','FernandaSanchez'),('fernanda64',NULL,NULL,NULL,NULL,'Fernanda',NULL,NULL,NULL),('kevin64@}]+?¿¡!',NULL,NULL,NULL,NULL,'Kevin',NULL,NULL,NULL),('marco6464',NULL,NULL,'2000-08-02','marco64@hotmail.com','Marco Antonio',NULL,NULL,NULL),('robérto64',NULL,NULL,NULL,NULL,'Roberto',NULL,NULL,NULL);
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

-- Dump completed on 2017-05-26 14:02:26

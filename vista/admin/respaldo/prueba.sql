-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: prueba
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `deportes`
--

DROP TABLE IF EXISTS `deportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` int(10) NOT NULL,
  `deporte` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `document` (`document`),
  CONSTRAINT `deportes_ibfk_1` FOREIGN KEY (`document`) REFERENCES `user` (`document`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deportes`
--

LOCK TABLES `deportes` WRITE;
/*!40000 ALTER TABLE `deportes` DISABLE KEYS */;
INSERT INTO `deportes` VALUES (1,2,''),(2,3,'Tenis'),(3,4,'Futbol'),(4,4,'Ciclismo');
/*!40000 ALTER TABLE `deportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` text NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Activo'),(2,'Inactivo');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `id_tip_gen` int(11) NOT NULL AUTO_INCREMENT,
  `genero` text NOT NULL,
  PRIMARY KEY (`id_tip_gen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Masculino'),(2,'Femenino');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `document` (`document`),
  CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`document`) REFERENCES `user` (`document`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (11,1,'0000-00-00','00:00:00'),(12,1,'2023-03-27','07:59:07'),(13,1,'2023-03-27','01:01:14'),(16,1,'2023-03-27','01:42:31'),(17,1,'2023-03-27','01:46:32'),(18,1,'2023-03-27','01:49:13'),(19,1,'2023-03-27','02:32:19'),(20,1,'2023-03-27','02:41:30'),(21,1,'2023-03-27','02:49:26'),(22,1,'2023-03-27','04:24:42'),(23,1,'2023-03-28','06:25:14'),(24,1,'2023-03-28','10:40:56'),(25,1,'2023-03-28','11:04:12');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_user`
--

DROP TABLE IF EXISTS `tip_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tip_user` (
  `id_tip_user` int(11) NOT NULL AUTO_INCREMENT,
  `tip_user` text NOT NULL,
  PRIMARY KEY (`id_tip_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_user`
--

LOCK TABLES `tip_user` WRITE;
/*!40000 ALTER TABLE `tip_user` DISABLE KEYS */;
INSERT INTO `tip_user` VALUES (1,'administrador '),(2,'aprendiz '),(8,'instructor'),(10,'Directivo');
/*!40000 ALTER TABLE `tip_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `document` int(10) NOT NULL,
  `name` text NOT NULL,
  `user` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `id_tip_user` int(11) NOT NULL,
  `genero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`document`),
  KEY `id_tip_user` (`id_tip_user`),
  KEY `user_ibfk_2` (`genero`),
  KEY `estado` (`estado`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_tip_user`) REFERENCES `tip_user` (`id_tip_user`) ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_tip_gen`) ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'1','1','1',1,1,1),(2,'2','2','2',1,2,2),(3,'3','3','3',8,1,2),(4,'4','4','4',1,1,2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-28 11:26:51

-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gym-zona
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `datos`
--

DROP TABLE IF EXISTS `datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos` (
  `id_datos` int(11) NOT NULL AUTO_INCREMENT,
  `documentos` int(10) NOT NULL,
  `peso` varchar(5) NOT NULL,
  `bmi` varchar(5) NOT NULL,
  `grasa` varchar(5) NOT NULL,
  `musculo` varchar(5) NOT NULL,
  `agua` int(5) NOT NULL,
  `grasa_v` int(2) NOT NULL,
  `hueso` int(2) NOT NULL,
  `metabo` int(6) NOT NULL,
  `proteina` int(5) NOT NULL,
  `obesidad` int(5) NOT NULL,
  `fecha_regi` date NOT NULL,
  PRIMARY KEY (`id_datos`),
  KEY `documento` (`documentos`),
  CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`documentos`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos`
--

LOCK TABLES `datos` WRITE;
/*!40000 ALTER TABLE `datos` DISABLE KEYS */;
INSERT INTO `datos` VALUES (1,123213,'11','11','111','11',1,11,1,1,1,1,'2023-04-30'),(2,1105,'2','2','2','2',2,2,2,2,2,2,'2023-05-04');
/*!40000 ALTER TABLE `datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_venta`
--

DROP TABLE IF EXISTS `det_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `det_venta` (
  `id_det_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_productos` bigint(17) NOT NULL,
  `cantidad` int(100) NOT NULL,
  PRIMARY KEY (`id_det_venta`),
  KEY `id_venta` (`id_venta`),
  KEY `id_productos` (`id_productos`),
  CONSTRAINT `det_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON UPDATE CASCADE,
  CONSTRAINT `det_venta_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_venta`
--

LOCK TABLES `det_venta` WRITE;
/*!40000 ALTER TABLE `det_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `det_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ejercicio`
--

DROP TABLE IF EXISTS `ejercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ejercicio` (
  `id_ejercicio` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ejercicio` text NOT NULL,
  PRIMARY KEY (`id_ejercicio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejercicio`
--

LOCK TABLES `ejercicio` WRITE;
/*!40000 ALTER TABLE `ejercicio` DISABLE KEYS */;
INSERT INTO `ejercicio` VALUES (1,'ejemplo'),(2,'Pesas');
/*!40000 ALTER TABLE `ejercicio` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Inactivo'),(2,'Activo');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `id_genero` int(2) NOT NULL AUTO_INCREMENT,
  `genero` varchar(30) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'MASCULINO'),(2,'FEMENINO'),(3,'No Binario');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medidas`
--

DROP TABLE IF EXISTS `medidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medidas` (
  `id_medidas` int(11) NOT NULL AUTO_INCREMENT,
  `doc_cliente` int(10) NOT NULL,
  `pecho` varchar(11) NOT NULL,
  `cintura` varchar(11) NOT NULL,
  `cadera` varchar(11) NOT NULL,
  `brazo_izq` varchar(11) NOT NULL,
  `brazo_der` varchar(11) NOT NULL,
  `fecha_regi` int(11) NOT NULL,
  PRIMARY KEY (`id_medidas`),
  KEY `doc_cliente` (`doc_cliente`),
  CONSTRAINT `medidas_ibfk_1` FOREIGN KEY (`doc_cliente`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medidas`
--

LOCK TABLES `medidas` WRITE;
/*!40000 ALTER TABLE `medidas` DISABLE KEYS */;
INSERT INTO `medidas` VALUES (1,123213,'1','1','1','1','1',0),(2,123213,'1','1','1','1','1',0),(3,1105,'2','2','2','2','2',0);
/*!40000 ALTER TABLE `medidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_producto` bigint(17) NOT NULL AUTO_INCREMENT,
  `cod_producto` bigint(17) NOT NULL,
  `nom_producto` text NOT NULL,
  `precio` decimal(6,3) NOT NULL,
  `can_inicial` int(100) NOT NULL,
  `can_final` int(100) DEFAULT NULL,
  `docu_ingre` int(10) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `docu_ingre` (`docu_ingre`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`docu_ingre`) REFERENCES `usuarios` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=8260089569018204 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,123,'vitaminas',50.000,12,11,1),(8233,8233,'gfdsdsf',99.999,52,NULL,3213123),(123478,0,'proteina',55.000,15,12,1),(320577435287199,320577435287199,'holannnnn',99.999,1,NULL,3213123),(758677831094989,758677831094989,'zc',99.999,2,NULL,3213123),(794601546078542,794601546078542,'z',99.999,1,NULL,3213123),(1126819036787816,1126819036787816,'bbb',100.000,12,NULL,3213123),(1421141049655030,1421141049655030,'aaaa',99.999,12,NULL,3213123),(3151376831764321,3151376831764321,'vvv',40.000,12,NULL,3213123),(3856418677791567,3856418677791567,'holaque',99.999,19,NULL,3213123),(4265794522972197,4265794522972197,'hola',99.999,123,NULL,2312312),(5777227432793153,5777227432793153,'q',99.999,16,NULL,2312312),(6446540182557070,6446540182557070,'bbb',10.000,12,NULL,3213123),(7246848905436940,7246848905436940,'aqw',99.999,10,NULL,3213123),(8260089569018203,8260089569018203,'ee',99.999,12,NULL,3213123);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscripcion`
--

DROP TABLE IF EXISTS `suscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suscripcion` (
  `id_suscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ini` date NOT NULL,
  `fecha_venc` date NOT NULL,
  `doc_coach` int(10) NOT NULL,
  `doc_cliente` int(10) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_suscripcion`),
  KEY `doc_cliente` (`doc_cliente`),
  CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`doc_cliente`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscripcion`
--

LOCK TABLES `suscripcion` WRITE;
/*!40000 ALTER TABLE `suscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `suscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_servicio`
--

DROP TABLE IF EXISTS `tip_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tip_servicio` (
  `id_tip_serv` int(11) NOT NULL AUTO_INCREMENT,
  `servicio` text NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_tip_serv`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_servicio`
--

LOCK TABLES `tip_servicio` WRITE;
/*!40000 ALTER TABLE `tip_servicio` DISABLE KEYS */;
INSERT INTO `tip_servicio` VALUES (1,'Yoga',20000),(2,'jummping',40000),(3,'prueba',215452000);
/*!40000 ALTER TABLE `tip_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_user`
--

DROP TABLE IF EXISTS `tip_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tip_user` (
  `id_tip_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tip_user` text NOT NULL,
  PRIMARY KEY (`id_tip_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_user`
--

LOCK TABLES `tip_user` WRITE;
/*!40000 ALTER TABLE `tip_user` DISABLE KEYS */;
INSERT INTO `tip_user` VALUES (1,'ADMIN'),(2,'COACH'),(3,'Cliente');
/*!40000 ALTER TABLE `tip_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `documento` int(10) NOT NULL,
  `cod_barras` int(11) NOT NULL,
  `nom_completo` text DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `estatura` varchar(4) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `telefono` bigint(10) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `genero` int(2) DEFAULT NULL,
  PRIMARY KEY (`documento`),
  KEY `tipo_usuario` (`tipo_usuario`),
  KEY `estado` (`estado`),
  KEY `genero` (`genero`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`tipo_usuario`) REFERENCES `tip_user` (`id_tip_user`) ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_7` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_8` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_genero`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,0,'1',1,'1','2023-04-02',1,'1','1',1,'1','1',2,1),(1105,1105,'pr',12,NULL,'2023-05-30',3,NULL,NULL,321,'MZ Q CASA 29','anderson603aviles@gm',1,1),(123213,123213,'Laura',25,NULL,'2005-02-16',3,NULL,NULL,1234567890,'manzana Q casa 5','jsramos525@gmail.com',1,2),(123344,0,'JOHAN ROA',18,'170','2023-04-05',1,'ADMIN','$2y$14$u3IrLTusJePitl75Oq8P2uGtwYcAas4Ufdgq46ku.G.32Fhw6NDoa',21321432,'sadhsad','sdjasd',2,1),(2312312,2312312,'Anderson',54,NULL,'2023-01-12',2,'ander','$2y$14$RyEf11tZPHgSC',987654321,'manzana Q casa 5','jsramos525@gmail.com',1,1),(3213123,3213123,'dsaasdsa',0,NULL,'0000-00-00',2,NULL,'1',0,'','',2,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `doc_coach` int(10) NOT NULL,
  `doc_cliente` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `doc_coach` (`doc_coach`),
  KEY `doc_cliente` (`doc_cliente`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`doc_coach`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE,
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`doc_cliente`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_serv`
--

DROP TABLE IF EXISTS `venta_serv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta_serv` (
  `id_vent_servi` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ini` date NOT NULL,
  `doc_coach` int(10) NOT NULL,
  `doc_cliente` int(10) NOT NULL,
  `id_tip_servi` int(11) NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`id_vent_servi`),
  KEY `doc_coach` (`doc_coach`),
  KEY `doc_cliente` (`doc_cliente`),
  KEY `id_tip_servi` (`id_tip_servi`),
  CONSTRAINT `venta_serv_ibfk_1` FOREIGN KEY (`doc_coach`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE,
  CONSTRAINT `venta_serv_ibfk_2` FOREIGN KEY (`doc_cliente`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE,
  CONSTRAINT `venta_serv_ibfk_3` FOREIGN KEY (`id_tip_servi`) REFERENCES `tip_servicio` (`id_tip_serv`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_serv`
--

LOCK TABLES `venta_serv` WRITE;
/*!40000 ALTER TABLE `venta_serv` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta_serv` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-03  6:53:44

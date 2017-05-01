CREATE DATABASE  IF NOT EXISTS `noiseship` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `noiseship`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: localhost    Database: noiseship
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `barcos`
--

DROP TABLE IF EXISTS `barcos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barcos` (
  `ID_barco` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_barco`),
  UNIQUE KEY `ID_barco_UNIQUE` (`ID_barco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barcos`
--

LOCK TABLES `barcos` WRITE;
/*!40000 ALTER TABLE `barcos` DISABLE KEYS */;
INSERT INTO `barcos` VALUES (1,'olha','1'),(2,'farob','2'),(3,'golden','1'),(4,'Titanic','2');
/*!40000 ALTER TABLE `barcos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `camadas`
--

DROP TABLE IF EXISTS `camadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `camadas` (
  `ID_Superficie` int(11) NOT NULL,
  `frequencia` varchar(10) NOT NULL,
  `path` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_Superficie`,`frequencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `camadas`
--

LOCK TABLES `camadas` WRITE;
/*!40000 ALTER TABLE `camadas` DISABLE KEYS */;
INSERT INTO `camadas` VALUES (1,'1','www1'),(2,'1','ww2');
/*!40000 ALTER TABLE `camadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `embarcaoes_subreficie`
--

DROP TABLE IF EXISTS `embarcaoes_subreficie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `embarcaoes_subreficie` (
  `ID_barco` int(11) NOT NULL,
  `IDSubreficie` int(11) NOT NULL,
  `Velocidade` int(11) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `idRota` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_barco`,`IDSubreficie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `embarcaoes_subreficie`
--

LOCK TABLES `embarcaoes_subreficie` WRITE;
/*!40000 ALTER TABLE `embarcaoes_subreficie` DISABLE KEYS */;
INSERT INTO `embarcaoes_subreficie` VALUES (1,1,100,'ff','12'),(1,3,111,'sss','12'),(2,1,111,'df','111'),(4,1,11,'fff','55');
/*!40000 ALTER TABLE `embarcaoes_subreficie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `superficie`
--

DROP TABLE IF EXISTS `superficie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `superficie` (
  `ID_superficie` int(11) NOT NULL,
  `TimeStamp` datetime DEFAULT NULL,
  `Zona` varchar(20) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT 'map',
  PRIMARY KEY (`ID_superficie`),
  KEY `fk_Subreficie_Zona_idx` (`Zona`),
  CONSTRAINT `fk_Subreficie_Zona` FOREIGN KEY (`Zona`) REFERENCES `zona` (`NomeZona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `superficie`
--

LOCK TABLES `superficie` WRITE;
/*!40000 ALTER TABLE `superficie` DISABLE KEYS */;
INSERT INTO `superficie` VALUES (1,'2000-01-01 00:00:00','portugal','www.imagem1','map'),(2,'2000-01-01 00:00:00','espanha','www.imagem2','map'),(3,'2001-01-01 00:00:00','espanha','www3','map'),(4,'2001-01-01 00:00:00','portugal','ww4','map'),(5,'2002-01-01 00:00:00','portugal','ww5','map'),(6,'2002-01-01 00:00:00','espanha','ww6','map'),(7,'2003-01-01 00:00:00','portugal','ww7','map'),(8,'2003-01-01 00:00:00','espanha','ww8','map'),(9,'2017-01-01 00:00:00','PortugalSW','http://www.shippingnoise.com/maps/PortugalSW/1479836400.png','map'),(10,'2017-01-01 00:00:00','PortugalSW','http://www.shippingnoise.com/maps/PortugalSW/Statistics/p05/STAT1460_20161122_1479829939_p05.png','p05'),(11,'2017-01-01 00:00:00','PortugalSW','http://www.shippingnoise.com/maps/PortugalSW/Statistics/p95/STAT1460_20161122_1479829939_p95.png','p95'),(12,'2017-01-01 00:00:00','PortugalSW','http://www.shippingnoise.com/maps/PortugalSW/Statistics/SEL7/STAT1460_20161122_1479829939_SEL7.png','sel7'),(13,'2017-01-01 00:00:00','Spain','http://www.shippingnoise.com/maps/Spain/1479836400.png','map'),(14,'2017-01-01 00:00:00','Spain','http://www.shippingnoise.com/maps/Spain/Statistics/p05/STAT0148_20160718_1468823982_p05.png','p05'),(15,'2017-01-01 00:00:00','Spain','http://www.shippingnoise.com/maps/Spain/Statistics/p95/STAT0148_20160718_1468823982_p95.png','p95'),(16,'2017-01-01 00:00:00','Spain','http://www.shippingnoise.com/maps/Spain/Statistics/SEL7/STAT0148_20160718_1468823982_SEL7.png','sel7');
/*!40000 ALTER TABLE `superficie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_superficie`
--

DROP TABLE IF EXISTS `tipo_superficie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_superficie` (
  `Nome` varchar(20) NOT NULL,
  PRIMARY KEY (`Nome`),
  UNIQUE KEY `Nome_UNIQUE` (`Nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_superficie`
--

LOCK TABLES `tipo_superficie` WRITE;
/*!40000 ALTER TABLE `tipo_superficie` DISABLE KEYS */;
INSERT INTO `tipo_superficie` VALUES ('map'),('p05'),('p95'),('self7');
/*!40000 ALTER TABLE `tipo_superficie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zona`
--

DROP TABLE IF EXISTS `zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zona` (
  `NomeZona` varchar(20) NOT NULL,
  `BoundSW` varchar(50) DEFAULT NULL,
  `BoundNE` varchar(50) DEFAULT NULL,
  `Bounds` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NomeZona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zona`
--

LOCK TABLES `zona` WRITE;
/*!40000 ALTER TABLE `zona` DISABLE KEYS */;
INSERT INTO `zona` VALUES ('espanha','34','34',NULL),('inglaterra','22','21',NULL),('LaManche','(49.0, -1.0)','(52.0,4.0)','[[49.0,-1.0],[52.0,4.0]]'),('PelagosFrance','(41.28333, 6.16667)','(43.76333,10.246667)','[[41.28333,6.16667],[43.76333,10.246667]]'),('portugal','12','12',NULL),('PortugalSW','(36.31, -11.0)','(39.35,-7.48)','[[36.31,-11.0],[39.35,-7.48]]'),('Spain','(39.0, 0)','(42.0, 4.0)','[[39.0,0],[42.0,4.0]]');
/*!40000 ALTER TABLE `zona` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-01 22:50:17

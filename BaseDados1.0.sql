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
INSERT INTO `barcos` VALUES (1,'olha','1'),(2,'farob','2');
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
  PRIMARY KEY (`ID_barco`,`IDSubreficie`),
  UNIQUE KEY `ID_barco_UNIQUE` (`ID_barco`),
  UNIQUE KEY `IDSubreficie_UNIQUE` (`IDSubreficie`),
  CONSTRAINT `fk_Embar├ºacoes_subreficie_Subreficie1` FOREIGN KEY (`IDSubreficie`) REFERENCES `superficie` (`ID_superficie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `embarcaoes_subreficie`
--

LOCK TABLES `embarcaoes_subreficie` WRITE;
/*!40000 ALTER TABLE `embarcaoes_subreficie` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `superficie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zona`
--

DROP TABLE IF EXISTS `zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zona` (
  `NomeZona` varchar(20) NOT NULL,
  `Coordenadas_Canto_superior` int(11) DEFAULT NULL,
  `Coordenadas_Canto_inferior` int(11) DEFAULT NULL,
  PRIMARY KEY (`NomeZona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zona`
--

LOCK TABLES `zona` WRITE;
/*!40000 ALTER TABLE `zona` DISABLE KEYS */;
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

-- Dump completed on 2017-03-21 16:33:35

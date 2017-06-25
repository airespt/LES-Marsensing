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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `utilizador` varchar(20) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','1234');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `embarcaoes_subreficie` VALUES (1,1,100,'[37.0, -10.2]','12'),(2,1,111,'[38.1, -10]','111'),(3,1,111,'[38.5, -9.7]','12'),(4,1,11,'[37, -9.5]','55');
/*!40000 ALTER TABLE `embarcaoes_subreficie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idiomas` (
  `id_idi` tinyint(4) NOT NULL AUTO_INCREMENT,
  `idioma` varchar(3) NOT NULL,
  PRIMARY KEY (`id_idi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idiomas`
--

LOCK TABLES `idiomas` WRITE;
/*!40000 ALTER TABLE `idiomas` DISABLE KEYS */;
INSERT INTO `idiomas` VALUES (1,'PT'),(2,'UK'),(3,'DE'),(4,'ES'),(5,'FR');
/*!40000 ALTER TABLE `idiomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linguas`
--

DROP TABLE IF EXISTS `linguas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linguas` (
  `Lingua` varchar(30) NOT NULL,
  PRIMARY KEY (`Lingua`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linguas`
--

LOCK TABLES `linguas` WRITE;
/*!40000 ALTER TABLE `linguas` DISABLE KEYS */;
INSERT INTO `linguas` VALUES ('ingles'),('portugues');
/*!40000 ALTER TABLE `linguas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pabertas`
--

DROP TABLE IF EXISTS `pabertas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pabertas` (
  `id_pa` int(11) NOT NULL AUTO_INCREMENT,
  `idioma_pa` tinyint(4) DEFAULT '0',
  `pergunta_pa` varchar(300) DEFAULT NULL,
  `resposta_pa` text,
  `faq_pa` varchar(1) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pa`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pabertas`
--

LOCK TABLES `pabertas` WRITE;
/*!40000 ALTER TABLE `pabertas` DISABLE KEYS */;
INSERT INTO `pabertas` VALUES (1,0,'pergunta aberta 1 ?','','N',NULL),(2,0,'pergunta aberta 2 ?','','N',NULL),(9,0,'\"PORQUW\"',NULL,NULL,'\"dantseb@s\"'),(10,0,NULL,NULL,NULL,'123'),(11,0,'porqueeeeeeee',NULL,NULL,'quem'),(12,0,'bbbbb',NULL,NULL,'aaaaa'),(13,0,'ddaddsads',NULL,NULL,'Email1111');
/*!40000 ALTER TABLE `pabertas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perguntas` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `idi_id` tinyint(4) NOT NULL,
  `pergunta` varchar(300) NOT NULL,
  `resposta` text NOT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas`
--

LOCK TABLES `perguntas` WRITE;
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
INSERT INTO `perguntas` VALUES (1,1,'O que é o ShippingNoise.com ?','Esta página mostra resultados de um modelo dos níveis de ruído subaquático gerado pelo tráfego marítimo - designado por ruído naval. O ruído naval é uma de diversas formas de introdução de ruído no meio marinho.'),(2,1,'Porque razão foi criada esta página?','O objectivo é mostrar a contribuição do tráfego marítimo para o nível de ruído subaquático em larga escala, o qual, hoje em dia, se apresenta como uma forma de poluição crónica nos oceanos. O ruído subaquático tem sido objecto de diversos estudos com respeito aos efeitos sobre a fauna marinha. Este sítio não mostra medidas directas de ruído. Os dados mostrados são obtidos através de um modelo computacional de propagação acústica. Devido à dificuldade prática de obter medidas directas nestas escalas espaciais estes resultados podem ser utilizados como boa aproximação, em complemento a medidas directas.'),(3,1,'O que é ruído subaquático?','Ruído Subaquático resulta da introdução de energia na forma de ondas mecânicas no meio subaquático. Neste caso, o meio subaquático é o ambiente marinho.'),(4,1,'Que níveis de pressão sonora afectam a fauna marinha?',' É difícil dar uma resposta simples a esta questão, a qual é objecto de investigação científica. Em geral, cetáceos, peixes, e outras formas de fauna marinha têm padrões de audição e sensibilidades diferentes, sendo cada espécie sensível uma certa intensidade sonora e intervalo de frequências. Futuramente, poderemos mostrar resultados que tenham em conta o limiar de audibilidade de alguma espécie.'),(5,1,'Como são obtidos os níveis sonoros mostrados nas figuras?','Há uma figura que mostra o nível de pressão sonora instantâneo devido ao tráfego marítimo do instante correspondente, na forma de uma superficíe de intensidades, normalmente desiganada por mapa de ruído . Para gerar essa superfície, requer-se o conhecimento das posições dos navios presentes, o espectro do ruído radiado por cada um, e informação ambiental (perfil de velocidade propagação, batimetria, fundo marinho). Estes dados são utilizados como entradas do modelo de propagação para cálculo dos níveis sonoros. A cada 10 minutos é gerada uma nova imagem do nível sonoro ao longo da área a fim de se obter uma série temporal. Essa série temporal é processada a fim de obter indicadores estatísticos que permitam extraír informação significativa. Os indicadores estatísticos mostrados nesta página são o nível sonoro excedido durante 95% do tempo (p05), o nível sonoro excedido durante 5% do tempo (p95), e o nível sonoro médio.'),(6,1,'Como são obtidas as posições dos navios?','As posições dos navios são obtidas através de dados AIS. Os dados AIS são disponibilizados através da página de partilha de dados AIS www.aishub.net'),(7,1,'O que é AIS?','AIS é o acrónimo de Automatic Identification System. O sistema AIS é um sistema anti-colisão. Navios de grande porte estão equipados com um transmissor AIS, para evitar colisões durante a navegação. O sistema transmite um mensagem digital contendo diversos parâmetros tais como User ID, posição, velocidade, direção, tipo, entre outros parâmetros. Veja AIS wikipedia para informação mais detalhada.'),(8,1,'Que navios são mostrados? Porque desaparecem, por vezes?','A maioria dos meios navais são porta-contentores, petroleiros, ou cruzeiros que passam em posições distantes dos receptores instalados em terra, pelo que não é garantida a recepção das mensagens AIS transmitidas por um determinado meio naval em todos os instantes.'),(9,1,'Porque são mostradas apenas áreas em Portugal, Espanha e Canal da Mancha?','Actualmente estão disponíveis dados de qualidade aceitável para estas áreas. O principal constrangimento é a capacidade computacional disponível para cálculo dos mapas de ruído subaquático. Quanto maior é a área, mais tempo computacional é necessário. As áreas mostradas podem ser alteradas no futuro. '),(10,2,'What is ShippingNoise.com ?','This site shows modelled level of underwater noise generated by large shipping traffic - the so called shipping noise. Shipping is one of many ways to introduce man made noise into the marine environment.'),(11,2,'Why did you create this site ?','Our objective is to show the contribution of shipping to the antropogenic (man made) underwater noise level, which is a chronic form of polluting our oceans today. Underwater noise has been the topic of various studies with respect to the effects on marine life. This site does by no way show actual in-situ measurements. Data is obtained from an underwater acoustic model, however due to the notorious dificulty in performing actual measurements it can be used as an aproximation.'),(12,2,'What is underwater noise?','Underwater noise is the result of the introduction of energy in the form of mechanical waves into an underwater media. In this case we mean the marine environment.'),(13,2,'What is the SPL at which marine life is affected ?','There is no direct answer to this as this has been and continues to be a topic of scientific research. Generaly speaking, ceteaceans and other marine fauna have different hearing patterns which are sensitive to certain frequencies and pressure levels. We may in the future include some marine life hearing thresholds obtained from public scientific studies.'),(14,2,'How do you obtain the sound level visible in the figure?','The figure shows a surface of rms Sound Pressure Level (SPL) of underwater noise generated by the passing ship traffic. To generate this surface, it requires the position of ships, the radiated noise level, and environmental data such as bathymetry, sound velocity and seafloor parameters. These data serve as input for an acoustic propagation model that generates the SPL surface. This process is repeated every 10 minutes with new vessel positions, as to generate a time series of instant noise maps. These SPL surfaces are processed for obtaining statistical indicators that allow to extract meaningful information. The statistical indicators shown here are level exceeded 95% of the time (p05), level exceeded 5% of the time (p95), and average SPL. '),(15,2,'How do you obtain ship positions?','The ship positions are obtained by means of AIS data. This AIS data is made available through the AIS data sharing site www.aishub.net'),(16,2,'What is AIS?','AIS stands for Automatic Identification System. Large ships are equipped with an AIS transmitter, to avoid colisions at sea. The transmission consists of a message containing several parameters, such as User ID, position, speed, heading, ship type, and several other relevant parameters. Check the AIS wikipedia entry for more information.'),(17,2,'Which ships are shown? Why do they seem to disappear sometimes?','Most ships are container ships, oil tankers, cruise ships that may cruise at positions distant from AIS receivers located on land, and therefore the reception of AIS radio signals from a given ship is not guaranteed at all time.'),(18,2,'Why do you only show areas in Portugal, Spain, and The Channel?','Currently there is AIS data with acceptable quality available for these areas. The main constraint is the processing capacity needed to calculate the underwater noise maps. The larger the area the longer it takes to compute. We will update the areas as this project progresses.');
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;
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
INSERT INTO `superficie` VALUES 

(1,'2017-01-01 00:00:00','PortugalSW','portugalmap.png','map'),
(2,'2017-01-01 00:00:00','PortugalSW','portugalp05.png','p05'),
(3,'2017-01-01 00:00:00','PortugalSW','portugalp95.png','p95'),
(4,'2017-01-01 00:00:00','PortugalSW','portugalsel7.png','sel7'),
(5,'2017-01-01 00:00:00','Spain','espanhamap.png','map'),
(6,'2017-01-01 00:00:00','Spain','espanhap05.png','p05'),
(7,'2017-01-01 00:00:00','Spain','espanhap95.png','p95'),
(8,'2017-01-01 00:00:00','Spain','espanhasel7.png','sel7'),
(9,'2017-01-01 00:00:00','Spain','e1.png','map'),
(10,'2017-01-01 00:00:10','Spain','e2.png','map'),
(11,'2017-01-01 00:00:20','Spain','e3.png','map'),
(12,'2017-01-01 00:00:30','Spain','e4.png','map'),
(13,'2017-01-01 00:00:40','Spain','e5.png','map'),
(14,'2017-01-01 00:00:00','PortugalSW','p1.png','map'),
(15,'2017-01-01 00:00:10','PortugalSW','p2.png','map'),
(16,'2017-01-01 00:00:20','PortugalSW','p3.png','map'),
(17,'2017-01-01 00:00:30','PortugalSW','p4.png','map'),
(18,'2017-01-01 00:00:40','PortugalSW','p5.png','map'),
(19,'2017-02-01 00:00:00','PortugalSW','portugalmap.png','map'),
(20,'2017-02-01 00:00:00','PortugalSW','portugalp05.png','p05'),
(21,'2017-02-01 00:00:00','PortugalSW','portugalp95.png','p95'),
(22,'2017-02-01 00:00:00','PortugalSW','portugalsel7.png','sel7'),
(23,'2017-02-01 00:00:00','Spain','espanhamap.png','map'),
(24,'2017-02-01 00:00:00','Spain','espanhap05.png','p05'),
(25,'2017-02-01 00:00:00','Spain','espanhap95.png','p95'),
(26,'2017-02-01 00:00:00','Spain','espanhasel7.png','sel7'),
(27,'2017-02-01 00:00:00','Spain','e1.png','map'),
(28,'2017-02-01 00:00:10','Spain','e2.png','map'),
(29,'2017-02-01 00:00:20','Spain','e3.png','map'),
(30,'2017-02-01 00:00:30','Spain','e4.png','map'),
(31,'2017-02-01 00:00:40','Spain','e5.png','map'),
(32,'2017-02-01 00:00:00','PortugalSW','p1.png','map'),
(33,'2017-02-01 00:00:10','PortugalSW','p2.png','map'),
(34,'2017-02-01 00:00:20','PortugalSW','p3.png','map'),
(35,'2017-02-01 00:00:30','PortugalSW','p4.png','map'),
(36,'2017-02-01 00:00:40','PortugalSW','p5.png','map');

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
INSERT INTO `zona` VALUES ('espanha','34','34','bespanha'),('inglaterra','22','21','bing'),('LaManche','(49.0, -1.0)','(52.0,4.0)','[[49.0,-1.0],[52.0,4.0]]'),('PelagosFrance','(41.28333, 6.16667)','(43.76333,10.246667)','[[41.28333,6.16667],[43.76333,10.246667]]'),('portugal','12','12','bport'),('PortugalSW','(36.31, -11.0)','(39.35,-7.48)','[[36.31,-11.0],[39.35,-7.48]]'),('Spain','(39.0, 0)','(42.0, 4.0)','[[39.0,0],[42.0,4.0]]');
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

-- Dump completed on 2017-06-25 20:55:23

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 03:28 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noiseship`
--

--
-- Dumping data for table `embarcaoes_subreficie`
--

UPDATE `embarcaoes_subreficie` SET `ID_barco` = 1,`IDSubreficie` = 1,`Velocidade` = 100,`localizacao` = '[37.0, -10.2]',`idRota` = '12' WHERE `embarcaoes_subreficie`.`ID_barco` = 1 AND `embarcaoes_subreficie`.`IDSubreficie` = 1;
UPDATE `embarcaoes_subreficie` SET `ID_barco` = 2,`IDSubreficie` = 1,`Velocidade` = 111,`localizacao` = '[38.1, -10]',`idRota` = '111' WHERE `embarcaoes_subreficie`.`ID_barco` = 2 AND `embarcaoes_subreficie`.`IDSubreficie` = 1;
UPDATE `embarcaoes_subreficie` SET `ID_barco` = 3,`IDSubreficie` = 1,`Velocidade` = 111,`localizacao` = '[38.5, -9.7]',`idRota` = '12' WHERE `embarcaoes_subreficie`.`ID_barco` = 3 AND `embarcaoes_subreficie`.`IDSubreficie` = 1;
UPDATE `embarcaoes_subreficie` SET `ID_barco` = 4,`IDSubreficie` = 1,`Velocidade` = 11,`localizacao` = '[37, -9.5]',`idRota` = '55' WHERE `embarcaoes_subreficie`.`ID_barco` = 4 AND `embarcaoes_subreficie`.`IDSubreficie` = 1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 07:48 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `embarcaoes_subreficie`
--

CREATE TABLE `embarcaoes_subreficie` (
  `ID_barco` int(11) NOT NULL,
  `IDSubreficie` int(11) NOT NULL,
  `Velocidade` int(11) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `idRota` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `embarcaoes_subreficie`
--

INSERT INTO `embarcaoes_subreficie` (`ID_barco`, `IDSubreficie`, `Velocidade`, `localizacao`, `idRota`) VALUES
(1, 1, 100, '[37.0, -10.2]', '12'),
(1, 3, 111, 'sss', '12'),
(2, 1, 111, '[38.1, -10]', '111'),
(4, 1, 11, '[37, -9.5]', '55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `embarcaoes_subreficie`
--
ALTER TABLE `embarcaoes_subreficie`
  ADD PRIMARY KEY (`ID_barco`,`IDSubreficie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

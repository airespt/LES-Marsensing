-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Dez-2015 às 01:58
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `noiseship`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pabertas`
--

CREATE TABLE IF NOT EXISTS `pabertas` (
  `id_pa` int(11) NOT NULL AUTO_INCREMENT,
  `idioma_pa` tinyint(4) NOT NULL,
  `pergunta_pa` varchar(300) NOT NULL,
  `resposta_pa` text NOT NULL,
  `faq_pa` varchar(1) NOT NULL,
  PRIMARY KEY (`id_pa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pabertas`
--
INSERT INTO `pabertas` (`id_pa`, `idioma_pa`, `pergunta_pa`, `resposta_pa`, `faq_pa`) VALUES
(1, 0, 'pergunta aberta 1 ?', '', 'N'),
(2, 0, 'pergunta aberta 2 ?', '', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
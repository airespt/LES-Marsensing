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
-- Estrutura da tabela `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `utilizador` varchar(20) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id_adm`, `utilizador`, `senha`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_cat` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(3) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nome`) VALUES
(1, 'PT'),
(2, 'UK'),
(3, 'DE'),
(4, 'ES'),
(5, 'FR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` tinyint(4) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id_faq`, `cat_id`, `nome`, `descricao`) VALUES
(1, 1, 'O que é o ShippingNoise.com ?', 'Esta página mostra resultados de um modelo dos níveis de ruído subaquático gerado pelo tráfego marítimo - designado por ruído naval. O ruído naval é uma de diversas formas de introdução de ruído no meio marinho.'),
(2, 1, 'Porque razão foi criada esta página?', 'O objectivo é mostrar a contribuição do tráfego marítimo para o nível de ruído subaquático em larga escala, o qual, hoje em dia, se apresenta como uma forma de poluição crónica nos oceanos. O ruído subaquático tem sido objecto de diversos estudos com respeito aos efeitos sobre a fauna marinha. Este sítio não mostra medidas directas de ruído. Os dados mostrados são obtidos através de um modelo computacional de propagação acústica. Devido à dificuldade prática de obter medidas directas nestas escalas espaciais estes resultados podem ser utilizados como boa aproximação, em complemento a medidas directas.'),
(3, 1, 'O que é ruído subaquático?', 'Ruído Subaquático resulta da introdução de energia na forma de ondas mecânicas no meio subaquático. Neste caso, o meio subaquático é o ambiente marinho.'),
(4, 1, 'Que níveis de pressão sonora afectam a fauna marinha?', ' É difícil dar uma resposta simples a esta questão, a qual é objecto de investigação científica. Em geral, cetáceos, peixes, e outras formas de fauna marinha têm padrões de audição e sensibilidades diferentes, sendo cada espécie sensível uma certa intensidade sonora e intervalo de frequências. Futuramente, poderemos mostrar resultados que tenham em conta o limiar de audibilidade de alguma espécie.'),
(5, 1, 'Como são obtidos os níveis sonoros mostrados nas figuras?', 'Há uma figura que mostra o nível de pressão sonora instantâneo devido ao tráfego marítimo do instante correspondente, na forma de uma superficíe de intensidades, normalmente desiganada por mapa de ruído . Para gerar essa superfície, requer-se o conhecimento das posições dos navios presentes, o espectro do ruído radiado por cada um, e informação ambiental (perfil de velocidade propagação, batimetria, fundo marinho). Estes dados são utilizados como entradas do modelo de propagação para cálculo dos níveis sonoros. A cada 10 minutos é gerada uma nova imagem do nível sonoro ao longo da área a fim de se obter uma série temporal. Essa série temporal é processada a fim de obter indicadores estatísticos que permitam extraír informação significativa. Os indicadores estatísticos mostrados nesta página são o nível sonoro excedido durante 95% do tempo (p05), o nível sonoro excedido durante 5% do tempo (p95), e o nível sonoro médio.'),
(6, 1, 'Como são obtidas as posições dos navios?', 'As posições dos navios são obtidas através de dados AIS. Os dados AIS são disponibilizados através da página de partilha de dados AIS www.aishub.net'),
(7, 1, 'O que é AIS?', 'AIS é o acrónimo de Automatic Identification System. O sistema AIS é um sistema anti-colisão. Navios de grande porte estão equipados com um transmissor AIS, para evitar colisões durante a navegação. O sistema transmite um mensagem digital contendo diversos parâmetros tais como User ID, posição, velocidade, direção, tipo, entre outros parâmetros. Veja AIS wikipedia para informação mais detalhada.'),
(8, 1, 'Que navios são mostrados? Porque desaparecem, por vezes?', 'A maioria dos meios navais são porta-contentores, petroleiros, ou cruzeiros que passam em posições distantes dos receptores instalados em terra, pelo que não é garantida a recepção das mensagens AIS transmitidas por um determinado meio naval em todos os instantes.'),
(9, 1, 'Porque são mostradas apenas áreas em Portugal, Espanha e Canal da Mancha?', 'Actualmente estão disponíveis dados de qualidade aceitável para estas áreas. O principal constrangimento é a capacidade computacional disponível para cálculo dos mapas de ruído subaquático. Quanto maior é a área, mais tempo computacional é necessário. As áreas mostradas podem ser alteradas no futuro. '),
(10, 2, 'What is ShippingNoise.com ?', 'This site shows modelled level of underwater noise generated by large shipping traffic - the so called shipping noise. Shipping is one of many ways to introduce man made noise into the marine environment.'),
(11, 2, 'Why did you create this site ?', 'Our objective is to show the contribution of shipping to the antropogenic (man made) underwater noise level, which is a chronic form of polluting our oceans today. Underwater noise has been the topic of various studies with respect to the effects on marine life. This site does by no way show actual in-situ measurements. Data is obtained from an underwater acoustic model, however due to the notorious dificulty in performing actual measurements it can be used as an aproximation.'),
(12, 2, 'What is underwater noise?', 'Underwater noise is the result of the introduction of energy in the form of mechanical waves into an underwater media. In this case we mean the marine environment.'),
(13, 2, 'What is the SPL at which marine life is affected ?', 'There is no direct answer to this as this has been and continues to be a topic of scientific research. Generaly speaking, ceteaceans and other marine fauna have different hearing patterns which are sensitive to certain frequencies and pressure levels. We may in the future include some marine life hearing thresholds obtained from public scientific studies.'),
(14, 2, 'How do you obtain the sound level visible in the figure?', 'The figure shows a surface of rms Sound Pressure Level (SPL) of underwater noise generated by the passing ship traffic. To generate this surface, it requires the position of ships, the radiated noise level, and environmental data such as bathymetry, sound velocity and seafloor parameters. These data serve as input for an acoustic propagation model that generates the SPL surface. This process is repeated every 10 minutes with new vessel positions, as to generate a time series of instant noise maps. These SPL surfaces are processed for obtaining statistical indicators that allow to extract meaningful information. The statistical indicators shown here are level exceeded 95% of the time (p05), level exceeded 5% of the time (p95), and average SPL. '),
(15, 2, 'How do you obtain ship positions?', 'The ship positions are obtained by means of AIS data. This AIS data is made available through the AIS data sharing site www.aishub.net'),
(16, 2, 'What is AIS?', 'AIS stands for Automatic Identification System. Large ships are equipped with an AIS transmitter, to avoid colisions at sea. The transmission consists of a message containing several parameters, such as User ID, position, speed, heading, ship type, and several other relevant parameters. Check the AIS wikipedia entry for more information.'),
(17, 2, 'Which ships are shown? Why do they seem to disappear sometimes?', 'Most ships are container ships, oil tankers, cruise ships that may cruise at positions distant from AIS receivers located on land, and therefore the reception of AIS radio signals from a given ship is not guaranteed at all time.'),
(18, 2, 'Why do you only show areas in Portugal, Spain, and The Channel?', 'Currently there is AIS data with acceptable quality available for these areas. The main constraint is the processing capacity needed to calculate the underwater noise maps. The larger the area the longer it takes to compute. We will update the areas as this project progresses.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2014 at 01:23 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventbase`
--
CREATE DATABASE IF NOT EXISTS `eventbase` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `eventbase`;

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `descr` text,
  `nivel` int(11) NOT NULL,
  `lid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  PRIMARY KEY (`eid`),
  KEY `lid` (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`eid`, `nome`, `descr`, `nivel`, `lid`, `date`, `vagas`) VALUES
(1, 'sakura.gif', 'Evento Teste para começo de sistema', 2, 1, '2014-11-01', 10),
(2, 'sakuram.gif', 'Evento teste para começo de sistema', 2, 1, '2014-11-02', 10),
(3, 'inou.jpg', 'Evento teste', 2, 2, '2014-10-06', 10),
(4, 'precure.jpg', 'evento teste', 2, 2, '2013-02-03', 10),
(5, 'good.jpg', 'Evento Teste', 2, 1, '2013-01-09', 10),
(6, 'passa.jpg', 'somente teste', 2, 2, '2012-11-06', 10);

-- --------------------------------------------------------

--
-- Table structure for table `local`
--

CREATE TABLE IF NOT EXISTS `local` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `nomel` varchar(40) NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `num` varchar(7) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cep` varchar(10) NOT NULL,
  `capac` int(11) DEFAULT NULL,
  `nomei` varchar(50) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `local`
--

INSERT INTO `local` (`lid`, `nomel`, `rua`, `num`, `bairro`, `cep`, `capac`, `nomei`, `cidade`, `estado`) VALUES
(1, 'Centro de Eventos Plinio Arlindo de nes', 'Avenida Assis Brasil', '20D', 'Centro', '89805000', 10000, 'Centro de Eventos Plinio Arlindo de nes.jpg', 'Chapecó', 'SC'),
(2, 'Shopping Patio Chapeco', 'Avenida Fernando Machado', '4000D', 'Lider', '89805203', 10000, 'shopping patio chapeco.jpg', 'Chapecó', 'SC');

-- --------------------------------------------------------

--
-- Table structure for table `particip`
--

CREATE TABLE IF NOT EXISTS `particip` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `entra` timestamp NULL DEFAULT NULL,
  `saiu` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `eventId` (`eid`),
  KEY `UserId` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `particip`
--

INSERT INTO `particip` (`pid`, `eid`, `uid`, `entra`, `saiu`) VALUES
(1, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `nivel`, `email`, `cpf`, `fullname`) VALUES
(1, 'admin', 'convidado', 1, 'ice0life@gmail.com', '07322812964', 'icelife mayonaka'),
(2, 'convidado', 'convidado', 2, 'test@bol.com.br', '00000000000', 'Sem Nome Real');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_L` FOREIGN KEY (`lid`) REFERENCES `local` (`lid`);

--
-- Constraints for table `particip`
--
ALTER TABLE `particip`
  ADD CONSTRAINT `FK_evento_id` FOREIGN KEY (`eid`) REFERENCES `evento` (`eid`),
  ADD CONSTRAINT `FK_usuario_id` FOREIGN KEY (`uid`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

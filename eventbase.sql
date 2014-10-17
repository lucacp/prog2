-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2014 at 02:36 AM
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
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`eid`, `nome`, `descr`, `nivel`) VALUES
(1, 'sakura.gif', 'Evento Teste para começo de sistema', 2),
(2, 'sakuram.gif', 'Evento teste para começo de sistema', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`nome`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `nivel`) VALUES
(31, 'convidado', 'd41d8cd98f00b204e9800998ecf8427e', 2),
(3, 'ice1life', 'd5f3ab3edc9d9f4b372979eaeddf692a', 1),
(30, 'icelife', 'd41d8cd98f00b204e9800998ecf8427e', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

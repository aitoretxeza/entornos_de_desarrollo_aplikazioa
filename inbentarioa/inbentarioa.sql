-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2015 a las 17:30:16
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inbentarioa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaileak`
--

CREATE TABLE IF NOT EXISTS `erabiltzaileak` (
  `kodea` int(5) NOT NULL AUTO_INCREMENT,
  `erabiltzailea` varchar(20) NOT NULL,
  `pasahitza` varchar(10) NOT NULL DEFAULT '00000000',
  `maila` set('Administratzailea','Irakaslea','Ikaslea') NOT NULL DEFAULT 'Ikaslea',
  `izena` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodea`),
  UNIQUE KEY `kodea` (`kodea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `erabiltzaileak`
--

INSERT INTO `erabiltzaileak` (`kodea`, `erabiltzailea`, `pasahitza`, `maila`, `izena`) VALUES
(1, 'adm', 'adm', 'Administratzailea', 'Administratzailea'),
(2, 'aurizar', 'aurizar', 'Irakaslea', 'Alain Urizar'),
(5, '2is3-07', '00000000', 'Ikaslea', '2is3-07'),
(22, 'aagirre', 'aagirre', 'Irakaslea', 'Aitor Agirre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `makinak`
--

CREATE TABLE IF NOT EXISTS `makinak` (
  `kodea` varchar(12) NOT NULL DEFAULT '',
  `ejkodea` varchar(8) DEFAULT NULL,
  `mota` varchar(50) NOT NULL,
  `modeloa` varchar(500) DEFAULT NULL,
  `kokapena` set('201','202','203','204','205','206','207','208','209','210') NOT NULL,
  PRIMARY KEY (`kodea`),
  UNIQUE KEY `kodea` (`kodea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `makinak`
--

INSERT INTO `makinak` (`kodea`, `ejkodea`, `mota`, `modeloa`, `kokapena`) VALUES
('200803-001-M', 'HZ000011', 'PC', 'PC froga', '202'),
('200810-001-M', NULL, 'PC', 'PC froga', '201'),
('200911-001-M', 'HZ000000', 'PC', 'PC froga', '205'),
('200911-002-M', 'HZ000001', 'PC', 'PC froga', '210'),
('200911-003-M', 'HZ000002', 'PC', 'PC froga', '210'),
('200911-004-A', 'HZ000003', 'PC', 'PC froga', '210'),
('200911-005-M', 'NULL', 'Inprimagailua', 'Inprimagailua froga', '201'),
('200911-006-M', 'HZ000007', 'PC', 'PC froga', '209'),
('201003-001-M', 'HZ000009', 'Zerbitzaria', 'Zerbitzaria froga', '202'),
('201003-002-M', NULL, 'Inprimagailua', 'Inprimagailua froga', '201'),
('201005-001-M', NULL, 'PC', 'PC froga', '208'),
('201005-002-M', NULL, 'PC', 'PC froga', '205'),
('201005-003-M', NULL, 'PC', 'PC froga', '203'),
('201005-004-M', NULL, 'PC', 'PC froga', '203'),
('201005-005-M', NULL, 'PC', 'PC froga', '205'),
('201005-006-M', 'HZ000010', 'PC', 'PC froga', '204'),
('201010-001-M', 'HZ000008', 'Zerbitzaria', 'Zerbitzaria froga', '202'),
('201010-002-M', NULL, 'Proiektorea', 'Proiektorea froga', '205'),
('201107-003-M', NULL, 'Inprimagailua', 'Inprimagailua froga', '205'),
('201107-004-M', 'HZ000004', 'PC', 'PC froga', '205'),
('201107-005-A', NULL, 'Proiektorea', 'Proiektorea froga', '203'),
('201107-006-M', 'HZ000005', 'PC', 'PC froga', '206'),
('201110-001-A', NULL, 'Inprimagailua', 'Inprimagailu froga', '209'),
('201110-002-M', 'HZ000006', 'PC', 'PC froga', '207');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

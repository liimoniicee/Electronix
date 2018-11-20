-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-11-2018 a las 15:30:54
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `electronicax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepciones`
--

CREATE TABLE IF NOT EXISTS `recepciones` (
  `id_recepcion` int(11) NOT NULL AUTO_INCREMENT,
  `colonia` varchar(30) NOT NULL,
  `calles` varchar(100) NOT NULL,
  `cp` int(11) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `situacion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_recepcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `recepciones`
--

INSERT INTO `recepciones` (`id_recepcion`, `colonia`, `calles`, `cp`, `ciudad`, `estado`, `situacion`) VALUES
(1, 'Lagunitas 22', 'Pro. Leona Vicario', 24566, 'Cabo San Lucas', 'Baja California Sur', 'Inactivo'),
(2, 'Zona centro', 'Morelos', 25899, 'San jose', 'Baja California Sur', 'Activo'),
(3, 'Cangrejosx', 'Cangrekkxx', 259871, 'Cabo San Lucasx', 'Baja California Sur', 'Activo'),
(4, 'Cangrejos', 'Cangrekk', 754678, 'Cabo San Lucas', 'Baja California Sur', 'Activo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE  `personal` ADD  `rec_id_recepcion` INT NULL AFTER  `sueldo` ,
ADD INDEX (  `rec_id_recepcion` );


ALTER TABLE  `personal` ADD FOREIGN KEY (  `rec_id_recepcion` ) REFERENCES  `electronicax`.`recepciones` (
`id_recepcion`
) ON DELETE NO ACTION ON UPDATE NO ACTION ;


ALTER TABLE  `reparar_tv` ADD  `rec_id_recepcion` INT NULL AFTER  `id_personal` ,
ADD INDEX (  `rec_id_recepcion` )

ALTER TABLE  `reparar_tv` ADD FOREIGN KEY (  `rec_id_recepcion` ) REFERENCES  `electronicax`.`recepciones` (
`id_recepcion`
) ON DELETE NO ACTION ON UPDATE NO ACTION ;
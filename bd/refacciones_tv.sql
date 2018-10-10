-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-10-2018 a las 20:13:57
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
-- Estructura de tabla para la tabla `refacciones_tv`
--

CREATE TABLE IF NOT EXISTS `refacciones_tv` (
  `Id_refacciones` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `precio` int(15) NOT NULL,
  `fecha_entrada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_salida` text,
  `etiqueta_1` varchar(50) NOT NULL,
  `etiqueta_2` varchar(50) DEFAULT NULL,
  `imagen1` varchar(300) DEFAULT NULL,
  `imagen2` varchar(300) DEFAULT NULL,
  `imagen3` varchar(300) DEFAULT NULL,
  `imagen4` varchar(300) DEFAULT NULL,
  `imagen5` varchar(300) DEFAULT NULL,
  `link` varchar(300) NOT NULL,
  `id_personal` int(10) DEFAULT '0',
  PRIMARY KEY (`Id_refacciones`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `refacciones_tv`
--

INSERT INTO `refacciones_tv` (`Id_refacciones`, `tipo`, `marca`, `modelo`, `ubicacion`, `estado`, `precio`, `fecha_entrada`, `fecha_salida`, `etiqueta_1`, `etiqueta_2`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `link`, `id_personal`) VALUES
(17, 'CULO', 'SAMSUNG', 'UN44G0O9SX', 'Almacen', 'Pendiente', 1000, '2018-10-10 03:34:17', NULL, 'ASASD', '1SDA', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX19990357_2256283621274732_5303220241715569349_n.jpg', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX14731376_2060823274154102_6423179866587404628_n.jpg', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX33302972_206666580144254_6913521569750843392_n.jpg', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX14702229_2060784487491314_3582770702396650193_n.jpg', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX14731264_2060819500821146_1320703655626538787_n.jpg', '', 3),
(18, '', '', '', 'Almacen', 'Pendiente', 0, '2018-10-10 14:28:56', NULL, '', '', 'assets/galeria/almacen//', 'assets/galeria/almacen//', 'assets/galeria/almacen//', 'assets/galeria/almacen//', 'assets/galeria/almacen//', '', 3),
(19, '', '', '', 'Almacen', 'Pendiente', 0, '2018-10-10 14:47:37', NULL, '', '', 'assets/galeria/almacen//', 'assets/galeria/almacen//', 'assets/galeria/almacen//', 'assets/galeria/almacen//', 'assets/galeria/almacen//', '', 3),
(20, 'BUFFER', 'LG', '42LN5700', 'Almacen', 'Pendiente', 1, '2018-10-10 14:49:44', NULL, 'ASDX', 'ASDW', 'assets/galeria/almacen/LG/42LN5700WhatsApp Image 2018-08-04 at 10.43.05 AM.jpeg', 'assets/galeria/almacen/LG/42LN5700WhatsApp Image 2018-09-26 at 1.35.08 PM.jpeg', 'assets/galeria/almacen/LG/42LN5700titaniumfix.png', 'assets/galeria/almacen/LG/42LN5700traffic-lights.png', 'assets/galeria/almacen/LG/42LN5700PEMEX_logo.svg.png', '', 3),
(21, 'BUFFER', 'LG', '42LN5700', 'Almacen', 'Pendiente', 1, '2018-10-10 14:51:48', NULL, 'ASDX', 'ASDW', 'assets/galeria/almacen/LG/42LN5700891aae93-e9cb-4a20-ad77-2ce1aa15498b.jpg', 'assets/galeria/almacen/LG/42LN570017577f6f6b28039.jpg', 'assets/galeria/almacen/LG/42LN570020180808_170249 (1).jpg', 'assets/galeria/almacen/LG/42LN5700front-32pfl3508hd.jpg', 'assets/galeria/almacen/LG/42LN5700HOJA1.jpg', '', 3),
(22, 'Fuente de poder', 'SHARP', 'LC60C6500U', 'Caja 10', 'Pendiente', 1000, '2018-10-10 14:53:12', NULL, 'DFG', 'DFGDF', 'assets/galeria/almacen/SHARP/LC60C6500U/', 'assets/galeria/almacen/SHARP/LC60C6500U/traffic-lights.png', 'assets/galeria/almacen/SHARP/LC60C6500U/HOJA2.jpg', 'assets/galeria/almacen/SHARP/LC60C6500U/img_557766.png', 'assets/galeria/almacen/SHARP/LC60C6500U/10782_1-1500x1500.JPG', '', 3),
(23, '', '', '', 'Almacen', 'Pendiente', 0, '2018-10-10 14:55:43', NULL, '', '', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', '', 3),
(24, 'KAKA', 'KAKA', 'KAKA1', 'KAKA 2', 'Pendiente', 0, '2018-10-10 16:27:42', NULL, 'KAKA', 'KAKA', 'assets/galeria/almacen/KAKA/KAKA1/IMG_20181009_103652.jpg', 'assets/galeria/almacen/KAKA/KAKA1/', 'assets/galeria/almacen/KAKA/KAKA1/', 'assets/galeria/almacen/KAKA/KAKA1/', 'assets/galeria/almacen/KAKA/KAKA1/', '', 3),
(25, '', '', '', '', 'Pendiente', 0, '2018-10-10 19:36:45', NULL, '', '', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', '', 3),
(26, '', '', '', '', 'Pendiente', 0, '2018-10-10 19:38:48', NULL, '', '', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', '', 3),
(27, '', '', '', '', 'Pendiente', 0, '2018-10-10 19:41:15', NULL, '', '', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', '', 3),
(28, '', '', '', '', 'Pendiente', 0, '2018-10-10 19:49:31', NULL, '', '', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', '', 3),
(29, '', '', '', '', 'Pendiente', 0, '2018-10-10 19:50:07', NULL, '', '', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', 'assets/galeria/almacen///', '', 3),
(30, 'CULOX', 'ANOXx', 'PITOX', 'CAJA 20', 'Pendiente', 5000, '2018-10-10 20:03:16', NULL, 'ALSJD023', '09CU8AS3', '', '', '', '', '', 'www.1209iuasd097asd.com', 3),
(31, 'ACSCASC', 'ASCASC', 'ASCAS', 'ASDAs', 'Pendiente', 123412, '2018-10-10 20:05:24', NULL, 'CASCA', 'ASCA', NULL, NULL, NULL, NULL, NULL, 'www.1209iuasd097asd.com', 3),
(32, 'FASFAS', 'ASF', 'asd', 'FADS', 'Pendiente', 23424, '2018-10-10 20:06:43', NULL, 'XAS', '234', NULL, NULL, NULL, NULL, NULL, 'www.1209iuasd097asd.com', 3),
(33, 'PITOX', 'PITOX', 'PITOX', 'PITOX', 'Pendiente', 234, '2018-10-10 20:07:52', NULL, 'PITOX', 'PITOX', NULL, NULL, NULL, NULL, NULL, 'PITOX', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

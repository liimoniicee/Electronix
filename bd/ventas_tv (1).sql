-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2018 a las 21:48:10
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
-- Estructura de tabla para la tabla `ventas_tv`
--

CREATE TABLE IF NOT EXISTS `ventas_tv` (
  `idventa_tv` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `costo` int(11) NOT NULL,
  `imagen1` varchar(300) NOT NULL,
  `imagen2` varchar(300) DEFAULT NULL,
  `imagen3` varchar(300) DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_egreso` text,
  `estado` varchar(30) NOT NULL,
  `id_personal` int(11) NOT NULL DEFAULT '0',
  `idvendedor` int(11) NOT NULL DEFAULT '0',
  `ubicacion` varchar(50) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_folio` int(11) NOT NULL,
  `reparar_tv_id_equipo` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `abono` int(11) DEFAULT NULL,
  PRIMARY KEY (`idventa_tv`),
  KEY `fk_ventas_tv_reparar_tv1_idx` (`reparar_tv_id_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `ventas_tv`
--

INSERT INTO `ventas_tv` (`idventa_tv`, `marca`, `modelo`, `serie`, `costo`, `imagen1`, `imagen2`, `imagen3`, `fecha_alta`, `fecha_egreso`, `estado`, `id_personal`, `idvendedor`, `ubicacion`, `id_equipo`, `id_folio`, `reparar_tv_id_equipo`, `tipo`, `abono`) VALUES
(1, 'Samsung', 'un55mu6100fxzx', 'asdasd12345', 6000, '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\mx-uhdtv-mu6100-un55.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\mx-uhdtv-mu6100.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\jklhjlblkg.jpg', '2018-07-13 16:19:25', '2018-09-27 10:36:38', 'Apartada', 3, 3, 'Pendiente traslado', 0, 4414, 0, 'Apartado', 6000),
(2, 'LG', '42ln5700', 'xasdas3623', 4300, 'assets\\galeria\\1.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\LG\\42ln5700\\xasdas3623\\lg2.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\LG\\42ln5700\\xasdas3623\\lg3.png', '2018-07-13 16:30:14', '', 'En venta', 3, 0, '', 0, 0, 0, NULL, NULL),
(3, 'qlon', 'asde', '1wewqw', 4300, 'assets/galeria/28_24MT49S_Product image_09_Desk.jpg', NULL, NULL, '2018-09-12 22:38:07', NULL, 'Vendida', 0, 0, '', 0, 0, 0, NULL, NULL),
(4, 'qlon', 'asde', '1wewqw', 4300, 'assets/galeria/smart-tv-RCA1.png', NULL, NULL, '2018-09-12 22:38:21', '2018-09-26 14:15:48', 'Apartada', 0, 3, 'Pendiente traslado', 0, 4443, 0, 'Credito', 3300),
(5, 'philips', '32pfl3508/f8', '0', 1800, 'assets/galeria/venta/philips/32pfl3508/f8/0/front-32pfl3508hd.jpg', NULL, NULL, '2018-09-26 16:38:31', '2018-09-26 10:39:15', 'Vendida', 3, 3, 'Cliente', 5000018, 4437, 0, NULL, NULL),
(6, 'LG', '42ln5700', 'xasdas3623', 4300, 'assets/galeria/venta/LG/42ln5700/xasdas3623/IMG_20180310_184655.jpg', NULL, NULL, '2018-09-27 21:36:38', NULL, 'En venta', 3, 0, '', 0, 0, 0, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-10-2019 a las 15:12:38
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electronicax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `id_almacen` int(11) NOT NULL AUTO_INCREMENT,
  `sub_ubicacion` varchar(50) NOT NULL,
  `sub_estado` varchar(50) NOT NULL,
  `fecha_entrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_salida` date NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_refacciones` int(11) NOT NULL,
  `idventa_tv` int(11) NOT NULL,
  `id_folio` int(10) NOT NULL,
  PRIMARY KEY (`id_almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `cont_hoy` int(1) NOT NULL DEFAULT '0',
  `personal_id_personal` int(11) NOT NULL,
  `horas_hoy` time DEFAULT NULL,
  `horas_total` time DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `fk_asistencia_personal1_idx` (`personal_id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `fecha`, `hora_entrada`, `hora_salida`, `cont_hoy`, `personal_id_personal`, `horas_hoy`, `horas_total`) VALUES
(1, '2019-10-25', '23:21:19', '23:56:27', 1, 1, NULL, NULL),
(2, '2019-10-25', '23:56:32', '23:57:23', 1, 2, NULL, NULL),
(3, '2019-10-26', '00:19:55', '00:30:02', 1, 1, NULL, NULL),
(4, '2019-10-26', '00:23:47', '00:24:28', 1, 3, NULL, NULL),
(5, '2019-10-26', '00:30:06', NULL, 0, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

DROP TABLE IF EXISTS `avisos`;
CREATE TABLE IF NOT EXISTS `avisos` (
  `id_aviso` int(11) NOT NULL AUTO_INCREMENT,
  `id_personal` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aviso` varchar(500) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_aviso`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`id_aviso`, `id_personal`, `fecha`, `aviso`, `estado`, `Tipo`) VALUES
(1, 1, '2019-10-26 05:46:42', 'Equipo 2 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(2, 1, '2019-10-26 05:47:49', 'Equipo 3 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(3, 1, '2019-10-26 05:49:22', 'Equipo 4 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(4, 1, '2019-10-26 05:51:14', 'Equipo 5 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(5, 1, '2019-10-26 05:54:49', 'Equipo 6 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(6, 3, '2019-10-26 06:23:35', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(7, 1, '2019-10-26 06:26:15', 'Equipo numero 6 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id_carro` int(11) NOT NULL AUTO_INCREMENT,
  `car_id_marca` int(11) NOT NULL,
  `car_modelo` varchar(30) NOT NULL,
  `car_ano` int(11) NOT NULL,
  `car_tipo` varchar(30) NOT NULL,
  `car_estado` varchar(30) NOT NULL,
  `id_personal_traslado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_carro`),
  UNIQUE KEY `car_id_marca_2` (`car_id_marca`),
  UNIQUE KEY `id_personal_traslado` (`id_personal_traslado`),
  KEY `car_id_marca` (`car_id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carros`
--

INSERT INTO `carros` (`id_carro`, `car_id_marca`, `car_modelo`, `car_ano`, `car_tipo`, `car_estado`, `id_personal_traslado`) VALUES
(1, 1, 'Ranger', 2005, 'Automovil', 'Activo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_folio` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `puntos` int(15) DEFAULT '0',
  `conocio` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_folio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_folio`, `nombre`, `apellidos`, `direccion`, `correo`, `celular`, `fecha`, `puntos`, `conocio`) VALUES
(1, 'Pedro', 'Marquez', 'Tormenta', 'pedro@gmail.com', '6241543710', '2019-10-26 05:22:17', 0, 'Recomendacion'),
(2, 'xx', 'xx', 'xx', 'xx', '1312312451', '2019-10-26 05:32:53', 0, 'Recomendacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(25) NOT NULL,
  `mar_estado` varchar(25) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`, `mar_estado`) VALUES
(1, 'Ford', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `sueldo` int(11) NOT NULL,
  `rec_id_recepcion` int(11) DEFAULT NULL,
  `horas` time DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  PRIMARY KEY (`id_personal`),
  KEY `rec_id_recepcion` (`rec_id_recepcion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `tipo`, `usuario`, `contrasena`, `nombre`, `apellidos`, `correo`, `celular`, `sueldo`, `rec_id_recepcion`, `horas`, `hora_entrada`, `hora_salida`) VALUES
(1, 'Administrador', 'isra', 'c4ca4238a0b923820dcc509a6f75849b', 'Israel', 'Martinez', 'x', 'x', 3000, 1, NULL, NULL, NULL),
(2, 'Traslado', 'traslado', 'c4ca4238a0b923820dcc509a6f75849b', 'traslado', 'x', 'x', 'x', 0, 1, NULL, NULL, NULL),
(3, 'Tecnico', 'Tecnico', 'c4ca4238a0b923820dcc509a6f75849b', 'Tecnico', 'x', 'x', '0', 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepciones`
--

DROP TABLE IF EXISTS `recepciones`;
CREATE TABLE IF NOT EXISTS `recepciones` (
  `id_recepcion` int(11) NOT NULL AUTO_INCREMENT,
  `colonia` varchar(30) NOT NULL,
  `calles` varchar(100) NOT NULL,
  `cp` int(11) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `situacion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_recepcion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recepciones`
--

INSERT INTO `recepciones` (`id_recepcion`, `colonia`, `calles`, `cp`, `ciudad`, `estado`, `situacion`) VALUES
(1, 'Centro', 'Morelos', 23475, 'Cabo San Lucas', 'Baja California Sur', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refacciones_tv`
--

DROP TABLE IF EXISTS `refacciones_tv`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparar_tv`
--

DROP TABLE IF EXISTS `reparar_tv`;
CREATE TABLE IF NOT EXISTS `reparar_tv` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `equipo` varchar(50) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `accesorios` varchar(50) DEFAULT NULL,
  `falla` varchar(100) DEFAULT NULL,
  `comentarios` varchar(150) DEFAULT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_entregar` varchar(150) DEFAULT '0000-00-00 00:00:00',
  `fecha_egreso` varchar(150) DEFAULT '0000-00-00 00:00:00',
  `servicio` varchar(50) DEFAULT NULL,
  `presupuesto` int(10) NOT NULL DEFAULT '0',
  `mano_obra` int(10) NOT NULL DEFAULT '0',
  `abono` int(11) NOT NULL DEFAULT '0',
  `restante` int(10) NOT NULL DEFAULT '0',
  `costo_total` int(10) NOT NULL DEFAULT '0',
  `valor` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `puntos` int(15) NOT NULL DEFAULT '0',
  `id_folio` int(10) DEFAULT NULL,
  `id_personal` int(10) DEFAULT '0',
  `rec_id_recepcion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `Id_folio` (`id_folio`),
  KEY `id_personal` (`id_personal`),
  KEY `id_personal_2` (`id_personal`),
  KEY `rec_id_recepcion` (`rec_id_recepcion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reparar_tv`
--

INSERT INTO `reparar_tv` (`id_equipo`, `equipo`, `marca`, `modelo`, `serie`, `accesorios`, `falla`, `comentarios`, `fecha_ingreso`, `fecha_entregar`, `fecha_egreso`, `servicio`, `presupuesto`, `mano_obra`, `abono`, `restante`, `costo_total`, `valor`, `estado`, `ubicacion`, `puntos`, `id_folio`, `id_personal`, `rec_id_recepcion`) VALUES
(1, 'television', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '2019-10-26 05:45:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 300, 'Pendiente', 'Recepcion', 0, 1, 0, 1),
(2, 'Television', 'SAMSUNG', 'LXN24', 'XASDASDA', 'BASE, CABLE Y CONTROL', 'NO ENCIENDE', 'asd', '2019-10-26 05:46:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, NULL, 'Pendiente', 'Recepcion', 0, 1, 0, 1),
(3, 'Television', 'QWE', 'QWE', 'QWE', 'qwe', 'QWE', 'qwe', '2019-10-26 05:47:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, NULL, 'Pendiente', 'Recepcion', 0, 2, 0, 1),
(4, 'Television', 'XASD', 'XAS', 'VASA', 'vasva', 'AXSD', 'vasdv', '2019-10-26 05:49:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, NULL, 'Pendiente', 'Recepcion', 0, 2, 0, 1),
(5, 'Television', 'XASD', 'XAS', 'VASA', 'vasva', 'AXSD', 'vasdv', '2019-10-26 05:51:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, NULL, 'Pendiente', 'Recepcion', 0, 2, 0, 1),
(6, 'Television', 'SAMSUNG', 'XAS', 'DASD', 'asdasda', 'AXSD', '', '2019-10-26 05:54:49', '2019-10-26 00:28:23', '0000-00-00 00:00:00', 'Reparacion', 1500, 500, 0, 2000, 2000, 500, 'Reparada', 'Recepcion en ruta a Cliente', 0, 2, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_tecnicos`
--

DROP TABLE IF EXISTS `reportes_tecnicos`;
CREATE TABLE IF NOT EXISTS `reportes_tecnicos` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `falla_especifica` varchar(1000) DEFAULT NULL,
  `solucion_especifica` varchar(1000) DEFAULT NULL,
  `conclusion` varchar(1000) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `solicitud` varchar(50) DEFAULT NULL,
  `parte` varchar(50) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `imagen1` varchar(80) DEFAULT NULL,
  `imagen2` varchar(80) DEFAULT NULL,
  `imagen3` varchar(80) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `id_equipo` (`id_equipo`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes_tecnicos`
--

INSERT INTO `reportes_tecnicos` (`id_reporte`, `falla_especifica`, `solucion_especifica`, `conclusion`, `fecha`, `solicitud`, `parte`, `estado`, `imagen1`, `imagen2`, `imagen3`, `id_personal`, `id_equipo`) VALUES
(1, 'No servia gg', 'Se le metio mas ram alv', 'Reparado', '2019-10-26 06:24:19', 'NA', 'NA', 'Polvo', 'assets/galeria/reporte/3/6/PLANTA PENTHOUSE 1.PNG', 'assets/galeria/reporte/3/6/', 'assets/galeria/reporte/3/6/', 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_refacciones`
--

DROP TABLE IF EXISTS `solicitudes_refacciones`;
CREATE TABLE IF NOT EXISTS `solicitudes_refacciones` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `etiqueta` varchar(100) NOT NULL,
  `solicitud` varchar(25) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `ubicacion` varchar(25) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_solicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslado`
--

DROP TABLE IF EXISTS `traslado`;
CREATE TABLE IF NOT EXISTS `traslado` (
  `id_traslado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `comentarios` varchar(300) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `fecha_solicitud` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_finalizado` timestamp NULL DEFAULT NULL,
  `id_equipo` int(11) NOT NULL DEFAULT '0',
  `id_carro` int(11) DEFAULT NULL,
  `id_personal` int(11) DEFAULT '0',
  `id_folio` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_traslado`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `traslado`
--

INSERT INTO `traslado` (`id_traslado`, `estado`, `direccion`, `comentarios`, `ubicacion`, `destino`, `fecha_solicitud`, `fecha_finalizado`, `id_equipo`, `id_carro`, `id_personal`, `id_folio`, `tipo`) VALUES
(1, 'Pendiente', NULL, NULL, 'Recepcion Centro', 'Taller', '2019-10-26 05:54:49', NULL, 6, 1, 1, 2, NULL),
(2, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion Centro', '2019-10-26 06:26:15', NULL, 6, NULL, 0, 2, NULL),
(3, 'Pendiente', 'Lomas del sol', 'Herreria', 'Recepcion', 'Cliente', '2019-10-26 06:29:53', NULL, 6, NULL, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_tv`
--

DROP TABLE IF EXISTS `ventas_tv`;
CREATE TABLE IF NOT EXISTS `ventas_tv` (
  `idventa_tv` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `imagen1` varchar(300) DEFAULT NULL,
  `imagen2` varchar(300) DEFAULT NULL,
  `imagen3` varchar(300) DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_egreso` text,
  `estado` varchar(30) DEFAULT NULL,
  `id_personal` int(11) NOT NULL DEFAULT '0',
  `idvendedor` int(11) NOT NULL DEFAULT '0',
  `ubicacion` varchar(50) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `id_folio` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `abono` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idventa_tv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asistencia_personal1` FOREIGN KEY (`personal_id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carros`
--
ALTER TABLE `carros`
  ADD CONSTRAINT `carros_ibfk_1` FOREIGN KEY (`id_personal_traslado`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`rec_id_recepcion`) REFERENCES `recepciones` (`id_recepcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reparar_tv`
--
ALTER TABLE `reparar_tv`
  ADD CONSTRAINT `reparar_tv_ibfk_1` FOREIGN KEY (`id_folio`) REFERENCES `clientes` (`id_folio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reparar_tv_ibfk_2` FOREIGN KEY (`id_folio`) REFERENCES `clientes` (`id_folio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reparar_tv_ibfk_3` FOREIGN KEY (`rec_id_recepcion`) REFERENCES `recepciones` (`id_recepcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

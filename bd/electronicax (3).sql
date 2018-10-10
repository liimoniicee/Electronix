-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-10-2018 a las 09:00:38
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
-- Estructura de tabla para la tabla `almacen`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `cont_hoy` int(1) NOT NULL DEFAULT '0',
  `personal_id_personal` int(11) NOT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `fk_asistencia_personal1_idx` (`personal_id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `fecha`, `hora_entrada`, `hora_salida`, `cont_hoy`, `personal_id_personal`) VALUES
(1, '2018-09-28', '09:51:47', '13:39:15', 1, 1),
(2, '2018-09-28', '10:09:49', NULL, 0, 6),
(3, '2018-09-28', '10:16:15', '16:10:12', 1, 2),
(4, '2018-09-28', '13:07:59', NULL, 0, 3),
(5, '2018-10-01', '07:54:03', NULL, 0, 3),
(6, '2018-10-02', '14:43:29', NULL, 0, 3),
(7, '2018-10-02', '14:47:01', NULL, 0, 6),
(8, '2018-10-03', '09:39:39', NULL, 0, 3),
(9, '2018-10-03', '15:10:21', '15:19:05', 1, 6),
(10, '2018-10-04', '08:38:45', NULL, 0, 3),
(11, '2018-10-05', '09:43:34', NULL, 0, 3),
(12, '2018-10-05', '17:36:49', NULL, 0, 2),
(13, '2018-10-08', '09:07:46', NULL, 0, 3),
(14, '2018-10-09', '14:38:56', NULL, 0, 3),
(15, '2018-10-09', '15:19:22', NULL, 0, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE IF NOT EXISTS `avisos` (
  `id_aviso` int(11) NOT NULL AUTO_INCREMENT,
  `id_personal` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aviso` varchar(500) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_aviso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Volcado de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`id_aviso`, `id_personal`, `fecha`, `aviso`, `estado`, `Tipo`) VALUES
(1, NULL, '2018-07-03 20:37:43', 'Nose un pinche morrillo, me lo voy a coger!', 'Solucionado', NULL),
(2, NULL, '2018-07-03 20:53:04', 'Sergio Rodriguez 62411327161 pregunta por un control smart tv marca lg, en caso de no tenerlo, ofrecerle la comp\r\nra de uno.\r\n\r\n4 de julio no contestó.', 'Solucionado', NULL),
(3, NULL, '2018-07-04 18:34:37', 'Darle prioridad a su television, ya dejo anticipo de $1400', 'Solucionado', NULL),
(4, NULL, '2018-07-04 20:38:55', 'Mauricio Nava 6241562623 KDL-42W650A, Dejo la tele en venta.(Negociar de manera flexible) se le compro por $500.00', 'Solucionado', NULL),
(5, NULL, '2018-07-04 21:40:25', 'Le preste un cable de corriente a Hector, alias el Capi :v', 'Solucionado', NULL),
(6, NULL, '2018-07-04 23:13:32', 'Recoleccion para dia juevez 5 de Julio a partir de las 8 am.\r\nFranccionamiento Santa Fé Oro Calle S.Ramon #143 entre Aguajitos y Migriño, como referenci a es la segunda calle(dentro del fraccionamiento) Ana Rosa', 'Solucionado', NULL),
(7, NULL, '2018-07-05 15:00:03', 'Sony Blanco, Buscarlo, mañana pasara por el,(No sirve la pantalla)', 'Solucionado', NULL),
(8, NULL, '2018-07-05 22:19:06', 'Llamar el dia sabado 7 de julio.\n6243583586 Juan de Dios', 'Solucionado', NULL),
(9, NULL, '2018-07-07 21:40:25', 'Le interesa comprar una tele, para cuando haya una :)', 'Solucionado', NULL),
(10, NULL, '2018-07-07 22:26:02', 'Ir a su casa a reprogramar la orientacion de la television panasonic, lunes 9 de Julio', 'Solucionado', NULL),
(11, NULL, '2018-07-09 22:05:52', 'No me acuerdo del folio pero dijo que eran dos tablets y un celular me parece, 4407 (no recuerdo el ultimo numero) :v', 'Solucionado', NULL),
(12, NULL, '2018-07-10 17:26:09', 'Elaborar garatia por reparacion de equipo lg 42PC1DVH', 'Solucionado', NULL),
(13, NULL, '2018-07-11 18:52:12', 'Andres bautista 6241785685, que onda con su dinero me dice, que le dio a usted 3300 para reparar la pantalla rota de una samsung de 46 led', 'Pendiente', NULL),
(14, NULL, '2018-07-12 17:21:41', 'Luis Gomez entregar television para el 26 de Julio, 6241798176', 'Solucionado', NULL),
(15, NULL, '2018-07-12 20:36:52', 'Omar Camarena Tele sony de 70 falla de la main 6241097449', 'Solucionado', NULL),
(16, NULL, '2018-07-12 20:45:53', 'Deposito pendiente 800 ', 'Solucionado', NULL),
(17, NULL, '2018-07-14 18:30:48', 'Va recoger su equipo, pregunta si tenemos alguna tele para venta', 'Pendiente', NULL),
(18, NULL, '2018-07-14 19:09:56', 'Taller mecanico de jetas, hasta el fondo a una calle boulevar, a la tercera calle, taller de chatarra ella vive en la esquina', 'Solucionado', NULL),
(19, NULL, '2018-07-16 16:37:16', 'Maria Elena Calderon, 6241683485, le dio $450.00 control de Blue-ray samsung', 'Pendiente', NULL),
(20, NULL, '2018-07-18 18:42:43', 'Ignacio Suarez, quiere vendernos una tele lg de 42 con pantalla rota, 6241762014', 'Solucionado', NULL),
(21, NULL, '2018-07-20 19:01:30', 'Huberth Jose Camacho 6241860315, quiere vendernos una all in one, pantalla rota, podemosrepararla y usarla como escritorio,  la deja en  $300.00', 'Solucionado', NULL),
(22, NULL, '2018-07-21 16:24:00', 'Deposito por $800.00 para el día 25/julio, tarjeta banorte 4915 6683 5018 5195', 'Solucionado', NULL),
(23, NULL, '2018-07-25 20:28:13', '$178.00 abonó un control lg.', 'Solucionado', NULL),
(24, NULL, '2018-07-27 15:41:32', '6243587997 $2300.00 depositar Sr. Salomon 4766-8408-3543-7695 para Lunes 30 Jul.', 'Pendiente', NULL),
(25, NULL, '2018-08-11 17:50:36', 'Plazo maximo para pagarle antes del día 25 de agosto la cantidad de $1000.00 a travez de mercadolibre', 'Pendiente', NULL),
(26, NULL, '2018-08-11 22:20:20', 'Carlos el de la toshiba vendra el dìa lunes por una tele en el transcurso del dìa', 'Pendiente', NULL),
(27, NULL, '2018-08-21 17:46:35', 'giovanny hp pavilion negra dio anticipo solucionar maximo 4 de septiembre', 'Pendiente', NULL),
(28, NULL, '2018-08-30 22:02:51', 'Julio Cesar Rodriguez 6241590239  Mezclador LG estaba quemado vendrá  a recogerlo', 'Pendiente', NULL),
(29, NULL, '2018-09-03 19:01:54', 'Pantalla Hisense Edgar Chef resta $3000 de $3500 6241576726', 'Pendiente', NULL),
(30, NULL, '2018-09-07 17:43:49', 'Gerente LordBlack Angel 6241213253 esta pendiente  una pantalla.', 'Pendiente', NULL),
(31, 3, '0000-00-00 00:00:00', 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados'),
(32, 3, '0000-00-00 00:00:00', 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados'),
(33, 3, '0000-00-00 00:00:00', 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados'),
(34, 1, '0000-00-00 00:00:00', 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados'),
(35, 1, '0000-00-00 00:00:00', 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados'),
(36, 6, '0000-00-00 00:00:00', 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados'),
(37, 3, '2018-09-26 19:38:30', 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados'),
(38, 3, '2018-09-28 15:37:19', 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados'),
(39, 3, '2018-10-01 15:57:42', 'Equipo nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(40, 6, '2018-10-02 21:30:54', 'Equipo 5000128 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(41, 6, '2018-10-02 22:00:45', 'Equipo 5000129 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(42, 6, '2018-10-02 23:48:19', 'Equipo numero 5000028 reparado, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(43, 6, '2018-10-03 00:05:41', 'Equipo numero 5000028 reparado, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(44, 6, '2018-10-03 00:08:49', 'Equipo numero 5000074 reparado, traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(45, 3, '2018-10-03 19:13:03', 'Equipo numero 5000028 necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(46, 3, '2018-10-03 19:14:54', 'Equipo numero 5000028 necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(47, 3, '2018-10-03 19:32:12', 'Equipo numero 5000028 valorado para compra, marcar a cliente', 'Pendiente', 'Recepcion'),
(48, 3, '2018-10-03 19:50:13', 'Equipo numero 5000074 valorado para compra, marcar a cliente', 'Pendiente', 'Recepcion'),
(49, 3, '2018-10-03 19:54:18', 'Equipo numero 5000030 valorado para compra, marcar a cliente', 'Pendiente', 'Recepcion'),
(50, 6, '2018-10-03 21:20:27', 'Equipo numero 5000077 no encontrado, en ruta a almacen', 'Pendiente', 'Almacen'),
(51, 6, '2018-10-03 21:20:42', 'Equipo numero 5000077 no encontrado, en ruta a almacen', 'Pendiente', 'Almacen'),
(52, 6, '2018-10-03 22:12:50', 'Equipo numero 5000082 valorado para compra, marcar a cliente', 'Pendiente', 'Recepcion'),
(53, 3, '2018-10-04 17:50:18', 'Puto', 'Pendiente', 'Administrador'),
(54, 3, '2018-10-05 15:49:38', 'Equipo 5000129 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(55, 3, '2018-10-05 15:50:03', 'Equipo 5000129 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(56, 3, '2018-10-05 15:50:18', 'Equipo 5000129 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(57, 2, '2018-10-05 23:37:18', 'Equipo 5000106 revisado por tecnico', 'Pendiente', 'Taller'),
(58, 2, '2018-10-05 23:39:42', 'Equipo numero 5000017 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(59, 2, '2018-10-05 23:39:42', 'Equipo numero 5000017 necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(60, 2, '2018-10-05 23:44:20', 'Equipo numero 5000015 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(61, 2, '2018-10-05 23:44:20', 'Equipo numero 5000015 necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(62, 3, '2018-10-08 15:09:39', 'Equipo numero 5000005 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(63, 3, '2018-10-08 15:09:39', 'Equipo numero 5000005 necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(64, 3, '2018-10-08 15:11:31', 'Equipo numero 5000008 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(65, 3, '2018-10-08 19:28:00', 'Equipo numero 5000018 sin soluciÃ³n, en ruta a recepcion, solicitar cambio a cliente', 'Pendiente', 'Recepcion'),
(66, 3, '2018-10-08 19:28:00', 'Equipo numero 5000018 necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(67, 3, '2018-10-09 20:45:40', 'Equipo 5000130 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(68, 3, '2018-10-09 20:47:59', 'Equipo 5000131 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(69, 3, '2018-10-09 20:50:40', 'Equipo 5000132 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(70, 3, '2018-10-09 20:52:47', 'Equipo 5000133 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_folio` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `puntos` int(15) DEFAULT '0',
  PRIMARY KEY (`id_folio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4559 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_folio`, `nombre`, `apellidos`, `direccion`, `correo`, `celular`, `fecha`, `puntos`) VALUES
(4414, 'Jose Manuel', 'Barraza', '1', '', '6241470340', '2018-06-02 21:37:09', 0),
(4415, 'Adilene ', 'Parra', '', '', '6241349428', '2018-06-04 20:45:59', 0),
(4416, 'Daniel', 'Zatarain', '', '', '6241338064', '2018-06-05 16:44:54', 0),
(4417, 'Maria Isabel', '', '', '', '6241096033', '2018-06-07 17:52:05', 0),
(4418, 'Maria del Carmen', 'Na', 'Na', 'Na', '6241090102', '2018-06-11 15:04:39', 0),
(4419, 'Valentin', 'Zavala', 'Na', 'Na', '6241825722', '2018-06-11 15:05:45', 0),
(4420, 'Mario', 'Altuzar', 'Na', 'Na', '6241566501', '2018-06-11 15:06:19', 0),
(4421, 'Juan', 'Ortega', 'Na', 'Na', '2231063255', '2018-06-11 17:49:21', 0),
(4422, 'Rafael', 'Carreon', 'Na', 'Na', '2727844068', '2018-06-11 17:49:50', 0),
(4423, 'Angel', 'Cota', 'San Jose Fracc Monterreal', 'Angel.teeven@hotmail.com', '6241009131', '2018-06-11 20:40:01', 0),
(4424, 'Luis', 'Rosas', 'Lomas del sol', 'luisrosas.89@hotmail.com', '6242050580', '2018-06-12 15:18:38', 0),
(4425, 'Jose Alfredo', 'Sanchez', 'Fracc. aurora', 'Na', '6241504245', '2018-06-12 15:23:26', 0),
(4426, 'Marcelino', 'Vazquez Martinez', 'Na', 'Marcelino.vazquez.martinez@gmail.com', '6241582606', '2018-06-12 18:12:30', 0),
(4427, 'Lourdes ', 'Jaramillo', '', 'Lourdes.leyca@hotmail.com', '6221522991', '2018-06-12 21:27:33', 0),
(4428, 'Edgar', 'Gonzalez', '', '', '6242106497', '2018-06-13 01:27:14', 0),
(4429, 'Esteban', 'Garbino', 'Na', 'Graciela.sosa@gmail.com', '6241848538', '2018-06-13 18:11:42', 0),
(4430, 'Gloria', 'Hernandez', '4 de Marzo', 'Gloriahsierra@hotmail.com', '6241890554', '2018-06-16 20:19:26', 0),
(4431, 'David', 'Toral Hernandez', 'Na', 'Na', '6241002477', '2018-06-16 21:11:21', 0),
(4432, 'Jesus Emanuel', 'Saguilam', 'NA', 'NA', '6241751936', '2018-06-18 20:16:09', 0),
(4433, 'Cesar ', 'Zamudio Sanchez', 'Na', 'Na', '6241911715', '2018-06-19 15:58:34', 0),
(4434, 'Alfredo ', 'Reyes mendez', '', '', '6241611192', '2018-06-20 00:43:43', 0),
(4435, 'Carina', 'Rojas', 'Na', 'Na', '6241479941', '2018-06-20 16:52:45', 0),
(4436, 'Jose ', 'Mendoza diaz', '', '', '6241365461', '2018-06-21 00:54:41', 0),
(4437, 'Jose luis', 'Estrada gama', '', 'Joseegama@gmail.com', '6241089881', '2018-06-21 01:16:38', 0),
(4438, 'Victor', 'Ramos', 'Na', 'Na', '0', '2018-06-21 14:57:09', 0),
(4439, 'Carlos', 'Torres', 'Na', 'Na', '6242184911', '2018-06-21 17:13:12', 0),
(4440, 'Maria', 'Trinidad Alcaraz', 'Na', 'Na', '6241373490', '2018-06-21 18:23:30', 0),
(4441, 'Jose Martin', 'Cruz Vega', 'Na', 'Na', '6241596785', '2018-06-22 15:46:25', 0),
(4442, 'Eloina', 'Lara', 'Na', 'Na', '6241683172', '2018-06-22 17:38:41', 0),
(4443, 'Bladimir', 'Calderon Lozano', 'Na', 'Bladimirk1017@gmail.com', '6241226987', '2018-06-23 15:09:00', 0),
(4444, 'Dora Alicia', 'Aguas Rodriguez', 'NA', 'NA', '6241345566', '2018-06-23 17:28:43', 0),
(4445, 'Jorge', 'Perez', 'Popazu', 'Na', '5515777938', '2018-06-25 17:51:15', 0),
(4446, 'Carlos', 'Gaytan', 'Na', 'Na', '6241911182', '2018-06-25 19:43:59', 0),
(4447, 'Catalina', 'Castañeda Guiterrez', 'Na', 'Na', '6241286916', '2018-06-25 21:36:12', 0),
(4448, 'Daniel', 'Caudillo', 'Na', 'Na', '6241992688', '2018-06-25 22:04:41', 0),
(4449, 'DULCE MARIA', 'MANZANILLA CALDERON', '', 'Lose098@hotmail.com', '6241297276', '2018-06-26 00:33:52', 0),
(4450, 'usvaldo ', 'Vega felix', '', 'Usvaldovega@gmail.com', '6241587758', '2018-06-26 19:13:24', 0),
(4451, 'Brenda ', 'Gutierrez', 'Caribe', 'Na', '6241153735', '2018-06-26 22:08:36', 0),
(4452, 'Juan de Dios', 'Bautista García', 'Na', 'Na', '6243583586', '2018-06-26 22:22:57', 0),
(4453, 'Sara', 'García', 'Na', 'Na', '6241416757', '2018-06-27 06:00:00', 0),
(4454, 'Estela', 'Muñoz', 'Cariba', 'NA', '6242418931', '2018-06-27 06:00:00', 0),
(4455, 'Jose Armando', 'Esquivel', 'NA', 'NA', '6241610672', '2018-06-27 12:00:00', 0),
(4456, 'Angelica', 'Guzman', 'Na', 'Na', '6241366670', '2018-06-28 06:00:00', 0),
(4457, 'Domingo', 'Calleja', 'Na', 'Na', '6242271889', '2018-06-28 17:46:22', 0),
(4458, 'Francisco', 'Flores', 'Na', 'consorciomardecortez@gmail.com', '6241085561', '2018-06-28 17:49:28', 0),
(4459, 'Jose Beksai', 'Zuñiga Tellez', 'na', 'na', '6241369555', '2018-06-29 19:59:11', 0),
(4460, 'Javier', 'Picon', 'NA', 'NA', '6241277562', '2018-06-30 16:49:31', 0),
(4461, 'Enrique', 'Gomez', 'na', 'na', '6241226923', '2018-07-02 20:03:56', 0),
(4462, 'Humberto', 'Escoto', 'Na', 'humberto@loscabosagent.com', '6121477708', '2018-07-04 19:38:55', 0),
(4463, 'Ana Rosa', 'Guzman', 'Francci. Santa fé', 'Na', '6241009722', '2018-07-04 23:12:25', 0),
(4464, 'Marcos', 'Cid', 'Na', 'Na', '6241253647', '2018-07-06 15:50:33', 0),
(4465, 'Juan', 'Lozano', 'Puesta del sol calle girasol, rejas negras', 'Na', '6242285077', '2018-07-06 22:25:41', 0),
(4466, 'Filiberto ', 'Peralta', '', '', '6241848238', '2018-07-07 19:26:24', 0),
(4467, 'Juan Felipe', 'Ortiz', 'Na', 'Juans32@live.com', '6241268782', '2018-07-07 23:04:55', 0),
(4468, 'Adriana', 'Leal Castro', 'Na', 'Na', '6242126332', '2018-07-09 15:27:22', 0),
(4469, 'Magda', 'Aguiluz', 'Na', 'Na', '6241286550', '2018-07-09 22:03:42', 0),
(4470, 'Ivan', 'García Andrade', 'Na', 'Na', '6241277149', '2018-07-10 17:19:47', 0),
(4471, 'Lorenzo Antonio', 'Hernandez Solis', 'Na', 'Na', '6242254805', '2018-07-11 14:52:32', 0),
(4472, 'Janet', 'Sanchez', 'Na', 'Na', '6241598376', '2018-07-11 18:16:26', 0),
(4473, 'Maria Luisa', 'Melendez', 'Na', 'Na', '6241086315', '2018-07-11 18:23:09', 0),
(4474, 'Jose Pedro', 'Paladez', 'Na', 'Na', '6241797046', '2018-07-12 14:39:02', 0),
(4475, 'Guillermo', 'Maldonado', 'Na', 'Na', '6241646333', '2018-07-12 18:54:28', 0),
(4476, 'Cervando', 'Nuñez Ceseña', 'Na', 'chavezmarina723@gmail.com', '6692506782', '2018-07-12 20:18:07', 0),
(4477, 'Marcos', 'Vinalay', 'Na', 'Na', '6241698650', '2018-07-13 19:24:37', 0),
(4478, 'Lázaro', 'Diaz Gomez', 'Na', 'Na', '9212363707', '2018-07-13 20:47:50', 0),
(4479, 'Moises', 'Muguia', 'Na', 'Na', '6241822985', '2018-07-14 18:41:52', 0),
(4480, 'Ruben', 'Sanchez', 'Na', 'Admon@mktideas.com', '6241223613', '2018-07-16 17:03:40', 0),
(4481, 'Irma', 'Gonzales', 'Na', 'Na', '6241515167', '2018-07-17 18:47:16', 0),
(4482, 'Efren', 'Ronco', 'Na', 'Na', '6241332616', '2018-07-17 18:55:39', 0),
(4483, 'Abel', 'Cervantes', 'Na', 'Gonormex62@gmail.com', '6461217550', '2018-07-18 18:11:27', 0),
(4484, 'Maria de Lourdes', 'Gonzales Gonzales', 'Na', 'Na', '6241601382', '2018-07-18 19:48:42', 0),
(4485, 'Joaquin ', 'Embarcadero Juarez', 'na', 'ej14joaquin@gmail.com', '7441355911', '2018-07-20 18:07:38', 0),
(4486, 'Embarcación', 'Arise', 'Marina', 'Na', '0', '2018-07-20 19:47:27', 0),
(4487, 'Carlos Alberto ', 'Velazquez', 'Na', 'Mexlay2@hotmail.com', '6241665475', '2018-07-24 17:57:41', 0),
(4488, 'Luis', 'Gomez', 'Na', 'Na', '6242464119', '2018-07-24 19:17:24', 0),
(4489, 'Pablo', 'Velez', 'Na', 'Na', '6241916540', '2018-07-24 21:15:59', 0),
(4490, 'Raquel', 'Romero', 'Na', 'Na', '6241286437', '2018-07-24 21:34:28', 0),
(4491, 'Fernando', 'Perez', 'Na', 'FERNANDOPEREZ.FA73@GMAIL.COM', '6241562593', '2018-07-25 16:58:33', 0),
(4492, 'Carlos', 'García', 'Na', 'Carlosgarciacga1964@hotmail.com', '6241566264', '2018-07-25 17:28:06', 0),
(4493, 'Juan Carlos', 'Cuella', 'Na', 'Juancarloscuella1@hotmail.com', '6241198194', '2018-07-25 20:27:19', 0),
(4494, 'Marichuy', 'Castro Ramirez', 'Na', 'Na', '7541076881', '2018-07-26 21:09:17', 0),
(4495, 'Maria del rosario ', 'Lopez montero', 'Na', 'Na', '6241776740', '2018-07-27 14:45:48', 0),
(4496, 'Samuel', 'Dimas', 'Na', 'Na', '7321212543', '2018-07-27 14:57:46', 0),
(4497, 'Mary Carmen', 'Ramos', 'Na', 'Na', '6241090102', '2018-07-27 22:15:06', 0),
(4498, 'Joel ', 'Corvera', '', 'Joelcorvera21@outlook.es', '6241603639', '2018-07-28 18:02:32', 0),
(4499, 'Citlali', 'Sandoval Hernandez', 'Na', 'Na', '6241802900', '2018-07-31 00:11:32', 0),
(4500, 'Adilia', 'Siqueiros', 'Na', 'adiliasm@gmail.com', '6563223432', '2018-07-31 17:10:51', 0),
(4501, 'Jessica', 'Jimenez Fuentes', 'Na', 'Jezzy_adiita@hotmail.com', '6241000829', '2018-07-31 21:30:20', 0),
(4502, 'Yesenia', 'Vinalay', 'Na', 'Na', '6241364097', '2018-08-02 19:02:40', 0),
(4503, 'Oriaan', 'Lopez Ruiz', 'Na', 'Oriaanlr26@hotmail.com', '6241001738', '2018-08-04 15:33:41', 0),
(4504, 'Juan Carlos', 'Hernandez Alavez', 'Na', 'Na', '6241680913', '2018-08-06 17:55:07', 0),
(4505, 'Pedro', 'Solis', 'Na', 'Pedrosoliscr52@gmail.com', '3314644307', '2018-08-06 18:47:37', 0),
(4506, 'Wendy', 'Ceseña', 'Na', 'Patito_wendy@hotmail.com', '6241571101', '2018-08-06 20:38:03', 0),
(4507, 'Rogelio', 'Mendez', 'Na', 'Vulcaniamxr@gmail.com', '6241452311', '2018-08-09 22:11:49', 0),
(4508, 'Jesus ', 'Gutierrez', 'Na', 'Jesusagp@hotmail.com', '6241659374', '2018-08-11 17:43:24', 0),
(4509, 'Diego', 'Gonzales', 'Na', 'Dgoglez7@gmail.com', '6241910280', '2018-08-16 18:15:33', 0),
(4510, 'Agustin', 'Rodriguez', 'Na', 'Agustinrodriguezgallardo001@hotmail.com', '6241911155', '2018-08-18 17:26:28', 0),
(4511, 'Eduardo', 'Diaz', 'Na', 'Na', '6241261627', '2018-08-18 18:23:50', 0),
(4512, 'Sergio', 'Ortiz', 'Na', 'Na', '6241002111', '2018-08-20 15:52:59', 0),
(4513, 'Dues Textil', 'SA de CV', 'Na', 'Marisela.perez@dues.com.mx', '0', '2018-08-20 17:27:07', 0),
(4514, 'Carla janet', 'Guitierrez', 'Na', 'Na', '6241764609', '2018-08-20 17:54:35', 0),
(4515, 'Sandy Arely', 'Castro Hidalgo', 'Na', 'Na', '6241756220', '2018-08-20 19:16:43', 0),
(4516, 'Arturo', 'Galicia', 'Na', 'Lenny37@gmail.com', '6241663704', '2018-08-21 18:02:13', 0),
(4517, 'Irene', 'Ortiz', 'Na', 'Na', '6241611798', '2018-08-22 19:07:37', 0),
(4518, 'Laura', 'Flores', 'Na', 'Na', '6242382469', '2018-08-22 20:55:51', 0),
(4519, 'Juan ', 'Ocampo', 'Na', 'J.m.ocampo@hotmail.com', '6241601669', '2018-08-23 00:42:14', 0),
(4520, 'Sara', 'Magallanes', 'Na', 'Saraalimj@hotmail.com', '6241576038', '2018-08-25 00:35:16', 0),
(4521, 'ANTONIA', 'NAVA', 'NA', 'NA', '6241910049', '2018-08-25 21:44:07', 0),
(4522, 'Ricardo', 'Nuñez', 'Es rata :v', 'Na', '6242262717', '2018-08-27 17:13:46', 0),
(4523, 'Camilo', 'Cisneros', 'Na', 'Na', '6241290172', '2018-08-27 19:18:42', 0),
(4524, 'Jose Alberto', 'Diaz ', 'Na', 'Beto_y_7@hotmail.com', '6241179383', '2018-08-27 20:04:11', 0),
(4525, 'Carlos', 'Martinez', 'Na', 'doningeniero@gmail.com', '6241658274', '2018-08-29 16:12:35', 0),
(4526, 'Eliseo', 'Ramos', 'Na', 'Na', '6241863735', '2018-08-29 19:38:29', 0),
(4527, 'Bladimir', 'Liborio Reyes', 'Na', 'Na', '6241805046', '2018-08-30 15:34:24', 0),
(4528, 'Juan', 'Gonzales', 'Na', 'Na', '6242382018', '2018-08-30 23:28:31', 0),
(4529, 'Francisco', 'Sanchez', 'Chula Vista', 'Na', '6242271065', '2018-08-31 22:32:27', 0),
(4530, 'Lizbeth', 'Rosas', 'Na', 'Na', '6241607488', '2018-09-01 20:53:23', 0),
(4531, 'Miguel', 'Morales ordaz', '', 'Moaljewelers@hotmail.com', '6241222076', '2018-09-04 16:39:45', 0),
(4532, 'Angel rodriguez', 'Paz', 'Na', 'danipaz0807@gmail.com', '6241261881', '2018-09-05 00:21:46', 0),
(4533, 'Florencio Apolinar', 'Barrios', 'Na', 'Na', '6241179335', '2018-09-05 16:21:28', 0),
(4534, 'Mario Rafael', 'Blando', 'Na', 'Rcblando@gmail.com', '7442293462', '2018-09-05 17:47:58', 0),
(4535, 'Victor Manuel', 'Acosta Arreola', 'Na', 'Arqvmaa@gmail.com', '6681467409', '2018-09-06 01:43:23', 0),
(4536, 'Hector', 'Quintero', 'Na', 'Na', '6241574317', '2018-09-06 22:03:08', 0),
(4537, 'Paulina', 'Olivares', 'Na', 'luisin007@hotmail.com', '6241323295', '2018-09-07 19:15:45', 0),
(4538, 'Raul', 'Vargas', 'Na', 'marketing.playagrande@hotmail.com', '6241095079', '2018-09-10 19:27:34', 0),
(4539, 'Jesus', 'Palafox', 'Na', 'Na', '6242259818', '2018-09-10 22:22:25', 0),
(4540, 'Cabo ', 'Fitness', 'NA', 'nohemi_rosa@hotmail.com', '6241579716', '2018-09-11 14:37:08', 0),
(4541, 'Joel', 'Villegas', 'Na', 'Na@na.com', '6241298555', '2018-09-11 19:25:47', 0),
(4542, 'Carlos ', 'Hernandez', 'na', 'na@na.com', '6311883092', '2018-09-11 20:39:56', 0),
(4543, 'Estefani', 'Lopez Rivas', 'Na', 'fanny_lopezrivas@yahoo.com', '6241924845', '2018-09-11 22:00:46', 0),
(4544, 'Oscar ', 'Perez', 'Na', 'Na@na.com', '6241345342', '2018-09-13 18:58:59', 0),
(4545, 'Jorge', 'Torres', 'Na', 'Na@na.com', '6242260793', '2018-09-13 22:06:28', 0),
(4546, 'Humberto', 'Jimenez', 'Na', '', '6241259211', '2018-09-14 18:05:26', 0),
(4547, 'Ricardo', 'Gonzales', 'Na', 'Na', '6241007104', '2018-09-15 15:45:24', 0),
(4548, 'Lorena', 'Gonzales', 'NA', '', '6241767513', '2018-09-20 18:18:52', 0),
(4549, 'Michael', 'Higuera Amador', 'Na', 'Na', '6242100500', '2018-09-22 20:18:25', 0),
(4550, 'Esteban', 'Hinojosa', 'Na', 'Na', '6241511621', '2018-09-24 19:55:35', 0),
(4551, 'Juan Carlos  ', 'Bernabe Siordia', 'Quintas california calle quinta sereno M-13 L-11', 'drjuancbs@gmail.com', '5525591182', '2018-09-25 03:41:52', 0),
(4552, 'Alvaro', 'GarcÃ­a', 'NA', 'na', '6241131779', '2018-09-25 17:18:16', 0),
(4553, 'Manuel', 'Moyado Cayetano', 'Lomas del sol 2nda etapa mza 50 lt 10', 'forever_lopez15@hotmail.com', '6242119048', '2018-09-26 15:13:28', 0),
(4554, 'Papa Eloy', 'SA de CV', 'Blvd Marina #39 local K Col. Medano CP:23453 ', 'tomgonhd@yahoo.com', '5551024500', '2018-09-26 15:33:38', 0),
(4555, 'Gustavo', 'DÃ­az', 'Baez', 'gdiazbaez@me.com', '4433373163', '2018-09-26 19:36:09', 0),
(4556, 'Eduardo', 'Villegas', 'na', 'na', '6241580616', '2018-09-28 15:35:54', 0),
(4557, 'Adan', 'Oregon', 'Na', 'Chitto0222@hotmail.com', '6241551700', '2018-10-01 15:53:12', 0),
(4558, 'Sahara ', 'Ruiz Martinez', 'na', 'sahararuizcabo@gmail.com', '6241367954', '2018-10-03 00:21:17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

CREATE TABLE IF NOT EXISTS `cobranza` (
  `id_cobranza` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cantidad` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_folio` int(11) NOT NULL,
  PRIMARY KEY (`id_cobranza`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `cobranza`
--

INSERT INTO `cobranza` (`id_cobranza`, `tipo`, `estado`, `fecha`, `cantidad`, `id_equipo`, `id_folio`) VALUES
(1, 'Pago', 'Pendiente', '2018-07-18 20:25:37', 1800, 5000065, 4484),
(2, 'Pago', 'Pendiente', '2018-07-18 20:41:05', 500, 5000004, 4422),
(3, 'Pago', 'Pendiente', '2018-07-18 20:41:48', 3200, 5000006, 4424),
(4, 'Pago', 'Pendiente', '2018-07-19 15:59:30', 1500, 5000007, 4425),
(5, 'Pago', 'Pendiente', '2018-07-19 16:11:34', 1800, 5000012, 4430),
(6, 'Pago', 'Depositado', '2018-07-19 16:13:36', 2400, 5000024, 4444),
(7, 'Pago', 'Pendiente', '2018-07-19 16:15:58', 2400, 5000029, 4449),
(8, 'Pago', 'Pendiente', '2018-07-19 20:08:03', 1800, 5000060, 4479),
(9, 'Abono', 'Depositado', '2018-07-19 20:15:21', 3500, 5000037, 4424),
(10, 'Pago', 'Pendiente', '2018-07-19 21:23:10', 1800, 5000065, 4484),
(11, 'Pago', 'Depositado', '2018-07-19 21:31:45', 800, 5000061, 4458),
(12, 'Pago', 'Pendiente', '2018-07-20 16:19:01', 1500, 5000051, 4470),
(13, 'Pago', 'Pendiente', '2018-07-20 16:29:05', 2800, 5000056, 4475),
(14, 'Pago', 'Pendiente', '2018-07-20 16:39:35', 300, 5000050, 4469),
(15, 'Pago', 'Pendiente', '2018-07-20 16:40:58', 300, 5000046, 4466),
(16, 'Pago', 'Pendiente', '2018-07-20 17:15:57', 1600, 5000036, 4458),
(17, 'Pago', 'Pendiente', '2018-07-20 17:17:06', 600, 5000033, 4456),
(18, 'Pago', 'Pendiente', '2018-07-20 17:32:08', 1000, 5000003, 4420),
(19, 'Pago', 'Pendiente', '2018-07-20 17:35:08', 1800, 5000002, 4417),
(20, 'Abono', 'Pendiente', '2018-07-20 20:01:39', 3800, 2, 4486),
(21, 'Pago', 'Depositado', '2018-07-25 18:05:24', 700, 5000069, 4485),
(22, 'Abono', 'Pendiente', '2018-07-26 19:41:15', 950, 5000063, 4481),
(23, 'Pago', 'Pendiente', '2018-07-31 21:44:27', 4000, 5000075, 4498),
(24, 'Pago', 'Pendiente', '2018-08-01 18:28:29', 1200, 5000078, 4501),
(25, 'Pago', 'Pendiente', '2018-08-01 20:43:01', 1000, 5000070, 4491),
(26, 'Pago', 'Pendiente', '2018-08-06 18:45:54', 450, 5000082, 4502),
(27, 'Abono', 'Pendiente', '2018-08-14 19:47:36', 3500, 5000057, 4476),
(28, 'Abono', 'Pendiente', '2018-08-16 18:26:47', 2800, 5000081, 4504),
(29, 'Pago', 'Pendiente', '2018-08-17 15:48:13', 1600, 5000086, 4509),
(30, 'Abono', 'Pendiente', '2018-08-22 19:53:59', 1800, 5000089, 4512),
(31, 'Abono', 'Pendiente', '2018-09-01 15:15:51', 2600, 5000096, 4512),
(32, 'Pago', 'Pendiente', '2018-09-01 20:28:08', 1300, 5000099, 4529),
(33, 'Abono', 'Pendiente', '2018-09-05 17:23:50', 1600, 5000105, 4533),
(34, 'Abono', 'Pendiente', '2018-09-05 17:49:20', 1400, 5000106, 4534),
(35, 'Pago', 'Pendiente', '2018-09-05 23:57:41', 850, 5000017, 4436),
(36, 'Abono', 'Pendiente', '2018-09-06 15:10:54', 2800, 5000107, 4535),
(37, 'Pago', 'Pendiente', '2018-09-08 20:14:01', 1150, 5000066, 4485);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE IF NOT EXISTS `depositos` (
  `id_deposito` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autorizacion` varchar(50) NOT NULL,
  `cuenta` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `id_personal` int(11) NOT NULL DEFAULT '0',
  `id_equipo` int(11) NOT NULL,
  `id_folio` int(11) NOT NULL,
  PRIMARY KEY (`id_deposito`),
  KEY `id_personal` (`id_personal`),
  KEY `id_equipo` (`id_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `depositos`
--

INSERT INTO `depositos` (`id_deposito`, `fecha`, `autorizacion`, `cuenta`, `cantidad`, `imagen`, `serie`, `id_personal`, `id_equipo`, `id_folio`) VALUES
(1, '2018-07-19 21:37:27', 'xxxx', 'xxxx', 800, '\\Base de datos\\Equipos Reparados\\Depositos\\4458\\5\\5000061\\pagado-300x290.png', '', 5, 5000061, 4458),
(2, '2018-07-21 14:45:12', 'xxxx', 'xxxx', 2400, '\\Base de datos\\Equipos Reparados\\Depositos\\4444\\3\\5000024\\pagado-300x290.png', '', 3, 5000024, 4444),
(3, '2018-07-25 18:25:33', 'xxx', 'xxx', 700, '\\Base de datos\\Equipos Reparados\\Depositos\\4485\\3\\5000069\\pagado-300x290.png', '', 3, 5000069, 4485);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

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
  PRIMARY KEY (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `tipo`, `usuario`, `contrasena`, `nombre`, `apellidos`, `correo`, `celular`, `sueldo`) VALUES
(1, 'Administrador', 'Juan', 'c4ca4238a0b923820dcc509a6f75849b', 'Jorge ', 'Diaz', 'A', '0', 2000),
(2, 'Tecnico', 'Tecnico', 'c4ca4238a0b923820dcc509a6f75849b', 'x', 'x', 'x', '0', 1200),
(3, 'Administrador', 'Isra', 'c4ca4238a0b923820dcc509a6f75849b', 'israel', 'martinez', 'promartinez2@gmail.com', '6241543710', 2500),
(4, 'Jefe de Taller', 'Taller', 'c4ca4238a0b923820dcc509a6f75849b', 'X', 'X', 'X', '0', 1900),
(5, 'Recepcion', 'recepcion', 'c4ca4238a0b923820dcc509a6f75849b', 'Recepcion', 'RSH', 'Na', '0', 950),
(6, 'Traslado', 'traslado', 'c4ca4238a0b923820dcc509a6f75849b', 'Pedrito', 'Sola', 'Na', '0', 1000);

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
  `id_personal` int(10) DEFAULT '0',
  PRIMARY KEY (`Id_refacciones`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `refacciones_tv`
--

INSERT INTO `refacciones_tv` (`Id_refacciones`, `tipo`, `marca`, `modelo`, `ubicacion`, `estado`, `precio`, `fecha_entrada`, `fecha_salida`, `etiqueta_1`, `etiqueta_2`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `id_personal`) VALUES
(17, 'CULO', 'SAMSUNG', 'UN44G0O9SX', 'Almacen', 'Pendiente', 1000, '2018-10-10 03:34:17', NULL, 'ASASD', '1SDA', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX19990357_2256283621274732_5303220241715569349_n.jpg', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX14731376_2060823274154102_6423179866587404628_n.jpg', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX33302972_206666580144254_6913521569750843392_n.jpg', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX14702229_2060784487491314_3582770702396650193_n.jpg', 'assets/galeria/almacen/SAMSUNG/UN44G0O9SX14731264_2060819500821146_1320703655626538787_n.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparar_tv`
--

CREATE TABLE IF NOT EXISTS `reparar_tv` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `equipo` varchar(50) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `accesorios` varchar(50) NOT NULL,
  `falla` varchar(100) NOT NULL,
  `comentarios` varchar(150) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_entregar` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_egreso` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `servicio` varchar(50) NOT NULL,
  `presupuesto` int(11) DEFAULT NULL,
  `mano_obra` int(11) DEFAULT NULL,
  `abono` int(11) DEFAULT NULL,
  `restante` int(11) DEFAULT NULL,
  `costo_total` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `puntos` int(15) NOT NULL DEFAULT '0',
  `id_folio` int(10) DEFAULT NULL,
  `id_personal` int(10) DEFAULT '0',
  PRIMARY KEY (`id_equipo`),
  KEY `Id_folio` (`id_folio`),
  KEY `id_personal` (`id_personal`),
  KEY `id_personal_2` (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5000134 ;

--
-- Volcado de datos para la tabla `reparar_tv`
--

INSERT INTO `reparar_tv` (`id_equipo`, `equipo`, `marca`, `modelo`, `serie`, `accesorios`, `falla`, `comentarios`, `fecha_ingreso`, `fecha_entregar`, `fecha_egreso`, `servicio`, `presupuesto`, `mano_obra`, `abono`, `restante`, `costo_total`, `valor`, `estado`, `ubicacion`, `puntos`, `id_folio`, `id_personal`) VALUES
(5000000, 'Television', 'Sharp', 'LC-70LE550EU', '', 'Ninguno', 'Se va la imagen', '', '2018-06-03 04:47:05', '2018-06-09 12:00:00', '2018-10-05 03:09:23', 'Reparacion', 0, 0, 0, 0, 4300, 500, 'A cambio', 'Recepcion', 0, 4414, 2),
(5000001, 'Television', 'Otros', 'atv2416led', '', 'Ninguno', 'No se mira', '', '2018-06-05 02:47:29', '2018-06-04 12:00:00', '2018-07-20 22:14:49', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4415, 2),
(5000002, 'Television', 'samsung', 'ln32c350d1d', '', 'Ninguno', 'No enciende', '', '2018-06-07 23:53:03', '2018-07-20 23:35:08', '2018-06-08 12:00:00', 'Reparacion', 0, 1800, 1000, 0, 1800, 0, 'Entregado', 'Cliente', 0, 4417, 2),
(5000003, 'Television', 'AOC', 'L32W961', '', 'Ninguno', 'No enciende', 'Se guardó un tiempo y cuando la quisieron volver a usar, ya no encendio', '2018-06-11 21:20:40', '2018-07-20 23:32:08', '2018-07-08 02:47:33', 'Reparacion', 0, 1000, 0, 0, 1000, 0, 'Entregado', 'Cliente', 0, 4420, 2),
(5000004, 'Television', 'Otros', 'HKP32F16', '', 'Ninguno', 'Tiene codigo', 'Marca HKPro', '2018-06-11 23:50:36', '2018-07-19 02:41:05', '2018-06-19 07:32:29', 'Reparacion', 0, 500, 0, 0, 500, 0, 'Entregado', 'Cliente', 0, 4422, 2),
(5000005, 'Television', 'LG', '49LF5900', '', 'Ninguno', 'Pantalla rota', 'Se le prestó una tele con valor de $5500.00 dejó 3000 ya depositados 29/08/18', '2018-06-12 02:40:50', '2018-06-11 12:00:00', '2018-06-11 12:00:00', 'Reparacion', 1000, 1000, 2500, 2000, -500, 0, 'Reparada', 'Taller en ruta a Recepcion', 0, 4423, 2),
(5000006, 'Television', 'LG', '47LN5700', '', 'Ninguno', 'No enciende la pantalla y no funciona el internet', 'No agarra wifi ni el cable, probable falla de leds', '2018-06-12 21:19:37', '2018-07-19 02:41:48', '2018-06-19 07:32:47', 'Reparacion', 0, 3200, 3200, 0, 3200, 0, 'Entregado', 'Cliente', 0, 4424, 2),
(5000007, 'Television', 'LG', '50LN5710', '', 'Ninguno', 'Falla de los leds', '', '2018-06-12 21:25:18', '2018-07-19 21:59:30', '2018-06-13 03:22:13', 'Reparacion', 0, 1500, 1500, 0, 1500, 0, 'Entregado', 'Cliente', 0, 4425, 2),
(5000008, 'Television', 'AOC', 'L32W961', '', 'Ninguno', 'Pantalla estrellada', '', '2018-06-12 21:44:31', '2018-06-12 12:00:00', '2018-06-12 12:00:00', 'Reparacion', 1500, 750, 0, 2250, 2250, 0, 'Reparada', 'Taller en ruta a Recepcion', 0, 4418, 2),
(5000009, 'Television', 'Samsung', 'HG32NA478', '', 'Ninguno', 'No enciende', '', '2018-06-13 00:13:22', '2018-06-12 12:00:00', '2018-06-12 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4426, 2),
(5000010, 'Television', 'Otros', 'aiwa 19', '', 'Ninguno', 'no prende', 'al principio no se veia bien despues ya no prendio.\r\nLa señora estuvo de acuerdo en desechar la television.', '2018-06-13 03:29:08', '2018-06-12 12:00:00', '2018-07-11 20:44:58', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4427, 2),
(5000011, 'Television', 'Samsung', '', '', 'Otros (Especificar en comentarios)', 'pantalla rota', 'deja fuente de poder ', '2018-06-13 07:28:13', '2018-06-12 12:00:00', '2018-06-12 12:00:00', 'Compra', 0, 0, 0, 0, 0, 0, 'Diagnosticada', 'Taller', 0, 4428, 2),
(5000012, 'Television', 'LG', '47LN5310', '', 'Ninguno', 'LEDS', '', '2018-06-17 02:21:04', '2018-07-19 22:11:34', '2018-06-17 02:22:42', 'Domicilio', 0, 1800, 1800, 0, 1800, 500, 'Valorada', 'Recepcion', 0, 4430, 2),
(5000013, 'Television', 'LG', 'RM-20LZ50', '', 'Cable de corriente', 'No enciende', '', '2018-06-17 03:13:35', '2018-06-16 12:00:00', '2018-06-16 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 500, 'Pendiente', 'Taller', 0, 4431, 2),
(5000014, 'Television', 'Samsung', 'UN50FH5303F', '', 'Base', 'Esta oscuro', '', '2018-06-19 21:59:25', '2018-06-19 12:00:00', '2018-09-17 22:03:47', 'Reparacion', 0, 2800, 0, 0, 2800, 0, 'Entregado', 'Cliente', 0, 4433, 2),
(5000015, 'Television', 'Philips', '32pfl4909', '', 'Ninguno', 'sin falla', 'se le vendio por aprox 1900', '2018-06-20 06:47:04', '2018-06-19 12:00:00', '2018-06-19 12:00:00', 'Reparacion', 0, 1000, 0, 1000, 1000, 0, 'Reparada', 'Taller en ruta a Recepcion', 0, 4434, 2),
(5000016, 'Television', 'LG', '32LD350', '', 'Ninguno', 'Se apaga rapidamente', '', '2018-06-20 22:53:33', '2018-06-20 12:00:00', '2018-07-21 00:37:07', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Valorada', 'Valorada', 0, 4435, 2),
(5000017, 'Television', 'Vizio', '42hdtv10a', '', 'Ninguno', 'no prende', 'se le dio precio de 2500 solicitandole 1800 para refaccion quedaq de resolver.', '2018-06-21 06:56:42', '2018-09-05 22:38:10', '2018-09-06 05:57:42', 'Reparacion', 1000, 1000, 1800, 2000, 200, 0, 'Reparada', 'Taller en ruta a Recepcion', 0, 4436, 2),
(5000018, 'Television', 'LG', '32lc5dcs', '', 'Ninguno', 'tarda para encender', 'comenta que cuando se enciende se pone azul la pantalla', '2018-06-21 07:18:06', '2018-06-20 12:00:00', '2018-06-20 12:00:00', 'Reparacion', 0, 2000, 1000, 2000, 1000, 700, 'Sin solucion', 'Recepcion', 0, 4437, 2),
(5000019, 'Television', 'LG', '42LC4D', '', 'Base', 'Tarjeta bloqueada', 'Se cambian solo los canales', '2018-06-21 20:57:53', '2018-08-06 23:51:28', '2018-06-21 12:00:00', 'Garantia', 0, 0, 0, 0, 2000, 0, 'Entregado', 'Cliente', 0, 4438, 2),
(5000020, 'Television', 'Hisense', '40H5B2', '', 'Cable de corriente', 'Revision', '', '2018-06-22 00:24:37', '2018-06-21 12:00:00', '2018-06-21 12:00:00', 'Reparacion', 1800, 0, 0, 0, 1800, 0, 'Pendiente', 'Taller', 0, 4440, 2),
(5000021, 'Television', 'LG', '42LS5650', '', 'Cable de corriente', 'No da imagen', 'Antigo folio del señor 4402', '2018-06-22 21:47:16', '2018-06-22 12:00:00', '2018-09-17 22:02:14', 'Reparacion', 2500, 1000, 2500, 0, 3500, 0, 'Entregado', 'Cliente', 0, 4441, 2),
(5000022, 'Television', 'DWDISPLAY', 'DW-24SP', '', 'Ninguno', 'Falla en el volumen', 'DWDISPLAY', '2018-06-22 23:39:25', '2018-06-22 12:00:00', '2018-06-22 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Diagnosticada', 'Taller', 0, 4442, 2),
(5000023, 'Television', 'Atvio', 'ATV4013LED', '', 'Ninguno', 'Enciende pero no da imagen', '', '2018-06-23 21:10:03', '2018-06-23 12:00:00', '2018-06-23 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 700, 'Sin solucion', 'Recepcion', 0, 4443, 2),
(5000024, 'Television', 'LG', '50PW350', '', 'Base', 'No enciende', 'Comenzo a fallar y no daba video pero audio sí, hasta que tronó algo y ahora no enciende', '2018-06-23 23:29:50', '2018-07-19 22:13:36', '2018-07-01 04:08:54', 'Garantia', 0, 0, 0, 0, 2400, 0, 'Depositado', 'Recepcion', 0, 4444, 0),
(5000025, 'Television', 'Sony Bravia', 'KDL-40W700C', '', 'Cable de corriente', 'Pantalla rota', 'Eliminador', '2018-06-25 23:52:49', '2018-07-20 23:20:50', '2018-06-25 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Entregado', 'Cliente', 0, 4445, 0),
(5000026, 'Television', 'LG', '42LN549E', '', 'Ninguno', 'Funciona y se apaga y enciende sola de un rato', '', '2018-06-26 01:44:58', '2018-06-25 12:00:00', '2018-06-25 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4446, 2),
(5000027, 'Television', 'LG', '60LS579C-UA', '', 'Cable de corriente y Base', 'Enciende y todo pero no se ve, sin golpes', '', '2018-06-26 01:50:37', '2018-06-25 12:00:00', '2018-06-25 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4446, 2),
(5000028, 'Television', 'Sony Bravia', 'KDL-32W600D', '', 'Cable de corriente', 'Pantalla rota', 'eliminador de corriente', '2018-06-26 03:48:52', '2018-06-25 12:00:00', '2018-10-04 03:02:17', 'Compra', 1800, 600, 1800, 600, 2400, 1000, 'Comprada', 'Recepcion', 0, 4447, 2),
(5000029, 'Television', 'Philips', '40pfl4904/f8', '', 'Ninguno', 'ruido y no prende', '', '2018-06-26 06:34:46', '2018-07-19 22:15:58', '2018-06-30 21:33:19', 'Reparacion', 1800, 600, 2400, 0, 2400, 0, 'Entregado', 'Cliente', 0, 4449, 2),
(5000030, 'Television', 'LG', '42px11', '', 'Ninguno', 'no se mira', '', '2018-06-27 01:14:05', '2018-07-20 23:19:41', '2018-10-04 03:09:17', 'Compra', 0, 1800, 1800, 0, 1800, 1000, 'Comprada', 'Taller esperando traslado', 0, 4450, 6),
(5000031, 'Television', 'Atvio', 'LE32CL-44', '', 'Ninguno', 'Pantalla rota', 'MARCA ATVIO, patas', '2018-06-27 04:23:54', '2018-07-24 01:36:56', '2018-06-26 12:00:00', 'Compra', 1400, 400, 0, 1800, 1800, 0, 'Diagnosticada', 'Recepcion', 0, 4452, 2),
(5000032, 'Television', 'Sharp', 'LC-60C6500', '', 'Control de TV', 'No da imagen', 'control y cable de corriente,antiguo folio es 4382', '2002-01-01 13:24:53', '2018-06-27 12:00:00', '2018-06-27 12:00:00', 'Compra', 0, 0, 0, 0, 0, 0, 'Diagnosticada', 'Recepcion', 0, 4453, 2),
(5000033, 'Television', 'Vios', '32DLEDTV1301S', '', 'Base', 'Falla en conector de antena', 'BASE DE PARED', '2018-06-28 21:30:26', '2018-07-20 23:17:06', '2018-07-01 02:55:40', 'Compra', 300, 300, 0, 0, 600, 0, 'Diagnosticada', 'Recepcion', 0, 4456, 2),
(5000034, 'Television', 'Atvio', 'LE32CL-A4', '', 'Base', 'Pantalla rota', 'marca atvio, patas', '2018-06-28 21:32:57', '2018-06-28 12:00:00', '2018-06-28 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4455, 2),
(5000035, 'Television', 'RCA', 'DEDC320M4', '', 'Base', 'Le falla una lupa de led', '', '2018-06-28 23:48:45', '2018-07-07 12:00:00', '2018-06-28 12:00:00', 'Garantia', 0, 0, 0, 0, 1200, 0, 'Pendiente', 'Recepcion', 0, 4457, 0),
(5000036, 'Television', 'Sony Bravia', 'KDL-32ML130', '', 'Base', 'No enciende', '', '2018-06-28 23:51:00', '2018-07-20 23:15:57', '2018-07-01 01:41:15', 'Reparacion', 0, 1600, 0, 0, 1600, 0, 'Entregado', 'Cliente', 0, 4458, 2),
(5000037, 'Television', 'LG', '49UJ6200', '', 'Ninguno', 'Pantalla dañada', '', '2018-06-29 23:47:42', '2018-06-29 23:47:42', '2018-06-29 23:47:42', 'Reparacion', 3500, 1000, 3500, 1000, 4500, 0, 'Depositado', 'Taller', 0, 4424, 2),
(5000038, 'Television', 'DWDISPLAY', 'DW-3246', '', 'Patas', 'Pantalla estrellada', 'Dejo presupuesto', '2018-06-30 02:02:05', '2018-06-30 02:02:05', '2018-06-30 02:02:05', '', 0, 0, 1500, 0, 1500, 0, 'Pendiente', 'Taller', 0, 4459, 2),
(5000039, 'Television', 'Philips', '32PFL4508/F8', '', 'Ninguno', 'No enciende', 'antiguo folio 4341, se adquirio pieza, llega el día martes', '2018-06-30 22:51:53', '2018-07-01 12:00:00', '2018-06-30 22:51:53', 'Garantia', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4460, 2),
(5000040, 'Television', 'Sony Bravia', 'KDL-32ML130', '', 'Base', 'No enciende', '', '2018-07-04 01:48:52', '2018-07-03 12:00:00', '2018-07-03 12:00:00', 'Garantia', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4458, 2),
(5000041, 'Television', 'Samsung', 'UN50J5300AF', '', 'Base', 'Pantalla quebrada', '', '2018-07-05 01:40:09', '2018-07-04 12:00:00', '2018-07-04 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4462, 2),
(5000042, 'Television', 'Hisense', '50K20DW', '', 'Base', 'Falla de iluminacion', 'fue recolectada', '2018-07-05 22:56:57', '2018-07-05 12:00:00', '2018-07-05 12:00:00', 'Domicilio', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4463, 2),
(5000043, 'Television', 'DWDisplay', 'DW-24SP', '', 'Base', 'Pantalla con parpadéo', '', '2018-07-06 21:55:56', '2018-07-20 22:41:32', '2018-07-06 12:00:00', 'Reparacion', 0, 300, 300, 0, 300, 0, 'Entregado', 'Cliente', 0, 4464, 2),
(5000044, 'Television', 'Philips', '32PFL4901/F8', '', 'Base', 'No enciende', '', '2018-07-07 04:05:23', '2018-07-06 12:00:00', '2018-07-06 12:00:00', 'Reparacion', 0, 0, 1500, 0, -1500, 0, 'Pendiente', 'Taller', 0, 4461, 2),
(5000045, 'Television', 'Panasonic', 'TC-32DS600X', '', 'Base', 'Pantalla rota', '', '2018-07-07 04:38:45', '2018-07-06 12:00:00', '2018-07-06 12:00:00', 'Reparacion', 1800, 400, 0, 0, 2200, 0, 'Pendiente', 'Taller', 0, 4465, 2),
(5000046, 'Television', 'Atvio', 'le23', '', 'Ninguno', 'rf', '', '2018-07-08 01:27:41', '2018-07-20 22:40:58', '2018-07-08 04:17:16', 'Reparacion', 0, 300, 0, 0, 300, 0, 'Entregado', 'Cliente', 0, 4466, 2),
(5000047, 'Television', 'DWDisplay', 'DW-24SP', '', 'Base', 'No enciende', '', '2018-07-08 01:58:54', '2018-07-07 12:00:00', '2018-07-07 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4464, 0),
(5000048, 'Television', 'RCA', 'DEDT420M4', '', 'Base', 'Para revisar', 'A la vuelta de ferretera carrillo', '2018-07-08 05:08:55', '2018-07-07 12:00:00', '2018-07-07 12:00:00', 'Domicilio', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4467, 0),
(5000049, 'Television', 'AOC', 'L19W631', '', 'Ninguno', 'No enciende', '', '2018-07-09 21:29:23', '2018-07-18 22:54:36', '2018-07-18 22:56:07', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4468, 2),
(5000050, 'Television', 'DWDisplay', 'DW-24SP', '', 'Base', 'Enciende pero no da imagen', '', '2018-07-10 04:05:05', '2018-07-20 22:39:35', '2018-07-11 03:28:26', 'Reparacion', 0, 300, 0, 0, 300, 0, 'Entregado', 'Cliente', 0, 4469, 0),
(5000051, 'Television', 'LG', '42PC1DVH', '', 'Base', 'No enciende', '', '2018-07-10 23:35:36', '2018-07-20 22:19:01', '2018-07-10 23:36:36', 'Garantia', 0, 0, 0, 0, 1500, 0, 'Pendiente', 'Recepcion', 0, 4470, 0),
(5000052, 'Television', 'DWDisplay', 'DW-24SP', '', 'Base', 'Tinta chorreada', '', '2018-07-11 20:53:03', '2018-07-11 12:00:00', '2018-07-11 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion con traslado solicitado', 0, 4471, 0),
(5000053, 'Television', 'Otros', '40D3505T', '', 'Cable de corriente', 'Pantalla rota', 'Marca Haier, patas y cable', '2018-07-12 00:17:35', '2018-07-12 12:00:00', '2018-07-11 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Devuelto', 'Taller', 0, 4472, 2),
(5000054, 'Television', 'Sony Bravia', 'KDL-55W800B', '', 'Cable de corriente', 'Pantalla rota', 'Eliminador', '2018-07-12 00:24:21', '2018-07-11 12:00:00', '2018-08-28 00:12:25', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4473, 0),
(5000055, 'Television', 'Samsung', 'LN32B360C5D', '', 'Base', 'Imagen empalmada', '', '2018-07-12 20:42:25', '2018-07-13 02:00:54', '2018-07-12 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Carro 1 en ruta a Taller', 0, 4474, 6),
(5000056, 'Television', 'Samsung', 'UN40FH5303F', '', 'Ninguno', 'Se escucha pero no se ve', '', '2018-07-13 00:55:49', '2018-07-20 22:29:05', '2018-07-14 05:44:49', 'Reparacion', 0, 2800, 0, 0, 2800, 0, 'Entregado', 'Cliente', 0, 4475, 2),
(5000057, 'Television', 'LG', '43LH5700', '', 'Cable de corriente', 'Pantalla estrellada', '', '2018-07-13 02:20:32', '2018-07-12 12:00:00', '2018-07-12 12:00:00', 'Reparacion', 3500, 1000, 3500, 1000, 4500, 0, 'Pendiente', 'Recepcion', 0, 4476, 0),
(5000058, 'Television', 'LG', '50LN5710', '', 'Base', 'Se escucha pero no se ve', '', '2018-07-14 02:49:36', '2018-07-24 05:30:11', '2018-07-13 12:00:00', 'Reparacion', 0, 3000, 0, 0, 0, 0, 'Entregado', 'Cliente', 0, 4478, 2),
(5000059, 'Television', 'Samsung', 'UN60FH6003', '', 'Base', 'Golpe', 'Cable de corriente y base(la dejaron en una caja grande)', '2018-07-15 00:45:04', '2018-07-14 12:00:00', '2018-07-14 12:00:00', 'Reparacion', 5000, 2000, 3000, 4000, 7000, 0, 'Diagnosticada', 'Recepcion', 0, 4479, 0),
(5000060, 'Television', 'LG', '42PJ550', '', 'Ninguno', 'Le salió una raya', '', '2018-07-15 00:46:00', '2018-07-20 02:08:03', '2018-07-14 12:00:00', 'Reparacion', 0, 1800, 1800, 0, 1800, 0, 'Entregado', 'Cliente', 0, 4479, 2),
(5000061, 'Television', 'LG', '42LC7D', '', 'Base', 'Batalla para encender ', 'base y control remoto', '2018-07-16 21:16:11', '2018-07-20 03:31:45', '2018-07-18 00:23:05', 'Reparacion', 0, 800, 0, 0, 800, 0, 'Depositado', 'Cliente', 0, 4458, 2),
(5000062, 'Television', 'LG', '32LN530B', '', 'Base', 'Se apaga', '', '2018-07-18 00:57:57', '2018-07-17 12:00:00', '2018-07-17 12:00:00', 'Garantia', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4482, 0),
(5000063, 'Television', 'Philips', '32PFL4909', '', 'Ninguno', 'No enciende', 'REPARACION FUENTE', '2018-07-18 01:01:52', '2018-07-17 12:00:00', '2018-08-14 01:04:09', 'Reparacion', 950, 0, 950, 0, 950, 0, 'Entregado', 'Cliente', 0, 4481, 0),
(5000064, 'Television', 'Panasonic', 'TC-L32C5X', '', 'Base', 'Pantalla rota', 'Dueño de la Birrieria los compadres, que estan buenas dijo :v', '2018-07-19 00:14:07', '2018-07-24 05:11:53', '2018-07-18 12:00:00', 'Reparacion', 1400, 400, 0, 1800, 1800, 0, 'Necesita pieza', 'Taller', 0, 4483, 2),
(5000065, 'Television', 'LG', '42PN4500', '', 'Ninguno', 'Falla en la pantalla', '', '2018-07-19 01:50:03', '2018-07-20 03:23:10', '2018-07-18 12:00:00', 'Garantia', 0, 0, 0, 0, 1800, 0, 'Pendiente', 'Recepcion', 0, 4484, 0),
(5000066, 'Television', 'LG', '42px4', '', 'Ninguno', 'se apago', '', '2018-07-21 00:08:27', '2018-09-09 02:12:15', '2018-09-09 02:14:01', 'Reparacion', 1150, 0, 0, 0, 1150, 0, 'Entregado', 'Cliente', 0, 4485, 0),
(5000067, 'Television', 'LG', '42', '', 'Patas', 'Se congela la imagen', '', '2018-07-25 00:00:40', '2018-07-24 12:00:00', '2018-07-24 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4487, 0),
(5000068, 'Television', 'Toshiba', '42TL515U', '', 'Cable de corriente', 'No enciende', '', '2018-07-25 03:35:09', '2018-07-24 12:00:00', '2018-07-24 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4490, 0),
(5000069, 'Television', 'LG', '32LC5DCS', '', 'Base', 'Batalla para encender', '', '2018-07-25 22:21:19', '2018-07-26 00:05:25', '2018-07-25 12:00:00', 'Reparacion', 0, 700, 0, 0, 700, 0, 'Depositado', 'Cliente', 0, 4485, 2),
(5000070, 'Television', 'LG', '42LN5300', '', 'Base', 'Problema al encender', 'montador de pared', '2018-07-25 22:59:34', '2018-08-02 01:34:29', '2018-08-02 02:43:01', 'Reparacion', 1000, 0, 0, 0, 1000, 0, 'Entregado', 'Cliente', 0, 4491, 2),
(5000071, 'Television', 'Daewoo', 'DP-42SM', '', 'Ninguno', 'No enciende', '', '2018-07-25 23:40:23', '2018-07-25 12:00:00', '2018-07-25 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4492, 0),
(5000072, 'Television', 'Samsung', 'HG32NA478', '', 'Base', 'Está bloqueada', 'se la bloquearon los niños', '2018-07-27 03:12:43', '2018-07-26 12:00:00', '2018-07-28 02:59:54', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4494, 0),
(5000073, 'Television', 'Samsung', 'un32j4300af', '', 'Cable de corriente', 'pantalla quebrada', 'quiere que compremos su television.\r\nle abono jorge 300 queda de pasar por 400 sabado 28 julio 2018.', '2018-07-27 20:49:24', '2018-07-27 12:00:00', '2018-07-27 12:00:00', 'Compra', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion con traslado solicitado', 0, 4495, 0),
(5000074, 'Television', 'Philips', 'Sin etiqueta', '', 'Ninguno', 'Rayas en la pantalla', '', '2018-07-27 20:59:37', '2018-07-28 23:47:08', '2018-10-04 03:14:46', 'Compra', 3000, 1000, 0, 4000, 4000, 500, 'Comprada', 'Recepcion', 0, 4496, 2),
(5000075, 'Television', 'Vizio', '55EV', '', 'Base', 'No prende', '', '2018-07-30 21:11:27', '2018-07-30 12:00:00', '2018-08-01 03:44:27', 'Domicilio', 0, 0, 0, 0, 4000, 0, 'Entregado', 'Cliente', 0, 4498, 0),
(5000076, 'Television', 'DWDisplay', 'dw-24sp', '', 'Patas', 'nada màs se escucha ', 'rf flojo', '2018-07-31 06:12:29', '2018-07-30 12:00:00', '2018-10-04 03:18:51', 'Reparacion', 0, 0, 0, 0, 0, 100, 'Comprada', 'Recepcion', 0, 4499, 0),
(5000077, 'Television', 'Sony Bravia', 'KDL-32BX321', '', 'Ninguno', 'No enciende', '', '2018-07-31 23:12:30', '2018-07-31 12:00:00', '2018-10-04 03:19:57', 'Reparacion', 0, 0, 0, 0, 0, 300, 'Comprada', 'Almacen', 0, 4500, 6),
(5000078, 'Television', 'LG', '32LD350', '', 'Cable de poder', 'No enciende', 'Un amigo inteto repararsela, pero se fue de viaje y la dejo a medias, posbiel fallo en la fuente.\nDeja las tarjetas fuera de la tele\n', '2018-08-01 03:31:25', '2018-08-01 22:55:53', '2018-08-02 00:28:29', 'Garantia', 0, 0, 0, 0, 1200, 0, 'Pendiente', 'Recepcion', 0, 4501, 0),
(5000079, 'Television', 'Samsung', 'UN40EH5300F', '', 'Ninguno', 'Se enciende y se apaga', '', '2018-08-04 21:35:20', '2018-08-04 12:00:00', '2018-08-04 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4503, 0),
(5000080, 'Television', 'Sony Bravia', 'KDL-32R400A', '', 'Base', 'Pantalla rota', '', '2018-08-05 00:38:23', '2018-08-04 12:00:00', '2018-08-04 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4477, 0),
(5000081, 'Television', 'Samsung', 'UN49MU6100F', '', 'Ninguno', 'Pantalla rota', '', '2018-08-06 23:55:59', '2018-08-06 12:00:00', '2018-08-28 00:12:12', 'Reparacion', 3500, 1000, 0, 4500, 4500, 0, 'Devuelto', 'Cliente', 0, 4504, 0),
(5000082, 'Television', 'Otros', 'PTV3915ILED', '', 'Base', 'Se pone oscura', '', '2018-08-07 00:07:16', '2018-08-06 12:00:00', '2018-08-07 00:45:54', 'Compra', 0, 450, 0, 0, 450, 1000, 'Valorada', 'Recepcion', 0, 4502, 6),
(5000083, 'Television', 'Hisense', '46K366WN', '', 'Base y cable de poder', 'NO ENCIENDE', 'Genoveva 6242259871\r\nViene del  taller Zeus', '2018-08-07 02:39:21', '2018-08-06 12:00:00', '2018-08-06 12:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4506, 0),
(5000084, 'Television', 'Toshiba', '55TL515U', '', 'Ninguno', 'NO PRENDE', '', '2018-08-10 04:13:17', '2018-08-09 12:00:00', '2018-09-17 22:08:56', 'Reparacion', 0, 2600, 0, 0, 2600, 0, 'Entregado', 'Cliente', 0, 4507, 0),
(5000085, 'Television', 'Samsung', 'UN40KU6000F', '', 'Ninguno', 'Equipo para venta en mercado libre', '', '2018-08-11 23:44:19', '2018-08-11 12:00:00', '2018-08-11 12:00:00', 'Compra', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4508, 0),
(5000086, 'Television', 'Sony Bravia', 'KDL-37L4000', '', 'Base', 'SE VE VERDE', '', '2018-08-17 00:16:55', '2018-08-17 12:00:00', '2018-08-17 21:48:13', 'Reparacion', 0, 1600, 0, 0, 1600, 0, 'Entregado', 'Cliente', 0, 4509, 0),
(5000087, 'Television', 'Vios', 'VLEDTV3914', '', 'Ninguno', 'RAYAS EN LA PANTALLA  Y SE APAGA', '', '2018-08-18 23:28:51', '2018-09-28 12:00:00', '2018-08-20 23:32:03', 'Reparacion', 0, 300, 0, 300, 300, 0, 'Comprada', 'Recepcion', 0, 4510, 0),
(5000088, 'Television', 'Samsung', 'HG40NA577', '', 'Base', 'NO ENCIENDE, DEJÓ DE DAR IMAGEN', '', '2018-08-19 00:25:12', '2018-08-29 12:00:00', '2018-08-20 23:32:03', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4511, 0),
(5000089, 'Television', 'Hitachi', 'P50H401A', '', 'Base', 'NO  ENCIENDE', '', '2018-08-20 21:54:28', '2018-09-01 21:17:28', '2018-08-20 23:32:03', 'Reparacion', 1800, 750, 1800, 750, 2550, 0, 'Reparada', 'Taller', 0, 4512, 0),
(5000090, 'Television', 'Philips', '40PFL4911', '', 'Base', 'ENCIENDE ESTANCADA EN LOGO', '', '2018-08-20 23:29:09', '2018-08-27 12:00:00', '2018-08-20 23:32:03', 'Domicilio', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4513, 0),
(5000091, 'Television', 'Philips', '50PFL4909/F8', '', 'Base', 'NO ENCIENDE', '', '2018-08-20 23:59:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4514, 0),
(5000092, 'Television', 'Otros', 'DX-LDVD19-10A', '', 'Base', 'SE APAGA AL ENCENDER', 'Marca Dynex', '2018-08-21 01:21:29', '2018-08-24 21:25:16', '2018-09-17 21:59:53', 'Reparacion', 0, 400, 0, 0, 400, 0, 'Entregado', 'Cliente', 0, 4515, 2),
(5000093, 'Television', 'Vizio', 'D43F-E1', '', 'Patas', 'SE APAGA A LOS 5 MINUTOS', '', '2018-08-22 00:04:08', '2018-08-29 12:00:00', '2018-09-17 21:57:18', 'Reparacion', 1500, 500, 0, 0, 2000, 0, 'Entregado', 'Cliente', 0, 4516, 0),
(5000094, 'Television', 'Samsung', 'UN32J4300', '', 'Base de pared', 'PANTALLA ROTA', 'base pared y patas', '2018-08-23 03:01:39', '2018-09-01 12:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4518, 0),
(5000095, 'Television', 'Philips', '32HFL5561V/27', '', 'Ninguno', 'NO ENCIENDE', '', '2018-08-23 06:45:50', '2018-08-01 12:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4519, 0),
(5000096, 'Television', 'Vizio', 'M3D470KD', '', 'Base', 'PANTALLA DAÑADA', '', '2018-08-24 21:16:51', '2018-08-29 12:00:00', '0000-00-00 00:00:00', 'Reparacion', 2600, 750, 2600, 750, 3350, 0, 'Reparada', 'Recepcion', 0, 4512, 0),
(5000097, 'Television', 'Samsung', 'UN32J4300', '', 'Ninguno', 'PANTALLA ROTA', '', '2018-08-28 03:07:31', '2018-08-29 12:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4524, 0),
(5000098, 'Television', 'Philips', '39PFL4208/F8', '', 'Ninguno', 'FALLA EN LA PANTALLA', '', '2018-08-29 22:47:12', '2018-09-12 22:27:57', '2018-09-17 23:09:55', 'Reparacion', 2600, 750, 0, 0, 3350, 0, 'Entregado', 'Cliente', 0, 4525, 2),
(5000099, 'Television', 'Vios', 'TV3914SM', '', 'Patas', 'NO ENCIENDE', '', '2018-09-01 04:40:32', '2018-08-31 12:00:00', '2018-09-02 02:28:08', 'Domicilio', 0, 1300, 0, 0, 1300, 0, 'Entregado', 'Cliente', 0, 4529, 0),
(5000100, 'Television', 'LG', '42LB5550', '', 'Patas', 'NO  DA IMAGEN', 'solo da audio pero imagen no.', '2018-09-02 02:55:13', '2018-09-02 06:52:30', '2018-09-02 06:54:29', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Entregado', 'Cliente', 0, 4530, 0),
(5000101, 'Television', 'LG', '55LW5700', '', 'Ninguno', 'NO ENCIENDE', 'viene de otro taller', '2018-09-05 04:43:04', '2018-09-05 04:47:13', '2018-09-17 22:25:20', 'Reparacion', 0, 750, 0, 0, 750, 0, 'Entregado', 'Cliente', 0, 4531, 2),
(5000102, '', 'Samsung', 'UN32F5500', '', 'Ninguno', 'no enciende', '', '2018-09-05 06:27:48', '2018-09-06 07:02:54', '2018-09-17 21:54:11', 'Domicilio', 0, 900, 900, 0, 900, 0, 'Entregado', 'Cliente', 0, 4532, 2),
(5000103, 'Television', 'LG', '42LU25', '', 'Ninguno', 'PANTALLA ROTA', '', '2018-09-05 21:32:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4528, 0),
(5000104, 'Television', 'Samsung', 'UN55K6500', '', 'Base', 'PANTALLA ROTA', '', '2018-09-05 21:35:56', '0000-00-00 00:00:00', '2018-09-17 22:05:22', 'Reparacion', 6000, 1500, 6000, 0, 7500, 0, 'Entregado', 'Cliente', 0, 4512, 0),
(5000105, 'Television', 'LG', '42PG1HD', '', 'Ninguno', 'NO ENCIENDE', '', '2018-09-05 22:22:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 1600, 750, 1600, 750, 2350, 0, 'Pendiente', 'Recepcion', 0, 4533, 0),
(5000106, 'Television', 'Hisense', '40H5D', '', 'Ninguno', 'PANTALLA ROTA', '', '2018-09-05 23:48:37', '2018-09-16 03:47:56', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 1400, -1400, 0, 0, 'Diagnosticada', 'Recepcion', 0, 4534, 2),
(5000107, 'Television', 'LG', '43LF5900', '', 'Ninguno', 'PANTALLA ROTA', '', '2018-09-06 07:44:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 2800, -2800, 0, 0, 'Pendiente', 'Recepcion', 0, 4535, 0),
(5000108, 'TELEVISION', 'LG', '50LN5710', '', 'Base de pared', 'PANTALLA CON RAYAS', 'TIENE HUMEDAD, SE REALIZARÁ MANTINIMIENTO A PANTALLA', '2018-09-07 04:04:07', '2018-09-07 04:07:33', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'En Reparación', 'Taller', 0, 4536, 2),
(5000109, 'Television', 'SAMSUNG', 'UN24H4000', '030R3CHH902461L', 'Base', 'PANTALLA ROTA', 'Se daÃ±o en paqueteria DHL', '2018-09-11 02:04:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'A cambio', 'Taller', 0, 4538, 0),
(5000110, 'Television', 'Philips', '', '', 'Base', 'PANTALLA ESTRELLADA', '', '2018-09-11 04:23:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4539, 0),
(5000111, 'Fuente de poder', 'LIFE FITNESS', 'VARIOS', 'AK58001530001', 'NINGUNO', 'NO FUNCIONA', '', '2018-09-11 22:34:27', '2018-09-17 21:07:41', '2018-09-17 21:14:04', 'Reparacion', 0, 3500, 0, 0, 3500, 0, 'Entregado', 'Cliente', 0, 4540, 2),
(5000112, 'Television', 'SAMSUNG', 'UN46D6000', 'Z3FE3CAB300083L', 'Ninguno', 'PARPADEA LA PANTALLA', '', '2018-09-12 04:05:41', '2018-09-13 08:08:09', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'En reparacion', 'Recepcion', 0, 4543, 2),
(5000113, 'Television', 'LG', '55LH575A', '609RMDZ5Y522', 'UNA PATA', 'PANTALLA ROTA', 'VIENE DE OTRO TALLER, POSIBLE SAQUEO DE PIEZAS', '2018-09-14 01:00:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4544, 0),
(5000114, 'Television', 'SAMSUNG', 'UN65KS9000F', '05H23CBH500046T', 'NINGUNO', 'PANTALLA ROTA', 'SE QUEBRÃ“ CUANDO LA ESTABAN MONTANDO EN LA PARED', '2018-09-14 04:08:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4545, 0),
(5000115, 'Television', 'HISENSE', '40H5B2', '40G161181H01884', 'PATAS', 'PANTALLA ROTA', '', '2018-09-15 00:46:30', '2018-09-25 03:53:51', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 1000, 0, 0, 0, 'En reparacion', 'Recepcion', 0, 4546, 2),
(5000116, 'Television', 'DAEWOO', 'L42Q55300KN', '0', 'NINGUNO', 'NO ENCIENDE ', '', '2018-09-15 21:49:17', '2018-09-15 21:53:20', '2018-09-15 22:47:03', 'Reparacion', 0, 1000, 0, 0, 1000, 0, 'Entregado', 'Cliente', 0, 4547, 2),
(5000117, 'Television', 'LG', '42ln5300', '302RMZL5F973', 'NINGUNO', 'ENCIENDE SIN IMAGEN', '', '2018-09-16 00:59:46', '2018-09-16 01:01:00', '2018-09-16 01:15:35', 'Reparacion', 1650, 0, 0, 0, 1650, 0, 'Entregado', 'Cliente', 0, 4547, 2),
(5000118, 'Television', 'ATVIO', 'atv2416led', '18606', 'control remoto', 'PANTALLA ROTA', 'se compro por $400', '2018-09-17 21:01:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Compra', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4542, 0),
(5000119, 'Television', 'SONY', 'Kdl-32', '0', 'Checar', 'ROTA', '', '2018-09-23 02:19:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'En reparacion', 'Recepcion', 0, 4549, 0),
(5000120, 'Television', 'ATVIO', 'ATV4017ILED', '0', 'Control y patas', 'LOGO ANDROID', 'No tiene etiqueta trasera', '2018-09-25 02:14:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente traslado', 'Recepcion', 0, 4550, 0),
(5000121, 'Television', 'SPELER', 'SP-LED32', 'SK2015014979', 'Ninguno', 'NO SE MIRA', '', '2018-09-25 23:53:48', '2018-09-28 22:15:57', '0000-00-00 00:00:00', 'Reparacion', 0, 800, 0, 800, 800, 0, 'Reparada', 'Taller', 0, 4552, 2),
(5000122, 'Television', 'NA', 'NA', 'NA', 'na', 'NA', 'na', '2018-09-26 06:43:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente traslado', 'Recepcion', 0, 4551, 0),
(5000123, 'Television', 'LG', '28MT42DF-PU', '805MXKDTB973', 'Control remoto', 'PANTALLA ROTA', '', '2018-09-26 21:15:05', '2018-09-26 12:00:00', '2018-09-26 23:30:45', 'Reparacion', 0, 0, 0, 0, 2500, 0, 'A cambio', 'Recepcion', 0, 4553, 2),
(5000124, 'Television', 'PANASONIC', 'TC-L47E50X', 'MC21010151', 'NINGUNO', 'NO ENCIENDE', '', '2018-09-26 21:34:58', '2018-09-26 12:00:00', '0000-00-00 00:00:00', 'Reparacion', 2400, 0, 0, 2400, 2400, 0, 'Reparada', 'Recepcion', 0, 4554, 2),
(5000125, 'Television', 'LG', '60LN5710', '312RMDZ42218', 'Ninguno', 'PANTALLA ROTA', '', '2018-09-27 01:38:30', '2018-09-26 12:00:00', '2018-09-27 02:29:27', 'Reparacion', 0, 0, 0, 0, 10000, 0, 'A cambio', 'Recepcion', 0, 4555, 2),
(5000126, 'Television', 'LG', '47LN5710', '403MXDM5C218', 'Ninguno', 'NO ENCIENDE', '', '2018-09-28 21:37:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente traslado', 'Recepcion', 0, 4556, 0),
(5000127, 'Television', 'PIONEER', 'PLE55S08UHD', 'P102678LG000308', 'Cable', 'FRANJA', '', '2018-10-01 21:57:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente traslado', 'Recepcion', 0, 4557, 0),
(5000128, 'Television', 'XXX', 'XXX', 'XXx', 'xxx', 'XXx', '', '2018-10-03 03:30:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4415, 6),
(5000129, 'Television', 'ASD', 'ASD', 'ASD', 'asd', 'ASD', '', '2018-10-03 04:00:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4417, 6),
(5000130, 'Television', 'X', 'X', 'X', 'x', 'X', '', '2018-10-10 02:45:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', NULL, NULL, NULL, NULL, NULL, NULL, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000131, 'Television', 'CV', 'CV', 'CV', 'cv', 'CV', '', '2018-10-10 02:47:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', NULL, NULL, NULL, NULL, NULL, NULL, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000132, 'Television', 'BB', 'Bb', 'BBb', 'bb', 'BB', '', '2018-10-10 02:50:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', NULL, NULL, NULL, NULL, NULL, NULL, 'Pendiente', 'Recepcion', 0, 4417, 0),
(5000133, 'Television', 'QQ', 'Qq', 'QQ', 'qq', 'Qq', '', '2018-10-10 02:52:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', NULL, NULL, NULL, NULL, NULL, NULL, 'Pendiente', 'Recepcion', 0, 4414, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_tecnicos`
--

CREATE TABLE IF NOT EXISTS `reportes_tecnicos` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `falla_especifica` varchar(1000) NOT NULL,
  `solucion_especifica` varchar(1000) NOT NULL,
  `conclusion` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parte` varchar(50) NOT NULL,
  `imagen1` varchar(80) NOT NULL,
  `imagen2` varchar(80) NOT NULL,
  `imagen3` varchar(80) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `id_equipo` (`id_equipo`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `reportes_tecnicos`
--

INSERT INTO `reportes_tecnicos` (`id_reporte`, `falla_especifica`, `solucion_especifica`, `conclusion`, `fecha`, `parte`, `imagen1`, `imagen2`, `imagen3`, `id_personal`, `id_equipo`) VALUES
(1, 'se va la imagen despues de unos minutos', 'se realizan pruebas de dinamica para emulacion de falla sin obtener resultados.', 'pantalla dañada.', '2018-06-07 21:02:13', '', '', '', '', 2, 5000000),
(2, 'La televisiòn no encendìa', 'hicismos prueba de voltaje, y no levantaba los 5 volts necesarios en standby del funcionamiento de la main, se ubicò  un par de filtros malos y posteriormente se reemplazo', 'La television quedò funcionando perfectamente', '2018-06-11 21:50:01', '', '', '', '', 2, 5000003),
(3, 'Tiene codigo', 'Se localizo el codigo', 'Quedò reparada', '2018-06-11 23:52:12', '', '', '', '', 2, 5000004),
(4, 'No prende', 'se realiza inspeccion de tarjeta fuente encontrando humedad y  realizando procedimiento de reparacion a nivel componente se reemplaza pistas dañadas.', 'Quedo reparada', '2018-06-12 21:41:39', '', '', '', '', 2, 5000002),
(5, 'No funciona el modulo de wifi, y un par de tiras leds sin imagen', 'se reemplazaron los leds y se sustituyo la pieza el modulo wifi', 'la tv quedo reparada', '2018-06-13 02:21:35', '', '', '', '', 2, 5000006),
(6, 'malos los led se mira a lo lejos', 'se procedio a desemsamble de panel y a reemplazo de modem', 'queda lista', '2018-06-13 03:17:42', '', '', '', '', 2, 5000007),
(7, 'no agarra señal', 'no se reviso', 'la devolvieron', '2018-06-14 00:05:02', '', '', '', '', 2, 5000001),
(8, 'pantalla rota', 'no hay pantalla', 'se manda a bodega', '2018-06-14 00:05:38', 'pantalla 32', '', '', '', 2, 5000011),
(9, 'pantalla rota', 'se reviso y esta mala la pantalla', 'se manda a bodega', '2018-06-14 00:07:13', 'panatalla', '', '', '', 2, 5000005),
(10, 'panatalla rota', 'se reviso y esta dañadalña pantalla', 'se amnda a bodega', '2018-06-14 00:07:51', 'pantalla', '', '', '', 2, 5000008),
(11, 'Entrada de ipod/iphone dañada', 'Se resoldo cada patita de la entrada', 'Equipo reparado satsifactoraimente', '2018-06-17 01:02:58', '', '', '', '', 2, 1),
(12, 'No ilumina la pantalla', 'Se repararon tres tras de leds', 'Equipo reparado', '2018-06-17 02:22:01', '', '', '', '', 2, 5000012),
(13, 'no imagen\r\n', 'se les dio mantenimiento a tarjetas estaban llenas de polvo', 'queda penndiente por ic de buffer parte de abajo\r\n', '2018-06-27 00:57:27', 'ebr71736901', '', '', '', 2, 5000024),
(14, 'no prende y pilla', 'se reemplazo condensador de superficie en corto', 'quedo reparada satisfactoriamente', '2018-06-27 00:58:35', '', '', '', '', 2, 5000029),
(15, 'Falla en la fuente de poder', 'Se realizo la adaptacion de una fuente funcionando', 'el equipo quedo reparado exitosamente', '2018-07-01 00:54:18', '', '', '', '', 2, 5000036),
(16, 'Falla en el conector de la antena', 'se sustituyo la pieza entera', 'Reparada correctamente', '2018-07-01 00:56:46', '', '', '', '', 2, 5000033),
(17, 'prende y se corta la pantalla', 'se detecta que los leds solo trabajan parcilamente se procedea desemsmblar pantalla encontrando 3 dañados se puentean y de todos modos esta dañada la tarjeta driver controladora ', 'no hay solucion no hay refaccion', '2018-07-07 01:05:37', '', '', '', '', 2, 5000023),
(18, 'Se miran rayas', 'Cambio de main', 'Reparada', '2018-07-08 01:35:39', '', '', '', '', 2, 5000030),
(19, 'Parpadeo en pantalla', 'No se hizo nada se retiró la humedad sola', 'reparada', '2018-07-08 02:04:29', '', '', '', '', 2, 5000043),
(20, 'Falla en RF', 'Se cambio toda la piea', 'Reparado', '2018-07-08 04:15:17', '', '', '', '', 2, 5000046),
(21, 'Falla en la fuente de poder\r\n', 'Se reemplazo con otra tele, manteniendo las partes originales', 'Reparada correctamente', '2018-07-13 21:10:08', '', '', '', '', 2, 5000056),
(22, 'No sube el agua', 'Se repara la fuente', 'Reparada', '2018-07-16 23:08:52', '', '', '', '', 2, 1),
(23, 'Falla en no se donde:v', 'pues le cambie algo xd', 'Ya quedo reparada', '2018-07-17 21:18:52', '', '', '', '', 2, 5000061),
(24, 'Falla con raya en la parte inferior', 'Se le cambio la tarjeta main', 'Reparado', '2018-07-18 02:21:55', '', '', '', '', 2, 5000060),
(25, 'Falla en la fuente', 'No hay refaccion para la tele, es muy vieja', 'no esta reparada', '2018-07-18 22:55:15', '', '', '', '', 2, 5000049),
(26, 'se apaga despues de unos segundos', 'se comprueba que es tarjeta main dañada', 'ya no la quisieron arreglar se compro', '2018-07-19 23:56:00', '', '', '', '', 2, 5000016),
(27, 'esta oscura ', 'se probaron tarjetas', 'quedo lista se reem`plazo tcon como falla principal', '2018-07-20 00:12:11', '', '', '', '', 2, 5000014),
(28, 'parapdea', 'se encontraron leds dañados y se reemplazaron', 'quedo lista', '2018-07-20 23:53:57', '', '', '', '', 2, 5000058),
(29, 'Falla en los filtros de la fuente', 'Se sustituyeron los filtros', 'equipo reparado ', '2018-07-25 23:53:34', '', '', '', '', 2, 5000069),
(30, 'Pantalla rota', 'Se necesita cambiar la pantalla shavo', 'Pendiente de presupuesto', '2018-07-28 23:48:01', '', '', '', '', 2, 5000074),
(31, 'Mala imagen, no funcuiona una bocina', 'Se sustituyo la tarjeta tcon por otra, y se cambio el set de bocinas', 'equipo reparado', '2018-08-01 22:56:34', '', '', '', '', 2, 5000078),
(32, 'Falla en la tarjeta main', 'Se sustituyo la tarjeta', 'Re`parado', '2018-08-02 01:38:46', '', '', '', '', 2, 5000070),
(33, 'pantalla daÃ±ada por humedad', 'reemplazo pantalla', 'Reparado', '2018-09-12 22:29:01', 'NA', '', '', '', 1, 5000098),
(34, 'hyugyu', 'gugyugy', 'Necesita refaccion', '2018-09-13 08:09:22', 'yuft', '', '', '', 1, 5000101),
(35, 'DaÃ±ada del sistema de RESET', 'SE ADAPTO TARJETA EXTERNA PARA REEMPLAZAR LA PARTE DAÃ‘ADA', 'Reparado', '2018-09-15 22:33:32', 'NA', 'assets/galeria/reporte/2/5000116/IMG_20180915_103206.jpg', 'assets/galeria/reporte/2/5000116/', 'assets/galeria/reporte/2/5000116/', 2, 5000116),
(36, 'Falla en la tarjeta', 'Se reemplazo la tarjeta main', 'Reparado', '2018-09-16 01:10:55', 'NA', 'assets/galeria/reporte/2/5000117/IMG_20180915_130452.jpg', 'assets/galeria/reporte/2/5000117/', 'assets/galeria/reporte/2/5000117/', 2, 5000117),
(37, 'Piezas quemadas', 'Se sustituyeron las piezas', 'Reparado', '2018-09-17 21:10:47', 'NA', 'assets/galeria/reporte/3/5000111/titaniumfix.png', 'assets/galeria/reporte/3/5000111/', 'assets/galeria/reporte/3/5000111/', 3, 5000111),
(38, 'No enciende', 'Se reemplazo la tarjeta main', 'Reparado', '2018-09-26 21:37:54', 'NA', 'assets/galeria/reporte/2/5000124/IMG-20180813-WA0011 (1).jpg', 'assets/galeria/reporte/2/5000124/', 'assets/galeria/reporte/2/5000124/', 2, 5000124),
(39, 'Pantalla rota', 'Nada', 'Sin solucion', '2018-09-26 22:10:04', 'NA', 'assets/galeria/reporte/2/5000123/3073D34C-0A30-4DEB-B86A-B7242837F9AA (2).jpeg', 'assets/galeria/reporte/2/5000123/', 'assets/galeria/reporte/2/5000123/', 2, 5000123),
(40, 'se mira un segundo y se apaga no se alcanza a ver imagen', 'se realiza inspeccion de panel y no resulto correcto el diagnostico,se realiza revision de tarjeta y se observaron filtros inchados se reemplazaron y funciono.', 'Reparado', '2018-09-28 22:23:56', 'NA', 'assets/galeria/reporte/2/5000121/20180928_102104.jpg', 'assets/galeria/reporte/2/5000121/20180928_102104.jpg', 'assets/galeria/reporte/2/5000121/', 2, 5000121),
(41, 'hgcfhgf', 'hdfghgfqhdfgh', 'Reparado', '2018-10-06 05:37:18', 'NA', 'assets/galeria/reporte/2/5000106/WhatsApp Image 2018-09-26 at 1.35.08 PM.jpeg', 'assets/galeria/reporte/2/5000106/', 'assets/galeria/reporte/2/5000106/', 2, 5000106);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_refacciones`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `solicitudes_refacciones`
--

INSERT INTO `solicitudes_refacciones` (`id_solicitud`, `tipo`, `etiqueta`, `solicitud`, `estado`, `ubicacion`, `precio`, `id_personal`, `id_equipo`, `fecha`) VALUES
(1, 'Tarjeta Main', 'eax78162367 ebt87493603', 'Pendiente', 'Localizando', '', 0, 1, 5000001, '2018-10-10 04:25:24'),
(2, 'Fuente de poder', 'eax65564s42', 'Pendiente', 'Encontrada', 'Almacen', 1500, 0, 5000002, '2018-10-10 08:16:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslado`
--

CREATE TABLE IF NOT EXISTS `traslado` (
  `id_traslado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `comentarios` varchar(300) DEFAULT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `destino` varchar(50) NOT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_finalizado` timestamp NULL DEFAULT NULL,
  `id_equipo` int(11) NOT NULL DEFAULT '0',
  `id_carro` int(11) DEFAULT NULL,
  `id_personal` int(11) NOT NULL DEFAULT '0',
  `id_folio` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`id_traslado`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `traslado`
--

INSERT INTO `traslado` (`id_traslado`, `estado`, `direccion`, `comentarios`, `ubicacion`, `destino`, `fecha_solicitud`, `fecha_finalizado`, `id_equipo`, `id_carro`, `id_personal`, `id_folio`, `tipo`) VALUES
(1, 'En ruta', 'Taller lagunitas', '', 'Carro #1', 'Taller', '2018-07-12 22:19:24', '0000-00-00 00:00:00', 5000055, 1, 6, 4474, ''),
(2, 'Pendiente', 'lagunitas', '', 'Recepcion', 'Taller', '2018-07-12 22:27:15', '0000-00-00 00:00:00', 5000054, 0, 0, 4473, ''),
(3, 'Pendiente', 'lagunitas', '', 'Recepcion', 'Taller', '2018-07-12 22:29:27', '0000-00-00 00:00:00', 5000053, 0, 0, 4472, ''),
(4, 'Pendiente', 'lagunitas', 'pvto', 'Recepcion', 'Taller', '2018-07-12 23:13:08', '0000-00-00 00:00:00', 5000052, 0, 0, 4471, ''),
(5, 'Pendiente', '', '', 'Recepcion', 'Taller', '2018-07-19 23:36:19', '0000-00-00 00:00:00', 5000064, 0, 0, 4483, ''),
(6, 'Pendiente', 'lagunitas', 'esta rota la pantalla', 'Recepcion', 'Taller', '2018-07-19 23:36:44', '0000-00-00 00:00:00', 5000064, 0, 0, 4483, ''),
(7, 'Pendiente', '', '', 'Taller', 'Bodega', '2018-07-24 05:15:21', '0000-00-00 00:00:00', 5000064, 0, 0, 4483, ''),
(8, 'Pendiente', '', '', 'Recepcion', 'Taller', '2018-07-27 20:53:12', '0000-00-00 00:00:00', 5000073, 0, 0, 4495, ''),
(10, 'Entregado', 'Lomas del sol', 'es joto', 'Cliente', 'Cliente', '2018-07-30 21:14:14', '2018-07-30 18:19:51', 5000075, 1, 6, 4498, ''),
(11, 'Pendiente', 'taller1', '', 'Recepcion', 'Taller', '2018-07-31 06:16:50', '0000-00-00 00:00:00', 5000076, 0, 0, 4499, ''),
(12, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-15 00:46:30', NULL, 0, NULL, 0, 4546, ''),
(13, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-15 21:49:18', NULL, 0, NULL, 0, 4547, ''),
(14, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-16 00:59:46', NULL, 0, NULL, 0, 4547, ''),
(15, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-16 01:06:33', NULL, 0, NULL, 0, 4547, ''),
(16, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-16 01:06:34', NULL, 0, NULL, 0, 4547, ''),
(17, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-16 01:06:35', NULL, 0, NULL, 0, 4547, ''),
(18, 'Pendiente', NULL, 'se compro por $400', 'recepcion', 'Taller', '2018-09-17 21:01:25', NULL, 0, NULL, 0, 4542, ''),
(19, 'Pendiente', '0', '0', 'recepcion', 'Taller', '2018-09-23 02:19:33', NULL, 5000119, 1, 0, 4549, ''),
(20, 'Entregado', NULL, NULL, 'Taller', 'Taller', '2018-10-03 03:30:54', '2018-10-02 21:47:50', 5000128, 1, 6, 4415, ''),
(21, 'Entregado', NULL, NULL, 'Taller', 'Taller', '2018-10-03 04:00:45', '2018-10-02 22:01:37', 5000129, 2, 6, 4417, ''),
(22, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion', '2018-10-03 05:48:19', NULL, 5000028, NULL, 6, 0, ''),
(23, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion', '2018-10-03 06:05:41', NULL, 5000028, NULL, 6, 0, ''),
(25, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion', '2018-10-04 01:32:12', NULL, 5000028, NULL, 3, 0, ''),
(27, 'Recoleccion', NULL, NULL, 'Taller', 'Recepcion', '2018-10-04 01:54:18', NULL, 5000030, 2, 6, 0, ''),
(28, 'En ruta', NULL, NULL, 'Almacen', 'Cliente', '2018-10-04 03:19:57', '2018-10-03 21:49:41', 5000077, 0, 6, 4500, 'Compra'),
(29, 'Entregado', NULL, NULL, 'Recepcion', 'Recepcion', '2018-10-04 04:12:50', '2018-10-03 22:49:13', 5000082, 1, 6, 0, ''),
(30, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-10-05 21:49:38', NULL, 5000129, NULL, 3, 0, ''),
(31, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-10-05 21:50:03', NULL, 5000129, NULL, 3, 0, ''),
(32, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-10-05 21:50:18', NULL, 5000129, NULL, 3, 0, ''),
(33, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion', '2018-10-06 05:39:42', NULL, 5000017, NULL, 2, 0, ''),
(34, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion', '2018-10-06 05:44:20', NULL, 5000015, NULL, 2, 0, ''),
(35, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion', '2018-10-08 21:09:39', NULL, 5000005, NULL, 3, 0, ''),
(36, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion', '2018-10-08 21:11:31', NULL, 5000008, NULL, 3, 0, ''),
(37, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion', '2018-10-09 01:28:00', NULL, 5000018, NULL, 3, 0, ''),
(38, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-10-10 02:45:40', NULL, 5000130, NULL, 3, 4414, ''),
(39, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-10-10 02:47:59', NULL, 5000131, NULL, 3, 4414, ''),
(40, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-10-10 02:50:40', NULL, 5000132, NULL, 3, 4417, ''),
(41, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-10-10 02:52:47', NULL, 5000133, NULL, 3, 4414, '');

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
  `tipo` varchar(20) NOT NULL,
  `abono` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idventa_tv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ventas_tv`
--

INSERT INTO `ventas_tv` (`idventa_tv`, `marca`, `modelo`, `serie`, `costo`, `imagen1`, `imagen2`, `imagen3`, `fecha_alta`, `fecha_egreso`, `estado`, `id_personal`, `idvendedor`, `ubicacion`, `id_equipo`, `id_folio`, `tipo`, `abono`) VALUES
(1, 'Samsung', 'un55mu6100fxzx', 'asdasd12345', 7500, '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\mx-uhdtv-mu6100-un55.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\mx-uhdtv-mu6100.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\jklhjlblkg.jpg', '2018-07-13 22:19:25', '2018-09-25 12:57:59', '', 3, 3, 'Cliente', 0, 4563, 'Contado', 0),
(2, 'LG', '42ln5700', 'xasdas3623', 0, 'assets\\galeria\\1.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\LG\\42ln5700\\xasdas3623\\lg2.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\LG\\42ln5700\\xasdas3623\\lg3.png', '2018-07-13 22:30:14', '2018-10-04 15:09:23', 'Vendida', 3, 3, 'Cliente', 5000000, 4414, 'Contado', 1000),
(3, 'qlon', 'asde', '1wewqw', 4300, 'assets/galeria/28_24MT49S_Product image_09_Desk.jpg', NULL, NULL, '2018-09-13 04:38:07', '2018-09-25 13:13:04', 'En venta', 0, 3, 'Pendiente traslado', 0, 4560, 'Credito', 1500),
(4, 'Philips', '32pfl3508/f8', 'XA1A1404126727', 1800, 'assets/galeria/venta/Philips/32pfl3508/f8/0/front-32pfl3508hd.jpg', NULL, NULL, '2018-09-26 22:37:16', '2018-09-26 11:30:45', 'En venta', 3, 3, 'Cliente', 5000123, 4553, '', 0),
(5, 'Sharp', 'LC-60C6500U', '0', 10000, 'assets/galeria/venta/Sharp/LC-60C6500U/0/891aae93-e9cb-4a20-ad77-2ce1aa15498b.jpg', NULL, NULL, '2018-09-27 02:23:15', '2018-09-26 14:29:27', 'En venta', 3, 3, 'Pendiente traslado', 0, 4555, 'Credito', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asistencia_personal1` FOREIGN KEY (`personal_id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD CONSTRAINT `depositos_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reparar_tv`
--
ALTER TABLE `reparar_tv`
  ADD CONSTRAINT `reparar_tv_ibfk_1` FOREIGN KEY (`id_folio`) REFERENCES `clientes` (`id_folio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reparar_tv_ibfk_2` FOREIGN KEY (`id_folio`) REFERENCES `clientes` (`id_folio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

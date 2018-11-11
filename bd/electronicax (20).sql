-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-11-2018 a las 02:36:12
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `fecha`, `hora_entrada`, `hora_salida`, `cont_hoy`, `personal_id_personal`) VALUES
(1, '2018-09-28', '09:51:47', '13:39:15', 1, 1),
(2, '2018-09-28', '10:09:49', NULL, 0, 6),
(3, '2018-09-28', '10:16:15', '16:10:12', 1, 2),
(4, '2018-09-28', '13:07:59', NULL, 0, 3),
(5, '2018-10-01', '07:54:03', NULL, 0, 3),
(6, '2018-10-01', '15:28:05', NULL, 0, 6),
(7, '2018-10-01', '15:28:25', NULL, 0, 2),
(8, '2018-10-02', '10:12:31', NULL, 0, 2),
(9, '2018-10-02', '10:13:03', NULL, 0, 1),
(10, '2018-10-02', '14:08:35', '15:55:21', 1, 3),
(11, '2018-10-02', '14:17:58', '15:46:09', 1, 6),
(12, '2018-10-03', '08:29:53', NULL, 0, 1),
(13, '2018-10-03', '08:56:31', NULL, 0, 6),
(14, '2018-10-03', '09:10:38', NULL, 0, 3),
(15, '2018-10-04', '08:50:11', NULL, 0, 3),
(16, '2018-10-04', '09:53:09', '16:45:49', 1, 1),
(17, '2018-10-04', '16:45:58', NULL, 0, 2),
(18, '2018-10-05', '09:34:17', NULL, 0, 3),
(19, '2018-10-05', '11:15:03', NULL, 0, 1),
(20, '2018-10-06', '09:35:12', '12:30:03', 1, 1),
(21, '2018-10-06', '12:30:13', '14:50:12', 1, 2),
(22, '2018-10-06', '12:30:35', NULL, 0, 3),
(23, '2018-10-07', '10:46:48', NULL, 0, 1),
(24, '2018-10-08', '10:29:11', NULL, 0, 3),
(25, '2018-10-08', '15:25:22', NULL, 0, 1),
(26, '2018-10-09', '14:23:10', '17:42:02', 1, 1),
(27, '2018-10-09', '14:31:06', '15:10:08', 1, 3),
(28, '2018-10-09', '15:10:25', NULL, 0, 6),
(29, '2018-10-09', '17:42:10', '17:46:45', 1, 2),
(30, '2018-10-10', '10:19:46', NULL, 0, 1),
(31, '2018-10-10', '12:42:55', '13:26:30', 1, 3),
(32, '2018-10-11', '08:28:33', NULL, 0, 1),
(33, '2018-10-11', '08:56:39', NULL, 0, 3),
(34, '2018-10-12', '08:24:35', NULL, 0, 3),
(35, '2018-10-12', '08:42:40', NULL, 0, 1),
(36, '2018-10-12', '09:30:31', NULL, 0, 6),
(37, '2018-10-12', '09:49:06', NULL, 0, 5),
(38, '2018-10-12', '09:49:51', NULL, 0, 4),
(39, '2018-10-12', '10:02:47', '10:04:31', 1, 2),
(40, '2018-10-13', '08:15:33', NULL, 0, 3),
(41, '2018-10-14', '09:55:58', NULL, 0, 1),
(42, '2018-10-14', '10:02:33', NULL, 0, 6),
(43, '2018-10-14', '10:03:56', NULL, 0, 4),
(44, '2018-10-15', '08:53:30', NULL, 0, 4),
(45, '2018-10-15', '08:53:59', NULL, 0, 1),
(46, '2018-10-15', '09:07:19', NULL, 0, 3),
(47, '2018-10-25', '08:29:46', NULL, 0, 3),
(48, '2018-10-26', '08:58:10', NULL, 0, 3),
(49, '2018-11-07', '12:03:57', NULL, 0, 3),
(50, '2018-11-08', '09:23:19', '15:55:27', 1, 3),
(51, '2018-11-08', '10:09:31', NULL, 0, 6),
(52, '2018-11-08', '10:16:42', '14:21:46', 1, 2),
(53, '2018-11-09', '08:21:14', NULL, 0, 3),
(54, '2018-11-10', '08:27:53', '10:28:00', 1, 3),
(55, '2018-11-10', '08:28:59', '10:22:31', 1, 2),
(56, '2018-11-10', '08:29:17', '08:39:04', 1, 6),
(57, '2018-11-10', '10:28:08', '10:36:56', 1, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

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
(40, 2, '2018-10-01 21:31:37', 'Equipo numero 5000126 reparado, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(41, 3, '2018-10-02 20:17:23', 'Equipo 5000128 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(42, 1, '2018-10-02 20:28:21', 'Equipo 5000129 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(43, 2, '2018-10-02 21:58:55', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(44, 2, '2018-10-02 21:59:07', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(45, 2, '2018-10-02 23:33:22', 'Equipo 5000129 revisado por tecnico', 'Pendiente', 'Taller'),
(46, 2, '2018-10-02 23:33:49', 'Equipo numero 5000129 reparado, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(47, 3, '2018-10-02 23:53:19', 'Equipo 5000130 nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados'),
(48, 1, '2018-10-03 14:36:49', 'Equipo 5000131 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(49, 1, '2018-10-03 14:54:03', 'Equipo 5000132 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(50, 3, '2018-10-03 15:40:11', 'Equipo 5000133 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(51, 3, '2018-10-03 16:59:13', 'Equipo 5000134 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(52, 2, '2018-10-04 22:45:29', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(53, 2, '2018-10-04 22:46:34', 'Equipo 5000131 revisado por tecnico', 'Pendiente', 'Taller'),
(54, 2, '2018-10-04 22:47:21', 'Equipo numero 5000131 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(55, 2, '2018-10-04 22:47:21', 'Equipo numero 5000131 necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(56, 3, '2018-10-05 15:38:03', 'Equipo 5000134 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(57, 1, '2018-10-06 00:01:40', 'Equipo 5000135 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(58, 3, '2018-10-06 00:42:48', 'Equipo 5000136 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(59, 2, '2018-10-06 18:28:20', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(60, 2, '2018-10-06 18:30:53', 'Equipo 5000136 revisado por tecnico', 'Pendiente', 'Taller'),
(61, 3, '2018-10-06 18:34:12', 'Equipo 5000137 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(62, 3, '2018-10-06 18:46:50', 'Equipo 5000138 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(63, 3, '2018-10-06 18:52:59', 'Equipo numero 5000134 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(64, 3, '2018-10-06 18:52:59', 'Equipo numero 5000134 necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion'),
(65, 1, '2018-10-07 22:16:16', 'Equipo 5000139 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(66, 3, '2018-10-08 16:42:26', 'Equipo 5000140 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(67, 1, '2018-10-09 20:24:48', 'Equipo 5000141 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(68, 3, '2018-10-09 20:34:09', 'Equipo 5000142 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(69, 3, '2018-10-09 20:56:42', 'Equipo 5000143 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(70, 3, '2018-10-09 20:56:49', 'Equipo 5000144 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(71, 3, '2018-10-09 20:57:30', 'Equipo 5000145 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(72, 3, '2018-10-09 21:01:14', 'Equipo 5000146 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(73, 3, '2018-10-09 21:02:40', 'Equipo 5000147 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(74, 2, '2018-10-09 23:41:52', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(75, 2, '2018-10-09 23:42:56', 'Equipo 5000142 revisado por tecnico', 'Pendiente', 'Taller'),
(76, 2, '2018-10-09 23:45:38', 'Equipo numero 5000142 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(77, 1, '2018-10-10 16:22:02', 'Equipo 5000143 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(78, 6, '2018-10-12 15:36:07', 'Equipo numero 5000121 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(79, 6, '2018-10-12 15:38:14', 'Equipo numero 5000089 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(80, 2, '2018-10-12 16:44:08', 'Equipo numero 5000142 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(81, 6, '2018-10-12 16:48:12', 'Equipo numero 5000132 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(82, 6, '2018-10-12 18:00:20', 'Equipo numero 5000015 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(83, 2, '2018-10-12 18:00:53', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(84, 2, '2018-10-12 18:15:47', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(85, 2, '2018-10-12 18:17:43', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(86, 2, '2018-10-12 18:19:29', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(87, 2, '2018-10-12 18:19:53', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(88, 2, '2018-10-12 18:20:09', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(89, 2, '2018-10-12 18:20:30', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(90, 3, '2018-10-12 18:39:02', 'Equipo 5000144 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(91, 3, '2018-10-12 18:39:48', 'Equipo 5000145 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(92, 3, '2018-10-13 16:03:49', 'Equipo 5000146 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(93, 3, '2018-10-15 16:27:43', 'Equipo 5000147 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(94, 3, '2018-10-15 16:38:36', 'Equipo 5000148 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(95, 3, '2018-10-26 08:42:51', 'ikeelklk', 'Pendiente', 'Jefe de taller'),
(96, 3, '2018-10-26 08:45:34', 'Equipo numero 5000028 reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion'),
(97, 3, '2018-11-08 17:08:50', 'Equipo 5000149 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(98, 2, '2018-11-08 17:16:31', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(99, 2, '2018-11-08 22:52:31', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(100, 6, '2018-11-10 15:37:24', 'Equipo 5000150 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(101, 2, '2018-11-10 15:37:55', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico'),
(102, 2, '2018-11-10 15:41:39', 'Equipo numero 5000150 sin soluciÃ³n, en ruta a recepcion, solicitar cambio a cliente', 'Pendiente', 'Recepcion'),
(103, 2, '2018-11-10 15:41:39', 'Equipo numero 5000150 necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Mercado libre'),
(104, 2, '2018-11-10 15:43:37', 'Equipo numero 5000150 sin soluciÃ³n, en ruta a recepcion, solicitar cambio a cliente', 'Pendiente', 'Recepcion'),
(105, 2, '2018-11-10 16:07:56', 'Equipo 5000151 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(106, 2, '2018-11-10 16:32:23', 'Equipo 5000152 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(107, 3, '2018-11-10 18:55:03', 'Equipo 5000153 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(108, 3, '2018-11-10 21:21:04', 'Equipo 5000154 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(109, 3, '2018-11-10 21:22:48', 'Equipo 5000155 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(110, 3, '2018-11-10 21:25:06', 'Equipo 5000156 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(111, 3, '2018-11-10 21:28:28', 'Equipo 1 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(112, 3, '2018-11-10 21:30:00', 'Equipo 2 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(113, 3, '2018-11-10 21:52:38', 'Equipo 3 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(114, 3, '2018-11-10 21:53:41', 'Equipo 4 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(115, 3, '2018-11-10 21:55:36', 'Equipo 5 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(116, 3, '2018-11-10 22:00:13', 'Equipo 6 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados'),
(117, 3, '2018-11-10 22:04:38', 'Equipo 7 nuevo en recepcion, pasar a recoger', 'Pendiente', 'Traslados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carros`
--

CREATE TABLE IF NOT EXISTS `carros` (
  `id_carro` int(11) NOT NULL AUTO_INCREMENT,
  `car_id_marca` int(11) NOT NULL,
  `car_modelo` varchar(30) NOT NULL,
  `car_ano` int(11) NOT NULL,
  `car_tipo` varchar(30) NOT NULL,
  `car_estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id_carro`),
  KEY `car_id_marca` (`car_id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `carros`
--

INSERT INTO `carros` (`id_carro`, `car_id_marca`, `car_modelo`, `car_ano`, `car_tipo`, `car_estado`) VALUES
(1, 1, 'Raptor', 2009, 'Camioneta', 'En servicio'),
(2, 2, 'Xterra', 2010, 'Automovil', 'En reparacion'),
(8, 1, 'Ranger', 2010, 'Camioneta', 'Activo'),
(9, 2, 'Frontier', 2015, 'Camioneta', 'Activo');

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
  `conocio` varchar(50) NOT NULL,
  PRIMARY KEY (`id_folio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4584 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_folio`, `nombre`, `apellidos`, `direccion`, `correo`, `celular`, `fecha`, `puntos`, `conocio`) VALUES
(4414, 'ititiq', 'iwiwiwi', 'asdjx asd asd', 'dlesoi@hotmsil.com', '1', '2018-06-02 21:37:09', 0, ''),
(4415, 'Adilene ', 'Parra', '', '', '6241349428', '2018-06-04 20:45:59', 0, ''),
(4416, 'Daniel', 'Zatarain', '', '', '6241338064', '2018-06-05 16:44:54', 0, ''),
(4417, 'Maria Isabel', '', '', '', '6241096033', '2018-06-07 17:52:05', 0, ''),
(4418, 'Maria del Carmen', 'Na', 'Na', 'Na', '6241090102', '2018-06-11 15:04:39', 0, ''),
(4419, 'Valentin', 'Zavala', 'Na', 'Na', '6241825722', '2018-06-11 15:05:45', 0, ''),
(4420, 'Mario', 'Altuzar', 'Na', 'Na', '6241566501', '2018-06-11 15:06:19', 0, ''),
(4421, 'Juan', 'Ortega', 'Na', 'Na', '2231063255', '2018-06-11 17:49:21', 0, ''),
(4422, 'Rafael', 'Carreon', 'Na', 'Na', '2727844068', '2018-06-11 17:49:50', 0, ''),
(4423, 'Angel', 'Cota', 'San Jose Fracc Monterreal', 'Angel.teeven@hotmail.com', '6241009131', '2018-06-11 20:40:01', 0, ''),
(4424, 'Luis', 'Rosas', 'Lomas del sol', 'luisrosas.89@hotmail.com', '6242050580', '2018-06-12 15:18:38', 0, ''),
(4425, 'Jose Alfredo', 'Sanchez', 'Fracc. aurora', 'Na', '6241504245', '2018-06-12 15:23:26', 0, ''),
(4426, 'Marcelino', 'Vazquez Martinez', 'Na', 'Marcelino.vazquez.martinez@gmail.com', '6241582606', '2018-06-12 18:12:30', 0, ''),
(4427, 'Lourdes ', 'Jaramillo', '', 'Lourdes.leyca@hotmail.com', '6221522991', '2018-06-12 21:27:33', 0, ''),
(4428, 'Edgar', 'Gonzalez', '', '', '6242106497', '2018-06-13 01:27:14', 0, ''),
(4429, 'Esteban', 'Garbino', 'Na', 'Graciela.sosa@gmail.com', '6241848538', '2018-06-13 18:11:42', 0, ''),
(4430, 'Gloria', 'Hernandez', '4 de Marzo', 'Gloriahsierra@hotmail.com', '6241890554', '2018-06-16 20:19:26', 0, ''),
(4431, 'David', 'Toral Hernandez', 'Na', 'Na', '6241002477', '2018-06-16 21:11:21', 0, ''),
(4432, 'Jesus Emanuel', 'Saguilam', 'NA', 'NA', '6241751936', '2018-06-18 20:16:09', 0, ''),
(4433, 'Cesar ', 'Zamudio Sanchez', 'Na', 'Na', '6241911715', '2018-06-19 15:58:34', 0, ''),
(4434, 'Alfredo ', 'Reyes mendez', '', '', '6241611192', '2018-06-20 00:43:43', 0, ''),
(4435, 'Carina', 'Rojas', 'Na', 'Na', '6241479941', '2018-06-20 16:52:45', 0, ''),
(4436, 'Jose ', 'Mendoza diaz', '', '', '6241365461', '2018-06-21 00:54:41', 0, ''),
(4437, 'Jose luis', 'Estrada gama', '', 'Joseegama@gmail.com', '6241089881', '2018-06-21 01:16:38', 0, ''),
(4438, 'Victor', 'Ramos', 'Na', 'Na', '0', '2018-06-21 14:57:09', 0, ''),
(4439, 'Carlos', 'Torres', 'Na', 'Na', '6242184911', '2018-06-21 17:13:12', 0, ''),
(4440, 'Maria', 'Trinidad Alcaraz', 'Na', 'Na', '6241373490', '2018-06-21 18:23:30', 0, ''),
(4441, 'Jose Martin', 'Cruz Vega', 'Na', 'Na', '6241596785', '2018-06-22 15:46:25', 0, ''),
(4442, 'Eloina', 'Lara', 'Na', 'Na', '6241683172', '2018-06-22 17:38:41', 0, ''),
(4443, 'Bladimir', 'Calderon Lozano', 'Na', 'Bladimirk1017@gmail.com', '6241226987', '2018-06-23 15:09:00', 0, ''),
(4444, 'Dora Alicia', 'Aguas Rodriguez', 'NA', 'NA', '6241345566', '2018-06-23 17:28:43', 0, ''),
(4445, 'Jorge', 'Perez', 'Popazu', 'Na', '5515777938', '2018-06-25 17:51:15', 0, ''),
(4446, 'Carlos', 'Gaytan', 'Na', 'Na', '6241911182', '2018-06-25 19:43:59', 0, ''),
(4447, 'Catalina', 'Castañeda Guiterrez', 'Na', 'Na', '6241286916', '2018-06-25 21:36:12', 0, ''),
(4448, 'Daniel', 'Caudillo', 'Na', 'Na', '6241992688', '2018-06-25 22:04:41', 0, ''),
(4449, 'DULCE MARIA', 'MANZANILLA CALDERON', '', 'Lose098@hotmail.com', '6241297276', '2018-06-26 00:33:52', 0, ''),
(4450, 'usvaldo ', 'Vega felix', '', 'Usvaldovega@gmail.com', '6241587758', '2018-06-26 19:13:24', 0, ''),
(4451, 'Brenda ', 'Gutierrez', 'Caribe', 'Na', '6241153735', '2018-06-26 22:08:36', 0, ''),
(4452, 'Juan de Dios', 'Bautista García', 'Na', 'Na', '6243583586', '2018-06-26 22:22:57', 0, ''),
(4453, 'Sara', 'García', 'Na', 'Na', '6241416757', '2018-06-27 06:00:00', 0, ''),
(4454, 'Estela', 'Muñoz', 'Cariba', 'NA', '6242418931', '2018-06-27 06:00:00', 0, ''),
(4455, 'Jose Armando', 'Esquivel', 'NA', 'NA', '6241610672', '2018-06-27 12:00:00', 0, ''),
(4456, 'Angelica', 'Guzman', 'Na', 'Na', '6241366670', '2018-06-28 06:00:00', 0, ''),
(4457, 'Domingo', 'Calleja', 'Na', 'Na', '6242271889', '2018-06-28 17:46:22', 0, ''),
(4458, 'Francisco', 'Flores', 'Na', 'consorciomardecortez@gmail.com', '6241085561', '2018-06-28 17:49:28', 0, ''),
(4459, 'Jose Beksai', 'Zuñiga Tellez', 'na', 'na', '6241369555', '2018-06-29 19:59:11', 0, ''),
(4460, 'Javier', 'Picon', 'NA', 'NA', '6241277562', '2018-06-30 16:49:31', 0, ''),
(4461, 'Enrique', 'Gomez', 'na', 'na', '6241226923', '2018-07-02 20:03:56', 0, ''),
(4462, 'Humberto', 'Escoto', 'Na', 'humberto@loscabosagent.com', '6121477708', '2018-07-04 19:38:55', 0, ''),
(4463, 'Ana Rosa', 'Guzman', 'Francci. Santa fé', 'Na', '6241009722', '2018-07-04 23:12:25', 0, ''),
(4464, 'Marcos', 'Cid', 'Na', 'Na', '6241253647', '2018-07-06 15:50:33', 0, ''),
(4465, 'Juan', 'Lozano', 'Puesta del sol calle girasol, rejas negras', 'Na', '6242285077', '2018-07-06 22:25:41', 0, ''),
(4466, 'Filiberto ', 'Peralta', '', '', '6241848238', '2018-07-07 19:26:24', 0, ''),
(4467, 'Juan Felipe', 'Ortiz', 'Na', 'Juans32@live.com', '6241268782', '2018-07-07 23:04:55', 0, ''),
(4468, 'Adriana', 'Leal Castro', 'Na', 'Na', '6242126332', '2018-07-09 15:27:22', 0, ''),
(4469, 'Magda', 'Aguiluz', 'Na', 'Na', '6241286550', '2018-07-09 22:03:42', 0, ''),
(4470, 'Ivan', 'García Andrade', 'Na', 'Na', '6241277149', '2018-07-10 17:19:47', 0, ''),
(4471, 'Lorenzo Antonio', 'Hernandez Solis', 'Na', 'Na', '6242254805', '2018-07-11 14:52:32', 0, ''),
(4472, 'Janet', 'Sanchez', 'Na', 'Na', '6241598376', '2018-07-11 18:16:26', 0, ''),
(4473, 'Maria Luisa', 'Melendez', 'Na', 'Na', '6241086315', '2018-07-11 18:23:09', 0, ''),
(4474, 'Jose Pedro', 'Paladez', 'Na', 'Na', '6241797046', '2018-07-12 14:39:02', 0, ''),
(4475, 'Guillermo', 'Maldonado', 'Na', 'Na', '6241646333', '2018-07-12 18:54:28', 0, ''),
(4476, 'Cervando', 'Nuñez Ceseña', 'Na', 'chavezmarina723@gmail.com', '6692506782', '2018-07-12 20:18:07', 0, ''),
(4477, 'Marcos', 'Vinalay', 'Na', 'Na', '6241698650', '2018-07-13 19:24:37', 0, ''),
(4478, 'Lázaro', 'Diaz Gomez', 'Na', 'Na', '9212363707', '2018-07-13 20:47:50', 0, ''),
(4479, 'Moises', 'Muguia', 'Na', 'Na', '6241822985', '2018-07-14 18:41:52', 0, ''),
(4480, 'Ruben', 'Sanchez', 'Na', 'Admon@mktideas.com', '6241223613', '2018-07-16 17:03:40', 0, ''),
(4481, 'Irma', 'Gonzales', 'Na', 'Na', '6241515167', '2018-07-17 18:47:16', 0, ''),
(4482, 'Efren', 'Ronco', 'Na', 'Na', '6241332616', '2018-07-17 18:55:39', 0, ''),
(4483, 'Abel', 'Cervantes', 'Na', 'Gonormex62@gmail.com', '6461217550', '2018-07-18 18:11:27', 0, ''),
(4484, 'Maria de Lourdes', 'Gonzales Gonzales', 'Na', 'Na', '6241601382', '2018-07-18 19:48:42', 0, ''),
(4485, 'Joaquin ', 'Embarcadero Juarez', 'na', 'ej14joaquin@gmail.com', '7441355911', '2018-07-20 18:07:38', 0, ''),
(4486, 'Embarcación', 'Arise', 'Marina', 'Na', '0', '2018-07-20 19:47:27', 0, ''),
(4487, 'Carlos Alberto ', 'Velazquez', 'Na', 'Mexlay2@hotmail.com', '6241665475', '2018-07-24 17:57:41', 0, ''),
(4488, 'Luis', 'Gomez', 'Na', 'Na', '6242464119', '2018-07-24 19:17:24', 0, ''),
(4489, 'Pablo', 'Velez', 'Na', 'Na', '6241916540', '2018-07-24 21:15:59', 0, ''),
(4490, 'Raquel', 'Romero', 'Na', 'Na', '6241286437', '2018-07-24 21:34:28', 0, ''),
(4491, 'Fernando', 'Perez', 'Na', 'FERNANDOPEREZ.FA73@GMAIL.COM', '6241562593', '2018-07-25 16:58:33', 0, ''),
(4492, 'Carlos', 'García', 'Na', 'Carlosgarciacga1964@hotmail.com', '6241566264', '2018-07-25 17:28:06', 0, ''),
(4493, 'Juan Carlos', 'Cuella', 'Na', 'Juancarloscuella1@hotmail.com', '6241198194', '2018-07-25 20:27:19', 0, ''),
(4494, 'Marichuy', 'Castro Ramirez', 'Na', 'Na', '7541076881', '2018-07-26 21:09:17', 0, ''),
(4495, 'Maria del rosario ', 'Lopez montero', 'Na', 'Na', '6241776740', '2018-07-27 14:45:48', 0, ''),
(4496, 'Samuel', 'Dimas', 'Na', 'Na', '7321212543', '2018-07-27 14:57:46', 0, ''),
(4497, 'Mary Carmen', 'Ramos', 'Na', 'Na', '6241090102', '2018-07-27 22:15:06', 0, ''),
(4498, 'Joel ', 'Corvera', '', 'Joelcorvera21@outlook.es', '6241603639', '2018-07-28 18:02:32', 0, ''),
(4499, 'Citlali', 'Sandoval Hernandez', 'Na', 'Na', '6241802900', '2018-07-31 00:11:32', 0, ''),
(4500, 'Adilia', 'Siqueiros', 'Na', 'adiliasm@gmail.com', '6563223432', '2018-07-31 17:10:51', 0, ''),
(4501, 'Jessica', 'Jimenez Fuentes', 'Na', 'Jezzy_adiita@hotmail.com', '6241000829', '2018-07-31 21:30:20', 0, ''),
(4502, 'Yesenia', 'Vinalay', 'Na', 'Na', '6241364097', '2018-08-02 19:02:40', 0, ''),
(4503, 'Oriaan', 'Lopez Ruiz', 'Na', 'Oriaanlr26@hotmail.com', '6241001738', '2018-08-04 15:33:41', 0, ''),
(4504, 'Juan Carlos', 'Hernandez Alavez', 'Na', 'Na', '6241680913', '2018-08-06 17:55:07', 0, ''),
(4505, 'Pedro', 'Solis', 'Na', 'Pedrosoliscr52@gmail.com', '3314644307', '2018-08-06 18:47:37', 0, ''),
(4506, 'Wendy', 'Ceseña', 'Na', 'Patito_wendy@hotmail.com', '6241571101', '2018-08-06 20:38:03', 0, ''),
(4507, 'Rogelio', 'Mendez', 'Na', 'Vulcaniamxr@gmail.com', '6241452311', '2018-08-09 22:11:49', 0, ''),
(4508, 'Jesus ', 'Gutierrez', 'Na', 'jesus@viconsmateriales.com', '6241659374', '2018-08-11 17:43:24', 0, ''),
(4509, 'Diego', 'Gonzales', 'Na', 'Dgoglez7@gmail.com', '6241910280', '2018-08-16 18:15:33', 0, ''),
(4510, 'Agustin', 'Rodriguez', 'Na', 'Agustinrodriguezgallardo001@hotmail.com', '6241911155', '2018-08-18 17:26:28', 0, ''),
(4511, 'Eduardo', 'Diaz', 'Na', 'Na', '6241261627', '2018-08-18 18:23:50', 0, ''),
(4512, 'Sergio', 'Ortiz', 'Na', 'Na', '6241002111', '2018-08-20 15:52:59', 0, ''),
(4513, 'Dues Textil', 'SA de CV', 'Na', 'Marisela.perez@dues.com.mx', '0', '2018-08-20 17:27:07', 0, ''),
(4514, 'Carla janet', 'Guitierrez', 'Na', 'Na', '6241764609', '2018-08-20 17:54:35', 0, ''),
(4515, 'Sandy Arely', 'Castro Hidalgo', 'Na', 'Na', '6241756220', '2018-08-20 19:16:43', 0, ''),
(4516, 'Arturo', 'Galicia', 'Na', 'Lenny37@gmail.com', '6241663704', '2018-08-21 18:02:13', 0, ''),
(4517, 'Irene', 'Ortiz', 'Na', 'Na', '6241611798', '2018-08-22 19:07:37', 0, ''),
(4518, 'Laura', 'Flores', 'Na', 'Na', '6242382469', '2018-08-22 20:55:51', 0, ''),
(4519, 'Juan ', 'Ocampo', 'Na', 'J.m.ocampo@hotmail.com', '6241601669', '2018-08-23 00:42:14', 0, ''),
(4520, 'Sara', 'Magallanes', 'Na', 'Saraalimj@hotmail.com', '6241576038', '2018-08-25 00:35:16', 0, ''),
(4521, 'ANTONIA', 'NAVA', 'NA', 'NA', '6241910049', '2018-08-25 21:44:07', 0, ''),
(4522, 'Ricardo', 'Nuñez', 'Es rata :v', 'Na', '6242262717', '2018-08-27 17:13:46', 0, ''),
(4523, 'Camilo', 'Cisneros', 'Na', 'Na', '6241290172', '2018-08-27 19:18:42', 0, ''),
(4524, 'Jose Alberto', 'Diaz ', 'Na', 'Beto_y_7@hotmail.com', '6241179383', '2018-08-27 20:04:11', 0, ''),
(4525, 'Carlos', 'Martinez', 'Na', 'doningeniero@gmail.com', '6241658274', '2018-08-29 16:12:35', 0, ''),
(4526, 'Eliseo', 'Ramos', 'Na', 'Na', '6241863735', '2018-08-29 19:38:29', 0, ''),
(4527, 'Bladimir', 'Liborio Reyes', 'Na', 'Na', '6241805046', '2018-08-30 15:34:24', 0, ''),
(4528, 'Juan', 'Gonzales', 'Na', 'Na', '6242382018', '2018-08-30 23:28:31', 0, ''),
(4529, 'Francisco', 'Sanchez', 'Chula Vista', 'Na', '6242271065', '2018-08-31 22:32:27', 0, ''),
(4530, 'Lizbeth', 'Rosas', 'Na', 'Na', '6241607488', '2018-09-01 20:53:23', 0, ''),
(4531, 'Miguel', 'Morales ordaz', '', 'Moaljewelers@hotmail.com', '6241222076', '2018-09-04 16:39:45', 0, ''),
(4532, 'Angel rodriguez', 'Paz', 'Na', 'danipaz0807@gmail.com', '6241261881', '2018-09-05 00:21:46', 0, ''),
(4533, 'Florencio Apolinar', 'Barrios', 'Na', 'Na', '6241179335', '2018-09-05 16:21:28', 0, ''),
(4534, 'Mario Rafael', 'Blando', 'Na', 'Rcblando@gmail.com', '7442293462', '2018-09-05 17:47:58', 0, ''),
(4535, 'Victor Manuel', 'Acosta Arreola', 'Na', 'Arqvmaa@gmail.com', '6681467409', '2018-09-06 01:43:23', 0, ''),
(4536, 'Hector', 'Quintero', 'Na', 'Na', '6241574317', '2018-09-06 22:03:08', 0, ''),
(4537, 'Paulina', 'Olivares', 'Na', 'luisin007@hotmail.com', '6241323295', '2018-09-07 19:15:45', 0, ''),
(4538, 'Raul', 'Vargas', 'Na', 'marketing.playagrande@hotmail.com', '6241095079', '2018-09-10 19:27:34', 0, ''),
(4539, 'Jesus', 'Palafox', 'Na', 'Na', '6242259818', '2018-09-10 22:22:25', 0, ''),
(4540, 'Cabo ', 'Fitness', 'NA', 'nohemi_rosa@hotmail.com', '6241579716', '2018-09-11 14:37:08', 0, ''),
(4541, 'Joel', 'Villegas', 'Na', 'Na@na.com', '6241298555', '2018-09-11 19:25:47', 0, ''),
(4542, 'Carlos ', 'Hernandez', 'na', 'na@na.com', '6311883092', '2018-09-11 20:39:56', 0, ''),
(4543, 'Estefani', 'Lopez Rivas', 'Na', 'fanny_lopezrivas@yahoo.com', '6241924845', '2018-09-11 22:00:46', 0, ''),
(4544, 'Oscar ', 'Perez', 'Na', 'Na@na.com', '6241345342', '2018-09-13 18:58:59', 0, ''),
(4545, 'Jorge', 'Torres', 'Na', 'Na@na.com', '6242260793', '2018-09-13 22:06:28', 0, ''),
(4546, 'Humberto', 'Jimenez', 'Na', '', '6241259211', '2018-09-14 18:05:26', 0, ''),
(4547, 'Ricardo', 'Gonzales', 'Na', 'Na', '6241007104', '2018-09-15 15:45:24', 0, ''),
(4548, 'Lorena', 'Gonzales', 'NA', '', '6241767513', '2018-09-20 18:18:52', 0, ''),
(4549, 'Michael', 'Higuera Amador', 'Na', 'Na', '6242100500', '2018-09-22 20:18:25', 0, ''),
(4550, 'Esteban', 'Hinojosa', 'Na', 'Na', '6241511621', '2018-09-24 19:55:35', 0, ''),
(4551, 'Juan Carlos  ', 'Bernabe Siordia', 'Quintas california calle quinta sereno M-13 L-11', 'drjuancbs@gmail.com', '5525591182', '2018-09-25 03:41:52', 0, ''),
(4552, 'Alvaro', 'GarcÃ­a', 'NA', 'na', '6241131779', '2018-09-25 17:18:16', 0, ''),
(4553, 'Manuel', 'Moyado Cayetano', 'Lomas del sol 2nda etapa mza 50 lt 10', 'forever_lopez15@hotmail.com', '6242119048', '2018-09-26 15:13:28', 0, ''),
(4554, 'Papa Eloy', 'SA de CV', 'Blvd Marina #39 local K Col. Medano CP:23453 ', 'tomgonhd@yahoo.com', '5551024500', '2018-09-26 15:33:38', 0, ''),
(4555, 'Gustavo', 'DÃ­az', 'Baez', 'gdiazbaez@me.com', '4433373163', '2018-09-26 19:36:09', 0, ''),
(4556, 'Eduardo', 'Villegas', 'na', 'na', '6241580616', '2018-09-28 15:35:54', 0, ''),
(4557, 'Adan', 'Oregon', 'Na', 'Chitto0222@hotmail.com', '6241551700', '2018-10-01 15:53:12', 0, ''),
(4558, 'Julio', 'Cruz', 'Na', 'Cruzildefonso-78@hotmail.com', '6241693476', '2018-10-01 16:34:01', 0, ''),
(4559, 'Agustin', 'Angeles', 'Na', '', '6241133461', '2018-10-01 20:00:26', 0, ''),
(4560, 'Estefany', 'Saiza', 'Na', 'La_fanny_s@hotmail.com', '6241596706', '2018-10-02 20:09:32', 0, ''),
(4561, 'Daniela ', 'gonzalez delgado', 'na', 'daniiela_85@outlook.com', '6673168811', '2018-10-02 20:26:18', 0, ''),
(4562, 'Candido', 'Castillo', 'Na', '', '6241132373', '2018-10-02 23:50:51', 0, ''),
(4563, 'Sahara ', 'Ruiz Martinez', 'na', 'sahararuizcabo', '6241367954', '2018-10-03 00:23:19', 0, ''),
(4564, 'Javier ', 'Guevara de la Paz', 'na', 'the_ynoba_dc@hotmail.com', '6241357272', '2018-10-03 01:29:18', 0, ''),
(4565, 'Esteban ', 'Espinoza Irra', 'atras de calle corredor medico', 'story50@hotmail.com', '6241765540', '2018-10-03 14:31:45', 0, ''),
(4566, 'Ramon', 'Angel Ramirez', 'na', 'na', '6241510131', '2018-10-04 17:32:21', 0, ''),
(4567, 'Homero', 'Garcia', 'na', 'na', '6624461382', '2018-10-04 23:30:22', 0, ''),
(4568, 'Estela', 'Costich', 'Na', '', '6241857503', '2018-10-05 15:35:50', 0, ''),
(4569, 'Moises', 'Carmona', 'Na', 'Na', '6241661778', '2018-10-06 00:19:46', 0, ''),
(4570, 'Victoria', 'Guzman', 'Na', 'Na', '6241881548', '2018-10-06 00:38:03', 0, ''),
(4571, 'Alicia', 'Anderson', 'San Jose', 'Alinanderson9@gmail.com', '6242387295', '2018-10-06 18:43:55', 0, ''),
(4572, 'Jose antonio', 'Garcia', 'Na', '', '6242151849', '2018-10-06 20:50:52', 0, ''),
(4573, 'Amparo ', 'hernandez ', 'colonia palma homex ', 'amparolenarduzzi@hotmail.com', '6241579757', '2018-10-07 22:13:41', 0, ''),
(4574, 'Salome', 'Santacruz', 'na', '', '6242106164', '2018-10-08 16:41:17', 0, ''),
(4575, 'ana ', 'gomez', 'na', 'na', '6241134879', '2018-10-09 20:24:04', 0, ''),
(4576, 'Jose de Jesus', 'Almazan Salinas', 'na', '', '6243581840', '2018-10-09 20:32:27', 0, ''),
(4577, 'juan carlos', 'chan', 'na', '6241388572', '6241388572', '2018-10-10 16:20:41', 0, ''),
(4578, 'Yolanda', 'Biviana', 'Na', 'Na', '6241377685', '2018-10-10 19:49:45', 0, ''),
(4579, 'Miguel', 'Huerta', 'Na', 'Vidrierasgdl@hotmail.com', '6241333077', '2018-10-12 18:33:17', 0, ''),
(4580, 'Norberto', 'Lopez', 'Na', '', '6241507081', '2018-10-13 15:52:19', 0, ''),
(4581, 'Rosa Isela', 'Abaroa', 'Na', '', '6241342011', '2018-10-13 21:05:58', 0, ''),
(4582, 'putita', 'putito', 'asdads', 'nepe@hotmail.com', '12345123123', '2018-10-25 14:37:51', 0, 'Recomendacion'),
(4583, 'Joto', 'Mendez', 'na', '', '624666666', '2018-11-08 17:08:40', 0, 'Recomendacion');

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
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(25) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`) VALUES
(1, 'Ford'),
(2, 'Nissan'),
(3, 'Mazda');

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
(1, 'Administrador', 'Juan', 'c4ca4238a0b923820dcc509a6f75849b', 'Jorge ', 'Diaz', 'A', '0', 0),
(2, 'Tecnico', 'Tecnico', 'c4ca4238a0b923820dcc509a6f75849b', 'Roberto', 'x', 'x', '0', 0),
(3, 'Administrador', 'Isra', 'c4ca4238a0b923820dcc509a6f75849b', 'israel', 'martinez', 'promartinez2@gmail.com', '6241543710', 0),
(4, 'Jefe de Taller', 'Taller', 'c4ca4238a0b923820dcc509a6f75849b', 'X', 'X', 'X', '0', 0),
(5, 'Recepcion', 'recepcion', 'c4ca4238a0b923820dcc509a6f75849b', 'Recepcion', 'RSH', 'Na', '0', 0),
(6, 'Traslado', 'traslado', 'c4ca4238a0b923820dcc509a6f75849b', 'Pedrito', 'Sola', 'Na', '0', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=479 ;

--
-- Volcado de datos para la tabla `refacciones_tv`
--

INSERT INTO `refacciones_tv` (`Id_refacciones`, `tipo`, `marca`, `modelo`, `ubicacion`, `estado`, `precio`, `fecha_entrada`, `fecha_salida`, `etiqueta_1`, `etiqueta_2`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `link`, `id_personal`) VALUES
(35, 'FUENTE DE PODER', 'SONY', 'KDL-40EX520', 'CAJA 1', 'Publicada', 1299, '2018-10-10 20:20:21', NULL, '1-474-287-11', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-599832121-fuente-de-poder-sony-kdl-40ex520-1-474-287-11-_JM', 1),
(36, 'MAIN', 'SAMSUNG', 'P151E450A1F', 'CAJA 1', 'Pendiente', 0, '2018-10-10 20:34:14', NULL, 'BN96-2097A', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(37, 'FUENTE', 'SONY', 'KDL-32FA600', 'CAJA 1', 'Publicada', 1299, '2018-10-10 20:36:18', NULL, 'APS-254', '147420211', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611252449-fuente-de-poder-sony-kdl-32fa600-aps-254-147420211-_JM', 3),
(38, 'FUENTE DE PODER', 'SAMSUNG', 'PL51E490B4F', 'CAJA 1', 'Publicada', 1099, '2018-10-10 20:40:29', NULL, 'BN44-00509B', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611271194-fuente-de-poder-samsung-pl51e490b4f-bn44-00509b-_JM', 1),
(39, 'INVERTER', 'SONY', 'KDL-32FA600', 'CAJA 1', 'Publicada', 600, '2018-10-10 20:40:53', NULL, 'KDL-32FA600', 'SSI400_10B01', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611255433-backlight-inversor-sony-kdl-32fa600-ssi40010b01-_JM', 3),
(40, 'FUENTE DE PODER', 'SAMSUNG', 'PL5TE450ATF', 'CAJA 1', 'Pendiente', 0, '2018-10-10 20:45:46', NULL, 'LJ41-10181A', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(41, 'FUENTE', 'SONY', 'KDL-40R450A', 'CAJA 1', 'Publicada', 1049, '2018-10-10 20:45:56', NULL, 'APS-349', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-616945653-fuente-de-poder-sony-kdl-40r450a-aps-349-_JM', 3),
(42, 'FUENTE DE PODER', 'LG', '32LX4DCS ', 'CAJA 1', 'Publicada', 1000, '2018-10-10 20:52:28', NULL, 'LA53A', '68709M0722B', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611260993-tarjeta-main-lg-32lx4dcs-la53a-68709m0722b-_JM', 1),
(43, 'FUENTE DE PODER', 'LG', '32LX4DCS', 'CAJA 1', 'Publicada', 1300, '2018-10-10 20:53:17', NULL, '6871TPT303B', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611258083-fuente-de-poder-lg-32lx4dcs-6871tpt303b-_JM', 1),
(44, 'INVERTER ESCLAVO', 'LG', '32LX4DCS', 'CAJA 1', 'Publicada', 500, '2018-10-10 20:54:30', NULL, 'LC320201', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647156244-backlight-inverter-esclavo-lg-32lx4dcs-6632l-0208b-_JM', 1),
(45, 'MAIN', 'SAMSUNG', 'UN46FH5005', 'CAJA 1', 'Publicada', 1499, '2018-10-10 20:54:58', NULL, 'BN94-06190Y', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647157970-tarjeta-main-samsung-un46fh5005-bn94-06190y-_JM', 3),
(46, 'INVERTER MASTER', 'LG', '32LX4DCS', 'CAJA 1', 'Pendiente', 0, '2018-10-10 20:55:23', NULL, 'LC320W01', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(47, 'LEDS Y BOCINAS', 'SAMSUNG', 'UN46FH5005', 'CAJA 1', 'Pendiente', 0, '2018-10-10 20:55:31', NULL, 'VARIAS', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(48, 'FUENTE DE PODER', 'SAMSUNG', 'PL43E400U1F', 'CAJA 1', 'Publicada', 0, '2018-10-10 21:01:17', NULL, 'BN44-0053TA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(49, 'BUFFER', 'SAMSUNG', 'PL43E400U1F', 'CAJA 1', 'Pendiente', 0, '2018-10-10 21:04:11', NULL, 'LJ41-10283A', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(50, 'MAIN', 'SAMSUNG', 'PL43E400U1F', 'CAJA 1', 'Publicada', 0, '2018-10-10 21:06:36', NULL, 'BN96-24638A', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(51, 'LOGICA', 'PHILIPS', '42FD9954', 'CAJA 1', 'Publicada', 750, '2018-10-10 21:06:49', NULL, 'NA26701-B441', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611439140-tarjeta-logica-philips-42fd9954-handa-na26701-b441-_JM', 3),
(52, 'BUFFER', 'SAMSUNG', 'PL43E400U1F', 'CAJA 1', 'Publicada', 0, '2018-10-10 21:07:22', NULL, 'LJ92-01895A', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(53, 'MAIN', 'PHILIPS', '42FD9954', 'CAJA 1', 'Pendiente', 0, '2018-10-10 21:07:27', NULL, '32221236001', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(54, 'MAIN', 'SAMSUNG', 'PL43E400U1F', 'CAJA 1', 'Publicada', 1249, '2018-10-10 21:11:29', NULL, 'BN96-24638A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611429721-tarjeta-main-samsung-bn96-24638a-pl43e400u1f-_JM', 1),
(55, 'MAIN', 'POLAROID', '32056-TDEBBD', 'CAJA 1', 'Publicada', 900, '2018-10-10 21:13:34', NULL, ' TP.MS3393.P86', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-613094669-tarjeta-main-polaroid-32056-tdebbd-tpms3393p86-_JM', 3),
(56, 'FUENTE', 'HISENSE', '39K310', 'CAJA 1', 'Publicada', 900, '2018-10-10 21:15:11', NULL, 'RSAG7.820.5025/ROH', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611922865-fuente-de-poder-hisense-161873-rsag78205025roh-39k310-_JM', 3),
(57, 'MAIN', 'SAMSUNG', 'UN26C4000PDXZX', 'CAJA 1', 'Publicada', 999, '2018-10-10 21:18:25', NULL, 'BN94-03794E', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611285262-tarjeta-main-samsung-un26c4000pdxzx-bn94-03794e-_JM', 3),
(58, 'FUENTE DE PODER', 'PANASONIC', 'TH-42PD25', 'CAJA 1', 'Publicada', 1150, '2018-10-10 21:18:36', NULL, 'TNPA2841AH', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611409689-fuente-de-poder-panasonic-tnpa2841ah-th-42pd25-_JM', 1),
(59, 'YSUS', 'PANASONIC', 'TH-42PD25', 'CAJA 1', 'Publicada', 899, '2018-10-10 21:22:37', NULL, 'TNPA2867', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611411139-ysus-panasonic-th-42pd25-tnpa2867-_JM', 1),
(60, 'XSUS', 'PANASONIC', 'TH-42PD25', 'CAJA 1', 'Publicada', 800, '2018-10-10 21:23:54', NULL, 'TNPA2873 ', 'TNPA2871AE', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611412339-xsus-panasonic-tnpa2871ae-tnpa2873-tnpa2872-th-42pd25-_JM', 1),
(61, 'PROCESADORA DE AUDIO ', 'PANASONIC', 'TH-42PD25', 'CAJA 1', 'Publicada', 700, '2018-10-10 21:24:56', NULL, 'TNPA2884AB ', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611414072-procesadora-de-audio-panasonic-tnpa2884ab-th-42pd25-_JM', 1),
(62, 'INVERTER', 'LG', 'M237WD', 'CAJA 1', 'Pendiente', 0, '2018-10-10 21:24:58', NULL, 'YP2604L', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(63, 'MAIN', 'PANASONIC', 'TH-42PD25', 'CAJA 1', 'Publicada', 750, '2018-10-10 21:25:44', NULL, 'TNPA2825', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611416306-main-logica-panasonic-tnpa2825-th-42pd25-_JM', 1),
(64, 'BUFFER SD', 'PANASONIC', 'TH-42PD25', 'CAJA 1', 'Publicada', 500, '2018-10-10 21:26:52', NULL, 'TNPA2958AB', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611421935-buffer-sd-panasonic-tnpa2958ab-th-42pd25-_JM', 1),
(65, 'INVERTER', 'SANYO', 'L390H1', 'CAJA 1', 'Publicada', 1199, '2018-10-10 21:35:44', NULL, '27-D074976', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647158948-led-driver-sanyo-l390h1-27-d074976-_JM', 3),
(66, 'YSUS', 'HITACHI', 'P50S601', 'CAJA 2', 'Pendiente', 0, '2018-10-10 21:44:58', NULL, 'JP56431', '', NULL, NULL, NULL, NULL, NULL, 'na', 3),
(67, 'MAIn', 'HITACHI', 'P50S601', 'CAJA 2', 'Pendiente', 0, '2018-10-10 21:46:14', NULL, 'JP55121', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(68, 'MAIn', 'HITACHI', 'P50S601', 'CAJA 2', 'Pendiente', 0, '2018-10-10 21:46:15', NULL, 'JP55121', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(69, 'FUENTE', 'HITACHI', 'P50S601', 'CAJA 2', 'Pendiente', 0, '2018-10-10 21:47:18', NULL, 'MPF7726L', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(70, 'FUENTE DE PODER', 'SONY', 'KDL-32EX420', 'CAJA 2', 'Publicada', 1350, '2018-10-10 21:47:44', NULL, 'APS-288', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-599748535-fuente-de-poder-sony-kdl-32ex420-1-474-277-12-aps-288ch-_JM', 1),
(71, 'XSUS', 'HITACHI', 'P50S601', 'CAJA 2', 'Pendiente', 0, '2018-10-10 21:54:59', NULL, 'JP56421', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(72, 'MAIN', 'HISENSE', '39K310', 'CAJA 2', 'Publicada', 1099, '2018-10-10 21:55:04', NULL, 'RSAG7.820.5028', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611924164-main-hisense-161755-rsag78205028roh-modelo-39k310-_JM', 1),
(73, 'LOGICA', 'HITACHI', 'P50S601 ', 'CAJA 2', 'Publicada', 1250, '2018-10-10 21:59:11', NULL, 'JP54681', 'JA08521 ', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-646909080-logica-hitachi-p50s601-ja08521-jp54681-_JM', 3),
(74, 'INVERTER', 'SONY', 'KDL-40SL150 ', 'CAJA 2', 'Publicada', 600, '2018-10-10 21:59:39', NULL, 'SSB400W12S01', 'LJ97-02129A LJ97-0207', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-612299190-inverter-sony-kdl-40sl150-ssb400w12s01-lj97-02129a-lj97-0207-_JM', 1),
(75, 'PAR BUFFERS', 'LG', 'DU-42PX12X', 'CAJA 2', 'Publicada', 1450, '2018-10-10 22:00:52', NULL, '6870QDH001B', '6870QFH001A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-639636770-par-de-buffers-lg-du-42px12x-6870qfh001a-6870qdh001b-_JM', 3),
(76, 'ZSUS', 'LG', 'DU-42PX12X', 'CAJA 2', 'Publicada', 700, '2018-10-10 22:01:43', NULL, '6871QZH034C', '6870QZH001D', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638753362-zsus-lg-du-42px12x-6871qzh034c-6870qzh001d-_JM', 3),
(77, 'FUENTE', 'LG', 'DU-42PX12X', 'CAJA 2', 'Pendiente', 0, '2018-10-10 22:02:17', NULL, '3501Q0055A', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(78, 'FUENTE DE PODER', 'LG', '47LY760H ', 'CAJA 2', 'Publicada', 1299, '2018-10-10 22:03:56', NULL, 'EAX65423801(2.2)', 'LGP474950-14PL2', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-639194111-fuente-de-poder-lg-47ly760h-eax6542380122-lgp474950-14pl2-_JM', 1),
(79, 'FUENTE DE PODER', 'PHILLIPS', '37HL5560D/27', 'CAJA 2', 'Pendiente', 0, '2018-10-10 22:09:50', NULL, 'PLHL-T605B/T606B', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(80, 'MAIN', 'PANASONIC', 'TH-42PA20', 'CAJA 2', 'Publicada', 1249, '2018-10-10 22:16:41', NULL, 'TNPA2816 ', 'TNPA2817', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611590459-panasonic-main-tnpa2816-e-input-tnpa2817-th-42pa20-_JM', 1),
(81, 'FUENTE DE PODER', 'LG', '49UB8500', 'CAJA 2', 'Publicada', 1049, '2018-10-10 22:21:03', NULL, 'EAX65613901', 'LGP4955-14L ', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611685952-fuente-de-poder-49ub8500-lgp4955-14l-eax65613901-16-_JM', 1),
(83, 'FUENTE', 'PIONEER', 'PLE-3902FHD', 'CAJA 2', 'Publicada', 999, '2018-10-11 14:58:33', NULL, 'TV3205-ZC02-01', '303C3205061', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647160356-fuente-pioneer-ple-3902fhd-tv3205-zc02-01-303c3205061-_JM', 3),
(85, 'MAIN', 'PIONEER', 'PLE-3902FHD', 'CAJA 2', 'Publicada', 899, '2018-10-11 15:01:23', NULL, 'M23/G31990/13', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647160667-tarjeta-main-pioneer-ple-3902fhd-m23g3199013-_JM', 3),
(86, 'BOCINAS', 'PIONEER', 'PLE-3902fHD', 'CAJA 2', 'Pendiente', 0, '2018-10-11 15:01:56', NULL, 'M23/G31990/13', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(87, 'TECLADO', 'PIONEER', 'PLE-3902fHD', 'CAJA 2', 'Pendiente', 0, '2018-10-11 15:02:05', NULL, 'M23/G31990/13', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(88, 'BUFFER XR', 'LEXUS', 'LXTV4210PDP', 'CAJA 2', 'Publicada', 700, '2018-10-11 15:25:58', NULL, 'EBR39707601', 'EAX39542501', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611401107-buffer-xr-lexus-lxtv4210pdp-ebr39707601-eax39542501-_JM', 3),
(89, 'BUFFER XL', 'LEXUS', 'LXTV4210PDP', 'CAJA 2', 'Publicada', 700, '2018-10-11 15:26:39', NULL, 'EBR39707801', 'EAX39541501', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611402301-buffer-xl-lexus-lxtv4210pdp-ebr39707801-eax39541501-_JM', 3),
(90, 'LOGICA', 'LEXUS', 'LXTV4210PDP', 'CAJA 2', 'Publicada', 700, '2018-10-11 15:27:32', NULL, 'EBR39708501', 'EAX39649001', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611402728-logica-lexus-lxtv4210pdp-ebr39708501-eax39649001-_JM', 3),
(91, 'YSUS', 'LEXUS', 'LXTV4210PDP', 'CAJA 2', 'Publicada', 1250, '2018-10-11 15:28:59', NULL, 'EBR39698601', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611396197-y-sus-lexus-lxtv4210pdp-ebr39698601-_JM', 3),
(92, 'ZSUS', 'LEXUS', 'LXTV4210PDP', 'CAJA 2', 'Publicada', 1150, '2018-10-11 15:29:25', NULL, 'EBR39707001', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611396991-z-sus-lexus-lxtv4210pdp-ebr39707001-_JM', 3),
(93, 'FUENTE', 'LG', '42PG30', 'CAJA 2', 'Publicada', 999, '2018-10-11 15:36:15', NULL, 'PSPU-J704A', '2300KEG023A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611394579-fuente-de-poder-lg-42pg30-pspu-j704a-2300keg023a-_JM', 3),
(94, 'FUENTE', 'LG', '37LC7D ', 'CAJA 3', 'Publicada', 1000, '2018-10-11 15:42:04', NULL, 'EAX32268301', 'EAY34796801', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647036531-fuente-de-poder-lg-37lc7d-eax32268301-_JM', 3),
(95, 'MAIN', 'LG', '42LP645H', 'CAJA 3', 'Publicada', 1349, '2018-10-11 15:47:06', NULL, 'EBT62559404', 'EAX65085601(1.2)', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-599935378-tarjeta-main-lg-42lp645h-ebt62559404-eax6508560112-_JM', 3),
(96, 'FUENTE', 'LG', '47ln5790 ', 'CAJA 3', 'Publicada', 1550, '2018-10-11 15:49:45', NULL, 'EAX64905501(2.2) ', 'LGP4750-13PL2', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621627360-fuente-de-poder-lg-47ln5790-eax6490550122-lgp4750-13pl2-_JM', 3),
(97, 'FUENTE', 'LG', '42LB5800', 'CAJA 3', 'Publicada', 1700, '2018-10-11 15:53:14', NULL, 'EAX65423701', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621501125-tarjeta-fuente-lg-42lb5800-eax65423701-_JM', 3),
(98, 'MAIN', 'SAMSUNG', 'LN37D560F9HXZA', 'CAJA 3', 'Publicada', 1300, '2018-10-11 15:54:45', NULL, 'BN94-04992A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-615782221-tarjeta-main-samsung-ln37d560f9hxza-bn94-04992a-_JM', 3),
(99, 'MAIN', 'SAMSUNG', 'LN37D560F9HXZA', 'CAJA 3', 'Publicada', 1300, '2018-10-11 15:55:04', NULL, 'BN94-04992A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-615782221-tarjeta-main-samsung-ln37d560f9hxza-bn94-04992a-_JM', 3),
(100, 'LEDS Y BOCINAS', 'PHILIPS', '39PFL4408/F8', 'CAJA 3', 'Pendiente', 0, '2018-10-11 15:56:05', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(101, 'MAIN', 'SAMSUNG', 'LN32B36C5D', 'CAJA 3', 'Publicada', 1200, '2018-10-11 15:59:59', NULL, 'BN96-11408B', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-615783900-tarjeta-main-samsung-ln32b36c5d-bn96-11408b-_JM', 3),
(102, 'MAIN', 'LG', '47LB6100', 'CAJA 3', 'Publicada', 1750, '2018-10-11 16:01:17', NULL, 'EAX65610206(1.0)', 'EBT62955905', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621627006-tarjeta-main-lg-47lb6100-eax6561020610-ebt62955905-_JM', 3),
(103, 'FUENTE', 'LG', '42LM5800', 'CAJA 3', 'Publicada', 1150, '2018-10-11 16:05:43', NULL, 'EAX64427101(1.4)', 'EAY62608901', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-621628752-fuente-de-poder-lg-42lm5800-eax6442710114-eay62608901-_JM', 3),
(104, 'FUENTE', 'LG', '42LM5800', 'CAJA 3', 'Publicada', 1150, '2018-10-11 16:05:50', NULL, 'EAX64427101(1.4)', 'EAY62608901', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-621628752-fuente-de-poder-lg-42lm5800-eax6442710114-eay62608901-_JM', 3),
(105, 'FUENTE', 'LG', '42LM5800', 'CAJA 3', 'Publicada', 1150, '2018-10-11 16:06:18', NULL, 'EAX64427101(1.4)', 'EAY62608901', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-621628752-fuente-de-poder-lg-42lm5800-eax6442710114-eay62608901-_JM', 3),
(106, 'FUENTE', 'SONY', 'KDL-40EX520', 'CAJA 3', 'Publicada', 1299, '2018-10-11 16:09:25', NULL, '1-474-287-11', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-599832121-fuente-de-poder-sony-kdl-40ex520-1-474-287-11-_JM', 3),
(107, 'TCON', 'SONY', 'KDL-40EX520', 'CAJA 3', 'Publicada', 799, '2018-10-11 16:14:17', NULL, 'LJ94-16524B', 'ESL_MB7_C2LV1.3', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647162962-tcon-sony-kdl-40ex520-lj94-16524b-_JM', 3),
(108, 'FUENTE', 'LG', '60LB5830', 'CAJA 3', 'Publicada', 1500, '2018-10-11 16:16:32', NULL, 'EAX65423801(2.1)', 'LGP474950-14PL2', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621629446-fuente-de-poder-lg-49lb5550-eax6542380121-lgp474950-14pl2-_JM', 3),
(109, 'MAIN', 'PHILIPS', '40PFL4609', 'CAJA 3', 'Publicada', 1349, '2018-10-11 16:23:01', NULL, 'BA3RM0G0401', 'A4DPB014', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-599838913-tarjeta-main-philips-40pfl4609-ba3rm0g0401-a4dpb014-_JM', 3),
(110, 'FUENTE', 'LG', '50LB5830', 'CAJA 3', 'Publicada', 1650, '2018-10-11 16:26:03', NULL, 'EAX65423801(2.2)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620838014-fuente-de-poder-lg-50lb5830-fuente-eax6542380122-_JM', 3),
(111, 'LEDS Y BOCINAS', 'LG', '50LB5830', 'CAJA 3', 'Pendiente', 0, '2018-10-11 16:26:16', NULL, 'EAX65423801(2.2)', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(112, 'MAIN', 'SAMSUNG', 'UN32EH4003 ', 'CAJA 3', 'Publicada', 1200, '2018-10-11 16:27:36', NULL, 'BN94-06008Y', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-615785874-tarjeta-main-samsung-un32eh4003-bn94-06008y-_JM', 3),
(113, 'MAIN', 'LG', '24LF4520', 'CAJA 3', 'Publicada', 1149, '2018-10-11 16:34:24', NULL, 'EAX66164803(1.1)', 'EBU63005907', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-599838068-tarjeta-main-lg-24lf4520-ebu63005907-eax6616480311-_JM', 3),
(114, 'BOTONERA Y BOCINAS', 'LG', '24LF4520', 'CAJA 3', 'Pendiente', 0, '2018-10-11 16:35:04', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(115, 'FUENTE', 'SONY', 'KDL-40R450A', 'CAJA 3', 'Publicada', 1049, '2018-10-11 16:38:42', NULL, 'APS-349', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-616945653-fuente-de-poder-sony-kdl-40r450a-aps-349-_JM', 3),
(116, 'MAIN', 'SAMSUNG', 'PL43E450A1F', 'CAJA 3', 'Publicada', 1299, '2018-10-11 17:26:17', NULL, 'BN94-06498A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647170241-tarjeta-main-samsung-pl43e450a1f-bn94-06498a-_JM', 3),
(117, 'MAIN', 'LG', '40UB8000', 'CAJA 3', 'Publicada', 1799, '2018-10-11 17:27:07', NULL, 'EAX66085703(1.0)', 'EBT63453903', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647161497-tarjeta-main-lg-40ub8000-eax6608570310-ebt63453903-_JM', 3),
(118, 'MAIN', 'PANASONIC', 'TC-L42E3', 'CAJA 3', 'Publicada', 1499, '2018-10-11 17:34:07', NULL, 'TNPH0926', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647169875-tarjeta-main-panasonic-tc-l42e3-tnph0926-_JM', 3),
(119, 'MAIN', 'AOC', 'L32W961', 'CAJA 4', 'Publicada', 800, '2018-10-11 17:41:29', NULL, '715G3269-M01-001-005K', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-642520311-tarjeta-main-aoc-l32w961-715g3269-m01-001-005k-_JM', 3),
(120, 'FUENTE', 'LG', '42LB5600', 'CAJA 4', 'Publicada', 1200, '2018-10-11 17:44:58', NULL, 'EAX65423701(2.0)', 'LGP3942-14PL1', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-615991728-fuente-de-poder-lg-42lb5600-eax6542370120-_JM', 3),
(121, 'MAIN', 'SAMSUNG', 'PL42A410', 'CAJA 4', 'Publicada', 1000, '2018-10-11 17:45:59', NULL, 'BN41-01054A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624055773-tarjeta-main-samsung-pl42a410-bn41-01054a-_JM', 3),
(122, 'FUENTE', 'SAMSUNG', 'UN50EH5000FXZA', 'CAJA 4', 'Publicada', 1250, '2018-10-11 17:51:34', NULL, 'BN44-00668A', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-604126026-fuente-de-poder-samsung-un40eh5000fxza-bn44-00496a-_JM', 3),
(123, 'FUENTE', 'SAMSUNG', 'UN50EH5000FXZA', 'CAJA 4', 'Publicada', 1250, '2018-10-11 17:54:41', NULL, 'BN44-00668A', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-604126026-fuente-de-poder-samsung-un40eh5000fxza-bn44-00496a-_JM', 3),
(124, 'FUENTE', 'LG', '42LM5800 ', 'CAJA 4', 'Publicada', 1150, '2018-10-11 17:57:25', NULL, 'EAX64427101(1.4) ', 'EAY62608901', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621628752-fuente-de-poder-lg-42lm5800-eax6442710114-eay62608901-_JM', 3),
(125, 'FUENTE', 'LG', '42LM5800 ', 'CAJA 4', 'Publicada', 1150, '2018-10-11 17:57:29', NULL, 'EAX64427101(1.4) ', 'EAY62608901', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621628752-fuente-de-poder-lg-42lm5800-eax6442710114-eay62608901-_JM', 3),
(126, 'FUENTE', 'LG', '42LV3500', 'CAJA 4', 'Publicada', 1300, '2018-10-11 17:58:49', NULL, 'EAX63729001/8', 'EAY62171601', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-612411633-fuente-de-poder-lg-42lv3500-eay62171601-eax637290018-_JM', 3),
(127, 'MAIN', 'INSIGNIA', 'NS-46E570A11', 'CAJA 4', 'Publicada', 1400, '2018-10-11 18:03:12', NULL, '715G3817-M01-000-005K', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620864045-tarjeta-main-insignia-ns-46e570a11-715g3817-m01-000-005k-_JM', 3),
(128, 'MAIN', 'TOSHIBA', '50L2400UM', 'CAJA 4', 'Publicada', 1300, '2018-10-11 18:05:20', NULL, 'VTV-L40617', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638977092-tarjeta-main-toshiba-50l2400um-vtv-l40617-_JM', 3),
(129, 'FUENTE', 'SAMSUNG', 'UN32H4050FXZA', 'CAJA 4', 'Publicada', 800, '2018-10-11 18:08:13', NULL, 'BN44-00492A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616799966-fuente-de-poder-samsung-un32h4050fxza-bn44-00492a-_JM', 3),
(130, 'MAIN', 'SAMSUNG', 'LN40A330J1DXZA', 'CAJA 4', 'Publicada', 1100, '2018-10-11 18:10:05', NULL, 'BN97-02463F', 'BN94-02071F', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-615789255-tarjeta-main-samsung-ln40a330j1dxza-bn97-02463f-bn94-02071f-_JM', 3),
(131, 'FUENTE', 'LG', '42LB5500', 'CAJA 4', 'Publicada', 1149, '2018-10-11 18:14:11', NULL, 'EAX65423701(1.9)', 'LGP3942-14PL1', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-596347580-fuente-de-poder-lg-42lb5500-lgp3942-14pl1-eax6542370119-_JM', 3),
(132, 'FUENTE', 'LG', '42LB5500', 'CAJA 4', 'Publicada', 1149, '2018-10-11 18:14:16', NULL, 'EAX65423701(1.9)', 'LGP3942-14PL1', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-596347580-fuente-de-poder-lg-42lb5500-lgp3942-14pl1-eax6542370119-_JM', 3),
(133, 'MAIN', 'SAMSUNG', 'UN32FH4005F', 'CAJA 4', 'Publicada', 1100, '2018-10-11 18:16:14', NULL, 'BN94-06190H', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620863622-tarjeta-main-samsung-un32fh4005f-bn94-06190h-_JM', 3),
(134, 'FUENTE', 'SAMSUNG', 'UN40FH6030', 'CAJA 4', 'Vendida', 1012, '2018-10-11 18:22:01', NULL, 'BN44-00552A', 'PSLF930C04D', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647171053-fuente-de-poder-samsung-un40fh6030-bn44-00552a-_JM', 3),
(135, 'LED DRIVER', 'LG', '42LV3500', 'CAJA 4', 'Publicada', 900, '2018-10-11 18:27:13', NULL, '3PEGC20008B-R', '6917L-0061B', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624055000-led-driver-rca-dedm500m-3pegc20008b-r-_JM', 3),
(136, 'MAIN', 'SAMSUNG', 'HG40NA578', 'CAJA 4', 'Publicada', 1450, '2018-10-11 18:29:37', NULL, 'BN94-06036K', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647060199-tarjeta-main-samsung-hg40na578-bn94-06036k-_JM', 3),
(137, 'MAIN', 'SAMSUNG', 'LN40E5507F7XZX', 'CAJA 4', 'Publicada', 1499, '2018-10-11 18:33:09', NULL, 'BN96-23581A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647170632-tarjeta-main-samsung-ln40e5507f7xzx-bn96-23581a-_JM', 3),
(138, 'FUENTE', 'PHILIPS', '32HFL5561V27', 'CAJA 4', 'Publicada', 950, '2018-10-11 18:35:57', NULL, '3PAGC10005B-R', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616798607-fuente-de-poder-philips-32hfl5561v27-3pagc10005b-r-_JM', 3),
(139, 'TARJETA SELECTOR', 'SONY', 'KDL-40W600B', 'CAJA 4', 'Publicada', 1200, '2018-10-11 18:43:29', NULL, 'A2063361B', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616801314-tarjeta-selector-sony-kdl-40w600b-a2063361b-_JM', 3),
(140, 'TARJETA LDHM', 'SONY', 'KDL-40W600B', 'CAJA 4', 'Pendiente', 0, '2018-10-11 18:45:26', NULL, '1-893-573-11', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(141, 'TECLADO', 'SONY', 'KDL-40W600B', 'CAJA 4', 'Pendiente', 0, '2018-10-11 18:46:37', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(142, 'FUENTE', 'LG', '47LA6900', 'CAJA 4', 'Publicada', 1499, '2018-10-11 18:48:46', NULL, 'EAX64905701(2.3)', 'EAY62810901', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647170326-fuente-de-poder-lg-47la6900-eax6490570123-eay62810901-_JM', 3),
(143, 'FUENTE', 'PHILIPS', '39PFL2608/F7', 'CAJA 4', 'Publicada', 1200, '2018-10-11 18:50:48', NULL, 'BA31T0F0102 1', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-639353251-fuente-de-poder-philips-39pfl2608f7-ba31t0f0102-1-_JM', 3),
(144, 'FUENTE', 'SAMSUNG', 'UN32EH4003FXZA', 'CAJA 4', 'Publicada', 1100, '2018-10-11 18:54:23', NULL, 'BN44-00664A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620863622-tarjeta-main-samsung-un32fh4005f-bn94-06190h-_JM', 3),
(145, 'MAIN', 'SAMSUNG', 'UN32EH4000FXZX', 'CAJA 4', 'Publicada', 1450, '2018-10-11 18:56:07', NULL, 'BN94-05763E', 'BN97-06556A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-599912532-tarjeta-main-samsung-un32eh4000fxzx-bn94-05763e-bn97-06556a-_JM', 3),
(146, 'MAIN', 'SAMSUNG', 'PL42C433A4D', 'CAJA 4', 'Publicada', 1150, '2018-10-11 18:58:31', NULL, 'BN96-14704A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627338161-tarjeta-main-samsung-pl42c433a4d-bn96-14704a-_JM', 3),
(147, 'FUENTE', 'LG', '42LN5700', 'CAJA 4', 'Publicada', 1149, '2018-10-11 19:00:47', NULL, 'EAX64905401(1.7)', 'LGP42-13R2', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-615990999-fuente-de-poder-42ln5700-eax6490540117-lgp42-13r2-_JM', 3),
(148, 'FUENTE', 'SAMSUNG', 'UN32F5000AFXZA', 'CAJA 4', 'Publicada', 1200, '2018-10-11 19:03:15', NULL, 'PSLF770S05A', 'BN44-00605A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-615997225-fuente-de-poder-samsung-un32f5000afxza-l32sfdsm-_JM', 3),
(149, 'FUENTE', 'WESTINGHOUSE', 'EW50T5KW', 'CAJA 4', 'Publicada', 1200, '2018-10-11 19:18:27', NULL, 'TV500T-ZC02-01', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616801314-tarjeta-selector-sony-kdl-40w600b-a2063361b-_JM', 3),
(150, 'MAIN', 'SAMSUNG', 'UN40EH5000FXZA', 'CAJA 4', 'Publicada', 1300, '2018-10-11 19:26:38', NULL, 'BN44-00496A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616800566-tarjeta-main-samsung-un40eh5000fxza-bn44-00496a-_JM', 3),
(151, 'MAIN', 'SAMSUNG', 'PN51E530A3FXZA ', 'CAJA 4', 'Publicada', 1100, '2018-10-11 19:31:18', NULL, 'BN41-01799A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647170776-tarjeta-main-samsung-pn51e530a3fxza-bn96-24574a-_JM', 3),
(152, 'TCON', 'LG', '42LB5800', 'CAJA 6', 'Publicada', 800, '2018-10-11 19:34:24', NULL, '42T34-C01', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-613845339-t-con-lg-42lb5800-42t34-c01-_JM', 1),
(153, 'TCON', 'LG', '50LF6100', '4V9Q62ATR35', 'Publicada', 1100, '2018-10-11 19:35:05', NULL, 'BN41-01799A', 'E22203415010102', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-613841383-t-con-lg-50lf6100-4v9q62atr35-e22203415010102-_JM', 3),
(154, 'MODULO WIFI', 'LG', '50LB5830 ', 'CAJA 5', 'Publicada', 350, '2018-10-11 19:35:30', NULL, 'WN8122E1', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620839420-modulo-wifi-lg-50lb5830-wn8122e1-_JM', 1),
(155, 'BOCINAS', 'LG', '50LB5830', 'CAJA 5', 'Pendiente', 0, '2018-10-11 19:36:45', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(156, 'LEDS', 'LG', '50LB5830', 'CAJA 5', 'Pendiente', 0, '2018-10-11 19:37:08', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(157, 'FUENTE DE PODER', 'PHILLIPS', '49PFL4909', 'CAJA 5', 'Publicada', 1099, '2018-10-11 19:39:58', NULL, 'BA4GU5F0102', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616926362-fuente-de-poder-philips-49pfl4909-ba4gu5f0102-_JM', 1),
(158, 'LEDS', 'PHILLIPS', '49PFL4909', 'CAJA 5', 'Pendiente', 0, '2018-10-11 19:40:29', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(159, 'MAIN', 'RCA', 'DEDM500M', 'CAJA 4', 'Pendiente', 0, '2018-10-11 19:41:36', NULL, '510-130121245', '8D1K001Q500M002-00625', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(160, 'FUENTE', 'LG', '60LB6500', 'CAJA 5', 'Publicada', 1750, '2018-10-11 19:46:09', NULL, 'EAY63072201', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616924611-fuente-de-poder-lg-60lb6500-eay63072201-_JM', 3),
(161, 'BOCINAS Y CABLES', 'LG', '60LB6500', 'CAJA 5', 'Pendiente', 0, '2018-10-11 19:47:16', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(162, 'FUENTE', 'SONY', 'KDL-40R450A', 'CAJA 5', 'Publicada', 1049, '2018-10-11 19:50:20', NULL, 'APS-349', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-616945653-fuente-de-poder-sony-kdl-40r450a-aps-349-_JM', 3),
(163, 'LEDS CABLES Y BOCINAS', 'SONY', 'KDL-40R450A', 'CAJA 5', 'Pendiente', 0, '2018-10-11 19:50:56', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(164, 'FUENTE DE PODER', 'LG', '55LB5830 ', 'CAJA 5', 'Publicada', 999, '2018-10-11 19:51:07', NULL, 'EAX65423801(2.2)', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647070584-fuente-de-poder-lg-55lb5830-eax6542380122-_JM', 1),
(165, 'TCON', 'LG', '55LB5830 ', 'CAJA 5', 'Publicada', 800, '2018-10-11 19:52:38', NULL, '55T16-C05', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616960665-t-con-lg-55lb5830-5555t16-c02-_JM', 1),
(166, 'FUENTE', 'TCL', 'E46FHDE5510', 'CAJA 5', 'Publicada', 1400, '2018-10-11 19:53:47', NULL, '40-E371C4-PWH1XG', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620835886-tcl-le46fhde5510-fuente-de-poder-40-e371c4-pwh1xg-_JM', 3),
(167, 'LEDS', 'LG', '55LB5830 ', 'CAJA 5', 'Pendiente', 0, '2018-10-11 19:54:03', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(168, 'FUENTE', 'SONY', 'KDL-32FA600', 'CAJA 5', 'Vendida', 1350, '2018-10-11 19:55:53', NULL, 'APS-254', '147420211', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611252449-fuente-de-poder-sony-kdl-32fa600-aps-254-147420211-_JM', 3),
(169, 'FUENTE', 'PHILIPS', '32HFL5860D/27', 'CAJA 5', 'Publicada', 1000, '2018-10-11 19:59:57', NULL, 'DPS-182BP', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-633107917-fuente-de-poder-philips-32hfl5860d27-dps-182bp-_JM', 3),
(170, 'INVERTER', 'PHILIPS', '32HFL5860D/27', 'CAJA 5', 'Publicada', 700, '2018-10-11 20:01:51', NULL, '6632L-0494A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616948550-backlight-inverter-philips-32hfl5860d27-6632l-0494a-_JM', 3),
(171, 'TCON', 'PHILIPS', '32HFL5860D/27', 'CAJA 5', 'Pendiente', 700, '2018-10-11 20:02:42', NULL, '6870C-0370A', '6871L-2892A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616948550-backlight-inverter-philips-32hfl5860d27-6632l-0494a-_JM', 3),
(172, 'MAIN', 'HISENSE', '32H5B2 ', 'CAJA 5', 'Publicada', 0, '2018-10-11 20:07:19', NULL, 'RSAG7.820.6834/ROH', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636302188-tarjeta-main-hisense-32h5b2-rsag78206834roh-_JM', 1),
(173, 'TCON', 'HISENSE', '32H5B2', 'CAJA 5', 'Publicada', 0, '2018-10-11 20:09:44', NULL, 'RSAG7.820.6063', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(174, 'TCON', 'SAMSUNG', 'UN55J6201AFXZA', 'CAJA 5', 'Publicada', 1100, '2018-10-11 20:09:51', NULL, 'BN95-02545A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-617106359-t-con-samsung-un55j6201afxza-bn95-02545a-_JM', 3),
(175, 'MAIN', 'SAMSUNG', 'UN55J6201AFXZA', 'CAJA 5', 'Pendiente', 0, '2018-10-11 20:12:23', NULL, 'BN94-08846A', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(176, 'MAIN', 'LG', '50PX950-UA', 'CAJA 5', 'Publicada', 699, '2018-10-11 20:13:36', NULL, 'EAX63029001', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-632083721-tarjeta-main-logica-lg-50px950-ua-eax63029001-_JM', 1),
(177, 'FUENTE', 'SAMSUNG', 'UN40D5500', 'CAJA 5', 'Publicada', 1500, '2018-10-11 20:15:21', NULL, 'BN44-00422A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616803082-fuente-de-poder-samsung-un40d5500-bn44-00422a-_JM', 3),
(178, 'MAIN', 'SAMSUNG', 'PL51D450A2D', 'CAJA 5', 'Publicada', 1100, '2018-10-11 20:17:19', NULL, 'BN96-19471A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-632080301-tarjeta-main-samsung-pl51d450a2d-bn96-19471a-_JM', 1),
(179, 'FUENTE', 'LG', '37LH70', 'CAJA 5', 'Publicada', 1250, '2018-10-11 20:18:20', NULL, '2300KPG084A-F', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616804968-fuente-de-poder-lg-37lh70-2300kpg084a-f-_JM', 3),
(180, 'MAIN HDMI', 'LG', '37LH70', 'CAJA 5', 'Pendiente', 0, '2018-10-11 20:24:58', NULL, 'EAX60695502(1)', 'EBU60696801', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(181, 'MAIN', 'LG', '37LH70', 'CAJA 5', 'Pendiente', 0, '2018-10-11 20:25:52', NULL, 'EAX56829902(0)', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(182, 'LEDS Y BOCINAS', 'SONY', 'KDL-40R480B', 'CAJA 5', 'Pendiente', 0, '2018-10-11 20:27:45', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(183, 'MAIN', 'LG', '50LN5310 ', 'CAJA 5', 'Publicada', 1349, '2018-10-11 20:30:15', NULL, 'EAX65049105(1.1)', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-598942816-tarjeta-main-lg-50ln5310-eax6504910511-_JM', 1),
(184, 'FUENTE DE PODER', 'LG', '55LS4500', 'CAJA 6', 'Publicada', 1300, '2018-10-11 20:40:54', NULL, 'EAX643100801(1.3)', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-618247162-fuente-de-poder-55ls4500-eax64310080113-_JM', 1),
(185, 'TCON', 'LG', '55LS4500', 'CAJA 6', 'Publicada', 850, '2018-10-11 20:42:41', NULL, '6871L-2979A', '(6870C-0421A)', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-598944953-tcon-lg-55ls4500-6871l-2979a-6870c-0421a-_JM', 1),
(186, 'MAin', 'LG', '55LS4500', 'CAJA 6', 'Publicada', 1200, '2018-10-11 20:44:49', NULL, 'EBT62227815', 'EAX64437505', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-637274864-tarjeta-main-lg-55ls4500-eax64437505-ebt62227815-_JM', 3),
(187, 'FUENTE', 'LG', '55LS4500', 'CAJA 6', 'Publicada', 1300, '2018-10-11 20:45:21', NULL, 'EBT62227815', 'EAX64437505', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-618247162-fuente-de-poder-55ls4500-eax64310080113-_JM', 3),
(188, 'TCON', 'LG', '55LS4500', 'CAJA 6', 'Publicada', 850, '2018-10-11 20:45:52', NULL, '6871L-2979A', '6870C-0421A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-598944953-tcon-lg-55ls4500-6871l-2979a-6870c-0421a-_JM', 3),
(189, 'FUENTE', 'LG', '42LB6300', 'CAJA 6', 'Pendiente', 0, '2018-10-11 20:50:53', NULL, 'EAX65423701(2.1)', 'LGP3942-14PL1', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(190, 'BOCINAS', 'VIZIO', 'E601I-A3', 'CAJA 6', 'Pendiente', 0, '2018-10-11 20:55:12', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'Na', 3),
(191, 'FUENTE', 'SAMSUNG', 'HG32NB460GF', 'CAJA 6', 'Publicada', 1400, '2018-10-11 21:04:24', NULL, 'Bn44-00664a', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624728263-tarjeta-main-samsung-hg32nb460-bn94-06988a-_JM', 3),
(192, 'MAIN', 'SAMSUNG', 'HG32NB460GF', 'CAJA 6', 'Publicada', 900, '2018-10-11 21:04:25', NULL, 'Bn94-06988a', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624728263-tarjeta-main-samsung-hg32nb460gf-bn94-06988a-_JM', 3),
(193, 'FUENTE', 'SAMSUNG', 'UN40D5500', 'CAJA 6', 'Publicada', 1400, '2018-10-11 21:12:46', NULL, 'BN44-00422A', 'PD46A0_BSM', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-621535877-fuente-de-poder-samsung-hg32nb460-bn44-00664a-_JM', 3),
(194, 'MAIN', 'VIZIO', 'VOJ320F1A', 'CAJA 6', 'Publicada', 1000, '2018-10-11 21:14:31', NULL, '0171-2272-2634', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-618946256-tarjeta-main-vizio-voj320f1a-0171-2272-2634-_JM', 3),
(195, 'FUENTE', 'SAMSUNG', 'HG46NA578LB', 'CAJA 6', 'Publicada', 1300, '2018-10-11 21:23:07', NULL, 'BN44-0667A', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-638762851-fuente-de-poder-samsung-un46fh5303f-bn44-0667a-l46gfddy-_JM', 3),
(196, 'MAIN', 'SAMSUNG', 'HG46NA578LB', 'CAJA 6', 'Publicada', 1449, '2018-10-11 21:24:57', NULL, 'BN94-06879A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624565153-tarjeta-main-samsung-hg46na578lb-bn94-06879a-_JM', 3),
(197, 'ZSUS', 'LG', '50PB560B', 'CAJA 6', 'Publicada', 1000, '2018-10-11 21:28:18', NULL, 'EAX65317001(1.7)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-618245019-zsus-lg-50pb560b-eax6531700117-_JM', 3),
(198, 'FUENTE', 'LG', '50PB560B', 'CAJA 6', 'Publicada', 1250, '2018-10-11 21:29:08', NULL, 'EAX65359511', 'EAY63168601', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-618244705-fuente-de-poder-lg-50pb560b-eax65359511-_JM', 3),
(199, 'MAIN', 'FUENTE', 'UN50F5500', 'CAJA 6', 'Publicada', 1800, '2018-10-11 21:47:23', NULL, 'BN94-06606F', 'BN97-07527A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-618250572-tarjeta-main-samsung-un50f5500-bn94-06606f-bn97-07527a-_JM', 3),
(200, 'FUENTE', 'LG', '42LB6300', 'CAJA 6', 'Publicada', 1149, '2018-10-11 21:57:13', NULL, 'EAX65423701(1.9)', 'LGP3942-14PL1', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-596347580-fuente-de-poder-lg-42lb5500-lgp3942-14pl1-eax6542370119-_JM', 3),
(201, 'MAIN', 'LG', 'PENDIENTE', 'CAJA 6', 'Pendiente', 0, '2018-10-11 22:07:41', NULL, 'EBT62874602', '', NULL, NULL, NULL, NULL, NULL, 'na', 3),
(202, 'MAIN', 'SAIKI', 'SE32FY22 ', 'CAJA 6', 'Publicada', 800, '2018-10-11 22:09:01', NULL, 'T320HVN03.0', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619285763-t-con-seiki-se32fy22-t320hvn030-_JM', 1),
(203, 'MAIN', 'SEIKI', 'SE32FY22', 'CAJA 6', 'Publicada', 649, '2018-10-11 22:10:46', NULL, 'CV3393BH-CPW', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619284558-tarjeta-main-seiki-se32fy22-cv3393bh-cpw-_JM', 1),
(204, 'TCON', 'LG', 'UN55H6350', 'CAJA 6', 'Pendiente', 0, '2018-10-11 22:12:27', NULL, 'BN96-30152A', 'BN97-08845B', NULL, NULL, NULL, NULL, NULL, 'na', 3),
(205, 'TCON', 'SAMSUNG', 'UN55EH6000', 'CAJA 6', 'Publicada', 850, '2018-10-11 22:19:00', NULL, 'V546HK3-CPS1', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-618248801-t-con-samsung-un55eh6000-v546hk3-cps1-_JM', 3),
(206, 'TCON', 'SAMSUNG', 'UN55EH6000', 'CAJA 6', 'Publicada', 850, '2018-10-11 22:19:04', NULL, 'V546HK3-CPS1', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-618248801-t-con-samsung-un55eh6000-v546hk3-cps1-_JM', 3),
(207, 'FUENTE DE PODER', 'BLU SENS ', 'H340B40C', 'CAJA 6', 'Publicada', 1000, '2018-10-11 22:19:58', NULL, 'AY090-5HF01', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-618948422-fuente-de-poder-blu-sens-h340b40c-ay090-5hf01-_JM', 1),
(208, 'MAIN', 'LG', '50LN5400 ', 'CAJA 6', 'Publicada', 2100, '2018-10-11 22:23:54', NULL, 'EBT62359784 ', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-598943243-tarjeta-main-lg-50ln5400-ebt62359784-eax6504910410-_JM', 1),
(209, 'MAIN', 'SAMSUNG', 'LT24C550NH', 'CAJA 6', 'Publicada', 899, '2018-10-11 22:28:43', NULL, 'BN94-07641E', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-646672056-tarjeta-main-samsung-lt24c550nh-bn94-07641e-_JM', 1),
(210, 'TCON', 'SAMSUNG', 'UN46F6300', 'CAJA 6', 'Pendiente', 0, '2018-10-11 22:28:46', NULL, 'BN95-00578A', 'BN97-06370A', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(211, 'MAIN', 'SONY', 'KDL-46HX729', 'CAJA 1', 'Vendida', 1700, '2018-10-12 14:32:35', NULL, '1-884-078-23', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611243399-sony-kdl-46hx729-main-board-1-884-078-23-_JM', 3),
(212, 'FUENTE', 'SONY', 'KDL-46HX729', 'CAJA 1', 'Publicada', 1100, '2018-10-12 14:33:21', NULL, 'APS-285', '147433511', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638915852-fuente-de-poder-sony-kdl-46hx729-aps-285-147433511-_JM', 3),
(213, 'TCON', 'SONY', 'KDL-46HX729', 'CAJA 1', 'Pendiente', 0, '2018-10-12 14:36:01', NULL, 'LJ94-16524B', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(214, 'FUENTE', 'LG', 'M237WD', 'CAJA 1', 'Publicada', 699, '2018-10-12 14:37:38', NULL, 'YP2604L', 'EAY38520202', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611437765-fuente-de-poder-lg-m237wd-eay38520202-yp2604l-_JM', 3),
(215, 'MAIN', 'PIONEER', 'PLE-3902FHD', 'CAJA 2', 'Publicada', 899, '2018-10-12 14:41:43', NULL, 'M23/G31990/13', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647160667-tarjeta-main-pioneer-ple-3902fhd-m23g3199013-_JM', 3),
(216, 'FUENTE', 'PIONEER', 'PLE-3902FHD', 'CAJA 2', 'Publicada', 999, '2018-10-12 14:42:11', NULL, 'TV3205-ZC02-01', '303C3205061', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647160356-fuente-pioneer-ple-3902fhd-tv3205-zc02-01-303c3205061-_JM', 3),
(217, 'MAIN', 'LG', '42LE7300', 'CAJA 3', 'Publicada', 1499, '2018-10-12 14:51:06', NULL, 'EAX62003901(1)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647161936-tarjeta-main-lg-42le7300-eax620039011-_JM', 3),
(218, 'MAIN', 'PIONEER', '39PFL4408/F8', 'CAJA 3', 'Publicada', 1399, '2018-10-12 15:04:29', NULL, 'BA37U0G0401 2', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647162403-tarjeta-main-philips-39pfl4408f8-ba37u0g0401-2-_JM', 3),
(219, 'MAIN', 'RCA', 'DEFM500M', 'CAJA 4', 'Publicada', 1699, '2018-10-12 15:15:26', NULL, '8D1K001Q500M002-0062', 'M28/G40222/12', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647170497-tarjeta-main-rca-defm500m-m28g4022212-8d1k001q500m002-0062-_JM', 3),
(220, 'FUENTE', 'SAMSUNG', 'UN40EH5000FXZA ', 'CAJA 4', 'Publicada', 1250, '2018-10-12 15:23:34', NULL, 'BN44-00496A', 'PSLF760C0A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-604126026-fuente-samsung-un40eh5000fxza-bn44-00496a-pslf760c0a-_JM', 3),
(221, 'TCON', 'LG', '60LB6500', 'CAJA 5', 'Publicada', 1350, '2018-10-12 16:21:15', NULL, '6871L-3548A', '6870C-0484A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616927774-t-con-lg-60lb6500-6870c-0484a-_JM', 3),
(222, 'FUENTE', 'LG', '42LB6300', 'CAJA 6', 'Publicada', 1700, '2018-10-12 17:17:23', NULL, 'EAX65423701(2.1)', 'LGP3942-14PL1', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621501125-tarjeta-fuente-lg-42lb5800-eax65423701-_JM', 3),
(223, 'MAIN', 'SAMSUNG', 'UN55EH6000', 'CAJA 6', 'Publicada', 1600, '2018-10-12 17:56:16', NULL, 'BN94-05625C', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-618248578-tarjeta-main-samsung-un55eh6000-bn94-05625c-_JM', 3),
(224, 'MAIN', 'SAMSUNG', 'LN40B500P3FXZA', 'CAJA 6', 'Publicada', 850, '2018-10-12 18:16:36', NULL, 'BN94-02748K', 'BN97-03324U', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619281768-tarjeta-main-samsung-ln40b500p3fxza-bn97-03324u-_JM', 3),
(225, 'TCON', 'SAMSUNG', 'LN40B500P3FXZA', 'CAJA 6', 'Publicada', 950, '2018-10-12 18:19:27', NULL, 'FHD60C4LV1.1', 'LJ94-2849F', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619282210-t-con-samsung-ln40b500p3fxza-fhd60c4lv11-_JM', 3),
(226, 'TCON', 'SAMSUNG', 'UN55EH6000 ', 'CAJA 6', 'Publicada', 850, '2018-10-12 18:24:50', NULL, 'V546HK3-CPS1', '32-D076982', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-618248801-t-con-samsung-un55eh6000-v546hk3-cps1-_JM', 3),
(227, 'COMBO FUENTE Y MAIN', 'DWDISPLAY', 'DW-3246', 'CAJA 6', 'Publicada', 999, '2018-10-12 18:47:26', NULL, 'TP.MS3393.PB818', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-635010281-combo-fuente-y-main-dwdisplay-dw-3246-tpms3393pb818-_JM', 3),
(228, 'TECLADO Y CABLES', 'DWDISPLAY', 'DW-3246', 'CAJA 6', 'Pendiente', 0, '2018-10-12 18:48:17', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(229, 'TCON', 'SAMSUNG', 'UN46EH5300 ', 'CAJA 6', 'Publicada', 800, '2018-10-12 19:15:04', NULL, 'BN95-00571B', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647251258-tcon-samsung-un46eh5300-bn95-00571b-_JM', 3),
(230, 'TCON', 'LG', '32LC2D', 'CAJA 6', 'Publicada', 750, '2018-10-12 19:59:32', NULL, '6871L-0821A', '6870C-0060G', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-630441874-tcon-lg-32lc2d-6871l-0821a-6870c-0060g-_JM', 3),
(231, 'FUENTE', 'SONY', 'KDL-37M4000', 'CAJA 8', 'Publicada', 1550, '2018-10-12 20:12:21', NULL, 'DPS-250AP-34', '147409512', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621537779-fuente-de-poder-sony-kdl-37m4000-dps-250ap-34-147409512-_JM', 3),
(232, 'INVERTER', 'SONY', 'KDL-37M4000', 'CAJA 8', 'Publicada', 950, '2018-10-12 20:14:03', NULL, 'FR-4-86 PY', '1-857-097-11', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-621538089-backlight-sony-kdl-37m4000-fr-4-86-py-1-857-097-11-_JM', 3),
(233, 'FUENTE', 'LG', '42CS530', 'CAJA 8', 'Publicada', 1300, '2018-10-12 20:22:10', NULL, 'EAX64648001(1.6)', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-621630454-fuente-de-poder-lg-42cs530-eax6464800116-_JM', 3),
(234, 'MAIN', 'LG', '42LS5650', 'CAJA 8', 'Publicada', 1200, '2018-10-12 20:35:23', NULL, 'EAX64437505', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638307731-tarjeta-main-lg-42ls5650-eax6443750511-_JM', 3),
(235, 'FUENTE', 'SAMSUNG', 'PL50C450B1D', 'CAJA 8', 'Vendida', 1361, '2018-10-12 20:41:37', NULL, 'BN44-00330A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619102641-fuente-de-poder-samsung-pl50c450b1d-bn44-00330a-_JM', 3),
(236, 'MAIN', 'POLAROID', 'PTV4003LED', 'CAJA 8', 'Publicada', 1250, '2018-10-12 20:44:00', NULL, 'CV318H-E', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636310934-tarjeta-main-gpxpolaroid-tde4082bptv4003led-cv318h-e-_JM', 3),
(237, 'FUENTE', 'LG', '42LN5400', 'CAJA 8', 'Publicada', 1400, '2018-10-12 20:46:53', NULL, 'EAX64905401(1.7)', 'LGP42-13R2', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621628342-fuente-de-poder-lg-42ln5400-eax6490540117-lgp42-13r2-_JM', 3),
(238, 'MAIN', 'VIZIO', 'VM190XVT', 'CAJA 8', 'Publicada', 800, '2018-10-12 20:48:32', NULL, '793881300600R', '493361300100R', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621630902-tarjeta-main-vizio-vm190xvt-793881300600r-493361300100r-_JM', 3),
(239, 'MAIN', 'SAMSUNG', 'UN65C8000', 'CAJA 8', 'Publicada', 2500, '2018-10-12 20:52:09', NULL, 'BN94-02696H', 'BN97-04067F', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621539530-tarjeta-main-samsung-un65c8000-bn97-04067f-_JM', 3),
(240, 'FUENTE', 'SAMSUNG', 'PL43D450A2D', 'CAJA 8', 'Publicada', 750, '2018-10-12 20:55:03', NULL, 'BN44-00442A', 'PSPF271501A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-622919070-fuente-de-poder-samsung-pl43d450a2d-bn44-00442a-pspf271501a-_JM', 3),
(241, 'INVERTER', 'PHILIPS', '32PFL3506', 'CAJA 8', 'Publicada', 700, '2018-10-12 20:57:10', NULL, 'BA17F4F0103', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621673933-backlight-inverter-philips-32pfl3506-ba17f4f0103-2a-_JM', 3),
(242, 'FUENTE', 'SANYO', 'DP55D44', 'CAJA 8', 'Publicada', 1650, '2018-10-12 20:58:26', NULL, 'SHLD5501F-101H', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621508496-fuente-de-poder-sanyo-dp55d44shld5501f-101h-_JM', 3),
(243, 'MAIN', 'LG', '50LN5400', 'CAJA 8', 'Publicada', 2100, '2018-10-12 20:59:33', NULL, 'EAX65049104(1.0)', 'EBT62359784', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-598943243-tarjeta-main-lg-50ln5400-ebt62359784-eax6504910410-_JM', 3),
(244, 'MAIN', 'DAEWOO', 'DTS 42', 'CAJA 8', 'Publicada', 1600, '2018-10-12 21:00:41', NULL, 'DPN-4274NHS', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-632086322-tarjeta-main-daewoo-dts-42-dpn-4274nhs-_JM', 3),
(245, 'FUENTE', 'LG', '47LN5310', 'CAJA 8', 'Publicada', 1100, '2018-10-12 21:02:07', NULL, 'EAX64905501(2.1)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616930877-fuente-de-poder-lg-47ln5310-eax6490550121-_JM', 3),
(246, 'FUENTE', 'LG', '58UF8300', 'CAJA 8', 'Publicada', 3150, '2018-10-12 21:05:20', NULL, 'EAY64029701', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-621628936-fuente-de-poder-lg-58uf8300-eay64029701-_JM', 3);
INSERT INTO `refacciones_tv` (`Id_refacciones`, `tipo`, `marca`, `modelo`, `ubicacion`, `estado`, `precio`, `fecha_entrada`, `fecha_salida`, `etiqueta_1`, `etiqueta_2`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `link`, `id_personal`) VALUES
(247, 'MAIN', 'VIZIO', 'D32H-D1', 'CAJA 8', 'Publicada', 1300, '2018-10-12 21:07:00', NULL, '715G7487-M03-001-004K', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621627120-tarjeta-main-vizio-d32h-d1-715g7487-m03-001-004k-_JM', 3),
(248, 'MAIN', 'LG', '42LP645H', 'CAJA 8', 'Publicada', 1349, '2018-10-12 21:08:32', NULL, 'EAX65085601(1.2)', 'EBT62559404', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-599935378-tarjeta-main-lg-42lp645h-ebt62559404-eax6508560112-_JM', 3),
(249, 'MAIN', 'LG', '42LM5800', 'CAJA 8', 'Publicada', 1150, '2018-10-12 21:09:49', NULL, 'EAX64427101(1.4)', 'EAY62608901', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621628752-fuente-de-poder-lg-42lm5800-eax6442710114-eay62608901-_JM', 3),
(250, 'MAIN', 'SAMSUNG', 'LN32C540F2DXZA', 'CAJA 8', 'Publicada', 1400, '2018-10-12 21:13:06', NULL, 'BN96-15158A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621679910-tarjeta-main-samsung-ln32c540f2dxza-bn96-15158a-_JM', 3),
(251, 'FUENTE', 'LG', '47LN5790', 'CAJA 8', 'Publicada', 1550, '2018-10-12 21:15:25', NULL, 'EAX64905501(2.2)', 'LGP4750-13PL2', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621627360-fuente-de-poder-lg-47ln5790-eax6490550122-lgp4750-13pl2-_JM', 3),
(252, 'FUENTE DE PODER', 'VIZIO', 'E420VO', 'CAJA 8', 'Publicada', 1000, '2018-10-12 21:16:38', NULL, 'DPS-198BP A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621630168-fuente-de-poder-vizio-e420vo-dps-198bp-a-_JM', 2),
(253, 'FUENTE', 'PHILIPS', '37HFL5581L/27', 'CAJA 8', 'Publicada', 950, '2018-10-12 21:17:37', NULL, 'PLHL-T846A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621508760-fuente-de-poder-philips-37hfl5581l27-plhl-t846a-_JM', 3),
(254, 'FUENTE', 'SAMSUNG', 'PN42C430A1D ', 'CAJA 8', 'Publicada', 1200, '2018-10-12 21:20:12', NULL, 'BN44-00329B', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621509529-fuente-de-poder-samsung-pn42c430a1d-bn44-00329b-_JM', 3),
(255, 'FUENTE', 'SAMSUNG', 'UN55ES7500', 'CAJA 8', 'Publicada', 1850, '2018-10-12 21:22:09', NULL, 'BN44-00523A', 'PD55B2Q_CSM', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621431960-fuente-de-poder-samsung-un55es7500-bn44-00523a-pd55b2qcsm-_JM', 3),
(256, 'MAIN', 'LG', '47LB6100 ', 'CAJA 8', 'Publicada', 1750, '2018-10-12 21:24:00', NULL, 'EAX65610206(1.0) ', 'EBT62955905', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621627006-tarjeta-main-lg-47lb6100-eax6561020610-ebt62955905-_JM', 2),
(257, 'MAIN', 'ELEMENT', 'FLX-1511B', 'CAJA 8', 'Publicada', 1100, '2018-10-12 21:29:17', NULL, '200-100-JF199XA-DKH', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-632086200-tarjeta-main-element-flx-1511b-200-100-jf199xa-dkh-_JM', 2),
(258, 'FUENTE', 'SONY', '32EX400', 'CAJA 7', 'Publicada', 1100, '2018-10-12 21:29:59', NULL, 'APS-252', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-635019925-fuente-de-poder-samsung-kdl-32ex400-aps-252-147420011-_JM', 3),
(259, 'FUENTE DE PODER', 'LG', '50LA6200 ', 'CAJA 8', 'Publicada', 1600, '2018-10-12 21:33:53', NULL, 'EAX64905501(2.2)', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621506095-fuente-de-poder-lg-50la6200-eax6490550122-_JM', 2),
(260, 'FUENTE DE PODER', 'LG', '50LA6200 ', 'CAJA 7', 'Publicada', 1600, '2018-10-12 21:33:54', NULL, 'EAX64905501(2.2)', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621506095-fuente-de-poder-lg-50la6200-eax6490550122-_JM', 2),
(261, 'FUENTE', 'VIZIO', 'M420NV-MX', 'CAJA 7', 'Publicada', 1400, '2018-10-12 21:35:11', NULL, '0500-0607-0070', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-599846774-fuente-de-poder-vizio-m420nv-mx-0500-0607-0070-_JM', 3),
(262, 'FUENTE DE PODER', 'INSIGNIA', 'NS-421780A12', 'CAJA 7', 'Publicada', 1100, '2018-10-12 21:36:43', NULL, '1QE2GXZF', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624043917-fuente-de-poder-insignia-ns-421780a12-1qe2gxzf-_JM', 2),
(263, 'FUENTE', 'AOC', 'LE46H057', 'CAJA 7', 'Publicada', 1700, '2018-10-12 21:36:50', NULL, '715G3906-P02-L30-003H', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621510274-fuente-de-poder-aoc-le46h057-715g3906-p02-l30-003h-_JM', 3),
(264, 'MAIN', 'LG', '42LS5650', 'CAJA 7', 'Publicada', 1200, '2018-10-12 21:38:55', NULL, 'EAX64437505(1.0)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638307731-tarjeta-main-lg-42ls5650-eax6443750511-_JM', 3),
(265, 'FUENTE', 'HITACHI', 'LE50H508', 'CAJA 7', 'Publicada', 1500, '2018-10-12 21:40:15', NULL, 'MP165D-1MF21', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621508096-fuente-de-poder-hitachi-le50h508-mp165d-1mf21-_JM', 3),
(266, 'FUENTE DE PODER', 'LG', '55UB8500 ', 'CAJA 7', 'Publicada', 1750, '2018-10-12 21:44:22', NULL, 'EAX65613901(1.6) ', 'EAY63149401', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621432486-fuente-samsung-lg-55ub8500-eax6561390116-eay63149401-_JM', 2),
(267, 'MAIN', 'SAMSUNG', 'UN46FH5303F', 'CAJA 7', 'Publicada', 1800, '2018-10-12 21:45:51', NULL, 'BN94-07223P', 'BN97-07055R', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619307874-tarjeta-main-samsung-un46fh5303f-bn97-07055r-_JM', 3),
(268, 'MAIN', 'SAMSUNG', 'UN46FH5303F', 'CAJA 7', 'Publicada', 1800, '2018-10-12 21:45:56', NULL, 'BN94-07223P', 'BN97-07055R', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619307874-tarjeta-main-samsung-un46fh5303f-bn97-07055r-_JM', 3),
(269, 'MAIN', 'SAMSUNG', 'UN46FH5303F', 'CAJA 7', 'Publicada', 1800, '2018-10-12 21:45:59', NULL, 'BN94-07223P', 'BN97-07055R', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619307874-tarjeta-main-samsung-un46fh5303f-bn97-07055r-_JM', 3),
(270, 'MAIN', 'LG', '42LS5650', 'CAJA 7', 'Publicada', 1200, '2018-10-12 21:47:12', NULL, 'EAX64437505(1.0)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638307731-tarjeta-main-lg-42ls5650-eax6443750511-_JM', 3),
(271, 'COMBO FUENTE Y MAIN', 'COBIA', 'CLEDTV4815', 'CAJA 7', 'Publicada', 1800, '2018-10-12 21:49:08', NULL, 'M3393L08 S02', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621500879-combo-fuente-y-main-cobia-cledtv4815-m3393l08-s02-_JM', 3),
(272, 'FUENTE DE PODER', 'SONY', 'KDL-40R450A', 'CAJA 7', 'Publicada', 1049, '2018-10-12 21:49:13', NULL, 'APS-349', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-616945653-fuente-de-poder-sony-kdl-40r450a-aps-349-_JM', 2),
(273, 'LEDS', 'SONY', 'KDL-40R450A', 'CAJA 7', 'Pendiente', 0, '2018-10-12 21:49:52', NULL, 'APS-349', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(274, 'FUENTE', 'SONY', 'KDL-40EX651', 'CAJA 7', 'Publicada', 1300, '2018-10-12 21:50:26', NULL, 'APS-322', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621508334-fuente-de-poder-sony-kdl-40ex655-aps-322ch-147438811-_JM', 3),
(275, 'BOCINAS', 'SONY', 'KDL-40R450A', 'CAJA 7', 'Pendiente', 0, '2018-10-12 21:50:33', NULL, 'APS-349', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(276, 'MAIN', 'BLUSENS', 'H340B40C', 'CAJA 7', 'Publicada', 1000, '2018-10-12 21:54:07', NULL, 'CV318H-K', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620843789-tarjeta-main-blusens-h340b40c-cv318h-k-_JM', 3),
(277, 'LEDS Y CABLES', 'BLUSENS', 'H340B40C', 'CAJA 7', 'Pendiente', 0, '2018-10-12 21:54:22', NULL, 'CV318H-K', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(278, 'TCON', 'SAMSUNG', 'LH32MGQLBF ', 'CAJA 7', 'Publicada', 800, '2018-10-12 21:57:34', NULL, '320AA05C2LV0.0', 'LJ94-02818F', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636308801-tcon-samsung-lh32mgqlbf-320aa05c2lv00-lj94-02818f-_JM', 2),
(279, 'BACKLIGHT INVERTER ', 'SAMSUNG', 'LH32MGQLBF ', 'CAJA 7', 'Publicada', 850, '2018-10-12 21:58:33', NULL, 'SSI320_4UD01', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636308049-backlight-inverter-samsung-lh32mgqlbf-ssi3204ud01-_JM', 2),
(280, 'MAIN', 'LG', '42LS5650', 'CAJA 7', 'Publicada', 1200, '2018-10-12 21:59:05', NULL, 'EAX64437505(1.0)	', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638307731-tarjeta-main-lg-42ls5650-eax6443750511-_JM', 3),
(281, 'MAIN', 'SAMSUNG', 'LH32MGQLBF ', 'CAJA 7', 'Publicada', 1100, '2018-10-12 21:59:19', NULL, 'BN97-03200R', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636308334-tarjeta-main-samsung-lh32mgqlbf-bn97-03200r-_JM', 2),
(282, 'MAIN', 'LG', '49LB5550 ', 'CAJA 9', 'Publicada', 1500, '2018-10-12 22:04:43', NULL, 'EAX65614404(1.0) ', 'EBT63034612', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-640811501-tarjeta-main-lg-49lb5550-eax6561440410-ebt63034612-_JM', 2),
(284, 'FUENTE DE PODER', 'LG', '49LB5550 ', 'CAJA 9', 'Publicada', 1500, '2018-10-12 22:05:40', NULL, 'EAX65423801(2.1) ', 'LGP474950-14PL2', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621629446-fuente-de-poder-lg-49lb5550-eax6542380121-lgp474950-14pl2-_JM', 2),
(285, 'LEDS', 'LG', '49LB5550 ', 'CAJA 9', 'Pendiente', 0, '2018-10-12 22:06:32', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(286, 'BOCINAS', 'LG', '49LB5550 ', 'CAJA 9', 'Pendiente', 0, '2018-10-12 22:06:42', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(288, 'FUENTE DE PODER', 'HITACHI', 'L32403', 'CAJA 9', 'Publicada', 1200, '2018-10-12 22:16:23', NULL, '715G3332-1', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621682620-fuente-de-poder-hitachi-l32403-715g3332-1-_JM', 2),
(289, 'MAIN', 'HITACHI', 'L32403', 'CAJA 9', 'Publicada', 1400, '2018-10-12 22:17:54', NULL, '715G3269-1', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621683181-tarjeta-main-philips-l32403-715g3269-1-_JM', 2),
(290, 'IN', 'HITACHI', 'L32403', 'CAJA 9', 'Publicada', 750, '2018-10-12 22:18:31', NULL, '715G3333-1', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624051152-inverter-hitachi-l32403-715g3333-1-_JM', 2),
(291, 'FUENTE DE PODER', 'SONY', 'KDL-42W800A', 'CAJA 9', 'Publicada', 1500, '2018-10-12 22:32:49', NULL, '(APS-342) ', '147450311', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-602973042-fuente-de-poder-sony-kdl-42w800a-aps-342-147450311-_JM', 2),
(292, 'LEDS', 'SONY', 'KDL-42W800A', 'CAJA 9', 'Pendiente', 0, '2018-10-12 22:33:23', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(293, 'BOCINAS', 'SONY', 'KDL-42W800A', 'CAJA 9', 'Pendiente', 0, '2018-10-12 22:33:44', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(294, 'FUENTE DE PODER', 'SAMSUNG', 'HG32NA478', 'CAJA 9', 'Publicada', 1350, '2018-10-12 22:53:05', NULL, 'PD32AV0_CSM ', 'BN44-00492A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621674292-fuente-de-poder-samsung-hg32na478-pd32av0csm-bn44-00492a-_JM', 2),
(295, 'FUENTE DE PODER', 'SAMSUNG', 'T22B350ND', 'CAJA 9', 'Publicada', 1100, '2018-10-12 22:58:34', NULL, 'BN44-00505A ', 'PSLF560501A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621680777-fuente-de-poder-samsung-t22b350nd-bn44-00505a-pslf560501a-_JM', 2),
(296, 'FUENTE DE PODER', 'SONY', 'KDL-32EX340', 'CAJA 9', 'Publicada', 1200, '2018-10-12 23:08:37', NULL, 'APS-331', '1-886-899-11', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-641982711-fuente-de-poder-sony-kdl-32ex340-aps-331-1-886-899-11-_JM', 2),
(297, 'MAIN', 'SONY', 'KDL-32EX340', 'CAJA 9', 'Vendida', 751, '2018-10-12 23:11:20', NULL, '1-895-285-11', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647278646-tarjeta-main-sony-kdl-32ex340-zy100106a-_JM', 2),
(298, 'FUENTE DE PODER', 'SAMSUNG', 'UN32FH4005F', 'CAJA 9', 'Publicada', 1350, '2018-10-12 23:15:29', NULL, 'BN44-00664A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624037318-fuente-de-poder-samsung-un32fh4005f-bn44-00664a-_JM', 2),
(299, 'BOCINAS', 'SAMSUNG', 'UN32FH4005F', 'CAJA 9', 'Pendiente', 0, '2018-10-12 23:16:50', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(300, 'TECLADO Y CABLES', 'SAMSUNG', 'UN32FH4005F', 'CAJA 9', 'Pendiente', 0, '2018-10-12 23:17:10', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(301, 'FUENTE DE PODER', 'LG', '32LS3500', 'CAJA 9', 'Pendiente', 0, '2018-10-12 23:22:50', NULL, 'EAX64324701(1.5)', 'EAY62512301', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(302, 'TECLADO', 'LG', '32LS3500', 'CAJA 9', 'Pendiente', 0, '2018-10-12 23:23:17', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(303, 'FUENTE DE PODER', 'LG', '32LS3450', 'CAJA 9', 'Publicada', 1300, '2018-10-12 23:52:59', NULL, 'EAX65035501 ', 'LGP32P-12LPB', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621674558-fuente-de-poder-lg-32ls3450-eax65035501-lgp32p-12lpb-_JM', 2),
(304, 'TCON', 'LG', '32LS3450', 'CAJA 9', 'Publicada', 700, '2018-10-12 23:53:42', NULL, '6870C-0370A', 'LC320EXN', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621674713-t-con-lg-32ls3450-6870c-0370a-lc320exn-_JM', 2),
(305, 'MAIN', 'DELL', 'DESCONOCIDO', 'CAJA 9', 'Pendiente', 0, '2018-10-12 23:56:50', NULL, '715T1796-D', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(306, 'DESCONOCIDO', 'DELL', 'DESCONOCIDO', 'CAJA 9', 'Pendiente', 0, '2018-10-12 23:57:54', NULL, '715T1790-1', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(307, 'BOCINAS', 'SANYO', 'DP55D445', 'CAJA 9', 'Pendiente', 0, '2018-10-12 23:59:50', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(308, 'TECLADO', 'SANYO', 'DP55D445', 'CAJA 9', 'Pendiente', 0, '2018-10-12 23:59:58', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(309, 'FUENTE DE PODER', 'LG', '60LB6100 ', 'CAJA 9', 'Publicada', 1799, '2018-10-13 00:02:26', NULL, 'EAX65423801(2.0)', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-613226994-fuente-de-poder-lg-60lb6100-eax6542380120-_JM', 2),
(310, 'INVERTER', 'PHILLIPS', '32HFL2082D/F7 ', 'CAJA 9', 'Publicada', 850, '2018-10-13 00:04:28', NULL, 'BA01F2F0103', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621631500-inverter-philips-32hfl2082df7-ba01f2f0103-_JM', 2),
(311, 'FUENTE DE PODER', 'SAMSUNG', 'UN39EH5003 ', 'CAJA 10', 'Publicada', 1200, '2018-10-13 00:12:26', NULL, 'PD40AVF_CDY', 'BN44-00496B', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-622934062-fuente-de-poder-samsung-un39eh5003-pd40avfcdy-bn44-00496b-_JM', 2),
(312, 'MAIN', 'SAMSUNG', 'UN39EH5003 ', 'CAJA 10', 'Publicada', 1099, '2018-10-13 00:13:04', NULL, 'BN94-05971W', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-622933338-tarjeta-main-samsung-un39eh5003-bn94-05971w-_JM', 2),
(313, 'LEDS', 'SAMSUNG', 'UN39EH5003 ', 'CAJA 10', 'Pendiente', 0, '2018-10-13 00:14:03', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(314, 'MAIN', 'SAMSUNG', 'LN55C630', 'CAJA 10', 'Publicada', 1950, '2018-10-13 00:16:11', NULL, 'BN94-04046B', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624048670-tarjeta-main-samsung-ln55c630-bn94-04046b-_JM', 2),
(315, 'INVERTER', 'SAMSUNG', 'LN55C630', 'CAJA 10', 'Publicada', 1050, '2018-10-13 00:16:44', NULL, 'V235-905', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624049242-inverter-lg-ln55c630-v235-905-_JM', 2),
(316, 'TCON', 'SAMSUNG', 'LN55C630', 'CAJA 10', 'Publicada', 900, '2018-10-13 00:17:22', NULL, 'T546HW01', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624050304-tcon-lg-ln55c630-t546hw01-_JM', 2),
(317, 'BOCINAS', 'SAMSUNG', 'LN55C630', 'CAJA 10', 'Pendiente', 0, '2018-10-13 00:18:10', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(318, 'FUENTE DE PODER', 'SONY', 'KDL-32EX420', 'CAJA 10', 'Publicada', 1350, '2018-10-13 00:21:04', NULL, '1-474-277-12', 'APS-288(CH)', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-599748535-fuente-de-poder-sony-kdl-32ex420-1-474-277-12-aps-288ch-_JM', 2),
(319, 'BOCINAS', 'SONY', 'KDL-32EX420', 'CAJA 10', 'Pendiente', 0, '2018-10-13 00:21:33', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(320, 'TECLADO Y CABLES', 'SONY', 'KDL-32EX420', 'CAJA 10', 'Pendiente', 0, '2018-10-13 00:21:46', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(321, 'FUENTE DE PODER', 'LG', '42LE5300', 'CAJA 10', 'Publicada', 1049, '2018-10-13 00:27:21', NULL, 'EAY60803201 ', 'YP42LPBL', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-598835762-fuente-de-poder-lg-42le5300-eay60803201-yp42lpbl-_JM', 2),
(322, 'FUENTE DE PODER', 'LG', '42LE5300', 'CAJA 10', 'Publicada', 1049, '2018-10-13 00:27:24', NULL, 'EAY60803201 ', 'YP42LPBL', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-598835762-fuente-de-poder-lg-42le5300-eay60803201-yp42lpbl-_JM', 2),
(323, 'MAIN', 'SAMSUNG', 'UN60ES8000FXZA', 'CAJA 10', 'Publicada', 2800, '2018-10-13 00:30:02', NULL, 'BN97-05229L', 'BN94-05578J', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-622800123-tarjeta-main-samsung-un60es8000fxza-bn97-05229l-bn94-05578j-_JM', 2),
(324, 'FUENTE DE PODER', 'TCL', '50FS5600', 'CAJA 10', 'Publicada', 1000, '2018-10-13 00:32:51', NULL, '81-PE421C8-PL290AA', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-623453307-fuente-de-poder-hitachi-50fs5600-81-pe421c8-pl290aa-_JM', 2),
(325, 'LED DRIVER', 'TCL', '50FS5600', 'CAJA 10', 'Publicada', 900, '2018-10-13 00:33:28', NULL, '40-RF5010-DRB2LG', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-623453994-led-driver-hitachi-50fs5600-40-rf5010-drb2lg-_JM', 2),
(326, 'FUENTE DE PODER', 'LG', '42LF6500', 'CAJA 10', 'Publicada', 1050, '2018-10-13 00:36:30', NULL, 'EAX66203001(1.7) ', 'LGP3942D-15CH1', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-623372112-fuente-de-poder-lg-42lf6500-eax6620300117-lgp3942d-15ch1-_JM', 2),
(327, 'FUENTE DE PODER', 'HISENSE', 'F46V89C', 'CAJA 10', 'Publicada', 1000, '2018-10-13 00:38:31', NULL, 'HLL-4047WH ', 'MZ125831FP', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624031169-fuente-de-poder-hisense-f46v89c-hll-4047wh-mz125831fp-_JM', 2),
(328, 'MAIN', 'HISENSE', 'F46V89C', 'CAJA 10', 'Publicada', 1200, '2018-10-13 00:39:07', NULL, 'RSAG7.820.2107/ROH', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624031385-tarjeta-main-hisense-f46v89c-rsag78202107roh-_JM', 2),
(329, 'BOCINAS', 'HISENSE', 'F46V89C', 'CAJA 10', 'Pendiente', 0, '2018-10-13 00:39:41', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(330, 'TECLADO Y CABLES', 'HISENSE', 'F46V89C', 'CAJA 10', 'Pendiente', 0, '2018-10-13 00:39:53', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 2),
(331, 'MAIN', 'PHILLIPS', '32PFL4909', 'CAJA 10', 'Publicada', 849, '2018-10-13 00:41:44', NULL, 'A4DF2MMA-001', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-596860252-tarjeta-main-philips-32pfl4909-a4df2mma-001-_JM', 2),
(332, 'FUENTE DE PODER', 'PHILLIPS', '32PFL4509', 'CAJA 10', 'Publicada', 1150, '2018-10-13 00:44:27', NULL, 'A4GFC021', 'BA4GF0F0102 1', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-610953264-fuente-de-poder-philips-32pfl4509-a4gfc021-ba4gf0f0102-1-_JM', 2),
(333, 'FUENTE DE PODER', 'SAMSUNG', 'UN55F7500', 'CAJA 10', 'Vendida', 1100, '2018-10-13 00:46:56', NULL, 'BN44-00633A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-622801023-fuente-de-poder-samsung-un55f7500-bn44-00633a-_JM', 2),
(334, 'TCON', 'SAMSUNG', 'UN55F7500', 'CAJA 10', 'Publicada', 1100, '2018-10-13 00:47:26', NULL, 'BN96-27224A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-622801550-tcon-samsung-un55f7500-bn96-27224a-_JM', 2),
(335, 'CAMARA', 'SAMSUNG', 'UN55F7500', 'CAJA 10', 'Publicada', 750, '2018-10-13 00:48:10', NULL, 'BN96-26579B', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-622801735-camara-samsung-un55f7500-bn96-26579b-_JM', 2),
(336, 'FUENTE DE PODER', 'SAMSUNG', 'UN55H6103AF', 'CAJA 10', 'Publicada', 1500, '2018-10-13 00:52:09', NULL, 'L55H1_ESM ', 'PSLF141H06A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-622930622-fuente-de-poder-samsung-un55h6103af-l55h1esm-pslf141h06a-_JM', 2),
(337, 'FUENTE DE PODER', 'SONY', 'KDL-32EX340', 'CAJA 10', 'Publicada', 1050, '2018-10-13 00:56:13', NULL, 'APS-331', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-622936522-fuente-de-poder-sony-kdl-32ex340-aps-331-_JM', 2),
(338, 'FUENTE DE PODER', 'SAMSUNG', '320MP-2', 'CAJA 10', 'Publicada', 949, '2018-10-13 01:01:44', NULL, 'BN44-00227B', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-643388676-fuente-de-poder-samsung-320mp-2-bn44-00227b-_JM', 2),
(339, 'MAIN', 'SAMSUNG', 'PL43D491A4D', 'CAJA 10', 'Publicada', 1100, '2018-10-13 01:05:55', NULL, 'BN41-01590A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619089260-tarjeta-main-samsung-pl43d491a4d-bn41-01590a-_JM', 2),
(340, 'FUENTE', 'LG', '50LB5830', 'CAJA 10', 'Publicada', 1650, '2018-10-13 14:59:24', NULL, 'EAX65423801(2.2)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620838014-fuente-de-poder-lg-50lb5830-fuente-eax6542380122-_JM', 3),
(341, 'MAIN', 'LG', '50LB5830', 'CAJA 10', 'Publicada', 1650, '2018-10-13 14:59:47', NULL, 'EAX65610206(1.0)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620838737-tarjeta-main-lg-50lb5830-eax6561020610-_JM', 3),
(342, 'MAIN', 'LG', '50LB5830', 'CAJA 10', 'Publicada', 1650, '2018-10-13 14:59:53', NULL, 'EAX65610206(1.0)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620838737-tarjeta-main-lg-50lb5830-eax6561020610-_JM', 3),
(343, 'LEDS', 'LG', '50LB5830', 'CAJA 10', 'Pendiente', 0, '2018-10-13 15:00:12', NULL, '0', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(344, 'MAIN', 'SHARP', ' LC-42LB150U', 'CAJA 10', 'Publicada', 1349, '2018-10-13 15:21:54', NULL, '715G5851-M01-001-004X ', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-596815418-tarjeta-main-sharp-lc-42lb150u-715g5851-m01-001-004x-_JM', 3),
(345, 'MAIN', 'LG', '42LB5500 ', 'CAJA 10', 'Publicada', 1249, '2018-10-13 15:29:24', NULL, 'EAX65469303(1.0)', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-596332489-tarjeta-main-lg-42lb5500-eax6546930310-_JM', 3),
(346, 'MAIN', 'SONY', 'KDL-32L5000', 'CAJA 10', 'Publicada', 900, '2018-10-13 16:25:49', NULL, '4-1350007AE', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-647368029-tarjeta-main-sony-kdl-32l5000-4-1350007ae-_JM', 3),
(347, 'MAIN', 'TOSHIBA', '32L2300UM', 'CAJA 10', 'Publicada', 1150, '2018-10-13 18:00:41', NULL, '431C5Y51L01', 'VTV-L32615', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-635802670-tarjeta-main-toshiba-32l2300um-vtv-l32615-431c5y51l01-_JM', 3),
(348, '', '', '', '', '', 0, '2018-10-13 18:12:46', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', 3),
(349, '', '', '', '', '', 0, '2018-10-13 18:12:54', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', 3),
(350, 'BOCINAS Y TECLADO', 'LG', 'M2241A', 'CAJA 11', 'Pendiente', 0, '2018-10-13 18:13:19', NULL, 'AIVP-0078', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(351, 'FUENTE', 'LG', 'M2241A', 'CAJA 11', 'Publicada', 649, '2018-10-13 18:13:37', NULL, 'AIVP-0078', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624032649-fuente-de-poder-lg-m2241a-aivp-0078-_JM', 3),
(352, 'FUENTE', 'PHILIPS', '65PFL4909/F8', 'CAJA 11', 'Publicada', 1599, '2018-10-13 18:15:39', NULL, 'BA4D8AF01', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624038925-fuente-de-poder-philips-65pfl4909f8-ba4d8af01-_JM', 3),
(353, 'MAIN', 'PHILIPS', '65PFL4909/F8', 'CAJA 11', 'Publicada', 1549, '2018-10-13 18:16:01', NULL, 'BA4D8AG0401', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624041783-tarjeta-main-philips-65pfl4909f8-ba4d8ag0401-_JM', 3),
(354, 'TARJETA VIDEO', 'PHILIPS', '65PFL4909/F8', 'CAJA 11', 'Publicada', 1750, '2018-10-13 18:16:24', NULL, 'BA48UAG0404', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624042628-tarjeta-de-video-philips-65pfl4909f8-ba48uag0404-_JM', 3),
(355, 'INVERTER', 'PHILIPS', '32PFL3506/F7', 'CAJA 11', 'Publicada', 700, '2018-10-13 18:25:50', NULL, 'BA17F4F0103 2_A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621673933-backlight-inverter-philips-32pfl3506-ba17f4f0103-2a-_JM', 3),
(356, 'MAIN', 'PHILIPS', '32PFL3506/F7', 'CAJA 11', 'Publicada', 1000, '2018-10-13 18:28:53', NULL, 'A17FGMPW-001', 'A17FGMPW ', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-596853517-tarjeta-main-philips-32pfl3506f7-a17fgmpw-001-a17fgmpw-_JM', 3),
(357, 'BOCINAS CABLES TECLADO', 'PHILIPS', '32PFL3506/F7', 'CAJA 11', 'Pendiente', 0, '2018-10-13 18:30:16', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'na', 3),
(358, 'FUENTE', 'HISENSE', 'F46V89C', 'CAJA 11', 'Publicada', 1000, '2018-10-13 18:54:49', NULL, 'HLL-4047WH', 'MZ125831FP', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624031169-fuente-de-poder-hisense-f46v89c-hll-4047wh-mz125831fp-_JM', 3),
(359, 'FUENTE', 'AOC', 'LE32W169', 'CAJA 11', 'Publicada', 899, '2018-10-13 18:57:02', NULL, 'H1160101580', 'R4042403002', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-623649201-fuente-de-poder-aoc-le32w169-r4042403002-h1160101580-_JM', 3),
(360, 'FUENTE', 'SAMSUNG', 'UN32FH4005F', 'CAJA 11', 'Publicada', 1350, '2018-10-13 19:00:36', NULL, 'BN44-00664A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624037318-fuente-de-poder-samsung-un32fh4005f-bn44-00664a-_JM', 3),
(361, 'MAIN', 'SAMSUNG', 'UN32FH4005F', 'CAJA 11', 'Publicada', 1100, '2018-10-13 19:01:39', NULL, 'BN94-06190H', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-620863622-tarjeta-main-samsung-un32fh4005f-bn94-06190h-_JM', 3),
(362, 'BOCINAS Y LEDS', 'SAMSUNG', 'UN32FH4005F', 'CAJA 11', 'Pendiente', 0, '2018-10-13 19:01:40', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(363, 'MAIN', 'SAMSUNG', 'LN32D450G1DXZA', 'CAJA 11', 'Publicada', 900, '2018-10-13 19:04:19', NULL, 'BN94-04805A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-623650391-tarjeta-main-samsung-ln32d450g1dxza-bn94-04805a-_JM', 3),
(364, 'TCON', 'SONY', 'KDL-42W650A', 'CAJA 11', 'Publicada', 750, '2018-10-13 19:08:12', NULL, 'ST420AU-4S01', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624036241-tcon-sony-kdl-42w650a-st420au-4s01-_JM', 3),
(365, 'TECLADO BOCINAS', 'SONY', 'KDL-42W650A', 'CAJA 11', 'Pendiente', 0, '2018-10-13 19:08:32', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(366, 'FUENTE', 'SAMSUNG', 'UN46C7000', 'CAJA 11', 'Publicada', 1299, '2018-10-13 19:09:53', NULL, 'BN44-00375A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-623649046-fuente-de-poder-samsung-un46c7000-bn44-00375a-_JM', 3),
(367, 'BOCINAS CABLES', 'SAMSUNG', 'UN46C7000', 'CAJA 11', 'Pendiente', 0, '2018-10-13 19:10:39', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(368, 'FUENTE', 'SONY', 'KDL-40EX401', 'CAJA 12', 'Publicada', 1049, '2018-10-13 19:16:33', NULL, 'APS-254', '147420211', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624870939-fuente-de-poder-sony-kdl-40ex401-aps-254ch-147420211-_JM', 3),
(369, 'FUENTE', 'SHARP', 'LC-55LE653U', 'CAJA 12', 'Publicada', 999, '2018-10-13 19:29:47', NULL, 'PSLF171301M', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625499601-fuente-de-poder-sharp-lc-55le653u-pslf171301m-_JM', 3),
(370, 'ZSUS', 'SAMSUNG', '50PA4500', 'CAJA 12', 'Publicada', 850, '2018-10-13 20:07:59', NULL, 'EAX64786801', 'EBR75416801', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621537365-zsus-lg-50pa4500-eax64786801-ebr75416801-_JM', 3),
(371, 'BUFFER', 'SAMSUNG', '50PA4500', 'CAJA 12', 'Publicada', 550, '2018-10-13 20:09:06', NULL, 'EAX64911201', 'EBR75516701', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625770813-buffer-lg-50pa4500-eax64911201-ebr75516701-_JM', 3),
(372, 'FUENTE', 'LG', '37LG505H', 'CAJA 12', 'Publicada', 900, '2018-10-13 20:13:59', NULL, 'EAX55357701', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625514177-fuente-de-poder-lg-37lg505h-eax55357701-_JM', 3),
(373, 'FUENTE', 'SAMSUNG', 'PL51E490B4F', 'CAJA 12', 'Publicada', 1099, '2018-10-13 20:16:41', NULL, 'BN44-00509B', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-611271194-fuente-de-poder-samsung-pl51e490b4f-bn44-00509b-_JM', 3),
(374, 'FUENTE', 'PHILIPS', '37HFL5581L/27', 'CAJA 12', 'Publicada', 950, '2018-10-13 20:24:44', NULL, 'PLHL-T846A', '3PAGC10004A-R', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621508760-fuente-de-poder-philips-37hfl5581l27-plhl-t846a-_JM', 3),
(375, 'FUENTE', 'LG', '60PN5300', 'CAJA 12', 'Publicada', 1400, '2018-10-13 20:25:50', NULL, 'EAX64880001/6', 'EAY62812701', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625515208-fuente-de-poder-lg-60pn5300-eax648800016-eay62812701-_JM', 3),
(376, 'FUENTE', 'PANASONIC', 'TC-L42E3', 'CAJA 12', 'Publicada', 999, '2018-10-13 20:27:53', NULL, 'TNPA5364', 'EAY62812701', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625511020-fuente-de-poder-panasonic-tc-l42e3-tnpa5364-_JM', 3),
(377, 'FUENTE', 'SHARP', 'LC-52D65U', 'CAJA 12', 'Publicada', 1750, '2018-10-13 20:45:13', NULL, 'DPS-277BP', 'RDENCA295WJQZ', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625516065-fuente-de-poder-sharp-lc-52d65u-dps-277bp-rdenca295wjqz-_JM', 3),
(378, 'FUENTE', 'LG', '42LV3500', 'CAJA 12', 'Publicada', 1300, '2018-10-13 21:52:12', NULL, 'EAY62171601', 'EAX63729001/8', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-612411633-fuente-de-poder-lg-42lv3500-eay62171601-eax637290018-_JM', 3),
(379, 'TCON', 'LG', '42LV3500', 'CAJA 12', 'Publicada', 0, '2018-10-13 21:53:15', NULL, '6871l-2555c', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-612410504-t-con-lg-42lv3500-6871l-2555c-6870c-0368a-_JM', 3),
(380, 'LED DRIVER', 'SONY', 'KDL-50W800B', 'CAJA 12', 'Publicada', 999, '2018-10-13 21:55:45', NULL, '14STM4250AD-6S01', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625506716-led-driver-sony-kdl-50w800b-14stm4250ad-6s01-_JM', 3),
(381, 'MAIN', 'SAMSUNG', 'LN40C540F2FXZA', 'CAJA 12', 'Publicada', 1250, '2018-10-13 21:58:13', NULL, 'BN96-15673A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625509160-tarjeta-main-samsung-ln40c540f2fxza-bn96-15673a-_JM', 3),
(382, 'MAIN', 'SAMSUNG', 'LT24C550NH', 'CAJA 12', 'Publicada', 899, '2018-10-13 21:59:39', NULL, 'BN94-07641E', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-646672056-tarjeta-main-samsung-lt24c550nh-bn94-07641e-_JM', 3),
(383, 'XSUS', 'PANASONIC', 'TH-42PH9UK', 'CAJA 12', 'Publicada', 940, '2018-10-13 22:00:28', NULL, 'TNPA3815', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625508329-xsus-panasonic-th-42ph9uk-tnpa3815-_JM', 3),
(384, 'LOGICA', 'SAMSUNG', 'PN50C430A1', 'CAJA 12', 'Publicada', 550, '2018-10-13 22:03:05', NULL, 'LJ92-01705', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-625578675-tarjeta-logica-samsung-pn50c430a1-lj92-01705-_JM', 3),
(385, 'LED DRIVER', 'LG', '42LV3500', 'CAJA 12', 'Publicada', 900, '2018-10-15 15:11:09', NULL, '3PEGC20008B-R', 'PCLF-D002F', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-624055000-led-driver-rca-dedm500m-3pegc20008b-r-_JM', 3),
(386, 'FUENTE', 'LG', '37LV3500', 'CAJA 12', 'Publicada', 1149, '2018-10-15 15:20:32', NULL, 'EAX62865601/8', 'LGP3237-115P', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-598835529-fuente-de-poder-lg-37lv3500-eax628656018-lgp3237-115p-_JM', 3),
(387, 'LED DRIVER', 'LG', '37LV3500', 'CAJA 12', 'Publicada', 900, '2018-10-15 15:40:56', NULL, '6917L-0056D', 'PPW-LE37GD-O', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647651106-led-driver-lg-37lv3500-6917l-0056d-ppw-le37gd-o-_JM', 3),
(388, 'FUENTE', 'RCA', 'DETC290M', 'CAJA 12', 'Publicada', 600, '2018-10-15 15:53:16', NULL, 'MP022-50 ', 'KB5150', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647652345-fuente-de-poder-rca-detc290m-mp022-50-kb5150-_JM', 3),
(389, 'FUENTE', 'SONY', 'KDL-32BX300', 'CAJA 13', 'Publicada', 1350, '2018-10-15 16:01:29', NULL, 'APS-254', '1-474-202-22', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-626270127-fuente-de-poder-sony-kdl-32bx300-1-474-202-22-_JM', 3),
(390, 'TARJETA AUDIO', 'SONY', 'KDL-32BX300', 'CAJA 13', 'Publicada', 550, '2018-10-15 16:02:19', NULL, '48.71S11.011', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626273356-audio-board-sony-kdl-32bx300-kdl-32fa600-4871s11011-_JM', 3),
(391, 'INVERTER', 'SONY', 'KDL-32BX300', 'CAJA 13', 'Publicada', 800, '2018-10-15 16:03:39', NULL, 'LJ97-02545C', 'SSI320_4UG01', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626268467-backlight-inverter-sony-kdl-32bx300-lj97-02545c-ssi3204ug01-_JM', 3),
(392, 'FUENTE', 'PHILIPS', '42FD9932', 'CAJA 13', 'Publicada', 1000, '2018-10-15 16:10:38', NULL, '310430335896', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626260166-fuente-de-poder-philips-42fd9932-310430335896-_JM', 3),
(393, 'XSUS', 'PHILIPS', '42FD9932', 'CAJA 13', 'Publicada', 1100, '2018-10-15 16:12:55', NULL, 'NA18100-5008', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626261289-xsus-philips-42fd9932-na18100-5008-_JM', 3),
(394, 'SUB FUENTE', 'PHILIPS', '42FD9932', 'CAJA 13', 'Publicada', 1000, '2018-10-15 16:12:56', NULL, 'NA18006-0002', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626260839-sub-fuente-philips-42fd9932-na18006-0002-_JM', 3),
(395, 'SC BOARD', 'PANASONIC', 'TH-42PWD8UK', 'CAJA 13', 'Publicada', 850, '2018-10-15 16:16:33', NULL, 'TNPA3543', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626281653-sc-board-panasonic-th-42pwd8uk-tnpa3543-_JM', 3),
(396, 'TARJETA TERMINAL', 'PANASONIC', 'TH-42PWD8UK', 'CAJA 13', 'Publicada', 500, '2018-10-15 16:41:58', NULL, 'TNPA2844', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626281932-terminal-board-panasonic-th-42pwd8uk-tnpa2844-_JM', 3),
(397, 'TARJETA TERMINAL', 'PANASONIC', 'TH-42PWD8UK', 'CAJA 13', 'Publicada', 550, '2018-10-15 16:41:59', NULL, 'TNPA2845', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626282160-terminal-board-panasonic-th-42pwd8uk-tnpa2845-_JM', 3),
(398, 'FUENTE', 'PANASONIC', 'TH-42PWD8UK', 'CAJA 13', 'Publicada', 850, '2018-10-15 16:43:09', NULL, 'TNPA3570', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626277550-fuente-panasonic-th-42pwd8uk-tnpa3570-_JM', 3),
(399, 'FUENTE', 'PANASONIC', 'TH-42PWD8UK', 'CAJA 13', 'Publicada', 1050, '2018-10-15 16:44:39', NULL, 'TNPA3630', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626280301-ranura-panasonic-th-42pwd8uk-tnpa3630-_JM', 3),
(400, 'SS BOARD', 'PANASONIC', 'TH-42PWD8UK', 'CAJA 13', 'Publicada', 500, '2018-10-15 16:45:39', NULL, 'EK5928X', 'TNPA3544', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626278522-ss-board-panasonic-th-42pwd8uk-tnpa3544-ek5928x-_JM', 3),
(401, 'LOGICA', 'PANASONIC', 'TH-42PWD8UK', 'CAJA 13', 'Publicada', 700, '2018-10-15 16:46:32', NULL, 'TNPA3634', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626279323-main-logic-panasonic-th-42pwd8uk-tnpa3634-_JM', 3),
(402, 'SU BUFFER', 'PANASONIC', 'TH-42PWD8UK', 'CAJA 13', 'Publicada', 499, '2018-10-15 16:47:33', NULL, 'TNPA3242', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626281041-su-buffer-panasonic-th-42pwd8uk-tnpa3242-_JM', 3),
(403, 'SD BUFFER', 'PANASONIC', 'TH-42PWD8UK', 'CAJA 13', 'Publicada', 550, '2018-10-15 16:48:20', NULL, 'TNPA3242', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626281041-su-buffer-panasonic-th-42pwd8uk-tnpa3242-_JM', 3),
(404, 'YSUS', 'LG', '50PQ60', 'CAJA 13', 'Publicada', 1249, '2018-10-15 16:54:01', NULL, 'EAX60987801', 'EBR61855101', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626282489-ysus-lg-50pq60-eax60987801-ebr61855101-_JM', 3),
(405, 'LOGICA', 'LG', '50PQ60', 'CAJA 13', 'Publicada', 850, '2018-10-15 16:54:33', NULL, 'EAX60966001', 'EBR61784803', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626282676-main-logic-lg-50pq60-eax60966001-ebr61784803-_JM', 3),
(406, 'FUENTE', 'LG', '50PQ60', 'CAJA 13', 'Publicada', 900, '2018-10-15 16:55:38', NULL, 'EAY60704701', '3PAGC00002A-R PSPU-J905', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626283214-fuente-lg-50pq60-eay60704701-pspu-j905-3pagc00002a-r-_JM', 3),
(407, 'ZSUS', 'LG', '50PQ60', 'CAJA 13', 'Publicada', 1050, '2018-10-15 16:56:11', NULL, 'EAX60988201', 'EBR61855201', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626283600-zsus-lg-50pq60-eax60988201-ebr61855201-_JM', 3),
(408, 'YBUFFER', 'LG', '50PQ60', 'CAJA 13', 'Publicada', 950, '2018-10-15 16:56:44', NULL, 'EAX61157201', 'EBR62647003', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626283804-y-buffer-lg-50pq60-eax61157201-ebr62647003-_JM', 3),
(409, 'YBUFFER', 'LG', '50PQ60', 'CAJA 13', 'Publicada', 950, '2018-10-15 16:57:36', NULL, 'EAX61157101', 'EBR62646703', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626284014-buffer-lg-50pq60-eax61157101-ebr62646703-_JM', 3),
(410, 'YSUS', 'PHILIPS', '42FD9932', 'CAJA 13', 'Publicada', 1100, '2018-10-15 18:56:34', NULL, 'NA18100-5007', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-626261521-ysus-philips-42fd9932-na18100-5007-_JM', 3),
(411, 'BUFFER IZQUIERDO', 'SONY', 'PFM-500A2WU', 'CAJA 13', 'Publicada', 1000, '2018-10-15 18:59:24', NULL, 'NA18100-5004', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626266435-buffer-izquierdo-sony-pfm-500a2wu-na18100-5004-_JM', 3),
(412, 'BUFFER DERECHO', 'SONY', 'PFM-500A2WU', 'CAJA 13', 'Publicada', 699, '2018-10-15 18:59:49', NULL, 'NA18100-5003', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626266947-buffer-derecho-sony-pfm-500a2wu-na18100-5003-_JM', 3),
(413, 'LOGICA', 'PANASONIC', 'TH-37PG9U', 'CAJA 13', 'Publicada', 1000, '2018-10-15 19:05:59', NULL, 'TNPA3901', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626262930-da-board-panasonic-th-37pg9u-tnpa3901-_JM', 1),
(414, 'FUENTE DE PODER', 'PHILLIPS', '24PFL508 ', 'CAJA 13', 'Publicada', 900, '2018-10-15 19:09:33', NULL, 'BA31L0F0102', 'A31LA022', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626276566-fuente-philips-24pfl508-ba31l0f0102-2-a31la022-_JM', 1),
(415, 'YSUS', 'PIONEER', 'PDP-505', 'CAJA 13', 'Publicada', 999, '2018-10-15 19:12:03', NULL, 'AWV2082', 'ANP2060-C', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-647695127-ysus-pioneer-pdp-505-anp2060-c-awv2082-_JM', 3),
(416, 'MAIN', 'ATVIO MITSUI', '520-RSC7-LEDC', 'CAJA 14 ', 'Publicada', 950, '2018-10-15 19:16:44', NULL, '800-RSC7V1AMMC-2AV0', '201105083', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626702531-tarjeta-main-atvio-mitsui-42-520-rsc7-ledc-_JM', 3),
(417, 'MAIN', 'PROVIEW', '3200 RX-276', 'CAJA 14', 'Publicada', 650, '2018-10-15 19:17:06', NULL, '200-100-HX276', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626703111-tarjeta-main-proview-3200-rx-276-200-100-hx276-_JM', 1),
(418, 'TCON', 'PROVIEW', '3200 RX-276', 'CAJA 14', 'Pendiente', 0, '2018-10-15 19:18:02', NULL, 'T3T5XW01', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(419, 'TUNER BOARD', 'PROVIEW', '3200 RX-276', 'CAJA 14', 'Pendiente', 0, '2018-10-15 19:18:46', NULL, '200-CO1-HX276', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(420, 'FUENTE', 'PHILIPS', '46PFL3908/F7', 'CAJA 14', 'Publicada', 1149, '2018-10-15 19:21:13', NULL, 'BA3AU0F0102 1', 'A3AQC-MPW', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-626703524-fuente-de-poder-philips-46pfl3908f7-ba3au0f0102-1-a3aqc-mpw-_JM', 3),
(421, 'FUENTE', 'LG', '42PC7DH', 'CAJA 14', 'Publicada', 1250, '2018-10-15 19:23:17', NULL, 'EAY32927901', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626702693-fuente-de-poder-lg-42pc7dh-eay32927901-_JM', 3),
(422, 'FUENTE DE PODER', 'SAMSUNG', 'PN42C430A1D', 'CAJA 14', 'Publicada', 1200, '2018-10-15 19:23:49', NULL, 'BN44-00329B', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-621509529-fuente-de-poder-samsung-pn42c430a1d-bn44-00329b-_JM', 1),
(423, 'BOCINAS', 'SAMSUNG', 'PN42C430A1D', 'CAJA 14', 'Pendiente', 0, '2018-10-15 19:24:17', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(424, 'BUFFER', 'SAMSUNG', 'PN42C430A1D', 'CAJA 14', 'Pendiente', 0, '2018-10-15 19:24:59', NULL, 'LJ41-08594A', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(425, 'XSUS', 'PHILIPS', '42FD9934', 'CAJA 14', 'Publicada', 1150, '2018-10-15 19:25:48', NULL, 'NA18106-5008', '', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-626703296-xsus-philips-42fd993417s-na18106-5008-_JM', 3),
(426, 'YSUS', 'PHILIPS', '42FD9934', 'CAJA 14', 'Publicada', 1150, '2018-10-15 19:26:23', NULL, 'NA18106-5009', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626703368-y-main-philips-42fd993417s-na18106-5009-_JM', 3),
(427, 'TCON', 'LG', '50PT350 ', 'CAJA 14', 'Publicada', 1099, '2018-10-15 19:27:17', NULL, 'EBR72680701 ', 'EAX63986201', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626285608-t-con-lg-50pt350-ebr72680701-eax63986201-_JM', 1),
(428, 'TCON', 'LG', '42PJ350', 'CAJA 14', 'Publicada', 1000, '2018-10-15 19:29:02', NULL, 'EBR63632301 ', 'EAX61314501', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626285129-t-con-lg-42pj350-ebr63632301-eax61314501-_JM', 1),
(429, 'BUFFER', 'LG', '42PJ350', 'CAJA 14', 'Publicada', 900, '2018-10-15 19:29:47', NULL, 'EAX61314701', 'EBR63633601', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626284792-buffer-lg-42pj350-eax61314701-ebr63633601-_JM', 1),
(430, 'FUENTE DE PODER', 'LG', '42PJ350', 'CAJA 14', 'Vendida', 968, '2018-10-15 19:30:40', NULL, 'EAX61415301 ', 'EAY60912401', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626284518-fuente-de-poder-lg-42pj350-eax61415301-eay60912401-_JM', 1),
(431, 'MAIN', 'LG', '42PJ350', 'CAJA 14', 'Publicada', 1249, '2018-10-15 19:31:39', NULL, 'EAX61358606 ', 'EBR65775803', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626284376-tarjeta-main-lg-42pj350-eax61358606-ebr65775803-_JM', 1),
(432, 'ZSUS', 'LG', '50PS11', 'CAJA 14', 'Publicada', 1400, '2018-10-15 19:34:57', NULL, 'EAX60936902 ', 'EBR58838402', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626287318-zsus-lg-50ps11-eax60936902-ebr58838402-_JM', 1),
(433, 'BUFFER', 'LG', '50PS11', 'CAJA 14', 'Publicada', 950, '2018-10-15 19:35:41', NULL, 'EBR61831702 ', 'EAX60982701', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626287001-buffer-lg-50ps11-ebr61831702-eax60982701-_JM', 1),
(434, 'BUFFER', 'LG', '50PS11', 'CAJA 14', 'Publicada', 950, '2018-10-15 19:36:31', NULL, 'EAX60982901 ', 'EBR61831602', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626286711-buffer-lg-50ps11-eax60982901-ebr61831602-_JM', 1),
(435, 'TCON', 'LG', '50PS11', 'CAJA 14', 'Publicada', 950, '2018-10-15 19:37:04', NULL, 'EAX54875301 ', 'EBR63280301', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-626286469-t-con-lg-50ps11-eax54875301-ebr63280301-_JM', 1),
(436, 'FUENTE', 'PANASONIC', ' TC-P60S30', 'CAJA 14', 'Publicada', 1400, '2018-10-15 19:44:34', NULL, 'N0AE6KM00003', 'PS-319-M', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636349570-fuente-de-poder-panasonic-tc-p60s30-n0ae6km00003-ps-319-m-_JM', 3),
(437, 'SUB FUENTE', 'PANASONIC', ' TC-P60S30', 'CAJA 14', 'Publicada', 1100, '2018-10-15 19:46:07', NULL, 'N0AE6KM00005', 'PS-319-S', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636350477-sub-fuente-panasonic-tc-p60s30-n0ae6km00005-ps-319-s-_JM', 3),
(438, 'MAIN', 'PANASONIC', ' TC-P60S30', 'CAJA 14', 'Publicada', 1100, '2018-10-15 19:46:34', NULL, 'TXN/A1PGUUS', 'NPH0914AD', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636351215-tarjeta-main-panasonic-tc-p60s30-txna1pguus-tnph0914ad-_JM', 3),
(439, 'YSUS', 'PANASONIC', ' TC-P60S30', 'CAJA 14', 'Publicada', 1300, '2018-10-15 19:47:06', NULL, 'TXNSC1PGUU', 'TNPA5399', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636351748-ysus-panasonic-tc-p60s30-txnsc1pguu-tnpa5399-_JM', 3),
(440, 'TARJETA C1', 'PANASONIC', ' TC-P60S30', 'CAJA 14', 'Publicada', 800, '2018-10-15 19:47:34', NULL, 'TNPA5324', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636352903-tarjeta-c1-panasonic-tc-p60s30-tnpa5324-_JM', 3),
(441, 'TARJETA C3', 'PANASONIC', ' TC-P60S30', 'CAJA 14', 'Publicada', 800, '2018-10-15 19:47:56', NULL, 'TNPA5326', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-636353336-tarjeta-c3-panasonic-tc-p60s30-tnpa5326-_JM', 3),
(442, 'YSUS', 'SAMSUNG', 'PN42C430A1D', 'CAJA 15', 'Publicada', 1100, '2018-10-15 19:54:06', NULL, 'LJ41-08592A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627339534-ysus-samsung-pn42c430a1d-lj41-08592a-_JM', 1),
(443, 'TCON', 'PHILLIPS', '42PFL5403D/2 ', 'CAJA 15', 'Publicada', 649, '2018-10-15 20:19:13', NULL, '6870C-4200C', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627347478-tcon-philips-42pfl5403d2-6870c-4200c-_JM', 1),
(444, 'MAIN', 'PHILLIPS', '42PFL5403D/2 ', 'CAJA 15', 'Publicada', 1100, '2018-10-15 20:21:24', NULL, 'LC08SP MB SSB', 'MT8280 NAFTA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627347187-main-philips-42pfl5403d2-lc08sp-mb-ssb-mt8280-nafta-_JM', 1),
(445, 'MAIN', 'SAMSUNG', 'PL42C433A4D', 'CAJA 15', 'Publicada', 1150, '2018-10-15 20:26:14', NULL, 'BN96-14704A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627338161-tarjeta-main-samsung-pl42c433a4d-bn96-14704a-_JM', 1),
(446, 'MAIN', 'SAMSUNG', 'PL42C433A4D', 'CAJA 15', 'Publicada', 1150, '2018-10-15 20:31:00', NULL, 'BN96-14704A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627338161-tarjeta-main-samsung-pl42c433a4d-bn96-14704a-_JM', 1),
(447, 'TARJETA', 'HITACHI', 'P50H401 ', 'CAJA 15', 'Publicada', 600, '2018-10-15 20:33:45', NULL, 'JA08234-D', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-632178964-tarjeta-hitachi-p50h401-ja08234-d-_JM', 1),
(448, 'INTERFAZ', 'HITACHI', 'P50H401 ', 'CAJA 15', 'Publicada', 500, '2018-10-15 20:34:32', NULL, 'ND25001-D131', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-632182397-tarjeta-interfaz-hitachi-p50h401-nd25001-d131-_JM', 1),
(449, 'BUFFER', 'PANASONIC', 'TH-50PX75U ', 'CAJA 15', 'Publicada', 1250, '2018-10-15 20:38:20', NULL, 'TNPA4189', 'TNPA4188', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619096769-buffers-panasonic-th-50px75u-tnpa4189tnpa4188-_JM', 1),
(450, 'YSUS', 'HITACHI', '55hds69 ', 'CAJA 15', 'Publicada', 1550, '2018-10-15 20:43:14', NULL, 'ND60200-0032', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627341841-y-main-hitachi-55hds69-nd60200-0032-_JM', 1),
(451, 'MAIN', 'PANASONIC', 'TH-50PX60', 'CAJA 16', 'Pendiente', 0, '2018-10-15 20:58:13', NULL, 'TNPA3769', 'NA', NULL, NULL, NULL, NULL, NULL, 'na', 1),
(452, 'MAIN', 'PHILLIPS', '46PFL4908', 'CAJA 16', 'Publicada', 1399, '2018-10-15 21:02:09', NULL, '3ARTAMZ', 'BA37U0G0401 2', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627670090-tarjeta-main-philips-46pfl4908-3artamz-ba37u0g0401-2-_JM', 1),
(453, 'MAIN', 'TOSHIBA', '42HP ', 'CAJA 16', 'Publicada', 1400, '2018-10-15 21:05:11', NULL, 'CMF083A', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-632177767-tarjeta-main-toshiba-42hp-cmf083a-_JM', 1),
(454, 'MODULO WIFI ', 'LG', '42LN5700', 'CAJA 15', 'Publicada', 400, '2018-10-15 21:06:49', NULL, 'WN8122E1', 'EAT61813801', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627342928-modulo-wifi-lg-42ln5700-wn8122e1-eat61813801-_JM', 3);
INSERT INTO `refacciones_tv` (`Id_refacciones`, `tipo`, `marca`, `modelo`, `ubicacion`, `estado`, `precio`, `fecha_entrada`, `fecha_salida`, `etiqueta_1`, `etiqueta_2`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `link`, `id_personal`) VALUES
(455, 'TCON', 'LG', '42LN5700', 'CAJA 15', 'Publicada', 800, '2018-10-15 21:07:25', NULL, '6871L-3403A', '6870C-0452A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-604113877-t-con-lg-42ln5700-6871l-3403a-6870c-0452a-_JM', 3),
(456, 'BOCINAS Y BOTONERA', 'LG', '42LN5700', 'CAJA 15', 'Pendiente', 0, '2018-10-15 21:07:52', NULL, 'NA', '', NULL, NULL, NULL, NULL, NULL, 'NA', 3),
(457, 'FUENTE DE PODER', 'LG', '42LN5300', 'CAJA 16', 'Publicada', 1650, '2018-10-15 21:14:16', NULL, 'EAX64905301 ', '3PCR00108A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-630946822-fuente-de-poder-lg-42ln5300-eax64905301-3pcr00108a-_JM', 1),
(458, 'MAIN', 'PHILLIPS', '32PFL3000/F8', 'CAJA 16', 'Publicada', 800, '2018-10-15 21:16:46', NULL, 'BA17FZG0401 1', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-628256770-main-digital-philips-32pfl3000f8-ba17fzg0401-1-_JM', 1),
(459, 'MAIN', 'LG', '42PA450', 'CAJA 16', 'Publicada', 1349, '2018-10-15 21:16:56', NULL, 'EAX64696607(1.0)', 'EBT62216602', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-628255240-tarjeta-main-lg-42pa450-eax6469660710-ebt62216602-_JM', 3),
(460, 'FUENTE', 'SONY', 'KDL-32EX340', 'CAJA 16', 'Publicada', 1050, '2018-10-15 21:18:42', NULL, 'APS-331', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-622936522-fuente-de-poder-sony-kdl-32ex340-aps-331-_JM', 3),
(461, 'INVERTER', 'SAMSUNG', 'LN37550 ', 'CAJA 16', 'Publicada', 630, '2018-10-15 21:23:13', NULL, 'INV37T10B', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627670839-backlight-inverter-samsung-ln37550-inv37t10b-_JM', 1),
(462, 'TCON', 'SAMSUNG', 'LN37550 ', 'CAJA 16', 'Publicada', 850, '2018-10-15 21:23:45', NULL, 'T315HW04', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627670518-tcon-samsung-ln37550-t315hw04-_JM', 1),
(463, 'MAIN', 'LG', '37LC50C', 'CAJA 16', 'Publicada', 1650, '2018-10-15 21:23:56', NULL, 'EAX37921505(0)', 'AGF33373101', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-627670208-tarjeta-main-lg-37lc50c-eax379215050-agf33373101-_JM', 3),
(464, 'MAIN', 'LG', '6870QCE020C', 'CAJA 16', 'Publicada', 600, '2018-10-15 21:26:20', NULL, 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-628260395-tarjeta-logica-main-lg-6870qce020c-_JM', 1),
(465, 'FUENTE DE PODER', 'SONY', 'KDL-46HX729', 'CAJA 17', 'Publicada', 1100, '2018-10-15 21:34:54', NULL, 'KDL-46HX729', 'APS-285 147433511', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638915852-fuente-de-poder-sony-kdl-46hx729-aps-285-147433511-_JM', 1),
(466, 'TCON', 'SONY', 'KDL-46HX729', 'CAJA 17', 'Publicada', 750, '2018-10-15 21:36:02', NULL, 'LJ94-16524B ', 'ESL_MB7_C2LV1.3', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647724571-tcon-sony-kdl-46hx729-lj94-16524b-eslmb7c2lv13-_JM', 1),
(467, 'FUENTE', 'PHILIPS', '32HFL2082D/F7', 'CAJA 17', 'Publicada', 1300, '2018-10-15 21:36:30', NULL, 'BA01F2F0102', 'A17FVMPW', NULL, NULL, NULL, NULL, NULL, 'http://articulo.mercadolibre.com.mx/MLM-638754245-fuente-de-poder-philips-32hfl2082df7-a17fvmpw-ba01f2f0102-_JM', 3),
(468, 'MAIN', 'SONY', 'KDL-46HX729', 'CAJA 17', 'Publicada', 1150, '2018-10-15 21:37:06', NULL, '1-884-078-22', 'NA', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-647724076-tarjeta-main-sony-kdl-46hx729-1-884-078-22-_JM', 1),
(469, 'TARJETA SC', 'PANASONIC', 'TH-50PX80U', 'CAJA 17', 'Publicada', 1100, '2018-10-15 21:46:39', NULL, 'TNPA4393', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638753671-tarjeta-sc-panasonic-th-50px80u-tnpa4393-_JM', 3),
(470, 'FUENTE', 'SAMSUNG', 'UN55C8000', 'CAJA 17', 'Publicada', 1800, '2018-10-15 21:47:16', NULL, 'PD55AF2_ZSM ', 'BN44-00363A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638914547-fuente-de-poder-samsung-un55c8000-pd55af2zsm-bn44-00363a-_JM', 1),
(471, 'TCON', 'SAMSUNG', 'UN55C8000', 'CAJA 17', 'Publicada', 1100, '2018-10-15 21:49:23', NULL, ' LJ94-03862B ', '2010_R240S_MB4_1.0', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638914617-tcon-samsung-un55c8000-lj94-03862b-2010r240smb410-_JM', 1),
(472, 'ZSUS', 'LG', 'DU-42PX12X', 'CAJA 17', 'Publicada', 700, '2018-10-15 21:54:26', NULL, '6871QZH034C', '6870QZH001D', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638753362-zsus-lg-du-42px12x-6871qzh034c-6870qzh001d-_JM', 3),
(473, 'FUENTE DE PODER', 'SAMSUNG', 'UN46FH5303F', 'CAJA 17', 'Publicada', 1300, '2018-10-15 21:58:24', NULL, 'BN44-0667A ', 'L46GF_DDY', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638762851-fuente-de-poder-samsung-un46fh5303f-bn44-0667a-l46gfddy-_JM', 1),
(474, 'FUENTE DE PODER', 'SAMSUNG', 'UN46FH5303F', 'CAJA 17', 'Publicada', 1800, '2018-10-15 21:59:16', NULL, 'BN44-0667A ', 'BN97-07055R', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-619307874-tarjeta-main-samsung-un46fh5303f-bn97-07055r-_JM', 1),
(475, 'XSUS', 'SAMSUNG', 'N50A450P1DXZA', 'CAJA 17', 'Publicada', 1000, '2018-10-15 22:00:20', NULL, 'LJ92-01515A', 'LJ41-05307A', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638756270-x-sus-samsung-pn50a450p1dxza-lj92-01515a-lj41-05307a-_JM', 3),
(476, 'XSUS', 'SAMSUNG', 'N50A450P1DXZA', 'CAJA 17', 'Publicada', 1000, '2018-10-15 22:01:30', NULL, 'LJ41-08457A', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638916446-xmain-samsung-pn50a450p1dxza-lj41-08457a-_JM', 3),
(477, 'TCON', 'SAMSUNG', 'UN55FH6003F', 'CAJA 17', 'Publicada', 1100, '2018-10-15 22:02:52', NULL, '55T10-C02', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638915206-tcon-samsung-un55fh6003f-55t10-c02-_JM', 3),
(478, 'TCON', 'RCA', 'DEDC320M4', 'CAJA 17', 'Publicada', 300, '2018-10-15 22:04:29', NULL, 'MT3151A05-5-XC-5', '', NULL, NULL, NULL, NULL, NULL, 'https://articulo.mercadolibre.com.mx/MLM-638754517-tcon-rca-dedc320m4-mt3151a05-5-xc-5-_JM', 3);

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
  `presupuesto` int(10) NOT NULL DEFAULT '0',
  `mano_obra` int(10) NOT NULL DEFAULT '0',
  `abono` int(11) NOT NULL DEFAULT '0',
  `restante` int(10) NOT NULL DEFAULT '0',
  `costo_total` int(10) NOT NULL DEFAULT '0',
  `valor` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `puntos` int(15) NOT NULL DEFAULT '0',
  `id_folio` int(10) DEFAULT NULL,
  `id_personal` int(10) DEFAULT '0',
  PRIMARY KEY (`id_equipo`),
  KEY `Id_folio` (`id_folio`),
  KEY `id_personal` (`id_personal`),
  KEY `id_personal_2` (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `reparar_tv`
--

INSERT INTO `reparar_tv` (`id_equipo`, `equipo`, `marca`, `modelo`, `serie`, `accesorios`, `falla`, `comentarios`, `fecha_ingreso`, `fecha_entregar`, `fecha_egreso`, `servicio`, `presupuesto`, `mano_obra`, `abono`, `restante`, `costo_total`, `valor`, `estado`, `ubicacion`, `puntos`, `id_folio`, `id_personal`) VALUES
(1, 'Television', 'XXX', 'XXx', 'Xx', 'xxx', 'XXx', '', '2018-11-10 21:28:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4415, 0),
(2, 'Television', 'XXX', 'XXx', 'Xx', 'xxx', 'XXx', '', '2018-11-10 21:30:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4415, 0),
(3, 'Television', 'f', 'f', 'F', 'f', 'F', '', '2018-11-10 21:52:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4423, 0),
(4, 'Television', 'C', 'C', 'C', 'c', 'C', '', '2018-11-10 21:53:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4422, 0),
(5, 'Television', 'VVV', 'VVv', 'VVV', 'vvv', 'VV', '', '2018-11-10 21:55:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4431, 0),
(6, 'Television', 'BB', 'BB', 'BB', 'bb', 'BB', '', '2018-11-10 22:00:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4463, 0),
(7, 'Television', 'HH', 'HH', 'HH', 'hh', 'HH', '', '2018-11-10 22:04:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4442, 0);

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
  `solicitud` varchar(50) NOT NULL,
  `parte` varchar(50) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `imagen1` varchar(80) NOT NULL,
  `imagen2` varchar(80) NOT NULL,
  `imagen3` varchar(80) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `id_equipo` (`id_equipo`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `reportes_tecnicos`
--

INSERT INTO `reportes_tecnicos` (`id_reporte`, `falla_especifica`, `solucion_especifica`, `conclusion`, `fecha`, `solicitud`, `parte`, `estado`, `imagen1`, `imagen2`, `imagen3`, `id_personal`, `id_equipo`) VALUES
(1, 'maicra', 'maicra', 'Sin solucion', '2018-11-10 15:39:47', 'NA', 'NA', 'asdas', 'assets/galeria/reporte/2/5000150/Diagrama1.jpg', 'assets/galeria/reporte/2/5000150/', 'assets/galeria/reporte/2/5000150/', 2, 5000150),
(2, 'asd', 'ño', 'Sin solucion', '2018-11-10 16:57:19', 'ASD', 'ASD', 'Pendiente', '', '', '', 2, 5000150),
(3, 'asd', 'ño', 'Sin solucion', '2018-11-10 16:57:20', 'ASD', 'ASD', 'Pendiente', '', '', '', 2, 5000150);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_traslado`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `traslado`
--

INSERT INTO `traslado` (`id_traslado`, `estado`, `direccion`, `comentarios`, `ubicacion`, `destino`, `fecha_solicitud`, `fecha_finalizado`, `id_equipo`, `id_carro`, `id_personal`, `id_folio`, `tipo`) VALUES
(1, 'Entregado', NULL, NULL, 'Taller', 'Taller', '2018-11-10 15:37:24', '2018-11-10 10:37:44', 5000150, 1, 6, 4583, ''),
(2, 'Pendiente', NULL, NULL, 'Taller', 'Recepcion', '2018-11-10 15:41:39', NULL, 5000150, NULL, 2, 0, ''),
(3, 'Entregado', NULL, NULL, 'Recepcion', 'Recepcion', '2018-11-10 15:43:37', '2018-11-10 10:45:03', 5000150, 0, 2, 0, ''),
(4, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 16:07:56', NULL, 5000151, NULL, 2, 4415, ''),
(5, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 16:32:22', NULL, 5000152, NULL, 2, 4418, ''),
(6, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 18:55:03', NULL, 5000153, NULL, 3, 4480, ''),
(7, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 21:21:04', NULL, 5000154, NULL, 3, 4414, ''),
(8, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 21:22:48', NULL, 5000155, NULL, 3, 4416, ''),
(9, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 21:25:06', NULL, 5000156, NULL, 3, 4416, ''),
(10, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 21:28:28', NULL, 1, NULL, 3, 4415, ''),
(11, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 21:30:00', NULL, 2, NULL, 3, 4415, ''),
(12, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 21:52:38', NULL, 3, NULL, 3, 4423, ''),
(13, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 21:53:41', NULL, 4, NULL, 3, 4422, ''),
(14, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 21:55:36', NULL, 5, NULL, 3, 4431, ''),
(15, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 22:00:13', NULL, 6, NULL, 3, 4463, ''),
(16, 'Pendiente', NULL, NULL, 'Recepcion', 'Taller', '2018-11-10 22:04:38', NULL, 7, NULL, 3, 4442, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `ventas_tv`
--

INSERT INTO `ventas_tv` (`idventa_tv`, `marca`, `modelo`, `serie`, `costo`, `imagen1`, `imagen2`, `imagen3`, `fecha_alta`, `fecha_egreso`, `estado`, `id_personal`, `idvendedor`, `ubicacion`, `id_equipo`, `id_folio`, `tipo`, `abono`) VALUES
(1, 'Samsung', 'un55mu6100fxzx', 'asdasd12345', 6500, '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\mx-uhdtv-mu6100-un55.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\mx-uhdtv-mu6100.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\jklhjlblkg.jpg', '2018-07-13 16:19:25', '2018-11-10 08:45:35', 'Vendida', 3, 2, 'Cliente', 5000150, 4583, 'Contado', 0),
(2, 'LG', '42ln5700', 'xasdas3623', 2300, 'assets\\galeria\\1.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\LG\\42ln5700\\xasdas3623\\lg2.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\LG\\42ln5700\\xasdas3623\\lg3.png', '2018-07-13 16:30:14', '2018-11-09 12:01:51', 'Vendida', 3, 3, 'Cliente', 5000023, 4583, 'Contado', 1000),
(4, 'Philips', '32pfl3508/f8', 'XA1A1404126727', 800, 'assets/galeria/venta/Philips/32pfl3508/f8/0/front-32pfl3508hd.jpg', NULL, NULL, '2018-09-26 16:37:16', '2018-11-07 12:27:17', 'En venta', 3, 3, 'Cliente', 5000010, 4427, 'Contado', 0),
(5, 'Sharp', 'LC-60C6500U', '0', 10000, 'assets/galeria/venta/Sharp/LC-60C6500U/0/891aae93-e9cb-4a20-ad77-2ce1aa15498b.jpg', NULL, NULL, '2018-09-26 20:23:15', '2018-09-26 14:29:27', 'Apartada', 3, 3, 'Pendiente traslado', 0, 4555, 'Credito', 0),
(6, 'LG', '42px', 'na', 0, 'assets/galeria/venta/LG/42px/na/50e36274d1af8f81-1.jpeg', NULL, NULL, '2018-10-04 22:28:39', '2018-10-04 16:29:45', 'Vendida', 1, 1, 'Cliente', 5000114, 4545, 'Contado', 0);

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

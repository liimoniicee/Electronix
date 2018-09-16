-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2018 at 12:42 AM
-- Server version: 5.7.19-log
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronicax`
--

-- --------------------------------------------------------

--
-- Table structure for table `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `id_equipo` int(11) NOT NULL,
  `sub-ubicacion` varchar(50) DEFAULT NULL,
  `sub-estado` varchar(50) DEFAULT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `personal_id_personal` int(11) NOT NULL,
  `reparar_tv_id_equipo` int(11) NOT NULL,
  `refacciones_tv_Id_refacciones` int(11) NOT NULL,
  `ventas_tv_idventa_tv` int(11) NOT NULL,
  `clientes_id_folio` int(10) NOT NULL,
  KEY `fk_almacen_personal1_idx` (`personal_id_personal`),
  KEY `fk_almacen_reparar_tv1_idx` (`reparar_tv_id_equipo`),
  KEY `fk_almacen_refacciones_tv1_idx` (`refacciones_tv_Id_refacciones`),
  KEY `fk_almacen_ventas_tv1_idx` (`ventas_tv_idventa_tv`),
  KEY `fk_almacen_clientes1_idx` (`clientes_id_folio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `avisos`
--

DROP TABLE IF EXISTS `avisos`;
CREATE TABLE IF NOT EXISTS `avisos` (
  `id_aviso` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `folio` int(11) NOT NULL,
  `aviso` varchar(500) NOT NULL,
  `estado` varchar(25) NOT NULL,
  PRIMARY KEY (`id_aviso`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avisos`
--

INSERT INTO `avisos` (`id_aviso`, `fecha`, `folio`, `aviso`, `estado`) VALUES
(1, '2018-07-03 20:37:43', 4514, 'Nose un pinche morrillo, me lo voy a coger!', 'Solucionado'),
(2, '2018-07-03 20:53:04', 0, 'Sergio Rodriguez 62411327161 pregunta por un control smart tv marca lg, en caso de no tenerlo, ofrecerle la comp\r\nra de uno.\r\n\r\n4 de julio no contestó.', 'Solucionado'),
(3, '2018-07-04 18:34:37', 4428, 'Darle prioridad a su television, ya dejo anticipo de $1400', 'Solucionado'),
(4, '2018-07-04 20:38:55', 0, 'Mauricio Nava 6241562623 KDL-42W650A, Dejo la tele en venta.(Negociar de manera flexible) se le compro por $500.00', 'Solucionado'),
(5, '2018-07-04 21:40:25', 0, 'Le preste un cable de corriente a Hector, alias el Capi :v', 'Solucionado'),
(6, '2018-07-04 23:13:32', 4463, 'Recoleccion para dia juevez 5 de Julio a partir de las 8 am.\r\nFranccionamiento Santa Fé Oro Calle S.Ramon #143 entre Aguajitos y Migriño, como referenci a es la segunda calle(dentro del fraccionamiento) Ana Rosa', 'Solucionado'),
(7, '2018-07-05 15:00:03', 0, 'Sony Blanco, Buscarlo, mañana pasara por el,(No sirve la pantalla)', 'Solucionado'),
(8, '2018-07-05 22:19:06', 4452, 'Llamar el dia sabado 7 de julio.\n6243583586 Juan de Dios', 'Solucionado'),
(9, '2018-07-07 21:40:25', 4465, 'Le interesa comprar una tele, para cuando haya una :)', 'Solucionado'),
(10, '2018-07-07 22:26:02', 4465, 'Ir a su casa a reprogramar la orientacion de la television panasonic, lunes 9 de Julio', 'Solucionado'),
(11, '2018-07-09 22:05:52', 0, 'No me acuerdo del folio pero dijo que eran dos tablets y un celular me parece, 4407 (no recuerdo el ultimo numero) :v', 'Solucionado'),
(12, '2018-07-10 17:26:09', 4470, 'Elaborar garatia por reparacion de equipo lg 42PC1DVH', 'Solucionado'),
(13, '2018-07-11 18:52:12', 0, 'Andres bautista 6241785685, que onda con su dinero me dice, que le dio a usted 3300 para reparar la pantalla rota de una samsung de 46 led', 'Pendiente'),
(14, '2018-07-12 17:21:41', 4404, 'Luis Gomez entregar television para el 26 de Julio, 6241798176', 'Solucionado'),
(15, '2018-07-12 20:36:52', 0, 'Omar Camarena Tele sony de 70 falla de la main 6241097449', 'Solucionado'),
(16, '2018-07-12 20:45:53', 4435, 'Deposito pendiente 800 ', 'Solucionado'),
(17, '2018-07-14 18:30:48', 4471, 'Va recoger su equipo, pregunta si tenemos alguna tele para venta', 'Pendiente'),
(18, '2018-07-14 19:09:56', 0, 'Taller mecanico de jetas, hasta el fondo a una calle boulevar, a la tercera calle, taller de chatarra ella vive en la esquina', 'Solucionado'),
(19, '2018-07-16 16:37:16', 3007, 'Maria Elena Calderon, 6241683485, le dio $450.00 control de Blue-ray samsung', 'Pendiente'),
(20, '2018-07-18 18:42:43', 0, 'Ignacio Suarez, quiere vendernos una tele lg de 42 con pantalla rota, 6241762014', 'Solucionado'),
(21, '2018-07-20 19:01:30', 0, 'Huberth Jose Camacho 6241860315, quiere vendernos una all in one, pantalla rota, podemosrepararla y usarla como escritorio,  la deja en  $300.00', 'Solucionado'),
(22, '2018-07-21 16:24:00', 4443, 'Deposito por $800.00 para el día 25/julio, tarjeta banorte 4915 6683 5018 5195', 'Solucionado'),
(23, '2018-07-25 20:28:13', 4493, '$178.00 abonó un control lg.', 'Solucionado'),
(24, '2018-07-27 15:41:32', 0, '6243587997 $2300.00 depositar Sr. Salomon 4766-8408-3543-7695 para Lunes 30 Jul.', 'Pendiente'),
(25, '2018-08-11 17:50:36', 4508, 'Plazo maximo para pagarle antes del día 25 de agosto la cantidad de $1000.00 a travez de mercadolibre', 'Pendiente'),
(26, '2018-08-11 22:20:20', 0, 'Carlos el de la toshiba vendra el dìa lunes por una tele en el transcurso del dìa', 'Pendiente'),
(27, '2018-08-21 17:46:35', 0, 'giovanny hp pavilion negra dio anticipo solucionar maximo 4 de septiembre', 'Pendiente'),
(28, '2018-08-30 22:02:51', 0, 'Julio Cesar Rodriguez 6241590239  Mezclador LG estaba quemado vendrá  a recogerlo', 'Pendiente'),
(29, '2018-09-03 19:01:54', 0, 'Pantalla Hisense Edgar Chef resta $3000 de $3500 6241576726', 'Pendiente'),
(30, '2018-09-07 17:43:49', 0, 'Gerente LordBlack Angel 6241213253 esta pendiente  una pantalla.', 'Pendiente');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4564 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_folio`, `nombre`, `apellidos`, `direccion`, `correo`, `celular`, `fecha`, `puntos`) VALUES
(4414, 'Jose Manuel', 'Barraza', '', '', '6241470340', '2018-06-02 21:37:09', 0),
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
(4544, 'prueba', 'probado', 'colonia pff', 'e@e.com', '12123', '2018-09-13 23:15:23', 0),
(4545, 'prueba', 'probado', 'colonia pff', 'e@e.com', '12123', '2018-09-13 23:17:01', 0),
(4546, 'prueba', 'probado', 'colonia pff', 'e@e.com', '12123', '2018-09-13 23:17:09', 0),
(4547, 'prueba', 'probado', 'colonia pff', 'e@e.com', '12123', '2018-09-13 23:17:48', 0),
(4548, 'prueba', 'probado', 'colonia pff', 'e@e.com', '12123', '2018-09-13 23:17:51', 0),
(4549, 'prueba', 'probado', 'colonia pff', 'e@e.com', '12123', '2018-09-13 23:18:23', 0),
(4550, 'prueba', 'probado', 'colonia pff', 'e@e.com', '12123', '2018-09-13 23:19:34', 0),
(4551, 'prueba', 'probado', 'colonia pff', 'e@e.com', '12123', '2018-09-13 23:20:39', 0),
(4552, 'asd', 'asd', 'asd', 'cercano', '12124', '2018-09-14 00:03:09', 0),
(4553, 'prueba', 'asd', 'asd', 'cercano', '121233', '2018-09-14 00:03:59', 0),
(4554, 'Jonathan', 'asd', 'colonia pff', 'cercano', '121238', '2018-09-14 00:08:41', 0),
(4555, 'evento2', 'probado', 'colonia pff', 'cercano', '1212333', '2018-09-14 00:09:35', 0),
(4556, 'evento2', 'probado', 'asd', 'asd@e.com', '121233333333', '2018-09-14 00:11:49', 0),
(4557, 'prueba', 'probado', 'colonia pff', 'asd@e.com', '1212343', '2018-09-14 00:13:36', 0),
(4558, 'prueba', 'probado', 'colonia pff', 'cercano', '121233423', '2018-09-14 00:14:31', 0),
(4559, 'prueba', 'asd', 'colonia pff', 'cercano', '231312312', '2018-09-14 00:16:16', 0),
(4560, 'evento2', 'probado', 'colonia pff', 'cercano', '12123342', '2018-09-14 00:20:17', 0),
(4561, 'asdasd', 'asdasdasdasd', 'asdasda', 'sdasdasdasd', '31232312', '2018-09-14 00:20:34', 0),
(4562, 'asdasdasd', 'sdasdasd', 'asdasdasda', 'sdasdasd', '12312312312', '2018-09-14 00:21:34', 0),
(4563, 'evento2', 'asd', 'colonia pff', 'cercano', '12123555', '2018-09-14 01:03:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cobranza`
--

DROP TABLE IF EXISTS `cobranza`;
CREATE TABLE IF NOT EXISTS `cobranza` (
  `id_cobranza` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cantidad` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_folio` int(11) NOT NULL,
  PRIMARY KEY (`id_cobranza`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cobranza`
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
-- Table structure for table `depositos`
--

DROP TABLE IF EXISTS `depositos`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depositos`
--

INSERT INTO `depositos` (`id_deposito`, `fecha`, `autorizacion`, `cuenta`, `cantidad`, `imagen`, `serie`, `id_personal`, `id_equipo`, `id_folio`) VALUES
(1, '2018-07-19 21:37:27', 'xxxx', 'xxxx', 800, '\\Base de datos\\Equipos Reparados\\Depositos\\4458\\5\\5000061\\pagado-300x290.png', '', 5, 5000061, 4458),
(2, '2018-07-21 14:45:12', 'xxxx', 'xxxx', 2400, '\\Base de datos\\Equipos Reparados\\Depositos\\4444\\3\\5000024\\pagado-300x290.png', '', 3, 5000024, 4444),
(3, '2018-07-25 18:25:33', 'xxx', 'xxx', 700, '\\Base de datos\\Equipos Reparados\\Depositos\\4485\\3\\5000069\\pagado-300x290.png', '', 3, 5000069, 4485);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
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
  PRIMARY KEY (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id_personal`, `tipo`, `usuario`, `contrasena`, `nombre`, `apellidos`, `correo`, `celular`) VALUES
(1, 'Administrador', 'Juan', 'c4ca4238a0b923820dcc509a6f75849b', 'Jorge ', 'Diaz', 'A', '0'),
(2, 'Tecnico', 'Tecnico', 'c4ca4238a0b923820dcc509a6f75849b', 'x', 'x', 'x', '0'),
(3, 'Administrador', 'Isra', 'c4ca4238a0b923820dcc509a6f75849b', 'israel', 'martinez', 'promartinez2@gmail.com', '6241543710'),
(4, 'Jefe de Taller', 'Taller', 'c4ca4238a0b923820dcc509a6f75849b', 'X', 'X', 'X', '0'),
(5, 'Recepcion', 'recepcion', 'c4ca4238a0b923820dcc509a6f75849b', 'Recepcion', 'RSH', 'Na', '0'),
(6, 'Traslado', 'traslado', 'c4ca4238a0b923820dcc509a6f75849b', 'Pedrito', 'Sola', 'Na', '0');

-- --------------------------------------------------------

--
-- Table structure for table `refacciones_tv`
--

DROP TABLE IF EXISTS `refacciones_tv`;
CREATE TABLE IF NOT EXISTS `refacciones_tv` (
  `Id_refacciones` int(11) NOT NULL AUTO_INCREMENT,
  `pieza` varchar(45) DEFAULT NULL,
  `marcas` varchar(45) DEFAULT NULL,
  `modelos` varchar(45) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `almacen` int(10) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `precio` int(15) NOT NULL,
  `fecha_entrada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_salida` text NOT NULL,
  `etiqueta_1` varchar(50) NOT NULL,
  `etiqueta_2` varchar(50) DEFAULT NULL,
  `imagen1` varchar(300) NOT NULL,
  `imagen2` varchar(300) NOT NULL,
  `imagen3` varchar(300) NOT NULL,
  `imagen4` varchar(300) NOT NULL,
  `imagen5` varchar(300) NOT NULL,
  `id_personal` int(10) DEFAULT '0',
  PRIMARY KEY (`Id_refacciones`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reparar_electrodomesticos`
--

DROP TABLE IF EXISTS `reparar_electrodomesticos`;
CREATE TABLE IF NOT EXISTS `reparar_electrodomesticos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `equipo` varchar(50) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
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
  `estado` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `puntos` int(15) NOT NULL DEFAULT '0',
  `id_folio` int(10) DEFAULT NULL,
  `id_personal` int(10) DEFAULT '0',
  PRIMARY KEY (`id_equipo`),
  KEY `Id_folio` (`id_folio`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reparar_electrodomesticos`
--

INSERT INTO `reparar_electrodomesticos` (`id_equipo`, `equipo`, `marca`, `modelo`, `accesorios`, `falla`, `comentarios`, `fecha_ingreso`, `fecha_entregar`, `fecha_egreso`, `servicio`, `presupuesto`, `mano_obra`, `abono`, `restante`, `costo_total`, `estado`, `ubicacion`, `puntos`, `id_folio`, `id_personal`) VALUES
(1, 'Cafetera', 'Viking', 'VCCM12', 'Ninguno', 'No enciende', '', '2018-07-16 17:06:00', '2018-07-16 17:08:23', '2018-07-16 06:00:00', 'Garantia', 0, 1500, 0, 1500, 1500, 'Pendiente', 'Recepcion', 0, 4480, 0),
(2, 'Inverter', 'Cotek', 'SP-2000-224', 'Ninguno', 'falla en la tarjeta pwm', '', '2018-07-20 19:51:49', '2018-07-20 06:00:00', '2018-07-20 06:00:00', 'Taller', 0, 0, 3800, -3800, 0, 'Pendiente', 'Recepcion', 0, 4486, 0),
(3, 'Ventilador', 'OPTIMUS', 'F-6105', 'BASE Y CABLE', 'NO FUNCIONA', '', '2018-08-06 18:48:30', '2018-08-06 06:00:00', '2018-08-06 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4505, 0),
(4, 'Ventilador torre', 'Birtman', 'bt-40', 'base,cable y control', 'No gira', '', '2018-08-06 18:49:38', '2018-08-06 06:00:00', '2018-08-06 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4505, 0),
(5, 'Ventilador torre', 'ONN', '2563mn', 'base,cable y control', 'Aveces funciona', '', '2018-08-06 18:51:08', '2018-08-06 06:00:00', '2018-08-06 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4505, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reparar_tv`
--

DROP TABLE IF EXISTS `reparar_tv`;
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
  `estado` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `puntos` int(15) NOT NULL DEFAULT '0',
  `id_folio` int(10) DEFAULT NULL,
  `id_personal` int(10) DEFAULT '0',
  PRIMARY KEY (`id_equipo`),
  KEY `Id_folio` (`id_folio`),
  KEY `id_personal` (`id_personal`),
  KEY `id_personal_2` (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=5000150 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reparar_tv`
--

INSERT INTO `reparar_tv` (`id_equipo`, `equipo`, `marca`, `modelo`, `serie`, `accesorios`, `falla`, `comentarios`, `fecha_ingreso`, `fecha_entregar`, `fecha_egreso`, `servicio`, `presupuesto`, `mano_obra`, `abono`, `restante`, `costo_total`, `estado`, `ubicacion`, `puntos`, `id_folio`, `id_personal`) VALUES
(5000000, 'Television', 'Sharp', 'LC-70LE550EU', '', 'Ninguno', 'Se va la imagen', '', '2018-06-02 22:47:05', '2018-06-09 06:00:00', '2018-06-09 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Sin solucion', 'Taller', 0, 4414, 2),
(5000001, 'Television', 'Otros', 'atv2416led', '', 'Ninguno', 'No se mira', '', '2018-06-04 20:47:29', '2018-06-04 06:00:00', '2018-07-20 16:14:49', 'Taller', 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4415, 2),
(5000002, 'Television', 'samsung', 'ln32c350d1d', '', 'Ninguno', 'No enciende', '', '2018-06-07 17:53:03', '2018-07-20 17:35:08', '2018-06-08 06:00:00', 'Taller', 0, 1800, 0, 0, 1800, 'Entregado', 'Cliente', 0, 4417, 2),
(5000003, 'Television', 'AOC', 'L32W961', '', 'Ninguno', 'No enciende', 'Se guardó un tiempo y cuando la quisieron volver a usar, ya no encendio', '2018-06-11 15:20:40', '2018-07-20 17:32:08', '2018-07-07 20:47:33', 'Taller', 0, 1000, 0, 0, 1000, 'Entregado', 'Cliente', 0, 4420, 2),
(5000004, 'Television', 'Otros', 'HKP32F16', '', 'Ninguno', 'Tiene codigo', 'Marca HKPro', '2018-06-11 17:50:36', '2018-07-18 20:41:05', '2018-06-19 01:32:29', 'Taller', 0, 500, 0, 0, 500, 'Entregado', 'Cliente', 0, 4422, 2),
(5000005, 'Television', 'LG', '49LF5900', '', 'Ninguno', 'Pantalla rota', 'Se le prestó una tele con valor de $5500.00 dejó 3000 ya depositados 29/08/18', '2018-06-11 20:40:50', '2018-06-11 06:00:00', '2018-06-11 06:00:00', 'Taller', 1312, 1000, 2500, 3000, 5500, 'autorizacion taller', 'Taller', 0, 4423, 2),
(5000006, 'Television', 'LG', '47LN5700', '', 'Ninguno', 'No enciende la pantalla y no funciona el internet', 'No agarra wifi ni el cable, probable falla de leds', '2018-06-12 15:19:37', '2018-07-18 20:41:48', '2018-06-19 01:32:47', 'Taller', 0, 3200, 3200, 0, 3200, 'Entregado', 'Cliente', 0, 4424, 2),
(5000007, 'Television', 'LG', '50LN5710', '', 'Ninguno', 'Falla de los leds', '', '2018-06-12 15:25:18', '2018-07-19 15:59:30', '2018-06-12 21:22:13', 'Taller', 0, 1500, 1500, 0, 1500, 'Entregado', 'Cliente', 0, 4425, 2),
(5000008, 'Television', 'AOC', 'L32W961', '', 'Ninguno', 'Pantalla estrellada', '', '2018-06-12 15:44:31', '2018-06-12 06:00:00', '2018-06-12 06:00:00', 'Taller', 123123, 450, 0, 0, 1950, 'autorizacion taller', 'Taller', 0, 4418, 2),
(5000009, 'Television', 'Samsung', 'HG32NA478', '', 'Ninguno', 'No enciende', '', '2018-06-12 18:13:22', '2018-09-12 22:38:56', '2018-06-12 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Diagnosticada', 'Taller', 0, 4426, 2),
(5000010, 'Television', 'Otros', 'aiwa 19', '', 'Ninguno', 'no prende', 'al principio no se veia bien despues ya no prendio.\r\nLa señora estuvo de acuerdo en desechar la television.', '2018-06-12 21:29:08', '2018-06-12 06:00:00', '2018-07-11 14:44:58', 'Taller', 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4427, 2),
(5000011, 'Television', 'Samsung', '', '', 'Otros (Especificar en comentarios)', 'pantalla rota', 'deja fuente de poder ', '2018-06-13 01:28:13', '2018-06-12 06:00:00', '2018-06-12 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Necesita refaccion', 'Taller', 0, 4428, 2),
(5000012, 'Television', 'LG', '47LN5310', '', 'Ninguno', 'LEDS', '', '2018-06-16 20:21:04', '2018-07-19 16:11:34', '2018-06-16 20:22:42', 'Domicilio', 0, 1800, 1800, 0, 1800, 'Entregado', 'Cliente', 0, 4430, 2),
(5000013, 'Television', 'LG', 'RM-20LZ50', '', 'Cable de corriente', 'No enciende', '', '2018-06-16 21:13:35', '2018-09-12 23:01:09', '2018-06-16 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Diagnosticada', 'Taller', 0, 4431, 2),
(5000014, 'Television', 'Samsung', 'UN50FH5303F', '', 'Base', 'Esta oscuro', '', '2018-06-19 15:59:25', '2018-06-19 06:00:00', '2018-06-19 06:00:00', 'Taller', 0, 2800, 0, 2800, 2800, 'Reparada', 'Taller', 0, 4433, 2),
(5000015, 'Television', 'Philips', '32pfl4909', '', 'Ninguno', 'sin falla', 'se le vendio por aprox 1900', '2018-06-20 00:47:04', '2018-09-12 23:03:04', '2018-06-19 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Diagnosticada', 'Taller', 0, 4434, 2),
(5000016, 'Television', 'LG', '32LD350', '', 'Ninguno', 'Se apaga rapidamente', '', '2018-06-20 16:53:33', '2018-06-20 06:00:00', '2018-07-20 18:37:07', 'Taller', 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4435, 2),
(5000017, 'Television', 'Vizio', '42hdtv10a', '', 'Ninguno', 'no prende', 'se le dio precio de 2500 solicitandole 1800 para refaccion quedaq de resolver.', '2018-06-21 00:56:42', '2018-09-05 16:38:10', '2018-09-05 23:57:42', 'Taller', 1800, 850, 1800, 0, 2650, 'Entregado', 'Cliente', 0, 4436, 2),
(5000018, 'Television', 'LG', '32lc5dcs', '', 'Ninguno', 'tarda para encender', 'comenta que cuando se enciende se pone azul la pantalla', '2018-06-21 01:18:06', '2018-09-12 23:06:53', '2018-06-20 06:00:00', 'Taller', 0, 1000, 0, 0, 1000, 'Diagnosticada', 'Taller', 0, 4437, 2),
(5000019, 'Television', 'LG', '42LC4D', '', 'Base', 'Tarjeta bloqueada', 'Se cambian solo los canales', '2018-06-21 14:57:53', '2018-08-06 17:51:28', '2018-06-21 06:00:00', 'Garantia', 0, 0, 0, 0, 2000, 'Entregado', 'Cliente', 0, 4438, 2),
(5000020, 'Television', 'Hisense', '40H5B2', '', 'Cable de corriente', 'Revision', '', '2018-06-21 18:24:37', '2018-06-21 06:00:00', '2018-06-21 06:00:00', 'Taller', 1800, 0, 0, 0, 1800, 'Pendiente', 'Taller', 0, 4440, 2),
(5000021, 'Television', 'LG', '42LS5650', '', 'Cable de corriente', 'No da imagen', 'Antigo folio del señor 4402', '2018-06-22 15:47:16', '2018-06-22 06:00:00', '2018-06-22 06:00:00', 'Taller', 2500, 1000, 2500, 1000, 3500, 'Reparada', 'Taller', 0, 4441, 2),
(5000022, 'Television', 'DWDISPLAY', 'DW-24SP', '', 'Ninguno', 'Falla en el volumen', 'DWDISPLAY', '2018-06-22 17:39:25', '2018-06-22 06:00:00', '2018-06-22 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4442, 2),
(5000023, 'Television', 'Atvio', 'ATV4013LED', '', 'Ninguno', 'Enciende pero no da imagen', '', '2018-06-23 15:10:03', '2018-06-23 06:00:00', '2018-06-23 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Sin solucion', 'Taller', 0, 4443, 2),
(5000024, 'Television', 'LG', '50PW350', '', 'Base', 'No enciende', 'Comenzo a fallar y no daba video pero audio sí, hasta que tronó algo y ahora no enciende', '2018-06-23 17:29:50', '2018-07-19 16:13:36', '2018-06-30 22:08:54', 'Garantia', 0, 0, 0, 0, 2400, 'Depositado', 'Recepcion', 0, 4444, 0),
(5000025, 'Television', 'Sony Bravia', 'KDL-40W700C', '', 'Cable de corriente', 'Pantalla rota', 'Eliminador', '2018-06-25 17:52:49', '2018-07-20 17:20:50', '2018-06-25 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Entregado', 'Cliente', 0, 4445, 0),
(5000026, 'Television', 'LG', '42LN549E', '', 'Ninguno', 'Funciona y se apaga y enciende sola de un rato', '', '2018-06-25 19:44:58', '2018-06-25 06:00:00', '2018-06-25 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4446, 2),
(5000027, 'Television', 'LG', '60LS579C-UA', '', 'Cable de corriente y Base', 'Enciende y todo pero no se ve, sin golpes', '', '2018-06-25 19:50:37', '2018-06-25 06:00:00', '2018-06-25 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4446, 2),
(5000028, 'Television', 'Sony Bravia', 'KDL-32W600D', '', 'Cable de corriente', 'Pantalla rota', 'eliminador de corriente', '2018-06-25 21:48:52', '2018-06-25 06:00:00', '2018-06-25 06:00:00', 'Taller', 1800, 600, 1800, 600, 2400, 'Diagnosticada', 'Taller', 0, 4447, 2),
(5000029, 'Television', 'Philips', '40pfl4904/f8', '', 'Ninguno', 'ruido y no prende', '', '2018-06-26 00:34:46', '2018-07-19 16:15:58', '2018-06-30 15:33:19', 'Taller', 1800, 600, 2400, 0, 2400, 'Entregado', 'Cliente', 0, 4449, 2),
(5000030, 'Television', 'LG', '42px11', '', 'Ninguno', 'no se mira', '', '2018-06-26 19:14:05', '2018-07-20 17:19:41', '2018-07-07 19:39:18', 'Taller', 0, 1800, 1800, 0, 1800, 'Entregado', 'Cliente', 0, 4450, 2),
(5000031, 'Television', 'Atvio', 'LE32CL-44', '', 'Ninguno', 'Pantalla rota', 'MARCA ATVIO, patas', '2018-06-26 22:23:54', '2018-07-23 19:36:56', '2018-06-26 06:00:00', 'Taller', 1400, 400, 0, 1800, 1800, 'Diagnosticada', 'Taller', 0, 4452, 2),
(5000032, 'Television', 'Sharp', 'LC-60C6500', '', 'Control de TV', 'No da imagen', 'control y cable de corriente,antiguo folio es 4382', '2002-01-01 06:24:53', '2018-06-27 06:00:00', '2018-06-27 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4453, 2),
(5000033, 'Television', 'Vios', '32DLEDTV1301S', '', 'Base', 'Falla en conector de antena', 'BASE DE PARED', '2018-06-28 15:30:26', '2018-07-20 17:17:06', '2018-06-30 20:55:40', 'Taller', 300, 300, 0, 0, 600, 'Entregado', 'Cliente', 0, 4456, 2),
(5000034, 'Television', 'Atvio', 'LE32CL-A4', '', 'Base', 'Pantalla rota', 'marca atvio, patas', '2018-06-28 15:32:57', '2018-06-28 06:00:00', '2018-06-28 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4455, 2),
(5000035, 'Television', 'RCA', 'DEDC320M4', '', 'Base', 'Le falla una lupa de led', '', '2018-06-28 17:48:45', '2018-07-07 06:00:00', '2018-06-28 06:00:00', 'Garantia', 0, 0, 0, 0, 1200, 'Pendiente', 'Recepcion', 0, 4457, 0),
(5000036, 'Television', 'Sony Bravia', 'KDL-32ML130', '', 'Base', 'No enciende', '', '2018-06-28 17:51:00', '2018-07-20 17:15:57', '2018-06-30 19:41:15', 'Taller', 0, 1600, 0, 0, 1600, 'Entregado', 'Cliente', 0, 4458, 2),
(5000037, 'Television', 'LG', '49UJ6200', '', 'Ninguno', 'Pantalla dañada', '', '2018-06-29 17:47:42', '2018-06-29 17:47:42', '2018-06-29 17:47:42', 'Taller', 3500, 1000, 3500, 1000, 4500, 'Depositado', 'Taller', 0, 4424, 2),
(5000038, 'Television', 'DWDISPLAY', 'DW-3246', '', 'Patas', 'Pantalla estrellada', 'Dejo presupuesto', '2018-06-29 20:02:05', '2018-06-29 20:02:05', '2018-06-29 20:02:05', '', 0, 0, 1500, 0, 1500, 'Pendiente', 'Taller', 0, 4459, 2),
(5000039, 'Television', 'Philips', '32PFL4508/F8', '', 'Ninguno', 'No enciende', 'antiguo folio 4341, se adquirio pieza, llega el día martes', '2018-06-30 16:51:53', '2018-07-01 06:00:00', '2018-06-30 16:51:53', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4460, 2),
(5000040, 'Television', 'Sony Bravia', 'KDL-32ML130', '', 'Base', 'No enciende', '', '2018-07-03 19:48:52', '2018-07-03 06:00:00', '2018-07-03 06:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4458, 2),
(5000041, 'Television', 'Samsung', 'UN50J5300AF', '', 'Base', 'Pantalla quebrada', '', '2018-07-04 19:40:09', '2018-07-04 06:00:00', '2018-07-04 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4462, 2),
(5000042, 'Television', 'Hisense', '50K20DW', '', 'Base', 'Falla de iluminacion', 'fue recolectada', '2018-07-05 16:56:57', '2018-07-05 06:00:00', '2018-07-05 06:00:00', 'Domicilio', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4463, 2),
(5000043, 'Television', 'DWDisplay', 'DW-24SP', '', 'Base', 'Pantalla con parpadéo', '', '2018-07-06 15:55:56', '2018-07-20 16:41:32', '2018-07-06 06:00:00', 'Taller', 0, 300, 300, 0, 300, 'Entregado', 'Cliente', 0, 4464, 2),
(5000044, 'Television', 'Philips', '32PFL4901/F8', '', 'Base', 'No enciende', '', '2018-07-06 22:05:23', '2018-07-06 06:00:00', '2018-07-06 06:00:00', 'Taller', 0, 0, 1500, 0, -1500, 'Pendiente', 'Taller', 0, 4461, 2),
(5000045, 'Television', 'Panasonic', 'TC-32DS600X', '', 'Base', 'Pantalla rota', '', '2018-07-06 22:38:45', '2018-07-06 06:00:00', '2018-07-06 06:00:00', 'Taller', 1800, 400, 0, 0, 2200, 'Pendiente', 'Taller', 0, 4465, 2),
(5000046, 'Television', 'Atvio', 'le23', '', 'Ninguno', 'rf', '', '2018-07-07 19:27:41', '2018-07-20 16:40:58', '2018-07-07 22:17:16', 'Taller', 0, 300, 0, 0, 300, 'Entregado', 'Cliente', 0, 4466, 2),
(5000047, 'Television', 'DWDisplay', 'DW-24SP', '', 'Base', 'No enciende', '', '2018-07-07 19:58:54', '2018-07-07 06:00:00', '2018-07-07 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4464, 0),
(5000048, 'Television', 'RCA', 'DEDT420M4', '', 'Base', 'Para revisar', 'A la vuelta de ferretera carrillo', '2018-07-07 23:08:55', '2018-07-07 06:00:00', '2018-07-07 06:00:00', 'Domicilio', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4467, 0),
(5000049, 'Television', 'AOC', 'L19W631', '', 'Ninguno', 'No enciende', '', '2018-07-09 15:29:23', '2018-07-18 16:54:36', '2018-07-18 16:56:07', 'Taller', 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4468, 2),
(5000050, 'Television', 'DWDisplay', 'DW-24SP', '', 'Base', 'Enciende pero no da imagen', '', '2018-07-09 22:05:05', '2018-07-20 16:39:35', '2018-07-10 21:28:26', 'Taller', 0, 300, 0, 0, 300, 'Entregado', 'Cliente', 0, 4469, 0),
(5000051, 'Television', 'LG', '42PC1DVH', '', 'Base', 'No enciende', '', '2018-07-10 17:35:36', '2018-07-20 16:19:01', '2018-07-10 17:36:36', 'Garantia', 0, 0, 0, 0, 1500, 'Pendiente', 'Recepcion', 0, 4470, 0),
(5000052, 'Television', 'DWDisplay', 'DW-24SP', '', 'Base', 'Tinta chorreada', '', '2018-07-11 14:53:03', '2018-07-11 06:00:00', '2018-07-11 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion con traslado solicitado', 0, 4471, 0),
(5000053, 'Television', 'Otros', '40D3505T', '', 'Cable de corriente', 'Pantalla rota', 'Marca Haier, patas y cable', '2018-07-11 18:17:35', '2018-07-12 06:00:00', '2018-07-11 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Devuelto', 'Taller', 0, 4472, 2),
(5000054, 'Television', 'Sony Bravia', 'KDL-55W800B', '', 'Cable de corriente', 'Pantalla rota', 'Eliminador', '2018-07-11 18:24:21', '2018-07-11 06:00:00', '2018-08-27 18:12:25', 'Taller', 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4473, 0),
(5000055, 'Television', 'Samsung', 'LN32B360C5D', '', 'Base', 'Imagen empalmada', '', '2018-07-12 14:42:25', '2018-07-12 20:00:54', '2018-07-12 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Taller', 0, 4474, 2),
(5000056, 'Television', 'Samsung', 'UN40FH5303F', '', 'Ninguno', 'Se escucha pero no se ve', '', '2018-07-12 18:55:49', '2018-07-20 16:29:05', '2018-07-13 23:44:49', 'Taller', 0, 2800, 0, 0, 2800, 'Entregado', 'Cliente', 0, 4475, 2),
(5000057, 'Television', 'LG', '43LH5700', '', 'Cable de corriente', 'Pantalla estrellada', '', '2018-07-12 20:20:32', '2018-07-12 06:00:00', '2018-07-12 06:00:00', 'Taller', 3500, 1000, 3500, 1000, 4500, 'Pendiente', 'Recepcion', 0, 4476, 0),
(5000058, 'Television', 'LG', '50LN5710', '', 'Base', 'Se escucha pero no se ve', '', '2018-07-13 20:49:36', '2018-07-23 23:30:11', '2018-07-13 06:00:00', 'Taller', 0, 3000, 0, 0, 0, 'Entregado', 'Cliente', 0, 4478, 2),
(5000059, 'Television', 'Samsung', 'UN60FH6003', '', 'Base', 'Golpe', 'Cable de corriente y base(la dejaron en una caja grande)', '2018-07-14 18:45:04', '2018-07-14 06:00:00', '2018-07-14 06:00:00', 'Taller', 5000, 2000, 3000, 4000, 7000, 'Almacen', 'Recepcion', 0, 4479, 0),
(5000060, 'Television', 'LG', '42PJ550', '', 'Ninguno', 'Le salió una raya', '', '2018-07-14 18:46:00', '2018-07-19 20:08:03', '2018-07-14 06:00:00', 'Taller', 0, 1800, 1800, 0, 1800, 'Entregado', 'Cliente', 0, 4479, 2),
(5000061, 'Television', 'LG', '42LC7D', '', 'Base', 'Batalla para encender ', 'base y control remoto', '2018-07-16 15:16:11', '2018-07-19 21:31:45', '2018-07-17 18:23:05', 'Taller', 0, 800, 0, 0, 800, 'Almacen', 'Cliente', 0, 4458, 2),
(5000062, 'Television', 'LG', '32LN530B', '', 'Base', 'Se apaga', '', '2018-07-17 18:57:57', '2018-07-17 06:00:00', '2018-07-17 06:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4482, 0),
(5000063, 'Television', 'Philips', '32PFL4909', '', 'Ninguno', 'No enciende', 'REPARACION FUENTE', '2018-07-17 19:01:52', '2018-07-17 06:00:00', '2018-08-13 19:04:09', 'Taller', 950, 0, 950, 0, 950, 'Entregado', 'Cliente', 0, 4481, 0),
(5000064, 'Television', 'Panasonic', 'TC-L32C5X', '', 'Base', 'Pantalla rota', 'Dueño de la Birrieria los compadres, que estan buenas dijo :v', '2018-07-18 18:14:07', '2018-07-23 23:11:53', '2018-07-18 06:00:00', 'Taller', 1400, 400, 0, 1800, 1800, 'Necesita pieza', 'Taller', 0, 4483, 2),
(5000065, 'Television', 'LG', '42PN4500', '', 'Ninguno', 'Falla en la pantalla', '', '2018-07-18 19:50:03', '2018-07-19 21:23:10', '2018-07-18 06:00:00', 'Garantia', 0, 0, 0, 0, 1800, 'Pendiente', 'Recepcion', 0, 4484, 0),
(5000066, 'Television', 'LG', '42px4', '', 'Ninguno', 'se apago', '', '2018-07-20 18:08:27', '2018-09-08 20:12:15', '2018-09-08 20:14:01', 'Taller', 1150, 0, 0, 0, 1150, 'Entregado', 'Cliente', 0, 4485, 0),
(5000067, 'Television', 'LG', '42', '', 'Patas', 'Se congela la imagen', '', '2018-07-24 18:00:40', '2018-07-24 06:00:00', '2018-07-24 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4487, 0),
(5000068, 'Television', 'Toshiba', '42TL515U', '', 'Cable de corriente', 'No enciende', '', '2018-07-24 21:35:09', '2018-07-24 06:00:00', '2018-07-24 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4490, 0),
(5000069, 'Television', 'LG', '32LC5DCS', '', 'Base', 'Batalla para encender', '', '2018-07-25 16:21:19', '2018-07-25 18:05:25', '2018-07-25 06:00:00', 'Taller', 0, 700, 0, 0, 700, 'Depositado', 'Cliente', 0, 4485, 2),
(5000070, 'Television', 'LG', '42LN5300', '', 'Base', 'Problema al encender', 'montador de pared', '2018-07-25 16:59:34', '2018-08-01 19:34:29', '2018-08-01 20:43:01', 'Taller', 1000, 0, 0, 0, 1000, 'Entregado', 'Cliente', 0, 4491, 2),
(5000071, 'Television', 'Daewoo', 'DP-42SM', '', 'Ninguno', 'No enciende', '', '2018-07-25 17:40:23', '2018-07-25 06:00:00', '2018-07-25 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4492, 0),
(5000072, 'Television', 'Samsung', 'HG32NA478', '', 'Base', 'Está bloqueada', 'se la bloquearon los niños', '2018-07-26 21:12:43', '2018-07-26 06:00:00', '2018-07-27 20:59:54', 'Taller', 0, 0, 0, 0, 0, 'Devuelto', 'Cliente', 0, 4494, 0),
(5000073, 'Television', 'Samsung', 'un32j4300af', '', 'Cable de corriente', 'pantalla quebrada', 'quiere que compremos su television.\r\nle abono jorge 300 queda de pasar por 400 sabado 28 julio 2018.', '2018-07-27 14:49:24', '2018-07-27 06:00:00', '2018-07-27 06:00:00', 'Compra', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion con traslado solicitado', 0, 4495, 0),
(5000074, 'Television', 'Philips', 'Sin etiqueta', '', 'Ninguno', 'Rayas en la pantalla', '', '2018-07-27 14:59:37', '2018-07-28 17:47:08', '2018-07-27 06:00:00', 'Taller', 3000, 1000, 0, 4000, 4000, 'Diagnosticada', 'Taller', 0, 4496, 2),
(5000075, 'Television', 'Vizio', '55EV', '', 'Base', 'No prende', '', '2018-07-30 15:11:27', '2018-07-30 06:00:00', '2018-07-31 21:44:27', 'Domicilio', 0, 0, 0, 0, 4000, 'Entregado', 'Cliente', 0, 4498, 0),
(5000076, 'Television', 'DWDisplay', 'dw-24sp', '', 'Patas', 'nada màs se escucha ', 'rf flojo', '2018-07-31 00:12:29', '2018-07-30 06:00:00', '2018-07-30 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion con traslado solicitado', 0, 4499, 0),
(5000077, 'Television', 'Sony Bravia', 'KDL-32BX321', '', 'Ninguno', 'No enciende', '', '2018-07-31 17:12:30', '2018-07-31 06:00:00', '2018-07-31 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4500, 0),
(5000078, 'Television', 'LG', '32LD350', '', 'Cable de poder', 'No enciende', 'Un amigo inteto repararsela, pero se fue de viaje y la dejo a medias, posbiel fallo en la fuente.\nDeja las tarjetas fuera de la tele\n', '2018-07-31 21:31:25', '2018-08-01 16:55:53', '2018-08-01 18:28:29', 'Garantia', 0, 0, 0, 0, 1200, 'Pendiente', 'Recepcion', 0, 4501, 0),
(5000079, 'Television', 'Samsung', 'UN40EH5300F', '', 'Ninguno', 'Se enciende y se apaga', '', '2018-08-04 15:35:20', '2018-08-04 06:00:00', '2018-08-04 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4503, 0),
(5000080, 'Television', 'Sony Bravia', 'KDL-32R400A', '', 'Base', 'Pantalla rota', '', '2018-08-04 18:38:23', '2018-08-04 06:00:00', '2018-08-04 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4477, 0),
(5000081, 'Television', 'Samsung', 'UN49MU6100F', '', 'Ninguno', 'Pantalla rota', '', '2018-08-06 17:55:59', '2018-08-06 06:00:00', '2018-08-27 18:12:12', 'Taller', 3500, 1000, 0, 4500, 4500, 'Devuelto', 'Cliente', 0, 4504, 0),
(5000082, 'Television', 'Otros', 'PTV3915ILED', '', 'Base', 'Se pone oscura', '', '2018-08-06 18:07:16', '2018-08-06 06:00:00', '2018-08-06 18:45:54', 'Taller', 0, 450, 0, 0, 450, 'Entregado', 'Cliente', 0, 4502, 0),
(5000083, 'Television', 'Hisense', '46K366WN', '', 'Base y cable de poder', 'NO ENCIENDE', 'Genoveva 6242259871\r\nViene del  taller Zeus', '2018-08-06 20:39:21', '2018-08-06 06:00:00', '2018-08-06 06:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4506, 0),
(5000084, 'Television', 'Toshiba', '55TL515U', '', 'Ninguno', 'NO PRENDE', '', '2018-08-09 22:13:17', '2018-08-09 06:00:00', '2018-08-09 06:00:00', 'Taller', 0, 2600, 0, 2600, 2600, 'Reparada', 'Taller', 0, 4507, 0),
(5000085, 'Television', 'Samsung', 'UN40KU6000F', '', 'Ninguno', 'Equipo para venta en mercado libre', '', '2018-08-11 17:44:19', '2018-08-11 06:00:00', '2018-08-11 06:00:00', 'Compra', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4508, 0),
(5000086, 'Television', 'Sony Bravia', 'KDL-37L4000', '', 'Base', 'SE VE VERDE', '', '2018-08-16 18:16:55', '2018-08-17 06:00:00', '2018-08-17 15:48:13', 'Taller', 0, 1600, 0, 0, 1600, 'Entregado', 'Cliente', 0, 4509, 0),
(5000087, 'Television', 'Vios', 'VLEDTV3914', '', 'Ninguno', 'RAYAS EN LA PANTALLA  Y SE APAGA', '', '2018-08-18 17:28:51', '2018-09-28 06:00:00', '2018-08-20 17:32:03', 'Taller', 0, 300, 0, 300, 300, 'Comprada', 'Recepcion', 0, 4510, 0),
(5000088, 'Television', 'Samsung', 'HG40NA577', '', 'Base', 'NO ENCIENDE, DEJÓ DE DAR IMAGEN', '', '2018-08-18 18:25:12', '2018-08-29 06:00:00', '2018-08-20 17:32:03', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4511, 0),
(5000089, 'Television', 'Hitachi', 'P50H401A', '', 'Base', 'NO  ENCIENDE', '', '2018-08-20 15:54:28', '2018-09-01 15:17:28', '2018-08-20 17:32:03', 'Taller', 1800, 750, 1800, 750, 2550, 'Reparada', 'Taller', 0, 4512, 0),
(5000090, 'Television', 'Philips', '40PFL4911', '', 'Base', 'ENCIENDE ESTANCADA EN LOGO', '', '2018-08-20 17:29:09', '2018-08-27 06:00:00', '2018-08-20 17:32:03', 'Domicilio', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4513, 0),
(5000091, 'Television', 'Philips', '50PFL4909/F8', '', 'Base', 'NO ENCIENDE', '', '2018-08-20 17:59:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4514, 0),
(5000092, 'Television', 'Otros', 'DX-LDVD19-10A', '', 'Base', 'SE APAGA AL ENCENDER', 'Marca Dynex', '2018-08-20 19:21:29', '2018-08-24 15:25:16', '0000-00-00 00:00:00', 'Taller', 0, 400, 0, 400, 400, 'Reparada', 'Taller', 0, 4515, 2),
(5000093, 'Television', 'Vizio', 'D43F-E1', '', 'Patas', 'SE APAGA A LOS 5 MINUTOS', '', '2018-08-21 18:04:08', '2018-08-29 06:00:00', '0000-00-00 00:00:00', 'Taller', 1500, 500, 0, 2000, 2000, 'Reparada', 'Taller', 0, 4516, 0),
(5000094, 'Television', 'Samsung', 'UN32J4300', '', 'Base de pared', 'PANTALLA ROTA', 'base pared y patas', '2018-08-22 21:01:39', '2018-09-01 06:00:00', '0000-00-00 00:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4518, 0),
(5000095, 'Television', 'Philips', '32HFL5561V/27', '', 'Ninguno', 'NO ENCIENDE', '', '2018-08-23 00:45:50', '2018-08-01 06:00:00', '0000-00-00 00:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4519, 0),
(5000096, 'Television', 'Vizio', 'M3D470KD', '', 'Base', 'PANTALLA DAÑADA', '', '2018-08-24 15:16:51', '2018-08-29 06:00:00', '0000-00-00 00:00:00', 'Taller', 2600, 750, 2600, 750, 3350, 'Reparada', 'Recepcion', 0, 4512, 0),
(5000097, 'Television', 'Samsung', 'UN32J4300', '', 'Ninguno', 'PANTALLA ROTA', '', '2018-08-27 21:07:31', '2018-08-29 06:00:00', '0000-00-00 00:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4524, 0),
(5000098, 'Television', 'Philips', '39PFL4208/F8', '', 'Ninguno', 'FALLA EN LA PANTALLA', '', '2018-08-29 16:47:12', '2018-09-12 16:27:57', '0000-00-00 00:00:00', 'Taller', 2600, 750, 0, 3350, 3350, 'Reparada', 'Recepcion', 0, 4525, 2),
(5000099, 'Television', 'Vios', 'TV3914SM', '', 'Patas', 'NO ENCIENDE', '', '2018-08-31 22:40:32', '2018-08-31 06:00:00', '2018-09-01 20:28:08', 'Domicilio', 0, 1300, 0, 0, 1300, 'Entregado', 'Cliente', 0, 4529, 0),
(5000100, 'Television', 'LG', '42LB5550', '', 'Patas', 'NO  DA IMAGEN', 'solo da audio pero imagen no.', '2018-09-01 20:55:13', '2018-09-02 00:52:30', '2018-09-02 00:54:29', 'Taller', 0, 0, 0, 0, 0, 'Entregado', 'Cliente', 0, 4530, 0),
(5000101, 'Television', 'LG', '55LW5700', '', 'Ninguno', 'NO ENCIENDE', 'viene de otro taller', '2018-09-04 22:43:04', '2018-09-04 22:47:13', '0000-00-00 00:00:00', 'Taller', 0, 0, 0, 0, 0, 'Diagnosticada', 'Taller', 0, 4531, 2),
(5000102, '', 'Samsung', 'UN32F5500', '', 'Ninguno', 'no enciende', '', '2018-09-05 00:27:48', '2018-09-06 01:02:54', '0000-00-00 00:00:00', 'Domicilio', 0, 900, 900, 0, 900, 'Reparada', 'Taller', 0, 4532, 2),
(5000103, 'Television', 'LG', '42LU25', '', 'Ninguno', 'PANTALLA ROTA', '', '2018-09-05 15:32:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4528, 0),
(5000104, 'Television', 'Samsung', 'UN55K6500', '', 'Base', 'PANTALLA ROTA', '', '2018-09-05 15:35:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Taller', 6000, 1500, 6000, 1500, 7500, 'Pendiente', 'Recepcion', 0, 4512, 0),
(5000105, 'Television', 'LG', '42PG1HD', '', 'Ninguno', 'NO ENCIENDE', '', '2018-09-05 16:22:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Taller', 1600, 750, 1600, 750, 2350, 'Pendiente', 'Recepcion', 0, 4533, 0),
(5000106, 'Television', 'Hisense', '40H5D', '', 'Ninguno', 'PANTALLA ROTA', '', '2018-09-05 17:48:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Taller', 0, 0, 1400, -1400, 0, 'Pendiente', 'Recepcion', 0, 4534, 0),
(5000107, 'Television', 'LG', '43LF5900', '', 'Ninguno', 'PANTALLA ROTA', '', '2018-09-06 01:44:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Taller', 0, 0, 2800, -2800, 0, 'Pendiente', 'Recepcion', 0, 4535, 0),
(5000108, 'TELEVISION', 'LG', '50LN5710', '', 'Base de pared', 'PANTALLA CON RAYAS', 'TIENE HUMEDAD, SE REALIZARÁ MANTINIMIENTO A PANTALLA', '2018-09-06 22:04:07', '2018-09-06 22:07:33', '0000-00-00 00:00:00', 'Taller', 0, 0, 0, 0, 0, 'Diagnosticada', 'Taller', 0, 4536, 2),
(5000109, 'Television', 'SAMSUNG', 'UN24H4000', '030R3CHH902461L', 'Base', 'PANTALLA ROTA', 'Se daÃ±o en paqueteria DHL', '2018-09-10 20:04:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4538, 0),
(5000110, 'Television', 'Philips', '', '', 'Base', 'PANTALLA ESTRELLADA', '', '2018-09-10 22:23:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Taller', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4539, 0),
(5000111, 'Fuente de poder', 'LIFE FITNESS', 'VARIOS', 'AK58001530001', 'NINGUNO', 'NO FUNCIONA', '', '2018-09-11 16:34:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4540, 0),
(5000112, 'Television', 'SAMSUNG', 'UN46D6000', 'Z3FE3CAB300083L', 'Ninguno', 'PARPADEA LA PANTALLA', '', '2018-09-11 22:05:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4543, 0),
(5000113, 'Ventiladores', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-13 23:21:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4551, 0),
(5000114, 'Tarjeta madre', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:05:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4423, 0),
(5000115, 'Tarjeta madre', 'ASDS', 'SIDFJSIODFJQ', 'ASDA', 'asda', 'ASDA', 'fsdfsfsdf', '2018-09-14 00:22:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4562, 0),
(5000116, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:27:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000117, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:36:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000118, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:36:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000119, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:36:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000120, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:36:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000121, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:37:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Compra', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000122, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:37:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000123, 'Television', 'ASDS', 'SIDFJSIODFJQ', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:44:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000124, 'Television', 'ASDS', 'SIDFJSIODFJQ', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:45:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000125, 'Television', 'ASDS', 'SIDFJSIODFJQ', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:48:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000126, 'Television', 'ASDS', 'SIDFJSIODFJQ', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:49:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000127, 'Television', 'ASDS', 'SIDFJSIODFJQ', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:57:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000128, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 00:58:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000129, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:00:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000130, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:03:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4563, 0),
(5000131, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:05:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4563, 0),
(5000132, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:05:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4563, 0),
(5000133, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:05:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4563, 0),
(5000134, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:06:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4563, 0),
(5000135, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:06:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4563, 0),
(5000136, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:06:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4563, 0),
(5000137, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:07:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000138, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:11:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000139, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:16:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Garantia', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000140, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:16:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000141, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:16:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000142, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:17:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000143, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:17:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000144, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:36:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000145, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-14 01:37:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000146, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-15 00:17:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000147, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-15 00:19:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Domicilio', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000148, 'Television', 'ASDS', '42ln5700', 'ASDA', 'asda', 'ASDA', '', '2018-09-15 00:19:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Compra', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0),
(5000149, 'Television', 'ASDS', 'SIDFJSIODFJQ', 'ASDA', 'asda', 'ASDA', '', '2018-09-15 00:29:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Reparacion', 0, 0, 0, 0, 0, 'Pendiente', 'Recepcion', 0, 4414, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reportes_tecnicos`
--

DROP TABLE IF EXISTS `reportes_tecnicos`;
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportes_tecnicos`
--

INSERT INTO `reportes_tecnicos` (`id_reporte`, `falla_especifica`, `solucion_especifica`, `conclusion`, `fecha`, `solicitud`, `parte`, `estado`, `imagen1`, `imagen2`, `imagen3`, `id_personal`, `id_equipo`) VALUES
(1, 'se va la imagen despues de unos minutos', 'se realizan pruebas de dinamica para emulacion de falla sin obtener resultados.', 'pantalla dañada.', '2018-06-07 15:02:13', '', '', '', '', '', '', 2, 5000000),
(2, 'La televisiòn no encendìa', 'hicismos prueba de voltaje, y no levantaba los 5 volts necesarios en standby del funcionamiento de la main, se ubicò  un par de filtros malos y posteriormente se reemplazo', 'La television quedò funcionando perfectamente', '2018-06-11 15:50:01', '', '', '', '', '', '', 2, 5000003),
(3, 'Tiene codigo', 'Se localizo el codigo', 'Quedò reparada', '2018-06-11 17:52:12', '', '', '', '', '', '', 2, 5000004),
(4, 'No prende', 'se realiza inspeccion de tarjeta fuente encontrando humedad y  realizando procedimiento de reparacion a nivel componente se reemplaza pistas dañadas.', 'Quedo reparada', '2018-06-12 15:41:39', '', '', '', '', '', '', 2, 5000002),
(5, 'No funciona el modulo de wifi, y un par de tiras leds sin imagen', 'se reemplazaron los leds y se sustituyo la pieza el modulo wifi', 'la tv quedo reparada', '2018-06-12 20:21:35', '', '', '', '', '', '', 2, 5000006),
(6, 'malos los led se mira a lo lejos', 'se procedio a desemsamble de panel y a reemplazo de modem', 'queda lista', '2018-06-12 21:17:42', '', '', '', '', '', '', 2, 5000007),
(7, 'no agarra señal', 'no se reviso', 'la devolvieron', '2018-06-13 18:05:02', '', '', '', '', '', '', 2, 5000001),
(8, 'pantalla rota', 'no hay pantalla', 'se manda a bodega', '2018-06-13 18:05:38', '', 'pantalla 32', '', '', '', '', 2, 5000011),
(9, 'pantalla rota', 'se reviso y esta mala la pantalla', 'se manda a bodega', '2018-06-13 18:07:13', '', 'panatalla', '', '', '', '', 2, 5000005),
(10, 'panatalla rota', 'se reviso y esta dañadalña pantalla', 'se amnda a bodega', '2018-06-13 18:07:51', '', 'pantalla', '', '', '', '', 2, 5000008),
(11, 'Entrada de ipod/iphone dañada', 'Se resoldo cada patita de la entrada', 'Equipo reparado satsifactoraimente', '2018-06-16 19:02:58', '', '', '', '', '', '', 2, 1),
(12, 'No ilumina la pantalla', 'Se repararon tres tras de leds', 'Equipo reparado', '2018-06-16 20:22:01', '', '', '', '', '', '', 2, 5000012),
(13, 'no imagen\r\n', 'se les dio mantenimiento a tarjetas estaban llenas de polvo', 'queda penndiente por ic de buffer parte de abajo\r\n', '2018-06-26 18:57:27', '', 'ebr71736901', '', '', '', '', 2, 5000024),
(14, 'no prende y pilla', 'se reemplazo condensador de superficie en corto', 'quedo reparada satisfactoriamente', '2018-06-26 18:58:35', '', '', '', '', '', '', 2, 5000029),
(15, 'Falla en la fuente de poder', 'Se realizo la adaptacion de una fuente funcionando', 'el equipo quedo reparado exitosamente', '2018-06-30 18:54:18', '', '', '', '', '', '', 2, 5000036),
(16, 'Falla en el conector de la antena', 'se sustituyo la pieza entera', 'Reparada correctamente', '2018-06-30 18:56:46', '', '', '', '', '', '', 2, 5000033),
(17, 'prende y se corta la pantalla', 'se detecta que los leds solo trabajan parcilamente se procedea desemsmblar pantalla encontrando 3 dañados se puentean y de todos modos esta dañada la tarjeta driver controladora ', 'no hay solucion no hay refaccion', '2018-07-06 19:05:37', '', '', '', '', '', '', 2, 5000023),
(18, 'Se miran rayas', 'Cambio de main', 'Reparada', '2018-07-07 19:35:39', '', '', '', '', '', '', 2, 5000030),
(19, 'Parpadeo en pantalla', 'No se hizo nada se retiró la humedad sola', 'reparada', '2018-07-07 20:04:29', '', '', '', '', '', '', 2, 5000043),
(20, 'Falla en RF', 'Se cambio toda la piea', 'Reparado', '2018-07-07 22:15:17', '', '', '', '', '', '', 2, 5000046),
(21, 'Falla en la fuente de poder\r\n', 'Se reemplazo con otra tele, manteniendo las partes originales', 'Reparada correctamente', '2018-07-13 15:10:08', '', '', '', '', '', '', 2, 5000056),
(22, 'No sube el agua', 'Se repara la fuente', 'Reparada', '2018-07-16 17:08:52', '', '', '', '', '', '', 2, 1),
(23, 'Falla en no se donde:v', 'pues le cambie algo xd', 'Ya quedo reparada', '2018-07-17 15:18:52', '', '', '', '', '', '', 2, 5000061),
(24, 'Falla con raya en la parte inferior', 'Se le cambio la tarjeta main', 'Reparado', '2018-07-17 20:21:55', '', '', '', '', '', '', 2, 5000060),
(25, 'Falla en la fuente', 'No hay refaccion para la tele, es muy vieja', 'no esta reparada', '2018-07-18 16:55:15', '', '', '', '', '', '', 2, 5000049),
(26, 'se apaga despues de unos segundos', 'se comprueba que es tarjeta main dañada', 'ya no la quisieron arreglar se compro', '2018-07-19 17:56:00', '', '', '', '', '', '', 2, 5000016),
(27, 'esta oscura ', 'se probaron tarjetas', 'quedo lista se reem`plazo tcon como falla principal', '2018-07-19 18:12:11', '', '', '', '', '', '', 2, 5000014),
(28, 'parapdea', 'se encontraron leds dañados y se reemplazaron', 'quedo lista', '2018-07-20 17:53:57', '', '', '', '', '', '', 2, 5000058),
(29, 'Falla en los filtros de la fuente', 'Se sustituyeron los filtros', 'equipo reparado ', '2018-07-25 17:53:34', '', '', '', '', '', '', 2, 5000069),
(30, 'Pantalla rota', 'Se necesita cambiar la pantalla shavo', 'Pendiente de presupuesto', '2018-07-28 17:48:01', '', '', '', '', '', '', 2, 5000074),
(31, 'Mala imagen, no funcuiona una bocina', 'Se sustituyo la tarjeta tcon por otra, y se cambio el set de bocinas', 'equipo reparado', '2018-08-01 16:56:34', '', '', '', '', '', '', 2, 5000078),
(32, 'Falla en la tarjeta main', 'Se sustituyo la tarjeta', 'Re`parado', '2018-08-01 19:38:46', '', '', '', '', '', '', 2, 5000070),
(33, 'pantalla daÃ±ada por humedad', 'reemplazo pantalla', 'Reparado', '2018-09-12 16:29:01', 'NA', 'NA', '', '', '', '', 1, 5000098),
(34, 'asda', 'asdasd', 'Reparado', '2018-09-12 22:40:05', 'NA', 'NA', 'asdasd', 'assets/galeria/reporte/7/5000009/28_24MT49S_Product image_09_Desk.jpg', 'assets/galeria/reporte/7/5000009/0003395_tv-tokyo-49-full-hd-smart.jpeg', 'assets/galeria/reporte/7/5000009/smart-tv-RCA1.png', 7, 5000009),
(35, 'asdsasd', 'asdasdasdasdasd', 'Reparado', '2018-09-12 22:43:43', 'NA', 'NA', 'asdasd', 'assets/galeria/reporte/7/5000101/28_24MT49S_Product image_09_Desk.jpg', 'assets/galeria/reporte/7/5000101/0003395_tv-tokyo-49-full-hd-smart.jpeg', 'assets/galeria/reporte/7/5000101/smart-tv-RCA1.png', 7, 5000101),
(36, 'qweqw', 'qweqwe', 'Reparado', '2018-09-12 22:53:05', 'NA', 'NA', 'qweqwe', 'assets/galeria/reporte/7/5000108/28_24MT49S_Product image_09_Desk.jpg', 'assets/galeria/reporte/7/5000108/0003395_tv-tokyo-49-full-hd-smart.jpeg', 'assets/galeria/reporte/7/5000108/smart-tv-RCA1.png', 7, 5000108),
(37, 'ssda', 'dasdasdasd', 'Reparado', '2018-09-12 23:01:30', 'NA', 'NA', 'asda', 'assets/galeria/reporte/7/5000013/28_24MT49S_Product image_09_Desk.jpg', 'assets/galeria/reporte/7/5000013/0003395_tv-tokyo-49-full-hd-smart.jpeg', 'assets/galeria/reporte/7/5000013/smart-tv-RCA1.png', 7, 5000013),
(38, 'Ueuwusu', 'Jsusus', 'Reparado', '2018-09-12 23:06:16', 'NA', 'NA', 'Jzususu', 'assets/galeria/reporte/2/5000015/1536793542146-954574774.jpg', 'assets/galeria/reporte/2/5000015/1536793554308740450864.jpg', 'assets/galeria/reporte/2/5000015/1536793563214-709024918.jpg', 2, 5000015),
(39, 'Usiussis', 'Jsjsusus', 'Reparado', '2018-09-12 23:07:47', 'NA', 'NA', 'Jzjdjdjs', 'assets/galeria/reporte/2/5000018/IMG-20180912-WA0011.jpg', 'assets/galeria/reporte/2/5000018/IMG-20180912-WA0010.jpg', 'assets/galeria/reporte/2/5000018/IMG-20180912-WA0009.jpg', 2, 5000018);

-- --------------------------------------------------------

--
-- Table structure for table `traslado`
--

DROP TABLE IF EXISTS `traslado`;
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
  `id_carro` int(11) NOT NULL DEFAULT '0',
  `id_personal` int(11) NOT NULL DEFAULT '0',
  `id_folio` int(11) NOT NULL,
  `personal_id_personal` int(11) NOT NULL,
  PRIMARY KEY (`id_traslado`),
  KEY `id_personal` (`id_personal`),
  KEY `fk_traslado_personal1_idx` (`personal_id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traslado`
--

INSERT INTO `traslado` (`id_traslado`, `estado`, `direccion`, `comentarios`, `ubicacion`, `destino`, `fecha_solicitud`, `fecha_finalizado`, `id_equipo`, `id_carro`, `id_personal`, `id_folio`, `personal_id_personal`) VALUES
(1, 'Coleccion', 'Taller lagunitas', '', 'Recepcion', 'Taller', '2018-07-12 16:19:24', '0000-00-00 00:00:00', 5000055, 0, 1, 4474, 0),
(2, 'En ruta', 'lagunitas', '', 'Carro #1', 'Taller', '2018-07-12 16:27:15', '0000-00-00 00:00:00', 5000054, 1, 6, 4473, 0),
(3, 'En ruta', 'lagunitas', '', 'Carro #1', 'Taller', '2018-07-12 16:29:27', '0000-00-00 00:00:00', 5000053, 1, 6, 4472, 0),
(4, 'Pendiente', 'lagunitas', 'pvto', 'Recepcion', 'Taller', '2018-07-12 17:13:08', '0000-00-00 00:00:00', 5000052, 0, 0, 4471, 0),
(5, 'Pendiente', '', '', 'Recepcion', 'Taller', '2018-07-19 17:36:19', '0000-00-00 00:00:00', 5000064, 0, 0, 4483, 0),
(6, 'Pendiente', 'lagunitas', 'esta rota la pantalla', 'Recepcion', 'Taller', '2018-07-19 17:36:44', '0000-00-00 00:00:00', 5000064, 0, 0, 4483, 0),
(7, 'Pendiente', '', '', 'Taller', 'Bodega', '2018-07-23 23:15:21', '0000-00-00 00:00:00', 5000064, 0, 0, 4483, 0),
(8, 'Pendiente', '', '', 'Recepcion', 'Taller', '2018-07-27 14:53:12', '0000-00-00 00:00:00', 5000073, 0, 0, 4495, 0),
(9, 'Pendiente', '', '', 'Recepcion', 'Taller', '2018-07-27 15:00:06', '0000-00-00 00:00:00', 5000074, 0, 0, 4496, 0),
(10, 'Recoleccion', 'Lomas del sol', 'es joto', 'Cliente', 'Cliente', '2018-07-30 15:14:14', '2018-07-30 12:19:51', 5000075, 1, 6, 4498, 0),
(11, 'Pendiente', 'taller1', '', 'Recepcion', 'Taller', '2018-07-31 00:16:50', '0000-00-00 00:00:00', 5000076, 0, 0, 4499, 0),
(12, 'Pendiente', NULL, 'omentario', 'recepcion', 'Taller', '2018-09-14 00:27:23', NULL, 5000115, 0, 0, 4562, 0),
(13, 'Pendiente', NULL, 'ementario', 'recepcion', 'Taller', '2018-09-14 00:43:45', NULL, 5000120, 0, 0, 4414, 0),
(14, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-15 00:17:58', NULL, 5000145, 0, 0, 4414, 0),
(15, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-15 00:19:02', NULL, 5000145, 0, 0, 4414, 0),
(16, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-15 00:19:37', NULL, 5000147, 0, 0, 4414, 0),
(17, 'Pendiente', NULL, '', 'recepcion', 'Taller', '2018-09-15 00:29:31', NULL, 5000149, 0, 0, 4414, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ventas_tv`
--

DROP TABLE IF EXISTS `ventas_tv`;
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
  PRIMARY KEY (`idventa_tv`),
  KEY `fk_ventas_tv_reparar_tv1_idx` (`reparar_tv_id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ventas_tv`
--

INSERT INTO `ventas_tv` (`idventa_tv`, `marca`, `modelo`, `serie`, `costo`, `imagen1`, `imagen2`, `imagen3`, `fecha_alta`, `fecha_egreso`, `estado`, `id_personal`, `idvendedor`, `ubicacion`, `id_equipo`, `id_folio`, `reparar_tv_id_equipo`) VALUES
(1, 'Samsung', 'un55mu6100fxzx', 'asdasd12345', 7500, '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\mx-uhdtv-mu6100-un55.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\mx-uhdtv-mu6100.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\Samsung\\un55mu6100fxzx\\asdasd12345\\jklhjlblkg.jpg', '2018-07-13 16:19:25', '', 'Vendida', 3, 3, '', 0, 0, 0),
(2, 'LG', '42ln5700', 'xasdas3623', 4300, 'assets\\galeria\\1.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\LG\\42ln5700\\xasdas3623\\lg2.jpg', '\\Base de datos\\Ventas de televisiones\\Recepcion\\LG\\42ln5700\\xasdas3623\\lg3.png', '2018-07-13 16:30:14', '', 'Vendida', 3, 0, '', 0, 0, 0),
(3, 'qlon', 'asde', '1wewqw', 4300, 'assets/galeria/28_24MT49S_Product image_09_Desk.jpg', NULL, NULL, '2018-09-12 22:38:07', NULL, 'Vendida', 0, 0, '', 0, 0, 0),
(4, 'qlon', 'asde', '1wewqw', 4300, 'assets/galeria/smart-tv-RCA1.png', NULL, NULL, '2018-09-12 22:38:21', NULL, 'En venta', 0, 0, '', 0, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `depositos`
--
ALTER TABLE `depositos`
  ADD CONSTRAINT `depositos_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reparar_electrodomesticos`
--
ALTER TABLE `reparar_electrodomesticos`
  ADD CONSTRAINT `reparar_electrodomesticos_ibfk_1` FOREIGN KEY (`id_folio`) REFERENCES `clientes` (`id_folio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reparar_tv`
--
ALTER TABLE `reparar_tv`
  ADD CONSTRAINT `reparar_tv_ibfk_1` FOREIGN KEY (`id_folio`) REFERENCES `clientes` (`id_folio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reparar_tv_ibfk_2` FOREIGN KEY (`id_folio`) REFERENCES `clientes` (`id_folio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `traslado`
--
ALTER TABLE `traslado`
  ADD CONSTRAINT `fk_traslado_personal1` FOREIGN KEY (`personal_id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ventas_tv`
--
ALTER TABLE `ventas_tv`
  ADD CONSTRAINT `fk_ventas_tv_reparar_tv1` FOREIGN KEY (`reparar_tv_id_equipo`) REFERENCES `reparar_tv` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

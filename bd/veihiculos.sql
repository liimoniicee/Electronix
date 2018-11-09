

CREATE TABLE IF NOT EXISTS `carros` (
  `id_carro` int(11) NOT NULL AUTO_INCREMENT,
  `car_id_marca` int(11) NOT NULL,
  `car_modelo` varchar(30) NOT NULL,
  `car_ano` int(11) NOT NULL,
  `car_tipo` varchar(30) NOT NULL,
  `car_estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id_carro`),
  UNIQUE KEY `car_id_marca_2` (`car_id_marca`),
  KEY `car_id_marca` (`car_id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `carros`
--

INSERT INTO `carros` (`id_carro`, `car_id_marca`, `car_modelo`, `car_ano`, `car_tipo`, `car_estado`) VALUES
(1, 1, 'Raptor', 2009, 'Camioneta', 'En servicio'),
(2, 2, 'Xterra', 2010, 'Automovil', 'En reparacion');

ALTER TABLE `carros`
  ADD CONSTRAINT `carros_ibfk_1` FOREIGN KEY (`car_id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION;
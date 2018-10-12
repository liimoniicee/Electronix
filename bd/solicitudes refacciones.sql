
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
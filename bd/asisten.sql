ALTER TABLE  `asistencia` ADD  `horas_hoy` TIME NULL AFTER  `personal_id_personal` ,
ADD  `horas_total` TIME NULL AFTER  `horas_hoy`


ALTER TABLE  `personal` ADD  `horas` TIME NULL DEFAULT NULL AFTER  `rec_id_recepcion` ,
ADD  `hora_entrada` TIME NULL DEFAULT NULL AFTER  `horas` ,
ADD  `hora_salida` TIME NULL DEFAULT NULL AFTER  `hora_entrada`
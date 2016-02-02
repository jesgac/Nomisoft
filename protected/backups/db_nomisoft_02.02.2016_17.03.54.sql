-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `asignaciones`
-- -------------------------------------------
DROP TABLE IF EXISTS `asignaciones`;
CREATE TABLE IF NOT EXISTS `asignaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `b_alimenticio` float NOT NULL COMMENT 'Pago del bono alimenticio',
  `asistencia` float NOT NULL COMMENT 'Pago de bono de asistencia',
  `feriado` float NOT NULL COMMENT 'Pago de dia feriado',
  `sabado` float NOT NULL COMMENT 'pago de Sabados trabajados',
  `horasextra_diurna` float NOT NULL COMMENT 'Pago de Horas extras diurnas',
  `horasextras_nocturna` float NOT NULL COMMENT 'Pago de Horas extras nocturna',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `cargos`
-- -------------------------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `cargo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'Descripcion del cargo del empleado',
  `sueldo` float NOT NULL COMMENT 'Salario correspondiente al cargo',
  `tipo_sueldo` int(1) NOT NULL COMMENT 'describe si el pago es mensual o semanal',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `conceptos`
-- -------------------------------------------
DROP TABLE IF EXISTS `conceptos`;
CREATE TABLE IF NOT EXISTS `conceptos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `Fecha` date NOT NULL COMMENT 'Fecha de vigencia del concepto',
  `tipo_bono` int(11) NOT NULL COMMENT 'Describe cual es el bono (1=>U.T., 2=>HE diurnas, 3=>HE nocturnas, 4=> dia feriado 5=>sabados, 6=>Bono alimentacion, 7=>asistencia )',
  `bono` float NOT NULL COMMENT 'Variable de la formula del calculo que corresponde al tipo de bono',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `deducciones`
-- -------------------------------------------
DROP TABLE IF EXISTS `deducciones`;
CREATE TABLE IF NOT EXISTS `deducciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `sso` float NOT NULL COMMENT 'Descuento del Seguro Social Obligatorio',
  `spf` float NOT NULL COMMENT 'Descuento del Seguro de Paro forzoso',
  `lph` float NOT NULL COMMENT 'Descuento de la Ley de Politica Habitacional o Faov ( Fondo de Ahorro Obligatorio para la Vivienda)',
  `inasistencia` float NOT NULL COMMENT 'Descuento por dias no laborados',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `empleados`
-- -------------------------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `id_persona` int(11) NOT NULL COMMENT 'Clave foranea de la tabla persona',
  `id_obra` int(11) NOT NULL COMMENT 'Clave foranea de la tabla Obra',
  `nro_cuenta` varchar(20) NOT NULL COMMENT 'Numero de cuenta del trabajador',
  `id_empresa` int(11) NOT NULL COMMENT 'Clave Foranea de la tabla empresa',
  `id_talla` int(11) NOT NULL COMMENT 'Clave foranea de la tabla talla',
  `id_cargo` int(11) NOT NULL COMMENT 'Clave foranea de la tabla cargo',
  `cod_banco` varchar(4) NOT NULL COMMENT 'Identificador de la entidad bancaria',
  `tipo_empleado` int(1) NOT NULL COMMENT 'Describe el tipo de trabajador (empelado u obrero)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `empresa`
-- -------------------------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `nombre_emp` varchar(100) NOT NULL COMMENT 'Nombre de la empresa',
  `direccion` text NOT NULL COMMENT 'Direccion de la empresa',
  `telefono` varchar(15) NOT NULL COMMENT 'Telefono de la empresa',
  `rif` varchar(15) NOT NULL COMMENT 'Rif de la empresa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `hijos`
-- -------------------------------------------
DROP TABLE IF EXISTS `hijos`;
CREATE TABLE IF NOT EXISTS `hijos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `id_persona` int(11) NOT NULL COMMENT 'Clave foranea de la tabla persona',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del Hijo',
  `apellido` varchar(45) NOT NULL COMMENT 'Apellido del Hijo',
  `fecha_nac` varchar(45) NOT NULL COMMENT 'Fecha de Nacimiento del Hijo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `nomina`
-- -------------------------------------------
DROP TABLE IF EXISTS `nomina`;
CREATE TABLE IF NOT EXISTS `nomina` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `id_empleado` int(11) NOT NULL COMMENT 'Clave foranea de la tabla empleado',
  `id_asignacion` int(11) NOT NULL COMMENT 'Clave foranea de la tabla asignacion',
  `id_deduccion` int(11) NOT NULL COMMENT 'Clave foranea de la tabla deduccion',
  `total_asig` float NOT NULL COMMENT 'Sumatoria de las asignaciones',
  `total_deduc` float NOT NULL COMMENT 'Sumatoria de las deducciones',
  `neto` float NOT NULL COMMENT 'Neto a pagar del trabajador',
  `fecha` date NOT NULL COMMENT 'Fecha de pago de la nomina',
  `vaciado` float NOT NULL COMMENT 'Pago por vaciado',
  `prestamos` float NOT NULL COMMENT 'pago de prestamos',
  `otros` float NOT NULL COMMENT 'Pago de bonos varios',
  `descuento` float NOT NULL COMMENT 'descuentos varios',
  `nominacol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `obras`
-- -------------------------------------------
DROP TABLE IF EXISTS `obras`;
CREATE TABLE IF NOT EXISTS `obras` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `id_empleado` int(11) NOT NULL COMMENT 'Clave foranea de la tabla empleado',
  `nombre_obra` varchar(45) NOT NULL COMMENT 'Nombre de la obra',
  `direccion` varchar(100) NOT NULL COMMENT 'Direccion de la Obra',
  `fech_ini` date NOT NULL COMMENT 'Fecha de inicio de la obra',
  `fech_fin` date NOT NULL COMMENT 'fecha de cierre de la obra',
  `status` varchar(1) NOT NULL COMMENT 'Indica estado de actividad de la obra',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `personas`
-- -------------------------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del trabajador',
  `apellido` varchar(50) NOT NULL COMMENT 'apellido del trabajador',
  `cedula` varchar(15) NOT NULL COMMENT 'Documento de identidad',
  `fecha_nac` date NOT NULL COMMENT 'Fecha de nacimiento del trabajador',
  `lugar_nac` text NOT NULL COMMENT 'Lugar de nacimiento del trabajador',
  `nacionalidad` varchar(1) NOT NULL COMMENT 'Nacionalidad del trabajador',
  `sexo` varchar(1) NOT NULL COMMENT 'Sexo del trabajador',
  `direccion` text NOT NULL COMMENT 'Direccion del trabajador',
  `telefono` varchar(15) NOT NULL COMMENT 'Numero telefonico del trabajador',
  `email` varchar(50) NOT NULL COMMENT 'Correo electronico del trabajador',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `tallas`
-- -------------------------------------------
DROP TABLE IF EXISTS `tallas`;
CREATE TABLE IF NOT EXISTS `tallas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `talla_zapato` varchar(3) NOT NULL COMMENT 'Numero de calzado',
  `talla_pantalon` varchar(3) NOT NULL COMMENT 'Numero de talla de pantalon',
  `talla_camisa` varchar(3) NOT NULL COMMENT 'Numero de talla de camisa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `usuario`
-- -------------------------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `id_persona` int(11) NOT NULL COMMENT 'Clave foranea de la tabla persona',
  `user` varchar(50) NOT NULL COMMENT 'Nombre de Usuario',
  `pass` varchar(150) NOT NULL COMMENT 'Contraseña del usuario',
  `nivel` int(1) NOT NULL COMMENT 'Nivel de acceso del usuario',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE DATA asignaciones
-- -------------------------------------------
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('1','0','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('2','0','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('3','0','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('4','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('5','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('6','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('7','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('8','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('9','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('10','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('11','30','0','1','1','1','1');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('12','30','1','1','1','1','1');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('13','0','0','0','0','1','2');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('14','0','1','0','0','1','1');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('15','30','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('16','0','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('17','0','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('18','0','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('19','0','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('20','0','1','0','0','0','0');



-- -------------------------------------------
-- TABLE DATA cargos
-- -------------------------------------------
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('1','Obrero de 1ra.','2560','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('2','Vigilante','2560','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('3','Ayudante','2740','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('4','Ayudante Mecánico dissel','3071','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('5','Chófer de 2da. (de 3 a 8 tons.)','2922.57','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('6','Albañil de 2da.','3071.53','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('7','Cabillero de 2da.','3071.53','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('8','carpintero de 2da.','3071.53','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('9','Electricista de 2da.','3071.53','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('10','Pintor de 2da.','3071.53','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('11','Chófer de 1ra. (8 a 15 ton.)','3112.2','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('12','Chofer de camion mas de 15 ton.','3193.68','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('13','Albañil de 1ra.','3435','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('14','Cabillero de 1ra.','3435','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('15','Carpintero de 1ra.','3435','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('16','Electricista de 1ra.','3435','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('17','Pintor de 1ra.','3435','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('18','Plomero de 1ra.','3435','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('19','Maestro Carpintero de 2da.','3582.32','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('20','Maestro Albañil','3801.91','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('21','Maestro Cabillero','3801.91','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('22','Mestro Carpintero de 1ra.','3801.91','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('23','Mestro de obra de 1ra.','4382.29','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('24','Administrador','33800','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('25','Ingeniero Residente','70000','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('26','Dibujante','4450','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('27','Ingeniero Residente I','38600','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('28','Contador Publico','24200','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('29','Mensajero','9649','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('30','Aseadora','9649','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('31','Asistente Contable','24200','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('32','Recepcionista','9649','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('33','Ingeniero Residente II','9000','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('34','Encargado de obra','7800','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('35','Supervisor de Obra','7800','1');



-- -------------------------------------------
-- TABLE DATA conceptos
-- -------------------------------------------
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('1','2015-12-02','1','150');
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('2','2015-12-02','2','0.75');
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('3','2015-12-02','3','0.75');
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('4','2015-12-02','4','1.5');
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('5','2015-12-02','5','1.5');
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('6','2015-12-02','6','1.5');
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('7','2016-01-01','7','4');
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('8','2016-01-01','8','0.5');
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('9','2016-01-01','9','1');



-- -------------------------------------------
-- TABLE DATA deducciones
-- -------------------------------------------
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('1','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('2','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('3','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('4','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('5','0','0','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('6','0','0','0','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('7','0','0','0','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('8','0','0','0','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('9','0','0','0','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('10','0','0','0','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('11','1','1','1','1');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('12','1','1','1','1');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('13','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('14','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('15','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('16','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('17','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('18','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('19','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('20','1','1','1','0');



-- -------------------------------------------
-- TABLE DATA empleados
-- -------------------------------------------
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('1','2','4','22222222222222222222','1','2','32','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('2','1','4','11111111111111111111','1','3','26','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('3','3','2','33333333333333333333','1','4','28','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('4','46','3','','2','5','13','','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('5','35','1','','1','6','14','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('6','42','1','77777777777777777777','2','7','9','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('7','36','3','23453456234452343243','1','8','12','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('8','37','2','42464562354546734543','2','9','21','0116','1');



-- -------------------------------------------
-- TABLE DATA empresa
-- -------------------------------------------
INSERT INTO `empresa` (`id`,`nombre_emp`,`direccion`,`telefono`,`rif`) VALUES
('1','PROMOTORA RL 2006, C.A.','Av Los Llanos, Edif. Juma, piso 2, ofc. 17, San Juan de los Morros.','(0246)-431-3941','j-315328232');
INSERT INTO `empresa` (`id`,`nombre_emp`,`direccion`,`telefono`,`rif`) VALUES
('2','Promotora Via Appia, C.A.','Av Los Llanos, Edif. Juma, piso 2, ofc. 17, San Juan de los Morros.','(0246)-431-3941','j-40622581-9');



-- -------------------------------------------
-- TABLE DATA hijos
-- -------------------------------------------
INSERT INTO `hijos` (`id`,`id_persona`,`nombre`,`apellido`,`fecha_nac`) VALUES
('1','3','Jesús Andrés ','Bastidas Arruebarrena','2010-01-15');
INSERT INTO `hijos` (`id`,`id_persona`,`nombre`,`apellido`,`fecha_nac`) VALUES
('2','3','Mauricio José','Bastidas Arruebarrena','2012-05-10');



-- -------------------------------------------
-- TABLE DATA nomina
-- -------------------------------------------
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('1','4','13','13','438.576','188.925','3684.65','2016-02-06','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('2','5','14','14','3217.25','188.925','6463.32','2016-02-06','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('3','6','15','15','9382.74','168.934','12285.3','2016-02-06','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('4','7','16','16','2737.44','175.652','5755.47','2016-02-06','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('5','8','17','17','3258.78','209.105','6851.58','2016-02-06','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('6','2','18','18','3814.29','244.75','8019.54','2016-02-06','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('7','3','19','19','4840','665.5','28374.5','2016-02-06','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('8','1','20','20','1929.8','265.348','11313.5','2016-02-06','0','0','0','0','');



-- -------------------------------------------
-- TABLE DATA obras
-- -------------------------------------------
INSERT INTO `obras` (`id`,`id_empleado`,`nombre_obra`,`direccion`,`fech_ini`,`fech_fin`,`status`) VALUES
('1','0','ELVIS','AV LOS PUENTES #10','2014-01-01','2019-01-01','1');
INSERT INTO `obras` (`id`,`id_empleado`,`nombre_obra`,`direccion`,`fech_ini`,`fech_fin`,`status`) VALUES
('2','0','CC VIA APPIA','AV BOLIVAR S/N','2015-01-05','2020-01-05','1');
INSERT INTO `obras` (`id`,`id_empleado`,`nombre_obra`,`direccion`,`fech_ini`,`fech_fin`,`status`) VALUES
('3','0','COTOPRIZ','AV ACOSTA CARLES ','2015-01-02','2020-01-02','1');
INSERT INTO `obras` (`id`,`id_empleado`,`nombre_obra`,`direccion`,`fech_ini`,`fech_fin`,`status`) VALUES
('4','0','OBRAS VARIAS','OBRAS VARIAS','2016-01-01','2021-01-01','1');



-- -------------------------------------------
-- TABLE DATA personas
-- -------------------------------------------
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('1','Manuel Jose','Moreno Lopez','14643985','1981-08-19','San Juan de los Morros','V','M','Las palmas, calle pinto salinas #16, San Juan de los Morros. Edo. Guarico','(0426)-749-0025','manuelmoreno2156@gmail.com');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('2','Mircelys Josefina','Belisario Hurtado','20586493','1990-03-19','San Juan de los Morros','V','F','Barrio San Jose, Calle Simon Rodriguez, san juan de los morros','(0424)-362-0772','mircelys_18@hotmail.com');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('3','Mariangel','Arruebarrena Hernandez','13850772','1979-04-21','Valle de la Pascua','V','F','Calle El Carmen Casa Nº 20. San Juan de los Morros. Estado Guárico','','mariangelarrue1510@gmail.com');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('4','Jona Carelina','Vasquez Alzuro','14394605','1979-02-12','San juan de los Morros, Estado Guarico','V','F','Via el Castrero, frente el circuito penal, casa s/n, San Juan de los Morros.','','JONA937@HOTMAIL.COM');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('5','Diana Josefina','Carreño Otero','15481991','1983-04-25','calabozo','V','F','calle miel c/c el panal, edif. resd villa paraiso, p-1, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('6','Pedro Mercedes ','Ramos Guevara','11122836','1976-03-08','San Juan de los Morros','V','M','Callejon marisol, casa # 69, San Juan de los Morros
','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('7','Rosaura Maria','Ibarra Cotto','14146758','1975-12-01','San Juan de los Morros
','V','F','calle trinidad casa s/n barrio san jose, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('8','Gloria Carolina ','Prieto Arato','18664176','1987-07-07','villa de cura','V','F','urbanizacion romulo gallegos sector 4, v/13 casa # 2 San Juan de los Morros
','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('9','Ronald de Jesus','Lopez Hurtado','19724662','1989-11-07','San Juan de los Morros
','V','M','urb. antonio miguel martinez calle devy #2, San Juan de los Morros
','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('10','Jose Ruben','Sanchez Lopez','7072252','1963-11-23','valencia','V','M','av. los llanos edif juma piso 2, San Juan de los Morros
','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('11','Guillermo Rafael','Gonzalez Escalona','5161423','1958-12-09','San Juan de los Morros','V','M','av. los llanos casa s/n, San Juan de los Morros
','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('12','Maximo ','jimenez Arreaza','10673607','1969-04-12','San Juan de los Morros
','V','M','calle san jacinto casa # 144 sector las palmas, San Juan de los Morros
','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('13','Rosendo Ramon','Gonzalez','6607208','1955-04-01','San Juan de los Morros
','V','M','calle panamericana barrio bicentenario, casa # 24, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('14','Juan Vicente','Aponte Villalobos','10668257','1965-05-23','San Juan de los Morros
','V','M','camoruquito callejon la cruz, casa # 26, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('15','Carlos Eduardo','Olivo Lara','20588185','1983-01-04','San Juan de los Morros','V','M','pedro zaraza terraza de san luis casa s/n, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('16','Tomas Salvador ','Rojas Moreno','16363226','1980-08-09','San Juan de los Morros','V','M','sector el totumo calle la esperanza casa # 16, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('17','Victor Manuel','Manzano','13152190','1977-01-26','San Juan de los Morros','V','M','calle zamora casa # 72 sector zamora, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('18','Julio Jose','Martinez Manzano','16362160','1984-12-20','San Juan de los Morros','V','M','brisas del valle casa # 1, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('19','Jose Clemente','Ferrer ','2512497','1946-11-29','San Juan de los Morros','V','M','av. romulo gallegos casa # 37, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('20','Felix Antonio','Perez Bravo','11797828','1970-09-07','San Juan de los Morros','V','M','calle negro primero barrio aeropuerto casa # 27 b, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('21','Wilfredo Jose','Rojas Retaco','16076472','1983-07-22','San Juan de los Morros','V','M','calle la trinidad barrio san jose casa s/n, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('22','Carlos Jose','salazar ','11122031','1970-09-20','San Juan de los Morros','V','M','calle paez este casa # 31 sector victor angel , San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('23','Juan Ciro','Rojas Requena','10666472','1965-08-08','San Juan de los Morros','V','M','calle la trinidad, casa # 33 barrio san jose San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('24','David Ernesto','Hernandez Ramos','21258689','1992-11-26','San Juan de los Morros','V','M','calle colorado , casa # 19,villa de cura','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('25','Orlando Jose','Manzano','13151567','1975-12-15','San Juan de los Morros','V','M','calle zamora casa # 72, zona puerta negra, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('26','Luis  Alberto','Herratt','14395521','1980-10-06','San Juan de los Morros','V','M','calle santa rosa callejon altamira  72, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('27','Pedro Guillermo','España','8770070','1961-08-21','San Juan de los Morros','V','M','barrio las majaguas, calle las piedras, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('28','Jose Alberto','Loreto  Quintana','10666890','1970-04-04','San Juan de los Morros','V','M','calle zamora casa # 10, sector la trinidad, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('29','Jose Rafael ','Gomez Requena','9887447','1970-11-02','San Juan de los Morros','V','M','calle ppal camoruquito casa s/n, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('30','Pedro','Garcia Diaz','10666694','1969-01-11','San Juan de los Morros','V','M','calle 14 de marzo, casa # 8, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('31','Luis Enrique','Manzano Bolivar','8996499','1967-06-27','San Juan de los Morros','V','M','calle zamora casa # 80, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('32','Pedro Alejandro','Manzano Hernandez','7278860','1952-04-27','San Juan de los Morros','V','M','calle zamora casa # 76, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('33','Tomas Ramon','Lamuño','9598386','1959-01-03','San Juan de los Morros','V','M','calle carabobo aeropuerto casa # 3-A, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('34','Victor Jose','Lara','19160216','1985-05-04','San Juan de los Morros','V','M','calle san jose casa s/n, barrio san jose ,San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('35','Cesar Jose','Loreto Bolivar','19222368','1988-05-16','San Juan de los Morros','V','M','calle zamora casa # 10, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('36','Felix Alfonzo ','Mendoza ','7291993','1955-01-23','San Juan de los Morros','V','M','calle la morera colo, casa # 26, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('37','Henry Rafael','Hernandez ','15480313','1975-12-24','San Juan de los Morros','V','M','calle libertad, valle verde casa # 55, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('38','Marvin Ricardo','Olivares Nieves','16734037','1984-07-23','villa de cura','V','M','calle paez las tablitas, casa # 129, la villa','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('39','Asterio Jose','Seijas Perdomo','8785766','1963-06-10','San Juan de los Morros','V','M','calle bicentenario casa # 38, San Juan de los Morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('40','Robinson Antonio','Pomonti Paez','4390663','1956-05-24','san juan de los morros','V','M','calle san jose, casa s/n, barrio san jose , san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('41','Carlos Jose','Ramirez','7286759','1955-05-17','san juan de los morros','V','M','carretera nacional via flores, las lomas de pica, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('42','Egardo Javier','Tovar','10975213','1971-06-11','san juan de los morros','V','M','1° de mayo, casa # 20, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('43','Manuel Antonio ','Vargas Hernandez','10668337','1971-12-15','san juan de los morros','V','M','Av. fermin toro, casa s/n, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('44','Primitivo Rafael','Parejo Flores','9075053','1950-02-12','san juan de los morros','V','M','calle wiliam gonzalez, casa # 77, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('45','Felipe Rafael','Febres','4877798','1954-04-14','san juan de los morros','V','M','calle miguel  antonio olivero, casa # 44, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('46','Argenis Jesus ','Liebano Moreno','20876365','1987-09-08','san juan de los morros','V','M','caretera nacional, calle 5 de julio, casa s/n, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('47','Jose Gregorio','Carruido','9886140','1968-07-06','san juan de los morros','V','M','carretera el castrero casa s/n, barrio la ceiba, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('48','Edgar Arturo','Alayon Peña','18972971','1988-11-08','san juan de los morros','V','M','calle santa rosa, casa # 100, san juan de los morros
','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('49','Edgar Daniel','Velasquez Maita','19221912','1988-04-29','san juan de los morros','V','M','calle el carmen, casa s/n, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('50','Jhon Lenor ','Peña Peña','13874683','1976-02-13','san juan de los morros','V','M','calle union, valle verde casa # 58, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('51','Eddy Jesus','Peña Torres','25130671','1995-08-23','san juan de los morros','V','M','calle union valle verde, casa # 71, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('52','Jose Luis ','Galazzo Solano','17062230','1983-10-22','san juan de los morros','V','M','calle santa ines casa s/n, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('53','Pablo Olivo','Garcia','5153510','1954-05-13','san juan de los morros','V','M','barrio la morera calle ppal, casa s/n, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('54','Carlos Luis','Seijas Ramirez','9885599','1968-09-21','cantagallo','V','M','sector 03, casa # 17 cantagallo','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('55','Liones Alfredo','Pulvirenti Hernandez','8999858','1968-02-07','ocumare','V','M','barrio los placeres callejon mexico # 24, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('56','Isaias Emilio','Montevideo','4393293','1956-07-06','san juan de los morros','V','M','pueblo nuevo, calle 5 de julio # 4, san juan de los morros','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('57','Keiber Gabriel ','Cedeño Morales','25887536','1996-10-12','san juan de los morros','V','M','sector aeropuerto calle union, casa # 13, san juan de los morros','','');



-- -------------------------------------------
-- TABLE DATA tallas
-- -------------------------------------------
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('1','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('2','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('3','45','38','xl');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('4','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('5','44','38','xl');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('6','38','28','s');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('7','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('8','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('9','','','');



-- -------------------------------------------
-- TABLE DATA usuario
-- -------------------------------------------
INSERT INTO `usuario` (`id`,`id_persona`,`user`,`pass`,`nivel`) VALUES
('3','1','administrador','292ef3d4df7a0882d4e8d253db414b04','3');
INSERT INTO `usuario` (`id`,`id_persona`,`user`,`pass`,`nivel`) VALUES
('6','2','Mircelys','f574c60b9799d4c63550742dbce11a46','2');
INSERT INTO `usuario` (`id`,`id_persona`,`user`,`pass`,`nivel`) VALUES
('7','3','mary2329','be53d253d6bc3258a8160556dda3e9b2','2');
INSERT INTO `usuario` (`id`,`id_persona`,`user`,`pass`,`nivel`) VALUES
('8','4','jonav','50d2be98900f1d8a2fb3c3207c6d31b9','1');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------

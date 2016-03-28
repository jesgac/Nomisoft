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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `auditoria`
-- -------------------------------------------
DROP TABLE IF EXISTS `auditoria`;
CREATE TABLE IF NOT EXISTS `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primaria',
  `id_user` int(10) NOT NULL,
  `accion` int(10) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `id_registro` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

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
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('21','0','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('22','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('23','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('24','0','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('25','0','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('26','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('27','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('28','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('29','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('30','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('31','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('32','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('33','30','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('34','30','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('35','30','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('36','30','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('37','30','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('38','30','1','0','0','0','1');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('39','30','1','0','0','1','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('40','30','1','0','0','0','0');



-- -------------------------------------------
-- TABLE DATA auditoria
-- -------------------------------------------
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('1','3','1','Hijos','2','2016-02-29 03:28:56');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('2','3','1','Personas','46','2016-02-29 03:29:15');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('3','3','1','Conceptos','2','2016-02-29 03:29:25');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('4','8','4','Empleados','4','2016-03-12 08:53:53');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('5','8','4','Empleados','6','2016-03-12 08:53:55');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('6','8','4','Empleados','5','2016-03-12 08:53:57');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('7','8','4','Empleados','8','2016-03-12 08:53:59');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('8','8','4','Empleados','7','2016-03-12 08:54:02');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('9','8','4','Empleados','2','2016-03-12 08:54:07');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('10','8','4','Empleados','3','2016-03-12 08:54:09');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('11','8','4','Empleados','1','2016-03-12 08:54:11');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('12','8','2','Empleados','1','2016-03-12 09:00:34');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('13','8','3','Empleados','1','2016-03-12 09:01:05');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('14','8','2','Personas','58','2016-03-12 09:07:59');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('15','8','1','Personas','58','2016-03-12 09:07:59');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('16','8','3','Personas','58','2016-03-12 09:10:27');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('17','8','1','Personas','58','2016-03-12 09:10:27');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('18','8','3','Personas','58','2016-03-12 09:11:00');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('19','8','1','Personas','58','2016-03-12 09:11:00');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('20','3','3','Personas','58','2016-03-12 09:11:35');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('21','3','1','Personas','58','2016-03-12 09:11:36');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('22','3','3','Personas','58','2016-03-12 09:21:05');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('23','3','1','Personas','58','2016-03-12 09:21:05');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('24','3','3','Personas','58','2016-03-12 09:25:26');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('25','3','1','Personas','58','2016-03-12 09:25:26');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('26','3','3','Personas','58','2016-03-12 09:25:49');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('27','3','1','Personas','58','2016-03-12 09:25:49');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('28','3','3','Personas','58','2016-03-12 02:58:34');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('29','3','1','Personas','58','2016-03-12 09:28:34');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('30','3','1','Personas','58','2016-03-12 09:28:47');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('31','3','1','Personas','58','2016-03-12 09:28:48');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('32','3','1','Personas','58','2016-03-12 09:28:48');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('33','3','3','Personas','58','2016-03-12 09:29:00');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('34','3','1','Personas','58','2016-03-12 09:29:01');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('35','3','3','Personas','58','2016-03-12 02:59:19');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('36','3','1','Personas','58','2016-03-12 09:29:19');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('37','3','3','Personas','58','2016-03-12 09:29:43');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('38','3','1','Personas','58','2016-03-12 09:29:44');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('39','3','1','Personas','58','2016-03-12 09:29:57');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('40','3','1','Personas','58','2016-03-12 09:29:58');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('41','3','3','Personas','58','2016-03-12 09:30:13');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('42','3','1','Personas','58','2016-03-12 09:30:13');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('43','3','3','Personas','58','2016-03-12 09:30:28');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('44','3','1','Personas','58','2016-03-12 09:30:28');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('45','8','3','Personas','58','2016-03-12 09:31:31');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('46','8','1','Personas','58','2016-03-12 09:31:32');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('47','8','2','Empleados','2','2016-03-12 09:33:44');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('48','8','2','Empleados','3','2016-03-12 09:37:22');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('49','8','2','Empleados','4','2016-03-12 09:38:44');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('50','8','3','Empleados','4','2016-03-12 09:38:59');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('51','8','2','Empleados','5','2016-03-12 09:39:43');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('52','8','2','Empleados','6','2016-03-12 09:41:10');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('53','8','2','Empleados','7','2016-03-12 09:51:59');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('54','8','2','Empleados','8','2016-03-12 09:53:50');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('55','8','2','Empleados','9','2016-03-12 09:59:53');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('56','8','2','Empleados','10','2016-03-12 10:07:13');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('57','8','2','Empleados','11','2016-03-12 10:14:45');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('58','8','2','Empleados','12','2016-03-12 10:16:13');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('59','8','2','Empleados','13','2016-03-12 10:18:00');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('60','8','2','Empleados','14','2016-03-12 10:20:01');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('61','8','2','Empleados','15','2016-03-12 10:21:34');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('62','8','2','Personas','59','2016-03-12 10:25:00');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('63','8','1','Personas','59','2016-03-12 10:25:00');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('64','8','2','Empleados','16','2016-03-12 10:26:32');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('65','8','2','Empleados','17','2016-03-12 10:27:32');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('66','8','2','Empleados','18','2016-03-12 10:28:44');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('67','8','2','Empleados','19','2016-03-12 10:30:29');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('68','8','2','Empleados','20','2016-03-12 10:31:37');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('69','8','2','Empleados','21','2016-03-12 10:32:58');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('70','8','2','Empleados','22','2016-03-12 10:34:15');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('71','8','2','Personas','60','2016-03-12 10:48:47');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('72','8','1','Personas','60','2016-03-12 10:48:47');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('73','8','2','Empleados','23','2016-03-12 10:51:00');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('74','8','2','Cargos','36','2016-03-12 10:51:31');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('75','8','1','Cargos','36','2016-03-12 10:51:31');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('76','8','3','Empleados','23','2016-03-12 10:52:06');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('77','8','2','Empleados','24','2016-03-12 10:55:56');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('78','8','2','Personas','61','2016-03-12 10:58:51');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('79','8','1','Personas','61','2016-03-12 10:58:51');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('80','8','2','Empleados','25','2016-03-12 11:04:37');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('81','8','2','Personas','62','2016-03-12 11:12:58');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('82','8','1','Personas','62','2016-03-12 11:12:59');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('83','8','2','Empleados','26','2016-03-12 11:13:40');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('84','8','2','Personas','63','2016-03-12 11:15:37');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('85','8','1','Personas','63','2016-03-12 11:15:37');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('86','8','2','Empleados','27','2016-03-12 11:16:22');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('87','8','2','Personas','64','2016-03-12 11:17:50');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('88','8','1','Personas','64','2016-03-12 11:17:50');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('89','8','2','Empleados','28','2016-03-12 11:18:28');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('90','8','2','Personas','65','2016-03-12 11:19:57');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('91','8','1','Personas','65','2016-03-12 11:19:57');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('92','8','2','Empleados','29','2016-03-12 11:20:41');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('93','8','2','Personas','66','2016-03-12 11:22:18');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('94','8','1','Personas','66','2016-03-12 11:22:18');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('95','8','2','Empleados','30','2016-03-12 11:22:55');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('96','8','2','Empleados','31','2016-03-12 11:29:14');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('97','8','2','Empleados','32','2016-03-12 11:38:07');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('98','8','2','Empleados','33','2016-03-12 11:39:33');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('99','8','2','Empleados','34','2016-03-12 11:49:37');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('100','8','3','Empleados','33','2016-03-12 11:49:47');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('101','8','3','Empleados','31','2016-03-12 11:50:01');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('102','8','3','Empleados','32','2016-03-12 11:50:13');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('103','8','2','Empleados','35','2016-03-12 11:51:51');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('104','8','2','Personas','67','2016-03-12 12:01:48');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('105','8','1','Personas','67','2016-03-12 12:01:48');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('106','8','2','Cargos','37','2016-03-12 12:03:36');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('107','8','1','Cargos','37','2016-03-12 12:03:36');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('108','8','2','Empleados','36','2016-03-12 12:04:37');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('109','8','2','Empleados','37','2016-03-12 12:06:14');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('110','8','2','Empleados','38','2016-03-12 12:08:09');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('111','8','2','Empleados','39','2016-03-12 12:09:33');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('112','8','2','Empleados','40','2016-03-12 12:15:12');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('113','8','2','Empleados','41','2016-03-12 12:30:01');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('114','8','2','Empleados','42','2016-03-12 12:33:18');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('115','8','2','Empleados','43','2016-03-12 12:34:48');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('116','8','2','Empleados','44','2016-03-12 12:36:19');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('117','8','2','Cargos','38','2016-03-12 12:36:48');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('118','8','1','Cargos','38','2016-03-12 12:36:48');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('119','8','3','Empleados','44','2016-03-12 12:37:17');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('120','8','3','Empleados','44','2016-03-12 12:37:33');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('121','8','2','Empleados','45','2016-03-12 12:38:40');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('122','8','2','Empleados','46','2016-03-12 12:40:02');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('123','8','2','Empleados','47','2016-03-12 12:43:11');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('124','8','2','Empleados','48','2016-03-12 12:44:36');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('125','8','2','Empleados','49','2016-03-12 12:55:35');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('126','8','2','Empleados','50','2016-03-12 02:04:22');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('127','8','2','Cargos','39','2016-03-12 02:06:14');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('128','8','1','Cargos','39','2016-03-12 02:06:14');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('129','8','3','Empleados','50','2016-03-12 02:06:29');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('130','8','2','Empleados','51','2016-03-12 02:07:31');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('131','8','2','Empleados','52','2016-03-12 02:09:46');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('132','8','2','Empleados','53','2016-03-12 02:12:05');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('133','8','2','Empleados','54','2016-03-12 02:16:26');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('134','8','2','Empleados','55','2016-03-12 02:18:25');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('135','8','2','Empleados','56','2016-03-12 02:23:05');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('136','8','2','Empleados','57','2016-03-12 02:26:09');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('137','8','2','Cargos','40','2016-03-12 02:26:27');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('138','8','1','Cargos','40','2016-03-12 02:26:27');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('139','8','3','Empleados','57','2016-03-12 02:26:57');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('140','8','2','Empleados','58','2016-03-12 02:28:33');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('141','8','2','Empleados','59','2016-03-12 02:31:23');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('142','8','2','Personas','68','2016-03-16 04:23:11');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('143','8','1','Personas','68','2016-03-16 04:23:12');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('144','8','2','Empleados','60','2016-03-16 04:24:30');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('145','8','2','Empleados','61','2016-03-16 04:29:25');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('146','8','2','Empleados','62','2016-03-16 04:41:25');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('147','8','2','Empleados','63','2016-03-16 04:44:58');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('148','8','2','Empleados','64','2016-03-16 04:54:33');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('149','3','2','Nomina','1','2016-03-28 08:42:29');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('150','3','6','Nomina','1','2016-03-28 08:42:32');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('151','3','6','Nomina','1','2016-03-28 08:43:53');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('152','3','6','Nomina','1','2016-03-28 08:45:22');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('153','3','6','Nomina','1','2016-03-28 08:46:35');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('154','3','6','Nomina','1','2016-03-28 08:46:56');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('155','3','2','Personas','69','2016-03-28 08:51:09');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('156','3','1','Personas','69','2016-03-28 08:51:09');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('157','3','4','Personas','69','2016-03-28 08:51:26');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('158','8','2','Personas','69','2016-03-28 09:35:06');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('159','8','1','Personas','69','2016-03-28 09:35:06');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('160','8','2','Empleados','65','2016-03-28 09:46:54');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('161','8','2','Personas','70','2016-03-28 09:52:01');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('162','8','1','Personas','70','2016-03-28 09:52:01');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('163','8','2','Empleados','66','2016-03-28 09:52:44');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('164','8','2','Personas','71','2016-03-28 09:54:52');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('165','8','1','Personas','71','2016-03-28 09:54:52');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('166','8','2','Empleados','67','2016-03-28 09:56:57');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('167','8','2','Personas','72','2016-03-28 10:00:18');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('168','8','1','Personas','72','2016-03-28 10:00:19');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('169','8','2','Empleados','68','2016-03-28 10:02:23');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('170','8','2','Personas','73','2016-03-28 10:05:37');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('171','8','1','Personas','73','2016-03-28 10:05:37');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('172','8','2','Empleados','69','2016-03-28 10:07:00');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('173','8','2','Empleados','70','2016-03-28 10:09:24');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('174','8','2','Empleados','71','2016-03-28 10:10:31');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('175','8','2','Empleados','72','2016-03-28 10:11:50');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('176','8','2','Nomina','1','2016-03-28 10:38:55');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('177','8','2','Conceptos','10','2016-03-28 10:40:32');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('178','8','1','Conceptos','10','2016-03-28 10:40:32');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('179','8','2','Nomina','2','2016-03-28 10:41:54');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('180','8','3','Nomina','2','2016-03-28 10:53:48');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('181','8','2','Nomina','3','2016-03-28 11:00:16');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('182','8','3','Empleados','2','2016-03-28 11:00:57');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('183','8','3','Cargos','25','2016-03-28 11:01:36');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('184','8','1','Cargos','25','2016-03-28 11:01:36');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('185','8','2','Nomina','4','2016-03-28 11:02:20');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('186','8','2','Nomina','5','2016-03-28 11:03:56');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('187','8','7','Nomina','0','2016-03-28 11:04:54');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('188','8','7','Nomina','0','2016-03-28 11:07:54');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('189','8','6','Nomina','5','2016-03-28 11:08:20');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('190','8','2','Nomina','6','2016-03-28 11:12:27');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('191','8','3','Nomina','6','2016-03-28 11:18:11');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('192','8','2','Nomina','7','2016-03-28 11:19:36');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('193','8','3','Nomina','7','2016-03-28 11:27:04');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('194','8','2','Nomina','8','2016-03-28 11:28:40');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('195','8','2','Nomina','9','2016-03-28 11:29:31');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('196','8','2','Nomina','10','2016-03-28 11:30:27');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('197','8','3','Nomina','10','2016-03-28 11:33:12');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('198','8','2','Nomina','11','2016-03-28 11:33:51');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('199','8','2','Nomina','12','2016-03-28 11:34:43');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('200','8','3','Nomina','12','2016-03-28 11:35:25');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('201','8','6','Nomina','12','2016-03-28 11:35:45');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('202','8','3','Nomina','12','2016-03-28 11:36:24');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('203','3','6','Nomina','12','2016-03-28 11:39:09');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('204','3','7','Nomina','0','2016-03-28 11:39:51');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('205','8','6','Nomina','12','2016-03-28 11:41:12');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('206','8','7','Nomina','0','2016-03-28 11:41:23');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('207','8','3','Nomina','12','2016-03-28 11:42:25');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('208','8','7','Nomina','0','2016-03-28 11:42:44');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('209','8','3','Nomina','12','2016-03-28 11:43:58');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('210','8','2','Nomina','13','2016-03-28 11:45:01');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('211','8','3','Nomina','13','2016-03-28 11:45:47');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('212','8','2','Nomina','14','2016-03-28 11:47:11');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('213','8','3','Cargos','2','2016-03-28 11:47:54');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('214','8','1','Cargos','2','2016-03-28 11:47:54');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('215','8','2','Nomina','15','2016-03-28 11:48:49');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('216','8','2','Nomina','16','2016-03-28 11:49:31');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('217','8','2','Nomina','17','2016-03-28 11:50:36');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('218','8','6','Nomina','17','2016-03-28 11:50:47');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('219','8','2','Cargos','41','2016-03-28 11:51:51');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('220','8','1','Cargos','41','2016-03-28 11:51:51');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('221','8','3','Empleados','14','2016-03-28 11:52:23');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('222','8','3','Nomina','17','2016-03-28 11:52:36');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('223','8','2','Nomina','18','2016-03-28 11:53:30');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('224','8','7','Nomina','0','2016-03-28 11:53:54');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('225','8','2','Nomina','19','2016-03-28 11:55:07');
INSERT INTO `auditoria` (`id`,`id_user`,`accion`,`modelo`,`id_registro`,`fecha`) VALUES
('226','8','7','Nomina','0','2016-03-28 11:55:34');



-- -------------------------------------------
-- TABLE DATA cargos
-- -------------------------------------------
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('1','Obrero de 1ra.','2560','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('2','Vigilante','2561','1');
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
('25','Ingeniero Residente','16000','1');
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
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('36','SINDICATO I','5000','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('37','Ingeniero Residente III','24200','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('38','VIGILANTE NOCTURNO','4225','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('39','OPERADOR DE EQUIPO LIVIANO','3071.53','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('40','PLOMERO DE 2da','3071.53','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('41','Maestro de Obra de 1ra.1','5000','1');



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
INSERT INTO `conceptos` (`id`,`Fecha`,`tipo_bono`,`bono`) VALUES
('10','2016-02-01','1','177');



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
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('21','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('22','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('23','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('24','0','0','0','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('25','0','0','0','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('26','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('27','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('28','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('29','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('30','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('31','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('32','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('33','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('34','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('35','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('36','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('37','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('38','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('39','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('40','1','1','1','0');



-- -------------------------------------------
-- TABLE DATA empleados
-- -------------------------------------------
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('1','4','4','01160024710006468918','1','10','24','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('2','58','4','01160024720007142145','1','11','25','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('3','1','4','01160024760185344950','1','12','26','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('4','5','4','01160024760190100583','1','13','27','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('5','3','4','01160024750186671792','1','14','28','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('6','6','4','01160024760205435084','1','15','29','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('7','7','4','01160024740205984916','1','16','30','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('8','8','4','01160024720194403408','1','17','31','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('9','2','4','01160024700019627513','1','18','32','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('10','9','4','01160024790016489128','1','19','33','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('11','10','4','01160024790185363326','1','20','35','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('12','11','4','01160024760202080129','1','21','2','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('13','12','4','01160024720185877125','1','22','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('14','13','1','01160024710193458489','1','23','41','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('15','14','1','01160024710020616120','1','24','1','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('16','59','1','01160024750020566310','1','25','14','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('17','15','1','01160024710187565490','1','26','13','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('18','16','1','01160024750185246834','1','27','13','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('19','17','1','01160024710185266576','1','28','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('20','18','1','01160024790190670444','1','29','15','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('21','19','1','01160024720022686258','1','30','21','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('22','20','1','01160024760023399790','1','31','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('23','60','1','01160024710033812608','1','32','36','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('24','57','1','01160024760024548987','1','33','1','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('25','61','1','01160024750024548979','1','34','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('26','62','1','','1','35','13','','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('27','63','1','','1','36','3','','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('28','64','1','','1','37','3','','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('29','65','1','','1','38','13','','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('30','66','1','','1','39','13','','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('31','22','2','01160024750185266436','2','40','23','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('32','23','2','01160024700186897545','2','41','14','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('33','24','2','01160024760205818412','2','42','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('34','25','2','01160024780190071486','2','43','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('35','26','2','01160024700185247423','2','44','7','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('36','67','2','01160024770024424323','2','45','37','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('37','27','2','01160024730185260380','2','46','20','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('38','53','2','01160024710190071087','2','47','23','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('39','28','2','01160024710185266304','2','48','15','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('40','29','2','01160024730207412847','2','49','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('41','30','2','01160024710020962479','2','50','14','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('42','31','2','01160024780019640960','2','51','14','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('43','32','2','01160024720190548924','2','52','21','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('44','33','2','01160024770024425567','2','53','38','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('45','34','2','01160024720022673199','2','54','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('46','35','2','01160024710197338038','2','55','8','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('47','36','2','01160024780207413193','2','56','15','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('48','37','2','01160024710020553544','2','57','13','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('49','38','2','01160024760020176945','2','58','16','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('50','39','2','01160024750185266193','2','59','39','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('51','40','2','01160024720188322493','2','60','4','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('52','41','2','01160024730185265286','2','61','11','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('53','42','2','01160024760206215622','2','62','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('54','43','2','01160024720197701663','2','63','5','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('55','44','2','01160024790024460494','2','64','2','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('56','47','2','01160024730185265448','2','65','16','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('57','48','2','01160024710206216149','2','66','40','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('58','49','2','01160024740204763673','2','67','1','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('59','55','2','01160024740024548960','2','68','5','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('60','68','2','01160024770185257623','2','69','15','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('61','45','3','01160024780186563680','1','70','20','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('62','56','3','01160024700019702744','1','71','13','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('63','46','3','01160024740021477442','1','72','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('64','54','3','01160024730019962347','1','73','1','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('65','69','3','','1','74','2','','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('66','70','3','','1','75','6','','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('67','71','3','01160024710197341926','1','76','3','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('68','72','3','','1','77','1','','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('69','73','3','01160024700194031918','1','78','13','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('70','50','4','01160024700185514480','1','79','13','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('71','51','4','01160024710020433042','1','80','1','0116','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('72','52','4','01160024710022475974','1','81','15','0116','1');



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
('2','1','23','23','8144.5','929.5','24115','2016-02-26','0','0','179.5','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('4','2','25','25','0','0','16000','2016-02-26','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('5','3','26','26','17965','244.75','22170.2','2016-02-26','0','10000','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('6','4','27','27','7965','1061.5','26203.5','2016-02-26','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('7','5','28','28','8218.5','665.5','19653','2016-02-26','0','0','253.5','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('8','6','29','29','9965','265.348','14524.2','2016-02-26','0','0','2000','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('9','7','30','30','7965','265.348','12524.2','2016-02-26','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('10','8','31','31','9143.5','665.5','20578','2016-02-26','0','0','1178.5','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('11','9','32','32','7965','265.348','12524.2','2016-02-26','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('12','10','33','33','19679.3','862.3','27817','2016-02-26','0','0','4000','367.3','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('13','11','34','34','9465','655','16610','2016-02-26','0','0','1500','226','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('15','12','36','36','11080.1','140.855','13500.3','2016-02-26','0','0','920','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('16','13','37','37','10313.6','150.7','12902.9','2016-02-26','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('19','65','40','40','11080.1','140.855','13500.3','2016-02-26','0','0','920','0','');



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
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('58','Jacinto de la Cruz','Rojas Zapata','7282075','1963-05-03','San Juan de los Morros','V','M','Urb. Altamira, Av. Romulo Gallegos, frente a los Baños Termales','(0414)-465-0445','jacintorojaszapata@hotmail.com');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('59','HENRY DEL VALLE','VELIZ','5603896','1955-11-15','mATURIN','V','M','EL LUCIANERO, CALLEJON ORTIZ, #55','(0426)-232-4042','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('60','BALBINO','SOJO','7298893','1966-03-31','San Juan de los Morros','V','M','San Juan de los Morros','(0414)-493-9843','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('61','Jose Gregorio','Maitan','11121414','1973-10-14','San Juan de los Morros','V','M','Urb. Trina Chacin s/n duasdualito','(0414)-945-5564','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('62','Armando Antonio','Manzano Manzano','19985939','1987-12-30','San Juan de los Morros','V','M','Urb. Hugo Chavez, S/n','(0426)-448-2408','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('63','Manuel Antonio ','Hermoso Benavides','18971433','1989-06-14','San Juan de los Morros','V','M','Calle Zamora, callejon bolivar, casa #78','(0246)-432-0998','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('64','Luis MIguel','Manzano','24975032','1995-03-12','San Juan de los Morros','V','M','Calle Zamora, casa #77','(0424)-363-2083','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('65','Jose Gregorio','Ramirez Gonzalez','13151348','1977-08-07','San Juan de los Morros','V','M','La morera, los aguacates, casa s/n','(0412)-141-0376','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('66','Armando Antonio','Manzano Bolivar','8780772','1961-07-25','San Juan de los Morros','V','M','Calle Zamora, barrio Puerta negra, casa #76','(0424)-305-7782','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('67','Carmen Maria','Machin Perez','19221917','1990-08-26','San Juan de los Morros','V','F','Av. Andres Eloy Blanco, casa #2, El sombrero','(0414)-295-4932','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('68','GREGORY ','AZUAJES','13874648','1977-05-22','San Juan de los Morros','V','M','El totumo, calle principal, #40','(0414)-945-9885','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('69','JOSE RAMON','UTRERA APONTE','7297412','1957-09-28','San Juan de los Morros','V','M','Los Bagres, Casa S/N','','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('70','YOAN EDUARDO','HERNANDEZ MACHADO','18617941','1985-11-12','San Juan de los Morros','V','M','Carretera Nacional, Los Cedros, Casa #25','(0424)-354-3979','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('71','Jose Antonio','Mateus Santaella','15392513','1979-03-07','San Juan de los Morros','V','M','Las Majaguas, Calle Principal, casa #8','(0426)-644-1028','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('72','Francisco Javier','Alvarez Gorrin','18972747','1988-02-18','San Juan de los Morros','V','M','Canta Gallo, El Bosques 2','(0414)-449-8935','');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('73','Wilmer Alfredo','Diamont Valera','11119549','1972-07-30','San Juan de los Morros','V','M','Sector Los Cedros, Casa #145','(0424)-344-0220','');



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
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('10','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('11','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('12','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('13','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('14','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('15','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('16','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('17','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('18','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('19','42','34','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('20','42','30','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('21','36','42','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('22','42','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('23','39','32','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('24','42','32','S');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('25','40','42','XXL');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('26','42','30','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('27','41','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('28','41','36','XXL');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('29','41','28','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('30','41','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('31','40','30','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('32','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('33','40','30','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('34','40','30','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('35','41','34','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('36','42','34','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('37','42','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('38','44','38','xl');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('39','40','32','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('40','42','34','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('41','43','36','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('42','41','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('43','41','36','XXL');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('44','42','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('45','','','');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('46','41','30','S');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('47','42','34','m');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('48','40','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('49','41','36','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('50','41','34','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('51','40','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('52','41','30','S');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('53','42','36','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('54','43','34','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('55','41','34','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('56','39','34','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('57','42','36','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('58','44','34','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('59','41','34','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('60','40','34','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('61','38','30','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('62','41','34','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('63','45','36','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('64','43','36','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('65','41','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('66','40','30','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('67','45','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('68','43','34','XL');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('69','40','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('70','43','32','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('71','41','32','S');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('72','39','30','S');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('73','41','32','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('74','41','36','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('75','39','28','S');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('76','42','30','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('77','41','30','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('78','39','32','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('79','41','32','M');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('80','40','32','S');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('81','41','32','M');



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

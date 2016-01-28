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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE DATA asignaciones
-- -------------------------------------------
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('1','0','0','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('2','30','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('3','30','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('4','30','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('5','30','1','0','0','0','0');
INSERT INTO `asignaciones` (`id`,`b_alimenticio`,`asistencia`,`feriado`,`sabado`,`horasextra_diurna`,`horasextras_nocturna`) VALUES
('6','0','1','0','0','0','0');



-- -------------------------------------------
-- TABLE DATA cargos
-- -------------------------------------------
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('1','Dibujante','2500','1');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('2','Administrador','8500','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('3','Ing Residente','15000','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('4','Secretaria','4824.09','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('5','Contador','13000','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('6','Mensajero','4824.09','2');
INSERT INTO `cargos` (`id`,`cargo`,`sueldo`,`tipo_sueldo`) VALUES
('7','Albañil','1000','1');



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
('5','1','1','1','0');
INSERT INTO `deducciones` (`id`,`sso`,`spf`,`lph`,`inasistencia`) VALUES
('6','1','1','1','0');



-- -------------------------------------------
-- TABLE DATA empleados
-- -------------------------------------------
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('1','1','2','11111111111111111111','2','1','1','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('2','2','3','22222222222222222222','1','2','2','0116','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('3','3','1','33333333333333333333','2','3','3','0108','2');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('4','4','2','44444445555555555555','1','4','5','0001','1');
INSERT INTO `empleados` (`id`,`id_persona`,`id_obra`,`nro_cuenta`,`id_empresa`,`id_talla`,`id_cargo`,`cod_banco`,`tipo_empleado`) VALUES
('5','6','3','00000000000000000000','2','5','5','0008','2');



-- -------------------------------------------
-- TABLE DATA empresa
-- -------------------------------------------
INSERT INTO `empresa` (`id`,`nombre_emp`,`direccion`,`telefono`,`rif`) VALUES
('1','Promotora RL 2006 C.A.','Av. Loa llanos, edificio Juma, Piso 2 oficina #12','02464314913','j-305831125');
INSERT INTO `empresa` (`id`,`nombre_emp`,`direccion`,`telefono`,`rif`) VALUES
('2','Nomisoft CM','Las Palmas, Calle Pinto salinas #16','04267490025','J-14643985');
INSERT INTO `empresa` (`id`,`nombre_emp`,`direccion`,`telefono`,`rif`) VALUES
('3','IngeCon','Av los llanos, San Juan de Los Morros','02464313941','J-5556889214');



-- -------------------------------------------
-- TABLE DATA hijos
-- -------------------------------------------
INSERT INTO `hijos` (`id`,`id_persona`,`nombre`,`apellido`,`fecha_nac`) VALUES
('1','1','Lismary','Moreno','1998-06-26');
INSERT INTO `hijos` (`id`,`id_persona`,`nombre`,`apellido`,`fecha_nac`) VALUES
('2','1','Tony','Moreno','2004-02-22');
INSERT INTO `hijos` (`id`,`id_persona`,`nombre`,`apellido`,`fecha_nac`) VALUES
('3','2','Joiber','Duarte','2002-06-26');
INSERT INTO `hijos` (`id`,`id_persona`,`nombre`,`apellido`,`fecha_nac`) VALUES
('4','4','Sebastian','Prieto','2010-05-15');



-- -------------------------------------------
-- TABLE DATA nomina
-- -------------------------------------------
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('2','3','2','2','9750','412.5','24337.5','2016-01-01','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('3','4','3','3','9350','357.5','21992.5','2016-01-01','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('4','5','4','4','9350','357.5','21992.5','2016-01-01','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('5','2','5','5','8450','233.75','16716.2','2016-01-01','0','0','0','0','');
INSERT INTO `nomina` (`id`,`id_empleado`,`id_asignacion`,`id_deduccion`,`total_asig`,`total_deduc`,`neto`,`fecha`,`vaciado`,`prestamos`,`otros`,`descuento`,`nominacol`) VALUES
('6','1','6','6','2142.86','137.5','4505.36','2016-01-01','0','0','0','0','');



-- -------------------------------------------
-- TABLE DATA obras
-- -------------------------------------------
INSERT INTO `obras` (`id`,`id_empleado`,`nombre_obra`,`direccion`,`fech_ini`,`fech_fin`,`status`) VALUES
('1','0','Via Appia','Av. Bolivar','2015-01-01','2015-12-31','1');
INSERT INTO `obras` (`id`,`id_empleado`,`nombre_obra`,`direccion`,`fech_ini`,`fech_fin`,`status`) VALUES
('2','0','Residencias Villa Jardin','Av Miranda','2014-01-01','2015-12-01','1');
INSERT INTO `obras` (`id`,`id_empleado`,`nombre_obra`,`direccion`,`fech_ini`,`fech_fin`,`status`) VALUES
('3','0','Residencias Villa Paraiso','Urb la Morera, calle Ppal','2012-01-01','2013-01-01','0');
INSERT INTO `obras` (`id`,`id_empleado`,`nombre_obra`,`direccion`,`fech_ini`,`fech_fin`,`status`) VALUES
('4','0','Panaderia JSON','Calle Roscio #56','2016-01-26','2021-01-26','1');



-- -------------------------------------------
-- TABLE DATA personas
-- -------------------------------------------
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('1','Manuel','Moreno','14643985','1981-08-19','San Juan de Los Morros','V','M','Las Palmas, calle pinto salinas #16, San Juan de los Morros','04267490025','manuelmoreno2156@gmail.com');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('2','Jona','Vazques','13556897','0000-00-00','San Juan de Los Morros','V','F','Via el castrero, Frente al circuito, San Juan de Los Morros','02434318181','Jona937@hotmail.com');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('3','Gabriel ','Castillo','21662577','1993-07-31','Valle de la Pascua, Estado Guarico','V','M','El socorro, Callejon Calichal #246','04168477730','jesgac@hotmail.com');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('4','Gloria','Prieto','16558975','1983-04-25','Villa de Cura, Estado Aragua','V','F','Banco Obrero, sector 4, San Juan de los Morros','04165558796','Gloria1112@hotmail.com');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('5','Fabian','Pignone','22614115','2015-12-01','El Socorro','V','M','-dfdsfdsfsd-','000000000','fabianpig15@hotmail.com');
INSERT INTO `personas` (`id`,`nombre`,`apellido`,`cedula`,`fecha_nac`,`lugar_nac`,`nacionalidad`,`sexo`,`direccion`,`telefono`,`email`) VALUES
('6','jesus','pignone','22614153','1994-10-01','el socorro','V','M','el socorro','(0000)-000-0000','jesuspigno@gmail.com');



-- -------------------------------------------
-- TABLE DATA tallas
-- -------------------------------------------
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('1','45','36','XL');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('2','36','28','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('3','40','32','L');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('4','36','28','s');
INSERT INTO `tallas` (`id`,`talla_zapato`,`talla_pantalon`,`talla_camisa`) VALUES
('5','40','35','S');



-- -------------------------------------------
-- TABLE DATA usuario
-- -------------------------------------------
INSERT INTO `usuario` (`id`,`id_persona`,`user`,`pass`,`nivel`) VALUES
('3','1','administrador','292ef3d4df7a0882d4e8d253db414b04','3');
INSERT INTO `usuario` (`id`,`id_persona`,`user`,`pass`,`nivel`) VALUES
('4','2','jonav','57ed05b4d96d177ea35071935f137b89','1');
INSERT INTO `usuario` (`id`,`id_persona`,`user`,`pass`,`nivel`) VALUES
('5','4','gloriaP','c350c9aa974837c25b6114cc01eafcfd','2');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------

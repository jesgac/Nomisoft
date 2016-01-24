-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2016 a las 20:50:32
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `nominagm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE IF NOT EXISTS `asignaciones` (
  `id` int(11) NOT NULL COMMENT 'Clave primaria',
  `b_alimenticio` float NOT NULL COMMENT 'Pago del bono alimenticio',
  `asistencia` float NOT NULL COMMENT 'Pago de bono de asistencia',
  `feriado` float NOT NULL COMMENT 'Pago de dia feriado',
  `sabado` float NOT NULL COMMENT 'pago de Sabados trabajados',
  `horasextra_diurna` float NOT NULL COMMENT 'Pago de Horas extras diurnas',
  `horasextras_nocturna` float NOT NULL COMMENT 'Pago de Horas extras nocturna'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`id`, `b_alimenticio`, `asistencia`, `feriado`, `sabado`, `horasextra_diurna`, `horasextras_nocturna`) VALUES
(1, 0, 2142.86, 0, 0, 0, 0),
(2, 0, 1700, 708.333, 0, 0, 0),
(3, 0, 3000, 2500, 0, 218.75, 337.5),
(4, 0, 2600, 1083.33, 1083.33, 284.375, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(11) NOT NULL COMMENT 'Clave primaria',
  `cargo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'Descripcion del cargo del empleado',
  `sueldo` float NOT NULL COMMENT 'Salario correspondiente al cargo',
  `tipo_sueldo` int(1) NOT NULL COMMENT 'describe si el pago es mensual o semanal'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`, `sueldo`, `tipo_sueldo`) VALUES
(1, 'Dibujante', 2500, 1),
(2, 'Administrador', 8500, 2),
(3, 'Ing Residente', 15000, 2),
(4, 'Secretaria', 4824.09, 2),
(5, 'Contador', 13000, 2),
(6, 'Mensajero', 4824.09, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE IF NOT EXISTS `conceptos` (
  `id` int(11) NOT NULL COMMENT 'Clave primaria',
  `Fecha` date NOT NULL COMMENT 'Fecha de vigencia del concepto',
  `tipo_bono` int(11) NOT NULL COMMENT 'Describe cual es el bono (1=>U.T., 2=>HE diurnas, 3=>HE nocturnas, 4=> dia feriado 5=>sabados, 6=>Bono alimentacion, 7=>asistencia )',
  `bono` float NOT NULL COMMENT 'Variable de la formula del calculo que corresponde al tipo de bono'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `Fecha`, `tipo_bono`, `bono`) VALUES
(1, '2015-12-02', 1, 150),
(2, '2015-12-02', 2, 0.75),
(3, '2015-12-02', 3, 0.75),
(4, '2015-12-02', 4, 1.5),
(5, '2015-12-02', 5, 1.5),
(6, '2015-12-02', 6, 1.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE IF NOT EXISTS `deducciones` (
  `id` int(11) NOT NULL COMMENT 'Clave primaria',
  `sso` float NOT NULL COMMENT 'Descuento del Seguro Social Obligatorio',
  `spf` float NOT NULL COMMENT 'Descuento del Seguro de Paro forzoso',
  `lph` float NOT NULL COMMENT 'Descuento de la Ley de Politica Habitacional o Faov ( Fondo de Ahorro Obligatorio para la Vivienda)',
  `inasistencia` float NOT NULL COMMENT 'Descuento por dias no laborados'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deducciones`
--

INSERT INTO `deducciones` (`id`, `sso`, `spf`, `lph`, `inasistencia`) VALUES
(1, 433.333, 54.1667, 108.333, 0),
(2, 340, 42.5, 85, 0),
(3, 600, 75, 150, 500),
(4, 520, 65, 130, 433.333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL COMMENT 'Clave primaria',
  `id_persona` int(11) NOT NULL COMMENT 'Clave foranea de la tabla persona',
  `id_obra` int(11) NOT NULL COMMENT 'Clave foranea de la tabla Obra',
  `nro_cuenta` varchar(20) NOT NULL COMMENT 'Numero de cuenta del trabajador',
  `id_empresa` int(11) NOT NULL COMMENT 'Clave Foranea de la tabla empresa',
  `id_talla` int(11) NOT NULL COMMENT 'Clave foranea de la tabla talla',
  `id_cargo` int(11) NOT NULL COMMENT 'Clave foranea de la tabla cargo',
  `cod_banco` varchar(4) NOT NULL COMMENT 'Identificador de la entidad bancaria',
  `tipo_empleado` int(1) NOT NULL COMMENT 'Describe el tipo de trabajador (empelado u obrero)'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `id_persona`, `id_obra`, `nro_cuenta`, `id_empresa`, `id_talla`, `id_cargo`, `cod_banco`, `tipo_empleado`) VALUES
(1, 1, 2, '11111111111111111111', 2, 1, 1, '0116', 2),
(2, 2, 3, '22222222222222222222', 1, 2, 2, '0116', 2),
(3, 3, 1, '33333333333333333333', 2, 3, 3, '0108', 2),
(4, 4, 2, '44444445555555555555', 1, 4, 5, '0001', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL COMMENT 'Clave primaria',
  `nombre_emp` varchar(100) NOT NULL COMMENT 'Nombre de la empresa',
  `direccion` text NOT NULL COMMENT 'Direccion de la empresa',
  `telefono` varchar(11) NOT NULL COMMENT 'Telefono de la empresa',
  `rif` varchar(15) NOT NULL COMMENT 'Rif de la empresa'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre_emp`, `direccion`, `telefono`, `rif`) VALUES
(1, 'Promotora RL 2006 C.A.', 'Av. Loa llanos, edificio Juma, Piso 2 oficina #12', '02464314913', 'j-305831125'),
(2, 'Nomisoft CM', 'Las Palmas, Calle Pinto salinas #16', '04267490025', 'J-14643985'),
(3, 'IngeCon', 'Av los llanos, San Juan de Los Morros', '02464313941', 'J-5556889214');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hijos`
--

CREATE TABLE IF NOT EXISTS `hijos` (
  `id` int(11) NOT NULL COMMENT 'Clave Primaria',
  `id_persona` int(11) NOT NULL COMMENT 'Clave foranea de la tabla persona',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del Hijo',
  `apellido` varchar(45) NOT NULL COMMENT 'Apellido del Hijo',
  `fecha_nac` varchar(45) NOT NULL COMMENT 'Fecha de Nacimiento del Hijo'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hijos`
--

INSERT INTO `hijos` (`id`, `id_persona`, `nombre`, `apellido`, `fecha_nac`) VALUES
(1, 1, 'Lismary', 'Moreno', '1998-06-26'),
(2, 1, 'Tony', 'Moreno', '2004-02-22'),
(3, 2, 'Joiber', 'Duarte', '2002-06-26'),
(4, 4, 'Sebastian', 'Prieto', '2010-05-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE IF NOT EXISTS `nomina` (
  `id` int(11) NOT NULL COMMENT 'Clave Primaria',
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
  `nominacol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`id`, `id_empleado`, `id_asignacion`, `id_deduccion`, `total_asig`, `total_deduc`, `neto`, `fecha`, `vaciado`, `prestamos`, `otros`, `descuento`, `nominacol`) VALUES
(1, 1, 1, 1, 2142.86, 595.833, 4047.02, '2015-12-04', 0, 0, 0, 0, NULL),
(2, 2, 2, 2, 2808.33, 467.5, 10840.8, '2015-12-04', 0, 100, 300, 0, NULL),
(3, 3, 3, 3, 6356.25, 1425, 19931.2, '2015-12-04', 0, 0, 300, 100, NULL),
(4, 4, 4, 4, 5551.04, 1148.33, 17402.7, '2015-12-04', 300, 100, 100, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE IF NOT EXISTS `obras` (
  `id` int(11) NOT NULL COMMENT 'Clave Primaria',
  `id_empleado` int(11) NOT NULL COMMENT 'Clave foranea de la tabla empleado',
  `nombre_obra` varchar(45) NOT NULL COMMENT 'Nombre de la obra',
  `direccion` varchar(100) NOT NULL COMMENT 'Direccion de la Obra',
  `fech_ini` date NOT NULL COMMENT 'Fecha de inicio de la obra',
  `fech_fin` date NOT NULL COMMENT 'fecha de cierre de la obra',
  `status` varchar(1) NOT NULL COMMENT 'Indica estado de actividad de la obra'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`id`, `id_empleado`, `nombre_obra`, `direccion`, `fech_ini`, `fech_fin`, `status`) VALUES
(1, 0, 'Via Appia', 'Av. Bolivar', '2015-01-01', '2015-12-31', '1'),
(2, 0, 'Residencias Villa Jardin', 'Av Miranda', '2014-01-01', '2015-12-01', '1'),
(3, 0, 'Residencias Villa Paraiso', 'Urb la Morera, calle Ppal', '2012-01-01', '2013-01-01', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL COMMENT 'Clave Primaria',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del trabajador',
  `apellido` varchar(50) NOT NULL COMMENT 'apellido del trabajador',
  `cedula` varchar(15) NOT NULL COMMENT 'Documento de identidad',
  `fecha_nac` date NOT NULL COMMENT 'Fecha de nacimiento del trabajador',
  `lugar_nac` text NOT NULL COMMENT 'Lugar de nacimiento del trabajador',
  `nacionalidad` varchar(1) NOT NULL COMMENT 'Nacionalidad del trabajador',
  `sexo` varchar(1) NOT NULL COMMENT 'Sexo del trabajador',
  `direccion` text NOT NULL COMMENT 'Direccion del trabajador',
  `telefono` varchar(11) NOT NULL COMMENT 'Numero telefonico del trabajador',
  `email` varchar(50) NOT NULL COMMENT 'Correo electronico del trabajador'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `cedula`, `fecha_nac`, `lugar_nac`, `nacionalidad`, `sexo`, `direccion`, `telefono`, `email`) VALUES
(1, 'Manuel', 'Moreno', '14643985', '1981-08-19', 'San Juan de Los Morros', 'V', 'M', 'Las Palmas, calle pinto salinas #16, San Juan de los Morros', '04267490025', 'manuelmoreno2156@gmail.com'),
(2, 'Jona', 'Vazques', '13556897', '0000-00-00', 'San Juan de Los Morros', 'V', 'F', 'Via el castrero, Frente al circuito, San Juan de Los Morros', '02434318181', 'Jona937@hotmail.com'),
(3, 'Gabriel ', 'Castillo', '21662577', '1993-07-31', 'Valle de la Pascua, Estado Guarico', 'V', 'M', 'El socorro, Callejon Calichal #246', '04168477730', 'jesgac@hotmail.com'),
(4, 'Gloria', 'Prieto', '16558975', '1983-04-25', 'Villa de Cura, Estado Aragua', 'V', 'F', 'Banco Obrero, sector 4, San Juan de los Morros', '04165558796', 'Gloria1112@hotmail.com'),
(5, 'Fabian', 'Pignone', '22614115', '2015-12-01', 'El Socorro', 'V', 'M', '-dfdsfdsfsd-', '000000000', 'fabianpig15@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE IF NOT EXISTS `tallas` (
  `id` int(11) NOT NULL COMMENT 'Clave primaria',
  `talla_zapato` varchar(3) NOT NULL COMMENT 'Numero de calzado',
  `talla_pantalon` varchar(3) NOT NULL COMMENT 'Numero de talla de pantalon',
  `talla_camisa` varchar(3) NOT NULL COMMENT 'Numero de talla de camisa'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `talla_zapato`, `talla_pantalon`, `talla_camisa`) VALUES
(1, '45', '36', 'XL'),
(2, '36', '28', 'L'),
(3, '40', '32', 'L'),
(4, '36', '28', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL COMMENT 'Clave primaria',
  `id_persona` int(11) NOT NULL COMMENT 'Clave foranea de la tabla persona',
  `user` varchar(50) NOT NULL COMMENT 'Nombre de Usuario',
  `pass` varchar(150) NOT NULL COMMENT 'Contraseña del usuario',
  `nivel` int(1) NOT NULL COMMENT 'Nivel de acceso del usuario'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_persona`, `user`, `pass`, `nivel`) VALUES
(3, 1, 'administrador', '292ef3d4df7a0882d4e8d253db414b04', 3),
(4, 2, 'jonav', '57ed05b4d96d177ea35071935f137b89', 1),
(5, 4, 'gloriaP', 'c350c9aa974837c25b6114cc01eafcfd', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hijos`
--
ALTER TABLE `hijos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `hijos`
--
ALTER TABLE `hijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

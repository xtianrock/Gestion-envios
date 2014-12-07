-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2014 a las 17:17:35
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




--
-- Base de datos: `envios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE IF NOT EXISTS `envios` (
`codigo_envio` int(8) NOT NULL,
  `destinatario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `poblacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cp` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_envio` date NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`codigo_envio`, `destinatario`, `telefono`, `direccion`, `poblacion`, `cp`, `provincia`, `email`, `estado`, `fecha_envio`, `fecha_entrega`, `observaciones`) VALUES
(1, 'Maria', '959355185', 'gorrion nÂº 38', 'aljaraque', '21110', '01', 'xtian_c_v@hotmail.com', 'E', '2014-11-24', '2014-12-03', ''),
(3, 'cristiano', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtianrock89@gmail.com', 'P', '2014-11-24', NULL, ''),
(4, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(5, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(6, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(7, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(8, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(9, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(10, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(11, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(12, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(13, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(14, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(15, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(16, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(17, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(18, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(19, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(20, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(21, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(22, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(23, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(25, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(26, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(27, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(28, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(29, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(30, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(31, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(32, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(33, 'cristian', '959873642', 'gorrion nÂº 38', 'aljaraque', '01110', '39', 'xtian_c_v@hotmail.com', 'P', '2014-11-24', NULL, ''),
(34, 'mierder', '959355185', 'C/ Gorrion', 'Aljaraque', '21110', '09', 'maloviz64@gmail.com', 'P', '2014-11-26', NULL, 'asu asu'),
(35, 'asd', '626047737', 'Avenida Bulevar de los Azaharaes nÂº 27', 'Aljaraque', '21110', '21', 'mconceglieri@hotmail.com', 'P', '2014-11-27', NULL, ''),
(36, 'asd', '626047737', 'Avenida Bulevar de los Azaharaes nÂº 27', 'Aljaraque', '21110', '21', 'mconceglieri@hotmail.com', 'E', '2014-11-27', '2014-11-27', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `cod` char(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa 99 para seleccionar a Nacional';

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`cod`, `nombre`) VALUES
('01', 'Alava'),
('02', 'Albacete'),
('03', 'Alicante'),
('04', 'Almera'),
('33', 'Asturias'),
('05', 'Avila'),
('06', 'Badajoz'),
('07', 'Balears (Illes)'),
('08', 'Barcelona'),
('09', 'Burgos'),
('10', 'Cáceres'),
('11', 'Cádiz'),
('39', 'Cantabria'),
('12', 'Castellón'),
('51', 'Ceuta'),
('13', 'Ciudad Real'),
('14', 'Córdoba'),
('15', 'Coruña (A)'),
('16', 'Cuenca'),
('17', 'Girona'),
('18', 'Granada'),
('19', 'Guadalajara'),
('20', 'Guipzcoa'),
('21', 'Huelva'),
('22', 'Huesca'),
('23', 'Jaén'),
('24', 'León'),
('25', 'Lleida'),
('27', 'Lugo'),
('28', 'Madrid'),
('29', 'Málaga'),
('52', 'Melilla'),
('30', 'Murcia'),
('31', 'Navarra'),
('32', 'Ourense'),
('34', 'Palencia'),
('35', 'Palmas (Las)'),
('36', 'Pontevedra'),
('26', 'Rioja (La)'),
('37', 'Salamanca'),
('38', 'Santa Cruz de Tenerife'),
('40', 'Segovia'),
('41', 'Sevilla'),
('42', 'Soria'),
('43', 'Tarragona'),
('44', 'Teruel'),
('45', 'Toledo'),
('46', 'Valencia'),
('47', 'Valladolid'),
('48', 'Vizcaya'),
('49', 'Zamora'),
('50', 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `permisos` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `password`, `permisos`) VALUES
('admin', 'admin', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
 ADD PRIMARY KEY (`codigo_envio`), ADD KEY `indice_prov` (`provincia`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
 ADD PRIMARY KEY (`cod`), ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
MODIFY `codigo_envio` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
ADD CONSTRAINT `fk_prov` FOREIGN KEY (`provincia`) REFERENCES `provincias` (`cod`);


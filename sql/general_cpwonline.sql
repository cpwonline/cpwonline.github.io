-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2011 a las 06:21:24
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `general_cpwonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_oficiales`
--

CREATE TABLE `datos_oficiales` (
  `do_id` int(10) NOT NULL,
  `do_usuario` varchar(50) NOT NULL,
  `do_dominio` varchar(50) NOT NULL,
  `do_ciclo` int(2) NOT NULL,
  `do_mes` int(2) NOT NULL,
  `do_plan` varchar(14) NOT NULL,
  `do_estado_pagina` varchar(9) NOT NULL DEFAULT 'De prueba',
  `do_estado_cuenta` varchar(9) NOT NULL DEFAULT 'Pagado',
  `do_fase` varchar(13) NOT NULL DEFAULT 'Activado',
  `do_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informaciones_u`
--

CREATE TABLE `informaciones_u` (
  `iu_id` int(10) NOT NULL,
  `iu_titulo` varchar(50) NOT NULL,
  `iu_contenido` text NOT NULL,
  `iu_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `o_id` int(10) NOT NULL,
  `o_titulo` varchar(50) NOT NULL,
  `o_dominio_1` varchar(100) NOT NULL,
  `o_dominio_2` varchar(100) NOT NULL,
  `o_dominio_3` varchar(100) NOT NULL,
  `o_nya` varchar(50) NOT NULL,
  `o_cedula` varchar(20) NOT NULL,
  `o_pais` varchar(50) NOT NULL,
  `o_estado` varchar(50) NOT NULL,
  `o_ciudad` varchar(50) NOT NULL,
  `o_direccion` varchar(200) NOT NULL,
  `o_email` varchar(100) NOT NULL,
  `o_tel` varchar(15) NOT NULL,
  `o_plan` varchar(14) NOT NULL,
  `o_modelo` varchar(6) NOT NULL,
  `o_contenidos` varchar(200) NOT NULL,
  `o_moneda` varchar(3) NOT NULL,
  `o_precio` varchar(10) NOT NULL,
  `o_usuario` varchar(50) NOT NULL,
  `o_clave` varchar(16) NOT NULL,
  `o_listo` tinyint(1) NOT NULL DEFAULT '0',
  `o_admin` tinyint(1) NOT NULL DEFAULT '0',
  `o_estado_cuenta` varchar(9) NOT NULL DEFAULT 'Activo',
  `o_estado_pagina` varchar(9) NOT NULL DEFAULT 'De prueba',
  `o_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`o_id`, `o_titulo`, `o_dominio_1`, `o_dominio_2`, `o_dominio_3`, `o_nya`, `o_cedula`, `o_pais`, `o_estado`, `o_ciudad`, `o_direccion`, `o_email`, `o_tel`, `o_plan`, `o_modelo`, `o_contenidos`, `o_moneda`, `o_precio`, `o_usuario`, `o_clave`, `o_listo`, `o_admin`, `o_estado_cuenta`, `o_estado_pagina`, `o_freg`) VALUES
(3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'cpwonlin', 'Juniorydamaglys2', 1, 1, 'Activo', 'De prueba', '2011-05-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `pa_id` int(100) NOT NULL,
  `pa_usuario` varchar(50) NOT NULL,
  `pa_cantidad` varchar(50) NOT NULL,
  `pa_moneda` varchar(3) NOT NULL,
  `pa_metodo` varchar(50) NOT NULL,
  `pa_confirmado` tinyint(1) NOT NULL DEFAULT '0',
  `pa_imagen` varchar(200) NOT NULL,
  `pa_comentarios` varchar(100) NOT NULL DEFAULT 'Ninguno.',
  `pa_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`pa_id`, `pa_usuario`, `pa_cantidad`, `pa_moneda`, `pa_metodo`, `pa_confirmado`, `pa_imagen`, `pa_comentarios`, `pa_freg`) VALUES
(8, 'cpwonlin', '100', 'USD', 'PayPal', 0, '', 'Ninguno.', '2018-04-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `p_id` int(3) NOT NULL,
  `p_plan` varchar(14) NOT NULL,
  `p_moneda` varchar(3) NOT NULL,
  `p_valor` varchar(13) NOT NULL,
  `p_freg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`p_id`, `p_plan`, `p_moneda`, `p_valor`, `p_freg`) VALUES
(1, 'Economic', 'USD', '24,99', '2011-05-06'),
(2, 'Economic', '/S', '109,99', '2011-05-06'),
(3, 'Economic', 'BsF', 'No disponible', '2011-05-06'),
(4, 'Deluxe', 'USD', '59,99', '2011-05-19'),
(5, 'Deluxe', '/S', '239,99', '2011-05-19'),
(6, 'Deluxe', 'BsF', 'No disponible', '2011-05-19'),
(7, 'Ultimate', 'USD', '79,99', '2011-05-06'),
(8, 'Ultimate', '/S', '319,99', '2011-05-06'),
(9, 'Ultimate', 'BsF', 'No disponible', '2011-05-06'),
(10, 'Super-Economic', 'USD', '9,99', '2011-05-19'),
(11, 'Super-Economic', 'BsF', '999 mil', '2011-05-19'),
(12, 'Super-Economic', '/S', '49,99', '2011-05-19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_oficiales`
--
ALTER TABLE `datos_oficiales`
  ADD PRIMARY KEY (`do_id`);

--
-- Indices de la tabla `informaciones_u`
--
ALTER TABLE `informaciones_u`
  ADD PRIMARY KEY (`iu_id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`o_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`pa_id`),
  ADD KEY `pa_id` (`pa_id`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_oficiales`
--
ALTER TABLE `datos_oficiales`
  MODIFY `do_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informaciones_u`
--
ALTER TABLE `informaciones_u`
  MODIFY `iu_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `pa_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `p_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

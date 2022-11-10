-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 03:00:29
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consorcio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`) VALUES
(1, 'Empresa XYZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto`
--

CREATE TABLE `punto` (
  `id_punto` int(65) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `descision` varchar(25) NOT NULL,
  `archivo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunion`
--

CREATE TABLE `reunion` (
  `id_reunion` int(11) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `color_reunion` varchar(20) NOT NULL,
  `fecha_inicio` varchar(20) NOT NULL,
  `fecha_fin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reunion`
--

INSERT INTO `reunion` (`id_reunion`, `nombre_empresa`, `color_reunion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Empresa XYZ', '#9c27b0', '2022-11-15', '2022-11-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

CREATE TABLE `reuniones` (
  `id_reunion` int(11) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `color_reunion` varchar(20) NOT NULL,
  `fecha_inicio` varchar(20) NOT NULL,
  `fecha_fin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reuniones`
--

INSERT INTO `reuniones` (`id_reunion`, `nombre_empresa`, `color_reunion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Empresa XYZ', '#9c27b0', '2022-11-15', '2022-11-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `ced_socio` int(10) NOT NULL,
  `nombre_soc` varchar(25) NOT NULL,
  `apellido_soc` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`ced_socio`, `nombre_soc`, `apellido_soc`, `username`, `cargo`, `nombre_empresa`) VALUES
(1234, 'admin', 'admin', 'admin', 'Administrador', ''),
(28518451, 'Anibal', 'Lopez', 'Anibal Lopez', 'Socio', 'Empresa XYZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_has_punto`
--

CREATE TABLE `socio_has_punto` (
  `id` int(25) NOT NULL,
  `id_punto` int(30) NOT NULL,
  `id_socio` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `punto`
--
ALTER TABLE `punto`
  ADD PRIMARY KEY (`id_punto`);

--
-- Indices de la tabla `reunion`
--
ALTER TABLE `reunion`
  ADD PRIMARY KEY (`id_reunion`),
  ADD KEY `id_empresa` (`nombre_empresa`),
  ADD KEY `nombre_empresa` (`nombre_empresa`);

--
-- Indices de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  ADD PRIMARY KEY (`id_reunion`),
  ADD KEY `nombre_empresa` (`nombre_empresa`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`ced_socio`),
  ADD KEY `nombre_empresa` (`nombre_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reunion`
--
ALTER TABLE `reunion`
  MODIFY `id_reunion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  MODIFY `id_reunion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

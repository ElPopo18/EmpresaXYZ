-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 19:33:18
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
(0, 'Empresa XYZ'),
(1, 'Consorcio'),
(4, 'Arturos'),
(5, 'Macdonals');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto`
--

CREATE TABLE `punto` (
  `id_punto` int(65) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `archivo` varchar(25) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `id_reunion` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `color_reunion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

CREATE TABLE `puntos` (
  `id_punto` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `archivo` varchar(25) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `id_reunion` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `color_reunion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunion`
--

CREATE TABLE `reunion` (
  `id_reunion` int(11) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `color_reunion` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reunion`
--

INSERT INTO `reunion` (`id_reunion`, `nombre_empresa`, `descripcion`, `color_reunion`, `fecha_inicio`, `fecha_fin`) VALUES
(17, 'Consorcio', 'Temas', '#DC143C', '2022-11-08', '2022-11-09'),
(19, 'Empresa XYZ', 'Temas', '#8BC34A', '2022-11-17', '2022-11-18'),
(22, 'Arturos', 'pollo', '#FF5722', '2022-11-12', '2022-11-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

CREATE TABLE `reuniones` (
  `id_reunion` int(11) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `color_reunion` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reuniones`
--

INSERT INTO `reuniones` (`id_reunion`, `nombre_empresa`, `descripcion`, `color_reunion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Empresa XYZ', '', '#9c27b0', '2022-11-09', '2022-11-10'),
(2, 'Empresa XYZ', '', '#2196F3', '2022-11-16', '2022-11-17'),
(3, 'L', '', '#FF5722', '2022-11-17', '2022-11-18'),
(4, 'X', '', '#2196F3', '2022-11-11', '2022-11-12'),
(5, 'Consorcio', '', '#FFC107', '2022-11-08', '2022-11-09'),
(6, 'Consorcio', '', '#FFC107', '2022-11-08', '2022-11-09'),
(7, 'Consorcio', '', '#8BC34A', '1970-01-01', '1970-01-02'),
(8, 'Kjhg', '', '#FF5722', '1970-01-01', '1970-01-02'),
(9, 'Kjhg', '', '#2196F3', '1970-01-01', '1970-01-02'),
(10, 'Hgc', '', '#8BC34A', '2022-11-09', '2022-11-10'),
(11, 'Liu', '', '#FF5722', '2022-11-15', '2022-11-16'),
(12, 'Jh', '', '#FF5722', '2022-11-23', '2022-11-24'),
(13, 'Consorcio', 'Sexo', '#DC143C', '2022-11-04', '2022-11-05'),
(14, 'Sexo', 'Anal', '#8BC34A', '2022-11-10', '2022-11-11'),
(15, 'Consorcio', 'Temas', '#8BC34A', '2022-11-03', '2022-11-04'),
(16, 'Consorcio', 'Temas', '#DC143C', '2022-11-03', '2022-11-04'),
(17, 'Empresa XYZ', 'Temas', '#009688', '2022-11-03', '2022-11-04'),
(18, 'Empresa XYZ', 'Temas', '#8BC34A', '2022-11-10', '2022-11-11'),
(19, 'Ewr', 'qew', '#FFC107', '2022-11-17', '2022-11-18'),
(20, 'R', 'wef', '#8BC34A', '2022-11-11', '2022-11-12'),
(21, 'Arturos', 'pollo', '#FF5722', '2022-11-12', '2022-11-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `username` varchar(25) NOT NULL,
  `nombre_soc` varchar(25) NOT NULL,
  `apellido_soc` varchar(25) NOT NULL,
  `ced_socio` int(10) NOT NULL,
  `password` varchar(250) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`username`, `nombre_soc`, `apellido_soc`, `ced_socio`, `password`, `cargo`, `nombre_empresa`, `foto`) VALUES
('Admin', 'Admin', 'Admin', 1234, 'root', 'Administrador', '', '496352447507254886605446890404531050381312n.jpg'),
('Anibal Lopez', 'Anibal', 'Lopez', 28518451, '7', 'Socio', 'Consorcio', '');

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
  ADD PRIMARY KEY (`id_punto`),
  ADD KEY `nombre_empresa` (`nombre_empresa`),
  ADD KEY `id_reunion` (`id_reunion`);

--
-- Indices de la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD PRIMARY KEY (`id_punto`),
  ADD KEY `nombre_empresa` (`nombre_empresa`),
  ADD KEY `id_reunion` (`id_reunion`);

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
  ADD PRIMARY KEY (`username`),
  ADD KEY `nombre_empresa` (`nombre_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `punto`
--
ALTER TABLE `punto`
  MODIFY `id_punto` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `puntos`
--
ALTER TABLE `puntos`
  MODIFY `id_punto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reunion`
--
ALTER TABLE `reunion`
  MODIFY `id_reunion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  MODIFY `id_reunion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

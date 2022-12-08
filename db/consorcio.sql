-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 23:12:29
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
(19, 'Con'),
(20, 'Arturos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto`
--

CREATE TABLE `punto` (
  `id_punto` int(65) NOT NULL,
  `username` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `archivo` text NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `id_reunion` int(11) NOT NULL,
  `fecha_inicio` text NOT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `punto`
--

INSERT INTO `punto` (`id_punto`, `username`, `descripcion`, `archivo`, `nombre_empresa`, `id_reunion`, `fecha_inicio`, `tipo`) VALUES
(26, 'Arturitos', 'Compra de materiales', 'Anibal Lopez.pdf', 'Arturos', 40, '09-12-2022', 'desicion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunion`
--

CREATE TABLE `reunion` (
  `id_reunion` int(11) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `color_reunion` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` text NOT NULL,
  `hora_fin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reunion`
--

INSERT INTO `reunion` (`id_reunion`, `nombre_empresa`, `color_reunion`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`) VALUES
(39, 'Con', '#009688', '2022-12-14', '2022-12-15', '13:00', '14:00'),
(40, 'Arturos', '#FF5722', '2022-12-10', '2022-12-11', '13:00', '14:00'),
(41, 'Con', '#DC143C', '2022-12-10', '2022-12-11', '14:30', '15:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

CREATE TABLE `reuniones` (
  `id_reunion` int(11) NOT NULL,
  `nombre_empresa` varchar(25) NOT NULL,
  `color_reunion` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` text NOT NULL,
  `hora_fin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reuniones`
--

INSERT INTO `reuniones` (`id_reunion`, `nombre_empresa`, `color_reunion`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`) VALUES
(38, 'Con', '#009688', '2022-12-07', '2022-12-08', '13:00', '14:00'),
(39, 'Arturos', '#FF5722', '2022-12-14', '2022-12-15', '13:00', '14:00'),
(40, 'Con', '#DC143C', '2022-12-10', '2022-12-11', '14:30', '15:20');

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
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`username`, `nombre_soc`, `apellido_soc`, `ced_socio`, `password`, `cargo`, `nombre_empresa`, `foto`) VALUES
('Admin', 'Admin', 'Admin', 1234, 'admin', 'Administrador', '', 'ab67616d0000b273005ee342f4eef2cc6e8436ab.jpg'),
('Anibal Lopez', 'Anibal', 'Lopez', 28518451, '7', 'Socio', 'Con', 'ab67616d0000b2732fbd77033247e889cb7d2ac4.jpg'),
('Arturitos', 'Artu', 'Ros', 789, 'abc', 'Socio', 'Arturos', ''),
('Elpopo', 'Luis', 'Rojas', 28530846, 'rojas', 'Socio', 'KMWimport', 'bad_bunny_yhlqmdlg-portada.jpg'),
('jesust', 'Jesus', 'Toussaint', 28031702, '12345', 'Socio', 'Jhonson & Jhonson', NULL);

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
  ADD KEY `id_reunion` (`id_reunion`),
  ADD KEY `username` (`username`);

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
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `punto`
--
ALTER TABLE `punto`
  MODIFY `id_punto` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `reunion`
--
ALTER TABLE `reunion`
  MODIFY `id_reunion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  MODIFY `id_reunion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2022 a las 10:38:45
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
  `id` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `ced_socio` int(10) NOT NULL,
  `nombre_soc` varchar(25) NOT NULL,
  `apellido_soc` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto`
--

CREATE TABLE `punto`  (
  `id_punto` int(65) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `descision` varchar(25) NOT NULL,
  `archivo` varchar(25)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reunion`
--

CREATE TABLE `reunion`  (
  `id_reunion` int(25) NOT NULL,
  `id_punto` int(30) NOT NULL,
  `fecha` datetime  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_has_punto`
--

CREATE TABLE `socio_has_punto`  (
  `id` int(25) NOT NULL,
  `id_punto` int(30) NOT NULL,
  `id_socio` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_has_socio`
--

CREATE TABLE `empresa_has_socio`  (
  `id_empresoc` int(25) NOT NULL,
  `id_empresa` int(25) NOT NULL,
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
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`ced_socio`);

--
-- Indices de la tabla `punto`
--
ALTER TABLE `punto`
    ADD PRIMARY KEY (`id_punto`),

--
-- Indices de la tabla `reunion`
--
ALTER TABLE `reunion`
    ADD PRIMARY KEY (`id_reunion`),
    ADD KEY `id_punto` (`id_punto`);

--
-- Indices de la tabla `punto`
--
ALTER TABLE `punto`
    ADD PRIMARY KEY (`id_punto`);
--
-- Indices de la tabla `socio_has_punto`
--
ALTER TABLE `socio_has_punto`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_punto` (`id_punto`),
    ADD KEY `id_socio` (`id_socio`);         
--
-- Indices de la tabla `empresa_has_socio`
--
ALTER TABLE `empresa_has_socio`
    ADD PRIMARY KEY (`id_empresoc`),
    ADD KEY `id_empresa` (`id_empresa`),
    ADD KEY `id_socio` (`id_socio`); 
--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `punto`
--
ALTER TABLE `punto`
  MODIFY `id_punto` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reunion`
--
ALTER TABLE `reunion`
  MODIFY `id_reunion` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `socio_has_punto`
--
ALTER TABLE `socio_has_punto`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_has_socio`
--
ALTER TABLE `socio_has_punto`
  MODIFY `id_empresasoc` int(25) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reunion`
--
ALTER TABLE `reunion`
  ADD CONSTRAINT `reunion_ibfk_1` FOREIGN KEY (`id_punto`) REFERENCES `punto` (`id_punto`);

--
-- Filtros para la tabla `socio_has_punto`
--
ALTER TABLE `socio_has_punto`
  ADD CONSTRAINT `socio_has_punto_ibfk_1` FOREIGN KEY (`id_punto`) REFERENCES `punto` (`id_punto`),
  ADD CONSTRAINT `socio_has_punto_ibfk_2` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`ced_socio`);

--
-- Filtros para la tabla `empresa_has_socio`
--
ALTER TABLE `socio_has_punto`
  ADD CONSTRAINT `empresa_has_socio_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `empresa_has_socio_ibfk_2` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`ced_socio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;






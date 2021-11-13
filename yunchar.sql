-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2021 a las 03:47:48
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yunchara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `unidad` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `comunidad` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `unidad`, `comunidad`) VALUES
(1, 'ASDAS', '22'),
(2, 'DFG', 'DFG'),
(3, 'ASD', 'ASD'),
(4, 'DSF', '22'),
(5, '11', '222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigacion`
--

CREATE TABLE `investigacion` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `materia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(400) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `investigacion`
--

INSERT INTO `investigacion` (`id`, `titulo`, `materia`, `archivo`, `descripcion`, `imagen`) VALUES
(1, 'SDF', 'SDF', '', 'SDFSD', ''),
(2, '222', 'ASDASD', '', 'SDFSD', ''),
(3, '222', 'ASDASD', '', 'SDFSDDFG', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `junta`
--

CREATE TABLE `junta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `id_distrito` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `junta`
--

INSERT INTO `junta` (`id`, `nombre`, `cargo`, `imagen`, `id_distrito`) VALUES
(1, '222', '222', '', 5),
(2, 'SDF', 'Q', '', 5),
(3, '222', '222', '', 5),
(4, 'SDF', 'ERT', '', 5),
(5, '222', '222', '', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(400) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `descripcion`, `imagen`) VALUES
(1, 'SDF', 'DSF', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `materia` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `grado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `id_distrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `nombre`, `materia`, `grado`, `descripcion`, `imagen`, `id_distrito`) VALUES
(1, '222', 'DFG', 'DFG', 'SD', '', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `investigacion`
--
ALTER TABLE `investigacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `junta`
--
ALTER TABLE `junta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_distrito` (`id_distrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `investigacion`
--
ALTER TABLE `investigacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `junta`
--
ALTER TABLE `junta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `id_distrito` FOREIGN KEY (`id_distrito`) REFERENCES `distrito` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

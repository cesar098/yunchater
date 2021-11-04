-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2021 a las 02:33:05
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbtof`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `idadministracion` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`idadministracion`, `nombre`, `foto`, `categoria`) VALUES
(1, 'CESAR RODRIGUEZ', '1558827672.jpg', 'KJSFBSA   JSC MDBHAGFJSHADKN AJDVK JNKJNJVH KJSV KJASDV  AKVCESAR RODRIGUEX PRTEGA'),
(2, 'LUIS', '1562556631.jpg', 'SISTEMAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `usuario`, `password`) VALUES
(5, 'admin', 'admin'),
(1, 'Admin', 'Admin'),
(2, 'admin', 'admin'),
(6, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `dia` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idprofesor` int(11) NOT NULL,
  `hora` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `dia`, `idprofesor`, `hora`) VALUES
(1, 'option1', 9, '15:00:00'),
(2, 'Lunes', 10, '15:00:00'),
(3, 'Martes', 10, '15:00:00'),
(4, 'Lunes', 11, '21:05:00'),
(5, 'Viernes', 11, '19:03:00'),
(6, 'Lunes', 12, 'tarde'),
(7, 'Martes', 12, ''),
(8, 'Lunes', 13, 'mañana'),
(9, 'Martes', 13, ''),
(10, 'Miercoles', 13, ''),
(11, 'Lunes', 15, '2'),
(12, 'Lunes', 15, '2'),
(13, 'Lunes', 15, '2'),
(14, 'Lunes', 18, ''),
(15, 'Lunes', 18, ''),
(16, 'Lunes', 18, ''),
(17, 'Miercoles', 18, ''),
(18, 'Miercoles', 18, ''),
(19, 'Miercoles', 18, ''),
(20, 'Jueves', 18, ''),
(21, 'Jueves', 18, ''),
(22, 'Jueves', 18, ''),
(23, 'Lunes', 19, 'mañana'),
(24, 'Lunes', 19, ''),
(25, 'Lunes', 19, ''),
(26, 'Martes', 19, 'tarde'),
(27, 'Martes', 19, ''),
(28, 'Martes', 19, ''),
(29, 'Miercoles', 19, 'mañana y tarde'),
(30, 'Miercoles', 19, ''),
(31, 'Miercoles', 19, ''),
(32, 'Lunes', 20, 'mañana y tarde'),
(33, 'Lunes', 20, ''),
(34, 'Lunes', 20, ''),
(35, 'Martes', 20, 'tarde'),
(36, 'Martes', 20, ''),
(37, 'Martes', 20, ''),
(38, 'Miercoles', 20, 'mañana'),
(39, 'Miercoles', 20, ''),
(40, 'Miercoles', 20, ''),
(41, 'Lunes', 21, ''),
(42, 'Lunes', 21, ''),
(43, 'Lunes', 21, ''),
(44, 'Lunes', 22, ''),
(45, 'Lunes', 22, ''),
(46, 'Lunes', 22, ''),
(47, 'Miercoles', 22, ''),
(48, 'Miercoles', 22, ''),
(49, 'Miercoles', 22, ''),
(50, 'Lunes', 24, ''),
(51, 'Viernes', 24, ''),
(52, 'Lunes', 25, ''),
(53, 'Viernes', 25, ''),
(54, 'Lunes', 26, ''),
(55, 'Martes', 26, ''),
(56, 'Lunes', 27, ''),
(57, 'Martes', 27, ''),
(58, 'Jueves', 27, ''),
(59, 'Lunes', 28, 'tarde'),
(60, 'Jueves', 28, ''),
(61, 'Lunes', 29, 'tarde'),
(62, 'Martes', 29, 'tarde'),
(63, 'Jueves', 29, 'tarde'),
(64, 'Lunes', 30, 'mañana'),
(65, 'Martes', 30, 'martes'),
(66, 'Jueves', 30, 'martes'),
(67, 'Lunes', 31, 'mañana y tarde'),
(68, 'Martes', 31, 'mañana y tarde'),
(69, 'Viernes', 31, ''),
(70, 'Lunes', 32, 'mañana y tarde'),
(71, 'Martes', 32, 'mañana y tarde'),
(72, 'Jueves', 32, 'mañana y tarde'),
(73, 'Lunes', 33, 'mañana y tarde'),
(74, 'Martes', 33, 'mañana y tarde'),
(75, 'Miercoles', 33, 'mañana y tarde'),
(76, 'Lunes', 34, 'mañana y tarde'),
(77, 'Martes', 34, 'mañana y tarde'),
(78, 'Miercoles', 34, 'mañana y tarde'),
(79, 'Martes', 35, ''),
(80, 'Miercoles', 35, ''),
(81, 'Lunes', 36, 'mañana'),
(82, 'Viernes', 36, ''),
(83, 'Lunes', 37, 'mañana'),
(84, 'Viernes', 37, ''),
(85, 'Lunes', 38, 'mañana'),
(86, 'Viernes', 38, ''),
(87, '', 38, ''),
(88, 'Lunes', 39, 'mañana'),
(89, 'Viernes', 39, ''),
(90, 'Lunes', 40, ''),
(91, 'Viernes', 40, 'mañana'),
(92, 'Lunes', 41, 'mañana y tarde'),
(93, 'Jueves', 41, 'mañana'),
(94, 'Viernes', 41, 'mañana'),
(95, 'Lunes', 42, 'mañana y tarde'),
(96, 'Jueves', 42, 'mañana y tarde'),
(97, 'Viernes', 42, 'tarde'),
(98, 'Martes', 43, 'mañana y tarde'),
(99, 'Miercoles', 43, 'mañana y tarde'),
(100, 'Viernes', 43, 'tarde'),
(101, 'Lunes', 44, 'mañana y tarde'),
(102, 'Miercoles', 44, 'mañana y tarde'),
(103, 'Viernes', 44, 'tarde'),
(104, 'Lunes', 45, 'mañana y tarde'),
(105, 'Miercoles', 45, 'mañana y tarde'),
(106, 'Viernes', 45, 'tarde'),
(107, 'Lunes', 46, 'mañana y tarde'),
(108, 'Miercoles', 46, 'mañana y tarde'),
(109, 'Viernes', 46, 'mañana'),
(110, 'Lunes', 47, 'mañana y tarde'),
(111, 'Miercoles', 47, 'mañana y tarde'),
(112, 'Viernes', 47, 'mañana'),
(113, 'Viernes', 48, 'tarde'),
(114, 'Miercoles', 49, 'mañana'),
(115, 'Viernes', 49, 'tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idlibro` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `archivo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `foto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `idmateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idlibro`, `nombre`, `archivo`, `foto`, `idmateria`) VALUES
(7, 'LUIS1', '', '1563042959.jpg', 0),
(8, 'RWE', '317a83807845f7e275195a008fcdca7f.jpg.qce', '1563043207.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idmateria`, `nombre`) VALUES
(1, 'SFDS'),
(2, 'CESAR'),
(3, 'OTRT'),
(4, 'SLKDF'),
(0, 'ASD'),
(0, ''),
(0, 'EQW'),
(0, 'WWW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `idnoticia` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`idnoticia`, `nombre`, `foto`, `descripcion`) VALUES
(1, 'PROOMO', '1562557867.jpg', '20392=1AGSHFDJSH'),
(2, 'PERIDD', '1562557136.jpg', 'ADS6RR'),
(0, 'WW', '1569020355.jpg', 'EE'),
(0, 'WW', '1569020370.JPG', 'EE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idprofesor` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `seccion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idprofesor`, `nombre`, `foto`, `seccion`) VALUES
(2, 'LUIS', '1557447917.jpg', 'CESAR IPODPOAIS'),
(3, 'CESAR', '1557944204.png', 'SDJGFJ200'),
(4, 'QWEQ', '1557950222.jpg', 'ASDASDASD'),
(5, 'CESAR', '1557964908.jpg', 'BVBGFH'),
(6, 'AKJADSJ', '1558468771.jpg', 'NJSNVSNDS'),
(7, 'JSKLKAKLA', '1558468806.jpg', 'KLADKDKLV'),
(9, 'LUIS', '1559102748.jpg', 'ADFASDFSDF'),
(10, 'CESAR ORIDFOFOS', '1559174522.jpg', 'KJSDBFMSAGDBNM'),
(11, 'YOYO', '1559174729.jpg', 'LOOSLOLOSS'),
(12, 'CESARAS', '1559856787.jpg', 'INSENDIARANS'),
(13, 'RODOLFO', '1559857142.jpg', 'GARSARTSA'),
(14, 'PEDRIRO', '1559857715.jpg', 'VASBASNASD,MA'),
(15, 'KJDSF', '1559857819.jpg', 'SKDJFS'),
(16, 'KWU', '1559857958.jpg', 'KJDSFHKJ'),
(17, 'UYFK', '1559858102.jpg', 'KEYRKWU`'),
(18, 'KUFIWUE', '1559858252.jpg', 'WKEHRFKDH'),
(19, 'KKGKJDSH``HJ`', '1559858832.jpg', 'KJFJ'),
(20, 'ASDSJH', '1559859154.jpg', 'KJKJDSFHJH'),
(21, 'DC,', '', 'SKDFNZCXC'),
(22, 'JHDWFHJ', '1559859299.jpg', 'KJHKFHDSFSK'),
(23, 'WEKK`', '1559859492.jpg', 'SKDHFKJ'),
(24, 'KJD', '1559859662.jpg', 'HKJHFKSJ'),
(25, 'KDDHFK', '1559859825.jpg', 'YTUY'),
(26, 'SDV', '', 'DSFSD'),
(27, '54', '1560116540.jpg', 'RGFG'),
(28, 'SDF', '', 'SDF'),
(29, 'DGG', '1560116717.jpg', 'GDGFD'),
(30, 'DD', '', 'DDS'),
(31, 'VACM0S', '1560117271.jpg', 'POR FAVOR'),
(32, 'RGER', '', 'TETRER'),
(33, 'TRY', '1560118309.jpg', 'ERYTRT'),
(34, 'DGDG', '1560118338.jpg', 'DFGDFGD'),
(35, 'CR', '', 'RERE'),
(36, 'FREF', '1562162879.jpg', 'FEFRE'),
(37, 'MJ', '', 'SPIDER'),
(38, 'FDFGDF', '', 'SDFS'),
(39, 'FGB', '1562163402.jpg', 'GFHF'),
(40, 'WQW', '1562163463.jpg', 'QWE'),
(41, 'WQE', '1562163592.jpg', 'EWR'),
(42, 'QWE', '1562163684.jpg', 'QWERT'),
(43, 'CEDSAR', '', 'DESDSE'),
(44, 'DWED', '1562164353.jpg', 'DEDS'),
(45, 'ERE', '1562164387.jpg', 'EWRT'),
(46, 'PREUBER', '1562164504.jpeg', 'PRUBEA3'),
(47, 'GH', '1562164533.jpg', 'HHGH'),
(48, 'GRE', '1563891826.jpg', 'ERTRET'),
(49, 'ERG', '1562164931.jpg', 'GEFG'),
(50, 'LUIS CESAR RODRIGUEZ', '1563891804.jpg', 'ASD'),
(51, '1 AND USER_NAME() = \'DBO\'', '', '1 AND USER_NAME() = \'DBO\'');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idprofesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idprofesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

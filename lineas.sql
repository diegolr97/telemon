-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2018 a las 23:53:28
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lineas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo`
--

CREATE TABLE `consumo` (
  `idConsumo` int(11) NOT NULL,
  `idLinea` int(11) NOT NULL,
  `consumo` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `idLinea` int(11) NOT NULL,
  `telefonoL` int(9) NOT NULL,
  `telefonoC` int(3) NOT NULL,
  `enUso` varchar(45) NOT NULL,
  `disponible` varchar(45) NOT NULL,
  `fechaInicioLinea` date NOT NULL,
  `fechaFinLinea` date DEFAULT NULL,
  `tarifa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`idLinea`, `telefonoL`, `telefonoC`, `enUso`, `disponible`, `fechaInicioLinea`, `fechaFinLinea`, `tarifa`) VALUES
(24, 4, 4, 'Si', 'No', '2018-02-12', NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineapersona`
--

CREATE TABLE `lineapersona` (
  `idLineaPersona` int(11) NOT NULL,
  `idLinea` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `activo` varchar(45) NOT NULL,
  `fAlta` date NOT NULL,
  `fBaja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineapersona`
--

INSERT INTO `lineapersona` (`idLineaPersona`, `idLinea`, `idPersona`, `activo`, `fAlta`, `fBaja`) VALUES
(3, 24, 11, 'Si', '2018-02-12', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loguin`
--

CREATE TABLE `loguin` (
  `usuario` varchar(50) NOT NULL,
  `clave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `loguin`
--

INSERT INTO `loguin` (`usuario`, `clave`) VALUES
('pedro', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `idObservacion` int(11) NOT NULL,
  `idLinea` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`idObservacion`, `idLinea`, `descripcion`, `fecha`) VALUES
(4, 24, 'uy', '2018-02-12'),
(5, 24, 'iu', '2018-02-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `nombre`) VALUES
(11, 'i'),
(12, 'hola');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consumo`
--
ALTER TABLE `consumo`
  ADD PRIMARY KEY (`idConsumo`),
  ADD KEY `idLinea` (`idLinea`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`idLinea`);

--
-- Indices de la tabla `lineapersona`
--
ALTER TABLE `lineapersona`
  ADD PRIMARY KEY (`idLineaPersona`,`idLinea`,`idPersona`),
  ADD KEY `idLine2` (`idLinea`),
  ADD KEY `idPerson2` (`idPersona`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`idObservacion`),
  ADD KEY `idLin` (`idLinea`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consumo`
--
ALTER TABLE `consumo`
  MODIFY `idConsumo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
  MODIFY `idLinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `lineapersona`
--
ALTER TABLE `lineapersona`
  MODIFY `idLineaPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `idObservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consumo`
--
ALTER TABLE `consumo`
  ADD CONSTRAINT `idLinea` FOREIGN KEY (`idLinea`) REFERENCES `linea` (`idLinea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lineapersona`
--
ALTER TABLE `lineapersona`
  ADD CONSTRAINT `idLine2` FOREIGN KEY (`idLinea`) REFERENCES `linea` (`idLinea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idPerson2` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `idLin` FOREIGN KEY (`idLinea`) REFERENCES `linea` (`idLinea`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2018 a las 03:21:13
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `curso_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `salario` decimal(15,2) NOT NULL,
  `contacto` varchar(15) NOT NULL,
  `rol` int(10) NOT NULL,
  `sexo` char(2) NOT NULL DEFAULT 'm',
  `fecha_ingreso` date NOT NULL,
  `estado` varchar(2) NOT NULL DEFAULT 'a',
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `salario`, `contacto`, `rol`, `sexo`, `fecha_ingreso`, `estado`, `usuario`, `clave`) VALUES
(1, 'manuel', '50000.00', '8095528475', 1, 'm', '2018-06-12', 'a', '', ''),
(2, 'federico', '15000.00', '8095528476', 5, 'm', '2018-06-12', 'a', '', ''),
(3, 'Ronny Perez', '20000.00', '8094573211', 3, 'm', '2018-06-12', 'a', 'rperez', '123'),
(4, 'ALBERTO', '15000.00', '8095698899', 4, 'M', '2018-06-12', 'a', 'manolo', 'abc123'),
(5, 'josefina', '10000.00', '8097541236', 2, 'f', '2018-06-12', 'a', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `estado`) VALUES
(1, 'administrador', 'A'),
(2, 'cocinero', 'A'),
(3, 'asistente', 'A'),
(4, 'tecnico', 'A'),
(5, 'limpieza', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

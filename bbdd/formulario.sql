-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-12-2022 a las 00:57:06
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formulario`
--
CREATE DATABASE IF NOT EXISTS `formulario` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `formulario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombre`, `telefono`, `email`, `mensaje`) VALUES
(72, '', '123432123', 'maria@gmail.com', 'hola'),
(73, '', '123432123', 'maria@gmail.com', 'hola'),
(74, '', '123432123', 'maria@gmail.com', 'hola'),
(75, '', '234123654', 'vega@gmail.com', 'hola'),
(76, '', '234123654', 'vega@gmail.com', 'hola'),
(77, '', '234123654', 'vega@gmail.com', 'hola'),
(78, '', '345231543', 'perez@gmail.com', 'perez'),
(79, '', '345231543', 'perez@gmail.com', 'perez'),
(80, '', '123432154', 'JUAN@GMAIL.COM', 'hola'),
(81, '', '123432154', 'JUAN@GMAIL.COM', 'hola'),
(82, 'juan', '123432154', 'JUAN@GMAIL.COM', 'hola'),
(83, 'luis', '236543123', 'luis@gmail.com', 'hola, mundo!'),
(84, '', '', '', ''),
(85, '', '', '', ''),
(86, '', '', '', ''),
(87, '', '', '', ''),
(88, '', '', '', ''),
(89, '', '', '', ''),
(90, '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

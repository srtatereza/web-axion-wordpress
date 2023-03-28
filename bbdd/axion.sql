-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-12-2022 a las 14:31:49
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
-- Base de datos: `axion`
--
CREATE DATABASE IF NOT EXISTS `axion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `axion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` int(11) NOT NULL,
  `duracion` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` text NOT NULL,
  `codigo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `precio`, `duracion`, `descripcion`, `imagen`, `codigo`) VALUES
(1, 'Diseño Web y SEO', 2000, 6, 'Nuestros expertos en diseño estudian tu empresas para darle tu personalidad y carácter y que tus clientes encuentren el sitio que necesitan y que se sientan cómodos en su experiencia.', '../product-images/servicio1.jpg', '0120'),
(2, 'Comercio Electrónico', 2000, 12, 'Vende tus productos y/o servicios sin fronteras. Tu tienda abierta 24 horas y totalmente actualizada.En este mundo donde los diferentes dispositivos están a la orden del día.', '../product-images/servicio2.jpg', '0121'),
(3, 'Redes Sociales', 2500, 9, 'Mantén el contacto con tus clientes potenciales y fideliza a tu cartera con una comunicación fluida y llena de interés.Para ser encontrado, es necesario que los buscadores te conozcan. ', '../product-images/servicio3.jpg', '0122'),
(4, 'Gestión de Clientes CRM', 4000, 6, 'Nuestros expertos estudian tu negocio o empresa para digitalizar y optimizar la relación comercial con tus clientes a través de sistemas CRM donde gestionar ofertas, promociones, acciones comerciales de todo tipo.', '../product-images/servicio4.jpg', '0123'),
(5, 'Oficina Virtual', 2000, 12, 'Haz que tus empleados trabajen en un entorno compartido con las mejores herramientas del mercado.Para ser encontrado, es necesario que los buscadores te conozcan. Una web profesional es la mejor tarjeta de presentación de tu negocio ', '../product-images/servicio5.jpg', '0124'),
(6, 'Gestión de Procesos ERP', 6000, 6, 'Haz que tus empleados trabajen en un entorno compartido con las mejores herramientas del mercado.Para ser encontrado, es necesario que los buscadores te conozcan. Una web profesional es la mejor tarjeta de presentación de tu negocio ', '../product-images/servicio6.jpg', '0125'),
(7, 'Comunicaciones Seguras', 4000, 12, 'Nuestra área técnica en voz y datos  ofrece a nuestros clientes soluciones de conectividad en un mismo puesto de trabajo para conectar ordenadores, impresoras, servidores para la ejecución de su actividad. Para ser encontrado, es necesario te conozcan. ', '../product-images/servicio7.jpg', '0126'),
(8, 'Ciberseguridad', 6000, 12, 'Ofrecemos soluciones para empresas de cualquier tamaño de empresa. Cada una de ellas está especialmente diseñada para enfrentarse a los retos únicos de cada mercado. Para ser encontrado, es necesario que los buscadores te conozcan. ', '../product-images/servicio8.jpg', '0127'),
(9, 'Facturación electronica', 2000, 6, 'La automatización de estos procesos y poder emitir un número ilimitado de facturas ayudarán a la mejora de tu sistema de facturación y contabilidad. Para ser encontrado, es necesario que los buscadores te conozcan. ', '../product-images/servicio9.jpg', '0128');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `telefono` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `telefono`) VALUES
(3, 'leo', 'perez', 'leo@gmail.com', '$2y$08$16708386266396f9626bauhYPYOhAhgALrQp7rCzY8bWOebonUPgq', '456345342'),
(4, 'abril', 'perez', 'abril@perez.es', '$2y$08$16708386796396f997d6bucryYXmosF/bhlhsB0O7Yi6VM3FyZNLO', '123432123'),
(5, '', '', '', '$2y$08$16708421746397073e37aOcG6d/SpbDnC0Sy7Zcf.Hh21KJMKcp0C', ''),
(6, 'tere', 'perez', 'tereza@perez.es', '$2y$08$167084366163970d0da67uxlvbn4Xmt7Buh4NZtLg0P40X2qHoXiu', '123456543'),
(7, 'david', 'vega', 'davidvega@gmail.com', '$2y$08$1671053596639a411c877u8CjbvRedkU9bPsyzGohlZ9Td14Nswf.', '123654345'),
(8, 'maria', 'perez', 'maria@gmail.com', '$2y$08$1671054830639a45ee979ubjen/4QOfaSR5o0CWxSYJJuWVN6Mzxm', '123543'),
(9, 'rafael', 'perez', 'rafael@gmail.com', '$2y$08$1671136919639b8697dbcOhelR7sUMHJuaa.ERKiGrd77js/14O0C', '123432134'),
(10, 'adam', 'perez', 'ADAM@GMAIL.COM', '$2y$08$1671191335639c5b273f6uZFq1acTOYmndIW1.qyW1FZaavtRcxD6', '567435123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_has_servicios`
--

CREATE TABLE `usuarios_has_servicios` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `servicios_id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios_has_servicios`
--

INSERT INTO `usuarios_has_servicios` (`id`, `usuarios_id`, `servicios_id`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 3, 3, '2000-01-01', '2000-01-01'),
(2, 5, 3, '2022-12-15', '1970-01-01'),
(3, 8, 3, '2022-12-16', '1970-01-01'),
(4, 8, 3, '2022-12-16', '1970-01-01'),
(5, 8, 1, '2022-12-16', '1970-01-01'),
(6, 8, 9, '2022-12-16', '1970-01-01'),
(7, 8, 3, '2022-12-16', '1970-01-01'),
(8, 8, 1, '2022-12-16', '1970-01-01'),
(9, 8, 9, '2022-12-16', '1970-01-01'),
(10, 8, 3, '2022-12-16', '1970-01-01'),
(11, 8, 1, '2022-12-16', '1970-01-01'),
(12, 8, 9, '2022-12-16', '1970-01-01'),
(13, 8, 3, '2022-12-16', '1970-01-01'),
(14, 8, 1, '2022-12-16', '1970-01-01'),
(15, 8, 9, '2022-12-16', '1970-01-01'),
(16, 8, 3, '2022-12-16', '1970-01-01'),
(17, 8, 1, '2022-12-16', '1970-01-01'),
(18, 8, 9, '2022-12-16', '1970-01-01'),
(19, 8, 3, '2022-12-16', '1970-01-01'),
(20, 8, 1, '2022-12-16', '1970-01-01'),
(21, 8, 9, '2022-12-16', '1970-01-01'),
(22, 8, 9, '2022-12-16', '1970-01-01'),
(23, 5, 8, '2022-12-16', '1970-01-01'),
(24, 10, 6, '2022-12-16', '1970-01-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indices de la tabla `usuarios_has_servicios`
--
ALTER TABLE `usuarios_has_servicios`
  ADD PRIMARY KEY (`id`,`usuarios_id`,`servicios_id`),
  ADD KEY `fk_usuarios_has_servicios_servicios1_idx` (`servicios_id`),
  ADD KEY `fk_usuarios_has_servicios_usuarios_idx` (`usuarios_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios_has_servicios`
--
ALTER TABLE `usuarios_has_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios_has_servicios`
--
ALTER TABLE `usuarios_has_servicios`
  ADD CONSTRAINT `fk_usuarios_has_servicios_servicios1` FOREIGN KEY (`servicios_id`) REFERENCES `servicios` (`id`),
  ADD CONSTRAINT `fk_usuarios_has_servicios_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2017 a las 04:45:58
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `turno` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `clave` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechaCreacion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `turno`, `clave`, `mail`, `perfil`, `fechaCreacion`, `foto`) VALUES
(1, 'augusto', 'morelli', 'mañana', '2682', 'admin@admin', 'admin', '03/11/17', 'mifoto'),
(5, 'nombre2', 'apellido2', 'tarde', 'clave2', 'emp2@gmail', 'empleado', '01/02/2017', 'mifoto2'),
(6, 'nombre3', 'apellido3', 'mañana', 'clave3', 'emp3@gmail', 'empleado', '03/04/2017', 'mifoto3'),
(7, 'nombre4', 'apellido4', 'tarde', 'clave4', 'emp4@gmail', 'empleado', '17/02/2017', 'mifoto4'),
(8, 'nombre5', 'apellido5', 'tarde', 'clave5', 'emp5@gmail', 'empleado', '1/01/17', './fotos/nombre5apellido5.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

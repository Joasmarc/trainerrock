-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-09-2021 a las 09:48:39
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

CREATE DATABASE verificador_asistencia;
USE verificador_asistencia;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `verificador_asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(7) NOT NULL,
  `idStudent` int(7) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `idStudent`, `name`, `lastName`, `fecha`) VALUES
(1, 2, 'Gerald', 'De Rivia', '2021-09-02 09:31:16'),
(2, 2, 'Gerald', 'De Rivia', '2021-09-02 09:31:25'),
(3, 2, 'Gerald', 'De Rivia', '2021-09-02 09:31:37'),
(4, 2, 'Gerald', 'De Rivia', '2021-09-02 09:31:44'),
(5, 5, 'Dwayne', 'Jhonson', '2021-09-02 09:37:57'),
(6, 5, 'Dwayne', 'Jhonson', '2021-09-02 09:38:10'),
(7, 5, 'Dwayne', 'Jhonson', '2021-09-02 09:38:18'),
(8, 5, 'Dwayne', 'Jhonson', '2021-09-02 09:38:25'),
(9, 5, 'Dwayne', 'Jhonson', '2021-09-02 09:38:33'),
(10, 5, 'Dwayne', 'Jhonson', '2021-09-02 09:38:40'),
(11, 4, 'Steve', 'Rogers', '2021-09-02 09:41:32'),
(12, 5, 'Dwayne', 'Jhonson', '2021-09-02 09:42:02'),
(13, 2, 'Gerald', 'De Rivia', '2021-09-02 09:44:54'),
(14, 4, 'Steve', 'Rogers', '2021-09-02 09:47:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(7) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `user`, `pass`) VALUES
(1, 'jose', '$2y$10$1Ny8G0ukcx5I6jefh8zTmOn5ziVS8q8O9CmfmvAZlR90ojfyMQb/.'),
(2, 'the witcher', '$2y$10$AIWptSVHP03yRkCg4qfgxO6ENhB9buvcctj7m1WF1l765ioAQgqiq'),
(3, 'hulk', '$2y$10$I7eyPqLN3qSvYRuOXiy75eTIOmNCmttRlTB/LXFZIFzZZDonSb9rq'),
(4, 'america', '$2y$10$WYnKz.RwEZg6gNw5ZDKUY.HKVrM/9UX0oVM.CBzeo.my0ZaXkaYp6'),
(5, 'the rock', '$2y$10$tLVZxoxPd.yR1881Ei.wTuwCxgQDWj4Ir4tEFAmxgZShpufoGvOsq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(7) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `qr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `cedula`, `telefono`, `tipo`, `qr`) VALUES
(1, 'Jose', 'Quijada', '20782407', '573103840526', 'Entrenador', '../qr/1.png'),
(2, 'Gerald', 'De Rivia', '0000002', '0', 'Estudiante', '../qr/2.png'),
(3, 'Bruce', 'Banner', '48618651', '16811681861', 'Estudiante', '../qr/3.png'),
(4, 'Steve', 'Rogers', '00000023', '12312313', 'Estudiante', '../qr/4.png'),
(5, 'Dwayne', 'Jhonson', '123123', '123123', 'Estudiante', '../qr/5.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

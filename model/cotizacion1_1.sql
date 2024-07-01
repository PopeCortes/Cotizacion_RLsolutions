-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2024 a las 07:19:48
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cotizacion1.1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta1`
--

CREATE TABLE `carpeta1` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carpeta1`
--

INSERT INTO `carpeta1` (`id`, `nombre`) VALUES
(18, 'Rassini'),
(19, 'Littelfuse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` bigint(20) NOT NULL,
  `priv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `priv`) VALUES
(1, 'lector'),
(2, 'admin'),
(3, 'prohibir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `hora` time NOT NULL DEFAULT current_timestamp(),
  `idUser` bigint(20) NOT NULL,
  `idSubcarpeta` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id`, `nombre`, `fecha`, `hora`, `idUser`, `idSubcarpeta`) VALUES
(1, 'Archivo 123', '2024-06-20', '00:00:00', 2, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcarpeta`
--

CREATE TABLE `subcarpeta` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idCarpeta` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subcarpeta`
--

INSERT INTO `subcarpeta` (`id`, `nombre`, `idCarpeta`) VALUES
(12, 'Jeoban Mendez', 18),
(13, 'Vitali Villegas', 18),
(14, 'Roberto Leija', 18),
(15, 'Diego Cortes', 19),
(16, 'José Fernando Herrera ', 19),
(17, 'Luis Fernando', 18),
(18, 'José Luis Martinez', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilegio` varchar(30) NOT NULL,
  `idConfig` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `apellido`, `usuario`, `password`, `privilegio`, `idConfig`) VALUES
(2, 'Diego', 'Cortes', 'pope', '123', 'Admin', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carpeta1`
--
ALTER TABLE `carpeta1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idSubcarpeta` (`idSubcarpeta`);

--
-- Indices de la tabla `subcarpeta`
--
ALTER TABLE `subcarpeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCarpeta` (`idCarpeta`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idConfig` (`idConfig`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carpeta1`
--
ALTER TABLE `carpeta1`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subcarpeta`
--
ALTER TABLE `subcarpeta`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `contenido_ibfk_2` FOREIGN KEY (`idSubcarpeta`) REFERENCES `subcarpeta` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcarpeta`
--
ALTER TABLE `subcarpeta`
  ADD CONSTRAINT `subcarpeta_ibfk_1` FOREIGN KEY (`idCarpeta`) REFERENCES `carpeta1` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idConfig`) REFERENCES `config` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

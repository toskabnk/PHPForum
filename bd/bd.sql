-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2023 a las 23:01:13
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
-- Base de datos: `phpforum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `mensajeId` int(11) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `postId` int(11) NOT NULL,
  `respuestaMensajeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`mensajeId`, `mensaje`, `userId`, `postId`, `respuestaMensajeId`) VALUES
(1, 'En Youtube hay muchos tutoriales, empieza por ahi antes de preguntar', 2, 1, NULL),
(2, 'Asi no me ayudas :(', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `postId` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `temaId` int(11) NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`postId`, `titulo`, `mensaje`, `temaId`, `userId`) VALUES
(1, 'Nuevo en Arduino', 'Ayuda plsssss', 1, 1),
(2, 'Como encender un led', 'Como puedo encender un led con un Arduino', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `temaId` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`temaId`, `nombre`) VALUES
(1, 'Arduino'),
(3, 'ESP8266'),
(4, 'ESP32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `userId` int(10) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`userId`, `nombre_usuario`, `contrasenia`, `rol`, `nombre`, `apellidos`, `email`) VALUES
(1, 'SrToska', 'f80812a241d2f679702f36081555694e', 'admin', 'Antonio', 'de la Rosa', 'test@gmail.com'),
(2, 'Test', 'f80812a241d2f679702f36081555694e', 'user', 'test', 'test', 'test@test.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`mensajeId`),
  ADD KEY `FK_usarioIdMensaje` (`userId`),
  ADD KEY `FK_mensajeAnterior` (`respuestaMensajeId`),
  ADD KEY `FK_postIdMensaje` (`postId`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `FK_temaId` (`temaId`),
  ADD KEY `FK_usarioId` (`userId`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`temaId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `mensajeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `temaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `FK_mensajeAnterior` FOREIGN KEY (`respuestaMensajeId`) REFERENCES `mensajes` (`mensajeId`),
  ADD CONSTRAINT `FK_postIdMensaje` FOREIGN KEY (`postId`) REFERENCES `publicaciones` (`postId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usarioIdMensaje` FOREIGN KEY (`userId`) REFERENCES `usuarios` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `FK_temaId` FOREIGN KEY (`temaId`) REFERENCES `temas` (`temaId`),
  ADD CONSTRAINT `FK_usarioId` FOREIGN KEY (`userId`) REFERENCES `usuarios` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

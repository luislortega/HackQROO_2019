-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2019 a las 10:04:07
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seijuve`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `id_instituciones` int(11) NOT NULL,
  `nombre_institucion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_institucion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `imagen_institucion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `usuario_institucion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `password_institucion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`id_instituciones`, `nombre_institucion`, `descripcion_institucion`, `imagen_institucion`, `usuario_institucion`, `password_institucion`) VALUES
(1, 'Sociedad de ¿Me perdonas?', 'Es para perdonar a Magggy de Bootstrap', 'https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/012015/bootstrap.png', 'meperdonas', 'meperdonas'),
(3, 'Sociedad de Pescadores', 'Sociedad de Pescadores', 'https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/012015/bootstrap.png', 'dianita6', 'dianita6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` int(11) NOT NULL,
  `nombre_programa` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_programa` longtext COLLATE utf8_spanish_ci NOT NULL,
  `carpeta_datos_programa` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `json_datos_programa` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `tag_archivo_programa` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `nombre_programa`, `descripcion_programa`, `carpeta_datos_programa`, `json_datos_programa`, `id_institucion`, `tag_archivo_programa`) VALUES
(1, 'Apoyo para las chelas', 'Apoyo para las chelas', 'www.data.com/datos/ia/datos.api', 'www.data.com/datos/ia/datos.json', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `user_usuario` varchar(145) COLLATE utf8_spanish_ci NOT NULL,
  `password_usuario` varchar(145) COLLATE utf8_spanish_ci NOT NULL,
  `rango_usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user_usuario`, `password_usuario`, `rango_usuario`) VALUES
(1, 'gobernador', '123456', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id_instituciones`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`),
  ADD KEY `fk_programas_instituciones_idx` (`id_institucion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id_instituciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `fk_programas_instituciones` FOREIGN KEY (`id_institucion`) REFERENCES `instituciones` (`id_instituciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

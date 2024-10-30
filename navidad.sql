-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 03:32:14
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
-- Base de datos: `navidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delegados`
--

CREATE TABLE `delegados` (
  `DEL_RUT` varchar(13) NOT NULL,
  `DEL_NOMBRE` varchar(60) NOT NULL,
  `DEL_APELLIDO` varchar(60) NOT NULL,
  `SEX_ID` int(1) NOT NULL,
  `DEL_FECHA_NACIMIENTO` varchar(10) NOT NULL,
  `DEL_DIRECCION` varchar(150) NOT NULL,
  `DEL_TELEFONO_1` varchar(12) NOT NULL,
  `DEL_TELEFONO_2` varchar(12) NOT NULL,
  `DEL_CORREO` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `delegados`
--

INSERT INTO `delegados` (`DEL_RUT`, `DEL_NOMBRE`, `DEL_APELLIDO`, `SEX_ID`, `DEL_FECHA_NACIMIENTO`, `DEL_DIRECCION`, `DEL_TELEFONO_1`, `DEL_TELEFONO_2`, `DEL_CORREO`) VALUES
('18.253.349-1', 'Jonathan', 'Cabello', 1, '1992-11-30', 'Lautaro 1163, Curicó', '54483476', '40051048', 'jcabellone@gmail.com'),
('8.025.441-5', 'Abel Ernesto', 'Cabello', 1, '1958-10-20', 'Lautaro 1163, Curicó', '76498126', '', 'abel_cabello@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juntas_vecinales`
--

CREATE TABLE `juntas_vecinales` (
  `JV_ID` int(3) NOT NULL,
  `JV_NOMBRE` varchar(60) NOT NULL,
  `POB_ID` int(3) NOT NULL,
  `JV_DIRECCION` varchar(150) NOT NULL,
  `DEL_RUT` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juntas_vecinales`
--

INSERT INTO `juntas_vecinales` (`JV_ID`, `JV_NOMBRE`, `POB_ID`, `JV_DIRECCION`, `DEL_RUT`) VALUES
(1, 'JV EL VATICANO', 15, 'AVENIDA LAUTARO 1163, CURICÓ', '18.253.349-1'),
(2, 'JV BOMBERO GARRIDO', 2, 'Lautaro 1163', '8.025.441-5'),
(3, 'Prueba', 2, '', '8.025.441-5'),
(4, 'Prueba 2', 3, 'Prueba Dirección', '18.253.349-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menores`
--

CREATE TABLE `menores` (
  `MEN_RUT` varchar(13) NOT NULL,
  `MEN_NOMBRE` varchar(60) NOT NULL,
  `MEN_APELLIDO` varchar(60) NOT NULL,
  `SEX_ID` int(1) NOT NULL,
  `MEN_FECHA_NACIMIENTO` varchar(10) NOT NULL,
  `MEN_DIRECCION` varchar(150) NOT NULL,
  `JV_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menores`
--

INSERT INTO `menores` (`MEN_RUT`, `MEN_NOMBRE`, `MEN_APELLIDO`, `SEX_ID`, `MEN_FECHA_NACIMIENTO`, `MEN_DIRECCION`, `JV_ID`) VALUES
('18.253.349-1', 'Jonathan', 'Cabello', 1, '1992-11-30', 'Lautaro 1163, Curicó', 1),
('5.487.963-6', 'Prueba', '1', 2, '1992-11-30', 'AVENIDA LAUTARO 1163, CURICÓ', 2),
('7.277.361-6', 'Juana', 'Muñoz', 2, '1951-06-23', 'Lautaro 1163, Curicó', 1),
('79.853.123-9', 'CRISTOBAL', 'FONSECA', 2, '1995-10-31', 'Lautaro 1163', 2),
('8.025.441-5', 'Abel', 'Cabello', 1, '1958-10-20', 'Lautaro 1163, Curicó', 1),
('8.952.365-6', 'JONATHAN', 'ALAMIRO', 1, '1992-11-30', 'Lautaro 1163', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poblaciones`
--

CREATE TABLE `poblaciones` (
  `POB_ID` int(3) NOT NULL,
  `POB_NOMBRE` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `poblaciones`
--

INSERT INTO `poblaciones` (`POB_ID`, `POB_NOMBRE`) VALUES
(1, 'HOLA'),
(2, 'BASTIAN CISTERNAS'),
(3, 'CHAO'),
(4, 'PRUEBA'),
(5, 'PRUEBA 1'),
(6, 'PRUEBA 2'),
(7, 'PRUEBA 3'),
(8, 'PRUEBA 4'),
(9, 'PRUEBA 5'),
(10, 'PRUEBA 6'),
(11, 'PRUEBA 7'),
(12, 'PRUEBA 8'),
(13, 'PRUEBA 9'),
(14, 'PRUEBA 10'),
(15, 'PRUEBA 11'),
(16, 'PRUEBA 12'),
(17, 'VILLA VATICANO'),
(18, 'PRUEBA 13'),
(19, 'PRUEBA 14'),
(20, 'PRUEBA 15'),
(21, 'PRUEBA 16'),
(22, 'PRUEBA 17'),
(23, 'PRUEBA 18'),
(24, 'PRUEBA 19'),
(25, 'PRUEBA 20'),
(26, 'PRUEBA 21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

CREATE TABLE `sexos` (
  `SEX_ID` int(1) NOT NULL,
  `SEX_NOMBRE` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`SEX_ID`, `SEX_NOMBRE`) VALUES
(1, 'MASCULINO'),
(2, 'FEMENINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuarios`
--

CREATE TABLE `tipos_usuarios` (
  `ID` int(1) NOT NULL,
  `TIPO_USUARIO` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_usuarios`
--

INSERT INTO `tipos_usuarios` (`ID`, `TIPO_USUARIO`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'EDITOR'),
(3, 'VISUALIZADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `USUARIO` varchar(20) NOT NULL,
  `CONTRASENA` varchar(40) NOT NULL,
  `NOMBRE` varchar(60) NOT NULL,
  `APELLIDO` varchar(60) NOT NULL,
  `CORREO` varchar(60) NOT NULL,
  `TIPO_USUARIO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `delegados`
--
ALTER TABLE `delegados`
  ADD PRIMARY KEY (`DEL_RUT`),
  ADD KEY `SEXO` (`SEX_ID`);

--
-- Indices de la tabla `juntas_vecinales`
--
ALTER TABLE `juntas_vecinales`
  ADD PRIMARY KEY (`JV_ID`),
  ADD KEY `POBLACION` (`POB_ID`),
  ADD KEY `DELEGADO` (`DEL_RUT`);

--
-- Indices de la tabla `menores`
--
ALTER TABLE `menores`
  ADD PRIMARY KEY (`MEN_RUT`),
  ADD KEY `SEXO` (`SEX_ID`),
  ADD KEY `JUNTA_VECINAL` (`JV_ID`);

--
-- Indices de la tabla `poblaciones`
--
ALTER TABLE `poblaciones`
  ADD PRIMARY KEY (`POB_ID`);

--
-- Indices de la tabla `sexos`
--
ALTER TABLE `sexos`
  ADD PRIMARY KEY (`SEX_ID`);

--
-- Indices de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USUARIO`),
  ADD KEY `TIPO_USUARIO` (`TIPO_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juntas_vecinales`
--
ALTER TABLE `juntas_vecinales`
  MODIFY `JV_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `poblaciones`
--
ALTER TABLE `poblaciones`
  MODIFY `POB_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `sexos`
--
ALTER TABLE `sexos`
  MODIFY `SEX_ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `delegados`
--
ALTER TABLE `delegados`
  ADD CONSTRAINT `delegados_ibfk_1` FOREIGN KEY (`SEX_ID`) REFERENCES `sexos` (`SEX_ID`);

--
-- Filtros para la tabla `juntas_vecinales`
--
ALTER TABLE `juntas_vecinales`
  ADD CONSTRAINT `juntas_vecinales_ibfk_1` FOREIGN KEY (`POB_ID`) REFERENCES `poblaciones` (`POB_ID`),
  ADD CONSTRAINT `juntas_vecinales_ibfk_2` FOREIGN KEY (`DEL_RUT`) REFERENCES `delegados` (`DEL_RUT`);

--
-- Filtros para la tabla `menores`
--
ALTER TABLE `menores`
  ADD CONSTRAINT `menores_ibfk_1` FOREIGN KEY (`SEX_ID`) REFERENCES `sexos` (`SEX_ID`),
  ADD CONSTRAINT `menores_ibfk_2` FOREIGN KEY (`JV_ID`) REFERENCES `juntas_vecinales` (`JV_ID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`TIPO_USUARIO`) REFERENCES `tipos_usuarios` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

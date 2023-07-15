-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2023 a las 18:22:52
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
-- Base de datos: `gym-zona`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id_datos` int(11) NOT NULL,
  `documentos` int(10) NOT NULL,
  `peso` varchar(5) NOT NULL,
  `bmi` varchar(5) NOT NULL,
  `grasa` varchar(5) NOT NULL,
  `musculo` varchar(5) NOT NULL,
  `agua` int(5) NOT NULL,
  `grasa_v` int(2) NOT NULL,
  `hueso` int(2) NOT NULL,
  `metabo` int(6) NOT NULL,
  `proteina` int(5) NOT NULL,
  `obesidad` int(5) NOT NULL,
  `fecha_regi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_venta`
--

CREATE TABLE `det_venta` (
  `id_det_venta` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_productos` bigint(17) NOT NULL,
  `cantidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `id_ejercicio` int(11) NOT NULL,
  `nom_ejercicio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Inactivo'),
(2, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(2) NOT NULL,
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id_medidas` int(11) NOT NULL,
  `doc_cliente` int(10) NOT NULL,
  `pecho` varchar(11) NOT NULL,
  `cintura` varchar(11) NOT NULL,
  `cadera` varchar(11) NOT NULL,
  `brazo_izq` varchar(11) NOT NULL,
  `brazo_der` varchar(11) NOT NULL,
  `fecha_regi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` bigint(17) NOT NULL,
  `cod_producto` bigint(17) NOT NULL,
  `nom_producto` text NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `can_inicial` int(100) NOT NULL,
  `can_final` int(100) DEFAULT NULL,
  `docu_ingre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id_suscripcion` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_venc` date NOT NULL,
  `doc_coach` int(10) NOT NULL,
  `doc_cliente` int(10) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_servicio`
--

CREATE TABLE `tip_servicio` (
  `id_tip_serv` int(11) NOT NULL,
  `servicio` text NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_user`
--

CREATE TABLE `tip_user` (
  `id_tip_user` int(11) NOT NULL,
  `nom_tip_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tip_user`
--

INSERT INTO `tip_user` (`id_tip_user`, `nom_tip_user`) VALUES
(1, 'ADMIN'),
(2, 'COACH'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `documento` int(10) NOT NULL,
  `cod_barras` int(11) NOT NULL,
  `nom_completo` text DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `estatura` varchar(4) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `telefono` bigint(10) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `genero` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`documento`, `cod_barras`, `nom_completo`, `edad`, `estatura`, `fecha_nacimiento`, `tipo_usuario`, `usuario`, `contraseña`, `telefono`, `direccion`, `correo`, `estado`, `genero`) VALUES
(123344, 0, 'JOHAN ROA', 18, '170', '2023-04-05', 1, 'ADMIN', '$2y$14$u3IrLTusJePitl75Oq8P2uGtwYcAas4Ufdgq46ku.G.32Fhw6NDoa', 21321432, 'sadhsad', 'sdjasd', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `doc_coach` int(10) NOT NULL,
  `doc_cliente` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_serv`
--

CREATE TABLE `venta_serv` (
  `id_vent_servi` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `doc_coach` int(10) NOT NULL,
  `doc_cliente` int(10) NOT NULL,
  `id_tip_servi` int(11) NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id_datos`),
  ADD KEY `documento` (`documentos`);

--
-- Indices de la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD PRIMARY KEY (`id_det_venta`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_productos` (`id_productos`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`id_ejercicio`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id_medidas`),
  ADD KEY `doc_cliente` (`doc_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `docu_ingre` (`docu_ingre`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id_suscripcion`),
  ADD KEY `doc_cliente` (`doc_cliente`);

--
-- Indices de la tabla `tip_servicio`
--
ALTER TABLE `tip_servicio`
  ADD PRIMARY KEY (`id_tip_serv`);

--
-- Indices de la tabla `tip_user`
--
ALTER TABLE `tip_user`
  ADD PRIMARY KEY (`id_tip_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `tipo_usuario` (`tipo_usuario`),
  ADD KEY `estado` (`estado`),
  ADD KEY `genero` (`genero`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `doc_coach` (`doc_coach`),
  ADD KEY `doc_cliente` (`doc_cliente`);

--
-- Indices de la tabla `venta_serv`
--
ALTER TABLE `venta_serv`
  ADD PRIMARY KEY (`id_vent_servi`),
  ADD KEY `doc_coach` (`doc_coach`),
  ADD KEY `doc_cliente` (`doc_cliente`),
  ADD KEY `id_tip_servi` (`id_tip_servi`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id_datos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `det_venta`
--
ALTER TABLE `det_venta`
  MODIFY `id_det_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `id_ejercicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id_medidas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` bigint(17) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id_suscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tip_servicio`
--
ALTER TABLE `tip_servicio`
  MODIFY `id_tip_serv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tip_user`
--
ALTER TABLE `tip_user`
  MODIFY `id_tip_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta_serv`
--
ALTER TABLE `venta_serv`
  MODIFY `id_vent_servi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`documentos`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `det_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `det_venta_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD CONSTRAINT `medidas_ibfk_1` FOREIGN KEY (`doc_cliente`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`docu_ingre`) REFERENCES `usuarios` (`documento`);

--
-- Filtros para la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`doc_cliente`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`tipo_usuario`) REFERENCES `tip_user` (`id_tip_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_7` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_8` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_genero`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`doc_coach`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`doc_cliente`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_serv`
--
ALTER TABLE `venta_serv`
  ADD CONSTRAINT `venta_serv_ibfk_1` FOREIGN KEY (`doc_coach`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_serv_ibfk_2` FOREIGN KEY (`doc_cliente`) REFERENCES `usuarios` (`documento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_serv_ibfk_3` FOREIGN KEY (`id_tip_servi`) REFERENCES `tip_servicio` (`id_tip_serv`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

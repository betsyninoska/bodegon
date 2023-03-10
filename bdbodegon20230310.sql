-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-03-2023 a las 01:19:41
-- Versión del servidor: 10.5.18-MariaDB-0+deb11u1
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdbodegon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Fecha_Registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nombre`, `Status`, `Fecha_Registro`) VALUES
(1, 'Alimentos en General', 1, '0000-00-00'),
(2, 'Medicinas y vitaminas', 1, '0000-00-00'),
(3, 'Salsas y condimentos', 1, '0000-00-00'),
(4, 'Dulces y galletas', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierres`
--

CREATE TABLE `cierres` (
  `Id_Cierre` int(11) NOT NULL,
  `Inicio` date NOT NULL,
  `fin` date DEFAULT NULL,
  `Status` tinyint(1) NOT NULL,
  `Fecha_Registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cierres`
--

INSERT INTO `cierres` (`Id_Cierre`, `Inicio`, `fin`, `Status`, `Fecha_Registro`) VALUES
(1, '2023-01-01', NULL, 1, '2023-03-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallem`
--

CREATE TABLE `detallem` (
  `Id_DMedida` int(11) NOT NULL,
  `Id_UMedida` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cantidad_Detalle` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallem`
--

INSERT INTO `detallem` (`Id_DMedida`, `Id_UMedida`, `Nombre`, `Cantidad_Detalle`, `Descripcion`) VALUES
(1, 1, 'Bulto', 20, 'Bulto de harina'),
(2, 3, 'Sixpack', 6, 'Seis latas ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesalida`
--

CREATE TABLE `detallesalida` (
  `Id_detallesalida` int(11) NOT NULL,
  `Id_Entrada` int(11) NOT NULL,
  `Id_Salida` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Fecha_Registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `Id_Empresa` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Rif` varchar(20) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Metodo` int(11) NOT NULL,
  `Logo` varchar(20) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Fecha_Registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`Id_Empresa`, `Nombre`, `Direccion`, `Rif`, `Telefono`, `Metodo`, `Logo`, `Status`, `Fecha_Registro`) VALUES
(1, 'O', 'Caracas', 'O', '04142313150', 0, 'O', 1, '2023-03-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `Id_Entrada` int(11) NOT NULL,
  `id_Proveedor` int(11) NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  `id_tipoentrada` int(11) NOT NULL,
  `Codigo` varchar(8) NOT NULL,
  `Fecha_Entrada` date NOT NULL,
  `Cantidad_entrada` int(11) NOT NULL,
  `Cantidad_existe` int(11) NOT NULL,
  `Precio_compra` double(10,5) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Fecha_Registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`Id_Entrada`, `id_Proveedor`, `Id_Producto`, `id_tipoentrada`, `Codigo`, `Fecha_Entrada`, `Cantidad_entrada`, `Cantidad_existe`, `Precio_compra`, `Status`, `Fecha_Registro`) VALUES
(155, 1, 2, 1, '5656', '2002-01-01', 10, 10, 654.25000, 1, '2023-03-10'),
(163, 1, 3, 2, '5656', '2002-01-01', 1, 1, 10.00000, 1, '2023-03-10'),
(169, 1, 2, 2, '121', '2002-01-01', 100, 100, 654.00000, 1, '2023-03-10'),
(170, 1, 2, 2, '2', '2022-01-01', 500, 500, 10.00000, 1, '2023-03-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Id_Inventario` int(11) NOT NULL,
  `Id_Cierre` int(11) NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  `Cantidad_Inicial` int(11) NOT NULL,
  `Existencia` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Fecha_Registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Id_Inventario`, `Id_Cierre`, `Id_Producto`, `Cantidad_Inicial`, `Existencia`, `Status`, `Fecha_Registro`) VALUES
(10, 1, 2, 10, 610, 1, '2023-03-10'),
(12, 1, 3, 0, 1, 1, '2023-03-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida`
--

CREATE TABLE `medida` (
  `Id_UMedida` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Abreviaturas` varchar(5) NOT NULL,
  `Simbolo_Medida` varchar(3) NOT NULL,
  `Catidad_Medida` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medida`
--

INSERT INTO `medida` (`Id_UMedida`, `Nombre`, `Abreviaturas`, `Simbolo_Medida`, `Catidad_Medida`) VALUES
(1, 'Empaque de un kilogramo', 'EMP', 'KG', '1'),
(2, 'Empaque de 500 gramos', 'EMP', 'g', '500'),
(3, 'Lata', 'LA', 'ml', '350');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_Producto` int(11) NOT NULL,
  `Id_UMedida` int(11) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Imagen` varchar(40) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Id_UMedida`, `Id_Categoria`, `Nombre`, `Descripcion`, `Imagen`, `Status`, `Fecha_registro`) VALUES
(2, 1, 1, 'Mantequilla mavesa ligera', 'Mantequilla ligera mavesa descripción', 'df', 1, '0000-00-00'),
(3, 2, 1, 'Sal marina', 'Sal marina ', '1', 1, '0000-00-00'),
(4, 2, 1, 'Mantequilla mavesa ligera', 'Mantequilla ligera mavesa descripción', 'df', 1, '2023-03-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Id_Proveedor` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `RIF` varchar(10) NOT NULL,
  `Telefono` decimal(10,0) NOT NULL,
  `Ciudad` varchar(40) NOT NULL,
  `Direccion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Id_Proveedor`, `Nombre`, `RIF`, `Telefono`, `Ciudad`, `Direccion`) VALUES
(1, 'IVIC', 'j-52616325', '4142313150', 'Caracas', 'Caracas'),
(2, 'prueba 2', 'j407442971', '22222', 'caracas', 'sdsfsdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `Id_Salida` int(11) NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  `Codigo` varchar(8) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Fecha_Salida` date NOT NULL,
  `Cantidad_Salida` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Fecha_Registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoentrada`
--

CREATE TABLE `tipoentrada` (
  `id_tipoentrada` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Fecha_Registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoentrada`
--

INSERT INTO `tipoentrada` (`id_tipoentrada`, `Nombre`, `Status`, `Fecha_Registro`) VALUES
(1, 'INICIAL', 1, '2023-03-07'),
(2, 'ENTRADA', 1, '2023-03-07'),
(3, 'REPOSICION', 1, '2023-03-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `cierres`
--
ALTER TABLE `cierres`
  ADD PRIMARY KEY (`Id_Cierre`);

--
-- Indices de la tabla `detallem`
--
ALTER TABLE `detallem`
  ADD PRIMARY KEY (`Id_DMedida`,`Id_UMedida`),
  ADD KEY `unidad_medida_detalle_medida_fk` (`Id_UMedida`);

--
-- Indices de la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  ADD PRIMARY KEY (`Id_detallesalida`),
  ADD KEY `salida_detalle_salida_fk` (`Id_Salida`),
  ADD KEY `entrada_detalle_salida_fk` (`Id_Entrada`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Id_Empresa`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`Id_Entrada`),
  ADD KEY `proveedor_entrada_fk` (`id_Proveedor`),
  ADD KEY `producto_entrada_fk` (`Id_Producto`),
  ADD KEY `tipoentrada_entrada_fk` (`id_tipoentrada`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Id_Inventario`),
  ADD KEY `cierres_inventario_fk` (`Id_Cierre`),
  ADD KEY `producto_inventario_fk` (`Id_Producto`);

--
-- Indices de la tabla `medida`
--
ALTER TABLE `medida`
  ADD PRIMARY KEY (`Id_UMedida`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `categoria_producto_fk` (`Id_Categoria`),
  ADD KEY `unidad_medida_producto_fk` (`Id_UMedida`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Id_Proveedor`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`Id_Salida`),
  ADD KEY `producto_salida_fk` (`Id_Producto`);

--
-- Indices de la tabla `tipoentrada`
--
ALTER TABLE `tipoentrada`
  ADD PRIMARY KEY (`id_tipoentrada`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cierres`
--
ALTER TABLE `cierres`
  MODIFY `Id_Cierre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detallem`
--
ALTER TABLE `detallem`
  MODIFY `Id_DMedida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  MODIFY `Id_detallesalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Id_Empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `Id_Entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Id_Inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `medida`
--
ALTER TABLE `medida`
  MODIFY `Id_UMedida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Id_Proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `Id_Salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `tipoentrada`
--
ALTER TABLE `tipoentrada`
  MODIFY `id_tipoentrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallem`
--
ALTER TABLE `detallem`
  ADD CONSTRAINT `unidad_medida_detalle_medida_fk` FOREIGN KEY (`Id_UMedida`) REFERENCES `medida` (`Id_UMedida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  ADD CONSTRAINT `entrada_detalle_salida_fk` FOREIGN KEY (`Id_Entrada`) REFERENCES `entrada` (`Id_Entrada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `salida_detalle_salida_fk` FOREIGN KEY (`Id_Salida`) REFERENCES `salida` (`Id_Salida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `producto_entrada_fk` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `proveedor_entrada_fk` FOREIGN KEY (`id_Proveedor`) REFERENCES `proveedor` (`Id_Proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipoentrada_entrada_fk` FOREIGN KEY (`id_tipoentrada`) REFERENCES `tipoentrada` (`id_tipoentrada`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `cierres_inventario_fk` FOREIGN KEY (`Id_Cierre`) REFERENCES `cierres` (`Id_Cierre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `producto_inventario_fk` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `categoria_producto_fk` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`Id_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unidad_medida_producto_fk` FOREIGN KEY (`Id_UMedida`) REFERENCES `medida` (`Id_UMedida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `producto_salida_fk` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-03-2023 a las 15:27:01
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
-- Estructura para la vista `MovimientoInventario`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `MovimientoInventario`  AS SELECT `t1`.`Id_Entrada` AS `Id_Entrada`, `t1`.`id_Proveedor` AS `id_Proveedor`, `t1`.`id_tipoentrada` AS `id_tipoentrada`, `t1`.`Codigo` AS `Codigo`, `t1`.`Fecha_Entrada` AS `Fecha_Entrada`, `t1`.`Cantidad_entrada` AS `Cantidad_entrada`, `t1`.`Cantidad_existe` AS `Cantidad_existe`, `t1`.`Precio_compra` AS `Precio_compra`, `t2`.`Id_Producto` AS `Id_Producto`, `t2`.`Codigo` AS `codigosalida`, `t2`.`Descripcion` AS `Descripcion`, `t2`.`Fecha_Salida` AS `Fecha_Salida`, `t2`.`Cantidad_Salida` AS `totalsalida`, `t3`.`Cantidad` AS `salidaparcial` FROM ((`entrada` `t1` left join `salida` `t2` on(`t1`.`Id_Producto` = `t2`.`Id_Producto`)) join `detallesalida` `t3` on(`t3`.`Id_Entrada` = `t1`.`Id_Entrada` and `t3`.`Id_Salida` = `t2`.`Id_Salida`)) WHERE `t1`.`Status` = 1 AND `t2`.`Status` = 1 AND `t3`.`Status` = 1 ;

--
-- VIEW `MovimientoInventario`
-- Datos: Ninguna
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

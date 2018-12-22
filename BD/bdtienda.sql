-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-12-2018 a las 07:54:28
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdtienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `Codigo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Marca` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Modelo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Detalle` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Precio` float NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`Codigo`, `Marca`, `Modelo`, `Detalle`, `Precio`, `Cantidad`, `Imagen`) VALUES
('HW-ML', 'HUAWEI ', 'HUAWEI MATE 20 LITE', 'El Huawei Mate 20 Lite es la variante bÃ¡sica de la serie Mate 20. ', 180000, 5, 'MT20L-1-228x228.jpg'),
('HW-P10P', 'HUAWEI ', 'HUAWEI MATE 10 PRO 128GB', 'El Huawei Mate 10 Pro es el smartphone mÃ¡s poderoso de la nueva serie Mate 10.', 290000, 2, 'MT10P-1-228x228.jpg'),
('HW-P20', 'HUAWEI ', 'HUAWEI P20', 'El Huawei P20 llega este aÃ±o con una pantalla de 5.8 pulgadas a 1080 x 2244 px', 320000, 4, 'P20-1-228x228.jpg'),
('HW-P20P', 'HUAWEI ', 'HUAWEI P20 PRO', 'l Huawei P20 Pro es el primer smartphone de Huawei con cÃ¡mara triple.', 465000, 3, 'P20P-1-228x228.jpg'),
('I-8', ' IPHONE ', 'APPLE IPHONE 8 PLUS 64GB', 'El Apple iPhone 8 Plus conserva la misma pantalla de su antecesor, con 5.5 pulga..', 500000, 2, 'IPH8P-1-228x228.jpg'),
('s-1', 'Samsung', 'SAMSUNG GALAXY J2 CORE', 'El Samsung Galaxy J2 Core es el primer smartphone de Samsung con la distribuciÃ³n.', 65000, 7, 'J260-1-228x228.jpg'),
('S-2', 'SAMSUNG ', 'SAMSUNG GALAXY J2 PRO 2018', 'El Samsung Galaxy J2 Pro (2018) es la renovaciÃ³n para el aÃ±o del Galaxy J2 Pro.', 77000, 5, 'J250-1-228x228.jpg'),
('S-A8', 'SAMSUNG ', 'SAMSUNG GALAXY A8 (2018)', 'Es la nueva ediciÃ³n de la serie para el 2018', 240000, 3, 'A530-2-228x228.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `IdArticulo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NumeroFactura` int(11) NOT NULL,
  `FechaCompra` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdArticulo` (`IdArticulo`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`Id`, `IdUsuario`, `IdArticulo`, `NumeroFactura`, `FechaCompra`) VALUES
(39, '123', 'HW-P10P', 591, '2018-12-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Cedula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `NombreUsuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Contrasenia` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Rol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cedula`, `Nombre`, `Apellidos`, `Telefono`, `Email`, `NombreUsuario`, `Contrasenia`, `Rol`) VALUES
('123', 'johan', 'Sequeira', '89452563', 'jsmseque@gmail.com', 'jsmseque', '202cb962ac59075b964b07152d234b70', 'Admin'),
('333', 'Juan', 'Cordero Mora', '89657423', 'corde@gmail.com', 'cordemora', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`Codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Cedula`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

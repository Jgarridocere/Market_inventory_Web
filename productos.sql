-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2026 a las 21:05:21
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
-- Base de datos: `tienda_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(10) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `proveedor` varchar(25) DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`, `stock`, `descripcion`, `marca`, `proveedor`, `peso`, `color`, `fecha_ingreso`) VALUES
(4, 'Leche Entera 1L', 'Lácteos', 25.50, 100, 'Leche de vaca pasteurizada.', 'Lala', 'Lácteos del Norte', 1.00, 'Blanco', '2023-10-15'),
(5, 'Pan de Caja', 'Panadería', 45.00, 50, 'Pan blanco rebanado ideal para sándwiches.', 'Bimbo', 'Panificadora Nacional', 0.68, 'Blanco', '2023-10-16'),
(6, 'Manzana Roja', 'Frutas', 39.90, 200, 'Manzana roja fresca por kilo.', 'Huerta Fresca', 'Distribuidora Agrícola', 1.00, 'Rojo', '2023-10-17'),
(7, 'Arroz Blanco 1kg', 'Abarrotes', 28.50, 150, 'Arroz de grano largo.', 'Verde Valle', 'Granos y Semillas', 1.00, 'Blanco', '2023-10-18'),
(8, 'Frijol Pinto 1kg', 'Abarrotes', 35.00, 120, 'Frijol pinto limpio y listo para cocinar.', 'La Sierra', 'Granos y Semillas', 1.00, 'Café', '2023-10-19'),
(9, 'Jabón Zote', 'Limpieza', 18.50, 300, 'Jabón de lavandería multiusos.', 'La Corona', 'Limpieza Total', 0.40, 'Rosa', '2023-10-20'),
(10, 'Cereal de Chocolate', 'Desayunos', 55.00, 80, 'Cereal de maíz con sabor a chocolate.', 'Kelloggs', 'Alimentos Dulces', 0.50, 'Café', '2023-10-21'),
(11, 'Jugo de Naranja 1L', 'Bebidas', 22.00, 90, 'Jugo natural pasteurizado.', 'Jumex', 'Bebidas Frescas', 1.00, 'Naranja', '2023-10-22'),
(12, 'Huevo Blanco 30 pzas', 'Lácteos y Huevos', 85.00, 60, 'Cartón con 30 huevos blancos frescos.', 'San Juan', 'Avícola Central', 1.80, 'Blanco', '2023-10-23'),
(13, 'Pasta Espagueti', 'Abarrotes', 12.50, 250, 'Pasta de sémola de trigo duro.', 'Barilla', 'Pastas Italianas', 0.20, 'Amarillo', '2023-10-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

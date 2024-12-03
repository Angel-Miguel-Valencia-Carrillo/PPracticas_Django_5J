-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 09:32:40
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
-- Base de datos: `valencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `precioTotal` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `password`, `nombre`, `direccion`, `telefono`, `correo`, `created_at`) VALUES
(1, '$2y$10$IShVIARoHWXndkebH.8y..4eUPQTXqvJRywI84NGMVesTYM1gR63O', 'Valencia_Admin', 'Digital', 231321, 'valencia@gmail.com', '2024-12-02 07:30:57'),
(2, '$2y$10$uwISXyXBmyvDsW2qu9Co4.UVIxJt1Uz9lNsBCbvbWXVRCOkSufUUG', 'Random', 'Digital', 234531, 'random@gmail.com', '2024-12-02 08:20:40'),
(3, '$2y$10$CSVu7spJOaEp/EGBYKwVsOSnuN067fYUDvnSOppcQo.LLLHN8rzby', 'angel', 'calle sumas', 666666666, 'angel@gmail.com', '2024-12-02 12:09:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licores`
--

CREATE TABLE `licores` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `licores`
--

INSERT INTO `licores` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `tipo`, `image`, `created_at`) VALUES
(1, 'Whisky Escocias', 'sd', 432.00, 41, 'Fuerte', '../images/whiskyescocia.jpg', '2024-12-02 07:32:53'),
(2, 'Cerveza Artesanals', 'arte', 234.00, 77, 'Natural', '../images/cervezaA.jpg', '2024-12-02 08:45:03'),
(3, 'Smirnof', 'Alcohol destilado', 300.00, 50, 'Destilado', '../images/smirnof.jpg', '2024-12-03 01:46:08'),
(4, 'Sky ', 'Alcohol destilado 750 ml', 200.00, 50, 'destilado', '../images/SkyyD.jpg', '2024-12-03 01:48:13'),
(5, 'Sky ', 'Sky sabor citrus 250 ml', 50.00, 49, 'vodka', '../images/sky-citrus.jpg', '2024-12-03 01:52:10'),
(6, 'Absolut vodka', 'botella de vodka de 1l', 500.00, 20, 'vodka', '../images/vodka.jpg', '2024-12-03 07:49:48'),
(7, 'Don Perignon', 'Champaña Don Perignon 2l', 15000.00, 15, 'Champaña', '../images/don-Peri.jpg', '2024-12-03 07:55:56'),
(8, 'Blue Label Johnnie Walker', 'Botella de Whisky de 1l', 7000.00, 20, 'whisky', '../images/blue.jpg', '2024-12-03 08:02:44'),
(9, 'Jack Daniels', 'Jack Daniel\'s es un whisky estadounidense de alta calidad, dulce y con un sabor distintivo', 500.00, 20, 'whisky', '../images/jack.jpg', '2024-12-03 08:08:09'),
(10, 'Jack Daniels', 'Jack Daniel\'s es un whisky estadounidense de alta calidad, dulce y con un sabor distintivo', 500.00, 20, 'whisky', '../images/jack.jpg', '2024-12-03 08:09:10'),
(11, 'Tequila Ley 925', 'El tequila Ley 925 es un tequila premium de alta calidad, elaborado en Jalisco, México, con agave Blue Weber.', 17000.00, 10, 'tequila', '../images/leyyy.jpg', '2024-12-03 08:17:21'),
(12, 'Macallan de 1926', 'El Macallan 1926 es una de las 40 botellas extraídas después de añejar en barricas de jerez durante 60 años', 22000.00, 10, 'whisky', '../images/mmm.jpg', '2024-12-03 08:18:51'),
(13, 'Diva Vodka', 'Diva Vodka es un vodka escocés de calidad ultra premium.', 18000.00, 15, 'vodka', '../images/diva.jpg', '2024-12-03 08:20:03'),
(14, 'Coñac Grande Champagne', 'El coñac es un tipo de brandy, un licor hecho de fruta', 12000.00, 20, 'Champaña', '../images/coñac.jpg', '2024-12-03 08:22:09'),
(15, 'Domaine de la Romanne-Conti', 'Romanée-Conti Grand Cru: Este vino tinto es el buque insignia de la bodega y se considera uno de los mejores del mundo.', 25000.00, 10, 'Vino Tinto', '../images/coni.jpg', '2024-12-03 08:25:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `nombre`, `email`, `mensaje`, `fecha`) VALUES
(2, 'Jose', 'jose@gmail.com', 'dsa', '2024-12-02 08:24:09'),
(3, 'Valencia', 'valencia@gmail.com', 'Probando pagina', '2024-12-02 08:41:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Indices de la tabla `licores`
--
ALTER TABLE `licores`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `licores`
--
ALTER TABLE `licores`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

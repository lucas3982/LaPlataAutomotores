-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-01-2024 a las 01:52:44
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laplataautomotores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_portafolio`
--

CREATE TABLE `tb_portafolio` (
  `id_unidad` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL,
  `img6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_portafolio`
--

INSERT INTO `tb_portafolio` (`id_unidad`, `Descripcion`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`) VALUES
(55, 'BMW	Serie 1 2.0 120i M Sport	2017', '1705119923_img3.jpeg', '1705119923_img1.jpeg', '1705119923_img2.jpeg', '1705119923_img4.jpeg', '1705119923_img5.jpeg', '1705119923_img6.jpeg'),
(56, 'JEEP	Compass 2.4 Sport	2020', '1705120056_img2.jpeg', '1705120056_img1.jpeg', '1705120056_img3.jpeg', '1705120056_img4.jpeg', '1705120056_img5.jpeg', '1705120056_img6.jpeg'),
(57, 'PEUGEOT	208 NEW LIKE	2023', '1705120223_img2.jpeg', '1705120223_img1.jpeg', '1705120223_img3.jpeg', '1705120223_img4.jpeg', '1705120223_img5.jpeg', '1705120223_img3.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_unidades`
--

CREATE TABLE `tb_unidades` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `Marca` varchar(250) NOT NULL,
  `Año` varchar(50) NOT NULL,
  `Km` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_unidades`
--

INSERT INTO `tb_unidades` (`id`, `imagen`, `Marca`, `Año`, `Km`) VALUES
(55, '1705119877_img3.jpeg', 'BMW	Serie 1 2.0 120i M Sport	', '2017', ''),
(56, '1705120008_img2.jpeg', 'JEEP	Compass 2.4 Sport', '2020', ''),
(57, '1705120184_img2.jpeg', 'PEUGEOT	208 NEW LIKE', '2023', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_portafolio`
--
ALTER TABLE `tb_portafolio`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `tb_unidades`
--
ALTER TABLE `tb_unidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_portafolio`
--
ALTER TABLE `tb_portafolio`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `tb_unidades`
--
ALTER TABLE `tb_unidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_portafolio`
--
ALTER TABLE `tb_portafolio`
  ADD CONSTRAINT `tb_portafolio_ibfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `tb_unidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

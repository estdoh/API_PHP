-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-11-2021 a las 13:30:10
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `heroku_3768f01bf6856fc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--
USE heroku_3768f01bf6856fc;

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `name`, `description`) VALUES
(2, 'PROMOCION', 'merchandasing y prouctos de promosion'),
(3, 'PACKAGING', 'desarollo de productos y packaging para envases'),
(4, 'EDITORIAL', 'Libros, revistas y diseño editorial'),
(8, 'BRANDING', 'diseño e imagen de marca, identidad coorporativa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(150) NOT NULL,
  `name` varchar(400) CHARACTER SET utf8 NOT NULL,
  `description` varchar(450) CHARACTER SET utf8 NOT NULL,
  `img` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `price_a` int(11) NOT NULL,
  `price_b` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1162 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `description`, `img`, `price_a`, `price_b`) VALUES
(1, 3, 'ENVASE', 'desarrollo morfologica de estuche troquelado, envase pet, brick, etc. no incluye grafica (ver item anterior)', 'images/audio.png', 45110, 54132),
(2, 4, 'MODELADO 3D DE ENVASE', 'Costo por envase. Forma simple (caja, frasco, etc).', 'images/tv-led.png', 7410, 8892),
(3, 3, 'RENDERIZADO DE MODELO 3D', 'imagen de producto. Precio unitario de cada imágen/vista.', '', 1, 1),
(4, 2, 'GRAFICA PUBLICITARIA VIDRIERA', 'la grafica es', 'images/619c242099d38.png', 1500, 1800),
(5, 8, 'ETIQUETA SIMPLE', 'etiqueta simple de poducto', '', 1233, 1233);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(12) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPRESSED;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `rol`) VALUES
(21, 'slherrera91@gmail.com', '$2y$10$VWc8P8xorsOl.dAQ9ImFC.nYX7vERAPd2sRSFq4WXmxgjlJ8rX7jW', 'SUPER-ADMIN'),
(28, 'admin@prueba', '$2y$10$OKRMwNHhN4nJsj/.N6p9guEcsF91AWt0bsUwfQRU6.cNx1FIfDw9O', 'SUPER-ADMIN'),
(29, 'user@prueba', '$2y$10$Hg88pAqC3u3eyCTRd4NmXOGH1RRsUXCcChvSPkYebKzIxPrCbrD6O', 'ADMIN'),
(30, 'edit@prueba', '$2y$10$VGEHjzTDRW1mo7L5JVq4HebP2YG0CK29YSO1e2ImeWu5V.0VdC1oK', 'USER');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--

-- ALTER TABLE `products`
--   ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

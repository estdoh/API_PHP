-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-12-2021 a las 02:51:18
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
-- Base de datos: `tpe_especial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `budgets`
--

DROP TABLE IF EXISTS `budgets`;
CREATE TABLE IF NOT EXISTS `budgets` (
  `id_budget` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_name` varchar(50) NOT NULL,
  `budget_description` varchar(400) NOT NULL,
  `budget_detail` json NOT NULL,
  `budget_total` int(11) NOT NULL,
  PRIMARY KEY (`id_budget`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `budgets`
--

INSERT INTO `budgets` (`id_budget`, `cliente_name`, `budget_description`, `budget_detail`, `budget_total`) VALUES
(1, 'Tito', 'hacerle un trabajo de...', '{\"name\": \"Harry\", \"country\": \"United State\", \"ContactNo\": 2545454}', 2),
(2, 'sdasd', 'asdas asd asd asfd as', '12', 145450),
(19, 'sdasd', 'asdas asd asd asfd as', '{\"cliente_name\": \"sdasd\", \"budget_description\": \"asdas asd asd asfd as\"}', 145450),
(21, 'sdasd', 'asdas asd asd asfd as', '{\"cliente_name\": \"sdasd\", \"budget_description\": \"asdas asd asd asfd as\"}', 145450);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

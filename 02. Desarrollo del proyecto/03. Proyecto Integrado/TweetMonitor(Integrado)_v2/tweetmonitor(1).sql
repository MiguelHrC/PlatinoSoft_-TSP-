-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2018 a las 15:03:59
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tweetmonitor`
--
CREATE DATABASE IF NOT EXISTS `tweetmonitor` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tweetmonitor`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `id_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `tarea` tinytext NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `usuario_twitter` tinytext NOT NULL,
  `hashtag` tinytext NOT NULL,
  `dia_inicio` int(1) NOT NULL,
  `dia_fin` int(1) NOT NULL,
  `hora_inicio` int(2) NOT NULL,
  `hora_fin` int(2) NOT NULL,
  PRIMARY KEY (`id_tarea`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `tarea`, `id_usuario`, `usuario_twitter`, `hashtag`, `dia_inicio`, `dia_fin`, `hora_inicio`, `hora_fin`) VALUES
(3, 'Cena', 2, '1', '2', 1, 1, 22, 22),
(4, 'sdf', 0, 'sd', '32', 1, 1, 22, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `id_tweet` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` tinytext NOT NULL,
  `fecha` datetime NOT NULL,
  `texto` text,
  `hashtag` tinytext,
  PRIMARY KEY (`id_tweet`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Contrasena` varchar(20) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Nombre`, `Contrasena`, `Correo`, `Usuario`) VALUES
(1, 'Michael', '1234', 'mhl@gmail.com', NULL),
(2, 'Juan', '8cb2237d0679ca88db64', 'juan12@gmail.com', NULL),
(3, 'Misael', '12345', 'misa@gmail.com', 'misa'),
(4, 'Barry', '1234', 'barry@gmail.com', 'barry'),
(5, '', '12345', '', 'misa'),
(6, '', '12345', '', 'misa'),
(7, '', '12345', '', 'misa'),
(8, '', '12345', '', 'misa'),
(9, '', '12345', '', 'misa'),
(10, '', '12345', '', 'misa'),
(11, '', '12345', '', 'misa'),
(12, '', '12345', '', 'misa'),
(13, '', '12345', '', 'misa'),
(14, '', '12345', '', 'misa'),
(15, '', '12345', '', 'misa'),
(16, '', '12345', '', 'misa'),
(17, '', '12345', '', 'misa'),
(18, 's', '12345', '', 'misa'),
(19, 'Manuel', '$2y$10$MJQVadQ/Wi1bY', 'man@gmail.com', 'man'),
(20, 'Miguel', '$2y$10$3fATrk13r9gcH', 'miguel@gmail.com', 'minck'),
(21, 'Jose', '$2y$10$LuJIuKpMCVhIM', 'jose@gmail.com', 'jose'),
(22, 'Juana', '$2y$10$FYZRIu2/J/mjh', 'juan@gmail.com', 'jjana'),
(23, '54354', 'ghjhtdrhgfwrerhtntsb', 'ertr43434324324324343243', '4344324');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

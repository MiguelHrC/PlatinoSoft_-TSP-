-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-12-2018 a las 04:58:20
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tweetmonitor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_twitter` tinytext,
  `usuario_tweetmonitor` tinytext,
  PRIMARY KEY (`id_permiso`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

DROP TABLE IF EXISTS `tareas`;
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
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tweets`
--

DROP TABLE IF EXISTS `tweets`;
CREATE TABLE IF NOT EXISTS `tweets` (
  `id_tweet` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` tinytext NOT NULL,
  `fecha` datetime NOT NULL,
  `texto` text,
  `hashtag` tinytext,
  PRIMARY KEY (`id_tweet`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tweets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Contrasena` tinytext,
  `Correo` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE KEY `Correo` (`Correo`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 17-03-2015 a las 14:15:04
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `videoproducer`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `comments`
-- 

CREATE TABLE `comments` (
  `idComments` int(11) NOT NULL auto_increment,
  `idVideo` int(11) NOT NULL,
  `alias` varchar(50) default NULL,
  `ip` varchar(50) NOT NULL,
  `text` varchar(100) NOT NULL,
  `dateTime` datetime NOT NULL,
  `public` binary(1) NOT NULL,
  PRIMARY KEY  (`idComments`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `comments`
-- 

INSERT INTO `comments` VALUES (1, 2, 'juanchota', '127.0.0.1', 'vhvggvjh', '2015-03-17 01:16:23', 0x31);
INSERT INTO `comments` VALUES (2, 3, 'Julio', '127.0.0.1', 'Comentario Comentario Comentario Comentario Comentario Comentario Comentario Comentario Comentario C', '2015-03-17 13:42:40', 0x31);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ratings`
-- 

CREATE TABLE `ratings` (
  `idVideo` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY  (`idVideo`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `ratings`
-- 

INSERT INTO `ratings` VALUES (1, 4, '127.0.0.1');
INSERT INTO `ratings` VALUES (2, 5, '127.0.0.1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `users`
-- 

CREATE TABLE `users` (
  `userName` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY  (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `users`
-- 

INSERT INTO `users` VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `videos`
-- 

CREATE TABLE `videos` (
  `idVideo` int(10) unsigned NOT NULL auto_increment,
  `destacado` tinyint(4) NOT NULL default '0',
  `url` varchar(50) NOT NULL,
  `views` int(11) NOT NULL default '0',
  `title` varchar(45) NOT NULL,
  `description` longtext,
  `client` varchar(45) NOT NULL,
  `releaseDate` date NOT NULL,
  `rating` decimal(10,2) unsigned NOT NULL default '0.00',
  `votes` int(10) unsigned NOT NULL default '0',
  `deleted` binary(1) NOT NULL,
  PRIMARY KEY  (`idVideo`),
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `videos`
-- 

INSERT INTO `videos` VALUES (1, 0, 'ikMKJwbMQ_M', 0, 'Will Farrell Bush & Bush', 'Will Farrell stars in this new video. This is the description of the videos', 'Will Farrell', '2015-03-04', 4.00, 1, 0x31);
INSERT INTO `videos` VALUES (3, 0, 'wViILXQfX7Y', 0, 'Title', 'dawad', 'Client', '1991-02-02', 0.00, 0, 0x30);
INSERT INTO `videos` VALUES (2, 1, 'dcPD7AmDu2s', 1, 'Juanchoot', 'dwadawdawdawd', 'Elvis', '2015-03-07', 5.00, 1, 0x30);


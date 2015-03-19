
-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 19-03-2015 a las 19:13:37
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `comments`
-- 


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `videos`
-- 


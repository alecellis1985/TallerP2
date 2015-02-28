-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 28-02-2015 a las 10:39:27
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

INSERT INTO `users` VALUES ('admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `videos`
-- 

CREATE TABLE `videos` (
  `idVideo` int(10) unsigned NOT NULL auto_increment,
  `url` varchar(50) NOT NULL,
  `views` int(11) NOT NULL default '0',
  `description` longtext,
  `client` varchar(45) NOT NULL,
  `releaseDate` date NOT NULL,
  `deleted` binary(1) NOT NULL,
  PRIMARY KEY  (`idVideo`),
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- 
-- Volcar la base de datos para la tabla `videos`
-- 

INSERT INTO `videos` VALUES (22, 'F14n63OM3go', 0, 'Bordo vs 12', 'Bordo vs 12', '2015-10-01', 0x30);
INSERT INTO `videos` VALUES (23, 'ArislVlGea4', 0, 'Bordo vs Yaguari', 'Bordo vs Yaguari', '2015-10-01', 0x30);
INSERT INTO `videos` VALUES (24, 'mJVDeIwSEnw', 0, 'Bordo vs Wanderers', 'Bordo vs Wanderers', '2015-10-01', 0x30);
INSERT INTO `videos` VALUES (25, 'CmWaRy31eSA', 0, 'Bordo vs Matadero', 'Bordo vs Matadero', '2015-10-01', 0x30);
INSERT INTO `videos` VALUES (17, 'DlJEt2KU33I', 0, '2014 World Cup', 'John Oliver Brazil World Cup', '2015-10-01', 0x30);
INSERT INTO `videos` VALUES (18, 'ybyxjlas4Z0', 0, 'Bordo premios', 'Bordo Premios', '2015-10-01', 0x30);
INSERT INTO `videos` VALUES (19, '00gzNbI9_a4', 0, 'Bordo vs OCC', 'Bordo vs OCC', '2015-10-01', 0x30);
INSERT INTO `videos` VALUES (20, 'nnDfGTGzNDY', 0, 'Bordo vs Odonto', 'Bordo vs Odontologia', '2015-10-01', 0x30);
INSERT INTO `videos` VALUES (21, 'ZNpMJGLHDGQ', 0, 'Bordo vs Moron', 'Bordo vs Moron', '2015-10-01', 0x30);
INSERT INTO `videos` VALUES (16, 'Y0oX0xiwOv8', 0, 'Boyhood is nominated for a total of 6 Academy Awards including Best Picture, Best Actor in a Supporting Role (Ethan Hawke), Best Actress in a Supporting Role (Patricia Arquette), Best Director (Richard Linklater), Best Film Editing (Sandra Adair) and Best Original Screenplay (Richard Linklater). ', 'Boyhood | Official US Trailer | 2015 Oscar No', '2015-10-01', 0x30);

DROP DATABASE IF EXISTS `videoproducer`;
CREATE DATABASE  IF NOT EXISTS `videoproducer` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `videoproducer`;

-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 01, 2015 at 03:14 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `videoproducer`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `comments`
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
-- Dumping data for table `comments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ratings`
-- 

CREATE TABLE `ratings` (
  `idVideo` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY  (`idVideo`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `ratings`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `userName` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY  (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES ('admin', md5('admin'));

-- --------------------------------------------------------

-- 
-- Table structure for table `videos`
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
  `rating` decimal(10,2) unsigned NOT NULL default '0',
  `votes` int(10) unsigned NOT NULL default '0',
  `deleted` binary(1) NOT NULL,
  PRIMARY KEY  (`idVideo`),
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `videos`
-- 

INSERT INTO `videos` VALUES (NULL, 1, 'F14n63OM3go', default, 'Bordo vs 12', 'Bordo vs 12', 'Bordo vs 12', '2015-10-01',default,default, 0x30);
INSERT INTO `videos` VALUES (NULL, 0, 'ArislVlGea4', default, 'Bordo vs Yaguari', 'Bordo vs Yaguari', 'Bordo vs Yaguari', '2015-10-01',default,default, 0x30);
INSERT INTO `videos` VALUES (NULL, 0, 'mJVDeIwSEnw', default, 'Bordo vs Wanderers', 'Bordo vs Wanderers', 'Bordo vs Wanderers', '2015-10-01',default,default, 0x30);
INSERT INTO `videos` VALUES (NULL, 0, 'CmWaRy31eSA', default, 'Bordo vs Matadero', 'Bordo vs Matadero', 'Bordo vs Matadero', '2015-10-01',default,default, 0x30);
INSERT INTO `videos` VALUES (NULL, 0, 'DlJEt2KU33I', default, '2014 World Cup', '2014 World Cup', 'John Oliver Brazil World Cup', '2015-10-01',default,default, 0x30);
INSERT INTO `videos` VALUES (NULL, 0, 'ybyxjlas4Z0', default, 'Bordo premios', 'Bordo premios', 'Bordo Premios', '2015-10-01',default,default, 0x30);
INSERT INTO `videos` VALUES (NULL, 0, '00gzNbI9_a4', default, 'Bordo vs OCC', 'Bordo vs OCC', 'Bordo vs OCC', '2015-10-01',default,default, 0x30);
INSERT INTO `videos` VALUES (NULL, 0, 'nnDfGTGzNDY', default, 'Bordo vs Odonto', 'Bordo vs Odonto', 'Bordo vs Odontologia', '2015-10-01',default,default, 0x30);
INSERT INTO `videos` VALUES (NULL, 0, 'ZNpMJGLHDGQ', default, 'Bordo vs Moron', 'Bordo vs Moron', 'Bordo vs Moron', '2015-10-01',default,default, 0x30);
INSERT INTO `videos` VALUES (NULL, 0, 'Y0oX0xiwOv8', default,'Boyhood Trailer', 'Boyhood is nominated for a total of 6 Academy Awards including Best Picture, Best Actor in a Supporting Role (Ethan Hawke), Best Actress in a Supporting Role (Patricia Arquette), Best Director (Richard Linklater), Best Film Editing (Sandra Adair) and Best Original Screenplay (Richard Linklater). ', 'Boyhood | Official US Trailer | 2015 Oscar No', '2015-10-01',default,default, 0x30);

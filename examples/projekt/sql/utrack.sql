-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 05. März 2007 um 14:07
-- Server Version: 5.0.21
-- PHP-Version: 5.1.4
-- 
-- Datenbank: `lernsystem`
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `utrack`
-- 

DROP TABLE IF EXISTS `utrack`;
CREATE TABLE IF NOT EXISTS `utrack` (
  `ID` int(16) NOT NULL AUTO_INCREMENT,
  `UID` int(8) NOT NULL,
  `kap` int(2) NOT NULL,
  `kap2` int(2) NOT NULL,
  `kap3` int(2) NOT NULL,
  `zeit` time NOT NULL,
  `media` varchar(10) NOT NULL,
  `hits` int(8) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Daten für Tabelle `utrack`
-- 


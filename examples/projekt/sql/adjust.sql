-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 07. März 2007 um 18:29
-- Server Version: 5.0.21
-- PHP-Version: 5.1.4
-- 
-- Datenbank: `lernsystem`
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `adjust`
-- 

DROP TABLE IF EXISTS `adjust`;
CREATE TABLE `adjust` (
  `ID` int(3) NOT NULL,
  `prvlim` int(3) NOT NULL default '30',
  `welctime` int(16) NOT NULL default '300',
  `welchits` int(2) NOT NULL default '5',
  `hinttimelimit` time NOT NULL default '00:00:30',
  `kaptim0` int(2) NOT NULL default '5',
  `kaptim1` int(2) NOT NULL default '120',
  `kaptim2` int(11) NOT NULL default '60',
  `kaptim3` int(2) NOT NULL default '30',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Daten für Tabelle `adjust`
-- 

INSERT INTO `adjust` VALUES (1, 10, 300, 5, '00:00:00', 5, 180, 90, 30);

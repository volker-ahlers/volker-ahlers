-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 03. März 2007 um 18:30
-- Server Version: 5.0.21
-- PHP-Version: 5.1.4
-- 
-- Datenbank: `lernsystem`
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `userfragen`
-- 

DROP TABLE IF EXISTS `userfragen`;
CREATE TABLE `userfragen` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `UID` int(8) NOT NULL,
  `FID` int(8) NOT NULL,
  `kap` int(2) NOT NULL,
  `kap2` varchar(8) NOT NULL,
  `richtig` tinyint(1) NOT NULL default '0',
  `punkte` int(2) NOT NULL default '0',
  `maxpkt` int(2) NOT NULL default '0',
  `modus` varchar(8) NOT NULL default 'test',
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=1;

-- 
-- Daten für Tabelle `userfragen`
-- 
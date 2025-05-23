-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 05. März 2007 um 20:57
-- Server Version: 5.0.32
-- PHP-Version: 5.2.1-0.dotdeb.1
-- 
-- von server
-- 
-- 
-- Datenbank: `lernprojekt`
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `user`
-- 
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `UID` int(16) NOT NULL auto_increment,
  `anrede` varchar(10) NOT NULL,
  `vorname` varchar(30) NOT NULL,
  `nachname` varchar(30) NOT NULL,
  `strasse` varchar(30) default NULL,
  `plz` int(5) default NULL,
  `ort` varchar(30) default NULL,
  `kennung` varchar(20) NOT NULL,
  `passwort` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `geburtsdatum` date default NULL,
  `anmeldung` timestamp NOT NULL,
  `lastlogin` timestamp NOT NULL default '0000-00-00 00:00:00',
  `recht` tinyint(1) NOT NULL,
  `kap` tinyint(2) NOT NULL default '0',
  `kap2` tinyint(2) NOT NULL default '0',
  `kap3` tinyint(2) NOT NULL default '0',
  `pbool` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`UID`)
) TYPE=MyISAM  AUTO_INCREMENT=13 ;

-- 
-- Daten für Tabelle `user`
-- 

INSERT INTO `user` (`anrede`, `vorname`, `nachname`, `strasse`, `plz`, `ort`, `kennung`, `passwort`, `email`, `geburtsdatum`, `anmeldung`, `lastlogin`, `recht`, `kap`, `kap2`, `kap3`, `pbool`) VALUES
('Herr', 'Volker', 'Ahlers', NULL, NULL, NULL, 'maria', 'maria', 'amitriptillin@yahoo.de', '1962-08-06', '2007-03-04 19:11:08', '2007-03-04 19:10:02', 1, 2, 0, 0, 0),
('Frau', 'Susanne', 'Beuss', 'Borgfelder Straße 10', 28215, 'Bremen', 'bss', 'murmel', 'rechtsschutz@gew-hb.de', '1965-04-01', '2006-12-26 19:09:31', '2006-12-26 00:00:00', 0, 0, 0, 0, 0),
('Herr', 'Homer', 'Adams', 'Thoraroad', 12345, 'Terrania', '12345', '12345', 'bla@bla.de', '1975-09-01', '2007-01-16 18:13:23', '2007-01-16 00:00:00', 0, 10, 0, 0, 0),
('Frau', 'Claudia', 'Hahn', '', 0, '', 'brumm', 'brumm', 'Claudia.Hahn1@gmx.de', '0000-00-00', '2007-03-04 12:51:32', '2007-03-04 12:44:48', 0, 1, 4, 0, 0),
('Frau', 'Rusana', 'Petzke', 'Habenhauser Landstr. 238', 28279, 'Bremen', 'Rusana', '010302', 'RubensladyRusana@aol.com', '1976-06-04', '2007-03-03 23:23:31', '2007-03-03 23:07:01', 0, 1, 2, 0, 0),
('Frau', 'marlis', 'suck', '', 0, '', 'hexle', '123456', 'sternle42@aol.com', '1958-09-06', '2007-03-04 14:20:09', '2007-03-04 14:18:37', 0, 0, 0, 0, 0),
('Herr', 'Markus', 'Ch', 'NA', 0, 'NA', 'Markus', 'Markus', 'bla@bla.de', '0000-00-00', '2007-03-05 00:13:54', '2007-03-05 00:13:54', 0, 1, 4, 0, 0);

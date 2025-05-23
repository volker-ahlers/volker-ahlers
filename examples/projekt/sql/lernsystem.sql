-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 20. März 2007 um 16:48
-- Server Version: 5.0.32
-- PHP-Version: 5.2.1-0.dotdeb.1
-- 
-- Datenbank: `lernprojekt`

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `adjust`
-- 

DROP TABLE IF EXISTS `adjust`;
CREATE TABLE `adjust` (
  `ID` int(3) NOT NULL auto_increment,
  `prvlim` int(3) NOT NULL default '30',
  `welctime` int(16) NOT NULL default '300',
  `welchits` int(2) NOT NULL default '5',
  `hinttimelimit` time NOT NULL default '00:00:30',
  `kaptim0` int(2) NOT NULL default '5',
  `kaptim1` int(2) NOT NULL default '120',
  `kaptim2` int(11) NOT NULL default '60',
  `kaptim3` int(2) NOT NULL default '30',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM  AUTO_INCREMENT=1 ;

-- 
-- Daten für Tabelle `adjust`
-- 

INSERT INTO `adjust` (`ID`, `prvlim`, `welctime`, `welchits`, `hinttimelimit`, `kaptim0`, `kaptim1`, `kaptim2`, `kaptim3`) VALUES 
(1, 10, 300, 5, '00:00:30', 5, 180, 90, 30);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `fragen`
-- 

DROP TABLE IF EXISTS `fragen`;
CREATE TABLE `fragen` (
  `ID` int(8) NOT NULL,
  `kap` int(2) NOT NULL default '0',
  `kap2` tinyint(2) NOT NULL default '0',
  `kap3` tinyint(2) NOT NULL default '0',
  `Fragen` text NOT NULL,
  `Typ` tinyint(1) NOT NULL,
  `Aw` text NOT NULL,
  `AnzR` tinyint(1) NOT NULL,
  `richtig` varchar(20) default NULL,
  `grad` tinyint(1) default NULL,
  `hinweise` varchar(500) default NULL,
  `h2` int(2) default NULL,
  `r4` tinyint(1) default NULL,
  `flag` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM;

-- 
-- Daten für Tabelle `fragen`
-- 

INSERT INTO `fragen` (`ID`, `kap`, `kap2`, `kap3`, `Fragen`, `Typ`, `Aw`, `AnzR`, `richtig`, `grad`, `hinweise`, `h2`, `r4`, `flag`) VALUES 
(1, 1, 4, 2, 'Welchen Planeten ähnelt die Venus größenmäßig am meisten', 2, 'Mond+Mars+Erde+Merkur', 1, '3', 1, '"Sie ist nicht klein+aber auch nicht riesig+wenn man unseren Planeten als Maßstab nimmt ', 0, 0, 0),
(2, 1, 4, 2, 'Der wievielte Planet von der Sonne aus gesehen ist die Venus', 2, 'der erste+der zweite+der dritte+der vierte+der fünfte+der sechste+der siebte+der achte', 1, '2', 1, 'Sie ist zwischen den anderen Planetenlaufbahnen+Sie ist Nachbarin der Erde+..und des Merkurs', 0, 0, 0),
(3, 1, 4, 3, 'Worin unterscheiden sich Venus und Erde sehr stark', 3, 'In der Größe+In der chemischen Zusammensetzung+In der Masse+In der  Oberfläche', 1, '4', 2, 'Als Körper gleicht sie der Erde+Ist auch ähnlich schwe+was bleibt, wenn sich die Körper gleichen ?', 0, 0, 0),
(4, 1, 4, 3, 'Warum ist die Atmosphäre der Venus ist von außen völlig undurchsichtig', 3, 'Wegen der Masse der Gashülle+Wegen der sehr hohen Dichte der Gashülle+Wegen der stets geschlossenen Wolkendecke', 1, '3', 2, 'Die Athmossphäre ist in etwa so durchsichtig, wie die der Erde+Wenn die ganze Erde aus Nordeutschland bestünde, hätten wir das gleich Problem :-))', 0, 0, 0),
(5, 1, 4, 3, 'Wie hoch ist die Albedo der Venus', 2, '0,76+0,39+1,22+0,01+0,33+3,8', 1, '1', 3, 'Albedo gibt den Prozentanteil an relektiertem Licht (hier von unserer Sonne) an+..und ist somit kleiner als 1 !+Manchmal ist die erstbeste Antwort nicht schlecht', 0, 0, 0),
(6, 1, 4, 4, 'Welche Farbe hat der Boden der Venus', 2, 'braungelb-gestreift+schwarzrot gepunktet+lilarosa geblümt+dunkelrotglühend', 1, '4', 1, '"Einige Antworten sind albern :-)+Sie ist einheitlich gefärbt+Man würde es nicht denken, da sie ja ein ""Morgenplanet"" ist "', 0, 0, 0),
(7, 1, 4, 4, 'Gibt es Wasser auf der Venus', 2, 'ja+nein', 1, '2', 1, '"Gibt es Bier auf Hawai ???...+..wenn man dem bekannten Lied glaubt+..fliegen Sie also lieber nicht zur Venus ', 0, 0, 0),
(8, 1, 4, 4, 'Warum gibt es kein Wasser auf der Venus', 2, 'Wegen der fehlenden Athmosspäre+Wegen der hohen Temperaturen+Es gibt doch Wasser auf der Venus', 1, '2', 2, 'Sie ist viel näher an der Sonne, als wir+..und die Sonne ist heiß!!', 0, 0, 0),
(9, 1, 4, 5, 'Die Hochebene Aphrodite Terra auf der Venus hat in etwa die Größe von ', 3, 'Helgoland+Deutschland+Südamerika+Russland+USA', 1, '3', 3, 'Sie ist SEHR groß+Größer als Europa+Wäre sie nicht auf der Venus, könnte man dort Karneval feiern', 0, 0, 0),
(10, 1, 4, 5, 'Wie heißt die umfangreichere von beiden Hochlagen auf der Venus', 1, 'Aphrodite Terra', 1, '1', 3, 'Eine Namenskombination aus dem Namen einer Göttin der Antike und dem lateinischen Ausdruck für die Erde+Lesen Sie lieber nochmal nach :-)', 0, 0, 0),
(11, 1, 4, 4, 'Wie heißt der Einschlagkrater der mit einem Durchmesser von 104 km die achtgrößte Impaktstruktur auf der Venus darstellt', 1, 'Cleopatra', 1, '1', 3, 'So hieß eine altägyptische Herrscherin+Sie hatte eine unglaublich süße Nase', 0, 0, 0),
(12, 1, 4, 5, 'Welche geografischen Gebilde befinden sich auf der Venus', 3, 'Mount Everest+Cleopatra+Aphrodite Terra+Anden+Rocky Mountains', 2, '2+3', 2, 'Mehrere Antworten sind richtig+Beide Begriffe haben Namensentsprechungen in der antiken Vorzeit+Berge der Erde befinden sich nicht auf der Venus', 0, 0, 0),
(13, 1, 4, 5, 'Wie heißt der mit Abstand größte Venuskrater', 1, 'Mead', 1, '1', 3, 'Ein Begriff mit 4 Buchstaben+Klingt fast wie englisches Fleisch', 0, 0, 0),
(14, 1, 4, 5, 'Welchen Durchmesser hat der mit Abstand größte Venuskrater', 3, '110 km+220 km+280 km+280.000m+110.00 km', 2, '3+4', 3, 'Zwei Antworten sind richtig+Es sind identische Antworten nur unterschiedlich ausgedrückt', 0, 0, 0),
(15, 1, 4, 8, 'Wie heißen die Monde der Venus', 2, 'Merkur+Neith+Jochen Meier+Die Venus hat keinen', 1, '4', 1, 'Achtung ! Spaßfrage+Sie hat genau einen Mond weniger, als die Erde :-)', 0, 0, 0),
(16, 1, 4, 5, 'Was sind die charakteristischsten Gebilde auf der Venus', 3, 'Logopädiden+Coronae+ Arachnoiden+Hypogälide+Epikatarsis', 2, '2+3', 2, '"Zwei richtige Antworten!+Der eine Begriff hat was miit ""Spinnen"" zu tun+der andere mit ""Kronen"""\r\n', 0, 0, 0),
(17, 1, 4, 5, 'Wie heißen die prominentesten Lavabergen auf derVenus', 3, 'Happy kadaver+Sif Mons+Mons Shi Shi+Gula Mons+Eistla Regio', 2, '2+5', 3, 'Zwei richtige Antworten!+Okay, diese Frage ist wirklich schwer, lesen Sie lieber nochmal das Kapitel über die Einschlagkrater\r\n', 0, 0, 0),
(18, 1, 4, 6, 'Wie heißen die sehr regelmäßig aufgebauten, kreisrunden, vulkanischen Oberflächenstrukturen der Venus', 3, 'Pfannkuchenkuppeln+Apfeltaschengipfel+Pancake Domes+Schnipfeldapfelzipfel', 2, '1+3', 2, 'Zwei richtige Antworten!+Beide Antworten sind identisch aber in unterschiedlicher Sprache geschrieben+den ersten Teil des Begriffs macht man in der Pfanne als Gericht zurecht\r\n', 0, 0, 0),
(19, 1, 4, 6, 'Welche Bezeichnung tragen die verhältnismäßig steilwandigen Täler, ähnlich einem Canyon', 1, 'Chasma', 1, '1', 3, 'So ähnlich wie Charisma, nur kürzer+lassen Sie nur eine Silbe von Charisma weg+und zwar die zweite!\r\n', 0, 0, 0),
(20, 1, 4, 6, 'Wie sind die Windgeschwindigkeiten, die am Boden gemessen wurden', 2, 'voll normal+heftig,heftig+heftig+megaheftig+gering', 1, '5', 1, 'Ist nicht wirklich stark+Ist nicht mal wirklich erwähnenswert+Ist eher lau!\r\n', 0, 0, 0),
(21, 1, 3, 2, 'Warum ist der Merkur von der Erde aus nur schwer zu beobachten', 2, 'Man kann ihn sehr wohl gut beobachten+Wegen seiner Sonnennähe+Weil er so klein ist', 1, '2', 1, 'Den Pluto hat man ja wohl auch gefunden…+Er ist wirklich schwer zu sehen+..ist n bissi HELL in seiner Nähe\r\n', 0, 0, 0),
(22, 1, 3, 2, 'Der wievielte Planet von der Sonne aus gesehen ist der Merkur', 2, 'der erste+der zweite+der dritte+der vierte+der fünfte+der sechste+der siebte+der achte', 1, '1', 1, 'Er ist verdammt nah an der Sonne+näher dürfte es wirklich nicht sein\r\n', 0, 0, 0),
(23, 1, 5, 2, 'Der wievielte Planet von der Sonne aus gesehen ist die Erde', 2, 'der erste+der zweite+der dritte+der vierte+der fünfte+der sechste+der siebte+der achte', 1, '3', 1, 'Wir sind zwischen Venus und Mars+nach Merkur kommt Venus, dann kommen wir\r\n', 0, 0, 0),
(24, 1, 6, 2, 'Der wievielte Planet von der Sonne aus gesehen ist der Mars', 2, 'der erste+der zweite+der dritte+der vierte+der fünfte+der sechste+der siebte+der achte', 1, '4', 1, 'Ist Nachbar der Erde+..kommt gleich nach uns\r\n', 0, 0, 0),
(25, 1, 7, 2, 'Der wievielte Planet von der Sonne aus gesehen ist die Jupiter', 2, 'der erste+der zweite+der dritte+der vierte+der fünfte+der sechste+der siebte+der achte', 1, '5', 1, 'Er kommt nach dem Mars+ aber vor dem Saturn\r\n', 0, 0, 0),
(26, 1, 8, 2, 'Der wievielte Planet von der Sonne aus gesehen ist die Saturn', 2, 'der erste+der zweite+der dritte+der vierte+der fünfte+der sechste+der siebte+der achte', 1, '6', 1, 'Er kommt nach dem Jupiter+ aber vor dem Uranus\r\n', 0, 0, 0),
(27, 1, 9, 2, 'Der wievielte Planet von der Sonne aus gesehen ist die Uranus', 2, 'der erste+der zweite+der dritte+der vierte+der fünfte+der sechste+der siebte+der achte', 1, '7', 1, 'Er kommt nach dem Saturn+ aber vor dem Neptun\r\n', 0, 0, 0),
(28, 1, 10, 2, 'Der wievielte Planet von der Sonne aus gesehen ist die Neptun', 2, 'der erste+der zweite+der dritte+der vierte+der fünfte+der sechste+der siebte+der achte', 1, '8', 1, 'Er kommt nach dem Uranus+ aber vor dem Pluto+Pluto wird nicht mehr als Plantet gesehen\r\n', 0, 0, 0),
(29, 1, 5, 3, 'Wie hoch ist die Albedo der Erde', 2, '0,76+0,39+1,22+0,01+0,33+3,8', 1, '2', 3, 'Albedo gibt den Prozentanteil an relektiertem Licht (hier von unserer Sonne) an+..und ist somit kleiner als 1 !+Manchmal ist die zweitbeste Antwort nicht schlecht\r\n', 0, 0, 0),
(30, 1, 6, 2, 'Gibt es Wasser auf dem Mars', 2, 'ja+nein', 1, '2', 1, '"Gibt es Bier auf Hawai ???...+..wenn man dem bekannten Lied glaubt+..fliegen Sie also lieber nicht zum Mars ', 0, 0, 0),
(31, 1, 7, 2, 'Gibt es Wasser auf dem Jupiter', 2, 'ja+nein', 1, '2', 1, '"Gibt es Bier auf Hawai ???...+..wenn man dem bekannten Lied glaubt+..fliegen Sie also lieber nicht zum Jupiter ', 0, 0, 0),
(32, 1, 8, 2, 'Gibt es Wasser auf dem Saturn', 2, 'ja+nein', 1, '2', 1, '"Gibt es Bier auf Hawai ???...+..wenn man dem bekannten Lied glaubt+..fliegen Sie also lieber nicht zum Saturn ', 0, 0, 0),
(33, 1, 9, 2, 'Gibt es Wasser auf dem Uranus', 2, 'ja+nein', 1, '2', 1, '"Gibt es Bier auf Hawai ???...+..wenn man dem bekannten Lied glaubt+..fliegen Sie also lieber nicht zum Uranus ', 0, 0, 0),
(34, 1, 10, 2, 'Gibt es Wasser auf dem Neptun', 2, 'ja+nein', 1, '2', 1, '"Gibt es Bier auf Hawai ???...+..wenn man dem bekannten Lied glaubt+..fliegen Sie also lieber nicht zum Neptun ', 0, 0, 0),
(35, 1, 2, 2, 'Welchen Durchmesser hat die Sonne', 2, '1,4891 Millionen km+28,5179 Millionen km+1,3925Millionen km+50 Milliarden km', 1, '3', 2, 'Es sind weniger wie eine Milliarde km+Es sind weniger wie 1,5000 Millionen km+Noch etwas weniger\r\n', 0, 0, 0),
(36, 1, 2, 2, 'Wie schnell rotiert die Sonne', 2, 'etwa 31 bis rund 89 Tage(an den Polen)+etwa 25 bis rund 36 Tage(an den Polen)+rotiert gar nicht+ etwa 132 Tage bis rund 234 Tage(an den Polen)', 1, '2', 2, 'Die Sonne rotiert!+Die Sonne ist ein Gasball, daher ist es schwierig Rotationsdauer anzugeben, aber nicht unmöglich\r\n', 0, 0, 0),
(37, 1, 2, 3, 'Wie lange benötigt das Licht bis es die Erde erreicht', 2, '8 Minuten+1 Tag+10 Minuten', 1, '1', 1, '"weniger als 24 Stunden+etwas mehr als eine Werbepause bei ARD+ jetzt aber !! ', 0, 0, 0),
(38, 1, 2, 4, 'Kann es sein, dass die Korona (Krone) der Sonne um ein mehrfaches heißer ist als die Oberfläche', 2, 'nein+ja', 1, '2', 2, 'Temperatur an der Oberfläche der Sonne beträgt nur 5500°C+was bleibt da noch über:-)\r\n', 0, 0, 0),
(39, 1, 2, 5, 'Die Sonne durchläuft gerade eine Phase, in der nur sehr wenig Sonnenflecken zu sehen sind. Das letzte Maximum war im Jahr 2001. Für welches Jahr haben die Forscher das nächste Fleckenmaximum ausgerechnet', 2, 'kommt nie mehr+2011+2012', 1, '3', 3, 'Es soll heftiger werden als vorherige Maxima+es gibt einen bestimmten Zyklus+und zwar den 11 jährigen\r\n', 0, 0, 0);

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
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Daten für Tabelle `user`
-- 

INSERT INTO `user` (`UID`, `anrede`, `vorname`, `nachname`, `strasse`, `plz`, `ort`, `kennung`, `passwort`, `email`, `geburtsdatum`, `anmeldung`, `lastlogin`, `recht`, `kap`, `kap2`, `kap3`, `pbool`) VALUES 
(1, 'Herr', 'Volker', 'Ahlers', NULL, NULL, NULL, 'maria', 'maria', 'amitriptillin@yahoo.de', '1962-08-06', '2007-03-17 15:56:43', '2007-03-14 20:52:09', 1, 1, 2, 0, 0);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `userfragen`
-- 

DROP TABLE IF EXISTS `userfragen`;
CREATE TABLE `userfragen` (
  `ID` int(8) NOT NULL auto_increment,
  `UID` int(8) NOT NULL,
  `FID` int(8) NOT NULL,
  `kap` int(2) NOT NULL,
  `kap2` varchar(8) NOT NULL,
  `richtig` tinyint(1) NOT NULL default '0',
  `punkte` int(2) NOT NULL default '0',
  `maxpkt` int(2) NOT NULL default '0',
  `modus` varchar(8) NOT NULL default 'test',
  `hits` int(8) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM  AUTO_INCREMENT=1 ;


-- 
-- Tabellenstruktur für Tabelle `utrack`
-- 

DROP TABLE IF EXISTS `utrack`;
CREATE TABLE `utrack` (
  `ID` int(16) NOT NULL auto_increment,
  `UID` int(8) NOT NULL,
  `kap` int(2) NOT NULL,
  `kap2` int(2) NOT NULL,
  `kap3` int(2) NOT NULL,
  `zeit` int(16) NOT NULL default '0',
  `media` varchar(10) NOT NULL,
  `hits` int(8) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM  AUTO_INCREMENT=1 ;


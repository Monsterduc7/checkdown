-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Sep 2016 um 17:03
-- Server-Version: 5.6.25
-- PHP-Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `checkdown`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `id` tinyint(3) NOT NULL,
  `nr` int(11) NOT NULL,
  `position` text COLLATE utf8_bin NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `age` tinyint(3) NOT NULL,
  `overall` tinyint(3) NOT NULL,
  `talent` text COLLATE utf8_bin NOT NULL,
  `sallery` int(10) NOT NULL,
  `contract` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `roster`
--

INSERT INTO `roster` (`id`, `nr`, `position`, `name`, `age`, `overall`, `talent`, `sallery`, `contract`) VALUES
(12, 97, 'DT', 'Armin Wiegand', 29, 33, '0,5', 9456, 2),
(13, 92, 'MLB', 'Henning Haupt', 29, 33, '0,5', 10638, 2),
(14, 33, 'CB', 'Thilo Gebhardt', 26, 35, '0,5', 12343, 3),
(15, 30, 'FS', 'Jon Reiter', 24, 35, '0,5', 10867, 4),
(16, 15, 'K', 'Karim Schwarz', 28, 33, '0,5', 3070, 4),
(17, 7, 'K', 'Jaron Hoppe', 27, 34, '0,5', 3700, 4),
(18, 73, 'OC', 'Mark Smith', 24, 16, '1,5', 979, 1),
(19, 4, 'P', 'Emanuel Hoffmann', 24, 24, '2', 1182, 2),
(20, 49, 'RB', 'Edgar Berger', 21, 24, '2', 4605, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `roster`
--
ALTER TABLE `roster`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

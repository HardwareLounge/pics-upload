-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 14. Sep 2020 um 21:55
-- Server-Version: 10.3.22-MariaDB-0ubuntu0.19.10.1
-- PHP-Version: 7.3.11-0ubuntu0.19.10.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hwl_pics`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `picture`
--

CREATE TABLE `picture` (
  `p_id` int(11) NOT NULL COMMENT 'Bild ID',
  `p_pfad` varchar(50) NOT NULL COMMENT 'Pfad des Bildes',
  `p_datei_typ` varchar(10) NOT NULL COMMENT 'Datei typ des Bildes',
  `p_upload_datum` datetime NOT NULL COMMENT 'Datum des Uploads',
  `p_titel` varchar(50) DEFAULT NULL COMMENT 'Titel des Users',
  `p_öffentlich` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Ist das Bild Öffentlich'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `picture`
--

INSERT INTO `picture` (`p_id`, `p_pfad`, `p_datei_typ`, `p_upload_datum`, `p_titel`, `p_öffentlich`) VALUES
(1, 'test', 'png', '2020-09-16 14:13:13', 'test', 1),
(2, 'VEM9sJMUhEO8m7ZS3ohc', 'image/png', '2020-09-14 14:36:34', 'Tes Bild', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `uploads`
--

CREATE TABLE `uploads` (
  `up_id` int(11) NOT NULL COMMENT 'Upload_Id',
  `up_p_id` int(11) NOT NULL,
  `up_v_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL COMMENT 'User ID',
  `u_name` varchar(30) NOT NULL COMMENT 'User Name',
  `u_email` varchar(50) NOT NULL COMMENT 'User Email',
  `u_hash` varchar(70) NOT NULL COMMENT 'User Passwort hash '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_hash`) VALUES
(1, 'Kyle', 'kyle@khenselmann.de', '$2y$10$433BrGWn/lnhXPmxXZXCyOU6mm1wv6DXk7QUGGQ.FSAfm0ERys/YW');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`p_id`);

--
-- Indizes für die Tabelle `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`up_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `picture`
--
ALTER TABLE `picture`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Bild ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `uploads`
--
ALTER TABLE `uploads`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Upload_Id';

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

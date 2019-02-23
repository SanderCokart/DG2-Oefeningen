-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 feb 2019 om 21:42
-- Gegenereerd op: 23 feb 2019 om 21:38
-- Serverversie: 10.1.35-MariaDB
-- PHP-versie: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedstrijd_oefening`
--
CREATE DATABASE IF NOT EXISTS `wedstrijd_oefening` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wedstrijd_oefening`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `club_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wedstrijden`
--

CREATE TABLE `wedstrijden` (
  `id` int(11) NOT NULL,
  `clubnaam_1` varchar(25) NOT NULL,
  `eindscore_club_1` int(2) NOT NULL,
  `clubnaam_2` varchar(25) NOT NULL,
  `eindscore_club_2` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `club_name` (`club_name`);

--
-- Indexen voor tabel `wedstrijden`
--
ALTER TABLE `wedstrijden`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `wedstrijden`
--
ALTER TABLE `wedstrijden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

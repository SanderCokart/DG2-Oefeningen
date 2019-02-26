-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 feb 2019 om 10:24
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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `club_name` varchar(25) NOT NULL,
  `removed` tinyint(1) NOT NULL,
  `reason` tinytext,
  `solution` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `removed`, `reason`, `solution`) VALUES
(9, 'Feyenoord', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `club_1_name` varchar(25) NOT NULL,
  `score` varchar(3) NOT NULL,
  `club_2_name` varchar(25) NOT NULL
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
-- Indexen voor tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

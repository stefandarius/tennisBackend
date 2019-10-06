-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: oct. 06, 2019 la 10:09 AM
-- Versiune server: 5.7.26
-- Versiune PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `tenis`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `abonamente`
--

DROP TABLE IF EXISTS `abonamente`;
CREATE TABLE IF NOT EXISTS `abonamente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denumire` varchar(100) NOT NULL,
  `numar_sedinte` int(11) NOT NULL,
  `pret` int(11) NOT NULL,
  `durata` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `denumire` (`denumire`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `abonamente`
--

INSERT INTO `abonamente` (`id`, `denumire`, `numar_sedinte`, `pret`, `durata`) VALUES
(1, 'lunar', 10, 200, 30);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `abonamente_sportivi`
--

DROP TABLE IF EXISTS `abonamente_sportivi`;
CREATE TABLE IF NOT EXISTS `abonamente_sportivi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sportiv_id` int(11) NOT NULL,
  `abonament_id` int(11) NOT NULL,
  `data_inceput` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sportiv_id` (`sportiv_id`),
  KEY `abonament_id` (`abonament_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `antrenori`
--

DROP TABLE IF EXISTS `antrenori`;
CREATE TABLE IF NOT EXISTS `antrenori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `antrenori`
--

INSERT INTO `antrenori` (`id`, `nume`, `prenume`, `email`) VALUES
(2, 'radu', 'marian', 'radumrn@gmail.com');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `istoric_antrenament`
--

DROP TABLE IF EXISTS `istoric_antrenament`;
CREATE TABLE IF NOT EXISTS `istoric_antrenament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `antrenor_id` int(11) NOT NULL,
  `abonamentSpotiv_id` int(11) NOT NULL,
  `tipAntrenament_id` int(11) NOT NULL,
  `grad_dificultate` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `data_antrenament` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `antrenor_id` (`antrenor_id`),
  KEY `abonamentSpotiv_id` (`abonamentSpotiv_id`),
  KEY `tipAntrenament_id` (`tipAntrenament_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1567694131),
('m130524_201442_init', 1567694134),
('m190124_110200_add_verification_token_column_to_user_table', 1567694134);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `notificari`
--

DROP TABLE IF EXISTS `notificari`;
CREATE TABLE IF NOT EXISTS `notificari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tip` int(11) NOT NULL,
  `actiune` int(11) NOT NULL,
  `continut` varchar(100) NOT NULL,
  `data_primire` int(11) NOT NULL,
  `data_citire` int(11) NOT NULL,
  `data_stergere` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sportivi`
--

DROP TABLE IF EXISTS `sportivi`;
CREATE TABLE IF NOT EXISTS `sportivi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `data_nastere` date NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '1',
  `nivel` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `greutate` int(11) NOT NULL,
  `inaltime` int(11) NOT NULL,
  `stare_sanatate` int(11) NOT NULL,
  `numar_telefon` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `numar_telefon` (`numar_telefon`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `sportivi`
--

INSERT INTO `sportivi` (`id`, `nume`, `prenume`, `data_nastere`, `sex`, `nivel`, `email`, `greutate`, `inaltime`, `stare_sanatate`, `numar_telefon`) VALUES
(1, 'stefan', 'iordache', '2001-05-18', 1, 2, 'stefan.iordache2001@gmail.com', 70, 180, 2, '0735732567');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tip_antrenament`
--

DROP TABLE IF EXISTS `tip_antrenament`;
CREATE TABLE IF NOT EXISTS `tip_antrenament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denumirea` varchar(100) NOT NULL,
  `activ` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `denumirea` (`denumirea`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tip_antrenament`
--

INSERT INTO `tip_antrenament` (`id`, `denumirea`, `activ`) VALUES
(1, 'Forehand', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'Vt1ajzxOUv7U09DNC9Nqzz5QopANINr-', '$2y$13$cMBKTwe6gyG6.r5DVqJdV.kirdVJ7Ti9s5eDbTZmGMruQtmUE1eBi', NULL, 'stefan.iordache2001@gmail.com', 10, 1567694227, 1567694227, 'Fos0S0W8317Xl2EgDPUkDk2ERHgro-Se_1567694227'),
(2, 'marian', 'HXpIHdGBQM4PiuuyDzAQtvwRvGYPOB3k', '$2y$13$cMBKTwe6gyG6.r5DVqJdV.kirdVJ7Ti9s5eDbTZmGMruQtmUE1eBi', NULL, 'marian@yahoo.com', 10, 1567694336, 1567694336, 'fnp2FYg240ZjbFHFvr9Us3AO1zyhwdMo_1567694336'),
(3, 'catalin', 'XrCZzw1_CvEU0EmViv0nsWqtJRIZBpC0', '$2y$13$cMBKTwe6gyG6.r5DVqJdV.kirdVJ7Ti9s5eDbTZmGMruQtmUE1eBi', NULL, 'catalin@tenisapp.ro', 9, 1569512293, 1569512293, 'cZxFojK-7bL_RnHq7z8SSF3fHZdV-g6z_1569512293');

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `abonamente_sportivi`
--
ALTER TABLE `abonamente_sportivi`
  ADD CONSTRAINT `abonamente_sportivi_ibfk_1` FOREIGN KEY (`sportiv_id`) REFERENCES `sportivi` (`id`),
  ADD CONSTRAINT `abonamente_sportivi_ibfk_2` FOREIGN KEY (`abonament_id`) REFERENCES `abonamente` (`id`);

--
-- Constrângeri pentru tabele `istoric_antrenament`
--
ALTER TABLE `istoric_antrenament`
  ADD CONSTRAINT `istoric_antrenament_ibfk_1` FOREIGN KEY (`antrenor_id`) REFERENCES `antrenori` (`id`),
  ADD CONSTRAINT `istoric_antrenament_ibfk_2` FOREIGN KEY (`abonamentSpotiv_id`) REFERENCES `abonamente_sportivi` (`id`),
  ADD CONSTRAINT `istoric_antrenament_ibfk_3` FOREIGN KEY (`tipAntrenament_id`) REFERENCES `tip_antrenament` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

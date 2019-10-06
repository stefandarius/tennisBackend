-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2019 at 10:40 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fit_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `judete`
--

DROP TABLE IF EXISTS `judete`;
CREATE TABLE IF NOT EXISTS `judete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nume` (`nume`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judete`
--

INSERT INTO `judete` (`id`, `nume`) VALUES
(1, 'Alba\r'),
(2, 'Arad\r'),
(3, 'Arges\r'),
(4, 'Bacau\r'),
(5, 'Bihor\r'),
(6, 'Bistrita Nasaud\r'),
(7, 'Botosani\r'),
(8, 'Braila\r'),
(9, 'Brasov\r'),
(10, 'Bucuresti Ilfov\r'),
(11, 'Buzau\r'),
(12, 'Calarasi\r'),
(13, 'Caras Severin\r'),
(14, 'Cluj\r'),
(15, 'Constanta\r'),
(16, 'Covasna\r'),
(17, 'Dambovita\r'),
(18, 'Dolj\r'),
(19, 'Galati\r'),
(20, 'Giurgiu\r'),
(21, 'Gorj\r'),
(22, 'Harghita\r'),
(23, 'Hunedoara\r'),
(24, 'Ialomita\r'),
(25, 'Iasi\r'),
(26, 'Maramures\r'),
(27, 'Mehedinti\r'),
(28, 'Mures\r'),
(29, 'Neamt\r'),
(30, 'Olt\r'),
(31, 'Prahova\r'),
(32, 'Salaj\r'),
(33, 'Satu Mare\r'),
(34, 'Sibiu\r'),
(35, 'Suceava\r'),
(36, 'Teleorman\r'),
(37, 'Timis\r'),
(38, 'Tulcea\r'),
(39, 'Valcea\r'),
(40, 'Vaslui\r'),
(41, 'Vrancea');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

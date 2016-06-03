-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2016 at 05:07 AM
-- Server version: 5.7.12
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spirala4baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autorId` int(11) DEFAULT NULL,
  `novostId` int(11) DEFAULT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_slovenian_ci,
  PRIMARY KEY (`id`),
  KEY `autorId` (`autorId`),
  KEY `novostId` (`novostId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `komentari`
--


-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`) VALUES
(1, 'admin', 'http://localhost:9999/wt%20zadaca/kontakt.php');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(20) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `autorId` int(11) NOT NULL,
  `datum` date NOT NULL,
  `imaNovost` tinyint(1) NOT NULL,
  `slika` varchar(100) CHARACTER SET utf16 COLLATE utf16_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `autorId` (`autorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `novosti`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`autorId`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `komentari_ibfk_2` FOREIGN KEY (`novostId`) REFERENCES `novosti` (`id`);

--
-- Constraints for table `novosti`
--
ALTER TABLE `novosti`
  ADD CONSTRAINT `novosti_ibfk_1` FOREIGN KEY (`autorId`) REFERENCES `korisnici` (`id`);

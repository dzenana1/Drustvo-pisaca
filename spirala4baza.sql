-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 12:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'miljenko', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `autorId` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imaNovost` tinyint(1) NOT NULL DEFAULT '0',
  `slika` varchar(200) CHARACTER SET utf16 COLLATE utf16_slovenian_ci DEFAULT NULL,
  `DostupniKomentari` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `autorId` (`autorId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`id`, `naslov`, `text`, `autorId`, `datum`, `imaNovost`, `slika`, `DostupniKomentari`) VALUES
(2, 'Sarajevski dani poezije: Burić, Hajdarević, Musabegović i Stojić podnijeli ostavke', 'Pjesnici Ahmed Burić, Hadžem Hajdarević, Senadin Musabegović i Mile Stojić uputili su javno pismo Predsjedništvu Društva pisaca Bosne i Hercegovine u kojem podnose ostavke na članstvo u Programskom savjetu Sarajevskih dana poezije.', 2, '2016-06-04 10:34:58', 0, 'http://www.mojportal.ba/slike/novosti/AAA%20SHOWBIZ/KULTURA/pisanje1.jpg', b'0'),
(5, 'Nova knjiga Abdulaha Sidrana', '“Oranje mora” naziv je nove knjige akademika Abdulaha Sidrana, koju je prije dva dana objavila izdavačka kuća “Buybook“.  Knjiga donosi polemičke tekstove – ona je zbirka odabranih Sidranovih kolumni, njih 90-tak  iz rubrike “Na granici“, u kojima je ovaj pjesnik, dramski pisac, scenarist i putopisac, potpuno razvio specifičan novinski izraz.<br>\r\n        Knjiga govori o (be)smislu društvenog angažmana u našim prilikama, u kojima je pisanje novinskih komentara na političke i druge događaje ravan oranju mora. U Sidranovom iskustvu borba za socijalnu pravdu, za bolje odnose među stvaraocima je poražavajuća, i predugo traje.', 2, '2016-06-06 11:42:40', 0, 'http://www.sarajevotimes.com/wp-content/uploads/2013/03/sidran.jpg', b'1'),
(6, 'Tribina "Ko kaže da se poezija ne čita"', 'U srijedu 23.3.2016 će se održati tribina pod nazivom "Ko kaže da se poezija ne čita". Tribina će se održati u prostorijama Nacionalne biblioteke u Sarajevu sa početkom u 16:00 sati. Na tribini će se obratiti poznati bosanskohercegovački književnik Abdulah Sidran kao i ostali bh književnici. Molimo sve zainteresovane da rezervišu svoje mjesto na br.telefona: 033/628-546 ili putem maila drustvo@drustvopisaca.com. Nadamo se da će se što veći broj nasših čitatelja odazvati.', 2, '2016-06-06 11:42:40', 0, 'http://www.haber.ba/files/pictures/2013_august/Abdulah_Sidran_674839129.jpg', b'1'),
(16, 'Proba', 'Ovo je testiranje. ', 2, '2016-06-06 12:40:31', 0, 'http://cms.ysu.edu/sites/default/files/images/web-ysu/Testing_in_Progress.gif', b'1');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

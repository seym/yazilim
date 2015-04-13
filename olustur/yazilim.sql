-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2014 at 08:26 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yazilim`
--
CREATE DATABASE IF NOT EXISTS `yazilim` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yazilim`;

-- --------------------------------------------------------

--
-- Table structure for table `makale`
--

CREATE TABLE IF NOT EXISTS `makale` (
  `makele_id` int(11) NOT NULL AUTO_INCREMENT,
  `yukleyen` varchar(45) NOT NULL,
  `konu` varchar(45) NOT NULL,
  `yol` varchar(255) NOT NULL,
  `zaman` varchar(45) DEFAULT NULL,
  `ozeti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`makele_id`),
  KEY `fk_makale_uyeler1` (`yukleyen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `makale`
--

INSERT INTO `makale` (`makele_id`, `yukleyen`, `konu`, `yol`, `zaman`, `ozeti`) VALUES
(58, 'a', 'uu', 'klasor/dosyalar/1OgretimVizeNotlari.pdf', '05.19.14', 'uu'),
(59, 'a', 'aaa', 'klasor/dosyalar/1OgretimVizeNotlari.pdf', '05.19.14', 'aaa'),
(60, 'a', 'sdsd', 'klasor/dosyalar/12.gulsoy.pdf', '05.19.14', 'dsds'),
(61, 'a', 'dfdfd', 'klasor/dosyalar/Egitsel_Yazilim_Grup_Projesi.pdf', '05.19.14', 'dfd');

-- --------------------------------------------------------

--
-- Table structure for table `mesajlar`
--

CREATE TABLE IF NOT EXISTS `mesajlar` (
  `kimden` varchar(45) NOT NULL,
  `kime` varchar(45) NOT NULL,
  `mesaj` text NOT NULL,
  `durum` tinyint(1) NOT NULL DEFAULT '0',
  `tarih` datetime NOT NULL,
  PRIMARY KEY (`kimden`,`kime`),
  KEY `fk_mesajlar_uyeler2` (`kime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `puan`
--

CREATE TABLE IF NOT EXISTS `puan` (
  `kullanici` varchar(50) NOT NULL,
  `makale` int(11) NOT NULL,
  `puan` int(11) NOT NULL,
  PRIMARY KEY (`kullanici`,`makale`),
  KEY `makale` (`makale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `puan`
--

INSERT INTO `puan` (`kullanici`, `makale`, `puan`) VALUES
('a', 58, 6),
('a', 59, 7),
('a', 61, 8);

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `kullanici_id` varchar(45) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `ad` varchar(45) NOT NULL,
  `ikinci_ad` varchar(45) DEFAULT NULL,
  `soyad` varchar(45) NOT NULL,
  `e_posta` varchar(45) NOT NULL,
  `soru` varchar(45) NOT NULL,
  `cevap` varchar(45) NOT NULL,
  `il` varchar(45) DEFAULT NULL,
  `egitim` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`kullanici_id`, `sifre`, `ad`, `ikinci_ad`, `soyad`, `e_posta`, `soru`, `cevap`, `il`, `egitim`) VALUES
('a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'a', 'a', 'a', 'k@hotmail.com', 'a', 'a', 'a', 'a'),
('internet', 'parola', 'ahmet', 'feyazi', 'satıcı', 'kral_sezgin_1905@hotmail.com', 'aaaa', 'aaaa', 'aaaa', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `yorum`
--

CREATE TABLE IF NOT EXISTS `yorum` (
  `yapan` varchar(45) NOT NULL,
  `makale` int(11) NOT NULL,
  `tarih` datetime NOT NULL,
  `yorum` varchar(255) NOT NULL,
  PRIMARY KEY (`yapan`,`makale`,`tarih`),
  KEY `makale_idd` (`makale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yorum`
--

INSERT INTO `yorum` (`yapan`, `makale`, `tarih`, `yorum`) VALUES
('a', 58, '2014-05-19 23:04:15', 'dsdsd<br>'),
('a', 60, '2014-05-19 23:00:34', 'rfgfg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD CONSTRAINT `fk_mesajlar_uyeler1` FOREIGN KEY (`kimden`) REFERENCES `uyeler` (`kullanici_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mesajlar_uyeler2` FOREIGN KEY (`kime`) REFERENCES `uyeler` (`kullanici_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `puan`
--
ALTER TABLE `puan`
  ADD CONSTRAINT `puan_ibfk_1` FOREIGN KEY (`makale`) REFERENCES `makale` (`makele_id`),
  ADD CONSTRAINT `puan_ibfk_2` FOREIGN KEY (`kullanici`) REFERENCES `uyeler` (`kullanici_id`);

--
-- Constraints for table `yorum`
--
ALTER TABLE `yorum`
  ADD CONSTRAINT `fk_uyeler_has_makale_uyeler1` FOREIGN KEY (`yapan`) REFERENCES `uyeler` (`kullanici_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `makale_idd` FOREIGN KEY (`makale`) REFERENCES `makale` (`makele_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

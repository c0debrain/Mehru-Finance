-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2015 at 09:53 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1-log
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pset7`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) NOT NULL,
  `type` enum('BUY','SELL') COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(64) NOT NULL,
  `price` decimal(65,4) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `type`, `symbol`, `shares`, `price`, `datetime`) VALUES
(1, 'BUY', 'AAPL', 2, 128.4600, '2015-03-01 02:13:03'),
(1, 'SELL', 'AAPL', 2, 128.4600, '2015-03-01 02:15:21'),
(2, 'BUY', 'YHOO', 100, 44.2800, '2015-03-01 02:15:49'),
(1, 'BUY', 'MSFT', 10, 43.8500, '2015-03-01 02:16:35'),
(1, 'BUY', 'FREE', 1000, 0.0850, '2015-03-01 02:30:11'),
(1, 'BUY', 'FB', 10, 78.9700, '2015-03-01 02:42:32'),
(1, 'BUY', 'FB', 10, 78.9700, '2015-03-01 02:42:41'),
(12, 'BUY', 'AAPL', 3, 128.4600, '2015-03-01 02:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(64) NOT NULL,
  PRIMARY KEY (`id`,`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `symbol`, `shares`) VALUES
(1, 'FB', 20),
(1, 'FREE', 1000),
(1, 'MSFT', 10),
(2, 'YHOO', 100),
(12, 'AAPL', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `cash`) VALUES
(1, 'Himanshu', '$1$AufG8zbK$DzRDOIFY0/RZvHDT87Xm/1', 7897.1000),
(2, 'Kayla', '$1$8/zTTqOf$/t730PbXiTDLuJeY6RbfG/', 5572.0000),
(12, 'skroob', '$1$EsALczWr$ge2hxrz0/RjctgvvmZ.dL/', 9614.6200);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2017 at 03:47 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tst123`
--

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(90) NOT NULL AUTO_INCREMENT,
  `userID` int(8) NOT NULL,
  `name` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `Address` varchar(90) NOT NULL,
  `Phone` varchar(90) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `userID`, `name`, `email`, `Address`, `Phone`) VALUES
(1, 1, 'ewrrwerw', 'subrata@gmail.com', 'werwerwe', '213123123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Jaggesher', 'jaggesher14@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

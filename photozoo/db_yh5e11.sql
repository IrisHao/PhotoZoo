-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2013 at 01:10 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_yh5e11`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `name` varchar(55) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `user_id`, `timestamp`, `name`, `description`) VALUES
(35, 16, 1359388984, 'alex', 'alex'),
(38, 1, 1359509073, 'myalbum', 'myalbum');

-- --------------------------------------------------------

--
-- Table structure for table `cwusers`
--

CREATE TABLE IF NOT EXISTS `cwusers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `imagelocation` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `cwusers`
--

INSERT INTO `cwusers` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `active`, `imagelocation`) VALUES
(1, 'Yilin', '912ec803b2ce49e4a541068d495ab570', 'Yilin', 'Hao', 'iris_how@hotmail.com', 0, 'images/Koala.jpg'),
(16, 'Alex', '6a204bd89f3c8348afd5c77c717a097a', 'Alex', 'Tanner', 'yh5e11@soton.ac.uk', 0, 'images/images1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ext` varchar(4) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `user_id`, `album_id`, `timestamp`, `ext`) VALUES
(6, 16, 35, 1359388993, 'jpg'),
(23, 1, 38, 1359509244, 'jpg'),
(24, 1, 38, 1359509334, 'jpg'),
(25, 1, 38, 1359510504, 'jpg'),
(27, 1, 38, 1359554567, 'jpg'),
(29, 1, 38, 1359646363, 'jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2012 at 09:15 AM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bragem`
--

-- --------------------------------------------------------

--
-- Table structure for table `playgrounds`
--

CREATE TABLE IF NOT EXISTS `playgrounds` (
  `ground_id` int(11) NOT NULL AUTO_INCREMENT,
  `ground_name` varchar(200) DEFAULT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `sport` varchar(200) NOT NULL,
  `area` varchar(200) DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ground_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `playgrounds`
--

INSERT INTO `playgrounds` (`ground_id`, `ground_name`, `latitude`, `longitude`, `sport`, `area`, `place`, `state`, `country`) VALUES
(2, NULL, 17.386346, 78.490773, 'Cricket', 'St Pauls School', 'Kachiguda', 'Andhra Pradesh', 'India'),
(3, NULL, 17.389430, 78.503106, 'Cricket', 'KCG Ground', 'Kachiguda', 'Andhra Pradesh', 'India'),
(4, NULL, 17.389279, 78.500690, 'Football', 'Railway Station Ground', 'Kachiguda', 'Andhra Pradesh', 'India'),
(5, NULL, 17.391393, 78.518709, 'Volley Ball', 'MCH Ground', 'Ambarpet', 'Andhra Pradesh', 'India'),
(6, NULL, 17.391027, 78.518400, 'Swimming', 'MCH Ground', 'Ambarpet', 'Andhra Pradesh', 'India'),
(7, NULL, 17.389566, 78.519996, 'Parade', 'CPL', 'Ambarpet', 'Andhra Pradesh', 'India'),
(8, NULL, 17.244576, 78.438230, 'Kabaddi', 'Airport Road', 'Mamidpalli', 'Andhra Pradesh', 'India'),
(18, NULL, 17.385894, 78.488313, 'Cricket', 'Kacheguda', 'Kachiguda', 'Andhra Pradesh', 'India'),
(19, NULL, 17.386058, 78.488624, 'Cricket', 'Local', 'Kachiguda', 'Andhra Pradesh', 'India'),
(20, NULL, 17.515874, 78.394001, 'undefined', 'Pragathi Nagar, Hyderabad', 'NizÄmpet', 'Andhra Pradesh', 'India'),
(25, NULL, 17.485724, 78.386507, 'Volley Ball', 'KPHB 6th Phase', 'KaithaiÄpur', 'Andhra Pradesh', 'India'),
(26, NULL, 17.384962, 78.487272, 'Running', 'Koti Junction', 'Kachiguda', 'Andhra Pradesh', 'India'),
(27, NULL, 12.974418, 77.633063, 'Badminton', 'ESI Hospital', 'Jogupalya', 'KarnÄtaka', 'India'),
(30, NULL, 12.989347, 77.583764, 'Golf', 'Near Hotel Lalit Ashok', 'Seshadripuram', 'KarnÄtaka', 'India'),
(31, NULL, 17.386344, 78.487047, 'Kho Kho', 'Koti', 'Kachiguda', 'Andhra Pradesh', 'India'),
(32, NULL, 12.959689, 77.720583, 'Football', 'BEML Layout', 'Brookefield', 'KarnÄtaka', 'India');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

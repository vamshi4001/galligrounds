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
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `login`, `passwd`) VALUES
(1, 'Jatinder', 'Thind', 'phpsense', 'ba018360fc26e0cc2e929b8e071f052d'),
(2, 'Vamshi', 'V', 'vamshi4001', 'adcc4d304f0a30cc4ffa9aa750345150'),
(3, 'Jing', 'Jang', 'jing', 'd92db81c5b5bbd6d68911d01a8d15e91'),
(4, 'pradyumna', 'd', 'prady', '8638f4c93aa029f2fe07a0234c676157'),
(5, 'gopal', 'reddy', 'gopal', 'adcc4d304f0a30cc4ffa9aa750345150'),
(6, 'Guest', 'User', 'guestuser', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 'Pradyumna', 'Doddala', 'pradyumnad', '3d294fa8e67e90b490618493494f950c'),
(8, 'Naveen Kumar', 'V', 'navcode', '149658319c0bd43352840f1a054b8fb3'),
(9, 'Ram', 'kumar', 'bytechip', 'd0763edaa9d9bd2a9516280e9044d885'),
(10, 'kumba', 'dumba', 'kumba', '7cd534d396546a50ddd2dea9ee7f9145'),
(11, 'Madhusudhan', 'Dollu', 'madhu', '75a1875758571de17cacf4a490e0b8e5'),
(12, 'Saurabh', 'Sahni', 'saurabhsahni', '149658319c0bd43352840f1a054b8fb3'),
(13, 'chaitanya kanth', 'vadlapudi', 'chaitu0406', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'Pravarthika', 'Kumar', 'pravar', '958603b0db33bcf523df2139aca9b7c3'),
(15, 'Kapil', 'Ratnani', 'kapilratnani', '5f878d68e300971508d5f47621c90612'),
(16, 'Aravind', 'Suresh', 'aravchr', '3fcccaed78dc5745f3f374e0703d84eb'),
(17, 'Kiran', 'Kumar', 'pvkirankumar', '7063386be97913f2814c9989486593d6'),
(18, 'Kishore', 'Vaddadi', 'kishorevaddadi07@gmail.com', 'fde8fdb7dc4e2b9bbce610ecc6a51ae8');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

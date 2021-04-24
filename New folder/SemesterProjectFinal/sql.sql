-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 02:52 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `script`
--
CREATE DATABASE IF NOT EXISTS `script` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `script`;

-- --------------------------------------------------------


--
-- Table structure for table `friendship`
--

CREATE TABLE IF NOT EXISTS `friendship` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` varchar(30) NOT NULL,
  `sender` varchar(30) NOT NULL,
  PRIMARY KEY (`friend_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`friend_id`, `receiver`, `sender`) VALUES
(18, '15', '11'),
(19, '14', '11');



--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `secondname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `day` varchar(100) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` varchar(100) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstname`, `secondname`, `email`, `sex`, `password`, `day`, `month`, `year`) VALUES
(13, 'derick', 'yuut', 'demi@gmail.com', '', 'mmmm', '', '', ''),
(12, 'loyd', 'sfsfsf', 'same@gmail.com', '', 'mmmm', '', '', ''),
(11, 'loyd', 'meet', 'lano@gmail.com', '', 'mmmm', '', '', ''),
(14, 'loo', 'uuu', 'mmm', '', 'mmmm', '', '', ''),
(15, 'oooo', 'oooo', 'meel@gmail.com', '', 'mmmm', '', '', ''),
(16, 'uyyyy', 'hhgff', 'syvie@gmai.com', '', 'mmmm', '', '', ''),
(17, 'yyyt', 'ggf', 'syvie@gmai.com', '', 'mmmm', '', '', ''),
(18, 'looff', 'tttt', 'mike@gmail.com', 'male', 'mmmm', '4', '6', '2000'),
(19, 'madrid', 'ronaldo', 'madrid@gmail.com', '', 'mmmm', '', '', ''),
(20, 'jones', 'milma', 'jones@gmail.com', 'female', 'mmmm', '12', '2', '1991'),
(21, 'duke', 'mike', 'mike@gmail.com', '', 'mmmm', '', '', ''),
(22, 'huu', 'deek', 'deek@gmail.com', 'male', 'mmmm', '3', '333', '21');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;



--
-- Table structure for table `myfriends`
--

CREATE TABLE IF NOT EXISTS `myfriends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `myid` varchar(30) NOT NULL,
  `myfriends` varchar(30) NOT NULL,
  PRIMARY KEY (`friend_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `myfriends`
--

INSERT INTO `myfriends` (`friend_id`, `myid`, `myfriends`) VALUES
(5, '11', '16');

-- --------------------------------------------------------

;

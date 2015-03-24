-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2013 at 05:08 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `labtr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `id` varchar(15) NOT NULL,
  `passwd` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `passwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `lab_tbl`
--

CREATE TABLE IF NOT EXISTS `lab_tbl` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `labno` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `extra` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `labno` (`labno`),
  UNIQUE KEY `username` (`username`),
  KEY `username_2` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `lab_tbl`
--

INSERT INTO `lab_tbl` (`id`, `labno`, `username`, `password`, `extra`) VALUES
(18, 1, 'li1', 'li1lt', 'none'),
(20, 2, 'li2', 'li2lt', 'none'),
(21, 3, 'li3', 'li3lt', 'none'),
(22, 5, 'li5', 'li5lt', 'none'),
(23, 8, 'li8', 'li8lt', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `report_tbl`
--

CREATE TABLE IF NOT EXISTS `report_tbl` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `labno` int(2) NOT NULL,
  `pcno` int(2) NOT NULL,
  `submitter` varchar(15) NOT NULL,
  `priority` varchar(10) NOT NULL DEFAULT 'low',
  `type` varchar(10) NOT NULL,
  `resolvedate` datetime NOT NULL,
  `solver` varchar(10) NOT NULL DEFAULT 'none',
  `li_comment` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `id` varchar(15) NOT NULL,
  `passwd` varchar(40) NOT NULL,
  `Type` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `passwd`, `Type`) VALUES
('admin', 'admin', 3),
('li1', 'li1lt', 2),
('li2', 'li2lt', 2),
('li3', 'li3lt', 2),
('li5', 'li5lt', 2),
('li8', 'li8lt', 2),
('user', 'user1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

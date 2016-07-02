-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2016 at 01:52 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2016_video`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `show_password` varchar(255) NOT NULL DEFAULT '',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `img_name` varchar(200) NOT NULL,
  `user_type` enum('A','U') NOT NULL DEFAULT 'U',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `phone`, `email`, `username`, `password`, `show_password`, `status`, `img_name`, `user_type`) VALUES
(1, 'Ranjan Adhikari', '', 'adh.ranjan@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1', 'ranjan-adhikari-1.jpg', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coursemenu`
--

CREATE TABLE IF NOT EXISTS `tbl_coursemenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_coursemenu`
--

INSERT INTO `tbl_coursemenu` (`id`, `title`, `status`) VALUES
(6, 'Java', '1'),
(8, 'Php', '1'),
(9, 'Python', '1'),
(10, 'C# with  .Net', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general`
--

CREATE TABLE IF NOT EXISTS `tbl_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(200) NOT NULL DEFAULT '',
  `twitter` varchar(200) NOT NULL DEFAULT '',
  `linkedin` varchar(200) NOT NULL DEFAULT '',
  `youtube` varchar(200) NOT NULL DEFAULT '',
  `google` text NOT NULL,
  `email` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_general`
--

INSERT INTO `tbl_general` (`id`, `facebook`, `twitter`, `linkedin`, `youtube`, `google`, `email`) VALUES
(1, 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.linkedin.com', 'https://www.youtube.com/channel/UCXmhD_K3ffTjRej8NFJOLIQ', 'https://plus.google.com', 'adh.ranjan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_series`
--

CREATE TABLE IF NOT EXISTS `tbl_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `episode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_series`
--

INSERT INTO `tbl_series` (`id`, `course_id`, `youtube`, `episode`) VALUES
(5, '8', 'in2jdLqe8YA', 2),
(6, '6', 'in2jdLqe8YA', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `firstname`, `username`, `password`, `phone`, `address`, `img_name`, `dateofbirth`, `occupation`, `institute`, `description`, `status`) VALUES
(1, 'Ranjan', 'sagarmatha', '12', '9860097769', 'kapan', 'ranjan-1.jpg', '889798', 'sdajgh', '', 'jkjhkj', ''),
(3, 'Micker', 'sgdajhg', 'g', 'hjg', 'jhg', '', 'jhgjh', 'gjhgjh', '', 'gjh', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

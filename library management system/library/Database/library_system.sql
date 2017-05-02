-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 05:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(50) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(50) NOT NULL,
  `Author` text NOT NULL,
  `book_category` varchar(50) NOT NULL,
  `no_copies` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  UNIQUE KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `Author`, `book_category`, `no_copies`, `status`) VALUES
(1, 'Programming PHP', 'Kevin Tatroe', 'COMPUTER', '19', 'available'),
(2, 'Computer Graphics', 'Foley', 'COMPUTER', '20', 'available'),
(3, 'Numerical Analysis', 'R Chada', 'MATHEMATICS', '1', 'available'),
(4, 'Principles of accounting', 'Maheshwari', 'COMMERCE', '5', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE IF NOT EXISTS `borrowers` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `date_borrow` varchar(100) NOT NULL,
  `date_will_return` varchar(100) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `no_copies` int(20) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id` int(7) NOT NULL,
  `name` text NOT NULL,
  `book` text NOT NULL,
  `author` text NOT NULL,
  `category` text NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `book`, `author`, `category`, `status`) VALUES
(123456, 'anuj', 'maths', 'maheswari', 'MATHEMATICS', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_books`
--

CREATE TABLE IF NOT EXISTS `reserve_books` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `date_tobe_borrow` varchar(50) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `no_copies` varchar(50) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reserve_books`
--

INSERT INTO `reserve_books` (`transaction_id`, `id_number`, `name`, `course`, `year`, `section`, `date_tobe_borrow`, `book_title`, `no_copies`) VALUES
(1, '123456', 'anuj', 'BCA', 'I', 'A', '2016-04-19', 'Programming PHP', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `username`, `password`) VALUES
(1, 'administrator', 'administrator', 123450),
(2, 'sahil', 'sahil1122', 789000),
(3, 'anuj', 'anuj0822', 123456);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

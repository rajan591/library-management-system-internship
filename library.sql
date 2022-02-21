-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2019 at 02:49 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `contact`, `pic`) VALUES
(1, 'admin ', 'admin', 'admin', 'admin123', 'admin@admin.com', '98776543', 'download.png'),
(5, 'paras', 'paras1234', 'paras', 'paras123', 'parasmishra428@email.com', '123456723456', '5d61e46ad3db5_66712954_1279031078922276_7792151791226847232_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `quantity` int(100) NOT NULL,
  `DepartmentID` int(100) DEFAULT NULL,
  PRIMARY KEY (`bid`),
  UNIQUE KEY `bid` (`bid`),
  KEY `DepartmentID` (`DepartmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `DepartmentID`) VALUES
(1, 'Doshi Chasma of BP', 'Biseswor prasad Koirala', '3rd', 1, 99, 1),
(4, 'Scripting Language', 'Basanta Chapagain', '1St', 1, 15, 1),
(6, 'doshi chasma ko', 'BP koirala', '3rd', 1, 698, 7),
(54, '.net ho', '.net author', '2nd edition', 1, 55, NULL),
(95, 'new nepal', 'Ram kaji', '1st', 0, 44, NULL),
(111, 'rajan', '.net author', '2nd', 1, 89, NULL),
(143, 'php', 'monika', '1st', 1, 78, NULL),
(912, 'rajan', 'dedef', '2nd', 0, 3, NULL),
(919, 'Jay Bhudi', 'Rajesh Hamal', '1st', 1, 55, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_department`
--

DROP TABLE IF EXISTS `book_department`;
CREATE TABLE IF NOT EXISTS `book_department` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `bid` int(6) DEFAULT NULL,
  `departmentID` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bid` (`bid`,`departmentID`),
  KEY `departmentID` (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_department`
--

INSERT INTO `book_department` (`id`, `bid`, `departmentID`) VALUES
(1, 54, 1),
(3, 54, 1),
(2, 54, 3),
(4, 54, 3),
(11, 95, 1),
(5, 111, 3),
(6, 111, 7),
(10, 143, 3),
(7, 912, 1),
(9, 919, 7);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`) VALUES
(27, 'rajan', 'Good morning Admin. Can i visit library in sunday morning');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `DepartmentID` int(11) NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`DepartmentID`),
  KEY `DepartmentID` (`DepartmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'BCA'),
(3, 'Physics1'),
(4, 'Education'),
(7, 'Arts'),
(23, 'micto biology');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

DROP TABLE IF EXISTS `fine`;
CREATE TABLE IF NOT EXISTS `fine` (
  `username` varchar(255) NOT NULL,
  `bid` int(100) NOT NULL,
  `returned` varchar(100) NOT NULL,
  `day` int(50) NOT NULL,
  `fine` double NOT NULL,
  `status` varchar(100) NOT NULL,
  KEY `username` (`username`),
  KEY `bid` (`bid`),
  KEY `bid_2` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`username`, `bid`, `returned`, `day`, `fine`, `status`) VALUES
('admin', 6, '2019-12-01', 11, 1.1, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

DROP TABLE IF EXISTS `issue_book`;
CREATE TABLE IF NOT EXISTS `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `name` varchar(25) NOT NULL,
  `request_date` datetime DEFAULT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL,
  KEY `username` (`username`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `bid`, `name`, `request_date`, `approve`, `issue`, `return`) VALUES
('admin', 6, 'doshi chasma a', '2019-12-01 13:03:30', '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2019-11-01', '2019-11-20'),
('admin', 111, 'rajan', '2019-12-01 13:03:35', '', '', ''),
('rajan', 6, 'doshi chasma a', '2019-12-03 13:32:00', 'yes', '2019-12-03', '2019-12-10'),
('rajan', 4, 'Scripting Language', '2019-12-03 13:32:34', '', '', ''),
('admin', 95, 'new nepal', '2019-12-03 14:32:02', 'no', '2019-12-05', '2019-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first`, `last`, `username`, `password`, `roll`, `email`, `contact`, `pic`) VALUES
('parass', 'paras', 'admin', 'admin', 2, 'admin@paras.com', '1234567897', 'tuu.png'),
('rajan', 'pandey', 'rajan', 'rajan', 1, 'rajan12@gmail.com', '9818532288', 'download.png'),
('rajan', 'pandey', 'rajan bahadur', 'rajanbahadur', 24, 'rajanpandey591@gmail.com', '9818532288', '5de265f9ed62f_download.png'),
('rajan bahadur', 'rajan', 'rajan123', 'asdfgh', 1111, 'rajan@gmail.com', '1234235472359', 'download.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);

--
-- Constraints for table `book_department`
--
ALTER TABLE `book_department`
  ADD CONSTRAINT `book_department_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `department` (`DepartmentID`),
  ADD CONSTRAINT `book_department_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `books` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

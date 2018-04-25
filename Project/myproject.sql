-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2018 at 10:19 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) NOT NULL,
  `tot` varchar(50) NOT NULL,
  `roll` int(100) NOT NULL,
  `marks` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `subject_name`, `tot`, `roll`, `marks`) VALUES
(49, 'IT-318 Advanced Coding Techniques Lab', '50', 54, '38'),
(48, 'IT-319 Microwave and Satellite Communication Lab', '50', 54, '36'),
(47, 'IT-316 Multimedia Lab', '50', 54, '46'),
(46, 'IT-315 Microwave and Satellite Communication', '50', 54, '42'),
(44, 'IT-313 Introduction to Coding Techniques', '50', 54, '30'),
(39, 'IT-311 Multimedia', '50', 54, '43'),
(42, 'IT-312 Software Engineering', '50', 54, '45'),
(45, 'IT-604 Theory Of Computation', '50', 54, '40');

-- --------------------------------------------------------

--
-- Table structure for table `studentdb`
--

DROP TABLE IF EXISTS `studentdb`;
CREATE TABLE IF NOT EXISTS `studentdb` (
  `Roll_Number` varchar(50) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(150) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdb`
--

INSERT INTO `studentdb` (`Roll_Number`, `First_Name`, `Last_Name`, `Email`, `Password`) VALUES
('4564', 'ghch', 'jhbjbh', 'nishantnishad4@gmail.com', 'e9d86e939586740e628945ebffd47c47'),
('54', 'dhg', 'vgjhgc', 'sahilbidlan@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `teacherdb`
--

DROP TABLE IF EXISTS `teacherdb`;
CREATE TABLE IF NOT EXISTS `teacherdb` (
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherdb`
--

INSERT INTO `teacherdb` (`First_Name`, `Last_Name`, `Username`, `Email`, `Password`) VALUES
('sahil', 'bidlan', 'sb', 'sb@gmail.com', 'a684eceee76fc522773286a895bc8436'),
('sahil', 'bidlan', 'hipster', 'sahilbidlan@gmail.com', 'ec1c465aa52c3e962778e3c29b5fdb4d');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

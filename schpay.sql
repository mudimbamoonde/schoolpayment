-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2019 at 10:39 AM
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
-- Database: `schpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(50) NOT NULL AUTO_INCREMENT,
  `studentID` varchar(150) NOT NULL,
  `amountPaid` varchar(100) DEFAULT NULL,
  `term` int(10) NOT NULL,
  `paymentType` varchar(100) NOT NULL,
  `receiptBatchNumber` text,
  `description` text,
  `attachment` text,
  `dateOfPayments` date NOT NULL,
  `statusApproval` varchar(11) NOT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `studentID`, `amountPaid`, `term`, `paymentType`, `receiptBatchNumber`, `description`, `attachment`, `dateOfPayments`, `statusApproval`) VALUES
(1, '1', '1200', 1, 'School Fee', '29890710857', 'Registrations, meal', 'How To Make An Ethernet Cable - Simple Instructions.pdf', '2019-07-04', 'rejected'),
(2, '1', '9201', 2, 'School Fee', '23173691873', 'Registration', 'Candidate Registration Schedule Combined (SSA)_Interactive_PDF.pdf', '2019-07-04', 'pending'),
(3, '2', '1200', 1, 'School Fee', '23173691873', 'Registration, meals', 'Candidate Registration Schedule Combined (SSA)_Interactive_PDF.pdf', '2019-07-04', 'approved'),
(4, '1', '200', 1, 'Exams', '131308301', 'Exams', 'The Python Standard Library â€” Python 3.7.1 documentation.pdf', '2019-07-04', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sn` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `grade` enum('1','2','3','4','5','6','7','8','9','10','11','12') DEFAULT NULL,
  `class` varchar(100) NOT NULL,
  `address` text,
  `account` int(11) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sn`, `firstName`, `surname`, `dob`, `grade`, `class`, `address`, `account`) VALUES
(1, 'Mudimba', 'Headson', '2019-06-25', '10', 'A', 'MKUSHI', 1),
(2, 'Moonga', 'kelvin', '2019-06-25', '10', 'A', 'MKUSHI', 1),
(3, 'Linda', 'Kamuti', '1966-12-22', '11', 'C', 'Kalingalinga, kamploops road lusaka', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `accountLevel` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstName`, `surname`, `email`, `mobile`, `password`, `accountLevel`, `username`, `status`) VALUES
(1, 'Mudimba', 'Headson', 'n/a', 0, '41b7fa1956f021a54f3c290ec60e469c', 'student', '1', 1),
(2, 'Nyondo', 'Maria', 'nyondo@gmail.com', 39121, 'ce679f7b3f30a53a18e7cead77c983c9', 'Admin', 'nyodo', 1),
(4, 'Moonga', 'kelvin', 'n/a', 0, '7fde97cf4cf355af302cf9e90cfd701a', 'student', '2', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 03:54 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `payment` (
  `paymentID` int(50) NOT NULL,
  `studentID` varchar(150) NOT NULL,
  `amountPaid` varchar(100) DEFAULT NULL,
  `term` int(10) NOT NULL,
  `paymentType` varchar(100) NOT NULL,
  `receiptBatchNumber` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `dateOfPayments` date NOT NULL,
  `statusApproval` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `studentID`, `amountPaid`, `term`, `paymentType`, `receiptBatchNumber`, `description`, `attachment`, `dateOfPayments`, `statusApproval`) VALUES
(1, '1', '1200', 1, 'School Fee', '29890710857', 'Registrations, meal', 'How To Make An Ethernet Cable - Simple Instructions.pdf', '2019-07-04', 'rejected'),
(2, '1', '9201', 2, 'School Fee', '23173691873', 'Registration', 'Candidate Registration Schedule Combined (SSA)_Interactive_PDF.pdf', '2019-07-04', 'pending'),
(3, '2', '1200', 1, 'School Fee', '23173691873', 'Registration, meals', 'Candidate Registration Schedule Combined (SSA)_Interactive_PDF.pdf', '2019-07-04', 'approved'),
(4, '1', '200', 1, 'Exams', '131308301', 'Exams', 'The Python Standard Library ??\" Python 3.7.1 documentation.pdf', '2019-07-04', 'pending'),
(5, '1', '3133', 1, 'School Fee', '4448557849', 'sc', 'v.PNG', '2021-06-21', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sn` int(10) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `grade` enum('1','2','3','4','5','6','7','8','9','10','11','12') DEFAULT NULL,
  `class` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `account` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sn`, `firstName`, `surname`, `dob`, `grade`, `class`, `address`, `account`) VALUES
(1, 'Linda', 'Mwenesha', '2019-06-25', '10', 'A', 'MKUSHI', 1),
(2, 'Moonga', 'kelvin', '2019-06-25', '10', 'A', 'MKUSHI', 1),
(3, 'Linda', 'Kamuti', '1966-12-22', '11', 'C', 'Kalingalinga, kamploops road lusaka', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(20) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `accountLevel` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstName`, `surname`, `email`, `mobile`, `password`, `accountLevel`, `username`, `status`) VALUES
(1, 'linda', 'Mwenesha', 'n/a', 0, '4880ef2a0d55a5e89538c4150b3a9bae', 'student', '1', 1),
(2, 'Bridget', 'Mwenesha', 'brigetm@gmail.com', 39121, '4880ef2a0d55a5e89538c4150b3a9bae', 'Admin', 'admin', 1),
(4, 'Moonga', 'kelvin', 'n/a', 0, '4880ef2a0d55a5e89538c4150b3a9bae', 'student', '2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

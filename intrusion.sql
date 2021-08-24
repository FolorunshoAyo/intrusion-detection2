-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 02:36 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intrusion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passkey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `firstname`, `lastname`, `email`, `phoneno`, `username`, `passkey`) VALUES
(1, 'Shodiya', 'Folorunsho', 'folushoayomide11@gmail.com', '07087857141', 'folumania', '1');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE `courseregistration` (
  `CourseID` int(11) NOT NULL,
  `CourseTitle` varchar(100) NOT NULL,
  `CourseCode` varchar(10) NOT NULL,
  `CourseUnit` int(11) NOT NULL,
  `AcademicSession` varchar(100) NOT NULL,
  `Semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `client_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `login_attempts` int(11) NOT NULL,
  `successfull_logins` int(11) NOT NULL,
  `failed_login_attempts` int(11) NOT NULL,
  `malicious_attempts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`client_address`, `browser`, `date`, `info`, `login_attempts`, `successfull_logins`, `failed_login_attempts`, `malicious_attempts`) VALUES
('127.0.0.1', 'Google Chrome/92.0.4515.159', 'Monday August 23rd, 2021 - 2:08am', 'Incorrect login details,incorrect password.', 5, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `log_infos`
--

CREATE TABLE `log_infos` (
  `client_address` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `successful_logins` varchar(100) DEFAULT NULL,
  `failed_login_attempts` varchar(100) NOT NULL,
  `malicious_attempts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_infos`
--

INSERT INTO `log_infos` (`client_address`, `date`, `info`, `successful_logins`, `failed_login_attempts`, `malicious_attempts`) VALUES
('127.0.0.1', 'Monday August 23rd, 2021 - 2:08am', 'successfully logged in', '1', '0', '0'),
('127.0.0.1', 'Monday August 23rd, 2021 - 2:08am', 'Incorrect login details,user tried to enter an invalid matric number.', '0', '0', '1'),
('127.0.0.1', 'Monday August 23rd, 2021 - 2:32am', 'Incorrect login details,user tried to enter an invalid matric number.', '0', '0', '2'),
('127.0.0.1', 'Monday August 23rd, 2021 - 2:32am', 'successfully logged in', '2', '0', '0'),
('127.0.0.1', 'Monday August 23rd, 2021 - 2:32am', 'Incorrect login details,incorrect password.', '0', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(11) NOT NULL,
  `PaymentOption` varchar(225) NOT NULL,
  `AcademicSession` varchar(100) NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `ResultID` int(11) NOT NULL,
  `CourseTitle` varchar(100) NOT NULL,
  `CourseCode` varchar(100) NOT NULL,
  `CourseLecturer` varchar(100) NOT NULL,
  `ExamScore` int(11) NOT NULL,
  `CA` int(11) NOT NULL,
  `TotalScore` int(11) NOT NULL,
  `CGPA` int(11) NOT NULL,
  `Semester` varchar(100) NOT NULL,
  `ExamYear` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `matricno` varchar(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `gradelevel` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `images` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `matricno`, `firstname`, `lastname`, `email`, `department`, `gradelevel`, `password`, `images`) VALUES
(1, '1506172120', 'Charles', 'Ofoesuwa', 'sodje.o@gmail.com', 'computer science', 'graduated', '1', 0x2e2e2f696d616765732d66696c65732f736578322e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherID` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `HAddress` varchar(225) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `Qualification` varchar(100) NOT NULL,
  `Experience` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`ResultID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courseregistration`
--
ALTER TABLE `courseregistration`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `ResultID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

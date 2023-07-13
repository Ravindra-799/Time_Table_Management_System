-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 06:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `batch` varchar(15) NOT NULL,
  `year` varchar(4) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `department` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`batch`, `year`, `semester`, `department`) VALUES
('2019', 'III', 'II', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `id`) VALUES
('admin', 'admin', 1),
('', '', 2),
('', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `assigncourse`
--

CREATE TABLE `assigncourse` (
  `course_title` varchar(100) NOT NULL,
  `lecturername` varchar(40) NOT NULL,
  `year` varchar(22) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `department` varchar(22) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigncourse`
--

INSERT INTO `assigncourse` (`course_title`, `lecturername`, `year`, `semester`, `department`, `section`) VALUES
('c#', 'raja', 'III', 'II', 'cse', 'A'),
('c#', 'raja', 'III', 'II', 'cse', 'B'),
('dmdw', 'madhu', 'III', 'II', 'cse', 'A'),
('cis', 'kavarasan', 'III', 'II', 'cse', 'A'),
('cis', 'kavarasan', 'III', 'II', 'cse', 'B'),
('dmdw', 'shima', 'III', 'II', 'cse', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(11) NOT NULL,
  `course_title` varchar(22) NOT NULL,
  `course_code` varchar(22) NOT NULL,
  `department` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `course_title`, `course_code`, `department`) VALUES
(1, ' c#', '712345', 'cse'),
(2, ' php', '123', 'cse'),
(7, ' dmdw', '12345', 'cse'),
(9, ' cis', '1457', 'cse'),
(10, ' coi', '7529', 'cse'),
(11, ' psp', '162626', 'cse'),
(15, ' MAD', '12458', 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `dayid` int(11) NOT NULL,
  `day` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`dayid`, `day`) VALUES
(1, 'MONDAY'),
(2, 'TUESDAY'),
(3, 'WEDNESDAY'),
(4, 'THURSDAY'),
(5, 'FRIDAY'),
(6, 'SATURDAY');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(11) NOT NULL,
  `departmentName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentName`) VALUES
(1, 'cse'),
(2, 'ece'),
(10, 'eee'),
(11, 'civil'),
(12, 'mech'),
(13, 'it');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `lecturerName` varchar(22) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`lecturerName`, `message`) VALUES
('naresh', 'I want to change my period slots from 1 slot to 3rd slot'),
('raja', 'rahhhsjdj');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phonenumber` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(33) NOT NULL,
  `department` varchar(20) NOT NULL,
  `designation` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`firstname`, `lastname`, `username`, `phonenumber`, `email`, `password`, `department`, `designation`) VALUES
('kavarasan', 'g', 'kavarasan', '1234556', 'kavarasan@gmail.com', '12345', 'cse', 'Lecture II'),
('madhusudhan', 'g', 'madhu', '123456', 'madhu@gmail.com', '12345', 'cse', 'Senior Lecture I'),
('naresh', 'k', 'naresh', '9999', 'naresh@gmail.com', '12345', 'cse', 'Senior Lecture I'),
('rajaserkhar', 'reddy', 'raja', '7659993352', 'raja@gmail.com', '12345', 'cse', 'Senior Lecture I'),
('shima', 'nara', 'shima', '333', 'shima@gmail.com', '12345', 'cse', 'Lecture II'),
('sravan kumar reddy', 'm', 'sravan', '9989238', 'sravankumardabbi001@gmail.com', '12345', 'cse', 'Lecture II'),
('subbareddy', 'kunal', 'subbareddy', '9652519382', 'subbareddy@gmail.com', '12345', 'cse', 'Senior Lecture II');

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `pid` int(11) NOT NULL,
  `period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`pid`, `period`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `yearSem` varchar(11) NOT NULL,
  `batch` varchar(15) NOT NULL,
  `section` varchar(15) NOT NULL,
  `period` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `subject` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionid` int(11) NOT NULL,
  `sectionName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionid`, `sectionName`) VALUES
(1, 'A'),
(4, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(12) NOT NULL,
  `username` varchar(22) NOT NULL,
  `phonenumber` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(33) NOT NULL,
  `department` varchar(10) NOT NULL,
  `designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`firstname`, `lastname`, `username`, `phonenumber`, `email`, `password`, `department`, `designation`) VALUES
('ram', 'k', 'rami', '7659993352', 'ksramireddy11@gmail.com', '12345', 'cse', 'Lecture I'),
('suman', 'k', 'suman', '8790336361', 'suman@gmail.com', '12345', 'cse', 'Lecture II');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `firstname` varchar(22) NOT NULL,
  `lastname` varchar(23) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phonenumber` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(33) NOT NULL,
  `year` varchar(10) NOT NULL,
  `branch` varchar(15) NOT NULL,
  `section` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`firstname`, `lastname`, `username`, `phonenumber`, `email`, `password`, `year`, `branch`, `section`) VALUES
('bhadra', 'ch', 'bhadra', '738617374', 'veerabhadra619@gmail.com', '12345', 'III', 'cse', 'B'),
('nani', 'k', 'nani', '7659993352', 'nani@gmail.com', '12345', 'IV', 'cse', 'A'),
('ram', 'k', 'ram', '7659993352', 'ksramireddy11@gmail.com', '12345', 'III', 'cse', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `timeid` int(11) DEFAULT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ttms`
--

CREATE TABLE `ttms` (
  `day` varchar(20) NOT NULL,
  `period` int(11) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `semister` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `lecturername` varchar(25) NOT NULL,
  `course_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttms`
--

INSERT INTO `ttms` (`day`, `period`, `batch`, `year`, `semister`, `department`, `section`, `lecturername`, `course_title`) VALUES
('MONDAY', 1, '2019', 'III', 'II', 'CSE', 'A', 'raja', 'c#'),
('MONDAY', 2, '2019', 'III', 'II', 'CSE', 'A', 'raja', 'c#'),
('THURSDAY', 3, '2019', 'III', 'II', 'CSE', 'A', 'raja', 'c#'),
('MONDAY', 3, '2019', 'III', 'II', 'CSE', 'B', 'raja', 'c#'),
('MONDAY', 3, '2019', 'III', 'II', 'CSE', 'A', 'madhu', 'dmdw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`dayid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`lecturerName`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `dayid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

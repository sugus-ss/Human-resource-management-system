-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2022 at 07:51 AM
-- Server version: 10.3.28-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c3_hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `ATTENDANCE`
--

CREATE TABLE `ATTENDANCE` (
  `employeeID` varchar(11) NOT NULL,
  `timeIn` timestamp NOT NULL DEFAULT current_timestamp(),
  `timeOut` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ATTENDANCE`
--

INSERT INTO `ATTENDANCE` (`employeeID`, `timeIn`, `timeOut`) VALUES
('63070503422', '2022-05-02 01:00:00', '2022-05-02 09:00:00'),
('63070503027', '2022-05-03 01:00:00', '2022-05-03 11:00:00'),
('63070503412', '2022-05-09 01:00:00', '2022-05-09 09:00:00'),
('63070503412', '2022-05-10 01:00:00', '2022-05-10 09:00:00'),
('63070503412', '2022-05-11 01:00:00', '2022-05-11 09:00:00'),
('63070503027', '2022-05-12 01:00:00', '2022-05-12 09:00:00'),
('63070503412', '2022-05-12 01:00:00', '2022-05-12 09:00:00'),
('63070503027', '2022-05-13 01:00:00', '2022-05-13 09:00:00'),
('63070503027', '2022-05-16 01:00:00', '2022-05-16 10:00:00'),
('63070503401', '2022-05-16 01:00:00', '2022-05-16 09:00:00'),
('63070503406', '2022-05-16 01:00:00', '2022-05-16 11:00:00'),
('63070503415', '2022-05-16 01:00:00', '2022-05-16 14:00:00'),
('63070503420', '2022-05-16 01:00:00', '2022-05-16 10:00:00'),
('63070503421', '2022-05-16 01:00:00', '2022-05-16 09:00:00'),
('63070503437', '2022-05-16 01:00:00', '2022-05-16 11:00:00'),
('63070503444', '2022-05-16 01:00:00', '2022-05-16 10:00:00'),
('63070503452', '2022-05-16 01:00:00', '2022-05-16 05:00:00'),
('63070503451', '2022-05-16 09:00:00', '2022-05-16 15:00:00'),
('63070503401', '2022-05-17 01:00:00', '2022-05-17 09:00:00'),
('63070503406', '2022-05-17 01:00:00', '2022-05-17 11:00:00'),
('63070503415', '2022-05-17 01:00:00', '2022-05-17 14:00:00'),
('63070503420', '2022-05-17 01:00:00', '2022-05-17 11:00:00'),
('63070503421', '2022-05-17 01:00:00', '2022-05-17 09:00:00'),
('63070503437', '2022-05-17 01:00:00', '2022-05-17 14:00:00'),
('63070503444', '2022-05-17 01:00:00', '2022-05-17 10:00:00'),
('63070503451', '2022-05-17 01:00:00', '2022-05-17 15:00:00'),
('63070503401', '2022-05-18 01:00:00', '2022-05-18 09:00:00'),
('63070503406', '2022-05-18 01:00:00', '2022-05-18 11:00:00'),
('63070503415', '2022-05-18 01:00:00', '2022-05-18 14:00:00'),
('63070503420', '2022-05-18 01:00:00', '2022-05-18 12:00:00'),
('63070503421', '2022-05-18 01:00:00', '2022-05-18 12:00:00'),
('63070503437', '2022-05-18 01:00:00', '2022-05-18 10:00:00'),
('63070503444', '2022-05-18 01:00:00', '2022-05-18 10:00:00'),
('63070503401', '2022-05-19 01:00:00', '2022-05-19 09:00:00'),
('63070503406', '2022-05-19 01:00:00', '2022-05-19 11:00:00'),
('63070503415', '2022-05-19 01:00:00', '2022-05-19 14:00:00'),
('63070503420', '2022-05-19 01:00:00', '2022-05-19 09:00:00'),
('63070503444', '2022-05-19 01:00:00', '2022-05-19 10:00:00'),
('63070503409', '2022-05-23 01:00:00', '2022-05-23 09:00:00'),
('63070503457', '2022-05-23 01:00:00', '2022-05-23 10:00:00'),
('63070503467', '2022-05-23 01:00:00', '2022-05-23 10:00:00'),
('63070503409', '2022-05-24 01:00:00', '2022-05-24 09:00:00'),
('63070503457', '2022-05-24 01:00:00', '2022-05-24 10:00:00'),
('63070503467', '2022-05-24 01:00:00', '2022-05-24 10:00:00'),
('63070503409', '2022-05-25 01:00:00', '2022-05-25 09:00:00'),
('63070503457', '2022-05-25 01:00:00', '2022-05-25 10:00:00'),
('63070503467', '2022-05-25 01:00:00', '2022-05-25 10:00:00'),
('63070503409', '2022-05-26 01:00:00', '2022-05-26 09:00:00'),
('63070503457', '2022-05-26 01:00:00', '2022-05-26 10:00:00'),
('63070503467', '2022-05-26 01:00:00', '2022-05-26 10:00:00'),
('63070503443', '2022-05-30 01:00:00', '2022-05-30 10:00:00'),
('63070503449', '2022-05-30 01:00:00', '2022-05-30 10:00:00'),
('63070503443', '2022-05-31 01:00:00', '2022-05-31 10:00:00'),
('63070503449', '2022-05-31 01:00:00', '2022-05-31 10:00:00'),
('63070503449', '2022-06-03 01:00:00', '2022-06-03 10:00:00'),
('63070503433', '2022-06-06 01:00:00', '2022-06-06 09:00:00'),
('63070503433', '2022-06-07 01:00:00', '2022-06-07 09:00:00'),
('63070503433', '2022-06-08 01:00:00', '2022-06-08 09:00:00'),
('63070503433', '2022-06-09 01:00:00', '2022-06-09 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `BRANCH`
--

CREATE TABLE `BRANCH` (
  `employeeID` varchar(11) NOT NULL,
  `managerID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BRANCH`
--

INSERT INTO `BRANCH` (`employeeID`, `managerID`) VALUES
('63070503406', '63070503412'),
('63070503422', '63070503412'),
('63070503457', '63070503412'),
('63070503027', '63070503437'),
('63070503451', '63070503437'),
('63070503409', '63070503443'),
('63070503452', '63070503443'),
('63070503467', '63070503443'),
('63070503401', '63070503449'),
('63070503415', '63070503449'),
('63070503420', '63070503449'),
('63070503421', '63070503449');

-- --------------------------------------------------------

--
-- Table structure for table `CONTRACT`
--

CREATE TABLE `CONTRACT` (
  `contractID` int(11) NOT NULL,
  `employeeID` varchar(11) DEFAULT NULL,
  `startDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `endDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CONTRACT`
--

INSERT INTO `CONTRACT` (`contractID`, `employeeID`, `startDate`, `endDate`) VALUES
(14, '63070503406', '2022-05-01 17:00:00', '2022-06-09 17:00:00'),
(15, '63070503412', '2022-05-01 17:00:00', '2022-05-24 17:00:00'),
(16, '63070503409', '2022-05-11 17:00:00', '2022-06-09 17:00:00'),
(17, '63070503433', '2022-05-12 17:00:00', '2022-06-10 17:00:00'),
(18, '63070503443', '2022-05-24 17:00:00', '2022-06-10 17:00:00'),
(19, '63070503467', '2022-05-09 17:00:00', '2022-05-30 17:00:00'),
(20, '63070503457', '2022-04-30 17:00:00', '2022-05-31 17:00:00'),
(21, '63070503449', '2022-05-18 19:00:00', '2024-05-08 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `COURSE`
--

CREATE TABLE `COURSE` (
  `courseID` int(11) NOT NULL,
  `position` varchar(64) DEFAULT NULL,
  `hour` int(11) NOT NULL,
  `courseName` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COURSE`
--

INSERT INTO `COURSE` (`courseID`, `position`, `hour`, `courseName`) VALUES
(1, 'Electrician', 12, 'Electrical power system'),
(2, 'Mechanician', 10, 'Machine maintenance'),
(3, 'Electrician Manager', 15, 'Project management for electrician'),
(4, 'Mechanician Manager', 15, 'Project management for mechanician'),
(5, 'Electrician', 15, 'Electrical maintenance'),
(6, 'Mechanician', 10, 'Machine for industry');

-- --------------------------------------------------------

--
-- Table structure for table `EDUCATION_HIS`
--

CREATE TABLE `EDUCATION_HIS` (
  `employeeID` varchar(11) NOT NULL,
  `degree` varchar(128) NOT NULL,
  `faculty` varchar(64) NOT NULL,
  `schoolName` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EDUCATION_HIS`
--

INSERT INTO `EDUCATION_HIS` (`employeeID`, `degree`, `faculty`, `schoolName`) VALUES
('63070503027', 'Bachelor', 'Science', 'SWS'),
('63070503401', 'Bachelor', 'CPE', 'CU'),
('63070503406', 'Bachelor', 'Engineer', 'KMUTT'),
('63070503409', 'Bachelor', 'Engineer', 'SWS'),
('63070503412', 'Bachelor', 'Engineer', 'KMITL'),
('63070503415', 'Master', 'CPE', 'Howard'),
('63070503420', 'Master', 'Technology', 'Pada school'),
('63070503422', 'Master', 'Business', 'Peking University'),
('63070503433', 'Bachelor', 'Engineer', 'KMUTT'),
('63070503437', 'Master', 'Management', 'Howard'),
('63070503443', 'Bachelor', 'Art', 'CU'),
('63070503444', 'Bachelor', 'Engineer', 'KMITL'),
('63070503449', 'Bachelor', 'Science', 'KMUTT'),
('63070503451', 'Master', 'Rich', 'Veerapat University'),
('63070503452', 'Bachelor', 'Unknown', 'Little Teddy Bear'),
('63070503457', 'Engineer', 'CPE', 'KMUTT'),
('63070503467', 'Engineer', 'CPE', 'KMUTT');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE `EMPLOYEE` (
  `employeeID` varchar(11) NOT NULL,
  `fName` varchar(32) NOT NULL,
  `lName` varchar(32) NOT NULL,
  `bDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sex` varchar(11) NOT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `position` varchar(64) DEFAULT NULL,
  `conDisease` varchar(64) NOT NULL,
  `employeePic` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`employeeID`, `fName`, `lName`, `bDate`, `sex`, `tel`, `email`, `address`, `position`, `conDisease`, `employeePic`) VALUES
('63070503027', 'Teeranodon', 'Ifai', '2022-05-11 14:50:37', 'Child', '0546188636', 'prom@gmail.com', 'Sir Matt Busby Way, Old Trafford, Stretford, Manchester M16 0RA, United Kingdom', 'Mechanician', 'JaiGere', 'employeePic/27.png'),
('63070503401', 'Jarn', 'Daeng', '1985-09-05 15:09:28', 'AlphaMale', '025678412', 'daeng@gmail.com', 'Sawasdee Krub Than Phu Jareon', 'Electrician', 'Kheeyes', 'employeePic/01.png'),
('63070503406', 'Gayut', 'Woratol', '2022-05-13 05:54:07', 'Gay', '123456789', 'mickey@gmail.com', 'Bangkok Thailand', 'Electrician', 'Jaiter', 'employeePic/06.png'),
('63070503409', 'Cheetos', 'Tajima', '2022-05-16 02:59:58', 'Male', '958870520', 'seiya@gmail.com', 'Tokyo Japan', 'Mechanician', '', 'employeePic/09.png'),
('63070503412', 'Mico', 'Bag', '2022-05-11 05:14:27', 'Male', '1234567890', 'test555555@gmail.com', 'Bangkok Thailand', 'Electrician Manager', 'sfsfsfs', 'employeePic/60157961_10205955731847906_3888103613825810432_n.jpg'),
('63070503415', 'Nattapong', 'Saengarunvong', '2002-07-18 14:23:37', 'Male', '085721369', 'milo@gmail.com', 'Mico\'s Medicine', 'Electrician', '-', 'employeePic/15.png'),
('63070503420', 'Peak', 'Jeager', '2022-05-11 14:40:15', 'Male', '084518526', 'peak@gmail.com', 'Yoo Tee Tee Peak Mark Mark', 'Electrician', '-', 'employeePic/20.png'),
('63070503421', 'Bung', 'KapTH', '1993-06-24 14:38:16', 'Male', '0598464852', 'bung@gmail.com', 'Teerasan\'s Lair', 'Electrician', 'Gamer', 'employeePic/21.png'),
('63070503422', 'Napas', 'Indadungeon', '2022-05-11 14:32:20', 'Boy100%', '076598485', 'napas@gmail.com', 'Hangzhou, China', 'Electrician', 'ChineseStonk', 'employeePic/22.png'),
('63070503433', 'Cheetos', 'Woratol', '2022-05-16 02:39:24', 'Male', '123456555', 'ming@gmail.com', 'Bangkok Thailand', 'HR', '', 'employeePic/33.png'),
('63070503437', 'Pattaraphum', 'Vietjet', '2002-02-28 14:01:11', 'Male', '777777777', 'jet@gmail.com', 'Jet\'s Palace at ChiangRai', 'Mechanician Manager', '', 'employeePic/37.png'),
('63070503443', 'Uan', 'baggg', '2022-05-11 05:26:04', 'Female', '1234566528', 'uan@gmail.com', 'Bangkok Thailand', 'Mechanician Manager', '', 'employeePic/bd7.jpg'),
('63070503444', 'Muhummud', 'Binhar', '2022-05-13 06:17:42', 'Male', '054791132', 'mud@gmail.com', 'West Los Angeles, California, United States', 'Electrician Manager', 'LOLPhobia', 'employeePic/44.png'),
('63070503449', 'Thawinan', 'Kieng', '2022-05-11 14:04:59', 'Female', '121234567', 'thawinan@gmail.com', '123 prachauthit road bangmod thungkru Bangkok 10140', 'Electrician Manager', '-', 'employeePic/49.png'),
('63070503451', 'Veerapat', 'Sensei', '1994-06-23 14:47:06', 'Male', '051851684', 'aum@gmail.com', 'Golden Palace at Sarin City', 'Mechanician', '-', 'employeePic/51.png'),
('63070503452', 'Supavit', 'Nofren', '1993-03-16 14:58:32', 'Male', '0654813332', 'supavit@gmail.com', 'Somewhere we cannot reach him', 'Mechanician', 'Maitumherearaireyisus', 'employeePic/52.png'),
('63070503457', 'Gus', 'Mahathep', '2022-05-11 13:33:01', 'Female', '12345678', 'gus@gmail.com', 'Sawanwimarn', 'Electrician', '', 'employeePic/cover10.jpg'),
('63070503467', 'Apiravit', 'Cheesh', '2002-02-16 17:00:00', 'Homosexual', '88696969', 'cheetah@gmail.com', 'Underground Prison', 'Mechanician', 'Lolicon', 'employeePic/Sun3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ENROLLMENT`
--

CREATE TABLE `ENROLLMENT` (
  `employeeID` varchar(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ENROLLMENT`
--

INSERT INTO `ENROLLMENT` (`employeeID`, `courseID`, `date`) VALUES
('63070503406', 1, '2022-05-12 03:42:03'),
('63070503412', 1, '2022-05-20 05:00:00'),
('63070503415', 1, '2022-05-12 04:40:55'),
('63070503415', 1, '2022-05-15 12:12:53'),
('63070503027', 2, '2022-05-15 12:16:53'),
('63070503409', 2, '2022-05-13 03:00:00'),
('63070503467', 2, '2022-05-25 03:00:00'),
('63070503449', 3, '2022-05-18 08:59:15'),
('63070503437', 4, '2022-05-15 12:19:13'),
('63070503437', 4, '2022-05-15 12:19:16'),
('63070503437', 4, '2022-05-15 12:19:22'),
('63070503443', 4, '2022-05-20 05:00:00'),
('63070503415', 5, '2022-05-15 12:12:56'),
('63070503027', 6, '2022-05-15 12:16:57'),
('63070503027', 6, '2022-05-15 12:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `GRADE`
--

CREATE TABLE `GRADE` (
  `grade` varchar(5) NOT NULL,
  `percent` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GRADE`
--

INSERT INTO `GRADE` (`grade`, `percent`) VALUES
('A', 15),
('B', 12),
('C', 8),
('D', 5);

-- --------------------------------------------------------

--
-- Table structure for table `OT`
--

CREATE TABLE `OT` (
  `employeeID` varchar(11) NOT NULL,
  `startOT` timestamp NOT NULL DEFAULT current_timestamp(),
  `hour` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OT`
--

INSERT INTO `OT` (`employeeID`, `startOT`, `hour`) VALUES
('63070503412', '2022-05-11 09:01:40', 2),
('63070503415', '2022-05-16 14:00:00', 1),
('63070503415', '2022-05-17 14:00:00', 2),
('63070503467', '2022-05-23 09:03:12', 3),
('63070503409', '2022-05-24 09:01:13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `PERFORMANCE`
--

CREATE TABLE `PERFORMANCE` (
  `employeeID` varchar(11) NOT NULL,
  `evaEmployeeID` varchar(11) NOT NULL,
  `grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PERFORMANCE`
--

INSERT INTO `PERFORMANCE` (`employeeID`, `evaEmployeeID`, `grade`) VALUES
('63070503409', '63070503406', 'A'),
('63070503415', '63070503406', 'B'),
('63070503406', '63070503412', 'B'),
('63070503406', '63070503422', 'D'),
('63070503406', '63070503444', 'A'),
('63070503406', '63070503457', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `POSITION`
--

CREATE TABLE `POSITION` (
  `position` varchar(64) NOT NULL,
  `rate` int(11) NOT NULL,
  `rateType` varchar(11) NOT NULL,
  `posLeft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `POSITION`
--

INSERT INTO `POSITION` (`position`, `rate`, `rateType`, `posLeft`) VALUES
('Electrician', 250, 'hour', 13),
('Electrician Manager', 50000, 'month', 0),
('HR', 65000, 'month', 0),
('Mechanician', 400, 'hour', 15),
('Mechanician Manager', 45000, 'month', 4);

-- --------------------------------------------------------

--
-- Table structure for table `PUNISHMENT`
--

CREATE TABLE `PUNISHMENT` (
  `punishID` int(11) NOT NULL,
  `employeeID` varchar(11) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `deduction` int(3) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `detail` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PUNISHMENT`
--

INSERT INTO `PUNISHMENT` (`punishID`, `employeeID`, `type`, `deduction`, `date`, `detail`) VALUES
(2, '63070503409', 'Late', 300, '2022-05-11 09:39:18', NULL),
(3, '63070503409', 'Late', 1000, '2022-05-12 09:40:23', NULL),
(4, '63070503412', 'Late', 1000, '2022-05-19 09:40:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `REWARD`
--

CREATE TABLE `REWARD` (
  `rewardID` int(11) NOT NULL,
  `employeeID` varchar(11) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `induction` int(3) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `detail` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `REWARD`
--

INSERT INTO `REWARD` (`rewardID`, `employeeID`, `type`, `induction`, `date`, `detail`) VALUES
(1, '63070503443', 'Promote', NULL, '2022-05-11 05:26:04', 'Promote to Manager'),
(2, '63070503444', 'Promote', NULL, '2022-05-13 06:17:42', 'Promote to Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ATTENDANCE`
--
ALTER TABLE `ATTENDANCE`
  ADD PRIMARY KEY (`timeIn`,`employeeID`),
  ADD KEY `ATTENDANCE_ibfk_1` (`employeeID`);

--
-- Indexes for table `BRANCH`
--
ALTER TABLE `BRANCH`
  ADD PRIMARY KEY (`managerID`,`employeeID`),
  ADD KEY `BRANCH_ibfk_1` (`employeeID`);

--
-- Indexes for table `CONTRACT`
--
ALTER TABLE `CONTRACT`
  ADD PRIMARY KEY (`contractID`),
  ADD KEY `CONTRACT_ibfk_1` (`employeeID`);

--
-- Indexes for table `COURSE`
--
ALTER TABLE `COURSE`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `COURSE_ibfk_1` (`position`);

--
-- Indexes for table `EDUCATION_HIS`
--
ALTER TABLE `EDUCATION_HIS`
  ADD PRIMARY KEY (`employeeID`,`degree`,`faculty`,`schoolName`);

--
-- Indexes for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD PRIMARY KEY (`employeeID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD UNIQUE KEY `tel_2` (`tel`,`email`),
  ADD KEY `EMPLOYEE_ibfk_1` (`position`);

--
-- Indexes for table `ENROLLMENT`
--
ALTER TABLE `ENROLLMENT`
  ADD PRIMARY KEY (`courseID`,`employeeID`,`date`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `GRADE`
--
ALTER TABLE `GRADE`
  ADD PRIMARY KEY (`grade`);

--
-- Indexes for table `OT`
--
ALTER TABLE `OT`
  ADD PRIMARY KEY (`startOT`,`employeeID`),
  ADD KEY `OT_ibfk_1` (`employeeID`);

--
-- Indexes for table `PERFORMANCE`
--
ALTER TABLE `PERFORMANCE`
  ADD PRIMARY KEY (`evaEmployeeID`,`employeeID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `POSITION`
--
ALTER TABLE `POSITION`
  ADD PRIMARY KEY (`position`);

--
-- Indexes for table `PUNISHMENT`
--
ALTER TABLE `PUNISHMENT`
  ADD PRIMARY KEY (`punishID`),
  ADD KEY `PUNISHMENT_ibfk_1` (`employeeID`);

--
-- Indexes for table `REWARD`
--
ALTER TABLE `REWARD`
  ADD PRIMARY KEY (`rewardID`),
  ADD KEY `REWARD_ibfk_1` (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CONTRACT`
--
ALTER TABLE `CONTRACT`
  MODIFY `contractID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `COURSE`
--
ALTER TABLE `COURSE`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `PUNISHMENT`
--
ALTER TABLE `PUNISHMENT`
  MODIFY `punishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `REWARD`
--
ALTER TABLE `REWARD`
  MODIFY `rewardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ATTENDANCE`
--
ALTER TABLE `ATTENDANCE`
  ADD CONSTRAINT `ATTENDANCE_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE;

--
-- Constraints for table `BRANCH`
--
ALTER TABLE `BRANCH`
  ADD CONSTRAINT `BRANCH_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `BRANCH_ibfk_2` FOREIGN KEY (`managerID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE;

--
-- Constraints for table `CONTRACT`
--
ALTER TABLE `CONTRACT`
  ADD CONSTRAINT `CONTRACT_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE;

--
-- Constraints for table `COURSE`
--
ALTER TABLE `COURSE`
  ADD CONSTRAINT `COURSE_ibfk_1` FOREIGN KEY (`position`) REFERENCES `POSITION` (`position`) ON DELETE CASCADE;

--
-- Constraints for table `EDUCATION_HIS`
--
ALTER TABLE `EDUCATION_HIS`
  ADD CONSTRAINT `EDUCATION_HIS_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE;

--
-- Constraints for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD CONSTRAINT `EMPLOYEE_ibfk_1` FOREIGN KEY (`position`) REFERENCES `POSITION` (`position`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ENROLLMENT`
--
ALTER TABLE `ENROLLMENT`
  ADD CONSTRAINT `courseID` FOREIGN KEY (`courseID`) REFERENCES `COURSE` (`courseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `employeeID` FOREIGN KEY (`employeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE;

--
-- Constraints for table `OT`
--
ALTER TABLE `OT`
  ADD CONSTRAINT `OT_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE;

--
-- Constraints for table `PERFORMANCE`
--
ALTER TABLE `PERFORMANCE`
  ADD CONSTRAINT `PERFORMANCE_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `PERFORMANCE_ibfk_2` FOREIGN KEY (`evaEmployeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE;

--
-- Constraints for table `PUNISHMENT`
--
ALTER TABLE `PUNISHMENT`
  ADD CONSTRAINT `PUNISHMENT_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE;

--
-- Constraints for table `REWARD`
--
ALTER TABLE `REWARD`
  ADD CONSTRAINT `REWARD_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `EMPLOYEE` (`employeeID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

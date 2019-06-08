-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2017 at 10:25 AM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lincioka_cib8`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_table`
--

CREATE TABLE IF NOT EXISTS `emp_table` (
  `EMP_ID` int(10) NOT NULL,
  `EMP_PASS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EMP_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMP_SURNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMP_EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMP_PHONE` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `EMP_ROLE` int(10) NOT NULL,
  `ACTIVE` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=2524 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emp_table`
--

INSERT INTO `emp_table` (`EMP_ID`, `EMP_PASS`, `EMP_NAME`, `EMP_SURNAME`, `EMP_EMAIL`, `EMP_PHONE`, `EMP_ROLE`, `ACTIVE`) VALUES
(2518, '098f6bcd4621d373cade4e832627b4f6', 'Conor', 'Tyler', '.....', '524214', 5, 1),
(2517, '098f6bcd4621d373cade4e832627b4f6', 'Linas', 'Albavicius', 'linas@albavicius.com', '07752489725', 3, 1),
(2523, 'b160611b8cce03de3d451dc4e6a48f26', 'gruij', 'dfsdgfhj', '', '', 2, 1),
(2522, '5d41402abc4b2a76b9719d911017c592', 'Test', 'Account', '', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_employee_link`
--

CREATE TABLE IF NOT EXISTS `project_employee_link` (
  `PROJECT_ID` int(10) NOT NULL,
  `EMP_ID` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_employee_link`
--

INSERT INTO `project_employee_link` (`PROJECT_ID`, `EMP_ID`) VALUES
(0, 2517),
(1, 2517),
(2, 2517),
(3, 2517),
(3, 2518);

-- --------------------------------------------------------

--
-- Table structure for table `project_table`
--

CREATE TABLE IF NOT EXISTS `project_table` (
  `PROJECT_ID` int(10) NOT NULL,
  `PROJECT_NAME` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `PROJECT_MANAGER` int(10) NOT NULL,
  `PROJECT_STATUS` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=99999 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_table`
--

INSERT INTO `project_table` (`PROJECT_ID`, `PROJECT_NAME`, `PROJECT_MANAGER`, `PROJECT_STATUS`) VALUES
(3, 'SAD', 2518, 4),
(2, 'Programming', 0, 1),
(1, 'Test Project', 0, 2),
(99998, 'Annual Leave', 2518, 5),
(99997, 'Bank Holiday', 2518, 5),
(99996, 'Sickness', 2518, 5),
(80002, 'Training', 2518, 5),
(80003, 'Management Time', 2518, 5),
(99995, 'Maternity Leave', 2518, 5),
(80001, 'Department Meeting', 2518, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role_table`
--

CREATE TABLE IF NOT EXISTS `role_table` (
  `ROLE_ID` int(10) NOT NULL,
  `ROLE_DESC` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_table`
--

INSERT INTO `role_table` (`ROLE_ID`, `ROLE_DESC`) VALUES
(1, 'Contractor'),
(2, 'Full Time'),
(3, 'Team Manager'),
(4, 'Project Manager'),
(5, 'System Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `status_table`
--

CREATE TABLE IF NOT EXISTS `status_table` (
  `STATUS_ID` int(11) NOT NULL,
  `STATUS_DESC` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_table`
--

INSERT INTO `status_table` (`STATUS_ID`, `STATUS_DESC`) VALUES
(1, 'Start Up'),
(2, 'Definition'),
(3, 'Delivery'),
(4, 'Warranty'),
(5, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet_table`
--

CREATE TABLE IF NOT EXISTS `timesheet_table` (
  `TIMESHEET_ID` int(10) NOT NULL,
  `EMP_ID` int(10) NOT NULL,
  `PROJECT_ID` int(10) NOT NULL,
  `START_TIME` datetime NOT NULL,
  `HALF_DAYS` int(15) NOT NULL,
  `OVERTIME` int(11) NOT NULL DEFAULT '0',
  `APPROVAL` int(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timesheet_table`
--

INSERT INTO `timesheet_table` (`TIMESHEET_ID`, `EMP_ID`, `PROJECT_ID`, `START_TIME`, `HALF_DAYS`, `OVERTIME`, `APPROVAL`) VALUES
(32, 2517, 0, '2017-05-20 00:00:00', 2, 0, 0),
(31, 2518, 2, '2017-05-10 21:45:00', 1, 0, 0),
(30, 2518, 2, '2017-05-10 18:30:00', 17, 0, 0),
(29, 2518, 2, '2017-05-10 13:40:00', 5, 0, 0),
(28, 2518, 2, '2017-05-10 12:00:00', 20000, 1, 0),
(27, 2518, 0, '2017-05-11 00:00:00', 2, 0, 0),
(26, 2518, 80001, '2017-05-19 13:15:00', 2, 0, 0),
(17, 2518, 2, '2017-05-11 14:52:00', 1, 0, 0),
(16, 2518, 3, '1970-01-01 01:00:00', 16, 0, 0),
(15, 2518, 3, '2017-05-11 08:16:00', 1, 0, 0),
(14, 2518, 3, '2017-06-01 14:00:00', 1, 0, 1),
(13, 2518, 3, '2017-05-02 13:52:00', 1, 0, 1),
(12, 2518, 3, '2017-05-06 14:03:00', 1, 0, 1),
(11, 2517, 2, '2017-05-05 02:15:00', 9, 0, 0),
(10, 2517, 1, '2017-05-10 15:45:00', 21, 0, 0),
(9, 2517, 2, '2017-05-18 15:50:00', 15, 0, 0),
(8, 2517, 2, '2017-05-18 15:40:00', 15, 0, 0),
(7, 2517, 2, '2017-05-05 03:47:00', 12, 0, 0),
(6, 2517, 2, '2017-05-19 03:45:00', 12, 0, 0),
(5, 2517, 2, '2017-05-09 15:30:00', 13, 0, 0),
(4, 2517, 1, '2017-05-13 05:35:00', 11, 0, 0),
(3, 2517, 2, '2017-05-18 13:07:00', 1, 0, 2),
(2, 2518, 2, '2017-05-17 04:08:00', 1, 0, 1),
(1, 2517, 2, '2017-05-24 13:40:00', 1, 0, 1),
(33, 2517, 0, '2017-05-03 00:00:00', 2, 0, 0),
(34, 2517, 0, '2017-05-18 14:54:00', 2, 0, 0),
(35, 2517, 0, '2017-05-26 13:10:00', 2, 0, 0),
(36, 2517, 0, '2017-05-24 00:00:00', 2, 0, 0),
(37, 2517, 0, '2017-05-12 01:05:00', 2, 0, 0),
(38, 2517, 0, '2017-05-10 11:55:00', 2, 0, 0),
(39, 2517, 0, '2017-05-04 00:00:00', 2, 0, 0),
(40, 2517, 0, '2017-05-04 00:00:00', 2, 0, 0),
(41, 2517, 0, '2017-05-09 00:00:00', 2, 0, 0),
(42, 2517, 0, '2017-05-09 00:00:00', 2, 0, 0),
(43, 2517, 0, '2017-05-05 00:00:00', 2, 0, 0),
(44, 2517, 99996, '2017-05-09 00:00:00', 2, 0, 0),
(45, 2517, 80001, '2017-05-17 14:05:00', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_table`
--
ALTER TABLE `emp_table`
  ADD PRIMARY KEY (`EMP_ID`), ADD UNIQUE KEY `EMP_ID` (`EMP_ID`), ADD KEY `EMP_ROLE` (`EMP_ROLE`);

--
-- Indexes for table `project_employee_link`
--
ALTER TABLE `project_employee_link`
  ADD PRIMARY KEY (`PROJECT_ID`,`EMP_ID`);

--
-- Indexes for table `project_table`
--
ALTER TABLE `project_table`
  ADD PRIMARY KEY (`PROJECT_ID`), ADD KEY `PROJECT_MANAGER` (`PROJECT_MANAGER`);

--
-- Indexes for table `role_table`
--
ALTER TABLE `role_table`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `timesheet_table`
--
ALTER TABLE `timesheet_table`
  ADD PRIMARY KEY (`TIMESHEET_ID`), ADD KEY `EMP_ID` (`EMP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_table`
--
ALTER TABLE `emp_table`
  MODIFY `EMP_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2524;
--
-- AUTO_INCREMENT for table `project_table`
--
ALTER TABLE `project_table`
  MODIFY `PROJECT_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99999;
--
-- AUTO_INCREMENT for table `role_table`
--
ALTER TABLE `role_table`
  MODIFY `ROLE_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `timesheet_table`
--
ALTER TABLE `timesheet_table`
  MODIFY `TIMESHEET_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

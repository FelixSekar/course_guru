-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 06:12 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `established_on` date NOT NULL,
  `website_link` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `address`, `contact_no`, `established_on`, `website_link`, `description`) VALUES
(1, 'Vidyalankar', 'Pearl Center, Senapati Bapat Marg, Dadar West, Mumbai, Maharashtra 400028', 0, '1999-01-01', 'http://vidyalankar.org/', 'Mission:Offer the highest quality learning programs by delivering on rigorous content, best in class faculty and engaging user experiences in a personalized manner.'),
(2, 'Class A', 'Pearl Center,\r\nSenapati Bapat Marg, \r\nDadar West-400028 ', 11111111, '1997-02-16', 'http://vidyalankar.org/about-us/', 'MISSION:Offer the highest quality learning programs by delivering on rigorous content, best in class faculty and engaging user experiences in a personalized manner.'),
(3, 'Class B', 'Pearl Center,\r\nSenapati Bapat Marg, \r\nDadar West-400028 ', 11111111, '1997-02-16', 'http://vidyalankar.org/about-us/', 'MISSION:Offer the highest quality learning programs by delivering on rigorous content, best in class faculty and engaging user experiences in a personalized manner.'),
(4, 'Class c', 'Pearl Center,\r\nSenapati Bapat Marg, \r\nDadar West-400028 ', 11111111, '1997-02-16', 'http://vidyalankar.org/about-us/', 'MISSION:Offer the highest quality learning programs by delivering on rigorous content, best in class faculty and engaging user experiences in a personalized manner.'),
(5, 'Class D', 'Pearl Center,\r\nSenapati Bapat Marg, \r\nDadar West-400028 ', 11111111, '1997-02-16', 'http://vidyalankar.org/about-us/', 'MISSION:Offer the highest quality learning programs by delivering on rigorous content, best in class faculty and engaging user experiences in a personalized manner.');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `class_id`, `name`, `duration`, `rate`, `start`, `end`) VALUES
(2, 1, 'Machine Learning', 36, '10000', '2018-02-28', '2018-03-03'),
(3, 1, 'IOT', 16, '3200', '2018-02-28', '2018-03-02'),
(4, 1, 'IOT', 16, '3200', '2018-02-28', '2018-03-02'),
(5, 1, 'PHP', 16, '3200', '2018-03-20', '2018-03-22'),
(6, 1, 'Python', 18, '3600', '2018-03-20', '2018-03-23'),
(7, 2, 'Machine Learning', 9, '1000', '2018-02-22', '2018-02-24'),
(8, 3, 'Machine Learning', 150, '10000', '2018-03-15', '2018-03-25'),
(9, 4, 'Machine Learning', 15, '1500', '2018-03-22', '2018-03-24'),
(10, 5, 'Machine Learning', 15, '10000', '2018-03-22', '2018-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acc_status` enum('not activated','activated') NOT NULL,
  `activation_id` varchar(128) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

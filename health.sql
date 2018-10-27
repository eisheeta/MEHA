-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2018 at 07:17 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userid`, `sex`, `password`, `user_type`, `access`) VALUES
(1, 'namrata', '', 'namrata', '', 0),
(2, 'namrata', '', 'yesn', '', 0),
(3, 'namrata', '', 'hdrtr', '', 0),
(4, 'Eisheeta', '', 'ghkhjg', 'Doctor', 0),
(5, 'muskan', '', 'muskan', 'Doctor', 0),
(6, 'muskan', '', 'jjkgjk', 'Doctor', 0),
(7, 'namrata', '', 'nak', 'Patient', 1),
(8, 'extra', '', 'extra', 'Doctor', 0),
(9, 'muskan', 'female', 'baby', 'Doctor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `p_id` int(10) NOT NULL,
  `d_id` int(10) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `med1` varchar(100) NOT NULL,
  `med2` varchar(100) NOT NULL,
  `med3` varchar(100) NOT NULL,
  `test_prescribed` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `ddate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `name`, `age`, `sex`, `p_id`, `d_id`, `doctor_name`, `specialty`, `med1`, `med2`, `med3`, `test_prescribed`, `comment`, `ddate`) VALUES
(1, 'namrata', 20, 'Female', 7, 5, 'muskan', 'heart surgeon', 'xyz', 'abc', '', '', 'gghjhklh', ''),
(2, 'hhrhrh', 67, 'female', 7, 5, 'muskan', '', '', '', '', '', '', '2018-10-12'),
(3, 'hhrhrh', 67, 'female', 7, 5, 'muskan', '', '', '', '', '', '', '2018-10-12'),
(4, 'hhrhrh', 67, 'female', 7, 5, 'muskan', '', '', '', '', '', '', '2018-10-12'),
(67, 'Namrata Khurana', 4, '', 7, 5, '', '', '', '', '', 'eisheeta therapy', '', ''),
(68, 'yo', 5, '', 7, 5, '', '', '', '', '', '', '', ''),
(69, 'nam', 20, '', 7, 5, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `test1` varchar(50) NOT NULL,
  `test2` varchar(50) NOT NULL,
  `test3` varchar(50) NOT NULL,
  `tdate1` varchar(30) NOT NULL,
  `tdate2` varchar(50) NOT NULL,
  `tdate3` varchar(50) NOT NULL,
  `report1` varchar(255) NOT NULL,
  `report2` varchar(255) NOT NULL,
  `report3` varchar(255) NOT NULL,
  `tflag1` int(1) NOT NULL,
  `tflag2` int(1) NOT NULL,
  `tflag3` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `p_id`, `name`, `age`, `sex`, `test1`, `test2`, `test3`, `tdate1`, `tdate2`, `tdate3`, `report1`, `report2`, `report3`, `tflag1`, `tflag2`, `tflag3`) VALUES
(1, 7, 'namrata', 20, 'Female', 'please', 'hjg', 'eisheeta therapy', '', '', '', 'positive', 'negative', 'positive', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

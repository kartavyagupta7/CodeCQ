-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2020 at 04:16 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14216513_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Ques`
--

CREATE TABLE `Ques` (
  `Sno` int(11) NOT NULL,
  `Testid` int(11) NOT NULL,
  `questions` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `A` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `B` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `D` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ans` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Score`
--

CREATE TABLE `Score` (
  `Sno` int(11) NOT NULL,
  `Rollno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `score` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `testid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--

CREATE TABLE `Test` (
  `Testid` int(11) NOT NULL,
  `Testpassword` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Adminpassword` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxtime` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ques`
--
ALTER TABLE `Ques`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `Score`
--
ALTER TABLE `Score`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `Test`
--
ALTER TABLE `Test`
  ADD UNIQUE KEY `Testid` (`Testid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ques`
--
ALTER TABLE `Ques`
  MODIFY `Sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Score`
--
ALTER TABLE `Score`
  MODIFY `Sno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

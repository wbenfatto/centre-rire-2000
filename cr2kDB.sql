-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2020 at 08:44 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr2kDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `arrived` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `statut` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `situation` varchar(255) NOT NULL,
  `nas` varchar(50) NOT NULL,
  `cp12` varchar(100) NOT NULL,
  `cle` varchar(100) NOT NULL,
  `found` varchar(255) NOT NULL,
  `profile` mediumtext NOT NULL,
  `objectives` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE `table2` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table3`
--

CREATE TABLE `table3` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table4`
--

CREATE TABLE `table4` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table5`
--

CREATE TABLE `table5` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table6`
--

CREATE TABLE `table6` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table7`
--

CREATE TABLE `table7` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tb` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `td` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table2`
--
ALTER TABLE `table2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table3`
--
ALTER TABLE `table3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table4`
--
ALTER TABLE `table4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table5`
--
ALTER TABLE `table5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table6`
--
ALTER TABLE `table6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table7`
--
ALTER TABLE `table7`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `table2`
--
ALTER TABLE `table2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `table3`
--
ALTER TABLE `table3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `table4`
--
ALTER TABLE `table4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `table5`
--
ALTER TABLE `table5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `table6`
--
ALTER TABLE `table6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `table7`
--
ALTER TABLE `table7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

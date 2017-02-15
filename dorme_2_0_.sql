-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 04:09 AM
-- Server version: 5.7.15-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorme(2.0)`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressId` int(10) NOT NULL,
  `StreetName` varchar(20) NOT NULL,
  `Barangay` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `add_on`
--

CREATE TABLE `add_on` (
  `add_id` int(10) NOT NULL,
  `add_item` varchar(20) NOT NULL,
  `add_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dorm`
--

CREATE TABLE `dorm` (
  `DormId` int(10) NOT NULL,
  `DormName` varchar(50) NOT NULL,
  `OwnerId` int(10) NOT NULL,
  `HousingType` varchar(20) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `AddressId` int(10) NOT NULL,
  `thumbnailpic` varchar(100) NOT NULL,
  `votes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dorm_addon`
--

CREATE TABLE `dorm_addon` (
  `daID` int(10) NOT NULL,
  `DormId` int(10) NOT NULL,
  `add_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dorm_number`
--

CREATE TABLE `dorm_number` (
  `DormId` int(10) NOT NULL,
  `NumType` varchar(20) NOT NULL,
  `Number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dorm_pictures`
--

CREATE TABLE `dorm_pictures` (
  `dormpicID` int(10) NOT NULL,
  `DormId` int(10) NOT NULL,
  `imgurl` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facilityNo` int(10) NOT NULL,
  `facilityName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `facility_dorm`
--

CREATE TABLE `facility_dorm` (
  `fdID` int(10) NOT NULL,
  `facilityNo` int(10) NOT NULL,
  `DormId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotifId` int(10) NOT NULL,
  `DormId` int(10) NOT NULL,
  `Review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `OwnerId` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `owner_dorm`
--

CREATE TABLE `owner_dorm` (
  `NotifId` int(10) NOT NULL,
  `DormId` int(10) NOT NULL,
  `OwnerId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomNo` int(10) NOT NULL,
  `MaxNoOfResidents` int(10) NOT NULL,
  `TypeOfPayment` varchar(10) NOT NULL,
  `Price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressId`);

--
-- Indexes for table `add_on`
--
ALTER TABLE `add_on`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `dorm`
--
ALTER TABLE `dorm`
  ADD PRIMARY KEY (`DormId`);

--
-- Indexes for table `dorm_addon`
--
ALTER TABLE `dorm_addon`
  ADD PRIMARY KEY (`daID`);

--
-- Indexes for table `dorm_number`
--
ALTER TABLE `dorm_number`
  ADD PRIMARY KEY (`DormId`);

--
-- Indexes for table `dorm_pictures`
--
ALTER TABLE `dorm_pictures`
  ADD PRIMARY KEY (`dormpicID`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facilityNo`);

--
-- Indexes for table `facility_dorm`
--
ALTER TABLE `facility_dorm`
  ADD PRIMARY KEY (`fdID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotifId`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`OwnerId`);

--
-- Indexes for table `owner_dorm`
--
ALTER TABLE `owner_dorm`
  ADD PRIMARY KEY (`NotifId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `add_on`
--
ALTER TABLE `add_on`
  MODIFY `add_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dorm`
--
ALTER TABLE `dorm`
  MODIFY `DormId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dorm_addon`
--
ALTER TABLE `dorm_addon`
  MODIFY `daID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dorm_number`
--
ALTER TABLE `dorm_number`
  MODIFY `DormId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dorm_pictures`
--
ALTER TABLE `dorm_pictures`
  MODIFY `dormpicID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facilityNo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facility_dorm`
--
ALTER TABLE `facility_dorm`
  MODIFY `fdID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotifId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `OwnerId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `owner_dorm`
--
ALTER TABLE `owner_dorm`
  MODIFY `NotifId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomNo` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

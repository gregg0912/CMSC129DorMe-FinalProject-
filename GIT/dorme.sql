-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 03:57 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorme`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressId` int(10) NOT NULL,
  `StreetName` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`AddressId`, `StreetName`, `Barangay`) VALUES
(1, 'Zulueta St.', 'Brgy. Bolho'),
(2, 'Paguntalan St.', 'Brgy. Sapa'),
(3, 'Tajanlangit St.', 'Brgy. Tacas'),
(4, 'Quezon St.', 'Brgy. Tacas'),
(5, 'New York St.', 'Brgy. Bagumbayan'),
(6, 'Quezon St.', 'Brgy. Mat-y'),
(7, 'Hollywood St.', 'Bgy. Mat-y'),
(8, 'Mueda St.', 'Bgy. Baybay Sur'),
(9, 'Hello', 'World'),
(10, 'Hello', 'World'),
(11, 'Shebna St.', 'Bgy. Sesame'),
(12, 'Sesame St.', 'Bgy. Happiness'),
(13, 'Elektrons St.', 'Bgy. Amazeing'),
(14, 'Hello St.', 'Bgy. Sadya'),
(15, 'Quezon St.', 'Bgy. Mat-y');

-- --------------------------------------------------------

--
-- Table structure for table `add_on`
--

CREATE TABLE `add_on` (
  `add_id` int(11) NOT NULL,
  `add_item` varchar(60) NOT NULL,
  `add_price` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_on`
--

INSERT INTO `add_on` (`add_id`, `add_item`, `add_price`) VALUES
(1, 'Laptop', 'Php 100.00'),
(2, 'Cellphone', 'Php 50.00'),
(3, 'Laptop', 'Php 300.00'),
(5, 'Electric Fan', 'Php 250.00'),
(6, 'Electricity', 'Electric Meter Dependent'),
(7, 'WiFi', 'Php 100.00'),
(8, 'WiFi', 'Php 150.00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_facilities`
--
CREATE TABLE `all_facilities` (
`DormId` int(10)
,`DormName` varchar(100)
,`facilityNo` int(11)
,`facilityName` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `dorm`
--

CREATE TABLE `dorm` (
  `DormId` int(10) NOT NULL,
  `DormName` varchar(100) NOT NULL,
  `OwnerId` int(10) NOT NULL,
  `HousingType` enum('boardinghouse','apartment','dormitory','bedspace') NOT NULL,
  `Location` enum('banwa','dormArea') NOT NULL,
  `AddressId` int(11) NOT NULL,
  `thumbnailpic` varchar(100) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dorm`
--

INSERT INTO `dorm` (`DormId`, `DormName`, `OwnerId`, `HousingType`, `Location`, `AddressId`, `thumbnailpic`, `votes`) VALUES
(2, 'Gabon''s Place', 1, 'bedspace', 'banwa', 1, 'thumbnails/gabons.JPG', 2),
(3, 'Nonato''s Boarding House', 2, 'boardinghouse', 'banwa', 2, 'thumbnails/nonatos.JPG', 0),
(4, 'Sparky', 3, 'boardinghouse', 'banwa', 2, 'thumbnails/sparky.JPG', 0),
(5, 'Yan-Yan''s Boarding House', 4, 'boardinghouse', 'banwa', 3, 'thumbnails/yanyans.JPG', 0),
(6, 'Studyo 2 Residence', 5, 'boardinghouse', 'banwa', 2, 'thumbnails/studyo2.JPG', 2),
(7, 'Pascasio''s Residence', 6, 'bedspace', 'banwa', 2, 'thumbnails/pascasios.JPG', 0),
(8, 'Four Sisters Apartment', 7, 'apartment', 'banwa', 4, 'thumbnails/foursisters.JPG', 3),
(9, 'Mombay''s Residence', 8, 'bedspace', 'banwa', 1, 'thumbnails/mambons.JPG', 1),
(10, 'Nela''s Boarding House', 9, 'boardinghouse', 'banwa', 8, 'thumbnails/nelas.JPG', 2),
(11, 'Royal Angel''s Deluxe Dormtelle', 10, 'dormitory', 'banwa', 6, 'thumbnails/RA.JPG', 8),
(12, 'Betty''s Boarding House', 11, 'boardinghouse', 'banwa', 5, 'thumbnails/bettys.JPG', 1),
(13, 'First Estate Dormitory', 12, 'dormitory', 'dormArea', 7, 'thumbnails/firstestate.JPG', 1),
(14, 'Nablen''s Care Haven', 13, 'dormitory', 'dormArea', 7, 'thumbnails/nablens.JPG', 0),
(15, 'Love and Kisses', 14, 'dormitory', 'dormArea', 7, 'thumbnails/susans.JPG', 1),
(16, 'Jel Studios (Nufable Apartment)', 15, 'apartment', 'banwa', 6, 'css/images/no_image.png', 1),
(17, 'Shebna''s Crib', 16, 'boardinghouse', 'banwa', 11, 'css/images/no_image.png', 0),
(18, 'Shebna&#039;s Crib Jr.', 16, 'bedspace', 'dormArea', 11, 'css/images/no_image.png', 0),
(20, 'Rose Apartment', 17, 'bedspace', 'banwa', 12, 'css/images/no_image.png', 0),
(21, 'CAS Dormitory', 18, 'bedspace', 'dormArea', 13, 'css/images/no_image.png', 0),
(23, 'Worldly Dormies', 20, 'bedspace', 'dormArea', 14, 'css/images/no_image.png', 0),
(24, 'Worldly Dormies23', 20, 'apartment', 'dormArea', 14, 'css/images/no_image.png', 0),
(25, 'Lincy&#039;s Four Sisters', 21, 'apartment', 'dormArea', 15, 'css/images/no_image.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dorm_addon`
--

CREATE TABLE `dorm_addon` (
  `daID` int(11) NOT NULL,
  `DormId` int(11) NOT NULL,
  `add_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dorm_addon`
--

INSERT INTO `dorm_addon` (`daID`, `DormId`, `add_id`) VALUES
(1, 2, 6),
(2, 6, 7),
(3, 10, 6),
(4, 12, 8),
(5, 11, 1),
(6, 11, 2),
(7, 15, 2),
(8, 15, 3),
(9, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dorm_number`
--

CREATE TABLE `dorm_number` (
  `DormID` int(11) NOT NULL,
  `NumType` enum('tel_no','cp_no') NOT NULL,
  `Number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dorm_number`
--

INSERT INTO `dorm_number` (`DormID`, `NumType`, `Number`) VALUES
(2, 'tel_no', '513-8018'),
(3, 'cp_no', '09104041935'),
(4, 'tel_no', '513-8252'),
(4, 'tel_no', '513-8908'),
(4, 'cp_no', '09128555360'),
(5, 'tel_no', '315-8395'),
(8, 'tel_no', '315-1345'),
(10, 'tel_no', '(02)513-7725'),
(10, 'cp_no', '09173191942'),
(10, 'cp_no', '09156797915'),
(11, 'tel_no', '315-8420'),
(12, 'tel_no', '315-8542'),
(12, 'cp_no', '09307479429'),
(15, 'tel_no', '315-9765'),
(15, 'cp_no', '09076650934'),
(16, 'cp_no', '09205816547'),
(25, 'tel_no', '234-5432'),
(25, 'cp_no', '09199442344');

-- --------------------------------------------------------

--
-- Table structure for table `dorm_pictures`
--

CREATE TABLE `dorm_pictures` (
  `dormpicID` int(11) NOT NULL,
  `DormId` int(11) NOT NULL,
  `imgurl` varchar(40) NOT NULL,
  `imgdesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dorm_pictures`
--

INSERT INTO `dorm_pictures` (`dormpicID`, `DormId`, `imgurl`, `imgdesc`) VALUES
(1, 2, '127 survey/Gabon''s Place/DSC_4099.JPG', ''),
(2, 2, '127 survey/Gabon''s Place/DSC_4100.JPG', ''),
(3, 2, '127 survey/Gabon''s Place/DSC_4101.JPG', ''),
(4, 2, '127 survey/Gabon''s Place/DSC_4102.JPG', ''),
(5, 2, '127 survey/Gabon''s Place/DSC_4103.JPG', ''),
(6, 2, '127 survey/Gabon''s Place/DSC_4104.JPG', ''),
(7, 2, '127 survey/Gabon''s Place/DSC_4105.JPG', ''),
(8, 2, '127 survey/Gabon''s Place/DSC_4106.JPG', ''),
(9, 2, '127 survey/Gabon''s Place/DSC_4107.JPG', ''),
(17, 3, '127 survey/Nonato''s/DSC_4150.JPG', ''),
(18, 3, '127 survey/Nonato''s/DSC_4151.JPG', ''),
(19, 3, '127 survey/Nonato''s/DSC_4152.JPG', ''),
(20, 3, '127 survey/Nonato''s/DSC_4153.JPG', ''),
(21, 3, '127 survey/Nonato''s/DSC_4154.JPG', ''),
(23, 3, '127 survey/Nonato''s/DSC_4155.JPG', ''),
(24, 3, '127 survey/Nonato''s/DSC_4156.JPG', ''),
(25, 4, '127 survey/Sparky/DSC_4143.JPG', ''),
(26, 4, '127 survey/Sparky/DSC_4144.JPG', ''),
(27, 4, '127 survey/Sparky/DSC_4145.JPG', ''),
(28, 4, '127 survey/Sparky/DSC_4146.JPG', ''),
(29, 4, '127 survey/Sparky/DSC_4147.JPG', ''),
(30, 4, '127 survey/Sparky/DSC_4149.JPG', ''),
(32, 5, '127 survey/Yan-Yan''s/DSC_4074.JPG', ''),
(33, 5, '127 survey/Yan-Yan''s/DSC_4075.JPG', ''),
(34, 5, '127 survey/Yan-Yan''s/DSC_4076.JPG', ''),
(35, 5, '127 survey/Yan-Yan''s/DSC_4077.JPG', ''),
(36, 5, '127 survey/Yan-Yan''s/DSC_4078.JPG', ''),
(37, 5, '127 survey/Yan-Yan''s/DSC_4079.JPG', ''),
(38, 5, '127 survey/Yan-Yan''s/DSC_4080.JPG', ''),
(39, 5, '127 survey/Yan-Yan''s/DSC_4081.JPG', ''),
(40, 5, '127 survey/Yan-Yan''s/DSC_4082.JPG', ''),
(41, 5, '127 survey/Yan-Yan''s/DSC_4083.JPG', ''),
(42, 5, '127 survey/Yan-Yan''s/DSC_4092.JPG', ''),
(43, 5, '127 survey/Yan-Yan''s/DSC_4093.JPG', ''),
(44, 6, '127 survey/Studyo2/DSC_4138.JPG', ''),
(45, 6, '127 survey/Studyo2/DSC_4139.JPG', ''),
(46, 6, '127 survey/Studyo2/DSC_4140.JPG', ''),
(47, 6, '127 survey/Studyo2/DSC_4141.JPG', ''),
(48, 6, '127 survey/Studyo2/DSC_4142.JPG', ''),
(49, 7, '127 survey/Pascasio''s/DSC_4127.JPG', ''),
(50, 7, '127 survey/Pascasio''s/DSC_4129.JPG', ''),
(51, 7, '127 survey/Pascasio''s/DSC_4130.JPG', ''),
(52, 7, '127 survey/Pascasio''s/DSC_4131.JPG', ''),
(53, 7, '127 survey/Pascasio''s/DSC_4133.JPG', ''),
(54, 7, '127 survey/Pascasio''s/DSC_4134.JPG', ''),
(55, 7, '127 survey/Pascasio''s/DSC_4135.JPG', ''),
(56, 7, '127 survey/Pascasio''s/DSC_4136.JPG', ''),
(57, 7, '127 survey/Pascasio''s/DSC_4137.JPG', ''),
(58, 8, '127 survey/FourSisters/DSC_4084.JPG', ''),
(59, 8, '127 survey/FourSisters/DSC_4085.JPG', ''),
(60, 8, '127 survey/FourSisters/DSC_4086.JPG', ''),
(61, 8, '127 survey/FourSisters/DSC_4087.JPG', ''),
(62, 8, '127 survey/FourSisters/DSC_4088.JPG', ''),
(63, 8, '127 survey/FourSisters/DSC_4089.JPG', ''),
(64, 8, '127 survey/FourSisters/DSC_4090.JPG', ''),
(65, 8, '127 survey/FourSisters/DSC_4273.JPG', ''),
(66, 8, '127 survey/FourSisters/DSC_4274.JPG', ''),
(67, 8, '127 survey/FourSisters/DSC_4275.JPG', ''),
(68, 8, '127 survey/FourSisters/DSC_4276.JPG', ''),
(69, 8, '127 survey/FourSisters/DSC_4277.JPG', ''),
(70, 8, '127 survey/FourSisters/DSC_4278.JPG', ''),
(71, 9, '127 survey/Mombay''s/DSC_4108.JPG', ''),
(72, 9, '127 survey/Mombay''s/DSC_4109.JPG', ''),
(73, 9, '127 survey/Mombay''s/DSC_4110.JPG', ''),
(74, 9, '127 survey/Mombay''s/DSC_4111.JPG', ''),
(75, 9, '127 survey/Mombay''s/DSC_4113.JPG', ''),
(76, 9, '127 survey/Mombay''s/DSC_4114.JPG', ''),
(77, 9, '127 survey/Mombay''s/DSC_4116.JPG', ''),
(78, 9, '127 survey/Mombay''s/DSC_4117.JPG', ''),
(79, 9, '127 survey/Mombay''s/DSC_4119.JPG', ''),
(80, 9, '127 survey/Mombay''s/DSC_4120.JPG', ''),
(81, 9, '127 survey/Mombay''s/DSC_4121.JPG', ''),
(82, 9, '127 survey/Mombay''s/DSC_4122.JPG', ''),
(83, 10, '127 survey/Nela''s/DSC_4178.JPG', ''),
(84, 10, '127 survey/Nela''s/DSC_4180.JPG', ''),
(85, 10, '127 survey/Nela''s/DSC_4181.JPG', ''),
(86, 10, '127 survey/Nela''s/DSC_4182.JPG', ''),
(87, 10, '127 survey/Nela''s/DSC_4183.JPG', ''),
(88, 10, '127 survey/Nela''s/DSC_4184.JPG', ''),
(89, 10, '127 survey/Nela''s/DSC_4185.JPG', ''),
(90, 10, '127 survey/Nela''s/DSC_4186.JPG', ''),
(91, 10, '127 survey/Nela''s/DSC_4188.JPG', ''),
(92, 10, '127 survey/Nela''s/DSC_4192.JPG', ''),
(93, 10, '127 survey/Nela''s/DSC_4193.JPG', ''),
(94, 10, '127 survey/Nela''s/DSC_4194.JPG', ''),
(95, 11, '127 survey/RA/DSC_4217.JPG', ''),
(96, 11, '127 survey/RA/DSC_4219.JPG', ''),
(97, 11, '127 survey/RA/DSC_4234.JPG', ''),
(98, 11, '127 survey/RA/DSC_4235.JPG', ''),
(99, 11, '127 survey/RA/DSC_4279.JPG', ''),
(100, 11, '127 survey/RA/DSC_4280.JPG', ''),
(101, 11, '127 survey/RA/DSC_4281.JPG', ''),
(102, 11, '127 survey/RA/DSC_4282.JPG', ''),
(103, 11, '127 survey/RA/DSC_4283.JPG', ''),
(104, 11, '127 survey/RA/DSC_4284.JPG', ''),
(105, 11, '127 survey/RA/DSC_4285.JPG', ''),
(106, 11, '127 survey/RA/DSC_4288.JPG', ''),
(107, 11, '127 survey/RA/DSC_4289.JPG', ''),
(108, 11, '127 survey/RA/DSC_4290.JPG', ''),
(109, 11, '127 survey/RA/DSC_4291.JPG', ''),
(110, 11, '127 survey/RA/DSC_4293.JPG', ''),
(111, 11, '127 survey/RA/DSC_4294.JPG', ''),
(112, 11, '127 survey/RA/DSC_4296.JPG', ''),
(113, 11, '127 survey/RA/DSC_4297.JPG', ''),
(114, 11, '127 survey/RA/DSC_4298.JPG', ''),
(115, 11, '127 survey/RA/DSC_4299.JPG', ''),
(116, 11, '127 survey/RA/DSC_4300.JPG', ''),
(117, 11, '127 survey/RA/DSC_4301.JPG', ''),
(118, 11, '127 survey/RA/DSC_4302.JPG', ''),
(119, 12, '127 survey/Betty''s/DSC_4221.JPG', ''),
(120, 12, '127 survey/Betty''s/DSC_4222.JPG', ''),
(122, 12, '127 survey/Betty''s/DSC_4224.JPG', ''),
(123, 12, '127 survey/Betty''s/DSC_4225.JPG', ''),
(124, 12, '127 survey/Betty''s/DSC_4226.JPG', ''),
(125, 12, '127 survey/Betty''s/DSC_4227.JPG', ''),
(126, 12, '127 survey/Betty''s/DSC_4228.JPG', ''),
(127, 12, '127 survey/Betty''s/DSC_4229.JPG', ''),
(128, 12, '127 survey/Betty''s/DSC_4230.JPG', ''),
(129, 13, '127 survey/Cheery/DSC_4245.JPG', ''),
(130, 13, '127 survey/Cheery/DSC_4246.JPG', ''),
(131, 13, '127 survey/Cheery/DSC_4247.JPG', ''),
(132, 13, '127 survey/Cheery/DSC_4248.JPG', ''),
(133, 13, '127 survey/Cheery/DSC_4249.JPG', ''),
(134, 13, '127 survey/Cheery/DSC_4250.JPG', ''),
(135, 13, '127 survey/Cheery/DSC_4251.JPG', ''),
(136, 13, '127 survey/Cheery/DSC_4252.JPG', ''),
(137, 13, '127 survey/Cheery/DSC_4258.JPG', ''),
(138, 14, '127 survey/Nablen''s/DSC_4255.JPG', ''),
(139, 14, '127 survey/Nablen''s/DSC_4256.JPG', ''),
(140, 15, '127 survey/Susan''s Dorm/DSC_4262.JPG', ''),
(141, 15, '127 survey/Susan''s Dorm/DSC_4264.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `dorm_room`
--

CREATE TABLE `dorm_room` (
  `drID` int(11) NOT NULL,
  `DormID` int(11) NOT NULL,
  `RoomNo` int(11) NOT NULL,
  `Availability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dorm_room`
--

INSERT INTO `dorm_room` (`drID`, `DormID`, `RoomNo`, `Availability`) VALUES
(1, 2, 1, '2 rooms (10 persons)'),
(2, 3, 2, '17 persons'),
(3, 4, 3, '4 rooms'),
(4, 4, 4, 'n/a'),
(5, 5, 5, '3 persons (for girls)'),
(6, 5, 6, 'n/a'),
(7, 6, 7, '4 rooms'),
(8, 7, 8, 'none'),
(9, 8, 2, 'none'),
(10, 9, 9, '18 persons'),
(11, 10, 10, 'none'),
(12, 11, 11, '4 persons (for boys)'),
(13, 11, 12, 'none'),
(14, 11, 13, '1 room'),
(15, 12, 14, '1 room'),
(16, 12, 15, '2 rooms'),
(17, 13, 16, '3 rooms'),
(18, 14, 17, '6 rooms'),
(19, 15, 3, 'n/a'),
(20, 15, 14, 'n/a'),
(21, 15, 18, 'n/a'),
(22, 16, 19, '1 room'),
(23, 5, 5, '2 persons (for boys)');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facilityNo` int(11) NOT NULL,
  `facilityName` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facilityNo`, `facilityName`) VALUES
(1, 'Kitchen'),
(2, 'Common CR'),
(3, 'CR per room'),
(4, 'WiFi'),
(5, 'Lobby'),
(6, 'Laundry Area'),
(7, 'Fire Extinguisher'),
(8, 'Water Pump'),
(9, 'Dirty Kitchen'),
(10, 'Television'),
(11, 'Emergency Lights'),
(12, 'Canteen'),
(13, 'Water Dispenser'),
(14, 'Rooftop Gazebo'),
(15, 'Study Area'),
(16, 'Lavatory per room'),
(17, 'Water Cooler');

-- --------------------------------------------------------

--
-- Table structure for table `facility_dorm`
--

CREATE TABLE `facility_dorm` (
  `fdID` int(11) NOT NULL,
  `facilityNo` int(11) NOT NULL,
  `DormID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility_dorm`
--

INSERT INTO `facility_dorm` (`fdID`, `facilityNo`, `DormID`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 4, 2),
(4, 2, 3),
(5, 3, 3),
(6, 1, 3),
(7, 4, 3),
(8, 5, 3),
(9, 6, 3),
(10, 2, 4),
(11, 4, 4),
(12, 1, 4),
(13, 5, 4),
(14, 6, 4),
(15, 7, 4),
(16, 8, 4),
(17, 3, 5),
(18, 1, 5),
(19, 9, 5),
(20, 15, 5),
(21, 15, 4),
(22, 2, 6),
(23, 3, 6),
(24, 8, 6),
(25, 1, 6),
(26, 4, 7),
(27, 2, 7),
(28, 16, 8),
(29, 3, 8),
(30, 1, 9),
(31, 2, 9),
(32, 4, 9),
(48, 1, 10),
(49, 2, 10),
(50, 4, 10),
(51, 5, 10),
(52, 6, 10),
(53, 14, 10),
(54, 1, 11),
(55, 12, 11),
(56, 2, 11),
(57, 4, 11),
(58, 1, 12),
(59, 4, 12),
(60, 2, 12),
(61, 12, 12),
(62, 17, 13),
(63, 3, 13),
(64, 4, 13),
(65, 10, 13),
(66, 5, 13),
(67, 4, 14),
(68, 2, 14),
(69, 3, 14),
(70, 2, 15),
(72, 12, 15),
(73, 10, 15),
(74, 4, 15),
(75, 8, 19),
(76, 9, 19),
(77, 10, 19),
(78, 11, 19),
(79, 10, 21),
(80, 11, 21),
(81, 12, 21),
(82, 6, 22),
(83, 7, 22),
(84, 8, 22),
(85, 6, 22),
(86, 7, 22),
(87, 13, 22),
(88, 2, 24),
(89, 3, 24),
(90, 5, 25),
(91, 6, 25),
(92, 7, 25),
(93, 7, 11),
(94, 11, 11),
(95, 13, 11),
(96, 8, 13),
(97, 3, 9),
(98, 5, 9),
(99, 7, 12),
(100, 10, 9),
(101, 12, 12),
(102, 13, 12),
(103, 5, 2),
(104, 5, 7),
(105, 3, 10),
(106, 9, 10),
(107, 6, 14),
(108, 3, 16),
(109, 16, 16),
(110, 9, 16),
(111, 5, 16),
(112, 8, 16),
(113, 4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `OwnerId` int(10) NOT NULL,
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`OwnerId`, `Name`) VALUES
(1, 'Emiliana Gabon'),
(2, 'Ferdinand Nonato'),
(3, 'Napoleon and Marjorie Nonato'),
(4, 'Resurrecion Nonchete'),
(5, 'Etta Bumanlag'),
(6, 'Marissa Pascasio'),
(7, 'Four Sisters Apartment'),
(8, 'Elpidio Mombay'),
(9, 'Nela Silfaban'),
(10, 'Nelson Napud'),
(11, 'Betty Nufuar'),
(12, 'Cheery Joy Mayormente'),
(13, 'Leny Fortaleza'),
(14, 'Edwin Mollinedo'),
(15, 'Nida Nufable'),
(16, 'ShebnaFabilloren'),
(17, 'Rose'),
(18, 'Kom Sai'),
(19, 'Hello'),
(20, 'Hello Cold World'),
(21, 'Lincy Legada');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `RentId` int(10) NOT NULL,
  `TypeOfPayment` enum('by_person','by_room') NOT NULL,
  `Price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`RentId`, `TypeOfPayment`, `Price`) VALUES
(1, 'by_person', 1000),
(2, 'by_room', 5000),
(3, 'by_person', 1200),
(5, 'by_person', 800),
(6, 'by_person', 1300),
(7, 'by_person', 1600),
(8, 'by_person', 1450),
(9, 'by_person', 895),
(11, 'by_person', 2000),
(12, 'by_person', 1500),
(13, 'by_person', 2500),
(14, 'by_person', 2200),
(15, 'by_room', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomNo` int(10) NOT NULL,
  `MaxNoOfResidents` int(10) NOT NULL,
  `RentId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomNo`, `MaxNoOfResidents`, `RentId`) VALUES
(1, 5, 1),
(2, 4, 2),
(3, 4, 3),
(4, 1, 1),
(5, 4, 5),
(6, 6, 5),
(7, 3, 6),
(8, 2, 7),
(9, 6, 1),
(10, 4, 8),
(11, 4, 9),
(12, 2, 3),
(13, 1, 11),
(14, 2, 12),
(15, 4, 12),
(16, 4, 13),
(17, 4, 14),
(18, 1, 13),
(19, 2, 15);

-- --------------------------------------------------------

--
-- Structure for view `all_facilities`
--
DROP TABLE IF EXISTS `all_facilities`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_facilities`  AS  (select `dorm`.`DormId` AS `DormId`,`dorm`.`DormName` AS `DormName`,`facilities`.`facilityNo` AS `facilityNo`,`facilities`.`facilityName` AS `facilityName` from ((`dorm` join `facility_dorm`) join `facilities`) where ((`dorm`.`DormId` = `facility_dorm`.`DormID`) and (`facility_dorm`.`facilityNo` = `facilities`.`facilityNo`))) ;

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
  ADD PRIMARY KEY (`DormId`),
  ADD KEY `OwnerId` (`OwnerId`),
  ADD KEY `AddressId` (`AddressId`);

--
-- Indexes for table `dorm_addon`
--
ALTER TABLE `dorm_addon`
  ADD PRIMARY KEY (`daID`),
  ADD KEY `DormId` (`DormId`),
  ADD KEY `add_id` (`add_id`);

--
-- Indexes for table `dorm_number`
--
ALTER TABLE `dorm_number`
  ADD KEY `DormID` (`DormID`);

--
-- Indexes for table `dorm_pictures`
--
ALTER TABLE `dorm_pictures`
  ADD PRIMARY KEY (`dormpicID`),
  ADD KEY `DormId` (`DormId`);

--
-- Indexes for table `dorm_room`
--
ALTER TABLE `dorm_room`
  ADD PRIMARY KEY (`drID`),
  ADD KEY `DormID` (`DormID`),
  ADD KEY `RoomNo` (`RoomNo`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facilityNo`);

--
-- Indexes for table `facility_dorm`
--
ALTER TABLE `facility_dorm`
  ADD PRIMARY KEY (`fdID`),
  ADD KEY `DormID` (`DormID`),
  ADD KEY `facility_dorm_ibfk_2` (`facilityNo`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`OwnerId`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`RentId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomNo`),
  ADD KEY `RentId` (`RentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `add_on`
--
ALTER TABLE `add_on`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dorm`
--
ALTER TABLE `dorm`
  MODIFY `DormId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `dorm_addon`
--
ALTER TABLE `dorm_addon`
  MODIFY `daID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dorm_pictures`
--
ALTER TABLE `dorm_pictures`
  MODIFY `dormpicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `dorm_room`
--
ALTER TABLE `dorm_room`
  MODIFY `drID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facilityNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `facility_dorm`
--
ALTER TABLE `facility_dorm`
  MODIFY `fdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `OwnerId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `RentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dorm_addon`
--
ALTER TABLE `dorm_addon`
  ADD CONSTRAINT `dorm_addon_ibfk_1` FOREIGN KEY (`DormId`) REFERENCES `dorm` (`DormId`),
  ADD CONSTRAINT `dorm_addon_ibfk_2` FOREIGN KEY (`add_id`) REFERENCES `add_on` (`add_id`);

--
-- Constraints for table `dorm_number`
--
ALTER TABLE `dorm_number`
  ADD CONSTRAINT `dorm_number_ibfk_1` FOREIGN KEY (`DormID`) REFERENCES `dorm` (`DormId`);

--
-- Constraints for table `dorm_pictures`
--
ALTER TABLE `dorm_pictures`
  ADD CONSTRAINT `dorm_pictures_ibfk_1` FOREIGN KEY (`DormId`) REFERENCES `dorm` (`DormId`);

--
-- Constraints for table `dorm_room`
--
ALTER TABLE `dorm_room`
  ADD CONSTRAINT `dorm_room_ibfk_1` FOREIGN KEY (`DormID`) REFERENCES `dorm` (`DormId`),
  ADD CONSTRAINT `dorm_room_ibfk_2` FOREIGN KEY (`RoomNo`) REFERENCES `room` (`RoomNo`);

--
-- Constraints for table `facility_dorm`
--
ALTER TABLE `facility_dorm`
  ADD CONSTRAINT `facility_dorm_ibfk_2` FOREIGN KEY (`facilityNo`) REFERENCES `facilities` (`facilityNo`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`RentId`) REFERENCES `rent` (`RentId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

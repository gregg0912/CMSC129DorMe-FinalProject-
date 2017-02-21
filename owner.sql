-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2017 at 06:20 AM
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
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `OwnerId` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`OwnerId`, `Name`, `Username`, `Password`, `Email`, `Number`) VALUES
(1, 'Emiliana Gabon', 'egabon', 'fdc788e97c0f2fb088ca850db913f34c', 'egabon@gmail.com', '0'),
(2, 'Ferdinand Nonato', 'fnonato', 'ddccdf0975292540fb60b8d4a531f57b', 'fnonato@yahoo.com', '0'),
(3, 'Napoleon and Marjorie Nonato', 'nmnonato', '9dd514e1fd6c243e1622df2b5b9a036e', 'nmnonato@gmail.com', '0'),
(4, 'Resurrecion Nonchete', 'rnochete', '379ac2417ff292ab5934786519565787', 'rnochete@gmail.com', '0'),
(5, 'Etta Bumanlag', 'ebumanlag', 'a31c6ca111d3491becb18395d501859c', 'ebumanlag@yahoo.com', '0'),
(6, 'Marissa Pascasio', 'mpascasio', '754467f8d6beb49a032e33618db78169', 'mpascasio@gmail.com', '0'),
(7, 'Four Sisters Apartment', 'fsapartment', 'ebe9a2922f8ee7569a5a8f044a36f135', 'fsapartment@gmail.com', '0'),
(8, 'Elpidio Mombay', 'emombay', '15213950cf0fd8d13fef6e089f8ecaea', 'emombay@gmail.com', '0'),
(9, 'Nela Silfaban', 'nsilfaban', '75093e39e5e7e0a69119ab3472d53c5d', 'nsilfaban@yahoo.com', '0'),
(10, 'Nelson Napud', 'nnapud', '396fbf170eda4443490b0a86581359f3', 'nnapud@gmail.com', '0'),
(11, 'Betty Nufuar', 'bnufuar', 'b88de490dd66003ba329803c242a9753', 'bnufuar@gmail.com', '0'),
(12, 'Cheery Joy Mayormente', 'cjmayormente', 'bc357b14c04b280af89ed2789853a2fe', 'cjmayormente@gmail.com', '0'),
(13, 'Leny Fortaleza', 'lfortaleza', '81dd4c264bc7bd803fbcaf96e553d96e', 'lfortaleza@gmail.com', '0'),
(14, 'Edwin Mollinedo', 'emollinedo', '92b67fae55b3165648b1e0f5a475fda4', 'emollinedo@gmail.com', '0'),
(15, 'Nida Nufable', 'nnufable', 'cf7fb225d46013e633fac7ae27ed6d94', 'nnufable@gmail.com', '0'),
(16, 'ShebnaFabilloren', 'sfabilloren', 'c11d061d1a191b7487f924a2a565e659', 'sfabilloren@gmail.com', '0'),
(17, 'Rose', 'rose', '337b38e2f3bfe3bf7c11e4cd60835bfe', 'rose@gmail.com', '0'),
(18, 'Kom Sai', 'komsai', '0229a5b03f2d1331163fb02739c48a82', 'komsai@gmail.com', '0'),
(19, 'Hello', 'hello', 'hello123', 'hello@gmail.com', '0'),
(20, 'Hello Cold World', 'hellocoldworld', 'abdb716c43b93f31c6df05a0455f7200', 'hellocoldworld@gmail.com', '0'),
(21, 'Lincy Legada', 'llegada', '5763a22d3d28ad3814fa3c21358a85d1', 'llegada@gmail.com', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`OwnerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `OwnerId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

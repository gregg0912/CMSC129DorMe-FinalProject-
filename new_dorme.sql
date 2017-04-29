-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 08:26 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_dorme`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(10) UNSIGNED NOT NULL,
  `dorm_id` int(11) NOT NULL,
  `add_item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `add_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `dorm_id`, `add_item`, `add_price`, `created_at`, `updated_at`) VALUES
(1, 8, 'vero', '163', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(2, 3, 'necessitatibus', '211', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(3, 4, 'quia', '983', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(4, 8, 'iure', '978', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(5, 9, 'voluptatem', '117', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(6, 1, 'quod', '344', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(7, 5, 'dolores', '179', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(8, 5, 'impedit', '910', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(9, 4, 'neque', '736', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(10, 4, 'quod', '853', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(11, 8, 'velit', '705', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(12, 9, 'suscipit', '829', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(13, 1, 'aut', '981', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(14, 8, 'excepturi', '409', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(15, 6, 'tenetur', '150', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(16, 2, 'soluta', '154', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(17, 10, 'itaque', '716', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(18, 2, 'repudiandae', '144', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(19, 6, 'sequi', '565', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(20, 4, 'ut', '860', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(21, 6, 'aut', '839', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(22, 8, 'architecto', '620', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(23, 4, 'accusantium', '795', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(24, 10, 'maxime', '103', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(25, 9, 'dolores', '603', '2017-04-28 22:20:03', '2017-04-28 22:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `dorms`
--

CREATE TABLE `dorms` (
  `id` int(10) UNSIGNED NOT NULL,
  `dormName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `housingType` enum('apartment','boardinghouse','bedspace','dormitory') COLLATE utf8_unicode_ci NOT NULL,
  `location` enum('banwa','dormArea') COLLATE utf8_unicode_ci NOT NULL,
  `thumbnailPic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL,
  `streetName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barangayName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dorms`
--

INSERT INTO `dorms` (`id`, `dormName`, `user_id`, `housingType`, `location`, `thumbnailPic`, `votes`, `streetName`, `barangayName`, `created_at`, `updated_at`) VALUES
(1, 'King, Muller and Morar', 4, 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 4, 'Lockman Corner', 'Citlallishire', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(2, 'Stark and Sons', 10, 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 13, 'Gibson Wall', 'East Colten', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(3, 'Feil Group', 1, 'bedspace', 'banwa', '/img-uploads/no_image.png', 22, 'Kyla Fields', 'Ullrichmouth', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(4, 'Ruecker, Lang and Turcotte', 10, 'apartment', 'dormArea', '/img-uploads/no_image.png', 0, 'Cordell Extensions', 'Zemlakshire', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(5, 'Crist, Ortiz and McKenzie', 3, 'dormitory', 'dormArea', '/img-uploads/no_image.png', 30, 'Gleason Circle', 'Schulistport', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(6, 'Price-Turcotte', 9, 'apartment', 'banwa', '/img-uploads/no_image.png', 5, 'Jennings Field', 'East Walton', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(7, 'Armstrong-Bergnaum', 1, 'boardinghouse', 'dormArea', '/img-uploads/no_image.png', 6, 'Huels Port', 'North Gradyburgh', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(8, 'Boehm, Feest and McKenzie', 3, 'boardinghouse', 'dormArea', '/img-uploads/no_image.png', 20, 'Alba Harbors', 'South Norrishaven', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(9, 'Grant-Grimes', 7, 'apartment', 'dormArea', '/img-uploads/no_image.png', 23, 'Herman Road', 'Shanelleborough', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(10, 'Morar-Mills', 10, 'dormitory', 'dormArea', '/img-uploads/no_image.png', 25, 'Jayde Pike', 'North Ivah', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(11, 'Klocko Group', 4, 'bedspace', 'banwa', '/img-uploads/no_image.png', 11, 'Zoey Mission', 'Westchester', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(12, 'Flatley, Brekke and Feest', 3, 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 23, 'Davon Ford', 'East Ezequiel', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(13, 'Klein, Kirlin and Stracke', 1, 'bedspace', 'dormArea', '/img-uploads/no_image.png', 25, 'Leta River', 'East Elinorehaven', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(14, 'Kutch Ltd', 10, 'apartment', 'banwa', '/img-uploads/no_image.png', 24, 'Osbaldo Coves', 'West Landenberg', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(15, 'Halvorson-Johns', 2, 'bedspace', 'banwa', '/img-uploads/no_image.png', 23, 'Schiller Plaza', 'Kaylaville', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(16, 'Hirthe-Boehm', 8, 'bedspace', 'banwa', '/img-uploads/no_image.png', 20, 'Funk Harbors', 'Ramonashire', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(17, 'Schinner-Gulgowski', 10, 'bedspace', 'dormArea', '/img-uploads/no_image.png', 15, 'Lakin Throughway', 'Murraystad', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(18, 'Kshlerin, Lindgren and Abbott', 7, 'apartment', 'dormArea', '/img-uploads/no_image.png', 16, 'Tobin Flats', 'Daphnehaven', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(19, 'Skiles-Medhurst', 1, 'apartment', 'banwa', '/img-uploads/no_image.png', 11, 'Winnifred Ways', 'Port Orenside', '2017-04-28 22:20:02', '2017-04-28 22:20:02'),
(20, 'Walsh LLC', 1, 'dormitory', 'dormArea', '/img-uploads/no_image.png', 0, 'Alexanne Route', 'West Junior', '2017-04-28 22:20:02', '2017-04-28 22:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `dorm_id` int(11) NOT NULL,
  `facility_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `dorm_id`, `facility_name`, `created_at`, `updated_at`) VALUES
(1, 3, 'odio', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(2, 19, 'inventore', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(3, 13, 'sint', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(4, 13, 'voluptas', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(5, 14, 'quia', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(6, 7, 'ab', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(7, 18, 'eos', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(8, 16, 'expedita', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(9, 3, 'nobis', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(10, 1, 'distinctio', '2017-04-28 22:20:03', '2017-04-28 22:20:03'),
(11, 2, 'rerum', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(12, 17, 'repudiandae', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(13, 19, 'accusantium', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(14, 11, 'consequatur', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(15, 10, 'illo', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(16, 9, 'cupiditate', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(17, 2, 'illum', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(18, 3, 'asperiores', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(19, 11, 'ea', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(20, 6, 'ipsa', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(21, 9, 'voluptate', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(22, 18, 'ipsum', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(23, 12, 'et', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(24, 2, 'minima', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(25, 9, 'placeat', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(26, 6, 'qui', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(27, 5, 'sunt', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(28, 8, 'illo', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(29, 3, 'hic', '2017-04-28 22:20:04', '2017-04-28 22:20:04'),
(30, 13, 'ea', '2017-04-28 22:20:04', '2017-04-28 22:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(341, '2014_10_12_000000_create_users_table', 1),
(342, '2014_10_12_100000_create_password_resets_table', 1),
(343, '2017_04_23_100633_create_dorms_table', 1),
(344, '2017_04_23_101256_create_rooms_table', 1),
(345, '2017_04_23_101512_create_addons_table', 1),
(346, '2017_04_23_101621_create_facilities_table', 1),
(347, '2017_04_25_130158_create_requests_table', 1),
(348, '2017_04_25_130237_create_requestaddons_table', 1),
(349, '2017_04_25_130311_create_requestfacilities_table', 1),
(350, '2017_04_25_130328_create_requestrooms_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `dormName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `housingType` enum('apartment','boardinghouse','bedspace','dormitory') COLLATE utf8_unicode_ci NOT NULL,
  `location` enum('banwa','dormArea') COLLATE utf8_unicode_ci NOT NULL,
  `thumbnailPic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `streetName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barangayName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `dormName`, `housingType`, `location`, `thumbnailPic`, `streetName`, `barangayName`, `created_at`, `updated_at`) VALUES
(1, 6, 'Bergstrom, Romaguera and Osinski', 'dormitory', 'banwa', '/img-uploads/no_image.png', 'Gerda Flat', 'Katherinehaven', '2017-04-28 22:20:07', '2017-04-28 22:20:07'),
(2, 10, 'Zemlak-Kovacek', 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 'Isabel Avenue', 'West Maymie', '2017-04-28 22:20:07', '2017-04-28 22:20:07'),
(3, 1, 'Stark, Smith and Reichel', 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 'Harvey Village', 'Cynthiamouth', '2017-04-28 22:20:07', '2017-04-28 22:20:07'),
(4, 2, 'Weber PLC', 'apartment', 'dormArea', '/img-uploads/no_image.png', 'Braden Radial', 'New Ethylberg', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(5, 4, 'Harvey-Prohaska', 'bedspace', 'dormArea', '/img-uploads/no_image.png', 'Amparo Grove', 'Chesterborough', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(6, 7, 'Leuschke, Kuhn and Hand', 'bedspace', 'banwa', '/img-uploads/no_image.png', 'Nicola Pine', 'Paytonport', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(7, 5, 'Macejkovic-Rohan', 'bedspace', 'banwa', '/img-uploads/no_image.png', 'Eli Coves', 'South Shana', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(8, 1, 'DuBuque, Labadie and Torp', 'bedspace', 'banwa', '/img-uploads/no_image.png', 'Bulah Stravenue', 'Batzfort', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(9, 9, 'Johnston Ltd', 'apartment', 'banwa', '/img-uploads/no_image.png', 'Graham Hills', 'Bernhardfort', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(10, 5, 'Nicolas Group', 'dormitory', 'dormArea', '/img-uploads/no_image.png', 'Frederic Island', 'Bahringerhaven', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(11, 2, 'Jacobi Ltd', 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 'Reanna Green', 'New Lyricland', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(12, 10, 'Cole-Senger', 'dormitory', 'dormArea', '/img-uploads/no_image.png', 'Tamara Ridges', 'Tomasstad', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(13, 5, 'Ullrich, Corkery and Gutkowski', 'apartment', 'dormArea', '/img-uploads/no_image.png', 'Emard Bypass', 'South Bud', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(14, 3, 'Stiedemann-Kautzer', 'apartment', 'banwa', '/img-uploads/no_image.png', 'Burdette Port', 'Justinastad', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(15, 2, 'Ferry LLC', 'bedspace', 'dormArea', '/img-uploads/no_image.png', 'Eichmann Park', 'New Bethside', '2017-04-28 22:20:08', '2017-04-28 22:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `request_addons`
--

CREATE TABLE `request_addons` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `add_item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `add_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `request_addons`
--

INSERT INTO `request_addons` (`id`, `request_id`, `add_item`, `add_price`, `created_at`, `updated_at`) VALUES
(1, 2, 'tempora', '708', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(2, 5, 'officiis', '660', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(3, 7, 'id', '258', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(4, 3, 'ut', '120', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(5, 7, 'quidem', '988', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(6, 7, 'illum', '387', '2017-04-28 22:20:08', '2017-04-28 22:20:08'),
(7, 1, 'quia', '207', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(8, 10, 'voluptas', '676', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(9, 9, 'voluptatem', '416', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(10, 14, 'placeat', '432', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(11, 11, 'vel', '995', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(12, 15, 'eveniet', '464', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(13, 4, 'fuga', '879', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(14, 8, 'quis', '936', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(15, 9, 'porro', '770', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(16, 3, 'et', '294', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(17, 3, 'animi', '186', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(18, 9, 'est', '725', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(19, 6, 'animi', '878', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(20, 7, 'quibusdam', '837', '2017-04-28 22:20:09', '2017-04-28 22:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `request_facilities`
--

CREATE TABLE `request_facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `facility_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `request_facilities`
--

INSERT INTO `request_facilities` (`id`, `request_id`, `facility_name`, `created_at`, `updated_at`) VALUES
(1, 5, 'repellat', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(2, 2, 'ducimus', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(3, 3, 'hic', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(4, 11, 'eius', '2017-04-28 22:20:09', '2017-04-28 22:20:09'),
(5, 8, 'ut', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(6, 6, 'et', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(7, 1, 'ipsam', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(8, 10, 'quasi', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(9, 1, 'enim', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(10, 1, 'autem', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(11, 13, 'eligendi', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(12, 12, 'labore', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(13, 9, 'itaque', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(14, 12, 'nesciunt', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(15, 14, 'in', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(16, 11, 'quia', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(17, 14, 'cupiditate', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(18, 1, 'laboriosam', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(19, 1, 'iure', '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(20, 8, 'et', '2017-04-28 22:20:10', '2017-04-28 22:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `request_rooms`
--

CREATE TABLE `request_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `maxNoOfResidents` int(11) NOT NULL,
  `typeOfPayment` enum('by_room','by_person') COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `request_rooms`
--

INSERT INTO `request_rooms` (`id`, `request_id`, `maxNoOfResidents`, `typeOfPayment`, `price`, `created_at`, `updated_at`) VALUES
(1, 12, 5, 'by_person', 3537, '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(2, 3, 2, 'by_person', 3304, '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(3, 2, 4, 'by_room', 3030, '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(4, 19, 4, 'by_room', 3711, '2017-04-28 22:20:10', '2017-04-28 22:20:10'),
(5, 5, 2, 'by_room', 4872, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(6, 20, 7, 'by_room', 3366, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(7, 3, 7, 'by_person', 3239, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(8, 1, 7, 'by_room', 4975, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(9, 20, 8, 'by_person', 4112, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(10, 5, 6, 'by_person', 2683, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(11, 7, 8, 'by_person', 4371, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(12, 10, 5, 'by_room', 1925, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(13, 7, 8, 'by_person', 1451, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(14, 19, 3, 'by_person', 1523, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(15, 3, 8, 'by_room', 3876, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(16, 13, 8, 'by_person', 4854, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(17, 19, 5, 'by_person', 1663, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(18, 11, 4, 'by_room', 4692, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(19, 18, 5, 'by_person', 2270, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(20, 6, 6, 'by_person', 3494, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(21, 3, 4, 'by_room', 3871, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(22, 1, 4, 'by_room', 2776, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(23, 8, 5, 'by_person', 1976, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(24, 15, 7, 'by_room', 3603, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(25, 20, 4, 'by_person', 3295, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(26, 16, 8, 'by_person', 3767, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(27, 1, 3, 'by_room', 3159, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(28, 4, 7, 'by_person', 1799, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(29, 10, 3, 'by_person', 1540, '2017-04-28 22:20:11', '2017-04-28 22:20:11'),
(30, 1, 8, 'by_room', 1717, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(31, 8, 3, 'by_room', 3298, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(32, 3, 2, 'by_room', 4504, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(33, 1, 8, 'by_room', 3127, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(34, 8, 3, 'by_person', 4197, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(35, 12, 8, 'by_room', 3731, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(36, 9, 3, 'by_room', 4604, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(37, 3, 5, 'by_room', 2646, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(38, 15, 3, 'by_room', 3629, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(39, 20, 7, 'by_person', 4357, '2017-04-28 22:20:12', '2017-04-28 22:20:12'),
(40, 17, 2, 'by_room', 2701, '2017-04-28 22:20:12', '2017-04-28 22:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `dorm_id` int(11) NOT NULL,
  `maxNoOfResidents` int(11) NOT NULL,
  `typeOfPayment` enum('by_room','by_person') COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `dorm_id`, `maxNoOfResidents`, `typeOfPayment`, `price`, `availability`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'by_room', 4560, 1, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(2, 14, 7, 'by_person', 4060, 0, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(3, 7, 6, 'by_room', 4443, 1, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(4, 7, 5, 'by_room', 3826, 1, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(5, 14, 8, 'by_room', 1292, 2, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(6, 14, 8, 'by_room', 805, 0, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(7, 7, 2, 'by_person', 4413, 0, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(8, 5, 4, 'by_person', 2278, 1, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(9, 6, 7, 'by_room', 1536, 0, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(10, 11, 6, 'by_person', 2089, 2, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(11, 3, 3, 'by_person', 2865, 1, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(12, 18, 2, 'by_room', 2109, 2, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(13, 9, 7, 'by_person', 3510, 1, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(14, 10, 3, 'by_person', 1101, 2, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(15, 5, 4, 'by_person', 4660, 1, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(16, 5, 8, 'by_person', 4549, 1, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(17, 3, 5, 'by_person', 2820, 0, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(18, 16, 3, 'by_person', 3584, 0, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(19, 6, 7, 'by_person', 1959, 0, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(20, 7, 7, 'by_room', 4604, 2, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(21, 7, 6, 'by_room', 2941, 2, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(22, 14, 5, 'by_room', 1451, 2, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(23, 20, 5, 'by_room', 1143, 1, '2017-04-28 22:20:05', '2017-04-28 22:20:05'),
(24, 10, 4, 'by_person', 4633, 2, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(25, 2, 6, 'by_person', 1832, 2, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(26, 15, 7, 'by_person', 4121, 2, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(27, 2, 8, 'by_room', 3076, 1, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(28, 18, 5, 'by_room', 953, 1, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(29, 4, 4, 'by_person', 4359, 0, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(30, 12, 2, 'by_person', 1984, 2, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(31, 6, 2, 'by_room', 3078, 0, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(32, 7, 4, 'by_person', 1530, 0, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(33, 14, 5, 'by_person', 2997, 1, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(34, 15, 7, 'by_room', 3209, 2, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(35, 17, 6, 'by_person', 1790, 2, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(36, 2, 5, 'by_person', 3491, 0, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(37, 1, 7, 'by_room', 1046, 1, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(38, 8, 4, 'by_person', 3112, 1, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(39, 1, 5, 'by_room', 885, 0, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(40, 10, 7, 'by_person', 4972, 1, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(41, 14, 4, 'by_person', 2573, 1, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(42, 18, 7, 'by_room', 1119, 1, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(43, 10, 4, 'by_person', 1563, 2, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(44, 19, 4, 'by_room', 4647, 1, '2017-04-28 22:20:06', '2017-04-28 22:20:06'),
(45, 5, 3, 'by_room', 2965, 0, '2017-04-28 22:20:07', '2017-04-28 22:20:07'),
(46, 20, 6, 'by_person', 4557, 0, '2017-04-28 22:20:07', '2017-04-28 22:20:07'),
(47, 14, 7, 'by_room', 938, 2, '2017-04-28 22:20:07', '2017-04-28 22:20:07'),
(48, 12, 4, 'by_person', 2412, 2, '2017-04-28 22:20:07', '2017-04-28 22:20:07'),
(49, 12, 3, 'by_person', 2702, 0, '2017-04-28 22:20:07', '2017-04-28 22:20:07'),
(50, 7, 3, 'by_room', 3459, 1, '2017-04-28 22:20:07', '2017-04-28 22:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rigoberto Hirthe', 'voluptatibus', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'pschoen@example.net', '+4067087410956', '4cKEq7j0hR', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(2, 'Yesenia Von', 'facere', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'barrett39@example.net', '+1740597603343', 'UEo6Otsfvml1CSU1rM2Qe6WmWirRaoKfftMFvAQfUGfBxSo9tQLWRYd8BoYk', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(3, 'Cleveland Kautzer', 'quidem', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'sid84@example.net', '+3045614302134', 'X9ZRt9BDst', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(4, 'Tanner Larson', 'eum', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'labadie.maybell@example.net', '+1235317873988', 'HHctZ6klp3', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(5, 'Cole Cummings', 'maxime', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'ujohnson@example.net', '+0284167491339', 'wtSEqvnjMH', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(6, 'Agnes Bruen', 'maxime', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'gianni78@example.org', '+3542768183459', 'cGiq8jdWWe', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(7, 'Dr. Noelia Williamson', 'voluptatem', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'grant.eldridge@example.org', '+0071628501255', 'uAYx6WQ6Jc', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(8, 'Adella Stiedemann', 'aut', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'zraynor@example.org', '+6860359650627', 'x5xroRavrL', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(9, 'Okey Vandervort', 'distinctio', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'sjakubowski@example.com', '+3545642128329', 'k0c7cVBnxk', '2017-04-28 22:20:01', '2017-04-28 22:20:01'),
(10, 'Antonetta Nitzsche DVM', 'repellat', '$2y$10$BR/6TYCQPLCUQ3YjygguDOeXpucKP1i5m8QxSjOP7yBYOp5DEYWnW', 'kertzmann.merle@example.com', '+0495953108221', 'R93EUhtnk2', '2017-04-28 22:20:01', '2017-04-28 22:20:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dorms`
--
ALTER TABLE `dorms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_addons`
--
ALTER TABLE `request_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_facilities`
--
ALTER TABLE `request_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_rooms`
--
ALTER TABLE `request_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `dorms`
--
ALTER TABLE `dorms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `request_addons`
--
ALTER TABLE `request_addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `request_facilities`
--
ALTER TABLE `request_facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `request_rooms`
--
ALTER TABLE `request_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

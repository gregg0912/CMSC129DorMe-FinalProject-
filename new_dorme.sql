-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 06:45 PM
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
(1, 2, 'velit', '874', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(2, 2, 'neque', '418', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(3, 10, 'tenetur', '320', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(4, 5, 'voluptatem', '202', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(5, 6, 'beatae', '214', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(6, 2, 'voluptatem', '189', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(7, 4, 'dignissimos', '968', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(8, 8, 'qui', '468', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(9, 10, 'quis', '658', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(10, 6, 'minus', '738', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(11, 3, 'impedit', '819', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(12, 9, 'eum', '991', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(13, 7, 'aspernatur', '552', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(14, 5, 'error', '211', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(15, 7, 'asperiores', '830', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(16, 8, 'inventore', '752', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(17, 7, 'illo', '639', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(18, 1, 'corrupti', '465', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(19, 7, 'veritatis', '972', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(20, 1, 'et', '754', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(21, 1, 'ut', '116', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(22, 7, 'sit', '509', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(23, 4, 'voluptatem', '989', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(24, 10, 'velit', '724', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(25, 1, 'cum', '862', '2017-04-25 08:43:52', '2017-04-25 08:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `dorms`
--

CREATE TABLE `dorms` (
  `id` int(10) UNSIGNED NOT NULL,
  `dormName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
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

INSERT INTO `dorms` (`id`, `dormName`, `owner_id`, `housingType`, `location`, `thumbnailPic`, `votes`, `streetName`, `barangayName`, `created_at`, `updated_at`) VALUES
(1, 'Keebler, Turcotte and Cruickshank', 9, 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 29, 'Scot Rue', 'Predovicland', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(2, 'Will-Strosin', 7, 'dormitory', 'dormArea', '/img-uploads/no_image.png', 24, 'Janet Garden', 'Kossside', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(3, 'Schulist-Huels', 10, 'apartment', 'banwa', '/img-uploads/no_image.png', 2, 'Bayer Plaza', 'South Carolynehaven', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(4, 'Runte, Kihn and Nicolas', 1, 'dormitory', 'banwa', '/img-uploads/no_image.png', 27, 'Grace Inlet', 'Adalbertochester', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(5, 'Balistreri, Torphy and Olson', 2, 'dormitory', 'banwa', '/img-uploads/no_image.png', 24, 'Marian Harbors', 'New Aldenborough', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(6, 'Mills LLC', 4, 'apartment', 'dormArea', '/img-uploads/no_image.png', 7, 'Boyle Hill', 'Raleighborough', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(7, 'Sipes, Crona and Nicolas', 5, 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 26, 'Pfeffer Corners', 'South Florenciofort', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(8, 'Glover Group', 7, 'boardinghouse', 'dormArea', '/img-uploads/no_image.png', 28, 'Karlie Rue', 'Walkerfort', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(9, 'Stark LLC', 2, 'dormitory', 'banwa', '/img-uploads/no_image.png', 7, 'Noemy Center', 'O''Connerfort', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(10, 'Parisian-Barton', 10, 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 11, 'Dibbert Square', 'South Ociechester', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(11, 'Hickle-Borer', 10, 'dormitory', 'dormArea', '/img-uploads/no_image.png', 20, 'Blanda Rapid', 'East Hope', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(12, 'Kertzmann-Gleason', 2, 'boardinghouse', 'banwa', '/img-uploads/no_image.png', 26, 'Willa Lock', 'Juanahaven', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(13, 'Kling, O''Keefe and Jacobson', 4, 'apartment', 'banwa', '/img-uploads/no_image.png', 28, 'Thomas Villages', 'South Richie', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(14, 'Corwin Ltd', 3, 'bedspace', 'banwa', '/img-uploads/no_image.png', 24, 'Hackett Parks', 'Cronaview', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(15, 'Kerluke, Klocko and Walker', 10, 'dormitory', 'dormArea', '/img-uploads/no_image.png', 25, 'Hoppe Stravenue', 'Lake Napoleonville', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(16, 'Murazik, Kohler and Rau', 2, 'bedspace', 'banwa', '/img-uploads/no_image.png', 18, 'Pacocha Knoll', 'Holliefurt', '2017-04-25 08:43:50', '2017-04-25 08:43:50'),
(17, 'Ward-Kilback', 2, 'bedspace', 'banwa', '/img-uploads/no_image.png', 2, 'Lucas Stravenue', 'Stokeston', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(18, 'Lindgren Group', 2, 'dormitory', 'banwa', '/img-uploads/no_image.png', 25, 'Jewell Ferry', 'Lake Ismaelstad', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(19, 'Little, Smith and Rowe', 7, 'apartment', 'banwa', '/img-uploads/no_image.png', 20, 'Howell Via', 'Bartellburgh', '2017-04-25 08:43:51', '2017-04-25 08:43:51'),
(20, 'Leannon, Kihn and Smith', 1, 'bedspace', 'banwa', '/img-uploads/no_image.png', 30, 'Dakota Alley', 'Port Svenchester', '2017-04-25 08:43:51', '2017-04-25 08:43:51');

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
(1, 5, 'vero', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(2, 12, 'repellat', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(3, 11, 'ullam', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(4, 14, 'hic', '2017-04-25 08:43:52', '2017-04-25 08:43:52'),
(5, 8, 'vel', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(6, 14, 'exercitationem', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(7, 7, 'dolor', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(8, 6, 'qui', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(9, 14, 'labore', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(10, 18, 'recusandae', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(11, 11, 'quo', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(12, 11, 'quidem', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(13, 12, 'et', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(14, 5, 'id', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(15, 11, 'repellendus', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(16, 10, 'maxime', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(17, 7, 'fugit', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(18, 2, 'unde', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(19, 3, 'modi', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(20, 13, 'laboriosam', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(21, 13, 'minima', '2017-04-25 08:43:53', '2017-04-25 08:43:53'),
(22, 5, 'excepturi', '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(23, 6, 'neque', '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(24, 4, 'quia', '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(25, 7, 'id', '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(26, 3, 'dolores', '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(27, 13, 'et', '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(28, 8, 'totam', '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(29, 3, 'illo', '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(30, 17, 'nam', '2017-04-25 08:43:54', '2017-04-25 08:43:54');

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
(271, '2014_10_12_000000_create_users_table', 1),
(272, '2014_10_12_100000_create_password_resets_table', 1),
(273, '2017_04_23_100633_create_dorms_table', 1),
(274, '2017_04_23_101256_create_rooms_table', 1),
(275, '2017_04_23_101512_create_addons_table', 1),
(276, '2017_04_23_101621_create_facilities_table', 1),
(277, '2017_04_25_130158_create_requests_table', 1),
(278, '2017_04_25_130237_create_requestaddons_table', 1),
(279, '2017_04_25_130311_create_requestfacilities_table', 1),
(280, '2017_04_25_130328_create_requestrooms_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
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
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `username`, `password`, `email`, `phone_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ruthe Rodriguez Sr.', 'mollitia', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'faustino.parisian@example.org', '+5329201173659', 'GrDlts4NkS', '2017-04-25 08:43:48', '2017-04-25 08:43:48'),
(2, 'Abdul Wolf IV', 'sit', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'avery84@example.org', '+3959402876133', 'SM8yjLSORm', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(3, 'Erin Mitchell PhD', 'sunt', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'newell46@example.com', '+2757462134236', 'Yvt1tGvGOY', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(4, 'Rubye Green', 'itaque', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'buckridge.archibald@example.org', '+5019394612070', 'R97T6K7hAE', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(5, 'Cheyenne Schoen', 'totam', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'aswift@example.org', '+0057590200627', 'nloV82vFTr', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(6, 'Mitchel Bahringer PhD', 'sunt', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'kayli.schuppe@example.net', '+8979599207586', 'GAwfFw0NEJ', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(7, 'Lesley Wilderman', 'fuga', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'arthur.rau@example.net', '+4944415024590', 'kXGx7KY58l', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(8, 'Mr. Roosevelt Huels PhD', 'nihil', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'isaias21@example.net', '+7711676583450', 'cQOJytgvz8', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(9, 'Willie Heaney', 'reprehenderit', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'loma33@example.org', '+8646376826798', 'prxY2Ou4Un', '2017-04-25 08:43:49', '2017-04-25 08:43:49'),
(10, 'Marion Beatty', 'consequatur', '$2y$10$iBCYF.hKri0zY29OVUXLQ.9W4UDZ3hilIMUg5KMEneOd58edHeunK', 'kuphal.kendall@example.net', '+8098447091022', 'pLVTwsEvy2', '2017-04-25 08:43:49', '2017-04-25 08:43:49');

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
  `owner_id` int(11) NOT NULL,
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

INSERT INTO `requests` (`id`, `owner_id`, `dormName`, `housingType`, `location`, `thumbnailPic`, `streetName`, `barangayName`, `created_at`, `updated_at`) VALUES
(1, 9, 'Orn Ltd', 'bedspace', 'banwa', '/img-uploads/no_image.png', 'Vernon Extension', 'Port Delores', '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(2, 1, 'Bins-Volkman', 'apartment', 'banwa', '/img-uploads/no_image.png', 'Genoveva Rue', 'Bergnaumton', '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(3, 1, 'Hermiston, Bartoletti and Tromp', 'apartment', 'banwa', '/img-uploads/no_image.png', 'Abagail Bypass', 'Luciousfurt', '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(4, 1, 'Barrows Ltd', 'apartment', 'dormArea', '/img-uploads/no_image.png', 'Feeney Prairie', 'West Dessie', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(5, 6, 'Dickinson-Dibbert', 'dormitory', 'dormArea', '/img-uploads/no_image.png', 'Kulas Islands', 'North Abrahamtown', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(6, 8, 'DuBuque Group', 'boardinghouse', 'dormArea', '/img-uploads/no_image.png', 'Verner Manor', 'Port Perryfurt', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(7, 2, 'Parisian Group', 'dormitory', 'banwa', '/img-uploads/no_image.png', 'Keanu Causeway', 'Ullrichbury', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(8, 4, 'Lynch-Jenkins', 'bedspace', 'dormArea', '/img-uploads/no_image.png', 'Schamberger Fort', 'East Kyla', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(9, 4, 'Berge-Rogahn', 'boardinghouse', 'dormArea', '/img-uploads/no_image.png', 'Harber Divide', 'Jacquesburgh', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(10, 3, 'Hahn and Sons', 'boardinghouse', 'dormArea', '/img-uploads/no_image.png', 'Vandervort Coves', 'Jastburgh', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(11, 9, 'Considine, Schiller and Smitham', 'dormitory', 'dormArea', '/img-uploads/no_image.png', 'Alek Summit', 'Russelmouth', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(12, 5, 'White and Sons', 'bedspace', 'dormArea', '/img-uploads/no_image.png', 'Will Groves', 'Clementinafurt', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(13, 4, 'Bruen-Howell', 'apartment', 'dormArea', '/img-uploads/no_image.png', 'Johnson Glen', 'South Luciefurt', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(14, 5, 'Gibson and Sons', 'dormitory', 'banwa', '/img-uploads/no_image.png', 'Cruickshank Track', 'Enochbury', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(15, 2, 'Johnston-Fisher', 'bedspace', 'dormArea', '/img-uploads/no_image.png', 'Archibald Track', 'West Madie', '2017-04-25 08:43:58', '2017-04-25 08:43:58');

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
(1, 8, 'facere', '290', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(2, 14, 'corporis', '862', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(3, 4, 'ut', '435', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(4, 12, 'eos', '327', '2017-04-25 08:43:58', '2017-04-25 08:43:58'),
(5, 14, 'iure', '636', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(6, 8, 'voluptas', '732', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(7, 13, 'consequatur', '419', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(8, 7, 'molestias', '607', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(9, 5, 'ut', '927', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(10, 12, 'repellendus', '741', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(11, 5, 'debitis', '970', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(12, 10, 'omnis', '764', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(13, 11, 'velit', '803', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(14, 6, 'recusandae', '686', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(15, 12, 'est', '498', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(16, 2, 'est', '621', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(17, 11, 'exercitationem', '949', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(18, 14, 'et', '809', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(19, 6, 'enim', '295', '2017-04-25 08:43:59', '2017-04-25 08:43:59'),
(20, 5, 'cum', '264', '2017-04-25 08:43:59', '2017-04-25 08:43:59');

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
(1, 8, 'dolorem', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(2, 6, 'labore', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(3, 3, 'natus', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(4, 10, 'illum', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(5, 15, 'sint', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(6, 10, 'et', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(7, 14, 'rem', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(8, 9, 'ullam', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(9, 15, 'iure', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(10, 8, 'omnis', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(11, 14, 'magnam', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(12, 9, 'molestiae', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(13, 6, 'qui', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(14, 13, 'dolore', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(15, 1, 'magnam', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(16, 15, 'hic', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(17, 14, 'velit', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(18, 12, 'numquam', '2017-04-25 08:44:00', '2017-04-25 08:44:00'),
(19, 2, 'accusamus', '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(20, 7, 'quia', '2017-04-25 08:44:01', '2017-04-25 08:44:01');

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
(1, 9, 3, 'by_person', 1124, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(2, 3, 3, 'by_person', 4510, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(3, 8, 3, 'by_room', 3516, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(4, 11, 5, 'by_room', 4807, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(5, 20, 4, 'by_room', 2155, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(6, 10, 2, 'by_room', 3956, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(7, 12, 6, 'by_person', 4107, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(8, 15, 3, 'by_room', 2923, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(9, 1, 5, 'by_room', 1189, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(10, 12, 6, 'by_room', 1151, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(11, 13, 5, 'by_person', 1003, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(12, 20, 8, 'by_room', 1853, '2017-04-25 08:44:01', '2017-04-25 08:44:01'),
(13, 6, 4, 'by_person', 1843, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(14, 12, 7, 'by_room', 1234, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(15, 6, 2, 'by_person', 4201, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(16, 16, 3, 'by_room', 817, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(17, 7, 2, 'by_person', 1848, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(18, 15, 8, 'by_room', 2048, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(19, 11, 3, 'by_room', 3537, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(20, 5, 2, 'by_person', 2739, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(21, 18, 5, 'by_person', 2694, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(22, 17, 2, 'by_person', 3766, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(23, 18, 3, 'by_room', 1889, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(24, 1, 5, 'by_person', 4732, '2017-04-25 08:44:02', '2017-04-25 08:44:02'),
(25, 12, 3, 'by_person', 4075, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(26, 8, 5, 'by_person', 3059, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(27, 6, 2, 'by_person', 1118, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(28, 15, 4, 'by_room', 4566, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(29, 3, 7, 'by_room', 4827, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(30, 14, 4, 'by_person', 3890, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(31, 14, 4, 'by_room', 4257, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(32, 3, 6, 'by_person', 3385, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(33, 11, 3, 'by_room', 3576, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(34, 11, 2, 'by_room', 1016, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(35, 6, 2, 'by_room', 1552, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(36, 10, 2, 'by_person', 2599, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(37, 4, 5, 'by_room', 2276, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(38, 18, 5, 'by_person', 3283, '2017-04-25 08:44:03', '2017-04-25 08:44:03'),
(39, 4, 6, 'by_person', 3739, '2017-04-25 08:44:04', '2017-04-25 08:44:04'),
(40, 5, 7, 'by_person', 1863, '2017-04-25 08:44:04', '2017-04-25 08:44:04');

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
(1, 8, 7, 'by_person', 2309, 1, '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(2, 5, 7, 'by_room', 3504, 0, '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(3, 14, 6, 'by_person', 2066, 1, '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(4, 6, 5, 'by_room', 2133, 1, '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(5, 14, 2, 'by_room', 2296, 2, '2017-04-25 08:43:54', '2017-04-25 08:43:54'),
(6, 16, 7, 'by_person', 4544, 1, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(7, 15, 6, 'by_person', 4446, 0, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(8, 18, 8, 'by_person', 2829, 2, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(9, 10, 8, 'by_room', 1337, 2, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(10, 9, 5, 'by_room', 2817, 2, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(11, 9, 3, 'by_room', 1316, 0, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(12, 3, 2, 'by_room', 2692, 0, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(13, 18, 6, 'by_room', 2990, 2, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(14, 12, 8, 'by_room', 1019, 1, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(15, 1, 5, 'by_room', 3530, 0, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(16, 18, 4, 'by_person', 834, 0, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(17, 4, 5, 'by_room', 4889, 1, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(18, 7, 7, 'by_person', 1611, 1, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(19, 16, 7, 'by_room', 2601, 2, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(20, 20, 8, 'by_room', 2002, 0, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(21, 16, 6, 'by_person', 4850, 1, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(22, 8, 2, 'by_room', 1242, 2, '2017-04-25 08:43:55', '2017-04-25 08:43:55'),
(23, 11, 2, 'by_person', 4512, 1, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(24, 14, 3, 'by_room', 1889, 0, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(25, 20, 5, 'by_person', 3117, 0, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(26, 11, 8, 'by_room', 4527, 0, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(27, 12, 7, 'by_room', 4365, 1, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(28, 15, 7, 'by_room', 2037, 2, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(29, 1, 2, 'by_person', 2636, 1, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(30, 10, 8, 'by_person', 2992, 2, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(31, 19, 7, 'by_person', 4314, 2, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(32, 12, 7, 'by_person', 3930, 1, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(33, 17, 4, 'by_person', 1856, 2, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(34, 13, 5, 'by_room', 2958, 0, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(35, 13, 2, 'by_person', 4108, 0, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(36, 1, 4, 'by_person', 1631, 0, '2017-04-25 08:43:56', '2017-04-25 08:43:56'),
(37, 8, 7, 'by_room', 3403, 2, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(38, 11, 5, 'by_person', 4698, 1, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(39, 20, 4, 'by_room', 3961, 1, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(40, 5, 4, 'by_room', 3300, 2, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(41, 12, 4, 'by_room', 916, 0, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(42, 18, 2, 'by_person', 2718, 2, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(43, 3, 4, 'by_room', 1018, 0, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(44, 12, 3, 'by_room', 1741, 2, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(45, 16, 2, 'by_person', 4831, 1, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(46, 20, 4, 'by_room', 2960, 2, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(47, 3, 4, 'by_room', 4899, 0, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(48, 9, 3, 'by_room', 3491, 1, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(49, 15, 3, 'by_room', 3319, 1, '2017-04-25 08:43:57', '2017-04-25 08:43:57'),
(50, 14, 7, 'by_room', 2663, 2, '2017-04-25 08:43:57', '2017-04-25 08:43:57');

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
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owners_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

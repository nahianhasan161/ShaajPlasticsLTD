-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2022 at 04:33 PM
-- Server version: 10.5.15-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shaajpla_LTD`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `active`, `slug`, `created_at`, `updated_at`) VALUES
(12, 'Plastic Hook Top Hanger', 'storage/public/uploads/category/Hrp41PYMpn9RLrV7vVeGzDdwqJyoU2f3Pr0OEwfz.jpg', NULL, 'plastic-hook-top-hanger', '2022-02-13 09:15:23', '2022-02-13 09:15:23'),
(13, 'Metal Hook Top Hanger', 'storage/public/uploads/category/5Bd6kPq1GUDsrZOfKJnqzIHtf77ZLTKtdTVQorhl.jpg', NULL, 'metal-hook-top-hanger', '2022-02-13 09:16:51', '2022-02-13 09:16:51'),
(15, 'Plastic Hook Double Top Hanger', 'storage/public/uploads/category/GrnBcEBNbYVaMR5GnjI3RMqpaoVvzSQKr4KSU44v.jpg', NULL, 'plastic-hook-double-top-hanger', '2022-02-17 08:16:59', '2022-02-17 08:16:59'),
(16, 'Plastic Cloth Hanger', 'storage/public/uploads/category/mAApe4QMRxOTkwKARev8KBn7mv6QhbHKYXyQwmqL.jpg', NULL, 'plastic-cloth-hanger', '2022-02-17 09:06:48', '2022-02-17 09:06:48'),
(17, 'Plastic Hook Triple Hanger', 'storage/public/uploads/category/UqcA4uCwZpApCKMrIgLPV0qwcT2jlDFAFgXOz5Hk.jpg', NULL, 'plastic-hook-triple-hanger', '2022-02-18 04:50:46', '2022-02-18 04:50:46'),
(18, 'Plastic Hook Bottom Hanger', 'storage/public/uploads/category/SXWB9UmbL1kvDAvUR56hqcaV8iZZhQLCreCTmoFK.jpg', NULL, 'plastic-hook-bottom-hanger', '2022-02-18 04:56:28', '2022-02-18 04:56:28'),
(19, 'Plastic Hook Box Hanger', 'storage/public/uploads/category/AF6CKxWyX3L479okonhEAPgadwplw0TztR5vfieZ.jpg', NULL, 'plastic-hook-box-hanger', '2022-02-18 05:00:42', '2022-02-18 05:00:42'),
(20, 'Metal Hook Box Hanger', 'storage/public/uploads/category/DKtlNoOc8To8GcyZI7PthL8Fh2Hsx7QG1Wu6bDxZ.jpg', NULL, 'metal-hook-box-hanger', '2022-02-18 05:03:43', '2022-02-18 05:03:43'),
(21, 'Metal Hook Double Box Hanger', 'storage/public/uploads/category/bGGsp7gGSk2imcN4KdwfqozO5ubae80zgA9ZZ3QW.jpg', NULL, 'metal-hook-double-box-hanger', '2022-02-18 05:08:15', '2022-02-18 05:08:15'),
(22, 'Plastic Hook Set Hanger', 'storage/public/uploads/category/CXdP3Dn4r0WHYxEvaeHX3j7pIzZ1qUzfbHbnoJWG.jpg', NULL, 'plastic-hook-set-hanger', '2022-02-18 05:12:15', '2022-02-18 05:12:15'),
(23, 'Plastic Hook Round Hanger', 'storage/public/uploads/category/E8RsCJcyy6O4lnEsdhovbkXsYGn60JWQpPHz4JDT.jpg', NULL, 'plastic-hook-round-hanger', '2022-02-18 05:15:36', '2022-02-18 05:15:36'),
(24, 'Clip Hanger Metal Hook', 'storage/public/uploads/category/HPPXQ6ryQZ6DIhfYG7mAr3bcH1ovacK6AhJxahjB.jpg', NULL, 'clip-hanger-metal-hook', '2022-02-18 05:20:07', '2022-02-18 05:20:07'),
(25, 'Plastic Box Hanger', 'storage/public/uploads/category/6EiZzMUuyDUpHfgKuy2mGKlioErvITGJUO24ITfp.jpg', NULL, 'plastic-box-hanger', '2022-02-18 05:30:03', '2022-02-18 05:30:03'),
(26, 'Plastic Hook Top Hanger With Bar', 'storage/public/uploads/category/LnV69G51TN1gRZfKQ8S3E07miFd4QcvFin3HVLTk.jpg', NULL, 'plastic-hook-top-hanger-with-bar', '2022-02-18 05:34:23', '2022-02-18 05:34:23'),
(27, 'Metal Hook Bar Hanger ', 'storage/public/uploads/category/7AIn9cidty9BagOnbPMm1ZUJ6f9Nneaaj0WvtRCO.jpg', NULL, 'metal-hook-bar-hanger', '2022-02-18 05:37:30', '2022-02-18 05:37:30'),
(28, 'Plastic Bar Hanger With Lock', 'storage/public/uploads/category/EZBhIPzxmrmetHnSx4olizFMUzVD1E2KlPrIy0un.jpg', NULL, 'plastic-bar-hanger-with-lock', '2022-02-18 05:44:08', '2022-02-18 05:44:08'),
(29, 'Metal Hook Hollow Hanger', 'storage/public/uploads/category/WD1pmQqEWqYMeQ5khVf5hVOxdlXRPP8WNKepxwN5.jpg', NULL, 'metal-hook-hollow-hanger', '2022-02-18 05:53:53', '2022-02-18 05:53:53'),
(30, 'Bottom Hanger Metal Hook', 'storage/public/uploads/category/8olK1HzVIUhqqdaiGfg7g80qIJIntvZL0SXVra73.jpg', NULL, 'bottom-hanger-metal-hook', '2022-02-18 06:10:05', '2022-02-18 06:10:05'),
(31, 'Penti Hanger', 'storage/public/uploads/category/YZPJrHO3DBz1RWSfVQ2Fnf3OE4bvE8iIBaXdEXz8.jpg', NULL, 'penti-hanger', '2022-02-18 13:42:32', '2022-02-18 13:42:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Table structure for table `plastic_products`
--

CREATE TABLE `plastic_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meterial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thickness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packaging` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plastic_products`
--

INSERT INTO `plastic_products` (`id`, `name`, `meterial`, `code`, `quantity`, `weight`, `stripes`, `thickness`, `packaging`, `color`, `price`, `image`,`active`, `category_id`, `created_at`, `updated_at`) VALUES
(7, 'Plastic Hook Top Hanger', 'Plastic', 'SPI-101', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/eoicxW6dbCgLSHnNCF6ThILyHxfKeMSKU3voKwKZ.jpg',0, 12, '2022-02-13 09:24:24', '2022-02-13 09:24:24'),
(10, 'Plastic Hook Double Top Hanger', 'plastic', 'SPI-122', '1', '1', '1', '1', 'dozen', 'white ', '1', 'storage/public/uploads/products/97CEWvOaJ71HqfhbDefdFuObOmgN53aD8XRuFBZI.jpg',0, 15, '2022-02-17 08:18:22', '2022-02-17 08:18:22'),
(11, 'Plastic Hook Double Top Hanger', 'Plastic', 'SPI-123', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/fcvm0DXUcHXQn4c02AiG7NSUyYYTesRnYP8Gvnxy.jpg',0, 15, '2022-02-17 08:19:36', '2022-02-17 08:19:36'),
(12, 'Plastic Cloth Hanger', 'Plastic', 'SPI-101', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/ksZvNCmu7vMPFmJp28uyAlkpJP4jXgbNoVZbdVbV.jpg',0, 16, '2022-02-17 09:10:53', '2022-02-17 09:10:53'),
(13, 'Plastic Hook Top Hanger', 'Plastic', 'SPI-102', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/iVMCXpV4tYSWYCFnQ0GDaIhEMd5zJOb1QCQc6xqD.jpg',0, 12, '2022-02-17 13:48:17', '2022-02-17 13:48:17'),
(15, 'Plastic Hook Top Hanger', 'Plastic', 'SPI-104', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/Nwu0lx8IXQY2a1sh3HFJI5JXV4Zl5NxxftjwXSRh.jpg',0, 12, '2022-02-17 14:48:25', '2022-02-17 14:48:25'),
(16, 'Plastic Hook Top Hanger', 'Plastic', 'SPI-105', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/QB3VY66DoNMxNWvrx9SZ5gVDfafxcsGDrgflUc5U.jpg',0, 12, '2022-02-17 14:50:46', '2022-02-17 14:50:46'),
(17, 'Plastic Hook Top Hanger', 'Plastic', 'SPI-106', '1', '1', '1', '1', 'Plastic', 'white', '1', 'storage/public/uploads/products/humOfeyK1BWKyUUANOyzKvfqr6HnXnw2UHF77p8R.jpg',0, 12, '2022-02-17 14:56:17', '2022-02-17 14:56:17'),
(18, 'Plastic Hook Top Hanger', ' Plastic', 'SPI-107', '1', '1', '1', '1', 'Plastic', 'white', '1', 'storage/public/uploads/products/AmmF9i7uHUvDd83iXrzRpbIovne41ohUvzGEZJKJ.jpg',0, 12, '2022-02-17 15:05:54', '2022-02-17 15:05:54'),
(19, 'Plastic Hook Top Hanger', 'Plastic', 'SPI-108', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/eUWixmJfOvp3xNwfFNBYfQcnl6K1PeMWWCT1OWV7.jpg',0, 12, '2022-02-17 15:08:34', '2022-02-17 15:08:34'),
(21, 'Metal Hook Top Hanger', 'Plastic', 'SPI-109', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/B5SbIxBeQEVWNSgg3gVY8s5I7F0MKT6J3VgybqNZ.jpg',0, 13, '2022-02-17 15:21:11', '2022-02-17 15:21:11'),
(22, 'Metal Hook Top Hanger', 'Plastic', 'SPI-121', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/Gd0WNqtGRaF8XzYUrYVtZ3t7Su1J9xt7aEL90bNn.jpg',0, 13, '2022-02-18 04:48:50', '2022-02-18 04:48:50'),
(23, 'Plastic Hook Triple Hanger', 'Plastic', 'SPI-124', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/VIUHAwcn8KubGm1almJRZLhDFLVb27UEvLHIpw6O.jpg',0, 17, '2022-02-18 04:54:19', '2022-02-18 04:54:19'),
(24, 'Plastic Hook Bottom Hanger', 'Plastic', 'SPI-125', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/uZFizQ8L1gIVv7Hw8ZPgg1Nbd3llhS7KRpO8m4qM.jpg',0, 18, '2022-02-18 04:58:08', '2022-02-18 04:58:08'),
(25, 'Plastic Hook Box Hanger', 'Plastic', 'SPI-131', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/n4ch2IpW1Gol1ashRVSItOC5uzBNt0RQfmQ42DUw.jpg',0, 19, '2022-02-18 05:02:27', '2022-02-18 05:02:27'),
(26, 'Metal Hook Box Hanger', 'Plastic', 'SPI-132', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/9oKlLtxUcGg4h1CcFd42JwsBQKv8aMv2Z64rHPUO.jpg',0, 20, '2022-02-18 05:05:16', '2022-02-18 05:05:16'),
(27, 'Metal Hook Double Box Hanger', 'Plastic', 'SPI-133', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/hpfuRQsp0Px6GvKRHvey05grsHijXZcHT0optNBn.jpg',0, 21, '2022-02-18 05:09:53', '2022-02-18 05:09:53'),
(28, 'Plastic Hook Set Hanger', 'Plastic', 'SPI-134', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/rU8ojfL4Pm5SVkc8EBjXWLtUZhS7lQ9MMJoa39IP.jpg',0, 22, '2022-02-18 05:13:50', '2022-02-18 05:13:50'),
(29, 'Plastic Hook Round Hanger', 'Plastic', 'SPI-135', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/jwIGt694oF2duiyQxWCivNx169MOYfAAICblb9xS.jpg',0, 23, '2022-02-18 05:16:57', '2022-02-18 05:16:57'),
(30, 'Clip Hanger Metal Hook', 'Plastic', 'SPI-126', '1', '1', '1', '1', 'dozen', 'blue', '1', 'storage/public/uploads/products/UjCtBZilUc0XqJBddHBsfARgK19QQVmquPlNNbD3.jpg',0, 24, '2022-02-18 05:21:28', '2022-02-18 05:21:28'),
(31, 'Clip Hanger Metal Hook', 'Plastic', 'SPI-127', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/pY9HY4fYYBNOTR86vSJpLaLPwRZ0LB5P3qYb8IZK.jpg',0, 24, '2022-02-18 05:22:52', '2022-02-18 05:22:52'),
(32, 'Clip Hanger Metal Hook', 'Plastic', 'SPI-128', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/ilrrHU7yWaUA4VfiOJuNP7NTI13jPGBQWGWm3okl.jpg',0, 24, '2022-02-18 05:24:52', '2022-02-18 05:24:52'),
(33, 'Clip Hanger Metal Hook', 'Plastic', 'SPI-129', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/mrk8i0g9NBlE1sxspv061S93qin4cgJQqVWp25hY.jpg',0, 24, '2022-02-18 05:27:15', '2022-02-18 05:27:15'),
(34, 'Plastic Box Hanger', 'Plastic', 'SPI-130', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/ABd1LcpPnc05I5km3iN0ivKp9NW79YXilWMHuiNE.jpg',0, 25, '2022-02-18 05:31:20', '2022-02-18 05:31:20'),
(35, 'Plastic Hook Top Hanger With Bar', 'Plastic', 'SPI-136', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/0KlT6Ef5QbQzZXaT9s1gAVeekKyRBDUv8KpeDJ3Y.jpg',0, 26, '2022-02-18 05:35:31', '2022-02-18 05:35:31'),
(36, 'Metal Hook Bar Hanger ', 'Plastic', 'SPI-137', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/IFzE62hhRQsaZkEkXugCWxrJwAP7d93VgqRt9H7f.jpg',0, 27, '2022-02-18 05:38:49', '2022-02-18 05:38:49'),
(37, 'Plastic Bar Hanger With Lock', 'Plastic', 'SPI-138', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/SxCYmpvTHaJwDjFJMuKDnxTQx1XLlLJ8qTUohgHH.jpg',0, 28, '2022-02-18 05:46:03', '2022-02-18 05:46:03'),
(38, 'Metal Hook Bar Hanger', 'Plastic', 'SPI-139', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/qYfl3j1KFe99MDSoSL086DPm8w8lPlJ0xDw7lXhB.jpg',0, 27, '2022-02-18 05:49:02', '2022-02-18 05:49:02'),
(39, 'Metal Hook Bar Hanger', 'Plastic', 'SPI-140', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/F7GkNbFJHTHoHSc6WmKvTwA49hmMHoUPPRCUzpsb.jpg',0, 27, '2022-02-18 05:50:20', '2022-02-18 05:50:20'),
(40, 'Metal Hook Hollow Hanger', 'Plastic', 'SPI-146', '1', '1', '2', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/RNsyjG8B2DqFvvLqvl2mVLFknu1KWTjP8zYnkOFg.jpg',0, 29, '2022-02-18 05:56:45', '2022-02-18 05:56:45'),
(41, 'Metal Hook Hollow Hanger', 'Plastic', 'SPI-147', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/l8KmYDLZpb5P65s265aoL69ROroE7lyPZ1hWgsTp.jpg',0, 29, '2022-02-18 06:00:12', '2022-02-18 06:00:12'),
(42, 'Metal Hook Hollow Hanger', 'Plastic', 'SPI-148', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/QlZHOVd3mUIOtWmVA0SubAeHEvH6oer20wYJY26m.jpg',0, 29, '2022-02-18 06:01:24', '2022-02-18 06:01:24'),
(43, 'Metal Hook Hollow Hanger', 'Plastic', 'SPI-149', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/KP6apNfZ5qoa0DW5ckIWTr0BCxLeARwsNmOgQOqf.jpg',0, 29, '2022-02-18 06:02:43', '2022-02-18 06:02:43'),
(44, 'Metal Hook Hollow Hanger', 'Plastic', 'SPI-150', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/u0gWZIJ66xPL24EUJud9BqgLUHN382jeyjtnCKdp.jpg',0, 29, '2022-02-18 06:03:58', '2022-02-18 06:03:58'),
(45, 'Bottom Hanger Metal Hook', 'Plastic', 'SPI-141', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/PW9cCmFYEtfQfFpkz7f2NlvpwhCANehxJUppA62u.jpg',0, 30, '2022-02-18 06:11:26', '2022-02-18 06:11:26'),
(46, 'Bottom Hanger Metal Hook', 'Plastic', 'SPI-142', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/4rbxqbCYKouDlFhYYB0hluePveegkjK5SF7VS4zh.jpg',0, 30, '2022-02-18 06:12:33', '2022-02-18 06:12:33'),
(47, 'Plastic Hook Bottom Hanger', 'Plastic', 'SPI-143', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/hjDagKf8Bc1fnM0y1SKkNP86297sjErzxhbwDoET.jpg',0, 18, '2022-02-18 06:17:44', '2022-02-18 06:17:44'),
(48, 'Plastic Hook Bottom Hanger', 'Plastic', 'SPI-144', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/RE9MEZJFigM8BOGheB2vJVO3cjPB7kweEUa5Lsb4.jpg',0, 18, '2022-02-18 06:19:14', '2022-02-18 06:19:14'),
(49, 'Plastic Hook Bottom Hanger', 'Plastic', 'SPI-145', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/G8q8C9I4nkBP8Dm3VhhTnnKhXLmFJMx1LceN1A9o.jpg',0, 18, '2022-02-18 06:20:39', '2022-02-18 06:20:39'),
(50, 'Metal Hook Top Hanger', 'Plastic', 'SPI-111', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/dXZoizSdPQNUaTqaVXu8oPYizBy67QZLLsUVae08.jpg',0, 13, '2022-02-18 06:45:35', '2022-02-18 06:45:35'),
(51, 'Metal Hook Top Hanger', 'Plastic ', 'SPI-112', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/GTQk2jEFx6P3h87PadrmEHvurq3hiWcDvMvTHJRd.jpg',0, 13, '2022-02-18 06:48:02', '2022-02-18 06:48:02'),
(52, 'Metal Hook Top Hanger', 'Plastic', 'SPI-113', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/5MP8UzoDusHuA7xFmk3PxniuMcRbMeyBU40YepqL.jpg',0, 13, '2022-02-18 06:49:19', '2022-02-18 06:49:19'),
(53, 'Metal Hook Top Hanger', 'Plastic', 'SPI-114', '1', '1', '1', '1', 'dozen', 'blue', '1', 'storage/public/uploads/products/fJlyoIkm9uibglTGokKmIFBFVianxz4unw12ZGSf.jpg',0, 13, '2022-02-18 06:50:54', '2022-02-18 06:50:54'),
(54, 'Plastic Hook Top Hanger', 'Plastic', 'SPI-115', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/gM4DyDfhA3gf9PIJ0Ag3VuHBhlUK6A80BLOhQ8M2.jpg',0, 12, '2022-02-18 06:52:37', '2022-02-18 06:52:37'),
(55, 'Metal Hook Top Hanger', 'Plastic', 'SPI-116', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/8DOzJfgaHfccfrPYrElhQH7duNs4dehNAeXZLz8e.jpg',0, 13, '2022-02-18 13:35:31', '2022-02-18 13:35:31'),
(56, 'Metal Hook Top Hanger', 'Plastic', 'SPI-117', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/rJ8vQKowlVhgaRMZxmmm33W6xb5MgEvI0PNUaeOD.jpg',0, 13, '2022-02-18 13:38:12', '2022-02-18 13:38:12'),
(57, 'Metal Hook Top Hanger', 'Plastic', 'SPI-118', '1', '1', '1', '1', 'dozen', 'white', '1', 'storage/public/uploads/products/3PmIxzW1afuNRoVDmOc1oaQcNf1pPIePiW8u2fYE.jpg',0, 13, '2022-02-18 13:39:02', '2022-02-18 13:39:02'),
(58, 'Plastic Hook Top Hanger', 'Plastic', 'SPI-120', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/Gtb1G41IUkMZIPnk5BykJXYV5P7HzsrMNJ8BLBoU.jpg',0, 12, '2022-02-18 13:41:19', '2022-02-18 13:41:19'),
(59, 'Penti Hanger', 'Plastic', 'SPI-119', '1', '1', '1', '1', 'dozen', 'black', '1', 'storage/public/uploads/products/LXDN7j3M8HJ4Xelf2QUmqxOsVB2XnSasLF0EGU6y.jpg',0, 31, '2022-02-18 13:43:45', '2022-02-18 13:43:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plastic_products`
--
ALTER TABLE `plastic_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plastic_products_category_id_index` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plastic_products`
--
ALTER TABLE `plastic_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

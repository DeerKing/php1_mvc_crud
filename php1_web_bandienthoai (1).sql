-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2025 at 12:28 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php1_web_bandienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên',
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` int NOT NULL COMMENT 'Giá',
  `quantity` int DEFAULT NULL COMMENT 'Số lượng',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Mô tả',
  `active` tinyint NOT NULL DEFAULT '0' COMMENT '0 là deactive, 1 là active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `quantity`, `description`, `active`) VALUES
(1, 'Iphone 10', NULL, 1, 10, 'Iphone 10', 1),
(2, 'Iphone 11', NULL, 2, 100, 'Iphone 11', 1),
(3, 'Iphone 12', NULL, 3, 9999, 'Iphone 12', 1),
(4, 'Iphone 15', NULL, 5, 50, 'Iphone 15', 1),
(5, 'Iphone 16', NULL, 6, 7, 'Iphone 16', 1),
(6, 'Iphone 18', NULL, 8, 8, 'Iphone 18', 1),
(7, 'Điện thoại Samsung Galaxy Z Fold7 5G 12GB/256GB', NULL, 20, 20, 'Điện thoại Samsung Galaxy Z Fold7 5G 12GB/256GB', 1),
(8, 'Điện thoại Samsung Galaxy Z Fold7 5G 12GB/256GB', NULL, 20, 20, 'Điện thoại Samsung Galaxy Z Fold7 5G 12GB/256GB', 1),
(10, 'Iphone 18', NULL, 8, 8, 'Iphone 18', 1),
(11, 'Iphone 18', 'assets/uploads/b4.jpg', 8, 8, 'Iphone 18', 1),
(12, 'Xưởng', 'assets/uploads/b1.jpg', 123, NULL, 'Test', 0),
(13, 'Test', 'assets/uploads/b6.PNG', 1234, NULL, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

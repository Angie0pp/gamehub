-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2026 at 04:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `genre`, `price`, `image`) VALUES
(2, 'Gaming headset', 'accessories', 50.00, 'https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=1971&auto=format&fit=crop'),
(3, 'RBG Keyboard', 'Accessories', 80.00, 'https://images.unsplash.com/photo-1541140532154-b024d705b90a?q=80&w=2070&auto=format&fit=crop'),
(4, 'Gaming Mouse pro', 'Accessories', 35.00, 'https://images.unsplash.com/photo-1527814050087-3793815479db?q=80&w=1974&auto=format&fit=crop'),
(5, 'PS5 Controller', 'Controllers', 100.00, 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?q=80&w=2070&auto=format&fit=crop'),
(6, 'Gaming Chair', 'Furniture', 250.00, 'https://images.unsplash.com/photo-1598550476439-6847785fcea6?q=80&w=1974&auto=format&fit=crop'),
(9, 'PS5', 'Accessories', 37.00, 'https://images.unsplash.com/photo-1752262526779-bd65a9b83c25?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fHBzNSUyMGdhbWVzfGVufDB8fDB8fHww'),
(12, 'Samsung Game Monitor', 'Accessories', 240.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3JBwMptna5JI0pN2U69feUhWJsybnRmYrRnaLHCWRgw&s=10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `total_amount`, `payment_status`, `created_at`) VALUES
(1, 'one22', 40.00, 'Paid', '2026-06-04 07:21:16'),
(2, 'one22', 50.00, 'Paid', '2026-06-11 12:50:46'),
(3, 'one22', 80.00, 'Paid', '2026-06-11 12:51:13'),
(4, 'one22', NULL, 'Paid', '2026-06-11 12:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(2, 'Theeebaddest', 'thebaddest@gmail.com', '$2y$10$EB9hdqOsJ1GnzY1gldo.UuzOIY9WIbWx9llJHK7V81w9pUhagMIPe', 'user'),
(4, 'onee', 'one@gmail.com', '$2y$10$YLDZGHo2Fr77RUya9jBi.OfUrCabwz2jF2HkSbPnRj6iGoPugIy/m', 'user'),
(5, 'one22', 'one2@gmail.com', '$2y$10$1erYpCKMbLt/RK6mneWZk.6pkZ3Qgh/2TJNIeFh0fBgWfJ3TNMaFK', 'user'),
(6, 'Theeebaddest', 'theebaddest@gmail.com', '$2y$10$W804BURZdSKCeOMztYQ/neYk3n8JyHV0VEb7MZfJI/Tx5vwU3knPC', 'user'),
(7, 'onlyonly', 'only12@gmail.com', '$2y$10$.eQh27naS7wFMclB74H0juHMmNWCDRVjXSPxRBxQkSVAXkngELCPS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

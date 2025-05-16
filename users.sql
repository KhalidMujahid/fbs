CREATE TABLE `users` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  phone VARCHAR(20),
  status ENUM('active', 'suspended') DEFAULT 'active',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `transactions` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(100),
  type ENUM('Deposit', 'Withdrawal'),
  amount DECIMAL(10, 2),
  status ENUM('Success', 'Pending', 'Failed'),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `support_tickets` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_email VARCHAR(255) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  status ENUM('Open', 'Resolved') DEFAULT 'Open',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- yours below

-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2025 at 01:33 PM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `centrlng_oanda`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password_hash`, `created_at`) VALUES
(13, 'ericoklaus@gmIl.com', 'Erico Klaus', '$2y$10$oUkjsPQXCQZYtQtWD2PjdONyY3QfZFveg588gqOV05MqqQmT5AkN.', '2025-05-12 10:55:36'),
(14, 'ubahobaah@gmail.com', 'abed obaah', '$2y$10$Ok/r9Oov0mwAoxei.YdY5.pAlBVpUTEUCVPMDrcKL2C6VgF0Hshpy', '2025-05-13 11:01:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

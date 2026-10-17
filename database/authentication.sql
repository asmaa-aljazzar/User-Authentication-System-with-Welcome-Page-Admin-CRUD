-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2026 at 08:46 PM
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
-- Database: `authentication`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(2, 'omar', 'omar@example.com', '$2y$12$T7C/MbTV9o348vJqs2PAW.P1LBnsgBLHyvPJQOx71hXXegQy2FJCO', 'user', '2026-10-17 10:51:48'),
(3, 'sara', 'sara@example.com', '$2y$12$T7C/MbTV9o348vJqs2PAW.P1LBnsgBLHyvPJQOx71hXXegQy2FJCO', 'user', '2026-10-17 10:51:48'),
(4, 'mohammad', 'mohammad@example.com', '$2y$12$T7C/MbTV9o348vJqs2PAW.P1LBnsgBLHyvPJQOx71hXXegQy2FJCO', 'user', '2026-10-17 10:51:48'),
(5, 'lina', 'lina@example.com', '$2y$12$T7C/MbTV9o348vJqs2PAW.P1LBnsgBLHyvPJQOx71hXXegQy2FJCO', 'user', '2026-10-17 10:51:48'),
(6, 'admin', 'admin@example.com', '$2y$12$5yzJTpvdhcn3uq4WHs4Bqukc2Q732i5atQgdvzswPSKnwnPGzUMUy', 'admin', '2026-10-17 10:51:48'),
(7, 'khaled', 'khaled@example.com', '$2y$12$T7C/MbTV9o348vJqs2PAW.P1LBnsgBLHyvPJQOx71hXXegQy2FJCO', 'user', '2026-10-17 10:51:48'),
(8, 'noor', 'noor@example.com', '$2y$12$T7C/MbTV9o348vJqs2PAW.P1LBnsgBLHyvPJQOx71hXXegQy2FJCO', 'user', '2026-10-17 10:51:48'),
(9, 'yousef', 'yousef@example.com', '$2y$12$T7C/MbTV9o348vJqs2PAW.P1LBnsgBLHyvPJQOx71hXXegQy2FJCO', 'user', '2026-10-17 10:51:48'),
(10, 'rana', 'rana@example.com', '$2y$12$T7C/MbTV9o348vJqs2PAW.P1LBnsgBLHyvPJQOx71hXXegQy2FJCO', 'user', '2026-10-17 10:51:48'),
(11, 'asoom', 'asma.jazar.319@gmail.com', '$2y$10$5gYHaqBDPhnDvBLR5uHJS.LagmZQHlWI5oU5uSHV9qSFTkFhgxQNO', 'user', '2026-10-17 15:36:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

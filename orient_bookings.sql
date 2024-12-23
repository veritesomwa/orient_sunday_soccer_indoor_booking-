-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2024 at 05:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orient_bookings`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookings_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booked` varchar(100) NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookings_id`, `user_id`, `booked`, `in_time`, `out_time`) VALUES
(28, 6, 'true', '20:00:00', '21:00:00'),
(30, 8, 'true', '20:00:00', '21:00:00'),
(31, 8, 'true', '18:00:00', '19:00:00'),
(32, 9, 'true', '20:00:00', '21:00:00'),
(34, 7, 'true', '20:00:00', '21:00:00'),
(37, 10, 'true', '20:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_number` varchar(100) NOT NULL,
  `privilege` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_number`, `privilege`) VALUES
(1, 'Verite', 'Lutula', 'veritesomwa@gmail.com', '74c32955ead50febf60de677820e0aba', '0684211107', 'admin'),
(2, 'Chris', 'Kabangu', 'chriskab319@gmail.com', '1a8b164543d0e00b1a699c60134bc5b7', '0629464549', 'user'),
(6, 'Ornella', 'Lutula', 'ornellalutula@gmail.com', '74c32955ead50febf60de677820e0aba', '0842742316', 'user'),
(7, 'Chadrack', 'Lutula', 'clutula@gmail.com', '6096fa5c5611069354441f6347521d4c', '0842742316', 'user'),
(8, 'Otango', 'Baby', 'otangobaby@gmail.com', '74c32955ead50febf60de677820e0aba', '0684211107', 'user'),
(9, 'Joshua', 'Matango', 'joshuamatango@gmail.com', '74c32955ead50febf60de677820e0aba', '0691937174', 'user'),
(10, 'Thando', 'Ngema', 'thandongema@gmail.com', '74c32955ead50febf60de677820e0aba', '0746622747', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookings_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

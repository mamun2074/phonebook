-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2017 at 11:26 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_at` date NOT NULL DEFAULT '0000-00-00',
  `delete_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `create_at`, `edit_at`, `delete_at`) VALUES
(21, 'Mahmud', '+8801521497833', '2017-12-29 10:10:13', '0000-00-00', '0000-00-00 00:00:00'),
(22, 'Rajib', '01515263073', '2017-12-29 10:12:11', '0000-00-00', '0000-00-00 00:00:00'),
(23, 'Shohel', '01831076751', '2017-12-29 10:13:10', '0000-00-00', '0000-00-00 00:00:00'),
(24, 'Tareq', '01515613274', '2017-12-29 10:14:14', '2017-12-29', '0000-00-00 00:00:00'),
(25, 'HijBullah Mahmud', '01521200319', '2017-12-29 10:17:40', '0000-00-00', '0000-00-00 00:00:00'),
(26, 'Head Sir', '01726395930', '2017-12-29 10:22:03', '0000-00-00', '0000-00-00 00:00:00'),
(27, 'Thoy', '01552355546', '2017-12-29 10:22:58', '2017-12-29', '0000-00-00 00:00:00'),
(28, 'Taher ', '01673822873', '2017-12-29 10:23:57', '0000-00-00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

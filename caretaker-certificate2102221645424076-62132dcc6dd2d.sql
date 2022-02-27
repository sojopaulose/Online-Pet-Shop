-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 04:27 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `pet_ads`
--

CREATE TABLE `pet_ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `vaccine_certificate` varchar(100) NOT NULL,
  `price` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_ads`
--

INSERT INTO `pet_ads` (`id`, `user_id`, `title`, `description`, `photo`, `vaccine_certificate`, `price`, `created_at`, `status`) VALUES
(1, 4, 'ssfd', 'fsdfsf', '', '', '2000', '2022-02-20 04:55:05', 1),
(2, 30, 'fdfsf', 'dasdsadsdad', '', '', '2000', '2022-02-20 20:22:55', 1),
(3, 4, 'qewqe', 'adasdasdas', '', '', 'price', '2022-02-20 20:40:23', 1),
(4, 4, 'adsdsa', 'dasdsad', '', '', 'price', '2022-02-20 20:41:45', 1),
(5, 4, 'asdsad', 'rwerwerwer', '', '', 'price', '2022-02-20 20:45:02', 1),
(6, 4, 'wqewq', 'sdfsdff', '', '', 'price', '2022-02-20 20:47:45', 1),
(7, 4, 'asdadasd', 'sfdfsfds', '', '', 'price', '2022-02-20 20:55:22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pet_ads`
--
ALTER TABLE `pet_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pet_ads`
--
ALTER TABLE `pet_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_ads`
--
ALTER TABLE `pet_ads`
  ADD CONSTRAINT `pet_ads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

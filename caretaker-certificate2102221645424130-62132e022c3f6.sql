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
-- Table structure for table `buy_request`
--

CREATE TABLE `buy_request` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `req_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy_request`
--

INSERT INTO `buy_request` (`id`, `ad_id`, `req_user`, `created_at`, `status`) VALUES
(11, 1, 30, '2022-02-20 19:59:22', 2),
(12, 2, 31, '2022-02-20 20:26:55', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `qstn_answr`
--

CREATE TABLE `qstn_answr` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ct_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `question` varchar(400) NOT NULL,
  `answer` varchar(600) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qstn_answr`
--

INSERT INTO `qstn_answr` (`id`, `user_id`, `ct_id`, `title`, `question`, `answer`, `created_at`, `status`) VALUES
(1, 4, 18, 'test', 'dfsfsf', 'weerwerdfss', '2022-02-20 09:49:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `review` varchar(400) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `title`, `review`, `created_at`, `status`) VALUES
(1, 4, 'tester', 'dadda', '2022-02-20 10:01:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `role`, `certificate`, `created_at`, `status`) VALUES
(4, 'Amal Mohanan', '07592031795', 'amalmohanan4156@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, '', '2022-02-20 00:28:12', 1),
(18, 'Akhil Thomson', '7592031795', 'akhilthomson@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', 2, '', '2022-02-20 12:59:55', 1),
(19, 'Amal Mohanan', '07592031795', 'amalmohanan4156@gmail.com', '8590437df1fa66f7bfcb82b321492087', 2, '', '2022-02-20 18:50:31', 2),
(20, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 2, '', '2022-02-20 19:04:25', 2),
(21, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 2, '', '2022-02-20 19:04:44', 2),
(22, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 2, '', '2022-02-20 19:05:09', 2),
(23, 'adsads', 'dad', 'adada', '056f32ee5cf49404607e368bd8d3f2af', 2, 'shop.sql', '2022-02-20 19:07:30', 2),
(24, 'Amal Mohanan', '07592031795', 'amalmohanan4156@gmail.com', '4a1dbd5124d2ff06740c55ea3ec89f22', 2, 'shop.sql', '2022-02-20 19:09:03', 2),
(25, 'Amal Mohanan', '07592031795', 'amalmohanan4156@gmail.com', '0df01ae7dd51cec48fed56952f40842b', 2, '1645364617', '2022-02-20 19:13:37', 2),
(26, 'Amal Mohanan', '07592031795', 'amalmohanan4156@gmail.com', '8d8d25d0904a5a895f3f88363f2213eb', 2, '1645364666', '2022-02-20 19:14:26', 2),
(27, 'Amal Mohanan', '07592031795', 'amalmohanan4156@gmail.com', '8e5dac988aa0766729136089f2e6c704', 2, '1645364710.', '2022-02-20 19:15:10', 2),
(28, 'Amal Mohanan', '07592031795', 'amalmohanan4156@gmail.com', '163f2dc29787aeac9afeb18f4b12110f', 2, '1645364768.', '2022-02-20 19:16:08', 2),
(29, 'Amal Mohanan', '07592031795', 'amalmohanan4156@gmail.com', 'cc15fa92fcd8be557c815c89679a47f6', 2, '1645364862.xlsx', '2022-02-20 19:17:42', 2),
(30, 'arjunsumesh', '7896541230', 'arjunsumesh@gmail.com', '7920c822edfaccc9e12ad2249b37d5e8', 3, '', '2022-02-20 19:31:17', 1),
(31, 'bibin', '1234567890', 'bibin@livares.com', '2da0e0aae058a32f35c573a85fb5b799', 3, '', '2022-02-20 20:24:02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy_request`
--
ALTER TABLE `buy_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_ads`
--
ALTER TABLE `pet_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `qstn_answr`
--
ALTER TABLE `qstn_answr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `buy_request`
--
ALTER TABLE `buy_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pet_ads`
--
ALTER TABLE `pet_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `qstn_answr`
--
ALTER TABLE `qstn_answr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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

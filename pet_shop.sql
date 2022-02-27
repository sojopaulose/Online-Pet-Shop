-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 07:49 PM
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
(1, 1, 1, '2022-02-21 13:11:25', 1),
(2, 1, 1, '2022-02-21 13:16:13', 1);

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
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_ads`
--

INSERT INTO `pet_ads` (`id`, `user_id`, `title`, `description`, `photo`, `vaccine_certificate`, `price`, `gender`, `age`, `created_at`, `status`) VALUES
(1, 1, 'test ad title 1', 'good', 'pet-photo2002221645387914-6212a08aa2f90.jpg', 'pet-certificate2002221645387914-6212a08aa3100.sql', '200', '', 0, '2022-02-21 01:41:54', 1),
(2, 1, 'test', 'sdfsfdsfs', 'pet-photo2302221645606041-6215f499bdede.jpg', 'pet-certificate2302221645606041-6215f499be20f.sql', '1213', 'Male', 23, '2022-02-23 14:17:21', 1);

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
(1, 1, 3, 'Test question title 1', 'question 1', 'answer', '2022-02-21 01:16:48', 1),
(2, 1, 0, 'fsdfd', 'sdfsfdsf', '', '2022-02-21 13:37:38', 1);

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
(1, 1, 'feedback title 1', 'feedback 1', '2022-02-21 01:17:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `address`, `password`, `role`, `certificate`, `created_at`, `status`) VALUES
(1, 'Amal Mohanan', '07592031795', 'amalmohanan4156@gmail.com', 'Kavamkuzhiyil House Marangattupilli po Kottayam', '16b5480e7b6e68607fe48815d16b5d6d', 3, '', '2022-02-21 00:59:26', 1),
(2, 'Amal Mohanan', '07592031795', 'amalmohanan415@gmail.com', '', '0fdca9a022911cf540a3f17574dd05cd', 3, '', '2022-02-21 01:06:34', 1),
(3, 'Arjun Sumesh', '8976897867', 'arjunsumesh@gmail.com', '', '7626d28b710e7f9e98d9dfbe9bf0d123', 2, 'caretaker-certificate2002221645386100-62129974c5d63.sql', '2022-02-21 01:11:40', 1),
(5, 'Superadmin', '7592031795', 'admin@pet.shop.in', '', 'e6e061838856bf47e1de730719fb2609', 1, '', '2022-02-20 20:43:28', 1),
(14, 'Akhil Thomson', '9562031495', 'akhilthomson@gmail.com', '', '545d26918d43a640c4bed801fa7c86a4', 3, '', '2022-02-21 18:20:44', 1),
(15, 'Rahul', '9596321485', 'rahulremanan@gmail.com', '', '6eea9b7ef19179a06954edd0f6c05ceb', 2, 'caretaker-certificate2102221645448095-62138b9f867f4.xlsx', '2022-02-21 18:24:55', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pet_ads`
--
ALTER TABLE `pet_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qstn_answr`
--
ALTER TABLE `qstn_answr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

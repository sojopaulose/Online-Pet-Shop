-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2022 at 06:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `pwd`, `category`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'super_admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `datetimes` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'FinePix Pro2 3D Camera', '3DcAM01', 'data/camera.jpg', 1500.00),
(2, 'Luxury Ultra thin Wrist Watch', 'wristWear03', 'data/watch.jpg', 300.00),
(3, 'XP 1155 Intel Core Laptop', 'LPN45', 'data/laptop.jpg', 800.00),
(4, 'Water Bottle', 'wristWear02', 'data/external-hard-drive.jpg', 600.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ad`
--

CREATE TABLE `tbl_ad` (
  `id` int(11) NOT NULL,
  `user_ids` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` text NOT NULL,
  `cert_file` text NOT NULL,
  `address` text NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(11) DEFAULT 0,
  `sold_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ad`
--

INSERT INTO `tbl_ad` (`id`, `user_ids`, `title`, `price`, `description`, `quantity`, `image`, `cert_file`, `address`, `datetime`, `status`, `sold_status`) VALUES
(1, 3, 'First Title', '10', 'fdaghahj ghsaghsajkjs vbsbnm,mm, yuuui', 2, '002.jpg', '1644710400.jpg', 'Zxcvbnm\r\nZXCVBn\r\nZXCvb', '2022-02-14 03:17:00', 1, 0),
(2, 2, 'Cat', '5000', 'dummy descriptions', 5, '1644537600.jpg', '1644883200.pdf', 'Address Line 1\r\nAddress Line 2\r\nAddress Line 3', '2022-02-15 17:11:50', 1, 0),
(3, 5, 'Persian Dogs', '98', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 5, 'caretaker-certificate1602221644982973-620c72bd1411f.jpg', 'caretaker-certificate1602221644982973-620c72bd14144.jpg', 'Address Line 1 Address Line 2 Address Line 3', '2022-02-16 09:12:53', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `user_ids` int(11) NOT NULL,
  `ad_ids` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `datetimes` datetime NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `user_ids`, `ad_ids`, `quantity`, `datetimes`, `status`) VALUES
(1, 5, 1, 1, '2022-02-16 06:39:05', 0),
(2, 1, 2, 1, '2022-02-16 08:55:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_type` enum('caretaker','normal') NOT NULL DEFAULT 'caretaker',
  `name` varchar(150) NOT NULL,
  `image` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(250) NOT NULL,
  `datetimes` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `caretaker_stat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_type`, `name`, `image`, `file`, `email`, `mobile`, `password`, `datetimes`, `status`, `caretaker_stat`) VALUES
(1, 'normal', 'User One', '', NULL, 'userone@gmail.com', '9087845651', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 00:02:29', 1, 0),
(2, 'normal', 'User Two', '', NULL, 'usertwo@gmail.com', '9874563210', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 00:03:03', 1, 0),
(3, 'normal', 'User Three', '', NULL, 'userthree@gmail.com', '9874561230', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 00:03:35', 1, 0),
(4, 'normal', 'User Four', '', NULL, 'userfour@gmail.com', '9874561230', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 00:04:05', 1, 0),
(5, 'normal', 'User Five', '', NULL, 'userfive@gmail.com', '9874561230', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 00:04:34', 1, 0),
(6, 'caretaker', 'Caretaker One', '', '1644537600.pdf', 'caretakerone@gmail.com', '9876541230', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 00:06:21', 1, 1),
(7, 'caretaker', 'Caretaker Two', '', '1644537600.pdf', 'caretakertwo@gmail.com', '9874563210', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 00:15:42', 1, 1),
(8, 'caretaker', 'Caretaker Three', '', '1644537600.pdf', 'caretakerthree@gmail.com', '9874563210', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 00:55:43', 1, 1),
(10, 'caretaker', 'Caretaker Four', '', '1644537600.pdf', 'caretakerfour@mail.com', '9874563210', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 01:22:45', 1, 1),
(11, 'caretaker', 'Caretaker Five', '', '1644537600.pdf', 'caretakerfive@mail.com', '9874563210', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 01:23:16', 1, 0),
(12, 'caretaker', 'Caretaker Six', '', '1644537600.pdf', 'caretakersix@mail.com', '9874563210', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 02:05:45', 1, 0),
(13, 'caretaker', 'Caretaker Seven', '', '1644537600.pdf', 'caretakerseven@gmail.com', '9874563210', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 02:10:12', 1, 0),
(14, 'caretaker', 'New Test', '', '', 'newtest@gmail.com', '9876541230', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-16 08:15:27', 1, 0),
(15, 'caretaker', 'New Test 2', '', 'caretaker-certificate1602221644979701-620c65f5680d9.pdf', 'newtest@mail.com', '9874561230', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-16 08:18:21', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `user_ids` int(11) NOT NULL,
  `ad_ids` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `datetimes` datetime NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `user_ids`, `ad_ids`, `quantity`, `datetimes`, `status`) VALUES
(1, 1, 1, 1, '2022-02-16 06:39:11', 1),
(2, 1, 2, 1, '2022-02-16 06:42:35', 1),
(3, 1, 2, 1, '2022-02-16 06:43:09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `tbl_ad`
--
ALTER TABLE `tbl_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_ad`
--
ALTER TABLE `tbl_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2017 at 06:24 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avenue`
--

-- --------------------------------------------------------

--
-- Table structure for table `ground`
--

CREATE TABLE `ground` (
  `id` int(11) NOT NULL,
  `ground_name` varchar(60) NOT NULL,
  `address` varchar(500) NOT NULL,
  `price` varchar(30) NOT NULL,
  `advance_amount` varchar(30) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `area` varchar(60) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ground`
--

INSERT INTO `ground` (`id`, `ground_name`, `address`, `price`, `advance_amount`, `capacity`, `area`, `availability`) VALUES
(2, 'Chairman Bari Field', 'Road-13, Banani, Dhaka, Bangladesh', '70000', '2000', '700', '900 sqaure feet', 1),
(5, 'Shyamoli Club Playground', 'Ring Rd, Dhaka 1207, Bangladesh', '50000', '20000', '500', '400 square feet', 0),
(7, 'ULAB Cricket Ground', 'Meena Bazar Godown, Ramchandrapur, Mohammadpur; Dhaka, Bangladesh.', '80000', '35000', '2000', '1200 square feet', 0),
(8, 'Dhanmondi Club And Cricket Ground', 'Road No. 8 Mirpur Rd, Dhaka 1205, BangladeshRoad No. 8 Mirpur Rd, Dhaka 1205, Bangladesh', '60000', '30000', '1000', '1800 square feet', 0),
(9, 'Uttara Friends Club', 'Sector 3 Rd No 7, Dhaka 1230, Bangladesh', '75000', '40000', '2200', '1800 square feet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `ground_name` varchar(100) NOT NULL,
  `address` varchar(600) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `ground_name`, `address`, `latitude`, `longitude`, `type`) VALUES
(1, 'Shyamoli playground', 'Ring Rd, Dhaka 1207, Bangladesh', '23.774083', '90.363487', 'cricket'),
(2, 'ULAB Cricket Ground', 'Meena Bazar Godown, Ramchandrapur, Mohammadpur; Dhaka, Bangladesh.', '23.760007', '90.348204', 'cricket'),
(3, 'Chairman Bari Field', 'Road-13, Banani, Dhaka, Bangladesh', '23.787636', '90.401981', 'football'),
(4, 'Dhanmondi Club And Cricket Ground', 'Road No. 8 Mirpur Rd, Dhaka 1205, BangladeshRoad No. 8 Mirpur Rd, Dhaka 1205, Bangladesh', '23.746081', '90.380451', 'Cricket'),
(5, 'Uttara Friends Club', 'Sector 3 Rd No 7, Dhaka 1230, Bangladesh', '23.864685', '90.395607', 'Football');

-- --------------------------------------------------------

--
-- Table structure for table `order_ground`
--

CREATE TABLE `order_ground` (
  `id` int(11) NOT NULL,
  `ground_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `order_date` date DEFAULT NULL,
  `advance_amount` varchar(255) NOT NULL,
  `tx_id` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_ground`
--

INSERT INTO `order_ground` (`id`, `ground_name`, `address`, `user_email`, `order_date`, `advance_amount`, `tx_id`) VALUES
(15, 'Chairman Bari Field', 'Road-13, Banani, Dhaka, Bangladesh', 'fahiamim.hc@gmail.com', '2017-03-31', '2000', 3232),
(16, 'Shyamoli Club Playground', 'Ring Rd, Dhaka 1207, Bangladesh', 'fahiamim.hc@gmail.com', '2017-04-02', '20000', 6890),
(17, 'ULAB Cricket Ground', 'Meena Bazar Godown, Ramchandrapur, Mohammadpur; Dhaka, Bangladesh.', 'fahiamim.hc@gmail.com', '2017-04-08', '35000', 76445),
(18, 'Uttara Friends Club', 'Sector 3 Rd No 7, Dhaka 1230, Bangladesh', 'fahiamim.hc@gmail.com', '2017-04-20', '40000', 454545);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirm_password` varchar(32) NOT NULL,
  `agreement` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `confirm_password`, `agreement`) VALUES
(1, 'fahiamim.hc@gmail.com', 'fahiamim', 'fahiamim', 1),
(2, 'iu@ihgb', 'hhh', 'hhh', 1),
(3, 'gbigv@gmail.com', 'hhh', 'hhh', 1),
(4, 'fahim.hc@gmail.com', 'zxcv', 'zxcv', 1),
(5, 'abc@gmail.com', 'zxcv', 'zxcv', 1),
(6, 'adeba@gmail.com', 'adebatrisha', 'adebatrisha', 1),
(7, 'admin@gmail.com', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ground`
--
ALTER TABLE `ground`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_ground`
--
ALTER TABLE `order_ground`
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
-- AUTO_INCREMENT for table `ground`
--
ALTER TABLE `ground`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_ground`
--
ALTER TABLE `order_ground`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

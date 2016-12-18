-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2016 at 01:38 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE IF NOT EXISTS `catagory` (
  `catagory_id` int(15) NOT NULL,
  `catagory_name` varchar(50) DEFAULT NULL,
  `catagory_image` blob
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`, `catagory_image`) VALUES
(1, 'pen', 0x61626366666666662e6a7067),
(2, 'pen', 0x61626366666666662e6a7067),
(3, 'laptop', 0x6171717171717171717171717171717171717171717171717171717171717172727272727272727272727272727272722e706e67),
(4, 'headphone', 0x617070707070707070707575757575752e706e67),
(5, 'moneybag', 0x4d6f6e65795f4261675f69636f6e2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(50) DEFAULT NULL,
  `user_id` int(15) DEFAULT NULL,
  `product_id` varchar(20) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `quantity` int(15) DEFAULT NULL,
  `unit_price` int(15) DEFAULT NULL,
  `total_price` int(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` varchar(20) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_stock` int(15) DEFAULT NULL,
  `product_unit_price` int(20) DEFAULT NULL,
  `discount` int(15) DEFAULT NULL,
  `product_short_des` varchar(150) DEFAULT NULL,
  `product_des` text,
  `product_image` blob,
  `catagory_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_stock`, `product_unit_price`, `discount`, `product_short_des`, `product_des`, `product_image`, `catagory_id`) VALUES
('12', 'joss', 10, 0, 0, '', '', NULL, NULL),
('33234', 'pant', 30, 40000, 20, 'shotr jinis', 'here is full all', NULL, NULL),
('400', 'laptop', 2, 50000, 300, 'here is my fav laptop', ' you can buy it any time any moment ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(15) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_role` varchar(20) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `address`, `phone`, `email`, `password`, `user_role`, `designation`) VALUES
(11, 'u', 'dhaka', '039847038477', 'u@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'User', NULL),
(12, 'a', 'dhaka', '01671763640', 'a@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'CEO'),
(13, 'mazed', '10 number dhaka', '0177777', 'm@gmail.com', '202cb962ac59075b964b07152d234b70', 'User', NULL),
(14, 'roni', 'sfgfsg', '3435', 'ra@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'User', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `user_id` (`user_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`), ADD KEY `catagory_id` (`catagory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`catagory_id`) REFERENCES `catagory` (`catagory_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

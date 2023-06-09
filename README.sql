-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 07:44 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'abc', 'abd@fv.cpm', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, '50.00', 'Pending', 101, 1234567890, 'New York', '123 Main St', '2023-05-01 00:00:00'),
(2, '75.25', 'Completed', 102, 2147483647, 'Los Angeles', '456 Elm St', '2023-05-02 00:00:00'),
(3, '30.50', 'Pending', 103, 2147483647, 'Chicago', '789 Oak Ave', '2023-05-03 00:00:00'),
(4, '20.00', 'Cancelled', 104, 1112223333, 'Houston', '321 Pine St', '2023-05-04 00:00:00'),
(5, '45.75', 'Completed', 105, 2147483647, 'Miami', '987 Beach Blvd', '2023-05-05 00:00:00'),
(6, '65.00', 'Pending', 106, 2147483647, 'San Francisco', '654 Hillside Ave', '2023-05-06 00:00:00'),
(7, '15.99', 'Completed', 107, 2147483647, 'Seattle', '789 Lakeview Dr', '2023-05-07 00:00:00'),
(8, '85.50', 'Pending', 108, 2147483647, 'Boston', '456 Park Ave', '2023-05-08 00:00:00'),
(9, '40.25', 'Completed', 109, 2147483647, 'Denver', '321 Mountain Rd', '2023-05-09 00:00:00'),
(10, '55.00', 'Pending', 110, 2147483647, 'Dallas', '987 Sunset Ave', '2023-05-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(200) DEFAULT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_image`, `product_quantity`, `user_id`, `order_date`) VALUES
(4, 13, '1', 'White Shoes', 155, 'featured1.jpg', 1, 5, '2023-05-28 07:09:16'),
(101, 14, '2', 'Black Shoes', 120, 'featured2.jpg', 1, 5, '2023-05-28 07:09:16'),
(102, 15, '3', 'Red Shirt', 30, 'featured3.jpg', 2, 5, '2023-05-28 07:09:16'),
(103, 16, '4', 'Blue Jeans', 80, 'featured4.jpg', 1, 5, '2023-05-28 07:09:16'),
(104, 17, '5', 'Green Hat', 25, 'featured5.jpg', 1, 5, '2023-05-28 07:09:16'),
(105, 18, '6', 'Yellow Dress', 150, 'featured6.jpg', 1, 5, '2023-05-28 07:09:16'),
(106, 19, '7', 'Purple Sweater', 75, 'featured7.jpg', 1, 5, '2023-05-28 07:09:16'),
(107, 20, '8', 'Orange Trousers', 90, 'featured8.jpg', 1, 5, '2023-05-28 07:09:16'),
(108, 21, '9', 'Pink Scarf', 40, 'featured9.jpg', 1, 5, '2023-05-28 07:09:16'),
(109, 22, '10', 'Brown Belt', 20, 'featured10.jpg', 1, 5, '2023-05-28 07:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `user_id`, `transaction_id`, `payment_date`) VALUES
(1, 101, 201, 'TXN001', NULL),
(2, 102, 202, 'TXN002', NULL),
(3, 103, 203, 'TXN003', NULL),
(4, 104, 204, 'TXN004', NULL),
(5, 105, 205, 'TXN005', NULL),
(6, 106, 206, 'TXN006', NULL),
(7, 107, 207, 'TXN007', NULL),
(8, 108, 208, 'TXN008', NULL),
(9, 109, 209, 'TXN009', NULL),
(10, 110, 210, 'TXN010', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'White Shoes', 'shoes', 'awesome white shoes', 'featured1.jpg', 'featured1.jpg', 'featured1.jpg', 'featured1.jpg', '155.00', 0, 'white'),
(2, 'Smartphone', 'Electronics', 'High-performance smartphone with advanced features', 'smartphone.jpg', 'smartphone_2.jpg', 'smartphone_3.jpg', 'smartphone_4.jpg', '599.99', 20, 'Black'),
(3, 'Laptop', 'Electronics', 'Powerful laptop for work and entertainment', 'laptop.jpg', 'laptop_2.jpg', 'laptop_3.jpg', 'laptop_4.jpg', '1299.99', 0, 'Silver'),
(4, 'Fitness Tracker', 'Fitness', 'Track your fitness activities and monitor your health', 'fitness_tracker.jpg', 'fitness_tracker_2.jpg', 'fitness_tracker_3.jpg', 'fitness_tracker_4.jpg', '89.99', 15, 'Blue'),
(5, 'Headphones', 'Electronics', 'Premium headphones for immersive audio experience', 'headphones.jpg', 'headphones_2.jpg', 'headphones_3.jpg', 'headphones_4.jpg', '199.99', 0, 'Black'),
(6, 'Camera', 'Electronics', 'Capture stunning photos and videos with this high-quality camera', 'camera.jpg', 'camera_2.jpg', 'camera_3.jpg', 'camera_4.jpg', '799.99', 0, 'Silver'),
(7, 'Smart TV', 'Electronics', 'Enjoy your favorite shows and movies on this smart TV', 'smart_tv.jpg', 'smart_tv_2.jpg', 'smart_tv_3.jpg', 'smart_tv_4.jpg', '1299.99', 10, 'Black'),
(8, 'Running Shoes', 'Sports', 'Comfortable and durable running shoes for athletes', 'running_shoes.jpg', 'running_shoes_2.jpg', 'running_shoes_3.jpg', 'running_shoes_4.jpg', '79.99', 0, 'Red'),
(9, 'Gaming Mouse', 'Gaming', 'Precision gaming mouse for enhanced gaming performance', 'gaming_mouse.jpg', 'gaming_mouse_2.jpg', 'gaming_mouse_3.jpg', 'gaming_mouse_4.jpg', '49.99', 20, 'Black'),
(10, 'Coffee Maker', 'Home Appliances', 'Brew delicious coffee with this advanced coffee maker', 'coffee_maker.jpg', 'coffee_maker_2.jpg', 'coffee_maker_3.jpg', 'coffee_maker_4.jpg', '79.99', 0, 'Silver');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'abc', 'abd@fv.cpm', '123456'),
(5, 'qwqw', 'we@.d.m', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `UX_Constraint` (`admin_email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

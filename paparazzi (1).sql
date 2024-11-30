-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 10:32 AM
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
-- Database: `paparazzi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` varchar(3) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `product_name`, `quantity`, `price`, `total`) VALUES
(1, 6, 'sugar_cone (Wafer Cone) with With Dip', '1', NULL, NULL),
(2, 4, 'Coffee  (500ml)', '1', NULL, NULL),
(3, 4, 'Milky  (500ml)', '1', NULL, NULL),
(4, 4, 'Chocolate  (700ml)', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `icecreams`
--

CREATE TABLE `icecreams` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `order_type` enum('For Pickup Only','For Delivery Only','For Delivery & Pickup','') NOT NULL,
  `icecream_type` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `icecreams`
--

INSERT INTO `icecreams` (`product_id`, `name`, `description`, `order_type`, `icecream_type`, `img`) VALUES
(4, 'Floats', ' A refreshing dessert made by combining soda with a scoop of ice cream.', 'For Delivery & Pickup', 'Floats', '../uploads/674423f86f2c0_Screenshot 2024-11-25 151051.png'),
(6, 'Ice Cream Cones', 'An ice cream serve in cone.', 'For Pickup Only', 'Cones', '../uploads/67445ea4a4098_Screenshot 2024-11-25 192254.png'),
(7, 'Ice Cream in Cup', 'Ice Cream served in cup', 'For Delivery & Pickup', 'Ice Cream in Cup', '../uploads/67447013d16f3_Screenshot 2024-11-25 201151.png'),
(10, 'Sugar Bowl', 'An ice cream served in a cup shaped cone.', 'For Pickup Only', 'sugar_bowl', '../uploads/6744733447c97_Screenshot 2024-11-25 204131.png');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `price_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`price_id`, `product_id`, `type`, `name`, `price`) VALUES
(19, 4, 'floats', 'Soda Float (500ml)', 79.00),
(20, 4, 'floats', 'Soda Float (750ml)', 89.00),
(21, 4, 'floats', 'Chocolate Float (500ml)', 99.00),
(22, 4, 'floats', 'Chocolate Float (750ml)', 119.00),
(23, 4, 'floats', 'Milky Float (500ml)', 129.00),
(24, 4, 'floats', 'Milky Float (750ml)', 149.00),
(25, 4, 'floats', 'Coffee Float (500ml)', 129.00),
(26, 4, 'floats', 'Coffee Float (750ml)', 149.00),
(27, 4, 'floats', 'Fruit Float (500ml)', 129.00),
(28, 4, 'floats', 'Fruit Float (750ml)', 149.00),
(41, 6, 'wafer_cone', 'No Dip', 39.00),
(42, 6, 'wafer_cone', 'With Dip', 49.00),
(43, 6, 'sugar_cone', 'No Dip', 59.00),
(44, 6, 'sugar_cone', 'With Dip', 69.00),
(45, 7, 'cups', 'No topping (240ml)', 69.00),
(46, 7, 'cups', 'No topping (360ml)', 99.00),
(47, 7, 'cups', 'No topping (550ml)', 129.00),
(48, 7, 'cups', 'One topping (240ml)', 89.00),
(49, 7, 'cups', 'One topping (360ml)', 119.00),
(50, 7, 'cups', 'One topping (550ml)', 149.00),
(51, 7, 'cups', 'Two toppings (240ml)', 109.00),
(52, 7, 'cups', 'Two toppings (360ml)', 139.00),
(53, 7, 'cups', 'Two toppings (550ml)', 169.00),
(54, 7, 'cups', 'Three toppings (240ml)', 129.00),
(55, 7, 'cups', 'Three toppings (360ml)', 159.00),
(56, 7, 'cups', 'Three toppings (550ml)', 189.00),
(62, 10, 'sugar_bowl', 'No Topping', 69.00),
(63, 10, 'sugar_bowl', '1 Topping(s)', 89.00),
(64, 10, 'sugar_bowl', '2 Topping(s)', 109.00),
(65, 10, 'sugar_bowl', '3 Topping(s)', 129.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `contact`, `address`, `email`, `password`, `account_type`) VALUES
(1, 'Andrei', 'Tallado', '9951912107', 'Banay-banay', 'atalladotes@gmail.com', '$2y$10$C5drBDkWQktHDVLa01JPTuPfbIu4nwF9eLgp7jRkp.1vS9GsZjJle', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `icecreams`
--
ALTER TABLE `icecreams`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `icecreams`
--
ALTER TABLE `icecreams`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `icecreams` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `pricing`
--
ALTER TABLE `pricing`
  ADD CONSTRAINT `pricing_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `icecreams` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

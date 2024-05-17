-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 07:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meals`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `del_date` date NOT NULL,
  `del_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`name`, `phone`, `address`, `city`, `del_date`, `del_time`) VALUES
('chalani', 711234567, 'diyagama,homagama', 'homagama', '2023-12-24', '23:22:05.000000');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` varchar(200) NOT NULL,
  `remark` varchar(5000) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `added_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `price`, `remark`, `image`, `category`, `added_date`) VALUES
(11, 'pizza', '31', 'Get Pizza', 'image47.jpg', 'Lunch/Dinner', '2023-12-20 08:50:08'),
(12, 'Pasta', '12', 'Get Pasta', 'image24.jpg', 'Dinner', '2023-12-20 08:52:04'),
(14, 'Avocado Toast', '11', 'Get Avocado Toast', 'image37.jpg', 'Testy Food', '2023-12-20 08:59:57'),
(17, 'Acai Bowls', '8', 'Get Acai Bowls', 'image39.jpg', 'Dessert', '2023-12-20 09:07:45'),
(18, 'Quinoa Bowls', '11', 'Get Quinoa Bowls', 'image40.jpg', 'Healthy Food', '2023-12-20 09:08:38'),
(19, 'Laksa', '27', 'Get Laksa', 'image41.jpg', 'Testy Food', '2023-12-20 09:09:36'),
(20, 'Burgers', '11', 'Get Burger', 'image43.jpg', 'Testy Food', '2023-12-20 09:11:53'),
(21, 'Fries', '6', 'Get Fries', 'image57.jpg', 'Testy Food', '2023-12-20 10:23:22'),
(22, 'Coffee', '4', 'Get Coffee', 'image45.png', 'Drinks', '2023-12-20 10:25:12'),
(23, 'Matcha Lattes', '9', 'Get Matcha Lattes', 'image46.jpg', 'Flavor', '2023-12-20 10:26:03'),
(24, 'Kombucha', '18', 'Get Kombucha', 'image48.jpeg', 'Drinks', '2023-12-20 10:27:32'),
(25, 'Smoothies', '8', 'Get Smoothies', 'image49.png', 'Drinks', '2023-12-20 10:30:57'),
(26, 'Fruit Infused Water', '10', 'Get Fruit Infused Water', 'image58.jpg', 'Drinks', '2023-12-20 10:35:59'),
(27, 'Coconut Water', '4', 'Get Coconut Water', 'image51.jpg', 'Drinks', '2023-12-20 10:36:56'),
(28, 'Teas ', '3', 'Get Teas', 'image52.jpg', 'Drinks', '2023-12-20 10:37:32'),
(29, 'Vegetable Juices', '8', 'Get Vegetable Juices', 'image53.jpg', 'Healthy Juice', '2023-12-20 10:38:53'),
(30, 'Sparkling Water', '2', 'Get Sparkling Water', 'image59.jpg', 'Drinks', '2023-12-20 10:43:16'),
(31, 'Milk', '3', 'Get Milk', 'image55.jpeg', 'Drinks', '2023-12-20 10:43:54'),
(32, 'Sushi Burritos', '27', 'Get Sushi Burritos', 'image60.jpg', 'Lunch/Dinner', '2023-12-20 11:19:54'),
(33, 'Laksa', '27', 'Get Laksa', 'image61.jpg', 'Dinner', '2023-12-20 11:20:53'),
(34, 'Fried RIce', '26', 'Get Fried Rice', 'image62.jpeg', 'Lunch/Dinner', '2023-12-20 11:31:02'),
(35, 'Turtle Bay Sea Food', '35', 'Get Turtle Bay Sea Food', 'TURTLE BAY SEA FOOD_75.jpg', 'Dinner', '2023-12-24 17:52:08'),
(37, 'Lunch Dishes', '40', 'Get Lunch ', 'image78.jpg', 'Lunch', '2023-12-24 19:01:59'),
(38, 'India Food', '24', 'Get India Food', 'India Food_77.webp', 'Lunch/Dinner', '2023-12-24 21:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(500) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `state` varchar(500) DEFAULT NULL,
  `zip` varchar(500) DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  `order_amount` varchar(500) DEFAULT NULL,
  `added_date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_name`, `address`, `email`, `city`, `state`, `zip`, `order_quantity`, `order_amount`, `added_date`) VALUES
(1, 'Sushi Burritos', 'Colombo', 'sushi@gmail.com', 'Colombo', 'Western province', '12565', 6, '100.00', '2023-12-24 14:20:08'),
(2, 'Sushi Burritos', 'Colombo', 'sushi@gmail.com', 'Colombo', 'Western province', '12565', 6, '100.00', '2023-12-24 14:22:35'),
(3, '', '', '', '', '', '', 0, '', '2023-12-24 15:09:32'),
(4, '', '', '', '', '', '', 10, '144.00', '2023-12-24 16:23:50'),
(5, '', '', '', '', '', '', 9, '148.00', '2023-12-24 16:53:30'),
(6, '', '', '', '', '', '', 0, '', '2023-12-24 20:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `added_date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `user_name`, `email`, `password`, `added_date`) VALUES
(1, 'Sushi Burritos', 'sushi@gmail.com', '123456', '2023-12-24 15:39:36'),
(2, 'chalani', 'chala@gmail.com', '123', '2023-12-24 16:21:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 05:19 PM
-- Server version: 10.5.12-MariaDB-1
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Agri_Solution_Hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `active`, `date`, `slug`) VALUES
(1, 'crops', 1, '2023-03-13 10:55:44', 'crops'),
(4, 'livestock', 0, '2023-03-16 22:54:32', 'livestock'),
(5, 'aquaculture', 0, '2023-03-22 19:57:11', 'aquaculture'),
(6, 'Horticulture', 1, '2023-03-12 00:00:33', 'horticulture'),
(23, 'Farm Tools', 1, '2023-03-14 22:15:16', 'farm-tools'),
(24, 'Irrigation Equipments', 1, '2023-03-14 22:15:23', 'irrigation-equipments'),
(25, 'Livestock Equipments', 1, '2023-03-12 23:49:49', 'livestock-equipments'),
(26, 'Fertilizers', 1, '2023-03-12 23:49:30', 'fertilizers'),
(27, 'Agro-chemicals', 1, '2023-03-14 21:22:33', 'agro-chemicals'),
(28, 'Insecticides', 0, '2023-03-18 20:27:28', 'insecticides'),
(29, 'Seeds', 1, '2023-03-14 22:15:50', 'seeds'),
(30, 'Farming methods', 0, '2023-03-16 22:55:00', 'farming-methods'),
(31, 'Finame', 0, '2023-03-14 22:15:39', 'finame');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `disabled`) VALUES
(1, 'Kenya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `regNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `phone`, `email`, `address`, `regNo`) VALUES
(1, '0712345678', 'jackmutiso37@gmail.com', 'jj', 'inte'),
(2, '0712345678', 'jackmutiso37@gmail.com', 'jj', 'inte'),
(3, '0712345678', 'jackmutiso37@gmail.com', 'kaba', 'inte/mg'),
(4, '0712345678', 'jackmutiso37@gmail.com', 'kaba', 'inte/mg'),
(5, '0712345678', 'jackmutiso37@gmail.com', 'kaba', 'inte/mg'),
(6, '0712345678', 'jackmutiso37@gmail.com', 'kaba', 'inte/mg'),
(7, '0712345678', 'jackmutiso37@gmail.com', 'jj', 'inte'),
(8, '997536363', 'jack@gmail.com', 'nairobi', 'inte'),
(9, '8876544', 'jackmutiso37@gmail.com', 'iiii', 'econ'),
(10, '0976544', 'john@gmail.com', 'kiba', 'maths'),
(11, '254702830006', 'john@gmail.com', 'kk', '00l'),
(12, '0745378674', 'jack@gmail.com', 'kabarak', 'it'),
(13, '075343332', 'john@gmail.com', 'arusha', 'eco'),
(14, '087363534', 'mahlihep@gmail.com', 'kabaraka', 'cs/mg'),
(15, '0101480104', 'oriel@gmail.com', 'Kericho', 'ede/mg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `order_id` bigint(20) NOT NULL,
  `session_id` varchar(30) NOT NULL,
  `delivery_address` varchar(2024) NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `country` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `state` varchar(20) DEFAULT NULL,
  `tax` double DEFAULT 0,
  `shipping` double NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_id`, `session_id`, `delivery_address`, `total`, `country`, `username`, `email`, `phone`, `state`, `tax`, `shipping`, `date`) VALUES
(1, '1', 35712801, 'tl5lbd7k2mkudct6gqm0fj2qbb', 'kabarak rafiki', 1, 'Kenya', 'Glady', 'jackmutiso37@gmail.com', '075343332', 'Nakuru', 0, 0, '2023-04-02 07:41:03'),
(2, '1', 26434360, 'tl5lbd7k2mkudct6gqm0fj2qbb', 'Kampi', 1, 'Kenya', 'stacy', 'stacia@gmail.com', '254745378674', 'Mombasa', 0, 0, '2023-04-02 08:13:46'),
(3, '1', 96968732, 'tl5lbd7k2mkudct6gqm0fj2qbb', 'kdo', 1, 'Kenya', 'Elvis', 'elvis@gmail.com', '0712345678', 'Meru', 0, 0, '2023-04-02 08:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(700) NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `description`, `amount`, `total`) VALUES
(1, 35712801, 18, 1, '                                                        new desctiopn\r\n                                                                                                                                                                                                        ', 1, 1),
(2, 26434360, 18, 1, '                                                        new desctiopn\r\n                                                                                                                                                                                                        ', 1, 1),
(3, 96968732, 18, 1, '                                                        new desctiopn\r\n                                                                                                                                                                                                        ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `MerchantRequestID` varchar(50) NOT NULL,
  `CheckoutRequestID` varchar(50) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT 'request sent',
  `TransactionDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `PhoneNumber`, `Amount`, `MerchantRequestID`, `CheckoutRequestID`, `order_id`, `user_id`, `status`, `TransactionDate`) VALUES
(1, '254745378674', 1.00, '9428-43763949-1', 'ws_CO_02042023230801226745378674', '35712801', '1', 'canceled', '2023-04-02 23:07:53'),
(2, '254745378674', 1.00, '17912-43759137-1', 'ws_CO_02042023231357299745378674', '26434360', '1', 'success', '2023-04-02 23:13:54'),
(3, '254745378674', 1.00, '9428-43783076-1', 'ws_CO_02042023231814852745378674', '96968732', '1', 'canceled', '2023-04-02 23:18:07'),
(4, '254745378674', 1.00, '9435-43792517-1', 'ws_CO_02042023232331764745378674', '96968732', '1', 'canceled', '2023-04-02 23:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `permission_table`
--

CREATE TABLE `permission_table` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `disabled` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_table`
--

INSERT INTO `permission_table` (`id`, `role_id`, `permission`, `disabled`) VALUES
(1, 1, 'view_category', 1),
(2, 1, 'add_category', 1),
(3, 1, 'edit_category', 1),
(4, 1, 'delete_category', 1),
(5, 2, 'view_category', 1),
(6, 2, 'add_category', 1),
(7, 2, 'edit_category', 1),
(8, 2, 'delete_category', 1),
(9, 2, 'view_products', 1),
(10, 2, 'add_product', 1),
(11, 1, 'add_product', 1),
(12, 1, 'edit_product', 1),
(13, 1, 'delete_product', 1),
(14, 1, 'view_products', 1),
(15, 1, 'view_product', 1),
(16, 1, 'view_user', 1),
(17, 1, 'edit_role', 1),
(18, 1, 'view_role', 1),
(19, 1, 'add_role', 1),
(20, 1, 'delete_role', 1),
(21, 1, 'add_user', 1),
(22, 1, 'edit_user', 1),
(23, 1, 'view_order', 1),
(24, 1, 'delete_order', 1),
(25, 1, 'view_dashboard', 0),
(26, 1, 'view_about', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `description` varchar(700) NOT NULL,
  `features` varchar(700) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `approved` int(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `product_name`, `price`, `quality`, `description`, `features`, `image`, `approved`, `date`) VALUES
(18, 1, '24', 'Testing', '1', '6', '                                                        new desctiopn\r\n                                                                                                                                                                                                        ', '                                                            l\r\n                                                                                                                                                                                                        ', 'uploads/1679274233Screenshot_20230320-035017.jpg', 0, '2023-03-23 14:19:56'),
(23, 1, '6', 'Farmer laptop', '1234', '200', '                 jjj  \r\n                                                            ', '                nmn   \r\n                                                            ', 'uploads/1679274331IMG_20230312_221734.jpg', 0, '2023-03-20 01:05:31'),
(29, 1, '23', 'seeds', '200', '2', '                Measure 1KG of this fertilizer, premixed it into 1000L of water and run it through your irrigation system for vegetative growth while 10G is premixed into 15L of water for your nursery(seedlings)\r\n                                        ', '            Measure 1KG of this fertilizer, premixed it into 1000L of water and run it through your irrigation system for vegetative growth while 10G is premixed into 15L of water for your nursery(seedlings)\r\n                                        ', 'uploads/1679298553254710962345_status_7bcec9d7ae9f4826bbcddc2a7ce013fd.jpg', 0, '2023-03-20 07:49:13'),
(31, 1, '23', 'Machine', '500', '234', '                Measure 1KG of this fertilizer, premixed it into 1000L of water and run it through your irrigation system for vegetative growth while 10G is premixed into 15L of water for your nursery(seedlings)\r\n                                        ', '            Measure 1KG of this fertilizer, premixed it into 1000L of water and run it through your irrigation system for vegetative growth while 10G is premixed into 15L of water for your nursery(seedlings)\r\n                                        ', 'uploads/1679444156Screenshot_20230321-094755.jpg', 0, '2023-03-22 00:15:56'),
(32, 1, '23', 'Carrots', '300', '1', '                in software development should independent of the development team\r\n                                        ', '            in software development should independent of the development team\r\n                                        ', 'uploads/1679444243Screenshot_20230223-005420.jpg', 0, '2023-03-22 00:17:23'),
(33, 1, '27', 'Testing 1', '884747', '77', '                m zm a\r\n                                        ', '            n znm z z\r\n                                        ', 'uploads/1679444267Screenshot_20230313-104015.jpg', 0, '2023-03-22 00:17:47'),
(34, 1, '29', 'Farmer laptop', '200', '2', 'ahcjvacv\r\n                    ', '\r\n   n a a                 ', 'uploads/1679514166week0.jpg', 0, '2023-03-22 19:42:46'),
(35, 4, '5', 'screenshot', '300000', '1', '\r\n       nm m             ', '\r\n                z mn     ', 'uploads/1679514539Screenshot from 2022-08-17 22-16-34.png', 0, '2023-03-22 19:48:59'),
(36, 1, '27', 'Sprayer', '12000', '32', 'To help farmers make most the most of their technology investments,\r\n                    ', 'To help farmers make most the most of their technology investments,\r\n                    ', 'uploads/1679527989agritech-login.png', 0, '2023-03-22 23:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `expire` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset`
--

INSERT INTO `reset` (`id`, `email`, `code`, `expire`) VALUES
(1, 'jackmutiso37@gmail.com', '16379', 1680452408),
(2, 'jackmutiso37@gmail.com', '46095', 1680452473);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(40) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `disabled`) VALUES
(1, 'User', 1),
(2, 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`, `disabled`) VALUES
(1, 'Nakuru', 0),
(2, 'Nairobi', 0),
(3, 'Machakos', 0),
(4, 'Mombasa', 0),
(5, 'Meru', 0),
(6, 'Eldoret', 0),
(7, 'Thika', 0),
(8, 'Kitale', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `role`, `password`, `date`) VALUES
(1, 'Jack', 'jackmutiso37@gmail.com', 2, '12345', '2023-04-02 16:12:18'),
(3, 'Cesur', 'cesurelvis@gmail.com', 2, 'elvis123', '2023-03-23 08:18:56'),
(4, 'Stacy', 'stacia@gmail.com', 1, '12345', '2023-03-13 05:16:55'),
(6, 'Glady', 'kamaugladys@gmail.com', 1, '12345', '2023-03-18 09:10:50'),
(8, 'newone', 'new@gmail.com', 1, '12345', '2023-03-19 06:19:42'),
(9, 'jair', 'mahlihep@gmail.com ', 1, 'MAAHLO@7', '2023-03-22 19:26:07'),
(10, 'jair', 'mahlihep@gmail.com ', 1, 'MAAHLO@7', '2023-03-22 19:26:58'),
(13, 'Cesur ', 'cesurelvis@gmail.com', 1, 'elvis123', '2023-04-02 11:02:14'),
(14, 'newone', 'jackmutiso@gmail.com', 1, '12345', '2024-02-02 17:57:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_table`
--
ALTER TABLE `permission_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permission_table`
--
ALTER TABLE `permission_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 09:10 PM
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
-- Database: `bolt`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `email`) VALUES
(30, '2024-05-02 12:51:19', 'kokxiang417@gmail.com'),
(31, '2024-05-02 12:51:42', 'kokxiang417@gmail.com'),
(32, '2024-05-02 14:02:09', 'kokxiang417@gmail.com'),
(33, '2024-05-02 18:21:49', 'kokxiang417@gmail.com'),
(34, '2024-05-02 18:22:57', 'kokxiang417@gmail.com'),
(35, '2024-05-02 18:26:19', 'kokxiang417@gmail.com'),
(36, '2024-05-02 18:41:33', 'kokxiang417@gmail.com'),
(37, '2024-05-02 18:44:12', 'kokxiang417@gmail.com'),
(38, '2024-05-02 18:53:19', 'kokxiang417@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_code` varchar(60) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_code`, `quantity`, `price`) VALUES
(2, 30, 'BOLT1', 1, 229.00),
(3, 30, 'BOLT2', 1, 139.00),
(4, 31, 'BOLT1', 1, 229.00),
(5, 32, 'BOLT1', 2, 229.00),
(6, 32, 'BOLT2', 2, 139.00),
(7, 32, 'BOLT3', 2, 99.00),
(8, 33, 'BOLT1', 1, 229.00),
(9, 33, 'BOLT2', 1, 139.00),
(10, 34, 'BOLT1', 2, 229.00),
(11, 34, 'BOLT2', 3, 139.00),
(12, 35, 'BOLT1', 1, 229.00),
(13, 36, 'BOLT1', 1, 229.00),
(14, 37, 'BOLT1', 1, 229.00),
(15, 38, 'BOLT1', 1, 229.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` longtext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'BOLT1', 'Rad Grad Graduation Bouquet', 'Cheers to the coolest graduate with our Rad Grad bouquet! Bursting with vibrant energy and cheerful vibes, this bouquet is the ultimate symbol of your pride and excitement. Each flower in this stunning arrangement has been carefully selected to represent the graduate\'s bright future and the colourful journey. So go ahead, make their graduation day unforgettable with this exuberant token of your admiration and support!', 'product1.webp', 11, 229.00),
(2, 'BOLT2', 'Graduation Grins Graduation Set', 'The perfect way to spread smiles with our radiant Graduation Grins – a jubilant fusion of vibrant balloons and stunning flowers, meticulously crafted to commemorate this momentous achievement!', 'product2.webp', 14, 139.00),
(3, 'BOLT3', 'Shining Star Graduation Bouquet', 'Introducing a heartwarming ensemble that\'s as radiant as a sunny day and as comforting as a teddy bear hug. This delightful arrangement is tailor-made for celebrating the joyous milestone of a Shining Star/ an Academic Achiever. It\'s not just flowers and fluff—it\'s a celebration in full bloom, ready to make memories that\'ll brighten their day and fill their heart with warmth.', 'product3.webp', 13, 99.00),
(4, 'BOLT4', 'Sunbeam Scholar Graduation Bouquet', 'This bouquet symbolizes the bright and successful journey of a graduate, with the sunflowers representing the brightness and success achieved, while the arrangement as a whole reflects the celebratory nature of academic accomplishments. As they embark on new adventures, may the Sunbeam Scholar serve as a reminder of their incredible achievements and the bright future that awaits. Congratulations, graduate — you truly shine!', 'product4.webp', 21, 189.00),
(5, 'BOLT5', 'Big Cheers Graduation Set', 'A milestone this momentous deserves a Big Cheers - with the perfect graduation gift set. Bringing you our lovely Just For You rose bouquet, along with an adorable lil\' graduate teddy - this set is sure to make them smile twice as wide on their big day.', 'product5.webp', 19, 219.00),
(6, 'BOLT6', 'Rosy Felicitations Graduation Set', 'Wish the wonderful graduate a hearty congratulations, with a heartfelt gift for their big day! Our Rosy Felicitations Graduation Set brings you an adorable graduate teddy bear, along with our stunning La Vie En Rose bouquet - the perfect gift, for the first step into their rosy future.', 'product6.webp', 17, 119.00),
(7, 'BOLT7', 'Your Moment Graduation Set', 'A gift set to celebrate their truly special moment - on their graduation day. Featuring our lovely Lily Bouquet, along with an adorable graduate teddy - this gift set is the sweetest gift to make this special milestone extra memorable.', 'product7.webp', 12, 219.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(1, 'Steve', 'Jobs', 'Infinite Loop', 'California', 95014, 'sjobs@apple.com', 'steve', 'user'),
(2, 'Admin', 'Webmaster', 'Internet', 'Electricity', 101010, 'admin@admin.com', 'admin', 'admin'),
(5, 'kok', 'xiang', 'T96 TAMAN WIRA 27000 JERANTUT PAHANG', 'Jerantut', 27000, 'kokxiang417@gmail.com', '12345678', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_code`) REFERENCES `products` (`product_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

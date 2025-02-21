-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 08:24 AM
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
-- Database: `e_commerce`
--
CREATE DATABASE IF NOT EXISTS `e_commerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `e_commerce`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`) VALUES
(1, 1, 4),
(8, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `quantity` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`details_id`, `user_id`, `product_id`, `address`, `quantity`) VALUES
(1, 1, 3, 'Kwa Chid boi', '3'),
(3, 2, 3, 'Mabibo', '1'),
(5, 1, 12, 'New York', '1'),
(7, 2, 12, 'Kwa Chid boi', '3'),
(8, 2, 4, 'Kilombero', '1'),
(9, 2, 17, 'Kilombero', '3'),
(10, 2, 23, 'Kilombero', '3'),
(11, 2, 14, 'Mbagala', '2'),
(12, 1, 24, 'Kilombero', '3'),
(14, 7, 23, 'Kwa Chid boi', '2'),
(15, 7, 13, 'Kilombero', '1'),
(16, 7, 18, 'Melanio', '5'),
(17, 7, 11, '', ''),
(18, 7, 19, '', ''),
(19, 1, 17, 'New York', '2'),
(20, 1, 18, 'BANNOCKBURN', '6');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `time_pressed` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `order_status`, `time_pressed`) VALUES
(1, 1, 3, 1, '2025-01-17 19:30:03'),
(3, 2, 3, 0, '2025-01-17 19:30:03'),
(5, 1, 12, 0, '2025-01-17 19:30:03'),
(7, 2, 12, 0, '2025-01-17 20:40:30'),
(8, 2, 4, 0, '2025-01-17 20:40:38'),
(9, 2, 17, 0, '2025-01-17 20:40:52'),
(10, 2, 23, 0, '2025-01-17 20:41:05'),
(11, 2, 14, 0, '2025-01-17 20:41:18'),
(12, 1, 24, 0, '2025-01-18 18:24:11'),
(14, 7, 23, 0, '2025-01-22 19:06:51'),
(15, 7, 13, 0, '2025-01-22 19:07:01'),
(16, 7, 18, 0, '2025-01-22 19:07:10'),
(17, 7, 11, 0, '2025-01-22 19:07:28'),
(18, 7, 19, 0, '2025-01-22 19:07:34'),
(19, 1, 17, 0, '2025-01-24 18:01:22'),
(20, 1, 18, 0, '2025-01-27 18:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_description` varchar(80) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`) VALUES
(3, 'Computer Monitor', '4000000', 'This sreen having 50inches, Double glass, 8K resolution new', 'tv_screen.jpg', 1),
(4, 'Abooder Subwoofer ', '135000', 'Abooder Subwoofer AB605-3BT. With 1 year warrant', 'Abooder___subwoofer.jpg', 1),
(5, 'RichSound Speaker', '480000', 'Rechargeable speaker, Inch 15, 2 wireless microphone, and free stand.', 'Bluetooth _sound.jpg', 1),
(6, 'Dolphine 20 box Fan', '160000', 'Dolphine 20 box fan, 1 warrant', 'Box_fen.jpg', 1),
(7, 'Dolphine 26 box Fan', '420000', 'Dolphin 26, stand mistfan, With 2 years warrant ', 'Dolphen_fen.jpg', 1),
(8, 'Homebase Tower Fan 32inches', '185000', '39inches  185,000. 41inches 205,000. All with remote, With 1 year Warrant', 'Home_base_tower.jpg', 1),
(9, 'Home Cooker', '450000', 'HB-HB-501-NB _(50*50)cm With 1 year warrant', 'Home_cooker.jpg', 1),
(10, 'Implex Fridge ', '330000', 'Implex Fridge 90L  With 2 years warrant', 'Impex_fridge.jpg', 1),
(11, 'MR UK Microwave ', '195000', 'Mr Uk microwave 90L With 1 year warrant', 'Microwave.jpg', 1),
(12, 'MR UK Subwoofer', '285000', 'MR UK Subwoofer 200 watts, two speakers. With one year warrant\r\n', 'MrUK_subwoofer .jpg', 1),
(13, 'RAF Electric Kettle', '75000', 'Electric Kettle 2L with three years warrant, this is for you', 'Raf_electric_kettli.jpg', 1),
(14, 'RAF Oven', '270000', 'RAF Oven with 65L, and additional of two years warrant', 'Raf_oven.jpg', 1),
(15, 'Rochi Celling Fan', '100000', 'Fan 56\" with one year warrant', 'Rochi_fan.jpg', 1),
(16, 'SAMSUNG TV', '11750000', 'Samsung tv 4K resolution with one year warrant', 'Samsang_tv.jpg', 1),
(17, 'Dolphin Wall mist fan', '450000', 'fan that should be placed in the wall, with one year warrant', 'Short_dolphine_fen.jpg', 1),
(18, 'Silver Crest Blender', '95000', 'Silver Crest Blender, with one year warrant ', 'Silver_blender.jpg', 1),
(19, 'Smart Projector', '250000', 'Smart Projector, Latest and updated one, year warrant', 'Smart_projector.jpg', 1),
(20, 'Aiwa Soundbar', '370000', 'Aiwa soundbar SB 8320 450W, with two years warrant', 'Soundbar___.jpg', 1),
(21, 'Richsound RS-219', '450000', 'richsound rs-219, two wireless mikes with six month warrant', 'Speak_sound.jpg', 1),
(22, 'SPJ VACUUM CLEANER', '280000', 'spj vacuum cleaner 2000 watts, with six month warrant', 'Sph_cleaner.jpg', 1),
(23, 'SPJ FREEZER ', '450000', 'Freezer 100L. Consider slide glass, with two years warrant', 'Spj_frezer.jpg', 1),
(24, 'Subwoofer', '285000', 'SP-993 2.1.2 without forgetting 2 years warrant', 'Subwoffer__2.jpg', 1),
(25, 'Carlifornia 43\" 4K', '680000', 'Carlifonia tv supports 4K, 43 inches with 2 years warrant', 'Tv_califonia.jpg', 1),
(26, 'Westpoint Blender', '130000', 'westpoint blender 5L, with 2 years warrant', 'West_point_blender.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_type` int(3) NOT NULL DEFAULT 0,
  `status` int(3) NOT NULL DEFAULT 1,
  `time_joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `user_type`, `status`, `time_joined`) VALUES
(1, 'Brayan', 'brayanmlawa@outlook.com', '$2y$10$XHc4JL8Zs409EKXMzFh.7.uJqnV2n7W/RX.qA9AnpRQoS3qRdlr9C', '255655990092', 1, 1, '2025-01-17 19:33:18'),
(2, 'Elline', 'elline@outlook.com', '$2y$10$pDtuVzkC7ukyxbq0LhrfaOINOxjPxyT3vJCXWSLnQOXhLtZLaMyD.', '255654611651', 0, 1, '2025-01-17 19:33:18'),
(3, 'Robert', 'robertmasaua@icloud.com', '$2y$10$eHv/iG/7CmfjDF5c.lnCsO3G2VSc2ElhTOG223kxDfJh8o17rEm0K', '255654611651', 0, 1, '2025-01-17 19:33:18'),
(4, 'Fadhily', 'fadhily@outlook.com', '$2y$10$ZWE2OQN1j3kHrQwqKIGMGeikSdmKilRy.ZrT/gBl/HRlMbYGj2gPC', '255654611651', 0, 0, '2025-01-17 19:33:18'),
(5, 'Cabbie', 'cabie@gmail.com', '$2y$10$PNAVHuPXeUCTimdRzMY/2e/H3dwyN2o.VkyAbHJC2y09tgFEMzOMq', '255655990092', 2, 0, '2025-01-17 19:33:18'),
(6, 'Brian', 'brayan@gmail.com', '$2y$10$X2/F91hT2mEtazW6xvYSFOcHC3yfo87BXx4epGPOKHKFdrm2enQFq', '255715775436', 0, 1, '2025-01-17 19:33:18'),
(7, 'Nazakia', 'nazakia@gmail.com', '$2y$10$VR70zFHtFNGRzxoe20ucvuk9hOvF.TSHNlW0RSnPKtrJV1XzmNNou', '255654611651', 0, 1, '2025-01-22 15:19:49'),
(8, 'Avinus', 'avinusadabert@gmail.com', '$2y$10$BmgXLSN7jenEy81/SLbaDOPzpxlHtpsyOYbpofgnOmfVCVgNdis3C', '255658901747', 1, 1, '2025-01-28 18:02:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

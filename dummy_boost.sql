-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 10:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummy_boost`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'point to user id',
  `number` varchar(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL DEFAULT 'unpaid',
  `status` varchar(20) NOT NULL DEFAULT 'unpaid',
  `notify` varchar(256) NOT NULL DEFAULT 'read',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `number`, `type`, `payment`, `status`, `notify`, `created`, `modified`) VALUES
(9, 1, 'ORD202006012081', 'normal', 'paid', 'processing', 'read', '2020-06-01 12:53:27', '2020-06-02 16:16:22'),
(10, 1, 'ORD202006014f71', 'normal', 'paid', 'processing', 'read', '2020-06-01 17:36:02', '2020-06-02 16:17:28'),
(11, 1, 'ORD202006015f11', 'normal', 'unpaid', 'unpaid', 'read', '2020-06-01 17:37:39', '2020-06-02 16:16:28'),
(12, 1, 'ORD2020060140c1', 'normal', 'paid', 'processing', 'notify', '2020-06-01 17:38:30', '2020-06-01 17:38:30'),
(13, 10, 'ORD202006015d810', 'normal', 'paid', 'processing', 'notify', '2020-06-01 19:03:18', '2020-06-01 19:03:19'),
(14, 1, 'ORD202006010c11', 'normal', 'paid', 'processing', 'notify', '2020-06-01 21:37:22', '2020-06-01 21:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `sku` varchar(256) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `price` varchar(11) NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `href` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `name`, `quantity`, `sku`, `image`, `created`, `modified`, `price`, `unit`, `href`) VALUES
(1, 9, 'MICHELIN-ENERGY XM2+ 175/65 R14 82H TL ENERGY XM2+ MI', 1, '11500404-UNIT', 'https://myboostorder.com/wp-content/uploads/sites/446/2020/05/11500404-180x180.jpg', '2020-06-01 12:53:27', '2020-06-01 12:53:27', '230', 'UNIT', 'https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products/769925'),
(2, 10, 'SAMSUNG S10', 1, 'SAMSUNGS10-UNIT', 'https://myboostorder.com/wp-content/uploads/sites/446/2020/05/SAMSUNGS10-296x300.jpg', '2020-06-01 17:36:02', '2020-06-01 17:36:02', '3990', 'UNIT', 'https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products/770030'),
(3, 12, 'SAMSUNG S10', 1, 'SAMSUNGS10-UNIT', 'https://myboostorder.com/wp-content/uploads/sites/446/2020/05/SAMSUNGS10-150x150.jpg', '2020-06-01 17:38:30', '2020-06-01 17:38:30', '3990', 'UNIT', 'http://localhost/boostorder/market/product/770031'),
(4, 13, '24 Tri Colour Colour Pencils', 1, '115834-UNIT', 'https://myboostorder.com/wp-content/uploads/sites/446/2020/05/115834-162x180.png', '2020-06-01 19:03:19', '2020-06-01 19:03:19', '14.5', 'UNIT', 'http://localhost/boostorder/market/product/769216'),
(5, 14, 'SAMSUNG S10', 1, 'SAMSUNGS10-UNIT', 'https://myboostorder.com/wp-content/uploads/sites/446/2020/05/SAMSUNGS10-150x150.jpg', '2020-06-01 21:37:22', '2020-06-01 21:37:22', '3990', 'UNIT', 'http://localhost/boostorder/market/product/770031');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `secret` varchar(256) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `secret`, `created`, `modified`) VALUES
(1, 'ndf_724@hotmail.com', '$2y$10$qaUDjLT4QNzQ9XJkc52SKOeyrEql12Ybh49X.3.XpPU/dxM07.2ie', NULL, '2020-05-31 17:12:05', '2020-05-31 17:12:05'),
(2, 'ndf_723@hotmail.com', '$2y$10$b/QH7JiowHYXtALqbckZteiS4fixc0X24QRrcf/edSgcff81fwfIy', NULL, '2020-05-31 17:31:45', '2020-05-31 17:31:45'),
(3, 'ndf_725@hotmail.com', '$2y$10$oYZE6aYqebHG/txMcy/nEeWw3z.XS.cUMZeCfy4ADAxnsVv5o8GNq', NULL, '2020-05-31 18:09:40', '2020-05-31 18:09:40'),
(4, 'ndf_728@hotmail.com', '$2y$10$sDZxmJYajUH9RCIGelFu8uiel0Lrme10L/NpKW7gd3/EmqZG2CbaS', NULL, '2020-06-01 18:53:01', '2020-06-01 18:53:01'),
(5, 'ndf_729@hotmail.com', '$2y$10$1nFhwJrJQEwa1Rn.2UXpMu89PbL9laA5Akf9IZmUVGn97hixVQgw.', NULL, '2020-06-01 18:54:18', '2020-06-01 18:54:18'),
(6, 'ndf_800@hotmail.com', '$2y$10$0MeutOq1Grjs5kKq8QUhMOLmTxbEtaB5QxYsQZJHIN3kZ4If7oOo6', NULL, '2020-06-01 18:54:52', '2020-06-01 18:54:52'),
(7, 'ndf_780@hotmail.com', '$2y$10$zyedKcsL8L/hyBu2Vx6xcu5X6MCld/r5GK9vA4YUhnJXLicAYEVbW', NULL, '2020-06-01 18:55:56', '2020-06-01 18:55:56'),
(8, 'ndf_559@hotmail.com', '$2y$10$1PHXSF1qL6MpV7hTE0ibneejaVjwT3O.FDZtBPyRqq3lHQoc8.1r6', NULL, '2020-06-01 18:56:42', '2020-06-01 18:56:42'),
(9, 'ndf_889@hotmail.com', '$2y$10$8eymjv4YWPm1zkcLnX2gbu80HQPHZ3O9o5pwdDJYHUVQvCzmQmqEq', NULL, '2020-06-01 18:57:35', '2020-06-01 18:57:35'),
(10, 'ndf_7884@hotmail.com', '$2y$10$GLctkaQ80HoEw4zoleH4UO4Op/qjFpE5ynanP9pwbogCKk2qcDCTe', NULL, '2020-06-01 18:58:45', '2020-06-01 18:58:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

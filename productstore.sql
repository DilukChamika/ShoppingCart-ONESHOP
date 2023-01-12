-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 08:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(10) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `productCategory` varchar(20) NOT NULL,
  `productDiscription` varchar(200) NOT NULL,
  `productPrice` float NOT NULL,
  `productImgSrc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productCategory`, `productDiscription`, `productPrice`, `productImgSrc`) VALUES
(1, 'iPhone 14', 'Apple iPhone', 'A15 Bionic chip,\r\nLongest Battery Life Ever,\r\nVibrant Super Retina XDR display,\r\nAerospace – grade aluminum,\r\nEmergency SOS via Satellite,\r\nCrash Detection,\r\nE-Sim USA Version.', 310000, 'https://idealz.lk/wp-content/uploads/2022/09/iPhone-14-Blue.jpg'),
(2, 'Google Pixel 7', 'Android Smart Phone', '6.3″ fast and responsive display,\r\nIP68 water resistance,\r\n25% brighter outdoors, even in sunlight,\r\nGoogle Tensor G2,\r\nThe all-day battery that can last three days.\r\nThe highest rating for security.', 230000, 'https://idealz.lk/wp-content/uploads/2022/10/Google-Pixel-7-Green.jpg'),
(3, 'Google Pixel 7 Pro', 'Android Smart Phone', '10-120Hz Smooth Display with LTPO9,\r\n6.7″ QHD+ display10,\r\nThe pro-level triple rear camera system,\r\nIP68 water resistance,\r\n25% brighter outdoors, even in sunlight13 ,\r\n12 GB RAM for faster performan', 309000, 'https://idealz.lk/wp-content/uploads/2022/11/Google-Pixel-7-Pro-Green.jpg'),
(4, 'iPhone 14 Pro', 'Apple iPhone', 'A16 Bionic,\r\nSuper Retina XDR display,\r\nGroundbreaking safety features,\r\nInnovative 48MP camera,\r\nSurgical-grade stainless steel,\r\nAlways On-Display,\r\nAll-day battery life,\r\nEmergency SOS via satellit', 560000, 'https://idealz.lk/wp-content/uploads/2022/09/iPhone-14-Pro-Balck.jpg'),
(5, 'OnePlus 10R (5G)', 'Android Smart Phone', '150W SUPERVOOC,\r\nEndurance EDITION,\r\n50MP Triple camera system,\r\n120Hz Smart display,\r\nHyperBoost gaming engine.', 204000, 'https://idealz.lk/wp-content/uploads/2022/08/OnePlus-10R-Green.jpg'),
(11, 'Galaxy A23', 'Android Smart Phone', '6.6″ FHD+ Display for Immersive Viewing Experience,\r\nMulti Role Quad Rear Camera with 50MP OIS main camera,\r\n5,000mAh Long Lasting Battery for All Day Usage with 25W Fast Charging,\r\n6GB RAM + 128GB RO', 88000, 'https://idealz.lk/wp-content/uploads/2022/09/Galaxy-A23-White.jpg'),
(12, 'iPhone 14 Pro Max', 'Apple iPhone', 'A16 Bionic,\r\nSuper Retina XDR display,\r\nGroundbreaking safety features,\r\nInnovative 48MP camera,\r\nSurgical-grade stainless steel,\r\nAlways On-Display,\r\nAll-day battery life,\r\nEmergency SOS via satellit', 667000, 'https://idealz.lk/wp-content/uploads/2022/09/iPhone-14-Pro-Max-Purple.jpg'),
(15, 'Galaxy Z Fold4', 'Android Smart Phone', 'More with Multi View,\r\nNew Taskbar for PC-like multitasking,\r\nOur strongest Galaxy foldable ever,\r\nThe only IPX8 water-resistant foldable series,\r\nBrighten the night with Nightography,\r\nWith 12GB RAM ', 150000, 'https://idealz.lk/wp-content/uploads/2022/08/Galaxy-Z-Fold4-Green.jpg'),
(16, 'Google Pixel 6a', 'Android Smart Phone', 'Battery all day power,\r\nPhotos that match your vision,\r\nProtection & privacy simplified,\r\nAndroid experiences build for you,\r\nWith 6GB RAM + 128GB ROM', 136000, 'https://idealz.lk/wp-content/uploads/2022/08/Pixel-6a-Green.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usercart`
--

CREATE TABLE `usercart` (
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(10) NOT NULL,
  `productID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercart`
--

INSERT INTO `usercart` (`dateTime`, `userID`, `productID`) VALUES
('2023-01-12 19:43:17', 36, 2),
('2023-01-12 19:43:21', 36, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `avatarSrc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `role`, `avatarSrc`) VALUES
(32, 'admin', '1234', 'admin', 'ProPic-63b47c62d3eba6.52838396.png'),
(36, 'user', '1234', 'user', 'ProPic-63c061be6d1769.20672996.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `usercart`
--
ALTER TABLE `usercart`
  ADD UNIQUE KEY `dateTime` (`dateTime`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

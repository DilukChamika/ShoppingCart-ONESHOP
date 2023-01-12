-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 05:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productstore1`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productCategory`, `productDiscription`, `productPrice`, `productImgSrc`) VALUES
(1, 'SAMSUNG A13', 'Android Smart Phone', 'This is s smart phone. operating system is Android. 64mp rear Camera. 4k display.', 79500, 'https://celltronics.lk/wp-content/uploads/2022/05/71G-UqoDkL._AC_SL1500_.jpg'),
(2, 'SAMSUNG S22 Ultra', 'Android Smart Phone', 'this is a Samsung Android smart phone. 4k display. 64mp rear cam. 16mp front cam.', 130000, 'https://fdn2.gsmarena.com/vv/pics/samsung/samsung-galaxy-s22-ultra-5g-2.jpg'),
(3, 'APPLE iPhone 11', 'Apple iPhone', ' Apple new iPhone 11. Add more discription', 220000, 'https://appleasia.lk/wp-content/uploads/2021/07/iPhone-11-Price-in-Srilanka-Apple-Asia-Black-1.jpg'),
(4, 'SAMSUNG M02', 'Android Smart Phone', 'Samsung smart phone. full HD display. 32GB internal storage. 4GB RAM.', 48500, 'https://www.ideabeam.com/images/product/big/samsung-galaxy-m02.jpg'),
(5, 'Huawei Y7', 'Android Smart Phone', '  This is a android amart phone. Huawei product', 35800, 'https://fdn2.mobgsm.com/vv/pics/huawei/huawei-y7-2018-0.jpg'),
(11, 'Nokia 1200', 'keypad Phone', ' Nokia ORIGINAL keypad mobile phone', 8000, 'https://images.ctfassets.net/wcfotm6rrl7u/3JYDrQXHSTyZCvvilWHTE9/a6173da13b6ff0f014bc08d70884f214/nokia-5310-white-front_back-int.png'),
(12, 'Nokia C10', 'Android Smart Phone', 'Nokia Smart Phone', 30600, 'https://static-01.daraz.lk/p/45ebe3ef60a01b3978e1922f8d2aa018.jpg'),
(15, 'Samsung S3', 'Samsung Smart Phone', 'This is a android amart phone.', 129930, 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-m01.jpg'),
(16, 'Samsung S10', 'Samsung Smart Phone', 'This is a android amart phone. Huawei product', 129930, 'https://static-01.daraz.lk/p/45ebe3ef60a01b3978e1922f8d2aa018.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usercart`
--

CREATE TABLE `usercart` (
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(10) NOT NULL,
  `productID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercart`
--

INSERT INTO `usercart` (`dateTime`, `userID`, `productID`) VALUES
('2023-01-01 21:39:47', 8, 2),
('2023-01-01 21:55:11', 8, 7),
('2023-01-03 18:08:26', 13, 1),
('2023-01-03 18:08:33', 13, 11),
('2023-01-03 19:17:45', 31, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `role`, `avatarSrc`) VALUES
(17, 'admin2', '1234', 'admin', 'ProPic-63b441acdfdd83.55021132.webp'),
(26, 'user', '1234', 'user', 'ProPic-63b476bfdcdb30.96401977.jpg'),
(29, 'admin1', 'admin1', 'admin', 'ProPic-63b4797db47103.13706984.webp'),
(30, 'user4', 'user4', 'user', 'ProPic-63b47bb2ac8d22.92425967.jpg'),
(31, 'user1', 'user1', 'user', 'ProPic-63b47c3914aba1.97251092.png'),
(32, 'admin', '1234', 'admin', 'ProPic-63b47c62d3eba6.52838396.png'),
(33, 'user2', 'user2', 'user', 'ProPic-63b47c8355e0d8.70972110.jpg'),
(34, 'user3', 'user3', 'user', 'ProPic-63b47c9df39040.97791015.png');

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
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 11:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` char(35) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `email` char(35) DEFAULT NULL,
  `password` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `phone`, `email`, `password`) VALUES
('maryam mostafa', '12345678910', 'mariammostafa@gmail.com', '246810');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bidId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `placedBy` int(11) DEFAULT NULL,
  `placedOn` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bidId`, `date`, `placedBy`, `placedOn`, `price`, `status`) VALUES
(1, '2023-05-01', 1, 41, 200000, NULL),
(6, '2002-05-23', 3, 46, 5000, NULL),
(7, '2002-05-23', 3, 46, 10000, NULL),
(9, '2003-05-23', 4, 47, 400.5, NULL),
(12, '2006-05-23', 1, 46, 5000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `descreption` mediumtext DEFAULT NULL,
  `startingPrice` float DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `startTime` date DEFAULT NULL,
  `endTime` date DEFAULT NULL,
  `isApproved` tinyint(1) DEFAULT NULL,
  `listedBy` int(11) DEFAULT NULL,
  `winningBid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `name`, `descreption`, `startingPrice`, `photo`, `category`, `startTime`, `endTime`, `isApproved`, `listedBy`, `winningBid`) VALUES
(40, 'Sony ZV-E10', 'A decent entry-level budget camera', 789, 'https://m.media-amazon.com/images/I/71zS4qgZgHL._AC_SL1500_.jpg', 'technology', '0000-00-00', '0000-00-00', 1, 1, NULL),
(42, 'Canon M50', 'A decent entry-level budget camera', 400, 'https://m.media-amazon.com/images/I/71mTLn1iYML._AC_UY218_.jpg', 'technology', '0000-00-00', '0000-00-00', 1, 1, NULL),
(43, 'Acer Nitro 5', 'Acer Nitro 5 AN515-55 15.6 Gaming Laptop with 10TH GEN Intel:registered: i5-10300H, 256GB SSD, 8GB RAM, GTX 1650 4G, Windows 10 Home (Renewed)', 1200, 'https://m.media-amazon.com/images/I/71SXps7l4hL._AC_SL1500_.jpg', 'technology', '0000-00-00', '0000-00-00', 1, 1, NULL),
(44, 'The Scream', 'The sun was setting and the clouds turned as red as blood. I sensed a scream passing through nature. I felt as though I could actually hear the scream', 9999, 'https://m.media-amazon.com/images/I/61s5JQPuZjS._AC_UY327_FMwebp_QL65_.jpg', 'art', '0000-00-00', '0000-00-00', 1, 1, NULL),
(45, 'The Milk Maid', 'Vermeer\'s Milkmaid is a fragment of ordinary life made immortal on the canvas', 11, 'https://m.media-amazon.com/images/I/71buu-DmnnL._SY500_.jpg', 'art', '0000-00-00', '0000-00-00', 1, 1, NULL),
(46, 'art2', 'Wieco Art Framed Art Sunflower \"\nhttps://5b8bf4c3a2c157.lhr.life', 500, 'https://m.media-amazon.com/images/I/71Tj3WZKXdL.__AC_SX300_SY300_QL70_FMwebp_.jpg', 'art', '2023-04-25', '2023-06-01', 1, 1, NULL),
(47, 'African American Wall Art', 'African American Wall Art, Canvas Painting Black And Golden Woman Portrait Abstract Gold Earrings Necklace Poster Artwork Modern Home Decorations Framed Ready To Hang For Living Room Bedroom20x24inch', 200, 'https://m.media-amazon.com/images/I/71zmpkQQJXS._AC_SX679_.jpg', 'art', '2023-05-01', '2023-05-02', 1, 1, NULL),
(48, 'iphone11', 'sdfaasgd', 300, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxETExMREBEWEREREBERFxERERAXERYRFhIXFxYTFxYZHioiGRsoHhYWIzMkJysvMDAwGCE2OzgvOiovMC0BCwsLDw4', 'technology', '2023-05-04', '2023-05-06', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `reportedBy` int(11) DEFAULT NULL,
  `reportedItem` int(11) DEFAULT NULL,
  `descreption` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `reportedBy`, `reportedItem`, `descreption`) VALUES
(3, 1, 46, 'bad product'),
(5, 3, 46, 'Low level');

-- --------------------------------------------------------

--
-- Table structure for table `uuser`
--

CREATE TABLE `uuser` (
  `userId` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `tokenId` varchar(12) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` char(50) DEFAULT NULL,
  `isBanned` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uuser`
--

INSERT INTO `uuser` (`userId`, `name`, `phone`, `email`, `tokenId`, `password`, `birthday`, `address`, `isBanned`) VALUES
(1, 'john', '01271954004', 'john@gmail.com', '1', '123', '2000-08-13', 'cairo', 0),
(2, 'ahmed', '0123456789', 'ahmed@gmail.com', '2', '1234', '1998-02-04', 'cairo', 0),
(3, 'Nadia', '01221950720', 'nadia@gmail.com', '3', '123456789', '1971-09-07', 'Cairo', NULL),
(4, 'joe', '0123456789', 'joe@gmail.com', '4', '123', '2000-08-13', 'cairo', NULL),
(5, 'johnn', '123421536', 'jo@gmail.com', NULL, '123', '2000-02-01', 'sjdfhkasd', NULL),
(6, 'johnnn', '012345346', 'joh@gmail.com', NULL, '123', '2000-08-08', '31hsdf', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bidId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `winningBid` (`winningBid`),
  ADD KEY `listedBy` (`listedBy`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reportedBy` (`reportedBy`),
  ADD KEY `reportedItem` (`reportedItem`);

--
-- Indexes for table `uuser`
--
ALTER TABLE `uuser`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bidId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uuser`
--
ALTER TABLE `uuser`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`winningBid`) REFERENCES `bid` (`bidId`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`listedBy`) REFERENCES `uuser` (`userId`);

--
-- Constraints for table `poll`
--
ALTER TABLE `poll`
  ADD CONSTRAINT `poll_ibfk_1` FOREIGN KEY (`reportedBy`) REFERENCES `uuser` (`userId`),
  ADD CONSTRAINT `poll_ibfk_2` FOREIGN KEY (`reportedItem`) REFERENCES `item` (`itemId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 09:31 AM
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
-- Database: `item_accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction_result`
--

CREATE TABLE `auction_result` (
  `auction_id` int(11) NOT NULL,
  `itemNumber` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bidder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bids_registered`
--

CREATE TABLE `bids_registered` (
  `bidId` int(11) NOT NULL,
  `bidderName` varchar(255) NOT NULL,
  `itemNumber` int(11) NOT NULL,
  `bidValue` int(11) NOT NULL,
  `mobileNumber` varchar(20) NOT NULL,
  `bidDate` datetime NOT NULL,
  `bidder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bids_registered`
--

INSERT INTO `bids_registered` (`bidId`, `bidderName`, `itemNumber`, `bidValue`, `mobileNumber`, `bidDate`, `bidder_id`) VALUES
(108, 'Kent James', 95, 12222, '09887091823', '2022-12-06 14:15:44', 1),
(109, 'Kent James', 95, 25633, '09887091823', '2022-12-06 14:16:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_registered`
--

CREATE TABLE `items_registered` (
  `itemNumber` int(11) NOT NULL,
  `itemGroup` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemDesc` varchar(100) NOT NULL,
  `itemValue` int(11) NOT NULL,
  `itemImg` varchar(500) NOT NULL,
  `endDate` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_registered`
--

INSERT INTO `items_registered` (`itemNumber`, `itemGroup`, `itemName`, `itemDesc`, `itemValue`, `itemImg`, `endDate`, `user_id`) VALUES
(95, 2012, 'TWICE ALBUM', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque praesentium vitae sunt adipisci vol', 119999, 'images.jfif', '2022-12-07 00:00:00', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bidders`
--

CREATE TABLE `tbl_bidders` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `profile_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bidders`
--

INSERT INTO `tbl_bidders` (`user_id`, `username`, `password`, `first_name`, `last_name`, `contact_no`, `profile_img`) VALUES
(1, 'bidder123', 'bidder123', 'Kent James', 'Sumayang', '09887091823', 'flat,750x,075,f-pad,750x1000,f8f8f8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sellers`
--

CREATE TABLE `tbl_sellers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `profile_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sellers`
--

INSERT INTO `tbl_sellers` (`user_id`, `username`, `password`, `first_name`, `last_name`, `contact_no`, `profile_img`) VALUES
(33, 'seller456', 'seller456', 'Lovelace', 'Ada', '09887091823', '316941252_145979558190692_5395805091359483200_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction_result`
--
ALTER TABLE `auction_result`
  ADD PRIMARY KEY (`auction_id`),
  ADD KEY `itemNumber` (`itemNumber`);

--
-- Indexes for table `bids_registered`
--
ALTER TABLE `bids_registered`
  ADD PRIMARY KEY (`bidId`),
  ADD KEY `bids_registered_ibfk_1` (`itemNumber`);

--
-- Indexes for table `items_registered`
--
ALTER TABLE `items_registered`
  ADD PRIMARY KEY (`itemNumber`),
  ADD KEY `items_registered_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_bidders`
--
ALTER TABLE `tbl_bidders`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_sellers`
--
ALTER TABLE `tbl_sellers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction_result`
--
ALTER TABLE `auction_result`
  MODIFY `auction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `bids_registered`
--
ALTER TABLE `bids_registered`
  MODIFY `bidId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `items_registered`
--
ALTER TABLE `items_registered`
  MODIFY `itemNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tbl_bidders`
--
ALTER TABLE `tbl_bidders`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sellers`
--
ALTER TABLE `tbl_sellers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction_result`
--
ALTER TABLE `auction_result`
  ADD CONSTRAINT `auction_result_ibfk_1` FOREIGN KEY (`itemNumber`) REFERENCES `items_registered` (`itemNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bids_registered`
--
ALTER TABLE `bids_registered`
  ADD CONSTRAINT `bids_registered_ibfk_1` FOREIGN KEY (`itemNumber`) REFERENCES `items_registered` (`itemNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items_registered`
--
ALTER TABLE `items_registered`
  ADD CONSTRAINT `items_registered_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_sellers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

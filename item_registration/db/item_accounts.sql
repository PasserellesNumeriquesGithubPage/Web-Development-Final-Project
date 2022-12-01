-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 10:19 AM
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
-- Table structure for table `bids_registered`
--

CREATE TABLE `bids_registered` (
  `bidId` int(11) NOT NULL,
  `bidderName` varchar(255) NOT NULL,
  `itemNumber` int(11) NOT NULL,
  `bidValue` int(11) NOT NULL,
  `mobileNumber` varchar(20) NOT NULL,
  `bidDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `endDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_registered`
--

INSERT INTO `items_registered` (`itemNumber`, `itemGroup`, `itemName`, `itemDesc`, `itemValue`, `itemImg`, `endDate`) VALUES
(47, 7, 'Yokai Kulay Pink', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque praesentium vitae sunt adipisci vol', 900, '213881732_1229566830836870_8854702255430523458_n.jpg', '2022-12-01 00:00:00'),
(48, 7, 'Mansion Esmeralda', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque praesentium vitae sunt adipisci vol', 2147483647, 'SMS.jpg', '2022-12-03 00:00:00'),
(49, 7, 'Kim Ji-Hyo', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque praesentium vitae sunt adipisci vol', 2147483647, '316941252_145979558190692_5395805091359483200_n.jpg', '2023-01-07 00:00:00'),
(50, 143, 'Nana Komatsu', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque praesentium vitae sunt adipisci vol', 2147483647, 'nanakoma.jfif', '2022-12-02 00:00:00'),
(51, 7, 'After Dark', 'labyutangenamo', 2147483647, 'jihyo.png', '2022-12-02 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids_registered`
--
ALTER TABLE `bids_registered`
  ADD PRIMARY KEY (`bidId`),
  ADD KEY `itemNumber` (`itemNumber`);

--
-- Indexes for table `items_registered`
--
ALTER TABLE `items_registered`
  ADD PRIMARY KEY (`itemNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids_registered`
--
ALTER TABLE `bids_registered`
  MODIFY `bidId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `items_registered`
--
ALTER TABLE `items_registered`
  MODIFY `itemNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids_registered`
--
ALTER TABLE `bids_registered`
  ADD CONSTRAINT `bids_registered_ibfk_1` FOREIGN KEY (`itemNumber`) REFERENCES `items_registered` (`itemNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

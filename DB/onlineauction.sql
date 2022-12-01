-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 07:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineauction`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `accountId` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`accountId`, `email`, `password`) VALUES
(1, 'chemuelgodes@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'kent@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'auctioneer1@gmail.com', 'df96220fa161767c5cbb95567855c86b'),
(4, 'auctioneer2@gmail.com', 'df96220fa161767c5cbb95567855c86b');

-- --------------------------------------------------------

--
-- Table structure for table `tblmembership`
--

CREATE TABLE `tblmembership` (
  `membershipId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `typeOfMembership` varchar(255) NOT NULL,
  `dateOfMembershipEnds` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmembership`
--

INSERT INTO `tblmembership` (`membershipId`, `accountId`, `typeOfMembership`, `dateOfMembershipEnds`) VALUES
(1, 1, 'initial membership', '2022-10-05'),
(2, 4, 'initial membership', '2023-01-27'),
(3, 2, 'initial membership', '2023-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `registered_at` date NOT NULL DEFAULT current_timestamp(),
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `accountId`, `first_name`, `last_name`, `age`, `contact_no`, `registered_at`, `isAdmin`, `user_address`) VALUES
(1, 1, 'chemuel', 'castillo', 22, '9810283472', '2022-04-10', 1, 'Samjung'),
(2, 2, 'Kent', 'Sumayang', 21, '980098322', '2022-04-10', 1, 'Talamban'),
(3, 3, 'auction', 'one', 22, '9123456789', '2022-12-01', 0, 'Cebu city'),
(4, 4, 'auction', 'two', 22, '9987654321', '2022-12-01', 0, 'Cebu city');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `tblmembership`
--
ALTER TABLE `tblmembership`
  ADD PRIMARY KEY (`membershipId`),
  ADD KEY `accountId` (`accountId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `accountId` (`accountId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblmembership`
--
ALTER TABLE `tblmembership`
  MODIFY `membershipId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblmembership`
--
ALTER TABLE `tblmembership`
  ADD CONSTRAINT `tblmembership_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `tblaccount` (`accountId`),
  ADD CONSTRAINT `tblmembership_ibfk_2` FOREIGN KEY (`accountId`) REFERENCES `tblusers` (`accountId`);

--
-- Constraints for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD CONSTRAINT `tblusers_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `tblaccount` (`accountId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

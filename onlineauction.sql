-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 08:26 AM
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
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`accountId`, `username`, `email`, `password`, `age`) VALUES
(1, 'Chemuel', 'chemuelgodes@gmail.com', '123456789123', 22),
(2, 'Chemuel', 'chemuel.castillo@student.passerellesnumeriques.og', 'chemuelcastillo', 22),
(3, 'Chemuel45', 'leenunuyaa@gmail.com', '123456123456', 29),
(4, 'Chemuel', 'chemuelgodes45@gmail.com', '123456789147', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tblmembership`
--

CREATE TABLE `tblmembership` (
  `membershipId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `typeOfMembership` varchar(255) NOT NULL,
  `dateOfMembership` date NOT NULL,
  `dateOfMembershipEnds` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmembership`
--

INSERT INTO `tblmembership` (`membershipId`, `accountId`, `typeOfMembership`, `dateOfMembership`, `dateOfMembershipEnds`) VALUES
(1, 1, 'initial membership', '2023-02-11', '2023-12-13'),
(2, 4, 'Initial membership', '2021-12-08', '2021-12-31');

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
  ADD PRIMARY KEY (`membershipId`);

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
  MODIFY `membershipId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2016 at 05:37 PM
-- Server version: 5.6.27-0ubuntu1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BookStore`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `ProductDescription` varchar(255) NOT NULL,
  `State` enum('Sale','Repair') NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Invoice`
--

CREATE TABLE IF NOT EXISTS `Invoice` (
  `invoiceID` int(11) NOT NULL,
  `invoiceUsername` varchar(64) NOT NULL,
  `totalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `InvoiceProductList`
--

CREATE TABLE IF NOT EXISTS `InvoiceProductList` (
  `productListID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Repair`
--

CREATE TABLE IF NOT EXISTS `Repair` (
  `ID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `Status` enum('Working','Complete') NOT NULL DEFAULT 'Working'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BookIndex` (`Title`,`ProductDescription`,`State`);

--
-- Indexes for table `Invoice`
--
ALTER TABLE `Invoice`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `InvoiceProductList`
--
ALTER TABLE `InvoiceProductList`
  ADD PRIMARY KEY (`productListID`);

--
-- Indexes for table `Repair`
--
ALTER TABLE `Repair`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Book`
--
ALTER TABLE `Book`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Invoice`
--
ALTER TABLE `Invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `InvoiceProductList`
--
ALTER TABLE `InvoiceProductList`
  MODIFY `productListID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Repair`
--
ALTER TABLE `Repair`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Repair`
--
ALTER TABLE `Repair`
  ADD CONSTRAINT `bookStatus` FOREIGN KEY (`ID`) REFERENCES `Book` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

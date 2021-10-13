-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 01:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsfbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_Id` int(10) NOT NULL,
  `C_Name` varchar(255) NOT NULL,
  `C_Email` varchar(255) NOT NULL,
  `C_Balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_Id`, `C_Name`, `C_Email`, `C_Balance`) VALUES
(1, 'Ebenezer', 'eben@gmail.com', 700),
(2, 'Hloni', 'Hloni@gmail.com', 492),
(3, 'Vision', 'vision@gmail.com', 1500),
(4, 'Hope', 'hope@gmail.com', 870),
(5, 'Price', 'Prince@gmail.com', 400),
(6, 'Vumu', 'vumu@gmail.com', 600),
(7, 'Tiyisela', 'tiyisela@gmail.com', 2000),
(8, 'Ntsako', 'ntsako@gmail.com', 510),
(9, 'chris', 'chris@gmail.com', 451),
(10, 'xalati', 'xalati@gmail.com', 3900);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `T_id` int(10) NOT NULL,
  `T_sender` varchar(255) NOT NULL,
  `T_receiver` varchar(255) NOT NULL,
  `T_amount` float NOT NULL,
  `T_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`T_id`, `T_sender`, `T_receiver`, `T_amount`, `T_date`) VALUES
(1, 'Ebenezer', 'Hloni', 30, '2021-10-06 18:42:12'),
(7, 'Hloni', 'Ebenezer', 200, '2012-10-21 03:53:59'),
(8, 'Vumu', 'Hloni', 20, '2012-10-21 03:57:33'),
(9, 'Hloni', 'Price', 30, '2012-10-21 04:07:48'),
(10, 'Hloni', 'Vision', 30, '2012-10-21 04:08:21'),
(11, 'Hloni', 'Vision', 20, '2012-10-21 04:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `T_ID` int(10) NOT NULL,
  `T_Amount` float NOT NULL,
  `T_Date` datetime NOT NULL,
  `C_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_Id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`T_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `T_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `T_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

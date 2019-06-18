-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Jun 18, 2019 at 04:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credit management system`
--

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transfer_id` int(10) NOT NULL,
  `transfer_credit` varchar(50) NOT NULL,
  `to_user` varchar(200) NOT NULL,
  `from_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transfer_id`, `transfer_credit`, `to_user`, `from_user`) VALUES
(1, '6000', 'Payal Bhadra', 'Kumar Piyush'),
(2, '6000', 'Payal Bhadra', 'Kumar Piyush'),
(3, '2500', 'Timi Salu', 'Sanjay Kumar'),
(4, '2000', 'Payal Bhadra', 'Kumar Piyush'),
(5, '2000', 'Payal Bhadra', 'Kumar Piyush'),
(6, '1000', 'Payal Bhadra', 'Nisha Agarwal'),
(7, '250', 'Payal Bhadra', 'Nisha Agarwal'),
(8, '750', 'Payal Bhadra', 'Timi Salu'),
(9, '250', 'Payal Bhadra', 'Sanjay Kumar'),
(10, '750', 'Payal Bhadra', 'Kumar Piyush'),
(11, '750', 'Payal Bhadra', 'Nisha Agarwal'),
(12, '250', 'Payal Bhadra', 'Kumar Piyush'),
(13, '750', 'Nisha Agarwal', 'Sanjay Kumar'),
(14, '250', 'Nisha Agarwal', 'Sanjay Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `current_credit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `current_credit`) VALUES
(1, 'Payal Bhadra', 'payal@gmail.com', '2000'),
(2, 'Kumar Piyush', 'piyush@gmail.com', '2000'),
(3, 'Sanjay Kumar', 'sanjay@gmail.com', '1750'),
(4, 'Nisha Agarwal', 'nisha@gmail.com', '1000'),
(5, 'Timi Salu', 'timisalu@gmail.com', '2250');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transfer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

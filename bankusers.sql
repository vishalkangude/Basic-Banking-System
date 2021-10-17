-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 07:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `mail_id` varchar(20) NOT NULL,
  `balance` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `firstname`, `lastname`, `mail_id`, `balance`) VALUES
(1, 'Ananta', 'Raut', 'ananta@mail.com', '-9950'),
(2, 'Vandana', 'Nimbalkar-Raut', 'vandana@mail.com', '740'),
(3, 'Anna', 'Raut', 'annaraut@mail.com', '100900'),
(4, 'Ranjana', 'Raut', 'ranjana@mail.com', '231502'),
(5, 'Sandeep ', 'Raut', 'rautsandeepv99@gmail', '99800'),
(6, 'Arvind', 'Nimbalkar', 'arvind@gmail.com', '60500'),
(7, 'Arya', 'Nimbalkar', 'aaryanimbalkar@gmail', '107500'),
(8, 'Vaibhav', 'Vaidya', 'vaibhav@gmail.com', '50000'),
(9, 'Uday', 'Nimbalkar', 'uday@gmail.com', '40000'),
(10, 'Peednas', 'Taur', 'peednastaur@gmail.co', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(30) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `amount` int(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `sender`, `receiver`, `amount`, `date`) VALUES
(1, 'Rohitsharma', 'MahendrasinghDhoni', 10000, '2021-05-17'),
(9, 'AnantaRaut', 'VandanaNimbalkar-Raut', 10000, '2021-06-19'),
(10, 'VandanaNimbalkar-Raut', 'Sandeep Raut', 300, '2021-06-19'),
(11, 'Sandeep Raut', 'ArvindNimbalkar', 500, '2021-06-19'),
(12, 'AryaNimbalkar', 'RanjanaRaut', 1500, '2021-06-19'),
(13, 'VandanaNimbalkar-Raut', 'AryaNimbalkar', 9000, '2021-06-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

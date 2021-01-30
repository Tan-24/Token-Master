-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 10:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance_details`
--

CREATE TABLE `balance_details` (
  `bid` int(11) NOT NULL,
  `balance` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance_details`
--

INSERT INTO `balance_details` (`bid`, `balance`, `id`) VALUES
(1, 500, 6),
(2, 400, 2),
(3, 50, 7),
(4, 300, 17);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `username` varchar(200) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phoneno` int(12) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `date`, `time`, `username`, `fname`, `lname`, `address`, `phoneno`, `password`) VALUES
(1, '2021-01-28', '16:05:47', 'admin', '', '', '', 0, 'user'),
(2, '2021-01-28', '16:05:47', 'user', '', '', '', 0, 'user'),
(3, '2021-01-28', '16:05:47', 'admin', '', '', '', 0, 'hii'),
(4, '2021-01-28', '16:05:47', '', '', '', '', 0, ''),
(5, '2021-01-28', '16:05:47', '', '', '', '', 0, ''),
(6, '2021-01-28', '16:05:47', 'harshalaardekar101@gmail.com', 'Rohini', 'Ardekar', 'Bhurke chwal', 2147483647, '1234'),
(7, '2021-01-28', '16:05:47', 'harshalaardekar@gmail.com', 'Rohini', 'Ardekar', 'Bhurke chwal', 2147483647, 'hii'),
(12, '2021-01-30', '12:40:15', 'user1@gmail.com', 'user1', 'user1', 'user1', 2147483647, '1234'),
(16, '2021-01-30', '13:06:11', 'user3@gmail.com', 'user3', 'user3', 'user3', 2147483647, '1234'),
(17, '2021-01-30', '13:09:52', 'user2@gmail.com', 'user2', 'user2', 'user2', 2147483647, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `tid` int(11) NOT NULL,
  `token_no` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `winning_status` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`tid`, `token_no`, `payment`, `id`, `winning_status`, `date`, `time`) VALUES
(1, 3, 50, 1, 1, '0000-00-00', '00:00:00'),
(2, 4, 50, 1, 0, '2021-01-28', '17:27:20'),
(3, 5, 50, 2, 0, '2021-01-28', '00:00:00'),
(4, 1, 50, 7, 0, '2021-01-30', '01:37:13'),
(16, 1, 50, 6, 0, '2021-01-30', '01:51:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance_details`
--
ALTER TABLE `balance_details`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `game` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance_details`
--
ALTER TABLE `balance_details`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balance_details`
--
ALTER TABLE `balance_details`
  ADD CONSTRAINT `balance_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login_details` (`id`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `game` FOREIGN KEY (`id`) REFERENCES `login_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

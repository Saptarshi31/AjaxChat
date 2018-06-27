-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2018 at 11:53 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `message_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `name` varchar(244) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`message_id`, `sender_id`, `name`, `message`, `time`) VALUES
(10, 52, 'saptarshi', 'Hello', '2018-01-20 10:37:40'),
(11, 52, 'saptarshi', 'This is the Group Chat page.', '2018-01-20 10:37:55'),
(12, 52, 'saptarshi', 'To Enter a Private chat. Select a FriendsName', '2018-01-20 10:38:19'),
(13, 52, 'saptarshi', 'To logout .Press Logout', '2018-01-20 10:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `private`
--

CREATE TABLE `private` (
  `message_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `private`
--

INSERT INTO `private` (`message_id`, `sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `message`, `time`) VALUES
(5, 53, 'chuchi', 52, 'saptarshi', 'Click on the welcome message to return to main Page', '2018-01-20 07:31:33.000000'),
(6, 54, 'Akash Kumar', 53, 'chuchi', 'Hello ', '2018-01-20 10:02:24.000000'),
(7, 54, 'Akash Kumar', 52, 'saptarshi', 'Hello', '2018-01-20 10:02:34.000000'),
(8, 54, 'Akash Kumar', 52, 'saptarshi', 'How are you', '2018-01-20 10:02:40.000000'),
(9, 52, 'saptarshi', 55, 'Rahul Das', 'Hey', '2018-01-20 10:08:24.000000'),
(10, 52, 'saptarshi', 55, 'Rahul Das', 'Ok. It is working now', '2018-01-20 10:19:11.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `online` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `user_name`, `email`, `password`, `online`) VALUES
(52, 'saptarshi sengupta', 'sap', 'sap@gmail.com', '1234', 0),
(53, 'chuchi', 'chuchi', 'chuchi@gmail.com', '1234', 0),
(54, 'Akash Kumar', 'akash', 'akash@gmail.com', '1234', 0),
(55, 'Rahul Das', 'rahul123', 'rahul123@gmail.com', 'rahul', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `private`
--
ALTER TABLE `private`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `private`
--
ALTER TABLE `private`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

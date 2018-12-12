-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2018 at 10:36 PM
-- Server version: 10.1.37-MariaDB-1
-- PHP Version: 7.2.9-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baraa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `password`) VALUES
(1, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `country_id` text NOT NULL,
  `city_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `city_name`) VALUES
(1, '1', 'Nablus'),
(2, '2', 'Irbid'),
(3, '2', 'Amman'),
(4, '1', 'Ramallah'),
(5, '1', 'Jenin'),
(6, '2', 'Zarqa'),
(7, '3', 'Beirut');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` text NOT NULL,
  `country_code` text NOT NULL,
  `country_phone_code` text NOT NULL,
  `country_currency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_code`, `country_phone_code`, `country_currency`) VALUES
(1, 'Palestine', 'PS', '+970', 'NIS'),
(2, 'Jordan', 'JO', '+962', 'JD'),
(3, 'Lebanon', 'LB', '+961', 'LBP');

-- --------------------------------------------------------

--
-- Table structure for table `interested`
--

CREATE TABLE `interested` (
  `interest_id` int(11) NOT NULL,
  `interested_user_id` text NOT NULL,
  `property_owner_id` int(1) NOT NULL,
  `property_id` text NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  `seen1` int(1) NOT NULL DEFAULT '0',
  `accepted` int(1) NOT NULL DEFAULT '0',
  `canceled` int(1) NOT NULL DEFAULT '0',
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interested`
--

INSERT INTO `interested` (`interest_id`, `interested_user_id`, `property_owner_id`, `property_id`, `seen`, `seen1`, `accepted`, `canceled`, `Date`) VALUES
(1, '5', 1, '2', 1, 1, 1, 1, '2018-11-22 20:19:32'),
(2, '5', 1, '2', 1, 1, 0, 1, '2018-11-22 20:20:32'),
(3, '5', 1, '2', 1, 1, 0, 1, '2018-11-22 20:30:32'),
(4, '5', 1, '2', 1, 1, 0, 1, '2018-11-23 20:19:32'),
(5, '5', 1, '2', 1, 1, 0, 1, '2018-11-24 20:19:32'),
(6, '5', 1, '2', 1, 1, 0, 1, '2018-11-25 20:20:32'),
(7, '5', 1, '2', 1, 1, 0, 1, '2018-11-26 20:30:32'),
(8, '5', 1, '2', 1, 1, 0, 1, '2018-11-27 20:19:32'),
(9, '5', 1, '2', 1, 1, 0, 1, '2018-11-22 20:19:32'),
(10, '5', 1, '2', 1, 1, 0, 1, '2018-11-29 20:19:32'),
(11, '5', 1, '2', 1, 1, 0, 1, '2018-11-30 20:19:32'),
(12, '5', 1, '2', 1, 1, 2, 1, '2018-11-30 21:19:32'),
(13, '5', 1, '2', 1, 1, 0, 1, '2018-11-22 22:19:32'),
(14, '5', 3, '2', 0, 0, 0, 1, '2018-11-24 23:55:15'),
(15, '5', 3, '2', 0, 0, 0, 1, '2018-11-24 23:55:18'),
(16, '5', 3, '2', 0, 0, 0, 1, '2018-11-24 23:55:42'),
(17, '5', 3, '2', 0, 0, 0, 0, '2018-11-24 23:55:57'),
(18, '5', 1, '3', 0, 1, 0, 1, '2018-11-24 23:58:21'),
(19, '5', 1, '3', 0, 1, 0, 1, '2018-11-25 00:01:05'),
(20, '5', 1, '3', 1, 1, 0, 1, '2018-11-25 00:02:29'),
(21, '5', 1, '3', 1, 0, 1, 1, '2018-11-25 00:06:58'),
(22, '5', 1, '3', 1, 0, 0, 1, '2018-11-25 00:15:40'),
(23, '5', 1, '3', 1, 0, 0, 1, '2018-11-25 00:16:00'),
(24, '5', 1, '3', 1, 1, 2, 0, '2018-11-25 00:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` text NOT NULL,
  `receiver_id` text NOT NULL,
  `message_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `message_date`, `message`) VALUES
(2, '1', '2', '2018-11-24 23:48:08', 'Thanks for your interest in my property, How can I help You :)'),
(3, '1', '4', '2018-11-24 23:48:08', 'Thanks for your interest in my property, How can I help You :)'),
(4, '1', '5', '2018-11-24 23:48:09', 'Thanks for your interest in my property, How can I help You :)'),
(5, '1', '6', '2018-11-24 23:48:09', 'Thanks for your interest in my property, How can I help You :)'),
(8, '1', '12', '2018-11-24 23:48:09', 'Thanks for your interest in my property, How can I help You :)'),
(9, '1', '6', '2018-11-24 23:49:09', 'jnlk'),
(10, '1', '12', '2018-11-24 23:50:09', 'Thanks  interest in my property, How can I help You :)'),
(11, '2', '1', '2018-12-07 23:50:09', 'ndslkfds'),
(12, '1', '2', '2018-12-07 23:50:09', 'ndslkfdsnklm'),
(13, '1', '12', '2018-12-08 02:00:00', 'ndslkfdsnklm'),
(14, '1', '2', '2018-12-08 23:50:09', 'ndslkfdsnklm'),
(15, '5', '1', '2018-12-11 23:48:09', 'Thanks for'),
(16, '1', '5', '2018-11-24 23:48:09', 'welcome'),
(17, '5', '1', '2018-12-11 13:11:46', 'gsdgds'),
(18, '1', '5', '2018-12-11 13:25:19', 'hello'),
(19, '1', '5', '2018-12-11 13:26:28', 'hello'),
(20, '1', '5', '2018-12-11 13:26:28', 'hello'),
(21, '1', '5', '2018-12-11 13:26:29', 'hello'),
(22, '1', '5', '2018-12-11 13:26:56', 'hi'),
(23, '1', '6', '2018-12-11 13:27:03', 'hello'),
(24, '1', '5', '2018-12-11 13:28:21', 'yes'),
(25, '5', '1', '2018-12-11 13:29:49', 'hi'),
(26, '1', '5', '2018-12-11 13:31:15', 'hello'),
(27, '5', '1', '2018-12-11 13:31:24', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_request`
--

CREATE TABLE `password_reset_request` (
  `request_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `token` text NOT NULL,
  `creation_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `handled` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_name` text NOT NULL,
  `owner_id` text NOT NULL,
  `area` double NOT NULL,
  `city_id` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `type` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `owner_id`, `area`, `city_id`, `description`, `price`, `type`, `creation_date`, `deleted`) VALUES
(1, 'abaraab', '1', 55, '1', '55sdffbaraadskmsd55          \n                                ', 55, 1, '2018-11-17 20:01:13', 1),
(2, 'mmmmmmmmmmmmmmmmmmmbaraammm', '3', 130, '2', '55sdffbaraadskmsd55          \n                                ', 190000, 2, '2018-11-20 17:54:04', 0),
(3, 'jsnfmksd', '1', 44, '1', 'kmljjhjbhgvfhghj', 44, 1, '2018-11-20 22:59:57', 0),
(4, 'ssdggdsgs', '1', 555, '4', '&lt;scrtip&gt;(\'1\');&lt;/script&gt;', 5550, 2, '2018-11-21 18:46:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `type_id` int(11) NOT NULL,
  `type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`type_id`, `type_name`) VALUES
(1, 'House'),
(2, 'Land');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone1` text NOT NULL,
  `phone2` text NOT NULL,
  `password` text NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `uname`, `email`, `phone1`, `phone2`, `password`, `country_id`, `city_id`, `type`, `active`, `deleted`) VALUES
(1, 'baraa', 'baraa', 'baraa', 'baraa@hotmail.com', '1234567899', '1234567899', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 0, 1, 0),
(2, 'baraaa', 'baraaa', 'baraaa', 'baraaa@baraaa.com', '1234567890', '1234567890', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 1, 0, 1),
(3, 'barakat', 'abweh', 'babweh', 'baraaabushamil@gmail.com', '1234567890', '1234567890', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 0, 0, 1),
(4, 'vgfdgthjkhgy', 'hvgbjhgyuhjhugy', 'hhygujihuygtui', 'hgyfhujugyh@fgthhfhjjhb.com', '4444444444', '4444444444', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 1, 0, 1),
(5, 'aaaa', 'aaaa', 'aaaa', 'aaaa@aaaa.com', '0000000000', '0000000000', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 1, 0, 0),
(6, 'abas', 'Hakawati', 'Samer fadi', 'anasahakawati@gmail.com', '0599507051', '0599507051', '4f6c824a783b44169b6dfbecb5d6a4c524efe81b', 1, 1, 1, 0, 0),
(7, 'barakat', 'abweh', 'babwehh', 'barakat@hotmail.com', '1234567890', '1234567890', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 0, 0, 0),
(8, 'baraass', 'baraass', 'baraass', 'baraass@hotmail.edu', '1234567890', '1234567890', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 0, 0, 0),
(9, 'baba', 'baba', 'baba', 'baba@najah.edu', '1234567890', '1234567890', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 0, 0, 0),
(10, 'bbbb', 'bbbb', 'bbbb', 'bbbb@bbbb.com', '1234567890', '', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 0, 0, 0),
(12, 'vvvv', 'vvvv', 'vvvv', 'vvvv@vvvv.com', '1234567890', '', 'b102ce1d5eebac2b6d74bda8c87c47a050c80491', 1, 1, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `interested`
--
ALTER TABLE `interested`
  ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `interested`
--
ALTER TABLE `interested`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

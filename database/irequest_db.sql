-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 10:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irequest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `admin_username` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`admin_username`, `admin_password`) VALUES
('iRequest', 'iRequest_12345');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_tb`
--

CREATE TABLE `bookings_tb` (
  `booking_id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `inventory_item_id` int(10) NOT NULL,
  `date_requested` datetime NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_tb`
--

CREATE TABLE `department_tb` (
  `department_id` int(10) NOT NULL,
  `department_name` varchar(500) NOT NULL,
  `department_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_category_tb`
--

CREATE TABLE `inventory_category_tb` (
  `inventory_cat_id` int(10) NOT NULL,
  `category` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_category_tb`
--

INSERT INTO `inventory_category_tb` (`inventory_cat_id`, `category`) VALUES
(1, 'Facilities'),
(2, 'Automobiles'),
(3, 'Services');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items_tb`
--

CREATE TABLE `inventory_items_tb` (
  `inventory_item_id` int(10) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_description` varchar(1000) NOT NULL,
  `inventory_cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `middle_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `name_extension` varchar(300) NOT NULL,
  `mobile_number` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `department_id` int(10) NOT NULL,
  `role_type` varchar(300) DEFAULT NULL,
  `user_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `faculty_member_id` (`users_id`),
  ADD KEY `inventory_item_id` (`inventory_item_id`);

--
-- Indexes for table `department_tb`
--
ALTER TABLE `department_tb`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `inventory_category_tb`
--
ALTER TABLE `inventory_category_tb`
  ADD PRIMARY KEY (`inventory_cat_id`);

--
-- Indexes for table `inventory_items_tb`
--
ALTER TABLE `inventory_items_tb`
  ADD PRIMARY KEY (`inventory_item_id`),
  ADD KEY `inventory_cat_id` (`inventory_cat_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_tb`
--
ALTER TABLE `department_tb`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_category_tb`
--
ALTER TABLE `inventory_category_tb`
  MODIFY `inventory_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory_items_tb`
--
ALTER TABLE `inventory_items_tb`
  MODIFY `inventory_item_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD CONSTRAINT `bookings_tb_ibfk_1` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory_items_tb` (`inventory_item_id`);

--
-- Constraints for table `inventory_items_tb`
--
ALTER TABLE `inventory_items_tb`
  ADD CONSTRAINT `inventory_items_tb_ibfk_1` FOREIGN KEY (`inventory_cat_id`) REFERENCES `inventory_category_tb` (`inventory_cat_id`);

--
-- Constraints for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD CONSTRAINT `users_tb_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department_tb` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

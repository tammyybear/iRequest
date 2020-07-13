-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2020 at 01:57 AM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql12354454`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `admin_id` int(1) NOT NULL,
  `admin_username` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`admin_id`, `admin_username`, `admin_password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_tb`
--

CREATE TABLE `bookings_tb` (
  `booking_id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `inventory_item_id` int(10) NOT NULL,
  `date_from_requested` datetime NOT NULL,
  `date_to_requested` datetime NOT NULL,
  `status` varchar(300) NOT NULL,
  `category` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings_tb`
--

INSERT INTO `bookings_tb` (`booking_id`, `users_id`, `inventory_item_id`, `date_from_requested`, `date_to_requested`, `status`, `category`) VALUES
(1, 4, 1, '2020-04-21 09:48:00', '2020-04-21 09:49:00', 'Approve', 'Facilities'),
(2, 4, 1, '2020-04-21 09:48:00', '2020-04-21 09:50:00', 'Pending', 'Facilities');

-- --------------------------------------------------------

--
-- Table structure for table `department_tb`
--

CREATE TABLE `department_tb` (
  `department_id` int(10) NOT NULL,
  `department_name` varchar(500) NOT NULL,
  `department_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_tb`
--

INSERT INTO `department_tb` (`department_id`, `department_name`, `department_description`) VALUES
(1, 'College of Computer Studies', 'CCS'),
(2, 'College of Information Communications Technology', 'CICT'),
(3, 'tr', 'tr'),
(4, 'we', 'we'),
(5, 'gr', 'gr'),
(6, 'tt', 'tt'),
(7, 'ty', 'ty');

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
(2, 'Automobiles');

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

--
-- Dumping data for table `inventory_items_tb`
--

INSERT INTO `inventory_items_tb` (`inventory_item_id`, `item_name`, `item_description`, `inventory_cat_id`) VALUES
(1, 'Auditorium', 'Saint Jacinta Hall', 1),
(2, 'L300', 'ABC2133', 2);

-- --------------------------------------------------------

--
-- Table structure for table `services_tb`
--

CREATE TABLE `services_tb` (
  `services_id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `request_subject` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `request_description` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `request_status` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket_id` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_tb`
--

INSERT INTO `services_tb` (`services_id`, `users_id`, `request_subject`, `request_description`, `request_status`, `ticket_id`) VALUES
(1, 0, 'DSS Water Dispenser', 'DSS Water Dispenser DSS Water Dispenser DSS Water Dispenser DSS Water Dispenser DSS Water Dispenser DSS Water Dispenser', 'Closed', '5Q8RVM2H'),
(2, 1, 'DSS Water Dispenser 2', 'DSS Water Dispenser 2 DSS Water Dispenser 2 DSS Water Dispenser 2 DSS Water Dispenser 2 DSS Water Dispenser 2 DSS Water Dispenser 2 DSS Water Dispenser 2', 'Closed', 'WHJ6SYBU');

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
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `first_name`, `middle_name`, `last_name`, `name_extension`, `mobile_number`, `address`, `username`, `password`, `department_id`, `role_type`, `user_status`) VALUES
(1, 'Sonny', '', 'Roque', '', '+639174635022', 'CSFP', 'SonnyRoque', 'iRequest_12345', 1, 'Department Head', 'Active'),
(2, 'Macrina Jane', 'Salenga', 'Versoza', '', '+639352313805', 'Lubao, Pampanga', 'Macrina JaneVersoza', 'iRequest_12345', 1, 'Department Member', 'Active'),
(3, 'Lailanie', 'Muldong', 'Calma', '', '+639154562318', 'CSFP', 'LailanieCalma', 'iRequest_12345', 2, 'Department Head', 'Active'),
(4, 'membertest', 'membertest', 'membertest', 'N/A', '09477309754', 'Clark Pampanga', 'membertest', '123', 2, 'Department Member', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_id`) USING BTREE;

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
-- Indexes for table `services_tb`
--
ALTER TABLE `services_tb`
  ADD PRIMARY KEY (`services_id`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`);

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
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department_tb`
--
ALTER TABLE `department_tb`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory_category_tb`
--
ALTER TABLE `inventory_category_tb`
  MODIFY `inventory_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_items_tb`
--
ALTER TABLE `inventory_items_tb`
  MODIFY `inventory_item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services_tb`
--
ALTER TABLE `services_tb`
  MODIFY `services_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

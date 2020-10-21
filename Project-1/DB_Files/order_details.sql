-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2020 at 05:40 PM
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
-- Database: `bookstore_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ship_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `ship_address` char(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ship_city` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ship_zip_code` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ship_country` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `amount`, `date`, `ship_name`, `ship_address`, `ship_city`, `ship_zip_code`, `ship_country`) VALUES
(1, '20.00', '2020-10-21 03:54:46', 'nishi', '49-400 wilson avenue', 'kitchener', 'n2c2s1', 'Canada'),
(2, '0.00', '2020-10-21 10:12:46', 'Nishi Surti', 'Unit 49 400 Wilson Avenue', 'Kitchener', 'N2C 2S1', 'Canada'),
(3, '0.00', '2020-10-21 10:18:53', 'Ankita Sau', 'Unit 49 400 Wilson Avenue', 'Kitchener', 'N2C 2S1', 'Canada'),
(4, '50.00', '2020-10-21 10:32:44', 'Nishi Surti', 'Unit 49 400 Wilson Avenue', 'Kitchener', 'N2C 2S1', 'Canada'),
(5, '98.00', '2020-10-21 21:32:52', 'Nishi Surti', 'Unit 49 400 Wilson Avenue', '', 'N2C 2S1', 'Canada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

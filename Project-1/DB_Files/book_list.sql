-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2020 at 05:35 PM
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
-- Table structure for table `book_list`
--

CREATE TABLE `book_list` (
  `ISBN` varchar(20) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `author` varchar(20) NOT NULL,
  `book_image` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`ISBN`, `book_title`, `book_description`, `quantity`, `price`, `author`, `book_image`) VALUES
('78-0-321-94786-4', 'C Sharp', 'Technology related Book', 1, 50, 'Joseph Albari', 'c_sharp_6.jpg'),
('9780596002882', 'React', 'React related book', 1, 98, 'Alex Banks', 'react.jpg'),
('9780596002886', 'JAVA NIO', 'JAVA Course related book', 9, 28, 'Mark Coastal', 'java_nio.jpg'),
('9780596553548', 'PHP', 'PHP related book', 5, 62, 'David Saklar', 'php.jpg'),
('9781565926219', 'Python', 'Python language related book', 7, 65, 'Mark Hammond', 'python.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_list`
--
ALTER TABLE `book_list`
  ADD PRIMARY KEY (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

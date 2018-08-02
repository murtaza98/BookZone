-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 08:54 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `username` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `no_of_books` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `category_tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `username` varchar(255) NOT NULL,
  `contact_no` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `username` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `street_no` int(11) DEFAULT '-1',
  `area` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL DEFAULT '-1',
  `contact_no` int(11) DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `first_name`, `middle_name`, `last_name`, `role`, `street_no`, `area`, `city`, `pincode`, `contact_no`) VALUES
('ram.rajani@sad.asd', 'sdasd', 'asd', NULL, 'asd', 'user', -1, 'asdasd', '', -1, 45646),
('ram.rajani@sad.asd', 'sdasd', 'asd', NULL, 'asd', 'user', -1, 'asdasd', '', -1, 45646),
('ram.rajani@sad.asd', 'sdasd', 'asd', NULL, 'asd', 'user', -1, 'asdasd', '', -1, 45646),
('ram.rajani@sad.asd', 'sdasd', 'asd', NULL, 'asd', 'user', -1, 'asdasd', '', -1, 45646),
('ram.rajani@sad.asd', 'sdasd', 'asd', NULL, 'asd', 'user', -1, 'asdasd', '', -1, 45646),
('sdad@asd.dg', 'sad', 'asd', NULL, 'dsa', 'user', -1, 'asdf', '', -1, 456),
('shruti.dhariya@bja.aksbdk', 'asdh', 'sjakbkja', NULL, 'ajsbdjk', 'user', -1, 'jasdb', '', -1, 4564);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`username`,`book_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`username`,`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

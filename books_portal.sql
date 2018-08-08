-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 05:42 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`username`, `book_id`, `date`) VALUES
('murtaza', 3, '2018-08-05 12:01:05'),
('ojas', 4, '2018-08-05 12:01:17'),
('priyesh', 1, '2018-08-05 12:01:27');

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
  `category_tag` varchar(255) NOT NULL,
  `book_price` int(11) NOT NULL DEFAULT '0',
  `book_description` varchar(1000) DEFAULT 'No Description Available',
  `book_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `book_status` varchar(255) NOT NULL DEFAULT 'available',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `username`, `book_name`, `author`, `edition`, `subject`, `category_tag`, `book_price`, `book_description`, `book_image`, `book_status`, `date`) VALUES
(1, 'murtaza', 'Kumbhojkar', 'Kumbhojkar', '5', 'Maths', 'mathematics', 500, 'No Description Available', 'default.jpg', 'available', '2018-08-05 14:32:35'),
(2, 'murtaza', 'Techmax', 'Someone', '2', 'Microprocessor', 'microprocessor', 100, 'No Description Available', 'default.jpg', 'available', '2018-08-05 14:32:35'),
(3, 'ojas', 'AOA', 'Sartaj Sahani', '5', 'AOA', 'aoa', 250, 'No Description Available', 'default.jpg', 'available', '2018-08-05 14:32:35'),
(4, 'priyesh', 'COA Techmax', 'someone', '6', 'COA', 'coa', 450, 'No Description Available', 'default.jpg', 'available', '2018-08-05 14:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'category1'),
(2, 'category2'),
(3, 'category3'),
(4, 'category4');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `username` varchar(255) NOT NULL,
  `contact_no` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`username`, `contact_no`) VALUES
('murtaza', 123456789),
('ojas', 789456132),
('priyesh', 456789132);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `username` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL DEFAULT '0',
  `review_content` varchar(255) NOT NULL DEFAULT 'No Review Content'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`username`, `book_id`, `ratings`, `review_content`) VALUES
('murtaza', 3, 7, 'Nice Book'),
('ojas', 4, 8, 'useful'),
('priyesh', 1, 4, 'Worth reading');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`category_id`, `sub_category_name`) VALUES
(1, 'Semester 1'),
(1, 'Semester 2'),
(2, 'Semester 1'),
(2, 'Semester 2');

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
  `user_category` varchar(255) NOT NULL DEFAULT 'FirstYear'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `first_name`, `middle_name`, `last_name`, `role`, `street_no`, `area`, `city`, `pincode`, `user_category`) VALUES
('murtaza', '1234', 'murtaza', NULL, 'patrawala', 'admin', -1, 'mumbai', 'Mumbai', 400070, 'FirstYear'),
('ojas', '1234', 'ojas', NULL, 'kapre', 'admin', -1, 'mumbai', 'Mumbai', 400070, 'SecondYear'),
('priyesh', '1234', 'priyesh', NULL, 'patel', 'admin', -1, 'mumbai', 'Mumbai', 400070, 'ThirdYear');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`username`,`book_id`),
  ADD KEY `fk_book_id_bookmark` (`book_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_books_username` (`username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_no`),
  ADD KEY `fk_username_contacts` (`username`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`username`,`book_id`),
  ADD KEY `fk_book_id_reviews` (`book_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`category_id`,`sub_category_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `fk_book_id_bookmark` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_username_bookmark` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_username_contacts` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_book_id_reviews` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_username_reviews` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

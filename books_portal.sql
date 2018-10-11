-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2018 at 05:56 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser` (IN `param_username` VARCHAR(255), IN `param_password` VARCHAR(255), IN `param_email` VARCHAR(255), IN `param_firstName` VARCHAR(255), IN `param_middleName` VARCHAR(255), IN `param_lastName` VARCHAR(255), IN `param_city` VARCHAR(255), IN `param_pincode` INT(11), IN `param_category` VARCHAR(255), IN `param_role` VARCHAR(255), IN `param_contact` INT(20))  BEGIN
        	INSERT INTO users(username,password,email,first_name,middle_name,last_name,city,pincode,user_category,role)  VALUES(param_username,param_password,param_email,param_firstName,param_middleName,param_lastName,param_city,param_pincode,param_category,param_role);
            INSERT INTO contacts(username,contact_no) VALUES(param_username,param_contact);
       END$$

DELIMITER ;

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
('murtaza', 3, '2018-10-05 18:00:45');

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
  `category_id` int(11) NOT NULL DEFAULT '0',
  `book_price` int(11) NOT NULL DEFAULT '0',
  `book_original_price` int(11) NOT NULL DEFAULT '0',
  `book_description` varchar(1000) DEFAULT 'No Description Available',
  `book_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `book_status` varchar(255) NOT NULL DEFAULT 'available',
  `date` date NOT NULL DEFAULT '1920-05-20'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `username`, `book_name`, `author`, `edition`, `subject`, `category_id`, `book_price`, `book_original_price`, `book_description`, `book_image`, `book_status`, `date`) VALUES
(1, 'murtaza', 'Kumbhojkar', 'Kumbhojkar', '5', 'Maths', 3, 500, 0, 'No Description Available', 'kumbhojkar.jpg', 'available', '2018-08-05'),
(3, 'ojas', 'AOA', 'Sartaj Sahani', '5', 'AOA', 1, 250, 0, 'No Description Available', 'aoa.jpg', 'unavailable', '2018-08-05'),
(4, 'priyesh', 'COA', 'someone', '6', 'COA', 1, 450, 0, 'No Description Available', 'coa.jpg', 'unavailable', '2018-08-05'),
(5, 'murtaza', 'JAVA,The Complete Reference', 'SOMEONE', '5', 'OOPM', 1, 1000, 0, 'No Description Available', 'java.jpg', 'unavailable', '2018-08-08'),
(6, 'ojas', 'Data Structures Using C', 'Reema Thareja', '5', 'DS', 1, 0, 0, 'No Description Available', 'ds.jpg', 'unavailable', '2018-08-08'),
(7, 'priyesh', 'COA', 'someone', '6', 'COA', 6, 450, 0, 'No Description Available', 'coa.jpg', 'available', '2018-08-05'),
(8, 'ojas', 'Data Structures Using C', 'Reema Thareja', '5', 'DS', 2, 0, 0, 'No Description Available', 'ds.jpg', 'unavailable', '2018-08-08'),
(9, 'murtaza', 'JAVA,The Complete Reference', 'SOMEONE', '5', 'OOPM', 2, 1000, 0, 'No Description Available', 'java.jpg', 'available', '2018-08-08'),
(11, 'murtaza', 'Kumbhojkar', 'Kumbhojkar', '5', 'Maths', 2, 500, 0, 'No Description Available', 'kumbhojkar.jpg', 'unavailable', '2018-08-05'),
(12, 'priyesh', 'COA', 'someone', '6', 'COA', 3, 450, 0, 'No Description Available', 'coa.jpg', 'available', '2018-08-05'),
(13, 'murtaza', 'JAVA,The Complete Reference', 'SOMEONE', '5', 'OOPM', 3, 1000, 0, 'No Description Available', 'java.jpg', 'available', '2018-08-08'),
(14, 'ojas', 'AOA', 'Sartaj Sahani', '5', 'AOA', 3, 250, 0, 'No Description Available', 'aoa.jpg', 'unavailable', '2018-08-05'),
(15, 'ojas', 'AOA', 'Sartaj Sahani', '5', 'AOA', 4, 250, 0, 'No Description Available', 'aoa.jpg', 'unavailable', '2018-08-05'),
(16, 'priyesh', 'COA', 'someone', '6', 'COA', 4, 450, 0, 'No Description Available', 'coa.jpg', 'available', '2018-08-05'),
(17, 'murtaza', 'Kumbhojkar', 'Kumbhojkar', '5', 'Maths', 4, 500, 0, 'No Description Available', 'kumbhojkar.jpg', 'available', '2018-08-05'),
(18, 'ojas', 'Data Structures Using C', 'Reema Thareja', '5', 'DS', 4, 0, 0, 'No Description Available', 'ds.jpg', 'unavailable', '2018-08-08'),
(19, 'murtaza', 'asd', 'asd', 'asd', 'asd', 1, 132, 456, 'basjbdjk', 'default.jpg', 'unavailable', '2018-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `username` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `transaction_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`username`, `book_name`, `seller_name`, `date`, `price`, `transaction_method`) VALUES
('ojas', 'JAVA,The Complete Reference', 'murtaza', '05/10/2018', 1000, 'None'),
('ojas', 'Kumbhojkar', 'murtaza', '05/10/2018', 500, 'None'),
('murtaza', 'AOA', 'ojas', '05/10/2018', 250, 'None'),
('murtaza', 'Data Structures Using C', 'ojas', '05/10/2018', 0, 'None'),
('ojas', 'AOA', 'ojas', '05/10/2018', 250, 'None'),
('murtaza', 'AOA', 'ojas', '05/10/2018', 250, 'Cash'),
('ojas', 'JAVA,The Complete Reference', 'murtaza', '05/10/2018', 1000, 'Net Banking');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent_category_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `parent_category_id`) VALUES
(1, 'Computer Engineering', 0),
(2, 'Mechanical Engineering', 0),
(3, 'Civil Engineering', 0),
(4, 'Electrical Engineering', 0),
(5, 'Semester 1', 1),
(6, 'Semester 1', 2),
(7, 'Semester 1', 3),
(8, 'Semester 1', 4),
(9, 'Semester 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `username` varchar(255) NOT NULL,
  `contact_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`username`, `contact_no`) VALUES
('admin', 789),
('murtaza', 123456789),
('ojas', 789456132),
('priyesh', 456789132);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Unseen',
  `buyer_name` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `offer_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `username`, `message`, `status`, `buyer_name`, `date`, `offer_status`) VALUES
(11, 'ojas', 'murtaza is interested in buying AOA , Preferred payment method: Cash , Preferred delivary mode: Courier', 'Unseen', 'murtaza', '0000-00-00 00:00:00', 'accepted'),
(12, 'murtaza', 'ojas is interested in buying JAVA,The Complete Reference , Preferred payment method: Net Banking , Preferred delivary mode: Personal', 'Unseen', 'ojas', '0000-00-00 00:00:00', 'rejected'),
(15, 'ojas', 'murtaza has rejected your order', 'Unseen', 'murtaza', '2018-10-05 18:13:22', 'reply'),
(16, 'murtaza', 'ojas has accepted your order', 'Unseen', 'ojas', '2018-10-05 18:13:56', 'reply');

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
('murtaza', 3, 4, 'Nice Book'),
('ojas', 4, 3, 'useful'),
('priyesh', 1, 1, 'Worth reading');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'noemail@noemail@noemail',
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL DEFAULT '-1',
  `user_category` varchar(255) NOT NULL DEFAULT 'FirstYear',
  `role` varchar(255) NOT NULL,
  `street_no` int(11) DEFAULT '-1',
  `area` varchar(255) DEFAULT NULL,
  `is_verified` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `first_name`, `middle_name`, `last_name`, `city`, `pincode`, `user_category`, `role`, `street_no`, `area`, `is_verified`) VALUES
('admin', 'asd', 'patrawalamurtaza52@gmail.com', 'Gabrielle', 'asd', 'Lewis', 'Mumbai', 400055, 'Computer', 'user', -1, NULL, 'true'),
('murtaza', '1234', 'noemail@noemail@noemail', 'murtaza', NULL, 'patrawala', 'Mumbai', 400070, 'ThirdYear', 'admin', 8, 'mumbai', 'true'),
('ojas', '1234', 'noemail@noemail@noemail', 'ojas', NULL, 'kapre', 'Mumbai', 400070, 'SecondYear', 'admin', -1, 'mumbai', 'true'),
('patrawalamurtaza52@gmail.com', '1234', 'noemail@noemail@noemail', 'Gabrielle', NULL, 'Lewis', '', -1, 'FirstYear', 'user', -1, '9-65, Western Express Highway', 'true'),
('priyesh', '1234', 'noemail@noemail@noemail', 'priyesh', NULL, 'patel', 'Mumbai', 400070, 'ThirdYear', 'admin', -1, 'mumbai', 'true');

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
  ADD KEY `fk_books_username` (`username`),
  ADD KEY `book_price` (`book_price`),
  ADD KEY `book_name` (`book_name`),
  ADD KEY `book_image` (`book_image`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD KEY `fk_username_users` (`username`),
  ADD KEY `fk_book_name` (`book_name`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_username_users` (`username`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`username`,`book_id`),
  ADD KEY `fk_book_id_reviews` (`book_id`);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  ADD CONSTRAINT `fk_username_contacts` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

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

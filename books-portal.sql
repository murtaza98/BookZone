-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 01:07 PM
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
-- Database: `books-portal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser` (IN `param_username` VARCHAR(255), IN `param_password` VARCHAR(255), IN `param_email` VARCHAR(255), IN `param_firstName` VARCHAR(255), IN `param_middleName` VARCHAR(255), IN `param_lastName` VARCHAR(255), IN `param_city` VARCHAR(255), IN `param_pincode` INT(11), IN `param_category` VARCHAR(255), IN `param_role` VARCHAR(255), IN `param_contact` INT(20), IN `param_isverified` VARCHAR(25))  BEGIN
        	INSERT INTO users(username,password,email,first_name,middle_name,last_name,city,pincode,user_category,role,is_verified)  VALUES(param_username,param_password,param_email,param_firstName,param_middleName,param_lastName,param_city,param_pincode,param_category,param_role,param_isverified);
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
('murtaza', 3, '2018-10-10 10:54:14');

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
(1, 'murtaza', 'Kumbhojkar', 'Kumbhojkar', '6', 'Maths', 3, 500, 688, 'Best book for maths', 'kumbhojkar.jpg', 'available', '2018-08-02'),
(3, 'ojas', 'Analysis of Algorithms', 'Sartaj Sahani', '5', 'AOA', 1, 250, 400, '', 'aoa.jpg', 'unavailable', '2018-08-15'),
(4, 'priyesh', 'Computer Architecture', 'William Stalling', '6', 'COA', 1, 450, 750, '', 'coa.jpg', 'unavailable', '2018-08-25'),
(5, 'murtaza', 'JAVA,The Complete Reference', 'SOMEONE', '5', 'OOPM', 1, 1000, 0, 'No Description Available', 'java.jpg', 'unavailable', '2018-09-08'),
(6, 'ojas', 'Data Structures Using C', 'Reema Thareja', '5', 'DS', 1, 0, 0, 'No Description Available', 'ds.jpg', 'unavailable', '2018-09-10'),
(7, 'priyesh', 'Computer Architecture', 'someone', '6', 'COA', 6, 450, 0, '', 'coa.jpg', 'available', '2018-09-24'),
(8, 'ojas', 'Data Structures Using C', 'Reema Thareja', '5', 'DS', 2, 0, 0, 'No Description Available', 'ds.jpg', 'unavailable', '2018-09-28'),
(9, 'murtaza', 'JAVA,The Complete Reference', 'SOMEONE', '5', 'OOPM', 2, 1000, 0, 'No Description Available', 'java.jpg', 'available', '2018-10-08'),
(11, 'murtaza', 'Kumbhojkar', 'Kumbhojkar', '5', 'Maths', 2, 500, 0, 'No Description Available', 'kumbhojkar.jpg', 'unavailable', '2018-10-05'),
(12, 'priyesh', 'Computer Architecture', 'someone', '6', 'COA', 3, 450, 0, '', 'coa.jpg', 'available', '2018-10-25'),
(13, 'murtaza', 'JAVA,The Complete Reference', 'SOMEONE', '5', 'OOPM', 3, 1000, 0, 'No Description Available', 'java.jpg', 'available', '2018-10-28'),
(14, 'ojas', 'AOA', 'Sartaj Sahani', '5', 'AOA', 3, 250, 0, 'No Description Available', 'aoa.jpg', 'unavailable', '2018-10-04'),
(15, 'ojas', 'AOA', 'Sartaj Sahani', '5', 'AOA', 4, 250, 0, 'No Description Available', 'aoa.jpg', 'unavailable', '2018-10-11'),
(16, 'priyesh', 'Computer Architecture', 'someone', '6', 'COA', 4, 450, 0, '', 'coa.jpg', 'available', '2018-10-05'),
(17, 'murtaza', 'Kumbhojkar', 'Kumbhojkar', '5', 'Maths', 4, 500, 0, 'No Description Available', 'kumbhojkar.jpg', 'available', '2018-08-05'),
(18, 'ojas', 'Data Structures Using C', 'Reema Thareja', '5', 'DS', 4, 0, 0, 'No Description Available', 'ds.jpg', 'unavailable', '2018-10-10'),
(19, 'murtaza', 'asd', 'asd', 'asd', 'asd', 1, 132, 456, 'basjbdjk', 'default.jpg', 'unavailable', '2018-11-04'),
(20, 'auctor', 'Fundamental of Heat and Mass Transfer', '', '7', 'Fundamental of Heat and Mass Transfer', 2, 395, 152, 'no description', 'fohmt.jpg', 'Available', '2018-11-01'),
(22, 'cubilia', 'Theory of Automata', '', '7', 'Theory of Automata', 1, 455, 151, 'no description', 'Tcs.jpg', 'Unavailable', '2018-11-12'),
(23, 'cubilia', 'Theory of Machines', '', '1', 'Theory of Machines', 2, 306, 59, 'no description', 'Tom.jpg', 'Unavailable', '2018-11-05'),
(24, 'dictum', 'Mechanical Engineering Design', '', '8', 'Mechanical Engineering Design', 2, 124, 66, 'no description', 'Med.jpg', 'Available', '2018-11-25'),
(25, 'dictum', 'Fundamental of Fluid Mechanics', '', '7', 'Fundamental of Fluid Mechanics', 2, 109, 76, 'no description', 'fluid.jpg', 'Unavailable', '2018-09-22'),
(26, 'auctor', 'Thermodynamics', '', '3', 'Thermodynamics', 2, 420, 72, 'no description', 'thermo.jpg', 'Unavailable', '2018-11-02'),
(28, 'dictum', 'Mechanical Engineering Design', '', '10', 'Mechanical Engineering Design', 2, 89, 195, 'no description', 'Med.jpg', 'Unavailable', '2018-10-29'),
(29, 'auctor', 'Theory of Automata', '', '3', 'Theory of Automata', 1, 363, 179, 'no description', 'Tcs.jpg', 'Unavailable', '2018-12-10'),
(30, 'auctor', 'Thermodynamics', '', '3', 'Thermodynamics', 3, 420, 72, 'no description', 'thermo.jpg', 'Unavailable', '2018-12-12'),
(31, 'dictum', 'Mechanical Engineering Design', '', '10', 'Mechanical Engineering Design', 3, 89, 195, 'no description', 'Med.jpg', 'Unavailable', '2018-10-21'),
(32, 'auctor', 'Theory of Automata', '', '3', 'Theory of Automata', 4, 363, 179, 'no description', 'Tcs.jpg', 'Unavailable', '2018-11-25'),
(33, 'cubilia', 'Theory of Machines', '', '1', 'Theory of Machines', 4, 306, 59, 'no description', 'Tom.jpg', 'Unavailable', '2018-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `username` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `transaction_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`username`, `book_name`, `seller_name`, `date`, `price`, `transaction_method`) VALUES
('ojas', 'JAVA,The Complete Reference', 'murtaza', '2018-10-04', 1000, 'None'),
('ojas', 'Kumbhojkar', 'murtaza', '2018-10-04', 500, 'None'),
('murtaza', 'AOA', 'ojas', '2018-09-04', 250, 'None'),
('murtaza', 'Data Structures Using C', 'ojas', '2018-09-04', 0, 'None'),
('ojas', 'AOA', 'ojas', '2018-10-04', 250, 'None'),
('murtaza', 'AOA', 'ojas', '2018-09-04', 250, 'Cash'),
('ojas', 'JAVA,The Complete Reference', 'murtaza', '2018-10-04', 1000, 'Net Banking'),
('ojas', 'AOA', 'ojas', '2018-10-04', 250, 'None');

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
(5, 'EXTC', 0);

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
(16, 'murtaza', 'ojas has accepted your order', 'Unseen', 'ojas', '2018-10-05 18:13:56', 'reply'),
(17, 'ojas', 'ojas is interested in buying AOA , Preferred payment method: None , Preferred delivary mode: None', 'Unseen', 'ojas', '2018-10-07 03:59:07', 'rejected'),
(18, 'ojas', 'ojas has rejected your order', 'Unseen', 'ojas', '2018-10-07 03:59:12', 'reply');

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
  `is_verified` varchar(25) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `first_name`, `middle_name`, `last_name`, `city`, `pincode`, `user_category`, `role`, `street_no`, `area`, `is_verified`, `date`) VALUES
('admin', 'asd', 'patrawalamurtaza52@gmail.com', 'Gabrielle', 'asd', 'Lewis', 'Mumbai', 400055, 'FirstYear', 'user', 106, 'mulund', 'true', '2018-10-09'),
('amet,', '86298', 'noemail@noemail@noemail', 'Leandra', 'Declan', 'Blackburn', 'Cholchol', 5933, 'ThirdYear', 'user', 8, 'pretium aliquet, metus urna convallis erat,', 'true', '2018-10-02'),
('arcu.', '74108', 'noemail@noemail@noemail', 'Mark', 'Colby', 'Lang', 'Farciennes', 45459, 'SecondYear', 'user', 14, 'Nullam enim. Sed nulla ante, iaculis', 'true', '2018-08-02'),
('at', '5892 KF', 'noemail@noemail@noemail', 'Cameran', 'Carter', 'Bartlett', 'Eberswalde-Finow', 11271, '', 'user', 3, 'imperdiet ullamcorper. Duis at lacus. Quisque', 'true', '2018-08-05'),
('auctor', '50981', 'noemail@noemail@noemail', 'Sasha', 'Jonas', 'Hurley', 'Swan', 50394, 'SecondYear', 'user', 5, 'Nullam ut nisi a odio semper', 'true', '2018-08-02'),
('congue.', '19777', 'noemail@noemail@noemail', 'Norman', 'Addison', 'Stuart', 'Vallenar', 3066, 'FirstYear', 'user', 1, 'lectus rutrum urna, nec luctus felis', 'true', '2018-09-10'),
('cubilia', '25367', 'noemail@noemail@noemail', 'Quon', 'Logan', 'Glover', 'Sogliano Cavour', 8700, 'FirstYear', 'user', 18, 'ullamcorper, nisl arcu iaculis enim, sit', 'true', '2018-09-15'),
('cursus.', '61915', 'noemail@noemail@noemail', 'Aidan', 'Wade', 'Wiley', 'Reus', 34330, 'ThirdYear', 'user', 10, 'Integer id magna et ipsum cursus', 'true', '2018-09-20'),
('dictum', 'L3M 6Y8', 'noemail@noemail@noemail', 'Rebecca', 'Travis', 'Knight', 'Glendon', 6390, 'ThirdYear', 'user', 17, 'nulla vulputate dui, nec tempus mauris', 'true', '2018-10-05'),
('dolor', 'VL59 2CC', 'noemail@noemail@noemail', 'Basia', 'Wade', 'House', 'Chapecó', 9448, 'FourthYear', 'user', 11, 'magna. Phasellus dolor elit, pellentesque a,', 'true', '2018-11-11'),
('Donec', 'I0 0JU', 'noemail@noemail@noemail', 'Urielle', 'Cairo', 'Burt', 'Cunco', 0, 'FirstYear', 'user', 9, 'dictum magna. Ut tincidunt orci quis', 'true', '2018-11-05'),
('est', '165392', 'noemail@noemail@noemail', 'Madeson', 'Jason', 'Conrad', 'San Miguel', 56443, 'ThirdYear', 'user', 19, 'imperdiet dictum magna. Ut tincidunt orci', 'true', '2018-11-04'),
('faucibus.', '30223-997', 'noemail@noemail@noemail', 'Ivan', 'Richard', 'Gaines', 'Rae Lakes', 6330, 'SecondYear', 'user', 2, 'Aliquam nisl. Nulla eu neque pellentesque', 'true', '2018-12-12'),
('mauris.', '31815', 'noemail@noemail@noemail', 'Kylynn', 'Adrian', 'White', 'Araban', 26, '', 'user', 16, 'et tristique pellentesque, tellus sem mollis', 'true', '2018-12-11'),
('murtaza', '1234', 'noemail@noemail@noemail', 'murtaza', NULL, 'patrawala', 'Mumbai', 400070, 'ThirdYear', 'admin', 8, 'mumbai', 'true', '2018-10-01'),
('netus', '9461', 'noemail@noemail@noemail', 'Ebony', 'Lee', 'Wooten', 'Gijzegem', 2152, 'FirstYear', 'user', 13, 'diam nunc, ullamcorper eu, euismod ac,', 'true', '0000-00-00'),
('ojas', '1234', 'noemail@noemail@noemail', 'ojas', NULL, 'kapre', 'Mumbai', 400070, 'SecondYear', 'admin', -1, 'mumbai', 'true', '2018-10-07'),
('patrawalamurtaza52@gmail.com', '1234', 'noemail@noemail@noemail', 'Gabrielle', NULL, 'Lewis', 'nalasopara', 400609, 'LastYear', 'user', -1, '9-65, Western Express Highway', 'true', '2018-10-04'),
('Phasellus', '740521', 'noemail@noemail@noemail', 'Germaine', 'Warren', 'Pollard', 'Springfield', 968312, 'SecondYear', 'user', 4, 'in, tempus eu, ligula. Aenean euismod', 'true', '0000-00-00'),
('priyesh', '1234', 'noemail@noemail@noemail', 'priyesh', NULL, 'patel', 'Mumbai', 400070, 'ThirdYear', 'admin', -1, 'mumbai', 'true', '2018-10-08'),
('sit', '31085', 'noemail@noemail@noemail', 'Rebecca', 'Channing', 'House', 'Poulseur', 911554, 'ThirdYear', 'user', 7, 'habitant morbi tristique senectus et netus', 'true', '0000-00-00'),
('Suspendisse', '788131', 'noemail@noemail@noemail', 'Haley', 'Leonard', 'Brock', 'Montignoso', 5111, 'FourthYear', 'user', 12, 'sit amet, dapibus id, blandit at,', 'true', '0000-00-00'),
('tellus', '31913', 'noemail@noemail@noemail', 'Basil', 'Malik', 'Clemons', 'Idaho Falls', 595640, '', 'user', 15, 'pede nec ante blandit viverra. Donec', 'true', '0000-00-00'),
('ullamcorper.', '6880', 'noemail@noemail@noemail', 'Aristotle', 'Fulton', 'Duffy', 'Bassano in Teverina', 9093, 'FourthYear', 'user', 20, 'penatibus et magnis dis parturient montes,', 'true', '0000-00-00'),
('vestibulum', '92920', 'noemail@noemail@noemail', 'Wade', 'Branden', 'Durham', 'FerriŽres', 149513, '', 'user', 6, 'in magna. Phasellus dolor elit, pellentesque', 'true', '0000-00-00');

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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

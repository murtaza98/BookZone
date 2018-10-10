-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2018 at 07:35 PM
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
(1, 'murtaza', 'Kumbhojkar', 'Kumbhojkar', '6', 'Maths', 3, 250, 400, '90% of his book contains questions which have already appeared on previous years question papers. So it gives a wrong idea that question papers of Mumbai University are set from his book. ', 'kumbhojkar.jpg', 'available', '2018-08-02'),
(3, 'ojas', 'Analysis of Algorithms', 'Sartaj Sahani', '5', 'AOA', 1, 275, 400, 'The first section of each of these chapters describes the design method. The remaining sections apply the method to solve real world applications. Allows students to compare the efficiency of the solution resulting from the design method and some other methods', 'aoa.jpg', 'unavailable', '2018-08-15'),
(4, 'priyesh', 'Computer Architecture', 'WIlliam Stalling', '6', 'COA', 1, 499, 650, 'Four-time winner of the best Computer Science and Engineering textbook of the year award from the Textbook and Academic Authors Association, Computer Organization and Architecture: Designing for Performance provides a thorough discussion of the fundamentals of computer organization and architecture, covering not just processor design, but memory, I/O, and parallel systems.Coverage is supported by a wealth of concrete examples emphasizing modern systems', 'coa.jpg', 'available', '2018-08-25'),
(5, 'murtaza', 'JAVA,The Complete Reference', 'Herbert Schildt', '5', 'OOPM', 1, 550, 700, 'Fully updated for Java SE 8, Java: The Complete Reference, explains how to develop, compile, debug, and run Java programs. Bestselling programming author Herb Schildt covers the entire Java language, including its syntax, keywords, and fundamental programming principles, as well as significant portions of the Java API library. JavaBeans, servlets, applets, and Swing are examined and real-world examples demonstrate Java in action', 'java.jpg', 'available', '2018-09-08'),
(6, 'ojas', 'Data Structures Using C', 'Reema Thareja', '5', 'DS', 1, 250, 300, 'Data Structures Using C has been developed to provide a comprehensive and consistent coverage of both the abstract concepts of data structures as well as the implementation of these concepts using C language. It begins with a thorough overview of the concepts of C programming followed by introduction of different data structures and methods to analyse the complexity of different algorithms. It then connects these concepts and applies them to the study of various data structures such as arrays, strings, linked lists, stacks, queues, trees, heaps, and graphs.', 'ds.jpg', 'unavailable', '2018-09-10'),
(7, 'harsh', 'Computer Architecture', 'WIlliam Stalling', '6', 'COA', 6, 450, 650, 'Four-time winner of the best Computer Science and Engineering textbook of the year award from the Textbook and Academic Authors Association, Computer Organization and Architecture: Designing for Performance provides a thorough discussion of the fundamentals of computer organization and architecture, covering not just processor design, but memory, I/O, and parallel systems.Coverage is supported by a wealth of concrete examples emphasizing modern systems', 'coa.jpg', 'available', '2018-09-24'),
(8, 'tanay', 'Data Structures Using C', 'Reema Thareja', '5', 'DS', 2, 230, 300, 'Data Structures Using C has been developed to provide a comprehensive and consistent coverage of both the abstract concepts of data structures as well as the implementation of these concepts using C language. It begins with a thorough overview of the concepts of C programming followed by introduction of different data structures and methods to analyse the complexity of different algorithms. It then connects these concepts and applies them to the study of various data structures such as arrays, strings, linked lists, stacks, queues, trees, heaps, and graphs.', 'ds.jpg', 'available', '2018-09-28'),
(9, 'priyesh', 'JAVA,The Complete Reference', 'Herbert Schildt', '5', 'OOPM', 2, 499, 700, 'Fully updated for Java SE 8, Java: The Complete Reference, explains how to develop, compile, debug, and run Java programs. Bestselling programming author Herb Schildt covers the entire Java language, including its syntax, keywords, and fundamental programming principles, as well as significant portions of the Java API library. JavaBeans, servlets, applets, and Swing are examined and real-world examples demonstrate Java in action', 'java.jpg', 'available', '2018-10-08'),
(11, 'tanay', 'Kumbhojkar', 'Kumbhojkar', '5', 'Maths', 2, 350, 400, '90% of his book contains questions which have already appeared on previous years question papers. So it gives a wrong idea that question papers of Mumbai University are set from his book. ', 'kumbhojkar.jpg', 'available', '2018-10-05'),
(12, 'murtaza', 'Computer Architecture', 'WIlliam Stalling', '6', 'COA', 3, 550, 650, 'Four-time winner of the best Computer Science and Engineering textbook of the year award from the Textbook and Academic Authors Association, Computer Organization and Architecture: Designing for Performance provides a thorough discussion of the fundamentals of computer organization and architecture, covering not just processor design, but memory, I/O, and parallel systems.Coverage is supported by a wealth of concrete examples emphasizing modern systems', 'coa.jpg', 'available', '2018-10-25'),
(13, 'harsh', 'JAVA,The Complete Reference', 'Herbert Schildt', '5', 'OOPM', 3, 499, 700, 'Fully updated for Java SE 8, Java: The Complete Reference, explains how to develop, compile, debug, and run Java programs. Bestselling programming author Herb Schildt covers the entire Java language, including its syntax, keywords, and fundamental programming principles, as well as significant portions of the Java API library. JavaBeans, servlets, applets, and Swing are examined and real-world examples demonstrate Java in action', 'java.jpg', 'available', '2018-10-28'),
(14, 'priyesh', 'Analysis of Algorithms', 'Sartaj Sahani', '5', 'AOA', 3, 250, 400, 'The first section of each of these chapters describes the design method. The remaining sections apply the method to solve real world applications. Allows students to compare the efficiency of the solution resulting from the design method and some other methods', 'aoa.jpg', 'available', '2018-10-04'),
(15, 'tanay', 'Analysis of Algorithms', 'Sartaj Sahani', '5', 'AOA', 4, 300, 400, 'The first section of each of these chapters describes the design method. The remaining sections apply the method to solve real world applications. Allows students to compare the efficiency of the solution resulting from the design method and some other methods', 'aoa.jpg', 'available', '2018-10-11'),
(16, 'ojas', 'Computer Architecture', 'WIlliam Stalling', '6', 'COA', 4, 450, 650, 'Four-time winner of the best Computer Science and Engineering textbook of the year award from the Textbook and Academic Authors Association, Computer Organization and Architecture: Designing for Performance provides a thorough discussion of the fundamentals of computer organization and architecture, covering not just processor design, but memory, I/O, and parallel systems.Coverage is supported by a wealth of concrete examples emphasizing modern systems', 'coa.jpg', 'available', '2018-10-05'),
(17, 'ojas', 'Kumbhojkar', 'Kumbhojkar', '5', 'Maths', 4, 325, 400, '90% of his book contains questions which have already appeared on previous years question papers. So it gives a wrong idea that question papers of Mumbai University are set from his book. ', 'kumbhojkar.jpg', 'available', '2018-08-05'),
(18, 'priyesh', 'Data Structures Using C', 'Reema Thareja', '5', 'DS', 4, 150, 300, 'Data Structures Using C has been developed to provide a comprehensive and consistent coverage of both the abstract concepts of data structures as well as the implementation of these concepts using C language. It begins with a thorough overview of the concepts of C programming followed by introduction of different data structures and methods to analyse the complexity of different algorithms. It then connects these concepts and applies them to the study of various data structures such as arrays, strings, linked lists, stacks, queues, trees, heaps, and graphs.', 'ds.jpg', 'available', '2018-10-10'),
(19, 'murtaza', 'asd', 'asd', 'asd', 'asd', 1, 132, 456, 'qwertyasdfghzxcvbn', 'default.jpg', 'available', '2018-11-04'),
(20, 'tanay', 'Fundamental of Heat and Mass Transfer', 'Bergemann', '7', 'Fundamental of Heat and Mass Transfer', 2, 395, 550, 'Fundamentals of Heat and Mass Transfer is the gold standard of heat transfer pedagogy for more than 30 years, with a commitment to continuous improvement by four authors having more than 150 years of combined experience in heat transfer education, research and practice. Using a rigorous and systematic problem-solving methodology pioneered by this text, it is abundantly filled with examples and problems that reveal the richness and beauty of the discipline. ', 'fohmt.jpg', 'available', '2018-11-01'),
(22, 'ojas', 'Theory of Automata', 'Rajeev Motwani', '7', 'Theory of Automata', 1, 399, 450, 'This classic book on formal languages, automata theory and computational complexity has been updated to present theoretical concepts in a concise and straightforward manner with the increase of hands-on, practical applications. This edition offers students a less formal writing style while providing the most accessible coverage of automata theory, solid treatment on constructing proofs, many figures and diagrams to help convey ideas and sidebars to highlight related material. Each chapter offers an abundance of exercises for hands-on learning.', 'Tcs.jpg', 'available', '2018-11-12'),
(23, 'quon@2212', 'Theory of Machines', 'JK Gupta', '1', 'Theory of Machines', 2, 300, 400, 'A textbook of machine design is useful for students preparing for entrance exams like upsc engineering services exam, amie (india) examinations. It is also recommended for students studying btech, be, and other professional courses related to machine design. The book is systematic and is presented in clear and simple language.', 'Tom.jpg', 'available', '2018-11-05'),
(24, 'tanay', 'Mechanical Engineering Design', 'Keiss Nisbertt', '8', 'Mechanical Engineering Design', 2, 699, 800, 'A textbook of machine design is useful for students preparing for entrance exams like upsc engineering services exam, amie (india) examinations. It is also recommended for students studying btech, be, and other professional courses related to machine design. The book is systematic and is presented in clear and simple language.', 'Med.jpg', 'available', '2018-11-25'),
(25, 'harsh', 'Fundamental of Fluid Mechanics', 'Rothmayour', '7', 'Fundamental of Fluid Mechanics', 2, 130, 250, 'Fundamentals of Fluid Mechanics offers comprehensive topical coverage, with varied examples and problems, application of visual component of fluid mechanics, and strong focus on effective learning.Each important concept is introduced in easy–to–understand terms before more complicated examples are discussed.  Continuing this book?s tradition of extensive real–world applications, this latest edition includes more Fluid in the News case study boxes in each chapter, new problem types, an increased number of real–world photos, and additional videos to augment the text material and help generate interest in the topic.', 'fluid.jpg', 'available', '2018-09-22'),
(26, 'sasha#22', 'Thermodynamics', 'RK Rajput', '3', 'Thermodynamics', 2, 500, 750, 'This book titled \"Basic Thermodynamics\" makes an attempt to cover the portions keeping in view of the syllabus for IIIrd semester B.E., Mechanical, prescribed by Visveswaraiah Technological University. This book can also be useful for students of other engineering disciplines like B.E. in Industrial production, Industrial Engineering management, Automobile, Diploma in Mechanical and IP, IEM and Automobile engineering, AMIE, etc. ', 'thermo.jpg', 'available', '2018-11-02'),
(28, 'priyesh', 'Mechanical Engineering Design', 'Keiss Nisbertt', '10', 'Mechanical Engineering Design', 2, 699, 800, 'A textbook of machine design is useful for students preparing for entrance exams like upsc engineering services exam, amie (india) examinations. It is also recommended for students studying btech, be, and other professional courses related to machine design. The book is systematic and is presented in clear and simple language.', 'Med.jpg', 'available', '2018-10-29'),
(29, 'harsh', 'Theory of Automata', 'Rajeev Motwani', '3', 'Theory of Automata', 1, 350, 450, 'This classic book on formal languages, automata theory and computational complexity has been updated to present theoretical concepts in a concise and straightforward manner with the increase of hands-on, practical applications. This edition offers students a less formal writing style while providing the most accessible coverage of automata theory, solid treatment on constructing proofs, many figures and diagrams to help convey ideas and sidebars to highlight related material. Each chapter offers an abundance of exercises for hands-on learning.', 'Tcs.jpg', 'available', '2018-12-10'),
(30, 'sasha#22', 'Thermodynamics', '', '3', 'Thermodynamics', 3, 420, 72, 'no description', 'thermo.jpg', 'available', '2018-12-12'),
(31, 'harsh', 'Mechanical Engineering Design', 'Keiss Nisbertt', '10', 'Mechanical Engineering Design', 3, 89, 195, 'A textbook of machine design is useful for students preparing for entrance exams like upsc engineering services exam, amie (india) examinations. It is also recommended for students studying btech, be, and other professional courses related to machine design. The book is systematic and is presented in clear and simple language.', 'Med.jpg', 'available', '2018-10-21'),
(32, 'murtaza', 'Theory of Automata', 'Rajeev Motwani', '3', 'Theory of Automata', 4, 363, 450, 'This classic book on formal languages, automata theory and computational complexity has been updated to present theoretical concepts in a concise and straightforward manner with the increase of hands-on, practical applications. This edition offers students a less formal writing style while providing the most accessible coverage of automata theory, solid treatment on constructing proofs, many figures and diagrams to help convey ideas and sidebars to highlight related material. Each chapter offers an abundance of exercises for hands-on learning.', 'Tcs.jpg', 'available', '2018-11-25'),
(33, 'quon@2212', 'Theory of Machines', '', '1', 'Theory of Machines', 4, 306, 59, 'no description', 'Tom.jpg', 'available', '2018-11-01');

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
  `contact_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`username`, `contact_no`) VALUES
('adam1234', '992065413'),
('admin', '9910233211'),
('aidan1234', '8890022133'),
('arsitotle99', '8890133445'),
('baisa00', '7788713452'),
('basil55', '9992288721'),
('cameran12', '7764411221'),
('germaine21', '9876511111'),
('haley001', '7744532154'),
('harsh', '8665577664'),
('ivan76', '9990077662'),
('kylynn@301', '9930111221'),
('leandra12', '8887722112'),
('madeson88', '7788765432'),
('mark@123', '8879312349'),
('murtaza', '9021199821'),
('norman01', '9002387672'),
('ojas', '7738870439'),
('priyesh', '7786543210'),
('quon@2212', '9988788779'),
('rebecca12', '99922255566'),
('sasha#22', '9123188088'),
('tanay', '9930422112'),
('urielle21', '8188122121'),
('wade@2021991', '8789900099');

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
('adam1234', 'adam1234', 'adam@gmail.com', 'Adam', 'Lee', 'Wooten', 'Byculla', 2152, 'FirstYear', 'user', 13, 'diam nunc, ullamcorper eu, euismod ac,', 'true', '2018-09-02'),
('admin', 'admin123', 'ojas.kapre@somaiya.edu', 'admin', '', 'admin', 'Thane', 400604, '', 'admin', 106, 'Mulund', 'true', '2018-08-01'),
('aidan1234', 'aidan1234', 'aidan@gmail.com', 'Aidan', 'Wade', 'Wiley', 'Vikhroli', 34330, 'ThirdYear', 'user', 10, 'Vikhroli', 'true', '2018-09-20'),
('arsitotle99', 'arsitotle1234', 'arsitotle@gmail.com', 'Aristotle', 'Fulton', 'Duffy', 'Dadar', 9093, 'FourthYear', 'user', 20, 'Dadar', 'true', '2018-11-20'),
('baisa00', 'basia1234', 'basia@gmail.com', 'Basia', 'Wade', 'House', 'Kurla', 9448, 'FourthYear', 'user', 11, 'Kurla', 'true', '2018-11-11'),
('basil55', 'basil1234', 'basil@gmail.com', 'Basil', 'Malik', 'Clemons', 'Charni Road', 595640, '', 'user', 15, 'Charni road', 'true', '2018-10-23'),
('cameran12', 'cameran1234', 'cameran@gmail.com', 'Cameran', 'Carter', 'Bartlett', 'Dahisar', 11271, '', 'user', 3, 'Dahisar', 'true', '2018-08-05'),
('germaine21', 'germaine1234', 'germaine@gmail.com', 'Germaine', 'Warren', 'Pollard', 'Churchgate', 968312, 'SecondYear', 'user', 4, 'Churchgate', 'true', '2018-11-18'),
('haley001', 'haley1234', 'haley@gmail.com', 'Haley', 'Leonard', 'Brock', 'Dombivali', 5111, 'FourthYear', 'user', 12, 'Dombivali', 'true', '2018-10-01'),
('harsh', '1234', 'harsh.patel4@somaiya.edu', 'Harsh', NULL, 'Patel', 'Nalasopara', 400609, 'LastYear', 'user', -1, 'Kalyan', 'true', '2018-10-11'),
('ivan76', 'ivan1234', 'ivan@gmail.com', 'Ivan', 'Richard', 'Gaines', 'Borivali', 6330, 'SecondYear', 'user', 2, 'Borivali', 'true', '2018-12-12'),
('kylynn@301', 'kylynn1234', 'kylynn@gmail.com', 'Kylynn', 'Adrian', 'White', 'Bhandup', 26, '', 'user', 16, 'Bhandup', 'true', '2018-12-11'),
('leandra12', 'leandra1234', 'leandra@gmail.com', 'Leandra', 'Declan', 'Blackburn', 'Badlapur', 5933, 'ThirdYear', 'user', 8, 'Badlapur', 'true', '2018-10-02'),
('madeson88', 'madeson1234', 'madeson@gmail.com', 'Madeson', 'Jason', 'Conrad', 'Virar', 56443, 'ThirdYear', 'user', 19, 'Virar', 'true', '2018-11-04'),
('mark@123', 'mark1234', 'mark@gmail.com', 'Mark', 'Colby', 'Lang', 'Ghatkopar', 45459, 'SecondYear', 'user', 14, '', 'true', '2018-08-02'),
('murtaza', '1234', 'murtaza.patrawala@somaiya.edu', 'Murtaza', NULL, 'Patrawala', 'Kurla', 400070, 'ThirdYear', 'user', 8, 'mumbai', 'true', '2018-10-10'),
('norman01', 'norman1234', 'norman@gmail.com', 'Norman', 'Addison', 'Stuart', 'Airoli', 3066, 'FirstYear', 'user', 1, 'lectus rutrum urna, nec luctus felis', 'true', '2018-09-10'),
('ojas', '1234', 'ojask1205@gmail.com', 'Ojas', NULL, 'Kapre', 'Thane', 400070, 'SecondYear', 'user', -1, 'mumbai', 'true', '2018-10-11'),
('priyesh', '1234', 'priyesh.patel@somaiya.edu', 'Priyesh', NULL, 'Patel', 'Badlapur', 400070, 'ThirdYear', 'user', -1, 'mumbai', 'true', '2018-10-11'),
('quon@2212', 'quon1234', 'quon@gmail.com', 'Quon', 'Logan', 'Glover', 'Nerul', 8700, 'FirstYear', 'user', 18, 'ullamcorper, nisl arcu iaculis enim, sit', 'true', '2018-09-15'),
('rebecca12', 'rebecca1234', 'rebecca@gmail.com', 'Rebecca', 'Travis', 'Knight', 'Panvel', 6390, 'ThirdYear', 'user', 17, 'nulla vulputate dui, nec tempus mauris', 'true', '2018-11-05'),
('sasha#22', 'sasha1234', 'sasha@gmail.com', 'Sasha', 'Jonas', 'Hurley', 'Vashi', 50394, 'SecondYear', 'user', 5, 'Nullam ut nisi a odio semper', 'true', '2018-08-02'),
('tanay', '1234', 'tanay.raul@somaiya.edu', 'Tanay', '', 'Raul', 'Mulund', 400701, 'ThirdYear', 'user', 7, 'habitant morbi tristique senectus et netus', 'true', '2018-10-11'),
('urielle21', 'urielle1234', 'urielle@gmail.com', 'Urielle', 'Cairo', 'Burt', 'Sion', 0, 'FirstYear', 'user', 9, 'dictum magna. Ut tincidunt orci quis', 'true', '2018-11-05'),
('wade@2021991', 'wade1234', 'wade@gmail.com', 'Wade', 'Branden', 'Durham', 'Ghatkopar', 410220, 'FirstYear', 'user', 6, '', 'true', '2018-09-21');

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
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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

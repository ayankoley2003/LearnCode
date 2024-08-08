-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 03:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_userid` varchar(30) NOT NULL,
  `ad_password` varchar(30) NOT NULL,
  `ad_name` varchar(30) NOT NULL,
  `ad_phone` bigint(20) NOT NULL,
  `ad_email` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_userid`, `ad_password`, `ad_name`, `ad_phone`, `ad_email`) VALUES
('admin', '1111', 'Ayan Koley', 9007852170, 'ayankoley@gmail.com'),
('gd120', '1111', 'Goutam Das', 54634566565, 'Goutamdas142@gmail.com'),
('um250', '1111', 'Unmesh Mondal', 54634566565, 'UnmeshMondal250@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'C'),
(2, 'Python'),
(3, 'Java'),
(4, 'MySQL'),
(5, 'Operating System'),
(6, 'DBMS'),
(7, 'Software Engineering'),
(8, 'Data Structure'),
(9, 'Algorithm'),
(10, 'System Design'),
(11, 'JavaScript'),
(12, 'Networking'),
(13, 'Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `con_id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `ad_details` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`con_id`, `userid`, `name`, `email`, `message`, `ad_details`) VALUES
(6, 'ayan2003', 'AYAN KOLEY', 'ayankoley339@gmail.com', 'There is an issue in my account .', 'For changing the password '),
(7, 'ayan2003', 'Nirmalya Adak', 'nirmalya@gmail.com', 'There is an issue in course area .', 'Problem in enrolling in a course .'),
(8, 'ayan2003', 'Nirmalya Adak', 'nirmalya@gmail.com', 'There is an issue in course area .', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_category` varchar(255) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text DEFAULT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_category`, `course_title`, `course_code`, `start_date`, `end_date`, `description`, `capacity`) VALUES
(1, 'Data Structure', 'Basic Data Structure & analysis', 'DS1', '2024-07-20', '2024-08-20', 'This course provides an in-depth study of data structures, a fundamental concept in computer science. Students will learn about various data structures including arrays, linked lists, stacks, queues, trees, graphs, and hash tables. ', 20),
(2, 'C', 'Fundamentals of C Programming', 'C1', '2024-07-20', '2024-08-20', 'This course offers a comprehensive introduction to C programming, a powerful and widely-used programming language. Students will learn the fundamental concepts of C, including syntax, data types, control structures, functions, arrays, pointers, and file handling.', 20),
(3, 'Python', 'Basic Python Tutorial ', 'PY1', '2024-07-30', '2024-09-30', 'This course provides an in-depth introduction to Python, a versatile and powerful programming language known for its readability and broad applicability. Students will learn the core principles of Python programming, including syntax, data types, control structures, functions, and object-oriented programming. ', 25),
(4, 'Java ', 'Concept of Object Oriented Programing using Java ', 'JAVA1', '2024-07-30', '2024-09-30', 'This course provides a comprehensive introduction to Object-Oriented Programming (OOP) using Java, one of the most popular and widely-used programming languages. Students will learn the fundamental principles of OOP, including classes, objects, inheritance, polymorphism, encapsulation, and abstraction.', 20),
(11, 'C', 'Basic C', 'C5', '2024-07-05', '2024-07-13', '', 10),
(12, 'C', 'Basic C', 'C6', '2024-07-05', '2024-07-13', '', 10),
(13, 'C', 'Basic C', 'C6', '2024-07-05', '2024-07-13', '', 10),
(14, 'C', 'Basic C', 'C7', '2024-07-05', '2024-07-13', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `receiver_id` varchar(50) NOT NULL,
  `message_text` text NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `sender_id`, `receiver_id`, `message_text`, `timestamp`) VALUES
(7, 'ayan2003', 'admin', 'Hello\r\n', '2024-06-10 09:05:33'),
(8, 'admin', 'ayan2003', 'How can i help you ?', '2024-06-10 09:06:59'),
(9, 'admin', 'ayan200', 'Tell .', '2024-06-10 09:10:53'),
(13, 'ayan2003', 'admin', 'Can you tell me the questions ?', '2024-06-10 09:13:15'),
(15, 'admin', 'ayan2003', 'Yeah , sure .', '2024-06-11 20:16:54'),
(16, 'ayan2003', 'admin', 'Thank you for help .', '2024-06-11 20:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(300) NOT NULL,
  `front_page_img` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `category`, `title`, `author`, `description`, `file_path`, `front_page_img`) VALUES
(35, 'c', 'Let us C ', 'Yashavant kanetkar ', 'Let Us C has been part of learning and teaching material in mostO Over three million copies sold worldwide.Authentic Guide to C Programming LanguageBasic / Intermediate/Advanced C Programming, C Under Unix and GNOME Programming .', '../../admin/ebooks/local_books/letusc-yashwantkanetkar.pdf', '../../admin/ebooks/front_page/letusc.jpg'),
(36, 'c', 'Programming with C', 'Byron S. Gottfried, McGraw Hill', 'Publication date : 1996 ,\r\nTopics : C (Computer program language), C (Langage de programmation), C Programmiersprache ,\r\nLanguage : English', '../../admin/ebooks/local_books/Schaum\'s-Outlines-Programming-with-C-2nd-edition.pdf', '../../admin/ebooks/front_page/Schaum\'s-Outlines-Programming-with-C-2nd-edition-front.jpg'),
(37, 'ds', 'Graph theory with applications to engineering and computer science', 'Narsingh  Deo', 'Publication date : 1974\r\nTopics : Graph theory\r\nLanguage : English', '../../admin/ebooks/local_books/Narsingh_Deo_Graph_Theory_with_Applications.pdf', '../../admin/ebooks/front_page/graph_thoery_narsinghdeo.png'),
(38, 'os', 'Modern operating systems', ' Tanenbaum, Andrew S', 'Topics : Operating systems (Computers), Computers and IT, Betriebssystem\r\nLanguage : English', '../../admin/ebooks/local_books/Andrew S. Tanenbaum - Modern Operating Systems.pdf', '../../admin/ebooks/front_page/Modern_operating_systems.jpg'),
(39, 'Computer_architecture', 'Computer system architecture', ' Mano, M. Morris,', 'Publication date : 1993\r\nTopics : Computer architecture\r\nLanguage : English', '../../admin/ebooks/local_books/Computer Architecture M Mano.pdf', '../../admin/ebooks/front_page/Computer_system_architecture.jpg'),
(40, 'dbms', 'Database System Concepts ', ' A. Silberschatz, H.F. Korth, S. Sudarshan,  McGraw Hill.', 'Database System Concepts by Silberschatz, Korth and Sudarshan is now in its 6th edition and is one of the cornerstone texts of database education. It presents the fundamental concepts of database management in an intuitive manner geared toward allowing students to begin working with databases as quickly as possible.', '../../admin/ebooks/local_books/Abraham Silberschatz, Henry F. Korth, S. Sudarshan - Database System Concepts, 6th Edition  -McGraw-Hill (2010).pdf', '../../admin/ebooks/front_page/database_concept_HF_Korth.jpg'),
(41, 'mysql', 'Database System Concepts ', ' A. Silberschatz, H.F. Korth, S. Sudarshan,  McGraw Hill.', 'Database System Concepts by Silberschatz, Korth and Sudarshan is now in its 6th edition and is one of the cornerstone texts of database education. It presents the fundamental concepts of database management in an intuitive manner geared toward allowing students to begin working with databases as quickly as possible.', '../../admin/ebooks/local_books/Abraham Silberschatz, Henry F. Korth, S. Sudarshan - Database System Concepts, 6th Edition  -McGraw-Hill (2010).pdf', '../../admin/ebooks/front_page/database_concept_HF_Korth.jpg'),
(42, 'others', 'Computer Fundamentals', 'Anita Goel', 'Topics : Computer Science , \r\nLanguage : English', '../../admin/ebooks/local_books/Anita Goel - Computer Fundamentals-Pearson (2010).pdf', '../../admin/ebooks/front_page/comp_fundamental.jpg'),
(43, '', '', '', '', '', ''),
(44, 'networking', 'Data communications and networking', 'Forouzan, Behrouz A', 'Publication date : 2013\r\nTopics : Data transmission systems, Computer networks\r\nLanguage : English', '../../admin/ebooks/local_books/Data_Communication_and_Networking_by_Behrouz.A.Forouzan_4th.edition.pdf', '../../admin/ebooks/front_page/networking.jpg'),
(45, 'ds', 'Classic Data Structures', 'Debasis Samanta, Second Edition, EEE, PHI', 'This book is the second edition of a text designed for undergraduate engineering courses in Data Structures. The treatment of the subject matter in this second edition maintains the same general philosophy as in the first edition but with significant additions. These changes are designed to improve the readability and understandability of all algorithms so that the students acquire a firm grasp of the key concepts.', '../../admin/ebooks/local_books/data-structures-by-d-samantha half.pdf', '../../admin/ebooks/front_page/ds_Debasis_Samanta.jpg'),
(46, 'Computational_Mathematics', 'Discrete Mathematics and Its Applications, ', 'Rosen, McGraw Hill.', 'Rosen\'s Discrete Mathematics and its Applications presents a precise, relevant, comprehensive approach to mathematical concepts. This world-renowned best-selling text was written to accommodate the needs across a variety of majors and departments, including mathematics, computer science, and engineering. ', '../../admin/ebooks/local_books/Discreate_maths_rozen.pdf', '../../admin/ebooks/front_page/Discrete_Mathematics_Rosen.jpg'),
(47, 'java', 'Programming with Java', 'E. Balaguruswamy, McGraw Hill', 'The third edition of this most trusted book on JAVA for beginners is here with some essential updates. Retaining its quintessential style of concept explanation with exhaustive programs, solved examples, and illustrations, this test takes the journey of understanding JAVA to slightly higher level. ', '../../admin/ebooks/local_books/E Balagurusamy - Programming with Java a Primer-McGraw-Hill (2008).pdf', '../../admin/ebooks/front_page/Programming_With_Java_A_primer_3e_by_balagurusamy_Cover.jpg'),
(48, 'sw', 'Fundamentals of software engineering', 'Rajib Mall', 'Publication date : 2003\r\nTopics : Software engineering, Génie logiciel\r\nLanguage : English', '../../admin/ebooks/local_books/Fundamentals_of_Software_Engineering,5th_Edition_by_Mall,Rajib.pdf', '../../admin/ebooks/front_page/software-engineering-5th-e-rajib-mall.jpg'),
(49, 'automata', 'Theory of Computer Science (Automata, Languages & Computation)', 'K L P Misra & N Chandrasekharan', 'Topics : Toc Klp Mishra pdf, Automata, Languages & Computation .\r\nLanguage : English', '../../admin/ebooks/local_books/K. L. P. Mishra, N. Chandrasekaran - Theory of Computer Science_ Automata, Languages and Computation.pdf', '../../admin/ebooks/front_page/toc_klp_mishra.jpg'),
(50, 'multimedia', 'Multimedia: Making it work', 'Tay Vaughan, TMH', 'Publication date : 2004\r\nTopics : Multimedia systems\r\nLanguage : English', '../../admin/ebooks/local_books/Multimedia.pdf', '../../admin/ebooks/front_page/Multimedia_TayVaughan.jpg'),
(51, 'algorithm', 'Introduction to Algorithms', 'Cormen, Leiserson, Rivest and Stein, TMH.', 'Topics : algorithm\r\nLanguage : English', '../../admin/ebooks/local_books/Introduction_to_algorithms-3rd Edition.pdf', '../../admin/ebooks/front_page/algorithm_kormen.jpg'),
(52, 'python', 'Introduction to Computation and Programming Using Python with Application to Understanding  Data', 'Guttag, John V. MIT Press.', 'This book introduces students with little or no prior programming experience to the art of computational problem solving using Python and various Python libraries, including numpy, matplotlib, random, pandas, and sklearn.', '../../admin/ebooks/local_books/Introduction to Computation and Programming Using Python.pdf', '../../admin/ebooks/front_page/Programming_Using_Python.jpg'),
(53, 'python', 'Learn Python 3 the Hard Way: A Very Simple Introduction to the Terrifyingly Beautiful World of  Computers and Code', 'Shaw, Zed A, Addison-Wesley Professional', 'Publication date : 2017\r\nTopics : Python (Computer program language), Python (Computer program language) -- Problems, exercises, etc, Computer programming -- Problems, exercises, etc .\r\nLanguage : English', '../../admin/ebooks/local_books/LearnPython3theHardWay.pdf', '../../admin/ebooks/front_page/learn_python.jpg'),
(54, 'java', 'Java: The Complete Reference', 'Herbert Schildt, McGraw-Hill Education', 'Publication date : 2007\r\nTopics : Java (Computer program language), Internet programming\r\nLanguage : English', '../../admin/ebooks/local_books/Java The Complete Reference - 10th Edition.pdf', '../../admin/ebooks/front_page/Java_The_Complete_Reference_Herbert Schildt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `education_level` varchar(255) NOT NULL,
  `field_of_study` varchar(255) DEFAULT NULL,
  `relevant_courses` text DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `interest` text DEFAULT NULL,
  `project_type` text DEFAULT NULL,
  `learning_goals` text DEFAULT NULL,
  `skills_to_gain` text DEFAULT NULL,
  `schedule` text DEFAULT NULL,
  `referral` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `username`, `full_name`, `email`, `phone`, `address`, `dob`, `gender`, `course_id`, `education_level`, `field_of_study`, `relevant_courses`, `job_title`, `company`, `experience`, `skills`, `interest`, `project_type`, `learning_goals`, `skills_to_gain`, `schedule`, `referral`, `comments`) VALUES
(1, 'ayan2003', 'AYAN KOLEY', 'ayankoley339@gmail.com', '9007852170', 'Kolkata', '2003-09-20', 'Male', 1, 'High School', '', '', '', '', '', '', '', '', '', '', '', 'Our Site', ''),
(2, 'ayan2003', 'AYAN KOLEY', 'ayankoley339@gmail.com', '9007852170', 'Kolkata', '2003-09-20', 'Male', 2, 'High School', '', '', '', '', '', '', '', '', '', '', '', 'Our Site', ''),
(5, 'ayan2003', 'AYAN KOLEY', 'ayankoley339@gmail.com', '9007852170', 'Kolkata', '2003-09-20', 'Male', 2, 'High School', '', '', '', '', '', '', '', '', '', '', '', 'Our Site', '');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_videos`
--

CREATE TABLE `favourite_videos` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `vid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite_videos`
--

INSERT INTO `favourite_videos` (`id`, `user_id`, `vid`) VALUES
(10, 'ayan2003', 1),
(11, 'ayan2003', 3),
(12, 'ayan2003', 18),
(13, 'ayan2003', 50);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `userid`, `name`, `email`, `message`) VALUES
(3, 'ayan200', 'Ayan Koley ', 'ayan@gmail.com', 'Good Experience'),
(5, 'ayan2003', 'AYAN KOLEY', 'ayankoley339@gmail.com', 'Very Helpful '),
(6, 'ayan2003', 'AYAN KOLEY', 'ayankoley339@gmail.com', 'Good Platform'),
(7, 'ayan2003', 'AYAN KOLEY', 'ayankoley339@gmail.com', 'GOOD');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `password`) VALUES
('avoy954', '11114'),
('ayan200', '11'),
('ayan2003', '11'),
('ayan201', '11'),
('ayan339', '11111111');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sender_id` varchar(50) DEFAULT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `course_id`, `sender_id`, `message`, `timestamp`) VALUES
(10, 2, 'ayan2003', 'today', '2024-06-09 13:32:24'),
(11, 2, 'ayan2003', 'today', '2024-06-09 13:33:01'),
(12, 1, 'ayan2003', 'class start', '2024-06-09 13:41:42'),
(13, 2, 'admin', 'Class begin', '2024-06-09 13:50:32'),
(14, 2, 'ayan2003', 'ok', '2024-06-09 13:51:16'),
(15, 2, 'admin', 'Class begin', '2024-06-09 13:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `question_text` text NOT NULL,
  `difficulty` varchar(50) DEFAULT NULL,
  `Answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `category`, `question_text`, `difficulty`, `Answer`) VALUES
(1, 'C', 'Who was invented C Programming ?', 'easy', 'Dennis M. Ritchie'),
(2, 'C', 'Why is C called a mid-level programming language?', 'medium', NULL),
(3, 'C', 'What are the features of the C programming language?', 'medium', NULL),
(4, 'C', 'What are basic data types supported in the C Programming Language?', 'medium', NULL),
(5, 'C', 'What are tokens in C?', 'medium', NULL),
(6, 'C', 'What are preprocessor directives in C?', 'medium', NULL),
(7, 'C', 'What is the use of static variables in C?', 'medium', NULL),
(8, 'C', 'What is the difference between malloc() and calloc() in the C programming language?\r\nWrite a program to convert a number to a string with the help of sprintf() function in the C library.', 'hard', NULL),
(9, 'C', 'What is the difference between the local and global variables in C?', 'medium', NULL),
(10, 'C', 'What are pointers and their uses?', 'medium', NULL),
(11, 'C', 'What is typedef in C?', 'medium', NULL),
(12, 'C', 'What are loops and how can we create an infinite loop in C?', 'medium', NULL),
(13, 'C', 'What is the difference between type casting and type conversion?', 'medium', NULL),
(14, 'C', 'What are header files and their uses?', 'medium', NULL),
(15, 'C', 'What are functions and their types?', 'medium', NULL),
(16, 'C', 'What is the difference between macro and functions?', 'medium', NULL),
(17, 'C', 'How to convert a string to numbers in C?', 'medium', NULL),
(18, 'C', 'What are reserved keywords?', 'medium', NULL),
(19, 'C', 'What is a structure?', 'medium', NULL),
(20, 'C', 'What is a union?', 'medium', NULL),
(21, 'C', 'What is an l-value and r-value?', 'medium', NULL),
(22, 'Java', 'What is the differenJavae between JDK, JRE, and JVM?', 'medium', NULL),
(23, 'Java', 'Explain public static void main(String args[]).', 'medium', NULL),
(24, 'Java', 'What is the difference between ArrayList and Vector?', 'medium', NULL),
(25, 'Java', 'How does Java achieve platform independence?', 'medium', NULL),
(26, 'Java', 'What is the purpose of garbage collection in Java, and how does it work?', 'medium', NULL),
(27, 'Java', 'What are the new features introduced in Java 8?', 'medium', NULL),
(28, 'Java', 'Explain the concept of lambda expressions in Java 8.', 'hard', NULL),
(29, 'Java', 'What is the Stream API and how is it used in Java 8?', 'medium', NULL),
(30, 'Java', 'Describe the new Date and Time API in Java 8.', 'medium', NULL),
(31, 'Java', 'What is typedef in Java?', 'medium', NULL),
(32, 'Java', 'What are functional interfaces in Java 8?', 'medium', NULL),
(33, 'Java', 'What is the difference between method overloading and method overriding?', 'medium', NULL),
(34, 'Java', 'Explain the concept of synchronization and its importance in Java.', 'medium', NULL),
(35, 'Java', 'What are the types of exceptions in Java?', 'medium', NULL),
(36, 'Java', 'How does the try-with-resources statement work in Java?', 'medium', NULL),
(37, 'Java', 'What is reflection in Java, and why is it used?', 'medium', NULL),
(38, 'Java', 'What is the difference between a process and a thread?', 'medium', NULL),
(39, 'Java', 'Explain the use of the volatile keyword in Java.', 'medium', NULL),
(40, 'Java', 'What are the different ways to create a thread in Java?', 'medium', NULL),
(41, 'Java', 'What is the Executor framework in Java?', 'medium', NULL),
(42, 'Python', 'What is the difference between Python 2 and Python 3?', 'medium', NULL),
(43, 'Python', 'How does memory management work in Python?', 'medium', NULL),
(44, 'Python', 'What are Python decorators and how are they used?', 'medium', NULL),
(45, 'Python', 'Explain list comprehensions with an example.', 'medium', NULL),
(46, 'Python', 'What is the difference between deep copy and shallow copy?', 'medium', NULL),
(47, 'Python', 'How does exception handling work in Python?', 'medium', NULL),
(48, 'Python', 'What are Python\'s built-in data types?', 'medium', NULL),
(49, 'Python', 'Explain the use of the with statement in Python.', 'medium', NULL),
(50, 'Python', 'What are lambda functions and how are they used?', 'medium', NULL),
(51, 'Python', 'What is the difference between __init__ and __new__ in Python?', 'medium', NULL),
(52, 'Python', 'How do you manage packages in Python?', 'medium', NULL),
(53, 'Python', 'What are generators and how do they differ from iterators?', 'medium', NULL),
(54, 'Python', 'Explain the Global Interpreter Lock (GIL) in Python.', 'medium', NULL),
(55, 'Python', 'What are *args and kwargs in Python?', 'medium', NULL),
(56, 'Python', 'How does Python handle memory leaks?', 'medium', NULL),
(57, 'Python', 'What is the purpose of self in Python?', 'medium', NULL),
(58, 'Python', 'How can you optimize the performance of a Python program?', 'medium', NULL),
(59, 'Python', 'What are metaclasses in Python?', 'medium', NULL),
(60, 'Python', 'Explain the difference between == and is operators in Python.', 'medium', NULL),
(61, 'Python', 'What are Python modules and packages?', 'medium', NULL),
(62, 'Python', 'How do you create a virtual environment in Python?', 'medium', NULL),
(63, 'Python', 'What is the difference between range() and xrange() in Python?', 'medium', NULL),
(64, 'Python', 'What are the different ways to read and write files in Python?', 'medium', NULL),
(65, 'Python', 'How do you perform unit testing in Python?', 'medium', NULL),
(66, 'Python', 'What is the difference between @staticmethod and @classmethod in Python?', 'medium', NULL),
(67, 'MySQL', 'What are the different types of SQL commands?', 'medium', NULL),
(68, 'MySQL', 'What is the difference between SQL and MySQL?', 'medium', NULL),
(69, 'MySQL', 'What are primary keys and foreign keys?', 'medium', NULL),
(70, 'MySQL', 'Explain the concept of normalization and denormalization.', 'medium', NULL),
(71, 'MySQL', 'What is a JOIN, and what are the different types of JOINs?', 'medium', NULL),
(72, 'MySQL', 'What is the difference between INNER JOIN and OUTER JOIN?', 'medium', NULL),
(73, 'MySQL', 'How do you use the GROUP BY clause in SQL?', 'medium', NULL),
(74, 'MySQL', 'What is the difference between WHERE and HAVING clauses in SQL?', 'medium', NULL),
(75, 'MySQL', 'What are subqueries, and how are they used in SQL?', 'medium', NULL),
(76, 'MySQL', 'Explain the difference between UNION and UNION ALL in SQL.', 'medium', NULL),
(77, 'MySQL', 'What is an index in SQL, and why is it used?', 'medium', NULL),
(78, 'MySQL', 'What are views in SQL, and how are they used?', 'medium', NULL),
(79, 'MySQL', 'What is a stored procedure in SQL, and how does it differ from a function?', 'medium', NULL),
(80, 'MySQL', 'What are triggers in SQL, and how do they work?', 'medium', NULL),
(81, 'MySQL', 'How do you handle NULL values in SQL?', 'medium', NULL),
(82, 'MySQL', 'What is the difference between DELETE and TRUNCATE commands in SQL?', 'medium', NULL),
(83, 'MySQL', 'What is the ACID property in a database?', 'medium', NULL),
(84, 'Operating System', 'Explain the difference between a process and a thread.', 'medium', NULL),
(85, 'Operating System', 'What is virtual memory in the context of operating systems?', 'medium', NULL),
(86, 'Operating System', 'Describe the various types of scheduling algorithms used in operating systems.', 'medium', NULL),
(87, 'Operating System', 'What are the differences between preemptive and non-preemptive scheduling?', 'medium', NULL),
(88, 'Operating System', 'Explain the role of the kernel in an operating system.', 'medium', NULL),
(89, 'Operating System', 'What is a deadlock? How can it be prevented or avoided?', 'medium', NULL),
(90, 'Operating System', 'Discuss the differences between symmetric multiprocessing (SMP) and asymmetric multiprocessing (AMP).', 'medium', NULL),
(91, 'Operating System', 'What is paging and how does it work in memory management?', 'medium', NULL),
(92, 'Operating System', 'Describe the purpose of the file system in an operating system.', 'medium', NULL),
(93, 'Operating System', 'How does a semaphore work and what is its significance in synchronization?', 'medium', NULL),
(94, 'Operating System', 'Explain the concept of thrashing in the context of virtual memory.', 'medium', NULL),
(95, 'Operating System', 'What is a critical section problem in operating systems?', 'medium', NULL),
(96, 'Operating System', 'How does CPU scheduling contribute to the performance of an operating system?', 'medium', NULL),
(97, 'Operating System', 'Describe the differences between monolithic kernel and microkernel architectures.', 'medium', NULL),
(98, 'Operating System', 'What is a context switch? How does it affect system performance?', 'medium', NULL),
(99, 'Operating System', 'Discuss the advantages and disadvantages of multiprogramming.', 'medium', NULL),
(100, 'Operating System', 'How does a shell work in an operating system? Provide examples of popular shells.', 'medium', NULL),
(101, 'Operating System', 'What is the purpose of device drivers in an operating system?', 'medium', NULL),
(102, 'Operating System', 'Explain the role of interrupts in operating systems and how they enhance efficiency.', 'medium', NULL),
(103, 'Software Engineering', 'How is software engineering different from programming?', 'medium', NULL),
(104, 'Software Engineering', 'Explain the software development life cycle (SDLC) and its phases.', 'medium', NULL),
(105, 'Software Engineering', 'What are the advantages of using version control systems like Git?', 'medium', NULL),
(106, 'Software Engineering', 'Describe the differences between agile and waterfall software development methodologies.', 'medium', NULL),
(107, 'Software Engineering', 'What is the purpose of UML (Unified Modeling Language)? Provide examples of different UML diagrams.', 'medium', NULL),
(108, 'Software Engineering', 'Discuss the importance of software testing in the development process.', 'medium', NULL),
(109, 'Software Engineering', 'How do you handle software requirements gathering and management?', 'medium', NULL),
(110, 'Software Engineering', 'What are design patterns? Provide examples of commonly used design patterns.', 'medium', NULL),
(111, 'Software Engineering', 'Explain the concept of refactoring in software development.', 'medium', NULL),
(112, 'Software Engineering', 'How does continuous integration (CI) and continuous delivery (CD) improve software development?', 'medium', NULL),
(113, 'Software Engineering', 'Describe the role of code reviews in maintaining code quality.', 'medium', NULL),
(114, 'Software Engineering', 'What are the key principles of object-oriented programming (OOP)?', 'medium', NULL),
(115, 'Software Engineering', 'How do you ensure software scalability and performance?', 'medium', NULL),
(116, 'Software Engineering', 'Discuss the importance of documentation in software development.', 'medium', NULL),
(117, 'Software Engineering', 'What is a software framework? Provide examples of popular software frameworks.', 'medium', NULL),
(118, 'Software Engineering', 'Explain the concept of dependency injection and its benefits.', 'medium', NULL),
(119, 'Software Engineering', 'How do you approach debugging and troubleshooting in software development?', 'medium', NULL),
(120, 'Software Engineering', 'What are the differences between functional and non-functional requirements in software engineering?', 'medium', NULL),
(121, 'Software Engineering', 'Describe the concept of software architecture and its components.', 'medium', NULL),
(122, 'Software Engineering', 'How do you handle software maintenance and updates post-deployment?', 'medium', NULL),
(123, 'JavaScript', 'What is JavaScript? How does it differ from Java?', 'medium', NULL),
(124, 'JavaScript', 'Explain the difference between undefined and null in JavaScript.', 'medium', NULL),
(125, 'JavaScript', 'What are closures in JavaScript? Provide an example.', 'medium', NULL),
(126, 'JavaScript', 'Describe the difference between == and === in JavaScript.', 'medium', NULL),
(127, 'JavaScript', 'How does prototypal inheritance work in JavaScript?', 'medium', NULL),
(128, 'JavaScript', 'Explain the concept of event delegation in JavaScript.', 'medium', NULL),
(129, 'JavaScript', 'What are the different ways to create objects in JavaScript? Compare them.', 'medium', NULL),
(130, 'JavaScript', 'How does asynchronous programming work in JavaScript? Provide examples.', 'medium', NULL),
(131, 'JavaScript', 'Discuss the use of promises and async/await in handling asynchronous operations in JavaScript.', 'medium', NULL),
(132, 'JavaScript', 'What is the difference between let, const, and var in JavaScript for variable declaration?', 'medium', NULL),
(133, 'JavaScript', 'How do you handle errors in JavaScript? Discuss try-catch blocks.', 'medium', NULL),
(134, 'JavaScript', 'Explain the concept of hoisting in JavaScript.', 'medium', NULL),
(135, 'JavaScript', 'What is the this keyword in JavaScript? How is it determined?', 'medium', NULL),
(136, 'JavaScript', 'Describe the role of closures in JavaScript and provide examples of their practical use.', 'medium', NULL),
(137, 'JavaScript', 'How does JavaScript handle memory management and garbage collection?', 'medium', NULL),
(138, 'JavaScript', 'Discuss the differences between function declarations and function expressions in JavaScript.', 'medium', NULL),
(139, 'JavaScript', 'Explain the concept of callback functions and provide examples of their usage in JavaScript.', 'medium', NULL),
(140, 'JavaScript', 'What are the new features introduced in ES6 (ECMAScript 2015)? Provide examples.', 'medium', NULL),
(141, 'JavaScript', 'How can you manipulate the DOM (Document Object Model) using JavaScript?', 'medium', NULL),
(142, 'JavaScript', 'Discuss the differences between synchronous and asynchronous JavaScript.', 'medium', NULL),
(143, 'Algorithm', 'Explain the difference between an array and a linked list. When would you use one over the other?', 'medium', NULL),
(144, 'Algorithm', 'Describe the time complexity of searching, inserting, and deleting elements in a binary search tree (BST).', 'medium', NULL),
(145, 'Algorithm', 'What is a hash table? Explain how collision resolution is handled in hash tables.', 'medium', NULL),
(146, 'Algorithm', 'Discuss the difference between a stack and a queue. Provide examples of real-world applications for each.', 'medium', NULL),
(147, 'Algorithm', 'What are the advantages of using a priority queue? Give examples of scenarios where it would be useful.', 'medium', NULL),
(148, 'Algorithm', 'Explain the concept of dynamic programming. Provide an example of a problem that can be solved using dynamic programming.', 'medium', NULL),
(149, 'Algorithm', 'Describe the difference between breadth-first search (BFS) and depth-first search (DFS) algorithms. When would you use each?', 'medium', NULL),
(150, 'Algorithm', 'What is the significance of the Big O notation in algorithm analysis? Provide examples of different time complexities.', 'medium', NULL),
(151, 'Algorithm', 'How does the quicksort algorithm work? Discuss its time complexity and best-case scenario.', 'medium', NULL),
(152, 'Algorithm', 'Explain the concept of memoization in the context of optimizing recursive algorithms.', 'medium', NULL),
(153, 'Algorithm', 'Discuss the difference between greedy algorithms and dynamic programming algorithms. Provide examples of each.', 'medium', NULL),
(154, 'Algorithm', 'What is the traveling salesman problem (TSP)? How would you approach solving it?', 'medium', NULL),
(155, 'Algorithm', 'Explain the concept of a heap data structure. What operations can be performed on a heap?', 'medium', NULL),
(156, 'Algorithm', 'Describe the operation and time complexity of merge sort. Compare it with other sorting algorithms.', 'medium', NULL),
(157, 'Algorithm', 'How does Dijkstra\'s algorithm work? What problem does it solve, and what is its time complexity?', 'medium', NULL),
(158, 'Algorithm', 'Discuss the concept of binary search. What are its advantages and limitations?', 'medium', NULL),
(159, 'Algorithm', 'What is a trie data structure? Where is it commonly used?', 'medium', NULL),
(160, 'Algorithm', 'Explain the concept of graph traversal algorithms. Compare depth-first search (DFS) and breadth-first search (BFS) for graph traversal.', 'medium', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_participants`
--

CREATE TABLE `quiz_participants` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date_of_participation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_participants`
--

INSERT INTO `quiz_participants` (`id`, `student_id`, `quiz_id`, `score`, `date_of_participation`) VALUES
(1, 'ayan2003', 1, 2, '2024-06-13 01:23:54'),
(2, 'ayan2003', 1, 1, '2024-06-13 03:19:57'),
(3, 'ayan2003', 1, 2, '2024-07-23 13:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `qno` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`qno`, `quiz_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(9, 1, 'What does the `sizeof` operator in C return?', 'Size of a variable', 'Size of a data type', 'Size of an array', 'None of the above', 'Size of a data type'),
(10, 1, 'Which keyword is used to define a constant in C?', 'var', 'const', 'constant', 'define', 'const'),
(11, 1, 'What is the format specifier for printing a float variable in C using `printf`?', '%f', '%lf', '%d', '%s', '%f'),
(12, 1, 'In C, which operator is used to dynamically allocate memory?', 'alloc', 'malloc', 'new', 'alloc', 'malloc'),
(13, 1, 'What is the result of `sizeof(char)` in C?', '1', '2', '4', 'Compiler dependent', '1'),
(14, 1, 'Which function is used to read a single character from the standard input in C?', 'scan', 'read', 'getchar', 'scanf', 'getchar'),
(15, 1, 'What does the `continue` statement do in a loop in C?', 'Exits the loop', 'Skips the current iteration and continues with the next iteration', 'Skips all remaining iterations of the loop', 'Restarts the loop from the beginning', 'Skips the current iteration and continues with the next iteration'),
(16, 1, 'Which header file must be included to use functions like `sqrt()` and `pow()` in C?', '<math.h>', '<stdlib.h>', '<stdio.h>', '<conio.h>', '<math.h>'),
(18, 1, 'What is the purpose of `typedef` keyword in C?', 'To define a new data type', 'To declare a variable', 'To include a header file', 'To define constants', 'To define a new data type'),
(19, 1, 'Which type of storage class in C is used for global variables that can be accessed by other files?', 'auto', 'extern', 'static', 'register', 'extern'),
(20, 2, 'What is the output of the following Java code snippet?\n\npublic class Main {\n   public static void main(String[] args) {\n      int x = 5;\n      System.out.println(++x);\n   }\n}', '5', '6', 'Compiler Error', 'Runtime Error', '6'),
(21, 2, 'Which of the following is not a valid Java identifier?', '_underscore', '$dollarsign', '123variable', 'camelCase', '123variable'),
(22, 2, 'What is the default value of a boolean variable in Java?', 'true', 'false', 'null', '0', 'false'),
(23, 2, 'Which keyword is used to prevent method overriding in Java?', 'final', 'static', 'abstract', 'private', 'final'),
(24, 2, 'Which collection class allows you to associate its elements with key values and allows duplicates?', 'HashSet', 'LinkedHashSet', 'TreeSet', 'HashMap', 'HashMap'),
(25, 2, 'Which Java keyword is used to define a subclass?', 'inherit', 'sub', 'extends', 'subclass', 'extends'),
(26, 2, 'What is the output of the following Java code snippet?\n\npublic class Main {\n   public static void main(String[] args) {\n      String str1 = \"Hello\";\n      String str2 = \"Hello\";\n      System.out.println(str1 == str2);\n   }\n}', 'true', 'false', 'Compiler Error', 'Runtime Error', 'true'),
(27, 2, 'Which interface must be implemented by all Java Map implementations?', 'Map', 'Collection', 'Iterable', 'Serializable', 'Map'),
(28, 2, 'What is the purpose of `static` keyword in Java?', 'To define a constant', 'To create threads', 'To access superclass methods', 'To define class-level variables and methods', 'To define class-level variables and methods'),
(29, 2, 'Which exception is thrown by Java Virtual Machine when an attempt is made to access an element of an empty stack?', 'EmptyStackException', 'ArrayIndexOutOfBoundsException', 'NullPointerException', 'NoSuchElementException', 'EmptyStackException'),
(30, 3, 'What is the correct way to create a function in Python?', 'def my_function():', 'function my_function():', 'define my_function():', 'create function my_function():', 'def my_function():'),
(31, 3, 'Which of the following data types is mutable in Python?', 'int', 'float', 'tuple', 'list', 'list'),
(32, 3, 'What will be the output of the following Python code snippet?\n\nx = [1, 2, 3]\nprint(x[1:3])', '[2, 3]', '[1, 2]', '[1, 2, 3]', '[3, 2, 1]', '[2, 3]'),
(33, 3, 'Which method is used to remove an item from a Python dictionary?', 'popitem()', 'remove()', 'discard()', 'pop()', 'pop()'),
(34, 3, 'What is the output of the following Python code snippet?\n\nfor i in range(1, 5):\n    print(i)\nelse:\n    print(\"Done\")', '1\n2\n3\n4\nDone', 'Done\n1\n2\n3\n4', '1\n2\n3\n4', 'Done', '1\n2\n3\n4\nDone'),
(35, 3, 'Which of the following is not a valid way to create a Python virtual environment?', 'python3 -m venv myenv', 'virtualenv myenv', 'conda create -n myenv python=3.8', 'pipenv myenv', 'pipenv myenv'),
(36, 3, 'What does the `pass` statement do in Python?', 'Exits the loop', 'Skips the current iteration and continues with the next iteration', 'Skips all remaining iterations of the loop', 'Does nothing', 'Does nothing'),
(37, 3, 'Which built-in function in Python returns the length of an object?', 'size()', 'len()', 'count()', 'length()', 'len()'),
(38, 3, 'In Python, how do you open a file named \"data.txt\" in read mode?', 'open(\"data.txt\", \"r\")', 'open(\"data.txt\")', 'read(\"data.txt\")', 'file(\"data.txt\", \"read\")', 'open(\"data.txt\", \"r\")'),
(39, 3, 'Which of the following is an example of a Python keyword?', 'lambda', 'function', 'method', 'variable', 'lambda'),
(40, 4, 'Which statement is used to insert new rows into a MySQL table?', 'INSERT INTO', 'INSERT TO', 'ADD INTO', 'ADD TO', 'INSERT INTO'),
(41, 4, 'What SQL keyword is used to sort the result set in descending order?', 'ASC', 'SORT DESC', 'ORDER BY DESC', 'DESC', 'DESC'),
(42, 4, 'Which function is used to find the number of rows that match a specified condition?', 'COUNT()', 'SUM()', 'MAX()', 'AVG()', 'COUNT()'),
(43, 4, 'In MySQL, which type of join returns all rows from both tables, joining where columns match?', 'Inner join', 'Left join', 'Right join', 'Full outer join', 'Inner join'),
(44, 4, 'What is the SQL keyword used to retrieve unique rows from a SELECT query?', 'UNIQUE', 'DISTINCT', 'UNION', 'UNIQUE DISTINCT', 'DISTINCT'),
(45, 4, 'Which statement is used to delete all rows in a table without logging the individual row deletions?', 'DELETE TABLE', 'DROP TABLE', 'TRUNCATE TABLE', 'REMOVE TABLE', 'TRUNCATE TABLE'),
(46, 4, 'What does the SQL keyword `GROUP BY` do?', 'Sorts rows in descending order', 'Groups rows that have the same values into summary rows', 'Filters rows based on a condition', 'Joins two or more tables', 'Groups rows that have the same values into summary rows'),
(47, 4, 'Which SQL command is used to change a column name in a table?', 'UPDATE COLUMN', 'MODIFY COLUMN', 'CHANGE COLUMN', 'ALTER COLUMN', 'CHANGE COLUMN'),
(48, 4, 'What is the default auto-increment starting value for a new MySQL table?', '0', '1', '10', '100', '1'),
(49, 4, 'Which SQL statement is used to make sure that changes made to a table are permanent?', 'COMMIT', 'SAVE', 'APPLY', 'UPDATE', 'COMMIT'),
(50, 5, 'Which data structure operates on a Last In First Out (LIFO) basis?', 'Queue', 'Stack', 'Tree', 'Heap', 'Stack'),
(51, 5, 'What is the time complexity of searching for an element in a binary search tree (BST) in the worst case?', 'O(1)', 'O(log n)', 'O(n)', 'O(n log n)', 'O(log n)'),
(52, 5, 'Which data structure can be used to implement a LIFO list?', 'Queue', 'Stack', 'Linked List', 'Heap', 'Stack'),
(53, 5, 'In a priority queue, which element is removed first?', 'Smallest element', 'Largest element', 'First element inserted', 'Last element inserted', 'Smallest element'),
(54, 5, 'What data structure uses the concept of nodes and edges to represent relationships between entities?', 'Stack', 'Queue', 'Tree', 'Graph', 'Graph'),
(55, 5, 'Which search algorithm requires a sorted array?', 'Depth First Search (DFS)', 'Breadth First Search (BFS)', 'Linear Search', 'Binary Search', 'Binary Search'),
(56, 5, 'Which data structure allows you to efficiently find the maximum and minimum elements?', 'Heap', 'Tree', 'Queue', 'Stack', 'Heap'),
(57, 5, 'What is the time complexity of inserting an element at the beginning of an array (assuming it is not full)?', 'O(1)', 'O(log n)', 'O(n)', 'O(n log n)', 'O(n)'),
(58, 5, 'Which data structure allows you to access its elements in FIFO (First In First Out) order?', 'Stack', 'Priority Queue', 'Heap', 'Queue', 'Queue'),
(59, 5, 'What is the main advantage of using a hash table data structure?', 'It allows elements to be sorted', 'It allows elements to be accessed in any order', 'It provides constant time complexity for search, insert, and delete operations on average', 'It guarantees elements are unique', 'It provides constant time complexity for search, insert, and delete operations on average'),
(60, 6, 'What is the time complexity of binary search algorithm in the worst case?', 'O(1)', 'O(log n)', 'O(n)', 'O(n log n)', 'O(log n)'),
(61, 6, 'Which sorting algorithm has the worst-case time complexity of O(n^2)?', 'Merge Sort', 'Heap Sort', 'Quick Sort', 'Bubble Sort', 'Bubble Sort'),
(62, 6, 'Which algorithm is used to find the shortest path in a weighted graph with non-negative weights?', 'Depth First Search (DFS)', 'Breadth First Search (BFS)', 'Dijkstra\'s Algorithm', 'Prim\'s Algorithm', 'Dijkstra\'s Algorithm'),
(63, 6, 'What does Big-O notation describe?', 'Best-case performance of an algorithm', 'Average-case performance of an algorithm', 'Worst-case performance of an algorithm', 'All of the above', 'Worst-case performance of an algorithm'),
(64, 6, 'Which algorithm is used to find the strongly connected components in a directed graph?', 'Bellman-Ford Algorithm', 'Floyd-Warshall Algorithm', 'Kruskal\'s Algorithm', 'Tarjan\'s Algorithm', 'Tarjan\'s Algorithm'),
(65, 6, 'What is the main purpose of dynamic programming approach?', 'To solve optimization problems by breaking them down into simpler subproblems and storing their solutions', 'To solve problems by trying all possibilities and choosing the best one', 'To find the shortest path in a graph', 'To sort elements in an array', 'To solve optimization problems by breaking them down into simpler subproblems and storing their solutions'),
(66, 6, 'Which algorithm is used to find the maximum flow in a flow network?', 'Dijkstra\'s Algorithm', 'Prim\'s Algorithm', 'Ford-Fulkerson Algorithm', 'Kruskal\'s Algorithm', 'Ford-Fulkerson Algorithm'),
(67, 6, 'In which data structure is Breadth First Search (BFS) typically used?', 'Stack', 'Queue', 'Heap', 'Tree', 'Queue'),
(68, 6, 'Which algorithm is used to find the minimum spanning tree in a connected, undirected graph?', 'Prim\'s Algorithm', 'Dijkstra\'s Algorithm', 'Bellman-Ford Algorithm', 'Kruskal\'s Algorithm', 'Prim\'s Algorithm'),
(69, 6, 'What is the time complexity of the Quick Sort algorithm in the worst case?', 'O(1)', 'O(log n)', 'O(n)', 'O(n^2)', 'O(n^2)'),
(70, 8, 'What is the main purpose of software requirements specification (SRS)?', 'To specify the hardware requirements for the software', 'To describe the software system to be developed in detail', 'To outline the testing procedures for the software', 'To document the software development process', 'To describe the software system to be developed in detail'),
(71, 8, 'Which software development model is known for its linear and sequential nature?', 'Agile model', 'Spiral model', 'Waterfall model', 'Scrum model', 'Waterfall model'),
(72, 8, 'What is the purpose of version control systems (VCS) in software development?', 'To manage different versions of software releases', 'To control access to software repositories', 'To automate software testing', 'To monitor software performance', 'To manage different versions of software releases'),
(73, 8, 'Which software testing technique involves testing individual modules or units of a software?', 'Integration testing', 'System testing', 'Unit testing', 'Acceptance testing', 'Unit testing'),
(74, 8, 'What is the primary goal of the Agile software development methodology?', 'To deliver software frequently, with shorter development cycles', 'To deliver software with a focus on comprehensive documentation', 'To deliver software following a strict sequential process', 'To deliver software with a fixed scope and schedule', 'To deliver software frequently, with shorter development cycles'),
(75, 8, 'Which software engineering principle promotes breaking down complex problems into smaller manageable parts?', 'Encapsulation', 'Abstraction', 'Modularity', 'Inheritance', 'Modularity'),
(76, 8, 'What does the term \"UML\" stand for in software engineering?', 'Unified Modeling Language', 'Universal Modeling Language', 'Uniform Modeling Language', 'Unlimited Modeling Language', 'Unified Modeling Language'),
(77, 8, 'Which software development practice emphasizes continuous integration and continuous delivery (CI/CD)?', 'DevOps', 'Scrum', 'Kanban', 'Extreme Programming (XP)', 'DevOps'),
(78, 8, 'What is the purpose of a use case diagram in UML?', 'To describe the interactions between users and the system', 'To depict the flow of data within the system', 'To specify the system architecture', 'To model the behavior of individual classes', 'To describe the interactions between users and the system'),
(79, 8, 'Which software development principle states that a software system should be open for extension but closed for modification?', 'KISS (Keep It Simple, Stupid)', 'DRY (Don\'t Repeat Yourself)', 'YAGNI (You Aren\'t Gonna Need It)', 'OCP (Open-Closed Principle)', 'OCP (Open-Closed Principle)'),
(80, 9, 'Which component of an operating system is responsible for managing memory?', 'Kernel', 'Shell', 'Scheduler', 'Memory Manager', 'Memory Manager'),
(81, 9, 'What is the purpose of a context switch in an operating system?', 'To save and restore the state of a process or thread', 'To allocate memory for new processes', 'To schedule processes for execution', 'To terminate processes', 'To save and restore the state of a process or thread'),
(82, 9, 'Which scheduling algorithm provides the highest average turnaround time?', 'Round Robin', 'First Come, First Served (FCFS)', 'Shortest Job Next (SJN)', 'Shortest Remaining Time First (SRTF)', 'First Come, First Served (FCFS)'),
(83, 9, 'What is a deadlock in the context of operating systems?', 'A situation where two or more processes are waiting indefinitely for resources held by each other', 'A situation where a process is terminated due to an error', 'A situation where a process is waiting for a resource that is available', 'A situation where a process is consuming excessive CPU resources', 'A situation where two or more processes are waiting indefinitely for resources held by each other'),
(84, 9, 'Which memory management scheme allows the operating system to relocate processes to different memory locations?', 'Static Partitioning', 'Dynamic Partitioning', 'Paging', 'Segmentation', 'Dynamic Partitioning'),
(85, 9, 'What is the purpose of an interrupt in operating systems?', 'To stop the execution of a process', 'To terminate the operating system', 'To provide communication between processes', 'To signal the occurrence of an event that needs immediate attention', 'To signal the occurrence of an event that needs immediate attention'),
(86, 9, 'Which algorithm is used to prevent starvation in scheduling processes?', 'Round Robin', 'First Come, First Served (FCFS)', 'Priority Scheduling', 'Shortest Job Next (SJN)', 'Priority Scheduling'),
(87, 9, 'What does the term \"paging\" refer to in operating systems?', 'Breaking down a program into small parts called pages', 'Organizing memory into fixed-size blocks', 'Swapping out entire processes from memory to disk', 'Allocating memory dynamically at runtime', 'Breaking down a program into small parts called pages'),
(88, 9, 'Which mechanism is used to protect memory and resources in a multi-programming environment?', 'Process Synchronization', 'Process Management', 'Process Control', 'Process Preemption', 'Process Synchronization'),
(89, 9, 'What is the role of the File Allocation Table (FAT) in file systems?', 'To manage virtual memory', 'To map physical addresses to virtual addresses', 'To keep track of free and allocated disk space', 'To store the contents of files', 'To keep track of free and allocated disk space'),
(90, 10, 'Which type of key uniquely identifies a record within a table?', 'Primary Key', 'Foreign Key', 'Super Key', 'Candidate Key', 'Primary Key'),
(91, 10, 'In a relational database, which language is used to manipulate and query data?', 'C', 'C++', 'Java', 'SQL', 'SQL'),
(92, 10, 'What is the purpose of the JOIN operation in SQL?', 'To create a new table from existing tables', 'To select specific columns from a table', 'To combine rows from two or more tables based on related columns', 'To update existing records in a table', 'To combine rows from two or more tables based on related columns'),
(93, 10, 'Which normal form deals with the problem of non-prime attributes that are dependent on other non-prime attributes?', 'First Normal Form (1NF)', 'Second Normal Form (2NF)', 'Third Normal Form (3NF)', 'Boyce-Codd Normal Form (BCNF)', 'Boyce-Codd Normal Form (BCNF)'),
(94, 10, 'What does ACID stand for in the context of database transactions?', 'Atomicity, Consistency, Isolation, Durability', 'Aggregation, Consistency, Isolation, Durability', 'Atomicity, Consistency, Integrity, Durability', 'Atomicity, Concurrency, Isolation, Durability', 'Atomicity, Consistency, Isolation, Durability'),
(95, 10, 'Which SQL command is used to add new rows of data to a table?', 'INSERT INTO', 'ADD ROW', 'UPDATE', 'ALTER TABLE', 'INSERT INTO'),
(96, 10, 'In database terminology, what is a transaction?', 'A set of instructions to delete records from a table', 'A unit of work that is performed against a database', 'A process of optimizing query performance', 'A type of table used to store temporary data', 'A unit of work that is performed against a database'),
(97, 10, 'Which type of join returns all rows from both tables, joining where conditions are met and including unmatched rows from one or both tables?', 'Inner Join', 'Left Join', 'Right Join', 'Full Outer Join', 'Full Outer Join'),
(98, 10, 'What is the purpose of the GROUP BY clause in SQL?', 'To filter rows based on a condition', 'To sort rows in ascending order', 'To join tables based on a specified condition', 'To group rows that have the same values into summary rows', 'To group rows that have the same values into summary rows'),
(99, 10, 'Which type of index in a database is stored physically on disk with the data rows?', 'Clustered Index', 'Non-clustered Index', 'Unique Index', 'Primary Index', 'Clustered Index');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_sets`
--

CREATE TABLE `quiz_sets` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quiz_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_sets`
--

INSERT INTO `quiz_sets` (`id`, `category`, `quiz_name`) VALUES
(1, 'C', 'Quiz of C Programming #1'),
(2, 'Java', 'Quiz of Java Programming #1'),
(3, 'Python', 'Quiz of Python Programming #1'),
(4, 'MySQL', 'Quiz of MySQL #1'),
(5, 'Data Structure', 'Quiz of Data Structures #1'),
(6, 'Algorithm', 'Quiz of Algorithms #1'),
(8, 'Software Engineering', 'Quiz of Software Engineering #1'),
(9, 'Operating System', 'Quiz of Operating Systems #1'),
(10, 'DBMS', 'Quiz of DBMS #1'),
(11, 'C', 'Class Test For C Programing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fullname`, `email`) VALUES
('avoy954', 'Nirmalya Adak', 'nirmalya@gmail.com'),
('ayan200', 'AYAN KOLEY', 'ayankoley339@gmail.com'),
('ayan2003', 'AYAN KOLEY', 'ayankoley339@gmail.com'),
('ayan201', 'AYAN KOLEY', 'ayankoley339@gmail.com'),
('ayan339', 'AYAN KOLEY', 'ayankoley339@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `vid` int(11) NOT NULL,
  `link` varchar(300) NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `thumbnail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`vid`, `link`, `category`, `title`, `description`, `thumbnail`) VALUES
(1, 'https://www.youtube.com/embed/EjavYOFoJJ0?si=plPl1XiLlyqLEEAj', 'C', 'Introduction to C Language | C Programming Tutorials', 'What is Programming & Program?\r\nNeed of programming? \r\nWhy we write Programs?\r\n', '../../admin/videos/thumbnail/c.jpg'),
(2, 'https://www.youtube.com/embed/7Dh73z3icd8?si=8OSnDkQI6A7pt03S', 'c', 'Why Learn C Programming Language? : C Tutorial In Hindi #1', '', '../../admin/videos/thumbnail/c.jpg'),
(3, 'https://www.youtube.com/embed/Wa-kgmSLls4?si=a1Pfx170_U0pFmXp', 'c', 'What Is Coding & C Programming Language? : C Tutorial In Hindi #2', '', '../../admin/videos/thumbnail/c.jpg'),
(4, 'https://www.youtube.com/embed/9xCskNFVt2c?si=HqhHdUcklJeQWKJe', 'c', 'Install & Configure VS Code With C Compiler: C Tutorial In Hindi #3', '', '../../admin/videos/thumbnail/c.jpg'),
(16, 'https://www.youtube.com/embed/5SIBB589fAg?si=BmeV34y2glKvhdm0', 'c', 'Basic Structure of C Program in Hindi: C Tutorial In Hindi #4', 'n this video, I have explained about the basic structure of  C program and how C program works in Hindi.\r\n►This C Lecture is a part of this C Programming Course:   \r\n\r\n • C Language Tutorials In Hindi  \r\n►Source Code + Notes: https://codewithharry.com/videos/c-la...\r\n\r\n►Click here to subscribe -   \r', '../../admin/videos/thumbnail/c.jpg'),
(17, 'https://www.youtube.com/embed/PrVOM7M5nEY?si=C7D7y07YU-diPTWp', 'C', 'Basic Syntax Of A C Program: C Tutorial In Hindi #5', 'C Language Tutorial for Beginners', '../../admin/videos/thumbnail/c.jpg'),
(18, 'https://www.youtube.com/embed/ERCMXc8x7mc?si=JL7_QKQsd0XIwItx', 'python', 'Python Tutorial for Beginners - Full Course (with Notes & Practice Questions)', '', '../../admin/videos/thumbnail/python.jpg'),
(19, 'https://www.youtube.com/embed/EcUGDTs4RyY?si=NUhOBuKOUCSBcR-H', 'c', 'Variables & Data Types In C: C Tutorial In Hindi #6', '', '../../admin/videos/thumbnail/c.jpg'),
(20, 'https://www.youtube.com/embed/V4Wwuu05_t4?si=9sR0TbWvP3QQYQOK', 'c', 'Operators In C: C Tutorial In Hindi #7', '', '../../admin/videos/thumbnail/c.jpg'),
(21, 'https://www.youtube.com/embed/c3Pd1xQlfWE?si=1fHQYDqizFeMrt9A', 'c', 'C Programming Exercise 1 - Multiplication Tables: C Tutorial In Hindi #8', '', '../../admin/videos/thumbnail/c.jpg'),
(22, 'https://www.youtube.com/embed/XETsCR2bXJI?si=aP1xxognQDiuD0f7', 'c', 'C Format Specifiers and Escape Sequences With Examples: C Tutorial In Hindi #9', '', '../../admin/videos/thumbnail/c.jpg'),
(23, 'https://www.youtube.com/embed/D0ACZ0uU_2g?si=RVlR3MVNt7xRsWYM', 'c', 'If Else Control Statements In C: C Tutorial In Hindi #10', '', '../../admin/videos/thumbnail/c.jpg'),
(24, 'https://www.youtube.com/embed/E8weUIY2-iw?si=jLwAmgMZo5_fp8W_', 'c', 'Switch Case Control Statements In C: C Tutorial In Hindi #11', '', '../../admin/videos/thumbnail/c.jpg'),
(25, 'https://www.youtube.com/embed/A_IgufxmIHk?si=1ASACVac7jsINthU', 'c', 'Loops In C: C Tutorial In Hindi #12', '', '../../admin/videos/thumbnail/c.jpg'),
(26, 'https://www.youtube.com/embed/S2z0OTZoziI?si=0GA7-8GYdHJ-rVzo', 'c', 'Do While Loop In C: C Tutorial In Hindi #13', '', '../../admin/videos/thumbnail/c.jpg'),
(27, 'https://www.youtube.com/embed/0KzWpgMLDmk?si=wrLmFJQ7_ZEfFy36', 'c', 'While Loop In C: C Tutorial In Hindi #14', '', '../../admin/videos/thumbnail/c.jpg'),
(28, 'https://www.youtube.com/embed/T5_qpdDtTZ0?si=2-Fu5XbxCrOdql2V', 'c', 'For Loop In C: C Tutorial In Hindi #15', '', '../../admin/videos/thumbnail/c.jpg'),
(29, 'https://www.youtube.com/embed/xfgxws0_Tec', 'c', 'Dynamic Memory Allocation in C: malloc and calloc: C Tutorial In Hindi #16', '', '../../admin/videos/thumbnail/c.jpg'),
(30, 'https://www.youtube.com/embed/q8j8EqCZcWM?si=mTCwZYFXihLMVewm', 'c', 'Dynamic Memory Allocation in C: malloc and calloc: C Tutorial In Hindi #16', '', '../../admin/videos/thumbnail/c.jpg'),
(31, 'https://www.youtube.com/embed/NrOVuMgJMCM', 'c', 'Realloc & Free in C: Dynamic Memory Allocation: C Tutorial In Hindi #17', '', '../../admin/videos/thumbnail/c.jpg'),
(32, 'https://www.youtube.com/embed/P5TdIWxYz4I?si=w9dmcXHM1zWGBBIj', 'c', 'Recursion in C: C Tutorial In Hindi #18', '', '../../admin/videos/thumbnail/c.jpg'),
(33, 'https://www.youtube.com/embed/P5TdIWxYz4I?si=Rd9rsCuAw0fsl7kj', 'c', 'Recursion vs Iteration: C Tutorial In Hindi #19', '', '../../admin/videos/thumbnail/c.jpg'),
(34, 'https://www.youtube.com/embed/qKFBtCPwjgI?si=okKrFaUZyGUc9iVc', 'c', 'Introduction to Arrays in C: C Tutorial In Hindi #20', '', '../../admin/videos/thumbnail/c.jpg'),
(35, 'https://www.youtube.com/embed/36z4qgN3GWw?si=xeOSc-3WuY7Qgvwp', 'c', 'Multidimensional Arrays in C: C Tutorial In Hindi #21', '', '../../admin/videos/thumbnail/c.jpg'),
(36, 'https://www.youtube.com/embed/IBjGjDbwxSg?si=ZcHPRX7wsHbKWMdq', 'c', 'Pointers in C: C Tutorial In Hindi #22', '', '../../admin/videos/thumbnail/c.jpg'),
(37, 'https://www.youtube.com/embed/fltaqGek-oA?si=3F_kxYdPP_6DR-cE', 'c', 'Introduction to Strings in C: C Tutorial In Hindi #23', '', '../../admin/videos/thumbnail/c.jpg'),
(38, 'https://www.youtube.com/embed/fltaqGek-oA?si=hYc6cIOz8DCyGupU', 'c', 'String Functions in C: C Tutorial In Hindi #24', '', '../../admin/videos/thumbnail/c.jpg'),
(39, 'https://www.youtube.com/embed/fltaqGek-oA?si=k6Cau1YQE_ZZFN7M', 'c', 'Structures in C: C Tutorial In Hindi #25', '', '../../admin/videos/thumbnail/c.jpg'),
(40, 'https://www.youtube.com/embed/C3zS6WPxHPY?si=-A6Y9qUMNQtHJ219', 'c', 'Unions in C: C Tutorial In Hindi #26', '', '../../admin/videos/thumbnail/c.jpg'),
(41, 'https://www.youtube.com/embed/C286MZpbNl8?si=M1jHkcBGQZQ1w4iH', 'c', 'File I/O in C: C Tutorial In Hindi #27', '', '../../admin/videos/thumbnail/c.jpg'),
(42, 'https://www.youtube.com/embed/CMkymwLBSyg?si=jPVg5ccD_YHoER_a', 'c', 'Command Line Arguments in C: C Tutorial In Hindi #28', '', '../../admin/videos/thumbnail/c.jpg'),
(43, 'https://www.youtube.com/embed/P9IAfh89EK8?si=QW4wOhIsU6ekq5aG', 'c', 'Preprocessors in C: C Tutorial In Hindi #29', '', '../../admin/videos/thumbnail/c.jpg'),
(44, 'https://www.youtube.com/embed/H7T1utn3lvk?si=_KRxfDVsJGgwFIN9', 'c', 'Macros in C: C Tutorial In Hindi #30', '', '../../admin/videos/thumbnail/c.jpg'),
(45, 'https://www.youtube.com/embed/WPZkTCKwVcA', 'c', 'Standard Library Functions in C: C Tutorial In Hindi #31', '', '../../admin/videos/thumbnail/c.jpg'),
(46, 'https://www.youtube.com/embed/YYXdXT2l-Gg', 'python', 'Python Tutorial: install python', '', '../../admin/videos/thumbnail/python.jpg'),
(47, 'https://www.youtube.com/embed/6soT3DMBJGQ?si=_5zwyS739wdKg2a1', 'python', 'Object Oriented Programming in python', '', '../../admin/videos/thumbnail/python.jpg'),
(48, 'https://www.youtube.com/embed/F64_bwahaWQ?si=8sKQfG_T0LejVsec', 'python', 'Compiled vs Interpreted Programming Languages | What’s the Difference?', '', '../../admin/videos/thumbnail/python.jpg'),
(49, 'https://www.youtube.com/embed/UfFWf-PXUqE?si=I_oGrJzJ2ZTdwFRj', 'python', 'Lambda functions in Python | Python Tutorial ', '', '../../admin/videos/thumbnail/python.jpg'),
(50, 'https://www.youtube.com/embed/5KEObONUkik?si=gOnQFWPotZtwVusd', 'python', 'How to Build a Complete Python Package Step-by-Step', '', '../../admin/videos/thumbnail/python.jpg'),
(51, 'https://www.youtube.com/embed/0yySumZTxJ0?si=ZFPmbkSc5qA3u5Dl', 'python', 'ALL 11 LIST METHODS IN PYTHON EXPLAINED', '', '../../admin/videos/thumbnail/python.jpg'),
(52, 'https://www.youtube.com/embed/r3R3h5ly_8g?si=PiziyGfFZiknkBSw', 'python', 'Python Tutorial: Sets - Set Methods and Operations to Solve Common Problems', '', '../../admin/videos/thumbnail/python.jpg'),
(53, 'https://www.youtube.com/embed/pZq3trxavlk?si=k_4TzP_uRCwgQxYg', 'python', 'Thread and Multithreading in Python (Hindi)', '', '../../admin/videos/thumbnail/python.jpg'),
(54, 'https://www.youtube.com/embed/YuT_t21EXkc?si=j7xvI8OIR2ZWHtFT', 'python', 'Memory Management in Python | Stack vs Dynamic Memory | Advanced Python Tutorial', '', '../../admin/videos/thumbnail/python.jpg'),
(55, 'https://www.youtube.com/embed/CaHIm5LZJt8?si=La1C0XxSMKAkVt58', 'python', 'Garbage Collection in Python', '', '../../admin/videos/thumbnail/python.jpg'),
(56, 'https://www.youtube.com/embed/naG4uXpmVAU?si=6gFH3NtTaJ_e47Ir', 'python', 'Shallow and Deep Copy Python Programming Tutorial', '', '../../admin/videos/thumbnail/python.jpg'),
(57, 'https://www.youtube.com/embed/eIrMbAQSU34?si=2mMlr8vJuxPWKcw3', 'java', 'Java crash course', NULL, NULL),
(58, 'https://www.youtube.com/embed/rzA7UJ-hQn4?si=lAVNj6H-NOTpkbuf', 'java', 'Java Collection Framework (Very Important)', NULL, NULL),
(59, 'https://www.youtube.com/embed/a199KZGMNxk?si=7w_cEnLwcKXsMtzZ', 'java', 'Java OOPS (Very Important)', NULL, NULL),
(60, 'https://www.youtube.com/embed/hvBOZQCvqac?si=KYnjVsF7dwEJmXjy', 'java', 'Is Java 100% Object oriented', NULL, NULL),
(61, 'https://www.youtube.com/embed/RLInHtq9j2w?si=bstUQ3vREG-sNA4f', 'java', 'Difference between final, finally and finalize keywords', NULL, NULL),
(62, 'https://www.youtube.com/embed/C5kOrWzv2O8?si=7IXQCwRC-NdNE1fv', 'java', 'Why Java doesn’t have concepts of pointers like C/C++', NULL, NULL),
(63, 'https://www.youtube.com/embed/85lrlPrvrAw?si=V1LAHeZlbzbKeCmX', 'java', 'How to make a class immutable', NULL, NULL),
(64, 'https://www.youtube.com/embed/s7UgQ7_1KQY?si=tXqb_7PXAQSRrpLe', 'java', 'Difference between JDK, JRE and JRM', NULL, NULL),
(65, 'https://www.youtube.com/embed/NHrsLjhjmi4?si=hpGNfzsNftIFL2C_', 'java', 'What is a JIT compiler', NULL, NULL),
(66, 'https://www.youtube.com/embed/DxqcnIytTko?si=aUvcASPoy80KUIo-', 'java', 'What is a singleton class? How to make a class singleton', NULL, NULL),
(67, 'https://www.youtube.com/embed/FvN5BWrEWx0?si=_lqRDvSzV-TEW1Wb', 'java', 'Difference between process and threads', NULL, NULL),
(68, 'https://www.youtube.com/embed/Bj9Mx_Lx3q4?si=jZxAE0Zunb9e4K64', 'java', 'Why is string immutable in Java', NULL, NULL),
(69, 'https://www.youtube.com/embed/WQ4aA4-MESE?si=lDY12cO02WVqn8UD', 'java', 'What is difference between StringBuffer and StringBuilder', NULL, NULL),
(70, 'https://www.youtube.com/embed/Fyc86kVIePE?si=xqiB138a2ESVYVUi', 'java', 'What is a wrapper class', NULL, NULL),
(71, 'https://www.youtube.com/embed/qZEFslUVfx0?si=povl-CwgWEfvtjMy', 'java', 'Difference between Abstract Classes and Interfaces', NULL, NULL),
(72, 'https://www.youtube.com/embed/gTn48ZpeWOs?si=_dC3vUYZpuMghwhn', 'java', 'Different types of interfaces', NULL, NULL),
(73, 'https://www.youtube.com/embed/HnaVobvfSyc?si=rfM1lLSer0-WOnlR', 'java', 'Why does java not support multiple inheritance', NULL, NULL),
(74, 'https://www.youtube.com/embed/9O9tTS6LseI?si=Tlsbko3G9eBnSsJX', 'java', 'Java Thread lifecycle', NULL, NULL),
(75, 'https://www.youtube.com/embed/hlGoQC332VM?si=TjyxcBJ3cMO14FIr', 'MySQL', 'SQL crash course', NULL, NULL),
(76, 'https://leetcode.com/studyplan/top-sql-50/', 'MySQL', 'SQL Practice Questions (Important)', NULL, NULL),
(77, 'https://www.youtube.com/embed/-GS0OxFJsYQ?si=uTMWj2dCeIwDLR0J', 'MySQL', 'What are ACID properties?', NULL, NULL),
(78, 'https://www.youtube.com/embed/I_PrZ1NHZr8?si=RL-3-lgf_xwyv7hI', 'MySQL', 'What are levels of abstractions in DB?', NULL, NULL),
(79, 'https://www.youtube.com/embed/O1bi5MjqsAc?si=MhHVuqAQgXyulP1B', 'MySQL', 'What are different types of relationships in SQL?', NULL, NULL),
(80, 'https://www.youtube.com/embed/t5hsV9lC1rU?si=TVWsW8oh0U_SaXBd', 'MySQL', 'What is concurrency control?', NULL, NULL),
(81, 'https://www.youtube.com/embed/GFQaEYEc8_8?si=S2yIjfrNYJ5OUUnK', 'MySQL', 'What is normalization, and different types of normalization?', NULL, NULL),
(82, 'https://www.youtube.com/embed/GFQaEYEc8_8?si=S2yIjfrNYJ5OUUnK', 'MySQL', 'What is denormalization?', NULL, NULL),
(83, 'https://www.youtube.com/embed/p3yJZH8_bsc?si=GDjioieHSmQCk071', 'MySQL', 'What are different types of keys?', NULL, NULL),
(84, 'https://www.youtube.com/embed/Tq8oCFjP6kQ?si=ZAhXghkQx97FaDKn', 'MySQL', 'What is ETL in SQL?', NULL, NULL),
(85, 'https://www.youtube.com/embed/uPOGPL2C0_8?si=D6oRdfRzSvFvC0kV', 'MySQL', 'Explain different types of constraints', NULL, NULL),
(86, 'https://www.youtube.com/embed/_m1aJdD-oD8?si=X990_ylljmSgmgW-', 'MySQL', 'What is difference between drop, truncate and delete commands', NULL, NULL),
(87, 'https://www.youtube.com/embed/UPko6Lqm17o?si=Z9Go7aKIyVUM95JP', 'MySQL', 'What is a view and how is it different from a table?', NULL, NULL),
(88, 'https://www.youtube.com/embed/H6988OpZKTU?si=j-BO4rLhDl9Pwk41', 'MySQL', 'What is purpose of joins and types of joins?', NULL, NULL),
(89, 'https://www.youtube.com/embed/t5hsV9lC1rU?si=jyl4ckn-mOPkrrCc', 'MySQL', 'What is a database transaction?', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_userid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `username` (`username`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `favourite_videos`
--
ALTER TABLE `favourite_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vid` (`vid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quiz_participants`
--
ALTER TABLE `quiz_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`qno`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz_sets`
--
ALTER TABLE `quiz_sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favourite_videos`
--
ALTER TABLE `favourite_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `quiz_participants`
--
ALTER TABLE `quiz_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `qno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `quiz_sets`
--
ALTER TABLE `quiz_sets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactus`
--
ALTER TABLE `contactus`
  ADD CONSTRAINT `contactus_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `favourite_videos`
--
ALTER TABLE `favourite_videos`
  ADD CONSTRAINT `favourite_videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `favourite_videos_ibfk_2` FOREIGN KEY (`vid`) REFERENCES `video` (`vid`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `quiz_participants`
--
ALTER TABLE `quiz_participants`
  ADD CONSTRAINT `quiz_participants_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `quiz_participants_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz_sets` (`id`);

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz_sets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

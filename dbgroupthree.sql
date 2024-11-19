-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 11:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgroupthree`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_ISBN` bigint(20) NOT NULL,
  `Book_Title` varchar(50) DEFAULT NULL,
  `Book_Author` varchar(50) DEFAULT NULL,
  `Genre` varchar(50) DEFAULT NULL,
  `Publication_Date` date DEFAULT NULL,
  `Number_of_copies` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_ISBN`, `Book_Title`, `Book_Author`, `Genre`, `Publication_Date`, `Number_of_copies`) VALUES
(9780131101649, 'Algorithm Design', 'Jon Kleinberg', 'Computer Science', '2005-02-18', 5),
(9780131103625, 'Algorithms Unlocked', 'Thomas H. Cormen', 'Computer Science', '2013-03-19', 9),
(9780132121364, 'Applied Cryptography', 'Bruce Schneier', 'Computer Security', '1996-12-19', 5),
(9781119282716, 'Applied Data Science', 'Zhenya Liu', 'Data Science', '2016-12-08', 5),
(9780262033849, 'Artificial Intelligence: A Modern Approach', 'Stuart Russell', 'Computer Science', '2010-12-11', 7),
(9780321635881, 'Big Data: Principles and Best Practices', 'Nathan Marz', 'Data Science', '2013-10-20', 3),
(9780132350891, 'Clean Code', 'Robert C. Martin', 'Software Engineering', '2008-08-01', 4),
(9780262041232, 'Computational Geometry', 'Mark de Berg', 'Computer Science', '2008-06-23', 3),
(9780132121361, 'Computer Architecture: A Quantitative Approach', 'John L. Hennessy', 'Computer Science', '2011-09-16', 7),
(9780131103641, 'Computer Networks', 'Andrew S. Tanenbaum', 'Networking', '2010-02-23', 8),
(9780321832054, 'Cracking the Coding Interview', 'Gayle Laakmann McDowell', 'Career', '2015-07-01', 8),
(9781491929464, 'Data Mining: Practical Machine Learning Tools and ', 'Ian H. Witten', 'Data Science', '2016-01-14', 7),
(9781449358622, 'Data Science for Business', 'Foster Provost', 'Data Science', '2013-08-06', 6),
(9781491901420, 'Data Science from Scratch', 'Joel Grus', 'Data Science', '2019-04-12', 4),
(9780136091820, 'Database System Concepts', 'Abraham Silberschatz', 'Computer Science', '2010-01-28', 8),
(9780321862967, 'Deep Learning', 'Ian Goodfellow', 'Artificial Intelligence', '2016-11-18', 8),
(9781492046852, 'Deep Learning with Python', 'François Chollet', 'Artificial Intelligence', '2017-12-20', 3),
(9780201633627, 'Design Patterns', 'Erich Gamma', 'Software Engineering', '1994-10-21', 9),
(9780329434741, 'Designing Data-Intensive Applications', 'Martin Kleppmann', 'Data Science', '2017-03-05', 7),
(9780134686090, 'Effective Java', 'Joshua Bloch', 'Programming', '2018-01-06', 6),
(9780131101631, 'Engineering a Compiler', 'Keith D. Cooper', 'Computer Science', '2011-09-13', 4),
(9781491957665, 'Fluent Python', 'Luciano Ramalho', 'Programming', '2015-08-20', 3),
(9781449330735, 'Hadoop: The Definitive Guide', 'Tom White', 'Data Science', '2015-03-14', 7),
(9780596009205, 'Head First Java', 'Kathy Sierra', 'Programming', '2005-02-09', 12),
(9780131103634, 'Introduction to Algorithms', 'Thomas H. Cormen', 'Computer Science', '2009-07-31', 10),
(9780131103630, 'Introduction to Automata Theory', 'John E. Hopcroft', 'Computer Science', '2006-01-16', 6),
(9780134167961, 'Introduction to Machine Learning', 'Ethem Alpaydin', 'Artificial Intelligence', '2014-06-28', 6),
(9780131871257, 'Introduction to Parallel Computing', 'Ananth Grama', 'Parallel Computing', '2003-02-10', 5),
(9780134861620, 'Introduction to the Finite Element Method', 'Chandrupatla', 'Engineering', '2011-02-08', 3),
(9780262033848, 'Introduction to the Theory of Computation', 'Michael Sipser', 'Computer Science', '2012-01-27', 5),
(9780134679658, 'Java: The Complete Reference', 'Herbert Schildt', 'Programming', '2017-11-05', 9),
(9780596517748, 'JavaScript: The Good Parts', 'Douglas Crockford', 'Web Development', '2008-05-15', 7),
(9780596007126, 'Learning Python', 'Mark Lutz', 'Programming', '2013-10-15', 10),
(9781449325864, 'Learning R', 'Richard Cotton', 'Data Science', '2013-09-27', 6),
(9781491900863, 'Learning SQL', 'Alan Beaulieu', 'Database Systems', '2009-09-10', 5),
(9780321751058, 'Operating System Concepts', 'Abraham Silberschatz', 'Computer Science', '2012-01-28', 6),
(9780133049375, 'Programming Pearls', 'Jon Bentley', 'Computer Science', '2000-01-02', 5),
(9781449364924, 'Python for Data Analysis', 'Wes McKinney', 'Data Science', '2017-09-25', 5),
(9781491901638, 'Python Machine Learning', 'Sebastian Raschka', 'Artificial Intelligence', '2015-11-20', 5),
(9781449340375, 'R for Data Science', 'Hadley Wickham', 'Data Science', '2016-12-12', 9),
(9780137081073, 'Refactoring', 'Martin Fowler', 'Software Engineering', '1999-07-08', 7),
(9780131101642, 'Structure and Interpretation of Computer Programs', 'Harold Abelson', 'Computer Science', '1996-07-01', 9),
(9780201485677, 'The Art of Computer Programming', 'Donald E. Knuth', 'Computer Science', '1997-01-01', 4),
(9780131101647, 'The C Programming Language', 'Brian W. Kernighan', 'Computer Science', '1988-04-01', 12),
(9780134757599, 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 'Software Engineering', '1995-04-02', 4),
(9780201634550, 'The Practice of Programming', 'Brian W. Kernighan', 'Programming', '1999-02-25', 4),
(9780262032938, 'The Pragmatic Programmer', 'Andrew Hunt', 'Software Engineering', '1999-10-30', 11);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Transaction_ID` int(11) NOT NULL,
  `Status` enum('Borrowed','Overdue','Returned') DEFAULT NULL,
  `User_ID` bigint(20) DEFAULT NULL,
  `User_Name` varchar(50) DEFAULT NULL,
  `Book_ISBN` bigint(20) DEFAULT NULL,
  `Book_Title` varchar(50) DEFAULT NULL,
  `Borrow_Date` date DEFAULT NULL,
  `Due_Date` date DEFAULT NULL,
  `Return_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_ID`, `Status`, `User_ID`, `User_Name`, `Book_ISBN`, `Book_Title`, `Borrow_Date`, `Due_Date`, `Return_Date`) VALUES
(46, 'Borrowed', 2021500001, 'Anita Mwansa', 9780131101649, 'Algorithm Design', '2024-09-01', '2024-09-15', NULL),
(47, 'Returned', 2021403572, 'Boyd Inganda', 9780262033849, 'Artificial Intelligence: A Modern Approach', '2024-08-20', '2024-09-03', '2024-09-01'),
(48, 'Borrowed', 2021385728, 'Chibelo Carlos', 9780132121364, 'Applied Cryptography', '2024-09-02', '2024-09-16', NULL),
(49, 'Overdue', 2021500019, 'Chileshe Kasonde', 9781119282716, 'Applied Data Science', '2024-08-25', '2024-09-01', NULL),
(50, 'Returned', 2020020246, 'Christine Nkhata', 9780262033848, 'Artificial Intelligence: A Modern Approach', '2024-09-10', '2024-09-15', '2024-09-12'),
(51, 'Borrowed', 2021500013, 'Clement Soko', 9780321635881, 'Big Data: Principles and Best Practices', '2024-09-04', '2024-09-18', NULL),
(52, 'Returned', 2021500006, 'Conrad Zulu', 9780132350891, 'Clean Code', '2024-08-22', '2024-08-29', '2024-08-28'),
(53, 'Borrowed', 2021500024, 'Cynthia Mumba', 9780131103630, 'Introduction to Automata Theory', '2024-09-03', '2024-09-17', NULL),
(54, 'Overdue', 2021500016, 'Daisy Nkhata', 9780131103634, 'Introduction to Algorithms', '2024-08-15', '2024-08-30', NULL),
(55, 'Borrowed', 2021495043, 'Davis Mwangelwa Mwepa', 9780131103641, 'Computer Networks', '2024-09-05', '2024-09-19', NULL),
(56, 'Returned', 2021500005, 'Diana Mwale', 9780136091820, 'Database System Concepts', '2024-09-10', '2024-09-25', '2024-09-24'),
(57, 'Borrowed', 2021408892, 'Edah Phiri', 9780131101642, 'Structure and Interpretation of Computer Programs', '2024-09-02', '2024-09-16', NULL),
(58, 'Returned', 2021500010, 'Edward Phiri', 9780131101647, 'The C Programming Language', '2024-09-12', '2024-09-20', '2024-09-19'),
(59, 'Borrowed', 2020038218, 'Elizabeth Mulenga', 9780134757599, 'The Mythical Man-Month', '2024-09-05', '2024-09-19', NULL),
(60, 'Returned', 2021463290, 'Ernest Kakeza', 9780131101631, 'Engineering a Compiler', '2024-09-01', '2024-09-15', '2024-09-10'),
(61, 'Borrowed', 2021500020, 'Felicia Ngulube', 9780131871257, 'Introduction to Parallel Computing', '2024-09-10', '2024-09-24', NULL),
(62, 'Returned', 2021500004, 'Felix Kangwa', 9780321751058, 'Operating System Concepts', '2024-09-01', '2024-09-15', '2024-09-14'),
(63, 'Borrowed', 2021483444, 'Frank Mwale', 9780321832054, 'Cracking the Coding Interview', '2024-09-02', '2024-09-16', NULL),
(64, 'Returned', 2021500003, 'Gloria Chanda', 9781491900863, 'Learning SQL', '2024-09-01', '2024-09-15', '2024-09-11'),
(65, 'Overdue', 2021500025, 'Henry Phiri', 9780201633627, 'Design Patterns', '2024-08-22', '2024-09-05', NULL),
(66, 'Borrowed', 2021500023, 'Ishmael Chibale', 9781491901420, 'Data Science from Scratch', '2024-09-05', '2024-09-19', NULL),
(67, 'Returned', 2021415198, 'Joshua Silwimba', 9780201634550, 'The Practice of Programming', '2024-09-12', '2024-09-20', '2024-09-18'),
(68, 'Borrowed', 2021500014, 'Joyce Silwimba', 9780596007126, 'Learning Python', '2024-09-02', '2024-09-16', NULL),
(69, 'Returned', 2021500007, 'Katherine Chibamba', 9780596009205, 'Head First Java', '2024-09-10', '2024-09-25', '2024-09-24'),
(70, 'Borrowed', 2021500021, 'Kenneth Mwewa', 9780596517748, 'JavaScript: The Good Parts', '2024-09-03', '2024-09-17', NULL),
(71, 'Returned', 2021500009, 'Linda Kamwendo', 9781449364924, 'Python for Data Analysis', '2024-09-12', '2024-09-25', '2024-09-20'),
(72, 'Borrowed', 2021500022, 'Margaret Malambo', 9780133049375, 'Programming Pearls', '2024-09-08', '2024-09-22', NULL),
(73, 'Returned', 2021500011, 'Martha Chola', 9781491929464, 'Data Mining: Practical Machine Learning Tools', '2024-09-01', '2024-09-15', '2024-09-14'),
(74, 'Overdue', 2021385345, 'Mukuka Kangwa', 9780262032938, 'The Pragmatic Programmer', '2024-08-25', '2024-09-01', NULL),
(75, 'Borrowed', 2021500012, 'Naomi Banda', 9780262033848, 'Introduction to the Theory of Computation', '2024-09-10', '2024-09-24', NULL),
(76, 'Returned', 2021441407, 'Prince Musonda', 9780262033849, 'Artificial Intelligence: A Modern Approach', '2024-09-05', '2024-09-19', '2024-09-17'),
(77, 'Borrowed', 2020048914, 'Prosper Siame', 9780136091820, 'Database System Concepts', '2024-09-01', '2024-09-15', NULL),
(78, 'Returned', 2021500002, 'Samson Kalunga', 9781449330735, 'Hadoop: The Definitive Guide', '2024-09-05', '2024-09-19', '2024-09-15'),
(79, 'Borrowed', 2021397092, 'Selina Esther Banda', 9781449340375, 'R for Data Science', '2024-09-02', '2024-09-16', NULL),
(80, 'Returned', 2021474542, 'Selwa Selwa', 9780329434741, 'Designing Data-Intensive Applications', '2024-09-10', '2024-09-25', '2024-09-22'),
(81, 'Borrowed', 2021500017, 'Solomon Banda', 9781491901638, 'Python Machine Learning', '2024-09-01', '2024-09-15', NULL),
(82, 'Returned', 2021500015, 'Steven Mwanza', 9781492046852, 'Deep Learning with Python', '2024-09-12', '2024-09-20', '2024-09-19'),
(83, 'Borrowed', 2021500018, 'Sylvia Mwenda', 9781491900863, 'Learning SQL', '2024-09-04', '2024-09-18', NULL),
(84, 'Returned', 2021455301, 'Tamara Banda', 9780132121364, 'Applied Cryptography', '2024-09-10', '2024-09-25', '2024-09-20'),
(85, 'Overdue', 2020018721, 'Tanthwe Nkhoma Mumba', 9780131103630, 'Introduction to Automata Theory', '2024-09-01', '2024-09-15', NULL),
(86, 'Borrowed', 2021493172, 'Thokozani Elizabeth Mwale', 9780134686090, 'Effective Java', '2024-09-05', '2024-09-19', NULL),
(87, 'Returned', 2020021064, 'Thomas Ngulube', 9780131103634, 'Introduction to Algorithms', '2024-09-12', '2024-09-20', '2024-09-19'),
(88, 'Borrowed', 2021500008, 'Victor Mbewe', 9780321862967, 'Deep Learning', '2024-09-01', '2024-09-15', NULL),
(89, 'Returned', 2021413748, 'Yvette Zulu', 9780134757599, 'The Mythical Man-Month', '2024-09-10', '2024-09-25', '2024-09-20'),
(90, 'Borrowed', 2020017504, 'Yvonne Lukote', 9780596007126, 'Learning Python', '2024-09-02', '2024-09-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` bigint(20) NOT NULL,
  `User_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone_Number` bigint(14) DEFAULT NULL,
  `School` enum('Agricultural Sciences','Education','Engineering','Graduate School of Business','Health Sciences','Humanities and Social Sciences','Law','Medicine','Mines','Natural Sciences','Nursing Sciences','Public Health','Veterinary Medicine') DEFAULT NULL,
  `Password` varbinary(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `Email`, `Phone_Number`, `School`, `Password`) VALUES
(2021500001, 'Anita Mwansa', 'anita.mwansa@example.com', 260971234501, 'Agricultural Sciences', 0x70617373776f72643531),
(2021403572, 'Boyd Inganda', 'boyd.inganda@example.com', 260974567890, 'Engineering', 0x70617373776f726434),
(2021385728, 'Chibelo Carlos', 'chibelo.carlos@example.com', 260971234568, 'Medicine', 0x70617373776f72643131),
(2021500019, 'Chileshe Kasonde', 'chileshe.kasonde@example.com', 260979012389, 'Mines', 0x70617373776f72643639),
(2020020246, 'Christine Nkhata', 'christine.nkhata@example.com', 260975678901, 'Nursing Sciences', 0x70617373776f726435),
(2021500013, 'Clement Soko', 'clement.soko@example.com', 260973456723, 'Agricultural Sciences', 0x70617373776f72643633),
(2021500006, 'Conrad Zulu', 'conrad.zulu@example.com', 260976789056, 'Law', 0x70617373776f72643536),
(2021500024, 'Cynthia Mumba', 'cynthia.mumba@example.com', 260974567834, 'Agricultural Sciences', 0x70617373776f72643734),
(2021500016, 'Daisy Nkhata', 'daisy.nkhata@example.com', 260976789056, 'Humanities and Social Sciences', 0x70617373776f72643636),
(2021495043, 'Davis Mwangelwa Mwepa', 'davis.mwepa@example.com', 260971234567, 'Nursing Sciences', 0x70617373776f726431),
(2021500005, 'Diana Mwale', 'diana.mwale@example.com', 260975678945, 'Humanities and Social Sciences', 0x70617373776f72643535),
(2021408892, 'Edah Phiri', 'edah.phiri@example.com', 260978901235, 'Nursing Sciences', 0x70617373776f72643138),
(2021500010, 'Edward Phiri', 'edward.phiri@example.com', 260970123490, 'Nursing Sciences', 0x70617373776f72643630),
(2020038218, 'Elizabeth Mulenga', 'elizabeth.mulenga@example.com', 260976789012, 'Public Health', 0x70617373776f726436),
(2021463290, 'Ernest Kakeza', 'ernest.kakeza@example.com', 260978901234, 'Health Sciences', 0x70617373776f726438),
(2021500020, 'Felicia Ngulube', 'felicia.ngulube@example.com', 260970123490, 'Natural Sciences', 0x70617373776f72643730),
(2021500004, 'Felix Kangwa', 'felix.kangwa@example.com', 260974567834, 'Health Sciences', 0x70617373776f72643534),
(2021483444, 'Frank Mwale', 'frank.mwale@example.com', 260973456789, 'Public Health', 0x70617373776f726433),
(2021500003, 'Gloria Chanda', 'gloria.chanda@example.com', 260973456723, 'Graduate School of Business', 0x70617373776f72643533),
(2021500025, 'Henry Phiri', 'henry.phiri@example.com', 260975678945, 'Engineering', 0x70617373776f72643735),
(2021500023, 'Ishmael Chibale', 'ishmael.chibale@example.com', 260973456723, 'Veterinary Medicine', 0x70617373776f72643733),
(2021415198, 'Joshua Silwimba', 'joshua.silwimba@example.com', 260976789013, 'Mines', 0x70617373776f72643136),
(2021500014, 'Joyce Silwimba', 'joyce.silwimba@example.com', 260974567834, 'Engineering', 0x70617373776f72643634),
(2021500007, 'Katherine Chibamba', 'katherine.chibamba@example.com', 260977890167, 'Medicine', 0x70617373776f72643537),
(2021500021, 'Kenneth Mwewa', 'kenneth.mwewa@example.com', 260971234501, 'Nursing Sciences', 0x70617373776f72643731),
(2021500009, 'Linda Kamwendo', 'linda.kamwendo@example.com', 260979012389, 'Natural Sciences', 0x70617373776f72643539),
(2021500022, 'Margaret Malambo', 'margaret.malambo@example.com', 260972345612, 'Public Health', 0x70617373776f72643732),
(2021500011, 'Martha Chola', 'martha.chola@example.com', 260971234501, 'Public Health', 0x70617373776f72643631),
(2021385345, 'Mukuka Kangwa', 'mukuka.kangwa@example.com', 260974567891, 'Engineering', 0x70617373776f72643134),
(2021500012, 'Naomi Banda', 'naomi.banda@example.com', 260972345612, 'Veterinary Medicine', 0x70617373776f72643632),
(2021441407, 'Prince Musonda', 'prince.musonda@example.com', 260979012345, 'Natural Sciences', 0x70617373776f726439),
(2020048914, 'Prosper Siame', 'prosper.siame@example.com', 260970123456, 'Engineering', 0x70617373776f72643130),
(2021500002, 'Samson Kalunga', 'samson.kalunga@example.com', 260972345612, 'Education', 0x70617373776f72643532),
(2021397092, 'Selina Esther Banda', 'selina.banda@example.com', 260977890124, 'Nursing Sciences', 0x70617373776f72643137),
(2021474542, 'Selwa Selwa', 'selwa.selwa@example.com', 260972345678, 'Engineering', 0x70617373776f726432),
(2021500017, 'Solomon Banda', 'solomon.banda@example.com', 260977890167, 'Law', 0x70617373776f72643637),
(2021500015, 'Steven Mwanza', 'steven.mwanza@example.com', 260975678945, 'Health Sciences', 0x70617373776f72643635),
(2021500018, 'Sylvia Mwenda', 'sylvia.mwenda@example.com', 260978901278, 'Medicine', 0x70617373776f72643638),
(2021455301, 'Tamara Banda', 'tamara.banda@example.com', 260977890123, 'Health Sciences', 0x70617373776f726437),
(2020018721, 'Tanthwe Nkhoma Mumba', 'tanthwe.mumba@example.com', 260975678902, 'Nursing Sciences', 0x70617373776f72643135),
(2021493172, 'Thokozani Elizabeth Mwale', 'thokozani.mwale@example.com', 260972345679, 'Natural Sciences', 0x70617373776f72643132),
(2020021064, 'Thomas Ngulube', 'thomas.ngulube@example.com', 260979012346, 'Natural Sciences', 0x70617373776f72643139),
(2021500008, 'Victor Mbewe', 'victor.mbewe@example.com', 260978901278, 'Mines', 0x70617373776f72643538),
(2021413748, 'Yvette Zulu', 'yvette.zulu@example.com', 260970123457, 'Nursing Sciences', 0x70617373776f72643230),
(2020017504, 'Yvonne Lukote', 'yvonne.lukote@example.com', 260973456780, 'Nursing Sciences', 0x70617373776f72643133);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_ISBN`),
  ADD KEY `Book_Title` (`Book_Title`,`Book_Author`,`Genre`,`Publication_Date`,`Number_of_copies`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Transaction_ID`),
  ADD KEY `Book_ISBN` (`Book_ISBN`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Status` (`Status`,`Book_Title`,`Borrow_Date`,`Due_Date`,`Return_Date`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `User_Name` (`User_Name`,`Email`,`Phone_Number`,`School`,`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`Book_ISBN`) REFERENCES `books` (`Book_ISBN`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

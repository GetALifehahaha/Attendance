-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 01:25 AM
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
-- Database: `attendance_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_ID` int(11) NOT NULL,
  `student_ID` int(11) NOT NULL,
  `schedule_ID` varchar(6) NOT NULL,
  `attendance_status` enum('present','late','absent') DEFAULT 'absent',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `attendance_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_ID`, `student_ID`, `schedule_ID`, `attendance_status`, `start_time`, `end_time`, `attendance_date`) VALUES
(48, 202300049, 'IT221A', 'absent', '05:06:50', NULL, '2025-05-08'),
(49, 202500001, 'IT221A', 'absent', '05:06:50', NULL, '2025-05-08'),
(51, 202300049, 'ADS212', 'present', '06:34:39', '06:37:28', '2025-05-08'),
(52, 202300049, 'NW21AL', 'present', '06:50:01', '06:50:06', '2025-05-08'),
(53, 202500001, 'NW21AL', 'present', '06:50:01', '06:50:06', '2025-05-08'),
(54, 202500002, 'NW21AL', 'present', '06:50:01', '06:50:06', '2025-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `professor_ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`professor_ID`, `name`, `email`, `department`) VALUES
(1, 'John', 'john@gmail.com', 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_ID` varchar(6) NOT NULL,
  `schedule_name` varchar(100) NOT NULL,
  `schedule_department` varchar(10) NOT NULL,
  `schedule_year` int(11) NOT NULL,
  `schedule_section` varchar(10) NOT NULL,
  `schedule_start_time` time NOT NULL,
  `schedule_end_time` time NOT NULL,
  `schedule_day_of_the_week` varchar(50) NOT NULL,
  `schedule_room` varchar(50) NOT NULL,
  `schedule_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_ID`, `schedule_name`, `schedule_department`, `schedule_year`, `schedule_section`, `schedule_start_time`, `schedule_end_time`, `schedule_day_of_the_week`, `schedule_room`, `schedule_capacity`) VALUES
('221L21', 'IT ELective 2 LAB', 'IT', 2, 'A', '11:30:00', '13:00:00', 'Wednesday', 'LAB 2', 50),
('221L22', 'IT ELective 2 LAB', 'IT', 2, 'A', '11:30:00', '13:00:00', 'Thursday', 'LAB 2', 50),
('ADS212', 'Advanced Database Systems LAB', 'IT', 1, 'A', '16:30:00', '18:00:00', 'Wednesday', 'LAB 2', 50),
('ADS2AL', 'Advanced Database Systems LAB', 'IT', 2, 'A', '16:00:00', '19:00:00', 'Wednesday', 'LAB 2', 50),
('EPIC2A', 'Epic Start 2-A', 'IT', 2, 'A', '08:30:00', '10:00:00', 'Monday', 'Epic Lab', 55),
('IT221A', 'IT ELECTIVE 2', 'IT', 2, 'A', '11:30:00', '13:00:00', 'Tuesday', 'LR 1', 50),
('NW21AL', 'Networking 1 LAB', 'IT', 1, 'A', '11:00:00', '12:30:00', 'Friday', 'LAB 2', 50);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_enrolled`
--

CREATE TABLE `schedule_enrolled` (
  `schedule_enrolled_ID` int(11) NOT NULL,
  `schedule_ID` varchar(6) NOT NULL,
  `student_ID` int(11) NOT NULL,
  `number_of_absences` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_enrolled`
--

INSERT INTO `schedule_enrolled` (`schedule_enrolled_ID`, `schedule_ID`, `student_ID`, `number_of_absences`) VALUES
(1, 'IT221A', 202300049, 0),
(2, 'IT221A', 202500001, 0),
(8, '221L21', 202300049, 3),
(9, '221L22', 202300049, 0),
(10, 'ADS212', 202300049, 0),
(12, 'EPIC2A', 202300049, 5),
(14, 'NW21AL', 202300049, 0),
(15, 'NW21AL', 202500001, 0),
(16, 'NW21AL', 202500002, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_ID` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `program` enum('IT','CS') DEFAULT 'IT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_ID`, `first_name`, `middle_name`, `last_name`, `email`, `program`) VALUES
(202300049, 'Ahlan-nour', 'Jamiruddin', 'Sencio', 'hz202300049@gmail.com', 'IT'),
(202500001, 'This', 'Random', 'Guy', 'thisRandomGuy@gmail.com', 'CS'),
(202500002, 'Yet', 'Another', 'RandomGuy', 'yetAnotherRandomGuy@gmail.com', 'CS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_ID`),
  ADD UNIQUE KEY `student_ID` (`student_ID`,`schedule_ID`,`attendance_date`),
  ADD KEY `schedule_ID` (`schedule_ID`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`professor_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_ID`);

--
-- Indexes for table `schedule_enrolled`
--
ALTER TABLE `schedule_enrolled`
  ADD PRIMARY KEY (`schedule_enrolled_ID`),
  ADD KEY `fk_schedule` (`schedule_ID`),
  ADD KEY `fk_student` (`student_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `professor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_enrolled`
--
ALTER TABLE `schedule_enrolled`
  MODIFY `schedule_enrolled_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `students` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`schedule_ID`) REFERENCES `schedules` (`schedule_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule_enrolled`
--
ALTER TABLE `schedule_enrolled`
  ADD CONSTRAINT `fk_schedule` FOREIGN KEY (`schedule_ID`) REFERENCES `schedules` (`schedule_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student` FOREIGN KEY (`student_ID`) REFERENCES `students` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_enrolled_ibfk_1` FOREIGN KEY (`schedule_ID`) REFERENCES `schedules` (`schedule_ID`),
  ADD CONSTRAINT `schedule_enrolled_ibfk_2` FOREIGN KEY (`student_ID`) REFERENCES `students` (`student_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

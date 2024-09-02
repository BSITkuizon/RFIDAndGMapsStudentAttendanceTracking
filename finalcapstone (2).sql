-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 05:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalcapstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_username`, `admin_password`, `admin_name`, `created_at`, `updated_at`, `admin_role`) VALUES
(1, 'admin', 'admin', 'Admin Default', '2024-08-15 00:01:36', '2024-08-15 00:28:16', 'Adviser');

-- --------------------------------------------------------

--
-- Table structure for table `classsubject`
--

CREATE TABLE `classsubject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `credit_hours` int(11) DEFAULT NULL,
  `Teacher` varchar(100) DEFAULT NULL,
  `meeting_days` varchar(50) DEFAULT NULL,
  `semester` enum('1st Semester','2nd Semester') NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classsubject`
--

INSERT INTO `classsubject` (`subject_id`, `subject_name`, `subject_code`, `description`, `credit_hours`, `Teacher`, `meeting_days`, `semester`, `school_year`, `section_id`) VALUES
(1, 'Math', 'MTH123', 'wara', 1, 'Noland Igut', 'Mon,Wed,Fri', '1st Semester', '2024-2025', 1),
(2, 'Science', 'SCI123', 'DF', 1, 'Noland Igut', 'Mon,Wed,Thurs', '1st Semester', '2024-2025', 2),
(3, 'English', 'MTH123', 'ewqd', 2, 'Noland Igut', 'Wed', '1st Semester', '2024-2025', 2),
(4, 'FILIPINO', 'MT5H123', ' NN', 5, 'Noland Igut', 'Mon,Tues,Wed,Thurs,Fri', '2nd Semester', '2024-2025', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `schedule_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `meeting_days` varchar(50) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`schedule_id`, `subject_id`, `section_id`, `meeting_days`, `start_time`, `end_time`) VALUES
(1, 3, 1, 'Tue', '10:14:00', '11:14:00'),
(2, 3, 2, 'Wed', '10:20:00', '11:20:00'),
(3, 1, 1, 'Mon', '10:24:00', '11:24:00'),
(4, 1, 1, 'Wed', '11:24:00', '00:24:00'),
(5, 1, 1, 'Fri', '13:24:00', '14:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_adviser` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `section_adviser`) VALUES
(1, 'MATH', 'NOLAND IGUT'),
(2, 'SCIENCE', 'NOLAND IGUT');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `student_id_number` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Non-Binary','Prefer not to say') NOT NULL,
  `address` varchar(255) NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rfid_number` varchar(50) DEFAULT NULL,
  `profile_image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `first_name`, `middle_name`, `last_name`, `email`, `student_id_number`, `date_of_birth`, `gender`, `address`, `section`, `password`, `rfid_number`, `profile_image_url`) VALUES
(4, 'Kyle', 'Pitoc', 'Kuizon', 'kyle@sample.com', '123123', '2003-05-03', 'Male', 'Caridad Sur', 'Section1', '123123', '123213124124', '../DefaultProfile/MaleDefaultProfile.png'),
(5, 'new', 'new', 'new', 'new@new', '321', '2024-08-12', 'Male', 'Caridad Sur', 'Section1', '321', '0000611043', '../DefaultProfile/MaleDefaultProfile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `classsubject`
--
ALTER TABLE `classsubject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `fk_section` (`section_id`),
  ADD KEY `idx_meeting_days` (`meeting_days`);

--
-- Indexes for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `meeting_days` (`meeting_days`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student_id_number` (`student_id_number`),
  ADD UNIQUE KEY `rfid_number` (`rfid_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classsubject`
--
ALTER TABLE `classsubject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classsubject`
--
ALTER TABLE `classsubject`
  ADD CONSTRAINT `fk_section` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD CONSTRAINT `class_schedule_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `classsubject` (`subject_id`),
  ADD CONSTRAINT `class_schedule_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

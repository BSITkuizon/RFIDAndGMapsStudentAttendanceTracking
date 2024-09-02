-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 06:27 AM
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
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(6) UNSIGNED NOT NULL,
  `student_id_number` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('Present','Absent','Late') NOT NULL,
  `excuse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id_number`, `date`, `time`, `status`, `excuse`) VALUES
(44, '24-50678901', '2024-07-29', '12:44:23', 'Present', NULL),
(45, '24-60789012', '2024-07-29', '12:44:28', 'Present', NULL),
(46, '24-80901234', '2024-07-29', '12:47:22', 'Present', NULL),
(47, '24-91012345', '2024-07-29', '12:47:26', 'Present', NULL),
(48, '24-01123456', '2024-07-29', '13:04:52', 'Present', NULL),
(49, '24-20345678', '2024-07-29', '13:04:59', 'Present', NULL),
(50, '24-30456789', '2024-07-29', '13:05:03', 'Present', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classchedule`
--

CREATE TABLE `classchedule` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `classroom_location` varchar(100) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classchedule`
--

INSERT INTO `classchedule` (`id`, `class_name`, `day_of_week`, `date`, `start_time`, `end_time`, `classroom_location`, `section`) VALUES
(61, 'Programming 1', 'Monday', '2024-07-29', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(62, 'Programming 1', 'Wednesday', '2024-07-31', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(63, 'Programming 1', 'Friday', '2024-08-02', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(64, 'Programming 1', 'Monday', '2024-08-05', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(65, 'Programming 1', 'Wednesday', '2024-08-07', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(66, 'Programming 1', 'Friday', '2024-08-09', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(67, 'Programming 1', 'Monday', '2024-08-12', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(68, 'Programming 1', 'Wednesday', '2024-08-14', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(69, 'Programming 1', 'Friday', '2024-08-16', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(70, 'Programming 1', 'Monday', '2024-08-19', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(71, 'Programming 1', 'Wednesday', '2024-08-21', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(72, 'Programming 1', 'Friday', '2024-08-23', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(73, 'Programming 1', 'Monday', '2024-08-26', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(74, 'Programming 1', 'Wednesday', '2024-08-28', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(75, 'Programming 1', 'Friday', '2024-08-30', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(76, 'Programming 1', 'Monday', '2024-09-02', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(77, 'Programming 1', 'Wednesday', '2024-09-04', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(78, 'Programming 1', 'Friday', '2024-09-06', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(79, 'Programming 1', 'Monday', '2024-09-09', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(80, 'Programming 1', 'Wednesday', '2024-09-11', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(81, 'Programming 1', 'Friday', '2024-09-13', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(82, 'Programming 1', 'Monday', '2024-09-16', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(83, 'Programming 1', 'Wednesday', '2024-09-18', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(84, 'Programming 1', 'Friday', '2024-09-20', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(85, 'Programming 1', 'Monday', '2024-09-23', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(86, 'Programming 1', 'Wednesday', '2024-09-25', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(87, 'Programming 1', 'Friday', '2024-09-27', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(88, 'Programming 1', 'Monday', '2024-09-30', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(89, 'Programming 1', 'Wednesday', '2024-10-02', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(90, 'Programming 1', 'Friday', '2024-10-04', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(91, 'Programming 1', 'Monday', '2024-10-07', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(92, 'Programming 1', 'Wednesday', '2024-10-09', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(93, 'Programming 1', 'Friday', '2024-10-11', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(94, 'Programming 1', 'Monday', '2024-10-14', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(95, 'Programming 1', 'Wednesday', '2024-10-16', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(96, 'Programming 1', 'Friday', '2024-10-18', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(97, 'Programming 1', 'Monday', '2024-10-21', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(98, 'Programming 1', 'Wednesday', '2024-10-23', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(99, 'Programming 1', 'Friday', '2024-10-25', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(100, 'Programming 1', 'Monday', '2024-10-28', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(101, 'Programming 1', 'Wednesday', '2024-10-30', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(102, 'Programming 1', 'Friday', '2024-11-01', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(103, 'Programming 1', 'Monday', '2024-11-04', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(104, 'Programming 1', 'Wednesday', '2024-11-06', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(105, 'Programming 1', 'Friday', '2024-11-08', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(106, 'Programming 1', 'Monday', '2024-11-11', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(107, 'Programming 1', 'Wednesday', '2024-11-13', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(108, 'Programming 1', 'Friday', '2024-11-15', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(109, 'Programming 1', 'Monday', '2024-11-18', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(110, 'Programming 1', 'Wednesday', '2024-11-20', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(111, 'Programming 1', 'Friday', '2024-11-22', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(112, 'Programming 1', 'Monday', '2024-11-25', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(113, 'Programming 1', 'Wednesday', '2024-11-27', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(114, 'Programming 1', 'Friday', '2024-11-29', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(115, 'Programming 1', 'Monday', '2024-12-02', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(116, 'Programming 1', 'Wednesday', '2024-12-04', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(117, 'Programming 1', 'Friday', '2024-12-06', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(118, 'Programming 1', 'Monday', '2024-12-09', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(119, 'Programming 1', 'Wednesday', '2024-12-11', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(120, 'Programming 1', 'Friday', '2024-12-13', '07:30:00', '08:30:00', 'ROOM 1', 'SECTION 1'),
(121, ' Programing 2', 'Tuesday', '2024-07-30', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(122, ' Programing 2', 'Wednesday', '2024-07-31', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(123, ' Programing 2', 'Thursday', '2024-08-01', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(124, ' Programing 2', 'Tuesday', '2024-08-06', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(125, ' Programing 2', 'Wednesday', '2024-08-07', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(126, ' Programing 2', 'Thursday', '2024-08-08', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(127, ' Programing 2', 'Tuesday', '2024-08-13', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(128, ' Programing 2', 'Wednesday', '2024-08-14', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(129, ' Programing 2', 'Thursday', '2024-08-15', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(130, ' Programing 2', 'Tuesday', '2024-08-20', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(131, ' Programing 2', 'Wednesday', '2024-08-21', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(132, ' Programing 2', 'Thursday', '2024-08-22', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(133, ' Programing 2', 'Tuesday', '2024-08-27', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(134, ' Programing 2', 'Wednesday', '2024-08-28', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(135, ' Programing 2', 'Thursday', '2024-08-29', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(136, ' Programing 2', 'Tuesday', '2024-09-03', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(137, ' Programing 2', 'Wednesday', '2024-09-04', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(138, ' Programing 2', 'Thursday', '2024-09-05', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(139, ' Programing 2', 'Tuesday', '2024-09-10', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(140, ' Programing 2', 'Wednesday', '2024-09-11', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(141, ' Programing 2', 'Thursday', '2024-09-12', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(142, ' Programing 2', 'Tuesday', '2024-09-17', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(143, ' Programing 2', 'Wednesday', '2024-09-18', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(144, ' Programing 2', 'Thursday', '2024-09-19', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(145, ' Programing 2', 'Tuesday', '2024-09-24', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(146, ' Programing 2', 'Wednesday', '2024-09-25', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(147, ' Programing 2', 'Thursday', '2024-09-26', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(148, ' Programing 2', 'Tuesday', '2024-10-01', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(149, ' Programing 2', 'Wednesday', '2024-10-02', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(150, ' Programing 2', 'Thursday', '2024-10-03', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(151, ' Programing 2', 'Tuesday', '2024-10-08', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(152, ' Programing 2', 'Wednesday', '2024-10-09', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(153, ' Programing 2', 'Thursday', '2024-10-10', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(154, ' Programing 2', 'Tuesday', '2024-10-15', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(155, ' Programing 2', 'Wednesday', '2024-10-16', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(156, ' Programing 2', 'Thursday', '2024-10-17', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(157, ' Programing 2', 'Tuesday', '2024-10-22', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(158, ' Programing 2', 'Wednesday', '2024-10-23', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(159, ' Programing 2', 'Thursday', '2024-10-24', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(160, ' Programing 2', 'Tuesday', '2024-10-29', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(161, ' Programing 2', 'Wednesday', '2024-10-30', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(162, ' Programing 2', 'Thursday', '2024-10-31', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(163, ' Programing 2', 'Tuesday', '2024-11-05', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(164, ' Programing 2', 'Wednesday', '2024-11-06', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(165, ' Programing 2', 'Thursday', '2024-11-07', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(166, ' Programing 2', 'Tuesday', '2024-11-12', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(167, ' Programing 2', 'Wednesday', '2024-11-13', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(168, ' Programing 2', 'Thursday', '2024-11-14', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(169, ' Programing 2', 'Tuesday', '2024-11-19', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(170, ' Programing 2', 'Wednesday', '2024-11-20', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(171, ' Programing 2', 'Thursday', '2024-11-21', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(172, ' Programing 2', 'Tuesday', '2024-11-26', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(173, ' Programing 2', 'Wednesday', '2024-11-27', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(174, ' Programing 2', 'Thursday', '2024-11-28', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(175, ' Programing 2', 'Tuesday', '2024-12-03', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(176, ' Programing 2', 'Wednesday', '2024-12-04', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(177, ' Programing 2', 'Thursday', '2024-12-05', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(178, ' Programing 2', 'Tuesday', '2024-12-10', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(179, ' Programing 2', 'Wednesday', '2024-12-11', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(180, ' Programing 2', 'Thursday', '2024-12-12', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(181, ' Programing 2', 'Tuesday', '2024-07-30', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(182, ' Programing 2', 'Wednesday', '2024-07-31', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(183, ' Programing 2', 'Thursday', '2024-08-01', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(184, ' Programing 2', 'Tuesday', '2024-08-06', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(185, ' Programing 2', 'Wednesday', '2024-08-07', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(186, ' Programing 2', 'Thursday', '2024-08-08', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(187, ' Programing 2', 'Tuesday', '2024-08-13', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(188, ' Programing 2', 'Wednesday', '2024-08-14', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(189, ' Programing 2', 'Thursday', '2024-08-15', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(190, ' Programing 2', 'Tuesday', '2024-08-20', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(191, ' Programing 2', 'Wednesday', '2024-08-21', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(192, ' Programing 2', 'Thursday', '2024-08-22', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(193, ' Programing 2', 'Tuesday', '2024-08-27', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(194, ' Programing 2', 'Wednesday', '2024-08-28', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(195, ' Programing 2', 'Thursday', '2024-08-29', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(196, ' Programing 2', 'Tuesday', '2024-09-03', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(197, ' Programing 2', 'Wednesday', '2024-09-04', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(198, ' Programing 2', 'Thursday', '2024-09-05', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(199, ' Programing 2', 'Tuesday', '2024-09-10', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(200, ' Programing 2', 'Wednesday', '2024-09-11', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(201, ' Programing 2', 'Thursday', '2024-09-12', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(202, ' Programing 2', 'Tuesday', '2024-09-17', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(203, ' Programing 2', 'Wednesday', '2024-09-18', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(204, ' Programing 2', 'Thursday', '2024-09-19', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(205, ' Programing 2', 'Tuesday', '2024-09-24', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(206, ' Programing 2', 'Wednesday', '2024-09-25', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(207, ' Programing 2', 'Thursday', '2024-09-26', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(208, ' Programing 2', 'Tuesday', '2024-10-01', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(209, ' Programing 2', 'Wednesday', '2024-10-02', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(210, ' Programing 2', 'Thursday', '2024-10-03', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(211, ' Programing 2', 'Tuesday', '2024-10-08', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(212, ' Programing 2', 'Wednesday', '2024-10-09', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(213, ' Programing 2', 'Thursday', '2024-10-10', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(214, ' Programing 2', 'Tuesday', '2024-10-15', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(215, ' Programing 2', 'Wednesday', '2024-10-16', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(216, ' Programing 2', 'Thursday', '2024-10-17', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(217, ' Programing 2', 'Tuesday', '2024-10-22', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(218, ' Programing 2', 'Wednesday', '2024-10-23', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(219, ' Programing 2', 'Thursday', '2024-10-24', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(220, ' Programing 2', 'Tuesday', '2024-10-29', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(221, ' Programing 2', 'Wednesday', '2024-10-30', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(222, ' Programing 2', 'Thursday', '2024-10-31', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(223, ' Programing 2', 'Tuesday', '2024-11-05', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(224, ' Programing 2', 'Wednesday', '2024-11-06', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(225, ' Programing 2', 'Thursday', '2024-11-07', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(226, ' Programing 2', 'Tuesday', '2024-11-12', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(227, ' Programing 2', 'Wednesday', '2024-11-13', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(228, ' Programing 2', 'Thursday', '2024-11-14', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(229, ' Programing 2', 'Tuesday', '2024-11-19', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(230, ' Programing 2', 'Wednesday', '2024-11-20', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(231, ' Programing 2', 'Thursday', '2024-11-21', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(232, ' Programing 2', 'Tuesday', '2024-11-26', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(233, ' Programing 2', 'Wednesday', '2024-11-27', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(234, ' Programing 2', 'Thursday', '2024-11-28', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(235, ' Programing 2', 'Tuesday', '2024-12-03', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(236, ' Programing 2', 'Wednesday', '2024-12-04', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(237, ' Programing 2', 'Thursday', '2024-12-05', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(238, ' Programing 2', 'Tuesday', '2024-12-10', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(239, ' Programing 2', 'Wednesday', '2024-12-11', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(240, ' Programing 2', 'Thursday', '2024-12-12', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(241, ' Programing 2', 'Tuesday', '2024-07-30', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(242, ' Programing 2', 'Wednesday', '2024-07-31', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(243, ' Programing 2', 'Thursday', '2024-08-01', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(244, ' Programing 2', 'Tuesday', '2024-08-06', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(245, ' Programing 2', 'Wednesday', '2024-08-07', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(246, ' Programing 2', 'Thursday', '2024-08-08', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(247, ' Programing 2', 'Tuesday', '2024-08-13', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(248, ' Programing 2', 'Wednesday', '2024-08-14', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(249, ' Programing 2', 'Thursday', '2024-08-15', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(250, ' Programing 2', 'Tuesday', '2024-08-20', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(251, ' Programing 2', 'Wednesday', '2024-08-21', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(252, ' Programing 2', 'Thursday', '2024-08-22', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(253, ' Programing 2', 'Tuesday', '2024-08-27', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(254, ' Programing 2', 'Wednesday', '2024-08-28', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(255, ' Programing 2', 'Thursday', '2024-08-29', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(256, ' Programing 2', 'Tuesday', '2024-09-03', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(257, ' Programing 2', 'Wednesday', '2024-09-04', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(258, ' Programing 2', 'Thursday', '2024-09-05', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(259, ' Programing 2', 'Tuesday', '2024-09-10', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(260, ' Programing 2', 'Wednesday', '2024-09-11', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(261, ' Programing 2', 'Thursday', '2024-09-12', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(262, ' Programing 2', 'Tuesday', '2024-09-17', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(263, ' Programing 2', 'Wednesday', '2024-09-18', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(264, ' Programing 2', 'Thursday', '2024-09-19', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(265, ' Programing 2', 'Tuesday', '2024-09-24', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(266, ' Programing 2', 'Wednesday', '2024-09-25', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(267, ' Programing 2', 'Thursday', '2024-09-26', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(268, ' Programing 2', 'Tuesday', '2024-10-01', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(269, ' Programing 2', 'Wednesday', '2024-10-02', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(270, ' Programing 2', 'Thursday', '2024-10-03', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(271, ' Programing 2', 'Tuesday', '2024-10-08', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(272, ' Programing 2', 'Wednesday', '2024-10-09', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(273, ' Programing 2', 'Thursday', '2024-10-10', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(274, ' Programing 2', 'Tuesday', '2024-10-15', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(275, ' Programing 2', 'Wednesday', '2024-10-16', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(276, ' Programing 2', 'Thursday', '2024-10-17', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(277, ' Programing 2', 'Tuesday', '2024-10-22', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(278, ' Programing 2', 'Wednesday', '2024-10-23', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(279, ' Programing 2', 'Thursday', '2024-10-24', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(280, ' Programing 2', 'Tuesday', '2024-10-29', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(281, ' Programing 2', 'Wednesday', '2024-10-30', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(282, ' Programing 2', 'Thursday', '2024-10-31', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(283, ' Programing 2', 'Tuesday', '2024-11-05', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(284, ' Programing 2', 'Wednesday', '2024-11-06', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(285, ' Programing 2', 'Thursday', '2024-11-07', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(286, ' Programing 2', 'Tuesday', '2024-11-12', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(287, ' Programing 2', 'Wednesday', '2024-11-13', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(288, ' Programing 2', 'Thursday', '2024-11-14', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(289, ' Programing 2', 'Tuesday', '2024-11-19', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(290, ' Programing 2', 'Wednesday', '2024-11-20', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(291, ' Programing 2', 'Thursday', '2024-11-21', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(292, ' Programing 2', 'Tuesday', '2024-11-26', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(293, ' Programing 2', 'Wednesday', '2024-11-27', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(294, ' Programing 2', 'Thursday', '2024-11-28', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(295, ' Programing 2', 'Tuesday', '2024-12-03', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(296, ' Programing 2', 'Wednesday', '2024-12-04', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(297, ' Programing 2', 'Thursday', '2024-12-05', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(298, ' Programing 2', 'Tuesday', '2024-12-10', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(299, ' Programing 2', 'Wednesday', '2024-12-11', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(300, ' Programing 2', 'Thursday', '2024-12-12', '08:30:00', '09:30:00', 'ROOM2', 'Section 2'),
(301, 'Information technology', 'Monday', '2024-07-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(302, 'Information technology', 'Tuesday', '2024-07-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(303, 'Information technology', 'Wednesday', '2024-07-31', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(304, 'Information technology', 'Thursday', '2024-08-01', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(305, 'Information technology', 'Friday', '2024-08-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(306, 'Information technology', 'Monday', '2024-08-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(307, 'Information technology', 'Tuesday', '2024-08-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(308, 'Information technology', 'Wednesday', '2024-08-07', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(309, 'Information technology', 'Thursday', '2024-08-08', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(310, 'Information technology', 'Friday', '2024-08-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(311, 'Information technology', 'Monday', '2024-08-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(312, 'Information technology', 'Tuesday', '2024-08-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(313, 'Information technology', 'Wednesday', '2024-08-14', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(314, 'Information technology', 'Thursday', '2024-08-15', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(315, 'Information technology', 'Friday', '2024-08-16', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(316, 'Information technology', 'Monday', '2024-08-19', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(317, 'Information technology', 'Tuesday', '2024-08-20', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(318, 'Information technology', 'Wednesday', '2024-08-21', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(319, 'Information technology', 'Thursday', '2024-08-22', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(320, 'Information technology', 'Friday', '2024-08-23', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(321, 'Information technology', 'Monday', '2024-08-26', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(322, 'Information technology', 'Tuesday', '2024-08-27', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(323, 'Information technology', 'Wednesday', '2024-08-28', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(324, 'Information technology', 'Thursday', '2024-08-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(325, 'Information technology', 'Friday', '2024-08-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(326, 'Information technology', 'Monday', '2024-09-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(327, 'Information technology', 'Tuesday', '2024-09-03', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(328, 'Information technology', 'Wednesday', '2024-09-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(329, 'Information technology', 'Thursday', '2024-09-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(330, 'Information technology', 'Friday', '2024-09-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(331, 'Information technology', 'Monday', '2024-09-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(332, 'Information technology', 'Tuesday', '2024-09-10', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(333, 'Information technology', 'Wednesday', '2024-09-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(334, 'Information technology', 'Thursday', '2024-09-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(335, 'Information technology', 'Friday', '2024-09-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(336, 'Information technology', 'Monday', '2024-09-16', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(337, 'Information technology', 'Tuesday', '2024-09-17', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(338, 'Information technology', 'Wednesday', '2024-09-18', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(339, 'Information technology', 'Thursday', '2024-09-19', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(340, 'Information technology', 'Friday', '2024-09-20', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(341, 'Information technology', 'Monday', '2024-09-23', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(342, 'Information technology', 'Tuesday', '2024-09-24', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(343, 'Information technology', 'Wednesday', '2024-09-25', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(344, 'Information technology', 'Thursday', '2024-09-26', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(345, 'Information technology', 'Friday', '2024-09-27', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(346, 'Information technology', 'Monday', '2024-09-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(347, 'Information technology', 'Tuesday', '2024-10-01', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(348, 'Information technology', 'Wednesday', '2024-10-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(349, 'Information technology', 'Thursday', '2024-10-03', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(350, 'Information technology', 'Friday', '2024-10-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(351, 'Information technology', 'Monday', '2024-10-07', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(352, 'Information technology', 'Tuesday', '2024-10-08', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(353, 'Information technology', 'Wednesday', '2024-10-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(354, 'Information technology', 'Thursday', '2024-10-10', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(355, 'Information technology', 'Friday', '2024-10-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(356, 'Information technology', 'Monday', '2024-10-14', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(357, 'Information technology', 'Tuesday', '2024-10-15', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(358, 'Information technology', 'Wednesday', '2024-10-16', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(359, 'Information technology', 'Thursday', '2024-10-17', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(360, 'Information technology', 'Friday', '2024-10-18', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(361, 'Information technology', 'Monday', '2024-10-21', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(362, 'Information technology', 'Tuesday', '2024-10-22', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(363, 'Information technology', 'Wednesday', '2024-10-23', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(364, 'Information technology', 'Thursday', '2024-10-24', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(365, 'Information technology', 'Friday', '2024-10-25', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(366, 'Information technology', 'Monday', '2024-10-28', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(367, 'Information technology', 'Tuesday', '2024-10-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(368, 'Information technology', 'Wednesday', '2024-10-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(369, 'Information technology', 'Thursday', '2024-10-31', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(370, 'Information technology', 'Friday', '2024-11-01', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(371, 'Information technology', 'Monday', '2024-11-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(372, 'Information technology', 'Tuesday', '2024-11-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(373, 'Information technology', 'Wednesday', '2024-11-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(374, 'Information technology', 'Thursday', '2024-11-07', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(375, 'Information technology', 'Friday', '2024-11-08', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(376, 'Information technology', 'Monday', '2024-11-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(377, 'Information technology', 'Tuesday', '2024-11-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(378, 'Information technology', 'Wednesday', '2024-11-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(379, 'Information technology', 'Thursday', '2024-11-14', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(380, 'Information technology', 'Friday', '2024-11-15', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(381, 'Information technology', 'Monday', '2024-11-18', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(382, 'Information technology', 'Tuesday', '2024-11-19', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(383, 'Information technology', 'Wednesday', '2024-11-20', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(384, 'Information technology', 'Thursday', '2024-11-21', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(385, 'Information technology', 'Friday', '2024-11-22', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(386, 'Information technology', 'Monday', '2024-11-25', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(387, 'Information technology', 'Tuesday', '2024-11-26', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(388, 'Information technology', 'Wednesday', '2024-11-27', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(389, 'Information technology', 'Thursday', '2024-11-28', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(390, 'Information technology', 'Friday', '2024-11-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(391, 'Information technology', 'Monday', '2024-12-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(392, 'Information technology', 'Tuesday', '2024-12-03', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(393, 'Information technology', 'Wednesday', '2024-12-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(394, 'Information technology', 'Thursday', '2024-12-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(395, 'Information technology', 'Friday', '2024-12-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(396, 'Information technology', 'Monday', '2024-12-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(397, 'Information technology', 'Tuesday', '2024-12-10', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(398, 'Information technology', 'Wednesday', '2024-12-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(399, 'Information technology', 'Thursday', '2024-12-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(400, 'Information technology', 'Friday', '2024-12-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(401, 'Information technology', 'Monday', '2024-07-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(402, 'Information technology', 'Tuesday', '2024-07-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(403, 'Information technology', 'Wednesday', '2024-07-31', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(404, 'Information technology', 'Thursday', '2024-08-01', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(405, 'Information technology', 'Friday', '2024-08-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(406, 'Information technology', 'Monday', '2024-08-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(407, 'Information technology', 'Tuesday', '2024-08-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(408, 'Information technology', 'Wednesday', '2024-08-07', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(409, 'Information technology', 'Thursday', '2024-08-08', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(410, 'Information technology', 'Friday', '2024-08-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(411, 'Information technology', 'Monday', '2024-08-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(412, 'Information technology', 'Tuesday', '2024-08-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(413, 'Information technology', 'Wednesday', '2024-08-14', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(414, 'Information technology', 'Thursday', '2024-08-15', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(415, 'Information technology', 'Friday', '2024-08-16', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(416, 'Information technology', 'Monday', '2024-08-19', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(417, 'Information technology', 'Tuesday', '2024-08-20', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(418, 'Information technology', 'Wednesday', '2024-08-21', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(419, 'Information technology', 'Thursday', '2024-08-22', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(420, 'Information technology', 'Friday', '2024-08-23', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(421, 'Information technology', 'Monday', '2024-08-26', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(422, 'Information technology', 'Tuesday', '2024-08-27', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(423, 'Information technology', 'Wednesday', '2024-08-28', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(424, 'Information technology', 'Thursday', '2024-08-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(425, 'Information technology', 'Friday', '2024-08-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(426, 'Information technology', 'Monday', '2024-09-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(427, 'Information technology', 'Tuesday', '2024-09-03', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(428, 'Information technology', 'Wednesday', '2024-09-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(429, 'Information technology', 'Thursday', '2024-09-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(430, 'Information technology', 'Friday', '2024-09-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(431, 'Information technology', 'Monday', '2024-09-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(432, 'Information technology', 'Tuesday', '2024-09-10', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(433, 'Information technology', 'Wednesday', '2024-09-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(434, 'Information technology', 'Thursday', '2024-09-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(435, 'Information technology', 'Friday', '2024-09-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(436, 'Information technology', 'Monday', '2024-09-16', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(437, 'Information technology', 'Tuesday', '2024-09-17', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(438, 'Information technology', 'Wednesday', '2024-09-18', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(439, 'Information technology', 'Thursday', '2024-09-19', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(440, 'Information technology', 'Friday', '2024-09-20', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(441, 'Information technology', 'Monday', '2024-09-23', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(442, 'Information technology', 'Tuesday', '2024-09-24', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(443, 'Information technology', 'Wednesday', '2024-09-25', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(444, 'Information technology', 'Thursday', '2024-09-26', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(445, 'Information technology', 'Friday', '2024-09-27', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(446, 'Information technology', 'Monday', '2024-09-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(447, 'Information technology', 'Tuesday', '2024-10-01', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(448, 'Information technology', 'Wednesday', '2024-10-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(449, 'Information technology', 'Thursday', '2024-10-03', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(450, 'Information technology', 'Friday', '2024-10-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(451, 'Information technology', 'Monday', '2024-10-07', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(452, 'Information technology', 'Tuesday', '2024-10-08', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(453, 'Information technology', 'Wednesday', '2024-10-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(454, 'Information technology', 'Thursday', '2024-10-10', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(455, 'Information technology', 'Friday', '2024-10-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(456, 'Information technology', 'Monday', '2024-10-14', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(457, 'Information technology', 'Tuesday', '2024-10-15', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(458, 'Information technology', 'Wednesday', '2024-10-16', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(459, 'Information technology', 'Thursday', '2024-10-17', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(460, 'Information technology', 'Friday', '2024-10-18', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(461, 'Information technology', 'Monday', '2024-10-21', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(462, 'Information technology', 'Tuesday', '2024-10-22', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(463, 'Information technology', 'Wednesday', '2024-10-23', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(464, 'Information technology', 'Thursday', '2024-10-24', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(465, 'Information technology', 'Friday', '2024-10-25', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(466, 'Information technology', 'Monday', '2024-10-28', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(467, 'Information technology', 'Tuesday', '2024-10-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(468, 'Information technology', 'Wednesday', '2024-10-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(469, 'Information technology', 'Thursday', '2024-10-31', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(470, 'Information technology', 'Friday', '2024-11-01', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(471, 'Information technology', 'Monday', '2024-11-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(472, 'Information technology', 'Tuesday', '2024-11-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(473, 'Information technology', 'Wednesday', '2024-11-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(474, 'Information technology', 'Thursday', '2024-11-07', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(475, 'Information technology', 'Friday', '2024-11-08', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(476, 'Information technology', 'Monday', '2024-11-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(477, 'Information technology', 'Tuesday', '2024-11-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(478, 'Information technology', 'Wednesday', '2024-11-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(479, 'Information technology', 'Thursday', '2024-11-14', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(480, 'Information technology', 'Friday', '2024-11-15', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(481, 'Information technology', 'Monday', '2024-11-18', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(482, 'Information technology', 'Tuesday', '2024-11-19', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(483, 'Information technology', 'Wednesday', '2024-11-20', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(484, 'Information technology', 'Thursday', '2024-11-21', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(485, 'Information technology', 'Friday', '2024-11-22', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(486, 'Information technology', 'Monday', '2024-11-25', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(487, 'Information technology', 'Tuesday', '2024-11-26', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(488, 'Information technology', 'Wednesday', '2024-11-27', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(489, 'Information technology', 'Thursday', '2024-11-28', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(490, 'Information technology', 'Friday', '2024-11-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(491, 'Information technology', 'Monday', '2024-12-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(492, 'Information technology', 'Tuesday', '2024-12-03', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(493, 'Information technology', 'Wednesday', '2024-12-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(494, 'Information technology', 'Thursday', '2024-12-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(495, 'Information technology', 'Friday', '2024-12-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(496, 'Information technology', 'Monday', '2024-12-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(497, 'Information technology', 'Tuesday', '2024-12-10', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(498, 'Information technology', 'Wednesday', '2024-12-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(499, 'Information technology', 'Thursday', '2024-12-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(500, 'Information technology', 'Friday', '2024-12-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(501, 'Information technology', 'Monday', '2024-07-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(502, 'Information technology', 'Tuesday', '2024-07-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(503, 'Information technology', 'Wednesday', '2024-07-31', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(504, 'Information technology', 'Thursday', '2024-08-01', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(505, 'Information technology', 'Friday', '2024-08-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(506, 'Information technology', 'Monday', '2024-08-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(507, 'Information technology', 'Tuesday', '2024-08-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(508, 'Information technology', 'Wednesday', '2024-08-07', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(509, 'Information technology', 'Thursday', '2024-08-08', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(510, 'Information technology', 'Friday', '2024-08-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(511, 'Information technology', 'Monday', '2024-08-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(512, 'Information technology', 'Tuesday', '2024-08-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(513, 'Information technology', 'Wednesday', '2024-08-14', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(514, 'Information technology', 'Thursday', '2024-08-15', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(515, 'Information technology', 'Friday', '2024-08-16', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(516, 'Information technology', 'Monday', '2024-08-19', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(517, 'Information technology', 'Tuesday', '2024-08-20', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(518, 'Information technology', 'Wednesday', '2024-08-21', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(519, 'Information technology', 'Thursday', '2024-08-22', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(520, 'Information technology', 'Friday', '2024-08-23', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(521, 'Information technology', 'Monday', '2024-08-26', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(522, 'Information technology', 'Tuesday', '2024-08-27', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(523, 'Information technology', 'Wednesday', '2024-08-28', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(524, 'Information technology', 'Thursday', '2024-08-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(525, 'Information technology', 'Friday', '2024-08-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(526, 'Information technology', 'Monday', '2024-09-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(527, 'Information technology', 'Tuesday', '2024-09-03', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(528, 'Information technology', 'Wednesday', '2024-09-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(529, 'Information technology', 'Thursday', '2024-09-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(530, 'Information technology', 'Friday', '2024-09-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(531, 'Information technology', 'Monday', '2024-09-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(532, 'Information technology', 'Tuesday', '2024-09-10', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(533, 'Information technology', 'Wednesday', '2024-09-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(534, 'Information technology', 'Thursday', '2024-09-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(535, 'Information technology', 'Friday', '2024-09-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(536, 'Information technology', 'Monday', '2024-09-16', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(537, 'Information technology', 'Tuesday', '2024-09-17', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(538, 'Information technology', 'Wednesday', '2024-09-18', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(539, 'Information technology', 'Thursday', '2024-09-19', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(540, 'Information technology', 'Friday', '2024-09-20', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(541, 'Information technology', 'Monday', '2024-09-23', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(542, 'Information technology', 'Tuesday', '2024-09-24', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(543, 'Information technology', 'Wednesday', '2024-09-25', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(544, 'Information technology', 'Thursday', '2024-09-26', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(545, 'Information technology', 'Friday', '2024-09-27', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(546, 'Information technology', 'Monday', '2024-09-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(547, 'Information technology', 'Tuesday', '2024-10-01', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(548, 'Information technology', 'Wednesday', '2024-10-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(549, 'Information technology', 'Thursday', '2024-10-03', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(550, 'Information technology', 'Friday', '2024-10-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(551, 'Information technology', 'Monday', '2024-10-07', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(552, 'Information technology', 'Tuesday', '2024-10-08', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(553, 'Information technology', 'Wednesday', '2024-10-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(554, 'Information technology', 'Thursday', '2024-10-10', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(555, 'Information technology', 'Friday', '2024-10-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(556, 'Information technology', 'Monday', '2024-10-14', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(557, 'Information technology', 'Tuesday', '2024-10-15', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(558, 'Information technology', 'Wednesday', '2024-10-16', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(559, 'Information technology', 'Thursday', '2024-10-17', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(560, 'Information technology', 'Friday', '2024-10-18', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(561, 'Information technology', 'Monday', '2024-10-21', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(562, 'Information technology', 'Tuesday', '2024-10-22', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(563, 'Information technology', 'Wednesday', '2024-10-23', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(564, 'Information technology', 'Thursday', '2024-10-24', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1');
INSERT INTO `classchedule` (`id`, `class_name`, `day_of_week`, `date`, `start_time`, `end_time`, `classroom_location`, `section`) VALUES
(565, 'Information technology', 'Friday', '2024-10-25', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(566, 'Information technology', 'Monday', '2024-10-28', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(567, 'Information technology', 'Tuesday', '2024-10-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(568, 'Information technology', 'Wednesday', '2024-10-30', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(569, 'Information technology', 'Thursday', '2024-10-31', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(570, 'Information technology', 'Friday', '2024-11-01', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(571, 'Information technology', 'Monday', '2024-11-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(572, 'Information technology', 'Tuesday', '2024-11-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(573, 'Information technology', 'Wednesday', '2024-11-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(574, 'Information technology', 'Thursday', '2024-11-07', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(575, 'Information technology', 'Friday', '2024-11-08', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(576, 'Information technology', 'Monday', '2024-11-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(577, 'Information technology', 'Tuesday', '2024-11-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(578, 'Information technology', 'Wednesday', '2024-11-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(579, 'Information technology', 'Thursday', '2024-11-14', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(580, 'Information technology', 'Friday', '2024-11-15', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(581, 'Information technology', 'Monday', '2024-11-18', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(582, 'Information technology', 'Tuesday', '2024-11-19', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(583, 'Information technology', 'Wednesday', '2024-11-20', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(584, 'Information technology', 'Thursday', '2024-11-21', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(585, 'Information technology', 'Friday', '2024-11-22', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(586, 'Information technology', 'Monday', '2024-11-25', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(587, 'Information technology', 'Tuesday', '2024-11-26', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(588, 'Information technology', 'Wednesday', '2024-11-27', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(589, 'Information technology', 'Thursday', '2024-11-28', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(590, 'Information technology', 'Friday', '2024-11-29', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(591, 'Information technology', 'Monday', '2024-12-02', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(592, 'Information technology', 'Tuesday', '2024-12-03', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(593, 'Information technology', 'Wednesday', '2024-12-04', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(594, 'Information technology', 'Thursday', '2024-12-05', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(595, 'Information technology', 'Friday', '2024-12-06', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(596, 'Information technology', 'Monday', '2024-12-09', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(597, 'Information technology', 'Tuesday', '2024-12-10', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(598, 'Information technology', 'Wednesday', '2024-12-11', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(599, 'Information technology', 'Thursday', '2024-12-12', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1'),
(600, 'Information technology', 'Friday', '2024-12-13', '11:30:00', '12:30:00', 'ROOM 3', 'SECTION 1');

-- --------------------------------------------------------

--
-- Table structure for table `classschedule`
--

CREATE TABLE `classschedule` (
  `schedule_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `day_of_week` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `classroom_location` varchar(255) NOT NULL,
  `section` varchar(50) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classschedule`
--

INSERT INTO `classschedule` (`schedule_id`, `class_name`, `day_of_week`, `start_time`, `end_time`, `classroom_location`, `section`, `subject_name`) VALUES
(1, '', 'Wednesday', '13:21:00', '14:21:00', 'ROOM 1', 'Athena', 'Programming 2'),
(2, '', 'Wednesday', '16:24:00', '12:27:00', 'ROOM 1', 'Athena', 'Programming 2'),
(3, '', 'Monday', '12:26:00', '12:27:00', 'ROOM 1', 'Athena4', 'Physical Education'),
(4, '', '', '12:26:00', '12:27:00', 'ROOM 1', 'Athena4', 'Physical Education'),
(5, '', 'Wednesday', '12:26:00', '12:27:00', 'ROOM 1', 'Athena4', 'Physical Education'),
(6, '', '', '12:26:00', '12:27:00', 'ROOM 1', 'Athena4', 'Physical Education'),
(7, '', 'Tuesday', '12:26:00', '12:27:00', 'ROOM 1', 'Athena4', 'Physical Education'),
(8, '', '', '12:26:00', '12:27:00', 'ROOM 1', 'Athena4', 'Physical Education'),
(9, '', 'Tuesday', '12:26:00', '12:27:00', 'ROOM 1', 'Athena4', 'Physical Education'),
(10, '', '', '12:26:00', '12:27:00', 'ROOM 1', 'Athena4', 'Physical Education'),
(11, '', 'Monday', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1'),
(12, '', '', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1'),
(13, '', 'Wednesday', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1'),
(14, '', '', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1'),
(15, '', 'Friday', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1'),
(16, '', '', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1'),
(17, '', 'Tuesday', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1'),
(18, '', '', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1'),
(19, '', 'Tuesday', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1'),
(20, '', '', '18:26:00', '12:29:00', 'ROOM 1', 'Athena4', 'Programming 1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
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

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `student_id_number`, `date_of_birth`, `gender`, `address`, `section`, `password`, `rfid_number`, `profile_image_url`) VALUES
(124, 'Alexander', 'James', 'Smith', 'alexander.smith@example.com', '24-10234567', '2007-05-31', 'Male', '23 Maple Street, Springfield, IL 62701', 'Section 1', '', '0000635447', '../DefaultProfile/MaleDefaultProfile.png'),
(125, 'Benjamin', 'David', 'Johnson', 'benjamin.johnson@example.com', '24-20345678', '2007-06-01', 'Male', '456 Oak Avenue, Austin, TX 73301', 'Section 1', '', '0000611043', '../DefaultProfile/MaleDefaultProfile.png'),
(126, 'Charlotte', 'Rose', 'Williams', 'charlotte.williams@example.com', '24-30456789', '2007-06-02', 'Female', '789 Pine Road, Denver, CO 80201', 'Section 1', '', '0009405919', '../DefaultProfile/FemaleDefaultProfile.png'),
(127, 'Daniel', 'Michael', 'Brown', 'daniel.brown@example.com', '24-40567890', '2007-06-03', 'Male', '101 Birch Lane, Seattle, WA 98101', 'Section 1', '', '0009762957', '../DefaultProfile/MaleDefaultProfile.png'),
(128, 'Emma', 'Grace', 'Jones', 'emma.jones@example.com', '24-50678901', '2007-06-04', 'Female', '202 Cedar Boulevard, Miami, FL 33101', 'Section 1', '', '0009764193', '../DefaultProfile/FemaleDefaultProfile.png'),
(129, 'Fiona', 'Marie', 'Garcia', 'fiona.garcia@example.com', '24-60789012', '2007-06-05', 'Female', '303 Walnut Drive, Boston, MA 02101', 'Section 1', '', '0009767637', '../DefaultProfile/FemaleDefaultProfile.png'),
(130, 'George', 'Thomas', 'Miller', 'george.miller@example.com', '24-70890123', '2007-06-06', 'Male', '404 Elm Street, Portland, OR 97201', 'Section 1', '', '0009701735', '../DefaultProfile/MaleDefaultProfile.png'),
(131, 'Hannah', 'Elizabeth', 'Davis', 'hannah.davis@example.com', '24-80901234', '2007-06-07', 'Female', '505 Aspen Circle, Chicago, IL 60601', 'Section 1', '', '0009780703', '../DefaultProfile/FemaleDefaultProfile.png'),
(132, 'Isabella', 'Jane', 'Martinez', 'isabella.martinez@example.com', '24-91012345', '2007-06-08', 'Female', '606 Cherry Court, San Francisco, CA 94101', 'Section 1', '', '0009780368', '../DefaultProfile/FemaleDefaultProfile.png'),
(133, 'Jacob', 'William', 'Wilson', 'jacob.wilson@example.com', '24-01123456', '2007-06-09', 'Male', '707 Willow Way, Atlanta, GA 30301', 'Section 1', '', '0009400532', '../DefaultProfile/MaleDefaultProfile.png');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `teacher` varchar(255) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `meeting_days` varchar(50) DEFAULT NULL,
  `semester` tinyint(4) NOT NULL,
  `academic_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_code`, `teacher`, `section`, `meeting_days`, `semester`, `academic_year`) VALUES
(1, 'Physical Education', 'PE101', 'Noland Duran Igut', '11 Athena', 'M,W,T,TH', 1, '2024-2025'),
(3, 'fngfdn', 'nfnfdn', 'nfdnffgn', 'fnsn', 'W,F,TH', 1, '2024-2025'),
(4, 'Programming 1', 'IT101', 'Noland Duran Igut', '11 Athena', 'M,W,F,T,TH', 1, '2024-2025'),
(5, 'Programming 2', 'IT103', 'Noland Duran Igut', '11 Athena', 'W', 2, '2024-2025'),
(6, 'Programming 3', 'IT103', 'Noland Duran Igut', '11 Athena', 'M', 1, '2024-2025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id_number` (`student_id_number`);

--
-- Indexes for table `classchedule`
--
ALTER TABLE `classchedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classschedule`
--
ALTER TABLE `classschedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `subject_name` (`subject_name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student_id_number` (`student_id_number`),
  ADD UNIQUE KEY `rfid_number` (`rfid_number`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `classchedule`
--
ALTER TABLE `classchedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT for table `classschedule`
--
ALTER TABLE `classschedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id_number`) REFERENCES `students` (`student_id_number`);

--
-- Constraints for table `classschedule`
--
ALTER TABLE `classschedule`
  ADD CONSTRAINT `classschedule_ibfk_1` FOREIGN KEY (`subject_name`) REFERENCES `subject` (`subject_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

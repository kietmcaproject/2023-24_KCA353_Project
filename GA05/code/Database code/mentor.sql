-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 05:02 PM
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
-- Database: `mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `counseling_records`
--

CREATE TABLE `counseling_records` (
  `id` varchar(40) NOT NULL,
  `counseling_date` date DEFAULT NULL,
  `counseling_remark` text DEFAULT NULL,
  `counseling_suggestion` text DEFAULT NULL,
  `achievement_document` varchar(255) DEFAULT NULL,
  `upcoming_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counseling_records`
--

INSERT INTO `counseling_records` (`id`, `counseling_date`, `counseling_remark`, `counseling_suggestion`, `achievement_document`, `upcoming_date`) VALUES
('2224MCA1000', '2023-11-30', 'bdsss', 'sbs', 'uploads/Abhishek Resume2.pdf', '0000-00-00'),
('2224MCA1000', '2023-11-27', 'adsf', 'axsx', 'uploads/Abhishek Resume2.pdf', '2023-11-28'),
('2224MCA1106', '2023-11-27', 'akasrh', 'akarsh', 'uploads/Abhishek Resume2.pdf', '2023-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` varchar(20) NOT NULL,
  `ct1_marks` int(11) DEFAULT NULL,
  `ct2_marks` int(11) DEFAULT NULL,
  `pue_marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `ct1_marks`, `ct2_marks`, `pue_marks`) VALUES
('2224MCA1000', 43, 45, 76),
('2224MCA1010', 76, 78, 98),
('2224MCA1095', 89, 78, 75);

-- --------------------------------------------------------

--
-- Table structure for table `mentor_login`
--

CREATE TABLE `mentor_login` (
  `mentor_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `student_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor_login`
--

INSERT INTO `mentor_login` (`mentor_id`, `username`, `password`, `name`, `contact`, `experience`, `area`, `image`, `student_count`) VALUES
(3, 'Neelam@mentor.com', '1234', 'Neelam Rawat', '7864567876', 12, 'Computer Applications', 'neelam.jpg\r\n', 20),
(4, 'Prashant@mentor.com', '1234', 'Prashant Agarwal', '8789876756', 20, 'DSA', 'prashant.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `parents_details`
--

CREATE TABLE `parents_details` (
  `id` varchar(40) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `leetcode` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `Github` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents_details`
--

INSERT INTO `parents_details` (`id`, `father_name`, `mother_name`, `contact`, `leetcode`, `linkedin`, `Github`) VALUES
('2224MCA1095', 'Arun', 'Preeti', '9897678765', 'www.leetcode.com/ekansh', 'www.linkedin.com/ekansh', 'www.github.com/ekansh');

-- --------------------------------------------------------

--
-- Table structure for table `req_res`
--

CREATE TABLE `req_res` (
  `id` varchar(40) NOT NULL,
  `request` text NOT NULL,
  `response` text DEFAULT NULL,
  `mentor_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `req_res`
--

INSERT INTO `req_res` (`id`, `request`, `response`, `mentor_id`) VALUES
('2224MCA1000', 'Hii Astha', NULL, 'Neelam@mentor.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `section` char(1) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `attendance` int(11) DEFAULT NULL,
  `mentor_id` varchar(50) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `roll_no` int(11) DEFAULT NULL,
  `unv_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `section`, `contact`, `department`, `attendance`, `mentor_id`, `password`, `roll_no`, `unv_no`) VALUES
('', '', '', '', '', 0, '', '', 0, ''),
('2224MCA1000', 'Aastha Gupta', 'A', '8767897654', 'MCA', 89, 'Neelam@mentor.com', 'astha', 1, '2200290140001'),
('2224MCA1095', 'Ekansh', 'A', '8976786545', 'MCA', 85, 'Neelam@mentor.com', 'ekansh', 20, '2200290140059'),
('2224MCA1106', 'Akarsh', 'A', '8767854345', 'MCA', 78, 'Prashant@mentor.com', 'akarsh', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor_login`
--
ALTER TABLE `mentor_login`
  ADD PRIMARY KEY (`mentor_id`);

--
-- Indexes for table `parents_details`
--
ALTER TABLE `parents_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`name`(40));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mentor_login`
--
ALTER TABLE `mentor_login`
  MODIFY `mentor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

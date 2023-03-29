-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 02:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `murso`
--
CREATE DATABASE IF NOT EXISTS `murso` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `murso`;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `org_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_desc` varchar(255) NOT NULL,
  `org_dept` enum('Agriculture and Forestry','Arts and Sciences','Business and Management','Computer Studies','Criminology','Dentistry','Education','Engineering and Technology','Law','Maritime Education','Medical Technology','Nursing, Midwifery & Radiologic Technology','High School','Grade School') NOT NULL,
  `org_adviser` varchar(255) NOT NULL,
  `creation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `filename`, `org_name`, `org_desc`, `org_dept`, `org_adviser`, `creation_date`) VALUES
(1, '', 'MUARTISTS', 'Introducing the incredible artist whose every stroke of the brush on canvas is a masterpiece in its own right. With a unique vision and an unparalleled passion for art, this talented individual creates works that captivate the imagination and transport yo', 'Agriculture and Forestry', 'Ava Rodriguez', '2023-03-01'),
(6, '', 'MUAMUA', 'Misamis University Artistic MakeUp Artist is ready for MUAMUA', 'Education', 'Kenny Roger', '2023-03-07'),
(21, 'images2.png', 'MURA', 'Misamis University Robotic Avengers, A group of students who are passionate about building robots and competing in national robotic competitions.', 'High School', 'Marcus Green', '2023-03-29'),
(22, 'download.png', 'MUSUNFLOWER', 'Then you\'re left in the dust\r\nUnless I stuck by ya\r\nYou\'re the sunflower\r\nI think your love would be too much', 'Medical Technology', 'Swae Lee', '2023-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `orgs_mem`
--

CREATE TABLE `orgs_mem` (
  `stud_org_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orgs_mem`
--

INSERT INTO `orgs_mem` (`stud_org_id`, `org_id`, `student_id`, `position`, `join_date`) VALUES
(17, 6, 1802238, 'Member', '2023-03-28 14:51:01'),
(18, 6, 1802239, 'Member', '2023-03-28 14:51:08'),
(19, 6, 1802240, 'Member', '2023-03-28 14:51:17'),
(20, 6, 1802241, 'Member', '2023-03-28 14:51:26'),
(47, 1, 1801111, 'Member', '2023-03-29 12:19:40'),
(48, 1, 1802233, 'Member', '2023-03-29 12:19:44'),
(49, 1, 1802240, 'Member', '2023-03-29 12:19:47'),
(50, 21, 1802235, 'Member', '2023-03-29 12:19:55'),
(51, 21, 1802239, 'Member', '2023-03-29 12:19:59'),
(52, 21, 1802238, 'Member', '2023-03-29 12:20:03'),
(53, 1, 1802235, 'Member', '2023-03-29 12:22:23'),
(54, 22, 1802239, 'Member', '2023-03-29 12:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mi` char(2) NOT NULL,
  `course` varchar(255) NOT NULL,
  `level` enum('1','2','3','4') NOT NULL,
  `gender` enum('Male','Female','Undefined') NOT NULL,
  `contact_num` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`student_id`, `firstname`, `lastname`, `mi`, `course`, `level`, `gender`, `contact_num`) VALUES
(1801111, 'John Micky', 'Butnande', 'B', 'BSIT', '1', 'Male', 639386834879),
(1802233, 'Cardo', 'Dalisay', 'B', 'BSCS', '2', 'Female', 9123456789),
(1802234, 'Celina', 'Sged', 'B', 'LAW', '4', 'Female', 0),
(1802235, 'John', 'Doe', 'Z', 'CBM', '2', 'Female', 9123456789),
(1802236, 'Adan', 'Emmanuel', 'C', 'CET', '3', 'Male', 9123456789),
(1802237, 'Eva', 'Magdalena', 'K', 'HRM', '4', 'Female', 22222),
(1802238, 'Justine', 'Tagaan', 'D', 'BSIT', '3', 'Female', 0),
(1802239, 'Roxy', 'Pasok', '', 'BSCS', '4', 'Male', 3333333),
(1802240, 'Brian', 'Hambre', '', 'LAW', '2', 'Male', 5555555555),
(1802241, 'Nikki', 'Minaj', 'G', 'NMRT', '3', 'Female', 66666666);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `password`, `usertype`) VALUES
(1, 'admin', 'admin', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `orgs_mem`
--
ALTER TABLE `orgs_mem`
  ADD PRIMARY KEY (`stud_org_id`),
  ADD KEY `org_id` (`org_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orgs_mem`
--
ALTER TABLE `orgs_mem`
  MODIFY `stud_org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1802242;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orgs_mem`
--
ALTER TABLE `orgs_mem`
  ADD CONSTRAINT `orgs_mem_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organization` (`org_id`),
  ADD CONSTRAINT `orgs_mem_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_information` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

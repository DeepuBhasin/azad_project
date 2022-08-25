-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 08:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azad_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `id` int(11) NOT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`id`, `contact_info`, `address`, `created_at`) VALUES
(1, 'You can contact or visit us in our office from Monday to Saturday from 8 a.m. - 5 p.m.', '66A street no.3\r\nPartap avenue opposite mall of amritsar\r\nAmritsar\r\nPunjab, India\r\n143001      ', '2022-03-05 15:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `footerdiv`
--

CREATE TABLE `footerdiv` (
  `id` int(11) NOT NULL,
  `about_us` longtext DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `phone1` varchar(15) DEFAULT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `working_hours` varchar(150) DEFAULT NULL,
  `copyright` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footerdiv`
--

INSERT INTO `footerdiv` (`id`, `about_us`, `tags`, `phone1`, `phone2`, `email`, `working_hours`, `copyright`, `created_at`) VALUES
(1, 'We are team players with apt knowledge, skills and experience focused on achieving highest quality of work for our clients. We believe in collaboration and innovation to provide cost effective achievable solutions and make our client\'s life easier. ', 'Building construction, Multistory building, Khalsa College, Traditional style construction', '+91 98148 97920', '+64 2247 38036', 'azadcivil07@hotmail.com', '8:00 a.m - 18:00 p.m', 'All right are reservered', '2021-11-03 13:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `home_table`
--

CREATE TABLE `home_table` (
  `id` int(11) NOT NULL,
  `about_heading` varchar(255) DEFAULT NULL,
  `about_description` longtext DEFAULT NULL,
  `slide_show_images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_table`
--

INSERT INTO `home_table` (`id`, `about_heading`, `about_description`, `slide_show_images`) VALUES
(1, 'WE AIM TO MAKE OUR CLIENTS LIFE SIMPLE\'s', 'The Core Attributes that CLLAim to Deliver To Their Clients are \"Service And Solution\" Based around an ethos of professionalism and value, we aim to make our client\'s. \r\nOK\r\ntest               \r\n\r\n\r\n\r\n\r\n\r\n\r\nokokokok\r\nppkpl                                          ', '62236c4d606e4EOA_EmailCodingBasics_Blog.jpg,62236c4d6f08fphoto-1599507593362-50fa53ed1b40.jpg,62236c4d7712cthumb-1920-338157.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `created_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `user_name`, `password`, `status`, `created_dt`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2021-10-27 10:29:18'),
(2, 'azad', 'f9819e4d963f46cbc169f56bea1f2cc7', 1, '2021-10-27 10:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `message_table`
--

CREATE TABLE `message_table` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_category`
--

CREATE TABLE `project_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_category`
--

INSERT INTO `project_category` (`id`, `name`) VALUES
(1, 'interior'),
(2, 'building'),
(3, 'construction'),
(4, 'house'),
(5, 'architecture'),
(6, 'floor');

-- --------------------------------------------------------

--
-- Table structure for table `project_table`
--

CREATE TABLE `project_table` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `category` varchar(150) DEFAULT NULL,
  `main_image_1` varchar(255) DEFAULT NULL,
  `main_image_2` varchar(255) DEFAULT NULL,
  `slide_show_images` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `project_date` datetime DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `project_value` varchar(150) DEFAULT NULL,
  `dashboard_status` int(11) NOT NULL DEFAULT 0,
  `visibile_status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vistors`
--

CREATE TABLE `vistors` (
  `id` int(11) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `created_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footerdiv`
--
ALTER TABLE `footerdiv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_table`
--
ALTER TABLE `home_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_table`
--
ALTER TABLE `message_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_category`
--
ALTER TABLE `project_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_table`
--
ALTER TABLE `project_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vistors`
--
ALTER TABLE `vistors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footerdiv`
--
ALTER TABLE `footerdiv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_table`
--
ALTER TABLE `home_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_table`
--
ALTER TABLE `message_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_category`
--
ALTER TABLE `project_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_table`
--
ALTER TABLE `project_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vistors`
--
ALTER TABLE `vistors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

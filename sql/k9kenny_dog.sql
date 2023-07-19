-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2021 at 05:39 AM
-- Server version: 10.3.32-MariaDB-log
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k9kenny_dog`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `dog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `file_name`, `uploaded_on`, `dog_id`) VALUES
(1, 'Screenshot 2021-10-30 at 2.20.59 PM.png', '2021-11-25 00:12:16', 15),
(2, 'Screenshot 2021-11-01 at 6.22.15 PM.png', '2021-11-25 00:12:16', 15),
(3, 'Screenshot 2021-11-01 at 6.22.22 PM.png', '2021-11-25 00:12:16', 15),
(4, 'Screenshot 2021-10-29 at 10.30.59 PM.png', '2021-11-26 00:29:26', 17),
(5, 'Screenshot 2021-10-29 at 10.31.33 PM.png', '2021-11-26 00:29:26', 17),
(6, 'Screenshot 2021-10-29 at 10.30.59 PM.png', '2021-11-26 00:30:26', 18),
(7, 'Screenshot 2021-10-29 at 10.31.33 PM.png', '2021-11-26 00:30:26', 18),
(8, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-26 00:37:56', 19),
(9, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-26 00:40:35', 20),
(10, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-26 00:41:44', 21);

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `address_line1` varchar(100) DEFAULT NULL,
  `address_line2` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(100) DEFAULT NULL,
  `dogName` varchar(100) DEFAULT NULL,
  `dogAge` varchar(100) DEFAULT NULL,
  `issues` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `breed` varchar(100) DEFAULT NULL,
  `found` varchar(100) DEFAULT NULL,
  `goals` text DEFAULT NULL,
  `additional_notes` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `modified` timestamp NULL DEFAULT current_timestamp(),
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`id`, `firstName`, `lastName`, `address_line1`, `address_line2`, `email`, `city`, `postal_code`, `dogName`, `dogAge`, `issues`, `phone`, `region`, `country`, `breed`, `found`, `goals`, `additional_notes`, `status`, `modified`, `created`) VALUES
(2, 'DK', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-24 17:13:12', '2021-11-24 17:13:12'),
(3, 'DK', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-24 17:13:25', '2021-11-24 17:13:25'),
(4, 'DK', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-24 17:13:27', '2021-11-24 17:13:27'),
(5, 'DK', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-24 17:13:34', '2021-11-24 17:13:34'),
(6, 'DK', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-24 17:15:11', '2021-11-24 17:15:11'),
(7, 'DK', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-24 17:15:38', '2021-11-24 17:15:38'),
(8, 'DK', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-24 17:24:06', '2021-11-24 17:24:06'),
(10, 'DK123', '', '', '', 'info123@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', 'Test', 0, '2021-11-24 17:25:31', '2021-11-24 17:25:31'),
(12, 'Info', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-25 00:11:33', '2021-11-25 00:11:33'),
(13, 'Info', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-25 00:11:35', '2021-11-25 00:11:35'),
(14, 'Info', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-25 00:11:36', '2021-11-25 00:11:36'),
(15, 'Info123', '', '', '', 'info1111@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-25 00:12:16', '2021-11-25 00:12:16'),
(16, 'Uma', '', '', '', 'uma@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-26 00:28:18', '2021-11-26 00:28:18'),
(17, 'Uma1', '', '', '', 'uma1@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-26 00:29:26', '2021-11-26 00:29:26'),
(18, 'Uma1', '', '', '', 'uma1@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-26 00:30:26', '2021-11-26 00:30:26'),
(19, 'Info123', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-26 00:37:56', '2021-11-26 00:37:56'),
(20, 'Info123', '', '', '', 'info@emanateedge.com', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2021-11-26 00:40:35', '2021-11-26 00:40:35'),
(22, 'Dinesh', 'Karthik', 'test', '', 'dinesh@gmail.com', 'test', '123', 'dog1', '1', '111', '1234567890', 'tn', 'IN', 'test', '', '', '', 0, '2021-11-26 05:55:20', '2021-11-26 05:55:20'),
(23, 'Dinesh', 'Karthik', 'test', '', 'dinesh@gmail.com', 'test', '123', 'dog1', '1', '111', '1234567890', 'tn', 'IN', 'test', '', '', '', 0, '2021-11-26 06:01:17', '2021-11-26 06:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `dog_photos`
--

CREATE TABLE `dog_photos` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `dog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dog_photos`
--

INSERT INTO `dog_photos` (`id`, `file_name`, `uploaded_on`, `dog_id`) VALUES
(1, 'Screenshot 2021-10-29 at 9.41.47 PM.png', '2021-11-25 00:11:33', 12),
(2, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-25 00:11:33', 12),
(3, 'Screenshot 2021-10-29 at 10.21.51 PM.png', '2021-11-25 00:11:33', 12),
(4, 'Screenshot 2021-10-29 at 9.41.47 PM.png', '2021-11-25 00:11:35', 13),
(5, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-25 00:11:35', 13),
(6, 'Screenshot 2021-10-29 at 10.21.51 PM.png', '2021-11-25 00:11:35', 13),
(7, 'Screenshot 2021-10-29 at 9.41.47 PM.png', '2021-11-25 00:11:36', 14),
(8, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-25 00:11:36', 14),
(9, 'Screenshot 2021-10-29 at 10.21.51 PM.png', '2021-11-25 00:11:36', 14),
(10, 'Screenshot 2021-10-26 at 12.51.42 PM.png', '2021-11-25 00:12:16', 15),
(11, 'Screenshot 2021-10-29 at 9.41.47 PM.png', '2021-11-25 00:12:16', 15),
(12, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-25 00:12:16', 15),
(13, 'Screenshot 2021-10-26 at 12.51.42 PM.png', '2021-11-26 00:28:18', 16),
(14, 'Screenshot 2021-10-29 at 9.41.47 PM.png', '2021-11-26 00:28:18', 16),
(15, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-26 00:28:18', 16),
(16, 'Screenshot 2021-10-26 at 12.51.42 PM.png', '2021-11-26 00:29:26', 17),
(17, 'Screenshot 2021-10-29 at 9.41.47 PM.png', '2021-11-26 00:29:26', 17),
(18, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-26 00:29:26', 17),
(19, 'Screenshot 2021-10-26 at 12.51.42 PM.png', '2021-11-26 00:30:26', 18),
(20, 'Screenshot 2021-10-29 at 9.41.47 PM.png', '2021-11-26 00:30:26', 18),
(21, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-26 00:30:26', 18),
(22, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-26 00:37:56', 19),
(23, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-26 00:40:35', 20),
(24, 'Screenshot 2021-10-29 at 9.42.41 PM.png', '2021-11-26 00:41:44', 21),
(25, 'Screenshot from 2021-11-20 09-22-12.png', '2021-11-26 05:55:20', 22),
(26, 'Screenshot from 2021-11-20 09-22-12.png', '2021-11-26 09:47:25', 23);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `lesson_notes` varchar(100) DEFAULT NULL,
  `lesson_date` date NOT NULL DEFAULT curdate(),
  `lesson_time` varchar(100) NOT NULL,
  `dog_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_notes`, `lesson_date`, `lesson_time`, `dog_id`) VALUES
(2, 'lesson1', '2021-11-27', '11:25:00', 22),
(3, 'lesson1', '2021-11-26', '11:25:00', 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL COMMENT '1->Super admin \r\n2 -> Limited Admin \r\n3-> Pre-weekend\r\n4->Rector',
  `email_verified` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `etc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `email_verified`, `status`, `reg_date`, `etc`) VALUES
(1, 'kenny', 'k9kenny', 'k9kenny@gmail.com', 1, 1, 1, '2021-11-29 13:32:14', ''),
(2, 'Limited Admin ', '12345', 'limiteduser@gmail.com', 2, 1, 1, '2021-11-29 13:31:05', ''),
(3, 'Pre-weekend', '1234', 'pre@gmail.com', 3, 1, 1, '2021-11-29 13:31:05', ''),
(4, 'Rector', '1234', 'rector@gmail.com', 4, 1, 1, '2021-11-29 13:31:05', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dog_photos`
--
ALTER TABLE `dog_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dog_photos`
--
ALTER TABLE `dog_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 12:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bab_employee_attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `check_in_time` datetime NOT NULL,
  `check_out_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `user_id`, `date`, `check_in_time`, `check_out_time`) VALUES
(49, 16, '2023-09-27', '2023-09-27 08:07:00', '2023-09-27 16:30:00'),
(50, 17, '2023-09-27', '2023-09-27 07:42:00', '2023-09-27 16:25:08'),
(51, 18, '2023-09-27', '2023-09-27 07:43:04', '2023-09-27 15:58:04'),
(52, 19, '2023-09-27', '2023-09-27 09:26:04', '2023-09-27 18:32:04'),
(53, 22, '2023-09-27', '2023-09-27 07:45:40', '2023-09-27 18:33:40'),
(54, 23, '2023-09-27', '2023-09-27 08:19:15', '2023-09-27 16:34:15'),
(55, 24, '2023-09-27', '2023-09-27 06:34:42', '2023-09-27 16:34:42'),
(56, 25, '2023-09-27', '2023-09-27 07:55:07', '2023-09-27 19:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `user_type` enum('user','admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `number`, `role`, `user_type`) VALUES
(16, 'Ahmed Mohsin', '$2y$10$8DDACM7H4G5uUk8IDraXCeDmawR.GdEdNMGsQnTEbFrD0Lp4ARqk6', 'ahmed@admin.com', 3366586, 'Infrastructure Manager', 'admin'),
(17, 'Ahmed Mustafa', '$2y$10$QHJiwdvRhKaOzk5hV1s8Hehw4nIkPMJBwFDQg0Ap2XOhMFRemuRB2', 'ahmed@admin.com', 1452369, 'Network Security Analyst', 'admin'),
(18, 'Khalid Alameen', '$2y$10$xQofnvqFGLAYi8m/HcKJF.8ZQNPpkKF4/HluFRTPoYQFFfeYKOyf6', 'Khalid@Support.com', 5569965, 'IT Support Engineer', 'user'),
(19, 'Mohammed Ali', '$2y$10$VdUSj1Sl0pIb2jnfcXht4OZu3mNBS7sD.2Wib.gEJWo/Pa7hyIAEm', 'Mo@hammed.com', 33335566, 'System Architect', 'user'),
(20, 'user', '$2y$10$hy4IDYCgQzZAthFTUed9S.JrQl0314nbOQYDZJfmLJ/9NsO3DSbqm', 'user@user.bh', 0, '', 'user'),
(21, 'user', '$2y$10$QMVioBC6fpjJsbOLmyAKuuZrIyfCvSo1n9lNx/rsip/I2f1IQqBKS', 'user@user.bh', 0, '', 'user'),
(22, 'Ali makki', '$2y$10$yYECSUbGtu/ewQNn4zF6l.wA7XxAmnuAKkXrtTx7de0kW6h5bohx6', 'Ali@user.com', 33225566, 'HR Manager', 'user'),
(23, 'Fatima Jaffar', '$2y$10$l3t0Q81dHSdIvsPgrY.JQuuuyZPerFqCMrG6RTER2Jkri6jKdQupG', 'Fatima@user.com', 33445522, 'UI/UX Engineer', 'user'),
(24, 'Hussain Khadem', '$2y$10$oiME7JXgIqX6jtgnZTpT/eACY1yRovxpTVttwAMrZpfpRMiIHsL2a', 'Hussain@user.com', 39665588, 'Finance Operations', 'user'),
(25, 'Mahdi Ahmed', '$2y$10$2pj4YC0HoOKhaWoPWDJtz.Idd5Hzf2VLU4B5FO8n8eav3PD8ybBo.', 'Mahdi@user.com', 66998855, 'System Engineer', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `FKUID` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `FKUID` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

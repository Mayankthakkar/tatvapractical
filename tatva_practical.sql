-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 04:25 PM
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
-- Database: `tatva_practical`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `recurrence_type` int(11) DEFAULT NULL,
  `recurrence_time` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `startdate`, `enddate`, `recurrence_type`, `recurrence_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Event 2', '2023-10-01', '2023-10-31', 1, 7, '2023-10-06 13:45:16', '2023-10-06 13:45:16', NULL),
(3, 'Event 3', '2023-10-01', '2023-10-31', 1, 31, '2023-10-06 13:45:33', '2023-10-06 14:00:44', NULL),
(4, 'Event 4', '2023-01-01', '2024-12-31', 1, 366, '2023-10-06 13:51:47', '2023-10-06 14:02:21', NULL),
(5, 'Event 5', '2023-10-01', '2023-10-10', 2, 1, '2023-10-06 13:52:10', '2023-10-06 13:52:10', NULL),
(6, 'Event 6', '2023-10-01', '2023-10-31', 2, 7, '2023-10-06 13:52:28', '2023-10-06 13:52:28', NULL),
(7, 'Event 7', '2023-10-01', '2023-12-31', 2, 31, '2023-10-06 13:52:52', '2023-10-06 14:00:47', NULL),
(8, 'Event 8', '2023-01-01', '2028-01-01', 2, 366, '2023-10-06 13:58:56', '2023-10-06 14:02:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

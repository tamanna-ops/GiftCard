-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 06:16 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_committee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(3) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_mobile` varchar(15) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_profile` varchar(255) NOT NULL,
  `admin_status` int(3) NOT NULL,
  `admin_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_username`, `admin_mobile`, `admin_address`, `admin_profile`, `admin_status`, `admin_created_at`) VALUES
(1, 'Admin', 'tam@admin.com', 'admin123', 'admin', '888888888', 'Lucknow', 'logo-light.png', 1, '2023-01-20 07:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_committee`
--

CREATE TABLE `tbl_committee` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_opendate` date NOT NULL,
  `com_duration` int(11) NOT NULL,
  `com_members` int(11) NOT NULL,
  `com_created_at` datetime NOT NULL,
  `com_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `com_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_committee`
--

INSERT INTO `tbl_committee` (`com_id`, `com_name`, `com_opendate`, `com_duration`, `com_members`, `com_created_at`, `com_updated_at`, `com_status`) VALUES
(1, 'A1', '2021-02-10', 12, 12, '2023-01-02 13:39:49', '2023-01-03 10:03:43', 1),
(2, 'B1', '2023-01-25', 2, 2, '2023-01-02 14:36:25', '2023-01-03 10:03:31', 1),
(3, 'B2', '2021-10-10', 4, 4, '2023-01-02 14:41:05', '2023-01-02 10:57:01', 1),
(7, 'M1', '2023-01-18', 2, 2, '2023-01-02 16:45:56', '2023-01-03 10:22:41', 1),
(8, 'BC', '2022-10-25', 3, 3, '2023-01-02 16:57:25', '2023-01-03 10:03:34', 1),
(10, 'C1', '2023-01-25', 4, 4, '2023-01-03 16:18:59', '2023-01-03 10:49:12', 1),
(11, 'C2', '2022-10-13', 2, 2, '2023-01-05 16:57:59', '2023-01-09 07:07:54', 1),
(12, 'Z1', '2023-02-25', 3, 3, '2023-01-19 17:27:33', '2023-01-19 12:10:19', 1),
(13, 'Text', '2023-10-12', 5, 5, '2023-01-25 12:55:30', '2023-01-25 07:26:18', 0),
(14, 'new', '2022-10-10', 5, 5, '2023-01-25 12:56:08', '2023-01-25 07:26:14', 0),
(15, 'A3', '2023-01-25', 4, 4, '2023-01-25 12:58:38', '2023-01-25 07:28:38', 1),
(16, 'A7', '2023-02-05', 4, 4, '2023-01-25 13:00:14', '2023-01-25 07:30:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `mem_id` int(11) NOT NULL,
  `mem_name` varchar(255) NOT NULL,
  `mem_mobile` varchar(15) NOT NULL,
  `mem_email` varchar(200) NOT NULL,
  `mem_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mem_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`mem_id`, `mem_name`, `mem_mobile`, `mem_email`, `mem_updated_at`, `mem_status`) VALUES
(1, 'youtube', '8978787878', 'you@gmail.com', '2023-01-03 09:44:41', 1),
(2, 'Rekha', '8798568598', 'rekha@gmail.com', '2023-01-03 09:44:41', 1),
(3, 'Ajeet', '9878987678', 'ajeet@gmail.com', '2023-01-03 09:44:41', 1),
(4, 'Wync', '6567689876', 'wync@gmail.com', '2023-01-03 09:44:41', 1),
(5, 'Xylie', '8767987676', 'xylre@gmail.com', '2023-01-03 09:44:41', 1),
(6, 'Miss', '2585685689', 'miss@gmail.com', '2023-01-03 10:06:32', 1),
(7, 'Suyas', '8115024158', 'suyash@gmail.com', '2023-01-03 10:06:32', 1),
(8, 'Ajeeta', '9936658305', 'ajeeta@gmail.com', '2023-01-03 10:06:32', 1),
(9, 'Rexy Michel', '8798765568', 'rexy@gmail.com', '2023-01-06 09:03:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_open_committee`
--

CREATE TABLE `tbl_open_committee` (
  `opcom_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `opcom_amount` int(11) NOT NULL,
  `opcom_mem` varchar(250) NOT NULL,
  `no_of_mem` int(11) NOT NULL,
  `opcom_status` int(11) NOT NULL,
  `opcom_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_open_committee`
--

INSERT INTO `tbl_open_committee` (`opcom_id`, `com_id`, `opcom_amount`, `opcom_mem`, `no_of_mem`, `opcom_status`, `opcom_date`) VALUES
(1, 8, 10000, '5, 3, 2', 3, 1, '2023-01-03 10:04:41'),
(2, 3, 20000, '8, 6, 5, 4', 4, 1, '2023-01-03 10:09:22'),
(3, 2, 5000, '8, 6', 2, 1, '2023-01-03 10:21:11'),
(4, 7, 300000, '8, 7', 2, 1, '2023-01-03 10:26:23'),
(5, 10, 5000, '8, 7, 4, 2', 4, 1, '2023-01-03 10:50:52'),
(6, 11, 10000, '8, 6', 2, 1, '2023-01-05 11:28:23'),
(7, 12, 9000, '9, 5, 4', 3, 1, '2023-01-25 07:20:53'),
(8, 15, 12000, '9, 8, 7, 6', 4, 1, '2023-01-25 07:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_run_committee`
--

CREATE TABLE `tbl_run_committee` (
  `run_com_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `opcom_mem_id` int(11) NOT NULL,
  `run_com_amt` int(11) NOT NULL,
  `divi_amt` int(11) NOT NULL,
  `run_com_month` int(11) NOT NULL,
  `run_com_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `run_com_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_run_committee`
--

INSERT INTO `tbl_run_committee` (`run_com_id`, `com_id`, `opcom_mem_id`, `run_com_amt`, `divi_amt`, `run_com_month`, `run_com_created_at`, `run_com_status`) VALUES
(1, 2, 8, 6000, 2250, 1, '2023-01-25 06:55:40', 1),
(2, 2, 6, 4500, 2250, 2, '2023-01-03 10:29:40', 1),
(3, 10, 8, 4000, 1000, 1, '2023-01-03 11:01:34', 1),
(4, 10, 7, 4900, 1125, 2, '2023-01-25 06:55:50', 1),
(5, 10, 4, 3000, 750, 3, '2023-01-03 11:01:56', 1),
(6, 10, 2, 2000, 250, 4, '2023-01-25 06:55:56', 1),
(7, 7, 8, 290000, 145000, 1, '2023-01-03 11:02:51', 1),
(8, 7, 7, 200000, 100000, 2, '2023-01-03 11:03:03', 1),
(9, 3, 8, 18000, 4500, 1, '2023-01-03 11:04:12', 1),
(10, 3, 6, 5120, 1280, 2, '2023-01-03 11:04:23', 1),
(11, 3, 5, 8956, 2239, 3, '2023-01-03 11:04:40', 1),
(12, 3, 4, 1000, 250, 4, '2023-01-03 11:04:48', 1),
(13, 8, 5, 7500, 2500, 1, '2023-01-03 11:05:23', 1),
(14, 8, 3, 4560, 1520, 2, '2023-01-03 11:05:32', 1),
(15, 8, 2, 5630, 1877, 3, '2023-01-03 11:05:42', 1),
(16, 11, 6, 8000, 4000, 1, '2023-01-05 11:28:49', 1),
(17, 11, 8, 5000, 2500, 2, '2023-01-25 06:06:53', 1),
(18, 12, 9, 7000, 2333, 1, '2023-01-25 07:21:26', 1),
(19, 12, 5, 8000, 2667, 2, '2023-01-25 07:31:01', 1),
(20, 12, 4, 7000, 2333, 3, '2023-01-25 07:31:11', 1),
(21, 15, 9, 10000, 2500, 1, '2023-01-25 07:32:40', 1),
(22, 15, 8, 12000, 3000, 2, '2023-01-25 07:38:16', 1),
(23, 15, 7, 9000, 2250, 3, '2023-01-25 07:38:40', 1),
(24, 15, 6, 11000, 2750, 4, '2023-01-25 07:39:04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_committee`
--
ALTER TABLE `tbl_committee`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_open_committee`
--
ALTER TABLE `tbl_open_committee`
  ADD PRIMARY KEY (`opcom_id`);

--
-- Indexes for table `tbl_run_committee`
--
ALTER TABLE `tbl_run_committee`
  ADD PRIMARY KEY (`run_com_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_committee`
--
ALTER TABLE `tbl_committee`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_open_committee`
--
ALTER TABLE `tbl_open_committee`
  MODIFY `opcom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_run_committee`
--
ALTER TABLE `tbl_run_committee`
  MODIFY `run_com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

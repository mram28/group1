-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 11:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylogstb`
--

CREATE TABLE `activitylogstb` (
  `id` int(11) NOT NULL,
  `accountname` varchar(255) DEFAULT NULL,
  `kindofactivity` varchar(255) NOT NULL,
  `dateandtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activitylogstb`
--

INSERT INTO `activitylogstb` (`id`, `accountname`, `kindofactivity`, `dateandtime`) VALUES
(1, 'admin', 'Admin Updated', '2023-11-11 12:54:57'),
(2, 'admin', 'Admin Updated', '2023-11-11 12:57:17'),
(3, 'nurse', 'Nurse Login', '2023-11-11 13:00:00'),
(4, 'admin', 'Admin Login', '2023-11-11 13:23:46'),
(5, 'admin', 'Admin Login', '2023-11-13 03:59:28'),
(6, 'admin', 'Admin Updated', '2023-11-13 03:59:42'),
(7, 'admin', 'Admin Login', '2023-11-13 04:01:02'),
(8, 'nurse', 'Nurse Login', '2023-11-14 05:10:01'),
(9, 'root', 'Patient Added', '2023-11-14 05:11:00'),
(10, 'root', 'Patient Added', '2023-11-14 05:15:52'),
(11, 'root', 'Patient Added', '2023-11-14 05:15:53'),
(12, 'root', 'Patient Added', '2023-11-14 05:21:51'),
(13, 'root', 'Patient Added', '2023-11-14 05:21:53'),
(14, 'nurse', 'Nurse Login', '2023-11-14 05:33:16'),
(15, 'nurse', 'Patient Added', '2023-11-14 05:33:33'),
(16, 'nurse', 'Patient Added', '2023-11-14 05:33:33'),
(17, 'nurse', 'Nurse Login', '2023-11-14 05:37:04'),
(18, 'admin', 'Admin Login', '2023-11-14 05:39:03'),
(19, 'nurse', 'Nurse Login', '2023-11-14 05:49:46'),
(20, 'root', 'Category Added', '2023-11-14 05:52:45'),
(21, 'admin', 'Admin Login', '2023-11-14 05:54:31'),
(22, 'mae', 'Nurse Added', '2023-11-14 05:55:09'),
(23, 'trish', 'Nurse Added', '2023-11-14 05:57:17'),
(24, 'admin', 'Nurse Added', '2023-11-14 06:06:00'),
(25, 'admin', 'Admin Login', '2023-11-14 06:23:54'),
(26, 'admin', 'Log Out', '2023-11-14 06:24:04'),
(27, 'admin', 'Admin Login', '2023-11-14 06:24:46'),
(28, 'admin', 'Log Out', '2023-11-14 06:32:03'),
(29, 'nurse', 'Nurse Login', '2023-11-14 06:32:10'),
(30, 'nurse', 'Log Out', '2023-11-14 06:35:53'),
(31, 'nurse', 'Nurse Login', '2023-11-14 06:40:39'),
(32, 'nurse', 'Log Out', '2023-11-14 06:42:39'),
(33, 'admin', 'Admin Login', '2023-11-14 09:53:38'),
(34, 'root', 'Medicine Added', '2023-11-14 09:54:20'),
(35, 'root', 'Medicine Added', '2023-11-14 09:54:47'),
(36, 'root', 'Medicine Added', '2023-11-14 09:55:33'),
(37, 'root', 'Supply Added', '2023-11-14 09:56:25'),
(38, 'admin', 'Patient Added', '2023-11-14 10:12:07'),
(39, 'admin', 'Qty left and Qty given to patient Updated', '2023-11-14 10:12:07'),
(40, 'admin', 'Patient Added', '2023-11-14 10:14:45'),
(41, 'admin', 'Qty left and Qty given to patient Updated', '2023-11-14 10:14:45'),
(42, 'admin', 'Patient Added', '2023-11-14 10:14:47'),
(43, 'admin', 'Qty left and Qty given to patient Updated', '2023-11-14 10:14:47'),
(44, 'admin', 'Patient Added', '2023-11-14 10:23:08'),
(45, 'admin', 'Qty left and Qty given to patient Updated', '2023-11-14 10:23:09'),
(46, 'admin', 'Patient Added', '2023-11-14 10:30:51'),
(47, 'admin', 'Qty left and Qty given to patient Updated', '2023-11-14 10:30:52'),
(48, 'admin', 'Qty given to patient Updated in Supplies table', '2023-11-14 10:30:52'),
(49, 'admin', 'Patient Added', '2023-11-14 10:32:29'),
(50, 'admin', 'Qty left and Qty given to patient Updated', '2023-11-14 10:32:30'),
(51, 'admin', 'Qty given to patient Updated in Supplies table', '2023-11-14 10:32:30'),
(52, 'admin', 'Patient Added', '2023-11-14 10:32:53'),
(53, 'admin', 'Qty left and Qty given to patient Updated', '2023-11-14 10:32:53'),
(54, 'admin', 'Qty given to patient Updated in Supplies table', '2023-11-14 10:32:53'),
(55, 'admin', 'Patient Added', '2023-11-14 10:41:21'),
(56, 'admin', 'Qty left and Qty given to patient Updated', '2023-11-14 10:41:21'),
(57, 'admin', 'Qty given to patient Updated in Supplies table', '2023-11-14 10:41:22'),
(58, 'admin', 'Patient Added', '2023-11-14 10:44:49'),
(59, 'admin', 'Qty left and Qty given to patient Updated', '2023-11-14 10:44:49'),
(60, 'admin', 'Qty given to patient Updated in Supplies table', '2023-11-14 10:44:50'),
(61, 'admin', 'Patient Added', '2023-11-14 10:47:35'),
(62, 'admin', 'Patient Added', '2023-11-14 10:54:08'),
(63, 'admin', 'Patient Added', '2023-11-14 10:54:41'),
(64, 'admin', 'Patient Added', '2023-11-14 10:55:07'),
(65, 'admin', 'Log Out', '2023-11-14 10:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`id`, `username`, `password`, `name`, `contact_no`, `address`) VALUES
(1, 'admin', '123', 'Malakit Ram', '0985', 'San Fransisco southern leyte');

-- --------------------------------------------------------

--
-- Table structure for table `categorytb`
--

CREATE TABLE `categorytb` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorytb`
--

INSERT INTO `categorytb` (`id`, `categoryname`) VALUES
(1, 'Vitamins'),
(2, 'Vaccine'),
(3, 'facemask'),
(4, 'antihistamine'),
(5, 'Alcohol'),
(6, 'bubu'),
(7, 'anti');

-- --------------------------------------------------------

--
-- Table structure for table `medicinetb`
--

CREATE TABLE `medicinetb` (
  `id` int(11) NOT NULL,
  `medname` varchar(255) NOT NULL,
  `expiration` date NOT NULL,
  `initialqty` int(11) DEFAULT NULL,
  `qtygiventopatient` int(11) NOT NULL,
  `qtyleft` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicinetb`
--

INSERT INTO `medicinetb` (`id`, `medname`, `expiration`, `initialqty`, `qtygiventopatient`, `qtyleft`, `category_id`) VALUES
(1, 'Ascorbic Acid', '2024-03-14', 100, 21, 79, 1),
(2, 'SinoVac', '2024-03-31', 10, 0, 10, 2),
(3, 'phizer', '2024-06-13', 10, 0, 10, 2),
(4, 'PotenCee', '2024-04-14', 10, 0, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nursetb`
--

CREATE TABLE `nursetb` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nursetb`
--

INSERT INTO `nursetb` (`id`, `username`, `password`, `name`, `contact_no`, `address`) VALUES
(1, 'nurse', '123', 'Malakit L Ram', '09854466880', 'San Ricardo Southern Leyte'),
(2, 'mae', '123', 'mae laplana', '035', 'rizal'),
(3, 'trish', '123', 'trishia aseniero', '555', 'jddcskl cdsjl'),
(4, 'serito', '123', 'Divine Grace Serito', '095665', 'krelflfr');

-- --------------------------------------------------------

--
-- Table structure for table `patienttb`
--

CREATE TABLE `patienttb` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `medgiven` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patienttb`
--

INSERT INTO `patienttb` (`id`, `patient_name`, `medgiven`, `qty`, `remarks`) VALUES
(1, 'malakit ram', 'Ascorbic Acid', 5, 'under observation'),
(3, 'malakit ram', 'Ascorbic Acid', 5, 'under observation'),
(4, 'CHAN', 'Ascorbic Acid', 5, 'under observation'),
(5, 'mae laplana', 'PotenCee', 5, 'under observation'),
(6, 'CHAN', 'Ascorbic Acid', 5, 'under observation'),
(7, 'kim', 'Ascorbic Acid', 5, 'under observation'),
(8, 'malakit ram', 'Ascorbic Acid', 5, 'good'),
(9, 'malakit ram', 'Ascorbic Acid', 5, 'under observation'),
(10, 'malakit ram', 'Ascorbic Acid', 5, 'under observation'),
(11, 'malakit ram', 'Facemask', 5, 'good'),
(12, 'malakit ram', 'Facemask', 5, 'good'),
(13, 'malakit ram', 'facemask', 5, 'good'),
(14, 'malakit ram', 'Ascorbic Acid', 5, 'under observation'),
(15, 'malakit ram', 'facemask', 5, 'good'),
(16, 'malakit ram', 'facemask', 5, 'good'),
(17, 'malakit ram', 'facemask', 5, 'good'),
(18, 'malakit ram', 'facemask', 5, 'good'),
(19, 'malakit ram', 'Ascorbic Acid', 6, 'good'),
(20, 'malakit ram', 'Facemask', 5, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `suppliestb`
--

CREATE TABLE `suppliestb` (
  `id` int(11) NOT NULL,
  `supplyname` varchar(255) DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `initialqty` int(11) DEFAULT NULL,
  `qtygiventopatient` int(11) NOT NULL,
  `qtyleft` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliestb`
--

INSERT INTO `suppliestb` (`id`, `supplyname`, `expiration`, `initialqty`, `qtygiventopatient`, `qtyleft`, `category_id`) VALUES
(1, 'facemask', '2024-03-07', 100, 10, 90, 3),
(2, 'carbon filter', '2023-12-22', 10, 0, 10, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylogstb`
--
ALTER TABLE `activitylogstb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admintb`
--
ALTER TABLE `admintb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorytb`
--
ALTER TABLE `categorytb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinetb`
--
ALTER TABLE `medicinetb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nursetb`
--
ALTER TABLE `nursetb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patienttb`
--
ALTER TABLE `patienttb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliestb`
--
ALTER TABLE `suppliestb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylogstb`
--
ALTER TABLE `activitylogstb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `admintb`
--
ALTER TABLE `admintb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorytb`
--
ALTER TABLE `categorytb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicinetb`
--
ALTER TABLE `medicinetb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nursetb`
--
ALTER TABLE `nursetb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patienttb`
--
ALTER TABLE `patienttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `suppliestb`
--
ALTER TABLE `suppliestb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

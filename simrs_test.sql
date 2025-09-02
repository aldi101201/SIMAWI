-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 02:43 AM
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
-- Database: `simrs_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `record_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  `nik` int(25) NOT NULL,
  `phone` int(15) NOT NULL,
  `address` text NOT NULL,
  `blood_type` enum('A','B','AB','O') DEFAULT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `upadate_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `record_number`, `name`, `birth`, `nik`, `phone`, `address`, `blood_type`, `weight`, `height`, `created_at`, `upadate_at`) VALUES
(1, '123456', 'ariasa', '2022-02-08', 1234567897, 2147483647, 'Badung', 'B', 67, 167, '2025-02-02 13:57:43', '2025-02-02 13:57:43'),
(2, '78975456', 'Rashford', '1998-12-06', 1346842654, 2147483647, 'Br.Panglan, Gang cempaka iv,no.1, Kapal, Mengwi', 'O', 76, 180, '2025-02-02 21:49:10', '2025-02-02 21:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `id` int(11) NOT NULL,
  `record_number` int(11) NOT NULL,
  `date_visit` timestamp NOT NULL DEFAULT current_timestamp(),
  `registered_by` int(11) DEFAULT NULL,
  `consultation_by` int(11) DEFAULT NULL,
  `symptoms` varchar(255) DEFAULT NULL,
  `doctor_diagnose` varchar(250) DEFAULT NULL,
  `icd10_code` varchar(255) DEFAULT NULL,
  `icd10_name` varchar(255) DEFAULT NULL,
  `is_done` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`id`, `record_number`, `date_visit`, `registered_by`, `consultation_by`, `symptoms`, `doctor_diagnose`, `icd10_code`, `icd10_name`, `is_done`) VALUES
(3, 244454565, '2001-10-11 16:00:00', 0, 0, 'hfh', 'rery', 'A78', 'Q fever', 1),
(11, 12345687, '2003-02-02 16:00:00', 0, 0, 'sakit', 'cacar air', 'B01.9', 'Varicella without complication', 1),
(12, 0, '0000-00-00 00:00:00', 0, 0, '', '', 'A00', 'Cholera', 1),
(13, 0, '0000-00-00 00:00:00', 0, 0, '', '', 'E14', 'Unspecified diabetes mellitus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('Admin','Doctor') DEFAULT NULL,
  `sent_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `role`, `sent_at`) VALUES
(1, 'aldiariasa81@gmail.com', '45678', 'aldi', 'Admin', '2025-02-02 10:01:07'),
(2, 'rituen4@gmail.com', '666777888', 'budi', 'Doctor', '2025-02-02 10:48:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

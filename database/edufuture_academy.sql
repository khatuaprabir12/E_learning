-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 10:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edufuture_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin@admin.com', '$2y$10$/aPQfYmBQr3OBlkw0D6aN.1l1BfLqoEscMkDy3bu2TiGSNqlFUg.O', '2025-04-24 02:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pin_code` varchar(6) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `caste` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `aadhaar` varchar(16) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `student_name`, `father_name`, `mobile`, `email`, `password`, `address`, `city`, `district`, `state`, `pin_code`, `gender`, `dob`, `caste`, `religion`, `nationality`, `aadhaar`, `qualification`, `course`, `profile_image`, `created_at`, `approved`) VALUES
(1, 'TBNYCTC-01-2025-04', 'prabir', 'prabodh', '9564726559', 'khatuaprabir12@gmail.com', '$2y$10$/pV11OkUdNV8nD.Brvyd7.nlk7.HymCpjgu6HcfCYbtybB8tLOQ5u', 'nandigram', 'nandigram', 'purba medinipur', 'West Bengal', '721646', 'Male', '1999-02-13', 'general', 'hindu', 'indian', '5848455485554545', 'b.tech', 'diploma_certificate', '1745410955_Signature.jpg', '2025-04-23 17:52:35', 0),
(2, 'TBNYCTC-02-2025-04', 'prabir', 'prabodh', '9564726559', 'prabir@gmail.com', '$2y$10$rOCZtVFvHy.M.b2PbHfsdOrw6CHfpa3JP9hFdffL81sHb8EaG4bk2', 'shsdd', 'sdsd', 'sdfsv', 'Jharkhand', '992222', 'Male', '5455-05-04', 'general', 'hindu', 'indian', '4455552222222222', 'b.tech', 'Diploma in Modern Computer Office Application (1 Year)', '1745411434_Signature.jpg', '2025-04-23 18:00:34', 0),
(3, 'TBNYCTC-04-2025-03', 'dibhya', 'tdtdtt', '9564726559', 'admin@gmail.com', '$2y$10$UZj2l8rgM/6FkeuR0/9w.e5Ph3zmRurvp4bFrEb2YAdnanCcETIfe', 'sdhda', 'kolkata', 'barasat', 'West Bengal', '745645', 'Male', '2222-02-12', 'general', 'hindu', 'indian', '2545748745454554', 'b.tech', 'Communicative English (6 Months)', '1745424658_Signature.jpg', '2025-04-23 21:40:58', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

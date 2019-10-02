-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 02:17 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `searchdb`
--
CREATE DATABASE IF NOT EXISTS `searchdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `searchdb`;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `ID` int(11) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `kin_name` varchar(100) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `kin_phone` varchar(50) NOT NULL,
  `kin_id` varchar(100) NOT NULL,
  `kin_gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`ID`, `patient_id`, `kin_name`, `relationship`, `kin_phone`, `kin_id`, `kin_gender`) VALUES
(6, 'N-76900', 'Jane Doe', 'Wife', '567567567', '435435435', 'female'),
(7, 'N-53864', 'Irish Penn', 'Brother', '6789995', '4562237', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` varchar(100) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `patient_email` varchar(100) NOT NULL,
  `patient_phone` varchar(20) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `patient_age` int(100) NOT NULL,
  `patient_dob` varchar(100) NOT NULL,
  `patient_gender` varchar(20) NOT NULL,
  `patient_city` varchar(50) NOT NULL,
  `patient_address` varchar(100) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `middle_name`, `last_name`, `patient_email`, `patient_phone`, `id_number`, `patient_age`, `patient_dob`, `patient_gender`, `patient_city`, `patient_address`, `registration_date`) VALUES
('N-53864', 'walter', 'Sr', 'white', 'white@email.com', '2211678678', '47889000', 30, '1982-07-01', 'Male', 'Nairobi', '77th Street', '2019-10-02 12:15:53'),
('N-76900', 'John', 'Jr', 'Doe', 'doe@email.com', '12345678', '87654321', 30, '1990-12-04', 'Male', 'Marsabit', 'Kitwale', '2019-08-03 11:39:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Patient_id` (`patient_id`),
  ADD UNIQUE KEY `kin_id` (`kin_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `id_number` (`id_number`),
  ADD UNIQUE KEY `patient_email` (`patient_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD CONSTRAINT `emergency_contacts_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

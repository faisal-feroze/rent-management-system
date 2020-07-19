-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 04:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `building_info`
--

CREATE TABLE `building_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `building_no` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `post_office` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building_info`
--

INSERT INTO `building_info` (`id`, `name`, `building_no`, `area`, `post_office`, `district`, `zip`) VALUES
(1, 'Shopnonil', '688', 'Ibrahimpur, Ashidag', 'Kafrul', 'Dhaka', 1216),
(4, 'Chayanir', '960/1', 'East Shewrapara', 'Kafrul', 'Dhaka', 1216);

-- --------------------------------------------------------

--
-- Table structure for table `flat_info`
--

CREATE TABLE `flat_info` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `flat_no` varchar(50) NOT NULL,
  `floor_no` varchar(50) NOT NULL,
  `square_feet` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `dining` int(11) NOT NULL,
  `drawing` int(11) NOT NULL,
  `balcony` int(11) NOT NULL,
  `electric_meter_no` varchar(50) NOT NULL,
  `water_meter_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flat_info`
--

INSERT INTO `flat_info` (`id`, `building_id`, `flat_no`, `floor_no`, `square_feet`, `bedrooms`, `bathrooms`, `dining`, `drawing`, `balcony`, `electric_meter_no`, `water_meter_no`) VALUES
(1, 4, '5-A', '5th', 1200, 3, 3, 1, 1, 2, '', ''),
(2, 1, '3B', '3rd', 900, 2, 2, 1, 1, 1, '', ''),
(3, 4, '3-B', '3rd', 1150, 3, 3, 1, 1, 2, '', ''),
(4, 1, '2-B', '2nd', 900, 2, 2, 1, 1, 1, '115247', '2033652');

-- --------------------------------------------------------

--
-- Table structure for table `generate_bill`
--

CREATE TABLE `generate_bill` (
  `id` int(11) NOT NULL,
  `buidling_id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `g_b_year` varchar(10) NOT NULL,
  `g_b_month` varchar(10) NOT NULL,
  `g_b_date` varchar(10) NOT NULL,
  `water_bill` int(11) NOT NULL,
  `gas_bill` int(11) NOT NULL,
  `electric_bill` int(11) NOT NULL,
  `rent_bill` int(11) NOT NULL,
  `other_bill` int(11) NOT NULL,
  `due_bill` int(11) NOT NULL,
  `total_bill` int(11) NOT NULL,
  `total_without_rent` int(11) NOT NULL,
  `to_be_received` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generate_bill`
--

INSERT INTO `generate_bill` (`id`, `buidling_id`, `flat_id`, `tenant_id`, `g_b_year`, `g_b_month`, `g_b_date`, `water_bill`, `gas_bill`, `electric_bill`, `rent_bill`, `other_bill`, `due_bill`, `total_bill`, `total_without_rent`, `to_be_received`, `status`, `note`) VALUES
(2, 4, 1, 1, '2020', '2', '29/03/2020', 5000, 8000, 2000, 12000, 600, 0, 27600, 15600, 0, 'received', ''),
(3, 4, 1, 1, '2020', '3', '30/03/2020', 5000, 8000, 5000, 12000, 600, 500, 31100, 19100, 0, 'due_in_April', ''),
(6, 4, 1, 1, '2020', '4', '30/03/2020', 5000, 8000, 2000, 12000, 600, 31100, 58700, 46700, 22000, 'due_in_May', ''),
(7, 4, 1, 1, '2020', '5', '01/04/2020', 5000, 8000, 2000, 12000, 600, 36700, 64300, 52300, 60000, 'received', ''),
(8, 1, 2, 2, '2020', '1', '01/04/2020', 5000, 8000, 2000, 12000, 600, 0, 27600, 15600, 25000, 'due_in_', ''),
(9, 1, 2, 2, '2020', '2', '01/04/2020', 5000, 8000, 1000, 12000, 600, 0, 26600, 14600, 20000, 'due_in_March', ''),
(10, 1, 2, 2, '2020', '3', '01/04/2020', 5000, 8000, 1000, 12000, 600, 6600, 33200, 21200, 0, 'due_in_April', ''),
(11, 1, 2, 2, '2020', '4', '01/04/2020', 5000, 8000, 1000, 12000, 600, 33200, 59800, 47800, 0, 'received', 'will give previous month bill in this month');

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE `master_data` (
  `id` int(11) NOT NULL,
  `bill_type` varchar(100) NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_data`
--

INSERT INTO `master_data` (`id`, `bill_type`, `bill`) VALUES
(1, 'Rent Bill', 12000),
(3, 'Water Bill', 5000),
(4, 'Gas Bill', 8000),
(8, 'Other Bill', 600);

-- --------------------------------------------------------

--
-- Table structure for table `receive_bill`
--

CREATE TABLE `receive_bill` (
  `id` int(11) NOT NULL,
  `gen_bill_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `received` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `received_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receive_bill`
--

INSERT INTO `receive_bill` (`id`, `gen_bill_id`, `building_id`, `flat_id`, `tenant_id`, `year`, `month`, `total`, `received`, `due`, `received_date`) VALUES
(1, 2, 4, 1, 1, '2020', '2', 27600, 27100, 500, '29/03/2020'),
(3, 7, 4, 1, 1, '2020', '5', 64300, 4300, 0, '2020-04-01'),
(4, 8, 1, 2, 2, '2020', '1', 27600, 27600, 0, '2020-04-01'),
(5, 11, 1, 2, 2, '2020', '4', 59800, 59800, 0, '2020-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_family_info`
--

CREATE TABLE `tenant_family_info` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `fam_name` varchar(100) NOT NULL,
  `fam_age` int(11) NOT NULL,
  `fam_occupation` varchar(100) NOT NULL,
  `fam_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_family_info`
--

INSERT INTO `tenant_family_info` (`id`, `tenant_id`, `fam_name`, `fam_age`, `fam_occupation`, `fam_mobile`) VALUES
(1, 1, 'Shamima Nasrin', 55, 'Housewife', '01670750074'),
(2, 2, 'Arif Mama', 35, 'Reporter', '01244545425'),
(3, 2, 'Mami', 30, 'Housewife', '01675478974'),
(4, 2, 'Arno', 13, 'student', ''),
(5, 3, 'Abdul ', 45, 'Officer', '012445656456'),
(6, 3, 'Salma', 40, 'Housewife', ''),
(7, 3, 'Sadman', 35, 'Teacher', ''),
(8, 3, 'Ramij', 0, '', ''),
(9, 3, 'Sadi', 0, '', ''),
(10, 4, 'Abdullah', 49, 'student', '0214151515'),
(11, 4, 'Fara', 25, '', '0154547878');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_flat_map`
--

CREATE TABLE `tenant_flat_map` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_flat_map`
--

INSERT INTO `tenant_flat_map` (`id`, `building_id`, `flat_id`, `tenant_id`, `status`) VALUES
(1, 4, 1, 1, 'mapped'),
(2, 1, 2, 2, 'mapped');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_info`
--

CREATE TABLE `tenant_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `t_dob` varchar(10) NOT NULL,
  `maritial_status` varchar(10) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `occupation_address` varchar(100) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `education` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `t_nid` varchar(50) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `emergency_name` varchar(100) NOT NULL,
  `emergency_address` varchar(100) NOT NULL,
  `emergency_relation` varchar(50) NOT NULL,
  `emergency_mobile` varchar(20) NOT NULL,
  `homeworker_name` varchar(100) NOT NULL,
  `homeworker_nid` varchar(50) NOT NULL,
  `homeworker_mobile` varchar(20) NOT NULL,
  `homeworker_address` varchar(100) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `driver_nid` varchar(50) NOT NULL,
  `driver_mobile` varchar(20) NOT NULL,
  `driver_address` varchar(100) NOT NULL,
  `pre_landlord_name` varchar(100) NOT NULL,
  `pre_landlord_address` varchar(100) NOT NULL,
  `pre_landlord_mobile` varchar(20) NOT NULL,
  `leaving_reason` varchar(100) NOT NULL,
  `new_landlord_name` varchar(100) NOT NULL,
  `new_landlord_mobile` varchar(20) NOT NULL,
  `start_living_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant_info`
--

INSERT INTO `tenant_info` (`id`, `name`, `father_name`, `t_dob`, `maritial_status`, `permanent_address`, `occupation_address`, `religion`, `education`, `mobile`, `mail`, `t_nid`, `passport`, `emergency_name`, `emergency_address`, `emergency_relation`, `emergency_mobile`, `homeworker_name`, `homeworker_nid`, `homeworker_mobile`, `homeworker_address`, `driver_name`, `driver_nid`, `driver_mobile`, `driver_address`, `pre_landlord_name`, `pre_landlord_address`, `pre_landlord_mobile`, `leaving_reason`, `new_landlord_name`, `new_landlord_mobile`, `start_living_date`) VALUES
(1, 'Faisal Feroze', 'Humayun Feroze', '1995-08-02', 'unmarried', 'Karatia, Tangail', 'Implementation Coordinator, Cokreates Ltd, ICT Tower', 'islam', 'Bsc (hons)', '01675187137', 'faisal@cokreates.com', '2345578455158', 'BM-25598', 'Humayun Feroze', 'Mirpur', 'Father', '01712779599', 'Nurjahan', '', '', '', 'Ujjal', '', '', '', 'Nabila', 'Ashidag', '', '', 'Saidur ', '0155255488', '2009-01-01'),
(2, 'Nahian', 'Jaber', '1998-02-03', 'married', 'DOHS', 'Student', 'islam', 'Masters', '0155248746', '', '121544', 'cv-7894', 'Banna', 'Nilkhet', 'Friend', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Sakif', '', '2020-03-11', 'married', '', '', 'islam', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Shahed', 'Abdulla', '1997-03-12', 'unmarried', 'Kochukhet', 'Student', 'islam', 'Bsc (hons)', '0177700000', 'shahed@gmail.com', '123456787654', '1234145', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Romel', '01245784211', '2020-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `to_be_received`
--

CREATE TABLE `to_be_received` (
  `id` int(11) NOT NULL,
  `gen_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `to_be_received` int(11) NOT NULL,
  `now_due` int(11) NOT NULL,
  `to_be_received_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `to_be_received`
--

INSERT INTO `to_be_received` (`id`, `gen_id`, `total`, `to_be_received`, `now_due`, `to_be_received_date`) VALUES
(1, 6, 58700, 2000, 56700, '2020-04-01'),
(2, 6, 58700, 10000, 46700, '2020-04-01'),
(3, 6, 58700, 10000, 36700, '2020-04-01'),
(4, 7, 64300, 20000, 44300, ''),
(5, 7, 64300, 20000, 24300, '2020-03-31'),
(6, 7, 64300, 20000, 4300, '2020-03-31'),
(7, 8, 27600, 25000, 2600, '2020-03-31'),
(8, 8, 27600, 2600, 0, '2020-04-01'),
(9, 9, 26600, 20000, 6600, '2020-04-01'),
(10, 11, 59800, 59800, 0, '2020-04-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building_info`
--
ALTER TABLE `building_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flat_info`
--
ALTER TABLE `flat_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generate_bill`
--
ALTER TABLE `generate_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_bill`
--
ALTER TABLE `receive_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_family_info`
--
ALTER TABLE `tenant_family_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_flat_map`
--
ALTER TABLE `tenant_flat_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_info`
--
ALTER TABLE `tenant_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `to_be_received`
--
ALTER TABLE `to_be_received`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building_info`
--
ALTER TABLE `building_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flat_info`
--
ALTER TABLE `flat_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `generate_bill`
--
ALTER TABLE `generate_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `master_data`
--
ALTER TABLE `master_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receive_bill`
--
ALTER TABLE `receive_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tenant_family_info`
--
ALTER TABLE `tenant_family_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tenant_flat_map`
--
ALTER TABLE `tenant_flat_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenant_info`
--
ALTER TABLE `tenant_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `to_be_received`
--
ALTER TABLE `to_be_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

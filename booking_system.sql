-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 09:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `admin_veri` int(11) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin`, `password`, `admin_veri`, `admin_status`) VALUES
(1, 'maulik', 'maulik', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_hall`
--

CREATE TABLE `booking_hall` (
  `booking_add_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `booking` varchar(3000) NOT NULL,
  `booking_info` varchar(3000) NOT NULL,
  `start_time` varchar(3000) NOT NULL,
  `end_time` varchar(300) NOT NULL,
  `status` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_hall`
--

INSERT INTO `booking_hall` (`booking_add_id`, `employee_id`, `category`, `booking`, `booking_info`, `start_time`, `end_time`, `status`) VALUES
(8, 2, 'project', 'project1', '', '15 October 2020 - 09:10 am', '09 October 2020 - 04:10 am', 'pending'),
(9, 2, 'project', 'project1', 'work', '31 October 2020 - 10:20 pm', '16 October 2020 - 04:10 am', 'pending'),
(10, 2, 'project', 'project1', 'work', '31 October 2020 - 10:20 pm', '16 October 2020 - 04:10 am', 'pending'),
(11, 2, 'project', 'project1', 'work', '31 October 2020 - 10:20 pm', '16 October 2020 - 04:10 am', 'pending'),
(12, 2, 'project', 'project1', 'work', '31 October 2020 - 10:20 pm', '16 October 2020 - 04:10 am', 'pending'),
(13, 2, 'project', 'project1', 'work', '31 October 2020 - 10:20 pm', '16 October 2020 - 04:10 am', 'pending'),
(14, 2, 'hall', 'hall 1', 'work', '08 October 2020 - 09:30 am', '08 October 2020 - 10:30 pm', 'pending'),
(15, 1, 'hall', 'hall 1', 'computer', '08 October 2020 - 09:30 am', '09 October 2020 - 10:05 am', 'pending'),
(16, 2, 'projector room', 'project 1', 'computer work', '06 November 2020 - 05:15 am', '06 November 2020 - 05:30 am', 'pending'),
(17, 2, 'hall', 'hall 1', 'work', '06 November 2020 - 05:15 am', '06 November 2020 - 05:20 am', 'pending'),
(18, 2, 'hall', 'hall 1', 'computer', '12 November 2020 - 10:30 am', '12 November 2020 - 10:50 am', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `booking_hall_online`
--

CREATE TABLE `booking_hall_online` (
  `booking_add_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `category` varchar(300) NOT NULL,
  `booking` varchar(300) NOT NULL,
  `booking_info` varchar(300) NOT NULL,
  `start_time` varchar(300) NOT NULL,
  `end_time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `status_it` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_hall_online`
--

INSERT INTO `booking_hall_online` (`booking_add_id`, `employee_id`, `category`, `booking`, `booking_info`, `start_time`, `end_time`, `status`, `status_it`) VALUES
(11, 2, 'hall', 'hall 1', 'work', '13 November 2020 - 05:35 pm', '13 November 2020 - 05:55 pm', 'pending', 'pending'),
(12, 2, 'hall', 'hall 1', 'work', '05 November 2020 - 08:40 pm', '05 November 2020 - 08:45 pm', 'pending', 'pending'),
(13, 2, 'hall', 'hall 1', 'computer', '13 November 2020 - 08:40 pm', '13 November 2020 - 08:55 pm', 'pending', 'pending'),
(14, 2, 'hall', 'hall 1', 'work', '09 November 2020 - 10:05 pm', '09 November 2020 - 10:55 pm', 'pending', 'pending'),
(16, 2, 'hall', 'hall 1', 'work', '05 November 2020 - 02:55 pm', '19 November 2020 - 10:25 am', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `booking_info_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `booking_info` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`booking_info_id`, `category_id`, `booking_info`, `status`) VALUES
(1, 8, 'hall 1', 'open'),
(6, 9, 'project1', 'close'),
(9, 23, '1 project room', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info_online`
--

CREATE TABLE `booking_info_online` (
  `booking_info_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `booking_info` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_info_online`
--

INSERT INTO `booking_info_online` (`booking_info_id`, `category_id`, `booking_info`, `status`) VALUES
(1, 4, 'project 1', 'close'),
(2, 1, 'hall 1', 'open'),
(5, 4, 'project 1', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(8, 'hall'),
(9, 'project'),
(21, 'hall'),
(23, 'project room');

-- --------------------------------------------------------

--
-- Table structure for table `category_online`
--

CREATE TABLE `category_online` (
  `id_category` int(11) NOT NULL,
  `category` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_online`
--

INSERT INTO `category_online` (`id_category`, `category`) VALUES
(1, 'hall'),
(5, 'projector room');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `feedback` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `employee`, `feedback`) VALUES
(1, 1, 'welcome'),
(9, 2, 'good work');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `number` bigint(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `status_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `role_id`, `username`, `password`, `number`, `email`, `status_log`) VALUES
(1, 1, 'harsh', 'harsh', 7435, 'maulik@abc.com', 0),
(2, 2, 'maulik', 'maulik', 7435, 'abc@gmail.com', 0),
(9, 7, '15004609', 'banas', 789456123, 'abc@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id_msg` int(11) NOT NULL,
  `msg` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id_msg`, `msg`) VALUES
(1, 'dont work my pc'),
(2, 'dont work my pc'),
(7, 'work my pc'),
(8, 'slow pc');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `category` varchar(300) NOT NULL,
  `booking` varchar(3000) NOT NULL,
  `booking_info` varchar(3000) NOT NULL,
  `start_time` varchar(3000) NOT NULL,
  `end_time` varchar(300) NOT NULL,
  `status` varchar(3000) NOT NULL,
  `report` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `employee_id`, `category`, `booking`, `booking_info`, `start_time`, `end_time`, `status`, `report`) VALUES
(0, 2, 'project', 'project 1', 'computer', '09 October 2020 - 11:10 am', '09 October 2020 - 11:10 am', 'Confirm', ''),
(2, 2, 'project', 'project 1', 'computer', '09 October 2020 - 10:05 am', '09 October 2020 - 10:55 am', 'Confirm', ''),
(3, 2, 'project', 'project1', 'work', '07 October 2020 - 09:30 am', '30 September 2020 - 03:10 am', 'Cancel', 'call alsjfhdlskajfblkdfblksdbflsdjbfklsdbfjskdhbfjsdbfjshdf'),
(4, 2, 'hall', 'hall 1', 'work', '09 October 2020 - 10:35 am', '09 October 2020 - 11:35 am', 'Confirm', ''),
(5, 2, 'hall', 'hall 1', 'work', '01 October 2020 - 04:15 am', '01 October 2020 - 04:15 am', 'Cancel', 'call'),
(6, 2, 'projector room', 'project 1', 'work', '05 November 2020 - 02:25 pm', '05 November 2020 - 03:10 am', 'Confirm', ''),
(7, 2, 'projector room', 'project 1', 'work', '05 November 2020 - 02:25 pm', '05 November 2020 - 03:10 am', 'Confirm', ''),
(8, 2, 'hall', 'hall 1', 'work', '21 October 2020 - 09:25 am', '15 October 2020 - 09:10 am', 'Confirm', '');

-- --------------------------------------------------------

--
-- Table structure for table `report_online`
--

CREATE TABLE `report_online` (
  `report_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `category` varchar(300) NOT NULL,
  `booking` varchar(300) NOT NULL,
  `booking_info` varchar(300) NOT NULL,
  `start_time` varchar(300) NOT NULL,
  `end_time` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `status_it` varchar(300) NOT NULL,
  `report` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_online`
--

INSERT INTO `report_online` (`report_id`, `employee_id`, `category`, `booking`, `booking_info`, `start_time`, `end_time`, `status`, `status_it`, `report`) VALUES
(0, 2, 'project room', 'project 1', 'computer work', '09 October 2020 - 11:10 am', '09 October 2020 - 11:10 am', 'Confirm', 'Confirm', ''),
(7, 1, 'project room', 'project 1', 'computer work', '09 October 2020 - 11:10 am', '09 October 2020 - 1:10 am', 'Confirm', 'confirm', ''),
(8, 2, 'project room', 'project 1', 'computer', '	09 October 2020 - 10:05 am', '09 October 2020 - 10:55 am', 'Confirm', 'Confirm', ''),
(9, 2, 'project room', 'project 1', 'computer', '	09 October 2020 - 10:05 am', '09 October 2020 - 10:55 am', 'Confirm', 'Confirm', ''),
(12, 2, 'hall', 'hall 1', 'work', '10 November 2020 - 03:45 pm', '10 November 2020 - 03:50 pm', 'Confirm', 'Confirm', ''),
(20, 2, 'hall', 'hall 1', 'work', '10 November 2020 - 03:50 pm', '10 November 2020 - 04:45 pm', ' ', ' ', 'not working'),
(21, 2, 'hall', 'hall 1', 'computer work', '02 November 2020 - 04:00 pm', '02 November 2020 - 04:55 pm', ' ', '', 'working'),
(22, 2, 'hall', 'hall 1', 'computer work', '05 November 2020 - 02:50 pm', '19 November 2020 - 10:30 am', '', 'Cancel', 'work'),
(31, 2, 'projector room', 'project 1', 'computer work', '05 November 2020 - 03:25 pm', '05 November 2020 - 06:25 pm', 'Cancel', '', 't'),
(32, 2, 'hall', 'hall 1', 'computer', '05 November 2020 - 02:50 pm', '19 November 2020 - 10:30 pm', '', 'Cancel', 'not proper');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'officer'),
(2, 'computer'),
(3, 'computer'),
(4, 'officer'),
(5, 'officer'),
(6, 'computer'),
(7, 'jr. computer'),
(8, 'computer'),
(9, 'computer'),
(10, 'computer'),
(11, 'computer'),
(12, 'computer'),
(13, 'computer'),
(14, 'computer'),
(15, 'computer'),
(16, 'computer'),
(17, 'computer'),
(18, 'computer'),
(19, ''),
(20, 'computer'),
(21, 'computer'),
(22, ''),
(23, ''),
(24, 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE `sub_admin` (
  `id_admin` int(11) NOT NULL,
  `admin_username` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL,
  `verify` int(11) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_admin`
--

INSERT INTO `sub_admin` (`id_admin`, `admin_username`, `admin_password`, `verify`, `admin_status`) VALUES
(1, 'harsh', 'harsh', 2, 2),
(2, 'maulik', 'maulik', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking_hall`
--
ALTER TABLE `booking_hall`
  ADD PRIMARY KEY (`booking_add_id`);

--
-- Indexes for table `booking_hall_online`
--
ALTER TABLE `booking_hall_online`
  ADD PRIMARY KEY (`booking_add_id`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`booking_info_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `booking_info_online`
--
ALTER TABLE `booking_info_online`
  ADD PRIMARY KEY (`booking_info_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `category_online`
--
ALTER TABLE `category_online`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `employee` (`employee`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `report_online`
--
ALTER TABLE `report_online`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_hall`
--
ALTER TABLE `booking_hall`
  MODIFY `booking_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking_hall_online`
--
ALTER TABLE `booking_hall_online`
  MODIFY `booking_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `booking_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking_info_online`
--
ALTER TABLE `booking_info_online`
  MODIFY `booking_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category_online`
--
ALTER TABLE `category_online`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report_online`
--
ALTER TABLE `report_online`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sub_admin`
--
ALTER TABLE `sub_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD CONSTRAINT `booking_info_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`employee`) REFERENCES `login` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

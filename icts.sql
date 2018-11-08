-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 07:41 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icts`
--

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `Service_id` int(10) NOT NULL,
  `Staff_id` varchar(50) NOT NULL,
  `Group_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allotment`
--

INSERT INTO `allotment` (`Service_id`, `Staff_id`, `Group_number`) VALUES
(101, '501', 10),
(102, '502', 20),
(103, '503', 30);

-- --------------------------------------------------------

--
-- Table structure for table `approvalstatus`
--

CREATE TABLE `approvalstatus` (
  `Staff_id` varchar(50) NOT NULL,
  `Client_id` varchar(50) NOT NULL,
  `Approval_status text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvalstatus`
--

INSERT INTO `approvalstatus` (`Staff_id`, `Client_id`, `Approval_status text`) VALUES
('501', '15057', 'yes'),
('502', '15057', 'no'),
('502', '15058', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `city_1`
--

CREATE TABLE `city_1` (
  `City` varchar(50) NOT NULL,
  `Pin` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_1`
--

INSERT INTO `city_1` (`City`, `Pin`) VALUES
('kovvur', 534350),
('rjy', 534351),
('kadapa', 690525),
('karnool', 690526),
('hyd', 5000082);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Client_id` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Pin` int(10) NOT NULL,
  `Cpassword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Client_id`, `client_name`, `Street`, `Pin`, `Cpassword`) VALUES
('15034', 'nihith', 'khammam', 534351, '15034'),
('15055', 'suri', 'gutur', 534350, '15055'),
('15057', 'saiprasad', 'gowthaminagar', 534350, '15057'),
('15058', 'harsha', 'krishnanagar', 5000082, '15058'),
('15235', 'sunil', 'xyz', 690525, '15235'),
('15236', 'harsha', 'mamsaz', 690526, '15236');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `Group_number` int(5) NOT NULL,
  `Leader_name` text NOT NULL,
  `Salary_of_leader` int(8) NOT NULL,
  `Gpassword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`Group_number`, `Leader_name`, `Salary_of_leader`, `Gpassword`) VALUES
(10, 'jack', 10000, '10'),
(20, 'saiprasad', 1000, '20'),
(30, 'vinay', 20000, '30');

-- --------------------------------------------------------

--
-- Table structure for table `icts_staff`
--

CREATE TABLE `icts_staff` (
  `Staff_id` varchar(50) NOT NULL,
  `Staff_name` text NOT NULL,
  `Salary` int(10) NOT NULL,
  `Spassword` text NOT NULL,
  `Group_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icts_staff`
--

INSERT INTO `icts_staff` (`Staff_id`, `Staff_name`, `Salary`, `Spassword`, `Group_number`) VALUES
('501', 'srihari', 5000, '501', '10'),
('502', 'naveen', 7000, '502', '20'),
('503', 'jimmy', 2000, '503', '10'),
('510', 'shiva', 511, '510', '30'),
('511', 'sp', 5000, '510', '10'),
('512', 'sai', 5000, '512', '10');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `Client_id` varchar(50) NOT NULL,
  `Service_id` int(10) NOT NULL,
  `Staff_id` varchar(50) NOT NULL,
  `Hours_spent` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`Client_id`, `Service_id`, `Staff_id`, `Hours_spent`) VALUES
('15034', 101, '501', 5),
('15034', 140, '509', 5),
('15034', 143, 'null', 0),
('15057', 101, '510', 0),
('15057', 104, '510', 5),
('15057', 105, '501', 5),
('15057', 784, '510', 0),
('15058', 103, '503', 5),
('15235', 140, '501', 8);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_id` int(50) NOT NULL,
  `Service_requested` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_id`, `Service_requested`) VALUES
(101, 's/w'),
(102, 'h/w'),
(103, 'n/w'),
(105, 'Systems '),
(140, 'Systems and hardware '),
(143, 'copying and catering'),
(784, 'multimedia'),
(845, 'Installation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD PRIMARY KEY (`Service_id`,`Staff_id`),
  ADD KEY `Group_number` (`Group_number`),
  ADD KEY `Staff_id` (`Staff_id`);

--
-- Indexes for table `approvalstatus`
--
ALTER TABLE `approvalstatus`
  ADD PRIMARY KEY (`Staff_id`,`Client_id`),
  ADD KEY `Client_id` (`Client_id`);

--
-- Indexes for table `city_1`
--
ALTER TABLE `city_1`
  ADD PRIMARY KEY (`Pin`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Client_id`),
  ADD KEY `Pin` (`Pin`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`Group_number`);

--
-- Indexes for table `icts_staff`
--
ALTER TABLE `icts_staff`
  ADD PRIMARY KEY (`Staff_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`Client_id`,`Service_id`,`Staff_id`),
  ADD KEY `Service_id` (`Service_id`),
  ADD KEY `Staff_id` (`Staff_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allotment`
--
ALTER TABLE `allotment`
  ADD CONSTRAINT `allotment_ibfk_1` FOREIGN KEY (`Staff_id`) REFERENCES `icts_staff` (`Staff_id`);

--
-- Constraints for table `approvalstatus`
--
ALTER TABLE `approvalstatus`
  ADD CONSTRAINT `approvalstatus_ibfk_2` FOREIGN KEY (`Staff_id`) REFERENCES `icts_staff` (`Staff_id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`Pin`) REFERENCES `city_1` (`Pin`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`Client_id`) REFERENCES `client` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

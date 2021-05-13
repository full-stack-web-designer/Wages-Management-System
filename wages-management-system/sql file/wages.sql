-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 12:45 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wages`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$KVbjoJCj8l4c0bJmKyhkquo/F3wiLxhLa4NZC3oe7PNixD2ASMJpq');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `c_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `c_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `c_occ` varchar(255) COLLATE utf8_bin NOT NULL,
  `c_img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `c_name`, `c_email`, `c_pass`, `c_occ`, `c_img`) VALUES
(27, 'sandeep', 'sandeep@gmail.com', '1234', 'web devloper', '../img/client/sandeep.jpg'),
(28, 'shiv chand', 'shiv@gmail.com', '$2y$10$fB87JT93i6Q608mZPZPTLe/EAlr3ZeiD7lxyRfWoDugnu.xGNQaR2', 'web App devloper', '../img/client/raja.jpg'),
(29, 'dharam', 'dharam@gmail.com', '$2y$10$plH8tktegJyhMKCI8hk1QOV/7afRxRMfgz/2.xuqhOYRTUCnE2IQa', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `project_num` varchar(10) COLLATE utf8_bin NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `contact_desc` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `name`, `project_num`, `contact_email`, `contact_desc`) VALUES
(1, 'sandeep', '1', 'sandeep@gmail.com', 'I have some doubt?');

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

CREATE TABLE `contractors` (
  `contract_mn` varchar(10) COLLATE utf8_bin NOT NULL,
  `s_id` int(3) NOT NULL,
  `contract_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `contract_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`contract_mn`, `s_id`, `contract_name`, `contract_email`, `join_date`) VALUES
('1234567890', 1, 'javed', 'javed@gmail.com', '2020-11-12'),
('9009301186', 2, 'sonu', 'sonu@gmail.com', '2020-11-17'),
('9516161756', 1, 'sandeep patel', 'sandeep@gmail.com', '2020-11-12'),
('9752925776', 1, 'shiv chand', 'shiv@gmail.com', '2020-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text COLLATE utf8_bin NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `c_id`) VALUES
(6, 'Nice ', 27),
(7, 'Good Job', 28);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `p_id` int(3) NOT NULL,
  `s_id` int(3) NOT NULL,
  `contract_mn` varchar(10) COLLATE utf8_bin NOT NULL,
  `p_area` varchar(255) COLLATE utf8_bin NOT NULL,
  `p_elevation` varchar(255) COLLATE utf8_bin NOT NULL,
  `p_configuration` varchar(255) COLLATE utf8_bin NOT NULL,
  `p_status` varchar(255) COLLATE utf8_bin NOT NULL,
  `p_location` varchar(255) COLLATE utf8_bin NOT NULL,
  `p_img` text COLLATE utf8_bin NOT NULL,
  `p_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`p_id`, `s_id`, `contract_mn`, `p_area`, `p_elevation`, `p_configuration`, `p_status`, `p_location`, `p_img`, `p_date`) VALUES
(1, 1, '1234567890', '2500 sqft', 'Ground +3', '3 BHK', 'Execution', 'Indore', '../img/projectimg/project1.jpg', '2020-11-17 17:21:14'),
(2, 2, '9516161756', '2500 sqft', 'Ground +3', '3 BHK', 'Complete', 'Bhopal', '../img/projectimg/project2.png', '2020-11-17 13:56:41'),
(3, 2, '9752925776', '3000 sqft', 'Ground +4', '4 BHK', 'Execution', 'Jabalpur', '../img/projectimg/project3.jpg', '2020-11-17 13:59:16'),
(4, 2, '9009301186', '3000 sqft', 'Ground +3', '4 BHK', 'Execution', 'Khandwa', '../img/projectimg/project4.jpg', '2020-11-17 16:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(3) NOT NULL,
  `s_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `s_decs` text COLLATE utf8_bin NOT NULL,
  `s_img` text COLLATE utf8_bin NOT NULL,
  `s_creation_date` date NOT NULL,
  `s_updation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `s_name`, `s_decs`, `s_img`, `s_creation_date`, `s_updation_date`) VALUES
(1, 'Architectural Design', 'WorldHaus works with Gensler, the worldâ€™s leading architecture firm, to build beautiful sustainable homes....', '../img/serviceimg/Services1.png', '2020-11-23', '2020-11-23 18:05:56'),
(2, 'Structural Engineering And Drafting', 'All WorldHaus homes come complete with a full set of construction plans for the homeowner created by our....', '../img/serviceimg/Services2.jpg', '2020-11-23', '2020-11-23 18:07:09'),
(3, 'End To End Construction Services', 'WorldHausâ€™ in-house construction team is trained to build houses quickly, safely, and efficiently. Let our teams build homes....', '../img/serviceimg/Services3.jpg', '2020-11-23', '2020-11-23 18:12:48'),
(4, 'Sale Of Construction Systems', 'For customers who have their own architects and construction teams, WorldHaus sells its SmartBlockTM and RapidPanelTM....', '../img/serviceimg/Services4.jpg', '2020-11-23', '2020-11-23 18:13:53'),
(5, 'Turnkey/Greenfield Projects', 'WorldHausâ€™ construction team can handle end to end services on greenfield sites, providing all the services listed above....', '../img/serviceimg/Services5.jpg', '2020-11-23', '2020-11-23 18:14:48'),
(6, 'Joint Project Development', 'We work with landowners and developers on a variety of cost-sharing agreements tailored to project needs.Let us work ...', '../img/serviceimg/Services6.jpg', '2020-11-24', '2020-11-23 18:30:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`contract_mn`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

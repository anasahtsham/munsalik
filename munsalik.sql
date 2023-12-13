-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 12:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `munsalik`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `year_of_comp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `employee_id`, `degree`, `institute`, `year_of_comp`) VALUES
(7, 11, 'BSSE', 'Riphah', 2024),
(9, 11, 'BSCS', 'Riphah', 2022),
(14, 14, 'BSSE', 'RIPHAH', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `ph_no` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `emp_status` tinyint(1) NOT NULL,
  `job_wanted` varchar(50) NOT NULL,
  `self_note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `email`, `password`, `f_name`, `l_name`, `ph_no`, `city`, `emp_status`, `job_wanted`, `self_note`) VALUES
(11, 'mh.anasahtsham@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Anas', 'Ahtsham', '03190504935', 'Islamabad', 1, 'Software Engineer', 'I am a person who is positive about every aspect of life. There are many things I like to do, see, and experience. I like to read, I like to write; I like to think, I like to dream; I like to talk, I like to listen. I like to see the sunrise in the morning, I like to see the moonlight at night; I like to feel the music flowing on my face, and I like to smell the wind coming from the ocean. '),
(12, 'farooqi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Abdullah ', 'Farooqi', '03358774432', 'Rawalpindi', 2, 'Web Database Designer', 'I am a human being with big  brain'),
(13, 'thecompany@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Abdullah', 'Zafar', '03342857624', 'Makkah', 2, 'Janitor', 'I am a person with a passion to achive my goals'),
(14, 'ibrahim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Ibrahim', 'Ahtsham', '03342366743', 'Islamabad', 2, 'Software Researcher', 'I am a human'),
(15, 'timatarkhan@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'NULL', 'NULL', 'NULL', 'NULL', 0, 'NULL', '');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `email`, `password`, `company_name`) VALUES
(3, 'softwarethrashers@gmail.com', '202cb962ac59075b964b07152d234b70', 'Software Thrashers'),
(5, 'thecompany2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'theCompanyTwo'),
(6, 'farooqi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Farooqi');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `language` varchar(30) NOT NULL,
  `strength` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `employee_id`, `language`, `strength`) VALUES
(13, 11, 'Urdu', '5'),
(16, 14, 'Urdu', '5');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `userID`) VALUES
(257, 'lmao: message from lmao', 15),
(258, 'xd: message from xd', 14),
(260, 'xd: another message from xd', 14),
(261, 'lmao: another message from lmao', 15),
(262, 'xd: does this work from xd', 14),
(263, 'lmao: well not right now, lmao', 15),
(264, 'xd: test message, xd', 14),
(265, 'lmao: test message, lmao', 15),
(266, 'xd: lets see', 14),
(267, 'lmao: does this work?', 15),
(268, 'xd: well kinda', 14),
(269, 'lmao: mhm', 15),
(270, 'xd: .', 14),
(271, 'xd: oh no', 14),
(272, 'lmao: yes', 15),
(273, 'xd: well', 14),
(274, 'lmao: this does kinda work ig?', 15),
(275, 'xd: yeah ig?', 14),
(276, 'lmao: .', 15),
(277, 'xd: ', 14),
(278, 'lmao: well', 15),
(279, 'xd: this kinda works xd', 14),
(280, 'xd: wadawda', 14),
(281, 'lmao: waddwd', 15);

-- --------------------------------------------------------

--
-- Table structure for table `past_job`
--

CREATE TABLE `past_job` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `years_of_exp_job` int(11) NOT NULL,
  `salary` double NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `past_job`
--

INSERT INTO `past_job` (`id`, `employee_id`, `designation`, `company`, `years_of_exp_job`, `salary`, `duration`) VALUES
(13, 11, 'Software Engineer', 'Magsouls', 3, 25000, 4),
(15, 14, 'SQA', 'Magsouls', 0, 2500, 3);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `type` tinyint(11) NOT NULL,
  `last_date` date NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `employee_id`, `employer_id`, `type`, `last_date`, `note`) VALUES
(1, 12, 31, 1, '2023-01-12', ''),
(9, 11, 3, 1, '2023-01-08', 'Hi! We would like to interview you!'),
(10, 11, 3, 2, '2023-01-09', 'Hi! We would like to hire you!'),
(12, 12, 3, 2, '2023-01-11', 'Hi! We would like to hire you!'),
(14, 14, 3, 1, '2023-02-01', 'Ajao Bhai, tum bhi ajao'),
(15, 13, 3, 2, '2023-01-17', 'You are hired as a Janitor'),
(16, 12, 3, 1, '2023-02-01', 'Ajaein app ko bhi check kr lete hein'),
(17, 11, 5, 2, '2023-01-18', 'Ajao kaam krne'),
(18, 13, 5, 1, '2023-01-24', 'Interview de dein janab');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `roomName` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `years_of_exp_skill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `employee_id`, `skill`, `years_of_exp_skill`) VALUES
(13, 11, 'C++', 3),
(15, 14, 'C++', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(14, 'xd'),
(15, 'lmao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `past_job`
--
ALTER TABLE `past_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
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
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `past_job`
--
ALTER TABLE `past_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

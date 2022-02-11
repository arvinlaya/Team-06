-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 11:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tup_openstat`
--

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `choice_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `choice_text` varchar(255) DEFAULT NULL,
  `choice_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `dataset_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `type_of_data` varchar(50) DEFAULT NULL,
  `access_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `question_type` varchar(255) DEFAULT NULL,
  `question_text` varchar(255) DEFAULT NULL,
  `question_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `respondent`
--

CREATE TABLE `respondent` (
  `respondent_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `respondent`
--

INSERT INTO `respondent` (`respondent_id`, `username`) VALUES
(4, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `response_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `respondent_ID` int(11) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_title` varchar(255) DEFAULT NULL,
  `survey_description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `access_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surveyor`
--

CREATE TABLE `surveyor` (
  `surveyor_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verification_code` varchar(7) DEFAULT NULL,
  `activated` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveyor`
--

INSERT INTO `surveyor` (`surveyor_id`, `email`, `last_name`, `first_name`, `birthday`, `gender`, `contact`, `password`, `verification_code`, `activated`) VALUES
(10, 'testemail1@gmail.com', 'laya', 'arvin', '2021-12-13', 'male', '', '$2y$10$j2Bpcs0FmZYgv.G7eCpDWO8hiomishfK.qlXdH2/bvA.Cw6POp6by', NULL, NULL),
(13, 'arvin.laya@tup.edu.ph', 'Laya', 'Arvin', '2001-06-23', 'male', '0916344342', '$2y$10$Z3hHXIRHpiNb5CY.v2pTIOH0Y9HDAQ1Vu.MVacWcLPwWoRgky1F4K', 'd46240b', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`dataset_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `respondent`
--
ALTER TABLE `respondent`
  ADD PRIMARY KEY (`respondent_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `survey_id` (`survey_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `respondent_ID` (`respondent_ID`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `surveyor_id` (`surveyor_id`);

--
-- Indexes for table `surveyor`
--
ALTER TABLE `surveyor`
  ADD PRIMARY KEY (`surveyor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `dataset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `respondent`
--
ALTER TABLE `respondent`
  MODIFY `respondent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `surveyor`
--
ALTER TABLE `surveyor`
  MODIFY `surveyor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choice_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE;

--
-- Constraints for table `dataset`
--
ALTER TABLE `dataset`
  ADD CONSTRAINT `dataset_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`survey_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`survey_id`) ON DELETE CASCADE;

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`survey_id`),
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`),
  ADD CONSTRAINT `response_ibfk_3` FOREIGN KEY (`respondent_ID`) REFERENCES `respondent` (`respondent_id`);

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`surveyor_id`) REFERENCES `surveyor` (`surveyor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

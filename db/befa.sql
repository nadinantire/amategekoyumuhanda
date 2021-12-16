-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 10:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `befa`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `questionID` varchar(20) NOT NULL DEFAULT '',
  `optionID` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `telephone1` varchar(25) NOT NULL DEFAULT '',
  `telephone2` varchar(25) NOT NULL DEFAULT '',
  `email1` varchar(255) NOT NULL DEFAULT '',
  `email2` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `summary` text NOT NULL DEFAULT '',
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`name`, `telephone1`, `telephone2`, `email1`, `email2`, `address`, `summary`, `about`) VALUES
('BEFA Language', '+250 78 529 0539', '+270 78 529 0539', 'niyonkuruelisa@gmail.com', 'muzungu@gmail.com', 'Kigali Rwanda KN 15 ST', 'BEFA LANGUAGE LTD n`ishuri rya mbere mu Rwanda mu kwigisha indimi(ENGLISH-FRENCH-SWAHIR-SPANISH etc) muburyo bw\'ikoranabuhanga bwitwa IYAKURE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae abveritatis quasi architecto beatae vitae dicta sunt explicabo.');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `GUID` varchar(255) NOT NULL DEFAULT '',
  `instructor` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `summary` varchar(255) NOT NULL DEFAULT '',
  `topics` text NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `GUID`, `instructor`, `title`, `summary`, `topics`, `description`, `image`, `createdAt`, `updatedAt`) VALUES
(6, '77658450-c264-4225-864a-3f928a9ab7f5', 598, 'Kwigisha gutwara ibinyabiziga IGICE 1', 'incamake Kwigisha gutwara ibinyabiziga IGICE 1', '<p>Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1</p>', '<p>Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1</p>\r\n<p>Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1Kwigisha gutwara ibinyabiziga IGICE 1</p>', 'c1ed2621b530a7f795f5e07ba2d9551b.jpg', '2021-10-19 17:05:56', '2021-10-19 17:05:56'),
(7, '1869f6dc-219c-4fa1-8699-f5ba88dbb829', 598, 'Kwigisha gutwara ibinyabiziga IGICE 2', 'gutwara ibinyabiziga IGICgutw', '<p>Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2</p>', '<p>Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2</p>\r\n<p>Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2Kwigisha gutwara ibinyabiziga IGICE 2</p>', '6fa2ff97485ff24c5280d131acc18bb8.jpg', '2021-10-19 17:07:05', '2021-10-19 17:07:05'),
(8, '6bed01d3-a8a1-4ec6-992d-c2cd81a80f3e', 598, 'Amategeko Y\'umuhanda IGICE 3', 'Incamake zAmategeko Y\'umuhanda IGICE 3', '<p>Incamake zAmategeko Y\'umuhanda IGICE 3Incamake zAmategeko Y\'umuhanda IGICE 3Incamake zAmategeko Y\'umuhanda IGICE 3Incamake zAmategeko Y\'umuhanda IGICE 3Incamake zAmategeko Y\'umuhanda IGICE 3Incamake zAmategeko Y\'umuhanda IGICE 3</p>', '<p>Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3</p>\r\n<p>Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3</p>\r\n<p><iframe style=\"width: 858px; height: 482px;\" title=\"YouTube video player\" src=\"https://www.youtube.com/embed/ERwjpw7uS4U\" width=\"858\" height=\"482\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3Amategeko Y\'umuhanda IGICE 3</p>\r\n<p><iframe style=\"width: 820px; height: 461px;\" title=\"YouTube video player\" src=\"https://www.youtube.com/embed/ERwjpw7uS4U\" width=\"820\" height=\"461\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '0a1643cb73c25878cc845d5594059afe.jpg', '2021-10-19 17:48:32', '2021-10-19 17:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) NOT NULL,
  `student` int(11) NOT NULL,
  `quiz` int(11) NOT NULL,
  `score` int(255) NOT NULL DEFAULT 0,
  `level` int(255) NOT NULL DEFAULT 0,
  `correctAnswer` int(255) NOT NULL DEFAULT 0,
  `wrongAnswer` int(255) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` varchar(100) NOT NULL,
  `question` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `GUID` varchar(255) NOT NULL DEFAULT '',
  `student` bigint(20) NOT NULL,
  `spTransactionID` varchar(255) NOT NULL DEFAULT '',
  `walletTransactionID` varchar(255) NOT NULL DEFAULT '',
  `chargedCommission` varchar(255) NOT NULL DEFAULT '',
  `currency` varchar(255) NOT NULL DEFAULT '',
  `paidAmount` varchar(255) NOT NULL DEFAULT '',
  `transactionID` varchar(255) NOT NULL DEFAULT '',
  `transactionStatus` varchar(255) NOT NULL DEFAULT '',
  `transactionStatusCode` varchar(255) NOT NULL DEFAULT '',
  `statusMessage` varchar(255) NOT NULL DEFAULT '',
  `telephone` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `expiryDate` varchar(255) NOT NULL DEFAULT '',
  `createAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` varchar(100) NOT NULL,
  `quiz` bigint(20) NOT NULL,
  `question` text NOT NULL DEFAULT '',
  `choiceNumber` int(11) NOT NULL DEFAULT 0,
  `questionNumber` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` bigint(20) NOT NULL,
  `course` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `correctAnswerMarks` int(20) NOT NULL DEFAULT 0,
  `wrongAnswerMarks` int(20) NOT NULL DEFAULT 0,
  `totalQuestions` int(20) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `GUID` varchar(255) NOT NULL DEFAULT '',
  `names` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `verificationCode` varchar(255) NOT NULL DEFAULT '',
  `role` varchar(255) NOT NULL DEFAULT '' COMMENT '(1. Admin, 2.Instructor, 3.Student)',
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `GUID`, `names`, `phone`, `email`, `password`, `verified`, `verificationCode`, `role`, `createdAt`, `updatedAt`) VALUES
(1, '598e5393-ff8a-4612-bc93-9f0972725ab4', 'Niyonkuru Elisa', '+250785290539', '', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0, '', '3', '2021-10-17 15:45:32', '2021-10-17 15:45:32'),
(2, '598b5393-ff8a-4612-bc93-9f0972725ab4', 'Bizimana Jean', '0785290539', '', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0, '', '2', '2021-10-17 15:45:32', '2021-10-17 15:45:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 09:46 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monogatari`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `CHAPTER_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `STORY_ID` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `CHAPTER_TITLE` text COLLATE utf8_bin,
  `CHAPTER_CONTENT` text COLLATE utf8_bin NOT NULL,
  `CHAPTER_STATUS` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `FAVORITE_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `USER_ID` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `STORY_ID` varchar(16) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `GENRE_ID` int(11) NOT NULL,
  `GENRE_NAME` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `STORY_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `USER_ID` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `STORY_TITLE` text COLLATE utf8_bin NOT NULL,
  `SYNOPSIS` text COLLATE utf8_bin,
  `DATE_ADDED` date NOT NULL,
  `DATE_UPDATED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `story_genres`
--

CREATE TABLE `story_genres` (
  `STORY_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `GENRE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `PROFILE_ID` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `USERNAME` varchar(16) COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(16) COLLATE utf8_bin NOT NULL,
  `DATE_CREATED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `PROFILE_ID`, `USERNAME`, `PASSWORD`, `DATE_CREATED`) VALUES
('5e89ec55204f8', '5e89ec55204f4', 'FA', 'pasword', '2020-04-05'),
('5e8bd8f21e307', '5e8bd8f21e303', 'FB', 'pasword', '2020-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `PROFILE_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `USER_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `DISPLAY_NAME` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `BIRTH_DATE` date DEFAULT NULL,
  `GENDER` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `PROFILE_IMAGE` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`PROFILE_ID`, `USER_ID`, `DISPLAY_NAME`, `BIRTH_DATE`, `GENDER`, `PROFILE_IMAGE`) VALUES
('5e89ec55204f4', '5e89ec55204f8', 'Fajar Andhika', '1999-04-13', 'Male', ''),
('5e8bd8f21e303', '5e8bd8f21e307', 'sunu', '2020-04-01', 'Male', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`CHAPTER_ID`),
  ADD KEY `FK_STORY_TO_CHAPTER` (`STORY_ID`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`FAVORITE_ID`),
  ADD KEY `FK_RELATIONSHIP_5` (`USER_ID`),
  ADD KEY `FK_RELATIONSHIP_6` (`STORY_ID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`GENRE_ID`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`STORY_ID`),
  ADD KEY `FK_USER_TO_STORY` (`USER_ID`);

--
-- Indexes for table `story_genres`
--
ALTER TABLE `story_genres`
  ADD PRIMARY KEY (`STORY_ID`,`GENRE_ID`),
  ADD KEY `FK_STORY_GENRE2` (`GENRE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD KEY `FK_USER_TO_PROFILE` (`PROFILE_ID`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`PROFILE_ID`),
  ADD KEY `FK_USER_TO_PROFILE2` (`USER_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `FK_STORY_TO_CHAPTER` FOREIGN KEY (`STORY_ID`) REFERENCES `stories` (`STORY_ID`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`STORY_ID`) REFERENCES `stories` (`STORY_ID`);

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `FK_USER_TO_STORY` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`);

--
-- Constraints for table `story_genres`
--
ALTER TABLE `story_genres`
  ADD CONSTRAINT `FK_STORY_GENRE` FOREIGN KEY (`STORY_ID`) REFERENCES `stories` (`STORY_ID`),
  ADD CONSTRAINT `FK_STORY_GENRE2` FOREIGN KEY (`GENRE_ID`) REFERENCES `genres` (`GENRE_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_USER_TO_PROFILE` FOREIGN KEY (`PROFILE_ID`) REFERENCES `users_profile` (`PROFILE_ID`);

--
-- Constraints for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `FK_USER_TO_PROFILE2` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

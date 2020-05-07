-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 11:24 AM
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

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`CHAPTER_ID`, `STORY_ID`, `CHAPTER_TITLE`, `CHAPTER_CONTENT`, `CHAPTER_STATUS`) VALUES
('5ea06049815dd', '5e996a2815942', 'coba chapter', '<p>muda muda muda muda muda</p><p style=\"margin-left: 25px;\">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p><p style=\"\">noise&nbsp;</p>', 'PUBLISHED'),
('5ea15330382c0', '5e996a2815942', 'Another Chapter', 'test another chapter guys', 'PUBLISHED');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `FAVORITE_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `USER_ID` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `STORY_ID` varchar(16) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`FAVORITE_ID`, `USER_ID`, `STORY_ID`) VALUES
('5eb3c6da82dbe', '5e8bd8f21e307', '5e996a2815942'),
('5eb3c6e37fdd8', '5e8bd8f21e307', '5e9965116a223'),
('5eb3c6ec2b9a1', '5e8bd8f21e307', '5ea134601c82e'),
('5eb3d258b02fd', '5eb2cfd093561', '5e996a2815942'),
('5eb3d262c7535', '5eb2cfd093561', '5eb3b323defa5'),
('5eb3d26c097b7', '5eb2cfd093561', '5e9965116a223'),
('5eb3d274f09d9', '5eb2cfd093561', '5ea134601c82e');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `GENRE_ID` int(11) NOT NULL,
  `GENRE_NAME` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`GENRE_ID`, `GENRE_NAME`) VALUES
(1, 'Action'),
(3, 'Fantasy'),
(2, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `STORY_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `USER_ID` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `STORY_TITLE` text COLLATE utf8_bin NOT NULL,
  `SYNOPSIS` text COLLATE utf8_bin,
  `COVER` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `DATE_ADDED` date NOT NULL,
  `DATE_UPDATED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`STORY_ID`, `USER_ID`, `STORY_TITLE`, `SYNOPSIS`, `COVER`, `DATE_ADDED`, `DATE_UPDATED`) VALUES
('5e9965116a223', '5e89ec55204f8', 'Test Cerita 2', ' Sinopsis Pendek', 'FA_5e9965116a223.png', '2020-04-17', '2020-04-17'),
('5e996a2815942', '5e89ec55204f8', 'Cerita Satu', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'FA_5e996a2815942.jpeg', '2020-04-17', '2020-04-17'),
('5ea134601c82e', '5e89ec55204f8', 'Test Story1', 'sinopsis luuuuur1', 'FA_5ea134601c82e.jpg', '2020-04-23', '2020-04-23'),
('5eb3b323defa5', '5e8bd8f21e307', 'test', 'test', 'FB_5eb3b323defa5.png', '2020-05-07', '2020-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `story_genres`
--

CREATE TABLE `story_genres` (
  `STORY_ID` varchar(16) COLLATE utf8_bin NOT NULL,
  `GENRE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `story_genres`
--

INSERT INTO `story_genres` (`STORY_ID`, `GENRE_ID`) VALUES
('5e9921335bc0a', 1),
('5e9921335bc0a', 2),
('5e9921335bc0a', 3),
('5e9965116a223', 1),
('5e9965116a223', 2),
('5e9965116a223', 3),
('5e996a2815942', 1),
('5e996a2815942', 3),
('5ea134601c82e', 1),
('5ea134601c82e', 2),
('5ea134601c82e', 3),
('5ea13e815b83f', 2),
('5eb3b323defa5', 2),
('5eb3b323defa5', 3);

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
('5e8bd8f21e307', '5e8bd8f21e303', 'FB', 'pasword', '2020-04-07'),
('5e9ec5a65fc5e', '5e9ec5a65fc5a', 'test', 'test', '2020-04-21'),
('5e9ec5fccc604', '5e9ec5fccc600', 'test2', '222', '2020-04-21'),
('5e9ec629ba469', '5e9ec629ba465', 'test3', 'test3', '2020-04-21'),
('5eb2cfd093561', '5eb2cfd09355d', 'FD', '123456', '2020-05-06');

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
('5e8bd8f21e303', '5e8bd8f21e307', 'sunu', '2020-04-01', 'Male', ''),
('5e9ec5a65fc5a', '5e9ec5a65fc5e', NULL, NULL, NULL, NULL),
('5e9ec5fccc600', '5e9ec5fccc604', NULL, NULL, NULL, NULL),
('5e9ec629ba465', '5e9ec629ba469', NULL, NULL, NULL, NULL),
('5eb2cfd09355d', '5eb2cfd093561', NULL, NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`GENRE_ID`),
  ADD UNIQUE KEY `GENRE_NAME` (`GENRE_NAME`);

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
  ADD KEY `FK_STORY_GENRE2` (`GENRE_ID`) USING BTREE;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `GENRE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 01:51 AM
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
-- Database: `virtualgift`
--

-- --------------------------------------------------------

--
-- Table structure for table `defaultsettings`
--

CREATE TABLE `defaultsettings` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defaultsettings`
--

INSERT INTO `defaultsettings` (`id`, `Name`, `Value`) VALUES
(1, 'color', '#a7d8de'),
(2, 'ended', ''),
(4, 'boxnum_color', '#a7d8de'),
(12, 'nextup_title', 'NEXT'),
(13, 'nextup_color', '#a7d8de'),
(14, 'nextup_text_color', 'white'),
(22, 'endgame_title', 'CONGRATULATIONS PARTICIPANTS'),
(23, 'endgame_color', '#0b4f9f'),
(24, 'endgame_text_color', 'white'),
(26, 'title', 'Welcome all'),
(27, 'title2', 'Organisation name'),
(28, 'title_color', '#a7d8de');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Added` text NOT NULL,
  `Reward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`ID`, `Name`, `Added`, `Reward`) VALUES
(15, 'Participant 1', '19.11.2021 01:26:56', 0),
(16, 'Participant 2', '19.11.2021 01:26:59', 0),
(17, 'Participant 3', '19.11.2021 01:27:00', 0),
(18, 'Participant 4', '19.11.2021 01:27:02', 0),
(19, 'Participant 5', '19.11.2021 01:27:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Color` text NOT NULL,
  `Picture` text NOT NULL,
  `Known` tinyint(1) NOT NULL,
  `Strikes` int(1) NOT NULL,
  `Added` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`ID`, `Name`, `Color`, `Picture`, `Known`, `Strikes`, `Added`) VALUES
(1, 's21', '#a7d8de', '6029a953-d092-4840-a197-5f5238c85bcb.jfif', 0, 0, '19.11.2021 01:24:43'),
(2, 'Series 6 Apple watch', '#a7d8de', '83694149-0668-42f0-8fa7-646faa579a8f.jfif', 0, 0, '19.11.2021 01:25:00'),
(3, 'S21 Ultra', '#a7d8de', '85e19cd9-4aa7-42a4-9e3f-f957ebad37a4.jfif', 0, 0, '19.11.2021 01:25:12'),
(4, 'Galaxy Watch 4', '#a7d8de', '7afcaf93-872a-4280-a235-585a3f79ce85.jfif', 0, 0, '19.11.2021 01:25:20'),
(5, 'Active 2', '#a7d8de', '5c1ae1d0-5a18-47ac-a555-681f1d3d6d24.jfif', 0, 0, '19.11.2021 01:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `Name`, `Value`) VALUES
(1, 'color', '#a7d8de'),
(2, 'ended', ''),
(4, 'boxnum_color', '#a7d8de'),
(12, 'nextup_title', 'NEXT'),
(13, 'nextup_color', '#a7d8de'),
(14, 'nextup_text_color', 'white'),
(22, 'endgame_title', 'CONGRATULATIONS PARTICIPANTS'),
(23, 'endgame_color', '#0b4f9f'),
(24, 'endgame_text_color', 'white'),
(26, 'title', 'Welcome all'),
(27, 'title2', 'Organisation name'),
(28, 'title_color', '#a7d8de');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `defaultsettings`
--
ALTER TABLE `defaultsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `defaultsettings`
--
ALTER TABLE `defaultsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

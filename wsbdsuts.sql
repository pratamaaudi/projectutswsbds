-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2017 at 03:09 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wsbdsuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `layer`
--

CREATE TABLE `layer` (
  `id` int(11) NOT NULL,
  `stroke` varchar(10) DEFAULT NULL,
  `rgb` varchar(10) DEFAULT NULL,
  `alpha` double DEFAULT NULL,
  `layer` varchar(100) DEFAULT NULL,
  `tipe` enum('point','line','polygon') DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layer`
--

INSERT INTO `layer` (`id`, `stroke`, `rgb`, `alpha`, `layer`, `tipe`, `urutan`, `profile_id`) VALUES
(1, '#ffffff', '0,0,255', 1, 'sma.geojson', 'point', 1, 1),
(2, '#ffffff', '0,0,255', 1, 'univ.geojson', 'polygon', 2, 1),
(3, '#ffffff', '0,0,255', 1, 'jalanbesar.geojson', 'line', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `setting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama`, `setting_id`) VALUES
(1, 'default', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `x` varchar(20) DEFAULT NULL,
  `y` varchar(20) DEFAULT NULL,
  `zoom` int(11) DEFAULT NULL,
  `map` enum('osm','bing','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `x`, `y`, `zoom`, `map`) VALUES
(1, '112.755284', '-7.263013', 13, 'osm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layer`
--
ALTER TABLE `layer`
  ADD PRIMARY KEY (`id`,`profile_id`),
  ADD KEY `fk_setting_profile_idx` (`profile_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`,`setting_id`),
  ADD KEY `fk_profile_setting1_idx` (`setting_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layer`
--
ALTER TABLE `layer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `layer`
--
ALTER TABLE `layer`
  ADD CONSTRAINT `fk_setting_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_setting1` FOREIGN KEY (`setting_id`) REFERENCES `setting` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Oct 29, 2019 at 08:50 AM
-- Server version: 10.4.2-MariaDB-1:10.4.2+maria~bionic
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cogip`
--

-- --------------------------------------------------------

--
-- Table structure for table `people_has_company`
--

CREATE TABLE `people_has_company` (
  `id` int(11) NOT NULL,
  `fk_people` int(11) NOT NULL,
  `fk_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `people_has_company`
--
ALTER TABLE `people_has_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_people_has_company_company` (`fk_company`),
  ADD KEY `fk_people_has_company_people` (`fk_people`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `people_has_company`
--
ALTER TABLE `people_has_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `people_has_company`
--
ALTER TABLE `people_has_company`
  ADD CONSTRAINT `fk_people_has_company_company` FOREIGN KEY (`fk_company`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `fk_people_has_company_people` FOREIGN KEY (`fk_people`) REFERENCES `people` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

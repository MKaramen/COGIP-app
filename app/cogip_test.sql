-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Oct 29, 2019 at 10:46 AM
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
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(64) NOT NULL,
  `company_tva` varchar(64) NOT NULL,
  `company_country` varchar(64) NOT NULL,
  `company_fk_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_tva`, `company_country`, `company_fk_type`) VALUES
(1, 'proximus', 'be 00000001', 'belgium', 1),
(2, 'telenet', 'be 00000002', 'belgium', 1),
(3, 'cogip', 'be 00000003', 'belgium', 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_number` char(13) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_fk_company` int(11) NOT NULL,
  `invoice_fk_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_number`, `invoice_date`, `invoice_fk_company`, `invoice_fk_people`) VALUES
(1, 'F20191029-001', '2019-10-29', 1, 5),
(2, 'F20191029-002', '2019-10-29', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `people_fullName` varchar(64) NOT NULL,
  `people_email` varchar(64) NOT NULL,
  `people_phone` int(10) NOT NULL,
  `people_company` varchar(64) NOT NULL,
  `people_acces` enum('god mode','moderator','user') NOT NULL DEFAULT 'user',
  `people_password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `people_fullName`, `people_email`, `people_phone`, `people_company`, `people_acces`, `people_password`) VALUES
(1, 'jean-christian ranu', 'jean-christian.ranu@gmail.com', 499999999, 'cogip', 'god mode', 'ranu'),
(2, 'muriel perrache', 'muriel.perrache@gmail.com', 488888888, 'cogip', 'moderator', 'perrache'),
(3, 'julio', 'julio@gmail.com', 477777777, 'telenet', 'user', NULL),
(4, 'chin', 'chin@gmail.com', 466666666, 'proximus', 'user', NULL),
(5, 'matis', 'matis@gmail.com', 455555555, 'proximus', 'user', NULL);

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
-- Dumping data for table `people_has_company`
--

INSERT INTO `people_has_company` (`id`, `fk_people`, `fk_company`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 3, 2),
(4, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type` enum('supplier','client') NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'supplier'),
(2, 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type_company` (`company_fk_type`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_company` (`invoice_fk_company`),
  ADD KEY `fk_invoice_people` (`invoice_fk_people`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people_has_company`
--
ALTER TABLE `people_has_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_people_has_company_company` (`fk_company`),
  ADD KEY `fk_people_has_company_people` (`fk_people`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `people_has_company`
--
ALTER TABLE `people_has_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_type_company` FOREIGN KEY (`company_fk_type`) REFERENCES `type` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_company` FOREIGN KEY (`invoice_fk_company`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `fk_invoice_people` FOREIGN KEY (`invoice_fk_people`) REFERENCES `people` (`id`);

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
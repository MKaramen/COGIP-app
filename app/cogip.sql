-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Oct 28, 2019 at 09:33 AM
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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `tva` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `full_name`, `tva`, `country`, `type`) VALUES
(1, 'Raviga', 'US456 654 342', 'United States', 'Supplier'),
(2, 'Dunder Mifflin', 'US678 765 765', 'United States', 'Client'),
(3, 'Pierre Cailloux', 'FR 678 988 654', 'France', 'Supplier'),
(4, 'Belgalol', 'BE0876 654 665', 'Belgique', 'Supplier'),
(5, 'Jouets Jean-Michel', 'FR 677 544 000', 'France', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_number` char(13) NOT NULL,
  `dates` date NOT NULL,
  `company` varchar(64) NOT NULL,
  `contact_person` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `dates`, `company`, `contact_person`) VALUES
(1, 'F20190404-004', '2019-10-01', 'Jouets Jean-Michel', ''),
(2, 'F20190404-003', '2019-10-01', 'Dunder Mifflin', ''),
(3, 'F20190404-002', '2019-10-01', 'Pierre Cailloux', ''),
(4, 'F20190404-001', '2019-10-01', 'Pied Pipper', ''),
(5, 'F20190404-601', '2019-10-02', 'Raviga', '');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `phone` char(8) NOT NULL,
  `email` varchar(64) NOT NULL,
  `company` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `full_name`, `phone`, `email`, `company`, `password`) VALUES
(1, 'Peter Gregory', '555-4567', 'peter.gregory@raviga.com', 'Raviga', ''),
(2, 'Cameron Howe', '555-7896', 'cam.howe@mutiny.net ', 'Mutiny', ''),
(3, 'Gavin Belson', '555-4213', 'gavin@hooli.com', 'Hooli', ''),
(4, 'Jiang Yang', '555-4568', 'jian.yang@phoque.off', 'Phoque Off', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

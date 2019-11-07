-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 07 nov. 2019 à 11:03
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cogip`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `company_name` varchar(64) NOT NULL,
  `company_tva` varchar(64) NOT NULL,
  `company_country` varchar(64) NOT NULL,
  `company_fk_type` int(10) NOT NULL,
  `company_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_tva`, `company_country`, `company_fk_type`, `company_date`) VALUES
(1, 'proximus', 'be 00000001', 'belgium', 1, '2018-05-18 10:25:12'),
(2, 'telenet', 'be 00000002', 'belgium', 1, '2018-06-11 09:45:12'),
(3, 'cogip', 'be 00000003', 'belgium', 2, '2018-07-05 10:45:12'),
(4, 'becode', 'be 00000004', 'belgium', 2, '2018-07-12 10:50:01'),
(5, 'figma', 'fr 00000001', 'france', 1, '2019-02-18 08:52:10'),
(6, 'hackette', 'fr 00000002', 'france', 1, '2019-03-18 14:14:05'),
(7, 'love-code', 'fr 00000003', 'france', 1, '2019-10-07 11:12:00'),
(8, 'wagon', 'ch 00000001', 'suisse', 1, '2019-10-15 10:20:02'),
(9, 'solearn', 'be 00000005', 'belgium', 2, '2019-11-04 13:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `invoice_number` char(13) NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `invoice_fk_company` int(10) NOT NULL,
  `invoice_fk_people` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_number`, `invoice_date`, `invoice_fk_company`, `invoice_fk_people`) VALUES
(1, 'F20191029-001', '2018-12-23 17:45:03', 1, 5),
(2, 'F20191029-002', '2018-12-02 10:23:10', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

CREATE TABLE `people` (
  `id` int(10) NOT NULL,
  `people_lastname` varchar(64) NOT NULL,
  `people_firstname` varchar(64) NOT NULL,
  `people_phone` int(9) NOT NULL,
  `people_email` varchar(64) NOT NULL,
  `people_company` varchar(64) NOT NULL,
  `people_access` enum('god','moderator','user') NOT NULL DEFAULT 'user',
  `people_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `people_password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`id`, `people_lastname`, `people_firstname`, `people_phone`, `people_email`, `people_company`, `people_access`, `people_date`, `people_password`) VALUES
(1, 'ranu', 'jean-christian', 487000001, 'jc.ranu@gmail.com', 'cogip', 'god', '2018-05-18 09:45:12', '$2y$10$BdNrK4Z2OvBCiNa3gmC40usfdVrt.IWmch.IE39HPkMUKwm98Ztkq'),
(2, 'perrache', 'muriel', 487000002, 'm.perrache@gmail.com', 'cogip', 'moderator', '2018-10-23 16:25:02', '$2y$10$jSsqzLZMt8jQBuhDmpvbz.HxwIs6crT1gVDnKi0FvkN7KiXLHaJkW'),
(3, 'zinga', 'julio', 487000003, 'j.zinga@gmail.com', 'telenet', 'user', '2018-12-02 10:23:10', '$2y$10$LsRsZyuANlfQM6k0XHzAy.KqoBjjmVYYo33A7ZACrA5/5DPgAZG56'),
(4, 'zhuang', 'chin', 487000004, 'c.zhuang@hotmail.com', 'proximus', 'user', '2018-12-18 09:35:05', '$2y$10$zz6Rk/srRbjPq0DIzY0c8e1VI5S7ZVpzzds8HBisSa.dLgWKekjjq'),
(5, 'karamenderes', 'matis', 487000005, 'm.karamenderes@becode.com', 'proximus', 'user', '2018-12-23 17:45:03', '$2y$10$E/IvJ8NljxdfPj/TOpdL4Op8wTpZh7KaLjd.iCmFW1yQ7uadv5wAO'),
(6, 'sala', 'marvin', 487000006, 'marvin.sala@becode.com', 'becode', 'user', '2019-03-02 14:15:52', '$2y$10$IrZrzCuzEhIZ5K5U3pa3au43yGs69lQQjxL2gxkkd4O2xswNlhz0K'),
(7, 'marlène', 'emily', 487000007, 'emily.marlene@yahoo.com', 'becode', 'user', '2019-04-15 13:37:33', '$2y$10$hq7sLqWxIAWFY/QcdqZtDOzrysUDTx6rbtJJ05AU96LW7HKAnCaUK'),
(8, 'raul', 'jeason', 487000008, 'raul-jeason@gmail.com', 'cogip', 'user', '2019-07-08 12:40:55', '$2y$10$1J/zWj4sD9ZFjx/M37f7bOU89ZgpY5Y1r9zi4ZIM5/pHDeVq9NKgS'),
(9, 'mina', 'julie', 487000009, 'julie.mina@gmail.com', 'telenet', 'user', '2019-09-22 08:24:28', '$2y$10$nbR.B7ljnCsV8jxUUnWTl.5PmQXQa/3/yBYzc2Qmu29asbJdlng0K'),
(10, 'fullham', 'mike', 487000010, 'mike.fullham@gmail.com', 'becode', 'user', '2019-10-19 09:02:17', '$2y$10$IhBnVjC05GLncZrBqgWCHe4YDw8mN6Ngc6yUvne4KnixhCGYslxve');

-- --------------------------------------------------------

--
-- Structure de la table `people_has_company`
--

CREATE TABLE `people_has_company` (
  `id` int(10) NOT NULL,
  `fk_people` int(10) NOT NULL,
  `fk_company` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(10) NOT NULL,
  `type` enum('supplier','client') NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'supplier'),
(2, 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_name` (`company_name`),
  ADD KEY `fk_type_company` (`company_fk_type`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`),
  ADD KEY `fk_invoice_company` (`invoice_fk_company`),
  ADD KEY `fk_invoice_people` (`invoice_fk_people`);

--
-- Index pour la table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_lastname` (`people_lastname`),
  ADD UNIQUE KEY `people_email` (`people_email`);

--
-- Index pour la table `people_has_company`
--
ALTER TABLE `people_has_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_people_has_company_company` (`fk_company`),
  ADD KEY `fk_people_has_company_people` (`fk_people`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `people_has_company`
--
ALTER TABLE `people_has_company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_type_company` FOREIGN KEY (`company_fk_type`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_company` FOREIGN KEY (`invoice_fk_company`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `fk_invoice_people` FOREIGN KEY (`invoice_fk_people`) REFERENCES `people` (`id`);

--
-- Contraintes pour la table `people_has_company`
--
ALTER TABLE `people_has_company`
  ADD CONSTRAINT `fk_people_has_company_company` FOREIGN KEY (`fk_company`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `fk_people_has_company_people` FOREIGN KEY (`fk_people`) REFERENCES `people` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

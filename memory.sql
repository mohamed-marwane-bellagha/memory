-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 fév. 2021 à 15:16
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memory`
--

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `id_utilisateur`, `score`) VALUES
(7, 12, 22.5),
(8, 12, 22.5),
(9, 12, 22.5),
(10, 12, 22.5),
(11, 12, 22.5),
(12, 12, 22.5),
(13, 42, 22.5),
(14, 42, 22.5),
(15, 42, 22.5),
(16, 42, 22.5),
(17, 42, 15),
(18, 42, 16),
(19, 42, 360),
(20, 42, 40),
(21, 42, 40),
(22, 42, 40),
(23, 42, 40),
(24, 42, 40),
(25, 42, 8),
(26, 42, 60),
(27, 42, 60),
(28, 42, 90),
(29, 42, 90),
(30, 42, 90),
(31, 42, 90),
(32, 42, 122.5),
(33, 42, 122.5),
(34, 42, 132),
(35, 42, 132),
(36, 42, 184.5),
(37, 42, 62.5),
(38, 42, 10),
(39, 42, 15),
(40, 42, 20),
(41, 42, 25),
(42, 42, 30),
(43, 42, 35),
(44, 42, 40),
(45, 42, 45),
(46, 42, 50),
(47, 42, 60),
(48, 42, 65),
(49, 42, 70),
(50, 42, 75),
(51, 42, 80),
(52, 42, 85),
(53, 42, 90),
(54, 42, 95),
(55, 42, 100),
(56, 42, 105),
(57, 42, 110),
(58, 42, 115),
(59, 42, 120),
(60, 42, 125),
(61, 42, 130),
(62, 42, 135),
(63, 42, 140),
(64, 42, 145),
(65, 42, 150),
(66, 42, 155),
(67, 42, 160),
(68, 42, 165),
(69, 42, 170),
(70, 42, 175),
(71, 42, 180),
(72, 42, 185),
(73, 42, 190),
(74, 42, 195),
(75, 42, 200),
(76, 42, 205),
(77, 42, 210),
(78, 42, 215),
(79, 42, 220),
(80, 42, 225),
(81, 42, 230),
(82, 42, 235),
(83, 42, 240),
(84, 42, 245),
(85, 42, 250),
(86, 42, 255),
(87, 42, 260),
(88, 42, 10),
(89, 42, 250),
(90, 42, 360),
(91, 42, 22.5),
(92, 42, 22.5),
(93, 42, 22.5),
(94, 42, 360),
(95, 42, 360),
(96, 42, 354),
(97, 42, 360),
(98, 42, 360),
(99, 42, 354),
(100, 42, 360),
(101, 42, 360),
(102, 42, 40),
(103, 42, 40),
(104, 42, 38),
(105, 42, 38),
(106, 42, 360),
(107, 42, 9);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(42, 'marwaneleboos', 'manoolebg'),
(43, 'marwanelebg', '$2y$10$T8Dth1Qe5T7tY/1p5hCKEeCnSZyYEk0VSnGNA.HTRbAOhBlMpv0fm'),
(44, 'marwane', '$2y$10$IRg3QD1GN.nS3yXXr7OyP.jMHwhFSiHBh2YJY0eUMpNLiqjiPa4Ly');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

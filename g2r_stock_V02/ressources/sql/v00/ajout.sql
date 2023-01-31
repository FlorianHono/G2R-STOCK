-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 sep. 2022 à 14:48
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `g2r_stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajout`
--

CREATE TABLE `ajout` (
  `id` int(10) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `stag` varchar(70) NOT NULL,
  `emplo` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `qty` int(50) NOT NULL,
  `pret` varchar(150) NOT NULL,
  `retour` varchar(50) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ajout`
--

INSERT INTO `ajout` (`id`, `nom`, `stag`, `emplo`, `model`, `qty`, `pret`, `retour`, `ip`, `ville`) VALUES
(2, 'honore florian', 'stagiaire', '', 'lenovo 1210', 1, '10/12/2022', '05/01/2023', '192.168.1.1', 'saint-cloude'),
(3, 'fifthy cents', 'employé', '', 'msi t1050', 1, '10/11/2022', '20/11/2022', '192.168.1.1', 'Paris 11'),
(4, 'Florian HONORE', 'on', '_', 'null', 0, '', '', '8 SQUARE RAMEAU', '0'),
(5, 'Florian HONORE', '_', 'on', 'null', 1, '2022-09-14', '2022-09-23', '8 SQUARE RAMEAU', 'Rueil-Malmaison'),
(6, 'Florian HONORE', '_', 'on', 'null', 1, '2022-09-14', '2022-09-23', '8 SQUARE RAMEAU', 'Rueil-Malmaison');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajout`
--
ALTER TABLE `ajout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ajout`
--
ALTER TABLE `ajout`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 sep. 2022 à 15:02
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

-- --------------------------------------------------------

--
-- Structure de la table `compte_admin`
--

CREATE TABLE `compte_admin` (
  `id` int(10) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telephone` text NOT NULL,
  `centre_G2R` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `token` varchar(130) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte_admin`
--

INSERT INTO `compte_admin` (`id`, `nom`, `prenom`, `pseudo`, `mail`, `telephone`, `centre_G2R`, `mot_de_passe`, `ip`, `token`, `date_inscription`) VALUES
(134, 'HONORE', 'Florian', 'dede', 'honore_florian@outlook.fr', '0633500975', 'Rambouillet', '$2y$12$mibvZpWjHCjxMZflj4xJd.Y3Yms0KS6JfIoBI5VTfojM5zf5ZH02S', '::1', 'ac8894065ca5ee931475ce76a922d1736e2b8cfe5323547500a1555b034af556416b9929770e31daa594c12ac3d7d80dd73631ea1a859d570116e35ba6c3c33c', '2022-08-31 00:23:42'),
(139, 'HONORE', 'Florian', 'test', '18animes.mangas@gmail.com', '0690760732', 'Rambouillet', '$2y$12$oBL4XovS.NNam0GKY6XRiOuhlHJcOFsFiLjZ33NrpG43boY8ZhlXu', '::1', '199c2b4dcaa0bf953201fda63f8d03ca4d1aad03bc8d9b0685750b2df66f9d31283dc3650c81edeba981dcf088e30980ab7ddc5effcb1aec9a382c779e71e136', '2022-09-01 15:32:38'),
(140, 'HONORE', 'Florian', 'dada', 'gogo971@gmail.com', '0633500975', 'Plaisir', '$2y$12$9pnR5DTxBSmcM2JaOoXPwOzXL6B5WhI4hrGQ4O8YNCmARrds6n9bG', '::1', '3bd6925aa7d6dc5cba903c256c9e96183cc9f69c74f2847fd3189cf821c0a3bf2e2fd6e168cd0c16300dc5c3ef33f3481311710a6b044ba6fac343f61e738a30', '2022-09-06 14:05:28');

-- --------------------------------------------------------

--
-- Structure de la table `password_recover`
--

CREATE TABLE `password_recover` (
  `id` int(20) NOT NULL,
  `token_user` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL,
  `date_recover` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajout`
--
ALTER TABLE `ajout`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte_admin`
--
ALTER TABLE `compte_admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_recover`
--
ALTER TABLE `password_recover`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ajout`
--
ALTER TABLE `ajout`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `compte_admin`
--
ALTER TABLE `compte_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT pour la table `password_recover`
--
ALTER TABLE `password_recover`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

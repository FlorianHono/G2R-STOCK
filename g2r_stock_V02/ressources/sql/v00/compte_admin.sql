-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 sep. 2022 à 21:32
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
(139, 'HONORE', 'Florian', 'test', '18animes.mangas@gmail.com', '0690760732', 'Rambouillet', '$2y$12$oBL4XovS.NNam0GKY6XRiOuhlHJcOFsFiLjZ33NrpG43boY8ZhlXu', '::1', '199c2b4dcaa0bf953201fda63f8d03ca4d1aad03bc8d9b0685750b2df66f9d31283dc3650c81edeba981dcf088e30980ab7ddc5effcb1aec9a382c779e71e136', '2022-09-01 15:32:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte_admin`
--
ALTER TABLE `compte_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte_admin`
--
ALTER TABLE `compte_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

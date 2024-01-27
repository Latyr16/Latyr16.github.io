-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 28 avr. 2021 à 16:58
-- Version du serveur :  8.0.23-0ubuntu0.20.10.1
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_administrateur` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `prenom`, `nom`, `email`, `telephone`, `login`, `password`) VALUES
('admin001', 'admin1', 'admin1', 'admin1@admin.sn', 750000001, 'admin1', '16d7a4fca7442dda3ad93c9a726597e4');

-- --------------------------------------------------------

--
-- Structure de la table `affectation_agent`
--

CREATE TABLE `affectation_agent` (
  `id` int NOT NULL,
  `id_superviseur` varchar(100) NOT NULL,
  `id_promoteur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `affectation_agent`
--

INSERT INTO `affectation_agent` (`id`, `id_superviseur`, `id_promoteur`) VALUES
(1, 'Sup_001', 'Promo_001'),
(2, 'Sup_002', 'Promo_002');

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `id` bigint NOT NULL,
  `id_promoteur` varchar(255) NOT NULL,
  `id_agent` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `cni` bigint NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id`, `id_promoteur`, `id_agent`, `prenom`, `nom`, `cni`, `email`, `telephone`, `password`) VALUES
(1, 'Promo_001', 'Ag_002', 'test', 'test', 1000000, 'test@test.sn', 750000001, 'cc03e747a6afbbcbf8be7668acfebee5'),
(2, 'Promo_001', 'Ag_003', 'tes1', 'tes1', 1000001, 'tes1@test.sn', 750000002, 'cc03e747a6afbbcbf8be7668acfebee5'),
(3, 'Promo_002', 'Ag_004', 'test2', 'test2', 1000002, 'test2@test.sn', 750000003, 'cc03e747a6afbbcbf8be7668acfebee5'),
(4, 'Promo_002', 'Ag_005', 'test5', 'test5', 1000003, 'test5@test.sn', 750000003, 'cc03e747a6afbbcbf8be7668acfebee5');

-- --------------------------------------------------------

--
-- Structure de la table `attente`
--

CREATE TABLE `attente` (
  `id` int NOT NULL,
  `id_promoteur` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prenom_client` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom_client` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_naissance` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lieu_naissance` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date_delivrance` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date_expiration` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `numero_cni` bigint NOT NULL,
  `MSISDN` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `photo_recto` text NOT NULL,
  `photo_verso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `id_promoteur` varchar(255) NOT NULL,
  `prenom_client` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom_client` varchar(100) NOT NULL,
  `date_naissance` text,
  `lieu_naissance` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date_delivrance` text,
  `date_expiration` text,
  `numero_cni` bigint NOT NULL,
  `MSISDN` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telephone` bigint DEFAULT NULL,
  `photo_recto` text NOT NULL,
  `photo_verso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client_valider`
--

CREATE TABLE `client_valider` (
  `id` int NOT NULL,
  `id_promoteur` varchar(255) NOT NULL,
  `id_superviseur` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_naissance` text,
  `lieu_naissance` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date_delivrance` varchar(255) DEFAULT NULL,
  `date_expiration` varchar(255) DEFAULT NULL,
  `cni` bigint NOT NULL,
  `MSISDN` bigint NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `photo_recto` text NOT NULL,
  `photo_verso` text NOT NULL,
  `date_validation` date NOT NULL,
  `mois` text NOT NULL,
  `annee` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promoteur`
--

CREATE TABLE `promoteur` (
  `id` int NOT NULL,
  `id_promoteur` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` bigint NOT NULL,
  `cni` bigint NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promoteur`
--

INSERT INTO `promoteur` (`id`, `id_promoteur`, `prenom`, `nom`, `telephone`, `cni`, `login`, `password`) VALUES
(1, 'Promo_001', 'test', 'test', 750000006, 2000001, 'promoteur1', 'cc03e747a6afbbcbf8be7668acfebee5'),
(2, 'Promo_002', 'test', 'test', 750000007, 2000002, 'promoteur2', 'cc03e747a6afbbcbf8be7668acfebee5');

-- --------------------------------------------------------

--
-- Structure de la table `promoteurbis`
--

CREATE TABLE `promoteurbis` (
  `id` int NOT NULL,
  `id_promoteur` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` bigint NOT NULL,
  `cni` bigint NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `superviseur`
--

CREATE TABLE `superviseur` (
  `id` bigint NOT NULL,
  `id_superviseur` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `cni` bigint NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `superviseur`
--

INSERT INTO `superviseur` (`id`, `id_superviseur`, `prenom`, `nom`, `cni`, `email`, `telephone`, `password`) VALUES
(1, 'Sup_001', 'test', 'test', 3000001, 'test@test.sn', 750000008, 'cc03e747a6afbbcbf8be7668acfebee5'),
(2, 'Sup_002', 'test2', 'test2', 3000002, 'test2@test.sn', 750000009, 'cc03e747a6afbbcbf8be7668acfebee5');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_administrateur`);

--
-- Index pour la table `affectation_agent`
--
ALTER TABLE `affectation_agent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `attente`
--
ALTER TABLE `attente`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client_valider`
--
ALTER TABLE `client_valider`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promoteur`
--
ALTER TABLE `promoteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promoteurbis`
--
ALTER TABLE `promoteurbis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `superviseur`
--
ALTER TABLE `superviseur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation_agent`
--
ALTER TABLE `affectation_agent`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `attente`
--
ALTER TABLE `attente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client_valider`
--
ALTER TABLE `client_valider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `promoteur`
--
ALTER TABLE `promoteur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `promoteurbis`
--
ALTER TABLE `promoteurbis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `superviseur`
--
ALTER TABLE `superviseur`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 24 fév. 2021 à 15:20
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `csm`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `Id_Competence` int(11) UNSIGNED NOT NULL,
  `Savoir_Faire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Savoirs` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

CREATE TABLE `fiches` (
  `Id_Fiche` int(10) UNSIGNED NOT NULL,
  `Titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code_ROM` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description_Courte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description_Detaille` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Photo` int(1) UNSIGNED DEFAULT NULL,
  `Fichier` int(1) UNSIGNED DEFAULT NULL,
  `Archive` int(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_competence`
--

CREATE TABLE `fiche_competence` (
  `Id_Fiche` int(11) UNSIGNED NOT NULL,
  `Id_Competence` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Id_Utilisateur` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Archive` int(1) UNSIGNED DEFAULT NULL,
  `Niveau` int(1) UNSIGNED DEFAULT NULL,
  `Mot_De_Passe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Id_Utilisateur`, `Nom`, `Prenom`, `Mail`, `Archive`, `Niveau`, `Mot_De_Passe`) VALUES
(1, 'jpp', 'jpp', 'jpp@ics.com', NULL, NULL, 'abcd');

-- --------------------------------------------------------

--
-- Structure de la table `utilisation`
--

CREATE TABLE `utilisation` (
  `Id_Utilisateur` int(11) UNSIGNED NOT NULL,
  `Id_Fiche` int(11) UNSIGNED NOT NULL,
  `Date_execution` date NOT NULL,
  `Action` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`Id_Competence`);

--
-- Index pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD PRIMARY KEY (`Id_Fiche`);

--
-- Index pour la table `fiche_competence`
--
ALTER TABLE `fiche_competence`
  ADD PRIMARY KEY (`Id_Fiche`,`Id_Competence`),
  ADD KEY `Id_Competence` (`Id_Competence`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Id_Utilisateur`),
  ADD UNIQUE KEY `Mail` (`Mail`);

--
-- Index pour la table `utilisation`
--
ALTER TABLE `utilisation`
  ADD PRIMARY KEY (`Id_Utilisateur`,`Id_Fiche`),
  ADD KEY `Id_Fiche` (`Id_Fiche`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `Id_Competence` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fiches`
--
ALTER TABLE `fiches`
  MODIFY `Id_Fiche` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `Id_Utilisateur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fiche_competence`
--
ALTER TABLE `fiche_competence`
  ADD CONSTRAINT `fiche_competence_ibfk_1` FOREIGN KEY (`Id_Fiche`) REFERENCES `fiches` (`Id_Fiche`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fiche_competence_ibfk_2` FOREIGN KEY (`Id_Competence`) REFERENCES `competences` (`Id_Competence`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisation`
--
ALTER TABLE `utilisation`
  ADD CONSTRAINT `utilisation_ibfk_1` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateurs` (`Id_Utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `utilisation_ibfk_2` FOREIGN KEY (`Id_Fiche`) REFERENCES `fiches` (`Id_Fiche`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

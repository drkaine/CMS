-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 01 mars 2021 à 15:04
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

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`Id_Competence`, `Savoir_Faire`, `Savoirs`) VALUES
(1, 'kmnbjvohknbj', 'bjojlnpnibuojnkpjoihoub'),
(2, 'mkbouvyicgvkhblphguoyivh', 'ouviyhkbjlhgouyivhkbljhuogyifgcj'),
(3, 'mkbjlvhk lbovhigj kbljhugoyivhkbjl', 'ougbjhipougivhkbjlhigouyivhkbjlhpiugoyivhkbjlhiugiyv'),
(4, 'ihpugobhpiguoyvhlbjhpguoyvihkbljhiguoyiv', 'huogyivhkbjlovihkbjogvyihbjguovyihbjh');

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
  `Archive` int(1) UNSIGNED DEFAULT NULL,
  `Fichier` int(1) DEFAULT NULL,
  `Photo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`Id_Fiche`, `Titre`, `Code_ROM`, `Description_Courte`, `Description_Detaille`, `Archive`, `Fichier`, `Photo`) VALUES
(1, 'ab', 'a', 'a', 'a', 1, NULL, NULL),
(2, 'knjbl', 'ljb', 'klnjb', 'klnjbk', 1, NULL, NULL),
(4, 'Installation et maintenance en froid, conditionnement d\'air', 'I1306', 'TESTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Cet emploi/mÃ©tier est accessible avec un diplÃ´me de niveau CAP/BEP Ã  Bac+2 (BTS, DUT) dans les secteurs du froid, de la climatisation, du gÃ©nie thermique, de l\'Ã©lectrotechnique, ...  Un ou plusieurs Certificat(s) d\'Aptitude Ã  la Conduite En SÃ©curitÃ© -CACES- conditionnÃ©(s) par une visite mÃ©dicale d\'aptitude Ã  renouveler pÃ©riodiquement peu(ven)t Ãªtre requis.  Des habilitations spÃ©cifiques (Ã©lectrique, gaz, ...) sont requises.', NULL, NULL, NULL),
(5, 'Management du personnel de cuisine ', 'G1601', 'DÃ©finit, met en oeuvre et supervise la production culinaire (Ã©laboration des menus, prÃ©paration et dressage des plats, commandes de produits,', 'Cet emploi/mÃ©tier est accessible avec un diplÃ´me de niveau CAP/BEP Ã  Bac+2 (BTS) en cuisine, production culinaire, arts culinaires, art de la table et du service, ... complÃ©tÃ© par une expÃ©rience professionnelle en tant que cuisinier au sein de restaurants traditionnels ou de collectivitÃ©.  Les recrutements peuvent Ãªtre ouverts sur contrats de travail saisonniers.  Son accÃ¨s dans les Ã©tablissements de la fonction publique s\'effectue gÃ©nÃ©ralement sur concours (cantines scolaires, hÃ´pitaux, ...).  La maÃ®trise de l\'outil informatique (logiciel de gestion de stock, ...) est requise.', NULL, NULL, NULL),
(6, 'Ã‰quipage de la pÃªche ', 'A1415', 'RÃ©alise les opÃ©rations de pÃªche cÃ´tiÃ¨re ou de pleine mer (capture et conditionnement des prises, entretien et nettoyage du navire et des Ã©quipements, ...) ', 'L\'activitÃ© de cet emploi/mÃ©tier s\'exerce au sein d\'un Ã©quipage de pÃªche. Elle peut impliquer un Ã©loignement du domicile de plusieurs jours, semaines ou mois.  Elle varie selon le type de pÃªche pratiquÃ©e (petite pÃªche, pÃªche cÃ´tiÃ¨re, pÃªche au large, grande pÃªche, ...) et le type d\'armement de pÃªche (bateau usine, chalutier, ...).  Elle s\'exerce par roulement, les fins de semaine et peut Ãªtre soumise Ã  des astreintes.  La rÃ©munÃ©ration est calculÃ©e Â« Ã  la part Â» ou est constituÃ©e d\'un fixe pouvant Ãªtre associÃ© Ã  des parts.  L\'activitÃ© s\'effectue parfois dans la cale, en zone frigorifique et peut impliquer la manipulation de charges.  Le port d\'une tenue professionnelle (cirÃ©, bottes, harnais, ...) peut Ãªtre requis.', NULL, NULL, NULL),
(7, 'Installation et maintenance en froid, conditionnement d\'air', 'I1306', ' I1306', 'ljgkhfcugjvhkjblovi', NULL, NULL, NULL),
(8, 'Conseil en gestion de patrimoine financier ', 'C1205', 'Effectue l\'installation, la mise en service et la maintenance d\'installations frigorifiques (froid commercial, froid industriel, ...) ', 'Cet emploi/mÃ©tier est accessible avec un diplÃ´me de niveau CAP/BEP Ã  Bac+2 (BTS, DUT) dans les secteurs du froid, de la climatisation, du gÃ©nie thermique, de l\'Ã©lectrotechnique, ...  Un ou plusieurs Certificat(s) d\'Aptitude Ã  la Conduite En SÃ©curitÃ© -CACES- conditionnÃ©(s) par une visite mÃ©dicale d\'aptitude Ã  renouveler pÃ©riodiquement peu(ven)t Ãªtre requis.  Des habilitations spÃ©cifiques (Ã©lectrique, gaz, ...) sont requises.', NULL, NULL, NULL),
(9, 'k', 'k', 'k', 'ljgkhfcugjvhkjblovi', 1, NULL, NULL),
(10, 'jkhgjc', 'hgtg', 'jhvg', 'ljgkhfcugjvhkjblovi', 1, NULL, NULL),
(11, 'JPP', 'hgtg', 'jhvg', 'ljgkhfcugjvhkjblovi', 1, NULL, NULL),
(12, 'Test', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(13, 'Test', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(14, 'TEST', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(15, 'TEST', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(16, 'test', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(17, 'TEST', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(18, 'test', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(19, 'TEST', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(20, 'TEST', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(21, 'tttt', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(22, 'tttt', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(23, 'tttt', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(24, 'TEST', 'bvyii', 'iycutgfgvhjbkhvg', 'hugivcgugjlhkjkhvjcgjvlhgkhcjghkgjlhmghcgjchgh', 1, NULL, NULL),
(25, 'b', 'a', 'a', 'a', 1, NULL, NULL),
(26, '', '', '', '', 1, NULL, NULL),
(27, '', '', '', '', 1, NULL, NULL),
(28, '', '', '', '', 1, NULL, NULL),
(29, 'DÃ©veloppement local', 'K1802', 'ConÃ§oit ou participe Ã  la conception de projets de dÃ©veloppement local, social (amÃ©lioration de l\'habitat, valorisation d\'activitÃ©s, amÃ©nagement du', 'L\'activitÃ© de cet emploi/mÃ©tier s\'exerce au sein d\'organismes publics ou privÃ©s (organisations professionnelles, associations, services de l\'Etat et collectivitÃ©s territoriales, ...) en relation avec diffÃ©rents interlocuteurs (Ã©lus locaux, citoyens, travailleurs sociaux, institutions administratives, ...).  Elle peut varier selon le type de structure (association, collectivitÃ© territoriale, ...), et le champ d\'intervention (dÃ©veloppement urbain, amÃ©nagement du territoire, international ...).  Elle peut nÃ©cessiter des dÃ©placements et un Ã©loignement du domicile de plusieurs mois pour les missions Ã  l\'international.', NULL, NULL, NULL),
(30, '', '', '', '', 1, NULL, NULL),
(31, 'dknjbÂ²', 'jbhvy', 'ihougiyfut', 'hujgkihyujcfg', NULL, NULL, NULL),
(32, 'dknjbÂ²', 'jbhvy', 'ihougiyfut', 'hujgkihyujcfg', NULL, NULL, NULL),
(33, 'ed', 'edd', 'eddy', 'eddy edd ed', NULL, NULL, NULL),
(34, 'ed', 'edd', 'eddy', 'eddy edd ed', NULL, NULL, NULL),
(35, 'azert', 'aaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', NULL, NULL, NULL),
(36, 'il etait une fois', 'byvuj', 'azertyuioqsdfghjklm', 'olbhvikjgc vjhkbguihycjkbguiyfchkbjivgn', NULL, NULL, NULL),
(37, 'az', 'az', 'z', 'zz', NULL, NULL, NULL),
(38, 'aze', 'azer', 'zerty', 'erty', NULL, NULL, NULL),
(39, 'aze', 'azer', 'zerty', 'erty', NULL, NULL, NULL),
(40, 'pppppppp', 'pppp', 'ppppp', 'ppppp', NULL, NULL, NULL),
(41, 'pppppppp', 'pppp', 'ppppp', 'ppppp', NULL, NULL, NULL),
(42, 'pppppppp', 'pppp', 'ppppp', 'ppppp', NULL, NULL, NULL),
(43, 'pppppppp', 'pppp', 'ppppp', 'ppppp', NULL, NULL, NULL),
(44, 'pppppppp', 'pppp', 'ppppp', 'ppppp', NULL, NULL, NULL),
(45, 'ed', 'aa', 'eddy', 'olbhvikjgc vjhkbguihycjkbguiyfchkbjivgn', NULL, NULL, NULL),
(46, 'ed', 'aa', 'eddy', 'olbhvikjgc vjhkbguihycjkbguiyfchkbjivgn', NULL, NULL, NULL),
(47, 'ed', 'aa', 'eddy', 'olbhvikjgc vjhkbguihycjkbguiyfchkbjivgn', NULL, NULL, NULL),
(48, 'ed', 'aa', 'eddy', 'olbhvikjgc vjhkbguihycjkbguiyfchkbjivgn', NULL, NULL, NULL),
(49, 'ed', 'aa', 'eddy', 'olbhvikjgc vjhkbguihycjkbguiyfchkbjivgn', NULL, NULL, NULL),
(50, 'ed', 'aa', 'eddy', 'olbhvikjgc vjhkbguihycjkbguiyfchkbjivgn', NULL, NULL, NULL),
(51, 'ed', 'aa', 'eddy', 'olbhvikjgc vjhkbguihycjkbguiyfchkbjivgn', NULL, NULL, NULL),
(52, 'ed', 'aa', 'eddy', 'olbhvikjgc vjhkbguihycjkbguiyfchkbjivgn', NULL, NULL, NULL),
(53, 'lkejfhebdkjslzbehkzncvkrbj', 'oui', 'jbhvjbkvh kbvh', 'vhkbuvihkbu', NULL, NULL, NULL),
(54, 'lkejfhebdkjslzbehkzncvkrbj', 'oui', 'jbhvjbkvh kbvh', 'vhkbuvihkbu', NULL, NULL, NULL),
(55, 'aaaaaaaa', 'aaa', 'aaaa', 'aaaaaa', NULL, NULL, NULL),
(56, 'tttt', 'tttt', 'tttttttt', 'ttttttttt', NULL, NULL, NULL),
(57, 'tttt', 'tttt', 'tttttttt', 'ttttttttt', NULL, NULL, NULL),
(59, 'file', '', '', '', NULL, NULL, NULL),
(60, 'file', 'file', 'file', 'file', NULL, 1, NULL),
(61, 'file', 'file', 'file', 'file', NULL, 1, NULL),
(62, 'ed', 'edd', 'lknbvihycguj', 'eddy edd ed', NULL, NULL, 1),
(63, 'ed', 'edd', 'lknbvihycguj', 'eddy edd ed', NULL, NULL, 1),
(64, 'ed', 'edd', 'lknbvihycguj', 'eddy edd ed', NULL, NULL, 1),
(65, 'photo', 'photo', 'photo', 'photo', NULL, NULL, 1),
(66, 'photo', 'photo', 'photo', 'photo', NULL, NULL, 1),
(67, 'photo', 'photo', 'photo', 'photo', NULL, NULL, 1),
(68, 'photo', 'mm', 'mm', 'mlll', NULL, NULL, 1),
(69, '++', '++', '++', '++', NULL, NULL, 1),
(70, '++', '++', '++', '++', NULL, NULL, 1),
(71, '1', '1', '1', '1&', NULL, NULL, 1),
(72, '1', '1', '1', '1&', NULL, NULL, 1),
(73, 'hello', 'hello', 'hello', 'hello', NULL, 1, 1),
(74, 'hello', 'hello', 'hello', 'hello', NULL, 1, 1),
(75, 'rt', 'rt', 'rt', 'rt', NULL, 1, 1),
(76, 'test', 'test', 'test', 'test', NULL, 1, 0),
(77, 'test', 'test', 'test', 'test', NULL, 1, 0),
(78, 'test', 'test', 'test', 'test', NULL, 1, 0),
(79, 'ezf', 'jvgc', 'jgchf', 'nk ', NULL, NULL, 0),
(80, 'ezf', 'jvgc', 'jgchf', 'nk ', NULL, NULL, 0),
(81, 'ezf', 'jvgc', 'jgchf', 'nk ', NULL, NULL, 3),
(82, 'ezf', 'jvgc', 'jgchf', 'nk ', NULL, NULL, 3),
(83, 'ezf', 'jvgc', 'jgchf', 'nk ', NULL, NULL, 3),
(84, 'ezf', 'jvgc', 'jgchf', 'nk ', NULL, NULL, 3),
(85, 'ezf', 'jvgc', 'jgchf', 'nk ', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fiche_competence`
--

CREATE TABLE `fiche_competence` (
  `Id_Fiche` int(11) UNSIGNED NOT NULL,
  `Id_Competence` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fiche_competence`
--

INSERT INTO `fiche_competence` (`Id_Fiche`, `Id_Competence`) VALUES
(1, 1),
(10, 1),
(11, 1),
(1, 2),
(10, 2),
(11, 2),
(1, 3),
(10, 3),
(11, 3),
(1, 4),
(2, 4),
(9, 4),
(10, 4),
(11, 4);

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
  `Mot_De_Passe` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Connexion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Id_Utilisateur`, `Nom`, `Prenom`, `Mail`, `Archive`, `Niveau`, `Mot_De_Passe`, `Connexion`) VALUES
(1, 'Jpp', 'Jpp', 'jPPy@ics.com', 1, 1, '1243', NULL),
(2, 'Za', 'E', 'E@ics.com', 1, 1, 'E', NULL),
(3, 'pp', 'pp', 'PP@ics.com', 1, 1, '123', NULL),
(5, 'pp', 'pp', 'PPy@ics.com', 1, NULL, '*owW:zx/`&j]W\'C', NULL),
(6, 'AHHH', 'h', 'h@ics.comxx', NULL, NULL, '$2y$10$.rfAHF7sHiQkpGB5t5cftu3qYIbvwmnwiF.XGWWoj4sSXPVsG0foO', NULL),
(7, 'h', 'h', 'hh@ics.com', NULL, NULL, '$2y$10$vUNJiO2yEMgMcFEY/NUhbubJl9LCLe3w6k8C8sYc9bOWb0YRny.iG', NULL),
(8, 'h', 'h', 'hhh@ics.com', NULL, NULL, '$2y$10$Ym/FUNa8yQvPsuzujGkk5.aSQacfvZtzmdVzTMydDcAFZ4sdyZBsG', NULL),
(9, 'h', 'h', 'i@ics.com', NULL, NULL, 'hello', NULL),
(10, 'h', 'h', 'ii@ics.com', 0, 1, '$2y$10$RMVzYIvnIoYQClHgWy122eN29oVHvd8siS.4VssR0HKHVHI75vaZ2', NULL),
(12, 'h', 'h', 'iii@ics.com', NULL, NULL, '$2y$10$iCwAwTg5wIUfIRw.532xy.VD4eWPYtjTeUOxkPvvpedAXvdT90Oni', NULL),
(14, 'hvgc', 'jhuft', 'jb@kh.ocm', NULL, NULL, 'dfg', NULL),
(15, 'h', 'h', 'a@ics.com', NULL, NULL, 'F!Y.7;]$,M;gugG', NULL),
(16, 'h', 'h', 'aa@ics.com', NULL, NULL, '1$4w#fTq%@TY:+H', NULL),
(17, 'h', 'h', 'aaz@ics.com', NULL, NULL, '$2y$10$JX7VXPuG7/I4bmuzRHhjqOMNzItfGFQKBkO6qUsRlLA0wEWpUNrAK', NULL),
(20, 'Test', 'ff', 'jpp@ics.com', NULL, NULL, '', NULL),
(21, 'ded', 'dede', 'dede@dede.com', NULL, 1, '', NULL),
(22, 'ed', 'ed', 'edy@ed.com', NULL, 1, '$2y$10$BXNIV/bIWdqcRbM4Kwe7kOZ/2uUmgXQfRcUAoDCN8eo/AWtsduCSS', NULL),
(23, 'al', 'al', 'al@live.fr', NULL, 1, '$2y$10$051teXH3s30ejbnsIOVBnej7kh.JyTaQJeDnluNrtyqhc4B/i9Chi', NULL),
(24, 'aezr', 'zaer', 'zer@li.f', NULL, 1, '$2y$10$QJBbwp8AURVl8sYV2n0Y5.egKKiXxJJI0E8RVKWtthHlyBG6SPdQO', NULL);

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
  MODIFY `Id_Competence` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fiches`
--
ALTER TABLE `fiches`
  MODIFY `Id_Fiche` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `Id_Utilisateur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 18 sep. 2023 à 13:32
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `amba`
--

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `id` int(11) NOT NULL,
  `id_tache` varchar(50) NOT NULL,
  `rapport` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id` int(11) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `service` varchar(50) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `designation`, `description`, `service`, `dates`, `etat`) VALUES
(2, 'Recouvrement', ' xxxx', 'GET', '2023-09-12 10:20:36', 0),
(3, 'Recouvrement2', 'xxxx ', 'GET', '2023-09-12 10:21:43', 0),
(4, 'Recouvrement3', 'xxx---xxxxx ', 'CPR', '2023-09-12 10:38:00', 1),
(5, 'recouvrement5', 'XXXX - xxxxx ', 'CV', '2023-09-12 10:35:06', 0),
(6, 'alex', '12345 ', 'CPR', '2023-09-12 10:37:56', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `num_user` int(11) NOT NULL,
  `nom_user` varchar(25) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `service` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`num_user`, `nom_user`, `password_user`, `service`, `role`) VALUES
(1, 'amba', '827ccb0eea8a706c4c34a16891f84e7b', 'GET', 'Agent'),
(2, 'b', '12345', '', ''),
(3, 'divin', 'ea3dc49e04ffdd8e1b4a1628e16e341e', 'CPR', 'agent'),
(4, 'alex', '827ccb0eea8a706c4c34a16891f84e7b', 'CV', 'Agent'),
(5, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'GET', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`num_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `num_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

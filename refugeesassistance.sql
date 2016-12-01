-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Décembre 2016 à 19:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `refugeesassistance`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE IF NOT EXISTS `actualites` (
  `titre` varchar(25) NOT NULL,
  `createur` varchar(25) NOT NULL,
  `id_zone` varchar(25) NOT NULL,
  `id_categorie` varchar(25) NOT NULL,
  PRIMARY KEY (`id_zone`,`id_categorie`),
  KEY `id_categorie` (`id_categorie`),
  KEY `createur` (`createur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `libelle` varchar(25) NOT NULL,
  `id_categorie` varchar(25) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `id_ville` varchar(25) NOT NULL,
  `id_categorie` varchar(25) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`id_ville`,`id_categorie`),
  UNIQUE KEY `id_ville` (`id_ville`),
  KEY `id_ville_2` (`id_ville`,`id_categorie`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE IF NOT EXISTS `inscrit` (
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `login` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `mail` varchar(35) NOT NULL,
  `role` enum('ROLE_ADMINISTRATEUR','ROLE_ORGANISATEUR','','') NOT NULL DEFAULT 'ROLE_ORGANISATEUR',
  `acces_region` varchar(200) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `nom_ville` varchar(25) NOT NULL,
  `departement` varchar(25) NOT NULL,
  `id_ville` varchar(25) NOT NULL,
  `region` varchar(25) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD CONSTRAINT `actualites_ibfk_3` FOREIGN KEY (`createur`) REFERENCES `inscrit` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actualites_ibfk_1` FOREIGN KEY (`id_zone`) REFERENCES `zone` (`id_ville`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actualites_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `zone` (`id_ville`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

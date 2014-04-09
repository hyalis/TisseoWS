-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mar 08 Avril 2014 à 15:33
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tisseows`
--

-- --------------------------------------------------------

--
-- Structure de la table `lignes`
--

CREATE TABLE IF NOT EXISTS `lignes` (
  `idLigne` varchar(20) NOT NULL,
  `numLigne` varchar(4) NOT NULL,
  `nomLigne` varchar(50) NOT NULL,
  `couleur` varchar(25) NOT NULL,
  `nbLikes` int(11) NOT NULL DEFAULT '0',
  `nbDislikes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idLigne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Structure de la table `stations`
--

CREATE TABLE IF NOT EXISTS `stations` (
  `idStation` varchar(20) NOT NULL,
  `idLigne` varchar(20) NOT NULL,
  `nomStation` varchar(50) NOT NULL,
  PRIMARY KEY (`idStation`,`idLigne`),
  KEY `idLigne` (`idLigne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `stations`
--
ALTER TABLE `stations`
  ADD CONSTRAINT `stations_ibfk_1` FOREIGN KEY (`idLigne`) REFERENCES `lignes` (`idLigne`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



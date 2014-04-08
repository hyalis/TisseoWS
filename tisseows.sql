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
-- Contenu de la table `lignes`
--

INSERT INTO `lignes` (`idLigne`, `numLigne`, `nomLigne`, `couleur`, `nbLikes`, `nbDislikes`) VALUES
('11821949021891616', '2', 'Cours Dillon / UniversitÃ© Paul Sabatier', '(38,206,255)', 0, 0),
('11821949021891649', '54', 'Empalot / Gleyze-Vieille', '(255,94,22)', 0, 0),
('11821949021891651', '56', 'UniversitÃ© Paul Sabatier / Auzeville Ã‰glise', '(148,210,77)', 0, 0),
('11821949021891663', '68', 'Ramonville MÃ©tro / La Terrasse', '(255,168,255)', 0, 0),
('11821949021891673', '78', 'UniversitÃ© Paul Sabatier / St Orens LycÃ©e', '(244,0,2)', 0, 0),
('11821949021891682', '81', 'UniversitÃ© Paul Sabatier / Castanet-Tolosan', '(244,0,208)', 0, 0),
('11821949021891683', '82', 'UniversitÃ© Paul Sabatier / Ramonville Midiville', '(244,0,2)', 0, 0),
('11821949021891898', '37', 'Jolimont / Ramonville MÃ©tro', '(255,94,22)', 0, 0),
('11821949021892004', 'B', 'Borderouge / Ramonville', '(255,255,0)', 0, 0),
('11821949023083020', '34', 'ArÃ¨nes / UniversitÃ© Paul Sabatier', '(255,94,22)', 0, 0),
('11821949023200859', '2s', 'Cours Dillon / UniversitÃ© Paul Sabatier', '(38,206,255)', 0, 0),
('11821949023798567', '81s', 'UniversitÃ© Paul Sabatier / Castanet -Tolosan', '(244,0,208)', 0, 0),
('11821949023946608', '88', 'Ramonville MÃ©tro / HÃ´pital Larrey', '(178,145,255)', 0, 0),
('11821949024037461', '88s', 'UniversitÃ© Paul Sabatier / CHR Rangueil', '(178,145,255)', 0, 0),
('11821949024202292', '79s', 'UniversitÃ© Paul Sabatier / St-Orens LycÃ©e', '(38,206,255)', 0, 0),
('11821949025413195', 'NOCT', 'Noctambus', '(227,0,68)', 0, 0),
('11821953316814852', '78s', 'UniversitÃ© Paul Sabatier / St Orens LycÃ©e', '(244,0,2)', 0, 0);

-- --------------------------------------------------------

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
-- Contenu de la table `stations`
--

INSERT INTO `stations` (`idStation`, `idLigne`, `nomStation`) VALUES
('1970324837184650', '11821949021891673', 'CNES- IAS'),
('1970324837184650', '11821949021891898', 'CNES- IAS'),
('1970324837184650', '11821953316814852', 'CNES- IAS'),
('1970324837184793', '11821949023946608', 'CHR Rangueil'),
('1970324837184793', '11821949024037461', 'CHR Rangueil'),
('1970324837184794', '11821949021891649', 'Ducuing'),
('1970324837184794', '11821949023946608', 'Ducuing'),
('1970324837184794', '11821949024037461', 'Ducuing'),
('1970324837185012', '11821949021891616', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949021891649', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949021891651', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949021891673', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949021891682', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949021891683', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949021892004', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949023083020', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949023200859', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949023798567', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949023946608', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949024037461', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949024202292', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821949025413195', 'UniversitÃ© Paul Sabatier'),
('1970324837185012', '11821953316814852', 'UniversitÃ© Paul Sabatier'),
('1970324837185357', '11821949021891616', 'FacultÃ© de Pharmacie'),
('1970324837185357', '11821949021891673', 'FacultÃ© de Pharmacie'),
('1970324837185357', '11821949021892004', 'FacultÃ© de Pharmacie'),
('1970324837185357', '11821949023200859', 'FacultÃ© de Pharmacie'),
('1970324837185357', '11821949025413195', 'FacultÃ© de Pharmacie'),
('1970324837185357', '11821953316814852', 'FacultÃ© de Pharmacie'),
('1970324837185948', '11821949023083020', 'IUT'),
('1970324837185949', '11821949021891649', 'Ducuing Ponsan'),
('1970324837185949', '11821949023946608', 'Ducuing Ponsan'),
('1970324837185949', '11821949024037461', 'Ducuing Ponsan'),
('1970324837185950', '11821949023946608', 'Vallon'),
('1970324837185950', '11821949024037461', 'Vallon'),
('1970324837185961', '11821949021891663', 'ENAC'),
('1970324837185961', '11821949021891673', 'ENAC'),
('1970324837185961', '11821949021891898', 'ENAC'),
('1970324837185961', '11821953316814852', 'ENAC'),
('1970324837185962', '11821949021891663', 'ISAE Campus SUPAERO'),
('1970324837186279', '11821949021891649', 'Pivoines'),
('1970324837186280', '11821949021891649', 'Ponsan Bellevue'),
('1970324837186290', '11821949021891616', 'Fac Dentaire'),
('1970324837186290', '11821949021891673', 'Fac Dentaire'),
('1970324837186290', '11821949023200859', 'Fac Dentaire'),
('1970324837186290', '11821949025413195', 'Fac Dentaire'),
('1970324837186290', '11821953316814852', 'Fac Dentaire'),
('1970324837186912', '11821949021891663', 'LAAS'),
('1970324837186912', '11821949021891673', 'LAAS'),
('1970324837186912', '11821949021891898', 'LAAS'),
('1970324837186912', '11821953316814852', 'LAAS'),
('1970324837648738', '11821949021891673', 'Champs MagnÃ©tiques'),
('1970324837648738', '11821953316814852', 'Champs MagnÃ©tiques'),
('1970329131942064', '11821949021891663', 'Naturopole'),
('1970329131942064', '11821949021891898', 'Naturopole'),
('1970329131942065', '11821949021891663', 'Sports Universitaires'),
('1970329131942065', '11821949021891898', 'Sports Universitaires'),
('1970329131942066', '11821949021891663', 'Giordano Bruno'),
('1970329131942066', '11821949021891898', 'Giordano Bruno'),
('1970329131942126', '11821949021891616', 'Pont Ducuing'),
('1970329131942126', '11821949021891673', 'Pont Ducuing'),
('1970329131942126', '11821949023083020', 'Pont Ducuing'),
('1970329131942126', '11821949023200859', 'Pont Ducuing'),
('1970329131942126', '11821953316814852', 'Pont Ducuing');

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

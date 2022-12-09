-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 déc. 2022 à 09:20
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `2dolist`
--
CREATE DATABASE IF NOT EXISTS `2dolist` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2dolist`;

-- --------------------------------------------------------

--
-- Structure de la table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `idAuthor` mediumint(9) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `dateOfCreation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lists`
--

INSERT INTO `lists` (`id`, `idAuthor`, `title`, `description`, `dateOfCreation`) VALUES
(20, 1, 'Ranger le salon', 'Je veux que vous fassiez le mÃ©nage avant que je rentre', '2022-12-07'),
(22, 1, 'Collecte argent anniversaire', 'On doit demander a tout le monde de participer', '2022-12-07'),
(23, 1, 'Faire les devoirs', 'faire les devoirs de lundi', '2022-12-07');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `content` varchar(50) NOT NULL,
  `idList` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idList` (`idList`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `content`, `idList`) VALUES
(1, 'zar', 0),
(20, 'Demander Ã  Audric', 22),
(16, 'popopopopop', 15),
(15, 'manger', 5),
(13, 'd', 4),
(14, 'u', 6),
(22, 'Demander Ã  Dorian', 22),
(26, 'Demander Ã  Lucas', 22);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

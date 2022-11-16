-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2022 at 05:39 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2dolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pblists`
--

DROP TABLE IF EXISTS `pblists`;
CREATE TABLE IF NOT EXISTS `pblists` (
  `idList` int(11) NOT NULL,
  `idTask` int(11) NOT NULL,
  KEY `idList` (`idList`),
  KEY `idTask` (`idTask`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pvlists`
--

DROP TABLE IF EXISTS `pvlists`;
CREATE TABLE IF NOT EXISTS `pvlists` (
  `idList` int(11) NOT NULL,
  `idTask` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  KEY `idList` (`idList`),
  KEY `idTask` (`idTask`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isDone` tinyint(1) NOT NULL,
  `content` varchar(200) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `passw` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pblists`
--
ALTER TABLE `pblists`
  ADD CONSTRAINT `pblists_ibfk_1` FOREIGN KEY (`idTask`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pblists_ibfk_2` FOREIGN KEY (`idList`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pvlists`
--
ALTER TABLE `pvlists`
  ADD CONSTRAINT `pvlists_ibfk_1` FOREIGN KEY (`idList`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pvlists_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pvlists_ibfk_3` FOREIGN KEY (`idTask`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

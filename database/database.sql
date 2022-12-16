-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2022 at 07:08 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2dolist`
--
CREATE DATABASE IF NOT EXISTS `2dolist` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2dolist`;

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists`
(
    `id`             mediumint(9) NOT NULL AUTO_INCREMENT,
    `idAuthor`       mediumint(9) NOT NULL,
    `title`          varchar(50)  NOT NULL,
    `description`    varchar(100) DEFAULT NULL,
    `dateOfCreation` date         NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 56
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `idAuthor`, `title`, `description`, `dateOfCreation`)
VALUES (50, 0, 'Cours', 'TÃ¢ches Ã  faire', '2022-12-15'),
       (51, 0, 'Cuisine', 'Recette Ã  faire', '2022-12-15'),
       (52, 0, 'Jeux', 'Vampire Survivors', '2022-12-15'),
       (53, 1, 'PrivÃ©e', 'Ma liste privÃ©e', '2022-12-15'),
       (55, 1, 'Coucou', 'oui', '2022-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks`
(
    `id`      mediumint(9) NOT NULL AUTO_INCREMENT,
    `content` varchar(50)  NOT NULL,
    `isDone`  tinyint(1)   NOT NULL DEFAULT '0',
    `idList`  mediumint(9) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `idList` (`idList`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 75
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `content`, `isDone`, `idList`)
VALUES (71, 'RÃ©diger le rapport de SAE', 0, 50),
       (72, 'PrÃ©parer la soutenance', 1, 50),
       (73, 'La quiche', 1, 51),
       (74, 'Ma tache privÃ©e', 0, 53);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`
(
    `id`     int(11)      NOT NULL AUTO_INCREMENT,
    `name`   varchar(25)  NOT NULL,
    `passwd` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `passwd`)
VALUES (1, 'felix', '$2y$10$Wu3MQiP./IjyMrkqaP1KEew6JnKGLKn217C620xsl8XW9ONdTVWJO'),
       (2, 'lucas', '$2y$10$Wu3MQiP./IjyMrkqaP1KEew6JnKGLKn217C620xsl8XW9ONdTVWJO');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
    ADD CONSTRAINT `idList` FOREIGN KEY (`idList`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `dafl_db`
--
CREATE DATABASE IF NOT EXISTS `dafl_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dafl_db`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user`
(
    `idDafl`      varchar(50) NOT NULL,
    `idSpotify`   varchar(50) NOT NULL,
    `hashedPassw` varchar(50) NOT NULL
) ENGINE = MyISAM
  DEFAULT CHARSET = latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;

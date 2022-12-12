-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2022 at 07:58 AM
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
  AUTO_INCREMENT = 28
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `idAuthor`, `title`, `description`, `dateOfCreation`)
VALUES (20, 1, 'Ranger le salon', 'Je veux que vous fassiez le mÃ©nage avant que je rentre', '2022-12-07'),
       (25, 1, 'azeaze', 'azeaze', '2022-12-10'),
       (27, 1, 'Nouvelle liste', 'test', '2022-12-11');

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
  AUTO_INCREMENT = 48
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `content`, `isDone`, `idList`)
VALUES (38, 'Demander Ã  Dorian', 1, 20),
       (39, 'Demander Ã  Lucas', 1, 20),
       (41, 'azeazazeaze', 1, 20),
       (44, 'azeaze', 1, 25),
       (47, 'oui', 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`
(
    `name`   varchar(25)  NOT NULL,
    `passwd` varchar(100) NOT NULL,
    PRIMARY KEY (`name`)
) ENGINE = MyISAM
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `passwd`)
VALUES ('felix', 'mdp'),
       ('lucas', 'mdp');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
    ADD CONSTRAINT `idList` FOREIGN KEY (`idList`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2022 at 06:54 AM
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
  AUTO_INCREMENT = 40
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `idAuthor`, `title`, `description`, `dateOfCreation`)
VALUES (31, 1, 'Appartement', 'Choses Ã  faire dans le Mielcappart', '2022-12-12'),
       (37, 1, 'ma premire list', 'oui', '2022-12-12'),
       (38, 0, 'Ma liste publique', 'ok', '2022-12-12'),
       (39, 0, 'Nouvelle liste', 'Oui', '2022-12-13');

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
  AUTO_INCREMENT = 63
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `content`, `isDone`, `idList`)
VALUES (58, 'Vaisselle', 1, 31),
       (60, 'Coucou', 0, 38),
       (62, 'Coucou', 0, 39);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;

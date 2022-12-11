--
-- Structure de la table `lists`
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
  AUTO_INCREMENT = 27
  DEFAULT CHARSET = latin1;

--
-- Déchargement des données de la table `lists`
--

INSERT INTO `lists` (`id`, `idAuthor`, `title`, `description`, `dateOfCreation`)
VALUES (20, 1, 'Ranger le salon', 'Je veux que vous fassiez le mÃ©nage avant que je rentre', '2022-12-07'),
       (25, 1, 'azeaze', 'azeaze', '2022-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
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
  AUTO_INCREMENT = 47
  DEFAULT CHARSET = latin1;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `content`, `isDone`, `idList`)
VALUES (38, 'Demander Ã  Dorian', 1, 20),
       (39, 'Demander Ã  Lucas', 1, 20),
       (41, 'azeazazeaze', 1, 20),
       (43, 'azeaze', 0, 20),
       (44, 'azeaze', 1, 25);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
    ADD CONSTRAINT `idList` FOREIGN KEY (`idList`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
# To execute as root on the host server

CREATE DATABASE IF NOT EXISTS 2dolist;
CREATE USER IF NOT EXISTS 2dolistAccess IDENTIFIED BY 'mdp2dolistDBAccess';

use 2dolist;

CREATE OR REPLACE TABLE lists
(
    id             MEDIUMINT   NOT NULL AUTO_INCREMENT,
    idAuthor       MEDIUMINT   NOT NULL,
    title          VARCHAR(50) NOT NULL,
    description    VARCHAR(100),
    dateOfCreation DATE        NOT NULL,
    PRIMARY KEY (id)
);

GRANT SELECT ON lists to 2dolistAccess;

insert into lists(idAuthor, title, description, dateOfCreation)
values ('001', 'First', 'My first list', CURRENT_DATE),
       ('002', 'Second', 'My second list', CURRENT_DATE);


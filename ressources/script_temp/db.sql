DROP TABLE IF EXISTS `TropheeObtenu`;
DROP TABLE IF EXISTS `Trophee`;
DROP TABLE IF EXISTS `Historique`;
DROP TABLE IF EXISTS `NiveauJouable`;
DROP TABLE IF EXISTS `Carte`;
DROP TABLE IF EXISTS `Equipe`;
DROP TABLE IF EXISTS `TourPossedee`;
DROP TABLE IF EXISTS `Joueur`;
DROP TABLE IF EXISTS `EffetPossede`;
DROP TABLE IF EXISTS `DetailEffet`;
DROP TABLE IF EXISTS `StatTour`;
DROP TABLE IF EXISTS `Competence`;
DROP TABLE IF EXISTS `Tour`;

CREATE TABLE Tour
(
    id_tour   SERIAL PRIMARY KEY,
    nom       VARCHAR(50)  NOT NULL,
    cout      INT          NOT NULL,
    src_image VARCHAR(255) NOT NULL
);

CREATE TABLE Competence
(
    id_competence  SERIAL PRIMARY KEY,
    nom_competence VARCHAR(50)   NOT NULL,
    description    VARCHAR(1024) NOT NULL
);

CREATE TABLE StatTour
(
    id_tour                     BIGINT UNSIGNED PRIMARY KEY,
    degats                      FLOAT NOT NULL,
    temps_recharchement_attaque FLOAT NOT NULL,
    portee                      INT   NOT NULL,
    id_competence               BIGINT UNSIGNED,

    FOREIGN KEY (id_tour) REFERENCES Tour (id_tour),
    FOREIGN KEY (id_competence) REFERENCES Competence (id_competence)
);

CREATE TABLE DetailEffet
(
    id_effet          SERIAL PRIMARY KEY,
    nom_effet         VARCHAR(50)   NOT NULL,
    description_effet VARCHAR(1024) NOT NULL
);

CREATE TABLE EffetPossede
(
    id_effet BIGINT UNSIGNED,
    id_tour  BIGINT UNSIGNED,
    PRIMARY KEY (id_effet, id_tour),

    FOREIGN KEY (id_effet) REFERENCES DetailEffet (id_effet),
    FOREIGN KEY (id_tour) REFERENCES Tour (id_tour)
);

CREATE TABLE Joueur
(
    id_joueur    SERIAL PRIMARY KEY,
    pseudo       VARCHAR(50)  NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
);

CREATE TABLE TourPossedee
(
    id_joueur        BIGINT UNSIGNED,
    id_tour          BIGINT UNSIGNED,
    date_acquisition DATE NOT NULL,
    PRIMARY KEY (id_tour, id_joueur),
    FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur),
    FOREIGN KEY (id_tour) REFERENCES Tour (id_tour)
);

CREATE TABLE Equipe
(
    id_joueur BIGINT UNSIGNED,
    id_tour   BIGINT UNSIGNED,
    PRIMARY KEY (id_tour, id_joueur),
    FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur),
    FOREIGN KEY (id_tour) REFERENCES Tour (id_tour)
);

CREATE TABLE Carte
(
    id_carte       SERIAL PRIMARY KEY,
    nom            VARCHAR(50)  NOT NULL,
    src_chemin_csv VARCHAR(255) NOT NULL,
    src_image      VARCHAR(255) NOT NULL
);

CREATE TABLE NiveauJouable
(
    id_niveau         SERIAL PRIMARY KEY,
    id_carte          BIGINT UNSIGNED,
    difficulte_etoile INT NOT NULL,
    gain              INT NOT NULL
);

CREATE TABLE Historique
(
    id_partie SERIAL PRIMARY KEY,
    id_joueur BIGINT UNSIGNED,
    id_niveau BIGINT UNSIGNED,
    a_gagne   BOOLEAN NOT NULL,
    date_jeu  DATE    NOT NULL,

    FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur),
    FOREIGN KEY (id_niveau) REFERENCES NiveauJouable (id_niveau)
);

CREATE TABLE Trophee
(
    id_trophee          SERIAL PRIMARY KEY,
    nom                 VARCHAR(50)   NOT NULL,
    condition_obtention VARCHAR(1024) NOT NULL,
    src_image           VARCHAR(255)  NOT NULL
);

CREATE TABLE TropheeObtenu
(
    id_joueur        BIGINT UNSIGNED,
    id_trophee       BIGINT UNSIGNED,
    date_acquisition DATE NOT NULL,

    PRIMARY KEY (id_trophee, id_joueur),
    FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur),
    FOREIGN KEY (id_trophee) REFERENCES Trophee (id_trophee)
);
-------------------------------------
-- maitre arsene
-- Projet : saé dev web site Pokemon TD
-- script creation
-------------------------------------

-------------------------------------
-- CREATION
-------------------------------------

DROP SCHEMA IF EXISTS SitePokemon CASCADE;
CREATE SCHEMA SitePokemon;

SET search_path TO SitePokemon;

CREATE TABLE Tour
(
    id_tour   SERIAL  NOT NULL,
    nom       VARCHAR NOT NULL,
    cout      INT     NOT NULL,
    src_image VARCHAR,
    CONSTRAINT pk_tour PRIMARY KEY (id_tour)
);

CREATE TABLE Competence
(
    id_competence  SERIAL  NOT NULL,
    nom_competence VARCHAR NOT NULL,
    description    VARCHAR NOT NULL,
    CONSTRAINT pk_Competence PRIMARY KEY (id_competence)
);

CREATE TABLE StatTour
(
    id_tour                     INT   NOT NULL,
    degats                      FLOAT NOT NULL,
    temps_recharchement_attaque FLOAT NOT NULL,
    portee                      INT   NOT NULL,
    id_competence               INT,
    CONSTRAINT fk_StatTour_Tour FOREIGN KEY (id_tour) REFERENCES Tour (id_tour) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT pk_StatTour PRIMARY KEY (id_tour),
    CONSTRAINT fk_StatTour_Competence FOREIGN KEY (id_competence) REFERENCES Competence (id_competence) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE detailEffet
(
    id_effet    SERIAL  NOT NULL,
    nom_effet   VARCHAR NOT NULL,
    description VARCHAR NOT NULL,
    CONSTRAINT pk_detailEffet PRIMARY KEY (id_effet)
);

CREATE TABLE effetPosseder
(
    id_effet INT NOT NULL,
    id_tour  INT NOT NULL,
    CONSTRAINT fk_effetPosseder_detailEffet FOREIGN KEY (id_effet) REFERENCES detailEffet (id_effet) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_effetPosseder_Tour FOREIGN KEY (id_tour) REFERENCES Tour (id_tour) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT pk_effetPosseder PRIMARY KEY (id_tour, id_effet)
);

CREATE TABLE Joueur
(
    id_joueur     SERIAL  NOT NULL,
    login         VARCHAR NOT NULL,
    mot_de_passse VARCHAR NOT NULL,
    CONSTRAINT pk_Joueur PRIMARY KEY (id_joueur)
);

CREATE TABLE TourPosseder
(
    id_joueur        INT  NOT NULL,
    id_tour          INT  NOT NULL,
    date_acquisition DATE NOT NULL,
    CONSTRAINT fk_TourPosseder_Joueur FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_TourPosseder_Tour FOREIGN KEY (id_tour) REFERENCES Tour (id_tour) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT pk_TourPosseder PRIMARY KEY (id_tour, id_joueur)

);

CREATE TABLE Equipe
(
    id_joueur INT NOT NULL,
    id_tour   INT NOT NULL,
    CONSTRAINT fk_Equipe_Joueur FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_Equipe_Tour FOREIGN KEY (id_tour) REFERENCES Tour (id_tour) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT pk_Equipe PRIMARY KEY (id_tour, id_joueur)
);

CREATE TABLE Carte
(
    id_carte       SERIAL  NOT NULL,
    nom            VARCHAR NOT NULL,
    src_chemin_csv VARCHAR NOT NULL,
    src_image      VARCHAR NOT NULL,
    CONSTRAINT pk_Carte PRIMARY KEY (id_carte)
);

CREATE TABLE NiveauJouable
(
    id_niveau         SERIAL NOT NULL,
    id_carte          INT    NOT NULL,
    difficulte_etoile INT    NOT NULL,
    gain              INT    NOT NULL,
    CONSTRAINT pk_NiveauJouable PRIMARY KEY (id_niveau),
    CONSTRAINT fk_NiveauJouable_Carte FOREIGN KEY (id_carte) REFERENCES Carte (id_carte) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE Historique
(
    id_partie SERIAL  NOT NULL,
    id_joueur INT     NOT NULL,
    id_niveau INT     NOT NULL,
    a_gagne   BOOLEAN NOT NULL,
    date      DATE    NOT NULL,
    CONSTRAINT pk_Historique PRIMARY KEY (id_partie),
    CONSTRAINT fk_Historique_Joueur FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_Historique_NiveauJouable FOREIGN KEY (id_niveau) REFERENCES NiveauJouable (id_niveau) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE Trophe
(
    id_trophe SERIAL  NOT NULL,
    condition VARCHAR NOT NULL,
    src_image VARCHAR,
    CONSTRAINT pk_Trophe PRIMARY KEY (id_trophe)
);

CREATE TABLE TropheObtenu
(
    id_joueur        INT  NOT NULL,
    id_trophe        INT  NOT NULL,
    date_acquisition DATE NOT NULL,
    CONSTRAINT fk_TropheObtenu_Joueur FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_TropheObtenu_Trophe FOREIGN KEY (id_trophe) REFERENCES Trophe (id_trophe) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT pk_TropheObtenu PRIMARY KEY (id_trophe, id_joueur)
);



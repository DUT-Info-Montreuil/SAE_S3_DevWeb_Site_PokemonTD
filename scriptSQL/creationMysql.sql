CREATE TABLE Tour
(
    id_tour   INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nom       VARCHAR            NOT NULL,
    cout      INT                NOT NULL,
    src_image VARCHAR
);

CREATE TABLE Competence
(
    id_competence  INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nom_competence VARCHAR            NOT NULL,
    description    VARCHAR            NOT NULL
);

CREATE TABLE StatTour
(
    id_tour                     INT   NOT NULL PRIMARY KEY,
    degats                      FLOAT NOT NULL,
    temps_recharchement_attaque FLOAT NOT NULL,
    portee                      INT   NOT NULL,
    id_competence               INT,
    CONSTRAINT fk_StatTour_Tour FOREIGN KEY (id_tour) REFERENCES Tour (id_tour) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_StatTour_Competence FOREIGN KEY (id_competence) REFERENCES Competence (id_competence) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE detailEffet
(
    id_effet    INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nom_effet   VARCHAR            NOT NULL,
    description VARCHAR            NOT NULL
);

CREATE TABLE effetPosseder
(
    id_effet INT NOT NULL PRIMARY KEY,
    id_tour  INT NOT NULL PRIMARY KEY,
    CONSTRAINT fk_effetPosseder_detailEffet FOREIGN KEY (id_effet) REFERENCES detailEffet (id_effet) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_effetPosseder_Tour FOREIGN KEY (id_tour) REFERENCES Tour (id_tour) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE Joueur
(
    id_joueur     INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    login         VARCHAR            NOT NULL,
    mot_de_passse VARCHAR            NOT NULL
);

CREATE TABLE TourPosseder
(
    id_joueur        INT  NOT NULL PRIMARY KEY,
    id_tour          INT  NOT NULL PRIMARY KEY,
    date_acquisition DATE NOT NULL,
    CONSTRAINT fk_TourPosseder_Joueur FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_TourPosseder_Tour FOREIGN KEY (id_tour) REFERENCES Tour (id_tour) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE Equipe
(
    id_joueur INT NOT NULL PRIMARY KEY,
    id_tour   INT NOT NULL PRIMARY KEY,
    CONSTRAINT fk_Equipe_Joueur FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_Equipe_Tour FOREIGN KEY (id_tour) REFERENCES Tour (id_tour) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE Carte
(
    id_carte       INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nom            VARCHAR            NOT NULL,
    src_chemin_csv VARCHAR            NOT NULL,
    src_image      VARCHAR            NOT NULL
);

CREATE TABLE NiveauJouable
(
    id_niveau         INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_carte          INT                NOT NULL,
    difficulte_etoile INT                NOT NULL,
    gain              INT                NOT NULL,
    CONSTRAINT fk_NiveauJouable_Carte FOREIGN KEY (id_carte) REFERENCES Carte (id_carte) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE Historique
(
    id_partie INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_joueur INT                NOT NULL,
    id_niveau INT                NOT NULL,
    a_gagne   BOOLEAN            NOT NULL,
    date      DATE               NOT NULL,
    CONSTRAINT fk_Historique_Joueur FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_Historique_NiveauJouable FOREIGN KEY (id_niveau) REFERENCES NiveauJouable (id_niveau) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE Trophee
(
    id_trophee    INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    condition_obt VARCHAR            NOT NULL,
    src_image     VARCHAR
);

CREATE TABLE TropheeObtenu
(
    id_joueur        INT  NOT NULL PRIMARY KEY,
    id_trophee       INT  NOT NULL PRIMARY KEY,
    date_acquisition DATE NOT NULL,
    CONSTRAINT fk_TropheeObtenu_Joueur FOREIGN KEY (id_joueur) REFERENCES Joueur (id_joueur) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_TropheeObtenu_Trophe FOREIGN KEY (id_trophee) REFERENCES Trophee (id_trophee) ON DELETE RESTRICT ON UPDATE CASCADE
);
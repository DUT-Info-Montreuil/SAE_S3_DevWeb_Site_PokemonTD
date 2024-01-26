-------------------------------------
-- maitre arsene
-- Projet : saé dev web site Pokemon TD
-- script insertion a executer apres le script de creation
-------------------------------------

-------------------------------------
-- INSERTION
-------------------------------------

SET search_path TO SitePokemon;

INSERT INTO tour(nom, cout)
VALUES ('poussifeu', 0),
       ('granivol', 0),
       ('magneti', 8),
       ('salameche', 15),
       ('grenousse', 20),
       ('nidoran', 10);

INSERT INTO Competence(nom_competence, description)
VALUES ('deflagration',
        'le pokemon emmet une onde autour de lui qui inflige d important degats au ennemi dans sa portee'),
       ('onde electrique', 'le pokemon emmet une onde electrique qui immobilise les ennemis dans sa portee'),
       ('poisson efficace',
        'le pokemon renfoce son venin pour ralentir tout les ennemis qu il a empoissonee auparavant');

INSERT INTO detailEffet(nom_effet, description)
VALUES ('poisson',
        'un ennemi touchet par cette effet recoi un certain nombre de degats selon une frequence pendant un certain nombre de temps'),
       ('ralentissement', 'reduit la vitesse en pourcentage d un ennemi selon un certain nombre de temps');

-- INSERT INTO StatTour(id_tour,degats,attaque_speed,portee) VALUES
-- (1,30,),
-- (2,),
-- ()

-- INSERT INTO StatTour(id_tour,degats,attaque_speed,portee,id_competence) VALUES
/*
$user = 'dutinfopw201618';
$password = 'hytytesa';
*/
DELETE FROM Historique;
DELETE FROM Carte;
DELETE FROM Equipe;
DELETE FROM TourPossedee;
DELETE FROM Joueur;
DELETE FROM EffetPossede;
DELETE FROM DetailEffet;
DELETE FROM StatTour;
DELETE FROM Competence;
DELETE FROM Tour;

-- Tour

/*
poussifeu(Type.feu, 60, "galifeu"),
    granivol(Type.plante, 95, "floravol"),
    grenousse(Type.eau, 155, "croaporal"),
    magneti(Type.neutre, 100, "magneton"),
    nidoran(Type.neutre, 150, "nidorino"),
    salameche(Type.feu, 130, "reptincel");
*/

/*
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (1, "poussifeu", 95, "ressources/pokemon/poussifeu.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (2, "granivol", 155, "ressources/pokemon/granivol.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (3, "grenousse", 100, "ressources/pokemon/grenousse.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (4, "magneti", 100, "ressources/pokemon/magneti.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (5, "nidoran", 150, "ressources/pokemon/nidoran.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (6, "salameche", 130, "ressources/pokemon/salameche.png");
*/
-- C'est mieux d'avoir plusieurs attributs pour img grand ect..

INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (1, "poussifeu", 0, "ressources/pokemon/poussifeu.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (2, "granivol", 0, "ressources/pokemon/granivol.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (3, "grenousse", 0, "ressources/pokemon/grenousse.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (4, "magneti", 0, "ressources/pokemon/magneti.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (5, "nidoran", 0, "ressources/pokemon/nidoran.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (6, "salameche", 0, "ressources/pokemon/salameche.png");


INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (7, "brocelome", 50, "ressources/pokemon/brocelome.png");
INSERT INTO Tour (id_tour, nom, cout, src_image) VALUES (8, "sepiatop", 100, "ressources/pokemon/sepiatop.png");

-- Competence 
INSERT INTO Competence (id_competence, nom_competence, description) VALUES (1, "Immobilisation", "Immobilise les ennemis");
INSERT INTO Competence (id_competence, nom_competence, description) VALUES (2, "Ralentissement du poison", "Ralenti les ennemis qu'il a empoisonné");
INSERT INTO Competence (id_competence, nom_competence, description) VALUES (3, "Déflagration", "Inflige des dégats de zone");

-- StatTour
/*Les pokemon sans compe sont null*/
INSERT INTO StatTour (id_tour, degats, temps_recharchement_attaque, portee, id_competence) VALUES (1, 30, 50, 100, NULL);
INSERT INTO StatTour (id_tour, degats, temps_recharchement_attaque, portee, id_competence) VALUES (2, 5, 6, 160, NULL);
INSERT INTO StatTour (id_tour, degats, temps_recharchement_attaque, portee, id_competence) VALUES (3, 40, 90, 160, NULL);
INSERT INTO StatTour (id_tour, degats, temps_recharchement_attaque, portee, id_competence) VALUES (4, 0, 200, 150, 1);
INSERT INTO StatTour (id_tour, degats, temps_recharchement_attaque, portee, id_competence) VALUES (5, 0, 70, 115, 2);
INSERT INTO StatTour (id_tour, degats, temps_recharchement_attaque, portee, id_competence) VALUES (6, 15, 50, 100, 3);

INSERT INTO StatTour (id_tour, degats, temps_recharchement_attaque, portee, id_competence) VALUES (7, 8, 6, 160, NULL);
INSERT INTO StatTour (id_tour, degats, temps_recharchement_attaque, portee, id_competence) VALUES (8, 50, 100, 170, NULL);

-- DetailEffet

INSERT INTO DetailEffet (id_effet, nom_effet, description_effet) VALUES (1, "Paralysie", "Ralenti ennemi");
INSERT INTO DetailEffet (id_effet, nom_effet, description_effet) VALUES (2, "Empoisonnement", "Empoisonne ennemi");

-- EffetPoss

INSERT INTO EffetPossede(id_effet, id_tour) VALUES (1,4);
INSERT INTO EffetPossede(id_effet, id_tour) VALUES (2,5);

-- Joueur
INSERT INTO Joueur(id_joueur, pseudo, mot_de_passe) VALUES (1, "sacha", "1234");

-- TourPossedee

INSERT INTO TourPossedee(id_joueur, id_tour, date_acquisition) VALUES (1, 1, '2023-12-01');
INSERT INTO TourPossedee(id_joueur, id_tour, date_acquisition) VALUES (1, 2, '2023-12-01');
INSERT INTO TourPossedee(id_joueur, id_tour, date_acquisition) VALUES (1, 3, '2023-12-01');
INSERT INTO TourPossedee(id_joueur, id_tour, date_acquisition) VALUES (1, 4, '2023-12-01');
INSERT INTO TourPossedee(id_joueur, id_tour, date_acquisition) VALUES (1, 5, '2023-12-01');
INSERT INTO TourPossedee(id_joueur, id_tour, date_acquisition) VALUES (1, 6, '2023-12-01');

-- Equipe

INSERT INTO Equipe(id_joueur, id_tour) VALUES (1, 1);
INSERT INTO Equipe(id_joueur, id_tour) VALUES (1, 4);
INSERT INTO Equipe(id_joueur, id_tour) VALUES (1, 6);

-- Carte

INSERT INTO Carte(id_carte, nom, src_chemin_csv, src_image) VALUES (1, "Safrania", "ressources/carte/safrania.csv", "ressources/carte/safrania.png");
INSERT INTO Carte(id_carte, nom, src_chemin_csv, src_image) VALUES (2, "Frimapic", "ressources/carte/frimapic.csv", "ressources/carte/frimapic.png");
INSERT INTO Carte(id_carte, nom, src_chemin_csv, src_image) VALUES (3, "Carmin sur Mer", "ressources/carte/carmin_sur_mer.csv", "ressources/carte/carmin_sur_mer.png");

-- NiveauJouable

INSERT INTO NiveauJouable(id_niveau, id_carte, difficulte_etoile, gain) VALUES (1, 1, 1, 50);
INSERT INTO NiveauJouable(id_niveau, id_carte, difficulte_etoile, gain) VALUES (2, 1, 2, 75);
INSERT INTO NiveauJouable(id_niveau, id_carte, difficulte_etoile, gain) VALUES (3, 1, 3, 100);

INSERT INTO NiveauJouable(id_niveau, id_carte, difficulte_etoile, gain) VALUES (4, 2, 1, 60);
INSERT INTO NiveauJouable(id_niveau, id_carte, difficulte_etoile, gain) VALUES (5, 2, 2, 80);
INSERT INTO NiveauJouable(id_niveau, id_carte, difficulte_etoile, gain) VALUES (6, 2, 3, 110);

INSERT INTO NiveauJouable(id_niveau, id_carte, difficulte_etoile, gain) VALUES (7, 3, 1, 70);
INSERT INTO NiveauJouable(id_niveau, id_carte, difficulte_etoile, gain) VALUES (8, 3, 2, 90);
INSERT INTO NiveauJouable(id_niveau, id_carte, difficulte_etoile, gain) VALUES (9, 3, 3, 150);

-- Historique

INSERT INTO Historique(id_partie, id_joueur, id_niveau, a_gagne, date_jeu) VALUES (1, 1, 1, false, '2023-12-05');
INSERT INTO Historique(id_partie, id_joueur, id_niveau, a_gagne, date_jeu) VALUES (2, 1, 1, false, '2023-12-06');
INSERT INTO Historique(id_partie, id_joueur, id_niveau, a_gagne, date_jeu) VALUES (3, 1, 1, true, '2023-12-07');
INSERT INTO Historique(id_partie, id_joueur, id_niveau, a_gagne, date_jeu) VALUES (4, 1, 2, false, '2023-12-08');
INSERT INTO Historique(id_partie, id_joueur, id_niveau, a_gagne, date_jeu) VALUES (5, 1, 2, true, '2023-12-09');

-- Trophee

INSERT INTO Trophee(id_trophee, nom, condition_obtention, src_image) VALUES (1, "Premier Pas", "Faire une première partie", "ressources/trophee/premierpas.png");
INSERT INTO Trophee(id_trophee, nom, condition_obtention, src_image) VALUES (2, "Débutant", "Faire au moins 5 parties", "ressources/trophee/debutant.png");

-- TropheeObtenu
INSERT INTO TropheeObtenu(id_joueur, id_trophee ,date_acquisition ) VALUES (1, 1, '2023-12-05');
INSERT INTO TropheeObtenu(id_joueur, id_trophee ,date_acquisition ) VALUES (1, 2, '2023-12-09');
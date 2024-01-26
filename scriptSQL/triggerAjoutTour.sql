DELIMITER $$

DROP TRIGGER IF EXISTS dutinfopw201618.ajoutMinTourJoueur $$

CREATE TRIGGER dutinfopw201618.ajoutMinTourJoueur
    AFTER INSERT
    ON dutinfopw201618.Joueur
    FOR EACH ROW
BEGIN

    DECLARE is_done INTEGER DEFAULT 0;

    DECLARE idTemp INT;
    DECLARE myCursor CURSOR FOR
        SELECT id_tour FROM dutinfopw201618.Tour WHERE cout = 0;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET is_done = 1;

    OPEN myCursor;

    read_loop:
    LOOP
        FETCH myCursor INTO idTemp;

        IF is_done = 1 THEN
            LEAVE read_loop;
        END IF;

        INSERT INTO dutinfopw201618.TourPossedee (id_joueur, id_tour, date_acquisition)
            VALUE (NEW.id_joueur, idTemp, CURRENT_DATE());
    END LOOP;

    CLOSE myCursor;
END $$
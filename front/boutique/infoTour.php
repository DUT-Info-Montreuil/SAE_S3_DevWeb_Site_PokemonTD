<link rel="stylesheet" href="./style/boutique/detail/detailTour.css">
<div class="top">
    <img class="img-detail-tour" src="<?php echo $infoTour['src_image']; ?>" alt="image de <?php echo $infoTour['nom']; ?>">
    <h2 class="nomPokemon">
        <?php echo $infoTour['nom']; ?>
    </h2>
</div>
<div>
    <div class="chapitre">
        <h3>
            Général
        </h3>
        <p>
            <span>Cout :</span> <?php echo $infoTour['cout']; ?>$
        </p>
    </div>

    <div class="stat chapitre">
        <h3>
            Stats
        </h3>
        <p>
            <span>Portée :</span> <?php echo $infoTour['portee']; ?>
        </p>
        <p>
            <span>Degats par seconde :</span> <?php echo number_format(((int)$infoTour['degats']/(int)$infoTour['temps_recharchement_attaque'])*60,2); ?>
        </p>
        <p>
            <span>Degats par attaque :</span> <?php echo $infoTour['degats']; ?>
        </p>
        <p>
            <span>Temps rechargement d'une attaque :</span>
            <?php echo number_format(((int)$infoTour['temps_recharchement_attaque'])/60,2); ?>s
        </p>
    </div>
    <?php if($infoTour['id_competence'] != NULL){ ?>
        <div class="competence chapitre">
            <h3>
                Competence
            </h3>
            <p>
                <span>Nom de la competence :</span> <?php echo $infoTour['nom_competence']; ?>
            </p>
            <p>
                <span>Description de la competence :</span> <?php echo $infoTour['description']; ?>
            </p>
        </div>
    <?php } if($infoTour['id_effet'] != NULL){ ?>
        <div class="effets chapitre">
            <h3>
                Effet
            </h3>
            <p>
                <span>Nom de l'effet :</span> <?php echo $infoTour['nom_effet']; ?>
            </p>
            <p>
                <span>Description de l'effet :</span> <?php echo $infoTour['description_effet']; ?>
            </p>
        </div>
    <?php } ?>

    <div class="bot">
        <div class="retour-boutique">
            <a href="index.php?module=mod_boutique" class="btn" id="boutique">
                Retour a la boutique
            </a>
        </div>

        <?php if($_SESSION['estConnecter']) {?>
            <div class="acheter-btn">
                <a href="index.php?module=mod_boutique&action=achat&idTour=<?php echo $infoTour["id_tour"]; ?>&token=<?php echo $token; ?>"
                   class="btn" id="acheter">
                    Achetez
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<div id="boutique_top">
    <h3>La boutique</h3>
    <?php if ($_SESSION['estConnecter']) { ?>
        <p>solde :</p><p id="solde"><?php echo $solde ?></p>
    <?php } ?>
</div>

<p>Achetez ici vos nouvelles tours</p>

<h3>Tours :</h3>

<div id="boutique">
    <?php foreach ($tableau as $tuple) { ?>
        <div class="carte">

            <div>
                <img class="image" src="<?php echo $tuple["src_image"]; ?>" alt="<?php echo $tuple["nom"]; ?>">

                <p class="coutBoutique">
                    <?php echo $tuple["cout"]; ?> $
                </p>
            </div>

            <h5>
                <?php echo $tuple["nom"]; ?>
            </h5>

            <div class="div-achat">
                <a class="btn-detail"
                   href="index.php?module=mod_boutique&action=detailTour&idTour=<?php echo $tuple["id_tour"]; ?>">
                    Details
                </a>
                <?php if ($_SESSION['estConnecter']) { ?>
                    <a class="btn-achat"
                       href="index.php?module=mod_boutique&action=achat&idTour=<?php echo $tuple["id_tour"]; ?>&token=<?php echo $token; ?>">
                        Achat rapide
                    </a>
                <?php } ?>
            </div>

        </div>
    <?php } ?>
</div>
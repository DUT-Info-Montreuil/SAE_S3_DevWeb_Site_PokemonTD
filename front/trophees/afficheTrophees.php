<div id="trophees_top">
    <h3>Les Trophées :</h3>
</div>

<?php
    if ($_SESSION['estConnecter'] && $poss ==0) { ?>
        <a href="index.php?module=mod_trophees&action=afficheTropheesObtenus" class="bouton_lien" >Vos Trophées</a>
        <p>Visionnez ici tous les trophées existants</p>
    <?php }elseif($poss == 1){ ?>  
            <a href="index.php?module=mod_trophees&action=afficheTrophees" class="bouton_lien" >Tous les Trophées</a>
            <p> Vos Trophées obtenus :</p>
    <?php } 

    if( $trophees == -2){?>

        <p>Vous n'avez rien débloqué...</p>
        <img class="image" src="./ressources/trophee/mimitoss.jpg">

    <?php }else{ ?>

            <div id="trophees">
                <?php foreach ($trophees as $tuple) { ?>
                    <div id="carte">

                        <div>
                            <img class="image" src="<?php echo $tuple["src_image"]; ?>">
                            
                            <h4 class="nomTrophee">
                                <?php echo $tuple["nom"]; ?> 
                            </h4>
                        </div>

                        <h5 class="cond">
                            <?php echo $tuple["condition_obtention"]; ?> <!-- Hover si possible-->
                        </h5>

                    </div>
                <?php } ?>
            </div>
   <?php }


    if ($_SESSION['estConnecter']) {
        if(!empty($_SESSION['moderateur']) && $_SESSION['moderateur']==1){?>

            <a href="index.php?module=mod_trophees&action=formAjoutTrophee" class="bouton_lien" >Ajouter des Trophées</a>


      <?php  }
    }else{
        ?>
        <p>Connectez vous pour voir vos Trophées !</p>
     
   <?php }





?>






<div id="boutique_top">
    <h3>La boutique</h3>
    <p>solde : </p>
</div>

<p>Achetez ici vos nouvelles tours et cohéquipiers</p>

<h3>Tours:</h3>

<div id="boutique">
    <?php foreach ($tableau as $tuple) { ?>
        <div id="carte">

            <div>
                <img class="image" src="<? echo $tuple["src_image"]; ?>">
                
                <p class="coutBoutique">
                    <?php echo $tuple["cout"]; ?> $
                </p>
            </div>

            <h5>
                <?php echo $tuple["nom"]; ?>
            </h5>

        </div>
    <?php } ?>
</div>
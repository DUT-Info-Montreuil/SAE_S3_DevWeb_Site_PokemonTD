<div id="boutique_top">
    <h3>La boutique</h3>
    <p>solde : </p>
</div>

<p>Achetez ici vos nouvelles tours et cohéquipiers</p>

<h3>Tours:</h3>

<div class="container mt-5">
    <?php foreach ($tableau as $tuple) { ?>
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="card-title">
                    <?php echo $tuple["nom"]; ?>
                </h5>

                <p class="card-text">
                    <?php echo $tuple["cout"]; ?> 
                </p>

                <img src="<? echo $tuple["src_image"]; ?>" alt="">

            </div>
        </div>
    <?php } ?>
</div>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>PokemonTD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/239660ff21.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/base.css">
    <link rel="stylesheet" href="./style/carte/carte.css">

</head>

<body>

<header>

    <div id="topBar">

        <a href="index.php">
            <img src="./ressources/pikachu.webp" alt="acceuil">
        </a>

        <h1>
            POKEMON TD
        </h1>
        <?php if(!$_SESSION['estConnecter']) {?>
            <div id="profile">
                <a href="index.php?module=mod_connexion&action=lien_connexion" >Connexion</a>
                <a href="index.php?module=mod_connexion&action=lien_inscription" >Inscription</a>
            </div>
        <?php }else { ?>
            <div id="profile">
                <a href="index.php?module=mod_connexion&action=deconnexion" >Deconexion</a>
            </div>
        <?php } ?>
    </div>

    <div id="navbar">
        <a href="index.php?module=mod_equipe" class="navbarLink" >Equipe</a>
        <a href="index.php?module=mod_carte#carte" class="navbarLink" >Carte</a>
        <a href="index.php?module=mod_boutique" class="navbarLink" >Boutique</a>
        <a href="index.php?module=mod_trophees&action=afficheTrophees" class="navbarLink" >Trophées</a>
    </div>

</header>



<main>

    <?php
    echo $affichageModule;
    ?>

</main>


</body>
</html>



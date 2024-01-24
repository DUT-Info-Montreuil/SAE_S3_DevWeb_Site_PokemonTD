<!DOCTYPE html>
<html lang="fr">
<head>
    <title>PokemonTD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!--
    <link rel="stylesheet" href="./style/all.min.css">
-->

    <link rel="stylesheet" href="./style/base.css">
    <link rel="stylesheet" href="./style/boutique.css">
    <link rel="stylesheet" href="./style/equipe.css">

    <script src="./back/script/jquery-3.7.1.min.js"></script>
</head>
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

        <div id="profile">
            <a href="index.php?module=mod_connexion&action=lien_connexion" >Connexion</a>
            <a href="index.php?module=mod_connexion&action=lien_inscription" >Inscription</a>
        </div>
    </div>

        <div id="navbar">
            <a href="index.php?module=mod_equipe" class="navbarLink" >Equipe</a>
            <a href="#" class="navbarLink" >Carte</a>
            <a href="index.php?module=mod_boutique" class="navbarLink" >
                Boutique
            </a>
            <a href="#" class="navbarLink" >Trophées</a>
        </div>

    </header>

    
    
    <main>

        <div>
            <?php
                // echo $menu->afficheMenu();
            ?>
        </div>

        <?php
            echo $affichageModule;
        ?>

    </main>

    
</body>
</html>



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
    <link rel="stylesheet" href="./style/testFond.css">

    <script src="./back/script/jquery-3.7.1.min.js"></script>
</head>

<body>

    <header>

        <div class="topBar">

            <a href="index.php">
                <img src="./ressources/pikachu.webp" alt="acceuil" class="pikachuLogo">
            </a>

            <h1>
                POKÉMON TD
            </h1>

            <div class="profile">
                <?php if(!$_SESSION['estConnecter']) {?>
                    <a href="index.php?module=mod_connexion&action=lien_connexion" class="change-survol">Connexion</a>
                    <a href="index.php?module=mod_connexion&action=lien_inscription" class="change-survol">Inscription</a>
                <?php }else { ?>
                    <p class="profile__pseudo"> <?php echo htmlentities($_SESSION['pseudo']); ?></p>
                    <a href="index.php?module=mod_connexion&action=deconnexion" class="change-survol">Déconnexion</a>
                <?php } ?>
                <a href="index.php" class="change-survol">Accueil</a>
            </div>
    </div>

        <div class="navbar">
            <a href="index.php?module=mod_equipe" class="navbarLink" >Équipe</a>
            <a href="index.php?module=mod_carte#carte" class="navbarLink" >Carte</a>
            <a href="index.php?module=mod_boutique" class="navbarLink" > Boutique </a>
            <a href="index.php?module=mod_trophees&action=afficheTrophees" class="navbarLink" >Trophées</a>
        </div>

    </header>

    <div class="background">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    
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

    <footer>
        <div class="barreBleuCiel">

        </div>
        <div class="nom">Arsene, Benjamin, Zen</div>
    </footer>
</body>
</html>



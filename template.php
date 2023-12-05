<!DOCTYPE html>
<html lang="fr">
<head>
    
    <title>PokemonTD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet">
</head>
</head>

<body>

    <!-- En-tête -->
    <div class = "container">
        <?php
            echo $menu->afficheMenu();
        ?>
    </div>
    
    <main>

        <?php
            echo $affichageModule;
        ?>

    </main>

    <!-- Pied de page -->
    <footer>
        <p>Coordonnées de contact / Informations légales</p>
    </footer>

    
</body>
</html>



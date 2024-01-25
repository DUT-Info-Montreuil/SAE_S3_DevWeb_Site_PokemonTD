<script src="./back/script/FunctionCarte.js"></script>
<div class="carte" id="carte">
    <div class="item" id="item1" onclick="devoileMap3()">?</div>
    <div class="item" id="item2" onclick="devoileMap2()">?</div>
    <div class="item" id="item3" onclick="devoileMap1()">?</div>
    <?php if($_SESSION['estConnecter']) {
        foreach ($niveauDejaJoue as $niveau) {
            switch ($niveau['nom']){
                case 'Safrania':
                    echo "<script>" .
                        "document.querySelector('#item3').click();" .
                        "document.querySelector('#carteNiveau1').innerHTML += " .
                        " \"<a class='Historique-btn' href='index.php?module=mod_carte&action=historique&idCarte=$niveau[id_carte]'>Historique</a>\"; " .
                        "</script>";
                    break;
                case 'Frimapic':
                    echo "<script>" .
                        "document.querySelector('#item2').click();" .
                        "document.querySelector('#carteNiveau2').innerHTML += " .
                        " \"<a class='Historique-btn' href='index.php?module=mod_carte&action=historique&idCarte=$niveau[id_carte]'>Historique</a>\"; " .
                        "</script>";
                    break;
                case 'Carmin sur Mer':
                    echo "<script>" .
                        "document.querySelector('#item1').click();" .
                        "document.querySelector('#carteNiveau3').innerHTML += " .
                        " \"<a class='Historique-btn' href='index.php?module=mod_carte&action=historique&idCarte=$niveau[id_carte]'>Historique</a>\"; " .
                        "</script>";
                    break;
            }
        }
    } ?>
</div>
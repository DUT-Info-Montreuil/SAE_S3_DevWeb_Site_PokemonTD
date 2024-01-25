
<link rel="stylesheet" href="./style/carte/historique.css">
<div class="lookMain">
    <div class="top">
        <img src="<?php echo $info['src_image']; ?>" alt="image <?php echo $info['nom']; ?>">
        <h3>
            <?php echo $info['nom']; ?>
        </h3>
    </div>
    <div class="historique">
        <h2>Mon historique :</h2>
        <div class="tab">
            <table>
                <thead>
                <caption></caption>
                </thead>
                <tbody>
                <tr>
                    <th>Date</th>
                    <th>Difficulté</th>
                    <th>Victoire</th>
                    <th>Argent gagné</th>
                </tr>
                <?php foreach ($historique as $partie) {
                    if (!$partie['a_gagne'])
                        $partie['gain'] = "0";
                    else
                        $partie['gain'] = "+ $partie[gain]";
                    switch ($partie['difficulte_etoile']){
                        case '1':
                            $partie['difficulte_etoile'] = "Facile";
                            break;
                        case '2':
                            $partie['difficulte_etoile'] = "Moyen";
                            break;
                        case '3':
                            $partie['difficulte_etoile'] = "Dur";
                            break;
                    }
                    echo "<tr class='". ($partie['a_gagne'] == '1' ? 'winRow' : 'loseRow') ."'>";
                    $partie['a_gagne'] = $partie['a_gagne'] == '1' ? "<i class='fa-solid fa-check fa-xl' style='color: #142fb7;'></i>" : "<i class='fa-solid fa-xmark fa-beat fa-xl' style='color: #142fb7;'></i>";
                    echo "<td>$partie[date_jeu]</td>";
                    echo "<td>$partie[difficulte_etoile]</td>";
                    echo "<td>$partie[a_gagne]</td>";
                    echo "<td>$partie[gain]</td>";
                    echo "</tr>";
                }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bot">
        <a onclick="history.go(-1);" class="anim">
            Retour
        </a>
    </div>
</div>
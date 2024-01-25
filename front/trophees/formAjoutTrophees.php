<section class="creaTrophee">
        <h1 class="titlePage">Je créé un nouveau trophée : </h1>
        <form action="index.php?module=mod_trophees&action=ajouterTrophee" method="post"
              enctype="multipart/form-data" class="formTrophee">
             <p class="p trophee">
                 <label for="nomTrophee" class="labelTrophee">Nom du Trophée : </label>
                 <input class='form-control mr-sm-2' type='text' name='name' id="nomTrophee"required/>
             </p> 
             <p class="p Trophee">
                 <label for="logo" class="labelTrophee">Logo (max 2 Mo) :</label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="2000000" id="logo">
                 <input type="file" name="logo" accept="image/*"/>

             </p>  

            <p class="descrCond">
                <label for="descr" class="labelTrophee">Conditions d'Obtention : </label>
                <textarea class="areaCond" name="conditionObt" id="conditionObt"></textarea>
            </p>

            <input type="hidden" name="token" value="<?php echo $token; ?>"/>

            <input class="creerTrophee" type="submit" value="créer"/>
        </form>
</section>
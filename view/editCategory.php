<?php
$categorie = $result["data"]["categorie"];

?>


<h1 class="titremodifpub">Modifier le Nom</h1>
<div class="formeditcat">
<form  action="index.php?ctrl=categorie&action=editCategorie&id=<?=$categorie->getId()?>" method="POST">

        <label>
            <input class="titreforpub"type="text" name="nom" value="<?= $categorie->getNom()?>">
        </label>
        <input class="inputeditpub"type="submit" value="enregistrer">
</form>
</div>
<?php
$publication = $result["data"]["publication"];

?>


<h2 class="titremodifpub">Modifier le titre</h2>
<div class="formeditcat">
<form  action="index.php?ctrl=categorie&action=editPublication&id=<?=$publication->getId()?>" method="POST">

        <label>
            <input class="titreforpub"type="text" name="titre" value="<?= $publication->getTitre()?>">
        </label>
        <input class="inputeditpub"type="submit" value="enregistrer">
</form>
</div>
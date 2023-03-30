<?php
$user = $result["data"]["user"];

?>


<h1>Modifier le pseudo</h1>
<form  action="index.php?ctrl=categorie&action=editPseudo&id=<?=$user->getId()?>" method="POST">

        <label>
            <input type="text" name="pseudo" value="<?= $user->getPseudo()?>">
        </label>
        <input type="submit" value="enregistrer">
</form>
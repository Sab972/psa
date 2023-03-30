<?php

$categorie=$result["data"]['categorie'];
//var_dump($_POST);

?>
<div id="formaddcat">
<form class=""action="index.php?ctrl=categorie&action=addCategorie" method= "post" enctype="multipart/form-data">
<label class="titreform" for="file"></label><br>
    <input class="input"type="text" name="categorieNom" placeholder="Modifier le titre"><br>
    <label  class="titreformcat"for="file"></label><br>
    <input class="input"type="file" name="file"><br> 
    <input class="inputaddcat"type="submit" value="publier">
</form>
</div>




<?php

$categorie=$result["data"]['categorie'];


if(App\Session::getUser()){//Si connexion d'un user
?>

<div id="contenuform">
<form action="index.php?ctrl=categorie&action=addPublication&id=<?=$categorie->getId()?>" method= "post" enctype="multipart/form-data">
<label class="titreform" for="file"></label><br>
    <input class="input"type="text" name="publicationTitre" placeholder="Titre de la publication"><br>
<label class="titreform"for="file"></label><br>    
    <textarea class="input"type="textarea" name="publicationContenu" placeholder="Contenu "></textarea><br>
    <label  class="titreform"for="file"></label><br>
    <input class="input"type="file" name="file"><br> 
    <input class="inputaddcat"type="submit" value="publier">
</form>
</div>
<?php

}   
?>
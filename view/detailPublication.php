<?php

$publication = $result["data"]['publication'];

$commentaires=$result["data"]['commentaires'];

?>
<div class="contenucom">
<h3 class="titrepubcat"><?=$publication->getTitre()?></h3>
<h3 class="pseudocat">de <?=$publication->getUser()->getPseudo()?></h3>
<img class="imgpublication" src=<?=$publication->getImagePublication()?>>
<?php
if(App\Session::getUser()){?>
<div class="formcom">
<form action="index.php?ctrl=categorie&action=addCommentaire&id=<?=$publication->getId()?>" method="POST">


<label for="text"></label>
<textarea class= "nouveau" name="text" placeholder="nouveau commentaire " required></textarea>

<input class="posti" type="submit" value="Poster">
</form>
</div>
<?php
}


else
{
    echo"Veuillez vous connecter pour ajouter un commentaire!";
?>       
    <?php
}

?>

<div class="com">

    <?php
if (!empty($commentaires)){    
foreach($commentaires as $commentaire ){
    ?>


    <h3 class="nom"><?= $commentaire->getUser()->getPseudo() ?></h3>

    <div class="commentaire">
    <p class="text"><?=$commentaire->getText()?></p>
    </div>

<?php
}  
}
    else
    {
        echo"Il n'y a pas de commentaires...";
 ?>       

<?php   }

     ?>
</div>
</div>








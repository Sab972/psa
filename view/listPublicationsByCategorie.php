<?php

$publications = $result["data"]['publications'];
$categorie=$result["data"]['categorie'];
//$commentaire=$result["data"]['commentaire'];
 // var_dump($categorie);
?> 
 
<h2 class="titrepublicat">Liste des publications de la categorie  <?php echo $categorie->getNom()?></h2>
<?php if(App\Session::isAdmin()){?>
<a  class="lienmodifcat"href="index.php?ctrl=categorie&action=editCategorie&id=<?= $categorie->getId() ?>"><i class="fa-solid fa-pencil" style="color: #9f15d1;"></i>Modifier la  categorie</a><br>

 
<?php
} 
?>
<a  class="lienajoupub"href="index.php?ctrl=categorie&action=addPublication&id=<?=$categorie->getId()?>"><i class="fa-solid fa-plus" style="color: #b61fe0;"></i>Ajouter une publication à la categorie</a><br>
<?php //Recupère les messages des sujets

if (!empty($publications)){
    
foreach($publications as $publication ){



    ?>
    
    <div class="modification">
    <h3 class="titrepubcat"><?=$publication->getTitre()?></h3>
    <h3 class="pseudocat">de <?=$publication->getUser()->getPseudo()?></h3>
    <a href="index.php?ctrl=categorie&action=detailPublication&id=<?=$publication->getId()?>">
    <img class="imgpublication"src="<?= $publication->getImagePublication() ?>" /><br>
    </a>
    <?php
    if(App\Session::getUser()){//Si connexion d'un user {?>
    <a class="modifier" href="index.php?ctrl=categorie&action=editPublication&id=<?= $publication->getId() ?>"><i class="fa-solid fa-pencil" style="color: #9f15d1;"></i>Modifier</a><br>
    <a  class="supprimer"href="index.php?ctrl=categorie&action=deletePublication&id=<?=$publication->getId()?>"><i class="fa-solid fa-trash" style="color: #a522bf;"></i>Supprimer</a><br>
<?php
}
?>
     <?php
}

}


    else
    {
        echo"Il n'y a pas de publications, soyez le premier a publier";
 ?>       

<?php   }

     ?>
</div> 
    
   

<?php

use App\Session;
//use Model\Managers\PublicationManager;
//use Model\Managers\UserManager;


?>

<?php

$publications = $result["data"]['publications'];
$user=\App\Session::getUser();
//$user=$result["data"]['user'];
//var_dump($user);
    ?> 

<!--Affiche les informations sur le user-->

<section class="pseudoprofil">
<a href="index.php?ctrl=categorie&action=editPseudo&id=<?=$user->getId()?>">Modifier pseudo</a>
<h1 class="h1profil"> <?= Session::getUser()->getPseudo() ?></h1>
<p class="nbabo"> Nombres d'abonnés:</p>
</section>
<div class="galerieandapropos">
<section>
<h3 class="galerie">Galerie</h3>
<h3 class="apro">A propos de <?= Session::getUser()->getPseudo() ?></h3>
</div>


</section>
<div id="containerbis">
<div class="contenu">
 
 <?php 
 foreach($publications as $publication )
{ 
    ?>
  
   <img class="imgpublication"src="<?= $publication->getImagePublication() ?>" >
    
    <h3 class="titrepublication"><?=$publication->getTitre()?></h3>
   <h3 class="pseudo">de <?=$publication->getUser()->getPseudo()?></h3><br>
  

<?php

}

?>




</div>
<section id="containeruser">
<p class="user"><strong>Email : </strong> <?= Session::getUser()->getEmail() ?></p>
<p class="localisation"><i class="fa-solid fa-location-dot"></i><?= Session::getUser()->getPays() ?></p>

</section>
</div>


<?php

?> 

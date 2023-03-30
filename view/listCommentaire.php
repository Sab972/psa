<?php



$commentaires=$result["data"]['commentaires'];
//var_dump($commentaire);

?>




<?php 

foreach($commentaires as $commentaire ){
    ?><h3 class="nom"><?= $commentaire->getUser()->getPseudo() ?></h3>
    <div class="commentaire">
    
    <p class="text"><?=$commentaire->getText()?></p>
    </div>
<?php
}




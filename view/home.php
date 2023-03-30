<?php
$categories = $result["data"]['categories'];

?>

<section class="first">


  <h1>Bienvenue sur Post-S-Art!</h1>
   <p class="text1"> Ici venez découvrir une communauté <strong>artistique</strong> en ligne, 
   où chacun peut s'inscrire et exposer ses propres créations
    graphiques.<strong> Post-S-Art</strong> reste le réseau idéal pour présenter
     vos œuvres devant vos pairs et obtenir des avis de votre communauté.</p>
     
    </section>
    <section id="categories"> 
  <h2 class="titrecat">Categories</h2>
      
  
  
  <div class="category">
   
     <?php 
  foreach($categories as $categorie)
  
    
  { ?>
  <div class="categorybis">
  <a class= "categorie" href="index.php?ctrl=categorie&action=detailCategorie&id=<?= $categorie->getId() ?>">
    <img class="imgcategories"src="<?= $categorie->getImageCategorie() ?>" />
    <a class="nomcategorie"><?=$categorie->getNom()?></a> <a href="index.php?ctrl=categorie&action=deleteCategorie&id=<?=$categorie->getId()?>">
    <?php if(App\Session::isAdmin()){?>
    <a href="index.php?ctrl=categorie&action=deleteCategorie&id=<?=$categorie->getId()?>"><i class="fa-solid fa-circle-xmark fa-sm" style="color: #e93f3f;"></i></a><br> <?php
 
}?>
 </div>
  <?php 
}
?>

</div>
</section>

</section>
<section>
        <h2>Dessins les plus populaires </h2>
        <div id="dessinpop">
          <img src="public/img/spiderman.jpg" alt="supermen">
          <img src="public/img/dogandcat.jpg" alt="image">
          <img src="public/img/2homme.jpg" alt="flash">
          <img src="public/img/cheval.jpg" alt="abysse">
        </div>
</section>
<section class="parallax">
<p class="parallaxtext">La vie n’est pas figée, les choses changent constamment.
Soit nous devenons plus nous-mêmes, soit nous dérivons vers un faux moi.
Notre premier travail en tant qu’artiste est donc de nous aventurer, loin de ce que nous pensons connaître, à la recherche du nouveau et de l’inexploré.
Les grands artistes font cela toute leur vie, ne restant jamais coincés dans un seul style, même s’il apporte richesse et gloire.
Nous devons toujours nous efforcer de nous réinventer, en continuant de nous appuyer sur qui nous sommes et ce que nous avons fait. </p>
</section>
<section>

  <h2>Dessins les plus récents</h2>
  <div id="dessinrecent">
    <img src="public/img/winie.jpg" alt="winnie">
    <img src="public/img/thor.webp" alt="Thor">
    <img src="public/img/street.jpg" alt="street">
    <img src="public/img/kissmasque.jpg" alt="kiss">
  </div>
</section>
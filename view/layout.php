<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Allan&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@1&family=Allan&family=Calligraffitti&family=Oregano:ital@1&family=Sassy+Frass&family=Urbanist:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>css/style.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Site Post-S-Art</title>
</head>
<body>
    <header>
      <div id="head">
        <figure>
        <a href="index.php">
              <img class="logo" src="public/img/Post_S_ART-removebg-preview.png" alt="logo">
        </a>
        </figure>
      <form> 
        <div id="form">
          <input class="recherche"type="text" name="text" class="search" placeholder="Recherche">
          <input class="submit"type="submit" name="submit" class="submit" value="Valider">
        </div>
      </form>
      
  
         <nav>
         <?php
         if(App\Session::getUser()){
                            ?>
         <a class="iconeuser" href="index.php?ctrl=security&action=viewProfile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()->getPseudo()?></a>                  
         <?php if(App\Session::isAdmin()){?>
         <a class="ajoutercat" href="index.php?ctrl=categorie&action=addCategorie"><i class="fa-solid fa-plus"></i>Ajouter une categorie</a><br> 
        
        <?php
        }
        ?>
         <a  class="deco"href="index.php?ctrl=security&action=logout">Déconnexion</a>
         </div>
             <?php
                        }
                        else{
                            ?>
       
       <a class="connexion" href="index.php?ctrl=security&action=loginForm">Connexion</a>
            <a class="inscription" href="index.php?ctrl=security&action=registerForm">Inscription</a>
          </nav> 
        </div>  
        <?php      
        }
        ?>
      </header>
      <main>
            
      <?= $page ?>
   
      </main>
      <footer>
        <div id="footer">
          <a class="confi"href="#">Confidentialité et conditions</a>
          <a class="apropos" href="#">A propos</a>
        <figure>
          <img class="logo1"src="public/img/Post_S_ART-removebg-preview.png" alt="Logo">
        </figure>
      <div class="reseau">
        <div class="facebook">
      <i class="fa-brands fa-facebook fa-2xl" style="color: #010813;"></i><br>
    </div>
    <div class="insta">
      <i class="fa-brands fa-instagram fa-2xl" style="color: #010813;"></i><br>
    </div>
    <div>
      <i class="fa-brands fa-twitter fa-2xl" style="color: #010813;"></i>
    </div>
      </div>
          <a class="pos" href="#">@Post-S-Art2023</a>
      </div>
      </footer>
</body>
</html>
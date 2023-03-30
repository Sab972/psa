<?php







    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CategorieManager;
    use Model\Managers\PublicationManager;
    use Model\Managers\UserManager;
    use Model\Managers\CommentaireManager;
    use Model\Managers\LikeManager;
  
    
    class CategorieController extends AbstractController implements ControllerInterface{
        
        public function index(){

            $categorieManager = new CategorieManager();

            return [
                //Ici on retourne la vue grace a la constante VIEW_DIR crée dans l'index
                "view" => VIEW_DIR."listCategories.php",
                "data" => [
                    "categories" => $categorieManager->findAll(["nom","DESC"])
                ]//Ici on utilise la fonction findAll du manager 
            ];
        
        }
    
        public function detailCategorie($categorie){

            
            $publicationManager = new PublicationManager();
            $categorieManager= new CategorieManager();

            return [

                "view" => VIEW_DIR."listPublicationsByCategorie.php",

                "data" => [

                    "publications" => $publicationManager->findPublicationsByCategorieId($categorie),
                    "categorie"=>$categorieManager->findOneById($categorie)


                ]

            ];

        }

        public function detailPublication($idPublication){

            $publicationManager = new PublicationManager();
            $commentaireManager = new CommentaireManager();


            return [

                "view" => VIEW_DIR."detailPublication.php",

                "data" => [

                    "publication" => $publicationManager->findOneById($idPublication),
                    "commentaires"=>$commentaireManager->findCommentairesByPublication($idPublication),
                    
                ]

            ];

        }
        public function addFormPublication($categorieId){

            $categorieManager = new CategorieManager();

            return [
                "view" => VIEW_DIR."formPublication.php",
                "data" => [

                    
                    "categorie"=>$categorieManager->findOneById($categorieId)


                ]
            ];

        }

        public function addFormCommentaire($publicationId){

            $commentaireManager = new CommentaireManager();

            return [
                "view" => VIEW_DIR."detailPublication.php",
                "data" => [

                    
                    "commentaires"=>$commentaireManager->findOneById($publicationId)


                ]
            ];

        }

        //fonction add
        public function addPublication($idCategorie){

            $categorieManager = new CategorieManager();
            $publicationManager = new PublicationManager();

            if(!empty($_POST)){
                $publicationTitre= filter_input(INPUT_POST, "publicationTitre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $publicationContenu= filter_input(INPUT_POST, "publicationContenu", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $publicationImage= filter_input(INPUT_POST, "file", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
            if ($publicationTitre && $publicationContenu){

                
                if(isset($_FILES['file']))
            {
                // si on echo $_FILES on obtient un tableau qui contient les infos dans le deuxieme [' '] on les places dans des variables
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $size = $_FILES['file']['size'];
                $error = $_FILES['file']['error'];
                $tabExtension = explode('.', $name);
               
                $extension = strtolower(end($tabExtension));
       
                //Tableau des extensions que l'on accepte
                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                //Taille max que l'on accepte
                $maxSize = 4000000;
                if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0)
                {
                    // Génère un identifiant unique
                    $uniqueID = uniqid('', true );
                    $file = 'public/img/'.$uniqueID.'.'.$extension;
                   
                    //  vaut l'id générer.jpg par exemple 
                    // Déplace un fichier téléchargé
                  move_uploaded_file($tmpName , IMG_DIR.$name);

                //   var_dump($_FILES['file']);
                    
             
                    // il faut renomée le fichier avec l'uniqueiD et son extension car elle est enreigstrer en base de donnée de cet manière.
                 rename(IMG_DIR.$name  ,  './public/img/'.$uniqueID.'.'.$extension);
                    $publicationImage = $file;
                }
                else{
                    Session::addFlash('error', "<p>mauvaise extension ou fichier trop volumineux ! <p>") ;
                };
             
            }

                $publicationManager->add([ 

                    "titre" => $publicationTitre,
                    "contenu" => $publicationContenu,
                    "categorie_id" => $idCategorie,
                    "imagePublication" => $publicationImage,
                    "user_id"=> Session::getUser()->getId(),
                ]);

            }
         
              

          
                
           }


           return [
            "view" => VIEW_DIR."formPublication.php",
            "data" => [

                
                "categorie"=>$categorieManager->findOneById($idCategorie)


            ]
        ];
    
        }

       // fonction edit
       public function editPublication($id)
        {
            
            $publicationManager = new PublicationManager();
            $publication = $publicationManager->findOneById($id);
 
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             
             
            if($titre){

            $publicationManager->edit([ 

                "titre" => $titre,
                ],$id);
          
//var_dump($titre); 
       
                 $this->redirectTo("detailCategorie&id");
               header("Location: index.php?ctrl=categorie&action=detailCategorie&id=$id");
                }

           return[
                //retourne un tableau de données , en l'occurence le topic par son id
               // et une vue au format html 
            "view" => VIEW_DIR."editPublications.php",
            "data" => ["publication" => $publication]
           ];
        }
  
        public function editCategorie($id)
        {
            
            $categorieManager = new CategorieManager();
            $categorie = $categorieManager->findOneById($id);
 
           $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             
// var_dump($nom);              
            if($nom){

            $categorieManager->edit([ 

                "nom" => $nom,
                ],$id);
          

                
                }

           return[
                //retourne un tableau de données , en l'occurence le topic par son id
               // et une vue au format html 
            "view" => VIEW_DIR."editCategory.php",
            "data" => ["categorie" => $categorie]
           ];
        }



        public function editPseudo($id)
        {
            
            $userManager = new UserManager();
            $user = $userManager->findOneById($id);

            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                      
            if($pseudo){

            $userManager->edit([ 

                "pseudo" => $pseudo,
                ],$id);
        
                }

        return[
                //retourne un tableau de données , en l'occurence le topic par son id
            // et une vue au format html 
            "view" => VIEW_DIR."editPseudo.php",
            "data" => ["user" => $user]
        ];
        }

        //fonction delete
        public function deletePublication($id){
            $publicationManager = new PublicationManager();
            $idcategorie = $publicationManager->findOneById($id)->getCategorie()->getId();
            $publicationManager->delete($id);
    
            $this->redirectTo("listPublicationsByCategorie", $idcategorie);
            
            }

   
        //detail publication
        //addcategorie
        public function addCategorie(){

            $categorieManager = new CategorieManager();
            

            if(!empty($_POST)){
                $categorieNom= filter_input(INPUT_POST, "categorieNom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               

            if ($categorieNom){

               if(isset($_FILES['file']))
            {
                // si on echo $_FILES on obtient un tableau qui contient les infos dans le deuxieme [' '] on les places dans des variables
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $size = $_FILES['file']['size'];
                $error = $_FILES['file']['error'];
                $tabExtension = explode('.', $name);
               
                $extension = strtolower(end($tabExtension));
       
                //Tableau des extensions que l'on accepte
                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                //Taille max que l'on accepte
                $maxSize = 4000000;
                if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0)
                {
                    // Génère un identifiant unique
                    $uniqueID = uniqid('', true );
                    $file = 'public/img/'.$uniqueID.'.'.$extension;
                   
                    //  vaut l'id générer.jpg par exemple 
                    // Déplace un fichier téléchargé
                    move_uploaded_file($tmpName , './public/img/'.$name);
                  

                    // il faut renomée le fichier avec l'uniqueiD et son extension car elle est enreigstrer en base de donnée de cet manière.
                 rename('./public/img/'.$name , './public/img/'.$uniqueID.'.'.$extension);
                    $categorieImage = $file;
                }
                else{
                    Session::addFlash('error', "<p>mauvaise extension ou fichier trop volumineux ! <p>") ;
                };
                //$categorieManager->edit(['imagePublication' => $image],$id);
               // Session::addFlash('success', "Photo modifier avec succès") ;
               // $this->redirectTo("formPublication",$id);
            }

                $categorieManager->add([ 

                    "nom" => $categorieNom,
                    "imageCategorie" => $categorieImage,
                
                  
                   
                ]);
            }


               
                
           }


           return [
            "view" => VIEW_DIR."formCategorie.php",
            "data" => [

                
                "categorie"=>$categorieManager,


            ]
        ];
    
        }

        public function addCommentaire($idPublication){

             $commentaireManager = new CommentaireManager();
         

            if(!empty($_POST)){
              $commentaireText = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
                
            if ($commentaireText ){
 
                //$now = new \DateTime();
                //$dateFormat = $now->format('Y-m-d H:i:s');
                $commentaireManager->add([ 

                    "text" => $commentaireText,
                    "publication_id" => $idPublication,
                    "user_id"=> Session::getUser()->getId(),
                ]);

//var_dump($_POST);
                $this->redirectTo("categorie","detailPublication",$idPublication );
                

            }

            return [
                "view" => VIEW_DIR."detailPublication.php",
                "data" => [
    
                  
    
    
                ]
            ];
        
        }
        }

        public function listCommentaire($idPublication){

            $commentaireManager = new CommentaireManager();

            return [
                "view" => VIEW_DIR."detailPublication.php",
           
                "data" => [
                   "commentaires" => $commentaireManager->findCommentairesByPublication($idPublication)
                ]
                ];

        }     
     
        // //deletecategorie
      
        public function deleteCategorie($id){
            $categorieManager = new CategorieManager();
            $categorie = $categorieManager->findOneById($id);


            $categorieManager->delete($categorie->getId());
    
    
            $this->redirectTo("listPublicationsByCategorie", $categorie);
            
            }


    
      
    }
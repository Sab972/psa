<?php



    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CategorieManager;
  
    
    class HomeController extends AbstractController implements ControllerInterface{
        
        public function index(){

            $categorieManager = new CategorieManager();
            
            return [
                "view" => VIEW_DIR."home.php",
                "data" => [
                    "categories" => $categorieManager->findAll(["nom","DESC"]),
                    // les posts les plus récents; limit 5
                ]//Ici on utilise la fonction findAll du manager 

                
            ];



        }

    }
<?php
    namespace App;
    // Une classe abstraite est une classe qui ne peut pas être instanciée. 
    // On peut donc dire qu'elle sert de modèle aux classes qui en hériteront

    abstract class AbstractController{

        public function index(){}
  //Fontion de redirection      
  public function redirectTo($ctrl = null, $action = null, $id = null){

 

    if($ctrl != "home"){

        $url = $ctrl ? "index.php?ctrl=".$ctrl : "";

        $url.= $action ? "&action=".$action : "";

        $url.= $id ? "&id=".$id : "";

        //$url.= ".html";

    }

    else $url = "/";

    header("Location: $url");

    die();
}
public function restrictTo($role){
            
    if(!Session::getUser() || !Session::getUser()->hasRole($role)){
        $this->redirectTo("security", "login");
    }
    return;
}

}
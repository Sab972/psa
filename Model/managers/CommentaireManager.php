<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    //use Model\Managers\PostManager;

    class CommentaireManager extends Manager{

        protected $className = "Model\Classes\Commentaire";
        protected $tableName = "commentaire";


        public function __construct(){
            parent::connect();
        }

        public function findCommentairesByPublication($idPublication){

            $sql="SELECT * 
                  FROM ".$this->tableName." c
                   WHERE c.publication_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql,['id'=>$idPublication], true),
                $this->className
            );
        }
    }
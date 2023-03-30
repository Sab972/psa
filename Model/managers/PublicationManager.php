<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    //use Model\Managers\PostManager;

    class PublicationManager extends Manager{

        protected $className = "Model\Classes\Publication";
        protected $tableName = "publication";


        public function __construct(){
            parent::connect();
        }

        public function affichePublication($id)

        {

            $sql = "SELECT *

                    FROM ".$this->tableName." p;

                   WHERE p.user_id = :id";


            return $this->getMultipleResults(

                DAO::select($sql, ['id' => $id], true),

                $this->className

            );

        }

        public function findPublicationsByCategorieId($id)

        {

            $sql = "SELECT *

                    FROM ".$this->tableName." p

                    WHERE p.categorie_id = :id";


            return $this->getMultipleResults(

                DAO::select($sql, ['id' => $id], true),

                $this->className

            );

        }

    
        public function findPublicationsByUser($id){
            $sql = "SELECT *

            FROM " . $this->tableName . " p

            WHERE p.user_id = :id";

          return $this->getMultipleResults(

        DAO::select($sql, ['id' => $id], true),

        $this->className

);

            
        }
      
    }
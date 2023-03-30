<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    //use Model\Managers\PostManager;

    class CategorieManager extends Manager{

        protected $className = "Model\Classes\Categorie";
        protected $tableName = "categorie";


        public function __construct(){
            parent::connect();
        }

        public function findPublicationsByCategorieId($id)

        {

            $sql = "SELECT *

                    FROM ".$this->tableName." c

                    WHERE c.categorie_id = :id";


            return $this->getMultipleResults(

                DAO::select($sql, ['id' => $id], true),

                $this->className

            );

        }
    

    }
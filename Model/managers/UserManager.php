<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    //use Model\Managers\UserManager;

    class UserManager extends Manager{

        protected $className = "Model\Classes\User";
        protected $tableName = "user";


        public function __construct(){
            parent::connect();
        }
        public function findOneByPseudo($data){

            $sql = "SELECT *
            FROM ".$this->tableName." u
            WHERE u.pseudo = :pseudo
            ";

             return $this->getOneOrNullResult(
             DAO::select($sql, ['pseudo' => $data], false), 
             $this->className
    );
        }

        
     
    }
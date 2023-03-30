<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    //use Model\Managers\PostManager;

    class LikeManager extends Manager{

        protected $className = "Model\Classes\Like";
        protected $tableName = "like";


        public function __construct(){
            parent::connect();
        }
    }
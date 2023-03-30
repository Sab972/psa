<?php
    namespace Model\Classes;

    use App\Entity;

    final class Liker extends Entity{

        private $user;
        private $publication;
       
        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getuser()
        {
                return $this->user;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }

        /**
         * Get the value of text
         */ 
        public function getPublication()
        {
                return $this->publication;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setPublication($publication)
        {
                $this->publication = $publication;

                return $this;
        }
      
    }

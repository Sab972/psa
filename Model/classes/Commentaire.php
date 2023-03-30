<?php
    namespace Model\Classes;

    use App\Entity;

    final class Commentaire extends Entity{

        private $id;
        private $text;
        private $dateCommentaire;
        private $publication;
        private $user;
       

        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of text
         */ 
        public function getText()
        {
                return $this->text;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setText($text)
        {
                $this->text = $text;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getDateCommentaire()
        {
                return $this->dateCommentaire;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setDateCommentaire($dateCommentaire)
        {
                $this->dateCommentaire = $dateCommentaire;

                return $this;
        }
        public function getPublication()
        {
                return $this->publication;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setPublication($publication)
        {
                $this->publication = $publication;

                return $this;
        }
        public function getUser()
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
        public function __toString()
        {
            
                return $this->getId().' '.$this->getText().' '.$this->getDateCommentaire().' '.$this->getPublication().' '.$this->getUser(); 
                
        }
    }